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
        if (empty($post->post_content) || !has_blocks($post->post_content)) {
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

        $customBlockNames = $this->getCustomBlockNames($blocks, $block_prefix);
        if (empty($customBlockNames)) {
            return;
        }

        $this->enqueueSharedAssets($customBlockNames, $block_prefix);
        $this->enqueueBlockSpecificAssets($customBlockNames, $block_prefix);
    }

    private function getBlockPrefix(): string
    {
        $config = json_decode(
            file_get_contents(get_template_directory() . "/theme_redone_global_config.json")
        );

        return $config->BLOCK_NAME_PREFIX;
    }

    private function getCustomBlockNames(array $blocks, string $prefix): array
    {
        $names = [];
        foreach ($blocks as $block) {
            if (!is_null($block['blockName']) && str_starts_with($block['blockName'], "$prefix/")) {
                if (!in_array($block['blockName'], $names)) {
                    $names[] = $block['blockName'];
                    if (!empty($block['innerBlocks'])) {
                        $names = array_merge(
                            $names,
                            $this->getCustomBlockNames($block['innerBlocks'], $prefix)
                        );
                    }
                }
            }
        }

        return array_unique($names);
    }

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

    private function enqueueBlockSpecificAssets(array $blockNames, string $prefix): void
    {
        foreach ($blockNames as $blockName) {
            $nameWithoutPrefix = substr($blockName, strlen($prefix) + 1);
            $dirPath = TR_THEME_DIR . "/dist/block-specific/$nameWithoutPrefix";
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

    private function getBlockModel(string $blockName): array
    {
        return json_decode(
            file_get_contents(TR_BLOCKS_DIR . "/$blockName/model.json"),
            true
        );
    }

    private function shouldConsiderDep(string $type, array $deps): bool
    {
        return isset($deps[$type]) && is_array($deps[$type]) && !empty($deps[$type]);
    }

    private function isValidFile(string $path): bool
    {
        return file_exists($path) && filesize($path) > 0;
    }

    private function enqueueSharedFiles(array $cssFiles, array $jsFiles): void
    {
        $systemPath = TR_THEME_DIR . "/dist/blocks-shared";
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
