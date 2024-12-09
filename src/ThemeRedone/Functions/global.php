<?php

/********************************************
 * Theme Redone functions and definitions
 ********************************************/

/**
 * Add a pingback url auto-discovery header
 * for singularly identifiable articles.
 *
 * @return void
 */
function tr_pingback_header()
{
    if (is_singular() && pings_open()) {
        $pingback_url = get_bloginfo('pingback_url');
        $pingback_link = '<link rel="pingback" href="' . $pingback_url . '" />';
        echo $pingback_link;
    }
}
add_action('wp_head', 'tr_pingback_header', 10, 0);

/**
 * Used for page controllers.
 *
 * @example: For example in 404.php, it would be:
 * ```php
 * $tr_renderer->render(tr_view_path('templates/404'));
 * ```
 *
 * @param string $template_name Name of the latte template living inside the /views/ dir
 *
 * @return string Full path to the view file
 */
function tr_view_path($template_name)
{
    return get_template_directory() . "/views/$template_name.latte";
}

/**
 * Shorthand fn for getting parts/partials from /views/parts
 *
 * @example:
 * ```latte
 * Write
 * {tr_view_path('hero')}
 *
 * instead of:
 * {include tr_view_path('parts/hero')}
 * ```
 *
 * @param string $part_name Name of the latte partial living inside the /views/parts/ dir
 *
 * @return string Full path to the partial file
 */
function tr_part($part_name)
{
    return tr_view_path("parts/$part_name");
}

/**
 * @param string|array{title:string,src:string, id?:int, alt?:string} $media
 *
 * @return string Returns the full path to the media
 */
function tr_get_media_path($media)
{
    $full_path = tr_get_media($media, dont_print: true, path_only: true);

    return $full_path;
}

// TODO: COpy from dhblog2 -> add here and in plugin
// MAIN FUNCTION THAT DEALS WITH IMAGES AND SVGs from theme assets or wp-media.
/**
 * @param string|array{title:string,src?:string, id?:int, alt?:string, class?:string, url?:string, size?:string, sizes?:array} $media
 * @param bool $async render media async or sync
 * @param bool $dont_print print (render) result HTML, or just echo it for debugging purposes
 * @param bool $path_only if true, it doesn't render, but returns the media full path
 *
 * @return void|string|false Prints result HTML or returns it, or returns the full path to the media
 *
 * @see(https://webredone.com/theme-redone/theme-functions/tr_get_media/)
 */
function tr_get_media(
    $media,
    $async = false,
    $dont_print = false,
    $path_only = false
) {

    if ($media === null || (is_array($media) && empty($media['src']))) {
        return false;
    }

    $media_src = false;
    $media_id = false;

    if (gettype($media) === 'string') {
        $media_src = $media;
    } else {

        $media_src = $media['url'] ?? $media['src'];

        if (isset($media['sizes']) && isset($media['size']) && isset($media['sizes'][$media['size']])) {
            $media_src = $media['sizes'][$media['size']];
        }

        $media_id = $media['id'] ?? false;
    }

    // checks if image is from uploads or from theme assets
    $from_uploads = gettype($media_src) === 'string' && strpos($media_src, "/wp-content/uploads/") !== false
        ? true
        : false;

    if (gettype($media_src) === 'string' && tr_str_ends_with($media_src, '.svg')) {
        if ($dont_print) {
            return tr_get_svg($media_src, $from_uploads, $async, $path_only);
        } else {
            echo tr_get_svg($media_src, $from_uploads, $async, $path_only);
        }
    } else {

        // gets the correct image path based on whether it's uploaded or from theme assets, or external
        $img_path = $media_src;

        if ($from_uploads) {
            $img_path = $media_src;
            // Not from uploads not assets/img
        } elseif (strpos($media_src, 'http://') !== false || strpos($media_src, 'https://') !== false) {
            $img_path = $media_src;
        } else {
            // From assets
            $img_path = tr_get_img_path($media_src);
        }

        $image_size_obj = wp_getimagesize($img_path);
        $image_size = [
            'w' => $image_size_obj[0] ?? 0,
            'h' => $image_size_obj[1] ?? 0,
        ];

        $alt_txt = '';
        $class = '';

        if ($from_uploads && $media_id) {
            $alt_txt = get_post_meta($media_id, '_wp_attachment_image_alt', true) ?? '';
        }

        if ("array" === gettype($media)) {
            $alt_txt = $media['alt'] ?? $alt_txt;
            $class = $media['class'] ?? $class;
        }

        // dynamic function name
        $get_img_func = $async
            ? 'tr_get_img_async'
            : 'tr_get_img_sync';

        if ($dont_print) {
            // "don't" print is not really useful, and may only come in handy for debugging
            return $get_img_func($img_path, $image_size, $alt_txt, $class, $path_only);
        } else {
            echo $get_img_func($img_path, $image_size, $alt_txt, $class, $path_only);
        }
    }
}

