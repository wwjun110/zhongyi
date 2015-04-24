<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

if ( !defined( "IN_ZYADS" ) )
{
		exit( );
}
include( TPL_DIR."/header.php" );
echo "<script LANGUAGE=\"JavaScript\" src=\"/javascript/jiandate.js\"></script>\r\n<script type=\"text/javascript\" src=\"/javascript/swfobject.js\"></script>\r\n\r\n<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" id=\"page\">\r\n  <tr>\r\n    <td><table width=\"95%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#FFFFFF\">\r\n        <tr>\r\n          <td  valign=\"top\">";
if ( $statetype == "success" )
{
		echo "            <table  border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#FFFFFF\" class=\"success\" id=\"success\" width=\"97%\" >\r\n              <tr>\r\n                <td height=\"30\"><img  src='/templates/";
		echo Z_TPL;
		echo "/images/ico_success_16.gif' align='absmiddle' /><span style=\"margin-left:10px;\">操作成功！</span></td>\r\n                <td>&nbsp;</td>\r\n              </tr>\r\n            </table>\r\n            <script language=\"JavaScript\" type=\"text/javascript\">\r\n\t\t\tnoneSuccess();\r\n\t\t\t</script>\r\n            ";
}
echo "            <table width=\"97%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n              <tr>\r\n                <td height=\"50\"><form action=\"\" method=\"post\">\r\n                  <select name=\"timerange\" id=\"timerange\" style=\"width:200px\">\r\n                      <option value=\"";
if ( $time_begin == "" )
{
		echo DAYS;
}
else
{
		echo $time_begin;
}
echo " / ";
if ( $time_end == "" )
{
		echo DAYS;
}
else
{
		echo $time_end;
}
echo "\">\r\n                      ";
if ( $time_begin == "" )
{
		echo DAYS;
}
else
{
		echo $time_begin;
}
echo " 至 ";
if ( $time_end == "" )
{
		echo DAYS;
}
else
{
		echo $time_end;
}
echo "                      </option>\r\n                      <option  value=\"a\" ";
echo $timerange == "a" ? "selected " : "";
echo ">所有时间段</option>\r\n                      <option value=\"t\" ";
echo $timerange == "t" ? " selected" : "";
echo " >昨天</option>\r\n                      <option value=\"w\" ";
if ( $timerange == "w" || $timerange == "" )
{
		echo " selected";
}
echo " >过去一周内</option>\r\n                      <option value=\"m\" ";
echo $timerange == "m" ? " selected" : "";
echo ">本月内</option>\r\n                      <option value=\"l\" ";
echo $timerange == "l" ? " selected" : "";
echo ">上月的</option>\r\n                    </select>\r\n                    <img src=\"/javascript/images/calendar.gif\" align=\"absmiddle\" id=\"abd\" onclick=\"d.a('timerange','timerange','2')\"/>\r\n                    <input name=\"Submit\" type=\"submit\" class=\"submit-x\" id=\"Submit\" value=\"查询\"/>\r\n                  </form></td>\r\n              </tr>\r\n              <tr>\r\n                <td><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" style=\"border:0px #DFDFDF solid\">\r\n                    <tr class=\"td_b_2\">\r\n                      <td width=\"5\" height=\"33\" class=\"td_b_l\" >&nbsp;</td>\r\n                      <td width=\"90\">日期</td>\r\n                      <td width=\"100\">浏览量</td>\r\n                      <td width=\"100\">结算数</td>\r\n                      <td width=\"80\">点击量</td>\r\n                      <td width=\"80\">效果数</td>\r\n                      <td width=\"90\">扣量</td>\r\n                      <td width=\"100\">二次点击</td>\r\n                      <td width=\"80\">CTR</td>\r\n                      <td width=\"100\">应付金额</td>\r\n                      <td>盈利</td>\r\n                      <th width=\"6\" class=\"td_b_3\" >&nbsp;</th>\r\n                    </tr>\r\n                    ";
if ( !$stats )
{
		echo "<tr><td height=\"60\"   class=\"td_b_4 \" id=\"b-bottom\" >&nbsp;</td>\r\n\t\t\t\t\t\t\t\t  <td colspan=\"10\" align=\"center\">无报表</td>\r\n\t\t\t\t\t\t\t\t  <td  class=\"td_b_5\">&nbsp;</td>\r\n\t\t\t\t\t\t\t\t</tr>";
}
foreach ( ( array )$stats as $s )
{
		echo "                    <tr >\r\n                      <td height=\"30\"  class=\"td_b_4\" id=\"b-bottom\" >&nbsp;</td>\r\n                      <td>";
		echo $s['day'];
		echo "</td>\r\n                      <td>";
		echo $s['views'];
		echo "</td>\r\n                      <td>";
		echo $s['num'];
		echo "</td>\r\n                      <td>";
		echo $s['clicks'];
		echo "</td>\r\n                      <td>";
		echo $s['orders'];
		echo "</td>\r\n                      <td>";
		echo $s['deduction'];
		echo "</td>\r\n                      <td>";
		echo $s['do2click'];
		echo "</td>\r\n                      <td>";
		echo ctr( $s['views'], $s['num'] + $s['deduction'] );
		echo "</td>\r\n                      <td>￥\r\n                        ";
		echo $s['sumpay'];
		echo "</td>\r\n                      <td>￥\r\n                        ";
		echo $s['sumprofit'];
		echo "</td>\r\n                      <td width=\"6\" class=\"td_b_5\">&nbsp;</td>\r\n                    </tr>\r\n                    ";
		$sumnum += $s['num'];
		$sumviews += $s['views'];
		$sumclicks += $s['clicks'];
		$sumdo2click += $s['do2click'];
		$sumorders += $s['orders'];
		$sumdodeduction += $s['deduction'];
		$sumsumpay += $s['sumpay'];
		$sumsumprofit += $s['sumprofit'];
}
echo "                    <tr  class=\"td_b_t td_b_m \">\r\n                      <td height=\"40\"   class=\"td_b_4\" id=\"b-bottom\" >&nbsp;</td>\r\n                      <td><strong>汇总</strong></td>\r\n                      <td>";
echo number_format( $sumviews );
echo "</td>\r\n                      <td>";
echo number_format( $sumnum );
echo "</td>\r\n                      <td>";
echo number_format( $sumclicks );
echo "</td>\r\n                      <td>";
echo number_format( $sumorders );
echo "</td>\r\n                      <td>";
echo number_format( $sumdodeduction );
echo "</td>\r\n                      <td>";
echo number_format( $sumdo2click );
echo "</td>\r\n                      <td>&nbsp;</td>\r\n                      <td>￥";
echo $sumsumpay;
echo "</td>\r\n                      <td>￥";
echo $sumsumprofit;
echo "</td>\r\n                      <td width=\"6\"  class=\"td_b_5\">&nbsp;</td>\r\n                    </tr>\r\n                  </table></td>\r\n              </tr>\r\n              <tr>\r\n                <td ><table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#efefef\" style=\"margin-top:10px;border:1px solid #DDDDDD;\">\r\n                    <tr>\r\n                      <td height=\"30\">&nbsp;&nbsp;<strong><script language=\"JavaScript\" type=\"text/javascript\">\r\nvar t = \$(\"#timerange\").find(\"option:selected\").text();  \r\ndocument.write(t);\r\n</script> ";
echo $plan['planname'];
echo " 的走势图</strong></td>\r\n                    </tr>\r\n                    <tr>\r\n                      <td height=\"200\" bgcolor=\"#FFFFFF\"><div id=\"w\"> <strong>You need to upgrade your Flash Player</strong> </div>\r\n                      <script type=\"text/javascript\">\t\r\n\t\tvar so = new SWFObject(\"/templates/";
echo Z_TPL;
echo "/charts/line.swf\", \"amcolumn\", \"100%\", \"250\", \"8\", \"#FFFFFF\");\r\n\t\tso.addVariable(\"path\", \"/templates/";
echo Z_TPL;
echo "/charts/\");\r\n\t\tso.addVariable(\"settings_file\", escape(\"/templates/";
echo Z_TPL;
echo "/charts/line_settings.xml\")); \r\n\t\tso.addVariable(\"data_file\", escape(\"dos.php?action=trenddata&actiontype=line&timerange=";
echo $timerange;
echo "&searchtype=";
echo $searchtype;
echo "&searchval=";
echo $searchval;
echo "\"));\t\t\r\n    \tso.addVariable(\"preloader_color\", \"#999999\");\t\r\n\t\tso.write(\"w\");\r\n\t</script></td>\r\n                    </tr>\r\n                  </table></td>\r\n              </tr>\r\n              <tr>\r\n                <td ><table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"margin-top:10px\">\r\n                  <tr>\r\n                    <td valign=\"top\" ><table width=\"95%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" style=\"border:0px #DFDFDF solid\">\r\n                      <tr class=\"td_b_2\">\r\n                        <td width=\"5\" height=\"33\" class=\"td_b_l\" >&nbsp;</td>\r\n                        <td>&nbsp;<strong>\r\n                          <script language=\"JavaScript\" type=\"text/javascript\">document.write(t);</script>\r\n                          计划排行前七名</strong></td>\r\n                        <th width=\"6\" class=\"td_b_3\" >&nbsp;</th>\r\n                      </tr>\r\n                       ";
foreach ( ( array )$topplan as $tp )
{
		$plan = $planmodel->admingetplanone( $tp['planid'] );
		$tn = $trendmodel->ctr( $tpsn, $tp['num'] );
		echo "                      <tr class=\"td_b_m \">\r\n                        <td height=\"30\"  class=\"td_b_4\"  >&nbsp;</td>\r\n                        <td><table width=\"99%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"td_b_m0\">\r\n                            <tr>\r\n                              <td>";
		echo $plan['planname'];
		echo "&nbsp;</td>\r\n                              <td width=\"80\">";
		echo $tn."%";
		echo "</td>\r\n                              <td width=\"120\"><div style=\"width:";
		echo $tn + 1;
		echo "px\" class=\"p1\">&nbsp;</div></td>\r\n                              <td width=\"90\" align=\"right\">";
		echo $tp['num'];
		echo "</td>\r\n                            </tr>\r\n                          </table>                          </td>\r\n                        <td width=\"6\" class=\"td_b_5\">&nbsp;</td>\r\n                      </tr>\r\n \t\t\t\t\t ";
}
echo "                     \r\n                    </table></td>\r\n                    <td width=\"50%\" align=\"right\" valign=\"top\"><table width=\"95%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" style=\"border:0px #DFDFDF solid\">\r\n                      <tr class=\"td_b_2\">\r\n                        <td width=\"5\" height=\"33\" class=\"td_b_l\" >&nbsp;</td>\r\n                        <td>&nbsp;<strong>\r\n                          <script language=\"JavaScript\" type=\"text/javascript\">document.write(t);</script>\r\n                          会员排行前七名</strong></td>\r\n                        <th width=\"6\" class=\"td_b_3\" >&nbsp;</th>\r\n                      </tr>\r\n                      ";
foreach ( ( array )$topuser as $tu )
{
		$user = $usermodel->admingetplanone( $tu['uid'] );
		$tn = $trendmodel->ctr( $tusn, $tu['num'] );
		echo "                      <tr class=\"td_b_m \">\r\n                        <td height=\"30\"  class=\"td_b_4\"  >&nbsp;</td>\r\n                        <td><table width=\"99%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"td_b_m0\">\r\n                            <tr>\r\n                              <td>";
		echo $user['username'];
		echo "&nbsp;</td>\r\n                              <td width=\"80\">";
		echo $tn."%";
		echo "</td>\r\n                              <td width=\"120\"><div style=\"width:";
		echo $tn + 1;
		echo "px\" class=\"p1\">&nbsp;</div></td>\r\n                              <td width=\"90\" align=\"right\">";
		echo $tu['num'];
		echo "</td>\r\n                            </tr>\r\n                        </table></td>\r\n                        <td width=\"6\" class=\"td_b_5\">&nbsp;</td>\r\n                      </tr>\r\n                      ";
}
echo "                    </table></td>\r\n                    </tr>\r\n                  <tr>\r\n                    <td>&nbsp;</td>\r\n                    <td>&nbsp;</td>\r\n                    </tr>\r\n                  \r\n                </table></td>\r\n              </tr>\r\n              <tr>\r\n                <td height=\"50\"><table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"margin-top:10px\">\r\n                  <tr>\r\n                    <td valign=\"top\" ><table width=\"95%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" style=\"border:0px #DFDFDF solid\">\r\n                        <tr class=\"td_b_2\">\r\n                          <td width=\"5\" height=\"33\" class=\"td_b_l\" >&nbsp;</td>\r\n                          <td>&nbsp;<strong>\r\n                            <script language=\"JavaScript\" type=\"text/javascript\">document.write(t);</script>\r\n                            网站排行前三十名</strong></td>\r\n                          <th width=\"6\" class=\"td_b_3\" >&nbsp;</th>\r\n                        </tr>\r\n                        ";
foreach ( ( array )$topsite as $ts )
{
		$site = $sitemodel->admingetsiteone( $ts['siteid'] );
		$tn = $trendmodel->ctr( $tssn, $ts['num'] );
		echo "                        <tr class=\"td_b_m \">\r\n                          <td height=\"30\"  class=\"td_b_4\"  >&nbsp;</td>\r\n                          <td><table width=\"99%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"td_b_m0\">\r\n                              <tr>\r\n                                <td><a href=\"javascript:tourl('http://";
		echo $site['siteurl'];
		echo "')\">";
		echo $site['sitename'];
		echo "</a>&nbsp;</td>\r\n                                <td width=\"80\">";
		echo $tn."%";
		echo "</td>\r\n                                <td width=\"120\"><div style=\"width:";
		echo $tn + 1;
		echo "px\" class=\"p1\">&nbsp;</div></td>\r\n                                <td width=\"90\" align=\"right\">";
		echo $ts['num'];
		echo "</td>\r\n                              </tr>\r\n                          </table></td>\r\n                          <td width=\"6\" class=\"td_b_5\">&nbsp;</td>\r\n                        </tr>\r\n                        ";
}
echo "                    </table></td>\r\n                    <td width=\"50%\" align=\"right\" valign=\"top\"><table width=\"95%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" style=\"border:0px #DFDFDF solid\">\r\n                        <tr class=\"td_b_2\">\r\n                          <td width=\"5\" height=\"33\" class=\"td_b_l\" >&nbsp;</td>\r\n                          <td>&nbsp;<strong>\r\n                            <script language=\"JavaScript\" type=\"text/javascript\">document.write(t);</script>\r\n                            地区分布排行榜</strong></td>\r\n                          <th width=\"6\" class=\"td_b_3\" >&nbsp;</th>\r\n                        </tr>\r\n                        ";
foreach ( ( array )$toparea as $key => $ta )
{
		$tn = $trendmodel->ctr( $tasn, $ta );
		echo "                        <tr class=\"td_b_m \">\r\n                          <td height=\"30\"  class=\"td_b_4\"  >&nbsp;</td>\r\n                          <td><table width=\"99%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"td_b_m0\">\r\n                              <tr>\r\n                                <td width=\"120\">";
		echo $GLOBALS['C_province'][$key];
		echo "</td>\r\n                                <td width=\"80\">";
		echo $tn."%";
		echo "</td>\r\n                                <td width=\"120\"><div style=\"width:";
		echo $tn + 1;
		echo "px\" class=\"p1\">&nbsp;</div></td>\r\n                                <td width=\"90\" align=\"right\">";
		echo $ta;
		echo "</td>\r\n                              </tr>\r\n                          </table></td>\r\n                          <td width=\"6\" class=\"td_b_5\">&nbsp;</td>\r\n                        </tr>\r\n                        ";
}
echo "                    </table></td>\r\n                  </tr>\r\n                  <tr>\r\n                    <td>&nbsp;</td>\r\n                    <td>&nbsp;</td>\r\n                  </tr>\r\n                </table></td>\r\n              </tr>\r\n              <tr>\r\n                <td height=\"50\">&nbsp;</td>\r\n              </tr>\r\n            </table></td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n</table>\r\n<script language=\"JavaScript\" type=\"text/javascript\">\r\nfunction choose(){\r\n\tvar v = \$i(\"choosetype\").value;\r\n\tvar t='';\r\n    if(v == 'del') t = '删除';\t\r\n\tif(t=='') {alert('批量选项未选择');return false }\t\r\n\tvar numchecked = getNumChecked('form');\r\n\tif(numchecked < 1) { alert('请选中您要操作的公告'); return false }\t\r\n\tif(!v)return false;\r\n\tif(confirm('您确认要'+ t +'这' + numchecked + '个公告 ？。\\n点“确认”'+ t +'，点“取消”取消操作。')){\r\n\t\tthis.document.form.submit();\r\n\t\treturn true;\r\n\t}\r\n\treturn false;\r\n}\r\nfunction doRemoveWin(){\r\n\ttb_remove();\r\n\tdocument.location.reload();\r\n}\r\n</script>\r\n";
include( TPL_DIR."/footer.php" );
?>
