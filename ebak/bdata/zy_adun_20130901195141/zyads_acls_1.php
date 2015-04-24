<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `zyads_acls`;");
E_C("CREATE TABLE `zyads_acls` (
  `planid` mediumint(8) NOT NULL,
  `type` varchar(16) NOT NULL,
  `data` mediumtext NOT NULL,
  `comparison` varchar(10) NOT NULL,
  KEY `planid` (`planid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>