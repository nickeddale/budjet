const elixir = require('laravel-elixir');

require('laravel-elixir-vueify');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

// using this for js only atm, styles from npm pulled in from app.scss
var paths = {
    'bootstrapTable': './node_modules/bootstrap-table/'
}


elixir(mix => {


    //combine stylesheets
    //any sass or scss should be directed from app.scss
    //any additional css can be added manually after ./public/css/app.css
    mix.sass('app.scss')
      .styles([
         './public/css/app.css',
         'libs/select2.css'
      ])
      .version('public/css/all.css');
    
    mix.scripts([
      'libs/tableExport.js',
      paths.bootstrapTable + 'src/bootstrap-table.js',
      paths.bootstrapTable + 'src/extensions/export/bootstrap-table-export.js',
      paths.bootstrapTable + 'src/extensions/filter-control/bootstrap-table-filter-control.js',
    	'libs/select2.js'
    ], 'public/js/app-libs.js');

    mix.browserify([
    	'app.js',
    ], 'public/js/app.js');


});



elixir.config.js.browserify.watchify = {
    enabled: true,
    options: {
        poll: true
    }
}
