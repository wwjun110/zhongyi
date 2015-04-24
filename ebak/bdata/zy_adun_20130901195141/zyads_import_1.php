<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `zyads_import`;");
E_C("CREATE TABLE `zyads_import` (
  `importid` mediumint(8) NOT NULL auto_increment,
  `uid` mediumint(8) NOT NULL,
  `planid` mediumint(9) NOT NULL,
  `num` mediumint(9) NOT NULL default '1',
  `adfnum` mediumint(9) NOT NULL default '0',
  `orders` varchar(255) default NULL,
  `userproportion` tinyint(3) NOT NULL default '0',
  `advproportion` tinyint(3) NOT NULL default '0',
  `userprice` decimal(10,4) NOT NULL default '0.0000',
  `advprice` decimal(10,4) NOT NULL default '0.0000',
  `sumpay` decimal(10,4) NOT NULL default '0.0000',
  `sumadvpay` decimal(10,4) NOT NULL default '0.0000',
  `sumprofit` decimal(10,4) NOT NULL default '0.0000',
  `ordersprices` decimal(10,4) NOT NULL default '0.0000',
  `day` date NOT NULL,
  `addtime` datetime NOT NULL,
  `status` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`importid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>