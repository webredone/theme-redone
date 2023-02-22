<?php


// INSERT CRITICAL CSS
function tr_insert_critical_css() {
	$global_critical_css_file = get_template_directory() . '/prod/global/critical.css';
	if (file_exists($global_critical_css_file)) {
		$custom_css    = file_get_contents($global_critical_css_file);
		$crit_css_tag  = '<style id="critical-css">';
		$crit_css_tag .=   apply_filters('tr_critical_css', $custom_css);
		$crit_css_tag .= '</style>';
		echo $crit_css_tag;
	}
}
add_action('wp_head', 'tr_insert_critical_css');


// ADMIN-END ENQUEUES
function tr_admin_enqueue() {
	wp_register_style( 
		'tr-admin-css', 
		get_template_directory_uri() . '/prod/global/admin-style.css', 
		false, 
		'1.0.0' 
	);
	wp_enqueue_style( 'tr-admin-css' );
}
add_action( 'admin_enqueue_scripts', 'tr_admin_enqueue' );




// FRONT-END ENQUEUES
function tr_enqueue()
{
	// STYLES

	//XXX: Theme css file is added in the header.latte file

	// SCRIPTS
	wp_enqueue_script(
		'tr-js-main', 
		get_template_directory_uri() . '/prod/global/app.min.js', 
		array(), 
		false, 
		true
	);
}
add_action('wp_enqueue_scripts', 'tr_enqueue');
