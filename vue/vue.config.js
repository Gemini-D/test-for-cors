/**
 * @type {import('@vue/cli-service').ProjectOptions}
 */
module.exports = {
    devServer: {
        proxy: {
            '/api/*': {
                // http://127.0.0.1:8081/api/user => http://127.0.0.1:9501/user
                target: 'http://127.0.0.1:9501',
                changeOrigin: true,
                pathRewrite: {
                    '/api/': '/'
                }
            }
        }
    }
}
