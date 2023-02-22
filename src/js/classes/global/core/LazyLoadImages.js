class LazyLoadImages {
  offset = 200

  constructor() {
    this.imagesToLoad = document.querySelectorAll(
      '.main-content [data-img-src]'
    )
    this.init()
  }

  async loadAndSwap(imgToLoad) {
    const src = imgToLoad.dataset.imgSrc
    const wait = parseInt(imgToLoad.dataset.wait) || 0

    await new Promise(resolve => setTimeout(resolve, wait * 1000))

    const res = await fetch(src)
    if (!res.ok) return

    console.log('Finished resolving image: ', src)

    if (imgToLoad.nodeName === 'IMG') {
      imgToLoad.setAttribute('src', src)
      imgToLoad.closest('.tr-img-wrap-outer').classList.remove('jsLoading')
    } else {
      imgToLoad.style.backgroundImage = `url('${src}')`
      imgToLoad.classList.remove('jsLoading')
    }
  }

  init() {
    if (!this.imagesToLoad) return

    let observer = new IntersectionObserver(
      (entries, observer) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            this.loadAndSwap(entry.target)
            observer.unobserve(entry.target)
          }
        })
      },
      { rootMargin: `0px 0px ${this.offset}px 0px` }
    )

    this.imagesToLoad.forEach(img => {
      observer.observe(img)
    })
  }
}

export { LazyLoadImages }
