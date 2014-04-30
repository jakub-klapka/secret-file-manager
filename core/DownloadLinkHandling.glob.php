<?php


namespace Lumiart\SecretFileManager\Glob;


class DownloadLinkHandling {

	public function __construct() {
		add_action( 'init', array( $this, 'add_rewrite_rule' ) );
		add_action( 'parse_request', array( $this, 'parse_request' ) );
	}

	public function add_rewrite_rule() {
		add_rewrite_rule( 'f\/([^\/]+)\/([^\/]+)\/?$', 'index.php?secret_file=1&token=$matches[1]&filename=$matches[2]', 'bottom' );
		add_rewrite_tag( '%secret_file%', '([^&]+)' );
		add_rewrite_tag( '%token%', '([^&]+)' );
		add_rewrite_tag( '%filename%', '([^&]+)' );
	}

	public function parse_request( $request ) {
		if ( isset( $request->query_vars['secret_file'] ) && $request->query_vars['secret_file'] == '1' ) {
			//we are handling file
			$this->redirect_to_file( $request->query_vars['token'], $request->query_vars['filename'] );
		}
	}

	private function redirect_to_file( $token, $filename ) {

		$query = new \WP_Query( array(
			'post_type'  => 'secret_files',
			'meta_key'   => 'url_token',
			'meta_value' => $token
		) );

		//if url token don't exist
		if ( $query->post_count != 1 ) {
			wp_die( 'K tomuto souboru nemáte přístup', 'Chyba', array( 'back_link' => true ) );
		}

		//if filename dont match
		if ( $filename !== $query->post->post_name ) {
			wp_die( 'K tomuto souboru nemáte přístup', 'Chyba', array( 'back_link' => true ) );
		}


		//All passed, serve file:

		//update download count
		$count = get_post_meta( $query->post->ID, 'download_count', true );
		update_post_meta( $query->post->ID, 'download_count', $count + 1 );

		//get file url
		$dir_token = get_post_meta( $query->post->ID, 'directory_token', true );

		global $lumi_sfm;
		$dir_path = $lumi_sfm['files_path'] . '/' . $dir_token;
		$files    = scandir( $dir_path );

		foreach ( $files as $file ) {
			if ( $file != '.' && $file != '..' ) {
				$filename = $file;
			}
		}

		$file_url = $lumi_sfm['files_url'] . '/' . $dir_token . '/' . $filename;

		printf( '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<title>Stažení souboru</title>
<meta http-equiv="REFRESH" content="0;url=%s">
</HEAD>
<BODY>
Zahajuji stahování souboru, pokud se nic nestalo, <a href="%s">kliknětě prosím zde</a>
</BODY>
</HTML>', $file_url, $file_url );

		exit();

	}

} 
