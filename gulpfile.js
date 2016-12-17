var elixir = require( 'laravel-elixir' );
var gulp = require( 'gulp' );
var zip = require( 'gulp-zip' );
var copy = require( 'gulp-copy' );
var clean = require( 'gulp-clean' );

elixir.config.sourcemaps = false;
elixir.config.assetsPath = 'src';
elixir.config.publicPath = '';
elixir.config.notifications = false;
elixir.config.css.sass.folder = 'css';

elixir.extend( 'build_plugin', function( source, dest ) {

	return new elixir.Task( 'build_plugin', function () {

		if( elixir.inProduction === true ) {

			return gulp.src( source )
				.pipe( copy( '_tmp/secret-file-manager' ) )
				.on( 'end', function() {
					return gulp.src( '_tmp/**/*' )
						.pipe( zip( dest ) )
						.pipe( gulp.dest( './' ) )
						.on( 'end', function() {
							gulp.src( '_tmp' ).pipe( clean() );
						} );
				} );

		}

	} );

} );

elixir( function( mix ) {

	mix .sass( 'lumi_secret_files_admin.scss' )
		.scripts( [ 'clipboard.js', 'clipboard_init.js' ], 'js/lumi_secret_files_admin.js' )
		.build_plugin( [
			'Helpers/**/*',
			'Models/**/*',
			'core/**/*',
			'css/**/*',
			'js/**/*',
			'templates/**/*',
			'readme.md',
			'secret-file-manager.php'
		],
		'secret-file-manager.zip' );

} );