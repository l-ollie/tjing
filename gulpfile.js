var gulp = require('gulp');
var sass = require('gulp-sass');
var browserSync = require('browser-sync').create();
// var reload = browser-sync.reload();

gulp.task('sync', function () {

    browserSync.init({
        server: {
            open: false,
            injectChanges: true,
            proxy: "http://tjing.dev"
        }
    });
    gulp.watch('./scss/*.scss', ['styles']);
    gulp.watch('./**/*.html').on('change', browserSync.reload);
    // proxy: "tjing.dev",
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
        .pipe(gulp.dest('dist'))
})
;