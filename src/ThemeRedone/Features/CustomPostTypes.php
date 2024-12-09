<?php

// src/ThemeRedone/Features/CustomPostTypes.php

declare(strict_types=1);

namespace ThemeRedone\Features;

final readonly class CustomPostTypes
{
    public function register(): void
    {
        if (!function_exists('cptui_init')) {
            require get_template_directory() . '/cptui/post_types.php';
            require get_template_directory() . '/cptui/taxonomies.php';
        }
    }

    // Uncomment and modify if you want to register CPTs directly in code
    /*
    private function registerNewsPostType(): void
    {
        register_post_type('news', [
            'labels' => [
                'name' => __('News'),
                'singular_name' => __('News Post')
            ],
            'hierarchical' => true,
            'public' => true,
            'menu_icon' => 'dashicons-media-text',
            'has_archive' => true,
            'supports' => ['title', 'editor', 'thumbnail'],
            'publicly_queryable' => true,
            'show_in_rest' => true,
            'rest_base' => 'news',
            'rest_controller_class' => 'WP_REST_Posts_Controller',
        ]);
    }
    */
}
