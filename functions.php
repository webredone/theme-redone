<?php

define('TR_THEME_DIR', get_template_directory());
define('TR_GUTENBERG_DIR', TR_THEME_DIR . '/gutenberg');
define('TR_BLOCKS_DIR', TR_GUTENBERG_DIR . '/blocks');

require get_template_directory() . '/php-inc/theme-support.php';
require get_template_directory() . '/php-inc/latte.php';

// Check if ACF or ACF Pro is installed and activated
if (class_exists('acf')) {
  require get_template_directory() . '/php-inc/sync-acf.php';
  require get_template_directory() . '/php-inc/acf-options-pages.php';
}

require get_template_directory() . '/php-inc/sync-cptui.php';

require get_template_directory() . '/php-inc/custom-post-types.php';
require get_template_directory() . '/php-inc/ThemeRedoneWalker.php';

// XXX: This file removes some common WP enqueues such as jQuery, emojis etc.
// We are disabling those to get better performance. But if you need to support those,
// just remove or comment the line 
require get_template_directory() . '/php-inc/dequeues.php';

require get_template_directory() . '/php-inc/enqueues.php';
require get_template_directory() . '/php-inc/remove-css-js-version.php';
require get_template_directory() . '/php-inc/theme-functions.php';
// require get_template_directory() . '/php-inc/sidebars.php';

// INIT THE BLOCKS FRAMEWORK
require get_template_directory() . '/php-inc/enqueue-block-specific-css-and-js.php';
require get_template_directory() . '/gutenberg/init.php';