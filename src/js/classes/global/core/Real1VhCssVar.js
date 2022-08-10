class Real1VhCssVar {
  constructor() {
    this.init()
  }

  calcAndSetCssVar() {
    document.body.style.setProperty('--vh', `${window.innerHeight * 0.01}px`)
  }

  init() {
    this.calcAndSetCssVar()
    window.addEventListener('resize', this.calcAndSetCssVar.bind(this))
  }
}

export { Real1VhCssVar }
