<?php

namespace Lumiart\SecretFileManager\Helpers;

class FileSizeHelper {

	public static function friendlyFilesize( $size_in_bytes, $dec_points = 2 ) {
		$size   = array( 'B', 'kB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB' );
		$factor = floor( ( strlen( $size_in_bytes ) - 1 ) / 3 );

		return sprintf( "%.{$dec_points}f", $size_in_bytes / pow( 1024, $factor ) ) . ' ' . @$size[ $factor ];
	}

}