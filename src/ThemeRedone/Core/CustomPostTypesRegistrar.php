<?php

// src/ThemeRedone/Core/CustomPostTypesRegistrar.php

declare(strict_types=1);

namespace ThemeRedone\Core;

/**
 * This class is now responsible solely for registering CPTs via code,
 * independent of CPTUI. If you have code-based CPTs, define methods here and call them in `register()`.
 */
final readonly class CustomPostTypesRegistrar
{
    public function register(): void
    {
        // Call your code-based CPT registration methods here
        // e.g. $this->registerNewsPostType();
    }

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
