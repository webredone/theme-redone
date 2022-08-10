const { useState } = wp.element
const { Dashicon } = wp.components

import {
  trBlockImagePreviewShow,
  trBlockImagePreviewHide
} from '../helpers/trBlockImagePreview'
import TrTooltip from './TrTooltip'
// const { useEffect } = wp.element;

const TrEditBlockWrap = ({
  blockTitle,
  className,
  exampleSrc,
  help,
  children: editBlockCode
}) => {
  const [isUncollapsed, setIsUncollapsed] = useState(false)

  return (
    <div
      className={`tr-block tr-block-wrap--${className} ${
        isUncollapsed ? 'isSelected' : 'isNotSelected'
      }`}
    >
      <div
        className="tr-block__collapsed"
        onClick={() =>
          setIsUncollapsed(prevIsUncollapsed => !prevIsUncollapsed)
        }
      >
        <h2>{blockTitle}</h2>
        <div className="tr-block__collapsed__actions">
          {help && (
            <TrTooltip help tooltip={help}>
              <Dashicon icon="editor-help" />
            </TrTooltip>
          )}

          {exampleSrc && (
            <div
              data-src={exampleSrc}
              className="tr-block__example"
              onMouseEnter={e => trBlockImagePreviewShow(e.target.dataset.src)}
              onMouseLeave={trBlockImagePreviewHide}
            >
              <Dashicon icon="visibility" />
            </div>
          )}
          <Dashicon
            icon={`${isUncollapsed ? 'arrow-up-alt2' : 'arrow-down-alt2'}`}
          />
        </div>
      </div>
      <div className="tr-block__main">{editBlockCode}</div>
    </div>
  )
}

export default TrEditBlockWrap
