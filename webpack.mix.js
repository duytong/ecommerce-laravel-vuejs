let mix = require('laravel-mix');

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

mix.sass('resources/assets/sass/app.scss', 'public/css');
mix.sass('resources/assets/sass/client/app.scss', 'public/css/client');
mix.js([
	'resources/assets/js/app.js',
	'resources/assets/js/custom.js'
], 'public/js/app.js');
mix.js('resources/assets/js/client.js', 'public/js');
mix.disableSuccessNotifications();
