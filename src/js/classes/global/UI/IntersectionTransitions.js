class IntersectionTransitions {
  constructor() {
    this.threshold = 0.35
    this.rootMargin = '80px 0px 0px 0px'
    this.selectorToObserve = '.ivtr'
    this.classInView = 'inView'
    this.observeIntersections = this.observeIntersections.bind(this)
    this.init()
  }

  applyDelayToChildren() {
    const ivtrParent = document.querySelectorAll('.ivtr-delayed') || false
    if (ivtrParent) {
      ivtrParent.forEach(parent => {
        const delayStep = +parent.dataset.delaystep
        const children =
          parent.querySelectorAll(this.selectorToObserve) || false
        if (children) {
          children.forEach((child, childKey) => {
            child.style.transitionDelay = `${delayStep * childKey}s`
          })
        }
      })
    }
  }

  observeIntersections() {
    const allTargets =
      document.querySelectorAll(this.selectorToObserve) || false
    let options = {
      rootMargin: this.rootMargin,
      threshold: this.threshold
    }
    let callback = (entries, observer) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add(this.classInView)
        } else {
          if (entry.target.dataset.inOut) {
            entry.target.classList.remove(this.classInView)
          }
        }
        // Each entry describes an intersection change for one observed
        // target element:
        //   entry.boundingClientRect
        //   entry.intersectionRatio
        //   entry.intersectionRect
        //   entry.isIntersecting
        //   entry.rootBounds
        //   entry.target
        //   entry.time
      })
    }
    if (allTargets) {
      const observables = Array.from(allTargets)
      if (!!window.IntersectionObserver) {
        let observer = new IntersectionObserver(callback, options)
        observables.forEach(observable => {
          observer.observe(observable)
        })
      }
    } else {
      return false
    }
  }

  init() {
    this.applyDelayToChildren()
    this.observeIntersections()
  }
}

export { IntersectionTransitions }
