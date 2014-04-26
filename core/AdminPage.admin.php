<?php


namespace Lumiart\SecretFileManager\Admin;


class AdminPage {

	public function __construct() {
		add_action( 'admin_menu', array( $this, 'add_admin_menu' ) );
	}

	public function add_admin_menu() {
		global $lumi_sfm;
		add_menu_page( 'Skryté soubory', 'Skryté soubory', $lumi_sfm['capability'], 'lumi-secret-files', array(
				$this,
				'display_menu_page'
			), 'dashicons-lock', 21 );
	}

	public function display_menu_page() {

		global $lumi_sfm;
		if ( ! current_user_can( $lumi_sfm['capability'] ) ) {
			wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
		}

		if ( isset( $_REQUEST['check_new_files'] ) ) {
			include_once LUMI_SFM_CORE_PATH . 'ProcessNewFiles.php';
		}

		require LUMI_SFM_TEMPLATES_PATH . 'admin_page.php';

	}

} 