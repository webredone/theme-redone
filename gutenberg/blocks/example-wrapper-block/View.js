const { InnerBlocks } = wp.blockEditor

const View = ({ wrapper_bg_color }) => {
  return (
    <section
      className="example-wrapper-block"
      style={{ backgroundColor: `var(${wrapper_bg_color.value})` }}
    >
      <InnerBlocks.Content />
    </section>
  )
}

export default View
