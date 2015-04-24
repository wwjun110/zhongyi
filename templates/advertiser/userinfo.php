<?php if(!defined('IN_ZYADS')) exit(); 
include TPL_DIR . "/header.php";?>

<div id="pro_menu" class="pro_menu" style="display: block;">
  <div class="shell">
    <ul class="pro">
      <li <?php if($actiontype == '') echo 'class="default"'?>><a href="?action=userinfo">帐户信息</a></li>
      <li <?php if($actiontype == 'pw') echo 'class="default"'?>><a href="?action=userinfo&actiontype=pw">修改密码</a></li>
    </ul>
  </div>
</div>
<div class="pages">
  <?php if($statetype!= '') {?>
  <div class="tipinfo" id="success">
    <div class="r1"></div>
    <div class="r2"></div>
    <div class="text"><?php if($statetype== 'success') echo "信息已更新"; else echo "无法确认现在密码"?>。</div>
    <div class="l1"></div>
    <div class="l2"></div>
  </div>
  <?php }  ?>
  <?php if($actiontype== '') {?>
  <form action="?action=upuserpost" method="post" name="uppost" id="uppost">
    <h2> 基本信息 </h2>
    <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="100">用户名称：</td>
        <td><?php echo $u['username']?></td>
      </tr>
      <tr>
        <td>用户ID：</td>
        <td><?php echo $u['uid']?></td>
      </tr>
      <tr>
        <td>提示问题：</td>
        <td><input name="question" type="text"  id="question" value="<?php echo $u['question']?>" /></td>
      </tr>
      <tr>
        <td>回答问题：</td>
        <td><input name="answer" type="text"  id="answer" value="<?php echo $u['answer']?>" /></td>
      </tr>
    </table>
    <h2> 个人信息 </h2>
    <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="100">联系人：</td>
        <td><input name="contact" type="text"  id="contact" value="<?php echo $u['contact']?>" /></td>
      </tr>
      <tr>
        <td>联系电话：</td>
        <td><input name="tel" type="text"  id="tel" value="<?php echo $u['tel']?>" /></td>
      </tr>
      <tr>
        <td>手机：</td>
        <td><input name="mobile" type="text"  id="mobile" value="<?php echo $u['mobile']?>" /></td>
      </tr>
      <tr>
        <td>QQ：</td>
        <td><input name="qq" type="text"  id="qq" value="<?php echo $u['qq']?>" /></td>
      </tr>
      <tr>
        <td>电子邮件：</td>
        <td><input name="email" type="text"  id="email" value="<?php echo $u['email']?>" /></td>
      </tr>
    </table>
  
    
    <br />
    <input type="button" value=" 确 定 " onclick="return upPost()" />
  </form>
  <? }  else {?>
  <h2> 修改密码 </h2>
  <form action="?action=uppasswdpost" method="post" name="uppasswdpost" id="uppasswdpost">
    <table width="90%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="100">现在密码：</td>
        <td><input name="oldpassword" type="password"  class="reg" id="oldpassword"/></td>
      </tr>
      <tr>
        <td>新密码：</td>
        <td><input name="password" type="password"  class="reg" id="password" maxlength="16"/>
          <span style="color:gray">为了您的账户安全，请输入6位以上密码！</span></td>
      </tr>
      <tr>
        <td>再输入一次：</td>
        <td><input name="password_confirm" type="password"   id="password_confirm" maxlength="16" />
          <span style="color:gray">再输入一次您的新密码！</span></td>
      </tr>
    </table>
    <br />
    <input type="button" value=" 确 定 " onclick="return upPasswdPost()" />
  </form>
  <?php }  ?>
</div>
<script language="JavaScript" type="text/javascript">
function upPost(){
	var question = $i('question').value;
	var answer = $i('answer').value;
	var contact = $i('contact').value;
	var email = $i('email').value;
	var msg = '';
	if(isNULL(question)){
        msg=msg+"请输入提示问题内容！\n";		
     }
	if(!isValidReg(question)){
        msg=msg+"标题内容包含非法字符！\n";
    }
    if(isNULL(answer)){
        msg=msg+"请输入回答问题内容！\n";
    }	
	if(!isValidReg(answer)){
        msg=msg+"回答问题内容包含非法字符！\n";
    }
	if(isNULL(contact)){
        msg=msg+"请输入联系人内容！\n";		
     }
	if(!isValidReg(contact)){
        msg=msg+"联系人内容包含非法字符！\n";
    }
    if(isNULL(email)){
        msg=msg+"请输入电子邮件内容！\n";
    }	
	if(!isEmail(email)){
        msg=msg+"请输入正确的电子邮件！\n";
    }
	if(!isNULL(msg)){
         alert(msg);
        return false;
    }
    document.forms["uppost"].submit();
}
function upPasswdPost(){ 
	var oldpassword = $i('oldpassword').value;
	var password = $i('password').value;
	var password_confirm = $i('password_confirm').value;
	var msg = '';
	if(isNULL(oldpassword)){
        msg=msg+"请输入现在密码！\n";		
     }
	 if(isNULL(password)){
        msg=msg+"请输入新密码！\n";		
     }
	if(password.length<6){
        msg=msg+"新密码最少必须由6个字组成，最多不能超过16个字！\n";		
     }
	 if(password_confirm!=password){
        msg=msg+"必须和新密码相同！\n";		
     }
	 if(!isNULL(msg)){
       alert(msg);
       return false;
    }
	 document.forms["uppasswdpost"].submit();
}
</script>
<?php include TPL_DIR . "/footer.php";?>
