<?php
/**
 * Plugin Name: Secret File Manager
 * Description: Upload big files via FTP and create secret link to send them to clients
 * Version: 0.9
 * Author: Jakub Klapka (Lumiart.cz)
 * Author URI: http://www.lumiart.cz
 */

namespace Lumiart\SecretFileManager;

define( 'LUMI_SFM_CORE_PATH', plugin_dir_path( __FILE__ ) . 'core' . DIRECTORY_SEPARATOR );
define( 'LUMI_SFM_TEMPLATES_PATH', plugin_dir_path( __FILE__ ) . 'templates' . DIRECTORY_SEPARATOR );

/**
 * @var array $lumi_sfm Array containing references to all SFM classes
 */
$lumi_sfm = array();
global $lumi_sfm;

$lumi_sfm = array(
	'plugin_base_file_path' => __FILE__,
	'capability'            => 'manage_secret_files',
	'files_path'            => ABSPATH . 'wp-secret-files',
	'import_path'           => ABSPATH . 'wp-secret-files/import'
);


/**
 * Classes autoloading
 * Classes are loaded based on their need to be loaded on admin, frontend or both. (to save some mem)
 */
$classes_to_load['glob'] = glob( LUMI_SFM_CORE_PATH . '*.glob.php' );
if ( is_admin() ) {
	$classes_to_load['admin'] = glob( LUMI_SFM_CORE_PATH . '*.admin.php' );
} else {
	$classes_to_load['frontend'] = glob( LUMI_SFM_CORE_PATH . '*.frontend.php' );
}

foreach ( $classes_to_load as $scope => $files ) {
	if ( $files != false ) {
		foreach ( $files as $file ) {
			include_once $file;
			$class_name                        = basename( $file, '.' . $scope . '.php' );
			$class_name_with_namespace         = '\\Lumiart\\SecretFileManager\\' . ucwords( $scope ) . '\\' . $class_name;
			$lumi_sfm[ $scope ][ $class_name ] = new $class_name_with_namespace;
		}
	}
}

/**
 * Install and uninstall hooks
 */
register_activation_hook( __FILE__, function () {
	include_once LUMI_SFM_CORE_PATH . 'InstallUninstall.php';
	$inst = new InstallUninstall();
	$inst->add_capabilities_to_admin();
} );

