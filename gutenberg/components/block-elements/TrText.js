const { TextControl, TextareaControl, Card, CardHeader, CardBody, CardFooter } =
  wp.components

const { RichText } = wp.blockEditor
const { useState, useEffect } = wp.element
const { __ } = wp.i18n

import trUpdateField from '../../core/trUpdateField'
import showAlertIfMaxCharsExceeded from '../../helpers/showAlertIfMaxCharsExceeded'
import { stripHtmlAndReturnText } from '../../helpers/stripHtmlAndReturnText'
import TrTooltip from '../TrTooltip'

const TrText = ({ fieldData }) => {
  const { field_object, meta } = fieldData

  const hasCharsLimit = meta.hasOwnProperty('max_chars')

  // temp var that holds the previous value if new one exceeds max chars,
  // if max chars exists as a property
  const [tempHtmlStringFromContent, setTempHtmlStringFromContent] = useState('')

  useEffect(() => {
    hasCharsLimit && setTempHtmlStringFromContent(field_object.text)
  }, [])

  const [charsLeft, setCharsLeft] = useState(() =>
    hasCharsLimit
      ? meta.max_chars - stripHtmlAndReturnText(field_object.text).length
      : null
  )

  let Component = TextControl
  if (meta.hasOwnProperty('variation')) {
    meta.variation === 'long' && (Component = TextareaControl)
    meta.variation === 'rich' && (Component = RichText)
  }

  const maxCharsOK = (fieldNewValue) => {
    return stripHtmlAndReturnText(fieldNewValue).length < meta.max_chars
  }

  const updateField = (fieldNewValue) => {
    const newValue = { ...field_object }

    if (!hasCharsLimit || maxCharsOK(fieldNewValue)) {
      newValue.text = fieldNewValue
    } else {
      newValue.text = tempHtmlStringFromContent
    }

    trUpdateField(fieldData, newValue)
  }

  const handleChange = (fieldNewValue) => {
    // update temp string that doesn't exceed defined max chars count
    if (hasCharsLimit) {
      if (maxCharsOK(fieldNewValue)) {
        setTempHtmlStringFromContent(fieldNewValue)
      }

      showAlertIfMaxCharsExceeded(meta.max_chars, fieldNewValue)
      updateField(fieldNewValue)
      setCharsLeft(
        meta.max_chars - stripHtmlAndReturnText(fieldNewValue).length
      )
    } else {
      updateField(fieldNewValue)
    }
  }

  return (
    <Card
      size="small"
      className={`tr-control tr-text-control tr-control-name--${meta.field_name}`}
    >
      <CardHeader size="small">
        {__(meta.label)}
        {meta.help && <TrTooltip help tooltip={meta.help} />}
      </CardHeader>
      <CardBody>
        <Component value={field_object.text} onChange={handleChange} />
      </CardBody>
      {hasCharsLimit && (
        <CardFooter>
          <p className="tr-text-control__count">
            <span>Characters left: </span>
            <span>{charsLeft}</span>
          </p>
        </CardFooter>
      )}
    </Card>
  )
}

export default TrText
