const { Dashicon } = wp.components

const TrTooltip = ({ children, tooltip, help = false, custom = false }) => {
  return (
    <div className={`tr-tooltip ${help ? 'tr-tooltip--help' : ''}`}>
      {!custom ? <Dashicon icon="editor-help" /> : children}
      <div className="tr-tooltip__inner">{tooltip}</div>
    </div>
  )
}

export default TrTooltip
