<?php

if ( !defined( "IN_ZYADS") )
{
exit( );
}
include( TPL_DIR."/header.php");
echo "\r\n<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" id=\"page\">\r\n  <tr>\r\n    <td><table width=\"95%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#FFFFFF\">\r\n        <tr>\r\n          <td  valign=\"top\">";
if ( $statetype == "success")
{
echo "            <table  border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#FFFFFF\" class=\"success\" id=\"success\" width=\"97%\" >\r\n              <tr>\r\n                <td height=\"30\"><img  src='/templates/";
echo Z_TPL;
echo "/images/ico_success_16.gif' align='absmiddle'><span style=\"margin-left:10px;\">�����ɹ���</span></td>\r\n                <td>&nbsp;</td>\r\n              </tr>\r\n            </table>\r\n            <script language=\"JavaScript\" type=\"text/javascript\">\r\n\t\t\tnoneSuccess();\r\n\t\t\t</script>\r\n            ";
}
echo "            <table width=\"97%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n              <tr>\r\n                <td><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n                    <tr>\r\n                      <td><ul id=\"li-type\">\r\n                          <li><a href=\"do.php?action=";
echo $action;
echo "\" ";
if ( !$actiontype )
{
echo "class=\"li-active\"";
}
echo ">ȫ��</a></li>\r\n                          <li>|</li>\r\n                          <li><a href=\"do.php?action=";
echo $action;
echo "&actiontype=unlock\" ";
if ( $actiontype == "unlock")
{
echo "class=\"li-active\"";
}
echo ">�����</a></li>\r\n                          ";
if ( $action == "affiliate"||$action == "advertiser")
{
echo "                          <li>|</li>\r\n                          <li><a href=\"do.php?action=";
echo $action;
echo "&actiontype=waitact\" ";
if ( $actiontype == "waitact")
{
echo "class=\"li-active\"";
}
echo ">�ȴ����</a> </li>\r\n                          ";
}
echo "                          <li>|</li>\r\n                          <li><a href=\"do.php?action=";
echo $action;
echo "&actiontype=lock\" ";
if ( $actiontype == "lock")
{
echo "class=\"li-active\"";
}
echo ">������</a></li>\r\n                        </ul></td>\r\n                      <td width=\"500\" align=\"right\">";
if ( $_SESSION['adminusertype'] == "1")
{
echo "                        <ul id=\"li-type\">\r\n                          <li><span style='font-size:14px; color:#FF0000;font-weight: bold;padding-right: 30px;padding-left: 120px;'><font color='blue'>δ����:</font>��";
echo abs( $sumpay );
echo " </span> <span style='font-size:14px; color:#FF0000;font-weight: bold;padding-right: 10px;'><font color='blue'>�ɽ���:</font>��";
echo abs( $sumpayok );
echo "</span> </li>\r\n                        </ul>\r\n                        ";
}
echo "</td>\r\n                    </tr>\r\n                  </table></td>\r\n              </tr>\r\n              <tr>\r\n                <td height=\"50\"><select name=\"\" class=\"select\" onchange=\"\$i('choosetype').value=this.value\">\r\n                    <option>��������</option>\r\n                    <option value=\"unlock\">����</option>\r\n                    <option value=\"lock\">����</option>\r\n                    <option value=\"del\">ɾ��</option>\r\n                  </select>\r\n                  <input type=\"button\" name=\"Submit\" value=\"�ύ\" class=\"submit-x\" onclick=\"choose();\"/>\r\n                  &nbsp;\r\n                  &nbsp;\r\n                  ";
if ( $action == "affiliate"||$action == "advertiser")
{
echo "                  <form action=\"?action=";
echo $action;
echo "\" method=\"post\">\r\n                    <input name=\"actiontype\" type=\"hidden\" value=\"";
echo $actiontype;
echo "\" />\r\n                    <select name=\"sortingm\" class=\"select\" id=\"sortingm\">\r\n                      <option value=\"DESC\" ";
if ( $sortingm == "DESC")
{
echo "selected";
}
echo " >����</option>\r\n                      <option value=\"ASC\" ";
if ( $sortingm == "ASC")
{
echo "selected";
}
echo " >����</option>\r\n                    </select>\r\n                    <select name=\"sortingtype\" class=\"select\" id=\"sortingtype\">\r\n                      <option value=\"money\" ";
if ( $sortingtype == "money")
{
echo "selected";
}
echo ">�����</option>\r\n                      ";
if ( $action != "advertiser")
{
echo "                      <option value=\"daymoney\" ";
if ( $sortingtype == "daymoney")
{
echo "selected";
}
echo ">�����</option>\r\n                      <option value=\"weekmoney\" ";
if ( $sortingtype == "weekmoney")
{
echo "selected";
}
echo ">�����</option>\r\n                      <option value=\"monthmoney\" ";
if ( $sortingtype == "monthmoney")
{
echo "selected";
}
echo ">�����</option>\r\n                      <option value=\"xmoney\" ";
if ( $sortingtype == "xmoney")
{
echo "selected";
}
echo ">���߽��</option>\r\n                      <option value=\"cpcdeduction\" ";
if ( $sortingtype == "cpcdeduction")
{
echo "selected";
}
echo ">�������</option>\r\n                      <option value=\"cpmdeduction\" ";
if ( $sortingtype == "cpmdeduction")
{
echo "selected";
}
echo ">��������</option>\r\n                      <option value=\"cpadeduction\" ";
if ( $sortingtype == "cpadeduction")
{
echo "selected";
}
echo ">ע�����</option>\r\n                      <option value=\"cpsdeduction\" ";
if ( $sortingtype == "cpsdeduction")
{
echo "selected";
}
echo ">���ۿ���</option>\r\n                      <option value=\"cpvdeduction ";
if ( $sortingtype == "cpvdeduction")
{
echo "selected";
}
echo "\">չʾ����</option>\r\n                      ";
}
echo "                    </select>\r\n                    <input type=\"Submit\" name=\"Submit2\" value=\"����\" class=\"submit-x\"  />\r\n                  </form>\r\n                  <form action=\"?action=";
echo $action;
echo "&actiontype=search\" method=\"post\">\r\n                    <input name=\"searchval\" type=\"text\" class=\"reg\" id=\"userval\" value=\"";
echo $searchval;
echo "\" size=\"20\" />\r\n                    <select name=\"searchtype\">\r\n                      <option value=\"1\" ";
if ( $searchtype == "1")
{
echo "selected";
}
echo ">��Ա����</option>\r\n                      <option value=\"2\" ";
if ( $searchtype == "2")
{
echo "selected";
}
echo ">��ԱID</option>\r\n\t\t\t\t\t  ";
if ( $action == "affiliate")
{
echo "                      <option value=\"4\" ";
if ( $searchtype == "4")
{
echo "selected";
}
echo ">���ڿͷ�</option>\r\n\t\t\t\t\t   <option value=\"6\" ";
if ( $searchtype == "6")
{
echo "selected";
}
echo ">�տ���</option>\r\n                      ";
}
echo "\t\t\t\t\t  ";
if ( $action == "advertiser")
{
echo "                      <option value=\"5\" ";
if ( $searchtype == "5")
{
echo "selected";
}
echo ">��������</option>\r\n                      ";
}
echo "                      ";
if ( $action != "advertiser")
{
echo "                      <option value=\"3\" ";
if ( $searchtype == "3")
{
echo "selected";
}
echo ">��ѯ����</option>\r\n                      ";
}
echo "                    </select>\r\n                    <input type=\"submit\" name=\"Submit22\" value=\"����\" class=\"submit-x\"/>\r\n                  </form>\r\n                  ";
}
echo "                </td>\r\n              </tr>\r\n              <tr>\r\n                <td><form id=\"form\" name=\"form\" method=\"post\" action=\"do.php?action=";
echo $action;
echo "&actiontype=postchoose\">\r\n                    <input name=\"choosetype\"  id=\"choosetype\"  type=\"hidden\" value=\"\" />\r\n                    ";
if ( $action == "affiliate")
{
echo "                    <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" style=\"border:0px #DFDFDF solid\">\r\n                      <tr class=\"td_b_2\">\r\n                        <td width=\"5\" height=\"33\" class=\"td_b_l\" >&nbsp;</td>\r\n                        <td width=\"30\"><input type=\"checkbox\" name=\"chkall\" onclick=\"checkall(this.form, 'uid')\" /></td>\r\n                        <td width=\"60\">Uid</td>\r\n                        <td width=\"100\">�û���</td>\r\n                        <td width=\"75\">�����</td>\r\n                        <td width=\"75\">�����</td>\r\n                        <td width=\"75\">�����</td>\r\n                        <td width=\"75\">�����</td>\r\n                        <td width=\"75\">�������</td>\r\n                        <td width=\"80\">���û���</td>\r\n                        <td width=\"80\">����</td>\r\n                        <td width=\"60\">����ֵ</td>\r\n                        <td width=\"60\">״̬</td>\r\n                        <td>����¼</td>\r\n                        <th width=\"6\" class=\"td_b_3\" >&nbsp;</th>\r\n                      </tr>\r\n                      ";
foreach ( ( array )$users as $u )
{
if ( $u['cpcdeduction'] != 0 ||$u['cpmdeduction'] != 0 ||$u['cpadeduction'] != 0 ||$u['cpsdeduction'] != 0 ||$u['cpvdeduction'] != 0 )
{
$koudian = $u['cpcdeduction'].",".$u['cpmdeduction'].",".$u['cpadeduction'].",".$u['cpsdeduction'].",".$u['cpvdeduction'];
}
else
{
$koudian = "ȫ��";
}
echo "                      <tr onmouseover=\"\$('#e_";
echo $u['uid'];
echo "').show()\" onmouseout=\"\$('#e_";
echo $u['uid'];
echo "').hide()\">\r\n                        <td height=\"30\"  class=\"td_b_4\" id=\"b-bottom\" >&nbsp;</td>\r\n                        <td  ><input name=\"uid[]\" type=\"checkbox\" id=\"uid[]\" value=\"";
echo $u['uid'];
echo "\" /></td>\r\n                        <td><a href=\"do.php?action=userlogin&uid=";
echo $u['uid'];
echo "\" title=\"��ת����Ա�����̨\" target=\"_blank\">";
echo $u['uid'];
echo "</a></td>\r\n                        <td><strong>";
echo $u['username'];
echo "</strong></td>\r\n                        <td>";
echo round( $u['money'],2 );
echo "</td>\r\n                        <td>";
echo round( $u['daymoney'],2 );
echo "</td>\r\n                        <td>";
echo round( $u['weekmoney'],2 );
echo "</td>\r\n                        <td>";
echo round( $u['monthmoney'],2 );
echo "</td>\r\n                        <td>";
echo round( $u['xmoney'],2 );
echo "</td>\r\n                        <td>";
echo $u['integral'];
echo "</td>\r\n                        <td>";
echo $koudian;
echo "</td>\r\n                        <td>";
echo $u['pvstep'];
echo "</td>\r\n                        <td>";
if ( $u['status'] == 0 )
{
echo "<font color=\"ff0000\">����</font>";
}
if ( $u['status'] == 1 )
{
echo "<font color=\"ff0000\">�ʼ�����</font>";
}
if ( $u['status'] == 2 )
{
echo "<font color=\"\">�</font>";
}
if ( $u['status'] == 3 )
{
echo "<font color=\"ff0000\">�ܾ�</font>";
}
if ( $u['status'] == 4 )
{
echo "<font color=\"ff0000\">����</font>";
}
echo "</td>\r\n                        <td>";
echo $u['logintime'] == ""?"δ����": substr( $u['logintime'],0,10 );
echo "</td>\r\n                        <td width=\"6\" class=\"td_b_5\">&nbsp;</td>\r\n                      </tr>\r\n                      <tr  class=\"td_b_m\" onmouseover=\"\$('#e_";
echo $u['uid'];
echo "').show()\" onmouseout=\"\$('#e_";
echo $u['uid'];
echo "').hide()\">\r\n                        <td height=\"25\"  class=\"td_b_4\" >&nbsp;</td>\r\n                        <td>&nbsp;\r\n                          ";
if ( TIMES -604800 <strtotime( $u['logintime'] ) )
{
echo "                          <img  src='/templates/";
echo Z_TPL;
echo "/images/active.png' align='absmiddle' alt=\"��Ծ\" />\r\n                          ";
}
else
{
echo "                          <img  src='/templates/";
echo Z_TPL;
echo "/images/inactive.png' align='absmiddle' alt=\"�ǻ�Ծ\" />\r\n                          ";
}
echo "                        </td>\r\n                        <td>&nbsp;</td>\r\n                        <td colspan=\"11\"><span style=\"display:none\" id=\"e_";
echo $u['uid'];
echo "\"><a href=\"dos.php?action=";
echo $action;
echo "&actiontype=editusers&uid=";
echo $u['uid'];
echo "\" title=\"�༭�����Ա\">�༭</a> | <a href=\"do.php?action=";
echo $action;
echo "&actiontype=postchoose&choosetype=unlock&uid[]=";
echo $u['uid'];
echo "\" title=\"���������Ա\"  onclick=\"return activate()\">����</a> | <a href=\"do.php?action=";
echo $action;
echo "&actiontype=postchoose&choosetype=lock&uid[]=";
echo $u['uid'];
echo "\" title=\"���������Ա\" onclick=\"return locks(";
echo $u['uid'];
echo ")\">����<a/> | <a title=\"ɾ�������Ա\" href=\"do.php?action=";
echo $action;
echo "&actiontype=postchoose&choosetype=del&uid[]=";
echo $u['uid'];
echo "\" onclick=\"if ( confirm('����ɾ�������Ա��";
echo $u['username'];
echo "��\\n��ȷ��ô��') ) { return true;}return false;\">ɾ��</a> | <a href=\"dos.php?action=onlinepay&actiontype=add&username=";
echo $u['username'];
echo "&type=";
echo $u['type'];
echo "&TB_iframe=true&height=260&width=600\"  title=\"�ֶ���ֵ\"   class=\"thickbox\" >��/�ۿ���</a> | <a href=\"do.php?action=statsuser&actiontype=search&searchtype=1&searchval=";
echo $u['uid'];
echo "&timerange=a\" title=\"�鿴\" >����</a> | <a href=\"do.php?action=site&actiontype=search&searchtype=2&searchval=";
echo $u['uid'];
echo "\" title=\"�鿴\" >��վ</a> | <a href=\"do.php?action=zone&actiontype=search&searchtype=2&searchval=";
echo $u['uid'];
echo "\" title=\"�鿴\" >���λ</a> | <a href=\"do.php?action=pm&actiontype=add&username=";
echo $u['username'];
echo "&TB_iframe=true&height=250&width=600\" title=\"������Ϣ\" class=\"thickbox\">���Ͷ���</a> | <a href=\"do.php?action=email&username=";
echo $u['username'];
echo "\" title=\"�����ʼ�\" target=\"_blank\" >�����ʼ�</a> | <a href=\"dos.php?action=trend&actiontype=dayadnweek&searchtype=2&searchval=";
echo $u['uid'];
echo "&timerange=w&TB_iframe=true&height=300&width=700\"  title=\"��";
echo $u['username']."";
echo "�������һ��������ͼ\"   class=\"thickbox\" >һ��������ͼ</a>&nbsp;|&nbsp;<a href=\"do.php?action=trend&actiontype=trendarea&searchtype=2&searchval=";
echo $u['uid'];
echo "&timerange=w&TB_iframe=true&height=300&width=700\"  title=\"��";
echo $u['username']."";
echo "���ĵ����ֲ�\"   class=\"thickbox\" >�����ֲ�</a>&nbsp;|&nbsp;<a href=\"do.php?action=";
echo $action;
echo "&actiontype=editdeduction&uid=";
echo $u['uid'];
echo "&TB_iframe=true&height=360&width=560\"  title=\"��";
echo $u['username']."";
echo "�����������\"   class=\"thickbox\" >����������</a></span>&nbsp;</span></td>\r\n                        <td  class=\"td_b_5\">&nbsp;</td>\r\n                      </tr>\r\n                      ";
}
echo "                      <tr class=\"td_b_7\">\r\n                        <td height=\"33\"  class=\"td_b_6\" >&nbsp;</td>\r\n                        <td  ><input type=\"checkbox\" name=\"chkallde\" onclick=\"checkall(this.form, 'uid','chkallde')\" /></td>\r\n                        <td>Uid</td>\r\n                        <td>�û���</td>\r\n                        <td>�����</td>\r\n                        <td>�����</td>\r\n                        <td>�����</td>\r\n                        <td>�����</td>\r\n                        <td>�������</td>\r\n                        <td>���û���</td>\r\n                        <td>����</td>\r\n                        <td>����ֵ</td>\r\n                        <td>״̬</td>\r\n                        <td>&nbsp;</td>\r\n                        <td width=\"6\"  class=\"td_b_8\">&nbsp;</td>\r\n                      </tr>\r\n                    </table>\r\n                    ";
}
if ( $action == "advertiser")
{
echo "                    <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" style=\"border:0px #DFDFDF solid\">\r\n                      <tr class=\"td_b_2\">\r\n                        <td width=\"5\" height=\"33\" class=\"td_b_l\" >&nbsp;</td>\r\n                        <td width=\"30\"><input type=\"checkbox\" name=\"chkall\" onclick=\"checkall(this.form, 'uid')\" /></td>\r\n                        <td width=\"60\">Uid</td>\r\n                        <td width=\"100\">�û���</td>\r\n                        <td width=\"75\">���</td>\r\n                        <td width=\"75\">��ϵ��</td>\r\n                        <td width=\"85\">Email</td>\r\n                        <td width=\"100\">�绰</td>\r\n                        <td width=\"95\">�ֻ�</td>\r\n                        <td width=\"85\">QQ</td>\r\n                        <td width=\"60\">״̬</td>\r\n                        <td>&nbsp;</td>\r\n                        <th width=\"6\" class=\"td_b_3\" >&nbsp;</th>\r\n                      </tr>\r\n                      ";
foreach ( ( array )$users as $u )
{
echo "                      <tr onmouseover=\"\$('#e_";
echo $u['uid'];
echo "').show()\" onmouseout=\"\$('#e_";
echo $u['uid'];
echo "').hide()\">\r\n                        <td height=\"30\"  class=\"td_b_4\" id=\"b-bottom\" >&nbsp;</td>\r\n                        <td  ><input name=\"uid[]\" type=\"checkbox\" id=\"uid[]\" value=\"";
echo $u['uid'];
echo "\" /></td>\r\n                        <td><a href=\"do.php?action=userlogin&uid=";
echo $u['uid'];
echo "\" title=\"��ת����Ա�����̨\" target=\"_blank\">";
echo $u['uid'];
echo "</a></td>\r\n                        <td><strong>";
echo $u['username'];
echo "</strong></td>\r\n                        <td>";
echo round( $u['money'],2 );
echo "</td>\r\n                        <td>";
echo $u['contact'];
echo "</td>\r\n                        <td>";
echo $u['email'];
echo "</td>\r\n                        <td>";
echo $u['tel'];
echo "</td>\r\n                        <td>";
echo $u['mobile'];
echo "</td>\r\n                        <td>";
echo $u['qq'];
echo "</td>\r\n                        <td>";
if ( $u['status'] == 0 )
{
echo "<font color=\"ff0000\">����</font>";
}
if ( $u['status'] == 1 )
{
echo "<font color=\"ff0000\">�ʼ�����</font>";
}
if ( $u['status'] == 2 )
{
echo "<font color=\"\">�</font>";
}
if ( $u['status'] == 3 )
{
echo "<font color=\"ff0000\">�ܾ�</font>";
}
if ( $u['status'] == 4 )
{
echo "<font color=\"ff0000\">����</font>";
}
echo "</td>\r\n                        <td>������</td>\r\n                        <td width=\"6\" class=\"td_b_5\">&nbsp;</td>\r\n                      </tr>\r\n                      <tr  class=\"td_b_m\" onmouseover=\"\$('#e_";
echo $u['uid'];
echo "').show()\" onmouseout=\"\$('#e_";
echo $u['uid'];
echo "').hide()\">\r\n                        <td height=\"25\"  class=\"td_b_4\" >&nbsp;</td>\r\n                        <td  >&nbsp;\r\n                          ";
if ( TIMES -604800 <strtotime( $u['logintime'] ) )
{
echo "                          <img  src='/templates/";
echo Z_TPL;
echo "/images/active.png' align='absmiddle' alt=\"��Ծ\" />\r\n                          ";
}
else
{
echo "                          <img  src='/templates/";
echo Z_TPL;
echo "/images/inactive.png' align='absmiddle' alt=\"�ǻ�Ծ\" />\r\n                          ";
}
echo "</td>\r\n                        <td>&nbsp;</td>\r\n                        <td colspan=\"7\" ><span style=\"display:none\" id=\"e_";
echo $u['uid'];
echo "\"><a href=\"dos.php?action=";
echo $action;
echo "&actiontype=editusers&uid=";
echo $u['uid'];
echo "\" title=\"�༭�����Ա\">�༭</a> | <a href=\"do.php?action=";
echo $action;
echo "&actiontype=postchoose&choosetype=unlock&uid[]=";
echo $u['uid'];
echo "\" title=\"���������Ա\"  onclick=\"return activate()\">����</a> | <a href=\"do.php?action=";
echo $action;
echo "&actiontype=postchoose&choosetype=lock&uid[]=";
echo $u['uid'];
echo "\" title=\"���������Ա\" onclick=\"if ( confirm('�������������Ա��";
echo $u['username'];
echo "��\\n��ȷ��ô��') ) { return true;}return false;\">����<a/> | <a title=\"ɾ�������Ա\" href=\"do.php?action=";
echo $action;
echo "&actiontype=postchoose&choosetype=del&uid[]=";
echo $u['uid'];
echo "\" onclick=\"if ( confirm('����ɾ�������Ա��";
echo $u['username'];
echo "��\\n��ȷ��ô��') ) { return true;}return false;\">ɾ��</a> | <a href=\"do.php?action=onlinepay&actiontype=add&username=";
echo $u['username'];
echo "&type=";
echo $u['type'];
echo "=&TB_iframe=true&height=260&width=600\"  title=\"�ֶ���ֵ\"   class=\"thickbox\" >��/�ۿ���</a> | <a href=\"do.php?action=plan&actiontype=search&searchtype=3&searchval=";
echo $u['uid'];
echo "\" title=\"�鿴\" >���ƻ�</a> | <a href=\"do.php?action=createplan&uid=";
echo $u['uid'];
echo "\" title=\"�½��ƻ�\" >  �½��ƻ�</a>  | <a href=\"do.php?action=ads&actiontype=search&searchtype=3&searchval=";
echo $u['uid'];
echo "\" title=\"�鿴\" >���</a> | <a href=\"do.php?action=pm&actiontype=add&username=";
echo $u['username'];
echo "&TB_iframe=true&height=250&width=600\" title=\"������Ϣ\" class=\"thickbox\">���Ͷ���</a> | <a href=\"do.php?action=users&actiontype=editusers&usertype=&uid=";
echo $u['uid'];
echo "\" title=\"�鿴\" >�����ʼ�</a></span>&nbsp;</td>\r\n                        <td colspan=\"2\" align=\"right\">";
echo $u['logintime'] == ""?"δ����": substr( $u['logintime'],0,10 );
echo "</td>\r\n                        <td  class=\"td_b_5\">&nbsp;</td>\r\n                      </tr>\r\n                      ";
}
echo "                      <tr class=\"td_b_7\">\r\n                        <td height=\"33\"  class=\"td_b_6\" >&nbsp;</td>\r\n                        <td  ><input type=\"checkbox\" name=\"chkallde\" onclick=\"checkall(this.form, 'uid','chkallde')\" /></td>\r\n                        <td>Uid</td>\r\n                        <td>�û���</td>\r\n                        <td>���</td>\r\n                        <td>��ϵ��</td>\r\n                        <td>Email</td>\r\n                        <td>�绰</td>\r\n                        <td>�ֻ�</td>\r\n                        <td>QQ</td>\r\n                        <td>״̬</td>\r\n                        <td>&nbsp;</td>\r\n                        <td width=\"6\"  class=\"td_b_8\">&nbsp;</td>\r\n                      </tr>\r\n                    </table>\r\n                    ";
}
if ( $action == "service"||$action == "commercial")
{
echo "                    <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" style=\"border:0px #DFDFDF solid\">\r\n                      <tr class=\"td_b_2\">\r\n                        <td width=\"5\" height=\"33\" class=\"td_b_l\" >&nbsp;</td>\r\n                        <td width=\"30\"><input type=\"checkbox\" name=\"chkall\" onclick=\"checkall(this.form, 'uid')\" /></td>\r\n                        <td width=\"60\">Uid</td>\r\n                        <td width=\"100\">�û�����</td>\r\n                        <td width=\"80\">��ϵ��</td>\r\n                        <td width=\"95\">QQ</td>\r\n                        <td width=\"90\">ҵ��</td>\r\n                        <td width=\"50\">��Ծ</td>\r\n                        <td width=\"180\">����</td>\r\n                        <td width=\"60\">״̬</td>\r\n                        <td>������</td>\r\n                        <th width=\"6\" class=\"td_b_3\" >&nbsp;</th>\r\n                      </tr>\r\n                      ";
foreach ( ( array )$users as $u )
{
if ( $action == "service")
{
$s = $statsmodel->sumpayusers( $u['uid'] );
}
if ( $action == "commercial")
{
$s = $statsmodel->sumadvpay( $u['uid'] );
}
echo "                      <tr onmouseover=\"\$('#e_";
echo $u['uid'];
echo "').show()\" onmouseout=\"\$('#e_";
echo $u['uid'];
echo "').hide()\">\r\n                        <td height=\"30\"  class=\"td_b_4\" id=\"b-bottom\" >&nbsp;</td>\r\n                        <td  ><input name=\"uid[]\" type=\"checkbox\" id=\"uid[]\" value=\"";
echo $u['uid'];
echo "\" /></td>\r\n                        <td>\r\n\t\t\t\t\t\t";
if ( $action == "service")
{
echo "\t\t\t\t\t\t<a href=\"do.php?action=userlogin&uid=";
echo $u['uid'];
echo "\" title=\"��ת����Ա�����̨\" target=\"_blank\">";
echo $u['uid'];
echo "</a>\r\n\t\t\t\t\t\t";
}
echo "\t\t\t\t\t\t";
if ( $action == "commercial")
{
echo "\t\t\t\t\t\t<a href=\"do.php?action=userlogin&uid=";
echo $u['uid'];
echo "\" title=\"��ת����Ա�����̨\" target=\"_blank\">";
echo $u['uid'];
echo "</a>\r\n\t\t\t\t\t\t";
}
echo "\t\t\t\t\t\t</td>\r\n                        <td><strong>";
echo $u['username'];
echo "</strong></td>\r\n                        <td>";
echo $u['contact'];
echo "</td>\r\n                        <td>";
echo $u['qq'];
echo "</td>\r\n                        <td>";
echo abs( $s['pay'] );
echo "</td>\r\n                        <td>&nbsp;\r\n                          ";
if ( TIMES -259200 <strtotime( $u['logintime'] ) )
{
echo "                          <img  src='/templates/";
echo Z_TPL;
echo "/images/active.png' align='absmiddle' alt=\"��Ծ\" />\r\n                          ";
}
else
{
echo "                          <img  src='/templates/";
echo Z_TPL;
echo "/images/inactive.png' align='absmiddle' alt=\"�ǻ�Ծ\" />\r\n                          ";
}
echo "</td>\r\n                        <td><a href=\"dos.php?action=";
echo $action;
echo "&actiontype=editusers&uid=";
echo $u['uid'];
echo "\" title=\"�༭�����Ա\">�༭</a> | <a href=\"do.php?action=";
echo $action;
echo "&actiontype=postchoose&choosetype=unlock&uid[]=";
echo $u['uid'];
echo "\" title=\"���������Ա\">����</a> | <a href=\"do.php?action=";
echo $action;
echo "&actiontype=postchoose&choosetype=lock&uid[]=";
echo $u['uid'];
echo "\" title=\"���������Ա\">����<a/> | <a title=\"ɾ�������Ա\" href=\"do.php?action=";
echo $action;
echo "&actiontype=postchoose&choosetype=del&uid[]=";
echo $u['uid'];
echo "\" onclick=\"if ( confirm('����ɾ�������Ա��";
echo $u['username'];
echo "��\\n��ȷ��ô��') ) { return true;}return false;\">ɾ��</a> | \r\n\t\t\t\t\t\t";
if ( $action == "service")
{
echo "\t\t\t\t\t\t<a href=\"do.php?action=affiliate&actiontype=search&searchval=";
echo $u['uid'];
echo "&searchtype=4\">�ҵĻ�Ա</a>\r\n\t\t\t\t\t\t";
}
echo "\t\t\t\t\t\t";
if ( $action == "commercial")
{
echo "\t\t\t\t\t\t<a href=\"do.php?action=advertiser&actiontype=search&searchval=";
echo $u['uid'];
echo "&searchtype=5\">�ҵĹ����</a>\r\n\t\t\t\t\t\t";
}
echo "\t\t\t\t\t    </td>\r\n                        <td>";
if ( $u['status'] == 2 )
{
echo "<font color=\"\">�</font>";
}
if ( $u['status'] == 3 )
{
echo "<font color=\"ff0000\">�ܾ�</font>";
}
if ( $u['status'] == 4 )
{
echo "<font color=\"ff0000\">����</font>";
}
echo "</td>\r\n                        <td>";
echo $u['logintime'] == ""?"δ����": $u['logintime'];
echo "</td>\r\n                        <td width=\"6\" class=\"td_b_5\">&nbsp;</td>\r\n                      </tr>\r\n                      ";
}
echo "                      <tr class=\"td_b_7\">\r\n                        <td height=\"33\"  class=\"td_b_6\" >&nbsp;</td>\r\n                        <td  ><input type=\"checkbox\" name=\"chkallde\" onclick=\"checkall(this.form, 'uid','chkallde')\" /></td>\r\n                        <td>Uid</td>\r\n                        <td>�û�����</td>\r\n                        <td>��ϵ��</td>\r\n                        <td>QQ</td>\r\n                        <td>ҵ��</td>\r\n                        <td>��Ծ</td>\r\n                        <td>&nbsp;</td>\r\n                        <td>״̬</td>\r\n                        <td>������</td>\r\n                        <td width=\"6\"  class=\"td_b_8\">&nbsp;</td>\r\n                      </tr>\r\n                    </table>\r\n                    ";
}
echo "                  </form></td>\r\n              </tr>\r\n              <tr>\r\n                <td height=\"50\"><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n                    <tr>\r\n                      <td width=\"200\"><select name=\"select\" class=\"select\" onchange=\"\$i('choosetype').value=this.value\">\r\n                          <option>��������</option>\r\n                          <option value=\"unlock\">����</option>\r\n                          <option value=\"lock\">����</option>\r\n                          <option value=\"del\">ɾ��</option>\r\n                        </select>\r\n                        <input type=\"button\" name=\"Submit3\" value=\"�ύ\" class=\"submit-x\" onclick=\"choose();\"/></td>\r\n                      <td align=\"right\">";
echo $viewpage;
echo "</td>\r\n                    </tr>\r\n                  </table></td>\r\n              </tr>\r\n            </table></td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n</table>\r\n<script language=\"JavaScript\" type=\"text/javascript\">\r\nfunction choose(){\r\n\tvar v = \$i(\"choosetype\").value;\r\n\tvar t='';\r\n    if(v == 'del') t = 'ɾ��';\t\r\n\tif(v == 'unlock')  t= '����';\r\n\tif(v == 'lock') t = '����';\r\n\tif(t=='') {alert('����ѡ��δѡ��');return false }\t\r\n\tvar numchecked = getNumChecked('form');\r\n\tif(numchecked < 1) { alert('��ѡ����Ҫ�����Ļ�Ա'); return false }\t\r\n\tif(!v)return false;\r\n\tif(confirm('��ȷ��Ҫ'+ t +'��' + numchecked + '����Ա����\\n�㡰ȷ�ϡ�'+ t +'���㡰ȡ����ȡ��������')){\r\n\t\t";
if ( in_array( "useractivate",explode( ",",$GLOBALS['C_ZYIIS']['tomail'] ) ) )
{
echo "\t\tif(v == 'unlock') addLoading('���ڷ����ʼ�...');\r\n\t\t";
}
echo "\t\tthis.document.form.submit();\r\n\t\treturn true;\r\n\t}\r\n\treturn false;\r\n}\r\nfunction activate(){\r\n\tvar psub=confirm(\"ȷ�ϼ���ô��\");\r\n\tif(psub){\r\n\t\t";
if ( in_array( "useractivate",explode( ",",$GLOBALS['C_ZYIIS']['tomail'] ) ) )
{
echo "\t\t\taddLoading('���ڷ����ʼ�...');\r\n\t\t";
}
echo "\t}else{\r\n\t\treturn false;\r\n\t}\r\n}\r\nfunction locks(uid){\r\n\tvar psub=confirm(\"���׻�Աô��\\n�������Ա����Ϣ�ύ�����׹ٷ���������\\n�㡰ȷ��[�Ƽ�]���ύ���㡰ȡ�������ύ��\");\r\n\tif(psub){\r\n\t\t\$.post(\"do.php?action=lockusertozy\",{ \"uid\": uid}, function(data){\r\n\t\t\tif(data == 'ok') {\r\n\t\t\t\talert('��л�����ύ');\r\n\t\t\t\tdocument.location.reload();\r\n\t\t\t}\r\n\t\t\telse {\r\n\t\t\t \talert('�ύʧ��');\r\n\t\t\t}\r\n\t\t})\r\n\t\treturn false;\r\n\t} \r\n}\r\nfunction doRemoveWin(){\r\n\ttb_remove();\r\n\twindow.location.href = \"";
echo $reurl;
echo "\";\r\n}\r\n</script>\r\n";
include( TPL_DIR."/footer.php");

?>