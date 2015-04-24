<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `zyads_tempip`;");
E_C("CREATE TABLE `zyads_tempip` (
  `ip` char(15) NOT NULL,
  `plantype` char(3) NOT NULL,
  `planid` mediumint(8) NOT NULL,
  `uid` mediumint(8) NOT NULL default '0',
  `adsid` mediumint(8) NOT NULL default '0',
  `zoneid` mediumint(8) NOT NULL default '0',
  `day` date NOT NULL,
  `hour` tinyint(3) NOT NULL default '0',
  `minute` int(11) NOT NULL default '0',
  KEY `ip` (`ip`),
  KEY `planid` (`planid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>