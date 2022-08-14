<?php
/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */

function tr_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'tr_pingback_header' );


// Used for page controllers. For example in 404.php, it would be:
// $latte->render(tr_view_path('templates/404'));
function tr_view_path($template_name) {
	return get_template_directory() . "/views/$template_name.latte";
}


// Shorthand fn for getting parts/partials from /views/parts
// Example: Write {tr_view_path('hero')}
// instead of: {include tr_view_path('parts/hero')}
function tr_part($part_name) {
	return get_template_directory() . "/views/parts/$part_name.latte";
}  


// WRAPPER FN FOR TR_GET_MEDIA THAT ONLY PRINTS THE PATH STRING 
// INSTEAD OF PRINTING THE ELEMENT
function tr_get_media_path($media) {
	tr_get_media($media, false, false, true);
}

// MAIN FUNCTION THAT DEALS WITH IMAGES AND SVGs from theme assets or wp-media.
function tr_get_media(
	$media,
	$async = false,
	$dont_print = false,
	$get_path_only = false
) {

	if ($media === NULL) {
		return false;
	}


	$media_src = false;
	$media_id = false;

	$value_type = gettype($media);

	if ($value_type === 'string') {
		$media_src = $media;
	} else {
		if (array_key_exists('src', $media) || array_key_exists('url', $media)) {
			if (array_key_exists('src', $media)) {
				$media_src = $media['src'];
			} else {
				$media_src = $media['url'];
			}
			if (
				array_key_exists('size', $media) &&
				array_key_exists($media['size'], $media['sizes'])
			) {
				$media_src = $media['sizes'][$media['size']];
			}
		}

		if (array_key_exists('id', $media)) {
			$media_id = $media['id'];
		}
	}


	// checks if image is from uploads or from theme assets
	$from_uploads = strpos($media_src, "/wp-content/uploads/")
	? true
	: false;


	if (tr_str_ends_with($media_src, '.svg')) {
		if ($dont_print) {
			return tr_get_svg($media_src, $from_uploads, $async);
		} else {
			echo tr_get_svg($media_src, $from_uploads, $async, $get_path_only);
		}
	} else {

		// gets the correct image path based on whether it's uploaded or from theme assets, or external
		$img_path = $media_src;

		if ($from_uploads) {
			$img_path = $media_src;
			// Not from uploads not assets/img
		} else if (strpos($media_src, 'http://') !== false || strpos($media_src, 'https://') !== false) {
			$img_path = $media_src;
		} else {
			// From assets
			$img_path = tr_get_img_path($media_src);
		}

		$image_size_obj = wp_getimagesize($img_path);
		$image_size = [
			'w' => $image_size_obj[0],
			'h' => $image_size_obj[1],
		];
		


		$alt_txt = false;
		$class = false;


		if ($from_uploads) {
			$alt_txt = get_post_meta($media_id , '_wp_attachment_image_alt', true);
		}

		if ("array" === $value_type) {
			(array_key_exists('alt', $media)) && $alt_txt = $media['alt'];
			(array_key_exists('class', $media)) && $class = $media['class'];
		}


		// dynamic function name
		$get_img_func = $async
			? 'tr_get_img_async'
			: 'tr_get_img_sync';



		if ($dont_print) {
			// "don't" print is not really useful, and may only come in handy for debugging
			return $get_img_func($img_path, $alt_txt, $class, $get_path_only, $image_size);
		} else {
			echo $get_img_func($img_path, $alt_txt, $class, $get_path_only, $image_size);
		}

	}
}




// Import SVG code from theme assets or media. (Previously used on its own, now it gets called from tr_get_media fn)
function tr_get_svg(
	$file_name_or_uploads_path, 
	$from_media = false, 
	$async = false, 
	$get_path_only = false
) {
	$html = '';

	$correct_svg_file_path = $from_media
		? $file_name_or_uploads_path
		: get_template_directory_uri() . '/assets/svg/' . $file_name_or_uploads_path;

	// Only print the svg path and don't output its code
	if ($get_path_only) {
		return $correct_svg_file_path;
	}

	if ($async) {
		$html  = '<img class="js-async-svg" src="';
		$html .= tr_get_img_path('lazy-loading-transparent.png');
		$html .= '" data-src="'. $correct_svg_file_path .'" alt="will be replaced with SVG code" />';
	} else {
		$html = file_get_contents($correct_svg_file_path);
	}

	echo $html;
}

// Get img from assets (Previously used on its own, now it gets called from tr_get_media fn)
function tr_get_img_path($img_path) {
	$img_full_path = get_template_directory_uri() . "/assets/img/$img_path";
	return $img_full_path;
}


