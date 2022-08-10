const { SelectControl, Card, CardHeader, CardBody } = wp.components
const { __ } = wp.i18n

import trUpdateField from '../../core/trUpdateField'
import TrTooltip from '../TrTooltip'

const TrSelect = ({ fieldData }) => {
  const { field_object, meta } = fieldData

  const handleChange = (fieldNewValue) => {
    const newValue = { ...field_object }
    newValue.value = fieldNewValue
    trUpdateField(fieldData, newValue)
  }

  return (
    <Card
      size="small"
      className={`tr-control tr-select-control tr-control-name--${meta.field_name}`}
    >
      <CardHeader size="small">
        {__(meta.label)}
        {meta.help && <TrTooltip help tooltip={meta.help} />}
      </CardHeader>
      <CardBody>
        <SelectControl
          value={field_object.value}
          options={meta.options}
          onChange={handleChange}
        />
      </CardBody>
    </Card>
  )
}

export default TrSelect
