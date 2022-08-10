class Tabs {
  constructor() {
    this.allTabs = null

    if ((this.allTabs = document.querySelectorAll('.tabs'))) {
      this.init()
    }
  }

  removeAllActiveTabs(activeTabs) {
    for (let i = 0; i < activeTabs.length; i++) {
      const prevActiveTab = activeTabs[i]
      prevActiveTab.classList.remove('activeTab')
    }
  }

  onTabClick(_, anchor, parent) {
    let activeTabs = parent.querySelectorAll(
      ':scope > .tabs__nav > .activeTab, :scope > .tabs__content > .activeTab'
    )

    // remove previous active classes
    this.removeAllActiveTabs(activeTabs)

    anchor.classList.add('activeTab')
    const panelID = anchor.dataset.href
    const panel = parent.querySelector(
      `:scope > .tabs__content > [data-id="${panelID}"]`
    )
    panel.classList.add('activeTab')
  }

  init() {
    this.allTabs.forEach(tabs => {
      const allAnchors = [
        ...tabs.querySelectorAll(':scope > .tabs__nav > .tab-anchor')
      ]
      allAnchors.forEach(anchor => {
        anchor.addEventListener('click', e => {
          e.preventDefault()
          this.onTabClick(e, anchor, tabs)
        })
      })
    })
  }
}

new Tabs()