// (Previously used on its own, now it gets called from tr_get_media fn)
function tr_get_img_sync(
	$img_path, 
	$img_alt = "", 
	$img_class = "", 
	$get_path_only = false,
	$image_size
) {

	// Only print the media path and don't add the img element
	if ($get_path_only) {
		return $img_path;
	}

	$img_html = '<div class="tr-img-wrap-outer"';
	$img_html .=   ' style="--size-w-original:' . $image_size['w'] . ';--size-h-original: ' . $image_size['h'] . ';"';
	$img_html .= '>';
	$img_html .= '<div';
	$img_html .= ' class="tr-img-wrap"';
	$img_html .= '>';
	$img_html  .=  '<img';
	if ($img_class) {
		$img_html .=   ' class="'. $img_class .'"';
	}
  $img_html .=   	 ' src="' . $img_path . '"';
	if ($img_alt) {
		$img_html .=   ' alt="'. $img_alt .'"';
	}
  $img_html .=  ' />';
  $img_html .= '</div>';
  $img_html .= '</div>';

	return $img_html;
}

function tr_get_img_async(
	$img_path, 
	$img_alt = "", 
	$img_class = "",
	$get_path_only = false,
	$image_size
) {
	$img_html = '<div class="tr-img-wrap-outer jsLoading"';
	$img_html .=   ' style="--size-w-original:' . $image_size['w'] . ';--size-h-original: ' . $image_size['h'] . ';"';
	$img_html .= '>';
	$img_html .= '<div';
	$img_html .= ' class="tr-img-wrap"';
	$img_html .= '>';
	$img_html .=  '<img';
  $img_html .=   ' class="js-img-lazy '. $img_class .'"';
  $img_html .=   ' src="' . tr_get_img_path('lazy-loading-transparent.png') . '"';
  $img_html .=   ' data-img-src="'. $img_path .'"';
	if ($img_alt) {
		$img_html .= ' alt="'. $img_alt .'"';
	}
  $img_html .=  ' />';
	$img_html .= '</div>';
	$img_html .= '</div>';

	return $img_html;
}


// Speeds up buttons or other links html creation

function tr_a(
	$a, 
	$class = "", 
	$attrs_only = false
) {
	if (!$a['url']) return;

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
			<?php } ?>
		>
			<?php echo $a['title']; ?>
		</a>
	<?php
	}
}




/**
 * SHARE LINKS TO SOCIAL MEDIA
 */
//  Usage: <a href="{tr_social_share('twitter')}"></a>
function tr_social_share( $soc_name ) {
	$share_options = [
		'facebook'  => 'https://www.facebook.com/sharer/sharer.php?u=' . get_the_permalink(),
		'twitter'   => 'https://twitter.com/intent/tweet?text='. get_the_title() .'&url='. get_the_permalink(),
		'linkedin'  => 'https://www.linkedin.com/cws/share?url=' . get_the_permalink(),
		'pinterest' => 'http://pinterest.com/pin/create/link/?url=' . get_the_permalink(),
		'email'     => 'mailto:?subject=I wanted you to see this: ' . get_the_title() . '&amp;body=' . get_the_permalink()
	];

	echo $share_options[$soc_name];
}


/**
 * Prints HTML with meta information for the current post-date/time.
 */
function tr_posted_on($post_id = null, $with_last_updated = false) {
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
		esc_html_x( '%s', 'post date', 'tr' ),
		'<span class="posted-on" rel="bookmark">' . $time_string . '</span>'
	);

	$posted_on_html  = '<span class="entry-date-wrap">';
	$posted_on_html .=   $posted_on;
	if ($with_last_updated) {
		$posted_on_html .= $post_id === null ? tr_last_updated_on() : tr_last_updated_on($post_id);
	}
	$posted_on_html .= '</span>';

	echo $posted_on_html;
}


/*
 * Displays last updated date for a post.
 */
function tr_last_updated_on($post_id = null) {
	$u_time = get_the_time('U'); 
	$date_format = get_option('date_format');
	$u_modified_time = get_the_modified_time('U'); 

	$modified_date = $post_id === null 
		? get_the_modified_time($date_format)
		: get_the_modified_time($date_format, $post_id);

	if ($u_modified_time >= $u_time + 86400) { 
		$updated_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( '%s', 'updated date', 'tr' ),
			'<span class="last-updated-on"> (Last Updated: ' . $modified_date . ') </span>&nbsp;'
		);
		return $updated_on;			
	}
}



/**
 * Prints HTML with meta information for the current author.
 */
function tr_posted_by($author_id = false) {
	$byline  = '<i>By:</i> ';
	$byline .= '<a ';
	if ($author_id === false) {
		$byline .=   'href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '"';
	} else {
		$byline .=   'href="' . esc_url(get_author_posts_url($author_id)) . '"';
	}
	$byline .=  '>';
	$f_name = get_the_author_meta( 'first_name', $author_id );
	$l_name = get_the_author_meta( 'last_name', $author_id );
	$print_name = $f_name . ' ' . $l_name;
	if (!strlen($f_name)) {
		$print_name = get_the_author_meta( 'display_name', $author_id );
	}
	$byline .=    $print_name;
	$byline .= '</a>';
	echo '<span class="byline"> ' . $byline . '</span>';
}


