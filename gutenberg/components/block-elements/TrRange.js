const { RangeControl, Card, CardHeader, CardBody } = wp.components
const { __ } = wp.i18n

import trUpdateField from '../../core/trUpdateField'
import TrTooltip from '../TrTooltip'

const TrRange = ({ fieldData }) => {
  const { field_object, meta } = fieldData

  const handleChange = (fieldNewValue) => {
    const newValue = { ...field_object }
    newValue.value = fieldNewValue

    trUpdateField(fieldData, newValue)
  }

  return (
    <Card
      size="small"
      className={`tr-control tr-range-control tr-control-name--${meta.field_name}`}
    >
      <CardHeader size="small">
        {__(meta.label)}
        {meta.help && <TrTooltip help tooltip={meta.help} />}
      </CardHeader>
      <CardBody>
        <RangeControl
          value={field_object.value}
          min={meta.min}
          max={meta.max}
          step={meta.step}
          onChange={handleChange}
        />
      </CardBody>
    </Card>
  )
}

export default TrRange
