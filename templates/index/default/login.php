<?php if(!defined('IN_ZYADS')) exit(); 
include TPL_DIR . "/header.php";?>
 
<title>��Ա���� <?php echo $GLOBALS['C_ZYIIS']['sitename']?></title>
 
<div class="regtbg"></div>
<table width="800" border="0" align="center" cellpadding="0" cellspacing="0" style="margin-top:60px">
 
 
  <tr>
    <td align="right" ><font color="#FF0000"><?php if($at == 'timeout') echo "�Զ��˳����û���ʱ"?>&nbsp; </font> </td>
  </tr>
  <tr>
    <td><table width="800" height="342" border="0" cellpadding="0" cellspacing="0" background="/templates/<?php echo Z_TPL?>/images/dl_bg2.jpg">
        <tr>
          <td height="30">&nbsp;<font color="#2965A3">��ӭ���٣��ƹ�,׬Ǯ,����<?php echo $GLOBALS['C_ZYIIS']['sitename']?>!</font>&nbsp;&nbsp;<a href="<?php echo url("?action=register")?>"><span style="font-size:16px; font-weight:bold; color:#4e9fe1">����ע��>></span></a></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td height="150">&nbsp;</td>
          <td align="center" valign="top"><form  method="post" action="http://<?php echo $GLOBALS['C_ZYIIS']['authorized_url']?>/i.php?action=postuserlogin" onSubmit="return doLogin()" style="margin-bottom: 0px;">
            <table width="98%" border="0" cellpadding="0" cellspacing="0" style="margin-top:40px">
              <tr>
                <td width="80" height="30" align="center">�û���</td>
                <td><input name="username" type="text" class="dl_i" id="username" maxlength="30"/></td>
              </tr>
              <tr>
                <td height="8" align="center"></td>
                <td></td>
              </tr>
              <tr>
                <td height="30" align="center">��&nbsp; �� </td>
                <td><input name="password" type="password" class="dl_i" id="password" maxlength="32"/></td>
              </tr>
              <tr>
                <td height="8" align="center"></td>
                <td></td>
              </tr>
              <?php if ($GLOBALS['C_ZYIIS']['check_code']=='1') { //�Ƿ�������֤�빦��?>
              <tr>
                <td height="30" align="center">��֤��</td>
                <td><input name="checkcode" type="text" class="dl_i" id="checkcode" style="width:80px" maxlength="4"/>
                    <img src="http://<?php echo $GLOBALS['C_ZYIIS']['authorized_url']?>/index.php?action=imgcode"  alt= "������?����ˢ����֤��" align="absmiddle" id="varImg"  style= "cursor:pointer;"  onClick="refurbish();"/></td>
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
              <td width="150"><strong>��Ҫ�ƹ�</strong><br>
                �����й�һ��������������,�����Ͷ�Ŵﵽ��õ�Ч����</td>
              <td width="60" align="center"><img src="/templates/<?php echo Z_TPL?>/images/dl_aff.jpg" align="absmiddle" border="0" /></td>
              <td>&nbsp;</td>
              <td><strong>��Ҫ׬Ǯ</strong><br>
                ��Ч��ʱ����,��Ȳ���,�����������,�ҵ�������׬Ǯ��</td>
            </tr>
            
          </table></td>
          <td valign="top"><table width="93%" border="0" cellpadding="0" cellspacing="0" style="border-top:1px solid #C0E4FE;">
            <tr>
              <td height="30"><strong>��û�������ʺţ�</strong></td>
              </tr>
            <tr>
              <td height="30">&nbsp;�������ע�ᰴťֻ��1����ע��&nbsp;&nbsp;&nbsp; <img src="/templates/<?php echo Z_TPL?>/images/i4.jpg" width="12" height="11" /> <a href="<?php echo url("?action=findpasswd")?>">�������룿</a></td>
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