import {
  trBlockImagePreviewShow,
  trBlockImagePreviewHide
} from '../helpers/trBlockImagePreview'

const BLOCK_NAME_PREFIX = require('../../theme_redone_global_config.json')
  .BLOCK_NAME_PREFIX

const setupBlockPreviewImage = () => {
  // insert the image preview container div to app header
  // custom-link-in-toolbar.js
  // wrapped into IIFE - to leave global space clean.
  ;(function(window, wp) {
    // just to keep it cleaner - we refer to our link by id for speed of lookup on DOM.
    var link_id = 'tr__block-preview'
    // prepare our custom link's html.
    var tr_block_preview_html =
      '<img id="' + link_id + '" class="tr__block-preview" />'
    // check if gutenberg's editor root element is present.
    var editorEl = document.getElementById('editor')
    if (!editorEl) {
      // do nothing if there's no gutenberg root element on page.
      return
    }
    var unsubscribe = wp.data.subscribe(function() {
      setTimeout(function() {
        if (!document.getElementById(link_id)) {
          var toolbalEl = editorEl.querySelector(
            '.interface-interface-skeleton__body'
          )
          // var toolbalEl = editorEl.querySelector(".edit-post-header__toolbar");
          if (toolbalEl instanceof HTMLElement) {
            toolbalEl.insertAdjacentHTML('beforeend', tr_block_preview_html)
            // XXX: Adds preview images for blocks when in add mode
            const preview_image_el = document.getElementById(
              'tr__block-preview'
            )

            let previously_hovered_button = null
            editorEl.addEventListener('mouseover', e => {
              let hoverEl = e.target

              if (hoverEl.closest('.editor-block-list-item-paragraph')) {
                trBlockImagePreviewHide()
                previously_hovered_button = null
                return
              }

              if (
                hoverEl.closest('.block-editor-autocompleters__block') ||
                hoverEl.closest('.block-editor-block-types-list__item') ||
                hoverEl.closest('.block-editor-block-types-list__item')
              ) {
                if (hoverEl.id.includes(`${BLOCK_NAME_PREFIX}/`)) {
                  if (previously_hovered_button != hoverEl) {
                    const folder_name = hoverEl.id.split(
                      `${BLOCK_NAME_PREFIX}/`
                    )[1]

                    if (!folder_name) {
                      trBlockImagePreviewHide()
                      previously_hovered_button = null
                      return
                    }

                    const preview_img_full_path = `${trBlocksGlobal.themeDirPath}blocks/${folder_name}/example.jpg`
                    trBlockImagePreviewShow(preview_img_full_path)
                  }
                  previously_hovered_button = hoverEl
                }

                // console.log("hoverEl: ", hoverEl);

                if (
                  hoverEl.classList.contains(
                    `editor-block-list-item-${BLOCK_NAME_PREFIX}-`
                  ) ||
                  hoverEl.closest('.block-editor-block-types-list__item')
                ) {
                  if (previously_hovered_button != hoverEl) {
                    if (
                      hoverEl.classList.contains(
                        `editor-block-list-item-${BLOCK_NAME_PREFIX}-`
                      )
                    ) {
                      const folder_name = hoverEl.className.split(
                        `${BLOCK_NAME_PREFIX}-`
                      )[1]
                      if (!folder_name) {
                        trBlockImagePreviewHide()
                        previously_hovered_button = null
                        return
                      }

                      const preview_img_full_path = `${trBlocksGlobal.themeDirPath}blocks/${folder_name}/example.jpg`
                      trBlockImagePreviewShow(preview_img_full_path)
                      previously_hovered_button = hoverEl
                    }
                    if (
                      hoverEl.closest('.block-editor-block-types-list__item')
                    ) {
                      const folder_name = hoverEl
                        .closest('.block-editor-block-types-list__item')
                        .className.split(`${BLOCK_NAME_PREFIX}-`)[1]

                      if (!folder_name) {
                        trBlockImagePreviewHide()
                        previously_hovered_button = null
                        return
                      }

                      const preview_img_full_path = `${trBlocksGlobal.themeDirPath}blocks/${folder_name}/example.jpg`
                      trBlockImagePreviewShow(preview_img_full_path)
                      previously_hovered_button = hoverEl
                    }
                  }
                }
              } else {
                // check if its' active already
                if (
                  !e.target.closest('.block-editor-block-list__block') &&
                  preview_image_el.classList.contains('jsIsVisible')
                ) {
                  trBlockImagePreviewHide()
                  previously_hovered_button = null
                }
              }
            })
          }
        }
      }, 1)
    })
    // unsubscribe is a function - it's not used right now
    // but in case you'll need to stop this link from being reappeared at any point you can just call unsubscribe();
  })(window, wp)
  // end:insert the image preview container div to app header
}

export default setupBlockPreviewImage
