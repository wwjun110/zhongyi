<?php if(!defined('IN_ZYADS')) exit; ?>
<script src="/javascript/function.js" type="text/javascript"></script>
<style type="text/css">
body,td{font-size:12px;}
.gray{ color:gray;}
.cpt{ font-size:12px; font-weight:bold; border-bottom:1px #dddddd solid; padding-bottom:2px}
.s-edit{
margin-top:10px;
}
.s-edit td{
	padding-top: 5px;
	padding-right: 0px;
	padding-bottom: 2px;
	padding-left: 30px;
}
.s-edit .text {
width:15em;
border-style:solid;
border-width:1px;
border-color:#DFDFDF;
height:22px;
line-height:22px;
}
</style>
<form id="form1" name="form1" method="post" action="?action=users&actiontype=postedit">
<input type="hidden" name="uid" value="<?php echo $users['uid']?>" />
  <table width="560" border="0" align="center" cellpadding="0" cellspacing="0" style="font-size:12px;line-height:20px;">
    <tr>
      <td colspan="2" class="cpt">修改密码<span style=" font-weight:normal; font-size:12px; padding-left:20px;font-style:italic;">注册IP <?php echo $users['regip'].'-' .convertIp($users["regip"])?> 注册时间 <?php echo $users['regtime']?></span></td>
    </tr>
    <tr class="s-edit">
      <td> 密码 </td>
      <td width="444"><input name="pwdpwd" type="text" id="pwdpwd"  class="text"  /></td>
    </tr>
    <tr class="s-edit">
      <th colspan="2" align="left" class="cpt">联系信息</th>
    </tr>
    <tr class="s-edit">
      <td >联系人</td>
      <td ><input name="contact" type="text"  id="contact" value="<?php echo $users['contact']?>" class="text" /></td>
    </tr>
    <tr class="s-edit">
      <td >QQ</td>
      <td ><input name="qq" type="text" id="qq" value="<?php echo $users['qq']?>" maxlength="11" class="text" />
          <?php if($users['qq']>4){?>
          <a href="tencent://message/?uin=<?php echo $users['qq']?>&amp;Site=&amp;Menu=yes"><img height="16" border="0" alt="<?php echo $users['qq']?>" src="http://wpa.qq.com/pa?p=1:<?php echo $users['qq']?>:4"/></a>
          <?php }?></td>
    </tr>
    <tr class="s-edit">
      <td >E-mail</td>
      <td ><input name="email" type="text"    id="email" value="<?php echo $users['email']?>" maxlength="100"  class="text" /></td>
    </tr>
    <tr class="s-edit">
      <td >手机</td>
      <td ><input name="mobile" type="text" id="mobile" value="<?php echo $users['mobile']?>" size="20"  class="text" /></td>
    </tr>
    <tr class="s-edit">
      <td ><span class="tdtit">联系电话</span></td>
      <td ><input name="tel" type="text"   id="tel" value="<?php echo $users['tel']?>" size="20"  class="text" /></td>
    </tr>
    <tr class="s-edit">
      <th colspan="2" align="left" class="cpt">安全信息</th>
    </tr>
    <tr class="s-edit">
      <td >提示问题</td>
      <td ><input name="question" type="text"    id="question" value="<?php echo $users['question']?>" size="20" class="text"/></td>
    </tr>
    <tr class="s-edit">
      <td >回答问题</td>
      <td ><input name="answer" type="text"    id="answer" value="<?php echo $users['answer']?>" size="20" class="text"/></td>
    </tr>
    <tr class="s-edit">
      <th colspan="2" align="left" class="cpt">银行信息</th>
    </tr>
    <tr class="s-edit">
      <td  >银行名称</td>
      <td align="left" ><select name="bank" class='select' disabled>
          <?php  
		foreach ($GLOBALS['C_Bank'] as $bank=>$val){?>
          <option value="<?php echo $val[0]?>" <?php if($users['bank'] == $val[0]){echo 'selected';}?>><?php echo $bank?></option>
          <?php }?>
      </select></td>
    </tr>
    <tr class="s-edit">
      <td  >开户行</td>
      <td align="left" ><input name="bankname" type="text" id="bankname" value="<?php echo $users['bankname']?>" size="20" class="text" disabled/></td>
    </tr>
    <tr class="s-edit">
      <td  >收款人</td>
      <td align="left" ><input name="accountname" type="text" id="accountname" value="<?php echo $users['accountname']?>" size="20" class="text" disabled/></td>
    </tr>
    <tr class="s-edit">
      <td  >收款帐号</td>
      <td align="left" ><input name="bankacc" type="text" id="bankacc" value="<?php echo $users['bankacc']?>" class="text" disabled/></td>
    </tr>
    <tr>
      <td height="5"></td>
      <td></td>
    </tr>
    <tr>
      <td height="30">&nbsp;</td>
      <td><input type="submit" name="Submit" value=" 提交 " /></td>
    </tr>
  </table>
</form>
