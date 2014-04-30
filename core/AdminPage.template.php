<?php


namespace Lumiart\SecretFileManager\Template;


class AdminPage {

	public function get_notices() {
		global $lumi_sfm;
		if ( ! isset( $lumi_sfm['admin_notices'] ) ) {
			return false;
		}

		return $lumi_sfm['admin_notices'];
	}

	public function get_files() {
		$files = new \WP_Query( array(
			'post_type'      => 'secret_files',
			'posts_per_page' => - 1
		) );

		if ( $files->post_count == 0 ) {
			$lumi_sfm['admin_notices'][] = array(
				'type'    => 'update-nag',
				'message' => 'Nenalezeny žádné soubory.'
			);
		}

		return array_map( array( $this, 'map_template_tags' ), $files->posts );
	}

	private function map_template_tags( $post ) {
		$output = array();

		$output['title'] = $post->post_title;

		$url_token     = get_post_meta( $post->ID, 'url_token', true );
		$output['url'] = get_bloginfo( 'url' ) . '/f/' . $url_token . '/' . $post->post_name;

		$output['download_count'] = get_post_meta( $post->ID, 'download_count', true );

		$output['date'] = $post->post_date;

		$output['id'] = $post->ID;

		return $output;
	}

} 