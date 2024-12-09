<?php

// src/ThemeRedone/Core/Enqueues.php

namespace ThemeRedone\Core;

final readonly class Enqueues
{
    public function register(): void
    {
        add_action('wp_enqueue_scripts', [$this, 'enqueueScripts']);
        add_action('admin_enqueue_scripts', [$this, 'enqueueAdminScripts']);
        add_filter('script_loader_src', [$this, 'removeVersionQuery'], 15, 1);
        add_filter('style_loader_src', [$this, 'removeVersionQuery'], 15, 1);
    }

    public function enqueueScripts(): void
    {
        wp_enqueue_style('tr-style', get_stylesheet_uri());
        wp_enqueue_script(
            'tr-js-main',
            get_template_directory_uri() . '/dist/global/app.min.js',
            [],
            null,
            true
        );
    }

    public function enqueueAdminScripts(): void
    {
        wp_enqueue_style(
            'tr-admin-css',
            get_template_directory_uri() . '/dist/global_admin/admin-style.css'
        );
    }

    public function removeVersionQuery(string $src): string
    {
        return $src ? esc_url(remove_query_arg('ver', $src)) : '';
    }
}
