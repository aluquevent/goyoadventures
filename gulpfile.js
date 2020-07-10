const {src,dest,watch,series,parallel} = require('gulp');
const autoprefixer = require('gulp-autoprefixer');
const rename = require('gulp-rename');
const htmlmin = require('gulp-htmlmin');
const imagenmin = require('gulp-imagemin');
const uglify = require('gulp-uglify');
const sass = require('gulp-sass');

function compilar(){
    return src("dist/assets/scss/*.scss")
    .pipe(sass({
        outputStyle:"expanded"
    }))
    .pipe(dest("dist/assets/css"))
}

function renombrar(){
    return src("dist/assets/scss/*.scss")
    .pipe(sass({
        outputStyle:"compressed"
    }))
    .pipe(rename({
        suffix:".min"
    }))
    .pipe(dest("dist/assets/css"))
}

function vigilar(){
    watch("dist/assets/scss/*.scss",series(compilar,renombrar));    
}

exports.compilar = compilar;

exports.renombrar = renombrar;

exports.default = vigilar;







