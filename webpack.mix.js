const { mix } = require('laravel-mix');
const path = require('path');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.webpackConfig({
    output: {
        publicPath: "/",
        chunkFilename: 'js/[name].[chunkhash].js'
    },
    resolve: {
        alias: {
            'js': 'assets/js',
        },
        modules: [
            'node_modules',
            path.resolve(__dirname, "resources")
        ]
    },
});


 // Make `jquery` available to other modules (e.g. bootstrap)
mix.autoload({
    jquery: [ '$', 'jQuery', 'window.jQuery' ]
});

mix.js('resources/assets/js/app.js', 'public/js')
.extract([ 'jquery', 'bootstrap-sass', 'bootstrap-datepicker', 'vue', 'zxcvbn' ])
.sass('resources/assets/sass/app.scss', 'public/css');


// Use cache-busting version suffix for production compilations
if (mix.inProduction()) {
    mix.version();
}
