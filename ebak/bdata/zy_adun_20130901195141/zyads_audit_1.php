<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `zyads_audit`;");
E_C("CREATE TABLE `zyads_audit` (
  `auditid` mediumint(8) NOT NULL auto_increment,
  `uid` mediumint(8) NOT NULL,
  `siteid` mediumint(8) NOT NULL,
  `planid` mediumint(8) NOT NULL,
  `audituser` varchar(20) NOT NULL,
  `addtime` datetime NOT NULL,
  `audittime` datetime NOT NULL,
  `denyinfo` text,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY  (`auditid`),
  KEY `uid` (`uid`),
  KEY `status` (`status`),
  KEY `siteid` (`siteid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>