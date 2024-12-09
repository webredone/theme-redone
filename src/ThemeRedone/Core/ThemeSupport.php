<?php

// src/ThemeRedone/Core/ThemeSupport.php

declare(strict_types=1);

namespace ThemeRedone\Core;

final readonly class ThemeSupport
{
    public function initialize(): void
    {
        add_action('after_setup_theme', [$this, 'setupTheme']);
        add_filter('the_content', [$this, 'filterPtagsOnImages']);
        add_filter('tiny_mce_before_init', [$this, 'removeH1FromEditor']);
        add_filter('mce_buttons', [$this, 'removeReadMore']);

        add_action('wp_head', [$this, 'addPingbackHeader']);
    }

    public function setupTheme(): void
    {
        load_theme_textdomain('tr', get_template_directory() . '/languages');

        add_theme_support('automatic-feed-links');
        add_theme_support('title-tag');
        add_theme_support('post-thumbnails');
        add_theme_support('customize-selective-refresh-widgets');

        add_theme_support('html5', [
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ]);

        add_theme_support('custom-logo', [
            'height' => 250,
            'width' => 250,
            'flex-width' => true,
            'flex-height' => true,
        ]);

        register_nav_menus([
            'menu-1' => esc_html__('Primary', 'tr'),
            'menu-footer' => esc_html__('Footer Menu', 'tr'),
        ]);

        add_image_size('card-thumb', 600, 9999, false);
    }

    public function filterPtagsOnImages(string $content): string
    {
        return preg_replace('/<p>(\s*)(<img .* \/>)(\s*)<\/p>/iU', '\2', $content);
    }

    public function removeH1FromEditor(array $settings): array
    {
        $settings['block_formats'] = 'Paragraph=p;Heading 2=h2;Heading 3=h3;Heading 4=h4;Heading 5=h5;Heading 6=h6;Preformatted=pre;';

        return $settings;
    }

    public function removeReadMore(array $buttons): array
    {
        return array_diff($buttons, ['wp_more']);
    }

    public function addPingbackHeader(): void
    {
        if (is_singular() && pings_open()) {
            printf(
                '<link rel="pingback" href="%s">',
                esc_url(get_bloginfo('pingback_url'))
            );
        }
    }
}
