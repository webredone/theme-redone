<?php

$block_name = basename(__DIR__);
// $block_prefix is defined inside init.php

register_block_type(TR_BLOCK_NAME_PREFIX . '/' . $block_name, [
  'render_callback' => function ($attrs, $content) {
      global $tr_renderer;
      // START:Add or modify $attrs[] params here
      // ...
      // END:Add or modify $attrs[] params here
      $html_str = $tr_renderer->renderToString(dirname(__FILE__) . '/view.latte', $attrs);

      return $html_str;
  },
  'attributes' => json_decode(file_get_contents(dirname(__FILE__) . "/model.json"), true)['attributes'],
]);
