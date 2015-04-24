<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `zyads_news`;");
E_C("CREATE TABLE `zyads_news` (
  `id` int(11) NOT NULL auto_increment,
  `tit` varchar(100) NOT NULL default '',
  `conn` mediumtext NOT NULL,
  `time` datetime NOT NULL default '0000-00-00 00:00:00',
  `top` tinyint(1) NOT NULL default '0',
  `color` char(7) default NULL,
  `is_view` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=44 DEFAULT CHARSET=gbk");
E_D("replace into `zyads_news` values('33','更多极品资源：vip.souho.net ','更多极品资源：vip.souho.net ','2013-03-08 23:59:41','0',NULL,'0');");
E_D("replace into `zyads_news` values('34','更多极品资源：vip.souho.net ','更多极品资源：vip.souho.net ','2013-03-08 23:59:51','0',NULL,'0');");
E_D("replace into `zyads_news` values('35','更多极品资源：vip.souho.net ','更多极品资源：vip.souho.net ','2013-03-08 00:00:00','0',NULL,'0');");
E_D("replace into `zyads_news` values('36','任何人作弊,直接封号,不通知！ ','更多极品资源：vip.souho.net ','2013-03-08 00:00:12','0',NULL,'0');");
E_D("replace into `zyads_news` values('37','搜虎精品社区souho.net提供源码 ','搜虎精品社区souho.net提供源码 ','2013-03-08 00:00:23','0',NULL,'0');");
E_D("replace into `zyads_news` values('38','搜虎精品社区souho.net提供源码  ','搜虎精品社区souho.net提供源码  ','2013-03-08 00:00:31','0',NULL,'0');");
E_D("replace into `zyads_news` values('41','www.souho.net提供商业源码','搜虎精品社区www.souho.net提供源码','2013-03-08 10:34:49','0',NULL,'0');");
E_D("replace into `zyads_news` values('42','搜虎精品社区souho.net提供源码 ','搜虎精品社区www.souho.net提供源码','2013-03-08 20:49:35','0',NULL,'0');");
E_D("replace into `zyads_news` values('43','搜虎精品社区www.souho.net提供源码 ','搜虎精品社区www.souho.net提供源码','2013-03-08 20:49:39','0',NULL,'0');");

require("../../inc/footer.php");
?>