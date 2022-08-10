import axios from 'axios'
/**
 * @desc Replaces <img src="path.svg" class="js-async-svg" /> into SVG code
 * (Custom replacement for SVG inline plugin's code that pulled whole jQuery for one small script)
 */
class TransformSvgImgsToSvgCode {
  constructor() {
    this.svgImages = document.querySelectorAll('img.js-async-svg') || false
    this.fetchSvgCode = this.fetchSvgCode.bind(this)
    this.protocol = location.protocol
    this.init()
  }

  fetchSvgCode($selector, svg_url) {
    let svg_path = svg_url
    if (this.protocol === 'https:' && !svg_url.includes('https')) {
      svg_path = svg_url.replace('http', 'https')
    }
    axios
      .get(svg_path, { responseType: 'text' })
      .then(res => {
        return res.data
      })
      .then(svg_code => {
        $selector.outerHTML = svg_code
      })
      .catch(err => console.log(err))
  }

  transformToCode() {
    const svgsToLazyLoad = Array.from(this.svgImages)
    if (!!window.IntersectionObserver) {
      let observer = new IntersectionObserver(
        (svgsToLazyLoad, observer) => {
          svgsToLazyLoad.forEach(SVGtoLoad => {
            if (SVGtoLoad.isIntersecting) {
              // this is svg
              if (SVGtoLoad.target.dataset.src.endsWith('.svg')) {
                this.fetchSvgCode(
                  SVGtoLoad.target,
                  SVGtoLoad.target.dataset.src
                )
                // this is a regular image
              } else {
                SVGtoLoad.target.src = SVGtoLoad.target.dataset.src
              }
              observer.unobserve(SVGtoLoad.target)
            }
          })
        },
        { rootMargin: '0px 0px 300px 0px' }
      )
      svgsToLazyLoad.forEach(img => {
        observer.observe(img)
      })
    } else {
      setTimeout(() => {
        svgsToLazyLoad.forEach(SVGtoLoad => {
          const svg_url = SVGtoLoad.dataset.src
          // this is svg
          if (svg_url.endsWith('.svg')) {
            this.fetchSvgCode(SVGtoLoad, svg_url)
          } else {
            // this is a regular image
            SVGtoLoad.target.src = svg_url
          }
        })
      }, 2000)
    }
  }

  init() {
    if (this.svgImages) {
      // console.log('Should be able to replace now')
      this.transformToCode()
    } else {
      return false
    }
  }
}

export { TransformSvgImgsToSvgCode }
