var gulp = require('gulp');
var cssnano = require('gulp-cssnano');
var sass = require('gulp-sass');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var sourcemaps = require('gulp-sourcemaps');


var PATH = {
    style: {
        src: './resources/sass/styles/*.scss',
        build: './public/css/',
    }
}


gulp.task('style:build', function (done) {
    gulp.src(PATH.style.src)
        .pipe(sass())
        .pipe(concat('main.css'))
        .pipe(gulp.dest(PATH.style.build));

    if (done) {
        done();
    }
});
