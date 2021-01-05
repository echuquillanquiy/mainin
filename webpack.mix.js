const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js');

mix.browserSync('http://authsocial.test');