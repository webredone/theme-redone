import TrDefaultFieldsHandlerSidebar from '../../components/block-elements/TrDefaultFieldsHandlerSidebar'

const { __ } = wp.i18n
const { InspectorControls } = wp.blockEditor
const { PanelBody } = wp.components
// const { PanelBody, PanelRow } = wp.components

const EditSidebar = (props) => {
  // const { attributes, setAttributes, trRawAttrs } = props

  return (
    <InspectorControls>
      <PanelBody
        className="tr-sidebar-fields"
        title={__('Additional Controls', 'tr_blocks')}
      >
        <TrDefaultFieldsHandlerSidebar data={{ ...props }} />
      </PanelBody>
    </InspectorControls>
  )
}

export default EditSidebar
