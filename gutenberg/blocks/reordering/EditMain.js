import TrDefaultFieldsHandler from "../../components/block-elements/TrDefaultFieldsHandler";

const EditMain = (props) => (
  <div className={`${props.className}`}>
    <TrDefaultFieldsHandler data={{ ...props }} />
  </div>
);

export default EditMain;
