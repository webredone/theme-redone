import EmblaCarousel from 'embla-carousel'

const emblaDefaultOptions = {
  containerSelector: '*',
  startIndex: 0,
  selectedClass: 'is-selected',
  draggableClass: 'is-draggable',
  draggingClass: 'is-dragging'
}

class TrSlider {
  constructor(wrap, conf) {
    this.wrap = wrap
    this.options = { ...emblaDefaultOptions }
    this.emblaNode = this.wrap.querySelector('.embla')
    this.emblaSlides = this.emblaNode.querySelectorAll('.embla__slide')
    this.emblaContainer = this.emblaNode.querySelector('.embla__container')
    this.emblaDots = this.wrap.querySelector('.embla__dots') || false
    this.prevBtn = this.wrap.querySelector('.embla__btn-prev') || false
    this.embla
    this.nextBtn = this.wrap.querySelector('.embla__btn-next') || false
    this.conf = conf
    this.confDefault = this.getConfDefault()
    this.breakpoints = conf?.responsive ? conf.responsive : null
    this.defaultOptions = {
      slidesToScroll: 1,
      align: 'start',
      slideWidth: '50%',
      speed: 10,
      dotsDisplay: true,
      arrowsDisplay: true,
      draggable: true,
      wrapSlides: false,
      marginBottom: 0,
      gap: 0,
      loop: false,
      containScroll: 'trimSnaps',
      dragFree: false,
      autoplay: false,
      autoPlayInterval: 2000
    }
    this.finalOptions = {
      ...this.defaultOptions,
      ...this.confDefault
    }
    this.dotsArray
    this.timer = 0
    this.resizeTimer = 0
    this.emblaAutoPlayCalled = false
    this.classInit()
  }

  updateArrowsState() {
    if (!this.prevBtn || !this.nextBtn) return
    this.prevBtn.classList[this.embla.canScrollPrev() ? 'remove' : 'add'](
      'btn-disabled'
    )
    this.nextBtn.classList[this.embla.canScrollNext() ? 'remove' : 'add'](
      'btn-disabled'
    )
  }

  initSliderArrows() {
    if (!this.prevBtn || !this.nextBtn) return
    this.updateArrowsState()
    this.embla.on('select', () => this.updateArrowsState())
    this.prevBtn.addEventListener('click', () => this.embla.scrollPrev(), true)
    this.nextBtn.addEventListener('click', () => this.embla.scrollNext(), true)
  }

  emblaDotsSetUp() {
    if (!this.finalOptions.dotsDisplay || !this.emblaDots) return

    const removeAllChildNodes = parent => {
      while (parent.firstChild) {
        parent.removeChild(parent.firstChild)
      }
    }

    const selectDotBtn = (dotsArray, embla) => {
      const previous = embla.previousScrollSnap()
      const selected = embla.selectedScrollSnap()
      if (!dotsArray[previous] || !dotsArray[selected]) return
      dotsArray[previous].classList.remove(emblaDefaultOptions.selectedClass)
      dotsArray[selected].classList.add(emblaDefaultOptions.selectedClass)
    }

    const init = () => {
      removeAllChildNodes(this.emblaDots)
      this.dotsArray = generateDots(this.emblaDots, this.embla)
      selectDotBtn(this.dotsArray, this.embla)
      this.embla.on('select', () => selectDotBtn(this.dotsArray, this.embla))
      this.embla.on('init', () => selectDotBtn(this.dotsArray, this.embla))
    }

    const generateDots = (dots, embla) => {
      const scrollSnaps = embla.scrollSnapList()
      const dotsFrag = document.createDocumentFragment()
      const dotsArray = scrollSnaps.map(() => document.createElement('button'))
      dotsArray.forEach((dotNode, i) => {
        dotNode.classList.add('embla__dot')
        dotNode.innerHTML = i + 1
        dotNode.addEventListener('click', () => embla.scrollTo(i), false)
        dotsFrag.appendChild(dotNode)
      })
      dots.appendChild(dotsFrag)
      this.wrap.style.setProperty('--dots-length', dotsArray.length)
      return dotsArray
    }

    return { init }
  }

