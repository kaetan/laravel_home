var gulp = require('gulp');
var cssnano = require('gulp-cssnano');
var sass = require('gulp-sass');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var sourcemaps = require('gulp-sourcemaps');

var PATH = {
    style: {
        src: './resources/sass/styles/*.scss',
        vendor_src: './resources/vendor/styles/*.css',
        build: './public/css/',
    },
    js: {
        src: [
            './resources/js/bootstrap.min.js',
            './resources/js/toastr.min.js',
            './resources/js/comments.js',
        ],
        build: './public/js/',
    }
};

gulp.task('style:build', function () {
    gulp.src(PATH.style.src)
        .pipe(sass())
        .pipe(concat('main.css'))
        .pipe(gulp.dest(PATH.style.build));
});

gulp.task('style_vendor:build', function () {
    gulp.src(PATH.style.vendor_src)
        .pipe(concat('static.css'))
        .pipe(gulp.dest(PATH.style.build));
});

gulp.task('js:build', function () {
    gulp.src(PATH.js.src)
        .pipe(concat('app.js'))
        .pipe(gulp.dest(PATH.js.build));
});

gulp.task('build', ['style:build', 'style_vendor:build', 'js:build']);
