import TrDefaultFieldsHandler from '../../components/block-elements/TrDefaultFieldsHandler'

const EditMain = props => {
  const { className } = props

  return (
    <div className={`${className}`}>
      <TrDefaultFieldsHandler data={{ ...props }} />
    </div>
  )
}

export default EditMain
