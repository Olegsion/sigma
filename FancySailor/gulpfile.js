const gulp = require('gulp')
const autoprefixer = require('gulp-autoprefixer')
const concat = require('gulp-concat')
const csso = require('gulp-csso')
const include = require('gulp-file-include')
const htmlmin =require('gulp-htmlmin')
const sass = require('gulp-sass')(require('sass'))
const del = require('del')
const sync = require('browser-sync').create()

function html() {
  return gulp.src('src/**.html')
  .pipe(include({
    prefix: '@@'
  }))
  .pipe(htmlmin({
    collapseWhitespace: true
  }))
  .pipe(gulp.dest('dist'))
}

function scss() {
  return gulp.src('src/scss/global.scss')
  .pipe(sass())
  .pipe(autoprefixer({
    broeser: ['last 2 versions']
  }))
  .pipe(csso())
  .pipe(concat('style.css'))
  .pipe(gulp.dest('dist'))
}

function images() {
  return gulp.src('./src/images/**.{gif,jpg,png,svg,ico}')
  .pipe(gulp.dest('dist/images'))
}

function js() {
  return gulp.src('./src/js/**.js')
  .pipe(gulp.dest('dist'))
}

function clean() {
  return del(['dist'])
}

function serve() {
  sync.init({
    server: './dist'
  })
  gulp.watch('src/**/**.html', gulp.series(html)).on('change', sync.reload)
  gulp.watch('src/scss/**.scss', gulp.series(scss)).on('change', sync.reload)
  gulp.watch('src/js/**.js', gulp.series(js)).on('change', sync.reload)
}

exports.build = gulp.series(clean, html, scss, js, images)
exports.serve = gulp.series(clean, html, scss, js, images, serve)
exports.images = images
exports.clean = clean