<?php


namespace Lumiart\SecretFileManager\Admin;


class Activation {

	public function __construct()
	{
		global $lumi_sfm;
		register_activation_hook( $lumi_sfm['plugin_base_file_path'], array( $this, 'add_capabilities_to_admin' ) );
	}

	public function add_capabilities_to_admin()
	{
		$role = get_role( 'administrator' );
		$role->add_cap( 'edit_secret_file' );
		$role->add_cap( 'read_secret_file' );
		$role->add_cap( 'delete_secret_file' );
		$role->add_cap( 'edit_secret_files' );
		$role->add_cap( 'edit_others_secret_files' );
		$role->add_cap( 'publish_secret_files' );
		$role->add_cap( 'read_private_secret_files' );
		$role->add_cap( 'delete_secret_files' );
		$role->add_cap( 'delete_private_secret_files' );
		$role->add_cap( 'delete_published_secret_files' );
		$role->add_cap( 'delete_others_secret_files' );
		$role->add_cap( 'edit_private_secret_files' );
		$role->add_cap( 'edit_published_secret_files' );
		$role->add_cap( 'edit_secret_files' );
	}

} 