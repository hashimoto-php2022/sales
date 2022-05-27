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

mix.sass('resources/sass/app.scss',  'public/css')
    .options({ 
        processCssUrls: false, //公式ドキュメント参照
        postCss: [ tailwindcss('./tailwind.config.js') ], 
    })
    //push時以下2行は削除する
    //.sass('resources/sass/hashimoto.scss', 'public/css')
    // .styles(['public/css/app.css', 'public/css/hashimoto.css'], 'public/css/test.css')
    ;
if (mix.inProduction()) {
    mix.version();
}