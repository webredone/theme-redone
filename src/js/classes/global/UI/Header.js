import { tr_get_scrolled_pos_y } from '../../../helpers/helpers'

class Header {
  /**
   * @param {boolean} hasScroll - if true, header will replace classes depending on it's scroll position
   * @returns {void} Header related logic for mobile devices
   */
  constructor(hasScroll) {
    this.header = document.querySelector('.header')
    this.navToggle = this.header.querySelector('.navbar-toggler')
    this.backdrop = document.querySelector('.backdrop')
    this.hasScroll = hasScroll
    this.scrollTop
    this.offsetTop = 60
    this.headerScroll = this.headerScroll.bind(this)
    this.init()
  }

  headerScroll() {
    this.scrollTop = tr_get_scrolled_pos_y()

    if (this.scrollTop >= this.offsetTop) {
      document.body.classList.add('jsOnScroll-header')
    } else {
      document.body.classList.remove('jsOnScroll-header')
    }
  }

  headerNavToggle() {
    this.navToggle.addEventListener('click', () => {
      document.body.classList.toggle('js-mob-menu-open')
    })

    this.backdrop.addEventListener('click', () => {
      if (document.body.classList.contains('js-mob-menu-open')) {
        document.body.classList.remove('js-mob-menu-open')
      }
    })
  }

  init() {
    this.headerNavToggle()
    if (this.hasScroll) {
      this.headerScroll()
      window.addEventListener('scroll', this.headerScroll)
    }
  }
}

export { Header }
