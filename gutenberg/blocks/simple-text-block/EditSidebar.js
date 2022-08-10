import { getFieldData } from '../../helpers/getFieldData'
import TrField from '../../components/block-elements/TrField'

const { __ } = wp.i18n
const { InspectorControls } = wp.blockEditor
const { PanelBody, PanelRow } = wp.components

const EditSidebar = (props) => {
  const { attributes, setAttributes, trRawAttrs } = props

  return (
    <InspectorControls>
      {/* <PanelBody title={__('Color Settings', 'tr_blocks')}>
        <PanelRow>
          <TrField
            fieldData={{
              ...getFieldData(
                attributes,
                trRawAttrs,
                setAttributes,
                'inspector_color'
              ),
            }}
          />
        </PanelRow>
      </PanelBody> */}
    </InspectorControls>
  )
}

export default EditSidebar
