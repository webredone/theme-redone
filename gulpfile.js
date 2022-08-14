const gulp = require('gulp')
var gulpif = require('gulp-if')
var plumber = require('gulp-plumber')
var notify = require('gulp-notify')

const webpack = require('webpack')

const { createGulpEsbuild } = require('gulp-esbuild')
const gulpEsbuild = createGulpEsbuild({
  piping: true // enables piping
})

const sveltePlugin = require('esbuild-svelte')
const vue3Plugin = require('esbuild-plugin-vue-iii').vue3Plugin

const sass = require('gulp-sass')
const sourcemaps = require('gulp-sourcemaps')
var rename = require('gulp-rename')
const autoprefixer = require('gulp-autoprefixer')
var browserSync = require('browser-sync').create()
const gcmq = require('gulp-group-css-media-queries')
const minifycss = require('gulp-uglifycss')

const { argv } = require('yargs')

const LOCALHOST_PROJECT_URL = require('./theme_redone_global_config.json')
  .LOCALHOST_PROJECT_URL

process.env.NODE_ENV = argv.production || 'development'

const webpackConfig =
  process.env.NODE_ENV === 'production'
    ? './webpack.config.prod.js'
    : './webpack.config.js'

const shouldMinify = process.env.NODE_ENV === 'production'
const cssOutputStyle = shouldMinify ? 'compressed' : 'expanded'

const SRC = {
  SCSS_THEME: './src/scss/style.scss',

  SCSS_CRITICAL: './src/scss/critical.scss',

  SCSS_GLOBAL_ADMIN: './src/scss/admin-style.scss',

  SCSS_ADMIN_BLOCKS: './gutenberg/scss/blocks-backend.scss',

  SCSS_BLOCKS_SHARED_FRONTEND:
    './gutenberg/blocks_shared_css_and_js/css/*.scss',

  SCSS_BLOCK_SPECIFIC_FRONTEND: './gutenberg/blocks/**/frontend.scss',

  JS_LAZILY_LOADED: './src/js/lazily-loaded/*.js',

  JS_THEME: './src/js/app.js',

  JS_BLOCKS_SHARED_FRONTEND: './gutenberg/blocks_shared_css_and_js/js/*.js',

  JS_BLOCK_SPECIFIC_FRONTEND: './gutenberg/blocks/**/frontend.js',

  JS_GUTENBERG_BLOCKS: './gutenberg/blocks.js'
}

const watchPaths = {
  css: {
    theme: [SRC.SCSS_THEME, './src/scss/theme/**/*.scss'],

    critical: [SRC.SCSS_CRITICAL, './src/scss/critical/**/*.scss'],

    blocks_shared: [SRC.SCSS_BLOCKS_SHARED_FRONTEND],

    block_specific: [SRC.SCSS_BLOCK_SPECIFIC_FRONTEND],

    admin: [SRC.SCSS_GLOBAL_ADMIN, './src/scss/admin/**/*.scss'],

    blocks_admin: [
      SRC.SCSS_ADMIN_BLOCKS,
      './gutenberg/scss/**/*.scss',
      './gutenberg/blocks/**/_editor.scss'
    ]
  },
  js: {
    theme: [SRC.JS_THEME, './src/js/**/*.js'],

    blocks_shared: [SRC.JS_BLOCKS_SHARED_FRONTEND],

    block_specific: [SRC.JS_BLOCK_SPECIFIC_FRONTEND],

    blocks_admin: [
      SRC.JS_GUTENBERG_BLOCKS,
      './gutenberg/register_block.js',
      './gutenberg/core/**/*.js',
      './gutenberg/core/**/*.json',
      './gutenberg/components/**/*.js',
      './gutenberg/helpers/**/*.js',
      './gutenberg/blocks/**/model.json',
      './gutenberg/blocks/**/EditMain.js',
      './gutenberg/blocks/**/EditSidebar.js',
      './gutenberg/blocks/**/View.js'
    ]
  },

  latte: './**/*.latte'
}

const OUT_DIR = './prod'

function compileGlobalThemeSCSS(done) {
  gulp
    .src(SRC.SCSS_THEME)
    .pipe(sourcemaps.init())
    .pipe(
      plumber({ errorHandler: notify.onError('Error: <%= error.message %>') })
    )
    .pipe(sass.sync({ outputStyle: cssOutputStyle }))
    .pipe(autoprefixer())
    .pipe(gulpif(shouldMinify, gcmq()))
    .pipe(gulpif(shouldMinify, minifycss()))
    .pipe(sourcemaps.write('./css-maps'))
    .pipe(gulp.dest(OUT_DIR + '/global'))
    .pipe(browserSync.stream())
  done()
}

