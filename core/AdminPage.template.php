<?php


namespace Lumiart\SecretFileManager\Template;

use Lumiart\SecretFileManager\Helpers\FileSizeHelper;
use Lumiart\SecretFileManager\Models\SecretFile;

class AdminPage {

	public function get_notices() {
		global $lumi_sfm;
		if ( ! isset( $lumi_sfm['admin_notices'] ) ) {
			return false;
		}

		return $lumi_sfm['admin_notices'];
	}

	public function get_files() {
		$files = SecretFile::getAll();

		if ( empty( $files ) ) {
			$lumi_sfm['admin_notices'][] = array(
				'type'    => 'update-nag',
				'message' => 'Nenalezeny žádné soubory.'
			);
		}

		return array_map( array( $this, 'map_template_tags' ), $files );
	}

	private function map_template_tags( $post ) {
		$output = array();

		$output['title'] = $post->post_title;

		$url_token     = get_post_meta( $post->ID, 'url_token', true );
		$output['url'] = get_bloginfo( 'url' ) . '/f/' . $url_token . '/' . $post->post_name;

		$output['download_count'] = get_post_meta( $post->ID, 'download_count', true );

		$output['date'] = $post->post_date;

		$output['file_size'] = FileSizeHelper::friendlyFilesize( $post->file_size );

		$output['id'] = $post->ID;

		return $output;
	}

	/**
	 * Get Attributes regarding storage parameters
	 *
	 * @return array {
	 *      @type int       available Available storage in bytes
	 *      @type string    available_friendly Available storage in friendly text
	 *      @type int       used Used storage in bytes
	 *      @type string    used_friendly Used storage in friendly text
	 * }
	 */
	public function storage_attributes() {

		$files = SecretFile::getAll();
		$used_space = 0;
		foreach ( $files as $file ) {
			$used_space += $file->file_size;
		}

		global $lumi_sfm;
		return [
			'available'          => $lumi_sfm['storage_limit'],
			'available_friendly' => FileSizeHelper::friendlyFilesize( $lumi_sfm['storage_limit'] ),
			'used'               => $used_space,
			'used_friendly'      => FileSizeHelper::friendlyFilesize( $used_space )
		];

	}

} 