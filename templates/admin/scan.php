<?php

if ( !defined( "IN_ZYADS") )
{
exit( );
}
include( TPL_DIR."/header.php");
echo "<script LANGUAGE=\"JavaScript\" src=\"/javascript/jiandate.js\"></script>\r\n<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" id=\"page\">\r\n  <tr>\r\n    <td><table width=\"95%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#FFFFFF\">\r\n        <tr>\r\n          <td><form id=\"formescan\" name=\"formescan\" target=\"scans\"  method=\"post\">\r\n\t\t   <input name=\"surl\" id=\"surl\" type=\"hidden\" value=\"\" />\r\n              <table width=\"97%\"  border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n                <tr>\r\n                  <td valign=\"top\">";
if ( $statetype != "")
{
echo "                    <table  border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#FFFFFF\" class=\"success\" id=\"success\" width=\"100%\" >\r\n                      <tr>\r\n                        <td height=\"30\"><img  src='/templates/";
echo Z_TPL;
echo "/images/ico_success_16.gif' align='absmiddle' /><span style=\"margin-left:10px;\">";
echo $statetype == "success"?"·¢ËÍ³É¹¦": "·¢ËÍÊ§°Ü";
echo "£¡</span></td>\r\n                        <td>&nbsp;</td>\r\n                      </tr>\r\n                    </table>\r\n                    <script language=\"JavaScript\" type=\"text/javascript\">\r\n\t\t\t\tnoneSuccess();\r\n\t\t\t\t</script>\r\n                    ";
}
echo "</td>\r\n                </tr>\r\n                <tr>\r\n                  <td height=\"50\"><img alt=\"\" src=\"/templates/";
echo Z_TPL;
echo "/images/bulb.gif\" width=\"19\" height=\"19\" /> <strong>ÌáÊ¾£º</strong>É¨Ãè±¨±íÖÐµÄ»áÔ±Êý¾ÝÊ±£¬½áËãÊýµÍÓÚ100µÄ²»×öÉ¨Ãè¡£</td>\r\n                </tr>\r\n                <tr>\r\n                  <td height=\"20\">&nbsp;</td>\r\n                </tr>\r\n \r\n                <tr>\r\n                  <td class=\"cpt\">ÔÆ¶ËÉ¨Ãè×÷±×</td>\r\n                </tr>\r\n                <tr>\r\n                  <td><table width=\"90%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n                      <tr>\r\n                        <td width=\"170\">&nbsp;</td>\r\n                        <td>&nbsp;</td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"30\">É¨ÃèÑ¡Ïî </td>\r\n                        <td> \r\n                          <input name=\"alone\" type=\"radio\" value=\"0\" checked=\"checked\" onclick=\"\$('#n_1').hide();\$('#n_2').show()\"/>\r\n\t\t\t\t\t\t \r\n                           É¨Ãè±¨±íÖÐµÄÊý¾Ý\r\n                          <input type=\"radio\" name=\"alone\" value=\"1\" onclick=\"\$('#n_2').hide();\$('#n_1').show()\"/>\r\n                          É¨Ãèµ¥¸ö»áÔ±</td>\r\n                      </tr>\r\n                      <tr id=\"n_2\">\r\n                        <td height=\"40\">É¨ÃèÊ±¼ä</td>\r\n                        <td ><select name=\"timerange\" id=\"timerange\" style=\"width:200px\">\r\n                          <option value=\"";
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
echo "\">\r\n                          ";
if ( $time_begin == "")
{
echo DAYS;
}
else
{
echo $time_begin;
}
echo " ÖÁ ";
if ( $time_end == "")
{
echo DAYS;
}
else
{
echo $time_end;
}
echo "                          </option>\r\n                          <option value=\"t\" ";
echo $timerange == "t"?" selected": "";
echo " >×òÌì</option>\r\n                          <option value=\"w\" ";
echo $timerange == "w"?" selected": "";
echo " >¹ýÈ¥Ò»ÖÜÄÚ</option>\r\n                          <option value=\"m\" ";
echo $timerange == "m"?" selected": "";
echo ">±¾ÔÂÄÚ</option>\r\n                          <option value=\"l\" ";
echo $timerange == "l"?" selected": "";
echo ">ÉÏÔÂµÄ</option>\r\n                        </select>\r\n                          <img src=\"/javascript/images/calendar.gif\" align=\"absmiddle\" id=\"abd\" onclick=\"d.a('timerange','timerange','2')\"/> </td>\r\n                      </tr>\r\n                      <tr id=\"n_1\"  style=\"display:none\">\r\n                        <td height=\"40\">»áÔ±Ãû³Æ<font color=\"#FF0000\">*</font></td>\r\n                        <td ><input name=\"touser\" type=\"text\"   id=\"touser\" value=\"";
echo $_GET['username'];
echo "\" size=\"20\" /></td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td valign=\"top\">&nbsp;</td>\r\n                        <td>&nbsp;</td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"30\" valign=\"top\">&nbsp;</td>\r\n                        <td><input type=\"button\" name=\"button\" class=\"form-submit\" value=\"¿ªÊ¼É¨Ãè\"  onclick=\"Posts()\"/>\r\n                         <span id=\"loading\" style=\"display:none;background:#FF5A00;width:180px;height:20px;line-height:20px;color:#ffffff;font-size:12px;text-align:center;\"> ¿ªÊ¼É¨Ãè...ÇëÎð¹Ø±Õ´°¿Ú</span> </td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"20\" valign=\"top\">&nbsp;</td>\r\n                        <td>&nbsp;</td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"30\" valign=\"top\">&nbsp;</td>\r\n                        <td><iframe width=\"700\" height=\"150\" name=\"scans\" id=\"scans\"  marginwidth=\"0\" marginheight=\"0\"     allowtransparency=\"true\"  frameborder=0  src=\"/scan.php\"></iframe></td> \r\n                      </tr>\r\n                  </table></td>\r\n                </tr>\r\n                <tr>\r\n                  <td height=\"50\">&nbsp;</td>\r\n                </tr>\r\n                <tr>\r\n                  <td height=\"50\">&nbsp;</td>\r\n                </tr>\r\n              </table>\r\n            </form></td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n</table>\r\n\r\n<script language=\"JavaScript\" type=\"text/javascript\">\r\n \r\nfunction Posts(){\r\n\twindow.status=\" \";\r\n\t\$.get(\"do.php?action=scan&actiontype=u\", function(data){\r\n\t\tif( data ){\r\n\t\t\tdocument.forms[\"formescan\"].action= data;\r\n\t\t\tvar alone  = get_radio_value(\$n('alone'));\r\n\t\t\tif(alone==1) {\r\n\t\t\t\tvar touser  = \$i('touser').value;\r\n\t\t\t\tif(isNULL(touser)){\r\n\t\t\t\t\talert(\"ÇëÊäÈë»áÔ±Ãû³Æ£¡\");\r\n\t\t\t\t\t\$i('touser').focus();\r\n\t\t\t\t\treturn false;\r\n\t\t\t\t}\r\n\t\t\t}\r\n\t\t\tif(alone==1) {\r\n\t\t\t\t\$.get(\"do.php?action=userinfo&username=\"+touser, function(data){\r\n\t\t\t\t\tif( data == \"0\" ){\r\n\t\t\t\t\t\t\$.post(\"do.php?action=scan\",{ \"touser\": touser,\"alone\" : 1}, function(data){\r\n\t\t\t\t\t\t\tif( data ){\r\n\t\t\t\t\t\t\t\t\$i('surl').value = data;\r\n\t\t\t\t\t\t\t\t\$('#loading').show()\r\n\t\t\t\t\t\t\t\tdocument.forms[\"formescan\"].submit();\r\n\t\t\t\t\t\t\t\t\$('#scans').show();\r\n\t\t\t\t\t\t\t}else {\r\n\t\t\t\t\t\t\t\talert('Ã»ÓÐÉ¨ÃèµÄÊý¾Ý');\r\n\t\t\t\t\t\t\t\treturn false;\r\n\t\t\t\t\t\t\t}\r\n\t\t\t\t\t\t});\r\n\t\t\t\t\t}\r\n\t\t\t\t\telse{\r\n\t\t\t\t\t\talert('Ã»ÓÐÕâ¸ö»áÔ±');\r\n\t\t\t\t\t\treturn false;\r\n\t\t\t\t\t}\r\n\t\t\t\t});\r\n\t\t\t} else {\r\n\t\t\t\tvar timerange = \$(\"#timerange\").val();\r\n\t\t\t\t\$.post(\"do.php?action=scan\",{ \"timerange\": timerange,\"alone\" : 0}, function(data){\r\n\t\t\t\t\tif( data  ){\r\n\t\t\t\t\t\t\$('#loading').show()\r\n\t\t\t\t\t\t\$i('surl').value = data;\r\n\t\t\t\t\t\t\$('#loading').show()\r\n\t\t\t\t\t\tdocument.forms[\"formescan\"].submit();\r\n\t\t\t\t\t\t\$('#scans').show();\r\n\t\t\t\t\t}else {\r\n\t\t\t\t\t\talert('Ã»ÓÐÉ¨ÃèµÄÊý¾Ý');\r\n\t\t\t\t\t\treturn false;\r\n\t\t\t\t\t}\r\n\t\t\t\t});\r\n\t\t\t}\r\n\t\t}\r\n\t\telse{\r\n\t\t\talert('³öÏÖ´íÎó£¬ÇëË¢ÐÂÒ»ÏÂÔÙ³¢ÊÔÉ¨Ãè');\r\n\t\t\treturn false;\r\n\t\t}\r\n\t});\r\n\r\n}\r\n</script>\r\n";
include( TPL_DIR."/footer.php");

?>