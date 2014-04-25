<?php


namespace Lumiart\SecretFileManager;


class InstallUninstall {

	public function add_capabilities_to_admin() {

		global $lumi_sfm;

		$role = get_role( 'administrator' );
		$role->add_cap( $lumi_sfm['capability'] );

	}

} 