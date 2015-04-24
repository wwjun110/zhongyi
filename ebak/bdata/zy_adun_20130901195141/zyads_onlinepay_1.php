<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `zyads_onlinepay`;");
E_C("CREATE TABLE `zyads_onlinepay` (
  `onlineid` mediumint(8) NOT NULL auto_increment,
  `username` varchar(50) NOT NULL,
  `imoney` double(10,2) NOT NULL default '0.00',
  `paytype` char(10) NOT NULL,
  `addtime` datetime NOT NULL default '0000-00-00 00:00:00',
  `orderid` varchar(50) NOT NULL,
  `adminuser` varchar(50) NOT NULL,
  `payinfo` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`onlineid`),
  KEY `orderid` (`orderid`),
  KEY `addtime` (`addtime`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>