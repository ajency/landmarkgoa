// var gulp = require('gulp'),
//     cleanCSS = require('gulp-clean-css'),
//     concat = require('gulp-concat'),
//     uglify = require('gulp-uglify'),
//     csso = require('gulp-csso'),
//     prefix = require('gulp-autoprefixer'),
//     sass = require('gulp-sass'),
//     minify = require('gulp-minify');

// // Minifies JS
// gulp.task('scripts', function(){
//     return gulp.src(['./wp-content/themes/ajency-portfolio/js/bootstrap.min.js',
//         './wp-content/themes/ajency-portfolio/js/lazysizes.min.js',
//         './wp-content/themes/ajency-portfolio/js/slick.min.js'])
//     .pipe(uglify())
//     .pipe(concat('combine.js'))
//     .pipe(gulp.dest('./wp-content/themes/ajency-portfolio/js'))
// });

// gulp.task('compress', function() {
//     return gulp.src('./wp-content/themes/ajency-portfolio/js/custom.js')
//     .pipe(uglify())
//     .pipe(concat('custom.min.js'))
//     .pipe(gulp.dest('./wp-content/themes/ajency-portfolio/js'))
// });

// // SASS Version
// gulp.task('sass', function() {
//     return gulp.src('./wp-content/themes/ajency-portfolio/scss/custom.scss')
//         .pipe(sass())
//         // Minify the file
//         .pipe(csso())
//         .pipe(gulp.dest("./wp-content/themes/ajency-portfolio/css"))
//         // .pipe(browserSync.stream());
// });


// // CSS Version
// gulp.task('css', function(){
//     // return gulp.src('./themes/kss/static/css/*.css')
//     return gulp.src(['./wp-content/themes/ajency-portfolio/css/custom.css'])
//      .pipe(csso())
//      .pipe(concat('combine.css'))
//    .pipe(gulp.dest('./wp-content/themes/ajency-portfolio/css'))
// });

// gulp.task('default', function() {
//     gulp.run('scripts')
//     gulp.run('compress')
//     gulp.run('css')
// });

// gulp.task('watch', ['sass'], function() {
//     gulp.watch(['./wp-content/themes/ajency-portfolio/scss/*.scss'], ['sass']);
//      return gulp.src(['./wp-content/themes/ajency-portfolio/css/custom.css'])
//       .pipe(csso())
//       .pipe(concat('combine.css'))
//     .pipe(gulp.dest('./wp-content/themes/ajency-portfolio/css'))
// });

var gulp = require("gulp"),
    sass = require("gulp-sass"),
    postcss = require("gulp-postcss"),
    concat = require('gulp-concat'),
    uglify = require('gulp-uglify'),
    autoprefixer = require("autoprefixer"),
    cssnano = require("cssnano"),
    sourcemaps = require("gulp-sourcemaps");
    minifyCSS   = require('gulp-clean-css');

// Put this after including our dependencies
var paths = {
    styles: {
        src: "wp-content/themes/ajency-portfolio/scss/*.scss",
        dest: "wp-content/themes/ajency-portfolio/css"
    }
};

gulp.task('sass', function() {
    return gulp.src([
            'wp-content/themes/ajency-portfolio/scss/custom.scss'
        ])
        .pipe(sass())
        .pipe(minifyCSS())
        .pipe(concat('custom.min.css'))
        .pipe(gulp.dest(paths.styles.dest))
});

// Define tasks after requiring dependencies
function style() {
    return (
        gulp
            .src(paths.styles.src)
            .pipe(sourcemaps.init())
            .pipe(sass())
            .on("error", sass.logError)
            .pipe(postcss([autoprefixer(), cssnano()]))
            .pipe(sourcemaps.write())
            .pipe(gulp.dest(paths.styles.dest))
            // Add browsersync stream pipe after compilation
            //.pipe(browserSync.stream())
    );
}

// Gulp task to minify JavaScript files
gulp.task('compress', function() {
    return gulp.src('./wp-content/themes/ajency-portfolio/js/custom.js')
    .pipe(uglify())
    .pipe(concat('custom.min.js'))
    .pipe(gulp.dest('./wp-content/themes/ajency-portfolio/js'))
});

function watch(){
    // gulp.watch takes in the location of the files to watch for changes
    // and the name of the function we want to run on change
    style();
 
    gulp.watch(paths.styles.src, style);
}
	
// Expose the task by exporting it
// This allows you to run it from the commandline using
// $ gulp style
	
exports.watch = watch