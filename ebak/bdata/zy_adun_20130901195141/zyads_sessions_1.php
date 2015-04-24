<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `zyads_sessions`;");
E_C("CREATE TABLE `zyads_sessions` (
  `session_id` char(32) character set gbk collate gbk_bin NOT NULL,
  `session_expires` int(10) unsigned NOT NULL default '0',
  `session_data` text,
  PRIMARY KEY  (`session_id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");
E_D("replace into `zyads_sessions` values('bf60cd50a97c18aa3e9dab34b146472d','1378038019','imgcode|s:4:\"VUJP\";adminusername|s:5:\"admin\";adminpassword|s:32:\"ec15d79e36e14dd258cfff3d48b73d35\";adminuid|N;adminusertype|s:1:\"1\";l_ip|s:9:\"127.0.0.1\";l_time|s:19:\"2013-08-25 22:00:55\";adminhash|s:8:\"6bf9c657\";');");

require("../../inc/footer.php");
?>