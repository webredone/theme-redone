<?php
 
add_filter('acf/settings/save_json', 'tr_acf_json_save_point');
 
function tr_acf_json_save_point( $path ) {
    // update path
    $path = get_stylesheet_directory() . '/acf-data';
    // return
    return $path;
}


add_filter('acf/settings/load_json', 'tr_acf_json_load_point');

function tr_acf_json_load_point( $paths ) {
    // remove original path (optional)
    unset($paths[0]);
    // append path
    $paths[] = get_stylesheet_directory() . '/acf-data';
    // return
    return $paths;
}
