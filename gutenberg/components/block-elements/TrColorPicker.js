// const compose = wp.compose;
const { Card, CardHeader, CardBody, ColorPalette } = wp.components
const { __ } = wp.i18n

import trUpdateField from '../../core/trUpdateField'
import TrTooltip from '../TrTooltip'

const TrColorPicker = ({ fieldData }) => {
  const { field_object, meta } = fieldData

  const handleChange = (fieldValue) => {
    const newValue = { ...field_object }
    newValue.value = fieldValue
    trUpdateField(fieldData, newValue)
  }

  return (
    <Card
      size="small"
      className={`tr-control tr-color-control tr-control-name--${meta.field_name}`}
    >
      <CardHeader size="small">
        {__(meta.label)}
        {meta.help && <TrTooltip help tooltip={meta.help} />}
      </CardHeader>
      <CardBody>
        <ColorPalette
          disableCustomColors={meta?.customColors ? false : true}
          clearable={false}
          colors={meta.options}
          value={field_object.value}
          onChange={handleChange}
        />
      </CardBody>
    </Card>
  )
}

export default TrColorPicker
