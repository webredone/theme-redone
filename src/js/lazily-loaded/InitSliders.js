import { Slider } from '../classes/global/UI/Slider'

class InitSliders {
  constructor() {
    this.init()
  }

  init() {
    new Slider('.slider--test', {
      arrowsDisplay: false,
      dotsDisplay: false,
      wrapSlides: true,
      slideWidth: `${100 / 3}%`,
      draggable: false,
      gap: 'clamp(20px, 5.21vw, 100px)',
      marginBottom: 'clamp(20px, 5.21vw, 100px)',
      responsive: {
        999: {
          slidesToScroll: 2,
          dotsDisplay: true,
          arrowsDisplay: true,
          wrapSlides: false,
          draggable: true,
          marginBottom: 0,
          slideWidth: '50%',
          speed: 3
        },
        767: {
          slidesToScroll: 1,
          slideWidth: '80%'
        }
      }
    })

    new Slider('.slider--test2', {
      slideWidth: '30%',
      autoPlayInterval: 2000,
      gap: '50px',
      dragFree: true,
      dotsDisplay: false,
      arrowsDisplay: false,
      loop: true,
      autoplay: true,
      responsive: {
        999: {
          gap: '10px',
          slideWidth: '50%',
          autoPlayInterval: 5000,
          dotsDisplay: false,
          arrowsDisplay: true,
          speed: 3
        },
        700: {
          gap: '20px',
          slideWidth: '100%',
          autoPlayInterval: 1000,
          marginBottom: 30
        }
      }
    })
  }
}

new InitSliders()
