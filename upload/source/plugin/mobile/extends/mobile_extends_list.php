<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: mobile_extends_list.php 33590 2013-07-12 06:39:08Z andyzheng $
 */
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
class mobile_api {

	public static $extendsclass;
	public static $modulelist;

	public static function common() {

		self::$modulelist = array('dz_newthread', 'dz_digest', 'dz_newreply', 'dz_newpic');
		if(!in_array($_GET['identifier'], self::$modulelist)) {
			mobile_core::result(array('error' => 'identifier_not_exists'));
		}
		include_once 'source/plugin/mobile/extends/mobile_extends_data.php';
		$extendsfilename = "./source/plugin/mobile/extends/module/".$_GET['identifier'].".php";
		if(empty($_GET['identifier'])) {
			mobile_core::result(array('error' => 'identifier_not_exists'));
		} else if(!file_exists($extendsfilename)) {
			mobile_core::result(array('error' => 'identifier_file_not_exists'));
		} else {
			require_once $extendsfilename;
			if(!class_exists($_GET['identifier'])) {
				mobile_core::result(array('error' => 'identifier_file_not_exists'));
			}
			self::$extendsclass = new $_GET['identifier'];
			if(method_exists(self::$extendsclass, 'common')) {
				self::$extendsclass->common();
			}
		}

	}

	public static function output() {
		$variable = self::$extendsclass->output();
		mobile_core::result(mobile_core::variable($variable));
	}
}

?>