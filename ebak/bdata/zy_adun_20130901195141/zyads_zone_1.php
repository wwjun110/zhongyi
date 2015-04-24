<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `zyads_zone`;");
E_C("CREATE TABLE `zyads_zone` (
  `zoneid` mediumint(8) unsigned NOT NULL auto_increment,
  `uid` mediumint(8) NOT NULL,
  `siteid` mediumint(8) NOT NULL default '0',
  `zonename` varchar(255) NOT NULL,
  `zonetype` varchar(10) NOT NULL,
  `zoneinfo` varchar(255) NOT NULL,
  `plantype` char(3) NOT NULL,
  `adstypeid` mediumint(8) NOT NULL,
  `viewtype` tinyint(1) NOT NULL default '0',
  `viewadsid` varchar(255) default NULL,
  `width` smallint(6) NOT NULL default '0',
  `height` smallint(6) NOT NULL default '0',
  `cpmtime` mediumint(8) NOT NULL default '0',
  `cpmtimenum` tinyint(1) NOT NULL default '0',
  `codestyle` varchar(255) NOT NULL,
  `alternatetype` tinyint(1) default '0',
  `alternateurl` varchar(255) default NULL,
  `addtime` datetime NOT NULL,
  PRIMARY KEY  (`zoneid`),
  KEY `uid` (`uid`),
  KEY `siteid` (`siteid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>