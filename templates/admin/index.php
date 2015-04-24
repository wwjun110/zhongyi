<?php

if ( !defined( "IN_ZYADS") )
{
exit( );
}
include( TPL_DIR."/header.php");
echo "<script type=\"text/javascript\" src=\"/javascript/swfobject.js\"></script>\r\n<script language=\"JavaScript\">\r\nfunction loadings(url,i){ \r\n\t\$.get(\"do.php?action=cpu&url=\"+url,null,function callback(data){\r\n\t\t\$(\"#cpus\"+i).css('width',data);\r\n\t\t\$(\"#cpun\"+i).html(data+'%');\r\n\t});\r\n}\r\n</script>\r\n<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" >\r\n  <tr>\r\n    <td><table width=\"95%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n        <tr>\r\n          <td><div id=\"page-header\">\r\n              <div class=\"limiter clear-block\">\r\n                <div id=\"page-tools\"> </div>\r\n                <div class=\"tabs\">\r\n                  <ul class=\"links\">\r\n                    <li class=\"";
if ( $type == "")
{
echo "active";
}
else
{
echo "link";
}
echo "\"> <a href=\"do.php?action=index\"><span>¿ØÖÆÃæ°æ</span></a> </li>\r\n\t\t\t\r\n                    <li class=\"";
if ( $type == "system")
{
echo "active";
}
else
{
echo "link";
}
echo "\"> <a   href=\"do.php?action=index&type=system\"><span>°æ±¾ÐÅÏ¢</span></a> </li>\r\n                    <li class=\"";
if ( $type == "copyright")
{
echo "active";
}
else
{
echo "link";
}
echo "\"> <a   href=\"do.php?action=index&type=copyright\"><span>°æÈ¨ËùÓÐ</span></a> </li>\t\t \r\n\t\t\t\t\t";
if ( PHP_OS == "Linux")
{
echo "\t\t\t\t\t<li class=\"";
if ( $type == "server")
{
echo "active";
}
else
{
echo "link";
}
echo "\"> <a   href=\"do.php?action=index&type=server\"><span>·þÎñÆ÷¸ºÔØ</span></a></li>\r\n\t\t\t\t\t";
}
echo "                  </ul>\r\n                </div>\r\n              </div>\r\n            </div></td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n</table>\r\n<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" id=\"page\">\r\n  <tr>\r\n    <td>";
if ( $type == "")
{
echo "      <table width=\"95%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n        <tr>\r\n          <td width=\"65%\"  valign=\"top\" bgcolor=\"#FFFFFF\">\r\n\t\t \r\n\t\t  <table width=\"96%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n\t\t    <div style=\"margin-top:10px; display:none\" id=\"updates\"></div>\r\n              <tr>\r\n                <td height=\"50\"><span style=\" font-size:14px; font-weight:bold\">µ±ÈÕPV£º";
echo $views;
echo "</span> </td>\r\n              </tr>\r\n              <tr>\r\n                <td><div id=\"w\"> <strong>You need to upgrade your Flash Player</strong>\r\n                      <script type=\"text/javascript\">\t\r\n\t\t\t\t\t\tvar so = new SWFObject(\"/templates/admin/charts/line.swf\", \"amcolumn\", \"100%\", \"250\", \"8\", \"#FFFFFF\");\r\n\t\t\t\t\t\tso.addVariable(\"path\", \"/templates/admin/charts/\");\r\n\t\t\t\t\t\tso.addVariable(\"settings_file\", escape(\"/templates/admin/charts/line_settings.xml\")); \r\n\t\t\t\t\t\tso.addVariable(\"data_file\", escape(\"dos.php?action=trenddata&actiontype=day";
echo DAYS."/".DAYS;
echo "dos.php?action=trenddata&actiontype=day\"));\t\t\r\n\t\t\t\t\t\tso.addVariable(\"preloader_color\", \"#999999\");\t\r\n\t\t\t\t\t\tso.write(\"w\");\r\n\t\t\t\t\t</script>\r\n                  </div></td>\r\n              </tr>\r\n            </table></td>\r\n          <td width=\"35%\" valign=\"top\"><table width=\"100%\" cellpadding=\"0\" cellspacing=\"1\" bgcolor=\"dddddd\" align=center style=\"border-left:1px solid #DDDDDD;border-top:0px solid #dddddd; border-bottom:1px solid #DDDDDD;\">\r\n              <tr align=\"center\" bgcolor=\"#CCCCCC\">\r\n                <td height=\"30\" colspan=\"7\"align=\"left\" style=\"color:#333; font-size:18px; background-color:#eeeeee; padding-left:10px\">ÈÕÀú</td>\r\n              </tr>\r\n              <tr align=\"center\" bgcolor=\"#CCCCCC\">\r\n                <td height=\"19\" bgcolor=\"#F8F8F8\"><table width=\"98%\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#eeeeee\" align=center>\r\n                    <tr align=\"center\" bgcolor=\"#CCCCCC\">\r\n                      <td height=\"25\" colspan=\"7\" align=\"left\" bgcolor=\"#F8F8F8\" style=\"color:#333;padding-left:10px;font-size:20px;\">";
echo date( "Y",TIMES );
echo "Äê";
echo date( "m",TIMES );
echo "ÔÂ</td>\r\n                    </tr>\r\n                    <tr align=\"center\" bgcolor=\"#CCCCCC\">\r\n                      <td width=\"14%\" height=\"19\" bgcolor=\"#F8F8F8\"> ÈÕ</td>\r\n                      <td width=\"14%\" bgcolor=\"#F8F8F8\"> Ò»</td>\r\n                      <td width=\"14%\" bgcolor=\"#F8F8F8\"> ¶þ</td>\r\n                      <td width=\"14%\" bgcolor=\"#F8F8F8\"> Èý</td>\r\n                      <td width=\"14%\" bgcolor=\"#F8F8F8\"> ËÄ</td>\r\n                      <td width=\"14%\" bgcolor=\"#F8F8F8\"> Îå</td>\r\n                      <td width=\"14%\" height=\"25\" bgcolor=\"#F8F8F8\"> Áù</td>\r\n                    </tr>\r\n                  </table>\r\n                  <table width=\"98%\" cellpadding=\"0\" cellspacing=\"1\" bgcolor=\"#eeeeee\" align=center>\r\n                    <tr align=center>\r\n                      ";
$doYear = date( "Y",TIMES );
$doMonth = date( "m",TIMES );
$doDate = date( "Y-m-j",TIMES );
$doStart = date( "w",mktime( 0,0,0,$doMonth,1,$doYear ) );
$doEnd = date( "t",mktime( 0,0,0,$doMonth,1,$doYear ) );
$i = 1;
for ( ;$i <36;++$i	)
{
$ws = date( "w",mktime( 0,0,0,$doMonth,$d +1,$doYear ) );
$d = $i -$doStart;
if ( $doStart <$i &&$i <= $doEnd +$doStart )
{
if ( $d == date( "d",TIMES ) &&date( "n",TIMES ) == $doMonth &&date( "Y",TIMES ) == $doYear )
{
echo "<td align=center bgcolor=#ffaaaa height=41 style='position:relative;width:14.3%'>";
if ( $GLOBALS['C_ZYIIS']['clearing_weekdata'] == $ws )
{
echo "<span  class='d2if'>½áËã</span>";
}
if ( $GLOBALS['C_ZYIIS']['clearing_monthdata'] == $d )
{
echo "<span  class='d2if'>ÔÂ½á</span>";
}
echo "<a href='do.php?action=stats&timerange=".$doYear."-".$doMonth."-".$d."/".$doYear."-".$doMonth."-".$d."' >".$d."</a></td>";
}
else
{
echo "<td align=center height=41 bgcolor=#ffffff style='position:relative;width:14.3%'>";
if ( $GLOBALS['C_ZYIIS']['clearing_weekdata'] == $ws )
{
echo "<span class='d2if'>ÖÜ½á</span>";
}
if ( $GLOBALS['C_ZYIIS']['clearing_monthdata'] == $d )
{
echo "<span  class='d2if'>ÔÂ½á</span>";
}
echo "<a href='do.php?action=stats&timerange=".$doYear."-".$doMonth."-".$d."/".$doYear."-".$doMonth."-".$d."'>".$d."</a></td>";
}
}
else
{
echo "<td bgcolor=#ffffff> </td>";
}
if ( $i %7 == 0 )
{
echo "</tr><tr>";
}
}
echo "                    </tr>\r\n                  </table></td>\r\n              </tr>\r\n          </table></td>\r\n        </tr>\r\n      </table>\r\n      <table width=\"95%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#FFFFFF\" >\r\n        <tr>\r\n          <td height=\"111\"  ><table width=\"96%\"  border=\"0\" align=\"center\" cellpadding=\"3\" cellspacing=\"1\" class=\"table1b\">\r\n              <tr>\r\n                <td height=\"30\" class=\"td-_obfuscate_le\"><strong>µ±ÈÕÐÂÔöÇé¿ö</strong></td>\r\n                <td class=\"td-_obfuscate_le\">&nbsp;</td>\r\n                <td class=\"td-_obfuscate_le\">&nbsp;</td>\r\n                <td class=\"td-_obfuscate_le\">&nbsp;</td>\r\n              </tr>\r\n              <tr>\r\n                <td class=\"td-_obfuscate_le\"><img src=\"/templates/";
echo Z_TPL;
echo "/images/add.gif\" border=\"0\" align=\"absmiddle\"> ÐÂÔö»áÔ± <a href=\"do.php?action=affiliate&amp;actiontype=waitact\">";
echo $addusernum;
echo "</a> ¸ö </td>\r\n                <td class=\"td-_obfuscate_le\"> µ±ÈÕÐÂÔöÍøÕ¾ <a href=\"do.php?action=site&status=0\">";
echo $addsitenum;
echo "</a> ¸ö</td>\r\n                <td class=\"td-_obfuscate_le\"> µ±ÈÕÐÂÔö¹ã¸æ <a href=\"do.php?action=ads&status=1\">";
echo $addadsnum;
echo "</a> ¸ö</td>\r\n                <td class=\"td-_obfuscate_le\"> Î´¶Á¶ÌÐÅ <a href=\"do.php?action=pm&isadmin=1\">";
echo $pmnum;
echo "</a> ¸ö</td>\r\n              </tr>\r\n              <tr>\r\n                <td>&nbsp;</td>\r\n                <td>&nbsp;</td>\r\n                <td>&nbsp;</td>\r\n                <td>&nbsp;</td>\r\n              </tr>\r\n            </table></td>\r\n        </tr>\r\n      </table>\r\n      ";
}
if ( $type == "system")
{
echo "      <table width=\"95%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#FFFFFF\">\r\n        <tr>\r\n          <td valign=\"top\"><table width=\"96%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n              <tr>\r\n                <td height=\"53\"><h2 class=\"page-title\">×é¼þÐÅÏ¢</h2></td>\r\n              </tr>\r\n            </table></td>\r\n        </tr>\r\n        <tr>\r\n          <td valign=\"top\"><table width=\"96%\" height=\"200\"  border=\"0\" align=\"center\" cellpadding=\"3\" cellspacing=\"0\" class=\"table1b\">\r\n              <tr class=\"t1\">\r\n                <td width=\"500\" class=\"locked\">MYSQL°æ±¾:</td>\r\n                <td  >";
echo $dbversion;
echo "</td>\r\n              </tr>\r\n              <tr class=\"t1\">\r\n                <td class=\"locked\">·þÎñÆ÷Ê±¼ä:</td>\r\n                <td>";
echo DATETIMES;
echo "</td>\r\n              </tr>\r\n              <tr class=\"t1\">\r\n                <td class=\"locked\">²Ù×÷ÏµÍ³¼° PHP:</td>\r\n                <td >";
echo $serverinfo;
echo "</td>\r\n              </tr>\r\n              <tr class=\"t1\">\r\n                <td class=\"locked\">ÎÄ¼þÉÏ´«:</td>\r\n                <td >";
if ( $fileupload )
{
$fileupload = "ÔÊÐí ".ini_get( "upload_max_filesize");
}
else
{
$fileupload = "<font color=\"red\">½ûÖ¹</font>";
}
echo $fileupload;
echo "                </td>\r\n              </tr>\r\n              <tr class=\"t1\">\r\n                <td class=\"locked\">Register_Globals:</td>\r\n                <td >";
echo $globals == 1 ?"´ò¿ª": "¹Ø±Õ";
echo "</td>\r\n              </tr>\r\n              <tr class=\"t1\">\r\n                <td class=\"locked\">GD Library:</td>\r\n                <td>";
echo $gd_version;
echo "</td>\r\n              </tr>\r\n              <tr class=\"t1\">\r\n                <td class=\"locked\">ÁªÃË°æ±¾:</td>\r\n                <td>V";
echo ZYIIS_VERSION;
echo "</td>\r\n              </tr>\r\n              <tr  >\r\n                <td  >&nbsp;</td>\r\n                <td>&nbsp;</td>\r\n              </tr>\r\n            </table></td>\r\n        </tr>\r\n        <tr>\r\n          <td valign=\"top\">&nbsp;</td>\r\n        </tr>\r\n      </table>\r\n      ";
}
if ( $type == "copyright")
{
echo "      <table width=\"95%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#FFFFFF\">\r\n        <tr>\r\n          <td valign=\"top\"><table width=\"96%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n              <tr>\r\n                <td height=\"53\"><h2 class=\"page-title\">ËùÓÐÈ¨ÉùÃ÷</h2></td>\r\n              </tr>\r\n            </table></td>\r\n        </tr>\r\n        <tr>\r\n          <td valign=\"top\"><table width=\"96%\"  border=\"0\" align=\"center\" cellpadding=\"3\" cellspacing=\"0\" class=\"table1b\">\r\n              <tr  >\r\n                <td  ><ul style=\"line-height:30px; padding:10px\">\r\n                    <li>ÖÐÒ×¹ãÁªÃËÏµÍ³ÊôÓÚ¸ÓÖÝÓ¯ÖÚÐÅÏ¢¿Æ¼¼ÓÐÏÞ¹«Ë¾°æÈ¨ËùÓÐ£¬¹Ù·½ÍøÕ¾£¨<a href=\"http://www.zyiis.com\" target=\"_blank\">www.zyiis.com</a>£©¡£ </li>\r\n                  </ul>\r\n¡¡                   </td>\r\n              </tr>\r\n              <tr  ></tr>\r\n            </table></td>\r\n        </tr>\r\n        <tr>\r\n          <td valign=\"top\">&nbsp;</td>\r\n        </tr>\r\n      </table>\r\n      <table width=\"95%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#FFFFFF\">\r\n        <tr>\r\n          <td valign=\"top\"><table width=\"96%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n              <tr>\r\n                <td height=\"53\"><h2 class=\"page-title\">°æÈ¨ÉùÃ÷</h2></td>\r\n              </tr>\r\n            </table></td>\r\n        </tr>\r\n        <tr>\r\n          <td valign=\"top\"><table width=\"96%\"  border=\"0\" align=\"center\" cellpadding=\"3\" cellspacing=\"0\" class=\"table1b\">\r\n              <tr  >\r\n                <td  ><ul style=\"line-height:30px; padding:10px\">\r\n                    <li>1¡¢±¾Èí¼þÎªÉÌÒµÈí¼þ,Î´¾­¹Ù·½ÊÚÈ¨£¬²»µÃÏòÈÎºÎµÚÈý·½Ìá¹©±¾Èí¼þÏµÍ³¡£ </li>\r\n                    <li>2¡¢±¾Èí¼þÊÜÖÐ»ªÈËÃñ¹²ºÍ¹ú¡¶Öø×÷È¨·¨¡·¡¶¼ÆËã»úÈí¼þ±£»¤ÌõÀý¡·µÈÏà¹Ø·¨ÂÉ¡¢·¨¹æ±£»¤£¬×÷Õß±£ÁôÒ»ÇÐÈ¨Àû¡£ </li>\r\n                    <li>3¡¢ÓÃ»§×ÔÓÉÑ¡ÔñÊÇ·ñÊ¹ÓÃ,ÔÚÊ¹ÓÃÖÐ³öÏÖÈÎºÎÎÊÌâºÍÓÉ´ËÔì³ÉµÄÒ»ÇÐËðÊ§ÖÐÒ×Èí¼þ½«²»³Ðµ£ÈÎºÎÔðÈÎ¡£ </li>\r\n                    <li>4¡¢ÈÎºÎ¹«Ë¾»òÊÇÈË¸öµÁ°æ»òÊÇÆÆ½âÖÐÒ×Èí¼þÐÐÎª,½«³Ðµ£È«²¿ÔðÈÎ ¡£ </li>\r\n                    <li>5¡¢Èç¹ûÖÐÒ×È·¶¨ËûÈËÐÐÎªÓÐËðÆäÆóÒµµÄÀûÒæ£¬ÔòÖÐÒ×ºÍÆä¹ØÁªÆóÒµ»òÊÇ¸öÈË½«¶ÔÆä½øÐÐ·¨ÂÉËßËÏÒÔ±£ÕÏ×ÔÉíÈ¨Òæ¡£ </li>\r\n                  </ul>\r\n¡¡                   </td>\r\n              </tr>\r\n              <tr  ></tr>\r\n            </table></td>\r\n        </tr>\r\n        <tr>\r\n          <td valign=\"top\">&nbsp;</td>\r\n        </tr>\r\n      </table>\r\n      <table width=\"95%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#FFFFFF\">\r\n        <tr>\r\n          <td valign=\"top\"><table width=\"96%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n              <tr>\r\n                <td height=\"53\"><h2 class=\"page-title\">ÃâÔðÉùÃ÷</h2></td>\r\n              </tr>\r\n            </table></td>\r\n        </tr>\r\n        <tr>\r\n          <td valign=\"top\"><table width=\"96%\"  border=\"0\" align=\"center\" cellpadding=\"3\" cellspacing=\"0\" class=\"table1b\">\r\n              <tr  >\r\n                <td  ><ul style=\"line-height:30px; padding:10px\">\r\n                    <li>ÈÎºÎ¹«Ë¾»òÊÇ¸öÈËËù¹ºÂòµÄÖÐÒ×²úÆ·ÔË×÷µÄÁªÃË£¬ÖÐÒ×Èí¼þÃ÷È·µØÉùÃ÷¾Í¸ÃÁªÃËµÄ¿É¿¿ÐÔ °²È«ÐÔ,ÔÚÔËÓªµÄ¹ý³ÌÖÐËùÓÐÓÉÓÃ»§×Ô¼ºËù·¢²¼µÄ¹ã¸æ»òÊÇÆäËüµÚÈý·½ÐÅÏ¢ËùÒýÆðµÄÒ»ÇÐÎÊÌâ»ò¾À·×£¬±¾Èí¼þ¸Å²»³Ðµ£ÈÎºÎÔðÈÎ£¬Ò²²»Ìá¹©ÈÎºÎÃ÷È·µÄ»ò°µÊ¾µÄ±£Ö¤¡£ </li>\r\n                  </ul>\r\n¡¡                   </td>\r\n              </tr>\r\n              <tr  ></tr>\r\n            </table></td>\r\n        </tr>\r\n        <tr>\r\n          <td valign=\"top\">&nbsp;</td>\r\n        </tr>\r\n      </table>\r\n      <table width=\"95%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#FFFFFF\">\r\n        <tr>\r\n          <td valign=\"top\"><table width=\"96%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n              <tr>\r\n                <td height=\"53\"><h2 class=\"page-title\">ÁªÏµ·½Ê½</h2></td>\r\n              </tr>\r\n            </table></td>\r\n        </tr>\r\n        <tr>\r\n          <td valign=\"top\"><table width=\"96%\"  border=\"0\" align=\"center\" cellpadding=\"3\" cellspacing=\"0\" class=\"table1b\">\r\n              <tr  >\r\n                <td  ><ul style=\"line-height:30px; padding:10px\">\r\n                    <li>¹«Ë¾Ãû³Æ£º¸ÓÖÝÓ¯ÖÚÐÅÏ¢¿Æ¼¼ÓÐÏÞ¹«Ë¾<br>\r\n                      The YingZhong Network Science and Technology CO.Ltd </li>\r\n                    <li>Q Q£º381611116&nbsp;&nbsp;&nbsp; 599682&nbsp;&nbsp;&nbsp; 93714 </li>\r\n                    <li>×ÉÑ¯µç»°£º<span id=\"A_KFDH\">0797-8126582</span> </li>\r\n                    <li>·ÇÉÏ°àÊ±¼ä£º<span id=\"A_KFDH\">13807972686</span></li>\r\n                    <li>ÐÅÏä£º<a href=\"mailto:a@zyiis.com\">a@zyiis.com</a> </li>\r\n                    <li>MSN£º<a href=\"msnim:chat?contact=zjq8188@hotmail.com\">zjq8188@hotmail.com</a></li>\r\n                  </ul>\r\n¡¡                   </td>\r\n              </tr>\r\n              <tr  ></tr>\r\n            </table></td>\r\n        </tr>\r\n        <tr>\r\n          <td valign=\"top\">&nbsp;</td>\r\n        </tr>\r\n      </table>\r\n \r\n\t  \r\n\t   ";
}
if ( $type == "server")
{
echo "      <table width=\"95%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#FFFFFF\">\r\n        <tr>\r\n          <td valign=\"top\">&nbsp;</td>\r\n        </tr>\r\n        <tr>\r\n          <td valign=\"top\">\r\n\t\t   <table width=\"96%\" height=\"30\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n  <tr>\r\n    <td><span class=\"td-_obfuscate_le\"><img src=\"/templates/";
echo Z_TPL;
echo "/images/bulb.gif\" border=\"0\" align=\"absmiddle\" />Ö»Õë¶ÔLinuxÏµÍ³¼ì²â¡£</span></td>\r\n    </tr>\r\n</table>\r\n\r\n\t\t";
$server = explode( ",",$GLOBALS['C_ZYIIS']['sync_setting'].",".$GLOBALS['C_ZYIIS']['authorized_url'] );
foreach ( $server as $key =>$val )
{
if ( $val )
{
echo "\t\t  <table width=\"96%\"  border=\"0\" align=\"center\" cellpadding=\"3\" cellspacing=\"0\" class=\"table1b\" style=\"margin-top:10px\">\r\n              <tr >\r\n                <td style=\"padding:10px\"><h2 class=\"page-title\">";
echo $val;
echo "</h2></td>\r\n              </tr>\r\n              <tr  >\r\n                <td style=\"padding:10px\"><table width=\"700\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n                  <tr>\r\n                    <td width=\"60\" height=\"40\">CPU£º</td>\r\n                    <td><span class=\"slpb\"><span style=\"width:0%;\" class=\"slpt\" id=\"cpus";
echo $key;
echo "\" ></span> </span> <span id=\"cpun";
echo $key;
echo "\" style=\"padding-left:310px; padding-top:10px;display:block\">·ÖÎöÖÐ..</span></td>\r\n                  </tr>\r\n                </table></td>\r\n              </tr>\r\n              \r\n            </table>\r\n\t\t\t<script language=\"JavaScript\" type=\"text/javascript\">\r\n\t\t\t\tloadings('";
echo $val;
echo "','";
echo $key;
echo "');\r\n\t\t\t</script>\t\r\n\t\t\t";
}
}
echo "\t\t\t\t\t\r\n\t\t  </td>\r\n        </tr>\r\n        <tr>\r\n          <td valign=\"top\">&nbsp;</td>\r\n        </tr>\r\n      </table>\r\n      <table width=\"95%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#FFFFFF\">\r\n        <tr>\r\n          <td valign=\"top\">&nbsp;</td>\r\n        </tr>\r\n        <tr>\r\n          <td valign=\"top\">&nbsp;</td>\r\n        </tr>\r\n        <tr>\r\n          <td valign=\"top\">&nbsp;</td>\r\n        </tr>\r\n      </table>\r\n      <table width=\"95%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#FFFFFF\">\r\n        <tr>\r\n          <td valign=\"top\">&nbsp;</td>\r\n        </tr>\r\n        <tr>\r\n          <td valign=\"top\">&nbsp;</td>\r\n        </tr>\r\n        <tr>\r\n          <td valign=\"top\">&nbsp;</td>\r\n        </tr>\r\n      </table>\r\n      <table width=\"95%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#FFFFFF\">\r\n        <tr>\r\n          <td valign=\"top\">&nbsp;</td>\r\n        </tr>\r\n        <tr>\r\n          <td valign=\"top\">&nbsp;</td>\r\n        </tr>\r\n        <tr>\r\n          <td valign=\"top\">&nbsp;</td>\r\n        </tr>\r\n      </table>\r\n      ";
}
echo "\t  \r\n      <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n        <tr>\r\n          <td>&nbsp;</td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n</table>\r\n\r\n<script language=\"JavaScript\" type=\"text/javascript\">\r\n";
if ( $dbs == "no")
{
}
echo "</script>\r\n \r\n\r\n";
include( TPL_DIR."/footer.php");

?>