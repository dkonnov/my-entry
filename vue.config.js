module.exports = {
  devServer: {
    proxy: {
      '^/public': {
        target: 'http://10.28.11.66:4001/my-entry-3/',
        changeOrigin: true, // so CORS doesn't bite us. 
      }
    }
  }
}