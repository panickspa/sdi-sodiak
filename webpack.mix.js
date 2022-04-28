const mix = require('laravel-mix');


const VuetifyLoaderPlugins = require('vuetify-loader/lib/plugin')
const CaseSensitivePathsPlugins = require('case-sensitive-paths-webpack-plugin')


mix.webpackConfig({
    plugins: [
        new VuetifyLoaderPlugins(),
        new CaseSensitivePathsPlugins()
    ]
})
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

mix.js('resources/js/app.js', 'public/js')
    .vue()
    .sass('resources/sass/app.scss', 'public/css');
