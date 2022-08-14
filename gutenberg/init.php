<?php




// REGISTER THE DYNAMIC BLOCKS ------------------------------
$block_prefix = json_decode(file_get_contents(get_template_directory() . "/theme_redone_global_config.json"), true)['BLOCK_NAME_PREFIX'];
$all_blocks_dir_names = array_diff(scandir(TR_BLOCKS_DIR), ['..', '.', 'new-block-setup']);
foreach ($all_blocks_dir_names as $key => $block_dir_name) {
	$block_model = json_decode(file_get_contents(TR_BLOCKS_DIR . "/$block_dir_name/model.json"), true);
	$block_meta = $block_model['block_meta'];
	if (
		!array_key_exists("isJsRendered", $block_meta) || 
		(array_key_exists("isJsRendered", $block_meta) && $block_meta['isJsRendered'] === false)
	) {
		require_once TR_BLOCKS_DIR . "/$block_dir_name/controller.php";
	}
}
// END:REGISTER THE DYNAMIC BLOCKS --------------------------

	


function tr_blocks_assets() { // phpcs:ignore
	// Register block editor script for backend.
	wp_register_script(
		'tr_blocks-js', // Handle.
		// get_template_directory_uri() . '/gutenberg/prod/blocks.build.js', // Block.build.js: We register the block here. Built with Webpack.
		get_template_directory_uri() . '/prod/global/blocks.min.js', // Block.build.js: We register the block here. Built with Webpack.
		array( 'wp-blocks', 'wp-i18n', 'wp-element', 'wp-editor' ), // Dependencies, defined above.
		null, // filemtime( plugin_dir_path( __DIR__ ) . 'prod/blocks.build.js' ), // Version: filemtime — Gets file modification time.
		true // Enqueue the script in the footer.
	);

	// Register block editor styles for backend.
	wp_register_style(
		'tr_blocks-editor-css', // Handle
		get_template_directory_uri() . '/prod/global/blocks-backend.css', // Block editor CSS.,
		array( 'wp-edit-blocks' ), // Dependency to include the CSS after it.
		null // filemtime( plugin_dir_path( __DIR__ ) . 'prod/blocks-admin.css' ) // Version: File modification time.
	);


	// WP Localized globals. Use dynamic PHP stuff in JavaScript via `trBlocksGlobal` object.
	wp_localize_script(
		'tr_blocks-js',
		'trBlocksGlobal', // Array containing dynamic data for a JS Global.
		[
			'themeDirPath' => get_stylesheet_directory_uri() . '/gutenberg/',
			'themeDirUrl'  => get_stylesheet_directory_uri() . '/gutenberg/',
		]
	);

	register_block_type(
		'tr/gutenberg-blocks', array(
			// Enqueue blocks.build.js in the editor only.
			'editor_script' => 'tr_blocks-js',
			// Enqueue blocks-admin.css in the editor only.
			'editor_style'  => 'tr_blocks-editor-css',
		)
	);
}

// Hook: Block assets.
add_action( 'enqueue_block_editor_assets', 'tr_blocks_assets' );