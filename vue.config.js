module.exports = {
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