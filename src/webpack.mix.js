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

// JavaScript optimization
mix.js('resources/js/app.js', 'public/js')
    .extract(['lodash', 'axios']) // Extract vendor libraries
    .version(); // Add versioning for cache busting

// CSS optimization - combine all CSS files
mix.styles([
    'public/css/sanitize.css',
    'public/css/common.css',
    'public/css/app.css',
    'public/css/index.css',
    'public/css/login.css',
    'public/css/register.css',
    'public/css/confirm.css',
    'public/css/thanks.css',
    'public/css/admin.css'
], 'public/css/app.min.css')
    .options({
        processCssUrls: false, // Don't process URLs in CSS
        postCss: [
            require('autoprefixer'),
            require('cssnano')({
                preset: 'default',
            })
        ]
    })
    .version();

// Enable source maps in development
if (mix.inProduction()) {
    mix.sourceMaps();
}
