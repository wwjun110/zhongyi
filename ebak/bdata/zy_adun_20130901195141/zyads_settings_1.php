<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `zyads_settings`;");
E_C("CREATE TABLE `zyads_settings` (
  `title` varchar(50) NOT NULL,
  `value` varchar(500) NOT NULL,
  PRIMARY KEY  (`title`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");
E_D("replace into `zyads_settings` values('mail_send','2');");
E_D("replace into `zyads_settings` values('mail_server','smtp.sohu.com');");
E_D("replace into `zyads_settings` values('mail_port','25');");
E_D("replace into `zyads_settings` values('mail_auth','1');");
E_D("replace into `zyads_settings` values('mail_from','demo_z@sohu.com ');");
E_D("replace into `zyads_settings` values('mail_username','demo_z');");
E_D("replace into `zyads_settings` values('mail_password','demo_z');");
E_D("replace into `zyads_settings` values('tomail','register');");
E_D("replace into `zyads_settings` values('zlink_on','cpc,cpm,cpa,cps');");
E_D("replace into `zyads_settings` values('sitename','搜虎精品社区www.souho.net提供中易广告联盟v7商业版');");
E_D("replace into `zyads_settings` values('siteurl','souho.cc');");
E_D("replace into `zyads_settings` values('authorized_url','demo.souho.cc');");
E_D("replace into `zyads_settings` values('siteip','127.0.0.1');");
E_D("replace into `zyads_settings` values('pv_step','10');");
E_D("replace into `zyads_settings` values('url_key','61989');");
E_D("replace into `zyads_settings` values('site_status','0');");
E_D("replace into `zyads_settings` values('alexa','0');");
E_D("replace into `zyads_settings` values('min_budeget','100');");
E_D("replace into `zyads_settings` values('chexiao_code','20');");
E_D("replace into `zyads_settings` values('in_site','1');");
E_D("replace into `zyads_settings` values('union_bz','1');");
E_D("replace into `zyads_settings` values('do2click','1');");
E_D("replace into `zyads_settings` values('cpcmin_price','0.006');");
E_D("replace into `zyads_settings` values('cpmmin_price','0.0048');");
E_D("replace into `zyads_settings` values('cpvmin_price','0.003');");
E_D("replace into `zyads_settings` values('cpamin_price','0.2');");
E_D("replace into `zyads_settings` values('cpsmin_price','20');");
E_D("replace into `zyads_settings` values('jsurl','http://demo.souho.cc');");
E_D("replace into `zyads_settings` values('imgurl','http://demo.souho.cc');");
E_D("replace into `zyads_settings` values('jumpurl','http://demo.souho.cc');");
E_D("replace into `zyads_settings` values('sync_setting','');");
E_D("replace into `zyads_settings` values('db_ms','0');");
E_D("replace into `zyads_settings` values('memcached_host','127.0.0.1');");
E_D("replace into `zyads_settings` values('memcached_port','11211');");
E_D("replace into `zyads_settings` values('cache_type','file');");
E_D("replace into `zyads_settings` values('cache_time','1800');");
E_D("replace into `zyads_settings` values('close_reg_aff','0');");
E_D("replace into `zyads_settings` values('close_reg_adv','0');");
E_D("replace into `zyads_settings` values('reg_money','0');");
E_D("replace into `zyads_settings` values('regmoney_type','week');");
E_D("replace into `zyads_settings` values('regmoney','');");
E_D("replace into `zyads_settings` values('aff_reg_status','0');");
E_D("replace into `zyads_settings` values('adv_reg_status','0');");
E_D("replace into `zyads_settings` values('min_clearing','100');");
E_D("replace into `zyads_settings` values('clearing_tax','5');");
E_D("replace into `zyads_settings` values('clearing_charges','0');");
E_D("replace into `zyads_settings` values('clearing_cycle','week');");
E_D("replace into `zyads_settings` values('clearing_weekdata','1');");
E_D("replace into `zyads_settings` values('clearing_monthdata','7');");
E_D("replace into `zyads_settings` values('min_pay','0');");
E_D("replace into `zyads_settings` values('default_pay','chinabank');");
E_D("replace into `zyads_settings` values('99bill_id','');");
E_D("replace into `zyads_settings` values('99bill_key','');");
E_D("replace into `zyads_settings` values('chinabank_id','');");
E_D("replace into `zyads_settings` values('chinabank_key','');");
E_D("replace into `zyads_settings` values('alipay_email','');");
E_D("replace into `zyads_settings` values('alipay_id','');");
E_D("replace into `zyads_settings` values('alipay_key','');");
E_D("replace into `zyads_settings` values('tenpay_id','');");
E_D("replace into `zyads_settings` values('tenpay_key','');");
E_D("replace into `zyads_settings` values('cpc_deduction','30');");
E_D("replace into `zyads_settings` values('cpm_deduction','0');");
E_D("replace into `zyads_settings` values('cpa_deduction','0');");
E_D("replace into `zyads_settings` values('cps_deduction','0');");
E_D("replace into `zyads_settings` values('cpv_deduction','0');");
E_D("replace into `zyads_settings` values('union_ck','9');");
E_D("replace into `zyads_settings` values('recommend_tc','2');");
E_D("replace into `zyads_settings` values('recommend_status','1');");
E_D("replace into `zyads_settings` values('ip_del_date','7');");
E_D("replace into `zyads_settings` values('add_day_pv','0');");
E_D("replace into `zyads_settings` values('gmt_time','8');");
E_D("replace into `zyads_settings` values('make_html','0');");
E_D("replace into `zyads_settings` values('check_code','1');");
E_D("replace into `zyads_settings` values('reg_type','0');");
E_D("replace into `zyads_settings` values('sync_load','www.zyiis.com');");
E_D("replace into `zyads_settings` values('clearing_atuo','0');");
E_D("replace into `zyads_settings` values('show_text_noads','没有合适的广告可显示，请返回联盟重新选择广告');");
E_D("replace into `zyads_settings` values('show_text_nodomain','搜虎精品社区www.souho.net提供：你的广告与当前域名不一致');");
E_D("replace into `zyads_settings` values('show_text_nouserstatus','搜虎精品社区www.souho.net提供：用户未激活');");
E_D("replace into `zyads_settings` values('show_text_nozone','搜虎精品社区www.souho.net提供：广告位出错，请重新选择广告或是删除当前广告位');");
E_D("replace into `zyads_settings` values('inip_admin','0');");
E_D("replace into `zyads_settings` values('in_admin_ip','');");
E_D("replace into `zyads_settings` values('integral_status','1');");
E_D("replace into `zyads_settings` values('integral_day','17');");
E_D("replace into `zyads_settings` values('integral_daypv','100');");
E_D("replace into `zyads_settings` values('integral_topay','1');");
E_D("replace into `zyads_settings` values('reg_code','1');");
E_D("replace into `zyads_settings` values('tax_status','1');");
E_D("replace into `zyads_settings` values('tax_1','800');");
E_D("replace into `zyads_settings` values('tax_2_1','800');");
E_D("replace into `zyads_settings` values('tax_2_2','4000');");
E_D("replace into `zyads_settings` values('tax_2_bfb','20');");
E_D("replace into `zyads_settings` values('tax_3_1','4000');");
E_D("replace into `zyads_settings` values('tax_3_2','20000');");
E_D("replace into `zyads_settings` values('tax_3_bfb','20');");
E_D("replace into `zyads_settings` values('tax_4_1','20000');");
E_D("replace into `zyads_settings` values('tax_4_2','50000');");
E_D("replace into `zyads_settings` values('tax_4_bfb','30');");
E_D("replace into `zyads_settings` values('tax_5_1','50000');");
E_D("replace into `zyads_settings` values('tax_5_2','');");
E_D("replace into `zyads_settings` values('tax_5_bfb','40');");
E_D("replace into `zyads_settings` values('tax_6_1','');");
E_D("replace into `zyads_settings` values('tax_6_2','');");
E_D("replace into `zyads_settings` values('tax_6_bfb','');");
E_D("replace into `zyads_settings` values('codeurl','http://127.0.0.1');");

require("../../inc/footer.php");
?>