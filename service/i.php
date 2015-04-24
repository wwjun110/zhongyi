<?php
/*
+---------------------------------------------------------------------------+
| ZYIIS.COM                                                                 |
| ==========                                                                |
|                                                                           |
| Copyright (c) 2005-2009 Zyiis Limited                                     |
| For contact details, see: http://www.zyiis.com/                           |
|                                                                           |
+---------------------------------------------------------------------------+
$Id: index.php 23 2010-08-18 07:25:27Z Administrator $
*/
if($_SERVER['HTTP_USER_AGENT'] == '') die('NC');
require '../config.php';
InstallLicense();
$actionName = preg_replace('/[^a-z0-9-]+/i', '', $_GET['action']);
if (in_array($actionName, array('createzone','createads','stats'))) {
	session_cache_limiter("");
}
define('CONTROLLER_NAME','service');
require LIB_DIR . '/z.php';
define('P_TPL',WWW_DIR.'/templates/');
define('Z_TPL','service');
define('TPL_DIR',P_TPL.Z_TPL);
require APP_DIR . '/zyiis-app.php';
Z::import(APP_DIR);
Zyiis::start()->run();

?>


