// import React from 'react'
// import { createRoot } from 'react-dom/client'
// import { createApp } from 'vue'
// import { createApp as petiteCreateApp } from 'petite-vue'
import SvelteCounter from '../../../src/js/svelte/SvelteCounter.svelte'
// import { ReactCounter } from '../../../src/js/react/ReactCounter'
// import VueCounter from '../../../src/js/vue/VueCounter.vue'

const apps_wraps = document.querySelectorAll('.spas-test')

if (apps_wraps) {
  apps_wraps.forEach(apps_wrap => {
    // start:Svelte
    new SvelteCounter({
      target: apps_wrap.querySelector('.svelte')
    })
    // end:Svelte

    // start:React
    // const root = createRoot(apps_wrap.querySelector('.react'))
    // root.render(<ReactCounter />)
    // end:React

    //start:Vue
    // const vueApp = createApp(VueCounter)
    // vueApp.mount(apps_wrap.querySelector('.vue'))
    //end:Vue

    //start:PetiteVue

    /*     petiteCreateApp({
      // exposed to all expressions
      count: 0,
      // getters
      get plusOne() {
        return this.count + 1
      },
      // methods
      increment() {
        this.count++
      }
    }).mount(apps_wrap.querySelector('.petite-vue')) */

    //end:PetiteVue
  })
}

console.log('Yoooooooooo from example-section-block')
