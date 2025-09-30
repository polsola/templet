var project     = 'templet', 
    domain      = 'templet',
    url         = 'localhost.local';

const gulp          = require('gulp');
const browserSync   = require('browser-sync').create();
const postcss       = require("gulp-postcss");
const svgmin        = require('gulp-svgmin');
const svgstore      = require('gulp-svgstore');
const rename        = require('gulp-rename');
const cheerio       = require('gulp-cheerio');
const wpPot         = require('gulp-wp-pot');

const paths = {
	styles: {
		src: "./assets/styles/*.css",
		dest: "./static/styles",
	},
    scripts: {
		src: "./assets/scripts/**/*.js",
		dest: "./static/scripts",
	},
    icons: {
		src: "./assets/icons/**/*.svg",
		dest: "./static/images",
	}
};

// Static Server + watching scss/html files
function serve() {

    browserSync.init( {
        proxy: url,
        open: false
    } );

    gulp.watch( "./assets/styles/**/*.css", gulp.parallel("styles") );
    gulp.watch( paths.scripts.src, gulp.parallel("scripts") );
    gulp.watch( "./**/*.php", gulp.parallel("styles") );
}

// Compile scss into CSS & auto-inject into browsers
function styles() {
	var tailwindcss = require("tailwindcss");
    return gulp
        .src(paths.styles.src)
        .pipe(
            postcss()
        )
        .pipe(gulp.dest(paths.styles.dest))
        .pipe(browserSync.stream());   
}

// Concat & uglify scripts
function scripts() {
    return gulp
        .src(paths.scripts.src)
        .pipe( browserSync.stream() )
        .pipe( gulp.dest(paths.scripts.dest) )
        .pipe(browserSync.stream());
        
}

// Generate .pot file to localize .php strings
function localize() {
    return gulp.src('./**/*.php')
        .pipe( wpPot( {
            domain: domain,
            package: project
        } ) )
        .pipe( gulp.dest('./languages/' + domain + '.pot') );
}

function icons() {
    return gulp.src(paths.icons.src)
        .pipe(cheerio({
            run: ($) => {
                $('[fill]').removeAttr('fill');
            },
            parserOptions: { xmlMode: true }
        }))
        .pipe(svgmin())
        .pipe(svgstore())
        .pipe(rename('icons.svg'))
        .pipe(gulp.dest(paths.icons.dest));
}

exports.serve = serve;
exports.styles = styles;
exports.scripts = scripts;
exports.localize = localize;
exports.icons = icons;