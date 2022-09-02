class Collapsible {
  static classes = {
    active: 'active',
    transition: 'transition',
    in: 'transition-backwards',
    out: 'transition-forwards',
    selectPicked: 'picked',
    accordion: 'accordion',
    selectOption: '.collapsible__option',
    selectCurrent: '.collapsible__select-current',
    trigger: '.collapsible__trigger',
    menu: '.collapsible__content',
    inner: '.collapsible__content__inner'
  }

  static getSiblings(el) {
    return Array.prototype.filter.call(el.parentNode.children, function(child) {
      return child !== el
    })
  }

  static setStyles(el, styleObj) {
    Object.entries(styleObj).forEach(([key, value]) => {
      el.style[key] = value
    })
  }

  static parseFrames(frames) {
    return JSON.parse(frames).filter(el => {
      return el
    })
  }

  static supportsHover() {
    return window.matchMedia('(hover: none)').matches
  }

  static triggerCallback(pointer, condition, fnArr) {
    if (condition) {
      fnArr.forEach(fn => {
        fn.call(pointer)
      })
    }
  }

  static toggleAnimPlayback(animation) {
    animation.updatePlaybackRate((animation.playbackRate *= -1))
    animation.play()
  }

  constructor(props) {
    this.node = props.node
    this.trigger = this.node.querySelector(this.constructor.classes.trigger)
    this.menu = this.node.querySelector(this.constructor.classes.menu)
    this.inner = this.node.querySelector(this.constructor.classes.inner)

    this.isInAccordion = this.node.parentElement.classList.contains(
      this.constructor.classes.accordion
    )
    this.accordion = this.isInAccordion ? this.node.parentElement : null
    this.siblings = []

    this.easing =
      this.accordion?.dataset?.easing ||
      this.node?.dataset?.easing ||
      'ease-in-out'

    this.duration =
      +this.accordion?.dataset?.duration || +this.node?.dataset?.duration || 300

    this.initiallyOpen = this.node.dataset.hasOwnProperty('initiallyOpen')
    this.closeOnOutsideClick = this.node.dataset.hasOwnProperty(
      'closeOnOutsideClick'
    )

    this.anim = this.menu.animate(this.setFrames(), {
      easing: this.easing,
      duration: this.duration,
      fill: 'both',
      direction: this.initiallyOpen ? 'reverse' : 'normal'
    })

    this.hoverTrigger = this.node.dataset.hasOwnProperty('hoverTrigger')

    this.node.closeSelf = this.close.bind(this)

    this.hasCustomKeyframes = this.node.dataset.hasOwnProperty('keyframes')
    if (!this.isInAccordion && this.hasCustomKeyframes) {
      this.passedFrames = this.constructor.parseFrames(
        this.node.dataset.keyframes
      )
    }

    this.init()
  }

  setFrames() {
    return this.hasCustomKeyframes
      ? this.passedFrames
      : [{ height: '0' }, { height: `${this.inner.scrollHeight}px` }]
  }

  toggle() {
    this.anim.effect.setKeyframes(this.setFrames())
    this.node.classList.remove(
      this.constructor.classes.active,
      this.constructor.classes.in,
      this.constructor.classes.out
    )
    this.node.classList.add(this.constructor.classes.transition)
    if (this.anim.playbackRate === 1) {
      this.node.classList.add(
        this.initiallyOpen
          ? this.constructor.classes.out
          : this.constructor.classes.in
      )
      this.constructor.toggleAnimPlayback(this.anim)
      return
    }

    this.node.classList.add(
      this.initiallyOpen
        ? this.constructor.classes.in
        : this.constructor.classes.out
    )
    this.constructor.toggleAnimPlayback(this.anim)
  }

  onMouseEnter() {
    this.constructor.triggerCallback(this, this.anim.playbackRate != 1, [
      this.toggle,
      this.handleAccordion
    ])
  }

  onClick() {
    this.constructor.triggerCallback(this, true, [
      this.toggle,
      this.handleAccordion
    ])
  }

  close() {
    this.anim.effect.setKeyframes(this.setFrames())
    this.node.classList.remove(this.constructor.classes.in)
    if (
      [
        this.constructor.classes.active,
        this.constructor.classes.out
      ].some(className => this.node.classList.contains(className))
    ) {
      this.node.classList.remove(
        this.constructor.classes.active,
        this.constructor.classes.out
      )
      this.node.classList.add(
        this.constructor.classes.transition,
        this.constructor.classes.in
      )
      this.constructor.toggleAnimPlayback(this.anim)
    }
  }

  handleAccordion() {
    if (
      this.isInAccordion &&
      this.accordion.dataset.hasOwnProperty('collapseSiblings')
    ) {
      this.siblings.forEach(sibling => {
        sibling.closeSelf()
      })
    }
  }

  initEvents() {
    this.anim.addEventListener('finish', event => {
      if (this.initiallyOpen) {
        this.onFinish(event)
        return
      }
      this.onFinish(event, false)
    })

    if (
      this.isInAccordion ||
      this.constructor.supportsHover() ||
      !this.hoverTrigger
    ) {
      this.trigger.addEventListener('click', this.onClick.bind(this))
      return
    }

    this.trigger.addEventListener('mouseover', this.onMouseEnter.bind(this))
    this.node.addEventListener('mouseleave', this.close.bind(this))
  }

  setStartState() {
    if (this.hasCustomKeyframes) {
      this.constructor.setStyles(this.menu, this.passedFrames[0])
      return
    }
    this.constructor.setStyles(this.menu, { height: '0px' })
  }

  setEndState() {
    if (this.hasCustomKeyframes) {
      this.constructor.setStyles(
        this.menu,
        this.passedFrames[this.passedFrames.length - 1]
      )
      return
    }
    this.constructor.setStyles(this.menu, { height: 'auto' })
  }

  onFinish(event, reverse = true) {
    this.anim.cancel()

    this.node.classList.remove(
      this.constructor.classes.transition,
      this.constructor.classes.in,
      this.constructor.classes.out
    )

    if (event.target.playbackRate * (reverse ? 1 : -1) > 0) {
      this.node.classList.remove(this.constructor.classes.active)
      this.trigger.setAttribute('aria-expanded', false)
      this.setStartState()
      return
    }
    this.node.classList.add(this.constructor.classes.active)
    this.trigger.setAttribute('aria-expanded', true)
    this.setEndState()
  }

  stopPropagationInTrigger() {
    const aTag = this.trigger.querySelector('a')
    if (!aTag) return
    aTag.addEventListener('click', e => {
      e.stopPropagation()
    })
  }

  init() {
    this.anim.playbackRate *= -1
    this.anim.cancel()

    this.initEvents()

    if (this.isInAccordion) {
      this.siblings.push(...this.constructor.getSiblings(this.node))
    }

    this.node.style.setProperty(
      '--collapsible-duration',
      `${this.duration / 1000}s`
    )

    this.stopPropagationInTrigger()

    if (this.initiallyOpen) {
      this.node.classList.add(this.constructor.classes.active)
      this.trigger.setAttribute('aria-expanded', true)
      this.setEndState()
      return
    } else {
      this.trigger.setAttribute('aria-expanded', false)
    }
    this.setStartState()
  }
}

