<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `zyads_site`;");
E_C("CREATE TABLE `zyads_site` (
  `siteid` int(9) NOT NULL auto_increment,
  `uid` mediumint(8) NOT NULL,
  `sitename` varchar(200) NOT NULL,
  `siteurl` varchar(200) NOT NULL,
  `pertainurl` mediumtext,
  `sitetype` varchar(100) NOT NULL,
  `siteinfo` varchar(100) default NULL,
  `sex` tinyint(1) NOT NULL default '1',
  `age` tinyint(1) NOT NULL default '1',
  `occupation` tinyint(1) NOT NULL default '1',
  `income` tinyint(1) NOT NULL default '1',
  `status` tinyint(4) NOT NULL default '0',
  `denyinfo` varchar(255) default NULL,
  `alexapr` varchar(20) default '0',
  `alexa` mediumint(8) NOT NULL default '0',
  `pr` tinyint(3) NOT NULL default '0',
  `beian` varchar(30) default NULL,
  `grade` tinyint(1) NOT NULL default '0',
  `addtime` datetime NOT NULL,
  PRIMARY KEY  (`siteid`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>