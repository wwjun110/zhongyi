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
echo "/images/ico_success_16.gif' align='absmiddle'><span style=\"margin-left:10px;\">²Ù×÷³É¹¦£¡</span></td>\r\n                <td>&nbsp;</td>\r\n              </tr>\r\n            </table>\r\n            <script language=\"JavaScript\" type=\"text/javascript\">\r\n\t\t\tnoneSuccess();\r\n\t\t\t</script>\r\n            ";
}
echo "            <table width=\"97%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n              <tr>\r\n                <td><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n                    <tr>\r\n                      <td><ul id=\"li-type\">\r\n                          <li><a href=\"do.php?action=";
echo $action;
echo "\" ";
if ( !$actiontype )
{
echo "class=\"li-active\"";
}
echo ">È«²¿</a></li>\r\n                          <li>|</li>\r\n                          <li><a href=\"do.php?action=";
echo $action;
echo "&actiontype=unlock\" ";
if ( $actiontype == "unlock")
{
echo "class=\"li-active\"";
}
echo ">ÒÑÉóºË</a></li>\r\n                          ";
if ( $action == "affiliate"||$action == "advertiser")
{
echo "                          <li>|</li>\r\n                          <li><a href=\"do.php?action=";
echo $action;
echo "&actiontype=waitact\" ";
if ( $actiontype == "waitact")
{
echo "class=\"li-active\"";
}
echo ">µÈ´ýÉóºË</a> </li>\r\n                          ";
}
echo "                          <li>|</li>\r\n                          <li><a href=\"do.php?action=";
echo $action;
echo "&actiontype=lock\" ";
if ( $actiontype == "lock")
{
echo "class=\"li-active\"";
}
echo ">ÒÑËø¶¨</a></li>\r\n                        </ul></td>\r\n                      <td width=\"500\" align=\"right\">";
if ( $_SESSION['adminusertype'] == "1")
{
echo "                        <ul id=\"li-type\">\r\n                          <li><span style='font-size:14px; color:#FF0000;font-weight: bold;padding-right: 30px;padding-left: 120px;'><font color='blue'>Î´½áËã:</font>£¤";
echo abs( $sumpay );
echo " </span> <span style='font-size:14px; color:#FF0000;font-weight: bold;padding-right: 10px;'><font color='blue'>¿É½áËã:</font>£¤";
echo abs( $sumpayok );
echo "</span> </li>\r\n                        </ul>\r\n                        ";
}
echo "</td>\r\n                    </tr>\r\n                  </table></td>\r\n              </tr>\r\n              <tr>\r\n                <td height=\"50\"><select name=\"\" class=\"select\" onchange=\"\$i('choosetype').value=this.value\">\r\n                    <option>ÅúÁ¿²Ù×÷</option>\r\n                    <option value=\"unlock\">¼¤»î</option>\r\n                    <option value=\"lock\">Ëø¶¨</option>\r\n                    <option value=\"del\">É¾³ý</option>\r\n                  </select>\r\n                  <input type=\"button\" name=\"Submit\" value=\"Ìá½»\" class=\"submit-x\" onclick=\"choose();\"/>\r\n                  &nbsp;\r\n                  &nbsp;\r\n                  ";
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
echo " >½µÐò</option>\r\n                      <option value=\"ASC\" ";
if ( $sortingm == "ASC")
{
echo "selected";
}
echo " >ÉýÐò</option>\r\n                    </select>\r\n                    <select name=\"sortingtype\" class=\"select\" id=\"sortingtype\">\r\n                      <option value=\"money\" ";
if ( $sortingtype == "money")
{
echo "selected";
}
echo ">×ÜÓà¶î</option>\r\n                      ";
if ( $action != "advertiser")
{
echo "                      <option value=\"daymoney\" ";
if ( $sortingtype == "daymoney")
{
echo "selected";
}
echo ">ÈÕÓà¶î</option>\r\n                      <option value=\"weekmoney\" ";
if ( $sortingtype == "weekmoney")
{
echo "selected";
}
echo ">ÖÜÓà¶î</option>\r\n                      <option value=\"monthmoney\" ";
if ( $sortingtype == "monthmoney")
{
echo "selected";
}
echo ">ÔÂÓà¶î</option>\r\n                      <option value=\"xmoney\" ";
if ( $sortingtype == "xmoney")
{
echo "selected";
}
echo ">ÏÂÏß½ð¶î</option>\r\n                      <option value=\"cpcdeduction\" ";
if ( $sortingtype == "cpcdeduction")
{
echo "selected";
}
echo ">µã»÷¿ÛÁ¿</option>\r\n                      <option value=\"cpmdeduction\" ";
if ( $sortingtype == "cpmdeduction")
{
echo "selected";
}
echo ">µ¯´°¿ÛÁ¿</option>\r\n                      <option value=\"cpadeduction\" ";
if ( $sortingtype == "cpadeduction")
{
echo "selected";
}
echo ">×¢²á¿ÛÁ¿</option>\r\n                      <option value=\"cpsdeduction\" ";
if ( $sortingtype == "cpsdeduction")
{
echo "selected";
}
echo ">ÏúÊÛ¿ÛÁ¿</option>\r\n                      <option value=\"cpvdeduction ";
if ( $sortingtype == "cpvdeduction")
{
echo "selected";
}
echo "\">Õ¹Ê¾¿ÛÁ¿</option>\r\n                      ";
}
echo "                    </select>\r\n                    <input type=\"Submit\" name=\"Submit2\" value=\"ÅÅÐò\" class=\"submit-x\"  />\r\n                  </form>\r\n                  <form action=\"?action=";
echo $action;
echo "&actiontype=search\" method=\"post\">\r\n                    <input name=\"searchval\" type=\"text\" class=\"reg\" id=\"userval\" value=\"";
echo $searchval;
echo "\" size=\"20\" />\r\n                    <select name=\"searchtype\">\r\n                      <option value=\"1\" ";
if ( $searchtype == "1")
{
echo "selected";
}
echo ">»áÔ±Ãû³Æ</option>\r\n                      <option value=\"2\" ";
if ( $searchtype == "2")
{
echo "selected";
}
echo ">»áÔ±ID</option>\r\n\t\t\t\t\t  ";
if ( $action == "affiliate")
{
echo "                      <option value=\"4\" ";
if ( $searchtype == "4")
{
echo "selected";
}
echo ">ÊôÓÚ¿Í·þ</option>\r\n\t\t\t\t\t   <option value=\"6\" ";
if ( $searchtype == "6")
{
echo "selected";
}
echo ">ÊÕ¿îÈË</option>\r\n                      ";
}
echo "\t\t\t\t\t  ";
if ( $action == "advertiser")
{
echo "                      <option value=\"5\" ";
if ( $searchtype == "5")
{
echo "selected";
}
echo ">ÊôÓÚÉÌÎñ</option>\r\n                      ";
}
echo "                      ";
if ( $action != "advertiser")
{
echo "                      <option value=\"3\" ";
if ( $searchtype == "3")
{
echo "selected";
}
echo ">²éÑ¯ÏÂÏß</option>\r\n                      ";
}
echo "                    </select>\r\n                    <input type=\"submit\" name=\"Submit22\" value=\"ËÑË÷\" class=\"submit-x\"/>\r\n                  </form>\r\n                  ";
}
echo "                </td>\r\n              </tr>\r\n              <tr>\r\n                <td><form id=\"form\" name=\"form\" method=\"post\" action=\"do.php?action=";
echo $action;
echo "&actiontype=postchoose\">\r\n                    <input name=\"choosetype\"  id=\"choosetype\"  type=\"hidden\" value=\"\" />\r\n                    ";
if ( $action == "affiliate")
{
echo "                    <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" style=\"border:0px #DFDFDF solid\">\r\n                      <tr class=\"td_b_2\">\r\n                        <td width=\"5\" height=\"33\" class=\"td_b_l\" >&nbsp;</td>\r\n                        <td width=\"30\"><input type=\"checkbox\" name=\"chkall\" onclick=\"checkall(this.form, 'uid')\" /></td>\r\n                        <td width=\"60\">Uid</td>\r\n                        <td width=\"100\">ÓÃ»§Ãû</td>\r\n                        <td width=\"75\">×ÜÓà¶î</td>\r\n                        <td width=\"75\">ÈÕÓà¶î</td>\r\n                        <td width=\"75\">ÖÜÓà¶î</td>\r\n                        <td width=\"75\">ÔÂÓà¶î</td>\r\n                        <td width=\"75\">ÏÂÏßÓà¶î</td>\r\n                        <td width=\"80\">¿ÉÓÃ»ý·Ö</td>\r\n                        <td width=\"80\">¿ÛÁ¿</td>\r\n                        <td width=\"60\">²½³¤Öµ</td>\r\n                        <td width=\"60\">×´Ì¬</td>\r\n                        <td>×îºóµÇÂ¼</td>\r\n                        <th width=\"6\" class=\"td_b_3\" >&nbsp;</th>\r\n                      </tr>\r\n                      ";
foreach ( ( array )$users as $u )
{
if ( $u['cpcdeduction'] != 0 ||$u['cpmdeduction'] != 0 ||$u['cpadeduction'] != 0 ||$u['cpsdeduction'] != 0 ||$u['cpvdeduction'] != 0 )
{
$koudian = $u['cpcdeduction'].",".$u['cpmdeduction'].",".$u['cpadeduction'].",".$u['cpsdeduction'].",".$u['cpvdeduction'];
}
else
{
$koudian = "È«¾Ö";
}
echo "                      <tr onmouseover=\"\$('#e_";
echo $u['uid'];
echo "').show()\" onmouseout=\"\$('#e_";
echo $u['uid'];
echo "').hide()\">\r\n                        <td height=\"30\"  class=\"td_b_4\" id=\"b-bottom\" >&nbsp;</td>\r\n                        <td  ><input name=\"uid[]\" type=\"checkbox\" id=\"uid[]\" value=\"";
echo $u['uid'];
echo "\" /></td>\r\n                        <td><a href=\"do.php?action=userlogin&uid=";
echo $u['uid'];
echo "\" title=\"Ìø×ªµ½»áÔ±¹ÜÀíºóÌ¨\" target=\"_blank\">";
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
echo "<font color=\"ff0000\">´ýÉó</font>";
}
if ( $u['status'] == 1 )
{
echo "<font color=\"ff0000\">ÓÊ¼þ¼¤»î</font>";
}
if ( $u['status'] == 2 )
{
echo "<font color=\"\">»î¶¯</font>";
}
if ( $u['status'] == 3 )
{
echo "<font color=\"ff0000\">¾Ü¾ø</font>";
}
if ( $u['status'] == 4 )
{
echo "<font color=\"ff0000\">Ëø¶¨</font>";
}
echo "</td>\r\n                        <td>";
echo $u['logintime'] == ""?"Î´µÇÈë": substr( $u['logintime'],0,10 );
echo "</td>\r\n                        <td width=\"6\" class=\"td_b_5\">&nbsp;</td>\r\n                      </tr>\r\n                      <tr  class=\"td_b_m\" onmouseover=\"\$('#e_";
echo $u['uid'];
echo "').show()\" onmouseout=\"\$('#e_";
echo $u['uid'];
echo "').hide()\">\r\n                        <td height=\"25\"  class=\"td_b_4\" >&nbsp;</td>\r\n                        <td>&nbsp;\r\n                          ";
if ( TIMES -604800 <strtotime( $u['logintime'] ) )
{
echo "                          <img  src='/templates/";
echo Z_TPL;
echo "/images/active.png' align='absmiddle' alt=\"»îÔ¾\" />\r\n                          ";
}
else
{
echo "                          <img  src='/templates/";
echo Z_TPL;
echo "/images/inactive.png' align='absmiddle' alt=\"·Ç»îÔ¾\" />\r\n                          ";
}
echo "                        </td>\r\n                        <td>&nbsp;</td>\r\n                        <td colspan=\"11\"><span style=\"display:none\" id=\"e_";
echo $u['uid'];
echo "\"><a href=\"dos.php?action=";
echo $action;
echo "&actiontype=editusers&uid=";
echo $u['uid'];
echo "\" title=\"±à¼­Õâ¸ö»áÔ±\">±à¼­</a> | <a href=\"do.php?action=";
echo $action;
echo "&actiontype=postchoose&choosetype=unlock&uid[]=";
echo $u['uid'];
echo "\" title=\"¼¤»îÕâ¸ö»áÔ±\"  onclick=\"return activate()\">¼¤»î</a> | <a href=\"do.php?action=";
echo $action;
echo "&actiontype=postchoose&choosetype=lock&uid[]=";
echo $u['uid'];
echo "\" title=\"Ëø¶¨Õâ¸ö»áÔ±\" onclick=\"return locks(";
echo $u['uid'];
echo ")\">Ëø¶¨<a/> | <a title=\"É¾³ýÕâ¸ö»áÔ±\" href=\"do.php?action=";
echo $action;
echo "&actiontype=postchoose&choosetype=del&uid[]=";
echo $u['uid'];
echo "\" onclick=\"if ( confirm('Äú½«É¾³ýÕâ¸ö»áÔ±¡°";
echo $u['username'];
echo "¡±\\nÄúÈ·¶¨Ã´£¿') ) { return true;}return false;\">É¾³ý</a> | <a href=\"dos.php?action=onlinepay&actiontype=add&username=";
echo $u['username'];
echo "&type=";
echo $u['type'];
echo "&TB_iframe=true&height=260&width=600\"  title=\"ÊÖ¶¯³äÖµ\"   class=\"thickbox\" >Ôö/¿Û¿îÏî</a> | <a href=\"do.php?action=statsuser&actiontype=search&searchtype=1&searchval=";
echo $u['uid'];
echo "&timerange=a\" title=\"²é¿´\" >±¨±í</a> | <a href=\"do.php?action=site&actiontype=search&searchtype=2&searchval=";
echo $u['uid'];
echo "\" title=\"²é¿´\" >ÍøÕ¾</a> | <a href=\"do.php?action=zone&actiontype=search&searchtype=2&searchval=";
echo $u['uid'];
echo "\" title=\"²é¿´\" >¹ã¸æÎ»</a> | <a href=\"do.php?action=pm&actiontype=add&username=";
echo $u['username'];
echo "&TB_iframe=true&height=250&width=600\" title=\"·¢ËÍÏûÏ¢\" class=\"thickbox\">·¢ËÍ¶ÌÐÅ</a> | <a href=\"do.php?action=email&username=";
echo $u['username'];
echo "\" title=\"·¢ËÍÓÊ¼þ\" target=\"_blank\" >·¢ËÍÓÊ¼þ</a> | <a href=\"dos.php?action=trend&actiontype=dayadnweek&searchtype=2&searchval=";
echo $u['uid'];
echo "&timerange=w&TB_iframe=true&height=300&width=700\"  title=\"¡°";
echo $u['username']."";
echo "¡±µÄ×î½üÒ»ÐÇÆÚ×ßÊÆÍ¼\"   class=\"thickbox\" >Ò»ÐÇÆÚ×ßÊÆÍ¼</a>&nbsp;|&nbsp;<a href=\"do.php?action=trend&actiontype=trendarea&searchtype=2&searchval=";
echo $u['uid'];
echo "&timerange=w&TB_iframe=true&height=300&width=700\"  title=\"¡°";
echo $u['username']."";
echo "¡±µÄµØÇø·Ö²¼\"   class=\"thickbox\" >µØÇø·Ö²¼</a>&nbsp;|&nbsp;<a href=\"do.php?action=";
echo $action;
echo "&actiontype=editdeduction&uid=";
echo $u['uid'];
echo "&TB_iframe=true&height=360&width=560\"  title=\"¡°";
echo $u['username']."";
echo "¡±µÄÏà¹ØÉèÖÃ\"   class=\"thickbox\" >¿ÛÁ¿µÈÉèÖÃ</a></span>&nbsp;</span></td>\r\n                        <td  class=\"td_b_5\">&nbsp;</td>\r\n                      </tr>\r\n                      ";
}
echo "                      <tr class=\"td_b_7\">\r\n                        <td height=\"33\"  class=\"td_b_6\" >&nbsp;</td>\r\n                        <td  ><input type=\"checkbox\" name=\"chkallde\" onclick=\"checkall(this.form, 'uid','chkallde')\" /></td>\r\n                        <td>Uid</td>\r\n                        <td>ÓÃ»§Ãû</td>\r\n                        <td>×ÜÓà¶î</td>\r\n                        <td>ÈÕÓà¶î</td>\r\n                        <td>ÖÜÓà¶î</td>\r\n                        <td>ÔÂÓà¶î</td>\r\n                        <td>ÏÂÏßÓà¶î</td>\r\n                        <td>¿ÉÓÃ»ý·Ö</td>\r\n                        <td>¿ÛÁ¿</td>\r\n                        <td>²½³¤Öµ</td>\r\n                        <td>×´Ì¬</td>\r\n                        <td>&nbsp;</td>\r\n                        <td width=\"6\"  class=\"td_b_8\">&nbsp;</td>\r\n                      </tr>\r\n                    </table>\r\n                    ";
}
if ( $action == "advertiser")
{
echo "                    <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" style=\"border:0px #DFDFDF solid\">\r\n                      <tr class=\"td_b_2\">\r\n                        <td width=\"5\" height=\"33\" class=\"td_b_l\" >&nbsp;</td>\r\n                        <td width=\"30\"><input type=\"checkbox\" name=\"chkall\" onclick=\"checkall(this.form, 'uid')\" /></td>\r\n                        <td width=\"60\">Uid</td>\r\n                        <td width=\"100\">ÓÃ»§Ãû</td>\r\n                        <td width=\"75\">Óà¶î</td>\r\n                        <td width=\"75\">ÁªÏµÈË</td>\r\n                        <td width=\"85\">Email</td>\r\n                        <td width=\"100\">µç»°</td>\r\n                        <td width=\"95\">ÊÖ»ú</td>\r\n                        <td width=\"85\">QQ</td>\r\n                        <td width=\"60\">×´Ì¬</td>\r\n                        <td>&nbsp;</td>\r\n                        <th width=\"6\" class=\"td_b_3\" >&nbsp;</th>\r\n                      </tr>\r\n                      ";
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
echo "\" title=\"Ìø×ªµ½»áÔ±¹ÜÀíºóÌ¨\" target=\"_blank\">";
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
echo "<font color=\"ff0000\">´ýÉó</font>";
}
if ( $u['status'] == 1 )
{
echo "<font color=\"ff0000\">ÓÊ¼þ¼¤»î</font>";
}
if ( $u['status'] == 2 )
{
echo "<font color=\"\">»î¶¯</font>";
}
if ( $u['status'] == 3 )
{
echo "<font color=\"ff0000\">¾Ü¾ø</font>";
}
if ( $u['status'] == 4 )
{
echo "<font color=\"ff0000\">Ëø¶¨</font>";
}
echo "</td>\r\n                        <td>×îºóµÇÈë</td>\r\n                        <td width=\"6\" class=\"td_b_5\">&nbsp;</td>\r\n                      </tr>\r\n                      <tr  class=\"td_b_m\" onmouseover=\"\$('#e_";
echo $u['uid'];
echo "').show()\" onmouseout=\"\$('#e_";
echo $u['uid'];
echo "').hide()\">\r\n                        <td height=\"25\"  class=\"td_b_4\" >&nbsp;</td>\r\n                        <td  >&nbsp;\r\n                          ";
if ( TIMES -604800 <strtotime( $u['logintime'] ) )
{
echo "                          <img  src='/templates/";
echo Z_TPL;
echo "/images/active.png' align='absmiddle' alt=\"»îÔ¾\" />\r\n                          ";
}
else
{
echo "                          <img  src='/templates/";
echo Z_TPL;
echo "/images/inactive.png' align='absmiddle' alt=\"·Ç»îÔ¾\" />\r\n                          ";
}
echo "</td>\r\n                        <td>&nbsp;</td>\r\n                        <td colspan=\"7\" ><span style=\"display:none\" id=\"e_";
echo $u['uid'];
echo "\"><a href=\"dos.php?action=";
echo $action;
echo "&actiontype=editusers&uid=";
echo $u['uid'];
echo "\" title=\"±à¼­Õâ¸ö»áÔ±\">±à¼­</a> | <a href=\"do.php?action=";
echo $action;
echo "&actiontype=postchoose&choosetype=unlock&uid[]=";
echo $u['uid'];
echo "\" title=\"¼¤»îÕâ¸ö»áÔ±\"  onclick=\"return activate()\">¼¤»î</a> | <a href=\"do.php?action=";
echo $action;
echo "&actiontype=postchoose&choosetype=lock&uid[]=";
echo $u['uid'];
echo "\" title=\"Ëø¶¨Õâ¸ö»áÔ±\" onclick=\"if ( confirm('Äú½«Ëø¶¨Õâ¸ö»áÔ±¡°";
echo $u['username'];
echo "¡±\\nÄúÈ·¶¨Ã´£¿') ) { return true;}return false;\">Ëø¶¨<a/> | <a title=\"É¾³ýÕâ¸ö»áÔ±\" href=\"do.php?action=";
echo $action;
echo "&actiontype=postchoose&choosetype=del&uid[]=";
echo $u['uid'];
echo "\" onclick=\"if ( confirm('Äú½«É¾³ýÕâ¸ö»áÔ±¡°";
echo $u['username'];
echo "¡±\\nÄúÈ·¶¨Ã´£¿') ) { return true;}return false;\">É¾³ý</a> | <a href=\"do.php?action=onlinepay&actiontype=add&username=";
echo $u['username'];
echo "&type=";
echo $u['type'];
echo "=&TB_iframe=true&height=260&width=600\"  title=\"ÊÖ¶¯³äÖµ\"   class=\"thickbox\" >Ôö/¿Û¿îÏî</a> | <a href=\"do.php?action=plan&actiontype=search&searchtype=3&searchval=";
echo $u['uid'];
echo "\" title=\"²é¿´\" >¹ã¸æ¼Æ»®</a> | <a href=\"do.php?action=createplan&uid=";
echo $u['uid'];
echo "\" title=\"ÐÂ½¨¼Æ»®\" >  ÐÂ½¨¼Æ»®</a>  | <a href=\"do.php?action=ads&actiontype=search&searchtype=3&searchval=";
echo $u['uid'];
echo "\" title=\"²é¿´\" >¹ã¸æ</a> | <a href=\"do.php?action=pm&actiontype=add&username=";
echo $u['username'];
echo "&TB_iframe=true&height=250&width=600\" title=\"·¢ËÍÏûÏ¢\" class=\"thickbox\">·¢ËÍ¶ÌÐÅ</a> | <a href=\"do.php?action=users&actiontype=editusers&usertype=&uid=";
echo $u['uid'];
echo "\" title=\"²é¿´\" >·¢ËÍÓÊ¼þ</a></span>&nbsp;</td>\r\n                        <td colspan=\"2\" align=\"right\">";
echo $u['logintime'] == ""?"Î´µÇÈë": substr( $u['logintime'],0,10 );
echo "</td>\r\n                        <td  class=\"td_b_5\">&nbsp;</td>\r\n                      </tr>\r\n                      ";
}
echo "                      <tr class=\"td_b_7\">\r\n                        <td height=\"33\"  class=\"td_b_6\" >&nbsp;</td>\r\n                        <td  ><input type=\"checkbox\" name=\"chkallde\" onclick=\"checkall(this.form, 'uid','chkallde')\" /></td>\r\n                        <td>Uid</td>\r\n                        <td>ÓÃ»§Ãû</td>\r\n                        <td>Óà¶î</td>\r\n                        <td>ÁªÏµÈË</td>\r\n                        <td>Email</td>\r\n                        <td>µç»°</td>\r\n                        <td>ÊÖ»ú</td>\r\n                        <td>QQ</td>\r\n                        <td>×´Ì¬</td>\r\n                        <td>&nbsp;</td>\r\n                        <td width=\"6\"  class=\"td_b_8\">&nbsp;</td>\r\n                      </tr>\r\n                    </table>\r\n                    ";
}
if ( $action == "service"||$action == "commercial")
{
echo "                    <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" style=\"border:0px #DFDFDF solid\">\r\n                      <tr class=\"td_b_2\">\r\n                        <td width=\"5\" height=\"33\" class=\"td_b_l\" >&nbsp;</td>\r\n                        <td width=\"30\"><input type=\"checkbox\" name=\"chkall\" onclick=\"checkall(this.form, 'uid')\" /></td>\r\n                        <td width=\"60\">Uid</td>\r\n                        <td width=\"100\">ÓÃ»§Ãû³Æ</td>\r\n                        <td width=\"80\">ÁªÏµÈË</td>\r\n                        <td width=\"95\">QQ</td>\r\n                        <td width=\"90\">Òµ¼¨</td>\r\n                        <td width=\"50\">»îÔ¾</td>\r\n                        <td width=\"180\">¹ÜÀí</td>\r\n                        <td width=\"60\">×´Ì¬</td>\r\n                        <td>×îºóµÇÈë</td>\r\n                        <th width=\"6\" class=\"td_b_3\" >&nbsp;</th>\r\n                      </tr>\r\n                      ";
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
echo "\" title=\"Ìø×ªµ½»áÔ±¹ÜÀíºóÌ¨\" target=\"_blank\">";
echo $u['uid'];
echo "</a>\r\n\t\t\t\t\t\t";
}
echo "\t\t\t\t\t\t";
if ( $action == "commercial")
{
echo "\t\t\t\t\t\t<a href=\"do.php?action=userlogin&uid=";
echo $u['uid'];
echo "\" title=\"Ìø×ªµ½»áÔ±¹ÜÀíºóÌ¨\" target=\"_blank\">";
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
echo "/images/active.png' align='absmiddle' alt=\"»îÔ¾\" />\r\n                          ";
}
else
{
echo "                          <img  src='/templates/";
echo Z_TPL;
echo "/images/inactive.png' align='absmiddle' alt=\"·Ç»îÔ¾\" />\r\n                          ";
}
echo "</td>\r\n                        <td><a href=\"dos.php?action=";
echo $action;
echo "&actiontype=editusers&uid=";
echo $u['uid'];
echo "\" title=\"±à¼­Õâ¸ö»áÔ±\">±à¼­</a> | <a href=\"do.php?action=";
echo $action;
echo "&actiontype=postchoose&choosetype=unlock&uid[]=";
echo $u['uid'];
echo "\" title=\"¼¤»îÕâ¸ö»áÔ±\">¼¤»î</a> | <a href=\"do.php?action=";
echo $action;
echo "&actiontype=postchoose&choosetype=lock&uid[]=";
echo $u['uid'];
echo "\" title=\"Ëø¶¨Õâ¸ö»áÔ±\">Ëø¶¨<a/> | <a title=\"É¾³ýÕâ¸ö»áÔ±\" href=\"do.php?action=";
echo $action;
echo "&actiontype=postchoose&choosetype=del&uid[]=";
echo $u['uid'];
echo "\" onclick=\"if ( confirm('Äú½«É¾³ýÕâ¸ö»áÔ±¡°";
echo $u['username'];
echo "¡±\\nÄúÈ·¶¨Ã´£¿') ) { return true;}return false;\">É¾³ý</a> | \r\n\t\t\t\t\t\t";
if ( $action == "service")
{
echo "\t\t\t\t\t\t<a href=\"do.php?action=affiliate&actiontype=search&searchval=";
echo $u['uid'];
echo "&searchtype=4\">ÎÒµÄ»áÔ±</a>\r\n\t\t\t\t\t\t";
}
echo "\t\t\t\t\t\t";
if ( $action == "commercial")
{
echo "\t\t\t\t\t\t<a href=\"do.php?action=advertiser&actiontype=search&searchval=";
echo $u['uid'];
echo "&searchtype=5\">ÎÒµÄ¹ã¸æÉÌ</a>\r\n\t\t\t\t\t\t";
}
echo "\t\t\t\t\t    </td>\r\n                        <td>";
if ( $u['status'] == 2 )
{
echo "<font color=\"\">»î¶¯</font>";
}
if ( $u['status'] == 3 )
{
echo "<font color=\"ff0000\">¾Ü¾ø</font>";
}
if ( $u['status'] == 4 )
{
echo "<font color=\"ff0000\">Ëø¶¨</font>";
}
echo "</td>\r\n                        <td>";
echo $u['logintime'] == ""?"Î´µÇÈë": $u['logintime'];
echo "</td>\r\n                        <td width=\"6\" class=\"td_b_5\">&nbsp;</td>\r\n                      </tr>\r\n                      ";
}
echo "                      <tr class=\"td_b_7\">\r\n                        <td height=\"33\"  class=\"td_b_6\" >&nbsp;</td>\r\n                        <td  ><input type=\"checkbox\" name=\"chkallde\" onclick=\"checkall(this.form, 'uid','chkallde')\" /></td>\r\n                        <td>Uid</td>\r\n                        <td>ÓÃ»§Ãû³Æ</td>\r\n                        <td>ÁªÏµÈË</td>\r\n                        <td>QQ</td>\r\n                        <td>Òµ¼¨</td>\r\n                        <td>»îÔ¾</td>\r\n                        <td>&nbsp;</td>\r\n                        <td>×´Ì¬</td>\r\n                        <td>×îºóµÇÈë</td>\r\n                        <td width=\"6\"  class=\"td_b_8\">&nbsp;</td>\r\n                      </tr>\r\n                    </table>\r\n                    ";
}
echo "                  </form></td>\r\n              </tr>\r\n              <tr>\r\n                <td height=\"50\"><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n                    <tr>\r\n                      <td width=\"200\"><select name=\"select\" class=\"select\" onchange=\"\$i('choosetype').value=this.value\">\r\n                          <option>ÅúÁ¿²Ù×÷</option>\r\n                          <option value=\"unlock\">¼¤»î</option>\r\n                          <option value=\"lock\">Ëø¶¨</option>\r\n                          <option value=\"del\">É¾³ý</option>\r\n                        </select>\r\n                        <input type=\"button\" name=\"Submit3\" value=\"Ìá½»\" class=\"submit-x\" onclick=\"choose();\"/></td>\r\n                      <td align=\"right\">";
echo $viewpage;
echo "</td>\r\n                    </tr>\r\n                  </table></td>\r\n              </tr>\r\n            </table></td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n</table>\r\n<script language=\"JavaScript\" type=\"text/javascript\">\r\nfunction choose(){\r\n\tvar v = \$i(\"choosetype\").value;\r\n\tvar t='';\r\n    if(v == 'del') t = 'É¾³ý';\t\r\n\tif(v == 'unlock')  t= '¼¤»î';\r\n\tif(v == 'lock') t = 'Ëø¶¨';\r\n\tif(t=='') {alert('ÅúÁ¿Ñ¡ÏîÎ´Ñ¡Ôñ');return false }\t\r\n\tvar numchecked = getNumChecked('form');\r\n\tif(numchecked < 1) { alert('ÇëÑ¡ÖÐÄúÒª²Ù×÷µÄ»áÔ±'); return false }\t\r\n\tif(!v)return false;\r\n\tif(confirm('ÄúÈ·ÈÏÒª'+ t +'Õâ' + numchecked + '¸ö»áÔ±£¿¡£\\nµã¡°È·ÈÏ¡±'+ t +'£¬µã¡°È¡Ïû¡±È¡Ïû²Ù×÷¡£')){\r\n\t\t";
if ( in_array( "useractivate",explode( ",",$GLOBALS['C_ZYIIS']['tomail'] ) ) )
{
echo "\t\tif(v == 'unlock') addLoading('ÕýÔÚ·¢ËÍÓÊ¼þ...');\r\n\t\t";
}
echo "\t\tthis.document.form.submit();\r\n\t\treturn true;\r\n\t}\r\n\treturn false;\r\n}\r\nfunction activate(){\r\n\tvar psub=confirm(\"È·ÈÏ¼¤»îÃ´£¿\");\r\n\tif(psub){\r\n\t\t";
if ( in_array( "useractivate",explode( ",",$GLOBALS['C_ZYIIS']['tomail'] ) ) )
{
echo "\t\t\taddLoading('ÕýÔÚ·¢ËÍÓÊ¼þ...');\r\n\t\t";
}
echo "\t}else{\r\n\t\treturn false;\r\n\t}\r\n}\r\nfunction locks(uid){\r\n\tvar psub=confirm(\"×÷±×»áÔ±Ã´£¿\\n°ÑÕâ¸ö»áÔ±µÄÐÅÏ¢Ìá½»µ½ÖÐÒ×¹Ù·½ºÚÃûµ¥£¿\\nµã¡°È·ÈÏ[ÍÆ¼ö]¡±Ìá½»£¬µã¡°È¡Ïû¡±²»Ìá½»¡£\");\r\n\tif(psub){\r\n\t\t\$.post(\"do.php?action=lockusertozy\",{ \"uid\": uid}, function(data){\r\n\t\t\tif(data == 'ok') {\r\n\t\t\t\talert('¸ÐÐ»ÄúµÄÌá½»');\r\n\t\t\t\tdocument.location.reload();\r\n\t\t\t}\r\n\t\t\telse {\r\n\t\t\t \talert('Ìá½»Ê§°Ü');\r\n\t\t\t}\r\n\t\t})\r\n\t\treturn false;\r\n\t} \r\n}\r\nfunction doRemoveWin(){\r\n\ttb_remove();\r\n\twindow.location.href = \"";
echo $reurl;
echo "\";\r\n}\r\n</script>\r\n";
include( TPL_DIR."/footer.php");

?>