// Import SVG code from theme assets or media. (Previously used on its own, now it gets called from tr_get_media fn)
function tr_get_svg(
    string $file_name_or_uploads_path,
    bool $from_media = false,
    bool $async = false,
    bool $path_only = false
): string {

    $correct_svg_file_path = $from_media
    ? $file_name_or_uploads_path
    : get_template_directory_uri() . '/assets/svg/' . $file_name_or_uploads_path;

    // Only print the svg path and don't output its code
    if ($path_only) {
        return $correct_svg_file_path;
    }

    $html = '';

    if ($async) {
        $html = '<img class="js-async-svg" src="';
        $html .= tr_get_img_path('lazy-loading-transparent.png');
        $html .= '" data-src="' . $correct_svg_file_path . '" alt="will be replaced with SVG code" />';
    } else {
        $html = file_get_contents($correct_svg_file_path);
    }

    return $html;
}

// Get img from assets (Previously used on its own, now it gets called from tr_get_media fn)
function tr_get_img_path(string $img_path): string
{
    return get_template_directory_uri() . "/assets/img/$img_path";

}

// (Previously used on its own, now it gets called from tr_get_media fn)
function tr_get_img_sync(
    string $img_path,
    $image_size,
    string $img_alt = "",
    string $img_class = "",
    bool $path_only = false
) {

    // Only print the media path and don't add the img element
    if ($path_only) {
        return $img_path;
    }

    $img_html = '<img';
    if ($img_class) {
        $img_html .= ' class="' . $img_class . '"';
    }
    $img_html .= ' src="' . $img_path . '"';
    if ($img_alt) {
        $img_html .= ' alt="' . $img_alt . '"';
    }
    $img_html .= ' />';

    return $img_html;
}

/**
 * @param array{w: int, h: int} $image_size
 */
function tr_get_img_async(
    string $img_path,
    array $image_size,
    string $img_alt = "",
    string $img_class = "",
    bool $path_only = false
): string {
    $img_html = '<div class="tr-img-wrap-outer jsLoading"';
    $img_html .= ' style="--size-w-original:' . $image_size['w'] . ';--size-h-original: ' . $image_size['h'] . ';"';
    $img_html .= '>';
    $img_html .= '<div';
    $img_html .= ' class="tr-img-wrap"';
    $img_html .= '>';
    $img_html .= '<img';
    $img_html .= ' class="js-img-lazy ' . $img_class . '"';
    $img_html .= ' src="' . tr_get_img_path('lazy-loading-transparent.png') . '"';
    $img_html .= ' data-img-src="' . $img_path . '"';
    if ($img_alt) {
        $img_html .= ' alt="' . $img_alt . '"';
    }
    $img_html .= ' />';
    $img_html .= '</div>';
    $img_html .= '</div>';

    return $img_html;
}

// Speeds up buttons or other links html creation

/**
 * @param array{title:string, url:string, target:bool} $a
 * @param string $class Optional class name
 * @param bool $attrs_only If true, will print only <a> attrs instead of the whole <a> element
 *
 * @return void
 *
 * @see(https://webredone.com/theme-redone/theme-functions/tr_a-link-helper/)
 */
function tr_a(
    $a,
    $class = "",
    $attrs_only = false
) {
    if (!$a['url']) {
        return;
    }

    $new_tab = array_key_exists('target', $a) && $a['target'];

    if ($attrs_only) {
        $attrs_html = "href='{$a['url']}'";
        if ($class) {
            $attrs_html .= " class='{$class}'";
        }
        if ($new_tab) {
            $attrs_html .= " target='_blank' rel='noopener noreferrer'";
        }
        echo $attrs_html;
    } else { ?>
        <a
            href="<?php echo $a['url']; ?>"
            <?php if ($class) { ?>
            class="<?php echo $class; ?>"
            <?php } ?>
            <?php if ($new_tab) { ?>
            target="_blank"
            rel="noopener noreferrer"
            <?php } ?>>
            <?php echo $a['title']; ?>
        </a>
<?php
    }
}

/**
 * SHARE LINKS TO SOCIAL MEDIA
 */
