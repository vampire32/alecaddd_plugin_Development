// Load Gulp...of course
var gulp = require('gulp');

// CSS related plugins
var sass = require('gulp-sass')(require('sass'));
var autoprefixer = require('gulp-autoprefixer');
var minifycss = require('gulp-uglifycss');

// JS related plugins
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var babel = require('gulp-babel');

// Utility plugins
var rename = require('gulp-rename');
var sourcemaps = require('gulp-sourcemaps');
var plumber = require('gulp-plumber');
var options = require('gulp-options');
var gulpif = require('gulp-if');

// Browers related plugins
var browserSync = require('browser-sync').create();

// Project related variables
var projectURL = 'https://test.dev';

var styleSRC = './src/scss/style.scss';
var styleURL = './assets/';
var mapURL = './';

var jsSRC = './src/js/index.js';
var jsURL = './assets/';

var styleWatch = './src/scss/**/*.scss';
var jsWatch = './src/js/**/*.js';
var phpWatch = './**/*.php';

// Tasks
gulp.task('browser-sync', function() {
    browserSync.init({
        proxy: projectURL,
        https: false, // Disable HTTPS
        injectChanges: true,
        open: false
    });
});


gulp.task('styles', function () {
    return gulp.src(styleSRC)
        .pipe(plumber())
        .pipe(sourcemaps.init())
        .pipe(sass({
            errLogToConsole: true,
            outputStyle: 'compressed'
        }))
        .pipe(autoprefixer({ browsers: ['last 2 versions', '> 5%', 'Firefox ESR'] }))
        .pipe(sourcemaps.write(mapURL))
        .pipe(gulp.dest(styleURL))
        .pipe(browserSync.stream());
});

var babel = require('gulp-babel');

gulp.task('js', function () {
    return gulp.src(jsSRC)
        .pipe(plumber())
        .pipe(sourcemaps.init())
        .pipe(babel({
            presets: ['@babel/env']
        }))
        .pipe(uglify())
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest(jsURL))
        .pipe(browserSync.stream());
});

gulp.task('default', gulp.parallel('styles', 'js'));

gulp.task('watch', gulp.series('default', 'browser-sync', function () {
    gulp.watch(phpWatch, browserSync.reload);
    gulp.watch(styleWatch, gulp.parallel('styles'));
    gulp.watch(jsWatch, gulp.parallel('js'));
}));

gulp.task('default', gulp.series('watch'));
