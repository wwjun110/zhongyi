<?php
/*
+---------------------------------------------------------------------------+
| ZYIIS.COM                                                                 |
| ==========                                                                |
|                                                                           |
| Copyright (c) 2005-2011 Zyiis Limited                                     |
| For contact details, see: http://www.zyiis.com/                           |
|                                                                           |
+---------------------------------------------------------------------------+
$Id: index.php 48 2012-04-10 05:29:34Z zyiis $
*/
 
if (!extension_loaded('mysql')) {
	die('无法载入 mysql 扩展，请检查 PHP 配置');
}  
if (!function_exists('date_default_timezone_set')) {
	die('PHP版太不能低于5.1.0');
} 
$installs = is_file("./install/index.php");
if ($installs) {
	header("Location: /install/index.php");
	exit();
}
define('CONTROLLER_NAME','index');
require './conn.php';
ini_set("session.cookie_domain",".".$GLOBALS['C_ZYIIS']['siteurl']);
InstallLicense();
require LIB_DIR . '/z.php';
define('P_TPL',WWW_DIR.'/templates/');
define('Z_TPL','index/default');
define('TPL_DIR',P_TPL.Z_TPL);
require APP_DIR . '/zyiis-app.php';
Z::import(APP_DIR);
Zyiis::start()->run();
?>

