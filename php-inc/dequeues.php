<?php 
//remove stylesheets: Gutenberg, wp-pagenavi
function tr_dequeues() {
  wp_dequeue_style('wp-block-library' );
  wp_dequeue_style('wp-block-library-theme');
  wp_dequeue_style('wp-pagenavi');
}
add_action( 'wp_print_styles', 'tr_dequeues', 100 );


function tr_disable_emojis()
{
  remove_action('wp_head', 'print_emoji_detection_script', 7);
  remove_action('admin_print_scripts', 'print_emoji_detection_script');
  remove_action('wp_print_styles', 'print_emoji_styles');
  remove_action('admin_print_styles', 'print_emoji_styles');
  remove_filter('the_content_feed', 'wp_staticize_emoji');
  remove_filter('comment_text_rss', 'wp_staticize_emoji');
  remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
  add_filter('tiny_mce_plugins', 'tr_disable_emojis_tinymce');
  add_filter('wp_resource_hints', 'tr_disable_emojis_remove_dns_prefetch', 10, 2);
}
add_action('init', 'tr_disable_emojis');

/**
 * Filter function used to remove the tinymce emoji plugin.
 * 
 * @param array $plugins 
 * @return array Difference betwen the two arrays
 */
function tr_disable_emojis_tinymce($plugins)
{
  if (is_array($plugins)) {
    return array_diff($plugins, array('wpemoji'));
  } else {
    return array();
  }
}

/**
 * Remove emoji CDN hostname from DNS prefetching hints.
 *
 * @param array $urls URLs to print for resource hints.
 * @param string $relation_type The relation type the URLs are printed for.
 * @return array Difference betwen the two arrays.
 */
function tr_disable_emojis_remove_dns_prefetch($urls, $relation_type)
{
  if ('dns-prefetch' == $relation_type) {
    /** This filter is documented in wp-includes/formatting.php */
    $emoji_svg_url = apply_filters('emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/');

    $urls = array_diff($urls, array($emoji_svg_url));
  }

  return $urls;
}



// Disable embed script
function tr_deregister_embed_and_bodhi()
{
  wp_deregister_script('wp-embed');
  // XXX remove svg inline's plugin script as it pulls whole jQuery with it 
  // code for the replacement is recreated in Vanilla JS class: TransformSvgImgsToSvgCode
  wp_deregister_script('bodhi_svg_inline');
}
add_action('wp_footer', 'tr_deregister_embed_and_bodhi');



add_filter('wp_default_scripts', 'tr_remove_scripts');
function tr_remove_scripts(&$scripts)
{
  if (!is_admin()) {
    $scripts->remove('jquery');
    $scripts->remove('wp-embed');
  }
}

// remove recent comments inline styles
add_filter('show_recent_comments_widget_style', function () {
  return false;
});
