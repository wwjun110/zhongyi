<?php if(!defined('IN_ZYADS')) exit(); ?>
<html>
<head>
<meta name="author" content="中易广告联盟系统 | www.zyiis.com" />
<meta name="Copyright" content="Copyright (c) 2009 zyiis.com" />
<meta http-equiv="Content-Type" content="text/html; charset=gbk" />
<link href="/templates/<?php echo Z_TPL?>/style.css" type=text/css rel=stylesheet>
<script src="/javascript/function.js" type="text/javascript"></script>
<title>客服登入 <?php echo $GLOBALS['C_ZYIIS']['sitename']?></title>
</head>
<body>
<table width="362" height="313" border="0" align="center" cellpadding="0" cellspacing="0" background="/templates/<?php echo Z_TPL?>/images/dl_bg.jpg" style="margin-top:100px">
  <tr>
    <td><form  method="post" action="http://<?php echo $GLOBALS['C_ZYIIS']['authorized_url']?>/service/i.php?action=postuserlogin" onSubmit="return doLogin()" style="margin-bottom: 0px;">
      <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0" style="margin-top:40px">
        <tr>
          <td width="80" height="30" align="center">用户名</td>
          <td><input name="username" type="text" class="dl_i" id="username" maxlength="30"/></td>
        </tr>
        <tr>
          <td height="8" align="center"></td>
          <td></td>
        </tr>
        <tr>
          <td height="30" align="center">密&nbsp; 码 </td>
          <td><input name="password" type="password" class="dl_i" id="password" maxlength="32"/></td>
        </tr>
        <tr>
          <td height="8" align="center"></td>
          <td></td>
        </tr>
        
        <tr>
          <td height="30" align="center">验证码</td>
          <td><input name="checkcode" type="text" class="dl_i" id="checkcode" style="width:80px" maxlength="4"/>
              <img src="http://<?php echo $GLOBALS['C_ZYIIS']['authorized_url']?>/index.php?action=imgcode"  alt= "看不清?请点击刷新验证码" align="absmiddle" id="varImg"  style= "cursor:pointer;"  onclick="refurbish();"/></td>
        </tr>
         
        <tr>
          <td height="65">&nbsp;</td>
          <td><input name="image" type="image"  src="/templates/<?php echo Z_TPL?>/images/dl.gif" align="absmiddle" border="0" style="width:81px; height:32px" />
            &nbsp;&nbsp; </td>
        </tr>
      </table>
      </form></td>
  </tr>
</table>
