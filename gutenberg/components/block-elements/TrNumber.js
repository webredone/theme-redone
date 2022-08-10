const { TextControl, Card, CardHeader, CardBody } = wp.components
const { __ } = wp.i18n

import trUpdateField from '../../core/trUpdateField'
import TrTooltip from '../TrTooltip'

const TrNumber = ({ fieldData }) => {
  const { field_object, meta } = fieldData

  let number_type_attrs = {}
  if (meta.hasOwnProperty('min')) number_type_attrs.min = meta.min
  if (meta.hasOwnProperty('max')) number_type_attrs.max = meta.max
  if (meta.hasOwnProperty('step')) number_type_attrs.step = meta.step

  let Component = TextControl

  const updateField = (fieldNewValue) => {
    const newValue = { ...field_object }
    newValue.value = +fieldNewValue

    if (
      number_type_attrs.hasOwnProperty('min') &&
      newValue.value < number_type_attrs.min
    ) {
      newValue.value = number_type_attrs.min
    }

    if (
      number_type_attrs.hasOwnProperty('max') &&
      newValue.value > number_type_attrs.max
    ) {
      newValue.value = number_type_attrs.max
    }

    trUpdateField(fieldData, newValue)
  }

  return (
    <Card
      size="small"
      className={`tr-control tr-number-control tr-control-name--${meta.field_name}`}
    >
      <CardHeader size="small">
        {__(meta.label)}
        {meta.help && <TrTooltip help tooltip={meta.help} />}
      </CardHeader>
      <CardBody>
        <Component
          type="number"
          value={field_object.value}
          onChange={updateField}
          {...number_type_attrs}
        />
      </CardBody>
    </Card>
  )
}

export default TrNumber
