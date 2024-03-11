const mix = require('laravel-mix');
const path = require('path');

mix.js('resources/js/app.js', 'public/js')
   .vue()
   .css('resources/css/app.css', 'public/css')
   .webpackConfig({
      resolve: {
         alias: {
            'element-plus': path.resolve(__dirname, 'node_modules/element-plus'),
         },
      },
});