class CollapsibleSelect extends Collapsible {
  static setSelectCurrent(trigger, option, node) {
    trigger.textContent = option.textContent
    if (option.dataset.hasOwnProperty('value')) {
      node.setAttribute('data-value', option.dataset.value)
    }
  }

  constructor({ node }) {
    super({ node })
    this.initSelect()
  }

  initSelect() {
    const options = this.node.querySelectorAll(
      this.constructor.classes.selectOption
    )
    const triggerSpan = this.trigger.querySelector(
      this.constructor.classes.selectCurrent
    )
    options.forEach(option => {
      if (option.classList.contains(this.constructor.classes.selectPicked)) {
        this.constructor.setSelectCurrent(triggerSpan, option, this.node)
      }

      option.addEventListener('click', () => {
        this.constructor.getSiblings(option).forEach(sibling => {
          sibling.classList.remove(this.constructor.classes.selectPicked)
        })
        option.classList.add(this.constructor.classes.selectPicked)
        this.constructor.setSelectCurrent(triggerSpan, option, this.node)
        this.close()
      })
    })
  }
}

class Collapsibles {
  constructor() {
    this.nodes = document.querySelectorAll('.collapsible')
    if (!this.nodes) return
    this.collapsibles = []
    this.init()
  }

  initEvents() {
    // // Only usable if resize is fired during transition (not needed)
    window.addEventListener('resize', () => {
      this.collapsibles.forEach(col => {
        col.anim.effect.setKeyframes(col.setFrames())
      })
    })

    document.addEventListener('click', e => {
      this.collapsibles.forEach(col => {
        if (
          !col.isInAccordion &&
          col.closeOnOutsideClick &&
          !e.composedPath().includes(col.node) &&
          col.anim.playbackRate > 0
        ) {
          col.toggle()
        }
      })
    })
  }

  init() {
    this.nodes.forEach(node => {
      if (node.dataset.hasOwnProperty('select')) {
        this.collapsibles.push(new CollapsibleSelect({ node }))
      } else {
        this.collapsibles.push(new Collapsible({ node }))
      }
    })
    this.initEvents()
  }
}

new Collapsibles()
