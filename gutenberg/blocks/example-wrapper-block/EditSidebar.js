import TrDefaultFieldsHandlerSidebar from '../../components/block-elements/TrDefaultFieldsHandlerSidebar'

const { __ } = wp.i18n
const { InspectorControls } = wp.blockEditor
const { PanelBody } = wp.components

const EditSidebar = (props) => {
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
