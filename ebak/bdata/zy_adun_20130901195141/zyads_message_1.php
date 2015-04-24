<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `zyads_message`;");
E_C("CREATE TABLE `zyads_message` (
  `msgid` mediumint(8) NOT NULL auto_increment,
  `msgtype` tinyint(1) NOT NULL default '0',
  `senduser` varchar(50) NOT NULL,
  `touser` varchar(50) default '0',
  `parentid` mediumint(8) NOT NULL default '0',
  `subject` varchar(100) NOT NULL,
  `msgtext` mediumtext NOT NULL,
  `isview` tinyint(1) NOT NULL default '0',
  `isadmin` tinyint(1) NOT NULL default '1',
  `alone` tinyint(1) NOT NULL default '0',
  `addtime` datetime NOT NULL,
  PRIMARY KEY  (`msgid`),
  KEY `isadmin` (`isadmin`),
  KEY `senduser` (`senduser`),
  KEY `touser` (`touser`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>