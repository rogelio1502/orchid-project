let mix = require('laravel-mix')

mix.js('resources/js/app.js', 'public/js')
    .css('resources/css/tom-select.default.css', 'public/css')
    .setPublicPath('public')
