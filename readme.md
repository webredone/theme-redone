[![Theme Redone Gutenberg WordPress Framework](https://raw.githubusercontent.com/webredone/theme-redone/main/assets/svg/theme-redone-logo.svg)](https://webredone.com/theme-redone/)

# **Theme Redone**

## **The Framework for Developing Custom WordPress Themes**

## _with its own Gutenberg Blocks creation solution._

---

[![Custom WordPress Theme Starter (framework) 2022 - Theme Redone | WebRedone ](https://raw.githubusercontent.com/webredone/theme-redone-docs-assets/main/img/theme-redone-by-webredone-youtube-screen.jpg)](https://www.youtube.com/watch?v=co1r5krHsl4)

Theme Redone is a custom WordPress theme starter/framework with its own Gutenberg blocks solution and a CLI that speeds up the block creation process.

### It consists of:

- ✅ [Latte templating engine](https://webredone.com/theme-redone/why-latte-as-a-templating-engine/) for its beautiful syntax and a more streamlined and manageable workflow
- ✅ EsBuild/Webpack + Gulp task tasks for [compiling SCSS and JS](https://webredone.com/theme-redone/scss-and-js-compilation-bundling/)
- ✅ SCSS (SMACSS folder/files structure)
- ✅ Javascript (ES8 and React/Svelte/Vue support, thanks to EsBuild and Babel)
- ✅ In-theme [framework for building Gutenberg blocks](https://webredone.com/theme-redone/gutenberg-blocks-framework/) in a streamlined and standardized way
- ✅ [TRB CLI](https://webredone.com/theme-redone/gutenberg-blocks-framework/trb-cli/) helper for scaffolding new Gutenberg blocks
- ✅ [Bare-bones grid system](https://webredone.com/theme-redone/simple-grid-system/) coded with Flex and CSS variables (about 15 lines of code)
- ✅ [Helper functions](https://webredone.com/theme-redone/theme-functions/) for repetitive tasks such as rendering images, links, SVG code, and more
- ✅ Just a few [well-written UI components](https://webredone.com/theme-redone/javascript-ui-elements-classes/) to get you started (we don’t like bloat in our code): Modal, Accordion, Tabs, Menu, Dropdowns, Sliders, and simple “in view fade-in transitions”
- ✅ [SVG support](https://webredone.com/theme-redone/svg-handling/)
- ✅ [Tracy Debugger](https://webredone.com/theme-redone/debugging-tracy/) to help us make sure we write stable and error-free code
- ✅ And much more

### Visit https://webredone.com/theme-redone/ to learn more from our 50+ pages long docummentation.

---

## **Environment Requirements:**

- PHP 7.4.29^
- Composer 2.0.2^
- Node 14.19.1

---

## **Installation:**

1. Download and install the latest version of the theme
2. At the root of the theme, there is a “theme_redone_global_config.json” file. Replace “localhost/theme-redone” with the name of your project from htdocs “localhost/[PROJECT-FOLDER-NAME]” (This makes sure browser-sync connects to the correct project)
3. From the terminal (from inside the root directory of the theme) run composer install and afterward npm install to install the PHP and JS dependencies. (Make sure Node version 14.19.1 is used. We suggest using NVM to manage Node versions)
   Install the TRB CLI package globally ( npm i -g @webredone/trb-cli ) to scaffold blocks faster.
4. In WordPress, activate the theme

---

## **Compilation/Watching and Bundling/Minification Tasks:**

- To start the compiler and make it watch for file changes, simply run the npm start command from the terminal
- Once the project is finished and ready to be deployed, run npm run build:prod to optimize css and javascript files.
