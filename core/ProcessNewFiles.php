<?php


namespace Lumiart\SecretFileManager;


class ProcessNewFiles {

	public function __construct() {
		$this->check_for_new_files();
	}

	private function check_for_new_files() {
		global $lumi_sfm;
		$import_dir = $lumi_sfm['import_path'];

		$new_files = scandir( $import_dir );

		$new_files = array_filter( $new_files, function ( $item ) {
			if ( $item == '.' || $item == '..' ) {
				return false;
			}

			return true;
		} );

		if ( empty( $new_files ) ) {
			global $lumi_sfm;
			$lumi_sfm['admin_notices'][] = array( 'type' => 'error', 'message' => 'Žádné nové soubory nenalezeny' );

			return;
		}

		foreach ( $new_files as $file_name ) {
			$this->add_new_file( $import_dir . DIRECTORY_SEPARATOR . $file_name, $file_name );
		}

	}

	private function add_new_file( $file_path, $file_name ) {
		global $lumi_sfm;

		//generate tokens
		$directory_token = substr( str_shuffle( "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ" ), 0, 30 );
		$url_token       = substr( str_shuffle( "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ" ), 0, 6 );

		//TODO: check for existing dir

		//move file to new dir
		$server_file_encoding = mb_detect_encoding( $file_name );
		$pathinfo             = pathinfo( $file_name );
		$new_name             = sanitize_title_with_dashes( sanitize_title( iconv( $server_file_encoding, "UTF-8", $pathinfo['filename'] ) ) ) . '.' . $pathinfo['extension'];
		$new_directory        = $lumi_sfm['files_path'] . DIRECTORY_SEPARATOR . $directory_token;
		$mkdir                = mkdir( $new_directory, 0777, true );
		$new_file_path = $new_directory . DIRECTORY_SEPARATOR . $new_name;
		$rename               = rename( $file_path, $new_file_path );

		if ( $mkdir == false || $rename == false ) {
			global $lumi_sfm;
			$lumi_sfm['admin_notices'][] = array( 'type' => 'error', 'message' => 'Nepodařilo se zpracovat soubory' );

			return;
		}

		chmod( $new_file_path, 0644 );

		//create post
		$post = wp_insert_post( array(
			'post_name'   => $new_name,
			'post_title'  => iconv( $server_file_encoding, "UTF-8", $file_name ),
			'post_status' => 'publish',
			'post_type'   => 'secret_files'
		) );

		//Add metadata
		if ( $post == 0 ) {
			global $lumi_sfm;
			$lumi_sfm['admin_notices'][] = array(
				'type'    => 'error',
				'message' => 'Nepodařilo se zapsat nový soubor do databáze'
			);

			return;
		}

		$u[] = update_post_meta( $post, 'directory_token', $directory_token );
		$u[] = update_post_meta( $post, 'url_token', $url_token );
		$u[] = update_post_meta( $post, 'download_count', 0 );

		if ( in_array( false, $u ) ) {
			global $lumi_sfm;
			$lumi_sfm['admin_notices'][] = array(
				'type'    => 'error',
				'message' => 'Nepodařilo se aktualizovat metadata souboru.'
			);

			return;
		}

		global $lumi_sfm;
		$lumi_sfm['admin_notices'][] = array(
			'type'    => 'updated',
			'message' => 'Úspěšně přidán soubor ' . iconv( $server_file_encoding, "UTF-8", $file_name )
		);
	}

}

global $lumi_sfm;
$lumi_sfm['ProcessNewFiles'] = new ProcessNewFiles();