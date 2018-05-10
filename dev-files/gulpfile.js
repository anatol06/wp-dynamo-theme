var themename = 'uwp-10';

var gulp          = require('gulp'),
    autoprefixer  = require('autoprefixer'),
    browserSync   = require('browser-sync'),
    postcss       = require('gulp-postcss'),
    sass          = require('gulp-sass'),    
    concat        = require('gulp-concat'),
    uglify        = require('gulp-uglify'),
    plumber       = require('gulp-plumber'),
    notify        = require('gulp-notify'), 
    jsHint        = require('gulp-jshint'),
    stylish       = require('jshint-stylish'),
    //newer         = require('gulp-newer'), // Only work with new or updated files
    
    root  = '../' + themename + '/', // Name of working theme folder
    scss  = root + 'src/scss/',
    srcjs = root + 'src/js/',
    css   = root + 'css/',
    js    = root + 'js/';
    

// Return the error in console
var onError = function (err) {
  notify.onError({
    title: "Gulp",
    subtitle: "Failure!",
    message: "Error: <%= error.message %>",
    sound: "Beep"
  })(err);

  this.emit('end');
};

// CSS via Sass and Autoprefixer
gulp.task('css', function () {
  return gulp.src(scss + '*.scss')
    .pipe(plumber({ errorHandler: onError }))
    //.pipe(sourcemaps.init())
    .pipe(sass({
      outputStyle: 'compressed', /* 'extended', */
      indentType: 'tab',
      indentWidth: '1'
    }))    
    .pipe(postcss([
      autoprefixer('last 2 versions', '> 1%')
    ]))
    //.pipe(sourcemaps.write(scss + 'maps'))
    .pipe(gulp.dest(css))
    .pipe(browserSync.stream());
});

// JavaScript
gulp.task('javascript', function () {
  return gulp.src([srcjs + '*.js'])
    //.pipe(jsHint())
    //.pipe(jsHint.reporter(stylish))
    .pipe(concat('main.js'))
    .pipe(uglify())
    .pipe(gulp.dest(js))
    .pipe(browserSync.stream());
});

// Watch everything
gulp.task('watch', function () {
  browserSync.init({
    //open: 'external',
    notify: false,
    injectChanges: true,
    proxy: 'http://localhost/' + themename
    //server: {
    //  baseDir: '../' + themename
    //}
  });
  gulp.watch([/* css  + '*.css', */ scss + '**/*.scss'], ['css']);
  gulp.watch(srcjs + '**/*.js', ['javascript']);
  gulp.watch(root  + '**/*.php').on('change', browserSync.reload);
});


// Default task (runs at initiation: gulp --verbose)
gulp.task('default', ['watch']);