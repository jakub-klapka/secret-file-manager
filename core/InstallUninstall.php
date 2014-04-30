<?php


namespace Lumiart\SecretFileManager;


class InstallUninstall {

	public function add_capabilities_to_admin() {

		global $lumi_sfm;

		$role = get_role( 'administrator' );
		$role->add_cap( $lumi_sfm['capability'] );

	}

	public function create_dirs() {
		global $lumi_sfm;
		mkdir( $lumi_sfm['files_path'] );
		mkdir( $lumi_sfm['import_path'] );
	}

} 