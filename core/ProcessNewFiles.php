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

		if ( $new_files === false ) {
			//TODO: notification
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

		//move file to new dir
		$pathinfo      = pathinfo( $file_name );
		$new_name      = sanitize_title_with_dashes( $pathinfo['filename'] ) . $pathinfo['extension'];
		$new_directory = $lumi_sfm['files_path'] . DIRECTORY_SEPARATOR . $directory_token;
		$mkdir         = mkdir( $new_directory, 0777, true );
		$rename        = rename( $file_path, $new_directory . DIRECTORY_SEPARATOR . $new_name );

		if ( $mkdir == false || $rename == false ) {
			//TODO: notification about unsucessful rename
			return;
		}

		//create post
		$post = wp_insert_post( array(
			'post_name'   => $new_name,
			'post_title'  => $file_name,
			'post_status' => 'publish',
			'post_type'   => 'secret_files'
		) );

		//Add metadata
		update_post_meta( $post, 'directory_token', $directory_token );
		update_post_meta( $post, 'url_token', $url_token );
	}

}

global $lumi_sfm;
$lumi_sfm['ProcessNewFiles'] = new ProcessNewFiles();