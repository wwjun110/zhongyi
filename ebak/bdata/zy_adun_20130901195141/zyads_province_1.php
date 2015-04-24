<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `zyads_province`;");
E_C("CREATE TABLE `zyads_province` (
  `day` date NOT NULL,
  `uid` mediumint(9) unsigned NOT NULL,
  `province` mediumint(9) unsigned NOT NULL default '0',
  `province0` mediumint(9) unsigned NOT NULL,
  `province1` mediumint(9) unsigned NOT NULL,
  `province2` mediumint(9) unsigned NOT NULL,
  `province3` mediumint(9) unsigned NOT NULL,
  `province4` mediumint(9) unsigned NOT NULL,
  `province5` mediumint(9) unsigned NOT NULL,
  `province6` mediumint(9) unsigned NOT NULL,
  `province7` mediumint(9) unsigned NOT NULL,
  `province8` mediumint(9) unsigned NOT NULL,
  `province9` mediumint(9) unsigned NOT NULL,
  `province10` mediumint(9) unsigned NOT NULL,
  `province11` mediumint(9) unsigned NOT NULL,
  `province12` mediumint(9) unsigned NOT NULL,
  `province13` mediumint(9) unsigned NOT NULL,
  `province14` mediumint(9) unsigned NOT NULL,
  `province15` mediumint(9) unsigned NOT NULL,
  `province16` mediumint(9) unsigned NOT NULL,
  `province17` mediumint(9) unsigned NOT NULL,
  `province18` mediumint(9) unsigned NOT NULL,
  `province19` mediumint(9) unsigned NOT NULL,
  `province20` mediumint(9) unsigned NOT NULL,
  `province21` mediumint(9) unsigned NOT NULL,
  `province22` mediumint(9) unsigned NOT NULL,
  `province23` mediumint(9) unsigned NOT NULL,
  `province24` mediumint(9) unsigned NOT NULL,
  `province25` mediumint(9) unsigned NOT NULL,
  `province26` mediumint(9) unsigned NOT NULL,
  `province27` mediumint(9) unsigned NOT NULL,
  `province28` mediumint(9) unsigned NOT NULL,
  `province29` mediumint(9) unsigned NOT NULL,
  `province30` mediumint(9) unsigned NOT NULL,
  `province31` mediumint(9) unsigned NOT NULL,
  `province32` mediumint(9) unsigned NOT NULL,
  `province33` mediumint(9) unsigned NOT NULL,
  `province34` mediumint(9) unsigned NOT NULL,
  `province35` mediumint(9) unsigned NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>