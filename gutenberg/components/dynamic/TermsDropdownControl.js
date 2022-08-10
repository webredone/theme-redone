const compose = wp.compose;
const { withSelect } = wp.data;
const { SelectControl } = wp.components;

const TermsDropdownControl = compose.compose(
  // withSelect allows to get posts for SelectControl and also to get the post meta value
  withSelect(function (select, props) {
    return {
      terms: select("core").getEntityRecords("taxonomy", "group", {
        per_page: 100,
      }),
    };
  })
)(function (props) {
  // options for SelectControl
  var options = [];

  // if terms found
  if (props.terms) {
    options.push({ value: "all", label: "All" });
    props.terms.forEach((term) => {
      options.push({
        value: term.slug,
        label: term.name,
      });
    });
  } else {
    options.push({ value: 0, label: "Loading..." });
  }

  return (
    <SelectControl
      label="Select posts group"
      options={options}
      onChange={(groupTerm) => {
        props.onChange(groupTerm);
      }}
      value={props.valueIfSaved || props.metaValue}
    />
  );
});

export default TermsDropdownControl;
