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
E_D("replace into `zyads_sitetype` values('1','0','�Ż���վ');");
E_D("replace into `zyads_sitetype` values('2','0','Ӱ������');");
E_D("replace into `zyads_sitetype` values('3','0','����ʱ��');");
E_D("replace into `zyads_sitetype` values('4','0','������');");
E_D("replace into `zyads_sitetype` values('5','0','Ͷ�����');");
E_D("replace into `zyads_sitetype` values('6','0','������Ƹ');");
E_D("replace into `zyads_sitetype` values('7','0','����Ӳ��');");
E_D("replace into `zyads_sitetype` values('8','0','������Ѷ');");
E_D("replace into `zyads_sitetype` values('9','0','������Ϸ');");
E_D("replace into `zyads_sitetype` values('10','0','���λ���');");
E_D("replace into `zyads_sitetype` values('11','0','����');");
E_D("replace into `zyads_sitetype` values('12','0','�˶�����');");
E_D("replace into `zyads_sitetype` values('13','0','�����ղ�');");
E_D("replace into `zyads_sitetype` values('14','0','��������');");
E_D("replace into `zyads_sitetype` values('16','0','ҽ�ƽ���');");
E_D("replace into `zyads_sitetype` values('17','0','��������');");
E_D("replace into `zyads_sitetype` values('18','0','��������');");
E_D("replace into `zyads_sitetype` values('19','0','�����̳�');");
E_D("replace into `zyads_sitetype` values('20','0','��ҵ����');");
E_D("replace into `zyads_sitetype` values('21','0','���˲���');");
E_D("replace into `zyads_sitetype` values('22','0','����');");
E_D("replace into `zyads_sitetype` values('110','1','�Ż���վ');");
E_D("replace into `zyads_sitetype` values('111','1','����Ӱ��');");
E_D("replace into `zyads_sitetype` values('112','1','��Ϸ');");
E_D("replace into `zyads_sitetype` values('113','1','��ַ����');");
E_D("replace into `zyads_sitetype` values('114','1','���뼰�ֻ�');");
E_D("replace into `zyads_sitetype` values('115','1','����');");
E_D("replace into `zyads_sitetype` values('116','1','���Լ�Ӳ��');");
E_D("replace into `zyads_sitetype` values('117','1','ҽ�Ʊ���');");
E_D("replace into `zyads_sitetype` values('118','1','Ů��ʱ��');");
E_D("replace into `zyads_sitetype` values('119','1','��ѧ������');");
E_D("replace into `zyads_sitetype` values('120','1','�������');");
E_D("replace into `zyads_sitetype` values('121','1','�����Ҿ�');");
E_D("replace into `zyads_sitetype` values('122','1','����');");
E_D("replace into `zyads_sitetype` values('123','1','��ͨ����');");
E_D("replace into `zyads_sitetype` values('124','1','�����˶�');");
E_D("replace into `zyads_sitetype` values('125','1','Ͷ�ʽ���');");
E_D("replace into `zyads_sitetype` values('126','1','����ý��');");
E_D("replace into `zyads_sitetype` values('127','1','��������');");
E_D("replace into `zyads_sitetype` values('128','1','С˵');");
E_D("replace into `zyads_sitetype` values('129','1','�˲���Ƹ');");
E_D("replace into `zyads_sitetype` values('130','1','���繺��');");
E_D("replace into `zyads_sitetype` values('131','1','QQ��������');");
E_D("replace into `zyads_sitetype` values('132','1','����');");
E_D("replace into `zyads_sitetype` values('133','1','���Ｐ��Ӱ');");

require("../../inc/footer.php");
?>