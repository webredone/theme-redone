const { __ } = wp.i18n;
const { SelectControl, PanelBody, PanelRow } = wp.components;

const EditSidebar = props => {
  const {
    attributes: { inspector_block_margin },
    setAttributes
  } = props;

  return (
    <PanelBody
      title={__("Block Margin Bottom", "tr_blocks")}
      className="inspector-block-margin-control"
    >
      <PanelRow>
        <SelectControl
          label={__("Block Margin Bottom", "tr_blocks")}
          value={inspector_block_margin}
          options={[
            { label: "Large", value: "margin-lg" },
            { label: "Medium", value: "margin-md" },
            { label: "Small", value: "margin-sm" },
            { label: "No Margin", value: "no-margin" }
          ]}
          onChange={block_margin => {
            setAttributes({ inspector_block_margin: block_margin });
          }}
        />
      </PanelRow>
    </PanelBody>
  );
};

export default EditSidebar;
