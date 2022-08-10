const { URLInput } = wp.blockEditor
const { TextControl, ToggleControl, Card, CardHeader, CardBody } = wp.components
const { __ } = wp.i18n

import trUpdateField from '../../core/trUpdateField'
import TrTooltip from '../TrTooltip'

const TrCta = ({ fieldData }) => {
  const { field_object, meta } = fieldData

  const hasProp = (propName) => field_object.hasOwnProperty(propName)

  const handleUpdate = (subFieldName, subFieldNewValue = null) => {
    const newValue = { ...field_object }
    if (subFieldName === 'target') {
      newValue['target'] = !field_object['target']
    } else {
      newValue[subFieldName] = subFieldNewValue
    }

    trUpdateField(fieldData, newValue)
  }

  return (
    <Card
      size="small"
      className={`tr-control tr-cta-control tr-control-name--${meta.field_name}`}
    >
      <CardHeader size="small">
        {__(meta.label)}
        {meta.help && <TrTooltip help tooltip={meta.help} />}
      </CardHeader>
      <CardBody>
        {hasProp('title') && (
          <div className="tr-cta-control__text">
            <TextControl
              label="Text"
              value={field_object.title}
              onChange={(newValue) => handleUpdate('title', newValue)}
            />
          </div>
        )}

        <div className="tr-cta-control__link">
          <URLInput
            label="Url"
            value={field_object.url}
            onChange={(newValue) => handleUpdate('url', newValue)}
          />
        </div>

        {hasProp('target') && (
          <div className="tr-cta-control__target">
            <ToggleControl
              label="Open in new tab?"
              checked={field_object.target}
              onChange={() => handleUpdate('target')}
            />
          </div>
        )}
      </CardBody>
    </Card>
  )
}

export default TrCta
