const getFieldData = (attributes, trRawAttrs, setAttributes, objectName) => ({
  field_object: attributes[objectName],
  meta: trRawAttrs[objectName].field_meta,
  setAttributes: setAttributes
})

export { getFieldData }
