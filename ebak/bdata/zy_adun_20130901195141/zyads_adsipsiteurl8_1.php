<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `zyads_adsipsiteurl8`;");
E_C("CREATE TABLE `zyads_adsipsiteurl8` (
  `siteurl` varchar(1000) default NULL,
  `siteurlid` int(10) NOT NULL auto_increment,
  PRIMARY KEY  (`siteurlid`),
  KEY `siteurl` (`siteurl`(500))
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>