<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `zyads_planstats`;");
E_C("CREATE TABLE `zyads_planstats` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `views` int(10) NOT NULL default '0',
  `clicks` int(10) NOT NULL default '0',
  `num` int(10) NOT NULL default '0',
  `orders` int(10) NOT NULL default '0',
  `do2click` int(10) NOT NULL default '0',
  `deduction` int(10) NOT NULL default '0',
  `sumprofit` decimal(10,4) NOT NULL default '0.0000',
  `sumpay` decimal(10,4) NOT NULL default '0.0000',
  `sumadvpay` decimal(10,4) NOT NULL default '0.0000',
  `planid` int(10) NOT NULL default '0',
  `plantype` char(3) NOT NULL,
  `uid` mediumint(8) NOT NULL default '0',
  `day` date NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `unique` (`day`,`planid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>