module.exports = {
  devServer: {
    proxy: {
      '^/my-entry/': {
        target: 'http://localhost:3000/',
        changeOrigin: true, // so CORS doesn't bite us. 
      }
    }
  }
}