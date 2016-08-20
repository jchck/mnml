var devUrl			= 'http://vagrant.local/jchck/';

var autoprefixer	=	require('autoprefixer');
var browserSync		=	require('browser-sync').create();
var browserReload	=	browserSync.reload();
var mqpacker		=	require('css-mqpacker');
var cssnano			=	require('cssnano');
var gulp			=	require('gulp');
var imagemin		=	require('gulp-imagemin');
var postcss			=	require('gulp-postcss');
var size			=	require('gulp-size');
var uncss			=	require('gulp-uncss');
var watch			=	require('gulp-watch')
var calc			=	require('postcss-calc');
var color			=	require('postcss-color-function');
var media			=	require('postcss-custom-media');
var properties		=	require('postcss-custom-properties');
var comments		=	require('postcss-discard-comments');
var atImport		=	require('postcss-import');

var plugins			=	[
	atImport,
	media,
	properties,
	calc,
	color,
	comments,
	autoprefixer,
	cssnano,
	mqpacker
];

var templates		=	[
	devUrl,
	devUrl + 'everything'
]

gulp.task('css', function(){
	return gulp.src('./src/css/mnml.css')
		.pipe(postcss(plugins))
		.pipe(size({gzip: true, showFIles: true}))
		.pipe(gulp.dest('./dest'))
		.pipe(browserSync.stream());
});

gulp.task('img', function(){
	return gulp.src('./src/img/**.*')
		.pipe(imagemin({verbose: true}))
		.pipe(gulp.dest('./dest'))
		.pipe(browserSync.stream());
});

gulp.task('watch', function(){
	browserSync.init({
		files: [
			'*.php'
		],
		proxy: devUrl,
		snippetOptions: {
			whitelist: ['/wp-admin/admin-ajax.php'],
			blacklist: ['/wp-admin/**']
		}
	});
	gulp.watch(['./src/css/*'], ['css']);
	gulp.watch(['./src/img/*'], ['pics']);
});

gulp.task('uncss', function(){
	return gulp.src('./dest/mnml.css')
		.pipe(uncss({html: templates}))
		.pipe(postcss(plugins))
		.pipe(size({gzip: true, showFIles: true, title: 'Uncss\'d and gZipped!'}))
		.pipe(gulp.dest('./dest'))
		.pipe(browserSync.stream());
});

gulp.task('default', ['css', 'img', 'watch']);
