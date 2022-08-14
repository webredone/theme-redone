const { unregisterBlockType } = wp.blocks

const unregisterWpCoreBlocks = () => {
  if (wp.data.select('core/blocks').getBlockType('core/shortcode')) {
    unregisterBlockType('core/shortcode')
  }
  if (wp.data.select('core/blocks').getBlockType('core/archives')) {
    unregisterBlockType('core/archives')
  }
  if (wp.data.select('core/blocks').getBlockType('core/categories')) {
    unregisterBlockType('core/categories')
  }
  if (wp.data.select('core/blocks').getBlockType('core/latest-comments')) {
    unregisterBlockType('core/latest-comments')
  }
  if (wp.data.select('core/blocks').getBlockType('core/latest-posts')) {
    unregisterBlockType('core/latest-posts')
  }
  if (wp.data.select('core/blocks').getBlockType('core/gallery')) {
    unregisterBlockType('core/gallery')
  }
  if (wp.data.select('core/blocks').getBlockType('core/audio')) {
    unregisterBlockType('core/audio')
  }
  if (wp.data.select('core/blocks').getBlockType('core/html')) {
    unregisterBlockType('core/html')
  }
  if (wp.data.select('core/blocks').getBlockType('core/calendar')) {
    unregisterBlockType('core/calendar')
  }
  if (wp.data.select('core/blocks').getBlockType('core/pullquote')) {
    unregisterBlockType('core/pullquote')
  }
  // if (wp.data.select("core/blocks").getBlockType("core/group")) {
  //   unregisterBlockType("core/group");
  // }
  if (wp.data.select('core/blocks').getBlockType('core/table')) {
    unregisterBlockType('core/table')
  }
  if (wp.data.select('core/blocks').getBlockType('core/verse')) {
    unregisterBlockType('core/verse')
  }
  if (wp.data.select('core/blocks').getBlockType('core/buttons')) {
    unregisterBlockType('core/buttons')
  }
  if (wp.data.select('core/blocks').getBlockType('core/rss')) {
    unregisterBlockType('core/rss')
  }
  if (wp.data.select('core/blocks').getBlockType('core/button')) {
    unregisterBlockType('core/button')
  }
  // if (wp.data.select("core/blocks").getBlockType("core/columns")) {
  //   unregisterBlockType("core/columns");
  // }
  if (wp.data.select('core/blocks').getBlockType('core/more')) {
    unregisterBlockType('core/more')
  }
  if (wp.data.select('core/blocks').getBlockType('core/social-links')) {
    unregisterBlockType('core/social-links')
  }
  if (wp.data.select('core/blocks').getBlockType('core/search')) {
    unregisterBlockType('core/search')
  }
  if (wp.data.select('core/blocks').getBlockType('core/nextpage')) {
    unregisterBlockType('core/nextpage')
  }
  // XXX: separator is needed for wysywyg blocks
  // unregisterBlockType("core/separator");
  unregisterBlockType('core/tag-cloud')
  unregisterBlockType('core/spacer')
  unregisterBlockType('core/media-text')
  unregisterBlockType('core/embed')
  // unregisterBlockType("core/freeform");
  unregisterBlockType('core/video')
  unregisterBlockType('core/file')
  // unregisterBlockType("core/cover");
  unregisterBlockType('core/quote')
  unregisterBlockType('core/image')
  unregisterBlockType('core/preformatted')
  unregisterBlockType('core-embed/crowdsignal')
  unregisterBlockType('core-embed/speaker-deck')
  unregisterBlockType('core-embed/twitter')
  unregisterBlockType('core-embed/vimeo')
  unregisterBlockType('core-embed/youtube')
  unregisterBlockType('core-embed/facebook')
  unregisterBlockType('core-embed/instagram')
  unregisterBlockType('core-embed/wordpress')
  unregisterBlockType('core-embed/soundcloud')
  unregisterBlockType('core-embed/spotify')
  unregisterBlockType('core-embed/flickr')
  unregisterBlockType('core-embed/animoto')
  unregisterBlockType('core-embed/cloudup')
  unregisterBlockType('core-embed/collegehumor')
  unregisterBlockType('core-embed/dailymotion')
  unregisterBlockType('core-embed/funnyordie')
  unregisterBlockType('core-embed/hulu')
  unregisterBlockType('core-embed/imgur')
  unregisterBlockType('core-embed/issuu')
  unregisterBlockType('core-embed/kickstarter')
  unregisterBlockType('core-embed/meetup-com')
  unregisterBlockType('core-embed/mixcloud')
  unregisterBlockType('core-embed/photobucket')
  unregisterBlockType('core-embed/polldaddy')
  unregisterBlockType('core-embed/reddit')
  unregisterBlockType('core-embed/reverbnation')
  unregisterBlockType('core-embed/screencast')
  unregisterBlockType('core-embed/scribd')
  unregisterBlockType('core-embed/slideshare')
  unregisterBlockType('core-embed/smugmug')
  unregisterBlockType('core-embed/speaker')
  unregisterBlockType('core-embed/tiktok')
  unregisterBlockType('core-embed/amazon-kindle')
  unregisterBlockType('core-embed/ted')
  unregisterBlockType('core-embed/tumblr')
  unregisterBlockType('core-embed/videopress')
  unregisterBlockType('core-embed/wordpress-tv')

  unregisterBlockType('yoast/how-to-block')
  unregisterBlockType('yoast/faq-block')
  unregisterBlockType('yoast-seo/breadcrumbs')

  // image  styles remove
  // wp.blocks.unregisterBlockStyle("core/image", "default");
  // wp.blocks.unregisterBlockStyle("core/image", "rounded");
}

export default unregisterWpCoreBlocks
