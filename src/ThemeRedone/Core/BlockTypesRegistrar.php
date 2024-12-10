<?php

// src/ThemeRedone/Core/BlockTypesRegistrar.php

declare(strict_types=1);

namespace ThemeRedone\Core;

use Nette\Utils\ArrayHash;
use ThemeRedone\Enums\Flavor;

final class BlockTypesRegistrar
{
    private string $TEMPLATE_DIRECTORY_URI;
    private string $STYLESHEET_DIRECTORY_URI;
    private string $TR_BLOCKS_PACKAGE_NAME = 'tr/gutenberg-blocks';

    /** @var object{js: array{name: string, path: string}, css: array{name: string, path: string}} */
    private object $SCRIPTS;

    /** @var array{themeDirPath: string, themeDirUrl: string} */
    private array $JS_GLOBAL_VARS;

    public function __construct()
    {
        $this->TEMPLATE_DIRECTORY_URI = get_template_directory_uri();
        $this->STYLESHEET_DIRECTORY_URI = get_stylesheet_directory_uri();

        $this->SCRIPTS = (object) [
            'js' => [
                'name' => 'tr_blocks-js',
                'path' => $this->TEMPLATE_DIRECTORY_URI . '/dist/global_admin/blocks.min.js',
            ],
            'css' => [
                'name' => 'tr_blocks-editor-css',
                'path' => $this->TEMPLATE_DIRECTORY_URI . '/dist/global_admin/blocks-backend.css',
            ],
        ];

        $this->JS_GLOBAL_VARS = [
            'themeDirPath' => $this->STYLESHEET_DIRECTORY_URI . '/gutenberg/',
            'themeDirUrl' => $this->STYLESHEET_DIRECTORY_URI . '/gutenberg/',
        ];
    }

    public function register(): void
    {
        $this->registerDynamicBlocks();
        add_action('enqueue_block_editor_assets', [$this, 'registerBlockAssets'], 10, 0);
    }

    private function registerDynamicBlocks(): void
    {

        $all_blocks_dir_names = array_diff(scandir(Config::getBlocksDir()) ?: [], ['..', '.', 'new-block-setup']);

        foreach ($all_blocks_dir_names as $block_dir_name) {

            $model_path = Config::getBlocksDir() . "/$block_dir_name/model.json";

            if (!file_exists($model_path)) {
                continue;
            }

            $block_model = json_decode((string) file_get_contents($model_path));

            if (!is_object($block_model) || !isset($block_model->block_meta)) {
                continue;
            }

            $block_meta = $block_model->block_meta;
            $should_require = (!isset($block_meta->isJsRendered) || $block_meta->isJsRendered === false);

            $controller_path = Config::getBlocksDir() . "/$block_dir_name/controller.php";

            if ($should_require && file_exists($controller_path)) {
                require_once $controller_path;
            } else {
                self::registerBlockByName($block_dir_name);
            }
        }
    }

    public function registerBlockAssets(): void
    {
        wp_register_script(
            $this->SCRIPTS->js['name'],
            $this->SCRIPTS->js['path'],
            ['wp-blocks', 'wp-i18n', 'wp-element', 'wp-editor'],
            null,
            true
        );

        wp_register_style(
            $this->SCRIPTS->css['name'],
            $this->SCRIPTS->css['path'],
            ['wp-edit-blocks'],
            null
        );

        wp_localize_script(
            $this->SCRIPTS->js['name'],
            'trBlocksGlobal',
            $this->JS_GLOBAL_VARS
        );

        register_block_type($this->TR_BLOCKS_PACKAGE_NAME, [
            'editor_script' => $this->SCRIPTS->js['name'],
            'editor_style' => $this->SCRIPTS->css['name'],
        ]);
    }

    public static function registerBlock(string $blockDir, callable $attrs_callback = null): void
    {
        $block_name = basename($blockDir);
        self::doRegisterBlock($block_name, $attrs_callback);
    }

    public static function registerBlockByName(string $blockName, callable $attrs_callback = null): void
    {
        self::doRegisterBlock($blockName, $attrs_callback);
    }

    public static function registerCurrentBlock(callable $attrs_callback = null): void
    {
        $trace = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 1)[0];
        $caller_file = $trace['file'] ?? null;

        if (!$caller_file) {
            trigger_error("Could not determine caller file for block registration.", E_USER_WARNING);

            return;
        }

        $blockDir = dirname($caller_file);
        self::registerBlock($blockDir, $attrs_callback);
    }

    private static function doRegisterBlock(string $blockName, callable $attrs_callback = null): void
    {

        $blockDir = Config::getBlocksDir() . "/$blockName";

        $model_path = $blockDir . "/model.json";

        if (!file_exists($model_path)) {
            trigger_error("Model file not found for block: $blockName", E_USER_WARNING);

            return;
        }

        $model = json_decode((string) file_get_contents($model_path), true);
        if (!isset($model['attributes'])) {
            trigger_error("No attributes defined in model.json for block: $blockName", E_USER_WARNING);

            return;
        }

        $attributes = $model['attributes'];

        $prefix = Config::getBlockNamePrefix();
        $flavor = Config::getFlavor();

        // Determine the template file based on the flavor

        $templateFile = 'view' . $flavor->getTemplateExtension();
        $view_path = $blockDir . '/' . $templateFile;

        register_block_type($prefix . '/' . $blockName, [
            'attributes' => $attributes,
            'render_callback' => function ($attrs, $content) use ($attrs_callback, $blockName, $view_path) {
                global $tr_renderer;

                $attrs = ArrayHash::from($attrs, true);

                // Let the callback modify attrs and content
                if (is_callable($attrs_callback)) {
                    $result = $attrs_callback($attrs, $content);

                    if (is_array($result)) {
                        [$attrs, $content] = $result + [$attrs, $content];
                    } elseif ($result !== null) {
                        $attrs = $result;
                    }
                }

                if (!file_exists($view_path)) {
                    trigger_error("View file not found for block: $blockName", E_USER_WARNING);

                    return '';
                }

                // Ensure $attrs is ArrayHash
                if (!$attrs instanceof ArrayHash) {
                    $attrs = ArrayHash::from((array)$attrs, true);
                }

                $attrs->content = $content;

                return $tr_renderer->renderToString($view_path, $attrs);
            },
        ]);
    }
}
