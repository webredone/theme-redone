const { CheckboxControl, Card, CardHeader, CardBody } = wp.components
const { __ } = wp.i18n

import trUpdateField from '../../core/trUpdateField'
import TrTooltip from '../TrTooltip'

const TrCheckbox = ({ fieldData }) => {
  const { field_object, meta } = fieldData

  const handleChange = () => {
    const newValue = { ...field_object }
    newValue.checked = !field_object['checked']
    trUpdateField(fieldData, newValue)
  }

  return (
    <Card
      size="small"
      className={`tr-control tr-checkbox-control tr-control-name--${meta.field_name}`}
    >
      <CardHeader size="small">
        {__(meta.label)}
        {meta.help && <TrTooltip help tooltip={meta.help} />}
      </CardHeader>
      <CardBody>
        <CheckboxControl
          label={__(meta.label)}
          checked={field_object.checked}
          onChange={handleChange}
        />
      </CardBody>
    </Card>
  )
}

export default TrCheckbox
