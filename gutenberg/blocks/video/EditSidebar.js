import TrField from "../../components/block-elements/TrField";
import { getFieldData } from "../../helpers/getFieldData";

const { __ } = wp.i18n;
const { InspectorControls } = wp.blockEditor;
const { PanelBody, PanelRow } = wp.components;

const EditSidebar = (props) => {
  const { attributes, trRawAttrs, setAttributes } = props;

  return (
    <InspectorControls>
      <PanelBody title={__("Video Source Controls", "tr_blocks")}>
        <PanelRow>
          <TrField
            fieldData={{
              ...getFieldData(
                attributes,
                trRawAttrs,
                setAttributes,
                "inspector_is_self_hosted"
              ),
            }}
          />
        </PanelRow>
      </PanelBody>
    </InspectorControls>
  );
};

export default EditSidebar;
