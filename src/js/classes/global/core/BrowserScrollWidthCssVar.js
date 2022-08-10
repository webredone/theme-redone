class BrowserScrollWidthCssVar {
  constructor() {
    this.init()
  }

  calcAndSetCssVar() {
    const scrollWidth = window.innerWidth - document.body.clientWidth + 'px'
    document.body.style.setProperty('--browser-scroll-width', scrollWidth)
  }

  init() {
    this.calcAndSetCssVar()
    window.addEventListener('resize', this.calcAndSetCssVar.bind(this))
  }
}

export { BrowserScrollWidthCssVar }
