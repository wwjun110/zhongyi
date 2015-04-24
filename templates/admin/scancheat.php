<?php

if ( !defined( "IN_ZYADS") ){
exit( );
}
include( TPL_DIR."/header.php");
$time = $_SERVER['REQUEST_TIME'];
$i = 0;
for ( ;$i <= 7;++$i	)
{
$zerotime = $time -$time %86400 -$i * 86400;
$timeo = date( "Y-m-d",$zerotime );
$option .= "<option value='".$zerotime."'>".$timeo."</option>";
}
echo "<style type=\"text/css\">\r\n<!--\r\n.STYLE1 {\r\n\tcolor: #FF0000;\r\n\tfont-weight: bold;\r\n}\r\n-->\r\n</style>\r\n<script language=\"JavaScript\" src=\"/javascript/jiandate.js\"></script>\r\n<script src=\"/javascript/jquery/jquery.js\" type=\"text/javascript\"></script>\r\n<script src=\"/javascript/function.js\" language='JavaScript'></script>\r\n<script language=\"JavaScript\" type=\"text/javascript\" src=\"/javascript/jquery/thickbox.js\"></script>\r\n<link href=\"/javascript/jquery/css/thickbox.css\" rel=\"stylesheet\" type=\"text/css\" />\r\n\r\n<table align=\"center\" width=\"95%\" cellspacing=\"0\" cellpadding=\"0\"\r\n\tborder=\"0\" bgcolor=\"#FFFFFF\">\r\n\t<tr>\r\n\t\t<td valign=\"top\">\r\n\t\t<table align=\"center\" width=\"97%\" cellspacing=\"0\" cellpadding=\"0\"\r\n\t\t\tborder=\"0\">\r\n\t\t\t<tr>\r\n\t\t\t\t<td>&nbsp;</td>\r\n\t\t\t</tr>\r\n\t\t\t<tr>\r\n\t\t\t  <td height=\"50\">\r\n\t\t\t  <form action=\"\">\r\n\t\t\t  <input type=\"hidden\" name=\"action\" value=\"scancheat\"/>\r\n\t\t\t  网站主ID:<input type=\"text\" size=\"4\" value=\"";
echo $_REQUEST['userid'];
echo "\" name=\"userid\"/>\r\n\t\t\t  站点ID:<input type=\"text\" size=\"4\" value=\"";
echo $_REQUEST['siteid'];
echo "\" name=\"siteid\"/>\r\n\t\t\t  <select name=\"timerange\" id=\"timerange\" style=\"width:200px\">\r\n\t\t\t  ";
if ( !empty( $_REQUEST['timerange'] ) )
{
echo "\t\t\t\t\t\t<option value=\"";
echo $_REQUEST['timerange'];
echo "\">";
echo str_replace( "/","至",$_REQUEST['timerange'] );
echo "</option>\r\n\t\t\t  ";
}
else
{
echo "                      <option value=\"";
echo date( "Y-m-d");
echo " / ";
echo date( "Y-m-d");
echo "\">";
echo date( "Y-m-d");
echo " 至 ";
echo date( "Y-m-d");
echo "</option>\r\n\t\t\t  ";
}
echo "                      <option value=\"\">所有时间段</option>\r\n              </select><img src=\"/javascript/images/calendar.gif\" align=\"absmiddle\" id=\"abd\" onclick=\"d.a('timerange','timerange','2')\">\r\n\t\t\t  &nbsp;<input name=\"Submit\" type=\"submit\" class=\"submit-x\" id=\"Submit\" value=\"查询\">\r\n\t\t\t  &nbsp;&nbsp;<span class=\"STYLE1\">*本数据主要看鼠标，滚屏和停留，还要结合投放页面做综合分析得出网站的综合质量。<font color=\"#ffccff\">本颜色标示的字段可能有作弊嫌疑。</font><a href=\"/chect.php\" target=\"_blank\">更新统计</a></span></form>\r\n\t\t\t  </td>\r\n\t\t\t</tr>\r\n\t\t\t<tr>\r\n\t\t\t\t<td bgcolor=\"#000000\">\r\n\t\t\t\t<form action=\"do.php?action=scancheat&amp;actiontype=del\"\r\n\t\t\t\t\tmethod=\"post\" name=\"form\" id=\"form\"><input type=\"hidden\" value=\"\"\r\n\t\t\t\t\tid=\"choosetype\" name=\"choosetype\">\r\n\t\t\t\t  <table width=\"100%\" cellspacing=\"1\" cellpadding=\"3\" border=\"0\"\r\n\t\t\t\t\tstyle=\"border: 0px #DFDFDF solid\">\r\n\t\t\t\t\t<tr>\r\n\t\t\t\t\t\t<td width=\"50\" height=\"33\" bgcolor=\"#80BDCB\" rowspan=\"2\" align=\"center\"><strong>用户ID</strong></td>\r\n\t\t\t\t\t\t<td bgcolor=\"#80BDCB\" rowspan=\"2\" align=\"center\"><strong>站点</strong></td>\r\n\t\t\t\t\t\t<td width=\"65\" bgcolor=\"#80BDCB\" rowspan=\"2\" align=\"center\"><strong>抽样数</strong></td>\r\n\t\t\t\t\t\t<td colspan=\"4\" width=\"240\" bgcolor=\"#80BDCB\" align=\"center\"><strong>鼠标轨迹变动次数</strong></td>\r\n\t\t\t\t\t\t<td colspan=\"4\" width=\"240\" bgcolor=\"#80BDCB\" align=\"center\"><strong>滚动条变动次数</strong></td>\r\n\t\t\t\t\t\t<td colspan=\"4\" width=\"240\" bgcolor=\"#80BDCB\" align=\"center\"><strong>网页停留时间</strong></td>\r\n\t\t\t\t\t\t<td width=\"80\" bgcolor=\"#80BDCB\" rowspan=\"2\" align=\"center\"><strong>日期</strong></td>\r\n\t\t\t\t\t\t<TD WIDTH=\"60\" bgcolor=\"#80BDCB\" rowspan=\"2\" align=\"center\"><STRONG>结论</strong></TD>\r\n\t\t\t\t\t\t<TD WIDTH=\"60\" bgcolor=\"#80BDCB\" rowspan=\"2\" align=\"center\"><STRONG>详细报表</strong></TD>\r\n\t\t\t\t\t</tr>\r\n\t\t\t\t\t<tr>\r\n\t\t\t\t\t\t<td width=\"60\" bgcolor=\"#80BDCB\" align=\"center\"><strong>1次</strong></td>\r\n\t\t\t\t\t\t<td width=\"60\" bgcolor=\"#80BDCB\" align=\"center\"><strong>3次</strong></td>\r\n\t\t\t\t\t\t<td width=\"60\" bgcolor=\"#80BDCB\" align=\"center\"><strong>5次</strong></td>\r\n\t\t\t\t\t\t<td width=\"60\" bgcolor=\"#80BDCB\" align=\"center\"><strong>10次</strong></td>\r\n\t\t\t\t\t\t<td width=\"60\" bgcolor=\"#80BDCB\" align=\"center\"><strong>1次</strong></td>\r\n\t\t\t\t\t\t<td width=\"60\" bgcolor=\"#80BDCB\" align=\"center\"><strong>3次</strong></td>\r\n\t\t\t\t\t\t<td width=\"60\" bgcolor=\"#80BDCB\" align=\"center\"><strong>5次</strong></td>\r\n\t\t\t\t\t\t<td width=\"60\" bgcolor=\"#80BDCB\" align=\"center\"><strong>10次</strong></td>\r\n\t\t\t\t\t\t<td width=\"60\" bgcolor=\"#80BDCB\" align=\"center\"><strong>5秒</strong></td>\r\n\t\t\t\t\t\t<td width=\"60\" bgcolor=\"#80BDCB\" align=\"center\"><strong>10秒</strong></td>\r\n\t\t\t\t\t\t<td width=\"60\" bgcolor=\"#80BDCB\" align=\"center\"><strong>15秒</strong></td>\r\n\t\t\t\t\t\t<td width=\"60\" bgcolor=\"#80BDCB\" align=\"center\"><strong>30秒</strong></td>\r\n\t\t\t\t\t</tr>\r\n";
if ( is_array( $stats ) )
{
foreach ( $stats as $values )
{
$zb = FALSE;
$ky = FALSE;
if ( !empty( $sites_info[$values['siteid']]['uid'] ) )
{
echo "    <tr>\r\n\t\t<td height=\"33\" bgcolor=\"#FFFFFF\">\r\n\t\t\t<a href=\"?action=affiliate&actiontype=search&searchval=";
echo $sites_info[$values['siteid']]['uid'];
echo "&searchtype=2\" target=\"_blank\">";
echo $sites_info[$values['siteid']]['uid'];
echo "</a>\r\n\t\t</td>\r\n\t\t<td bgcolor=\"#FFFFFF\">\r\n\t\t\t<strong>[";
echo $values['siteid'];
echo "]</strong> <a href=\"http://";
echo $sites_info[$values['siteid']]['siteurl'];
echo "\" target=\"_blank\" title=\"";
echo $sites_info[$values['siteid']]['sitename'];
echo "\"> ";
echo $sites_info[$values['siteid']]['siteurl'];
echo "</a>\r\n\t\t</td>\r\n\t\t<td bgcolor=\"#FFFFFF\">\r\n\t\t\t<div align=\"center\">";
echo $values['pv'];
echo "</div>\r\n\t\t</td>\r\n\t\t";
if ( $values['m1_p'] <= 60 &&50 <= $values['pv'] )
{
$ky = TRUE;
}
if ( $values['m1_p'] <= 30 &&50 <= $values['pv'] )
{
$zb = TRUE;
}
echo "\t\t<td bgcolor=\"";
echo $zb ?"#ff3366": $ky ?"#ffccff": "#FFFFFF";
echo "\">\r\n\t\t\t<div align=\"center\" title=\"";
echo $values['m1'];
echo "\">";
echo $values['m1_p'];
echo "%</div>\r\n\t\t</td>\r\n\t\t<td bgcolor=\"#FFFFFF\">\r\n\t\t\t<div align=\"center\" title=\"";
echo $values['m3'];
echo "\">";
echo $values['m3_p'];
echo "%</div>\r\n\t\t</td>\r\n\t\t<td bgcolor=\"#FFFFFF\">\r\n\t\t\t<div align=\"center\" title=\"";
echo $values['m5'];
echo "\">";
echo $values['m5_p'];
echo "%</div>\r\n\t\t</td>\r\n\t\t<td bgcolor=\"#FFFFFF\">\r\n\t\t\t<div align=\"center\" title=\"";
echo $values['m10'];
echo "\">";
echo $values['m10_p'];
echo "%</div>\r\n\t\t</td>\r\n";
if ( $values['c1_p'] <= 30 )
{
$ky = TRUE;
}
echo "\t\t<td bgcolor=\"";
echo $values['c1_p'] <= 30 &&50 <= $values['pv'] ?"#ffccff": "#FFFFFF";
echo "\">\r\n\t\t\t<div align=\"center\" title=\"";
echo $values['c1'];
echo "\">";
echo $values['c1_p'];
echo "%</div>\r\n\t\t</td>\r\n\t\t<td bgcolor=\"#FFFFFF\">\r\n\t\t\t<div align=\"center\" title=\"";
echo $values['c3'];
echo "\">";
echo $values['c3_p'];
echo "%</div>\r\n\t\t</td>\r\n\t\t<td bgcolor=\"#FFFFFF\">\r\n\t\t\t<div align=\"center\" title=\"";
echo $values['c5'];
echo "\">";
echo $values['c5_p'];
echo "%</div>\r\n\t\t</td>\r\n\t\t<td bgcolor=\"#FFFFFF\">\r\n\t\t\t<div align=\"center\" title=\"";
echo $values['c10'];
echo "\">";
echo $values['c10_p'];
echo "%</div>\r\n\t\t</td>\r\n\t<!-- <td bgcolor=\"#FFFFFF\">\r\n\t\t\t<div align=\"center\" title=\"";
echo $values['s1'];
echo "\">";
echo $values['s1_p'];
echo "%</div>\r\n\t\t</td>-->\r\n";
if ( $values['s5_p'] <= 50 )
{
$ky = TRUE;
}
if ( $values['s5_p'] <= 30 )
{
$zb = TRUE;
}
echo "\t\t<td bgcolor=\"";
echo $values['s5_p'] <= 30 &&50 <= $values['pv'] ?"#ff3366": $values['s5_p'] <= 50 &&50 <= $values['pv'] ?"#ffccff": "#FFFFFF";
echo "\">\r\n\t\t\t<div align=\"center\" title=\"";
echo $values['s5'];
echo "\">";
echo $values['s5_p'];
echo "%</div>\r\n\t\t</td>\r\n\t\t<td bgcolor=\"#FFFFFF\">\r\n\t\t\t<div align=\"center\" title=\"";
echo $values['s10'];
echo "\">";
echo $values['s10_p'];
echo "%</div>\r\n\t\t</td>\r\n\t\t<td bgcolor=\"#FFFFFF\">\r\n\t\t\t<div align=\"center\" title=\"";
echo $values['s15'];
echo "\">";
echo $values['s15_p'];
echo "%</div>\r\n\t\t</td>\r\n\t\t<td bgcolor=\"#FFFFFF\">\r\n\t\t\t<div align=\"center\" title=\"";
echo $values['s30'];
echo "\">";
echo $values['s30_p'];
echo "%</div>\r\n\t\t</td>\r\n\t\t<td bgcolor=\"#FFFFFF\">\r\n\t\t\t<div align=\"center\">";
echo $values['unixtime'];
echo "</div>\r\n\t\t</td>\r\n\t\t<td bgcolor=\"#FFFFFF\">\r\n\t\t\t<div align=\"center\">\r\n";
if ( $values['pv'] <50 )
{
$zb = $ky = FALSE;
}
echo $zb ?"<font color=\"red\"><strong>作弊</strong></font>": $ky ?"<font color=\"blue\"><strong>可疑</strong></font>": "正常";
echo "</div>\r\n\t\t</td>\r\n\t\t<td bgcolor=\"#FFFFFF\"><a class=\"thickbox\" href=\"do.php?action=adsip&timerange=";
echo $values['unixtime'];
echo "&actiontype=search&searchval=";
echo $sites_info[$values['siteid']]['uid'];
echo "&searchtype=1&TB_iframe=true?&height=500&width=1100\">详细报表</a></td>\r\n</tr>\r\n";
}
}
}
echo "              </table>\r\n\t\t\t\t</form>\r\n\t\t\t  </td>\r\n\t\t\t</tr>\r\n\t\t\t<tr>\r\n\t\t\t\t<td height=\"50\">\r\n\t\t\t\t<table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\">\r\n\t\t\t\t\t<tr>\r\n\t\t\t\t\t\t<td width=\"200\">&nbsp;</td>\r\n\t\t\t\t\t\t<td align=\"right\">";
echo $viewpage;
echo "</td>\r\n\t\t\t\t\t</tr>\r\n\t\t\t\t</table>\r\n\t\t\t\t</td>\r\n\t\t\t</tr>\r\n\t\t</table>\r\n\t\t</td>\r\n\t</tr>\r\n</table>\r\n";
include( TPL_DIR."/footer.php");

?>