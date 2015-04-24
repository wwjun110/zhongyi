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
$Id: do.php 17 2008-08-25 18:34:30Z jian@zyiis.com $
*/
if($_SERVER['HTTP_USER_AGENT'] == '') die('NC');
require '../conn.php';
InstallLicense();
$actionName = preg_replace('/[^a-z0-9-]+/i', '', $_GET['action']);
if (in_array($actionName, array('stats','statsuser','statsads'))) {
	session_cache_limiter("");
}
define('TRACPM', '40');
define('CONTROLLER_NAME','admin');
require LIB_DIR . '/z.php';
define('P_TPL',WWW_DIR.'/templates/');
define('Z_TPL','admin');
define('TPL_DIR',P_TPL.Z_TPL);
require APP_DIR . '/zyiis-app.php';
Z::import(APP_DIR);
Zyiis::start()->run();
?>
