<?php if(!defined('IN_ZYADS')) exit; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=GB2312" />
<meta name = "description" content = "" />
<meta name = "keywords" content = "" />
<meta name="Copyright" content="Copyright (c) 2007-2009 zyiis.com" />
<script src="/javascript/function.js" language='JavaScript'></script>
<script src="/javascript/jquery/jquery.js" type="text/javascript"></script>
<script language="JavaScript" type="text/javascript" src="/javascript/jquery/thickbox.js"></script>
<link href="/javascript/jquery/css/thickbox.css" rel="stylesheet" type="text/css" />
<link href="/templates/<?php echo Z_TPL?>/style.css" rel="stylesheet" type="text/css" />
<title> �ͷ���̨ <?php echo $GLOBALS['C_ZYIIS']['sitename']?></title>
</head>
<body>
<table width="910" height="72" border="0" align="center" cellpadding="0" cellspacing="0">
  
  <tr>
    <td width="230"><img src="/templates/<?php echo Z_TPL?>/images/logo.gif"   border="0" /></td>
    <td align="right"><table width="400" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td height="30" align="right"> �ͷ��� <?php echo $_SESSION["serviceusername"]?> <a href="/index.php?action=logout">[�˳�]</a> <?php echo date("Y��m��d��",TIMES)?>
          <?php 
		$arr = array("������","����һ","���ڶ�","������","������","������","������");
		$w = date("w",TIMES);
		echo $arr[$w];
		?></td>
        </tr>
        <tr>
          <td height="30" valign="bottom">&nbsp;</td>
        </tr>
      </table></td>
  </tr>
</table>
<div class="header_menu">
  <div class="shell">
    <ul class="clear" id="channel">
      <li <?php if($_GET['action'] == '') echo "class='current1'"?>><a href="/service/">�ҵ���ҳ</a></li>
      <li <?php if(in_array($_GET['action'],array('users'))) echo "class='current1'"?>><a href="?action=users">��Ա����</a></li>
      <li <?php if(in_array($_GET['action'],array('site'))) echo "class='current1'"?>><a href="?action=site">��վ����</a></li>
      <li <?php if(in_array($_GET['action'],array('stats' )))  echo "class='current1'"?>><a href="?action=stats">���ݱ���</a></li>
 
      <li <?php if($_GET['action'] == 'pm') echo "class='current1'"?>><a href="?action=pm">�ҵ���Ϣ</a></li>
    </ul>
  </div>
</div>
</div>