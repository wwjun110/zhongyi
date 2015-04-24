<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `zyads_loginlog`;");
E_C("CREATE TABLE `zyads_loginlog` (
  `id` mediumint(8) NOT NULL auto_increment,
  `username` varchar(20) NOT NULL,
  `logintype` varchar(10) NOT NULL,
  `logininfo` varchar(20) NOT NULL,
  `loginip` char(15) NOT NULL,
  `logintime` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=gbk");
E_D("replace into `zyads_loginlog` values('1','admin','admin','Succe','127.0.0.1','2013-05-09 19:34:17');");
E_D("replace into `zyads_loginlog` values('2','nihao','member','Succe','127.0.0.1','2013-05-09 19:39:23');");
E_D("replace into `zyads_loginlog` values('3','admin','admin','Succe','127.0.0.1','2013-05-09 19:51:11');");
E_D("replace into `zyads_loginlog` values('4','nihaoya','member','Succe','127.0.0.1','2013-05-09 19:52:04');");
E_D("replace into `zyads_loginlog` values('5','admin','admin','Succe','127.0.0.1','2013-05-12 18:55:52');");
E_D("replace into `zyads_loginlog` values('6','nihao','member','Faile','127.0.0.1','2013-05-12 18:56:49');");
E_D("replace into `zyads_loginlog` values('7','nihao','member','Succe','127.0.0.1','2013-05-12 18:57:25');");
E_D("replace into `zyads_loginlog` values('8','admin','admin','Succe','127.0.0.1','2013-05-13 21:49:51');");
E_D("replace into `zyads_loginlog` values('9','nihao','member','Succe','127.0.0.1','2013-05-13 21:52:53');");
E_D("replace into `zyads_loginlog` values('10','admin','admin','Succe','127.0.0.1','2013-05-13 22:09:54');");
E_D("replace into `zyads_loginlog` values('11','admin','admin','Succe','127.0.0.1','2013-05-13 22:16:25');");
E_D("replace into `zyads_loginlog` values('12','admin','admin','Succe','127.0.0.1','2013-05-13 22:18:14');");
E_D("replace into `zyads_loginlog` values('13','admin','admin','Succe','127.0.0.1','2013-05-13 22:23:56');");
E_D("replace into `zyads_loginlog` values('14','admin','admin','Succe','127.0.0.1','2013-05-13 22:27:57');");
E_D("replace into `zyads_loginlog` values('15','admin','admin','Succe','127.0.0.1','2013-05-13 22:37:26');");
E_D("replace into `zyads_loginlog` values('16','admin','admin','Succe','127.0.0.1','2013-05-13 23:12:11');");
E_D("replace into `zyads_loginlog` values('17','admin','admin','Succe','127.0.0.1','2013-05-13 23:18:30');");
E_D("replace into `zyads_loginlog` values('18','admin','admin','Succe','127.0.0.1','2013-05-13 23:27:53');");
E_D("replace into `zyads_loginlog` values('19','admin','admin','Succe','127.0.0.1','2013-05-13 23:49:27');");
E_D("replace into `zyads_loginlog` values('20','admin','admin','Succe','127.0.0.1','2013-05-14 00:28:57');");
E_D("replace into `zyads_loginlog` values('21','admin','admin','Succe','127.0.0.1','2013-05-14 01:14:19');");
E_D("replace into `zyads_loginlog` values('22','admin','admin','Succe','127.0.0.1','2013-05-14 01:14:37');");
E_D("replace into `zyads_loginlog` values('23','admin','admin','Succe','127.0.0.1','2013-05-14 01:46:03');");
E_D("replace into `zyads_loginlog` values('24','nihao','member','Succe','127.0.0.1','2013-05-14 15:14:19');");
E_D("replace into `zyads_loginlog` values('25','admin','admin','Succe','127.0.0.1','2013-05-14 15:15:06');");
E_D("replace into `zyads_loginlog` values('26','nihaoya','member','Faile','127.0.0.1','2013-05-14 15:15:38');");
E_D("replace into `zyads_loginlog` values('27','nihaoya','member','Faile','127.0.0.1','2013-05-14 15:15:53');");
E_D("replace into `zyads_loginlog` values('28','admin','admin','Succe','127.0.0.1','2013-05-14 15:16:13');");
E_D("replace into `zyads_loginlog` values('29','nihaoya','member','Succe','127.0.0.1','2013-05-14 15:17:22');");
E_D("replace into `zyads_loginlog` values('30','admin','admin','Succe','127.0.0.1','2013-05-14 16:00:42');");
E_D("replace into `zyads_loginlog` values('31','admin','admin','Succe','127.0.0.1','2013-08-25 20:25:29');");
E_D("replace into `zyads_loginlog` values('32','搜虎精品社区','admin','Faile','127.0.0.1','2013-08-25 22:00:37');");
E_D("replace into `zyads_loginlog` values('33','搜虎精品社区','admin','Faile','127.0.0.1','2013-08-25 22:00:46');");
E_D("replace into `zyads_loginlog` values('34','搜虎精品社区','admin','Faile','127.0.0.1','2013-08-25 22:00:47');");
E_D("replace into `zyads_loginlog` values('35','搜虎精品社区','admin','Faile','127.0.0.1','2013-08-25 22:00:47');");
E_D("replace into `zyads_loginlog` values('36','搜虎精品社区','admin','Faile','127.0.0.1','2013-08-25 22:00:47');");
E_D("replace into `zyads_loginlog` values('37','admin','admin','Succe','127.0.0.1','2013-08-25 22:00:55');");
E_D("replace into `zyads_loginlog` values('38','admin','admin','Succe','127.0.0.1','2013-09-01 19:39:31');");

require("../../inc/footer.php");
?>