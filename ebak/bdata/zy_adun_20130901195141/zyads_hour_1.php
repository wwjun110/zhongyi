<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `zyads_hour`;");
E_C("CREATE TABLE `zyads_hour` (
  `day` date NOT NULL,
  `plantype` varchar(6) NOT NULL,
  `uid` mediumint(9) unsigned NOT NULL,
  `hour0` mediumint(9) unsigned NOT NULL,
  `hour1` mediumint(9) unsigned NOT NULL,
  `hour2` mediumint(9) unsigned NOT NULL,
  `hour3` mediumint(9) unsigned NOT NULL,
  `hour4` mediumint(9) unsigned NOT NULL,
  `hour5` mediumint(9) unsigned NOT NULL,
  `hour6` mediumint(9) unsigned NOT NULL,
  `hour7` mediumint(9) unsigned NOT NULL,
  `hour8` mediumint(9) unsigned NOT NULL,
  `hour9` mediumint(9) unsigned NOT NULL,
  `hour10` mediumint(9) unsigned NOT NULL,
  `hour11` mediumint(9) unsigned NOT NULL,
  `hour12` mediumint(9) unsigned NOT NULL,
  `hour13` mediumint(9) unsigned NOT NULL,
  `hour14` mediumint(9) unsigned NOT NULL,
  `hour15` mediumint(9) unsigned NOT NULL,
  `hour16` mediumint(9) unsigned NOT NULL,
  `hour17` mediumint(9) unsigned NOT NULL,
  `hour18` mediumint(9) unsigned NOT NULL,
  `hour19` mediumint(9) unsigned NOT NULL,
  `hour20` mediumint(9) unsigned NOT NULL,
  `hour21` mediumint(9) unsigned NOT NULL,
  `hour22` mediumint(9) unsigned NOT NULL,
  `hour23` mediumint(9) unsigned NOT NULL,
  KEY `day` (`day`,`plantype`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>