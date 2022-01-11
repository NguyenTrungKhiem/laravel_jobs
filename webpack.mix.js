const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/pages/home.js', 'public/js')
mix.js('resources/js/pages/employer.js', 'public/js')
mix.sass('resources/scss/pages/home.scss', 'public/css')
mix.sass('resources/scss/pages/job_detail.scss', 'public/css')
mix.sass('resources/scss/pages/employer.scss', 'public/css')
mix.autoload({
    jquery: ['$', 'jQuery', 'window.jQuery'],
});
