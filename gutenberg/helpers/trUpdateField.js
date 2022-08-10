const trUpdateField = (
  meta,
  setAttributes,
  repeater_object,
  repeater_name,
  repeater_index,
  repeater_parent_object,
  repeater_parent_name,
  repeater_parent_index,
  newValue
) => {
  if (repeater_name || repeater_parent_name) {
    if (repeater_name && !repeater_parent_name) {
      // IN REPEATER LEVEL 1 ---
      const updatedRepeater = [...repeater_object];
      updatedRepeater[repeater_index][meta.field_name] = {
        ...newValue
      };
      setAttributes({ [repeater_name]: updatedRepeater });
    } else if (repeater_parent_name) {
      // IN REPEATER LEVEL 2 ---
      const updatedOuterRepeater = [...repeater_parent_object];
      updatedOuterRepeater[repeater_parent_index][repeater_name][
        repeater_index
      ] = {
        ...updatedOuterRepeater[repeater_parent_index][repeater_name][
          repeater_index
        ],
        [meta.field_name]: {
          ...newValue
        }
      };
      setAttributes({ [repeater_parent_name]: updatedOuterRepeater });
    }
  } else {
    // ROOT ELEMENT-------------
    setAttributes({ [meta.field_name]: newValue });
  }
};

export default trUpdateField;
