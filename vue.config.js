module.exports = {
    devServer: {
        proxy: {
            '/gosoft/gs-view/src/includes': {
                target: 'http://localhost/gosoft',
                ws: true,
                changeOrigin: true
            }
        }
    }
}
