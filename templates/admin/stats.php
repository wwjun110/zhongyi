<?php

if ( !defined( "IN_ZYADS") )
{
exit( );
}
include( TPL_DIR."/header.php");
echo "<script LANGUAGE=\"JavaScript\" src=\"/javascript/jiandate.js\"></script>\r\n<script src=\"/javascript/jquery/jtip.js\" language='JavaScript'></script>\r\n<link href=\"/javascript/jquery/css/question.css\" rel=\"stylesheet\" type=\"text/css\" />\r\n<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" id=\"page\">\r\n  <tr>\r\n    <td><table width=\"95%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#FFFFFF\">\r\n        <tr>\r\n          <td  valign=\"top\">";
if ( $statetype == "success")
{
echo "            <table  border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#FFFFFF\" class=\"success\" id=\"success\" width=\"97%\" >\r\n              <tr>\r\n                <td height=\"30\"><img  src='/templates/";
echo Z_TPL;
echo "/images/ico_success_16.gif' align='absmiddle' /><span style=\"margin-left:10px;\">�����ɹ���</span></td>\r\n                <td>&nbsp;</td>\r\n              </tr>\r\n            </table>\r\n            <script language=\"JavaScript\" type=\"text/javascript\">\r\n\t\t\tnoneSuccess();\r\n\t\t\t</script>\r\n            ";
}
echo "            <table width=\"97%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n              <tr>\r\n                <td><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n                    <tr>\r\n                      <td><ul id=\"li-type\">\r\n                          \r\n                          <li><a href=\"do.php?action=";
echo $action;
echo "&timerange=";
echo DAYS."/".DAYS;
echo "\" ";
if ( 3 <strlen( $timerange ) )
{
echo "class=\"li-active\"";
}
echo ">���ձ���</a></li>\r\n                          <li>|</li>\r\n                          <li><a href=\"do.php?action=";
echo $action;
echo "&timerange=t\" ";
if ( $timerange == "t")
{
echo "class=\"li-active\"";
}
echo ">���ձ���</a> </li>\r\n\t\t\t\t\t\t   <li>|</li>\r\n                          <li><a href=\"do.php?action=";
echo $action;
echo "&timerange=w\" ";
if ( $timerange == "w")
{
echo "class=\"li-active\"";
}
echo ">��ȥһ����</a> </li>\r\n\t\t\t\t\t\t  <li>|</li>\r\n                          <li><a href=\"do.php?action=";
echo $action;
echo "&timerange=m\" ";
if ( $timerange == "m")
{
echo "class=\"li-active\"";
}
echo ">���±���</a> </li>\r\n                          ";
foreach ( ( array )$plantypearr as $pt )
{
echo "                          <li>|</li>\r\n                          <li > <a   href=\"do.php?action=stats&plantype=";
echo $pt['plantype'];
echo "\" ";
if ( $plantype == $pt['plantype'] )
{
echo "class=\"li-active\"";
}
echo "><span>";
echo ucfirst( $pt['plantype'] );
echo "����</span></a> </li>\r\n                          ";
}
echo "\t\t\t\t\t\t   \r\n                        </ul></td>\r\n                      <td width=\"500\" align=\"right\"><ul id=\"li-type\">\r\n                        <li>";
if ( $_SESSION['adminusertype'] == "1")
{
echo "\t  <span style='font-size:14px; color:#FF0000;font-weight: bold;padding-right: 30px;padding-left: 60px;'><font color='blue'>����ӯ��:</font>��";
echo $dayyl;
echo " </span> \r\n\t  <span style='font-size:14px; color:#FF0000;font-weight: bold;padding-right: 10px;'><font color='blue'>����ӯ��:</font>��";
echo $ydyl;
echo "</span>\r\n\t  ";
}
echo "</li></ul></td>\r\n                    </tr>\r\n                  </table></td>\r\n              </tr>\r\n              <tr>\r\n                <td height=\"50\"><select name=\"choosetype\" class=\"select\" id=\"choosetype\" onchange=\"\$i('choosetype').value=this.value\">\r\n                    <option>��������</option>\r\n                    <option value=\"del\">ɾ��</option>\r\n                  </select>\r\n                  <input type=\"button\" name=\"Submit\" value=\"�ύ\" class=\"submit-x\" onclick=\"choose();\"/>\r\n                  &nbsp;\r\n                  &nbsp;\r\n                  <form action=\"?action=";
echo $action;
echo "&actiontype=search\" method=\"post\">\r\n                    <input name=\"planid\" type=\"text\"   id=\"planid\" value=\"";
echo $planid != ""?$planid : "��ѯ�ļƻ�ID";
echo "\" size=\"12\" style=\"color:#999999;font-style: italic\" onFocus=\"this.value=''\"/>\r\n                    &nbsp;\r\n                    <select name=\"sortingm\" class=\"select\" id=\"select\">\r\n                      <option value=\"DESC\" ";
if ( $sortingm == "DESC")
{
echo "selected";
}
echo " >����</option>\r\n                      <option value=\"ASC\" ";
if ( $sortingm == "ASC")
{
echo "selected";
}
echo " >����</option>\r\n                    </select>\r\n                    <select name=\"sortingtype\" class=\"select\" id=\"select2\">\r\n                      <option value=\"day\" ";
if ( $sortingtype == "day")
{
echo "selected";
}
echo ">����</option>\r\n                      <option value=\"views\" ";
if ( $sortingtype == "views")
{
echo "selected";
}
echo ">�����</option>\r\n                      <option value=\"num\" ";
if ( $sortingtype == "num")
{
echo "selected";
}
echo ">������</option>\r\n                      <option value=\"deduction\" ";
if ( $sortingtype == "deduction")
{
echo "selected";
}
echo ">����</option>\r\n                      <option value=\"clicks\" ";
if ( $sortingtype == "clicks")
{
echo "selected";
}
echo ">���ε��</option>\r\n                      <option value=\"orders\" ";
if ( $sortingtype == "orders")
{
echo "selected";
}
echo ">Ч����</option>\r\n                      <option value=\"sumpay\" ";
if ( $sortingtype == "sumpay")
{
echo "selected";
}
echo ">Ӧ�����</option>\r\n                      <option value=\"sumprofit\" ";
if ( $sortingtype == "sumprofit")
{
echo "selected";
}
echo ">ӯ��</option>\r\n                    </select>\r\n                    <select name=\"plantype\" class=\"plantype\" id=\"plantype\">\r\n                      <option value=\"\">��������</option>\r\n                      ";
foreach ( ( array )$plantypearr as $pt )
{
echo "                      <option value=\"";
echo $pt['plantype'];
echo "\" ";
if ( $plantype == $pt['plantype'] )
{
echo "selected";
}
echo " >";
echo ucfirst( $pt['plantype'] );
echo "����</option>\r\n                      ";
}
echo "                    </select>\r\n                    &nbsp;&nbsp;\r\n                    <select name=\"timerange\" id=\"timerange\" style=\"width:200px\">\r\n                      <option value=\"";
if ( $time_begin == "")
{
echo DAYS;
}
else
{
echo $time_begin;
}
echo " / ";
if ( $time_end == "")
{
echo DAYS;
}
else
{
echo $time_end;
}
echo "\">\r\n                      ";
if ( $time_begin == "")
{
echo DAYS;
}
else
{
echo $time_begin;
}
echo " �� ";
if ( $time_end == "")
{
echo DAYS;
}
else
{
echo $time_end;
}
echo "                      </option>\r\n                      <option  value=\"a\" ";
echo $timerange == "a"?"selected ": "";
echo ">����ʱ���</option>\r\n                      <option value=\"t\" ";
echo $timerange == "t"?" selected": "";
echo " >����</option>\r\n                      <option value=\"w\" ";
echo $timerange == "w"?" selected": "";
echo " >��ȥһ����</option>\r\n                      <option value=\"m\" ";
echo $timerange == "m"?" selected": "";
echo ">������</option>\r\n                      <option value=\"l\" ";
echo $timerange == "l"?" selected": "";
echo ">���µ�</option>\r\n                    </select>\r\n                    <img src=\"/javascript/images/calendar.gif\" align=\"absmiddle\" id=\"abd\" onclick=\"d.a('timerange','timerange','2')\"/>\r\n                    <input name=\"Submit\" type=\"submit\" class=\"submit-x\" id=\"Submit\" value=\"��ѯ\" />\r\n                  </form> <a href=\"e.php?actiontype=dostats&timerange=";
echo $timerange;
echo "&planid=";
echo $planid;
echo "&plantype=";
echo $plantype;
echo "&type=a\"  style=\" margin-left:20px\" title=\"�����ѯ���ٵ���\" ><img src=\"/templates/";
echo Z_TPL;
echo "/images/excel.jpg\" align=\"absmiddle\"  />����Excel</a> </td>\r\n              </tr>\r\n              <tr>\r\n                <td><form id=\"form\" name=\"form\" method=\"post\" action=\"do.php?action=";
echo $action;
echo "&actiontype=del\">\r\n                    <input name=\"choosetype\"  id=\"choosetype\"  type=\"hidden\" value=\"\" />\r\n                    <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" style=\"border:0px #DFDFDF solid\">\r\n                      <tr class=\"td_b_2\">\r\n                        <td width=\"5\" height=\"33\" class=\"td_b_l\" >&nbsp;</td>\r\n                        <td width=\"30\"><input type=\"checkbox\" name=\"chkall\" onclick=\"checkall(this.form, 'id')\" /></td>\r\n                        <td width=\"100\">�ƻ�����</td>\r\n                        <td width=\"55\">����</td>\r\n                        <td width=\"65\">�����<a href=\"do.php?action=faq&width=350&type=stats&typeval=pv\" class=\"jTip\" id=\"pvhelp\"  name=\"ʲô�������\"><img src=\"/javascript/jquery/images/question.gif\" border=\"0\" align=\"absmiddle\" /></a></td>\r\n                        <td width=\"65\">������<a href=\"do.php?action=faq&width=400&type=stats&typeval=num\" class=\"jTip\" id=\"numhelp\"  name=\"ʲô�ǽ�����\"><img src=\"/javascript/jquery/images/question.gif\" border=\"0\" align=\"absmiddle\" /></a></td>\r\n                        <td width=\"65\">�����<a href=\"do.php?action=faq&amp;width=350&amp;type=stats&amp;typeval=clicks\" class=\"jTip\" id=\"clickshelp\"  name=\"ʲô�ǵ����\"><img src=\"/javascript/jquery/images/question.gif\" border=\"0\" align=\"absmiddle\" /></a></td>\r\n                        <td width=\"65\">����</td>\r\n                        <td width=\"75\">���ε��<a href=\"do.php?action=faq&amp;width=350&amp;type=stats&amp;typeval=do2click\" class=\"jTip\" id=\"do2clickhelp\"  name=\"ʲô�Ƕ��ε��\"><img src=\"/javascript/jquery/images/question.gif\" border=\"0\" align=\"absmiddle\" /></a></td>\r\n                        <td width=\"75\">Ч����<a href=\"do.php?action=faq&amp;width=350&amp;type=stats&amp;typeval=orders\" class=\"jTip\" id=\"ordershelp\"  name=\"ʲô��Ч����\"><img src=\"/javascript/jquery/images/question.gif\" border=\"0\" align=\"absmiddle\" /></a></td>\r\n                        <td width=\"60\">CTR<a href=\"do.php?action=faq&amp;width=350&amp;type=stats&amp;typeval=ctr\" class=\"jTip\" id=\"ctrhelp\"  name=\"ʲô��Ctr\"><img src=\"/javascript/jquery/images/question.gif\" border=\"0\" align=\"absmiddle\" /></a></td>\r\n                        <td width=\"70\">Ӧ�����</td>\r\n                        <td>ӯ��</td>\r\n                        <th width=\"6\" class=\"td_b_3\" >&nbsp;</th>\r\n                      </tr>\r\n                      <tr class=\"td_b_m\">\r\n                        <td height=\"30\"  class=\"td_b_4\" id=\"b-bottom\" >&nbsp;</td>\r\n                        <td>&nbsp;</td>\r\n                        <td><strong>����</strong></td>\r\n                        <td>&nbsp;</td>\r\n                        <td>";
echo $adssumview;
echo "&nbsp;</td>\r\n                        <td>&nbsp;";
echo $adssumnum;
echo "&nbsp;</td>\r\n                        <td>&nbsp;";
echo $adssumclicks;
echo "&nbsp;</td>\r\n                        <td>&nbsp;";
echo $adssumdeduction;
echo "&nbsp;</td>\r\n                        <td>&nbsp;";
echo $adssumdo2click;
echo " </td>\r\n                        <td>&nbsp;";
echo $adssumorders;
echo "&nbsp;</td>\r\n                        <td>&nbsp;</td>\r\n                        <td>��";
echo $adssumsumpay;
echo "</td>\r\n                        <td>��";
echo $adssumsumprofit;
echo "</td>\r\n                        <td class=\"td_b_5\">&nbsp;</td>\r\n                      </tr>\r\n                      ";
if ( !$stats )
{
echo "<tr><td height=\"60\"   class=\"td_b_4 \" id=\"b-bottom\" >&nbsp;</td>\r\n\t\t\t\t\t\t\t\t  <td colspan=\"12\" align=\"center\">�ޱ���</td>\r\n\t\t\t\t\t\t\t\t  <td  class=\"td_b_5\">&nbsp;</td>\r\n\t\t\t\t\t\t\t\t</tr>";
}
foreach ( ( array )$stats as $s )
{
$plan = $planmodel->admingetplanone( $s['planid'] );
echo "                      <tr onmouseover=\"\$('#s_";
echo $s['id'];
echo "').show()\" onmouseout=\"\$('#s_";
echo $s['id'];
echo "').hide()\">\r\n                        <td height=\"30\"  class=\"td_b_4\" id=\"b-bottom\" >&nbsp;</td>\r\n                        <td  ><input name=\"id[]\" type=\"checkbox\" id=\"id[]\" value=\"";
echo $s['id'];
echo "\" /></td>\r\n                        <td><a href=\"do.php?action=plan&&actiontype=search&searchval=";
echo $s['planid'];
echo "&searchtype=2\"><strong>";
echo $plan['planname'] == ""?"��ɾ���ļƻ�": $plan['planname'];
echo "</strong></a></td>\r\n                        <td>";
echo ucfirst( $s['plantype'] );
echo "</td>\r\n                        <td>";
echo $s['views'];
echo "</td>\r\n                        <td>";
echo $s['num'];
echo "</td>\r\n                        <td>";
echo $s['clicks'];
echo "</td>\r\n                        <td>";
echo $s['deduction'];
echo "</td>\r\n                        <td>";
echo $s['do2click'];
echo "</td>\r\n                        <td>";
echo $s['orders'];
echo "</td>\r\n                        <td>";
echo ctr( $s['views'],$s['num'] +$s['deduction'] );
echo "</td>\r\n                        <td>��\r\n                          ";
echo $s['sumpay'];
echo "</td>\r\n                        <td>��\r\n                        ";
echo $s['sumprofit'];
echo "</td>\r\n                        <td width=\"6\" class=\"td_b_5\">&nbsp;</td>\r\n                      </tr>\r\n                      <tr  onmouseover=\"\$('#s_";
echo $s['id'];
echo "').show()\" onmouseout=\"\$('#s_";
echo $s['id'];
echo "').hide()\"  class=\"td_b_m\">\r\n                        <td height=\"35\"   class=\"td_b_4\" id=\"b-bottom\" >&nbsp;</td>\r\n                        <td >&nbsp;</td>\r\n                        <td align=\"center\"><img  src='/templates/";
echo Z_TPL;
echo "/images/date.png' align='absmiddle' /> ";
echo $s['day'];
echo "</td>\r\n                        <td colspan=\"10\"><span style=\"display:none\" id=\"s_";
echo $s['id'];
echo "\"><a href=\"do.php?action=statsuser&actiontype=search&planid=";
echo $s['planid'];
echo "&timerange=";
echo $s['day'];
echo "/";
echo $s['day'];
echo "\">Ͷ�Ż�Ա</a>&nbsp;|&nbsp;<a href=\"do.php?action=statsads&actiontype=search&planid=";
echo $s['planid'];
echo "&timerange=";
echo $s['day'];
echo "/";
echo $s['day'];
echo "\">Ͷ�Ź��</a>&nbsp;|&nbsp;<a href=\"do.php?action=statszone&actiontype=search&planid=";
echo $s['planid'];
echo "&timerange=";
echo $s['day'];
echo "/";
echo $s['day'];
echo "\">Ͷ�Ź��λ</a>&nbsp;|&nbsp;<a href=\"dos.php?action=adsip&timerange=";
echo $s['day'];
echo "&actiontype=search&searchval=";
echo $s['planid'];
echo "&searchtype=2\" >�ÿ�IP</a>&nbsp;|&nbsp; <a href=\"do.php?action=trend&actiontype=dayadnweek&searchtype=1&searchval=";
echo $s['planid'];
echo "&timerange=w&TB_iframe=true&height=300&width=700\"  title=\"��";
echo $plan['planname']."";
echo "�������һ��������ͼ\"   class=\"thickbox\" >���һ��������ͼ</a> </span>&nbsp;</td>\r\n                        <td  class=\"td_b_5\">&nbsp;</td>\r\n                      </tr>\r\n                      ";
$sumnum += $s['num'];
$sumviews += $s['views'];
$sumclicks += $s['clicks'];
$sumdo2click += $s['do2click'];
$sumorders += $s['orders'];
$sumdodeduction += $s['deduction'];
$sumsumpay += $s['sumpay'];
$sumsumprofit += $s['sumprofit'];
}
echo "                      <tr  class=\"td_b_t\">\r\n                        <td height=\"30\"   class=\"td_b_4\" id=\"b-bottom\" >&nbsp;</td>\r\n                        <td>&nbsp;</td>\r\n                        <td><strong>��ҳ����</strong></td>\r\n                        <td>&nbsp;</td>\r\n                        <td>";
echo $sumviews;
echo "&nbsp;</td>\r\n                        <td>";
echo $sumnum;
echo "&nbsp;</td>\r\n                        <td>";
echo $sumclicks;
echo "&nbsp;</td>\r\n                        <td>";
echo $sumdodeduction;
echo "&nbsp;</td>\r\n                        <td>";
echo $sumdo2click;
echo "&nbsp;</td>\r\n                        <td>";
echo $sumorders;
echo "&nbsp;</td>\r\n                        <td>&nbsp;</td>\r\n                        <td>";
echo $sumsumpay;
echo "&nbsp;</td>\r\n                        <td>";
echo $sumsumprofit;
echo "&nbsp;</td>\r\n                        <td  class=\"td_b_5\">&nbsp;</td>\r\n                      </tr>\r\n                      <tr class=\"td_b_7\">\r\n                        <td height=\"33\"  class=\"td_b_6\" >&nbsp;</td>\r\n                        <td  ><input type=\"checkbox\" name=\"chkallde\" onclick=\"checkall(this.form, 'id','chkallde')\" /></td>\r\n                        <td>�ƻ�����</td>\r\n                        <td>����</td>\r\n                        <td>�����</td>\r\n                        <td>������</td>\r\n                        <td>�����</td>\r\n                        <td>����</td>\r\n                        <td>���ε��</td>\r\n                        <td>Ч����</td>\r\n                        <td>CTR</td>\r\n                        <td>Ӧ�����</td>\r\n                        <td>ӯ��</td>\r\n                        <td width=\"6\"  class=\"td_b_8\">&nbsp;</td>\r\n                      </tr>\r\n                    </table>\r\n                  </form></td>\r\n              </tr>\r\n              <tr>\r\n                <td height=\"50\"><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n                    <tr>\r\n                      <td width=\"200\"><select name=\"choosetype\" class=\"select\" id=\"choosetype\" onchange=\"\$i('choosetype').value=this.value\">\r\n                          <option>��������</option>\r\n                          <option value=\"del\">ɾ��</option>\r\n                        </select>\r\n                        <input type=\"button\" name=\"Submit\" value=\"�ύ\" class=\"submit-x\" onclick=\"choose();\"/></td>\r\n                      <td align=\"right\">";
echo $viewpage;
echo "</td>\r\n                    </tr>\r\n                  </table></td>\r\n              </tr>\r\n            </table></td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n</table>\r\n<script language=\"JavaScript\" type=\"text/javascript\">\r\nfunction choose(){\r\n\tvar v = \$i(\"choosetype\").value;\r\n\tvar t='';\r\n    if(v == 'del') t = 'ɾ��';\t\r\n\tif(t=='') {alert('����ѡ��δѡ��');return false }\t\r\n\tvar numchecked = getNumChecked('form');\r\n\tif(numchecked < 1) { alert('��ѡ����Ҫɾ���ļƻ�����'); return false }\t\r\n\tif(!v)return false;\r\n\tif(confirm('��ȷ��Ҫ'+ t +'��' + numchecked + '��������\\n�㡰ȷ�ϡ�'+ t +'���㡰ȡ����ȡ��������')){\r\n\t\tthis.document.form.submit();\r\n\t\treturn true;\r\n\t}\r\n\treturn false;\r\n}\r\n\r\n</script>\r\n";
include( TPL_DIR."/footer.php");
?>