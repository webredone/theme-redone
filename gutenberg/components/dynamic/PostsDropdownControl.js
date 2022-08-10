const compose = wp.compose;
const { withSelect } = wp.data;
const { SelectControl } = wp.components;

const PostsDropdownControl = compose.compose(
  // withSelect allows to get posts for SelectControl and also to get the post meta value
  withSelect(function(select, props) {
    return {
      posts: select("core").getEntityRecords("postType", "members", {
        per_page: -1
      })
    };
  })
)(function(props) {
  // options for SelectControl
  var options = [];

  // if posts found
  if (props.posts) {
    options.push({ value: 0, label: "Select something" });
    props.posts.forEach(post => {
      const jsonMemberOBJ = JSON.stringify({
        id: post.id,
        img: post.acf.image,
        name: post.acf.name,
        position: post.acf.position
      });

      options.push({
        value: jsonMemberOBJ,
        label: post.title.rendered
      });
    });
  } else {
    options.push({ value: 0, label: "Loading..." });
  }

  return (
    <SelectControl
      label="Select a post"
      options={options}
      onChange={memberObj => {
        const jsonDecodedMemberOBJ = JSON.parse(memberObj);
        props.onChange(jsonDecodedMemberOBJ);
      }}
      value={props.valueIfSaved || props.metaValue}
    />
  );
});

export default PostsDropdownControl;
