const path = require('path')
const outputDir = path.resolve(__dirname, 'prod', 'global')
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
        use: ['babel-loader']
      }
    ]
  },
  optimization: {
    minimize: true,
    minimizer: [
      new TerserPlugin({
        parallel: true,
        terserOptions: {
          ecma: 6,
          format: {
            comments: false
          }
        },
        extractComments: false
      })
    ]
  }
}
