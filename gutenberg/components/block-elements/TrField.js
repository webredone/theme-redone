import TrText from './TrText'
import TrNumber from './TrNumber'
import TrImage from './TrImage'
import TrVideo from './TrVideo'
import TrObjectSelector from './TrObjectSelector'
import TrRepeater from './TrRepeater'
import TrSelect from './TrSelect'
import TrFreeform from './TrFreeform'
import TrColorPicker from './TrColorPicker'
import TrToggle from './TrToggle'
import TrCheckbox from './TrCheckbox'
import TrRange from './TrRange'
import trDateTime from './TrDateTime'
import TrCta from './TrCta'

const TrField = ({ fieldData }) => {
  const { meta } = fieldData

  const getComponent = type => {
    return {
      image: TrImage,
      video: TrVideo,
      text: TrText,
      number: TrNumber,
      cta: TrCta,
      color: TrColorPicker,
      repeater: TrRepeater,
      checkbox: TrCheckbox,
      toggle: TrToggle,
      select: TrSelect,
      range: TrRange,
      datetime: trDateTime,
      object_selector: TrObjectSelector,
      freeform: TrFreeform
    }[type]
  }

  const Component = getComponent(meta.type)

  return <Component fieldData={{ ...fieldData }} />
}

export default TrField
