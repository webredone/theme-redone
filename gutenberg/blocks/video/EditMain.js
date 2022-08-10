import TrField from "../../components/block-elements/TrField";
import { getFieldData } from "../../helpers/getFieldData";

const EditMain = (props) => {
  const { attributes, setAttributes, className, trRawAttrs } = props;

  return (
    <div className={`${className}`}>
      {attributes.inspector_is_self_hosted.checked ? (
        <TrField
          fieldData={{
            ...getFieldData(
              attributes,
              trRawAttrs,
              setAttributes,
              "self_hosted_video"
            ),
          }}
        />
      ) : (
        <TrField
          fieldData={{
            ...getFieldData(
              attributes,
              trRawAttrs,
              setAttributes,
              "yt_or_vimeo_url"
            ),
          }}
        />
      )}
      <TrField
        fieldData={{
          ...getFieldData(
            attributes,
            trRawAttrs,
            setAttributes,
            "optional_caption"
          ),
        }}
      />
    </div>
  );
};

export default EditMain;
