const trBlockImagePreviewShow = (imgPath) => {
  const trImgPreviewEl = document.getElementById('tr__block-preview')
  if (!trImgPreviewEl) return
  // console.log('Replacing the image now')
  trImgPreviewEl.src = imgPath
  trImgPreviewEl.classList.add('jsIsVisible')
}

const trBlockImagePreviewHide = () => {
  const trImgPreviewEl = document.getElementById('tr__block-preview')
  if (!trImgPreviewEl) return
  trImgPreviewEl.classList.remove('jsIsVisible')
  trImgPreviewEl.src = ''
}

export { trBlockImagePreviewShow, trBlockImagePreviewHide }
