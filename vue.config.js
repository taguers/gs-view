module.exports = {
	devServer: {
		proxy: {
			'/api': {
				target: 'http://localhost/gosoft',
				ws: true,
				changeOrigin: true
			}
		}
	},
	dev: {
		proxyTable: {
			// proxy all requests starting with /api to jsonplaceholder
			'/api': {
				target: 'http://localhost/gosoft',
				changeOrigin: true,
				pathRewrite: {
					'^/api': ''
				}
			}
		}
	}
}