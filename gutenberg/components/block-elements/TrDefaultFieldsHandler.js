const { Fragment } = wp.element

import TrField from './TrField'

const two_cols_variations = ['2', '2-1', '1-2']

const TrDefaultFieldsHandler = (props) => {
  let { data } = props
  const { trRawAttrs, attributes, setAttributes } = data

  const grid = data.hasOwnProperty('grid') ? data.grid : null

  let columns = null
  if (grid) {
    columns = two_cols_variations.includes(grid)
      ? new Array(2).fill('_')
      : new Array(+grid).fill('_')
  }

  const getFieldData = (objectName) => ({
    field_object: attributes[objectName],
    meta: trRawAttrs[objectName].field_meta,
    setAttributes: setAttributes,
  })

  const allFields = Object.keys(attributes).filter(
    (objName) => !objName.startsWith('inspector_')
  )

  const defaultFieldObjects = allFields.filter(
    (objName) => !trRawAttrs[objName].field_meta.hasOwnProperty('col')
  )

  const colFieldObjects = (colVar) =>
    Object.keys(attributes).filter(
      (objName) => trRawAttrs[objName].field_meta?.col === colVar
    )

  if (!grid) {
    return (
      <Fragment>
        {allFields.map((objectName, index) => {
          return (
            <TrField key={index} fieldData={{ ...getFieldData(objectName) }} />
          )
        })}
      </Fragment>
    )
  }

  return (
    <Fragment>
      {defaultFieldObjects.map((objectName, index) => {
        return (
          <TrField key={index} fieldData={{ ...getFieldData(objectName) }} />
        )
      })}
      {grid && (
        <div className={`tr-block__row tr-block__row--${grid}`}>
          {columns.map((_, index) => (
            <div key={index + 1} className="tr-block__col">
              {colFieldObjects('' + (index + 1)).map((objectName, index) => {
                if (!objectName.startsWith('inspector_')) {
                  return (
                    <TrField
                      key={index}
                      fieldData={{ ...getFieldData(objectName) }}
                    />
                  )
                }
              })}
            </div>
          ))}
        </div>
      )}
      {colFieldObjects('after').map((objectName, index) => (
        <TrField key={index} fieldData={{ ...getFieldData(objectName) }} />
      ))}
    </Fragment>
  )
}

export default TrDefaultFieldsHandler
