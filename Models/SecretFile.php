<?php

namespace Lumiart\SecretFileManager\Models;

use WP_Query;

/**
 * Class SecretFile
 * @package Lumiart\SecretFileManager\Models
 *
 * @property int $file_size
 * @property string $file_path
 */
class SecretFile {
	use WP_PostExtendTrait;

	/**
	 * Holds all secret files, once fetched
	 *
	 * @var null|array
	 */
	private static $all_files_cache = null;

	/**
	 * Fetch all Secret Files from DB
	 *
	 * @return array|null
	 */
	public static function getAll() {
		if( static::$all_files_cache !== null ) return static::$all_files_cache;

		$query = new WP_Query( array(
			'post_type'      => 'secret_files',
			'posts_per_page' => - 1
		) );

		$posts = [];

		foreach ( $query->posts as $post ) {
			$posts[] = new static( $post->ID );
		}

		static::$all_files_cache = $posts;
		return $posts;

	}

	/**
	 * Get current file filesize
	 *
	 * @return int
	 */
	private function file_size() {
		return filesize( $this->file_path );
	}

	/**
	 * Get full file path
	 *
	 * @return string
	 */
	private function file_path() {

		global $lumi_sfm;
		$dir_token = get_post_meta( $this->ID, 'directory_token', true );
		$dir_path  = $lumi_sfm['files_path'] . '/' . $dir_token;
		$files     = scandir( $dir_path );
		foreach ( $files as $file ) {
			if ( $file != '.' && $file != '..' ) {
				$filename = $file;
			}
		}
		return $lumi_sfm[ 'files_path' ] . '/' . $dir_token . '/' . $filename;

	}

}