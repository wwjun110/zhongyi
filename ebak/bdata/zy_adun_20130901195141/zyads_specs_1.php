<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `zyads_specs`;");
E_C("CREATE TABLE `zyads_specs` (
  `id` int(9) NOT NULL auto_increment,
  `width` int(5) NOT NULL default '0',
  `height` int(5) NOT NULL default '0',
  `sort` int(5) NOT NULL default '0',
  `type` varchar(10) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=49 DEFAULT CHARSET=gbk");
E_D("replace into `zyads_specs` values('37','120','60','37','С�����');");
E_D("replace into `zyads_specs` values('36','300','250','36','�޷����');");
E_D("replace into `zyads_specs` values('35','336','280','35','�޷����');");
E_D("replace into `zyads_specs` values('34','200','200','34','�޷����');");
E_D("replace into `zyads_specs` values('33','250','250','33','�޷����');");
E_D("replace into `zyads_specs` values('32','360','190','32','�޷����');");
E_D("replace into `zyads_specs` values('31','250','300','31','�޷����');");
E_D("replace into `zyads_specs` values('30','180','250','30','��ֱ���');");
E_D("replace into `zyads_specs` values('29','160','600','29','��ֱ���');");
E_D("replace into `zyads_specs` values('28','120','240','28','��ֱ���');");
E_D("replace into `zyads_specs` values('27','120','600','27','��ֱ���');");
E_D("replace into `zyads_specs` values('26','950','90','5','������');");
E_D("replace into `zyads_specs` values('25','728','90','4','������');");
E_D("replace into `zyads_specs` values('24','250','60','3','������');");
E_D("replace into `zyads_specs` values('23','468','60','2','������');");
E_D("replace into `zyads_specs` values('22','760','90','1','������');");
E_D("replace into `zyads_specs` values('47','320','270','38','���½�Ʈ��');");
E_D("replace into `zyads_specs` values('48','270','200','39','���½�Ʈ��');");

require("../../inc/footer.php");
?>