function compileAdminSCSS(done) {
  gulp
    .src(SRC.SCSS_GLOBAL_ADMIN)
    .pipe(sourcemaps.init())
    .pipe(
      plumber({ errorHandler: notify.onError('Error: <%= error.message %>') })
    )
    .pipe(sass.sync({ outputStyle: cssOutputStyle }))
    .pipe(autoprefixer())
    .pipe(gulpif(shouldMinify, gcmq()))
    .pipe(gulpif(shouldMinify, minifycss()))
    .pipe(sourcemaps.write('./css-maps'))
    .pipe(gulp.dest(OUT_DIR + '/global'))
    .pipe(browserSync.stream())
  done()
}

function compileBlocksBackendSCSS(done) {
  gulp
    .src(SRC.SCSS_ADMIN_BLOCKS)
    .pipe(sourcemaps.init())
    .pipe(
      plumber({ errorHandler: notify.onError('Error: <%= error.message %>') })
    )
    .pipe(sass.sync({ outputStyle: cssOutputStyle }))
    .pipe(autoprefixer())
    .pipe(gulpif(shouldMinify, gcmq()))
    .pipe(gulpif(shouldMinify, minifycss()))
    .pipe(sourcemaps.write('./css-maps'))
    .pipe(gulp.dest(OUT_DIR + '/global'))
    .pipe(browserSync.stream())
  done()
}

function compileCriticalSCSS(done) {
  gulp
    .src(SRC.SCSS_CRITICAL)
    .pipe(
      plumber({ errorHandler: notify.onError('Error: <%= error.message %>') })
    )
    .pipe(sass.sync({ outputStyle: cssOutputStyle }))
    .pipe(autoprefixer())
    .pipe(gulpif(shouldMinify, gcmq()))
    .pipe(gulpif(shouldMinify, minifycss()))
    .pipe(gulp.dest(OUT_DIR + '/global'))
    .pipe(browserSync.stream())
  done()
}

function compileBlocksSharedFrontendSCSS(done) {
  gulp
    .src(SRC.SCSS_BLOCKS_SHARED_FRONTEND)
    .pipe(sourcemaps.init())
    .pipe(
      plumber({ errorHandler: notify.onError('Error: <%= error.message %>') })
    )
    .pipe(sass.sync({ outputStyle: cssOutputStyle }))
    .pipe(autoprefixer())
    .pipe(gulpif(shouldMinify, gcmq()))
    .pipe(gulpif(shouldMinify, minifycss()))
    .pipe(rename({ suffix: '.min' }))
    .pipe(sourcemaps.write('./css-maps'))
    .pipe(gulp.dest('./prod/blocks-shared'))
    .pipe(browserSync.stream())
  done()
}

function compileBlockSpecificFrontendSCSS(done) {
  gulp
    .src(SRC.SCSS_BLOCK_SPECIFIC_FRONTEND)
    .pipe(sourcemaps.init())
    .pipe(
      plumber({ errorHandler: notify.onError('Error: <%= error.message %>') })
    )
    .pipe(sass.sync({ outputStyle: cssOutputStyle }))
    .pipe(autoprefixer())
    .pipe(gulpif(shouldMinify, gcmq()))
    .pipe(gulpif(shouldMinify, minifycss()))
    .pipe(rename({ suffix: '.min' }))
    .pipe(sourcemaps.write('./css-maps'))
    .pipe(gulp.dest('./prod/block-specific'))
    .pipe(browserSync.stream())
  done()
}

// run webpack to compile Gutenberg backend JS
function compileGutenbergBackendJS(done) {
  return new Promise((resolve, reject) => {
    webpack(require(webpackConfig), (err, stats) => {
      if (err) {
        return reject(err)
      }

      if (stats.hasErrors()) {
        return reject(new Error(stats))
      }
      resolve()
      done()
    })
  })
}

function compileThemeLazilyLoadedJS(done) {
  gulp
    .src(SRC.JS_LAZILY_LOADED)
    .pipe(
      plumber({ errorHandler: notify.onError('Error: <%= error.message %>') })
    )
    .pipe(
      gulpEsbuild({
        bundle: true,
        minify: shouldMinify,
        logLevel: 'info',
        loader: {
          '.js': 'jsx'
        },
        plugins: [sveltePlugin(), vue3Plugin()],
        outdir: OUT_DIR + '/lazily-loaded'
      })
    )
    .pipe(rename({ suffix: '.min' }))
    .pipe(gulp.dest('./'))

  done()
}

