<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `zyads_orders`;");
E_C("CREATE TABLE `zyads_orders` (
  `orderid` mediumint(8) NOT NULL auto_increment,
  `uid` mediumint(8) default '0',
  `siteid` mediumint(8) NOT NULL default '0',
  `zoneid` mediumint(8) default '0',
  `planid` mediumint(8) default '0',
  `adsid` mediumint(9) default '0',
  `price` decimal(12,4) default '0.0000',
  `priceadv` decimal(12,4) default '0.0000',
  `ip` varchar(255) default NULL,
  `referer` varchar(255) default NULL,
  `orders` varchar(100) default '0',
  `deduction` tinyint(1) default '0',
  `like` varchar(255) default NULL,
  `status` tinyint(3) default '0',
  `day` date default '0000-00-00',
  `linkuid` mediumint(8) NOT NULL default '0',
  `addtime` datetime default '0000-00-00 00:00:00',
  `confirmtime` date default '0000-00-00',
  PRIMARY KEY  (`orderid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>