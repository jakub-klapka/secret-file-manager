<?php


namespace Lumiart\SecretFileManager\Admin;


class InstallUninstall {

	private $capabilities = array();

	public function __construct() {
		global $lumi_sfm;
		register_activation_hook( $lumi_sfm['plugin_base_file_path'], array( $this, 'add_capabilities_to_admin' ) );
	}

	public function add_capabilities_to_admin() {
		$role = get_role( 'administrator' );
		global $lumi_sfm;
		foreach ( $this->capabilities as $cap ) {
			$role->add_cap( $lumi_sfm['capability'] );
		}
	}

} 