import Toastify from 'toastify-js'
import { stripHtmlAndReturnText } from './stripHtmlAndReturnText'

const showAlertIfMaxCharsExceeded = (max_chars, fieldNewValue) => {
  if (stripHtmlAndReturnText(fieldNewValue).length > max_chars) {
    Toastify({
      text: 'Reached maximum numbers of characters allowed.',
      duration: 3000,
      close: true,
      gravity: 'top', // `top` or `bottom`
      position: 'right', // `left`, `center` or `right`
      background: 'linear-gradient(to right, crimson, brown)',
      stopOnFocus: true, // Prevents dismissing of toast on hover
    }).showToast()

    return false
  } else {
    return true
  }
}

export default showAlertIfMaxCharsExceeded
