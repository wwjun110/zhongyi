<?php

if ( !defined( "IN_ZYADS") )
{
exit( );
}
include( TPL_DIR."/header.php");
echo "\r\n<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" id=\"page\">\r\n  <tr>\r\n    <td><table width=\"95%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#FFFFFF\">\r\n        <tr>\r\n          <td><table width=\"90%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n              <tr>\r\n                <td><table width=\"97%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n                    <tr>\r\n                      <td height=\"10\" align=\"center\">&nbsp;</td>\r\n                      <td class=\"f16\">&nbsp;</td>\r\n                      <td width=\"100\" class=\"f16\">&nbsp;</td>\r\n                    </tr>\r\n                    <tr>\r\n                      <td width=\"40\" height=\"50\"><img src=\"/templates/";
echo Z_TPL;
echo "/images/edit.jpg\" border=\"0\" /></td>\r\n                      <td class=\"f16\">�༭</td>\r\n                      <td class=\"f16\"><a href=\"\" onclick=\"javascript:history.go(-1);return false;\">������һҳ</a></td>\r\n                    </tr>\r\n                  </table></td>\r\n              </tr>\r\n              <tr>\r\n                <td>";
if ( $statetype == "success")
{
echo "                  <table  border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#FFFFFF\" class=\"success\" id=\"success\" width=\"97%\" >\r\n                    <tr>\r\n                      <td height=\"30\"><img  src='/templates/";
echo Z_TPL;
echo "/images/ico_success_16.gif' align='absmiddle' /><span style=\"margin-left:10px;\">�����ɹ���</span></td>\r\n                      <td>&nbsp;</td>\r\n                    </tr>\r\n                  </table>\r\n                  <script language=\"JavaScript\" type=\"text/javascript\">\r\n\t\t\t\t\tnoneSuccess();\r\n\t\t\t\t  </script>\r\n                  ";
}
echo "<script>function checkform(frm){ var advprice = parseFloat(frm.advprice.value); if (advprice>0.006) { alert(\"��վ���ĵ��۲��ܴ���0.006\"); frm.advprice.focus(); return false;} }</script>                  <form action=\"dos.php?action=";
echo $action;
echo "&actiontype=postupusers\" method=\"post\" name=\"uform\" id=\"uform\" onsubmit=\"return checkform(this)\" />\r\n                    <input type=\"hidden\" name=\"uid\" value=\"";
echo $users['uid'];
echo "\" />\r\n                    <table width=\"97%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\"  class=\"s-edit\">\r\n                      <tr>\r\n                        <th colspan=\"2\" align=\"left\" class=\"cpt\">������Ϣ</th>\r\n                      </tr>\r\n                      <tr>\r\n                        <td >��ԱID</td>\r\n                        <td width=\"85%\" >";
echo $users['uid'];
echo "</td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td >��Ա����</td>\r\n                        <td >";
echo $users['username'];
echo "</td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td >�˻����</td>\r\n                        <td >��\r\n                          ";
if ( $users['type'] == "1")
{
echo round( $users['daymoney'] +$users['weekmoney'] +$users['monthmoney'],2 );
}
else
{
echo round( $users['money'],2 );
}
echo "</td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td >��Ա��ɫ</td>\r\n                        <td >\r\n\t\t\t\t\t\t";
if ( $users['type'] == "1")
{
echo "��վ��";
}
else if ( $users['type'] == "2")
{
echo "�����";
}
else if ( $users['type'] == "3")
{
echo "���˿ͷ�";
}
else if ( $users['type'] == "4")
{
echo "��������";
}
echo "</td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td >��Ա����</td>\r\n                        <td ><input name=\"pwdpwd\" type=\"password\" id=\"pwdpwd\" size=\"20\" class=\"text\"/>\r\n                            <span class=\"f12i\">���޸Ĳ�����д</span></td>\r\n                      </tr>\r\n\t\t\t\t\t  <tr>\r\n                        <td valign=\"top\" >��Ա״̬</td>\r\n                        <td >";
if ( $users['status'] == 0 )
{
echo "<font color=\"ff0000\">ע�����</font>";
}
if ( $users['status'] == 1 )
{
echo "<font color=\"ff0000\">�ȴ��ʼ�����</font>";
}
if ( $users['status'] == 2 )
{
echo "<font color=\"blue\">�</font>";
}
if ( $users['status'] == 3 )
{
echo "<font color=\"ff0000\">�Ѿܾ�</font>";
}
if ( $users['status'] == 4 )
{
echo "<font color=\"ff0000\">������</font>";
}
echo "                          <select name=\"statustype\" id=\"statustype\">\r\n                            <option value=\"2\" ";
if ( $users['status'] == "2")
{
echo "selected";
}
echo ">�����Ա</option>\r\n                            <option value=\"4\" ";
if ( $users['status'] == "4")
{
echo "selected";
}
echo ">������Ա</option>\r\n                            <option value=\"3\" ";
if ( $users['status'] == "3")
{
echo "selected";
}
echo ">�ܾ���Ա</option>\r\n                          </select>\r\n                          <br />\r\n                          <br />\r\n                          ��ע��\r\n                          <input name=\"userinfo\" type=\"text\"   id=\"userinfo\" size=\"30\"  value=\"";
echo $users['userinfo'];
echo "\" class=\"text\"/>\r\n                          <input type=\"submit\" name=\"Submit3\" value=\" �޸� \" /></td>\r\n                      </tr>\r\n\t\t\t\t\t  \r\n\t\t\t\t\t    ";
if ( $users['type'] == "1")
{
echo "                      <tr>\r\n                        <td valign=\"top\" >���ڿͷ�</td>\r\n                        <td >\r\n\t\t\t\t\t\t<select name=\"serviceid\" id=\"serviceid\" style=\"width:160px;\">\r\n\t\t\t\t\t\t  <option value=\"\">��ѡ��ͷ�</option>\r\n\t\t\t\t\t\t  ";
foreach ( $serviceuser as $s )
{
echo "\t\t\t\t\t\t  <option value=\"";
echo $s['uid'];
echo "\" ";
if ( $users['serviceid'] == $s['uid'] )
{
echo "selected";
}
echo ">";
echo $s['contact'];
echo "</option>\r\n\t\t\t\t\t\t  ";
}
echo "\t\t\t\t\t\t</select>\t\t\t\t\t\t</td>\r\n                      </tr>\r\n\t\t\t\t\t   ";
}
echo "\t\t\t\t\t    ";
if ( $users['type'] == "2")
{
echo "                       <tr>\r\n                        <td valign=\"top\" >��������</td>\r\n                        <td >\r\n\t\t\t\t\t\t<select name=\"serviceid\" id=\"serviceid\" style=\"width:160px;\">\r\n\t\t\t\t\t\t  <option value=\"\">��ѡ������</option>\r\n\t\t\t\t\t\t  ";
foreach ( $serviceuser as $s )
{
echo "\t\t\t\t\t\t  <option value=\"";
echo $s['uid'];
echo "\" ";
if ( $users['serviceid'] == $s['uid'] )
{
echo "selected";
}
echo ">";
echo $s['contact'];
echo "</option>\r\n\t\t\t\t\t\t  ";
}
echo "\t\t\t\t\t\t</select>\t\t\t\t\t\t</td>\r\n                      </tr>\r\n                       ";
}
echo "                      ";
if ( $users['type'] == "1")
{
echo "                      <tr>\r\n                        <th colspan=\"2\" align=\"left\" class=\"cpt\">������Ϣ</th>\r\n                      </tr>\r\n                      <tr>\r\n                        <td  >��������</td>\r\n                        <td align=\"left\" ><select name=\"bank\" class='select'>\r\n                            ";
foreach ( $GLOBALS['GLOBALS']['GLOBALS']['C_Bank'] as $bank =>$val )
{
echo "                            <option value=\"";
echo $val[0];
echo "\" ";
if ( $users['bank'] == $val[0] )
{
echo "selected";
}
echo ">";
echo $bank;
echo "</option>\r\n                            ";
}
echo "                          </select></td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td  >������</td>\r\n                        <td align=\"left\" ><input name=\"bankname\" type=\"text\" id=\"bankname\" value=\"";
echo $users['bankname'];
echo "\" size=\"20\" class=\"text\" /></td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td  >�տ���</td>\r\n                        <td align=\"left\" ><input name=\"accountname\" type=\"text\" id=\"accountname\" value=\"";
echo $users['accountname'];
echo "\" size=\"20\" class=\"text\" /></td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td  >�տ��ʺ�</td>\r\n                        <td align=\"left\" ><input name=\"bankacc\" type=\"text\" id=\"bankacc\" value=\"";
echo $users['bankacc'];
echo "\" class=\"text\" />\r\n                        <input type=\"submit\" name=\"Submit32\" value=\" �޸� \" /></td>\r\n                      </tr>\r\n                      ";
}
echo "                      <tr>\r\n                        <th colspan=\"2\" align=\"left\" class=\"cpt\">��ϵ��Ϣ</th>\r\n                      </tr>\r\n                      <tr>\r\n                        <td >��ϵ��</td>\r\n                        <td ><input name=\"contact\" type=\"text\"  id=\"contact\" value=\"";
echo $users['contact'];
echo "\" class=\"text\" /></td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td >QQ</td>\r\n                        <td ><input name=\"qq\" type=\"text\" id=\"qq\" value=\"";
echo $users['qq'];
echo "\" maxlength=\"11\" class=\"text\" />\r\n                          ";
if ( 4 <$users['qq'] )
{
echo "                          <a href=\"tencent://message/?uin=";
echo $users['qq'];
echo "&Site=&Menu=yes\"><img height=\"16\" border=\"0\" alt=\"";
echo $users['qq'];
echo "\" src=\"http://wpa.qq.com/pa?p=1:";
echo $users['qq'];
echo ":4\"/></a>\r\n                          ";
}
echo "</td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td >E-mail</td>\r\n                        <td ><input name=\"email\" type=\"text\"    id=\"email\" value=\"";
echo $users['email'];
echo "\" maxlength=\"100\"  class=\"text\" /></td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td >�ֻ�</td>\r\n                        <td ><input name=\"mobile\" type=\"text\" id=\"mobile\" value=\"";
echo $users['mobile'];
echo "\" size=\"20\"  class=\"text\" /></td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td ><span class=\"tdtit\">��ϵ�绰</span></td>\r\n                        <td ><input name=\"tel\" type=\"text\"   id=\"tel\" value=\"";
echo $users['tel'];
echo "\" size=\"20\"  class=\"text\" /></td>\r\n                      </tr>\r\n\t\t\t\t\t  \r\n                      <tr>\r\n                        <th colspan=\"2\" align=\"left\" class=\"cpt\">��ȫ��Ϣ</th>\r\n                      </tr>\r\n                      <tr>\r\n                        <td >��ʾ����</td>\r\n                        <td ><input name=\"question\" type=\"text\"    id=\"question\" value=\"";
echo $users['question'];
echo "\" size=\"20\" class=\"text\"/></td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td >�ش�����</td>\r\n                        <td ><input name=\"answer\" type=\"text\"    id=\"answer\" value=\"";
echo $users['answer'];
echo "\" size=\"20\" class=\"text\"/>\r\n                        <input type=\"submit\" name=\"Submit34\" value=\" �޸� \" /></td>\r\n                      </tr>\r\n                      ";
if ( $users['type'] == "1")
{
echo "                      <tr>\r\n                        <th colspan=\"2\" align=\"left\" class=\"cpt\">�������� <span class=\"f12i\" style=\"padding-left:10px; font-weight:normal\">��Ա����������ȫ�ֿ���</span></th>\r\n                      </tr>\r\n                      <tr>\r\n                        <td >�����CPC</td>\r\n                        <td ><input name=\"cpcdeduction\" type=\"text\"  id=\"cpcdeduction\" value=\"";
echo $users['cpcdeduction'];
echo "\" size=\"20\" maxlength=\"3\" class=\"text\"/>\r\n                          % </td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td >������CPM</td>\r\n                        <td ><input name=\"cpmdeduction\" type=\"text\" id=\"cpmdeduction\" value=\"";
echo $users['cpmdeduction'];
echo "\" size=\"20\" maxlength=\"3\" class=\"text\"/>\r\n                          %</td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td >����ע����CPA</td>\r\n                        <td ><input name=\"cpadeduction\" type=\"text\"  id=\"cpadeduction\" value=\"";
echo $users['cpadeduction'];
echo "\" size=\"20\" maxlength=\"3\" class=\"text\"/>\r\n                          %</td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td >���۷ֳ���CPS</td>\r\n                        <td ><input name=\"cpsdeduction\" type=\"text\"   id=\"cpsdeduction\" value=\"";
echo $users['cpsdeduction'];
echo "\" size=\"20\" maxlength=\"3\" class=\"text\"/>\r\n                          %</td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td >չʾ��CPV</td>\r\n                        <td ><input name=\"cpvdeduction\" type=\"text\"  id=\"cpvdeduction\" value=\"";
echo $users['cpvdeduction'];
echo "\" size=\"20\" maxlength=\"3\" class=\"text\"/>\r\n                          %                          </td>\r\n                      </tr>\r\n                      <tr>\r\n                        <th colspan=\"2\" align=\"left\" class=\"cpt\">������� <span class=\"f12i\" style=\"font-weight:normal\">Ĭ��ֵΪ���������е�ֵ</span></th>\r\n                      </tr>\r\n                      <tr>\r\n                        <td >PV����ֵ</td>\r\n                        <td ><input name=\"pvstep\" type=\"text\" class=\"reg\" id=\"pvstep\" value=\"";
echo $users['pvstep'];
echo "\" size=\"20\" maxlength=\"3\" />\r\n                          <span class=\"f12i\">��Ա����ֵ������ȫ�ֲ���ֵ</span></td>\r\n                      </tr>\r\n       ";
echo "<tr><td>��վ������</td><td><input name=\"advprice\" type=\"text\" id=\"advprice\" value=\"".$users['advprice']."\"/>&nbsp;<span class=\"f12i\">��վ���ĵ��۲��ܳ���0.006</span></td></tr>";
echo "<tr ><td >���ظ��Զ���</td><td ><select name=\"cpmpopmode\"><option value=\"1\"";
if ( $users['recpm'] == 1 )
{
echo " selected";
}
echo ">����</option><option value=\"0\"";
if ( $users['recpm'] == 0 )
{
echo " selected";
}
echo ">�ر�</option></select></td></tr>\t<tr>\r\n                        <td>��������</td>\r\n                        <td><input type=\"radio\" name=\"insite\" value=\"1\" ";
if ( $users['insite'] == "1")
{
echo "checked";
}
echo "/>\r\n                          Ĭ��\r\n\t\t\t\t\t\t  <input type=\"radio\" name=\"insite\" value=\"2\"  ";
if ( $users['insite'] == "2")
{
echo "checked";
}
echo "/>\r\n                          ����\r\n                          <input type=\"radio\" name=\"insite\" value=\"3\"  ";
if ( $users['insite'] == "3")
{
echo "checked";
}
echo "/>\r\n                          �ر�</td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td >CPC �Զ�������</td>\r\n                        <td ><input type=\"radio\" name=\"cpczlink\" value=\"1\" ";
if ( $users['cpczlink'] == "1")
{
echo "checked";
}
echo "/>\r\n                          Ĭ��\r\n                          <input type=\"radio\" name=\"cpczlink\" value=\"2\" ";
if ( $users['cpczlink'] == "2")
{
echo "checked";
}
echo "/>\r\n                          ����\r\n                          <input type=\"radio\" name=\"cpczlink\" value=\"3\" ";
if ( $users['cpczlink'] == "3")
{
echo "checked";
}
echo "/>\r\n                          �ر�</td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td >CPM �Զ�������</td>\r\n                        <td ><input type=\"radio\" name=\"cpmzlink\" value=\"1\" ";
if ( $users['cpmzlink'] == "1")
{
echo "checked";
}
echo "/>\r\n                          Ĭ��\r\n                          <input type=\"radio\" name=\"cpmzlink\" value=\"2\" ";
if ( $users['cpmzlink'] == "2")
{
echo "checked";
}
echo "/>\r\n                          ����\r\n                          <input type=\"radio\" name=\"cpmzlink\" value=\"3\" ";
if ( $users['cpmzlink'] == "3")
{
echo "checked";
}
echo "/>\r\n                          �ر� </td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td >CPA �Զ�������</td>\r\n                        <td ><input type=\"radio\" name=\"cpazlink\" value=\"1\" ";
if ( $users['cpazlink'] == "1")
{
echo "checked";
}
echo "/>\r\n                          Ĭ��\r\n                          <input type=\"radio\" name=\"cpazlink\" value=\"2\" ";
if ( $users['cpazlink'] == "2")
{
echo "checked";
}
echo "/>\r\n                          ����\r\n                          <input type=\"radio\" name=\"cpazlink\" value=\"3\" ";
if ( $users['cpazlink'] == "3")
{
echo "checked";
}
echo "/>\r\n                          �ر� </td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td >CPS �Զ�������</td>\r\n                        <td ><input type=\"radio\" name=\"cpszlink\" value=\"1\" ";
if ( $users['cpszlink'] == "1")
{
echo "checked";
}
echo "/>\r\n                          Ĭ��\r\n                          <input type=\"radio\" name=\"cpszlink\" value=\"2\" ";
if ( $users['cpszlink'] == "2")
{
echo "checked";
}
echo "/>\r\n                          ����\r\n                          <input type=\"radio\" name=\"cpszlink\" value=\"3\" ";
if ( $users['cpszlink'] == "3")
{
echo "checked";
}
echo "/>\r\n                          �ر�\r\n                          <input type=\"submit\" name=\"Submit36\" value=\" �޸� \" /></td>\r\n                      </tr>\r\n                      ";
}
echo "                      ";
if ( $users['type'] == "1")
{
echo "                      <tr>\r\n                        <th colspan=\"2\" align=\"left\" class=\"cpt\">������Ϣ</th>\r\n                      </tr>\r\n                      <tr>\r\n                        <td >�Ƽ���</td>\r\n                        <td ><input name=\"recommend\" type=\"text\"  id=\"recommend\" value=\"";
echo $users['recommend'];
echo "\" size=\"20\"   class=\"text\"/></td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td >Ŀǰ�ܹ�����</td>\r\n                        <td >";
echo $sumrecommend;
echo "��</td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td >����20��</td>\r\n                        <td >";
echo $recommenduser;
echo "</td>\r\n                      </tr>\r\n                      <tr>\r\n                        ";
}
echo "                        <th colspan=\"2\" align=\"left\" class=\"cpt\" >������Ϣ</th>\r\n                      </tr>\r\n                      <tr>\r\n                        <td >ע��ʱ��</td>\r\n                        <td >";
echo $users['regtime'];
echo "</td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td >ע��IP</td>\r\n                        <td >";
echo $users['regip'];
echo convertip( $users['regip'] );
echo "</td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td >������ʱ��</td>\r\n                        <td >";
echo $users['logintime'];
echo "</td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td >������IP</td>\r\n                        <td >";
echo $users['loginip'];
echo convertip( $users['loginip'] );
echo "</td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"60\" ><input name=\"submit\" type=\"submit\" class=\"form-submit\" value=\"��������\" onsubmit=\"checkform(this)\" />                        </td>\r\n                        <td >&nbsp;</td>\r\n                      </tr>\r\n                    </table>\r\n                  </form></td>\r\n              </tr>\r\n            </table></td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n</table>\r\n \r\n";
include( TPL_DIR."/footer.php");
?>