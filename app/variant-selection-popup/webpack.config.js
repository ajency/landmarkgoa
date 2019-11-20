const path = require('path');

module.exports = {
  mode : "production",
  output : {
    // filename : "sign-in.js",
    filename: 'variant-selection-popup.js',
    path: path.resolve(__dirname, "../pre_build/")
  },
  module: {
    rules: [
      {
        test: /\.(js|jsx)$/,
        exclude: /node_modules/,
        use: {
          loader: "babel-loader"
        }
      }
    ]
  }
};