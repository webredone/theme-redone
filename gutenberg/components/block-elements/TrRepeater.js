const { useState } = wp.element
const { Button, Dashicon, Card, CardHeader, CardBody } = wp.components
const { __ } = wp.i18n

import TrField from './TrField'
import TrTooltip from '../TrTooltip'
import { reorderItems } from '../../helpers/reorderItems'
import TrRepeaterRepeater from './TrRepeaterRepeater'

const TrRepeater = ({
  fieldData
  // meta with the info about field types
}) => {
  const { field_object, meta, setAttributes } = fieldData
  const { subfields } = meta

  const [isOpenDeletePrompt, setIsOpenDeletePrompt] = useState(false)

  const [repeaterItemsStates, setRepeaterItemsStates] = useState(() =>
    field_object.map(_ => ({
      isUncollapsed: false,
      isBeingTriedToDelete: false
    }))
  )

  let minRep = 0
  if (meta.hasOwnProperty('min_rep')) {
    minRep = meta.min_rep
  }
  let maxRep = 100
  if (meta.hasOwnProperty('max_rep')) {
    maxRep = meta.max_rep
  }

  let count_is_fixed = false
  if (
    meta.hasOwnProperty('min_rep') &&
    meta.hasOwnProperty('max_rep') &&
    meta.min_rep === meta.max_rep
  ) {
    count_is_fixed = true
  }

  let item_label = 'Item'
  if (meta.hasOwnProperty('repeater__item__label')) {
    item_label = meta.repeater__item__label
  }

  let is_reordering_allowed = true
  if (meta.hasOwnProperty('disable_reordering') && meta.disable_reordering) {
    is_reordering_allowed = false
  }

  // GRID RELATED -----------------------------------------------
  // Both of the below fields are optional
  // and will fallback to stacked if not provided
  // if you want a grid, just adda number; Otherwise, items will be stacked
  let grid = 1
  if (meta.hasOwnProperty('grid')) {
    grid = meta.grid
  }
  // If you want to modify the gap (margin), just pass the desired value as number
  let gridGap = 10
  if (meta.hasOwnProperty('grid_gap')) {
    gridGap = meta.grid_gap
  }
  // END:GRID RELATED -----------------------------------------------

  // ADD NEW SUBFIELD ------------------------------------------
  const handleAddRepeaterField = () => {
    const newObjToBeAdded = {}
    Object.keys(subfields).forEach(subFieldName => {
      const subfield_schema = subfields[subFieldName]
      if (subfield_schema.field_meta.type === 'repeater') {
        // IF SUBFIELD IS OF TYPE REPEATER
        newObjToBeAdded[subfield_schema.field_meta.field_name] = [
          ...subfield_schema.default
        ]
      } else {
        // SUBFIELD IS NOT OF TYPE REPEATER
        newObjToBeAdded[subfield_schema.field_meta.field_name] = {
          ...subfield_schema.default
        }
      }
    })
    const updatedRepeaterValues = [...field_object, newObjToBeAdded]
    setAttributes({
      [meta.field_name]: updatedRepeaterValues
    })
    const updatedRepeaterItemsStates = [
      ...repeaterItemsStates,
      { isUncollapsed: true, isBeingTriedToDelete: false }
    ]
    setRepeaterItemsStates(updatedRepeaterItemsStates)
  }

  //  REMOVE SUBFIELD ------------------------------------------
  const handleRemoveRepeaterField = (e, index) => {
    e.stopPropagation()
    let updatedRepeaterValues = field_object.filter(
      (_, fieldIndex) => fieldIndex !== index
    )
    setAttributes({
      [meta.field_name]: updatedRepeaterValues
    })
    const updatedRepeaterItemsStates = [
      ...repeaterItemsStates.filter((_, itemIndex) => itemIndex !== index)
    ]
    setRepeaterItemsStates(updatedRepeaterItemsStates)
    setIsOpenDeletePrompt(false)
  }

  const handleOpenDeletePrompt = (e, index) => {
    e.stopPropagation()

    const updatedRepeaterItemsStates = [...repeaterItemsStates]
    updatedRepeaterItemsStates.forEach((_, rep_item_index) => {
      const newUncollapsedState = index === rep_item_index ? true : false
      const newBeingTriedToDeleteState = index === rep_item_index ? true : false

      updatedRepeaterItemsStates[
        rep_item_index
      ].isUncollapsed = newUncollapsedState
      updatedRepeaterItemsStates[
        rep_item_index
      ].isBeingTriedToDelete = newBeingTriedToDeleteState
    })
    setRepeaterItemsStates(updatedRepeaterItemsStates)
    setIsOpenDeletePrompt(true)
  }

  const handleAbandonDeletePrompt = (e, fieldIndex) => {
    e.stopPropagation()
    const updatedRepeaterItemsStates = [...repeaterItemsStates]
    updatedRepeaterItemsStates.forEach((_, rep_item_index) => {
      const newCollapseState = fieldIndex === rep_item_index ? true : false
      updatedRepeaterItemsStates[
        rep_item_index
      ].isUncollapsed = newCollapseState
      updatedRepeaterItemsStates[rep_item_index].isBeingTriedToDelete = false
    })
    setRepeaterItemsStates(updatedRepeaterItemsStates)
    setIsOpenDeletePrompt(false)
  }

  const handleCollapseUncollapse = (e, fieldIndex) => {
    e.stopPropagation()
    if (isOpenDeletePrompt) return

    const updatedRepeaterItemsStates = [...repeaterItemsStates]
    updatedRepeaterItemsStates[
      fieldIndex
    ].isUncollapsed = !updatedRepeaterItemsStates[fieldIndex].isUncollapsed
    setRepeaterItemsStates(updatedRepeaterItemsStates)
  }

  const handleReorderField = (e, index, direction) => {
    e.stopPropagation()
    const newPos = direction === 'up' ? index - 1 : index + 1
    const reorderedArr = reorderItems(field_object, index, newPos)
    const updatedRepeaterValues = [...reorderedArr]

    const updatedRepeaterItemsStates = [...repeaterItemsStates]
    updatedRepeaterItemsStates[index] = repeaterItemsStates[newPos]
    updatedRepeaterItemsStates[newPos] = repeaterItemsStates[index]

    setAttributes({
      [meta.field_name]: updatedRepeaterValues
    })

    setRepeaterItemsStates(updatedRepeaterItemsStates)
  }

  const TryDeleteActionHTML = fieldIndex => {
    return (
      <>
        <span>Are you sure?</span>
        <div>
          <TrTooltip tooltip="Yes. Delete." custom>
            <button
              className="confirm-delete"
              onClick={e => handleRemoveRepeaterField(e, fieldIndex)}
            >
              <Dashicon icon="yes" />
            </button>
          </TrTooltip>
          <TrTooltip tooltip="No. Abort." custom>
            <button
              className="abandon-delete"
              onClick={e => handleAbandonDeletePrompt(e, fieldIndex)}
            >
              <Dashicon icon="no-alt" />
            </button>
          </TrTooltip>
        </div>
      </>
    )
  }

  const SiblingItemBlockedActionsHTML = () => {
    return (
      <span style={{ color: 'crimson' }}>
        Finish the started action to unblock
      </span>
    )
  }

  return (
    <div
      className={`tr-control tr-repeater-control tr-repeater tr-control-name--${
        meta.field_name
      } ${!field_object.length ? 'empty' : ''}`}
    >
      <CardHeader size="small" className="tr-repeater__header">
        <span>
          {__(meta.label)} ({field_object.length || 0})
        </span>
        {meta.hasOwnProperty('help') && <TrTooltip help tooltip={meta.help} />}
      </CardHeader>
      <CardBody className="tr-repeater__body">
        <div
          className="tr-repeater__wrap"
          style={{
            gridTemplateColumns: `repeat(${grid}, 1fr)`,
            gridGap: `${gridGap}px`
          }}
        >
          {field_object.map((field, fieldIndex) => {
            return (
              <Card size="small" key={fieldIndex} className="tr-repeater__item">
                <CardHeader
                  className="tr-repeater__item__header"
                  onClick={e => {
                    handleCollapseUncollapse(e, fieldIndex)
                  }}
                >
                  {isOpenDeletePrompt ? (
                    <div className="tr-repeater__item__header__delete-prompt">
                      {repeaterItemsStates[fieldIndex].isBeingTriedToDelete
                        ? TryDeleteActionHTML(fieldIndex)
                        : SiblingItemBlockedActionsHTML()}
                    </div>
                  ) : null}

                  <p className="tr-repeater__item-name">
                    {item_label} <span>{fieldIndex + 1}.</span>
                  </p>

                  {meta.hasOwnProperty('repeater__item__help') && (
                    <TrTooltip help tooltip={meta.repeater__item__help} />
                  )}

                  {is_reordering_allowed && fieldIndex > 0 && (
                    <TrTooltip tooltip="Move one position up" custom>
                      <button
                        className="tr-reorder"
                        onClick={e => handleReorderField(e, fieldIndex, 'up')}
                      >
                        <Dashicon icon="arrow-left-alt" />
                      </button>
                    </TrTooltip>
                  )}

                  {is_reordering_allowed &&
                    fieldIndex < field_object.length - 1 && (
                      <TrTooltip tooltip="Move one position down" custom>
                        <button
                          className="tr-reorder"
                          onClick={e =>
                            handleReorderField(e, fieldIndex, 'down')
                          }
                        >
                          <Dashicon icon="arrow-right-alt" />
                        </button>
                      </TrTooltip>
                    )}

                  {repeaterItemsStates.length &&
                    repeaterItemsStates[fieldIndex] !== undefined && (
                      <TrTooltip tooltip="Collapse/Uncollapse" custom>
                        <Dashicon
                          className="tr-collapse-uncollapse"
                          icon={`${
                            repeaterItemsStates[fieldIndex].isUncollapsed
                              ? 'arrow-up-alt2'
                              : 'arrow-down-alt2'
                          }`}
                        />
                      </TrTooltip>
                    )}

                  {!count_is_fixed &&
                    (minRep === 0 ||
                      (minRep > 0 && field_object.length > minRep)) && (
                      <TrTooltip tooltip={`Remove ${item_label}`} custom>
                        <button
                          className="tr-remove"
                          onClick={e => handleOpenDeletePrompt(e, fieldIndex)}
                        >
                          <Dashicon icon="no-alt" />
                        </button>
                      </TrTooltip>
                    )}
                </CardHeader>
                <CardBody
                  className={`tr-repeater__item__body ${
                    repeaterItemsStates.length &&
                    repeaterItemsStates[fieldIndex] !== undefined &&
                    !repeaterItemsStates[fieldIndex].isUncollapsed
                      ? 'collapsed'
                      : ''
                  }`}
                >
                  {Object.keys(subfields).map((subFieldName, subFieldIndex) => {
                    const subField = subfields[subFieldName]
                    const subFieldType = subField.field_meta.type
                    if (subFieldType !== 'repeater') {
                      // REGULAR NON-CHILD-REPEATER FIELD
                      const fieldRepeaterData = {
                        ...fieldData,
                        field_object: field[subField.field_meta.field_name],
                        meta: subField.field_meta,
                        repeater_object: field_object,
                        repeater_name: meta.field_name,
                        repeater_index: fieldIndex
                      }
                      return (
                        <TrField
                          key={subFieldIndex}
                          fieldData={{ ...fieldRepeaterData }}
                        />
                      )
                    } else {
                      // SECOND LEVEL REPEATER
                      const fieldRepeaterRepeaterData = {
                        ...fieldData,
                        field_object: field[subField.field_meta.field_name],
                        meta: subField.field_meta,
                        repeater_parent_object: field_object,
                        repeater_parent_name: meta.field_name,
                        repeater_parent_index: fieldIndex
                      }
                      return (
                        <TrRepeaterRepeater
                          key={subFieldIndex}
                          fieldData={{ ...fieldRepeaterRepeaterData }}
                        />
                      )
                    }
                  })}
                </CardBody>
              </Card>
            )
          })}
        </div>
      </CardBody>
      {/* if count is not fixed -> show "add button" */}
      {!count_is_fixed && field_object.length < maxRep && (
        <Button
          isSecondary
          className={
            'button button-large tr-block-button tr-repeater__add-btn tr-block-button--wide'
          }
          onClick={handleAddRepeaterField}
        >
          <Dashicon icon="plus" />
          {__(` Add ${item_label}`, 'tr_blocks')}
        </Button>
      )}
    </div>
  )
}

export default TrRepeater
