const { Fragment } = wp.element
const { PanelRow } = wp.components

import TrField from './TrField'

const TrDefaultFieldsHandlerSidebar = (props) => {
  let { data } = props
  const { trRawAttrs, attributes, setAttributes } = data

  const getFieldData = (objectName) => ({
    field_object: attributes[objectName],
    meta: trRawAttrs[objectName].field_meta,
    setAttributes: setAttributes,
  })

  const sidebar_fields = Object.keys(attributes).filter((objName) =>
    objName.startsWith('inspector_')
  )

  return (
    <Fragment>
      {sidebar_fields.map((objectName, index) => {
        return (
          <PanelRow key={index}>
            <TrField fieldData={{ ...getFieldData(objectName) }} />
          </PanelRow>
        )
      })}
    </Fragment>
  )
}

export default TrDefaultFieldsHandlerSidebar
