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
echo "\"> <a href=\"do.php?action=index\"><span>�������</span></a> </li>\r\n\t\t\t\r\n                    <li class=\"";
if ( $type == "system")
{
echo "active";
}
else
{
echo "link";
}
echo "\"> <a   href=\"do.php?action=index&type=system\"><span>�汾��Ϣ</span></a> </li>\r\n                    <li class=\"";
if ( $type == "copyright")
{
echo "active";
}
else
{
echo "link";
}
echo "\"> <a   href=\"do.php?action=index&type=copyright\"><span>��Ȩ����</span></a> </li>\t\t \r\n\t\t\t\t\t";
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
echo "\"> <a   href=\"do.php?action=index&type=server\"><span>����������</span></a></li>\r\n\t\t\t\t\t";
}
echo "                  </ul>\r\n                </div>\r\n              </div>\r\n            </div></td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n</table>\r\n<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" id=\"page\">\r\n  <tr>\r\n    <td>";
if ( $type == "")
{
echo "      <table width=\"95%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n        <tr>\r\n          <td width=\"65%\"  valign=\"top\" bgcolor=\"#FFFFFF\">\r\n\t\t \r\n\t\t  <table width=\"96%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n\t\t    <div style=\"margin-top:10px; display:none\" id=\"updates\"></div>\r\n              <tr>\r\n                <td height=\"50\"><span style=\" font-size:14px; font-weight:bold\">����PV��";
echo $views;
echo "</span> </td>\r\n              </tr>\r\n              <tr>\r\n                <td><div id=\"w\"> <strong>You need to upgrade your Flash Player</strong>\r\n                      <script type=\"text/javascript\">\t\r\n\t\t\t\t\t\tvar so = new SWFObject(\"/templates/admin/charts/line.swf\", \"amcolumn\", \"100%\", \"250\", \"8\", \"#FFFFFF\");\r\n\t\t\t\t\t\tso.addVariable(\"path\", \"/templates/admin/charts/\");\r\n\t\t\t\t\t\tso.addVariable(\"settings_file\", escape(\"/templates/admin/charts/line_settings.xml\")); \r\n\t\t\t\t\t\tso.addVariable(\"data_file\", escape(\"dos.php?action=trenddata&actiontype=day";
echo DAYS."/".DAYS;
echo "dos.php?action=trenddata&actiontype=day\"));\t\t\r\n\t\t\t\t\t\tso.addVariable(\"preloader_color\", \"#999999\");\t\r\n\t\t\t\t\t\tso.write(\"w\");\r\n\t\t\t\t\t</script>\r\n                  </div></td>\r\n              </tr>\r\n            </table></td>\r\n          <td width=\"35%\" valign=\"top\"><table width=\"100%\" cellpadding=\"0\" cellspacing=\"1\" bgcolor=\"dddddd\" align=center style=\"border-left:1px solid #DDDDDD;border-top:0px solid #dddddd; border-bottom:1px solid #DDDDDD;\">\r\n              <tr align=\"center\" bgcolor=\"#CCCCCC\">\r\n                <td height=\"30\" colspan=\"7\"align=\"left\" style=\"color:#333; font-size:18px; background-color:#eeeeee; padding-left:10px\">����</td>\r\n              </tr>\r\n              <tr align=\"center\" bgcolor=\"#CCCCCC\">\r\n                <td height=\"19\" bgcolor=\"#F8F8F8\"><table width=\"98%\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#eeeeee\" align=center>\r\n                    <tr align=\"center\" bgcolor=\"#CCCCCC\">\r\n                      <td height=\"25\" colspan=\"7\" align=\"left\" bgcolor=\"#F8F8F8\" style=\"color:#333;padding-left:10px;font-size:20px;\">";
echo date( "Y",TIMES );
echo "��";
echo date( "m",TIMES );
echo "��</td>\r\n                    </tr>\r\n                    <tr align=\"center\" bgcolor=\"#CCCCCC\">\r\n                      <td width=\"14%\" height=\"19\" bgcolor=\"#F8F8F8\"> ��</td>\r\n                      <td width=\"14%\" bgcolor=\"#F8F8F8\"> һ</td>\r\n                      <td width=\"14%\" bgcolor=\"#F8F8F8\"> ��</td>\r\n                      <td width=\"14%\" bgcolor=\"#F8F8F8\"> ��</td>\r\n                      <td width=\"14%\" bgcolor=\"#F8F8F8\"> ��</td>\r\n                      <td width=\"14%\" bgcolor=\"#F8F8F8\"> ��</td>\r\n                      <td width=\"14%\" height=\"25\" bgcolor=\"#F8F8F8\"> ��</td>\r\n                    </tr>\r\n                  </table>\r\n                  <table width=\"98%\" cellpadding=\"0\" cellspacing=\"1\" bgcolor=\"#eeeeee\" align=center>\r\n                    <tr align=center>\r\n                      ";
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
echo "<span  class='d2if'>����</span>";
}
if ( $GLOBALS['C_ZYIIS']['clearing_monthdata'] == $d )
{
echo "<span  class='d2if'>�½�</span>";
}
echo "<a href='do.php?action=stats&timerange=".$doYear."-".$doMonth."-".$d."/".$doYear."-".$doMonth."-".$d."' >".$d."</a></td>";
}
else
{
echo "<td align=center height=41 bgcolor=#ffffff style='position:relative;width:14.3%'>";
if ( $GLOBALS['C_ZYIIS']['clearing_weekdata'] == $ws )
{
echo "<span class='d2if'>�ܽ�</span>";
}
if ( $GLOBALS['C_ZYIIS']['clearing_monthdata'] == $d )
{
echo "<span  class='d2if'>�½�</span>";
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
echo "                    </tr>\r\n                  </table></td>\r\n              </tr>\r\n          </table></td>\r\n        </tr>\r\n      </table>\r\n      <table width=\"95%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#FFFFFF\" >\r\n        <tr>\r\n          <td height=\"111\"  ><table width=\"96%\"  border=\"0\" align=\"center\" cellpadding=\"3\" cellspacing=\"1\" class=\"table1b\">\r\n              <tr>\r\n                <td height=\"30\" class=\"td-_obfuscate_le\"><strong>�����������</strong></td>\r\n                <td class=\"td-_obfuscate_le\">&nbsp;</td>\r\n                <td class=\"td-_obfuscate_le\">&nbsp;</td>\r\n                <td class=\"td-_obfuscate_le\">&nbsp;</td>\r\n              </tr>\r\n              <tr>\r\n                <td class=\"td-_obfuscate_le\"><img src=\"/templates/";
echo Z_TPL;
echo "/images/add.gif\" border=\"0\" align=\"absmiddle\"> ������Ա <a href=\"do.php?action=affiliate&amp;actiontype=waitact\">";
echo $addusernum;
echo "</a> �� </td>\r\n                <td class=\"td-_obfuscate_le\"> ����������վ <a href=\"do.php?action=site&status=0\">";
echo $addsitenum;
echo "</a> ��</td>\r\n                <td class=\"td-_obfuscate_le\"> ����������� <a href=\"do.php?action=ads&status=1\">";
echo $addadsnum;
echo "</a> ��</td>\r\n                <td class=\"td-_obfuscate_le\"> δ������ <a href=\"do.php?action=pm&isadmin=1\">";
echo $pmnum;
echo "</a> ��</td>\r\n              </tr>\r\n              <tr>\r\n                <td>&nbsp;</td>\r\n                <td>&nbsp;</td>\r\n                <td>&nbsp;</td>\r\n                <td>&nbsp;</td>\r\n              </tr>\r\n            </table></td>\r\n        </tr>\r\n      </table>\r\n      ";
}
if ( $type == "system")
{
echo "      <table width=\"95%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#FFFFFF\">\r\n        <tr>\r\n          <td valign=\"top\"><table width=\"96%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n              <tr>\r\n                <td height=\"53\"><h2 class=\"page-title\">�����Ϣ</h2></td>\r\n              </tr>\r\n            </table></td>\r\n        </tr>\r\n        <tr>\r\n          <td valign=\"top\"><table width=\"96%\" height=\"200\"  border=\"0\" align=\"center\" cellpadding=\"3\" cellspacing=\"0\" class=\"table1b\">\r\n              <tr class=\"t1\">\r\n                <td width=\"500\" class=\"locked\">MYSQL�汾:</td>\r\n                <td  >";
echo $dbversion;
echo "</td>\r\n              </tr>\r\n              <tr class=\"t1\">\r\n                <td class=\"locked\">������ʱ��:</td>\r\n                <td>";
echo DATETIMES;
echo "</td>\r\n              </tr>\r\n              <tr class=\"t1\">\r\n                <td class=\"locked\">����ϵͳ�� PHP:</td>\r\n                <td >";
echo $serverinfo;
echo "</td>\r\n              </tr>\r\n              <tr class=\"t1\">\r\n                <td class=\"locked\">�ļ��ϴ�:</td>\r\n                <td >";
if ( $fileupload )
{
$fileupload = "���� ".ini_get( "upload_max_filesize");
}
else
{
$fileupload = "<font color=\"red\">��ֹ</font>";
}
echo $fileupload;
echo "                </td>\r\n              </tr>\r\n              <tr class=\"t1\">\r\n                <td class=\"locked\">Register_Globals:</td>\r\n                <td >";
echo $globals == 1 ?"��": "�ر�";
echo "</td>\r\n              </tr>\r\n              <tr class=\"t1\">\r\n                <td class=\"locked\">GD Library:</td>\r\n                <td>";
echo $gd_version;
echo "</td>\r\n              </tr>\r\n              <tr class=\"t1\">\r\n                <td class=\"locked\">���˰汾:</td>\r\n                <td>V";
echo ZYIIS_VERSION;
echo "</td>\r\n              </tr>\r\n              <tr  >\r\n                <td  >&nbsp;</td>\r\n                <td>&nbsp;</td>\r\n              </tr>\r\n            </table></td>\r\n        </tr>\r\n        <tr>\r\n          <td valign=\"top\">&nbsp;</td>\r\n        </tr>\r\n      </table>\r\n      ";
}
if ( $type == "copyright")
{
echo "      <table width=\"95%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#FFFFFF\">\r\n        <tr>\r\n          <td valign=\"top\"><table width=\"96%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n              <tr>\r\n                <td height=\"53\"><h2 class=\"page-title\">����Ȩ����</h2></td>\r\n              </tr>\r\n            </table></td>\r\n        </tr>\r\n        <tr>\r\n          <td valign=\"top\"><table width=\"96%\"  border=\"0\" align=\"center\" cellpadding=\"3\" cellspacing=\"0\" class=\"table1b\">\r\n              <tr  >\r\n                <td  ><ul style=\"line-height:30px; padding:10px\">\r\n                    <li>���׹�����ϵͳ���ڸ���ӯ����Ϣ�Ƽ����޹�˾��Ȩ���У��ٷ���վ��<a href=\"http://www.zyiis.com\" target=\"_blank\">www.zyiis.com</a>���� </li>\r\n                  </ul>\r\n��                   </td>\r\n              </tr>\r\n              <tr  ></tr>\r\n            </table></td>\r\n        </tr>\r\n        <tr>\r\n          <td valign=\"top\">&nbsp;</td>\r\n        </tr>\r\n      </table>\r\n      <table width=\"95%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#FFFFFF\">\r\n        <tr>\r\n          <td valign=\"top\"><table width=\"96%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n              <tr>\r\n                <td height=\"53\"><h2 class=\"page-title\">��Ȩ����</h2></td>\r\n              </tr>\r\n            </table></td>\r\n        </tr>\r\n        <tr>\r\n          <td valign=\"top\"><table width=\"96%\"  border=\"0\" align=\"center\" cellpadding=\"3\" cellspacing=\"0\" class=\"table1b\">\r\n              <tr  >\r\n                <td  ><ul style=\"line-height:30px; padding:10px\">\r\n                    <li>1�������Ϊ��ҵ���,δ���ٷ���Ȩ���������κε������ṩ�����ϵͳ�� </li>\r\n                    <li>2����������л����񹲺͹�������Ȩ����������������������������ط��ɡ����汣�������߱���һ��Ȩ���� </li>\r\n                    <li>3���û�����ѡ���Ƿ�ʹ��,��ʹ���г����κ�������ɴ���ɵ�һ����ʧ������������е��κ����Ρ� </li>\r\n                    <li>4���κι�˾�����˸���������ƽ����������Ϊ,���е�ȫ������ �� </li>\r\n                    <li>5���������ȷ��������Ϊ��������ҵ�����棬�����׺��������ҵ���Ǹ��˽�������з��������Ա�������Ȩ�档 </li>\r\n                  </ul>\r\n��                   </td>\r\n              </tr>\r\n              <tr  ></tr>\r\n            </table></td>\r\n        </tr>\r\n        <tr>\r\n          <td valign=\"top\">&nbsp;</td>\r\n        </tr>\r\n      </table>\r\n      <table width=\"95%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#FFFFFF\">\r\n        <tr>\r\n          <td valign=\"top\"><table width=\"96%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n              <tr>\r\n                <td height=\"53\"><h2 class=\"page-title\">��������</h2></td>\r\n              </tr>\r\n            </table></td>\r\n        </tr>\r\n        <tr>\r\n          <td valign=\"top\"><table width=\"96%\"  border=\"0\" align=\"center\" cellpadding=\"3\" cellspacing=\"0\" class=\"table1b\">\r\n              <tr  >\r\n                <td  ><ul style=\"line-height:30px; padding:10px\">\r\n                    <li>�κι�˾���Ǹ�������������ײ�Ʒ���������ˣ����������ȷ�������͸����˵Ŀɿ��� ��ȫ��,����Ӫ�Ĺ������������û��Լ��������Ĺ�����������������Ϣ�������һ���������ף�������Ų��е��κ����Σ�Ҳ���ṩ�κ���ȷ�Ļ�ʾ�ı�֤�� </li>\r\n                  </ul>\r\n��                   </td>\r\n              </tr>\r\n              <tr  ></tr>\r\n            </table></td>\r\n        </tr>\r\n        <tr>\r\n          <td valign=\"top\">&nbsp;</td>\r\n        </tr>\r\n      </table>\r\n      <table width=\"95%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#FFFFFF\">\r\n        <tr>\r\n          <td valign=\"top\"><table width=\"96%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n              <tr>\r\n                <td height=\"53\"><h2 class=\"page-title\">��ϵ��ʽ</h2></td>\r\n              </tr>\r\n            </table></td>\r\n        </tr>\r\n        <tr>\r\n          <td valign=\"top\"><table width=\"96%\"  border=\"0\" align=\"center\" cellpadding=\"3\" cellspacing=\"0\" class=\"table1b\">\r\n              <tr  >\r\n                <td  ><ul style=\"line-height:30px; padding:10px\">\r\n                    <li>��˾���ƣ�����ӯ����Ϣ�Ƽ����޹�˾<br>\r\n                      The YingZhong Network Science and Technology CO.Ltd </li>\r\n                    <li>Q Q��381611116&nbsp;&nbsp;&nbsp; 599682&nbsp;&nbsp;&nbsp; 93714 </li>\r\n                    <li>��ѯ�绰��<span id=\"A_KFDH\">0797-8126582</span> </li>\r\n                    <li>���ϰ�ʱ�䣺<span id=\"A_KFDH\">13807972686</span></li>\r\n                    <li>���䣺<a href=\"mailto:a@zyiis.com\">a@zyiis.com</a> </li>\r\n                    <li>MSN��<a href=\"msnim:chat?contact=zjq8188@hotmail.com\">zjq8188@hotmail.com</a></li>\r\n                  </ul>\r\n��                   </td>\r\n              </tr>\r\n              <tr  ></tr>\r\n            </table></td>\r\n        </tr>\r\n        <tr>\r\n          <td valign=\"top\">&nbsp;</td>\r\n        </tr>\r\n      </table>\r\n \r\n\t  \r\n\t   ";
}
if ( $type == "server")
{
echo "      <table width=\"95%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#FFFFFF\">\r\n        <tr>\r\n          <td valign=\"top\">&nbsp;</td>\r\n        </tr>\r\n        <tr>\r\n          <td valign=\"top\">\r\n\t\t   <table width=\"96%\" height=\"30\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n  <tr>\r\n    <td><span class=\"td-_obfuscate_le\"><img src=\"/templates/";
echo Z_TPL;
echo "/images/bulb.gif\" border=\"0\" align=\"absmiddle\" />ֻ���Linuxϵͳ��⡣</span></td>\r\n    </tr>\r\n</table>\r\n\r\n\t\t";
$server = explode( ",",$GLOBALS['C_ZYIIS']['sync_setting'].",".$GLOBALS['C_ZYIIS']['authorized_url'] );
foreach ( $server as $key =>$val )
{
if ( $val )
{
echo "\t\t  <table width=\"96%\"  border=\"0\" align=\"center\" cellpadding=\"3\" cellspacing=\"0\" class=\"table1b\" style=\"margin-top:10px\">\r\n              <tr >\r\n                <td style=\"padding:10px\"><h2 class=\"page-title\">";
echo $val;
echo "</h2></td>\r\n              </tr>\r\n              <tr  >\r\n                <td style=\"padding:10px\"><table width=\"700\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n                  <tr>\r\n                    <td width=\"60\" height=\"40\">CPU��</td>\r\n                    <td><span class=\"slpb\"><span style=\"width:0%;\" class=\"slpt\" id=\"cpus";
echo $key;
echo "\" ></span> </span> <span id=\"cpun";
echo $key;
echo "\" style=\"padding-left:310px; padding-top:10px;display:block\">������..</span></td>\r\n                  </tr>\r\n                </table></td>\r\n              </tr>\r\n              \r\n            </table>\r\n\t\t\t<script language=\"JavaScript\" type=\"text/javascript\">\r\n\t\t\t\tloadings('";
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