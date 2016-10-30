<?php

namespace Lumiart\SecretFileManager\Models;

use WP_Post;

trait WP_PostExtendTrait {

	/**
	 * Holds current instance of WP_Post
	 *
	 * @var false|WP_Post
	 */
	private $post;

	/**
	 * Already fetched attributes cache
	 *
	 * @var array
	 */
	private $attr_cache = [];

	/**
	 * Get instance of WP_Post
	 *
	 * @param $post_id WP_Post ID
	 */
	public function __construct( $post_id ) {

		$this->post = WP_Post::get_instance( $post_id );

	}

	/**
	 * Get property and handle it's caching
	 *
	 * @param string $property_name
	 *
	 * @return mixed
	 */
	private function getCachedProperty( $property_name ) {
		if( isset( $this->attr_cache[ $property_name ] ) ) return $this->attr_cache[ $property_name ];
		$this->attr_cache[ $property_name ] = call_user_func( [ $this, $property_name ] );
		return $this->attr_cache[ $property_name ];
	}

	/**
	 * Handle calls to Extending class and WP_Post methods as well
	 *
	 * @param string $function_name
	 * @param array  $arguments
	 *
	 * @return mixed
	 */
	public function __call( $function_name, $arguments ) {
		return call_user_func_array( [ $this->post, $function_name ], $arguments );
	}

	/**
	 * Handle property to method binding and WP_Post proeprty geting
	 *
	 * @param string $property
	 *
	 * @return mixed
	 */
	public function __get( $property ) {
		if( method_exists( $this, $property ) ) return $this->getCachedProperty( $property );

		return $this->post->$property;
	}

}