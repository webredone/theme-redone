const { InnerBlocks } = wp.blockEditor
import TrDefaultFieldsHandler from '../../components/block-elements/TrDefaultFieldsHandler'

const EditMain = props => {
  const { className } = props

  return (
    <div className={`${className}`}>
      <TrDefaultFieldsHandler data={{ ...props }} />
      <InnerBlocks onClick={e => e.stopPropagation()} />
    </div>
  )
}

export default EditMain
