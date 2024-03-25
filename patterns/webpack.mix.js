let mix = require('laravel-mix');

// -- SCSS
mix.sass('style.scss', 'static/css/style.css')
    .js('main.js', 'static/js/main.js');

mix
    .options({
        processCssUrls: false,
        autoprefixer: {
            flexbox: true,
            overrideBrowserslist: ['IE >= 11', 'Edge >= 12', 'Firefox >= 28', 'Chrome >= 21', 'Safari >= 6.1', 'Opera >= 12.1', 'iOS >= 8', ]
        },
    })
    .webpackConfig({
        externals: {
            jquery: 'jQuery'
        },
    })
    // .browserSync({
    //     // proxy: 'ifoodds.local',
    //     // injectChanges: false,
    //     files: [
    //         'atoms/{*,**/*}.scss',
    //         'molecules/{*,**/*}.scss',
    //         'organisms/{*,**/*}.scss',

//         'atoms/{*,**/*}.js',
//         'molecules/{*,**/*}.js',
//         'organisms/{*,**/*}.js',
//     ],
// });