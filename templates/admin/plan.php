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
echo "/images/ico_success_16.gif' align='absmiddle' /><span style=\"margin-left:10px;\">操作成功！</span></td>\r\n                <td>&nbsp;</td>\r\n              </tr>\r\n            </table>\r\n            <script language=\"JavaScript\" type=\"text/javascript\">\r\n\t\t\tnoneSuccess();\r\n\t\t\t</script>\r\n            ";
}
echo "            <table width=\"97%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n              <tr>\r\n                <td><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n                    <tr>\r\n                      <td><ul id=\"li-type\"> <li style=\"padding-right:10px\"><a href=\"do.php?action=createplan\"><img  src='/templates/";
echo Z_TPL;
echo "/images/add.gif' align='absmiddle' /> <strong>新建计划</strong></a></li>\r\n                          <li><a href=\"do.php?action=";
echo $action;
echo "\" ";
if ( $status == ""&&$clearing == ""&&$checkplan == ""&&$restrictions == ""&&$audit == "")
{
echo "class=\"li-active\"";
}
echo ">全部</a></li>\r\n                          <li>|</li>\r\n                          <li><a href=\"do.php?action=";
echo $action;
echo "&status=1\" ";
if ( $status == "1")
{
echo "class=\"li-active\"";
}
echo ">活动计划</a></li>\r\n\t\t\t\t\t\t  <li>|</li>\r\n                          <li><a href=\"do.php?action=";
echo $action;
echo "&status=0\" ";
if ( $status == "0")
{
echo "class=\"li-active\"";
}
echo ">待审计划</a></li>\r\n                          <li>|</li>\r\n                          <li><a href=\"do.php?action=";
echo $action;
echo "&status=2\" ";
if ( $status == "2")
{
echo "class=\"li-active\"";
}
echo ">停止计划</a> </li>\r\n\t\t\t\t\t\t  <li>|</li>\r\n                          <li><a href=\"do.php?action=";
echo $action;
echo "&status=3\" ";
if ( $status == "3")
{
echo "class=\"li-active\"";
}
echo ">限额超支</a> </li>\r\n\t\t\t\t\t\t  <li>|</li>\r\n                          <li><a href=\"do.php?action=";
echo $action;
echo "&status=4\" ";
if ( $status == "4")
{
echo "class=\"li-active\"";
}
echo ">过期余额不足</a> </li>\r\n                          <li>|</li>\r\n                          <li><a href=\"do.php?action=";
echo $action;
echo "&clearing=day\" ";
if ( $clearing == "day")
{
echo "class=\"li-active\"";
}
echo ">日结计划</a></li>\r\n\t\t\t\t\t\t   <li>|</li>\r\n                          <li><a href=\"do.php?action=";
echo $action;
echo "&clearing=week\" ";
if ( $clearing == "week")
{
echo "class=\"li-active\"";
}
echo ">周结计划</a></li>\r\n\t\t\t\t\t\t   <li>|</li>\r\n                          <li><a href=\"do.php?action=";
echo $action;
echo "&clearing=month\" ";
if ( $clearing == "month")
{
echo "class=\"li-active\"";
}
echo ">月结计划</a></li>\r\n\t\t\t\t\t\t  <li>|</li>\r\n\t\t\t\t\t\t   <li><a href=\"do.php?action=";
echo $action;
echo "&checkplan=true\" ";
if ( $checkplan == "true")
{
echo "class=\"li-active\"";
}
echo ">有定向</a></li>\r\n\t\t\t\t\t\t   <li>|</li>\r\n                          <li><a href=\"do.php?action=";
echo $action;
echo "&restrictions=1\" ";
if ( $restrictions == "1")
{
echo "class=\"li-active\"";
}
echo ">有会员限制</a></li>\r\n\t\t\t\t\t\t   <li>|</li>\r\n                          <li><a href=\"do.php?action=";
echo $action;
echo "&audit=y\" ";
if ( $audit == "y")
{
echo "class=\"li-active\"";
}
echo ">需要审核</a></li>\r\n\t\t\t\t\t\t  \r\n                        </ul></td>\r\n                     \r\n                    </tr>\r\n                  </table></td>\r\n              </tr>\r\n              <tr>\r\n                <td height=\"50\"><select name=\"select\" class=\"select\" onchange=\"\$i('choosetype').value=this.value\">\r\n                    <option>批量操作</option>\r\n                    <option value=\"unlock\">激活</option>\r\n                    <option value=\"lock\">停止</option>\r\n                    <option value=\"del\">删除</option>\r\n                  </select>\r\n                  <input type=\"button\" name=\"Submit\" value=\"提交\" class=\"submit-x\" onclick=\"choose();\"/>\r\n                  &nbsp;\r\n                  &nbsp;\r\n                  <form action=\"?action=";
echo $action;
echo "\" method=\"post\">\r\n                    <input name=\"actiontype\" type=\"hidden\" value=\"";
echo $actiontype;
echo "\" />\r\n                    <select name=\"sortingm\" class=\"select\" id=\"sortingm\">\r\n                      <option value=\"DESC\" ";
if ( $sortingm == "DESC")
{
echo "selected";
}
echo " >降序</option>\r\n                      <option value=\"ASC\" ";
if ( $sortingm == "ASC")
{
echo "selected";
}
echo " >升序</option>\r\n                    </select>\r\n                    <select name=\"sortingtype\" class=\"select\" id=\"sortingtype\">\r\n                      <option value=\"priceadv\" ";
if ( $sortingtype == "priceadv")
{
echo "selected";
}
echo ">单价</option>\r\n                      <option value=\"deduction\" ";
if ( $sortingtype == "deduction")
{
echo "selected";
}
echo ">扣量</option>\r\n\t\t\t\t\t  <option value=\"budget\" ";
if ( $sortingtype == "budget")
{
echo "selected";
}
echo ">每日限额</option>\r\n                    </select>\r\n                    <input type=\"submit\" name=\"Submit2\" value=\"排序\" class=\"submit-x\">\r\n                  </form> \r\n                  <form action=\"?action=";
echo $action;
echo "&actiontype=search\" method=\"post\">\r\n                    <input name=\"searchval\" type=\"text\" class=\"reg\" id=\"searchval\" value=\"";
echo $searchval;
echo "\" size=\"20\" />\r\n                    <select name=\"searchtype\">\r\n                      <option value=\"2\" ";
if ( $searchtype == "2")
{
echo "selected";
}
echo ">广告计划ID</option>\r\n                      <option value=\"3\" ";
if ( $searchtype == "3")
{
echo "selected";
}
echo ">广告主UID</option>\r\n                      <option value=\"1\" ";
if ( $searchtype == "1")
{
echo "selected";
}
echo ">计划名称</option>\r\n                    </select>\r\n                    <input type=\"submit\" name=\"Submit22\" value=\"搜索\" class=\"submit-x\"/>\r\n                  </form></td>\r\n\t\t\t\t  \r\n              </tr>\r\n              <tr>\r\n                <td><form id=\"form\" name=\"form\" method=\"post\" action=\"do.php?action=";
echo $action;
echo "&actiontype=postchoose\">\r\n                    <input name=\"choosetype\"  id=\"choosetype\"  type=\"hidden\" value=\"\" />\r\n                    \r\n                    <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" style=\"border:0px #DFDFDF solid\">\r\n                      <tr class=\"td_b_2\">\r\n                        <td width=\"5\" height=\"33\" class=\"td_b_l\" >&nbsp;</td>\r\n                        <td width=\"30\"><input type=\"checkbox\" name=\"chkall\" onclick=\"checkall(this.form, 'uid')\" /></td>\r\n                        <td width=\"50\">Id</td>\r\n                        <td width=\"120\">计划名称</td>\r\n                        <td width=\"55\">类型</td>\r\n                        <td width=\"75\">广告商</td>\r\n                        <td width=\"60\">单价</td>\r\n                        <td width=\"60\">限额</td>\r\n                        <td width=\"60\">结算</td>\r\n                        <td width=\"60\">扣量</td>\r\n\r\n                        <td width=\"60\">补量</td>\r\n                        <td width=\"70\">已结算</td>\r\n                        <td width=\"60\" align=\"center\">定向</td>\r\n                        <td width=\"80\">会员限制</td>\r\n                        <td width=\"80\">需要审核</td>\r\n                        <td width=\"60\">状态</td>\r\n                        <td>&nbsp;</td>\r\n                        <th width=\"6\" class=\"td_b_3\" >&nbsp;</th>\r\n                      </tr>\r\n                        ";
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
echo "&usertype=advertiser\" title=\"转到会员详情\">";
echo $user['username'] == ""?"[已删除]<br>".$p['username'] : $user['username'];
echo "</a>\r\n        ";
if ( $user['money'] <200 )
{
echo "<br><font color=\"#FF0000\">￥".round( $user['money'],1 )."</font>";
}
echo "\t\t</td>\r\n                        <td>\r\n\t\t\t\t\t\t";
if ( $p['gradeprice'] )
{
echo "<font color=\"#FF0000\">分级</font>";
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
echo "</font>\t\t\t\t\t\t</td>\r\n                        <td>￥";
echo abs( $p['budget'] );
echo "</td>\r\n                        <td>";
if ( $p['clearing'] == "day")
{
echo "日结";
}
if ( $p['clearing'] == "week")
{
echo "周结";
}
if ( $p['clearing'] == "month")
{
echo "月结";
}
echo "\t\t\t\t\t\t</td>\r\n                        <td>";
echo abs( $p['deduction'] );
echo "%</td>\r\n                        \t\t\t\t\t\t\r\n                        <td>";
echo abs( $p['dosage'] );
echo "%</td>\r\n                       <td> ";
echo ( integer )$vn['n'];
echo "<br><a href=\"do.php?action=stats&timerange=a&planid=";
echo $p['planid'];
echo "\">报表</a></td>\r\n                        <td align=\"center\">";
if ( $p['checkplan'] != "true")
{
echo "有";
}
else
{
echo "无";
}
echo "</td>\r\n                        <td>";
if ( $p['restrictions'] != "1")
{
echo "有设置";
}
else
{
echo "不限制";
}
echo "</td>\r\n                        <td>";
if ( $p['audit'] == "n")
{
echo "不需要";
}
else
{
echo "需要";
}
echo "</td>\r\n                        <td> \r\n\t\t\t\t\t\t  ";
if ( $user['status'] != "2")
{
echo "<font color=\"red\">广告商未激活</font>";
}
else if ( $p['status'] == "0")
{
echo "<font color=\"red\">待审</font>";
}
else if ( $p['status'] == "1")
{
echo "<font color=\"green\">投放中</font>";
}
else if ( $p['status'] == "2")
{
echo "<font color=\"red\">停止中</font>";
}
else if ( $p['status'] == "3")
{
echo "<font color=\"red\">暂停中(限额)</font>";
}
else if ( $p['status'] == "4")
{
echo "<font color=\"red\">停止(过期或是余额不足)</font>";
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
echo "\" title=\"编辑这个计划“";
echo $p['planname'];
echo "”\">编辑</a> | ";
if ( $p['status'] == 0 )
{
echo "<a href=\"do.php?action=plan&actiontype=unlocks&planid=";
echo $p['planid'];
echo "&TB_iframe=true&height=240&width=300\" title=\"激活这个计划 “";
echo $p['planname'];
echo "”\" class=\"thickbox\"  >激活</a>";
}
else
{
echo " <a href=\"do.php?action=plan&actiontype=postchoose&choosetype=unlock&planid[]=";
echo $p['planid'];
echo "\" title=\"激活这个计划\">激活</a>";
}
echo "  | <a href=\"do.php?action=plan&actiontype=postchoose&choosetype=lock&planid[]=";
echo $p['planid'];
echo "\" title=\"锁定这个计划\">锁定<a/> | <a title=\"删除这个计划\" href=\"do.php?action=plan&actiontype=postchoose&choosetype=del&planid[]=";
echo $p['planid'];
echo "\" onclick=\"if ( confirm('您将删除这个计划项目“";
echo $p['planname'];
echo "”\\n您确定么？删除计划，广告，报表也会删除') ) { return true;}return false;\">删除</a> | <a title=\"给这个计划做一个标记\" href=\"javascript:mark(";
echo $p['planid'];
echo ",";
echo $p['mark'];
echo ")\" >标记</a> | <a href=\"?action=createads&planid=";
echo $p['planid'];
echo "\" title=\"在此计划发布广告\">新建广告</a> | <a href=\"do.php?action=ads&actiontype=search&searchtype=2&searchval=";
echo $p['planid'];
echo "\" title=\"查看这个计划下所有广告\">查看广告";
echo "<font color=\"gray\">(".$planmodel->gxgetplanadsnum( $p['planid'] ).")</font>";
echo "</a> | ";
if ( !in_array( $p['plantype'],array( "cps","cpa") ) )
{
echo "<a href=\"#TB_inline?&height=250&width=630&inlineId=Tod2cHtml\" onclick=\"Doeff(";
echo $p['planid'];
echo ")\" title=\"铺助代码\"   class=\"thickbox\">获取二次点击或跟踪代码</a>";
}
else
{
echo "<a href=\"#TB_inline?&height=100&width=630&inlineId=ToCpsaHtml\" onclick=\"ToCpsa('";
echo $p['plantype'];
echo "')\" title=\"获取CPS CPA的跟踪代码\"   class=\"thickbox\">获取接口代码</a>";
}
if ( $p['audit'] == "y")
{
if ( $p['stopaudit'] == "1")
{
echo " | <a title=\"停止计划的申请\" href=\"do.php?action=plan&actiontype=stopaudit&planid=";
echo $p['planid'];
echo "&stopaudit=2\" >停止申请</a>";
}
else
{
echo " | <a title=\"停止计划的申请\" href=\"do.php?action=plan&actiontype=stopaudit&planid=";
echo $p['planid'];
echo "&stopaudit=1\" >开通申请</a>";
}
}
echo "</span>&nbsp;</td>\r\n                        <td colspan=\"5\" align=\"right\"><font color='blue'>";
echo $p['expire'] != "0000-00-00"?"过期：".$p['expire'] : "&nbsp;";
echo "</font></td>\r\n                        <td  class=\"td_b_5\">&nbsp;</td>\r\n                      </tr>\r\n                      ";
}
echo "                      <tr class=\"td_b_7\">\r\n                        <td height=\"33\"  class=\"td_b_6\" >&nbsp;</td>\r\n                        <td  ><input type=\"checkbox\" name=\"chkallde\" onclick=\"checkall(this.form, 'uid','chkallde')\" /></td>\r\n                        <td>Id</td>\r\n                        <td>计划名称</td>\r\n                        <td>类型</td>\r\n                        <td>广告商</td>\r\n                        <td>单价</td>\r\n                        <td>限额</td>\r\n                        <td>结算</td>\r\n                        <td>扣量</td>\r\n                        <td>已结算</td>\r\n                        <td align=\"center\">定向</td>\r\n                        <td>会员限制</td>\r\n                        <td>需要审核</td>\r\n                        <td>状态</td>\r\n                        <td>&nbsp;</td>\r\n                        <td width=\"6\"  class=\"td_b_8\">&nbsp;</td>\r\n                      </tr>\r\n                    </table>\r\n            \r\n                  </form></td>\r\n              </tr>\r\n              <tr>\r\n                <td height=\"50\"><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n                    <tr>\r\n                      <td width=\"200\"><select name=\"select\" class=\"select\" onchange=\"\$i('choosetype').value=this.value\">\r\n                    <option>批量操作</option>\r\n                    <option value=\"unlock\">激活</option>\r\n                    <option value=\"lock\">停止</option>\r\n                    <option value=\"del\">删除</option>\r\n                  </select>\r\n                        <input type=\"button\" name=\"Submit3\" value=\"提交\" class=\"submit-x\" onclick=\"choose();\"/></td>\r\n                      <td align=\"right\">";
echo $viewpage;
echo "</td>\r\n                    </tr>\r\n                  </table></td>\r\n              </tr>\r\n            </table></td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n</table>\r\n\r\n<div id=\"Tod2cHtml\" style=\"display:none\">\r\n    <table width=\"600\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n      <tr>\r\n        <td height=\"30\">二次点击代码</td>\r\n      </tr>\r\n      <tr>\r\n        <td> \r\n          <textarea id=\"ck2\" name=\"ck2\" cols=\"75\" rows=\"2\"></textarea>        </td>\r\n      </tr>\r\n      <tr>\r\n        <td height=\"30\">效果跟踪代码</td>\r\n      </tr>\r\n      <tr>\r\n        <td><textarea name=\"eff\" id=\"eff\" cols=\"75\" rows=\"2\"></textarea></td>\r\n      </tr>\r\n      <tr>\r\n        <td>&nbsp;</td>\r\n      </tr>\r\n      <tr>\r\n        <td>二次点击：检测网民在点击或是弹出，到达广告页后是否有点击网页动作,简称二次点击。</td>\r\n      </tr>\r\n\t  <tr>\r\n        <td>&nbsp; </td>\r\n      </tr>\r\n\t  <tr>\r\n        <td>效果跟踪：比如跟踪广告到达页像弹出1000次是否有真实到达到广告页1000次，如弹出后统计注册量。</td>\r\n      </tr>\r\n\t  <tr>\r\n        <td>&nbsp; </td>\r\n      </tr>\r\n\t  <tr>\r\n        <td><font color=\"#FF0000\">如需要的话将以上代码发给广告商，嵌入到广告页中进行跟踪。</font></td>\r\n      </tr>\r\n\t  \r\n    </table>\r\n\r\n</div>\r\n\r\n<div id=\"ToCpsaHtml\" style=\"display:none\">\r\n    <table width=\"600\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n      <tr>\r\n        <td height=\"30\">接口代码</td>\r\n      </tr>\r\n      <tr>\r\n        <td> \r\n          <textarea id=\"cpsain\" name=\"cpsain\" cols=\"75\" rows=\"3\"></textarea>\r\n        </td>\r\n      </tr>\r\n    </table>\r\n</div>\r\n<script language=\"JavaScript\" type=\"text/javascript\">\r\nfunction Doeff(planid){\r\n\tvar url;\r\n\turl = '<'+'script src=\"";
echo $GLOBALS['C_ZYIIS']['jumpurl'];
echo "/effect.php?planid='+planid+'\"></'+'script>';\r\n\t\$(\"#ck2\").val(url);\r\n\turl1 = '<'+'script src=\"";
echo $GLOBALS['C_ZYIIS']['jumpurl'];
echo "/effect.php?type=effect&planid='+planid+'\"></'+'script>';\r\n\t\$(\"#eff\").val(url1);\r\n}\r\n\r\nfunction ToCpsa(type){\r\n\tvar url;\r\n\tif(type=='cps')\r\n\turl = '<iframe src=\"";
echo $GLOBALS['C_ZYIIS']['jumpurl'];
echo "/api/cpa.php?orders=订单号&price=订单价格&like=原样返回\" height=0 width=0></iframe>';\r\n\telse \r\n\turl = '<iframe src=\"";
echo $GLOBALS['C_ZYIIS']['jumpurl'];
echo "/api/cpa.php\" height=0 width=0></iframe>';\r\n\t\$(\"#cpsain\").val(url);\r\n\t\r\n}\r\n\r\nfunction choose(){\r\n\tvar v = \$i(\"choosetype\").value;\r\n\tvar t='';\r\n    if(v == 'del') t = '删除';\t\r\n\tif(v == 'unlock')  t= '激活';\t\r\n\tif(v == 'lock') t = '停止';\r\n\tif(t=='') {alert('批量选项未选择');return false }\t\r\n\tvar numchecked = getNumChecked('form');\r\n\tif(numchecked < 1) { alert('请选中您要操作的计划项目'); return false }\t\r\n\tif(!v)return false;\r\n\tif(confirm('您确认要'+ t +'这' + numchecked + '个计划？。\\n点“确认”'+ t +'，点“取消”取消操作。')){\r\n\t\tthis.document.form.submit();\r\n\t\treturn true;\r\n\t}\r\n\treturn false;\r\n}\r\nfunction mark(pid,t){\r\n\tvar m = \$('#mark_'+pid);\r\n\tif (m.is(':hidden')) {\r\n\t\tt=1;\r\n\t\tm.show();\r\n\t}else {\r\n\t\tt=0;\r\n\t\tm.hide();\r\n\t}\r\n\tajax(\"do.php?action=";
echo $action;
echo "&actiontype=mark&mark=\"+t+\"&planid=\"+pid+\"\");\t\r\n}\r\nfunction doRemoveWin(){\r\n\ttb_remove();\r\n\tdocument.location.reload();\r\n}\r\n</script>\r\n";
include( TPL_DIR."/footer.php");

?>