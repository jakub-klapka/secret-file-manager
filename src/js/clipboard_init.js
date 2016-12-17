( function( $, Clipboard ) {

	$( function() {
		var clipboard = new Clipboard( '.copy_to_clipboard' );

		clipboard.on( 'success',  function( event ) {

			var button = $( event.trigger );

			button.css( 'color', 'green' );

			clearTimeout( button.data( 'color_timeout' ) );
			button.data( 'color_timeout', setTimeout( function() {
				button.css( 'color', '' );
			}, 2000 ) );

		} );

	} );

} )( jQuery, Clipboard );