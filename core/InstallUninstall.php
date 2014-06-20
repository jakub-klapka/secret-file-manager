<?php


namespace Lumiart\SecretFileManager;


use Lumiart\SecretFileManager\Glob\CPT;

class InstallUninstall {

	public function add_capabilities_to_admin() {

		global $lumi_sfm;

		$role = get_role( 'administrator' );
		$role->add_cap( $lumi_sfm['capability'] );

	}

	public function create_dirs() {
		global $lumi_sfm;
		if ( !is_dir( $lumi_sfm['files_path'] ) ) {
			mkdir( $lumi_sfm['files_path'] );
		}
		if ( !is_dir( $lumi_sfm['import_path'] ) ) {
			mkdir( $lumi_sfm['import_path'] );
		}
	}

	public function flush_rewrite_activate() {
		include_once( LUMI_SFM_CORE_PATH . 'CPT.glob.php' );
		$cpt = new CPT(); //to run register post type before flush
		do_action( 'init' );
		flush_rewrite_rules();
	}

} 