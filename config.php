<?php
/*
+---------------------------------------------------------------------------+
| ZYIIS.COM                                                                 |
| ==========                                                                |
|                                                                           |
| Copyright (c) 2005-2012 Zyiis Limited                                     |
| For contact details, see: http://www.zyiis.com/                           |
|                                                                           |
+---------------------------------------------------------------------------+
$Id: config.php 30 2012-04-06 07:14:27Z jian@zyiis.com $
*/
//ini_set('display_errors', 'On');
//error_reporting(E_ALL &~E_NOTICE);
error_reporting(0);
set_magic_quotes_runtime(0);
date_default_timezone_set("Asia/Shanghai");
define('IN_ZYADS', TRUE);
define('LIB_DIR', dirname(__FILE__).'/libs');
define('APP_DIR', dirname(__FILE__).'/apps');
define('WWW_DIR', dirname(__FILE__));
require WWW_DIR . '/settings.php';
define('TIMES',time());
define('DATETIMES', date("Y-m-d H:i:s", TIMES));
define('DAYS',date('Y-m-d', TIMES));
define('UI','UI');

/******** Mysql ���� *********/
$GLOBALS['C_MYSQL'] = array(
	'dbhost' => 'localhost',	//������
	'dbport' => '3306',		//���Ӷ˿�
	'dbuser' => 'root',		//���ݿ��û���
	'dbpsw' => '',		//���ݿ�����
	'dbname' => 'zy_adun',		//���ݿ����
	'charset' => 'gbk',		//�����ַ���
	'sqlmode' => '1'		//MYSQL sql-mode���� 0=�ر� 1=���� 
);

$GLOBALS['C_Slave'] = '';


/******** ֧������ ���� *********/
// 1 = ���� 0 = �ر�
$GLOBALS['C_Bank'] = array(
'��������' => array('icbc',1),
'��������' => array('cmbc',1),
'��������' => array('ccb',1),
'ũҵ����' => array('abc',1),
'�й�����' => array('boc',0),
'֧����' => array('alipay',1),
'�Ƹ�ͨ' => array('tenpay',0),
);

/******** ���óߴ��� ���� *********/
$GLOBALS['C_Specs'] = array('950x90','760x90','728x90','468x60','250x60','200x200','160x600','120x240');

/******** �������� *********/
//��Ա��ѯ����ķ���
$GLOBALS['C_MsgType'] = array('�������','���Ͷ��','�ʻ�����','��վ���','����');


/******** ��Ʒ���� *********/
$GLOBALS['C_IntegralType'] = array('ʱ������','��������','�칫��Ʒ','�����鼮','ʵ�üҾ�','����');


$GLOBALS['C_province'] = array("����","���","����","�Ϻ�","�ӱ�","ɽ��","����","����","������","����","�㽭","����","����","����","ɽ��","����","����","����","�㶫","����","�Ĵ�","����","����","����","����","�ຣ","̨��","���ɹ�","����","����","�½�","����","���","����","������ַ","����");


function gC($db='C_MYSQL'){
	if ($db=='C_MYSQL') {
		static $dbo;
		$type = 'dbo';
	}else {
		static $db2;
		$type = 'db2';
	}
	if (is_null($$type)) {  
		require_once LIB_DIR."/db/mysqlclass.php";
		$$type = new Db_MysqlClass($GLOBALS[$db],$GLOBALS['C_Slave']);
		if ($GLOBALS['C_ZYIIS']['db_ms'] =='1'){
			$$type->masterslave = 1;
		}
	}
	return $$type;
}
function zAddslashes(&$value){
	return str_replace(array('"',"'"),array('&quot;','&#39;'),addslashes($value));
}
function InstallLicense(){
	/*$zl = zend_loader_install_license(WWW_DIR."/zyiis.zl");
	if (!$zl) {
	die("�޷������ļ�");
	}*/
}
?>