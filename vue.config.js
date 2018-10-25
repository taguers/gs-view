module.exports = {
    rules: {
        'no-console': 'off',
    },
    devServer: {
        proxy: {
            '/gosoft/gs-view/src/include': {
                target: 'http://localhost/gosoft',
                ws: true,
                changeOrigin: true
            }
        }
    }
}