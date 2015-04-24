<?php if(!defined('IN_ZYADS')) exit(); 
include TPL_DIR . "/header.php";?>
 
<title>会员登入 <?php echo $GLOBALS['C_ZYIIS']['sitename']?></title>
 
<div class="regtbg"></div>
<table width="800" border="0" align="center" cellpadding="0" cellspacing="0" style="margin-top:60px">
 
 
  <tr>
    <td align="right" ><font color="#FF0000"><?php if($at == 'timeout') echo "自动退出，用户超时"?>&nbsp; </font> </td>
  </tr>
  <tr>
    <td><table width="800" height="342" border="0" cellpadding="0" cellspacing="0" background="/templates/<?php echo Z_TPL?>/images/dl_bg2.jpg">
        <tr>
          <td height="30">&nbsp;<font color="#2965A3">欢迎光临，推广,赚钱,尽在<?php echo $GLOBALS['C_ZYIIS']['sitename']?>!</font>&nbsp;&nbsp;<a href="<?php echo url("?action=register")?>"><span style="font-size:16px; font-weight:bold; color:#4e9fe1">马上注册>></span></a></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td height="150">&nbsp;</td>
          <td align="center" valign="top"><form  method="post" action="http://<?php echo $GLOBALS['C_ZYIIS']['authorized_url']?>/i.php?action=postuserlogin" onSubmit="return doLogin()" style="margin-bottom: 0px;">
            <table width="98%" border="0" cellpadding="0" cellspacing="0" style="margin-top:40px">
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
              <?php if ($GLOBALS['C_ZYIIS']['check_code']=='1') { //是否启用验证码功能?>
              <tr>
                <td height="30" align="center">验证码</td>
                <td><input name="checkcode" type="text" class="dl_i" id="checkcode" style="width:80px" maxlength="4"/>
                    <img src="http://<?php echo $GLOBALS['C_ZYIIS']['authorized_url']?>/index.php?action=imgcode"  alt= "看不清?请点击刷新验证码" align="absmiddle" id="varImg"  style= "cursor:pointer;"  onClick="refurbish();"/></td>
              </tr>
              <?php }?>
              <tr>
                <td height="65">&nbsp;</td>
                <td><input name="image" type="image"  src="/templates/<?php echo Z_TPL?>/images/dl.gif" align="absmiddle" border="0" style="width:81px; height:32px" />
                  &nbsp;&nbsp; <a href="<?php echo url("?action=register")?>"><img src="/templates/<?php echo Z_TPL?>/images/reg.gif" align="absmiddle" border="0" /></a></td>
              </tr>
            </table>
                      </form>          </td>
        </tr>
        <tr>
          <td valign="top"><table width="440" border="0" cellpadding="0" cellspacing="0" style="color:gray;line-height:18px; margin-top:20px">
            <tr>
              <td width="60"><img src="/templates/<?php echo Z_TPL?>/images/dl_adv.jpg" align="absmiddle" border="0" /></td>
              <td width="150"><strong>我要推广</strong><br>
                覆盖中国一半以上主流网民,合理的投放达到最好的效果。</td>
              <td width="60" align="center"><img src="/templates/<?php echo Z_TPL?>/images/dl_aff.jpg" align="absmiddle" border="0" /></td>
              <td>&nbsp;</td>
              <td><strong>我要赚钱</strong><br>
                高效及时结算,额度不限,流量收入最大化,我的流量我赚钱。</td>
            </tr>
            
          </table></td>
          <td valign="top"><table width="93%" border="0" cellpadding="0" cellspacing="0" style="border-top:1px solid #C0E4FE;">
            <tr>
              <td height="30"><strong>还没有联盟帐号？</strong></td>
              </tr>
            <tr>
              <td height="30">&nbsp;点击上面注册按钮只需1分钟注册&nbsp;&nbsp;&nbsp; <img src="/templates/<?php echo Z_TPL?>/images/i4.jpg" width="12" height="11" /> <a href="<?php echo url("?action=findpasswd")?>">忘记密码？</a></td>
              </tr>
            
          </table></td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td height="60">&nbsp;</td>
  </tr>
</table>
<?php include TPL_DIR . "/footer.php";?>