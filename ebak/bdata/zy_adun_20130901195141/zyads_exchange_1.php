<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `zyads_exchange`;");
E_C("CREATE TABLE `zyads_exchange` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `uid` mediumint(8) unsigned NOT NULL,
  `integralid` int(10) unsigned NOT NULL,
  `integral` int(10) unsigned NOT NULL,
  `contact` varchar(20) NOT NULL,
  `tel` varchar(30) NOT NULL,
  `address` text NOT NULL,
  `addtime` datetime NOT NULL,
  `deliverytime` datetime NOT NULL default '0000-00-00 00:00:00',
  `status` tinyint(1) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>