var gulp = require('gulp-help')(require('gulp'));

// Plugins.
var sass = require('gulp-sass');
var rename = require('gulp-rename');

/**
 * Process SCSS using libsass
 */
gulp.task('sass', 'Compile the sass .', function () {
    'use strict';

    gulp.src('sass/infostanderaarhus.styles.scss')
        .pipe(sass({
            outputStyle: 'compressed'
        }).on('error', sass.logError))
        .pipe(rename({extname: ".min.css"}))
        .pipe(gulp.dest('css/'));
});