if ( ! function_exists( 'tr_get_excerpt' ) ) :
	function tr_get_excerpt($limit, $source = null, $post_id = false){
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

    $excerpt = preg_replace(" (\[.*?\])",'',$excerpt);
    $excerpt = strip_shortcodes($excerpt);
    $excerpt = strip_tags($excerpt);
    $excerpt = substr($excerpt, 0, $limit);
    $excerpt = trim(preg_replace( '/\s+/', ' ', $excerpt));
    if (strlen($excerpt) > $limit) {
			$excerpt = $excerpt.'...';
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
function tr_get_nav_menu_items_by_location($location, $args = []) {
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
// var_dump wrapper
function tr_log($toPrint, $isSmall = false, $left = false) {
	echo '<pre style="position: fixed; line-height: 1.4 !important; bottom: 0; left: 0; font-family: monospace; width: 100vw; height: 70vh;' . ($isSmall ? "max-height: 300px;" : "") . 'overflow-y: scroll; ' . ($left ? "width: 23vw; height: calc(100vh - 32px); max-height: calc(100vh - 32px);" : "") . 'background: #222; color: #cecece; padding: 30px; z-index: 9999; border: 5px solid crimson; font-size: 14px !important;">';
		var_dump($toPrint); 
	echo '</pre>';
}


// To be used in loops for example
function tr_log_i($toPrint, $long = false) {
	$has_max_height = !$long ? ' max-height: 1500px !important; ' : ' max-height: 730px; ';
	echo '<pre style="line-height: 1.4 !important; ' . $has_max_height  . 'overflow-y: auto !important; font-family: monospace; overflow-y: scroll; background: #222; color: #cecece; padding: 8px; border: 2px solid crimson; font-size: 12px !important;">';
		var_dump($toPrint); 
	echo '</pre>';
}


// detect if IE 
function tr_is_ie() {
	if (preg_match('~MSIE|Internet Explorer~i', $_SERVER['HTTP_USER_AGENT']) || (strpos($_SERVER['HTTP_USER_AGENT'], 'Trident/7.0; rv:11.0') !== false)) {
		return true;
	}
}


function tr_hex_to_rgb($hex) {
	list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
	$rgb = "$r, $g, $b";
	echo $rgb;
}


function tr_str_ends_with( $haystack, $needle ) {
	$length = strlen( $needle );
	if( !$length ) {
		return false;
	}
	return substr( $haystack, -$length ) === $needle;
}


// Can be used with dynamically created modal to add the correct HTML for either YT, Vimeo or self hosted videos
function tr_get_video_type_and_id($url) {
	$yt_rx = '/^((?:https?:)?\/\/)?((?:www|m)\.)?((?:youtube\.com|youtu.be))(\/(?:[\w\-]+\?v=|embed\/|v\/)?)([\w\-]+)(\S+)?$/';
	$has_match_youtube = preg_match($yt_rx, $url, $yt_matches);

	$vm_rx = '/(https?:\/\/)?(www\.)?(player\.)?vimeo\.com\/([a-z]*\/)*([‌​0-9]{6,11})[?]?.*/';
	$has_match_vimeo = preg_match($vm_rx, $url, $vm_matches);

	//Then we want the video id which is:
	if($has_match_youtube) {
		$video_id = $yt_matches[5]; 
		$type = 'youtube';
	}
	elseif($has_match_vimeo) {
		$video_id = $vm_matches[5];
		$type = 'vimeo';
	}
	else {
		$video_id = 0;
		$type = 'none';
	}

	$data['video_id'] = $video_id;
	$data['video_type'] = $type;

	return $data;
}


// Can be used with either menus or acf fields to add the correct svg icon
function tr_get_soc_name($soc_media_link) {
	$soc_medias = [
		"//facebook", 
		"//twitter", 
		"//instagram", 
		"//youtube", 
		"//linkedin", 
		"//pinterest"
	];
	$soc_media_name = false;

	foreach ($soc_medias as $sm_name) {
		if (strpos($soc_media_link, $sm_name)) {
			$soc_media_name = substr($sm_name, 2);
		}
	}

	return $soc_media_name;
}


// Modal 'slot" 
function tr_modal_start($id, $title = false, $class = '') {
  $modal_start = "<div class='modal--custom $class' id='$id'>";
	$modal_start .=  "<div class='modal--custom__backdrop modal-close'></div>";
  $modal_start .=    "<div class='modal--custom__content'>";        
              
  if ($title) {
    $modal_start .=    "<h2 class='modal--custom__title'>$title</h2>";
  }
  $modal_start .=      "<i class='modal-close modal--custom-close-x'>";
  $modal_start .=        "<svg width='36' viewBox='0 0 149.337 149.337'>";
  $modal_start .=          "<polygon ";
  $modal_start .=            "style='fill:#979797;' ";
  $modal_start .=            "points='149.337,143.96 80.044,74.668 149.336,5.376 143.96,0 74.668,69.292 5.377,0 0.001,5.376 69.292,74.668 0,143.96 5.376,149.336 74.668,80.044 143.961,149.336' ";
  $modal_start .=          "/>";
  $modal_start .=        "</svg>";
  $modal_start .=      "</i>";
  $modal_start .=      "<div class='modal--custom__content--wrap'>";

  echo $modal_start;
}
function tr_modal_end() {
  echo '</div></div></div>';
}


