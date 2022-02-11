//Подключаем галп
const gulp = require('gulp');
//Объединение файлов
const concat = require('gulp-concat');
//Добапвление префиксов
const autoprefixer = require('gulp-autoprefixer');
//Оптисизация стилей
const cleanCSS = require('gulp-clean-css');
//Оптимизация скриптов
const uglify = require('gulp-uglify');
//Удаление файлов
const del = require('del');
//Синхронизация с браузером
const browserSync = require('browser-sync').create();
//Для препроцессоров стилей
const sourcemaps = require('gulp-sourcemaps');
//Sass препроцессор
const sass = require('gulp-sass');


//Порядок подключения файлов со стилями
const styleClientFiles = [
   // './src/client/scss/_swiper-bundle.scss',
   './src/client/scss/aos.scss',
   './src/client/scss/main.scss'


]
//Порядок подключения js файлов
const scriptClientFiles = [
   // './src/js/jquery-3.5.1.js',
   './src/client/js/aos.js',
   // './src/js/slick.js',
   // './src/js/feedback.js',
   // './src/client/js/jquery.selectric.js',
   './src/client/js/swiper-bundle.js',
   // './src/client/js/jquery.mCustomScrollbar.js',
   // './src/client/js/fresco.min.js',
   './src/client/js/scripts.js'

]

//Таск для обработки стилей
gulp.task('sassClient', () => {
   //Шаблон для поиска файлов CSS
   //Всей файлы по шаблону './src/css/**/*.css'
   return gulp.src(styleClientFiles)
      .pipe(sourcemaps.init())
      //Указать stylus() , sass() или less()
      .pipe(sass())
      //Объединение файлов в один
      .pipe(concat('style.css'))
      //Добавить префиксы
      .pipe(autoprefixer({
         Browserslist: ['last 2 versions'],
         cascade: false
      }))
      //Минификация CSS
      .pipe(cleanCSS({
         level: 2
      }))
      .pipe(sourcemaps.write('./'))
      //Выходная папка для стилей
      .pipe(gulp.dest('./dist/css'))
      .pipe(browserSync.stream());
});

//Таск для обработки скриптов
gulp.task('scriptsClient', () => {
   //Шаблон для поиска файлов JS
   //Всей файлы по шаблону './src/js/**/*.js'
   return gulp.src(scriptClientFiles)
      //Объединение файлов в один
      .pipe(concat('common.js'))
      //Минификация JS
      .pipe(uglify({
         toplevel: true
      }))
      //Выходная папка для скриптов
      .pipe(gulp.dest('./dist/js'))
      .pipe(browserSync.stream());
});

//Таск для очистки папки build
gulp.task('delClient', () => {
   return del(['dist/css/style.css.map' , 'dist/css/style.css', 'dist/js/common.js'])
});

//Таск для отслеживания изменений в файлах
gulp.task('watchClient', () => {
   // browserSync.init({
   //    server: {
   //       baseDir: "./"
   //    }
   // });
   //Следить за файлами со стилями с нужным расширением
   gulp.watch('./src/client/scss/**/*.scss', gulp.series('sassClient'))
   //Следить за JS файлами
   gulp.watch('./src/client/js/**/*.js', gulp.series('scriptsClient'));
   //При изменении HTML запустить синхронизацию
   gulp.watch("./*.html").on('change', browserSync.reload);
});

//Таск по умолчанию, Запускает del, styles, scripts и watch
gulp.task('default', gulp.series('delClient', gulp.parallel('sassClient', 'scriptsClient'), 'watchClient'));