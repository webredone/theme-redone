<?php
$block_name = basename(__DIR__);
// $block_prefix is defined inside init.php

register_block_type("$block_prefix/$block_name", array(
  'render_callback' => function($attrs, $content) {
    global $latte;
    $attrs['classMod'] = tr_block_padd_bg_class(
      $attrs['inspector_section_padding'],
      $attrs['inspector_section_padding_top'],
      $attrs['inspector_section_padding_btm'],
      $attrs['inspector_bg_is_dark']
    );
    $html_str = $latte->renderToString(dirname( __FILE__ ) . '/view.latte', $attrs);
    return $html_str;
  },
  'attributes' => json_decode(file_get_contents(dirname( __FILE__ ) . "/model.json"), true)['attributes']
));