  reconfigureOptions(checkBreakpoints = false) {
    this.finalOptions = {
      ...this.defaultOptions,
      ...this.confDefault
    }

    if (checkBreakpoints) {
      const breakPointsHighToLow = [...Object.keys(this.breakpoints)].sort(
        (a, b) => +b - +a
      )

      breakPointsHighToLow.forEach(maxWidthVal => {
        if (window.matchMedia(`(max-width: ${maxWidthVal}px)`).matches) {
          this.finalOptions = {
            ...this.finalOptions,
            ...this.breakpoints[maxWidthVal]
          }
        }
      })
    }

    const cssObject = {
      '--gap': this.finalOptions.gap,
      '--mb': this.finalOptions.marginBottom,
      '--slideWidth': this.finalOptions.slideWidth,
      '--containerWrap': this.finalOptions.wrapSlides ? 'wrap' : 'nowrap',
      '--dotsDisplay': this.finalOptions.dotsDisplay ? 'flex' : 'none',
      '--btnDisplay': this.finalOptions.arrowsDisplay ? 'flex' : 'none'
    }

    Object.entries(cssObject).forEach(([key, val]) => {
      this.wrap.style.setProperty(key, val)
    })

    if (this.finalOptions.autoplay) {
      if (!this.emblaAutoPlayCalled) {
        this.autoplay().init()
      }
      this.emblaNode.classList.add('autoplay')
      this.autoplay().play()
    } else {
      if (this.emblaNode.classList.contains('autoplay')) {
        this.autoplay().destroy()
      }
    }

    this.emblaContainer.classList[
      this.finalOptions.draggable === false ? 'add' : 'remove'
    ]('no-transform')

    this.embla.reInit({
      align: this.finalOptions.align,
      slidesToScroll: this.finalOptions.slidesToScroll,
      draggable: this.finalOptions.draggable,
      loop: this.finalOptions.loop,
      containScroll: this.finalOptions.containScroll,
      dragFree: this.finalOptions.dragFree,
      speed: this.finalOptions.speed
    })
  }

  getConfDefault() {
    const confDefault = {}
    Object.entries(this.conf).forEach(([propKey, propVal]) => {
      if (propKey !== 'responsive') confDefault[propKey] = propVal
    })
    return confDefault
  }

  initSlider() {
    this.breakpoints ? this.reconfigureOptions(true) : this.reconfigureOptions()
  }

  onResize() {
    if (this.breakpoints) this.initSlider()
    this.emblaDotsSetUp()?.init && this.emblaDotsSetUp().init()
    this.updateArrowsState()
  }

  sliderSetUp() {
    this.embla = EmblaCarousel(this.emblaNode, this.options)
    this.initSlider()
    this.emblaDotsSetUp()?.init && this.emblaDotsSetUp().init()
  }

  autoplay() {
    const play = () => {
      stop()
      this.timer = setTimeout(next, +this.finalOptions.autoPlayInterval)
    }

    const destroy = () => {
      stop()
      this.timer = 0
    }

    const stop = () => clearTimeout(this.timer)

    const next = () => {
      this.embla.canScrollNext()
        ? this.embla.scrollNext()
        : this.embla.scrollTo(0)
      play()
    }

    const reset = () => {
      if (!this.timer) return
      stop()
      play()
    }

    const init = () => {
      this.emblaAutoPlayCalled = true
      document.addEventListener('visibilitychange', () => {
        if (document.visibilityState === 'hidden') return stop()
        reset()
      })
      window.addEventListener('pagehide', e => {
        if (e.persisted) stop()
      })
      this.embla.on('pointerDown', destroy)
      this.embla.on('pointerUp', play)
      this.emblaNode.addEventListener('mouseenter', destroy)
      this.emblaNode.addEventListener('mouseleave', play)
      play()
    }
    return { play, stop, destroy, init }
  }

