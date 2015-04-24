<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `zyads_stats`;");
E_C("CREATE TABLE `zyads_stats` (
  `views` mediumint(8) NOT NULL default '0',
  `num` mediumint(8) NOT NULL default '0',
  `clicks` mediumint(8) NOT NULL default '0',
  `do2click` mediumint(8) NOT NULL default '0',
  `day` date NOT NULL default '0000-00-00',
  `planid` mediumint(8) NOT NULL default '0',
  `adsid` mediumint(8) NOT NULL default '0',
  `uid` mediumint(8) NOT NULL default '0',
  `siteid` mediumint(8) NOT NULL default '0',
  `zoneid` mediumint(8) NOT NULL default '0',
  `plantype` char(3) NOT NULL,
  `adstypeid` mediumint(8) NOT NULL,
  `deduction` mediumint(8) NOT NULL default '0',
  `zonetype` varchar(5) default NULL,
  `sumprofit` decimal(10,4) NOT NULL default '0.0000',
  `sumpay` decimal(10,4) NOT NULL default '0.0000',
  `sumadvpay` decimal(10,4) NOT NULL default '0.0000',
  `orders` mediumint(8) NOT NULL default '0',
  `linkuid` mediumint(8) NOT NULL default '0',
  UNIQUE KEY `unique` (`day`,`zoneid`,`adsid`,`uid`,`planid`),
  KEY `day` (`day`),
  KEY `planid` (`planid`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>