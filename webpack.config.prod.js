const path = require('path')
const outputDir = path.resolve(__dirname, 'dist', 'global_admin')
const TerserPlugin = require('terser-webpack-plugin')

module.exports = {
  mode: 'production',
  entry: {
    blocks: path.resolve(__dirname, './gutenberg/blocks.js')
  },
  output: {
    path: outputDir,
    filename: '[name].min.js'
  },
  module: {
    rules: [
      {
        test: /\.js$/,
        exclude: /node_modules/,
        use: ['babel-loader'],
      },
    ],
  },
  optimization: {
    minimize: true,
    minimizer: [
      new TerserPlugin({
        parallel: true,
        terserOptions: {
          ecma: 6,
          format: {
            comments: false,
          },
        },
        extractComments: false,
      }),
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
