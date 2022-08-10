<?php
$block_name = basename(__DIR__);
// $block_prefix is defined inside init.php

register_block_type("$block_prefix/$block_name", array(
  'render_callback' => function($attrs, $content) {
    global $latte;
    $html_str = $latte->renderToString(dirname( __FILE__ ) . '/view.latte', $attrs);
    return $html_str;
  },
  'attributes' => json_decode(file_get_contents(dirname( __FILE__ ) . "/model.json"), true)['attributes']
));
