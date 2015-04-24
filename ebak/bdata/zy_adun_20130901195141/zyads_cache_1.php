<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `zyads_cache`;");
E_C("CREATE TABLE `zyads_cache` (
  `cacheid` varchar(255) character set latin1 NOT NULL,
  `content` blob NOT NULL,
  PRIMARY KEY  (`cacheid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>