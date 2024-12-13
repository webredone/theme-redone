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