//  Usage: <a href="{tr_social_share('twitter')}"></a>

/**
 * @param string $soc_name
 *
 * @see(https://webredone.com/theme-redone/theme-functions/tr_social_share/)
 * 	<a href="{tr_social_share('twitter')}"></a>
 */
function tr_social_share($soc_name): void
{

    $current_post_permalink = get_the_permalink();

    if (gettype($current_post_permalink) !== 'string') {
        echo '';

        return;
    }

    $current_post_title = get_the_title();

    $soc_medial_link = match ($soc_name) {
        'facebook' => 'https://www.facebook.com/sharer/sharer.php?u=' . $current_post_permalink,
        'twitter' => 'https://twitter.com/intent/tweet?text=' . $current_post_title . '&url=' . $current_post_permalink,
        'linkedin' => 'https://www.linkedin.com/cws/share?url=' . $current_post_permalink,
        'pinterest' => 'http://pinterest.com/pin/create/link/?url=' . $current_post_permalink,
        'email' => 'mailto:?subject=I wanted you to see this: ' . $current_post_title . '&amp;body=' . $current_post_permalink,
        default => '',
    };

    echo $soc_medial_link;
}

/**
 * Prints HTML with meta information for the current post-date/time.
 */
function tr_posted_on($post_id = null, $with_last_updated = false)
{
    $time_string = '<time class="entry-date published" datetime="%1$s">%1$s</time>';
    $date_format = get_option('date_format');

    $published_at = $post_id === null
        ? get_the_date($date_format)
        : get_the_date($date_format, $post_id);

    $time_string = sprintf(
        $time_string,
        esc_html($published_at)
    );
    $posted_on = sprintf(
        /* translators: %s: post date. */
        esc_html_x('%s', 'post date', 'tr'),
        '<span class="posted-on" rel="bookmark">' . $time_string . '</span>'
    );

    $posted_on_html = '<span class="entry-date-wrap">';
    $posted_on_html .= $posted_on;
    if ($with_last_updated) {
        $posted_on_html .= $post_id === null ? tr_last_updated_on() : tr_last_updated_on($post_id);
    }
    $posted_on_html .= '</span>';

    echo $posted_on_html;
}

/*
 * Displays last updated date for a post.
 */
function tr_last_updated_on($post_id = null)
{
    $u_time = get_the_time('U');
    $date_format = get_option('date_format');
    $u_modified_time = get_the_modified_time('U');

    $modified_date = $post_id === null
        ? get_the_modified_time($date_format)
        : get_the_modified_time($date_format, $post_id);

    if ($u_modified_time >= $u_time + 86400) {
        $updated_on = sprintf(
            /* translators: %s: post date. */
            esc_html_x('%s', 'updated date', 'tr'),
            '<span class="last-updated-on"> (Last Updated: ' . $modified_date . ') </span>&nbsp;'
        );

        return $updated_on;
    }
}

/**
 * Prints HTML with meta information for the current author.
 */
function tr_posted_by($author_id = false)
{
    $byline = '<i>By:</i> ';
    $byline .= '<a ';
    if ($author_id === false) {
        $fetched_author_id = (int) get_the_author_meta('ID');
        $byline .= 'href="' . esc_url(get_author_posts_url($fetched_author_id)) . '"';
    } else {
        $byline .= 'href="' . esc_url(get_author_posts_url($author_id)) . '"';
    }
    $byline .= '>';
    $f_name = get_the_author_meta('first_name', $author_id);
    $l_name = get_the_author_meta('last_name', $author_id);
    $print_name = $f_name . ' ' . $l_name;
    if (!strlen($f_name)) {
        $print_name = get_the_author_meta('display_name', $author_id);
    }
    $byline .= $print_name;
    $byline .= '</a>';
    echo '<span class="byline"> ' . $byline . '</span>';
}

if (! function_exists('tr_get_excerpt')) :
    function tr_get_excerpt($limit, $source = null, $post_id = false)
    {
        $excerpt = '';
        if ($source) {
            $excerpt = $source;
        } else {
            if (!$post_id) {
                $excerpt = get_the_content();
            } else {
                if (has_excerpt($post_id)) {
                    $excerpt = get_the_excerpt($post_id);
                } else {
                    $excerpt = get_the_content(false, false, $post_id);
                }
            }
        }

        $excerpt = preg_replace(" (\[.*?\])", '', $excerpt);
        $excerpt = strip_shortcodes($excerpt);
        $excerpt = strip_tags($excerpt);
        $excerpt = substr($excerpt, 0, $limit);
        $excerpt = trim(preg_replace('/\s+/', ' ', $excerpt));
        if (strlen($excerpt) > $limit) {
            $excerpt = $excerpt . '...';
        }

        return $excerpt;
    }
