import register_block from './register_block'
import setupBlockPreviewImage from './core/setupBlockPreviewImage'

import blocks_array from './core/blocks_array'

const BLOCK_NAME_PREFIX = require('../theme_redone_global_config.json')
  .BLOCK_NAME_PREFIX

// START:REMOVE REDUNDANT OPTIONS FROM RICHTEXT TOOLBAR AND ADD UNDERLINE
;(function(wp) {
  var TextUnderlineButton = function(props) {
    return wp.element.createElement(wp.blockEditor.RichTextToolbarButton, {
      icon: 'admin-customizer',
      title: 'Text Underline',
      onClick: function() {
        props.onChange(
          wp.richText.toggleFormat(props.value, {
            type: `${BLOCK_NAME_PREFIX}/text-underline`
          })
        )
      }
    })
  }

  // wp.richText.unregisterFormatType('core/code')
  // wp.richText.unregisterFormatType('core/strikethrough')
  // wp.richText.unregisterFormatType("core/text-color");
  // wp.richText.unregisterFormatType('core/keyboard')
  wp.richText.registerFormatType(`${BLOCK_NAME_PREFIX}/text-underline`, {
    title: 'Text Underline',
    tagName: 'u',
    className: 'txt-underline',
    edit: TextUnderlineButton
  })
})(window.wp)
// END:REMOVE REDUNDANT OPTIONS FROM RICHTEXT TOOLBAR AND ADD UNDERLINE
setupBlockPreviewImage()
// Register custom blocks
blocks_array.forEach(block_folder_name => {
  register_block({ block_folder_name })
})
