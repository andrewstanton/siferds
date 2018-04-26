var gulp = require('gulp'),
sass = require('gulp-sass'),
cleanCSS = require('gulp-clean-css'),
rename = require("gulp-rename"),
plumber = require('gulp-plumber'),
gutil = require('gulp-util'),
notify = require('gulp-notify'),
concat = require('gulp-concat'),
uglify = require('gulp-uglify');

//var connect = require('gulp-connect');

var config = {
    publicCSSDir: './css',
    publicJSCompDir: './js',
    sassDir: './production/sass/',
    jsDir: './production/js/'
}

//keeps gulp from crashing for scss errors & gives sass access to bootstrap
gulp.task('sass', function() {
    gulp.src( config.sassDir + '*.scss')
        .pipe(plumber({ errorHandler: function(err) {
            notify.onError({
                title: "Gulp error in " + err.plugin,
                message:  err.toString()
            })(err);

            // play a sound once
            gutil.beep();
        }})) 
        .pipe(sass())
        .pipe(gulp.dest(config.publicCSSDir))
        .pipe(rename({
            suffix: '.min'
        }))
        .pipe(cleanCSS())     
        .pipe(gulp.dest(config.publicCSSDir));

});

gulp.task('scripts', function(){
    gulp.src(config.jsDir + '*.js')
    .pipe(plumber({ errorHandler: function(err) {
        notify.onError({
            title: "Gulp error in " + err.plugin,
            message:  err.toString()
        })(err);
        // play a sound once
        gutil.beep();
    }}))
    .pipe(concat('app.js'))
    .pipe(gulp.dest( config.publicJSCompDir ))
    .pipe(rename({
        suffix: '.min'
      }))
    .pipe(uglify())
    .pipe(gulp.dest( config.publicJSCompDir ));
});

gulp.task('watch', function() {
    gulp.watch(config.sassDir + '**/*.scss', ['sass']);
    gulp.watch(config.jsDir + '*.js', ['scripts']);
});

gulp.task('default', ['sass', 'scripts', 'watch']);