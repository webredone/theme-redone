<?php

if( function_exists('acf_add_options_page') )
{
	acf_add_options_page(
    array(
      'page_title'  => 'Theme General Settings',
      'menu_title'  => 'Theme Settings',
      'menu_slug'   => 'theme-general-settings',
      'capability'  => 'edit_posts',
      'redirect'    => false
    )
  );


	acf_add_options_sub_page(array(
    'page_title'    => '404 Template Settings',
    'menu_title'    => '404 Template Settings',
    'parent_slug'   => 'theme-general-settings',
	));


  acf_add_options_sub_page(array(
    'page_title'    => 'Footer Settings',
    'menu_title'    => 'Footer Settings',
    'parent_slug'   => 'theme-general-settings',
  ));
}