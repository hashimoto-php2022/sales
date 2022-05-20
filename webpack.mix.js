const mix = require('laravel-mix');
const tailwindcss = require('tailwindcss');

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

//  mix.js('resources/js/app.js', 'public/js').autoload( {
//     "jquery": [ '$', 'window.jQuery' ],
// } ).postCss('resources/css/app.css', 'public/css', [
//     //require('postcss-import'),
//     require('postcss-custom-properties'),
//     require('tailwindcss'),
//     require('autoprefixer'),
// ]);

mix.sass('resources/sass/app.scss', 'public/css')
    .options({ 
        processCssUrls: false, //公式ドキュメント参照
        postCss: [ tailwindcss('./tailwind.config.js') ], 
    }); 
if (mix.inProduction()) {
    mix.version();
}