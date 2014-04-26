<?php


namespace Lumiart\SecretFileManager\Template;


class AdminPage {

	public function get_notices() {
		global $lumi_sfm;
		if ( ! isset( $lumi_sfm['admin_notices'] ) ) {
			return false;
		}

		return $lumi_sfm['admin_notices'];
	}

} 