var gulp           = require('gulp'),
	gutil          = require('gulp-util' ),
	sass           = require('gulp-sass'),
	browserSync    = require('browser-sync'),
	concat         = require('gulp-concat'),
	uglify         = require('gulp-uglify'),
	cleanCSS       = require('gulp-clean-css'),
	rename         = require('gulp-rename'),
	del            = require('del'),
	imagemin       = require('gulp-imagemin'),
	cache          = require('gulp-cache'),
	autoprefixer   = require('gulp-autoprefixer'),
	ftp            = require('vinyl-ftp'),
	notify         = require("gulp-notify"),
	csso 	   	   = require('gulp-csso'),
	rsync          = require('gulp-rsync');

		
/*********************************************
* Объединение файлов sass и преобразование в css
***********************************************/		
gulp.task('sass', function() {
	return gulp.src('sass/**/*.sass')
	.pipe(sass())
	.pipe(gulp.dest('../../../assets/bundle/css'));
});		
		
//* минимизирование основного файла css */
gulp.task('csso', ['sass'], function () {
    return gulp.src('../../../assets/bundle/css/main.css')
        .pipe(csso())
		.pipe(rename({suffix: '.min'}))
        .pipe(gulp.dest('../../../assets/bundle/css'));
});
		
		
/*********************************
Слежение за изменением файлов
*********************************/		

//gulp.task('watch', ['browser-sync', 'sass'], function() {
	//gulp.watch('app/sass/**/*.sass', ['sass']);
	//gulp.watch(['libs/**/*.js', 'app/js/common.js'], ['js']);
	//gulp.watch('app/*.html', browserSync.reload);
//});			

/*********************************************
* Перезагрузка страницы после изменения
***********************************************/
/*
gulp.task('browser-sync', function() {
	browserSync({
		proxy: 'localhost:8888',
		open: "local",
		//firefox: '-browser "firefox.exe"',
		browser: ["google chrome", "firefox"]
		//notify: false,
	});
});	*/ 
		
		
/*********************************************
* Объединение и минимизация JS
***********************************************/
gulp.task('common-js', function() {
	return gulp.src([
		'js/*.js',
		])
	.pipe(concat('main.min.js'))
	.pipe(uglify())
	.pipe(gulp.dest('js/'));
}); 

gulp.task('js', ['common-js'], function() {
	return gulp.src([
		'libs/jquery/jquery.min.js',
		'libs/jquery-mousewheel/jquery.mousewheel.min.js',
		'libs/scrollto/jquery.scrollTo.min.js',
		'libs/slick/slick.min.js',
		'js/main.min.js' // Всегда в конце
		])
	.pipe(concat('scripts.min.js'))
	//.pipe(uglify()) // Минимизировать весь js (на выбор)
	.pipe(gulp.dest('../../../assets/bundle/js'));
	//.pipe(browserSync.reload({stream: true}));
});

/*********************************************
* Работа с изображениями
***********************************************/
gulp.task('imagemin', function() {
	return gulp.src('images/**/*')
	.pipe(cache(imagemin())) // Cache Images
	.pipe(gulp.dest('../../../assets/bundle/images')); 
});


gulp.task('build', ['removedist', 'imagemin', 'csso', 'js'], function() {

	var buildFiles = gulp.src([
		'app/*.html',
		'app/.htaccess',
		]).pipe(gulp.dest('dist'));

	var buildCss = gulp.src([
		'app/css/main.min.css',
		]).pipe(gulp.dest('dist/css'));

	var buildJs = gulp.src([
		'app/js/scripts.min.js',
		]).pipe(gulp.dest('dist/js'));

	var buildFonts = gulp.src([
		'app/fonts/**/*',
		]).pipe(gulp.dest('dist/fonts'));

});

gulp.task('removedist', function() { return del.sync('dist'); });

gulp.task('default', ['build']);
