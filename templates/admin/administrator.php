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
echo "/images/ico_success_16.gif' align='absmiddle' /><span style=\"margin-left:10px;\">²Ù×÷³É¹¦£¡</span></td>\r\n                <td>&nbsp;</td>\r\n              </tr>\r\n            </table>\r\n            <script language=\"JavaScript\" type=\"text/javascript\">\r\n\t\t\tnoneSuccess();\r\n\t\t\t</script>\r\n            ";
}
echo "            <table width=\"97%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n              <tr>\r\n                <td><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n                    <tr>\r\n                      <td><ul id=\"li-type\">\r\n                          <li><a href=\"do.php?action=";
echo $action;
echo "&actiontype=add&TB_iframe=true&height=500&width=600\"  title=\"ÐÂ½¨¹ÜÀíÔ±\" class=\"thickbox\"><img  src='/templates/";
echo Z_TPL;
echo "/images/add.gif' align='absmiddle' /> <strong>ÐÂ½¨¹ÜÀíÔ±</strong></a></li>\r\n                          <li>|</li>\r\n                          <li><a href=\"do.php?action=";
echo $action;
echo "\" ";
if ( $top == "")
{
echo "class=\"li-active\"";
}
echo ">¹ÜÀíÔ±ÁÐ±í</a></li>\r\n                        </ul></td>\r\n                    </tr>\r\n                  </table></td>\r\n              </tr>\r\n              <tr>\r\n                <td height=\"50\"><select name=\"select\" class=\"select\" onchange=\"\$i('choosetype').value=this.value\">\r\n                    <option>ÅúÁ¿²Ù×÷</option>\r\n                    <option value=\"del\">É¾³ý</option>\r\n                  </select>\r\n                  <input type=\"button\" name=\"Submit\" value=\"Ìá½»\" class=\"submit-x\" onclick=\"choose();\"/>\r\n                  &nbsp;\r\n                  &nbsp;</td>\r\n              </tr>\r\n              <tr>\r\n                <td><form id=\"form\" name=\"form\" method=\"post\" action=\"do.php?action=";
echo $action;
echo "&actiontype=postchoose\">\r\n                    <input name=\"choosetype\"  id=\"choosetype\"  type=\"hidden\" value=\"\" />\r\n                    <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" style=\"border:0px #DFDFDF solid\">\r\n                      <tr class=\"td_b_2\">\r\n                        <td width=\"5\" height=\"33\" class=\"td_b_l\" >&nbsp;</td>\r\n                        <td width=\"30\"><input type=\"checkbox\" name=\"chkall\" onclick=\"checkall(this.form, 'id')\" /></td>\r\n                        <td width=\"130\">ÓÃ»§Ãû</td>\r\n                        <td width=\"80\">½ÇÉ«</td>\r\n                        <td width=\"80\">ÓÃ»§±¸×¢</td>\r\n                        <td width=\"150\">ÉÏ´ÎµÇÂ¼Ê±¼ä</td>\r\n                        <td width=\"180\">ÉÏ´ÎµÇÂ½IP</td>\r\n                        <td width=\"100\">µÇÂ¼×Ü¼Æ</td>\r\n                        <td width=\"150\">²Ù×÷</td>\r\n                        <td>×´Ì¬</td>\r\n                        <th width=\"6\" class=\"td_b_3\" >&nbsp;</th>\r\n                      </tr>\r\n                       ";
foreach ( ( array )$administrator as $u )
{
echo "                      <tr>\r\n                        <td height=\"30\"  class=\"td_b_4\" id=\"b-bottom\" >&nbsp;</td>\r\n                        <td  ><input type=\"checkbox\" name=\"id[]\" value=\"";
echo $u['id'];
echo "\" />                        </td>\r\n                        <td height=\"40\"><div style=\"float:left\"><img  src='/templates/";
echo Z_TPL;
echo "/images/user.png' align='absmiddle' /></div><div style=\"padding-left:45px\"> <a href=\"dos.php?action=";
echo $action;
echo "&actiontype=edit&id=";
echo $u['id'];
echo "&TB_iframe=true&height=250&width=600\"  title=\"±à¼­¹ÜÀíÔ±¡±";
echo $u['username'];
echo "¡°\" class=\"thickbox\"><strong>";
echo $u['username'];
echo "</strong> <br>\r\n                        ±à¼­</a></div></td>\r\n                        <td>";
if ( $u['usertype'] == "1")
{
echo "³¬¼¶¹ÜÀíÔ±";
}
else
{
echo "ÆÕÍ¨¹ÜÀíÔ±";
}
echo "</td>\r\n                        <td>";
echo $u['userinfo'];
echo "</td>\r\n                        <td>";
echo $u['logintime'];
echo "</td>\r\n                        <td>";
echo $u['loginip'];
echo convertip( $u['loginip'] );
echo "</td>\r\n                        <td>";
echo $u['loginnum'];
echo "´Î</td>\r\n                        <td><a href=\"do.php?action=administrator&actiontype=unlock&id=";
echo $u['id'];
echo "\" onclick=\"return confirm('ÄúÈ·¶¨Òª¼¤»î¡±";
echo $u['username'];
echo "¡°Ã´?')\">¼¤»î</a> | <a href=\"do.php?action=administrator&actiontype=lock&id=";
echo $u['id'];
echo "\" onclick=\"return confirm('ÄúÈ·¶¨ÒªËø¶¨¡±";
echo $u['username'];
echo "¡°Ã´?')\">Ëø¶¨</a></td>\r\n                        <td>";
if ( $u['status'] == "1")
{
echo "<font color=blue>¡Ì</font>";
}
else
{
echo "<font color=red>X</font>";
}
echo "</td>\r\n                        <td width=\"6\" class=\"td_b_5\">&nbsp;</td>\r\n                      </tr>\r\n                      ";
}
echo "                      <tr class=\"td_b_7\">\r\n                        <td height=\"33\"  class=\"td_b_6\" >&nbsp;</td>\r\n                        <td  ><input type=\"checkbox\" name=\"chkallde\" onclick=\"checkall(this.form, 'uid','chkallde')\" /></td>\r\n                        <td >ÓÃ»§Ãû</td>\r\n                        <td>½ÇÉ«</td>\r\n                        <td>ÓÃ»§±¸×¢</td>\r\n                        <td>ÉÏ´ÎµÇÂ¼Ê±¼ä</td>\r\n                        <td>ÉÏ´ÎµÇÂ½IP</td>\r\n                        <td>µÇÂ¼×Ü¼Æ</td>\r\n                        <td>²Ù×÷</td>\r\n                        <td>×´Ì¬</td>\r\n                        <td width=\"6\"  class=\"td_b_8\">&nbsp;</td>\r\n                      </tr>\r\n                    </table>\r\n                  </form></td>\r\n              </tr>\r\n              <tr>\r\n                <td height=\"50\"><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n                    <tr>\r\n                      <td width=\"200\"><select name=\"select2\" class=\"select\" onchange=\"\$i('choosetype').value=this.value\">\r\n                        <option>ÅúÁ¿²Ù×÷</option>\r\n                        <option value=\"del\">É¾³ý</option>\r\n                      </select>\r\n                      <input type=\"button\" name=\"Submit3\" value=\"Ìá½»\" class=\"submit-x\" onclick=\"choose();\"/></td>\r\n                      <td align=\"right\">";
echo $viewpage;
echo "</td>\r\n                    </tr>\r\n                  </table></td>\r\n              </tr>\r\n            </table></td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n</table>\r\n<script language=\"JavaScript\" type=\"text/javascript\">\r\nfunction choose(){\r\n\tvar v = \$i(\"choosetype\").value;\r\n\tvar t='';\r\n    if(v == 'del') t = 'É¾³ý';\t\r\n\tif(t=='') {alert('ÅúÁ¿Ñ¡ÏîÎ´Ñ¡Ôñ');return false }\t\r\n\tvar numchecked = getNumChecked('form');\r\n\tif(numchecked < 1) { alert('ÇëÑ¡ÖÐÄúÒª²Ù×÷µÄ¹ÜÀíÔ±'); return false }\t\r\n\tif(!v)return false;\r\n\tif(confirm('ÄúÈ·ÈÏÒª'+ t +'Õâ' + numchecked + '¸ö¹ÜÀíÔ± £¿¡£\\nµã¡°È·ÈÏ¡±'+ t +'£¬µã¡°È¡Ïû¡±È¡Ïû²Ù×÷¡£')){\r\n\t\tthis.document.form.submit();\r\n\t\treturn true;\r\n\t}\r\n\treturn false;\r\n}\r\nfunction doRemoveWin(){\r\n\ttb_remove();\r\n\tdocument.location.reload();\r\n}\r\n</script>\r\n \r\n";
include( TPL_DIR."/footer.php");

?>