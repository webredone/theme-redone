<?php

// ADMIN-END ENQUEUES
function tr_admin_enqueue() {
		wp_register_style( 'tr-admin-css', get_template_directory_uri() . '/prod/global/admin-style.css', false, '1.0.0' );
		wp_enqueue_style( 'tr-admin-css' );
}
add_action( 'admin_enqueue_scripts', 'tr_admin_enqueue' );




// FRONT-END ENQUEUES
function tr_enqueue()
{
	// STYLES
	// Main css file
	wp_enqueue_style('tr-style', get_stylesheet_uri());

	//XXX: Theme css file is added in the header.latte file

	// SCRIPTS
	wp_enqueue_script('tr-js-main', get_template_directory_uri() . '/prod/global/app.min.js', array(), false, true);
}
add_action('wp_enqueue_scripts', 'tr_enqueue');
