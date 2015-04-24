<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `zyads_adsipuseragent1`;");
E_C("CREATE TABLE `zyads_adsipuseragent1` (
  `useragent` varchar(1000) default NULL,
  `useragentid` int(10) NOT NULL auto_increment,
  PRIMARY KEY  (`useragentid`),
  KEY `useragent` (`useragent`(500))
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>