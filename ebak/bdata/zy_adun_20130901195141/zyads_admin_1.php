<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `zyads_admin`;");
E_C("CREATE TABLE `zyads_admin` (
  `id` mediumint(8) NOT NULL auto_increment,
  `username` varchar(20) NOT NULL default '',
  `password` char(32) NOT NULL,
  `usertype` tinyint(1) NOT NULL default '0',
  `userinfo` varchar(200) NOT NULL,
  `loginnum` mediumint(8) NOT NULL default '0',
  `logintime` datetime NOT NULL default '0000-00-00 00:00:00',
  `status` tinyint(1) NOT NULL default '0',
  `loginip` char(15) NOT NULL,
  `adminaction` mediumtext NOT NULL,
  `addtime` datetime NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=gbk");
E_D("replace into `zyads_admin` values('1','admin','ec15d79e36e14dd258cfff3d48b73d35','1','','25','2013-09-01 19:39:31','1','127.0.0.1','','2013-05-09 19:30:31');");
E_D("replace into `zyads_admin` values('2','搜虎精品社区','7f9a1b2a6f679ebbda71706ebdaf6742','1','搜虎精品社区www.souho.net','0','0000-00-00 00:00:00','0','','N;','2013-08-25 20:38:07');");

require("../../inc/footer.php");
?>