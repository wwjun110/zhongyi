<?php if(!defined('IN_ZYADS')) exit; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=GB2312" />
<meta name = "description" content = "" />
<meta name = "keywords" content = "" />
<meta name="Author" content="���׹������ϵͳ | www.zyiis.com" />
<meta name="Copyright" content="Copyright (c) 2010 zyiis.com" />
<script src="/javascript/function.js" language='JavaScript'></script>
<title><?php echo $GLOBALS['C_ZYIIS']['sitename']?> | ��Ա�����̨</title>
<link href="/templates/<?php echo Z_TPL?>/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<table width="910" height="72" border="0" align="center" cellpadding="0" cellspacing="0">
  
  <tr>
    <td width="230"><a href=""/></a><a href="/"><img src="/templates/<?php echo Z_TPL?>/images/logo.gif"   border="0" /></a></a></td>
    <td align="right"><table width="600" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td height="30" align="right">&nbsp;</td>
          <td align="right"> 
		 <?php if ($GLOBALS['C_ZYIIS']['integral_status']=='1'){?>
		 <img src="/templates/<?php echo Z_TPL?>/images/box1.jpg"   border="0" align="absmiddle" />
		  <a href="index.php?action=exchange" class="head_nav"><font color="#FF0000">���ֶҽ�</font></a> | 
		  <?php }  ?>	
		  <a href="index.php?action=pm&actiontype=inbox" class="head_nav">��Ϣ(<font color="#FF0000"><?php echo (int)$this->pmnum['n']?></font>)</a> | <a href="?action=index" class="head_nav">�ҵ���ҳ</a> | <a href="/index.php?action=help" class="head_nav">����</a> | <a href="?action=pm" class="head_nav">��������</a> </td>
        </tr>
        <tr>
          <td height="30" valign="bottom">&nbsp;</td>
          <td align="right">��ӭ�� <?php echo $_SESSION["username"]?> <a href="/index.php?action=logout">[�˳�]</a>  <?php echo date("Y��m��d��",TIMES)?>
            <?php 
		$arr = array("������","����һ","���ڶ�","������","������","������","������");
		$w = date("w",TIMES);
		echo $arr[$w];
		?>
		<?php if($_SESSION["serviceqq"]){?>
          <span style="color:#0000FF; font-size:14px; padding-left:30px">�ͷ���<a href="http://wpa.qq.com/msgrd?V=1&uin=<?php echo $_SESSION["serviceqq"]?>" target="_blank"><img border="0" src="http://wpa.qq.com/pa?p=2:<?php echo $_SESSION["serviceqq"]?>:17" alt="���������ҷ���Ϣ" title="���������ҷ���Ϣ"></a></span>
		  <?php }?>
		  </td>
        </tr>
      </table></td>
  </tr>
</table>
<div class="header_menu">
  <div class="shell">
    <ul class="clear" id="channel">
      <li <?php if($_GET['action'] == '') echo "class='current1'"?>><a href="/affiliate/">�ҵ���ҳ</a></li>
      <li <?php if(in_array($_GET['action'],array('planlist','planads','adslist','createzt'))) echo "class='current1'"?>><a href="index.php?action=planlist">�̼ҹ��</a></li>
      <li <?php if(in_array($_GET['action'],array('createsite','zonelist','sitelist','editsite','zone','getcode'))) echo "class='current1'"?>><a href="index.php?action=zonelist">������λ</a></li>
      <li <?php if(in_array($_GET['action'],array('stats' )))  echo "class='current1'"?>><a href="index.php?action=stats">���ݱ���</a></li>
	  <?php if($this->cpa_cps) { ?>
	  <li <?php if(in_array($_GET['action'],array( 'order')))  echo "class='current1'"?>><a href="index.php?action=order">�鿴����</a></li>
	   <?php }?>
      <li <?php if($_GET['action'] == 'paylist') echo "class='current1'"?>><a href="index.php?action=paylist">֧������</a></li>
      <li <?php if($_GET['action'] == 'userinfo') echo "class='current1'"?>><a href="index.php?action=userinfo">��Ա��Ϣ</a></li>
      <li <?php if($_GET['action'] == 'pm') echo "class='current1'"?>><a href="index.php?action=pm">�ҵ���Ϣ</a></li>
    </ul>
  </div>
</div>
</div>
