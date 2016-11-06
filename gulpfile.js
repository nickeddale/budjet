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


elixir(mix => {


    mix.styles([
    	'libs/select2.css',
    	'app.css',
    ], 'public/css/app.css');   

    mix.scripts([
    	'libs/select2.js',
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
