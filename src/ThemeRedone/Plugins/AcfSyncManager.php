<?php

// src/ThemeRedone/Plugins/AcfSyncManager.php

declare(strict_types=1);

namespace ThemeRedone\Plugins;

final readonly class AcfSyncManager
{
    public function initialize(): void
    {
        add_filter('acf/settings/save_json', [$this, 'setJsonSavePath']);
        add_filter('acf/settings/load_json', [$this, 'setJsonLoadPath']);

        if (function_exists('acf_add_options_page')) {
            $this->setupOptionsPages();
        }
    }

    public function setJsonSavePath(): string
    {
        return get_stylesheet_directory() . '/acf-data';
    }

    public function setJsonLoadPath(array $paths): array
    {
        unset($paths[0]);
        $paths[] = get_stylesheet_directory() . '/acf-data';

        return $paths;
    }

    private function setupOptionsPages(): void
    {
        acf_add_options_page([
            'page_title' => 'Theme General Settings',
            'menu_title' => 'Theme Settings',
            'menu_slug' => 'theme-general-settings',
            'capability' => 'edit_posts',
            'redirect' => false,
        ]);

        acf_add_options_sub_page([
            'page_title' => '404 Template Settings',
            'menu_title' => '404 Template Settings',
            'parent_slug' => 'theme-general-settings',
        ]);

        acf_add_options_sub_page([
            'page_title' => 'Footer Settings',
            'menu_title' => 'Footer Settings',
            'parent_slug' => 'theme-general-settings',
        ]);
    }
}
