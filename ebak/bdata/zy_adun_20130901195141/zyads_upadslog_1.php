<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `zyads_upadslog`;");
E_C("CREATE TABLE `zyads_upadslog` (
  `uplogid` mediumint(8) NOT NULL auto_increment,
  `adsid` mediumint(9) NOT NULL,
  `username` varchar(50) default NULL,
  `adstype` char(4) NOT NULL,
  `adstypeid` mediumint(8) NOT NULL,
  `olddata` mediumtext NOT NULL,
  `updata` mediumtext NOT NULL,
  `addtime` datetime NOT NULL,
  `status` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`uplogid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>