const { defineConfig } = require('@vue/cli-service')
module.exports = defineConfig({
  devServer: {
    port: 5173 // Đặt cổng mà bạn muốn sử dụng
  },
  transpileDependencies: true
})
