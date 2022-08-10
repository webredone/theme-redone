import { getFieldData } from "../../helpers/getFieldData";
import TrField from "../block-elements/TrField";

const { Fragment } = wp.element;
const { __ } = wp.i18n;
const { PanelBody, PanelRow } = wp.components;

const TrAsideBgPaddControls = (props) => {
  const { attributes, trRawAttrs, setAttributes } = props;

  return (
    <Fragment>
      {attributes.hasOwnProperty("inspector_background_ctrls") ? (
        <PanelBody title={__("Block Background Controls", "tr_blocks")}>
          <PanelRow>
            <TrField
              fieldData={{
                ...getFieldData(
                  attributes,
                  trRawAttrs,
                  setAttributes,
                  "inspector_background_ctrls"
                ),
              }}
            />
          </PanelRow>
        </PanelBody>
      ) : null}

      <PanelBody title={__("Block Padding Controls", "tr_blocks")}>
        <PanelRow>
          <TrField
            fieldData={{
              ...getFieldData(
                attributes,
                trRawAttrs,
                setAttributes,
                "inspector_padding_top_ctrls"
              ),
            }}
          />
        </PanelRow>
        <PanelRow>
          <TrField
            fieldData={{
              ...getFieldData(
                attributes,
                trRawAttrs,
                setAttributes,
                "inspector_padding_bottom_ctrls"
              ),
            }}
          />
        </PanelRow>
      </PanelBody>
    </Fragment>
  );
};

export default TrAsideBgPaddControls;
