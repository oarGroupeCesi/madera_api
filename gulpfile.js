var elixir = require('laravel-elixir');

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

elixir.config.sourcemaps = false;

elixir(function(mix) {
    mix
    	.sass('main.scss')
    	.copy('vendor/bower_components/jquery/dist/jquery.min.js', 'public/js/jquery.min.js')
    	.copy('vendor/bower_components/bootstrap/dist/js/bootstrap.min.js', 'public/js/bootstrap.min.js')
    	.version([
    		'css/main.css',
    		'js/jquery.min.js',
    		'js/bootstrap.min.js',
    	])
    	.browserSync({
            proxy: 'madera.local:8000'
        });
});
