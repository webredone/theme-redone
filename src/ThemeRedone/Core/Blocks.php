<?php

// src/ThemeRedone/Core/Blocks.php

declare(strict_types=1);

namespace ThemeRedone\Core;

use ThemeRedone\Core\BlockTypesRegistrar;

/** @package ThemeRedone\Core */
final readonly class Blocks
{
    public function __construct(private readonly BlockTypesRegistrar $blocksRegister)
    {
    }

    public function initialize(): void
    {
        add_action('wp_enqueue_scripts', [$this, 'enqueueBlockAssets'], 10, 0);
        $this->blocksRegister->register();

    }

    public function enqueueBlockAssets(): void
    {
        if (!is_single() && !is_page()) {
            return;
        }

        global $post;

        if (!($post instanceof \WP_Post) || empty($post->post_content) || !has_blocks($post->post_content)) {
            return;
        }

        $this->processBlockAssets($post);

    }

    private function processBlockAssets(\WP_Post $post): void
    {
        $block_prefix = $this->getBlockPrefix();
        $blocks = parse_blocks($post->post_content);

        if (empty($blocks)) {
            return;
        }

        /** @var string[] $customBlockNames */
        $customBlockNames = $this->getCustomBlockNames($blocks, $block_prefix);
        if (empty($customBlockNames)) {
            return;
        }

        $this->enqueueSharedAssets($customBlockNames, $block_prefix);
        $this->enqueueBlockSpecificAssets($customBlockNames, $block_prefix);
    }

    private function getBlockPrefix(): string
    {
        $filePath = Config::getThemeDir() . "/theme_redone_global_config.json";
        $configContent = (string) file_get_contents($filePath); // Cast to ensure string
        $config = json_decode($configContent);

        return $config->BLOCK_NAME_PREFIX ?? 'tr';
    }

    /**
     * Recursively retrieves custom block names from a list of parsed blocks.
     *
     * @param array<int|string, array<string, mixed>> $blocks Array of parsed block data.
     * @param string $prefix Block prefix.
     *
     * @return string[] List of unique custom block names.
     */
    private function getCustomBlockNames(array $blocks, string $prefix): array
    {
        $names = [];

        foreach ($blocks as $block) {
            if (!is_array($block) || !isset($block['blockName'])) {
                continue;
            }

            $blockName = $block['blockName'];
            if (is_string($blockName) && str_starts_with($blockName, "$prefix/")) {
                if (!in_array($blockName, $names, true)) {
                    $names[] = $blockName;
                    if (!empty($block['innerBlocks']) && is_array($block['innerBlocks'])) {
                        $names = array_merge(
                            $names,
                            $this->getCustomBlockNames($block['innerBlocks'], $prefix)
                        );
                    }
                }
            }
        }

        $names = array_filter($names, 'is_string'); // Ensure all names are strings

        return array_unique($names);
    }

    /**
     * Enqueues shared assets for the specified custom blocks.
     *
     * @param string[] $blockNames List of custom block names.
     * @param string $prefix Block prefix.
     */
    private function enqueueSharedAssets(array $blockNames, string $prefix): void
    {
        $sharedCss = [];
        $sharedJs = [];

        foreach ($blockNames as $blockName) {
            $nameWithoutPrefix = substr($blockName, strlen($prefix) + 1);
            $blockModel = $this->getBlockModel($nameWithoutPrefix);

            if (!isset($blockModel['block_meta']['deps'])) {
                continue;
            }

            $deps = $blockModel['block_meta']['deps'];

            if ($this->shouldConsiderDep('css', $deps)) {
                foreach ($deps['css'] as $css) {
                    if (!in_array($css, $sharedCss)) {
                        $sharedCss[] = $css;
                    }
                }
            }

            if ($this->shouldConsiderDep('js', $deps)) {
                foreach ($deps['js'] as $js) {
                    if (!in_array($js, $sharedJs)) {
                        $sharedJs[] = $js;
                    }
                }
            }
        }

        $this->enqueueSharedFiles($sharedCss, $sharedJs);
    }

    /**
     * Enqueues block-specific assets for the specified custom blocks.
     *
     * @param string[] $blockNames List of custom block names.
     * @param string $prefix Block prefix.
     */
    private function enqueueBlockSpecificAssets(array $blockNames, string $prefix): void
    {
        foreach ($blockNames as $blockName) {
            $nameWithoutPrefix = substr($blockName, strlen($prefix) + 1);

            $dirPath = Config::getThemeDir() . "/dist/block-specific/$nameWithoutPrefix";

            $urlPath = get_stylesheet_directory_uri() . "/dist/block-specific/$nameWithoutPrefix";

            $cssPath = "$dirPath/frontend.min.css";
            $jsPath = "$dirPath/frontend.min.js";

            if ($this->isValidFile($cssPath)) {
                wp_enqueue_style(
                    "tr-block-css--$prefix-$nameWithoutPrefix",
                    "$urlPath/frontend.min.css"
                );
            }

            if ($this->isValidFile($jsPath)) {
                wp_enqueue_script(
                    "tr-block-js--$prefix-$nameWithoutPrefix",
                    "$urlPath/frontend.min.js",
                    [],
                    null,
                    true
                );
            }
        }
    }

    /**
     * Retrieves block model data from a JSON file.
     *
     * @param string $blockName The block name.
     *
     * @return array<string, mixed> The block model data.
     */
    private function getBlockModel(string $blockName): array
    {
        $filePath = Config::getBlocksDir() . "/$blockName/model.json";
        $configContent = (string) file_get_contents($filePath); // Cast to ensure string

        return json_decode($configContent, true) ?? [];
    }

    /**
     * Determines whether the specified dependency type should be considered.
     *
     * @param string $type The dependency type ('css' or 'js').
     * @param array<string, mixed> $deps List of dependencies.
     *
     * @return bool True if the dependency type should be considered, false otherwise.
     */
    private function shouldConsiderDep(string $type, array $deps): bool
    {
        return isset($deps[$type]) && is_array($deps[$type]) && !empty($deps[$type]);
    }

    private function isValidFile(string $path): bool
    {
        return file_exists($path) && filesize($path) > 0;
    }

    /**
     * @param string[] $cssFiles
     * @param string[] $jsFiles
     */
    private function enqueueSharedFiles(array $cssFiles, array $jsFiles): void
    {

        $systemPath = Config::getThemeDir() . "/dist/blocks-shared";

        $urlPath = get_stylesheet_directory_uri() . "/dist/blocks-shared";

        foreach ($cssFiles as $css) {
            $path = "$systemPath/$css.min.css";
            if ($this->isValidFile($path)) {
                wp_enqueue_style(
                    "tr-block-shared-css--$css",
                    "$urlPath/$css.min.css"
                );
            }
        }

        foreach ($jsFiles as $js) {
            $path = "$systemPath/$js.min.js";
            if ($this->isValidFile($path)) {
                wp_enqueue_script(
                    "tr-block-shared-js--$js",
                    "$urlPath/$js.min.js",
                    [],
                    null,
                    true
                );
            }
        }
    }
}
