import TrText from "../../components/block-elements/TrText";

const EditMain = props => {
  const {
    attributes: { title, text },
    setAttributes,
    className,
    trRawAttrs
  } = props;

  return (
    <div className={`${className}`}>
      <TrText
        field_object={title}
        meta={trRawAttrs.title.field_meta}
        setAttributes={setAttributes}
      />
      <TrText
        field_object={text}
        meta={trRawAttrs.text.field_meta}
        setAttributes={setAttributes}
      />
    </div>
  );
};

export default EditMain;
