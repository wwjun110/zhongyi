<?php if(!defined('IN_ZYADS')) exit; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=GB2312" />
<meta name = "description" content = "" />
<meta name = "keywords" content = "" />
<meta name="author" content="���׹������ϵͳ | www.zyiis.com" />
<meta name="Copyright" content="Copyright (c) 2010 zyiis.com" />
<script src="/javascript/function.js" language='JavaScript'></script>
<title>����� �����̨ <?php echo $GLOBALS['C_ZYIIS']['sitename']?></title>
<link href="/templates/<?php echo Z_TPL?>/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<table width="910" height="72" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="230"><img src="/templates/<?php echo Z_TPL?>/images/logo.gif"   border="0" /></td>
    <td align="right"><table width="600" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td height="30" align="right"><a href="?action=pm" class="head_nav">�ҵ���Ϣ</a> | <a href="/" class="head_nav">������ҳ</a></td>
        </tr>
        <tr>
          <td height="30" align="right">��ӭ�� <?php echo $_SESSION["username"]?> <a href="/index.php?action=logout">[�˳�]</a> <?php echo date("Y��m��d��",TIMES)?>
            <?php 
		$arr = array("������","����һ","���ڶ�","������","������","������","������");
		$w = date("w",TIMES);
		echo $arr[$w];
		?>
            <?php if($_SESSION["serviceqq"]){?>
            <span style=" color:#0000FF; font-size:14px; padding-left:30px">�ͷ���<a href="http://wpa.qq.com/msgrd?V=1&uin=<?php echo $_SESSION["serviceqq"]?>" target="_blank"><img border="0" src="http://wpa.qq.com/pa?p=2:<?php echo $_SESSION["serviceqq"]?>:17" alt="���������ҷ���Ϣ" title="���������ҷ���Ϣ" /></span>
            <?php }?></td>
        </tr>
      </table></td>
  </tr>
</table>
<div class="header_menu">
  <div class="shell">
    <ul class="clear" id="channel">
      <li <?php if($_GET['action'] == '') echo "class='current1'"?>><a href="/advertiser/">�ҵ���ҳ</a></li>
      <li <?php if(in_array($_GET['action'],array('planlist','createplan','editplan'))) echo "class='current1'"?>><a href="?action=planlist">�ƻ�����</a></li>
      <li <?php if(in_array($_GET['action'],array('createads','adslist'))) echo "class='current1'"?>><a href="?action=adslist">������</a></li>
      <li <?php if(in_array($_GET['action'],array('stats' )))  echo "class='current1'"?>><a href="?action=stats">���ݱ���</a></li>
      <li <?php if(in_array($_GET['action'],array('audit'))) echo "class='current1'"?>><a href="?action=audit">�������</a></li>
      <?php if($this->cpa_cps) { ?>
      <li <?php if(in_array($_GET['action'],array( 'order')))  echo "class='current1'"?>><a href="?action=order">�鿴����</a></li>
      <?php }?>
      <li <?php if($_GET['action'] == 'consumelist') echo "class='current1'"?>><a href="?action=consumelist">���߳�ֵ</a></li>
      <li <?php if($_GET['action'] == 'userinfo') echo "class='current1'"?>><a href="?action=userinfo">��Ա��Ϣ</a></li>
    </ul>
  </div>
</div>
