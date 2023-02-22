const OUT_DIR = './prod'

const config = {
  css: {
    theme: {
      src: './src/scss/style.scss',
      dest: `${OUT_DIR}/global`,
      watch: ['./src/scss/style.scss', './src/scss/theme/**/*.scss'],
      sourcemaps: './css-maps'
    },
    critical: {
      src: './src/scss/critical.scss',
      dest: `${OUT_DIR}/global`,
      watch: ['./src/scss/critical.scss', './src/scss/critical/**/*.scss'],
      sourcemaps: './css-maps'
    },
    admin_global: {
      src: './src/scss/admin-style.scss',
      dest: `${OUT_DIR}/global`,
      watch: ['./src/scss/admin-style.scss', './src/scss/admin/**/*.scss'],
      sourcemaps: './css-maps'
    },
    admin_blocks: {
      src: './gutenberg/scss/blocks-backend.scss',
      dest: `${OUT_DIR}/global`,
      watch: [
        './gutenberg/scss/blocks-backend.scss',
        './gutenberg/scss/**/*.scss',
        './gutenberg/blocks/**/_editor.scss'
      ],
      sourcemaps: './css-maps'
    },
    fe_blocks_shared: {
      src: './gutenberg/blocks_shared_css_and_js/css/*.scss',
      dest: `${OUT_DIR}/blocks-shared`,
      watch: ['./gutenberg/blocks_shared_css_and_js/css/*.scss'],
      sourcemaps: './css-maps',
      rename: {
        suffix: '.min'
      }
    },
    fe_blocks_single: {
      src: './gutenberg/blocks/**/frontend.scss',
      dest: `${OUT_DIR}/block-specific`,
      watch: ['./gutenberg/blocks/**/frontend.scss'],
      sourcemaps: './css-maps',
      rename: {
        suffix: '.min'
      }
    }
  },

  js: {
    theme: {
      src: './src/js/app.js',
      dest: `${OUT_DIR}/global`,
      watch: ['./src/js/app.js', './src/js/**/*.js'],
      outfile: 'app.min.js'
    },
    lazily_loaded: {
      src: './src/js/lazily-loaded/*.js',
      dest: './',
      watch: ['./src/js/lazily-loaded/*.js'],
      outdir: `${OUT_DIR}/lazily-loaded`,
      rename: {
        suffix: '.min'
      }
    },
    fe_blocks_shared: {
      src: './gutenberg/blocks_shared_css_and_js/js/*.js',
      dest: './',
      watch: ['./gutenberg/blocks_shared_css_and_js/js/*.js'],
      outdir: `${OUT_DIR}/blocks-shared`,
      rename: {
        suffix: '.min'
      }
    },
    fe_blocks_single: {
      src: './gutenberg/blocks/**/frontend.js',
      dest: './',
      watch: ['./gutenberg/blocks/**/frontend.js'],
      outdir: `${OUT_DIR}/block-specific`,
      rename: {
        suffix: '.min'
      }
    }
  },

  latte: {
    watch: './**/*.latte'
  }
}

const config_webpack_js_admin_blocks = {
  watch: [
    './gutenberg/blocks.js',
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
}

module.exports = {
  config,
  config_webpack_js_admin_blocks
}
