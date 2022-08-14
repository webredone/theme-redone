const tr_body_has_class = className =>
  document.body.classList.contains(className)

/**

 * @param {HTMLelement} element to look siblings for
 * @returns {HTMLcollection} siblings
 */
const tr_siblings = el => {
  return Array.prototype.filter.call(el.parentNode.children, function(child) {
    return child !== el
  })
}

/**
 * @returns {number} - CrossBrowser compatible scrollTop
 */

const tr_get_scrolled_pos_y = () => {
  const scroll =
    window.scrollY || // Modern Way (Chrome, Firefox)
    window.pageYOffset || //  (Modern IE, including IE11
    document.documentElement.scrollTop
  return scroll //  (Old IE, 6,7,8),
}

function tr_closest(el, selector) {
  var matchesFn

    // find vendor prefix
  ;[
    'matches',
    'webkitMatchesSelector',
    'mozMatchesSelector',
    'msMatchesSelector',
    'oMatchesSelector'
  ].some(function(fn) {
    if (typeof document.body[fn] == 'function') {
      matchesFn = fn
      return true
    }
    return false
  })

  var parent

  // traverse parents
  while (el) {
    parent = el.parentElement
    if (parent && parent[matchesFn](selector)) {
      return parent
    }
    el = parent
  }

  return null
}

/**
 * @param {string} pageName - WP className of the specific page
 * @returns {bool}
 */
const tr_is_page = pageName => tr_body_has_class(pageName)

/**
 * @returns {bool}
 */
const tr_is_blog = () => tr_body_has_class('blog')

/**
 * @param {string} cptName=false - name of the CPT,
 * if nothing is passed -> checks if we are on blog single template
 * @returns {bool}
 */
const tr_is_single = (cptName = false) => {
  if (!cptName) return tr_body_has_class('single-post')
  return tr_body_has_class(`single-${cptName}`)
}

/**
 * @returns {bool}
 */
const tr_is_search_page = () => tr_body_has_class('search')

/**
 * @param {string} templateName=false - optional; If not passed it checks if we are on a template,
 * if it's passed, it checks if we are on a specific page template
 * @returns {bool}
 */
const tr_is_page_template = (templateName = false) => {
  // templateName - is a part of the t-template.php file
  // name without t- and .php
  const baseClass = 'page-template'
  if (!templateName) {
    return tr_body_has_class(baseClass)
  }
  return tr_body_has_class(`${baseClass}-t-${templateName}`)
}

/**
 * @param {string} archiveCptName=false, optional
 * if not passed, it just checks if we are on a archive template,
 * if passed, it checks if we are on the archive template for a
 * specific CPT passed
 * @returns {bool}
 */
const tr_is_archive = (archiveCptName = false) => {
  if (!archiveCptName) return tr_body_has_class('archive')
  return tr_body_has_class(`post-type-archive-${archiveCptName}`)
}

/**
 * @param {string} categoryName=false, optional
 * if not passed, it just checks if we are on a category template,
 * if passed, it checks if we are on the category template for a
 * specific category name passed
 * @returns {any}
 */
const tr_is_category = (categoryName = false) => {
  const baseClass = 'category'
  if (!categoryName) return tr_body_has_class(baseClass)
  return tr_body_has_class(`${baseClass}-${categoryName}`)
}

/**
 * @param {event} evt = e (from the element)
 * @param {bool} isZIP=false
 * @returns {bool}
 */
const tr_validateNumberHelper = (evt, isZIP = false) => {
  var theEvent = evt || window.event

  // Handle paste
  if (theEvent.type === 'paste') {
    key = event.clipboardData.getData('text/plain')
  } else {
    // Handle key press
    var key = theEvent.keyCode || theEvent.which
    key = String.fromCharCode(key)
  }

  const preventTyping = () => {
    theEvent.returnValue = false
    if (theEvent.preventDefault) theEvent.preventDefault()
  }

  var regex = /[0-9]|\./
  if (isZIP) {
    if (evt.target.value.length > 4) {
      preventTyping()
    }
  }

  if (!regex.test(key)) {
    preventTyping()
  }
}

export {
  tr_get_scrolled_pos_y,
  tr_closest,
  tr_siblings,
  tr_validateNumberHelper,
  // WP pages checks
  tr_is_page,
  tr_is_blog,
  tr_is_single,
  tr_is_search_page,
  tr_is_category,
  tr_is_archive,
  tr_is_page_template
}
