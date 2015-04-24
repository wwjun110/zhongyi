<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `zyads_paylog`;");
E_C("CREATE TABLE `zyads_paylog` (
  `id` int(11) NOT NULL auto_increment,
  `uid` mediumint(8) default NULL,
  `xmoney` varchar(20) default NULL,
  `money` varchar(20) default NULL,
  `tax` varchar(20) default NULL,
  `charges` varchar(20) default NULL,
  `pay` varchar(20) default NULL,
  `clearingadmin` varchar(20) default NULL,
  `paytime` datetime NOT NULL default '0000-00-00 00:00:00',
  `scale` double(8,2) NOT NULL default '0.00',
  `realmoney` double(10,4) NOT NULL default '0.0000',
  `payinfo` mediumtext,
  `status` tinyint(1) NOT NULL default '0',
  `addtime` date NOT NULL default '0000-00-00',
  `clearingtype` varchar(10) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `unique` (`uid`,`addtime`,`clearingtype`),
  KEY `addtime` (`addtime`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>