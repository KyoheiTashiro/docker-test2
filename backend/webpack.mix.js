const mix = require('laravel-mix');
const tailwindcss = require('tailwindcss');
const CompressionPlugin = require('compression-webpack-plugin');
require('laravel-mix-purgecss');

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

mix
  .js('resources/js/app.js', 'public/js')
  // .vue()
  .vue({ version: 2 })
  .sass('resources/sass/app.scss', 'public/css')
  .webpackConfig({
    plugins: [
      new CompressionPlugin({
        filename: '[path].gz[query]',
        algorithm: 'gzip',
        test: /\.js$|\.css$|\.html$|\.svg$/,
        threshold: 10240,
        minRatio: 0.8,
      }),
    ],
  })
  .postCss('resources/css/app.css', 'public/css', [require('tailwindcss')])
  .options({
    processCssUrls: false,
    postCss: [tailwindcss('./tailwind.config.js')],
  })
  .purgeCss();