endif;

/*
Sample...  Lorem ipsum habitant morbi (26 characters total)

Returns first three words which is exactly 21 characters including spaces
Example..  echo tr_get_excerpt(21);
Result...  Lorem ipsum habitant

Returns same as above, not enough characters in limit to return last word
Example..  echo tr_get_excerpt(24);
Result...  Lorem ipsum habitant

Returns all 26 chars of our content, 30 char limit given, only 26 characters needed.
Example..  echo tr_get_excerpt(30);
Result...  Lorem ipsum habitant morbi
*/

// Helper for custom looping over menu items
function tr_get_nav_menu_items_by_location($location, $args = [])
{
    // Get all locations
    $locations = get_nav_menu_locations();
    // Get object id by location
    $object = wp_get_nav_menu_object($locations[$location]);
    // Get menu items by menu name
    $menu_items = wp_get_nav_menu_items($object->name, $args);

    // Return menu post objects
    return $menu_items;
}

// HELPERS ---------------------------------------

function tr_hex_to_rgb(string $hex): void
{
    list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
    $rgb = "$r, $g, $b";
    echo $rgb;
}

function tr_str_ends_with(string $haystack, string $needle): bool
{
    $length = strlen($needle);
    if (!$length) {
        return false;
    }

    return substr($haystack, -$length) === $needle;
}

// Can be used with dynamically created modal to add the correct HTML for either YT, Vimeo or self hosted videos
/**
 * @return array{video_id: 0|string, video_type: 'none'|'vimeo'|'youtube'}
 */
function tr_get_video_type_and_id(string $url): array
{
    $yt_rx = '/^((?:https?:)?\/\/)?((?:www|m)\.)?((?:youtube\.com|youtu.be))(\/(?:[\w\-]+\?v=|embed\/|v\/)?)([\w\-]+)(\S+)?$/';
    $has_match_youtube = preg_match($yt_rx, $url, $yt_matches);

    $vm_rx = '/(https?:\/\/)?(www\.)?(player\.)?vimeo\.com\/([a-z]*\/)*([‌​0-9]{6,11})[?]?.*/';
    $has_match_vimeo = preg_match($vm_rx, $url, $vm_matches);

    $data = match (true) {
        !!$has_match_youtube => [
            'video_id' => $yt_matches[5],
            'video_type' => 'youtube',
        ],
        !!$has_match_vimeo => [
            'video_id' => $vm_matches[5],
            'video_type' => 'vimeo',
        ],
        default => [
            'video_id' => 0,
            'video_type' => 'none',
        ]
    };

    return $data;
}

// Can be used with either menus or acf fields to add the correct svg icon
function tr_get_soc_name(string $soc_media_link): string
{
    $soc_medias = [
        "//facebook",
        "//twitter",
        "//instagram",
        "//youtube",
        "//linkedin",
        "//pinterest",
    ];
    $soc_media_name = '';

    foreach ($soc_medias as $sm_name) {
        if (strpos($soc_media_link, $sm_name) !== false) {
            $soc_media_name = substr($sm_name, 2);
        }
    }

    return $soc_media_name;
}

// Modal 'slot"
function tr_modal_start(string $id, ?string $title = null, string $class = ''): void
{
    $modal_start = "<div class='modal--custom $class' id='$id'>";
    $modal_start .= "<div class='modal--custom__backdrop modal-close'></div>";
    $modal_start .= "<div class='modal--custom__content'>";

    if (isset($title)) {
        $modal_start .= "<h2 class='modal--custom__title'>$title</h2>";
    }
    $modal_start .= "<i class='modal-close modal--custom-close-x'>";
    $modal_start .= "<svg width='36' viewBox='0 0 149.337 149.337'>";
    $modal_start .= "<polygon ";
    $modal_start .= "style='fill:#979797;' ";
    $modal_start .= "points='149.337,143.96 80.044,74.668 149.336,5.376 143.96,0 74.668,69.292 5.377,0 0.001,5.376 69.292,74.668 0,143.96 5.376,149.336 74.668,80.044 143.961,149.336' ";
    $modal_start .= "/>";
    $modal_start .= "</svg>";
    $modal_start .= "</i>";
    $modal_start .= "<div class='modal--custom__content--wrap'>";

    echo $modal_start;
}
function tr_modal_end(): void
{
    echo '</div></div></div>';
}
