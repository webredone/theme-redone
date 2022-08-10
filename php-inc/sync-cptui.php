<?php

// CPT UI post types and taxonomies sync
// https://github.com/jonathanjanssens/custom-post-type-ui-sync
if(!function_exists('cptui_init')) {
  require get_template_directory() . '/cptui/post_types.php';
  require get_template_directory() . '/cptui/taxonomies.php';
}