var gulp = require('gulp');
var sass = require('gulp-sass');
var browserSync = require('browser-sync').create();

var uglify = require('gulp-uglify');
var pump = require('pump');

var uglifycss = require('gulp-uglifycss');

// var reload = browser-sync.reload();

gulp.task('sync', function () {

    browserSync.init({
        server: {
            open: false,
            injectChanges: true,
            proxy: "http://tjing.dev"
        }
    });
    gulp.watch(['./scss/*.scss'], ['styles']);
    gulp.watch(['./js/*.js'], ['uglifyjs']);
    gulp.watch(['./prefix/*.css'], ['uglifycss']);
    gulp.watch(['./*.html']).on('change', browserSync.reload);
    gulp.watch('./js/*.js').on('change', browserSync.reload);
    // proxy: "tjing.dev",'
    // files: "*.css,*.html,css/*css"


});

gulp.task('styles', function () {
    gulp.src('./scss/style.scss')
        .pipe(sass())
        .pipe(gulp.dest('./css'))
        .pipe(browserSync.reload({stream: true}))
        .pipe(autoprefixer({
            browsers: ['last 2 versions'],
            cascade: false
        }))
        .pipe(gulp.dest('dist'))


});


const autoprefixer = require('gulp-autoprefixer');

gulp.task('prefix', function () {
    gulp.src('css/style.css')
        .pipe(autoprefixer({
            browsers: ['last 2 versions'],
            cascade: false
        }))
        .pipe(gulp.dest('prefix'))
});


gulp.task('uglifyjs', function (cb) {
    pump([
            gulp.src('js/*.js'),
            uglify(),
            gulp.dest('dist'),
        ],
        cb
    );
});


gulp.task('css', function () {
    gulp.src('prefix/*.css')
        .pipe(uglifycss({
            "maxLineLen": 80,
            "uglyComments": true
        }))
        .pipe(gulp.dest('dist'));
});

