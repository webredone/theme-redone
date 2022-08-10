const { __ } = wp.i18n
const { registerBlockType } = wp.blocks
const { Fragment } = wp.element
const { InspectorControls } = wp.blockEditor

const clearAndUpper = text => text.replace(/_/, ' ').toUpperCase()
const toPascalCase = text => text.replace(/(^\w|_\w)/g, clearAndUpper)

// Makes the block collapsible in the editor
import TrEditBlockWrap from './components/TrEditBlockWrap'

const BLOCK_NAME_PREFIX = require('../theme_redone_global_config.json')
  .BLOCK_NAME_PREFIX

const capitalized_prefix =
  BLOCK_NAME_PREFIX.charAt(0).toUpperCase() + BLOCK_NAME_PREFIX.slice(1)

/**
 * @param {string} block_folder_name - Block Folder Name - "it-should-be-in-kebab-case"
 * @param {string} icon - Icon of the block. If not provided, it defaults to "shield"
 * @param {string} category - Category of the block. If not provided, it defaults to "common"
 * @returns {void} void
 */
const register_block = ({
  block_folder_name,
  icon = 'block-default',
  category = 'layout'
}) => {
  const BLOCK_PATH = `./blocks/${block_folder_name}`

  ;(async BLOCK_PATH => {
    const block_model = await require(`${BLOCK_PATH}/model.json`)

    const block_meta = block_model.block_meta
    let block_attributes = block_model.attributes

    // TODO: refactor to a better recursive function
    // Create field_name property that we need later for finding and updating things
    // and also add a default label if not set in model.json
    const FORMATTED_RAW_ATTRS = { ...block_attributes }
    Object.entries(FORMATTED_RAW_ATTRS).forEach(([key, val]) => {
      if (val.hasOwnProperty('field_meta')) {
        FORMATTED_RAW_ATTRS[key] = { ...val }
        FORMATTED_RAW_ATTRS[key].field_meta.field_name = key
        if (!FORMATTED_RAW_ATTRS[key].field_meta.hasOwnProperty('label')) {
          FORMATTED_RAW_ATTRS[key].field_meta.label = toPascalCase(key)
        }
        // lvl1 repeater
        if (FORMATTED_RAW_ATTRS[key].field_meta.type === 'repeater') {
          const REPEATER_LVL1_RAW_ATTRS = { ...FORMATTED_RAW_ATTRS[key] }
          Object.entries(REPEATER_LVL1_RAW_ATTRS.field_meta.subfields).forEach(
            ([rKey, rVal]) => {
              REPEATER_LVL1_RAW_ATTRS.field_meta.subfields[rKey] = { ...rVal }
              REPEATER_LVL1_RAW_ATTRS.field_meta.subfields[
                rKey
              ].field_meta.field_name = rKey
              if (
                !REPEATER_LVL1_RAW_ATTRS.field_meta.subfields[
                  rKey
                ].field_meta.hasOwnProperty('label')
              ) {
                REPEATER_LVL1_RAW_ATTRS.field_meta.subfields[
                  rKey
                ].field_meta.label = toPascalCase(rKey)
              }
              // lvl2 repeater
              if (
                REPEATER_LVL1_RAW_ATTRS.field_meta.subfields[rKey].field_meta
                  .type === 'repeater'
              ) {
                Object.entries(
                  REPEATER_LVL1_RAW_ATTRS.field_meta.subfields[rKey].field_meta
                    .subfields
                ).forEach(([rrKey, rrVal]) => {
                  REPEATER_LVL1_RAW_ATTRS.field_meta.subfields[
                    rKey
                  ].field_meta.subfields[rrKey] = { ...rrVal }
                  REPEATER_LVL1_RAW_ATTRS.field_meta.subfields[
                    rKey
                  ].field_meta.subfields[rrKey].field_meta.field_name = rrKey
                  if (
                    !REPEATER_LVL1_RAW_ATTRS.field_meta.subfields[
                      rKey
                    ].field_meta.subfields[rrKey].field_meta.hasOwnProperty(
                      'label'
                    )
                  ) {
                    REPEATER_LVL1_RAW_ATTRS.field_meta.subfields[
                      rKey
                    ].field_meta.subfields[
                      rrKey
                    ].field_meta.label = toPascalCase(rrKey)
                  }
                })
              }
            }
          )
          FORMATTED_RAW_ATTRS[key] = { ...REPEATER_LVL1_RAW_ATTRS }
        }
      }
    })
    // end fn for field_name and label fallback if not set in model.json

    // console.log(`Formatted raw attrs for: ${block_folder_name}`, FORMATTED_RAW_ATTRS);

    let grid = block_meta?.grid || false

    let block_keywords = []

    if (block_meta?.keywords) {
      block_keywords = [`${capitalized_prefix} Block`, ...block_meta.keywords]
      block_keywords = block_keywords.map(keyword => __(keyword))
    }

    const PREFIXED_NAME = `${capitalized_prefix}/${block_meta.BLOCK_TITLE}`

    const EditMain = await require(`${BLOCK_PATH}/EditMain`).default
    const View = await require(`${BLOCK_PATH}/View`).default
    let EditSidebar = null
    let AsideLayoutControls = <Fragment></Fragment>
    if (block_meta?.hasSidebar) {
      EditSidebar = await require(`${BLOCK_PATH}/EditSidebar`).default
    }

    const exampleValue = !block_meta.hasExample
      ? null
      : {
          attributes: {
            cover: `${trBlocksGlobal.pluginDirUrl}blocks/${block_folder_name}/example.jpg`
          }
        }

    // TODO: Remove this, and the associated files
    if (block_meta.hasGlobalSettings) {
      AsideLayoutControls = await require('./components/sidebar-components/trAsideBgPaddControls')
        .default
    }

    registerBlockType(
      `${BLOCK_NAME_PREFIX}/${block_meta.BLOCK_REGISTER_NAME}`,
      {
        title: __(PREFIXED_NAME),
        // description: __(),
        icon,
        category,
        keywords: block_keywords,
        attributes: block_attributes,
        supports: {
          html: false
        },
        edit: props => [
          (() => {
            if (block_meta?.hasSidebar) {
              if (block_meta.hasGlobalSettings) {
                return (
                  <InspectorControls>
                    <AsideLayoutControls
                      {...props}
                      trRawAttrs={FORMATTED_RAW_ATTRS}
                    />
                    <EditSidebar {...props} trRawAttrs={FORMATTED_RAW_ATTRS} />
                  </InspectorControls>
                )
              } else {
                return (
                  <InspectorControls>
                    <EditSidebar {...props} trRawAttrs={FORMATTED_RAW_ATTRS} />
                  </InspectorControls>
                )
              }
            } else if (block_meta.hasGlobalSettings) {
              return (
                <InspectorControls>
                  <AsideLayoutControls
                    {...props}
                    trRawAttrs={FORMATTED_RAW_ATTRS}
                  />
                </InspectorControls>
              )
            } else {
              return null
            }
          })(),
          <TrEditBlockWrap
            blockTitle={PREFIXED_NAME}
            className={block_meta.BLOCK_REGISTER_NAME}
            help={block_meta.help || false}
            exampleSrc={
              block_meta.hasExample
                ? `${trBlocksGlobal.pluginDirUrl}blocks/${block_folder_name}/example.jpg`
                : null
            }
          >
            <EditMain
              {...props}
              blockTitle={PREFIXED_NAME}
              // trRawAttrs={block_attributes}
              trRawAttrs={FORMATTED_RAW_ATTRS}
              grid={grid}
            />
          </TrEditBlockWrap>
        ],
        save: props => <View {...props.attributes} />,
        example: exampleValue
      }
    )
  })(BLOCK_PATH)
}

export default register_block
