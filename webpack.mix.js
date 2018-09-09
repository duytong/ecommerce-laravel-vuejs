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

mix.js('resources/assets/js/main.js', 'public/assets/js')
   	.sass('resources/assets/sass/main.scss', 'public/assets/css')
	.js('resources/assets/admin/js/main.js', 'public/assets/admin/js')
	.sass('resources/assets/admin/sass/main.scss', 'public/assets/admin/css')
   	.options({
      	processCssUrls: false
   	})
	.disableSuccessNotifications();