  classInit() {
    this.sliderSetUp()
    this.initSliderArrows()
    this.embla.on('pointerDown', () => {
      this.emblaNode.classList.add(this.options.draggingClass)
    })
    this.embla.on('pointerUp', () => {
      this.emblaNode.classList.remove(this.options.draggingClass)
    })

    window.addEventListener('resize', () => {
      clearTimeout(this.resizeTimer)
      this.resizeTimer = setTimeout(() => {
        this.onResize()
      }, 250)
    })
  }
}

class Slider {
  /**
   * Define and init slider/s
   * @param {string} **selector** - Sliders className selector; For example: '.custom-class-name'
   * @param {Object} **optionsObject** - Default and responsive options for the slider **(more details below)**.
   * @example
   *   new Slider('.embla--test2', {
   *    slideWidth: '30%',
   *    autoPlayInterval: 2000,
   *    gap: '50px',
   *    dragFree: true,
   *    dotsDisplay: false,
   *    arrowsDisplay: false,
   *    loop: true,
   *    autoplay: true,
   *    responsive: {
   *      999: {
   *        gap: '10px',
   *        slideWidth: '50%',
   *        autoPlayInterval: 5000,
   *        arrowsDisplay: true,
   *        speed: 3,
   *      }
   *    }
   *  })
   * ----------------------------------------------------
   * Properties that optionsObject accepts are listed below:
   * ----------------------------------------------------
   * @property {number} **slidesToScroll** - Group slides together. Drag interactions, dot navigation, and previous/next buttons are mapped to group slides into the given number. **Default: 1**
   * @property {string | number} **align** - Align the slides relative to the slider's viewport. Use one of the predefined alignments start, center or end. Alternatively, provide a number between 0 - 1 to align the slides, where 0.5 equals 50%. **Default: 'start'**
   * @property {number} **speed** - Adjust scroll speed when triggered by any of the API methods. Higher numbers enables faster scrolling. Drag interactions are not affected because speed is then determined by the drag force. **Default: 10**
   * @property {boolean} **draggable** - Enables for scrolling the slider with mouse and touch interactions. **Default: true**
   * @property {boolean} **dragFree** - Enables momentum scrolling. The speed and duration of the continued scrolling is proportional to how vigorous the drag gesture is. **Default: false**
   * @property {boolean} **loop** - Enables infinite looping. Slides need position: relative; for this to work. Automatically falls back to false if slide content isn't enough to loop. **Default: false**
   * @property {string} **containScroll** - Clear leading and trailing empty space that causes excessive scrolling. Use trimSnaps to only use snap points that trigger scrolling or keepSnaps to keep them. **Default: 'trimSnaps'**
   * @property {string} **slideWidth** - value[any css unit]. For example: 50%, 20vw, 100px. **Default: 50%**
   * @property {boolean} **dotsDisplay** - Show/Hide dots navigation. **Default: true**
   * @property {boolean} **arrowsDisplay** - Show/Hide arrows navigation. **Default: true**
   * @property {string} **gap** - Horizontal gap between slides [any css unit]. **Default: 0**
   * @property {string} **marginBottom** - Vertical gap between slides (or grid items if wrapSlides: true). [any css unit] **Default: 0**
   * @property {boolean} **wrapSlides** - Applies flex-wrap: wrap or no-wrap. **Default: false**
   * @property {boolean} **autoplay** - Whether or not to autoplay the slider. **Default: false**
   * @property {number} **autoPlayInterval** - If in autplay mode, This is the time in miliseconds before transitioning to the next slide. **Default: 2000**
   * @property {Object} **responsive** - Object whose keys are numbers that represent max-width, and values are objects we can use to overwrite or apply new params described above. These objects accept all the above mentioned params except for the "responsive" one. For example. responsive: { 400: {...SliderConfig}, 320: {...SliderConfig}} means, "max-width: 400px"...)
   *
   */
  constructor(selector, optionsObject) {
    this.selector = selector
    this.optionsObject = optionsObject
    if (!document.querySelector(selector)) return
    this.init()
  }

  init() {
    ;[...document.querySelectorAll(this.selector)].forEach($slider => {
      new TrSlider($slider.parentElement, this.optionsObject)
    })
  }
}

export { Slider }
