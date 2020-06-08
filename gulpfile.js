/*
function tarea(cb){
    //Código a ejecutar
    cb();
}
export.tarea=tarea; //Con esta línea hago pública mi tarea
export.default = tarea; //Con esta línea establezco la tarea por defecto
*/
// "gulp": "^4.0.2",
//     "gulp-autoprefixer": "^7.0.1",
//         "gulp-htmlmin": "^5.0.1",
//             "gulp-imagemin": "^7.1.0",
//                 "gulp-rename": "^2.0.0",
//                     "gulp-sass": "^4.1.0",
//                         "gulp-uglify": "^3.0.2"

const {src,dest,watch,series,parallel} = require('gulp');
const autoprefixer = require('gulp-autoprefixer');
const rename = require('gulp-rename');
const htmlmin = require('gulp-htmlmin');
const imagenmin = require('gulp-imagemin');
const uglify = require('gulp-uglify');
const sass = require('gulp-sass');

function compilar(){
    return src("assets/scss/*.scss")
    .pipe(sass({
        outputStyle:"expanded"
    }))
    .pipe(dest("assets/css"))
}

function renombrar(){
    return src("assets/scss/*.scss")
    .pipe(sass({
        outputStyle:"compressed"
    }))
    .pipe(rename({
        suffix:".min"
    }))
    .pipe(dest("assets/css"))
}

function vigilar(){
    watch("assets/scss/*.scss",series(compilar,renombrar));
    
}

exports.compilar = compilar;
exports.vigilar = vigilar;
exports.renombrar = renombrar;

// exports.compilar = () => {
//     return src(archivos).pipe(plugins).pipe(dest(carpetadestino))
// }

// exports.compilar = () => {
//     return src("scss/*.scss").pipe(sass()).pipe(dest("dist/css"))
// }

exports.default = vigilar;

// exports.default = () => {
//     watch("scss/*.scss",compilar);
// }






