class LazyScriptsImporter {
  constructor() {
    this.themeScriptEl = document.getElementById('tr-js-main-js')

    this.scripts = [
      {
        targetClassName: 'collapsible',
        matchingScriptName: 'Collapsible',
        scriptTagId: 'collapsible',
        loaded: false,
        bodyClass: 'js--collapsible-loaded'
      },
      {
        targetClassName: 'tabs',
        matchingScriptName: 'Tabs',
        scriptTagId: 'tabs',
        loaded: false
      },
      {
        targetClassName: 'embla',
        matchingScriptName: 'InitSliders',
        scriptTagId: 'init-sliders',
        loaded: false
      }
    ]

    this.tryImport()
  }

  tryImport() {
    // if any of the of the scripts is not already imported,
    // and targetClassName exists, import the script
    const classesToLookFor = this.scripts.map(
      script => `.${script.targetClassName}`
    )

    const allSelectorElements = [
      ...document.querySelectorAll(classesToLookFor.join(', '))
    ]
    if (!allSelectorElements) return

    for (let script of this.scripts) {
      if (script.loaded) continue

      if (
        !allSelectorElements.some(el =>
          el.classList.contains(script.targetClassName)
        )
      ) {
        continue
      }

      script.loaded = true

      const scriptEL = document.createElement('script')
      scriptEL.id = `tr-js-ll--${script.scriptTagId}`
      scriptEL.src = `${window.tr_theme_url}/prod/lazily-loaded/${script.matchingScriptName}.min.js`

      this.themeScriptEl.after(scriptEL)

      if (script.hasOwnProperty('bodyClass')) {
        document.body.classList.add(script.bodyClass)
      }
    }
  }
}

export { LazyScriptsImporter }
