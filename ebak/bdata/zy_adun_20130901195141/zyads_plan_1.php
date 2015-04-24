<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `zyads_plan`;");
E_C("CREATE TABLE `zyads_plan` (
  `planid` mediumint(8) NOT NULL auto_increment,
  `uid` mediumint(8) unsigned NOT NULL default '0',
  `username` varchar(20) NOT NULL,
  `planname` char(50) NOT NULL,
  `price` decimal(10,4) NOT NULL default '0.0000',
  `priceadv` decimal(10,4) default '0.0000',
  `gradeprice` tinyint(1) NOT NULL default '0',
  `s0price` decimal(10,4) NOT NULL default '0.0000',
  `s1price` decimal(10,4) NOT NULL default '0.0000',
  `s2price` decimal(10,4) NOT NULL default '0.0000',
  `s3price` decimal(10,4) NOT NULL default '0.0000',
  `priceinfo` varchar(50) default NULL,
  `budget` int(11) NOT NULL default '0',
  `expire` date NOT NULL default '0000-00-00',
  `checkplan` mediumtext NOT NULL,
  `plantype` char(3) NOT NULL default 'cpc',
  `profit` tinyint(3) NOT NULL default '0',
  `deduction` tinyint(3) default '0',
  `clearing` varchar(10) NOT NULL,
  `stopaudit` tinyint(1) NOT NULL default '1',
  `datatime` tinyint(3) NOT NULL default '1',
  `planinfo` mediumtext,
  `serverip` text,
  `audit` char(1) NOT NULL default 'n',
  `restrictions` tinyint(1) NOT NULL default '1',
  `resuid` mediumtext,
  `sitelimit` tinyint(1) NOT NULL default '1',
  `limitsiteid` mediumtext,
  `in_site` tinyint(1) NOT NULL default '0',
  `top` tinyint(1) NOT NULL default '0',
  `logo` varchar(255) default NULL,
  `mark` tinyint(1) NOT NULL default '0',
  `status` tinyint(1) NOT NULL default '1',
  `addtime` datetime NOT NULL,
  PRIMARY KEY  (`planid`),
  KEY `plantype` (`plantype`),
  KEY `uid` (`uid`),
  KEY `status` (`status`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>