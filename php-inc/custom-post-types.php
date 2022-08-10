<?php

// Either create them these, or use CPT UI plugin

// function create_post_type()
// {

  // NEWS CPT
  // register_post_type(
  //   'news',
  //   array(
  //     'labels' => array(
  //       'name' => __('News'),
  //       'singular_name' => __('News Post')
  //     ),
  //     'hierarchical'       => true,
  //     'public'             => true,
  //     'menu_icon'          => 'dashicons-media-text',
  //     'has_archive'        => true,
  //     'supports'           => array( 'title', 'editor', 'thumbnail' ),
  //     'publicly_queryable' => true,
  //     'show_in_rest'       => true,
  //     'rest_base'             => 'news',
  //     'rest_controller_class' => 'WP_REST_Posts_Controller',
  // TODO: overwrite permalink to plural
  //   )
  // );

  // PRESS RELEASES CPT
  // register_post_type(
  //   'press-release',
  //   array(
  //     'labels' => array(
  //       'name' => __('Press Releases'),
  //       'singular_name' => __('Press Releases Post')
  //     ),
  //     'hierarchical'       => true,
  //     'public'             => true,
  //     'menu_icon'          => 'dashicons-media-text',
  //     'has_archive'        => true,
  //     'supports'           => array( 'title', 'editor', 'thumbnail' ),
  //     'publicly_queryable' => true,
  //     'show_in_rest'       => true,
  //     'rest_base'             => 'press-release',
  //     'rest_controller_class' => 'WP_REST_Posts_Controller',
  //   )
  // );
// add_action('init', 'create_post_type');