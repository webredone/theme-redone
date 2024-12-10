<?php

// src/ThemeRedone/Plugins/CptuiSyncManager.php

// CPT UI post types and taxonomies sync
// https://github.com/jonathanjanssens/custom-post-type-ui-sync

declare(strict_types=1);

namespace ThemeRedone\Plugins;

use ThemeRedone\Core\Config;

final readonly class CptuiSyncManager
{
    public function initialize(): void
    {
        // Load CPTUI definitions from local files if the plugin isn't already loaded
        // TODO: Check if this is correct
        if (!function_exists('cptui_init')) {
            $cptui_post_types_path = Config::getThemeDir() . '/cptui/post_types.php';
            $cptui_taxonomies_path = Config::getThemeDir() . '/cptui/taxonomies.php';

            if (file_exists($cptui_post_types_path)) {
                require $cptui_post_types_path;
            }

            if (file_exists($cptui_taxonomies_path)) {
                require $cptui_taxonomies_path;
            }
        }
    }
}
