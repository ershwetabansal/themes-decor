const elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for your application as well as publishing vendor resources.
 |
 */

elixir(function (mix) {
    mix.copy('node_modules/disk-browser/dist/js', 'public/js/diskbrowser/js');
    mix.copy('node_modules/disk-browser/dist/partials', 'public/js/diskbrowser/partials');
    mix.copy('node_modules/disk-browser/dist/css', 'public/css/diskbrowser');
    mix.copy('node_modules/disk-browser/dist/css', 'public/css/diskbrowser');
    mix.copy('node_modules/disk-browser/dist/css', 'public/css/diskbrowser');
    mix.copy('resources/assets/third_party', 'public/third_party');

    mix.sass('theme/blue.scss')
    .sass('theme/red.scss')
    .sass('theme/santa.scss')

    mix.scripts(['app.js', 'modal.js', 'cart.js'], 'public/js/app.js');
    mix.scripts(['disk_browser.js'], 'public/js/disk_browser.js');

   	mix.version(['public/css/red.css', 'public/css/blue.css','public/css/santa.css']);
  	mix.version('public/js/app.js');
  	mix.version('public/js/disk_browser.js');
});
