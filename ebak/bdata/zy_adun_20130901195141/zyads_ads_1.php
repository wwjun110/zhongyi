<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `zyads_ads`;");
E_C("CREATE TABLE `zyads_ads` (
  `adsid` mediumint(9) NOT NULL auto_increment,
  `planid` mediumint(8) NOT NULL default '0',
  `uid` mediumint(9) NOT NULL default '0',
  `adinfo` varchar(100) default NULL,
  `adstype` varchar(10) NOT NULL,
  `adstypeid` mediumint(8) NOT NULL,
  `imageurl` varchar(255) default NULL,
  `imageurl1` varchar(255) default NULL,
  `alt` varchar(255) default NULL,
  `url` text NOT NULL,
  `width` smallint(6) NOT NULL default '0',
  `height` smallint(6) NOT NULL default '0',
  `headline` varchar(40) default NULL,
  `description` varchar(120) default NULL,
  `dispurl` varchar(255) default NULL,
  `htmlcode` mediumtext,
  `htmltype` char(2) default NULL,
  `addtime` datetime NOT NULL,
  `status` tinyint(1) NOT NULL default '0',
  `denyinfo` varchar(255) default NULL,
  `priority` tinyint(3) NOT NULL default '1',
  `mark` tinyint(1) NOT NULL default '0',
  `zlink` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`adsid`),
  KEY `planid` (`planid`),
  KEY `status` (`status`),
  KEY `width` (`width`),
  KEY `height` (`height`),
  KEY `adstypeid` (`adstypeid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>