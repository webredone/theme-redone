<?php

// src/ThemeRedone/Core/Dequeues.php

declare(strict_types=1);

namespace ThemeRedone\Core;

final readonly class Dequeues
{
    public function register(): void
    {
        // TODO: if pagenavi is installed, only then dequeue it
        add_action('wp_print_styles', [$this, 'dequeueStyles'], 100);
        add_action('init', [$this, 'disableEmojis']);
        // TODO: if bodhi is installed, only then deregister it
        add_action('wp_footer', [$this, 'deregisterEmbedAndBodhi']);
        add_filter('wp_default_scripts', [$this, 'removeScripts']);
        add_filter('show_recent_comments_widget_style', fn () => false);
    }

    public function dequeueStyles(): void
    {
        wp_dequeue_style('wp-pagenavi');
    }

    public function disableEmojis(): void
    {
        remove_action('wp_head', 'print_emoji_detection_script', 7);
        remove_action('admin_print_scripts', 'print_emoji_detection_script');
        remove_action('wp_print_styles', 'print_emoji_styles');
        remove_action('admin_print_styles', 'print_emoji_styles');
        remove_filter('the_content_feed', 'wp_staticize_emoji');
        remove_filter('comment_text_rss', 'wp_staticize_emoji');
        remove_filter('wp_mail', 'wp_staticize_emoji_for_email');

        add_filter('tiny_mce_plugins', [$this, 'disableEmojisTinymce']);
        add_filter('wp_resource_hints', [$this, 'disableEmojisDnsPrefetch'], 10, 2);
    }

    /**
     * Removes the wpemoji plugin from TinyMCE.
     *
     * @param array<string> $plugins List of TinyMCE plugins.
     *
     * @return array<string> Modified list of TinyMCE plugins.
     */
    public function disableEmojisTinymce(array $plugins): array
    {
        return array_diff($plugins, ['wpemoji']);
    }

    /**
     * Removes emoji-related DNS prefetch URLs.
     *
     * @param array<string> $urls List of URLs for resource hints.
     * @param string $relationType The type of relation (e.g., 'dns-prefetch').
     *
     * @return array<string> Modified list of URLs.
     */
    public function disableEmojisDnsPrefetch(array $urls, string $relationType): array
    {
        if ($relationType === 'dns-prefetch') {
            $emojiSvgUrl = apply_filters(
                'emoji_svg_url',
                'https://s.w.org/images/core/emoji/2/svg/'
            );

            return array_diff($urls, [$emojiSvgUrl]);
        }

        return $urls;
    }

    public function deregisterEmbedAndBodhi(): void
    {
        wp_deregister_script('bodhi_svg_inline');
    }

    /**
     * Removes the jQuery script from non-admin pages.
     *
     * @param \WP_Scripts $scripts WordPress scripts object.
     *
     * @return \WP_Scripts The modified WordPress scripts object.
     */
    public function removeScripts(\WP_Scripts &$scripts): \WP_Scripts
    {
        if (!is_admin()) {
            $scripts->remove('jquery');
        }

        return $scripts;
    }
}
