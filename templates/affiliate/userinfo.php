<?php if(!defined('IN_ZYADS')) exit(); 
include TPL_DIR . "/header.php";?>

<div id="pro_menu" class="pro_menu" style="display: block;">
  <div class="shell">
    <ul class="pro">
      <li <?php if($actiontype == '') echo 'class="default"'?>><a href="?action=userinfo">�ʻ���Ϣ</a></li>
      <li <?php if($actiontype == 'pw') echo 'class="default"'?>><a href="?action=userinfo&actiontype=pw">�޸�����</a></li>
    </ul>
  </div>
</div>
<div class="userinfo">
  <?php if($statetype!= '') {?>
  <div class="tipinfo" id="success">
    <div class="r1"></div>
    <div class="r2"></div>
    <div class="text"><?php if($statetype== 'success') echo "��Ϣ�Ѹ���"; else echo "�޷�ȷ����������"?>��</div>
    <div class="l1"></div>
    <div class="l2"></div>
  </div>
  <?php }  ?>
  <?php if($actiontype== '') {?>
  <form action="?action=upuserpost" method="post" name="uppost" id="uppost">
    <h2> ������Ϣ </h2>
    <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="100">�û����ƣ�</td>
        <td><?php echo $u['username']?></td>
      </tr>
      <tr>
        <td>�û�ID��</td>
        <td><?php echo $u['uid']?></td>
      </tr>
      <tr>
        <td>��ʾ���⣺</td>
        <td><input name="question" type="text"  id="question" value="<?php echo $u['question']?>" /></td>
      </tr>
      <tr>
        <td>�ش����⣺</td>
        <td><input name="answer" type="text"  id="answer" value="<?php echo $u['answer']?>" /></td>
      </tr>
    </table>
    <h2> ������Ϣ </h2>
    <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="100">��ϵ�ˣ�</td>
        <td><input name="contact" type="text"  id="contact" value="<?php echo $u['contact']?>" /></td>
      </tr>
      <tr>
        <td>��ϵ�绰��</td>
        <td><input name="tel" type="text"  id="tel" value="<?php echo $u['tel']?>" /></td>
      </tr>
      <tr>
        <td>�ֻ���</td>
        <td><input name="mobile" type="text"  id="mobile" value="<?php echo $u['mobile']?>" /></td>
      </tr>
      <tr>
        <td>QQ��</td>
        <td><input name="qq" type="text"  id="qq" value="<?php echo $u['qq']?>" /></td>
      </tr>
      <tr>
        <td>�����ʼ���</td>
        <td><input name="email" type="text"  id="email" value="<?php echo $u['email']?>" /></td>
      </tr>
    </table>
    <h2> �տ���Ϣ </h2>
    <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="100">�����У�</td>
        <td><?php foreach ($GLOBALS['C_Bank'] as $banks=>$val){
			if($u['bank'] == $val[0]) echo $banks;
		}?>
          <?php echo $u['bankname']?></td>
      </tr>
      <tr>
        <td>�տ��ˣ�</td>
        <td><?php echo $u['accountname']?></td>
      </tr>
      <tr>
        <td>�����ʺţ�</td>
        <td><?php echo $u['bankacc']?></td>
      </tr>
    </table>
    <?php if ($GLOBALS['C_ZYIIS']['recommend_status']=='1'){?>
    <h2> ������Ϣ </h2>
    <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="100">Ŀǰ�ܹ����ߣ�</td>
        <td><?php echo $sumrecommend?>��</td>
      </tr>
      <tr>
        <td>����20����</td>
        <td><?php echo $recommenduser?></td>
      </tr>
      <tr>
        <td>�ƹ���룺</td>
        <td>http://<?php echo $GLOBALS['C_ZYIIS']['authorized_url']?>/v/?a=<?php echo $_SESSION['uid']?></td>
      </tr>
    </table>
    <?php }?>
    <br />
    <input type="button" value=" ȷ �� " onclick="return upPost()" />
  </form>
  <?php }  else {?>
  <h2> �޸����� </h2>
  <form action="?action=uppasswdpost" method="post" name="uppasswdpost" id="uppasswdpost">
    <table width="90%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="100">�������룺</td>
        <td><input name="oldpassword" type="password"  class="reg" id="oldpassword"/></td>
      </tr>
      <tr>
        <td>�����룺</td>
        <td><input name="password" type="password"  class="reg" id="password" maxlength="16"/>
          <span style="color:gray">Ϊ�������˻���ȫ��������6λ�������룡</span></td>
      </tr>
      <tr>
        <td>������һ�Σ�</td>
        <td><input name="password_confirm" type="password"   id="password_confirm" maxlength="16" />
          <span style="color:gray">������һ�����������룡</span></td>
      </tr>
    </table>
    <br />
    <input type="button" value=" ȷ �� " onclick="return upPasswdPost()" />
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
        msg=msg+"��������ʾ�������ݣ�\n";		
     }
	if(!isValidReg(question)){
        msg=msg+"�������ݰ����Ƿ��ַ���\n";
    }
    if(isNULL(answer)){
        msg=msg+"������ش��������ݣ�\n";
    }	
	if(!isValidReg(answer)){
        msg=msg+"�ش��������ݰ����Ƿ��ַ���\n";
    }
	if(isNULL(contact)){
        msg=msg+"��������ϵ�����ݣ�\n";		
     }
	if(!isValidReg(contact)){
        msg=msg+"��ϵ�����ݰ����Ƿ��ַ���\n";
    }
    if(isNULL(email)){
        msg=msg+"����������ʼ����ݣ�\n";
    }	
	if(!isEmail(email)){
        msg=msg+"��������ȷ�ĵ����ʼ���\n";
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
        msg=msg+"�������������룡\n";		
     }
	 if(isNULL(password)){
        msg=msg+"�����������룡\n";		
     }
	if(password.length<6){
        msg=msg+"���������ٱ�����6������ɣ���಻�ܳ���16���֣�\n";		
     }
	 if(password_confirm!=password){
        msg=msg+"�������������ͬ��\n";		
     }
	 if(!isNULL(msg)){
       alert(msg);
       return false;
    }
	 document.forms["uppasswdpost"].submit();
}
</script>
<?php include TPL_DIR . "/footer.php";?>
