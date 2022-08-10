const { MediaUpload } = wp.blockEditor
const { Button, Dashicon, Card, CardHeader, CardBody } = wp.components
const { __ } = wp.i18n

import trUpdateField from '../../core/trUpdateField'
import TrTooltip from '../TrTooltip'

const TrVideo = ({ fieldData }) => {
  const { field_object, meta } = fieldData

  const onUpdate = (action, media = false) => {
    const newValue = { ...field_object }
    const add = action === 'add'

    newValue.id = add ? media.id : null
    newValue.src = add ? media.url : ''
    newValue.alt = add ? media.alt : ''

    trUpdateField(fieldData, newValue)
  }

  return (
    <Card
      size="small"
      className={`tr-control tr-media-control tr-video-control tr-control-name--${meta.field_name}`}
    >
      <CardHeader size="small">
        {__(meta.label)}
        {meta.help && <TrTooltip help tooltip={meta.help} />}
      </CardHeader>
      <CardBody>
        <div className="tr-media-control__thumb tr-video-control__thumb">
          {field_object?.src ? (
            <div className="video-wrapper">
              <figure className="wp-block-video">
                <video controls="" src={field_object.src}></video>
              </figure>
            </div>
          ) : null}

          <div className="image">
            {!field_object.id ? (
              <MediaUpload
                onSelect={(media) => onUpdate('add', media)}
                allowedTypes={['video']}
                value={field_object.id}
                render={({ open }) => (
                  <Button
                    isSecondary
                    className={
                      'button button-large tr-block-button tr-media-select tr-block-button--default'
                    }
                    onClick={open}
                  >
                    <Dashicon icon="format-video" />{' '}
                    <span>{__(`Upload/Select`, 'tr_blocks')}</span>
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

export default TrVideo
