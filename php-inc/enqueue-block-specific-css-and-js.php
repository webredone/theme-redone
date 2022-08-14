<?php


function tr_enqueue_block_specific_css_and_js() {
  if (!is_single() && !is_page()) return;

  global $post;

  if (empty($post->post_content)) return;

  
  if (has_blocks($post->post_content)) {
    $block_prefix = json_decode(file_get_contents(get_template_directory() . "/theme_redone_global_config.json"), true)['BLOCK_NAME_PREFIX'];
    
    $blocks = parse_blocks($post->post_content);

    if (empty($blocks)) return;

    $tr_custom_blocks_names = [];

    //START:populate tr_custom_blocks_names arr without duplicates
    // if there are repeated blocks, add only once 
    // so we don't enqueue duplicate CSS and JS

    function tr_parse_blocks($blocks, $block_prefix, &$tr_custom_blocks_names) {

      foreach ($blocks as $block) {
        if (str_starts_with($block['blockName'], "$block_prefix/")) {
          
          if (!in_array($block['blockName'], $tr_custom_blocks_names)) {
            $tr_custom_blocks_names[] = $block['blockName'];

            // if nested blocks, parse them as well
            if (!empty($block['innerBlocks'])) {
              tr_parse_blocks($block['innerBlocks'], $block_prefix, $tr_custom_blocks_names);
            }
          }
        }
      }
    }
    tr_parse_blocks($blocks, $block_prefix, $tr_custom_blocks_names);
    //END:populate tr_custom_blocks_names arr without duplicates

    
    if (empty($tr_custom_blocks_names)) return;
    // If page/post contains custom blocks

    
    $blocks_shared_css = [];
    $blocks_shared_js = [];

    function tr_contains_valid_file($file_path) {
      return (file_exists($file_path) && filesize($file_path));
    }




    function tr_should_consider_dep($deps_name, $deps_arr) {
      return (
        array_key_exists($deps_name, $deps_arr) 
        && 
        is_array($deps_arr[$deps_name]) 
        && 
        !empty($deps_arr[$deps_name])
      );
    }

    foreach ($tr_custom_blocks_names as $custom_block_name) {
      $block_name_without_prefix = substr(
        $custom_block_name, 
        strlen($block_prefix) + 1
      );


      // Check if block has deps (CSS/JS) defined in model.json
      $block_model = json_decode(file_get_contents(TR_BLOCKS_DIR . "/$block_name_without_prefix/model.json"), true);
      $block_meta = $block_model['block_meta'];
      // START:block_meta contains deps property
      if (array_key_exists("deps", $block_meta)) {
        $deps = $block_meta['deps'];
        
        //START:populate $blocks_shared_css array
        if (tr_should_consider_dep('css', $deps)) {
          foreach ($deps['css'] as $single_dep_css) {
            if (!in_array($single_dep_css, $blocks_shared_css)) {
              $blocks_shared_css[] = $single_dep_css;
            }
          }
        }
        //END:populate $blocks_shared_css array

        //START:populate $blocks_shared_js array
        if (tr_should_consider_dep('js', $deps)) {
          foreach ($deps['js'] as $single_js_css) {
            if (!in_array($single_js_css, $blocks_shared_js)) {
              $blocks_shared_js[] = $single_js_css;
            }
          }
        }
        //END:populate $blocks_shared_js array
        
      }
      // END:block_meta contains deps property

    }
    //end:foreach custom block name



    $shared_css_and_js_system_dir_path = TR_THEME_DIR . "/prod/blocks-shared";
    $shared_css_and_js_theme_dir_path = get_stylesheet_directory_uri() . "/prod/blocks-shared";
    //start:enqueue each shared CSS file
    if (!empty($blocks_shared_css)) {
      foreach ($blocks_shared_css as $shared_css_filename) {
        // if directory contains specified shared CSS file and it is not empty
        $custom_block_shared_css_path = "$shared_css_and_js_system_dir_path/$shared_css_filename.min.css";
        if (tr_contains_valid_file($custom_block_shared_css_path)) {
          wp_enqueue_style(
            "tr-block-shared-css--$shared_css_filename", 
            "$shared_css_and_js_theme_dir_path/$shared_css_filename.min.css"
          );
        }
      }
    }
    //end:enqueue each shared CSS file

    //start:enqueue each shared JS file
    if (!empty($blocks_shared_js)) {
      foreach ($blocks_shared_js as $shared_js_filename) {
        // if directory contains specified shared JS file and it is not empty
        $custom_block_shared_js_path = "$shared_css_and_js_system_dir_path/$shared_js_filename.min.js";
        if (tr_contains_valid_file($custom_block_shared_js_path)) {
          wp_enqueue_script(
            "tr-block-shared-js--$shared_js_filename",
            "$shared_css_and_js_theme_dir_path/$shared_js_filename.min.js",
            array(), 
            false, 
            true
          );
        }
      }
    }
    //end:enqueue each shared JS file





    // START:CHECK FOR AND ENQUEUE BLOCK SPECIFIC CSS AND JS
    $block_css_filename = "frontend.min.css";
    $block_js_filename = "frontend.min.js";

    foreach ($tr_custom_blocks_names as $custom_block_name) {

      $block_name_without_prefix = substr(
        $custom_block_name, 
        strlen($block_prefix) + 1
      );


      $custom_block_dir_path = TR_THEME_DIR . "/prod/block-specific/$block_name_without_prefix";
      $gutenberg_blocks_dir_path = get_stylesheet_directory_uri() . "/prod/block-specific";

      // if directory contains frontend.css and it is not empty
      $custom_block_css_path = "$custom_block_dir_path/$block_css_filename";
      if (tr_contains_valid_file($custom_block_css_path)) {
        wp_enqueue_style(
          "tr-block-css--$block_prefix-$block_name_without_prefix", 
          "$gutenberg_blocks_dir_path/$block_name_without_prefix/$block_css_filename"
        );
      }
      //end:enqueue block specific CSS

      
      
      
      // if directory contains frontend.js and it is not empty
      $custom_block_js_path = "$custom_block_dir_path/$block_js_filename";
      if (tr_contains_valid_file($custom_block_js_path)) {
        wp_enqueue_script(
          "tr-block-js--$block_prefix-$block_name_without_prefix", 
          "$gutenberg_blocks_dir_path/$block_name_without_prefix/$block_js_filename",
          array(), 
          false, 
          true
        );
      }
      //end:enqueue block specific JS

    }
    // END:CHECK FOR AND ENQUEUE BLOCK SPECIFIC CSS AND JS

  }
  // END:if post has content

} // END:tr_enqueue_block_specific_css_and_js


add_action('wp_enqueue_scripts', 'tr_enqueue_block_specific_css_and_js');