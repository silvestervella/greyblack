var gulp = require('gulp'),
    newer = require('gulp-newer'),
    changed = require('gulp-changed'),
    sourcemaps = require('gulp-sourcemaps'),
    sass = require('gulp-sass'),
    prefix = require('gulp-autoprefixer'),
    minifyCSS = require('gulp-clean-css'),
    concat = require('gulp-concat'),
    uglify = require('gulp-uglify'),
    gutil = require( 'gulp-util' ),
    ftp = require( 'vinyl-ftp' ),  // If SFTP uncomment below
    // sftp = require('gulp-sftp'),
    watch = require('gulp-watch'),  
    cache = require('gulp-cached');

var localChildDir = 'app/wp-content/themes/html5blank-stable-child',
    serverChildDir = 'public_html/wp-content/themes/html5blank-stable-child';

var globs = [
    localChildDir + '/**/*.css',
    localChildDir + '/js/*.js',
    localChildDir + '/*.php'
];

// Deploy To Server (FTP) 
var conn = ftp.create( {
    host:     'ftp.silvestervella.com',
    user:     'silvevf4',
    password: 'g5HMAywI7t1P!',
    parallel: 10,
    log:      gutil.log
} );
/*
function deployftp() {
	return gulp.src( globs, { base: localChildDir, buffer: false } )
		.pipe( conn.newer( serverChildDir ) ) // Dir on server
		.pipe( conn.dest( serverChildDir ) ); // Dir on server
};
*/
function deploy_plugins_ftp() {
	return gulp.src( 'plugins/**/*.php' )
		.pipe( conn.newer( 'public_html/wp-content/plugins' ) ) // Dir on server
		.pipe( conn.dest( 'public_html/wp-content/plugins' ) ); // Dir on server
};
function deploy_styles_ftp() {
	return gulp.src( localChildDir + '/**/*.css' )
		.pipe( conn.newer( serverChildDir ) ) // Dir on server
		.pipe( conn.dest( serverChildDir  ) ); // Dir on server
};
function deploy_theme_ftp() {
	return gulp.src( localChildDir + '/*.php' )
		.pipe( conn.newer( serverChildDir ) ) // Dir on server
		.pipe( conn.dest( serverChildDir ) ); // Dir on server
};
function deploy_scripts_ftp() {
	return gulp.src( localChildDir + '/**/*.js' )
		.pipe( conn.newer( serverChildDir ) ) // Dir on server
		.pipe( conn.dest( serverChildDir  ) ); // Dir on server
};

// Deploy To Server (SFTP) 
gulp.task('deploysftp', function(){
	return gulp.src( globs, { base: localChildDir, buffer: false } )
    .pipe(changed(serverChildDir))
    .pipe(cache('linting'))
    .pipe(gulp.dest(serverChildDir))
            .pipe(sftp({
                host:     '',
                user:     '',
                password: '',
                remotePath: ''
            }));
});

const logError = function(error){
    console.log(error);
    this.emit('end');
};

function styles() {
    return gulp.src('scss/all.scss')
    .pipe(sourcemaps.init())
    .pipe(sass())
    .pipe(prefix('last 2 versions'))
    .pipe(minifyCSS())
    .pipe(sourcemaps.write('../maps'))
    .pipe(gulp.dest(localChildDir + '/css'))
  }

function admin() {
    return gulp.src('scss/dashboard/admin-style.scss')
    .pipe(sass())
    .pipe(prefix('last 2 versions'))
    .pipe(minifyCSS())
    .pipe(gulp.dest(localChildDir + '/css'))
  }

function theme() {
    return gulp.src('theme_files/*.php')
    .pipe( newer( localChildDir ) )
    .pipe( gulp.dest( localChildDir ) );
}

function plugins(){
    return gulp.src('plugins/**/*.php')
    .pipe( newer( 'app/wp-content/plugins' ) )
    .pipe( gulp.dest( 'app/wp-content/plugins' ) );
};

function scripts() {
    return gulp.src('js/*.js')
    .pipe(uglify())
    .pipe(concat('script.js'))
    .pipe(gulp.dest(localChildDir + '/js'))
};

function watchScss() {
    gulp.watch(['scss/*.scss'], gulp.series(styles, deploy_styles_ftp)).on('error', logError),
    gulp.watch(['scss/dashboard/admin-style.scss'], gulp.series(admin , deploy_styles_ftp)).on('error', logError),
    gulp.watch(['theme_files/*.php'], gulp.series(theme , deploy_theme_ftp)).on('error', logError),
    gulp.watch(['plugins/**/*.php'], gulp.series(plugins , deploy_plugins_ftp)).on('error', logError),
    gulp.watch(['js/*.js'], gulp.series(scripts , deploy_scripts_ftp)).on('error', logError)
}
  
gulp.task('default', function(done) {
    console.log('watching');
    watchScss(done);
  });
