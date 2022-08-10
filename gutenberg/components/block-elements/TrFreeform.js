const { BlockEdit } = wp.blockEditor
const { useState } = wp.element
const { Card, CardHeader, CardBody } = wp.components
const { __ } = wp.i18n

import { v4 as uuidv4 } from 'uuid'
import trUpdateField from '../../core/trUpdateField'
import TrTooltip from '../TrTooltip'

const TrFreeform = ({ fieldData }) => {
  const { field_object, meta } = fieldData

  const [trUniqueID] = useState(uuidv4())

  const handleChange = (fieldNewValue) => {
    const newValue = { ...field_object }
    newValue.text = fieldNewValue
    trUpdateField(fieldData, newValue)
  }

  return (
    <Card
      size="small"
      className={`tr-control tr-freeform-control tr-control-name--${meta.field_name}`}
    >
      <CardHeader size="small">
        {__(meta.label)}
        {meta?.help && <TrTooltip help tooltip={meta.help} />}
      </CardHeader>
      <CardBody>
        <BlockEdit
          name="core/freeform"
          attributes={{
            content: field_object.text,
          }}
          clientId={trUniqueID}
          isSelected={false}
          setAttributes={(state) => {
            return state.content !== undefined
              ? handleChange(state.content)
              : null
          }}
        />
      </CardBody>
    </Card>
  )
}

export default TrFreeform
