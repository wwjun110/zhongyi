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
echo "            <table width=\"97%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n              <tr>\r\n                <td><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n                    <tr>\r\n                      <td><ul id=\"li-type\">\r\n                          <li><a href=\"#TB_inline?&height=180&width=450&inlineId=doclearing\"  title=\"手动结算\" class=\"thickbox\"><img  src='/templates/";
echo Z_TPL;
echo "/images/add.gif' align='absmiddle' /> <strong>手动结算</strong></a></li>\r\n                          <li>|</li>\r\n                          <li><a href=\"do.php?action=";
echo $action;
echo "\" ";
if ( $status == "")
{
echo "class=\"li-active\"";
}
echo ">全部</a></li>\r\n                          <li>|</li>\r\n                          <li><a href=\"do.php?action=";
echo $action;
echo "&status=0\" ";
if ( $status == "0")
{
echo "class=\"li-active\"";
}
echo ">未支付</a></li>\r\n                          <li>|</li>\r\n                          <li><a href=\"do.php?action=";
echo $action;
echo "&status=1\" ";
if ( $status == "1")
{
echo "class=\"li-active\"";
}
echo ">已支付</a> </li>\r\n                          <li>|</li>\r\n                          <li><a href=\"do.php?action=";
echo $action;
echo "&actiontype=sumpay&TB_iframe=true&height=500&width=900\"  title=\"查看支付汇总报表\"   class=\"thickbox\">支付汇总</a> </li>\r\n                          <li>|</li>\r\n                          <li><a href=\"#TB_inline?&height=160&width=400&inlineId=Export\"  title=\"导出Excel\"  class=\"thickbox\">导出Excel</a></li>\r\n                        </ul></td>\r\n                    </tr>\r\n                  </table></td>\r\n              </tr>\r\n              <tr>\r\n                <td height=\"50\"><select name=\"select\" class=\"select\" onchange=\"\$i('choosetype').value=this.value\">\r\n                    <option>批量操作</option>\r\n                    <option value=\"clearing\">支付</option>\r\n                    <option value=\"del\">删除</option>\r\n                  </select>\r\n                  <input type=\"button\" name=\"Submit\" value=\"提交\" class=\"submit-x\" onclick=\"choose();\"/>\r\n                  &nbsp;\r\n                  &nbsp;\r\n                  <form action=\"?action=";
echo $action;
echo "&actiontype=search\" method=\"post\">\r\n                    <input name=\"searchval\" type=\"text\" class=\"reg\" id=\"searchval\" value=\"";
echo $searchval;
echo "\" size=\"20\" />\r\n                    <select name=\"searchtype\">\r\n                      <option value=\"1\" selected=\"selected\" ";
if ( $searchtype == "1")
{
echo "selected";
}
echo ">会员名称</option>\r\n                      <option value=\"2\" ";
if ( $searchtype == "2")
{
echo "selected";
}
echo ">会员ID</option>\r\n                      <option value=\"3\" ";
if ( $searchtype == "3")
{
echo "selected";
}
echo ">收款人</option>\r\n                      <option value=\"4\" ";
if ( $searchtype == "4")
{
echo "selected";
}
echo ">收款帐号</option>\r\n                    </select>\r\n                    <select name=\"status\">\r\n                      <option value=\"\" selected=\"selected\" ";
if ( $status == "")
{
echo "selected";
}
echo ">所有</option>\r\n                      <option value=\"0\"  ";
if ( $status == "0")
{
echo "selected";
}
echo ">未支付</option>\r\n                      <option value=\"1\" ";
if ( $status == "1")
{
echo "selected";
}
echo ">已支付</option>\r\n                    </select>\r\n                    <select name=\"addtime\">\r\n                      <option value=''>结算周期</option>\r\n                      ";
foreach ( ( array )$daydate as $d )
{
echo "<option value=".$d['addtime']."";
if ( $addtime == $d['addtime'] )
{
echo " selected";
}
echo ">".$d['addtime']."</option>";
}
echo "                    </select>\r\n                    <input type=\"submit\" name=\"Submit22\" value=\"搜索\" class=\"submit-x\"/>\r\n                  </form></td>\r\n              </tr>\r\n              <tr>\r\n                <td><table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"table1b\">\r\n                    <tr>\r\n                      <td height=\"30\" align=\"center\">\r\n\t\t\t\t\t  ";
if ( $paytype == "day")
{
$ptt = "日款";
}
if ( $paytype == "week")
{
$ptt = "周款";
}
if ( $paytype == "month")
{
$ptt = "月款";
}
echo "\t\t\t\t\t  <strong>";
echo $ptt;
echo "未付：</strong></td>\r\n                      <td>";
foreach ( ( array )$nopaybank as $nb )
{
foreach ( $GLOBALS['GLOBALS']['C_Bank'] as $banks =>$val )
{
if ( $nb['bank'] == $val[0] )
{
$nb['bank'] = $banks;
}
}
echo "<span style=\"padding-right:50px;\">[".$nb['bank']."]：￥".$nb['pay']."</span>";
}
if ( !$nopaybank )
{
echo "全部已付";
}
echo "</td>\r\n                    </tr>\r\n                    <tr>\r\n                      <td width=\"80\" height=\"30\" align=\"center\"><strong>";
echo $ptt;
echo "总计：</strong></td>\r\n                      <td><strong><font color=\"#FF0000\">￥";
echo abs( $nopay );
echo "</font></strong>&nbsp;&nbsp;&nbsp; <a href=\"do.php?action=pay&paytype=week\" >周款支付</a>&nbsp;&nbsp;<a href=\"do.php?action=pay&paytype=day\">日款支付</a>&nbsp;&nbsp;<a href=\"do.php?action=pay&paytype=month\">月款支付</a></td>\r\n                    </tr>\r\n                  </table>\r\n                  <form id=\"form\" name=\"form\" method=\"post\" action=\"do.php?action=";
echo $action;
echo "&actiontype=postchoose\">\r\n                    <input name=\"choosetype\"  id=\"choosetype\"  type=\"hidden\" value=\"\" />\r\n                    <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" style=\"border:0px #DFDFDF solid; margin-top:10px\">\r\n                      <tr class=\"td_b_2\">\r\n                        <td width=\"5\" height=\"33\" class=\"td_b_l\" >&nbsp;</td>\r\n                        <td width=\"30\"><input type=\"checkbox\" name=\"chkall\" onclick=\"checkall(this.form, 'id')\" /></td>\r\n                        <td width=\"50\">状态</td>\r\n                        <td width=\"80\">会员</td>\r\n                        <td width=\"80\">广告费用</td>\r\n                        <td width=\"70\">下线提成</td>\r\n                        <td width=\"60\">缴税</td>\r\n                        <td width=\"60\">手续费</td>\r\n                        <td width=\"80\">累计费用</td>\r\n                        <td width=\"80\">支付比例</td>\r\n                        <td width=\"80\">实付费用</td>\r\n                        <td width=\"80\">说明</td>\r\n                        <td width=\"80\">支付人</td>\r\n                        <td>确认</td>\r\n                        <th width=\"6\" class=\"td_b_3\" >&nbsp;</th>\r\n                      </tr>\r\n                      ";
foreach ( ( array )$pay as $p )
{
echo "                      <tr class=\"td_b_m_d\">\r\n                        <td height=\"35\"  class=\"td_b_4\" id=\"b-bottom\" >&nbsp;</td>\r\n                        <td id=\"che_";
echo $p['id'];
echo "\">\r\n\t \r\n\t\t\t\t\t\t<input type=\"checkbox\" name=\"id[]\" value=\"";
echo $p['id'];
echo "\" />\r\n\t\t\t\t\t\t\r\n                        </td>\r\n                        <td  id=\"sta_";
echo $p['id'];
echo "\">";
if ( $p['status'] == "0")
{
$status = "<font color=ff0000>未付</font>";
}
if ( $p['status'] == "1")
{
$status = "<font color=blue>已付</font>";
}
echo $status;
echo "</td>\r\n                        <td><a href=\"do.php?action=affiliate&actiontype=search&searchval=";
echo $p['uid'];
echo "&searchtype=2\">";
echo $p['username'] == ""?"已删除的会员": $p['username'];
echo "<br></a>#";
echo $p['username'] == ""?"已删除的会员": $p['uid'];
echo "</td>\r\n                        <td>";
echo abs( $p['money'] );
echo "</td>\r\n                        <td>";
echo abs( $p['xmoney'] );
echo "</td>\r\n                        <td>";
echo $p['tax'];
echo "</td>\r\n                        <td>";
echo $p['charges'];
echo "</td>\r\n                        <td>";
echo abs( $p['pay'] );
echo "</td>\r\n                        <td>";
if ( $p['status'] == "1")
{
echo abs( $p['scale'] )."%";
}
else
{
echo "                          <input type=text name=scale_";
echo $p['id'];
echo " id=scale_";
echo $p['id'];
echo " style=\"background-color: eeeee6;width:30;margin-top:-1px;margin-bottom:-1px;border:none\"  onKeyUp=\"pay_va(";
echo $p['id'];
echo ")\" value=\"100\" size=3 maxlength=4>%\r\n                          <input id=pay_";
echo $p['id'];
echo " type=hidden value=";
echo $p['pay'];
echo ">\r\n                          \r\n                          ";
}
echo "</td>\r\n                        <td style=\"color:#FF0000\"> ";
if ( $p['status'] == "1")
{
echo abs( $p['realmoney'] );
}
else
{
echo "\t\t\t\t\t\t  <input name=\"realmoney_";
echo $p['id'];
echo "\" type=text id=realmoney_";
echo $p['id'];
echo " style=\"background-color: eeeee6;width:60;margin-top:-1px;margin-bottom:-1px;border:none; color:#FF0000\" value=\"";
echo $p['pay'];
echo "\" size=6 maxlength=10>\r\n\t\t\t\t\t\t  ";
}
echo "</td>\r\n                        <td>";
if ( $p['status'] == "1")
{
echo $p['payinfo'] != ""?$p['payinfo']."&nbsp;": "&nbsp;";
}
else
{
echo "                          <textarea name=\"payinfo_";
echo $p['id'];
echo "\" cols=10 rows=1  id=payinfo_";
echo $p['id'];
echo " style=\"background-color: eeeee6;\">";
echo $p['payinfo'];
echo "</textarea>\r\n                          </span>\r\n                          ";
}
echo "</td>\r\n                        <td>";
echo $p['clearingadmin'];
echo "&nbsp;</td>\r\n                        <td id=\"sub_";
echo $p['id'];
echo "\">";
if ( $p['status'] == "0")
{
$statusY = "<input name=\"dpay\" type=\"button\" OnClick=\"paysubmit(".$p['id'].")\"  value=\"支付\"/>";
}
if ( $p['status'] == "1")
{
$statusY = "<font color=blue>已付</font>";
}
echo $statusY;
echo "</td>\r\n                        <td width=\"6\" class=\"td_b_5\">&nbsp;</td>\r\n                      </tr>\r\n                      <tr  class=\"td_b_m\" >\r\n                        <td height=\"40\"  class=\"td_b_4\" id=\"b-bottom\" >&nbsp;</td>\r\n                        <td  >";
if ( $p['clearingtype'] == "day")
{
$ct = "日款";
}
if ( $p['clearingtype'] == "week")
{
$ct = "周款";
}
if ( $p['clearingtype'] == "month")
{
$ct = "月款";
}
echo "<font color=''>";
echo $ct;
echo "</font></td>\r\n                        <td colspan=\"2\">&nbsp;<img  src='/templates/";
echo Z_TPL;
echo "/images/date.png' align='absmiddle' />&nbsp;";
echo $p['addtime'];
echo "</td>\r\n                        <td colspan=\"4\">";
foreach ( $GLOBALS['GLOBALS']['C_Bank'] as $banks =>$val )
{
if ( $p['bank'] == $val[0] )
{
echo "[".$banks."]";
}
}
echo " ".$p['bankname'];
echo "</td>\r\n                        <td colspan=\"2\">";
echo $p['bankacc'];
echo "&nbsp;</td>\r\n                        <td>";
echo $p['accountname'];
echo "&nbsp;</td>\r\n                        <td>&nbsp;</td>\r\n                        <td colspan=\"2\" align=\"right\">";
echo $p['paytime'] != "0000-00-00 00:00:00"?$p['paytime'] : "";
echo "&nbsp;</td>\r\n                        <td width=\"6\" class=\"td_b_5\">&nbsp;</td>\r\n                      </tr>\r\n                      ";
}
echo "                      <tr class=\"td_b_7\">\r\n                        <td height=\"33\"  class=\"td_b_6\" >&nbsp;</td>\r\n                        <td  ><input type=\"checkbox\" name=\"chkallde\" onclick=\"checkall(this.form, 'uid','chkallde')\" /></td>\r\n                        <td >状态</td>\r\n                        <td >会员</td>\r\n                        <td>广告费用</td>\r\n                        <td>下线提成</td>\r\n                        <td>缴税</td>\r\n                        <td>手续费</td>\r\n                        <td>累计费用</td>\r\n                        <td>支付比例</td>\r\n                        <td>实付费用</td>\r\n                        <td>说明</td>\r\n                        <td>支付人</td>\r\n                        <td>确认</td>\r\n                        <td width=\"6\"  class=\"td_b_8\">&nbsp;</td>\r\n                      </tr>\r\n                    </table>\r\n                  </form></td>\r\n              </tr>\r\n              <tr>\r\n                <td height=\"50\"><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n                    <tr>\r\n                      <td width=\"200\"><select name=\"select\" class=\"select\" onchange=\"\$i('choosetype').value=this.value\">\r\n                          <option>批量操作</option>\r\n                          <option value=\"clearing\">支付</option>\r\n                          <option value=\"del\">删除</option>\r\n                        </select>\r\n                        <input type=\"button\" name=\"Submit3\" value=\"提交\" class=\"submit-x\" onclick=\"choose();\"/></td>\r\n                      <td align=\"right\">";
echo $viewpage;
echo "</td>\r\n                    </tr>\r\n                  </table></td>\r\n              </tr>\r\n            </table></td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n</table>\r\n<div id=\"Export\" style=\"display:none\">\r\n  <form action=\"do.php?action=";
echo $action;
echo "&actiontype=export\" method=\"post\">\r\n    <table width=\"98%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n      <tr>\r\n        <td>&nbsp;</td>\r\n        <td>&nbsp;</td>\r\n      </tr>\r\n      <tr>\r\n        <td height=\"40\">支付状态</td>\r\n        <td><input name=\"exportStatus\" type=\"radio\" value=\"0\" checked=\"checked\" />\r\n          未支付\r\n          <input type=\"radio\" name=\"exportStatus\" value=\"1\" />\r\n          已支付\r\n          <input name=\"exportStatus\" type=\"radio\" value=\"\" />\r\n          全部 </td>\r\n      </tr>\r\n      <tr>\r\n        <td width=\"90\" height=\"40\">结算时间</td>\r\n        <td><select name=\"exportDay\" id=\"exportDay\">\r\n            ";
foreach ( ( array )$daydate as $d )
{
echo "<option value=".$d['addtime']."";
if ( $addtime == $d['addtime'] )
{
echo " selected";
}
echo ">".$d['addtime']."</option>";
}
echo "            <option  value=\"0\">导出所有</option>\r\n          </select></td>\r\n      </tr>\r\n      <tr>\r\n        <td height=\"40\">&nbsp;</td>\r\n        <td align=\"right\"><input type=\"button\" name=\"Excel2\" value=\"导出Excel \" onclick=\"doExcel()\"/></td>\r\n      </tr>\r\n    </table>\r\n  </form>\r\n</div>\r\n<div id=\"doclearing\" style=\"display:none\">\r\n  <form action=\"do.php?action=";
echo $action;
echo "&actiontype=clearingtype\" method=\"post\" name=\"fclearing\" id=\"fclearing\">\r\n    <table width=\"98%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n      <tr>\r\n        <td>&nbsp;</td>\r\n        <td>&nbsp;</td>\r\n      </tr>\r\n\t  <tr>\r\n      <td height=\"40\">类型：</td>\r\n      <td >\r\n        <input type=\"radio\" name=\"alone\" value=\"1\"  checked=\"checked\"  onclick=\"\$('#oneuser').hide()\"/>\r\n        结算所有会员\r\n\t\t<input name=\"alone\" type=\"radio\" value=\"0\" onclick=\"\$('#oneuser').show()\"/>\r\n        结算单个会员</td>\r\n    </tr>\r\n    <tr id=\"oneuser\" style=\"display:none\">\r\n      <td height=\"40\">会员：</td>\r\n      <td ><input name=\"touser\" type=\"text\"   id=\"touser\" value=\"";
echo $_GET['username'];
echo "\" size=\"20\" /></td>\r\n    </tr>\r\n\t\r\n      <tr>\r\n        <td height=\"40\">结算款项</td>\r\n        <td><input name=\"clearingType[]\" type=\"checkbox\" value=\"day\" />\r\n          日款&nbsp;&nbsp;\r\n          <input name=\"clearingType[]\" type=\"checkbox\" value=\"week\" />\r\n          周款&nbsp;&nbsp;\r\n          <input name=\"clearingType[]\" type=\"checkbox\" value=\"month\" />\r\n          月款</td>\r\n      </tr>\r\n      <tr>\r\n        <td height=\"40\">&nbsp;</td>\r\n        <td align=\"right\"><input type=\"button\" name=\"submits\" value=\"开始结算\" onclick=\"Postfc()\" /></td>\r\n      </tr>\r\n    </table>\r\n  </form>\r\n</div>\r\n<script language=\"JavaScript\" type=\"text/javascript\">\r\nfunction Postfc(){\r\n\tvar touser  = \$i('touser').value;\r\n\tvar clearingType  = get_checkbox_value(\$n('clearingType[]'));\r\n\tvar alone = get_radio_value(\$n('alone'));\r\n\tif(isNULL(touser) && alone == 0){\r\n\t\talert(\"请输入会员名称！\");\t\t\r\n\t\t\$i('touser').focus();\r\n\t\treturn false;\r\n     }  \r\n\tif(isNULL(clearingType)){\t\t\r\n\t\talert(\"请选择结算款项\");\t\t\r\n\t\treturn false;\r\n     }\r\n\t if(alone == 0){\r\n\t\t \$.get(\"do.php?action=userinfo&username=\"+touser, function(data){\t\t\r\n\t\t\tif( data == \"0\" )\r\n\t\t\t{\r\n\t\t\t   document.forms[\"fclearing\"].submit();\r\n\t\t\t}\r\n\t\t\telse\r\n\t\t\t{\r\n\t\t\t\talert('没有这个会员');\r\n\t\t\t}\r\n\t\t});\r\n\t}else {\r\n\t\tdocument.forms[\"fclearing\"].submit();\r\n\t}\r\n}\r\nfunction choose(){\r\n\tvar v = \$i(\"choosetype\").value;\r\n\tvar t='';\r\n    if(v == 'del') t = '删除';\t\r\n\tif(v == 'clearing') t = '批理支付';\t\r\n\tif(t=='') {alert('批量选项未选择');return false }\t\r\n\tvar numchecked = getNumChecked('form');\r\n\tif(numchecked < 1) { alert('请选中您要操作的项'); return false }\t\r\n\tif(!v)return false;\r\n\tif(confirm('您确认要'+ t +'这' + numchecked + '个 ？。\\n点“确认”'+ t +'，点“取消”取消操作。')){\r\n\t";
if ( in_array( "pay",explode( ",",$GLOBALS['C_ZYIIS']['tomail'] ) ) )
{
echo "\t\tif(v == 'clearing') addLoading('正在发送邮件...');\r\n\t\t";
}
echo "\t\tthis.document.form.submit();\r\n\t\treturn true;\r\n\t}\r\n\treturn false;\r\n}\r\nfunction doRemoveWin(){\r\n\ttb_remove();\r\n\tdocument.location.reload();\r\n}\r\nfunction paysubmit(id)\r\n{\r\n\tvar psub=confirm(\"确认结算么？\");\r\n\tif(psub){\r\n\t\tvar scale=\$i(\"scale_\"+id).value;\r\n\t\tvar payinfo=\$i(\"payinfo_\"+id).value;\r\n\t\tvar realmoney=\$i(\"realmoney_\"+id).value;\r\n\t\tvar endid = '";
echo $endid;
echo "';\r\n\t\tif(scale==\"\"){\r\n\t\t\talert(\"请输入实付比例值！\");\r\n\t\t\tdocument.getElementById(\"scale_\"+id).focus();\r\n\t\t\treturn false;\t\r\n\t\t}\r\n\t\telse{\r\n\t\t\t";
if ( in_array( "pay",explode( ",",$GLOBALS['C_ZYIIS']['tomail'] ) ) )
{
echo "\t\t\taddLoading('正在发送邮件...');\r\n\t\t\t";
}
echo "\t\t\t\$.post(\"do.php?action=pay&actiontype=postchoose\",{ \"id[]\": id,\"realmoney\":realmoney,\"scale\": scale,\"payinfo\": payinfo,\"type\":\"clearing\",\"choosetype\":\"clearing\" }, function(data){ \r\n\t\t\t\tif(data == 'ok'){\r\n\t\t\t\t\t\$('#sub_'+id).html(\"<font color=blue>已付</font>\");\r\n\t\t\t\t \t\$('#che_'+id).html(\"<span style='color: blue;font-size: 9px;'>√</span>\");\r\n\t\t\t\t \t\$('#sta_'+id).html(\"<font color=blue>已付</font>'\");\r\n\t\t\t\t\tif(endid==id)document.location.reload();\r\n\t\t\t\t}\r\n\t\t\t\telse{\r\n\t\t\t\t\talert('操作或是邮件发送失败');\r\n\t\t\t\t}\t \r\n\t\t\t\t \t\t\t \r\n\t\t\t}); \r\n\t\t}\r\n\t}\r\n\telse{\r\n\t\t\treturn false;\r\n\t\t}\r\n}\r\n\r\nfunction pay_va(id){\r\n\tvar scale=\$i(\"scale_\"+id);\r\n\tvar realmoney=\$i(\"realmoney_\"+id);\r\n\tvar pay=\$i(\"pay_\"+id);\r\n\tif(scale.value!=\"\" && !isNaN(scale.value)){\r\n\t\tvar v=scale.value/100*pay.value;\r\n\t\trealmoney.value=Math.round(v*100)/100;\r\n\t}\r\n}\r\nfunction doExcel(){\r\n\tvar exportStatus = \$('input[@name=exportStatus][@checked]').val();\r\n\tvar exportDay = \$('#exportDay').val();\r\n\tlocation.href = \"e.php?actiontype=dopay&day=\"+exportDay+\"&status=\"+exportStatus ;\r\n\ttb_remove();\r\n}\r\n\r\n</script>\r\n";
include( TPL_DIR."/footer.php");

?>