// Handles global JS + React, Svelte and Vue
function compileThemeGlobalJS(done) {
  gulp
    .src(SRC.JS_THEME)
    .pipe(
      plumber({ errorHandler: notify.onError('Error: <%= error.message %>') })
    )
    .pipe(
      gulpEsbuild({
        bundle: true,
        outfile: 'app.min.js',
        minify: shouldMinify,
        logLevel: 'info',
        loader: {
          '.js': 'jsx'
        },
        plugins: [sveltePlugin(), vue3Plugin()]
      })
    )
    .pipe(gulp.dest(OUT_DIR + '/global'))

  done()
}

function compileBlocksSharedFrontendJS(done) {
  gulp
    .src(SRC.JS_BLOCKS_SHARED_FRONTEND)
    .pipe(
      plumber({ errorHandler: notify.onError('Error: <%= error.message %>') })
    )
    .pipe(
      gulpEsbuild({
        bundle: true,
        minify: shouldMinify,
        logLevel: 'info',
        loader: {
          '.js': 'jsx'
        },
        plugins: [sveltePlugin(), vue3Plugin()],
        outdir: './prod/blocks-shared'
      })
    )
    .pipe(rename({ suffix: '.min' }))
    .pipe(gulp.dest('./'))

  done()
}

function compileBlockSpecificJS(done) {
  gulp
    .src(SRC.JS_BLOCK_SPECIFIC_FRONTEND)
    .pipe(
      plumber({ errorHandler: notify.onError('Error: <%= error.message %>') })
    )
    .pipe(
      gulpEsbuild({
        bundle: true,
        minify: shouldMinify,
        logLevel: 'info',
        loader: {
          '.js': 'jsx'
        },
        plugins: [sveltePlugin(), vue3Plugin()],
        outdir: './prod/block-specific'
      })
    )
    .pipe(rename({ suffix: '.min' }))
    .pipe(gulp.dest('./'))

  done()
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
  // GLobal Theme CSS
  gulp.watch(watchPaths.css.theme, gulp.series(compileGlobalThemeSCSS))

  // Admin Global CSS
  gulp.watch(watchPaths.css.admin, gulp.series(compileAdminSCSS))

  // Blocks Backend CSS
  gulp.watch(watchPaths.css.blocks_admin, gulp.series(compileBlocksBackendSCSS))

  // Critical CSS
  gulp.watch(watchPaths.css.critical, gulp.series(compileCriticalSCSS, reload))

  // Blocks shared CSS
  gulp.watch(
    watchPaths.css.blocks_shared,
    gulp.series(compileBlocksSharedFrontendSCSS)
  )

  // Block-specific frontend.scss CSS
  gulp.watch(
    watchPaths.css.block_specific,
    gulp.series(compileBlockSpecificFrontendSCSS)
  )

  // --- JAVASCRIPT ----------------------------

  // Gutenberg Backend Blocks JS
  gulp.watch(
    watchPaths.js.blocks_admin,
    gulp.series(compileGutenbergBackendJS, reload)
  )

  // Theme global scripts
  gulp.watch(watchPaths.js.theme, gulp.series(compileThemeGlobalJS, reload))

  // Lazily loaded scripts
  gulp.watch(
    SRC.JS_LAZILY_LOADED,
    gulp.series(compileThemeLazilyLoadedJS, reload)
  )

  // Blocks-shared js
  gulp.watch(
    watchPaths.js.blocks_shared,
    gulp.series(compileBlocksSharedFrontendJS, reload)
  )
  // Block-Specific frontend.js
  gulp.watch(
    watchPaths.js.block_specific,
    gulp.series(compileBlockSpecificJS, reload)
  )

  // Watch for latte templates updates
  gulp.watch(watchPaths.latte, reload)
}

function reload(done) {
  browserSync.reload()
  done()
}

gulp.task(
  'server',
  gulp.series(
    compileCriticalSCSS,
    compileGlobalThemeSCSS,
    compileBlocksSharedFrontendSCSS,
    compileBlockSpecificFrontendSCSS,
    compileBlocksBackendSCSS,
    compileAdminSCSS,
    compileGutenbergBackendJS,
    compileThemeGlobalJS,
    compileThemeLazilyLoadedJS,
    compileBlocksSharedFrontendJS,
    compileBlockSpecificJS,
    serve,
    watchFiles
  )
)

gulp.task(
  'default',
  gulp.series(
    compileCriticalSCSS,
    compileGlobalThemeSCSS,
    compileBlocksSharedFrontendSCSS,
    compileBlockSpecificFrontendSCSS,
    compileBlocksBackendSCSS,
    compileAdminSCSS,
    compileGutenbergBackendJS,
    compileThemeGlobalJS,
    compileThemeLazilyLoadedJS,
    compileBlocksSharedFrontendJS,
    compileBlockSpecificJS
  )
)
