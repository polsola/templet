var project     = 'templet', 
    url         = 'templet.dev';

var gulp        = require('gulp');
var browserSync = require('browser-sync').create();
var sass        = require('gulp-sass');
var autoprefixer = require('gulp-autoprefixer');
var plumber     = require('gulp-plumber');
var rename      = require("gulp-rename");
var cleanCSS    = require('gulp-clean-css');
var uglify      = require('gulp-uglify');
var concat      = require('gulp-concat');

var scriptsToConcat = [
    "node_modules/foundation-sites/dist/js/foundation.js",
    "assets/scripts/app.js"
]

// Static Server + watching scss/html files
gulp.task('serve', ['styles'], function() {

    browserSync.init({
        proxy: url,
        open: false
    });

    gulp.watch("./assets/scss/**/*.scss", ['styles']);
    gulp.watch("./**/*.php").on('change', browserSync.reload);
    gulp.watch("./assets/scripts/**/*.js", ['scripts']);
});

// Compile scss into CSS & auto-inject into browsers
gulp.task('styles', function() {
    return gulp.src("./assets/scss/**/*.scss")
		.pipe(plumber())
        .pipe(sass.sync({
        	includePaths: ["node_modules/foundation-sites/scss", 'node_modules/motion-ui/src'] 
        }))
        .pipe(autoprefixer({
            browsers: ['last 2 versions'],
            cascade: false
        }))
        .pipe(gulp.dest("./static/css"))
        .pipe(browserSync.stream())
        .pipe(cleanCSS())
        .pipe(rename({
            suffix: ".min",
        }))
        .pipe(gulp.dest("./static/css"));
        
});

// Concat & uglify scripts
gulp.task('scripts', function() {
    return gulp.src(scriptsToConcat)
        .pipe(plumber())
        .pipe(concat('app.js'))
        .pipe(gulp.dest('./static/scripts'))
        .pipe(browserSync.stream())
        .pipe(uglify())
        .pipe(rename({
            suffix: ".min",
        }))
        .pipe(gulp.dest("./static/scripts"));
        
});



// Start serve on default task
gulp.task('default', ['serve']);