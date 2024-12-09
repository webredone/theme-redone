<?php

// src/ThemeRedone/Core/BlockTypesRegistrar.php

declare(strict_types=1);

namespace ThemeRedone\Core;

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
        // Register dynamic blocks
        $this->registerDynamicBlocks();

        // Hook block asset registration into WordPress
        add_action('enqueue_block_editor_assets', [$this, 'registerBlockAssets'], 10, 0);
    }

    private function registerDynamicBlocks(): void
    {
        $all_blocks_dir_names = array_diff(scandir(TR_BLOCKS_DIR), ['..', '.', 'new-block-setup']);

        foreach ($all_blocks_dir_names as $block_dir_name) {
            $model_path = TR_BLOCKS_DIR . "/$block_dir_name/model.json";
            if (!file_exists($model_path)) {
                continue;
            }

            $block_model = json_decode(file_get_contents($model_path));
            if (!is_object($block_model) || !isset($block_model->block_meta)) {
                continue;
            }

            $block_meta = $block_model->block_meta;

            // If block is not JS-rendered or the flag doesn't exist, require its controller
            $should_require = (!isset($block_meta->isJsRendered) || $block_meta->isJsRendered === false);

            $controller_path = TR_BLOCKS_DIR . "/$block_dir_name/controller.php";

            if ($should_require && file_exists($controller_path)) {
                require_once $controller_path;
            }

        }
    }

    public function registerBlockAssets(): void
    {
        // Register block editor script for the backend
        wp_register_script(
            $this->SCRIPTS->js['name'],
            $this->SCRIPTS->js['path'],
            ['wp-blocks', 'wp-i18n', 'wp-element', 'wp-editor'],
            null,
            true
        );

        // Register block editor styles for the backend
        wp_register_style(
            $this->SCRIPTS->css['name'],
            $this->SCRIPTS->css['path'],
            ['wp-edit-blocks'],
            null
        );

        // Localize script with global data
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
}
