<?php


namespace Lumiart\SecretFileManager\Admin;


class InstallUninstall {
	
	private $capabilities = array();

	public function __construct()
	{
		$this->capabilities = [
			'edit_secret_file',
			'read_secret_file',
			'delete_secret_file',
			'edit_secret_files',
			'edit_others_secret_files',
			'publish_secret_files',
			'read_private_secret_files',
			'delete_secret_files',
			'delete_private_secret_files',
			'delete_published_secret_files',
			'delete_others_secret_files',
			'edit_private_secret_files',
			'edit_published_secret_files',
			'edit_secret_files'
		];
		
		global $lumi_sfm;
		register_activation_hook( $lumi_sfm['plugin_base_file_path'], array( $this, 'add_capabilities_to_admin' ) );
	}

	public function add_capabilities_to_admin()
	{
		$role = get_role( 'administrator' );
		foreach( $this->capabilities as $cap ) {
			$role->add_cap( $cap );
		}
	}

} 