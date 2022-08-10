import { tr_closest } from '../../../helpers/helpers'

class Modals {
  constructor() {
    this.parent = document.querySelector('.modal--custom')
    this.allParents = document.querySelectorAll('.modal--custom')
    this.closeTriggers = document.querySelectorAll('.modal-close')
    this.modalTriggers = document.querySelectorAll('.modalTrigger')
    if (this.allParents.length) {
      this.init()
    }
  }

  openModal(modalId, $trigger) {
    const $modal = document.querySelector(modalId)
    // if video modal
    if ($modal.classList.contains('modal--video')) {
      const videoURL =
        $trigger.dataset.videoUrl.replace('watch?v=', 'embed/') +
        '?autoplay=true'
      document.querySelector('iframe', $modal).src = videoURL
    } // end if video modal

    $modal.classList.add('modal-is-open')
    document.body.classList.add('modal-is-open')
  }

  closeModal() {
    this.closeTriggers.forEach(($closeTrigger, i) => {
      $closeTrigger.addEventListener('click', () => {
        if (tr_closest($closeTrigger, '.modal--video')) {
          document.querySelector('iframe', this.parent).src = ''
        }
        document.body.classList.remove('modal-is-open')
        this.parent.classList.remove('modal-is-open')
      })
    })
  }

  triggersLoop() {
    this.modalTriggers.forEach($modalTrigger => {
      $modalTrigger.addEventListener('click', e => {
        e.preventDefault()
        this.openModal(e.target.getAttribute('href'), e.target)
      })
    })
  }

  init() {
    this.triggersLoop()
    this.closeModal()
  }
}

export { Modals }
