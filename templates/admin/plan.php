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
echo "/images/ico_success_16.gif' align='absmiddle' /><span style=\"margin-left:10px;\">�����ɹ���</span></td>\r\n                <td>&nbsp;</td>\r\n              </tr>\r\n            </table>\r\n            <script language=\"JavaScript\" type=\"text/javascript\">\r\n\t\t\tnoneSuccess();\r\n\t\t\t</script>\r\n            ";
}
echo "            <table width=\"97%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n              <tr>\r\n                <td><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n                    <tr>\r\n                      <td><ul id=\"li-type\"> <li style=\"padding-right:10px\"><a href=\"do.php?action=createplan\"><img  src='/templates/";
echo Z_TPL;
echo "/images/add.gif' align='absmiddle' /> <strong>�½��ƻ�</strong></a></li>\r\n                          <li><a href=\"do.php?action=";
echo $action;
echo "\" ";
if ( $status == ""&&$clearing == ""&&$checkplan == ""&&$restrictions == ""&&$audit == "")
{
echo "class=\"li-active\"";
}
echo ">ȫ��</a></li>\r\n                          <li>|</li>\r\n                          <li><a href=\"do.php?action=";
echo $action;
echo "&status=1\" ";
if ( $status == "1")
{
echo "class=\"li-active\"";
}
echo ">��ƻ�</a></li>\r\n\t\t\t\t\t\t  <li>|</li>\r\n                          <li><a href=\"do.php?action=";
echo $action;
echo "&status=0\" ";
if ( $status == "0")
{
echo "class=\"li-active\"";
}
echo ">����ƻ�</a></li>\r\n                          <li>|</li>\r\n                          <li><a href=\"do.php?action=";
echo $action;
echo "&status=2\" ";
if ( $status == "2")
{
echo "class=\"li-active\"";
}
echo ">ֹͣ�ƻ�</a> </li>\r\n\t\t\t\t\t\t  <li>|</li>\r\n                          <li><a href=\"do.php?action=";
echo $action;
echo "&status=3\" ";
if ( $status == "3")
{
echo "class=\"li-active\"";
}
echo ">�޶֧</a> </li>\r\n\t\t\t\t\t\t  <li>|</li>\r\n                          <li><a href=\"do.php?action=";
echo $action;
echo "&status=4\" ";
if ( $status == "4")
{
echo "class=\"li-active\"";
}
echo ">��������</a> </li>\r\n                          <li>|</li>\r\n                          <li><a href=\"do.php?action=";
echo $action;
echo "&clearing=day\" ";
if ( $clearing == "day")
{
echo "class=\"li-active\"";
}
echo ">�ս�ƻ�</a></li>\r\n\t\t\t\t\t\t   <li>|</li>\r\n                          <li><a href=\"do.php?action=";
echo $action;
echo "&clearing=week\" ";
if ( $clearing == "week")
{
echo "class=\"li-active\"";
}
echo ">�ܽ�ƻ�</a></li>\r\n\t\t\t\t\t\t   <li>|</li>\r\n                          <li><a href=\"do.php?action=";
echo $action;
echo "&clearing=month\" ";
if ( $clearing == "month")
{
echo "class=\"li-active\"";
}
echo ">�½�ƻ�</a></li>\r\n\t\t\t\t\t\t  <li>|</li>\r\n\t\t\t\t\t\t   <li><a href=\"do.php?action=";
echo $action;
echo "&checkplan=true\" ";
if ( $checkplan == "true")
{
echo "class=\"li-active\"";
}
echo ">�ж���</a></li>\r\n\t\t\t\t\t\t   <li>|</li>\r\n                          <li><a href=\"do.php?action=";
echo $action;
echo "&restrictions=1\" ";
if ( $restrictions == "1")
{
echo "class=\"li-active\"";
}
echo ">�л�Ա����</a></li>\r\n\t\t\t\t\t\t   <li>|</li>\r\n                          <li><a href=\"do.php?action=";
echo $action;
echo "&audit=y\" ";
if ( $audit == "y")
{
echo "class=\"li-active\"";
}
echo ">��Ҫ���</a></li>\r\n\t\t\t\t\t\t  \r\n                        </ul></td>\r\n                     \r\n                    </tr>\r\n                  </table></td>\r\n              </tr>\r\n              <tr>\r\n                <td height=\"50\"><select name=\"select\" class=\"select\" onchange=\"\$i('choosetype').value=this.value\">\r\n                    <option>��������</option>\r\n                    <option value=\"unlock\">����</option>\r\n                    <option value=\"lock\">ֹͣ</option>\r\n                    <option value=\"del\">ɾ��</option>\r\n                  </select>\r\n                  <input type=\"button\" name=\"Submit\" value=\"�ύ\" class=\"submit-x\" onclick=\"choose();\"/>\r\n                  &nbsp;\r\n                  &nbsp;\r\n                  <form action=\"?action=";
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
echo " >����</option>\r\n                    </select>\r\n                    <select name=\"sortingtype\" class=\"select\" id=\"sortingtype\">\r\n                      <option value=\"priceadv\" ";
if ( $sortingtype == "priceadv")
{
echo "selected";
}
echo ">����</option>\r\n                      <option value=\"deduction\" ";
if ( $sortingtype == "deduction")
{
echo "selected";
}
echo ">����</option>\r\n\t\t\t\t\t  <option value=\"budget\" ";
if ( $sortingtype == "budget")
{
echo "selected";
}
echo ">ÿ���޶�</option>\r\n                    </select>\r\n                    <input type=\"submit\" name=\"Submit2\" value=\"����\" class=\"submit-x\">\r\n                  </form> \r\n                  <form action=\"?action=";
echo $action;
echo "&actiontype=search\" method=\"post\">\r\n                    <input name=\"searchval\" type=\"text\" class=\"reg\" id=\"searchval\" value=\"";
echo $searchval;
echo "\" size=\"20\" />\r\n                    <select name=\"searchtype\">\r\n                      <option value=\"2\" ";
if ( $searchtype == "2")
{
echo "selected";
}
echo ">���ƻ�ID</option>\r\n                      <option value=\"3\" ";
if ( $searchtype == "3")
{
echo "selected";
}
echo ">�����UID</option>\r\n                      <option value=\"1\" ";
if ( $searchtype == "1")
{
echo "selected";
}
echo ">�ƻ�����</option>\r\n                    </select>\r\n                    <input type=\"submit\" name=\"Submit22\" value=\"����\" class=\"submit-x\"/>\r\n                  </form></td>\r\n\t\t\t\t  \r\n              </tr>\r\n              <tr>\r\n                <td><form id=\"form\" name=\"form\" method=\"post\" action=\"do.php?action=";
echo $action;
echo "&actiontype=postchoose\">\r\n                    <input name=\"choosetype\"  id=\"choosetype\"  type=\"hidden\" value=\"\" />\r\n                    \r\n                    <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" style=\"border:0px #DFDFDF solid\">\r\n                      <tr class=\"td_b_2\">\r\n                        <td width=\"5\" height=\"33\" class=\"td_b_l\" >&nbsp;</td>\r\n                        <td width=\"30\"><input type=\"checkbox\" name=\"chkall\" onclick=\"checkall(this.form, 'uid')\" /></td>\r\n                        <td width=\"50\">Id</td>\r\n                        <td width=\"120\">�ƻ�����</td>\r\n                        <td width=\"55\">����</td>\r\n                        <td width=\"75\">�����</td>\r\n                        <td width=\"60\">����</td>\r\n                        <td width=\"60\">�޶�</td>\r\n                        <td width=\"60\">����</td>\r\n                        <td width=\"60\">����</td>\r\n\r\n                        <td width=\"60\">����</td>\r\n                        <td width=\"70\">�ѽ���</td>\r\n                        <td width=\"60\" align=\"center\">����</td>\r\n                        <td width=\"80\">��Ա����</td>\r\n                        <td width=\"80\">��Ҫ���</td>\r\n                        <td width=\"60\">״̬</td>\r\n                        <td>&nbsp;</td>\r\n                        <th width=\"6\" class=\"td_b_3\" >&nbsp;</th>\r\n                      </tr>\r\n                        ";
foreach ( ( array )$plan as $p )
{
$user = $usermodel->getusersuidrow( $p['uid'] );
$vn = $planmodel->gxgetplanviews( $p['planid'] );
echo "                      <tr onmouseover=\"\$('#e_";
echo $p['planid'];
echo "').show()\" onmouseout=\"\$('#e_";
echo $p['planid'];
echo "').hide()\">\r\n                        <td height=\"30\"  class=\"td_b_4\" id=\"b-bottom\" >&nbsp;</td>\r\n                        <td  >\r\n\t\t\t\t\t\t";
if ( $p['status'] == 0 )
{
echo "<span style=\"color: red;font-size: 9px;\">X</span>";
}
else
{
echo "<input type=\"checkbox\" name=\"planid[]\" value=\"".$p['planid']."\" />";
}
echo "\t\t\t\t\t    </td>\r\n                        <td>";
echo $p['planid'];
echo "</td>\r\n                        <td><strong>";
echo str( $p['planname'],12 );
echo "</strong></td>\r\n                        <td>";
echo ucfirst( $p['plantype'] );
echo "</td>\r\n                        <td>\r\n\t\t\t\t\t\t<a href=\"do.php?action=advertiser&actiontype=search&searchtype=2&searchval=";
echo $p['uid'];
echo "&usertype=advertiser\" title=\"ת����Ա����\">";
echo $user['username'] == ""?"[��ɾ��]<br>".$p['username'] : $user['username'];
echo "</a>\r\n        ";
if ( $user['money'] <200 )
{
echo "<br><font color=\"#FF0000\">��".round( $user['money'],1 )."</font>";
}
echo "\t\t</td>\r\n                        <td>\r\n\t\t\t\t\t\t";
if ( $p['gradeprice'] )
{
echo "<font color=\"#FF0000\">�ּ�</font>";
}
else
{
echo abs( $p['price'] );
}
if ( $p['plantype'] == "cps")
{
echo "%";
}
echo "<br><font color=\"gray\">".abs( $p['priceadv'] );
if ( $p['plantype'] == "cps")
{
echo "% ";
}
echo "</font>\t\t\t\t\t\t</td>\r\n                        <td>��";
echo abs( $p['budget'] );
echo "</td>\r\n                        <td>";
if ( $p['clearing'] == "day")
{
echo "�ս�";
}
if ( $p['clearing'] == "week")
{
echo "�ܽ�";
}
if ( $p['clearing'] == "month")
{
echo "�½�";
}
echo "\t\t\t\t\t\t</td>\r\n                        <td>";
echo abs( $p['deduction'] );
echo "%</td>\r\n                        \t\t\t\t\t\t\r\n                        <td>";
echo abs( $p['dosage'] );
echo "%</td>\r\n                       <td> ";
echo ( integer )$vn['n'];
echo "<br><a href=\"do.php?action=stats&timerange=a&planid=";
echo $p['planid'];
echo "\">����</a></td>\r\n                        <td align=\"center\">";
if ( $p['checkplan'] != "true")
{
echo "��";
}
else
{
echo "��";
}
echo "</td>\r\n                        <td>";
if ( $p['restrictions'] != "1")
{
echo "������";
}
else
{
echo "������";
}
echo "</td>\r\n                        <td>";
if ( $p['audit'] == "n")
{
echo "����Ҫ";
}
else
{
echo "��Ҫ";
}
echo "</td>\r\n                        <td> \r\n\t\t\t\t\t\t  ";
if ( $user['status'] != "2")
{
echo "<font color=\"red\">�����δ����</font>";
}
else if ( $p['status'] == "0")
{
echo "<font color=\"red\">����</font>";
}
else if ( $p['status'] == "1")
{
echo "<font color=\"green\">Ͷ����</font>";
}
else if ( $p['status'] == "2")
{
echo "<font color=\"red\">ֹͣ��</font>";
}
else if ( $p['status'] == "3")
{
echo "<font color=\"red\">��ͣ��(�޶�)</font>";
}
else if ( $p['status'] == "4")
{
echo "<font color=\"red\">ֹͣ(���ڻ�������)</font>";
}
echo " \r\n\t\t\t\t\t\t  \r\n                        </td>\r\n                        <td>&nbsp;</td>\r\n                        <td width=\"6\" class=\"td_b_5\">&nbsp;</td>\r\n                      </tr>\r\n                      <tr  class=\"td_b_m\" onmouseover=\"\$('#e_";
echo $p['planid'];
echo "').show()\" onmouseout=\"\$('#e_";
echo $p['planid'];
echo "').hide()\">\r\n                        <td height=\"25\"  class=\"td_b_4\" >&nbsp;</td>\r\n                        <td style=\"padding-left:3px\">\r\n\t\t\t \r\n\t\t\t\t\t\t<img  src='/templates/";
echo Z_TPL;
echo "/images/ico-bj.jpg' width=\"16\" height=\"16\" align='absmiddle' id=\"mark_";
echo $p['planid'];
echo "\"  ";
if ( $p['mark'] == 0 )
{
echo " style=\"display:none\"";
}
echo "/>\r\n\t\t\t\t\t\t&nbsp;\t\t\t\t\t\t</td>\r\n                        <td>&nbsp;</td>\r\n                        <td colspan=\"8\"><span style=\"display:none\" id=\"e_";
echo $p['planid'];
echo "\"><a href=\"dos.php?action=editplan&planid=";
echo $p['planid'];
echo "\" title=\"�༭����ƻ���";
echo $p['planname'];
echo "��\">�༭</a> | ";
if ( $p['status'] == 0 )
{
echo "<a href=\"do.php?action=plan&actiontype=unlocks&planid=";
echo $p['planid'];
echo "&TB_iframe=true&height=240&width=300\" title=\"��������ƻ� ��";
echo $p['planname'];
echo "��\" class=\"thickbox\"  >����</a>";
}
else
{
echo " <a href=\"do.php?action=plan&actiontype=postchoose&choosetype=unlock&planid[]=";
echo $p['planid'];
echo "\" title=\"��������ƻ�\">����</a>";
}
echo "  | <a href=\"do.php?action=plan&actiontype=postchoose&choosetype=lock&planid[]=";
echo $p['planid'];
echo "\" title=\"��������ƻ�\">����<a/> | <a title=\"ɾ������ƻ�\" href=\"do.php?action=plan&actiontype=postchoose&choosetype=del&planid[]=";
echo $p['planid'];
echo "\" onclick=\"if ( confirm('����ɾ������ƻ���Ŀ��";
echo $p['planname'];
echo "��\\n��ȷ��ô��ɾ���ƻ�����棬����Ҳ��ɾ��') ) { return true;}return false;\">ɾ��</a> | <a title=\"������ƻ���һ�����\" href=\"javascript:mark(";
echo $p['planid'];
echo ",";
echo $p['mark'];
echo ")\" >���</a> | <a href=\"?action=createads&planid=";
echo $p['planid'];
echo "\" title=\"�ڴ˼ƻ��������\">�½����</a> | <a href=\"do.php?action=ads&actiontype=search&searchtype=2&searchval=";
echo $p['planid'];
echo "\" title=\"�鿴����ƻ������й��\">�鿴���";
echo "<font color=\"gray\">(".$planmodel->gxgetplanadsnum( $p['planid'] ).")</font>";
echo "</a> | ";
if ( !in_array( $p['plantype'],array( "cps","cpa") ) )
{
echo "<a href=\"#TB_inline?&height=250&width=630&inlineId=Tod2cHtml\" onclick=\"Doeff(";
echo $p['planid'];
echo ")\" title=\"��������\"   class=\"thickbox\">��ȡ���ε������ٴ���</a>";
}
else
{
echo "<a href=\"#TB_inline?&height=100&width=630&inlineId=ToCpsaHtml\" onclick=\"ToCpsa('";
echo $p['plantype'];
echo "')\" title=\"��ȡCPS CPA�ĸ��ٴ���\"   class=\"thickbox\">��ȡ�ӿڴ���</a>";
}
if ( $p['audit'] == "y")
{
if ( $p['stopaudit'] == "1")
{
echo " | <a title=\"ֹͣ�ƻ�������\" href=\"do.php?action=plan&actiontype=stopaudit&planid=";
echo $p['planid'];
echo "&stopaudit=2\" >ֹͣ����</a>";
}
else
{
echo " | <a title=\"ֹͣ�ƻ�������\" href=\"do.php?action=plan&actiontype=stopaudit&planid=";
echo $p['planid'];
echo "&stopaudit=1\" >��ͨ����</a>";
}
}
echo "</span>&nbsp;</td>\r\n                        <td colspan=\"5\" align=\"right\"><font color='blue'>";
echo $p['expire'] != "0000-00-00"?"���ڣ�".$p['expire'] : "&nbsp;";
echo "</font></td>\r\n                        <td  class=\"td_b_5\">&nbsp;</td>\r\n                      </tr>\r\n                      ";
}
echo "                      <tr class=\"td_b_7\">\r\n                        <td height=\"33\"  class=\"td_b_6\" >&nbsp;</td>\r\n                        <td  ><input type=\"checkbox\" name=\"chkallde\" onclick=\"checkall(this.form, 'uid','chkallde')\" /></td>\r\n                        <td>Id</td>\r\n                        <td>�ƻ�����</td>\r\n                        <td>����</td>\r\n                        <td>�����</td>\r\n                        <td>����</td>\r\n                        <td>�޶�</td>\r\n                        <td>����</td>\r\n                        <td>����</td>\r\n                        <td>�ѽ���</td>\r\n                        <td align=\"center\">����</td>\r\n                        <td>��Ա����</td>\r\n                        <td>��Ҫ���</td>\r\n                        <td>״̬</td>\r\n                        <td>&nbsp;</td>\r\n                        <td width=\"6\"  class=\"td_b_8\">&nbsp;</td>\r\n                      </tr>\r\n                    </table>\r\n            \r\n                  </form></td>\r\n              </tr>\r\n              <tr>\r\n                <td height=\"50\"><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n                    <tr>\r\n                      <td width=\"200\"><select name=\"select\" class=\"select\" onchange=\"\$i('choosetype').value=this.value\">\r\n                    <option>��������</option>\r\n                    <option value=\"unlock\">����</option>\r\n                    <option value=\"lock\">ֹͣ</option>\r\n                    <option value=\"del\">ɾ��</option>\r\n                  </select>\r\n                        <input type=\"button\" name=\"Submit3\" value=\"�ύ\" class=\"submit-x\" onclick=\"choose();\"/></td>\r\n                      <td align=\"right\">";
echo $viewpage;
echo "</td>\r\n                    </tr>\r\n                  </table></td>\r\n              </tr>\r\n            </table></td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n</table>\r\n\r\n<div id=\"Tod2cHtml\" style=\"display:none\">\r\n    <table width=\"600\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n      <tr>\r\n        <td height=\"30\">���ε������</td>\r\n      </tr>\r\n      <tr>\r\n        <td> \r\n          <textarea id=\"ck2\" name=\"ck2\" cols=\"75\" rows=\"2\"></textarea>        </td>\r\n      </tr>\r\n      <tr>\r\n        <td height=\"30\">Ч�����ٴ���</td>\r\n      </tr>\r\n      <tr>\r\n        <td><textarea name=\"eff\" id=\"eff\" cols=\"75\" rows=\"2\"></textarea></td>\r\n      </tr>\r\n      <tr>\r\n        <td>&nbsp;</td>\r\n      </tr>\r\n      <tr>\r\n        <td>���ε������������ڵ�����ǵ�����������ҳ���Ƿ��е����ҳ����,��ƶ��ε����</td>\r\n      </tr>\r\n\t  <tr>\r\n        <td>&nbsp; </td>\r\n      </tr>\r\n\t  <tr>\r\n        <td>Ч�����٣�������ٹ�浽��ҳ�񵯳�1000���Ƿ�����ʵ���ﵽ���ҳ1000�Σ��絯����ͳ��ע������</td>\r\n      </tr>\r\n\t  <tr>\r\n        <td>&nbsp; </td>\r\n      </tr>\r\n\t  <tr>\r\n        <td><font color=\"#FF0000\">����Ҫ�Ļ������ϴ��뷢������̣�Ƕ�뵽���ҳ�н��и��١�</font></td>\r\n      </tr>\r\n\t  \r\n    </table>\r\n\r\n</div>\r\n\r\n<div id=\"ToCpsaHtml\" style=\"display:none\">\r\n    <table width=\"600\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n      <tr>\r\n        <td height=\"30\">�ӿڴ���</td>\r\n      </tr>\r\n      <tr>\r\n        <td> \r\n          <textarea id=\"cpsain\" name=\"cpsain\" cols=\"75\" rows=\"3\"></textarea>\r\n        </td>\r\n      </tr>\r\n    </table>\r\n</div>\r\n<script language=\"JavaScript\" type=\"text/javascript\">\r\nfunction Doeff(planid){\r\n\tvar url;\r\n\turl = '<'+'script src=\"";
echo $GLOBALS['C_ZYIIS']['jumpurl'];
echo "/effect.php?planid='+planid+'\"></'+'script>';\r\n\t\$(\"#ck2\").val(url);\r\n\turl1 = '<'+'script src=\"";
echo $GLOBALS['C_ZYIIS']['jumpurl'];
echo "/effect.php?type=effect&planid='+planid+'\"></'+'script>';\r\n\t\$(\"#eff\").val(url1);\r\n}\r\n\r\nfunction ToCpsa(type){\r\n\tvar url;\r\n\tif(type=='cps')\r\n\turl = '<iframe src=\"";
echo $GLOBALS['C_ZYIIS']['jumpurl'];
echo "/api/cpa.php?orders=������&price=�����۸�&like=ԭ������\" height=0 width=0></iframe>';\r\n\telse \r\n\turl = '<iframe src=\"";
echo $GLOBALS['C_ZYIIS']['jumpurl'];
echo "/api/cpa.php\" height=0 width=0></iframe>';\r\n\t\$(\"#cpsain\").val(url);\r\n\t\r\n}\r\n\r\nfunction choose(){\r\n\tvar v = \$i(\"choosetype\").value;\r\n\tvar t='';\r\n    if(v == 'del') t = 'ɾ��';\t\r\n\tif(v == 'unlock')  t= '����';\t\r\n\tif(v == 'lock') t = 'ֹͣ';\r\n\tif(t=='') {alert('����ѡ��δѡ��');return false }\t\r\n\tvar numchecked = getNumChecked('form');\r\n\tif(numchecked < 1) { alert('��ѡ����Ҫ�����ļƻ���Ŀ'); return false }\t\r\n\tif(!v)return false;\r\n\tif(confirm('��ȷ��Ҫ'+ t +'��' + numchecked + '���ƻ�����\\n�㡰ȷ�ϡ�'+ t +'���㡰ȡ����ȡ��������')){\r\n\t\tthis.document.form.submit();\r\n\t\treturn true;\r\n\t}\r\n\treturn false;\r\n}\r\nfunction mark(pid,t){\r\n\tvar m = \$('#mark_'+pid);\r\n\tif (m.is(':hidden')) {\r\n\t\tt=1;\r\n\t\tm.show();\r\n\t}else {\r\n\t\tt=0;\r\n\t\tm.hide();\r\n\t}\r\n\tajax(\"do.php?action=";
echo $action;
echo "&actiontype=mark&mark=\"+t+\"&planid=\"+pid+\"\");\t\r\n}\r\nfunction doRemoveWin(){\r\n\ttb_remove();\r\n\tdocument.location.reload();\r\n}\r\n</script>\r\n";
include( TPL_DIR."/footer.php");

?>