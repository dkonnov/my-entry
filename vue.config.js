module.exports = {
  devServer: {
    proxy: {
      '^/public': {
        target: 'http://localhost:4001/my-entry-3/',
        changeOrigin: true, // so CORS doesn't bite us. 
      }
    }
  }
}