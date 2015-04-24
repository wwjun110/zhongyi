<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `zyads_sitetype`;");
E_C("CREATE TABLE `zyads_sitetype` (
  `sid` mediumint(9) NOT NULL auto_increment,
  `parentid` mediumint(9) NOT NULL default '0',
  `sitename` char(100) NOT NULL,
  PRIMARY KEY  (`sid`),
  KEY `sitename` (`sitename`)
) ENGINE=MyISAM AUTO_INCREMENT=135 DEFAULT CHARSET=gbk");
E_D("replace into `zyads_sitetype` values('1','0','门户网站');");
E_D("replace into `zyads_sitetype` values('2','0','影音娱乐');");
E_D("replace into `zyads_sitetype` values('3','0','潮流时尚');");
E_D("replace into `zyads_sitetype` values('4','0','互联网');");
E_D("replace into `zyads_sitetype` values('5','0','投资理财');");
E_D("replace into `zyads_sitetype` values('6','0','教育招聘');");
E_D("replace into `zyads_sitetype` values('7','0','数码硬件');");
E_D("replace into `zyads_sitetype` values('8','0','生活资讯');");
E_D("replace into `zyads_sitetype` values('9','0','动漫游戏');");
E_D("replace into `zyads_sitetype` values('10','0','旅游户外');");
E_D("replace into `zyads_sitetype` values('11','0','汽车');");
E_D("replace into `zyads_sitetype` values('12','0','运动体育');");
E_D("replace into `zyads_sitetype` values('13','0','爱好收藏');");
E_D("replace into `zyads_sitetype` values('14','0','个性生活');");
E_D("replace into `zyads_sitetype` values('16','0','医疗健康');");
E_D("replace into `zyads_sitetype` values('17','0','两性生活');");
E_D("replace into `zyads_sitetype` values('18','0','人文艺术');");
E_D("replace into `zyads_sitetype` values('19','0','网上商城');");
E_D("replace into `zyads_sitetype` values('20','0','企业服务');");
E_D("replace into `zyads_sitetype` values('21','0','个人博客');");
E_D("replace into `zyads_sitetype` values('22','0','其它');");
E_D("replace into `zyads_sitetype` values('110','1','门户网站');");
E_D("replace into `zyads_sitetype` values('111','1','音乐影视');");
E_D("replace into `zyads_sitetype` values('112','1','游戏');");
E_D("replace into `zyads_sitetype` values('113','1','网址导航');");
E_D("replace into `zyads_sitetype` values('114','1','数码及手机');");
E_D("replace into `zyads_sitetype` values('115','1','博客');");
E_D("replace into `zyads_sitetype` values('116','1','电脑及硬件');");
E_D("replace into `zyads_sitetype` values('117','1','医疗保健');");
E_D("replace into `zyads_sitetype` values('118','1','女性时尚');");
E_D("replace into `zyads_sitetype` values('119','1','教学及考试');");
E_D("replace into `zyads_sitetype` values('120','1','生活服务');");
E_D("replace into `zyads_sitetype` values('121','1','房产家居');");
E_D("replace into `zyads_sitetype` values('122','1','汽车');");
E_D("replace into `zyads_sitetype` values('123','1','交通旅游');");
E_D("replace into `zyads_sitetype` values('124','1','体育运动');");
E_D("replace into `zyads_sitetype` values('125','1','投资金融');");
E_D("replace into `zyads_sitetype` values('126','1','新闻媒体');");
E_D("replace into `zyads_sitetype` values('127','1','人文艺术');");
E_D("replace into `zyads_sitetype` values('128','1','小说');");
E_D("replace into `zyads_sitetype` values('129','1','人才招聘');");
E_D("replace into `zyads_sitetype` values('130','1','网络购物');");
E_D("replace into `zyads_sitetype` values('131','1','QQ及非主流');");
E_D("replace into `zyads_sitetype` values('132','1','下载');");
E_D("replace into `zyads_sitetype` values('133','1','宠物及摄影');");

require("../../inc/footer.php");
?>