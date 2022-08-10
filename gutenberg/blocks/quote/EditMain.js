import TrText from '../../components/block-elements/TrText'
import TrImage from '../../components/block-elements/TrImage'

const EditMain = (props) => {
  const {
    attributes: { image, quote, name, position },
    setAttributes,
    className,
    trRawAttrs,
  } = props

  return (
    <div className={`${className}`}>
      <div className="tr-block__row tr-block__row--1-2">
        <div className="tr-block__col">
          <TrImage
            field_object={image}
            meta={trRawAttrs.image.field_meta}
            setAttributes={setAttributes}
          />
        </div>
        <div className="tr-block__col">
          <TrText
            field_object={quote}
            meta={trRawAttrs.quote.field_meta}
            setAttributes={setAttributes}
          />
          <div className="tr-block__row tr-block__row--2">
            <div className="tr-block__col">
              <TrText
                field_object={name}
                meta={trRawAttrs.name.field_meta}
                setAttributes={setAttributes}
              />
            </div>
            <div className="tr-block__col">
              <TrText
                field_object={position}
                meta={trRawAttrs.position.field_meta}
                setAttributes={setAttributes}
              />
            </div>
          </div>
        </div>
      </div>
    </div>
  )
}

export default EditMain
