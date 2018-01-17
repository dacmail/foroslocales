var gulp = require('gulp');
var less = require('gulp-less');
var path = require('path');
var cleanCSS = require('gulp-clean-css');
var concat = require('gulp-concat');
var sourcemaps = require('gulp-sourcemaps');
var uglify = require('gulp-uglify');


gulp.task('prepare-css', function () {
    gulp.src('./css/**/*.less')
        .pipe(less())
        .pipe(cleanCSS())
        .pipe(gulp.dest('./dist/css'));
});
gulp.task('js', function() {
  return gulp.src([
      './js/main.js',
    ])
    .pipe(sourcemaps.init())
    .pipe(concat('main.js'))
    .pipe(gulp.dest('./dist/js/'))
    .pipe(uglify())
    .pipe(sourcemaps.write('./'))
    .pipe(gulp.dest('./dist/js/'));
});
gulp.task('copy', function () {
    gulp.src('*.html')
        .pipe(gulp.dest('./dist/'));
    gulp.src('./images/**')
        .pipe(gulp.dest('./dist/images/'));
});
gulp.task('watch', function() {
  gulp.watch('./css/*.less', ['prepare-css']);
  gulp.watch('./js/*.js', ['js']);
  gulp.watch('./*.html', ['copy']);
});
gulp.task('default', ['prepare-css', 'js', 'copy']);
