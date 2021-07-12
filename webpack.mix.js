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

mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
        //
    ]);
const resourcePath = 'resources';
const publicPath = 'public';

mix
    .copyDirectory(resourcePath + "/js",publicPath + "/js")
    .copyDirectory(resourcePath + "/img",publicPath + "/img")
    .copyDirectory(resourcePath + "/css",publicPath + "/css")
    .copyDirectory(resourcePath + "/vendor",publicPath + "/vendor")
;