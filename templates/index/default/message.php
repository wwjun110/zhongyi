<?php if(!defined('IN_ZYADS')) exit(); 
include TPL_DIR . "/header.php";
include P_TPL . "/message.lang.php";
?>
<title>信息 <?php echo $GLOBALS['C_ZYIIS']['sitename']?></title>
<div class="regtbg"></div>
<table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td height="60" style="border-bottom:1px solid #E3E3E3;color:#999999;font-size:14px;margin:15px 0pt 10px;">系统提示信息</td>
      </tr>
      <tr>
        <td height="200" align="center" style="padding-left:20px">
		   <?php if($t == 'toemail') {?>
            <h3 style="font-size:14px; font-weight:bold;"><img src="/templates/<?php echo Z_TPL?>/images/ok.jpg" alt="" align="absmiddle"/> 欢迎您的加盟，现在按以下步骤激活您的帐号！</h3>
          <br/>
          第一步： <span style="color:#000;">查看您的电子邮箱，我们给您发送了激活邮件</span><br/>
          <br/>
          第二步： <span style="color:#000;">点击激活邮件中的链接，即可激活您的帐号！</span>
          </li>
		  
            <?php } elseif($t == 'reg_succeed') {?>
            <img src="/templates/<?php echo Z_TPL?>/images/ok.jpg" alt="" align="absmiddle"/> <span style="font-size:14px">注册成功，欢迎您的加盟&nbsp; <a href="index.php?action=login" class="thickbox" title="用户登入">马上登录</a></span>
			
			
            <?php } elseif($t == 'activate_succeed') {?>
            <img src="/templates/<?php echo Z_TPL?>/images/ok.jpg" alt="" align="absmiddle"/> <span style="font-size:14px">验证成功，请点击<a href="index.php?action=login" class="thickbox" title="用户登入"> 登录 </a>获取代码&nbsp; </span>
			
			 <?php } elseif($t == 'findpwd_succeed') {?>
            <img src="/templates/<?php echo Z_TPL?>/images/ok.jpg" alt="" align="absmiddle"/> <span style="font-size:14px">系统成功接受了您的请求，新密码已发送到您的邮箱</span>
			
			<?php } elseif($t == 'answer_err') {?>
            <img src="/templates/<?php echo Z_TPL?>/images/sad.jpg" alt="" align="absmiddle"/> <span style="font-size:14px">回答问题不能匹配</span>
			
            <?php } else {?>
            <img src="/templates/<?php echo Z_TPL?>/images/sad.jpg" alt="" align="absmiddle"/> <span style="font-size:14px"><?php echo $m[$t]!='' ? $m[$t] : "未知的信息"?></span>
            <?php }?></td>
      </tr>
    </table>
 <?php include TPL_DIR . "/footer.php";?>