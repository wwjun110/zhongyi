<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `zyads_users`;");
E_C("CREATE TABLE `zyads_users` (
  `uid` mediumint(8) unsigned NOT NULL auto_increment,
  `username` varchar(20) NOT NULL,
  `password` char(32) NOT NULL,
  `question` varchar(20) NOT NULL,
  `answer` varchar(50) NOT NULL,
  `email` varchar(40) NOT NULL,
  `qq` varchar(11) NOT NULL,
  `tel` varchar(50) NOT NULL,
  `mobile` varchar(13) NOT NULL,
  `accountname` varchar(120) NOT NULL,
  `bank` varchar(20) NOT NULL,
  `bankname` varchar(100) NOT NULL,
  `bankacc` varchar(120) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `company` varchar(100) default NULL,
  `companyinfo` varchar(100) default NULL,
  `recommend` varchar(8) default NULL COMMENT '?????',
  `regtime` datetime NOT NULL,
  `regip` char(15) NOT NULL,
  `logintime` datetime NOT NULL default '0000-00-00 00:00:00',
  `loginnum` mediumint(8) NOT NULL default '0',
  `loginip` char(15) NOT NULL default '0.0.0.0',
  `cpmdeduction` tinyint(3) NOT NULL default '0',
  `cpcdeduction` tinyint(3) NOT NULL default '0',
  `cpadeduction` tinyint(3) NOT NULL default '0',
  `cpsdeduction` tinyint(3) NOT NULL default '0',
  `cpvdeduction` tinyint(3) NOT NULL default '0',
  `money` double(12,4) default '0.0000',
  `daymoney` double(12,4) NOT NULL default '0.0000',
  `weekmoney` double(12,4) default '0.0000',
  `monthmoney` double(12,4) default '0.0000',
  `xmoney` double(12,4) NOT NULL default '0.0000',
  `integral` int(10) unsigned NOT NULL default '0',
  `activateid` varchar(11) NOT NULL,
  `clusterid` tinyint(3) NOT NULL default '0',
  `type` tinyint(1) NOT NULL default '1',
  `status` tinyint(1) NOT NULL default '0',
  `userinfo` varchar(200) default NULL,
  `view` mediumint(8) NOT NULL default '0',
  `pvstep` smallint(4) NOT NULL default '0',
  `serviceid` mediumint(8) NOT NULL default '0',
  `nums` mediumint(8) NOT NULL default '0',
  `cpczlink` tinyint(1) NOT NULL default '1',
  `cpazlink` tinyint(1) NOT NULL default '1',
  `cpszlink` tinyint(1) NOT NULL default '1',
  `cpmzlink` tinyint(1) NOT NULL default '1',
  `insite` tinyint(1) NOT NULL default '1',
  PRIMARY KEY  (`uid`),
  KEY `username` (`username`),
  KEY `type` (`type`),
  KEY `daymoney` (`daymoney`),
  KEY `weekmoney` (`weekmoney`),
  KEY `monthmoney` (`monthmoney`),
  KEY `serviceid` (`serviceid`)
) ENGINE=MyISAM AUTO_INCREMENT=1002 DEFAULT CHARSET=gbk");
E_D("replace into `zyads_users` values('1000','nihao','08ef84145b81dcd98554b70c662c41ed','11111111111','222222222222222','234565@qq.com','','','','','','','','小三','','','0','2013-05-09 19:38:15','127.0.0.1','2013-05-14 15:14:19','4','127.0.0.1','0','0','0','0','0','0.0000','0.0000','0.0000','0.0000','0.0000','0','1368099495','0','2','2','','0','0','0','0','0','0','0','0','0');");
E_D("replace into `zyads_users` values('1001','nihaoya','08ef84145b81dcd98554b70c662c41ed','eeeeeeee','eeeeeeeeeee','eeeeeeeeee@qq.com','','','','你知道','icbc','','234567879','eeee','','','0','2013-05-09 19:50:03','127.0.0.1','2013-05-14 15:17:22','2','127.0.0.1','0','0','0','0','0','0.0000','0.0000','0.0000','0.0000','0.0000','0','1368100203','0','1','2','','0','0','0','0','1','1','1','1','1');");

require("../../inc/footer.php");
?>