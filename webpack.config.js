const path = require('path')
const outputDir = path.resolve(__dirname, 'dist', 'global_admin')

module.exports = {
  mode: 'development',
  entry: {
    blocks: path.resolve(__dirname, './gutenberg/blocks.js')
  },
  devtool: 'inline-source-map',
  output: {
    path: outputDir,
    filename: '[name].min.js'
  },
  devtool: 'source-map',
  module: {
    rules: [
      {
        test: /\.js$/,
        exclude: /node_modules/,
        use: ['babel-loader'],
      },
      {
        test: /\.js$/,
        use: ['source-map-loader'],
        enforce: 'pre',
      },
    ],
  },
  resolve: {
    extensions: ['.js', '.cjs', '.json'],
  },
  externals: {
    'wp.element': 'wp.element',
    'wp.components': 'wp.components',
    'wp.blocks': 'wp.blocks',
    'wp.editor': 'wp.editor',
    'wp.data': 'wp.data',
    'wp.i18n': 'wp.i18n',
    'wp.date': 'wp.date',
    'wp.compose': 'wp.compose',
    'wp.hooks': 'wp.hooks',
    'wp.apiFetch': 'wp.apiFetch',
    'wp.blob': 'wp.blob',
    'wp.blockEditor': 'wp.blockEditor',
  },
}
