var gulp = require('gulp');
var rename = require('gulp-rename');
var elixir = require('laravel-elixir');

/**
 * Copy any neede files
 *
 * Do a 'gulp copyfiles' after bower updates
 */
gulp.task("copyfiles", function() {
    /**
     * copy jquery, bootstrap and fontawesome
     */
    gulp.src("vendor/bower_dl/jquery/dist/jquery.js").pipe(gulp.dest("resources/assets/js/"));

    gulp.src("vendor/bower_dl/bootstrap/less/**").pipe(gulp.dest("resources/assets/less/bootstrap"));

    gulp.src("vendor/bower_dl/bootstrap/dist/js/bootstrap.js").pipe(gulp.dest("resources/assets/js/"));

    gulp.src("vendor/bower_dl/bootstrap/dist/fonts/**").pipe(gulp.dest("public/assets/fonts"));

    gulp.src("vendor/bower_dl/font-awesome/less/**").pipe(gulp.dest("resources/assets/less/font-awesome"));

    gulp.src("vendor/bower_dl/font-awesome/fonts/**").pipe(gulp.dest("public/assets/fonts"));

    // add metis menu
    gulp.src("vendor/bower_dl/metisMenu/dist/metisMenu.js").pipe(gulp.dest("resources/assets/js"));
    gulp.src("vendor/bower_dl/metisMenu/dist/metisMenu.css").pipe(rename('metisMenu.less')).pipe(gulp.dest("resources/assets/less/others/"));
    // add goup
    gulp.src("vendor/bower_dl/jquery-goup/src/jquery.goup.js").pipe(gulp.dest("resources/assets/js"));

    /**
     * copy datatables
     */
    var dtDir = 'vendor/bower_dl/datatables-plugins/integration/';

    gulp.src("vendor/bower_dl/datatables/media/js/jquery.dataTables.js").pipe(gulp.dest("resources/assets/js/"));

    gulp.src(dtDir + 'bootstrap/3/dataTables.bootstrap.css')
        .pipe(rename('dataTables.bootstrap.less'))
        .pipe(gulp.dest('resources/assets/less/others/'));

    gulp.src(dtDir + 'bootstrap/3/dataTables.bootstrap.js').pipe(gulp.dest('resources/assets/js/'));
});

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

elixir(function(mix) {
    //mix.sass('app.scss');
    //mix.phpUnit();
    //mix.phpSpec();

    /**
     * combine scripts
     */
    mix.scripts([
        'js/jquery.js',
        'js/bootstrap.js',
        'js/jquery.dataTables.js',
        'js/dataTables.bootstrap.js',
            'js/metisMenu.js',
            'js/jquery.goup.js'
    ],
        'public/assets/js/traydes.js',
        'resources/assets'
    );

    /**
     * compile less
     */
    mix.less(['admin.less'], 'public/assets/css/traydes.css');

});
