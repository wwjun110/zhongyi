<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `zyads_tempcip`;");
E_C("CREATE TABLE `zyads_tempcip` (
  `ip` char(15) NOT NULL,
  `planid` mediumint(8) NOT NULL,
  `adsid` mediumint(8) NOT NULL default '0',
  `zoneid` mediumint(8) NOT NULL default '0',
  `day` date NOT NULL,
  `type` tinyint(4) NOT NULL default '0',
  KEY `ip` (`ip`),
  KEY `planid` (`planid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>