<?php if(!defined('IN_ZYADS')) exit(); ?>
<html>
<head>
<meta name="author" content="中易广告联盟系统 | www.zyiis.com" />
<meta name="Copyright" content="Copyright (c) 2009 zyiis.com" />
<meta http-equiv="Content-Type" content="text/html; charset=gbk" />
<link href="/templates/<?php echo Z_TPL?>/style.css" type=text/css rel=stylesheet>
<script src="/javascript/function.js" type="text/javascript"></script>
<script src="/javascript/jquery/jquery.js" type="text/javascript"></script>
<title>找回密码<?php echo $GLOBALS['C_ZYIIS']['sitename']?></title>
</head>
<body>
<table width="100%" border="0" cellpadding="0" cellspacing="0"  background="/templates/<?php echo Z_TPL?>/images/top_bg.jpg">
  <tr>
    <td height="28"><table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td><a href="/">联盟首页</a> | <a href="<?php echo url("?action=contact")?>">联系我们</a> </td>
        </tr>
      </table></td>
  </tr>
</table>
<table width="750" height="400" border="0" align="center" cellpadding="0" cellspacing="0" style="border:1px solid #CCCCCC;margin-top:60px;overflow:hidden;padding:15px;">
  <tr>
    <td height="70">&nbsp; &nbsp;&nbsp;<br>
      <table width="500" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="90" align="center"><img src="/templates/<?php echo Z_TPL?>/images/password.jpg" align="absmiddle"  /></td>
          <td  style="line-height:18px;"><strong>找回密码</strong><br>
            &nbsp; <font color="gray">通过以下方法可以取回您的密码</font>。</td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td height="60"><table width="670" height="43" border="0" align="center" cellpadding="0" cellspacing="0" background="/templates/<?php echo Z_TPL?>/images/pwd_bg.gif">
        <tr>
          <td align="center" style="color:#1D61B5">
		  <?php 
		  	if($actiontype == 'next') {echo "第二步回答提示问题" ;} 
			else echo "第一步输入用户名"
		  ?>
		  </td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td height="60" align="center"><ul class="findpwd">
        <li class="fd <?php if($actiontype == '') echo "fd1"?>">1.输入用户名</li>
        <li class="fd <?php if($actiontype == 'next') echo "fd1"?>">2.提示问题</li>
        <li class="fd">3.发送邮件</li>
      </ul></td>
  </tr>
  <tr>
    <td height="200"><?php if($actiontype == '') {?>
      <form action="/index.php?action=findpasswd" method="post" name="from" id="from" onSubmit="return a()">
        <input name="actiontype" type="hidden" value="next" />
        <table width="300" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td width="100" height="30" align="center">请输入用户名：</td>
            <td><input name="username" type="text" class="dl_i" id="username" maxlength="30"/></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td height="10">&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td height="60"><input name="image" type="image"  src="/templates/<?php echo Z_TPL?>/images/st.gif" align="absmiddle" border="0" style="width:81px; height:32px" /></td>
          </tr>
        </table>
      </form>
      <?php }?>
	  
	<?php if($actiontype == 'next') {?>
      <form action="/index.php?action=findpasswd&actiontype=find" method="post" name="from" id="from" onSubmit="return b()">
	  <input name="username" type="hidden" value="<?php echo $u['username']?>" />
        <table width="300" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td width="100" height="30" align="center">您的提示问题：</td>
            <td><?php echo $u['question']?></td>
          </tr>
          <tr>
            <td height="30">诠输入回答答案：</td>
            <td height="10"><input name="answer" type="text" class="dl_i" id="answer" maxlength="30"/></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td height="60"><input name="image" type="image"  src="/templates/<?php echo Z_TPL?>/images/st.gif" align="absmiddle" border="0" style="width:81px; height:32px" /></td>
          </tr>
        </table>
      </form>
      <?php }?>
	  
    </td>
  </tr>
  <tr>
    <td align="center">&nbsp;</td>
  </tr>
</table>
<script language="JavaScript" type="text/javascript">
function b(){ 
	var answer = $i('answer').value; 
	if(answer== "") { 
		alert( "请输入回答问题! "); 
		$i('answer').focus(); 
		return   false; 
	} 
	addLoading() ;
	from.submit(); 
	return   true; 
} 
function a() { 
	var u = $i('username').value; 
	if(u == "") { 
		alert( "请输入用户名! "); 
		$i('username').focus(); 
		return   false; 
	} 
	$.get("/index.php?action=userinfo&username="+u, function(data){ 
		if( data == 0 ){
			 from.submit(); 
		}
		else{
			alert('用户名出错');
			return false;
		}
	});  
	return false;
} 
</script>
