const { MediaUpload } = wp.blockEditor
const { Button, Card, CardHeader, CardBody, Dashicon } = wp.components
const { __ } = wp.i18n

import trUpdateField from '../../core/trUpdateField'
import TrTooltip from '../TrTooltip'

const TrImage = ({ fieldData }) => {
  const { field_object, meta } = fieldData

  // default allowedTypes
  let ALLOWED_TYPES = ['image']

  if (meta.hasOwnProperty('allowedTypes') && Array.isArray(meta.allowedTypes)) {
    ALLOWED_TYPES = meta.allowedTypes
  }

  const onUpdate = (action, media = false) => {
    const newValue = { ...field_object }
    const add = action === 'add'

    newValue.id = add ? media.id : null
    newValue.src = add ? media.url : ''
    newValue.alt = add ? media.alt : ''
    if (add) {
      console.log('media: ', media)
      // If it can find a defined size image, it will use that image
      if (meta.hasOwnProperty('size') && media?.sizes?.[meta.size]?.url) {
        newValue.src = media.sizes[meta.size].url
      }
    }
    if (meta.hasOwnProperty('include_subtype')) {
      newValue.subtype = add ? media.subtype : ''
    }

    trUpdateField(fieldData, newValue)
  }

  let bg_size_mode = 'contain'

  return (
    <Card
      size="small"
      className={`tr-control tr-media-control tr-image-control tr-control-name--${meta.field_name}`}
    >
      <CardHeader size="small">
        {__(meta.label)}
        {meta.hasOwnProperty('help') && <TrTooltip help tooltip={meta.help} />}
      </CardHeader>
      <CardBody>
        <div className="tr-media-control__thumb tr-image-control__thumb">
          <div className="tr-image-control__thumb__wrap">
            <div
              className="tr-image-control__thumb__inner"
              style={{
                backgroundImage: field_object?.src
                  ? `url('${field_object.src}')`
                  : 'none',
                backgroundSize: bg_size_mode,
              }}
            />
          </div>
          <div className="image">
            {!field_object.id ? (
              <MediaUpload
                onSelect={(media) => onUpdate('add', media)}
                allowedTypes={ALLOWED_TYPES}
                value={field_object.id}
                render={({ open }) => (
                  <Button
                    isSecondary
                    className={
                      'button button-large tr-block-button tr-media-select tr-block-button--default'
                    }
                    onClick={open}
                  >
                    <Dashicon icon="format-image" />{' '}
                    <span>{__(`Upload`, 'tr_blocks')}</span>
                  </Button>
                )}
              ></MediaUpload>
            ) : (
              [
                <div class="image-wrapper">
                  <Button
                    isDestructive
                    className="button button-large tr-media-remove tr-block-button"
                    onClick={onUpdate.bind('remove')}
                  >
                    <Dashicon icon="no-alt" />
                    <span>{__(`Remove`, 'tr_blocks')}</span>
                  </Button>
                </div>,
              ]
            )}
          </div>
        </div>
      </CardBody>
    </Card>
  )
}

export default TrImage
