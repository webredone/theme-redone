const { __ } = wp.i18n
const { InspectorControls } = wp.blockEditor
const { FormToggle, PanelBody, PanelRow } = wp.components

const EditSidebar = props => {
  const {
    attributes: { ctaOpenInNewTab },
    setAttributes
  } = props

  const toggleCtaOpenInNewTab = () =>
    setAttributes({ ctaOpenInNewTab: !ctaOpenInNewTab })

  return (
    <InspectorControls>
      <PanelBody title={__('CTA link settings', 'tr_blocks')}>
        <PanelRow>
          <label htmlFor="reverse-toggle">
            {__('Open in new tab?', 'tr_blocks')}
          </label>
          <FormToggle
            id="reverse-toggle"
            checked={ctaOpenInNewTab}
            onChange={toggleCtaOpenInNewTab}
          />
        </PanelRow>
      </PanelBody>
    </InspectorControls>
  )
}

export default EditSidebar
