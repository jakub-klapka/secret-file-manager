<?php


namespace Lumiart\SecretFileManager\Admin;


class AdminPage {

	public function __construct() {
		add_action( 'admin_menu', array( $this, 'add_admin_menu' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
		//$this->enqueue_scripts();
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

		if ( isset( $_REQUEST['delete'] ) ) {
			include_once LUMI_SFM_CORE_PATH . 'DeleteFile.php';
		}


		require LUMI_SFM_TEMPLATES_PATH . 'admin_page.php';

	}

	public function enqueue_scripts( $hook ) {
		if ( $hook == 'toplevel_page_lumi-secret-files' ) {
			global $lumi_sfm;
			wp_enqueue_style( 'lumi-secret-files', plugins_url( 'css/lumi_secret_files_admin.css', $lumi_sfm['plugin_base_file_path'] ), array(), $lumi_sfm['static_version'] );
			wp_enqueue_script( 'lumi-secret-files', plugins_url( 'js/lumi_secret_files_admin.js', $lumi_sfm['plugin_base_file_path'] ), array( 'jquery' ), $lumi_sfm['static_version'], true );
			wp_localize_script( 'lumi-secret-files', 'LumiSecertFilesConfig', array(
				'swf_path' => plugins_url( 'js/ZeroClipboard.swf', $lumi_sfm['plugin_base_file_path'] )
			) );
		}
	}

} 