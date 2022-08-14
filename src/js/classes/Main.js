import { Real1VhCssVar } from './global/core/Real1VhCssVar'
import { BrowserScrollWidthCssVar } from './global/core/BrowserScrollWidthCssVar'
import { Header } from './global/UI/Header'
import { Modals } from './global/UI/Modals'
import { SmoothScroll } from './global/core/SmoothScroll'
import { LazyLoadImages } from './global/core/LazyLoadImages'
import { TransformSvgImgsToSvgCode } from './global/core/TransformSvgImgsToSvgCode'
import { IntersectionTransitions } from './global/UI/IntersectionTransitions'
import { LazyScriptsImporter } from './global/core/LazyScriptsImporter'

class Main {
  constructor() {
    this.init()
  }

  globalScripts() {
    new Real1VhCssVar()
    new BrowserScrollWidthCssVar()
    new Header(true)
    new TransformSvgImgsToSvgCode()
    new IntersectionTransitions()
    new LazyScriptsImporter()

    new Modals()
    new SmoothScroll()
    window.addEventListener('load', () => new LazyLoadImages())
  }

  init() {
    document.addEventListener('DOMContentLoaded', () => {
      // scripts used on all pages
      this.globalScripts()
    })
  }
}

export default Main
