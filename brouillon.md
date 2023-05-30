const gulp = require( 'gulp' );
const { task, src, dest, watch, series } = gulp;
const autoprefixer = require( 'autoprefixer' );
const postcss = require( 'gulp-postcss' );
const sass = require( 'gulp-dart-sass' );
const sourcemaps = require( 'gulp-sourcemaps' );

const
	// variables for the working theme folder
	root = './';
const scss = root + 'sass/';

// CSS via Sass and Autoprefixer
task( 'css', function() {
	return src( scss + 'style.scss' )
		.pipe( init() )
		.pipe( sass( {
			outputStyle: 'expanded',
			precision: 10,
			indentType: 'tab',
			indentWidth: '1',
		} ).on( 'error', logError ) )
		.pipe( postcss( [ autoprefixer() ] ) )
		.pipe( write( './sass' ) )
		.pipe( dest( root ) );
} );

// Watch everything
task( 'watch', function() {
	watch( [ root + '**/*.scss' ], series( 'css' ) );
} );

// Default task that runs when running 'npx gulp'
task( 'default', series( 'css', 'watch' ) );


