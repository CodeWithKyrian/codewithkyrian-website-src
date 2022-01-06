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

const path = require('path');

mix.alias({
    ziggy: path.resolve('vendor/tightenco/ziggy/dist/vue'), // or 'vendor/tightenco/ziggy/dist/vue' if you're using the Vue plugin
});

mix.js('resources/js/app.js', 'public/js').vue();
mix.postCss('resources/css/app.css', 'public/css', [
    require("tailwindcss"),
    require('autoprefixer')
]);

mix.js('resources/js/admin.js', 'public/js');

if (mix.inProduction()) {
    mix.version()
}

