<?php


namespace Lumiart\SecretFileManager;


class DeleteFile {

	private $file_id;

	public function __construct() {

		$this->file_id = $_REQUEST['delete'];
		$this->delete();

	}

	private function delete() {

		global $lumi_sfm;

		if ( (int) $this->file_id == false ) {
			$lumi_sfm['admin_notices'][] = array(
				'type'    => 'error',
				'message' => 'Nepodařilo se smazat soubor, neplatná URL.'
			);

			return;
		}

		//get post
		$query = new \WP_Query( array(
			'post_type'      => 'secret_files',
			'p'              => $this->file_id,
			'posts_per_page' => 1
		) );

		//delete directory and all files in it
		$dir_token = get_post_meta( $query->post->ID, 'directory_token', true );

		if( $dir_token == '' ) {
			$lumi_sfm['admin_notices'][] = array(
				'type'    => 'error',
				'message' => 'Nepodařilo se smazat soubor.'
			);

			return;
		}

		$dir_path = $lumi_sfm['files_path'] . '/' . $dir_token . '/';
		foreach( scandir( $dir_path ) as $file ){
			if( $file != '.' && $file != '..' ) {
				unlink( $dir_path . $file );
			}
		}
		rmdir( $dir_path );

		//delete post
		wp_delete_post( $query->post->ID, true );

		$lumi_sfm['admin_notices'][] = array(
			'type'    => 'updated',
			'message' => 'Soubor ' . $query->post->post_title . ' byl smazán.'
		);

	}

}


global $lumi_sfm;
$lumi_sfm['DeleteFile'] = new DeleteFile();