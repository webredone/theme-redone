<?php

// functions.php

/**
 * Theme Redone
 * //XXX: This file is the entry point of the theme.
 * It should be used to include all the necessary files
 * and initialize the theme.
 * Should you want to add more logic, use classes and methods
 * This file should be kept as clean as possible.
 *
 * @package ThemeRedone
 */

require_once __DIR__ . '/src/ThemeRedone/constants.php';

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/src/ThemeRedone/bootstrap.php';

ThemeRedone\Bootstrap::init();

// $tr_logger->info('Theme initialized');

// error_log('This is a test error log');
// trigger_error('This is a test error log', E_USER_NOTICE);
// errors will be intercepted and logged wp-content/theme_redone_logs/theme.log
// as well as the default PHP error log
