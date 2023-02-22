const gulp = require('gulp')
const gulpif = require('gulp-if')
const plumber = require('gulp-plumber')
const notify = require('gulp-notify')
const size = require('gulp-size')

const webpack = require('webpack')

const { createGulpEsbuild } = require('gulp-esbuild')
const gulpEsbuild = createGulpEsbuild({
  piping: true // enables piping
})

const sveltePlugin = require('esbuild-svelte')
const vue3Plugin = require('esbuild-plugin-vue-iii').vue3Plugin

const sass = require('gulp-sass')
const sourcemaps = require('gulp-sourcemaps')
const rename = require('gulp-rename')
const autoprefixer = require('gulp-autoprefixer')
const browserSync = require('browser-sync').create()
const gcmq = require('gulp-group-css-media-queries')
const minifycss = require('gulp-uglifycss')

const { argv } = require('yargs')

const { config, config_webpack_js_admin_blocks } = require('./gulpfile_config')

const LOCALHOST_PROJECT_URL = require('./theme_redone_global_config.json')
  .LOCALHOST_PROJECT_URL

process.env.NODE_ENV = argv.production || 'development'

const webpackConfig =
  process.env.NODE_ENV === 'production'
    ? './webpack.config.prod.js'
    : './webpack.config.js'

const shouldMinify = process.env.NODE_ENV === 'production'
const cssOutputStyle = shouldMinify ? 'compressed' : 'expanded'

function compileSCSS(key, done) {
  const cssConfig = config.css[key]

  gulp
    .src(cssConfig.src)
    .pipe(sourcemaps.init())
    .pipe(
      plumber({ errorHandler: notify.onError('Error: <%= error.message %>') })
    )
    .pipe(sass.sync({ outputStyle: cssOutputStyle }))
    .pipe(autoprefixer())
    .pipe(gulpif(shouldMinify, gcmq()))
    .pipe(gulpif(shouldMinify, minifycss()))
    .pipe(gulpif(cssConfig.hasOwnProperty('rename'), rename(cssConfig.rename)))
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
    .pipe(browserSync.stream())

  done()
}

function compileJS(key, done) {
  const jsConfig = config.js[key]

  const esbuild_obj = {
    bundle: true,
    minify: shouldMinify,
    logLevel: 'info',
    loader: {
      '.js': 'jsx'
    },
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
      plumber({ errorHandler: notify.onError('Error: <%= error.message %>') })
    )
    .pipe(gulpEsbuild(esbuild_obj))
    .pipe(gulpif(jsConfig.hasOwnProperty('rename'), rename(jsConfig.rename)))
    .pipe(gulp.dest(jsConfig.dest))

  done()
}

// run webpack to compile Gutenberg backend JS
function compileGutenbergBackendJS(done) {
  return new Promise((resolve, reject) => {
    webpack(require(webpackConfig), (err, stats) => {
      if (err) return reject(err)

      if (stats.hasErrors()) {
        return reject(new Error(stats))
      }
      resolve()
      done()
    })
  })
}

function serve(done) {
  browserSync.init(
    {
      proxy: LOCALHOST_PROJECT_URL,
      injectChanges: true
    },
    done
  )
}

function watchFiles(done) {
  // --- CSS ---------------------------------------
  // Watch for all the CSS files
  for (const key in config.css) {
    const cssConfig = config.css[key]
    gulp.watch(cssConfig.watch, gulp.series(compileSCSS.bind(null, key)))
  }

  // --- JAVASCRIPT ----------------------------

  // Watch for Gutenberg Backend Blocks JS (Handled via WebPack)
  gulp.watch(
    config_webpack_js_admin_blocks.watch,
    gulp.series(compileGutenbergBackendJS, reload)
  )

  // Watch for all the other JS files
  for (const key in config.js) {
    const jsConfig = config.js[key]
    gulp.watch(jsConfig.watch, gulp.series(compileJS.bind(null, key), reload))
  }

  // Watch for latte templates updates
  gulp.watch(config.latte.watch, reload)
}

function reload(done) {
  browserSync.reload()
  done()
}

const paralell_tasks = []
for (const key in config.css) {
  paralell_tasks.push(compileSCSS.bind(null, key))
}
for (const key in config.js) {
  paralell_tasks.push(compileJS.bind(null, key))
}

gulp.task('server', gulp.parallel(paralell_tasks.concat([serve, watchFiles])))
gulp.task('default', gulp.parallel(paralell_tasks))
