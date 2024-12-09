<?php

define('TR_THEME_DIR', get_template_directory());
define('TR_GUTENBERG_DIR', TR_THEME_DIR . '/gutenberg');
define('TR_BLOCKS_DIR', TR_GUTENBERG_DIR . '/blocks');

$block_prefix = json_decode(file_get_contents(get_template_directory() . "/theme_redone_global_config.json"))->BLOCK_NAME_PREFIX;
define('TR_BLOCK_NAME_PREFIX', $block_prefix);
