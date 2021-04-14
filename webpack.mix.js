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

mix.js('resources/js/frontapp/app.js', 'public/frontapp/js/app.js').react();

mix.sass('resources/css/frontapp/app.scss', 'public/frontapp/app.css', [
    //
]);

mix.copy('resources/img/frontapp/logo.svg', 'public/frontapp/img/logo.svg');
