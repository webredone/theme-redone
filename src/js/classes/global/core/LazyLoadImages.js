const swapAllWithPreloaded = (dSrc, resUrl) => {
  for (let el of [
    ...document.querySelectorAll(`.main-content [data-img-src="${dSrc}"]`)
  ]) {
    if (el.nodeName === 'IMG') {
      if (!el.closest('.tr-img-wrap-outer').classList.contains('jsLoading')) {
        continue
      }
    } else {
      if (!el.classList.contains('jsLoading')) {
        continue
      }
    }
    swapLoadedSrc(el, resUrl)
  }
}

const swapLoadedSrc = (imgToLoad, loadedSrc) => {
  if (imgToLoad.nodeName === 'IMG') {
    imgToLoad.setAttribute('src', loadedSrc)
    imgToLoad.closest('.tr-img-wrap-outer').classList.remove('jsLoading')
  } else {
    imgToLoad.style.backgroundImage = `url('${loadedSrc}')`
    imgToLoad.classList.remove('jsLoading')
  }
}

class PreloadHelper {
  constructor(dSrc) {
    this.handlePromise(dSrc)
  }

  async handlePromise(dSrc) {
    try {
      const res = await fetch(dSrc)
      if (res.ok) {
        swapAllWithPreloaded(dSrc, res.url)
      }
    } catch (err) {
      console.log(err)
    }
  }
}

class LazyLoadImages {
  constructor() {
    this.preloadImagesPromises = new Map()
    this.preloadAllImages()
    this.lazyLoadSingle = this.lazyLoadSingle.bind(this)
    this.lazyLoadAll = this.lazyLoadAll.bind(this)
    this.init()
  }

  preloadAllImages() {
    const boundThis = this
    const allImagesOnPage = [
      ...document.querySelectorAll('.main-content [data-img-src]')
    ]

    // Fill Promises array
    for (const el of allImagesOnPage) {
      const dSrc = el.dataset.imgSrc
      if (!boundThis.preloadImagesPromises.has(dSrc)) {
        boundThis.preloadImagesPromises.set(dSrc, new PreloadHelper(dSrc))
      }
    }
  }

  lazyLoadSingle(imgToLoad) {
    let toLoadSrc = imgToLoad.dataset.imgSrc
    // If not preloaded and swapped
    if (imgToLoad.classList.contains('jsLoading')) {
      swapLoadedSrc(imgToLoad, toLoadSrc)
    }
  }

  lazyLoadAll() {
    const allTargets = document.querySelectorAll('.js-img-lazy') || false
    if (allTargets) {
      const imagesToLazyLoad = Array.from(allTargets)
      // const imagesToLazyLoad = [].slice.call(allTargets);
      if (!!window.IntersectionObserver) {
        let observer = new IntersectionObserver(
          (imagesToLazyLoad, observer) => {
            imagesToLazyLoad.forEach(imgToLoad => {
              if (imgToLoad.isIntersecting) {
                this.lazyLoadSingle(imgToLoad.target)
                observer.unobserve(imgToLoad.target)
              }
            })
          },
          { rootMargin: '0px 0px 200px 0px' }
        )
        imagesToLazyLoad.forEach(img => {
          observer.observe(img)
        })
      } else {
        setTimeout(() => {
          imagesToLazyLoad.forEach(imgToLoad => {
            this.lazyLoadSingle(imgToLoad)
          })
        }, 2000)
      }
    } else {
      return false
    }
  }

  init() {
    this.lazyLoadAll()
  }
}

export { LazyLoadImages }
