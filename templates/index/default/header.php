<?php if(!defined('IN_ZYADS')) exit(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="author" content="���׹������ϵͳ | www.zyiis.com" />
<meta name="Copyright" content="Copyright (c) 2011 zyiis.com" />
<meta http-equiv="Content-Type" content="text/html; charset=gbk" />
<link href="/templates/<?php echo Z_TPL?>/style.css" type=text/css rel=stylesheet>
<script src="/javascript/function.js" type="text/javascript"></script>

</head>
<body>
<table width="960" height="70" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="200" rowspan="2" align="left" valign="bottom"><a href="/"><img src="/templates/<?php echo Z_TPL?>/images/logo.gif" border="0" align="absmiddle"  style="  padding-bottom:4px"/></a></td>
    <td align="right" class="topa">
	<?php if(!in_array($_GET['action'],array('register'))){?>	
	��ӭ������<?php echo $GLOBALS['C_ZYIIS']['sitename']?> <a href="<?php echo url("?action=login")?>">����</a> | <a href="<?php echo url("?action=register")?>">ע��</a>
	<?php }  ?>	
	 </td>
  </tr>
  <tr>
    <td>
<?php if(!in_array($_GET['action'],array('register'))){?>	
	<table width="500" border="0" align="right" cellpadding="0" cellspacing="0" class="topnavB">
        <tr>
          <td><a href="/" <?php if($_GET['action']=='' || $_GET['action']=='news' ) echo ' class="dh_d"'?>>�� ҳ</a></td>
          <td ><a href="<?php echo url("?action=advertiser")?>" <?php if($_GET['action']=='advertiser') echo ' class="dh_d"'?>>�����</a></td>
        <td ><a href="<?php echo url("?action=affiliate")?>" <?php if($_GET['action']=='affiliate') echo ' class="dh_d"'?>>��վ��</a></td>
        <?php if ($GLOBALS['C_ZYIIS']['integral_status']=='1'){?>
        <td ><a href="<?php echo url("?action=integral")?>" <?php if($_GET['action']=='integral') echo ' class="dh_d"'?>>���ֶҽ�</a></td>
		<?php } ?>	
        <td ><a href="<?php echo url("?action=help")?>" <?php if($_GET['action']=='help') echo ' class="dh_d"'?>>��������</a></td>
        <td ><a href="<?php echo url("?action=contact")?>" <?php if($_GET['action']=='contact') echo ' class="dh_d"'?>>��ϵ�ͷ�</a></td>
        </tr>
      </table>
<?php } else {?>	  
<table width="180" border="0" align="right" cellpadding="0" cellspacing="0" >
        <tr>
          <td><a href="/">��ҳ</a> | <a href="<?php echo url("?action=login")?>">����</a> <a href="<?php echo url("?action=register")?>">ע��</a> | <a href="<?php echo url("?action=contact")?>" >��ϵ����</a></td>
        
        </tr>
      </table>
<?php }  ?>	  



	  </td>
  </tr>
</table>
