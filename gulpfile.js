require('dotenv').config()

const gulp = require('gulp')
const gulpif = require('gulp-if')
const plumber = require('gulp-plumber')
const notify = require('gulp-notify')

async function getGulpSize() {
  const size = await import('gulp-size')
  return size.default
}

const webpack = require('webpack')
const { createGulpEsbuild } = require('gulp-esbuild')
const gulpEsbuild = createGulpEsbuild({
  piping: true // enables piping
})

const sassCompiler = require('sass')
const gulpSass = require('gulp-sass')
const sass = gulpSass(sassCompiler)
const sourcemaps = require('gulp-sourcemaps')
const rename = require('gulp-rename')

async function getAutoprefixer() {
  const autoprefixerModule = await import('gulp-autoprefixer')
  return autoprefixerModule.default
}

const browserSync = require('browser-sync')
const gcmq = require('gulp-group-css-media-queries')
const minifycss = require('gulp-uglifycss')
const yargs = require('yargs')
const through2 = require('through2')
const vinyl = require('vinyl')

const sveltePlugin = require('esbuild-svelte')
const vue3Plugin = require('esbuild-plugin-vue-iii').vue3Plugin

const compilation_config = require('./gulpfile_config.js')
const { config, config_webpack_js_admin_blocks } = compilation_config

const webpackConfigDev = require('./webpack.config.js')
const webpackConfigProd = require('./webpack.config.prod.js')

const browser = browserSync.create()
const LOCALHOST_PROJECT_URL = process.env.LOCAL_SITE_URL

const argv = yargs(process.argv.slice(2)).argv

const shouldMinify =
  argv.production === 'production' || process.env.NODE_ENV === 'production'
const cssOutputStyle = shouldMinify ? 'compressed' : 'expanded'

const baseEsbuildConfig = {
  bundle: true,
  sourcemap: shouldMinify ? false : 'inline',
  minify: shouldMinify,
  logLevel: 'info',
  loader: { '.js': 'jsx' }
}

const autoprefixerConfig = {
  cascade: true,
  remove: true,
  grid: false,
  flexbox: false
}

const webpackConfig =
  process.env.NODE_ENV === 'production' ? webpackConfigDev : webpackConfigProd

function compileSCSS(key) {
  async function task(done) {
    const cssConfig = config.css[key]
    const autoprefixer = await getAutoprefixer()
    const size = await getGulpSize()

    gulp
      .src(cssConfig.src)
      .pipe(sourcemaps.init())
      .pipe(
        plumber({
          errorHandler: notify.onError('Error: <%= error.message %>')
        })
      )
      .pipe(sass({ outputStyle: cssOutputStyle }).on('error', sass.logError))
      .pipe(autoprefixer(autoprefixerConfig))
      .pipe(gulpif(shouldMinify, gcmq()))
      .pipe(gulpif(shouldMinify, minifycss()))
      .pipe(
        gulpif(cssConfig.hasOwnProperty('rename'), rename(cssConfig.rename))
      )
      .pipe(sourcemaps.write(cssConfig.sourcemaps))
      .pipe(
        size({
          showFiles: true,
          showTotal: false,
          pretty: true,
          title: 'CSS size'
        })
      )
      .pipe(gulp.dest(cssConfig.dest))
      .pipe(browser.stream())
      .on('finish', done)
  }

  task.displayName = `compileSCSS:${key}` // Set the display name
  return task
}

function compileJS(key) {
  function task(done) {
    const jsConfig = config.js[key]

    const esbuild_obj = {
      ...baseEsbuildConfig,
      plugins: [sveltePlugin(), vue3Plugin()]
    }

    if (jsConfig.hasOwnProperty('outfile')) {
      esbuild_obj.outfile = jsConfig.outfile
    }

    if (jsConfig.hasOwnProperty('outdir')) {
      esbuild_obj.outdir = jsConfig.outdir
    }

    gulp
      .src(jsConfig.src)
      .pipe(
        plumber({
          errorHandler: notify.onError('Error: <%= error.message %>')
        })
      )
      .pipe(gulpEsbuild(esbuild_obj))
      .pipe(gulpif(jsConfig.hasOwnProperty('rename'), rename(jsConfig.rename)))
      .pipe(gulp.dest(jsConfig.dest))
      .pipe(browser.stream())
      .on('finish', done)
  }

  task.displayName = `compileJS:${key}` // Set the display name
  return task
}

function copyGutenbergBlocksModelsFiles(done) {
  gulp
    .src('./src/blocks/**/model.json')
    .pipe(gulp.dest('./dist/block-specific'))
    .on('end', done)
}

// Converting moel.json files to JS files so we can import them
function copyGutenbergBlocksModelsFilesAsJS(done) {
  gulp
    .src('./src/blocks/**/model.json')
    .pipe(
      through2.obj(function(file, _, cb) {
        if (file.isBuffer()) {
          const jsonContent = file.contents.toString()
          const moduleContent = `export default ${jsonContent};`
          const jsFile = new vinyl({
            cwd: file.cwd,
            base: file.base,
            path: file.path.replace(/\.json$/, '.js'),
            contents: Buffer.from(moduleContent)
          })
          this.push(jsFile)
        }
        cb()
      })
    )
    .pipe(gulp.dest('./dist/block-specific'))
    .on('end', done)
}

// run webpack to compile Gutenberg backend JS
function compileGutenbergBackendJS(done) {
  webpack(webpackConfig, (err, stats) => {
    if (err) {
      console.error('Webpack error:', err)
      done(err) // Signal task completion with error
    } else if (stats.hasErrors()) {
      console.error('Webpack compilation errors:', stats.toJson().errors)
      done(new Error('Webpack compilation errors')) // Signal task completion with error
    } else {
      console.log('Webpack compilation successful')
      done() // Signal successful task completion
    }
  })
}

const buildBackendBlocksJS = gulp.series(
  copyGutenbergBlocksModelsFiles,
  copyGutenbergBlocksModelsFilesAsJS,
  compileGutenbergBackendJS
)

function serve() {
  browser.init({
    proxy: LOCALHOST_PROJECT_URL,
    injectChanges: true
  })

  // Watch for Gutenberg Backend Blocks JS (Handled via WebPack)
  gulp.watch(config_webpack_js_admin_blocks.watch, buildBackendBlocksJS)

  // Watch for CSS changes
  Object.keys(config.css).forEach(key => {
    if (config.css[key].watch) {
      gulp.watch(config.css[key].watch, compileSCSS(key))
    }
  })

  // Watch for JS changes
  Object.keys(config.js).forEach(key => {
    if (config.js[key].watch) {
      gulp
        .watch(config.js[key].watch, compileJS(key))
        .on('change', browser.reload)
    }
  })

  // Watch for PHP changes
  if (config.latte.watch) {
    gulp.watch(config.latte.watch).on('change', browser.reload)
  }
}
serve.displayName = 'serve'

async function build() {
  const cssAndJsTasks = [
    ...Object.keys(config.css).map(key => compileSCSS(key)),
    ...Object.keys(config.js).map(key => compileJS(key))
  ]

  // Combining all tasks, running CSS and JS tasks in parallel and model + Gutenberg tasks in series
  return gulp.series(gulp.parallel(cssAndJsTasks), buildBackendBlocksJS)()
}
build.displayName = 'build'

// Default task for development: compile, watch, and serve
function defaultTask() {
  // Run the build task, then start the serve process
  return gulp.series(build, serve)()
}
defaultTask.displayName = 'default'

module.exports = {
  build: build,
  default: defaultTask
}
