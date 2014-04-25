<?php


namespace Lumiart\SecretFileManager\Glob;


class CPT {

	public function __construct() {
		add_action( 'init', array( $this, 'register_cpt' ) );
	}

	/**
	 * Register new CPT for files
	 */
	public function register_cpt() {
		$labels = array(
			'name'               => 'Soubory',
			'singular_name'      => 'Soubor',
			'menu_name'          => 'Soubory',
			'name_admin_bar'     => 'Přidat soubor',
			'add_new'            => 'Přidat nový',
			'add_new_item'       => 'Přidat nový soubor',
			'new_item'           => 'Nový soubor',
			'edit_item'          => 'Upravit soubor',
			'view_item'          => 'Ukázat soubor',
			'all_items'          => 'Všechny soubory',
			'search_items'       => 'Hledat soubory',
			'parent_item_colon'  => 'Nadřazený soubor',
			'not_found'          => 'Soubor nenalezen',
			'not_found_in_trash' => 'Soubor nenalezen ani v koši',
		);

		register_post_type( 'secret_files', array(
			'public'  => false,
			'rewrite' => false
		) );

	}

} 