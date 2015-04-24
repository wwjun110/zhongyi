<?php

if ( !defined( "IN_ZYADS") ){
exit( );}
$actiontype = empty( $actiontype ) ?$_REQUEST['actiontype'] : $actiontype;
echo "<script src=\"/javascript/function.js\" type=\"text/javascript\"></script>\r\n<style type=\"text/css\">\r\n.reg{width:150px}\r\nbody,td{font-size:12px;}\r\n.solid{\r\n\tborder-bottom-width: 1px;\r\n\tborder-bottom-style: solid;\r\n\tborder-bottom-color: #cccccc;\r\n}\r\n</style>\r\n\r\n";
if ( $edittype == "inZone")
{
echo "<form action=\"?action=ads&actiontype=postinzone\" method=\"post\">\r\n<input name=\"adsid\" type=\"hidden\" value=\"";
echo $a['adsid'];
echo "\" />\r\n  <table width=\"380\" border=\"0\" cellpadding=\"3\" cellspacing=\"0\">\r\n    <tr>\r\n      <td width=\"60\" height=\"30\" >方式       </td>\r\n      <td > \r\n        <input name=\"type\" type=\"radio\" value=\"0\" checked=\"checked\" onclick=\"\$i('s_sitetype').style.display='none'\"/>\r\n        植入到所有相同类型广告位\r\n        <input type=\"radio\" name=\"type\" value=\"1\" onclick=\"\$i('s_sitetype').style.display=''\"/>\r\n        按网站类型        </td>\r\n    </tr>\t\r\n    <tr  style=\"display:none\" id=\"s_sitetype\">\r\n      <td height=\"30\">网站类型 </td>\r\n      <td ><select name=\"sitetype\" id=\"sitetype\">\r\n          ";
foreach ( ( array )$sitetype as $t )
{
echo "          <option value=\"";
echo $t['sid'];
echo "\">";
echo $t['sitename'];
echo "</option>\r\n          ";
}
echo "        </select></td>\r\n    </tr>\r\n    <tr>\r\n      <td height=\"40\">&nbsp;</td>\r\n      <td > <input name=\"button\" type=\"submit\" id=\"button\" style=\"\"   value=\" 提交 \"/></td>\r\n    </tr>\r\n  </table>\r\n</form>\r\n";
}
if ( $edittype == "EditAllAdUrl")
{
echo "<form action=\"do.php?action=editalladurl&actiontype=post\" method=\"post\" name=\"edit\" id=\"edit\">\r\n  <table width=\"380\" border=\"0\" cellpadding=\"3\" cellspacing=\"0\">\r\n    <tr>\r\n      <td width=\"100\" height=\"30\" >修改计划项目</td>\r\n      <td >\r\n        <select name=\"planid\" id=\"planid\">\r\n          <option>选择计划项目</option>\r\n          ";
foreach ( ( array )$plan as $p )
{
echo "          <option value=\"";
echo $p['planid'];
echo "\">";
echo $p['planname'];
echo "</option>\r\n          ";
}
echo "        </select>     </td>\r\n    </tr>\t\r\n    <tr>\r\n      <td height=\"30\">新的广告网址</td>\r\n      <td ><input name=\"editurl\" type=\"text\"  id=\"editurl\" style=\"width:260\"  value=\"http://\" />      </td>\r\n    </tr>\r\n    <tr>\r\n      <td height=\"40\">&nbsp;</td>\r\n      <td > <input name=\"button\" type=\"button\" id=\"button\" style=\"\"   value=\" 提交 \" onclick=\"PostForm()\"/>\r\n         \r\n        <input type=\"reset\"  value=\"重填\" name=\"reset\" />\r\n      </td>\r\n    </tr>\r\n    <tr>\r\n      <td height=\"40\" colspan=\"2\" style=\"background-color:#FFFBCC;border:1px solid #E6DB55;font-size:12px;margin-bottom:5px;margin-top:5px;padding-left:20px;\">提醒：提交后当前计划的所有广告网址全部被更新，慎重！</td>\r\n    </tr>\r\n  </table>\r\n</form>\r\n<script language=\"JavaScript\" type=\"text/javascript\">\r\nfunction PostForm(){\r\n\tvar planid  = \$i('planid').value;\r\n\tvar editurl = \$i(\"editurl\").value;\r\n\tif(isNULL(planid)){\r\n\t\talert(\"请选择修改计划项目！\");\t\t\r\n\t\treturn false;\r\n     }  \r\n\tif(isNULL(editurl)){\r\n\t\talert(\"请填写新的广告网址！\");\r\n\t\treturn false;\r\n\t\r\n\t}\r\n\tif(!isValidURL(editurl)){\r\n\t\t\talert(\"广告网址输入不合法\"); \r\n\t\t\t\$i('editurl').focus();\r\n        \treturn false;\r\n    }\r\n\t var psub=confirm(\"确认提交更改么？\\n提交后当前计划的所有广告网址全部被更新，慎重\\n\\n更改后的地址：\\n\"+editurl);\r\n\t if(psub){\r\n    \t document.forms[\"edit\"].submit();\r\n\t }\r\n}\r\n</script>\r\n";
}
if ( $edittype == "editpriority")
{
echo "<form action=\"?action=ads&actiontype=posteditpriority\" method=\"post\" name=\"PostModifyEditPriority\" id=\"PostModifyEditPriority\">\r\n<input name=\"adsid\" type=\"hidden\" value=\"";
echo $a['adsid'];
echo "\" />\r\n  <table width=\"380\" border=\"0\" cellpadding=\"3\" cellspacing=\"0\">\r\n    <tr>\r\n      <td height=\"30\" >权重\r\n        <label></label></td>\r\n      <td ><input name=\"priority\" type=\"text\" id=\"priority\" value=\"";
echo $a['priority'];
echo "\" maxlength=\"3\" class='reg'/>\r\n        <br><font color=\"gray\">请输入1-10数字，数字越大显示机率越大</font></td>\r\n    </tr>\t\r\n    <tr>\r\n      <td height=\"40\">&nbsp;</td>\r\n      <td > <input name=\"button32\" type=\"button\" id=\"button3\" style=\"\" onclick=\"return modifyEditPriority()\" value=\" 提交 \"/></td>\r\n    </tr>\r\n  </table>\r\n</form>\r\n<script language=\"JavaScript\" type=\"text/javascript\">\r\nfunction modifyEditPriority() {\r\n\tvar priority = jsTrim(\$i(\"priority\").value);\r\n\tvar msg = '';\r\n\t\tif(isNULL(priority)){\r\n\t\t\tmsg=msg+\"权重值不能为空！\\n\";\r\n\t\t}\r\n\t\tif (!priority.match(/^\\b[0-9]{1,3}(?:,?[0-9]{3})*(?:\\.[0-9]{1,2})?\\b\$/))\r\n\t\t{\r\n\t\t\tmsg=msg+\"权重值只能输入0--9之间的数字，不能有空格\\n\";\r\n\t\t}\r\n\t\tif(msg!=\"\") {\r\n            alert(msg);\r\n            return false;\r\n    \t}\r\n\t\tif(!confirm(\"您确定提交修改?\"))\r\n\t\t{\r\n\t\t\treturn false;\r\n\t\t}\r\n\t\tdocument.forms[\"PostModifyEditPriority\"].submit();\t\r\n\t\treturn true;\r\n}\r\n</script>\r\n";
}
if ( $edittype == "statudeny")
{
echo "<form action=\"?action=ads&actiontype=poststatudeny\" method=\"post\" name=\"PostModifyAdsDeny\" id=\"PostModifyAdsDeny\">\r\n  <input name=\"adsid\" type=\"hidden\" value=\"";
echo $a['adsid'];
echo "\" />\r\n  <input name=\"email\" type=\"hidden\" value=\"";
echo $a['email'];
echo "\" />\r\n  <table width=\"300\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n    <tr>\r\n      <td><label for=\"reason\">操作原因</label></td>\r\n      <td valign=\"top\"><label for=\"deny1\">\r\n        <input type=\"checkbox\" name=\"denyinfo[]\" value=\"目标网址无效\" id=\"deny1\"/>\r\n        目标网址无效</label>\r\n        <br>\r\n        <label for=\"deny2\">\r\n        <input type=\"checkbox\" name=\"denyinfo[]\" value=\"不明确/不准确的广告文字\" id=\"deny2\"/>\r\n        不明确/不准确的广告文字</label>\r\n        <br>\r\n        <label for=\"deny3\">\r\n        <input type=\"checkbox\" name=\"denyinfo[]\" value=\"广告图片/Flash不符合\" id=\"deny3\"/>\r\n      广告图片/Flash不符合</label></td>\r\n    </tr>\r\n     \r\n    <tr>\r\n      <td height=\"40\">邮件通知</td>\r\n      <td><input name=\"toemail\" type=\"checkbox\" id=\"checkbox\" value=\"y\" />\r\n        <label>发邮件通知广告商</label></td>\r\n    </tr>\r\n     \r\n    <tr>\r\n      <td height=\"40\">&nbsp;</td>\r\n      <td> \r\n      <input name=\"button3\" type=\"button\" id=\"button\" style=\"\" onclick=\"return modifyAdsDeny()\" value=\" 提交 \"/></td>\r\n    </tr>\r\n  </table>\r\n</form>\r\n<script language=\"JavaScript\" type=\"text/javascript\">\r\nfunction modifyAdsDeny() {\r\n\tvar denyinfo = get_checkbox_value(document.getElementsByName('denyinfo[]'));\r\n\tvar msg = '';\r\n\t\tif(isNULL(denyinfo)){\r\n\t\t\tmsg=msg+\"请选择一个原因！\\n\";\r\n\t\t}\r\n\t\tif(msg!=\"\") {\r\n            alert(msg);\r\n            return false;\r\n    \t}\r\n\t\tif(!confirm(\"您确定提交修改?\"))\r\n\t\t{\r\n\t\t\treturn false;\r\n\t\t}\r\n\t\t\r\n\t\tdocument.forms[\"PostModifyAdsDeny\"].submit();\t\r\n\t\treturn true;\r\n}\r\n</script>\r\n";
}
if ( $edittype == "unlocksPlan")
{
echo "<form action=\"?action=plan&actiontype=postupplanprice\" method=\"post\" name=\"UpPlanPrice\" id=\"UpPlanPrice\">\r\n  <input name=\"planid\" type=\"hidden\" value=\"";
echo $plan['planid'];
echo "\" />\r\n  <table width=\"300\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#FFFFFF\" style=\"font-size:12px;line-height:20px;\">\r\n    <tr>\r\n      <td height=\"30\" colspan=\"2\"><span class=\"gray\"><img alt=\"\" src=\"/templates/";
echo Z_TPL;
echo "/images/bulb.gif\" width=\"19\" height=\"19\" /> 新发布的计划需要填写网站主价格后才能通过。</span></td>\r\n    </tr>\r\n    <tr>\r\n      <td width=\"80\" height=\"30\" valign=\"bottom\">广告主单价：</td>\r\n      <td valign=\"bottom\"><strong>";
echo abs( $plan['priceadv'] );
if ( $plan['plantype'] == "cps")
{
echo "%";
}
else
{
echo "元";
}
echo "      </strong></td>\r\n    </tr>\r\n    <tr>\r\n      <td> 网站主单格：        </td>\r\n      <td align=\"left\"><input type=\"radio\" name=\"gradeprice\" value=\"0\" onclick=\"sPrice(0)\"  ";
if ( $plan['gradeprice'] == "0"||!$plan )
{
echo "checked";
}
echo "/>\r\n不分网站等级\r\n  <input type=\"radio\" name=\"gradeprice\" value=\"1\" onclick=\"sPrice(1)\" ";
if ( $plan['gradeprice'] == "1")
{
echo "checked";
}
echo "/>\r\n按网站等级\r\n  <table width=\"90%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n\r\n                           <div  id=\"s_price\"> \r\n                              &nbsp; ￥\r\n                              <input name=\"price\" type=\"text\" id=\"price\" size=\"8\"  value=\"\"/>\r\n                              <font color=\"#FF0000\"> <span id='minprices'></span> </font> \r\n                             \r\n         \t\t\t\t </div>\r\n                          <tr  id=\"s0_price\"  style='display:none'>\r\n                            <td width=\"45\" align=\"center\" height=\"25\">0星级</td>\r\n                            <td>￥\r\n                            <input name=\"s0price\" type=\"text\" id=\"s0price\" size=\"8\"/></td>\r\n                          </tr>\r\n                           <tr  id=\"s1_price\"   style='display:none'>\r\n                            <td align=\"center\" height=\"25\">1星级</td>\r\n                            <td>￥\r\n                              <input name=\"s1price\" type=\"text\" id=\"s1price\" size=\"8\"/></td>\r\n                          </tr>\r\n                          <tr  id=\"s2_price\"   style='display:none'>\r\n                            <td align=\"center\" height=\"25\">2星级</td>\r\n                            <td>￥\r\n                              <input name=\"s2price\" type=\"text\" id=\"s2price\" size=\"8\"/></td>\r\n                          </tr>\r\n                          <tr  id=\"s3_price\" style='display:none'>\r\n                            <td align=\"center\" height=\"25\">3星级</td>\r\n                            <td>￥\r\n                              <input name=\"s3price\" type=\"text\" id=\"s3price\" size=\"8\"/></td>\r\n          </tr>\r\n        </table>\r\n                         \r\n      </td>\r\n    </tr>\r\n    <tr>\r\n      <td height=\"10\"></td>\r\n      <td></td>\r\n    </tr>\r\n    <tr>\r\n      <td>&nbsp;</td>\r\n      <td><input name=\"button4\" type=\"button\" id=\"button2\" style=\"\" onclick=\"UpPlanPrices()\" value=\" 提交 \"/></td>\r\n    </tr>\r\n  </table>\r\n</form>\r\n<script src=\"/javascript/jquery/jquery.js\" type=\"text/javascript\"></script>\r\n<script language=\"JavaScript\" type=\"text/javascript\">\r\nfunction UpPlanPrices() {\r\n\tvar priceadv = parseFloat(";
echo $plan['priceadv'];
echo ");\r\n\tvar gradeprice = get_radio_value(\$n(\"gradeprice\"));\r\n\tvar price = jsTrim(\$i(\"price\").value);\r\n\tif(gradeprice==1) {\r\n\t\tif(UpPlanPrice.s0price.value<=0 ){\r\n\t\t\talert(\"0星级的单价不能小于0！ \");\r\n\t\t\tUpPlanPrice.s0price.focus();\r\n\t\t\treturn false;\r\n\t\t}\r\n\t\tif(!checkPrice(UpPlanPrice.s0price.value)){\r\n\t\t\tUpPlanPrice.s0price.focus();\r\n\t\t\treturn false;\r\n\t\t}\r\n\t\tif(UpPlanPrice.s0price.value>priceadv)\r\n\t\t{\r\n\t\t\talert(\"0星级的单价不能大于广告主的价格！\");\r\n\t\t\t\$i('s0price').focus();\r\n\t\t\treturn false;\r\n\t\t}\r\n\t\tif(UpPlanPrice.s1price.value<=0 ){\r\n\t\t\talert(\"1星级的单价不能小于0！ \");\r\n\t\t\tUpPlanPrice.s1price.focus();\r\n\t\t\treturn false;\r\n\t\t}\r\n\t\tif(!checkPrice(UpPlanPrice.s1price.value)){\r\n\t\t\tUpPlanPrice.s1price.focus();\r\n\t\t\treturn false;\r\n\t\t}\r\n\t\tif(UpPlanPrice.s1price.value>priceadv)\r\n\t\t{\r\n\t\t\talert(\"1星级的单价不能大于广告主的价格！\");\r\n\t\t\t\$i('s1price').focus();\r\n\t\t\treturn false;\r\n\t\t}\r\n\t\tif(UpPlanPrice.s2price.value<=0 ){\r\n\t\t\talert(\"2星级的单价不能小于0！ \");\r\n\t\t\tUpPlanPrice.s2price.focus();\r\n\t\t\treturn false;\r\n\t\t}\r\n\t\tif(!checkPrice(UpPlanPrice.s2price.value)){\r\n\t\t\tUpPlanPrice.s2price.focus();\r\n\t\t\treturn false;\r\n\t\t}\r\n\t\tif(UpPlanPrice.s2price.value>priceadv)\r\n\t\t{\r\n\t\t\talert(\"2星级的单价不能大于广告主的价格！\");\r\n\t\t\t\$i('s2price').focus();\r\n\t\t\treturn false;\r\n\t\t}\r\n\t\tif(UpPlanPrice.s3price.value<=0 ){\r\n\t\t\talert(\"3星级的单价不能小于0！ \");\r\n\t\t\tUpPlanPrice.s3price.focus();\r\n\t\t\treturn false;\r\n\t\t}\r\n\t\tif(!checkPrice(UpPlanPrice.s3price.value)){\r\n\t\t\tUpPlanPrice.s3price.focus();\r\n\t\t\treturn false;\r\n\t\t}\r\n\t\tif(UpPlanPrice.s3price.value>priceadv)\r\n\t\t{\r\n\t\t\talert(\"3星级的单价不能大于广告主的价格！\");\r\n\t\t\t\$i('s3price').focus();\r\n\t\t\treturn false;\r\n\t\t}\r\n\t\r\n\t}else {\r\n\t\tif(UpPlanPrice.price.value<=0 ){\r\n\t\t\talert(\"网站主的单价不能小于0！ \");\r\n\t\t\tUpPlanPrice.price.focus();\r\n\t\t\treturn false;\r\n\t\t}\r\n\t\tif(!checkPrice(UpPlanPrice.price.value)){\r\n\t\t\tUpPlanPrice.price.focus();\r\n\t\t\treturn false;\r\n\t\t}\r\n\t\tif(price>priceadv)\r\n\t\t{\r\n\t\t\talert(\"网站主的单价不能大于广告主的价格！\");\r\n\t\t\t\$i('price').focus();\r\n\t\t\treturn false;\r\n\t\t}\r\n\t}\r\n\t\r\n\tdocument.forms[\"UpPlanPrice\"].submit();\t\r\n\treturn true;\r\n}\r\nfunction checkPrice(str){\r\n\tvar i;\t\r\n\tfor(i=0;i<str.length;i++)  {\r\n\t   if ((str.charAt(i)<\"0\" || str.charAt(i)>\"9\")&& str.charAt(i) != '.'){\r\n\t\t\talert(\"单次价格:只能输入0--9之间的数字,不能有空格！\");\r\n\t\t\treturn false;\r\n\t   }\r\n\t}\r\n\tif(str>parseFloat(100) ){\r\n\t   alert(\"单次价格:不能大于100元！\");\r\n\t   return false;\r\n\t}\r\n\tif(str<0){\r\n\t\talert(\"单次价格:不能小于0！\\n\");\r\n\t\treturn false;\r\n\t}\r\n\tvar re = /([0-9]+\\.[0-9]{4})[0-9]*/;\r\n    aNew = str.replace(re,\"\$1\");\r\n    if(str.length>aNew.length){\r\n\t   str=aNew;\r\n\t   alert(\"单次价格:小数点后位数不能超过4位,请检查！\");\r\n\t   return false;\r\n\t}\r\n\treturn true;\r\n}\r\nfunction sPrice(t){\r\n\tif(t==1) {\r\n\t\t\$(\"#s0_price\").show();\r\n\t\t\$(\"#s1_price\").show();\r\n\t\t\$(\"#s2_price\").show();\r\n\t\t\$(\"#s3_price\").show();\r\n\t\t\$(\"#s_price\").hide();\r\n\t}else {\r\n\t\t\$(\"#s0_price\").hide();\r\n\t\t\$(\"#s1_price\").hide();\r\n\t\t\$(\"#s2_price\").hide();\r\n\t\t\$(\"#s3_price\").hide();\r\n\t\t\$(\"#s_price\").show();\r\n\t}\r\n}\r\n</script>\r\n";
}
if ( $edittype == "editAndSreateSite")
{
echo "<form action=\"?action=site&actiontype=";
if ( $actiontype == "createsite")
{
echo "postcreatesite";
}
else
{
echo "postupsite";
}
echo "\" method=\"post\" name=\"PostModifySite\" id=\"PostModifySite\">\r\n  <input name=\"siteid\" type=\"hidden\" value=\"";
echo $s['siteid'];
echo "\" />\r\n  <table width=\"560\" border=\"0\" cellpadding=\"0\" cellspacing=\"3\" bgcolor=\"#FFFFFF\" style=\"font-size:12px;line-height:20px;\">\r\n    <tr>\r\n      <td height=\"30\">\r\n\t  ";
if ( $actiontype == "createsite")
{
echo "\t  <strong>会员名称：</strong> <input name=\"username\" type=\"text\" id=\"username\" value=\"\" />\r\n\t   ";
}
else
{
echo "\t  <span class=\"gray\"><img alt=\"\" src=\"/templates/";
echo Z_TPL;
echo "/images/bulb.gif\" width=\"19\" height=\"19\" /> 附属域名请不要换行。</span>\r\n\t   ";
}
echo "\t  </td>\r\n    </tr>\r\n    <tr>\r\n      <td><strong>网站主域名</strong></td>\r\n    </tr>\r\n    <tr>\r\n      <td> http://\r\n        <input name=\"siteurl\" type=\"text\" id=\"siteurl\" value=\"";
echo $s['siteurl'];
echo "\" style=\"width:220px\"/>\r\n        <br />\r\n        <span class=\"gray\">请填写网站首页地址，且地址长度不要超过128个字符</span></td>\r\n    </tr>\r\n    <tr>\r\n      <td><span><strong>附属域名</strong></span></td>\r\n    </tr>\r\n    <tr>\r\n      <td><textarea name=\"pertainurl\"  id=\"pertainurl\" style=\"width:300px; height:30px\"/>";
echo $s['pertainurl'];
echo "</textarea>\r\n        <br />\r\n        <span class=\"gray\">多个采用“,”分割 如 b.com,www.a.com 无需”http://“,“*”通配所有二级域名  *.a.com</span></td>\r\n    </tr>\r\n    <tr>\r\n      <td><strong>网站星级</strong></td>\r\n    </tr>\r\n    <tr>\r\n      <td><input name=\"grade\" type=\"radio\" value=\"0\"   ";
if ( $s['grade'] == 0 )
{
echo "checked";
}
echo "/>\r\n          <img alt=\"\" src=\"/templates/";
echo Z_TPL;
echo "/images/s0.jpg\" title=\"0级\">\r\n            <input type=\"radio\" name=\"grade\" value=\"1\" ";
if ( $s['grade'] == 1 )
{
echo "checked";
}
echo "/><img alt=\"\" src=\"/templates/";
echo Z_TPL;
echo "/images/s1.jpg\"  title=\"1星级\"/>\r\n        <input type=\"radio\" name=\"grade\" value=\"2\"";
if ( $s['grade'] == 2 )
{
echo "checked";
}
echo " />\r\n      <img alt=\"\" src=\"/templates/";
echo Z_TPL;
echo "/images/s2.jpg\" title=\"2星级\"/>\r\n      <input type=\"radio\" name=\"grade\" value=\"3\" ";
if ( $s['grade'] == 3 )
{
echo "checked";
}
echo "/>\r\n      <img alt=\"\" src=\"/templates/";
echo Z_TPL;
echo "/images/s3.jpg\" title=\"3星级\"/></td>\r\n    </tr>\r\n    <tr>\r\n      <td><strong>网站名称</strong></td>\r\n    </tr>\r\n    <tr>\r\n      <td><input name=\"sitename\" type=\"text\" id=\"sitename\" value=\"";
echo $s['sitename'];
echo "\" /></td>\r\n    </tr>\r\n    <tr>\r\n      <td><strong>备案号</strong></td>\r\n    </tr>\r\n    <tr>\r\n      <td><input name=\"beian\" type=\"text\" id=\"beian\" value=\"";
echo $s['beian'];
echo "\" /></td>\r\n    </tr>\r\n    <tr>\r\n      <td><strong>网站描述</strong></td>\r\n    </tr>\r\n    <tr>\r\n      <td><textarea id=\"siteinfo\" name=\"siteinfo\" style=\"width:400px; height:30px\"/>";
echo $s['siteinfo'];
echo "</textarea></td>\r\n    </tr>\r\n    <tr>\r\n      <td><strong>网站类别</strong></td>\r\n    </tr>\r\n    <tr>\r\n      <td><select name=\"sitetype\" id=\"sitetype\">\r\n          ";
foreach ( ( array )$sitetype as $t )
{
echo "          <option value=\"";
echo $t['sid'];
echo "\" ";
if ( $t['sid'] == $s['sitetype'] )
{
echo "selected";
}
echo ">";
echo $t['sitename'];
echo "</option>\r\n          ";
}
echo "        </select></td>\r\n    </tr>\r\n    <tr>\r\n      <td>&nbsp;</td>\r\n    </tr>\r\n    <tr>\r\n      <td><input name=\"button\" type=\"button\" id=\"select\" style=\"\" onclick=\"modifySite()\" value=\" 提交 \"/></td>\r\n    </tr>\r\n  </table>\r\n</form>\r\n<script src=\"/javascript/jquery/jquery.js\" type=\"text/javascript\"></script>\r\n<script language=\"JavaScript\" type=\"text/javascript\">\r\nfunction modifySite() {\r\n\tvar sitename = jsTrim(\$i(\"sitename\").value);\r\n\tvar siteurl = jsTrim(\$i(\"siteurl\").value);\r\n\tvar siteinfo = jsTrim(\$i(\"siteinfo\").value);\r\n\t";
if ( $actiontype == "createsite")
{
echo "\t\tvar username = jsTrim(\$i(\"username\").value);\r\n\t\tif(isNULL(username)){\r\n\t\t\talert(\"请输入会员名称！\");\r\n\t\t\t\$i('username').focus();\r\n\t\t\treturn false;\r\n\t\t}\r\n\t";
}
echo "\tif(isNULL(siteurl)){\r\n\t\talert(\"请输入网站地址！\");\r\n\t\t\$i('siteurl').focus();\r\n\t\treturn false;\r\n\t}\r\n\tif(!isValidURL('http://'+siteurl)){\r\n\t\talert(\"网站网址输入不合法！\");\r\n\t\t\$i('siteurl').focus();\r\n\t\treturn false;\r\n\t}\r\n\tif(isNULL(sitename)){\r\n\t\talert(\"请输入网站名称！\");\r\n\t\t\$i('sitename').focus();\r\n\t\treturn false;\r\n\t}\r\n\tif(!isValidReg(sitename)){\r\n\t\talert(\"网站名称里含有非法字符，请重新输入！\");\r\n\t\t\$i('sitename').focus();\r\n\t\treturn false;\r\n\t}\r\n\t/*if(isNULL(siteinfo)){\r\n\talert(\"请输入网站描述！\");\r\n\t\$i('siteinfo').focus();\r\n\treturn false;\r\n\t}\r\n\tif(!isValidReg(siteinfo)){\r\n\talert(\"网站描述里含有非法字符，请重新输入！\");\r\n\t\$i('siteinfo').focus();\r\n\treturn false;\r\n\t}\r\n\tif(siteinfo.length > 100){\r\n\talert(\"网站描述最多100个汉字或200个英文字母！\");\r\n\t\$i('siteinfo').focus();\r\n\treturn false;\r\n\t}*/\r\n\tif(!confirm(\"您确定提交修改?\"))\r\n\t{\r\n\t\treturn false;\r\n\t}\r\n\t";
if ( $actiontype == "createsite")
{
echo "\t\t\$.get(\"do.php?action=userinfo&username=\"+username, function(data){\t\t\r\n\t\tif( data == \"0\" ){\r\n\t\t\t  document.forms[\"PostModifySite\"].submit();\r\n\t\t}else{\r\n\t\t\t alert('没有这个会员');\r\n\t\t}\r\n\t\t});\r\n\t";
}
else
{
echo "\t\tdocument.forms[\"PostModifySite\"].submit();\r\n\t";
}
echo "\treturn true;\r\n}\r\n</script>\r\n";
}
if ( $edittype == "trenddata")
{
echo "<script type=\"text/javascript\" src=\"/javascript/swfobject.js\"></script>\r\n<table width=\"700\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n  <tr>\r\n    <td><div id=\"w\"> <strong>You need to upgrade your Flash Player</strong> </div>\r\n      <script type=\"text/javascript\">\t\r\n\t\tvar so = new SWFObject(\"/javascript/charts/zyads_line.swf\", \"amcolumn\", \"700\", \"280\", \"8\", \"#FFFFFF\");\r\n\t\tso.addVariable(\"path\", \"/javascript/charts/\");\r\n\t\tso.addVariable(\"settings_file\", escape(\"/javascript/charts/zyads_settings.xml\")); \r\n\t\tso.addVariable(\"data_file\", escape(\"";
echo $url;
echo "\"));\t\t\r\n    \tso.addVariable(\"preloader_color\", \"#999999\");\t\r\n\t\tso.write(\"w\");\r\n\t                    </script></td>\r\n  </tr>\r\n</table>\r\n";
}
if ( $edittype == "pmview")
{
echo "<table width=\"98%\" border=\"0\" align=\"center\" cellpadding=\"8\" cellspacing=\"1\"   style=\"font-size:12px;line-height:20px;\">\r\n  <tr></tr>\r\n  <tr>\r\n    <td height=\"40\"><strong>标题：</strong> ";
echo $m['subject'];
echo "<br>\r\n      <strong>发布时间：</strong> ";
echo $m['addtime'];
echo "<br>\r\n      <br>\r\n      ";
echo t( $m['msgtext'] );
echo "</td>\r\n  </tr>\r\n  ";
foreach ( ( array )$re as $r )
{
echo "  <tr>\r\n    <td><span class=\"gray\"><strong>回复人:</strong>";
echo $r['senduser'];
echo " <span style=\"padding-left: 100px;\"></span><a href=\"do.php?action=pm&actiontype=delonepm&msgid=";
echo $r['msgid'];
echo "&parentid=";
echo $r['parentid'];
echo "\">删除</a> <br>\r\n      <strong>回复时间：</strong> ";
echo $m['addtime'];
echo "</span><br>\r\n      <br>\r\n      ";
echo t( $r['msgtext'] );
echo "</td>\r\n  </tr>\r\n  ";
}
if ( $m['alone'] == 0 )
{
echo "  <form id=\"repm\" name=\"repm\" method=\"post\" action=\"do.php?action=pm&actiontype=postrepm\">\r\n    <input name=\"msgid\" type=\"hidden\" value=\"";
echo $msgid;
echo "\" />\r\n    <input name=\"touser\" type=\"hidden\" value=\"";
echo $m['touser'];
echo "\" />\r\n    <tr>\r\n      <td><strong>直接回复</strong><br>\r\n        <br>\r\n        <textarea name=\"retext\" id=\"retext\" cols=\"22\" rows=\"8\" style=\"border:1px solid #A7A6AA;height:60px;padding:2px 8px 0pt 3px;width:360px;\"/></textarea>\r\n        <br>\r\n        <br>\r\n        <input type=\"button\" name=\"Submit22\" value=\"发送\" onclick=\"PostRePm()\" /></td>\r\n    </tr>\r\n  </form>\r\n  ";
}
echo "  <tr>\r\n    <td height=\"20\"></td>\r\n  </tr>\r\n</table>\r\n<script language=\"JavaScript\" type=\"text/javascript\">\r\nfunction PostRePm(){\r\n\tvar retext = \$i('retext').value;\r\n\tif(isNULL(retext)){\r\n\t\talert(\"请输入回复内容！\");\t\t\r\n\t\t\$i('retext').focus();\r\n\t\treturn false;\r\n     }\r\n\t if(!isValidReg(retext)){\r\n        \talert(\"回复内容里含有非法字符，请重新输入！\");\r\n\t\t\t\$i('retext').focus();\r\n\t\t\treturn false;\r\n     }\r\n\t document.forms[\"repm\"].submit(); \r\n}\r\n</script>\r\n";
}
if ( $edittype == "pmadd")
{
echo "<script language=\"JavaScript\" type=\"text/javascript\" src=\"/javascript/jquery/jquery.js\"></script>\r\n<form action=\"do.php?action=pm&actiontype=postcreatepm\" method=\"post\" name=\"addpm\" id=\"addpm\">\r\n  <input type=\"hidden\" name=\"id\" value=";
echo $_GET['id'];
echo ">\r\n  <table cellpadding=\"2\" cellspacing=\"1\" border=\"0\">\r\n    <tr>\r\n      <td >类型：</td>\r\n      <td ><input name=\"alone\" type=\"radio\" value=\"0\" checked=\"checked\" onclick=\"\$('#oneuser').show()\"/>\r\n        单个会员\r\n        <input type=\"radio\" name=\"alone\" value=\"1\" onclick=\"\$('#oneuser').hide()\"/>\r\n        所有会员</td>\r\n    </tr>\r\n    <tr id=\"oneuser\">\r\n      <td >会员：</td>\r\n      <td ><input name=\"touser\" type=\"text\"   id=\"touser\" value=\"";
echo $_GET['username'];
echo "\" size=\"20\" /></td>\r\n    </tr>\r\n    <tr>\r\n      <td width=\"10%\" >标题：</td>\r\n      <td width=\"90%\" ><input name=\"subject\" type=\"text\"   id=\"subject\" size=\"40\"></td>\r\n    </tr>\r\n    <tr>\r\n      <td >内容：</td>\r\n      <td nowrap=\"nowrap\" ><textarea name=\"msgtext\" cols=\"60\" rows=\"6\" class=\"text\" id=\"msgtext\" ></textarea></td>\r\n    </tr>\r\n    <tr>\r\n      <td ></td>\r\n      <td height=\"20\" >&nbsp;\r\n        <input  type=\"button\" class=\"ib\" value=\"发送\" onclick=\"PostPm()\"/></td>\r\n    </tr>\r\n  </table>\r\n</form>\r\n<script language=\"JavaScript\" type=\"text/javascript\">\r\nfunction PostPm(){\r\n\tvar touser  = \$i('touser').value;\r\n\tvar subject = \$i('subject').value;\r\n\tvar msgtext = \$i('msgtext').value;\r\n\tvar alone = get_radio_value(\$n('alone'));\r\n\tif(isNULL(touser) && alone == 0){\r\n\t\talert(\"请输入会员名称！\");\t\t\r\n\t\t\$i('touser').focus();\r\n\t\treturn false;\r\n     }  \r\n\tif(isNULL(subject)){\r\n\t\talert(\"请输入咨询标题！\");\t\t\r\n\t\t\$i('subject').focus();\r\n\t\treturn false;\r\n     }\r\n\t if(!isValidReg(subject)){\r\n        \talert(\"咨询标题里含有非法字符，请重新输入！\");\r\n\t\t\t\$i('subject').focus();\r\n\t\t\treturn false;\r\n     }\r\n\t if(isNULL(msgtext)){\r\n        alert(\"请输入咨询内容！\");\t\t\r\n\t\t\$i('msgtext').focus();\t\r\n\t\treturn false;\r\n     }\r\n\t if(!isValidReg(msgtext)){\r\n        \talert(\"咨询内容里含有非法字符，请重新输入！\");\r\n\t\t\t\$i('msgtext').focus();\r\n\t\t\treturn false;\r\n     }\r\n\t if(alone == 0){\r\n\t\t \$.get(\"do.php?action=userinfo&username=\"+touser, function(data){\t\t\r\n\t\t\tif( data == \"0\" )\r\n\t\t\t{\r\n\t\t\t   document.forms[\"addpm\"].submit();\r\n\t\t\t}\r\n\t\t\telse\r\n\t\t\t{\r\n\t\t\t\talert('没有这个会员');\r\n\t\t\t}\r\n\t\t});\r\n\t}else {\r\n\t\tdocument.forms[\"addpm\"].submit();\r\n\t}\r\n}\r\n</script>\r\n";
}
if ( $edittype == "NewsAddEdit")
{
echo "<script language=\"JavaScript\" type=\"text/javascript\" src=\"/javascript/tinymce/tiny_mce.js\"></script>\r\n<form name=\"form\" id=\"form\" method=\"post\" action=\"do.php?action=news&actiontype=";
if ( $actiontype == "add")
{
echo "createadd";
}
if ( $actiontype == "edit")
{
echo "posteditnews";
}
echo "\">\r\n  <input type=\"hidden\" name=\"id\" value=";
echo $_GET['id'];
echo ">\r\n  <table cellpadding=\"2\" cellspacing=\"1\" border=\"0\">\r\n    <tr>\r\n      <td >置顶：</td>\r\n      <td ><input name=\"top\" type=\"radio\" value=\"0\"  ";
if ( 0 == $news['top'] )
{
echo "checked";
}
echo " />\r\n        否\r\n        <input type=\"radio\" name=\"top\" value=\"1\" ";
if ( 1 == $news['top'] )
{
echo "checked";
}
echo "/>\r\n        是</td>\r\n    </tr>\r\n    <tr>\r\n      <td width=\"10%\" >标题：</td>\r\n      <td width=\"90%\" ><input name=\"tit\" type=\"text\"   id=\"tit\" size=\"40\"  value=\"";
echo $news['tit'];
echo "\">\r\n        <select name=\"color\" id=\"color\">\r\n          <option >标题颜色</option>\r\n          <option value=\"#FF0000\" ";
if ( "#FF0000"== $news['color'] )
{
echo "selected";
}
echo ">红色</option>\r\n          <option value=\"#0000FF\" ";
if ( "#0000FF"== $news['color'] )
{
echo "selected";
}
echo ">蓝色</option>\r\n        </select>\r\n      </td>\r\n    </tr>\r\n    <tr>\r\n      <td >内容：</td>\r\n      <td nowrap=\"nowrap\" ><textarea name=\"conn\" cols=\"60\" rows=\"6\" class=\"text\" id=\"conn\" >";
echo $news['conn'];
echo "</textarea></td>\r\n    </tr>\r\n    <tr>\r\n      <td ></td>\r\n      <td height=\"20\" >&nbsp;\r\n        <input  type=\"button\" class=\"ib\" value=\" 提交 \" onclick=\"PostNews()\"/></td>\r\n    </tr>\r\n  </table>\r\n</form>\r\n<script language=\"JavaScript\" type=\"text/javascript\">\r\ntinyMCE.init({\r\n\tmode : \"textareas\",\r\n\ttheme : \"advanced\",\r\n\tlanguage:\"ch\",\r\n\ttheme_advanced_buttons1 : \"bold,italic,underline,separator,undo,redo,link,unlink,paste,copy,image,forecolor,fontsizeselect,code\",\r\n\ttheme_advanced_buttons2 : \"\",\r\n\ttheme_advanced_buttons3 : \"\",\r\n\ttheme_advanced_toolbar_location : \"top\",\r\n\ttheme_advanced_toolbar_align : \"left\" \r\n \r\n});\r\nfunction PostNews(){\r\n\tvar tit  = \$i('tit').value;\r\n\tvar conn = tinyMCE.getInstanceById('conn').getBody().innerHTML;\r\n\tconn = conn.replace(/<\\/?.+?>/g,\"\");   \r\n\tif(isNULL(tit)){\r\n\t\talert(\"请填写标题！\");\t\t\r\n\t\t\$i('tit').focus();\r\n\t\treturn false;\r\n     }  \r\n\tif(isNULL(conn)){\r\n\t\talert(\"请填写内容！\");\t\t\r\n\t\ttinyMCE.getInstanceById('conn').getBody().focus();\r\n\t\treturn false;\r\n     }\r\n\tdocument.forms[\"form\"].submit();\r\n}\r\n</script>\r\n";
}
if ( $edittype == "SitetypeAddEdit")
{
echo "<form name=\"postform\" method=\"post\" action=\"do.php?action=sitetype&actiontype=";
if ( $actiontype == "add")
{
echo "createadd";
}
if ( $actiontype == "edit")
{
echo "posteditsitetype";
}
echo "\">\r\n  <input type=\"hidden\" name=\"sid\" value=";
echo $s['sid'];
echo ">\r\n  <table cellpadding=\"2\" cellspacing=\"1\" border=\"0\">\r\n    <tr id=\"oneuser\">\r\n      <td width=\"80\" >分类名称：</td>\r\n      <td ><input name=\"sitename\" type=\"text\"   id=\"sitename\" value=\"";
echo $s['sitename'];
echo "\" size=\"20\" /></td>\r\n    </tr>\r\n    <tr>\r\n      <td >&nbsp;\r\n        <input name=\"button2\"  type=\"button\" class=\"ib\" onclick=\"PostSitetype()\" value=\" 提交 \"/></td>\r\n      <td height=\"20\" >&nbsp;</td>\r\n    </tr>\r\n  </table>\r\n</form>\r\n<script language=\"JavaScript\" type=\"text/javascript\">\r\n function PostSitetype(){\r\n \tvar sitename = \$i('sitename').value;\r\n\tif(isNULL(sitename)){\r\n\t\talert(\"请输入名称！\");\t\t\r\n\t\t\$i('sitename').focus();\r\n\t\treturn false;\r\n     }\r\n\t document.forms[\"postform\"].submit(); \r\n }\r\n</script>\r\n";
}
if ( $edittype == "HelpAddEdit")
{
echo "<script language=\"JavaScript\" type=\"text/javascript\" src=\"/javascript/tinymce/tiny_mce.js\"></script>\r\n<form name=\"form\" id=\"form\" method=\"post\" action=\"do.php?action=help&actiontype=";
if ( $actiontype == "add")
{
echo "postcreatehelp";
}
if ( $actiontype == "edit")
{
echo "postedithelp";
}
echo "\">\r\n  <input type=\"hidden\" name=\"id\" value=";
echo $_GET['id'];
echo ">\r\n  <table cellpadding=\"2\" cellspacing=\"1\" border=\"0\">\r\n    <tr>\r\n      <td >类型：</td>\r\n      <td ><input name=\"type\" type=\"radio\" value=\"0\"  ";
if ( 0 == $news['top'] )
{
echo "checked";
}
echo " />\r\n        网站主\r\n        <input type=\"radio\" name=\"type\" value=\"1\" ";
if ( 1 == $news['top'] )
{
echo "checked";
}
echo "/>\r\n        广告商</td>\r\n    </tr>\r\n    <tr>\r\n      <td width=\"10%\" >标题：</td>\r\n      <td width=\"90%\" ><input name=\"tit\" type=\"text\"   id=\"tit\" size=\"40\"  value=\"";
echo $h['tit'];
echo "\">\r\n        <select name=\"color\" id=\"color\">\r\n          <option >标题颜色</option>\r\n          <option value=\"#FF0000\" ";
if ( "#FF0000"== $news['color'] )
{
echo "selected";
}
echo ">红色</option>\r\n          <option value=\"#0000FF\" ";
if ( "##0000FF"== $news['color'] )
{
echo "selected";
}
echo ">蓝色</option>\r\n        </select>\r\n      </td>\r\n    </tr>\r\n    <tr>\r\n      <td >内容：</td>\r\n      <td nowrap=\"nowrap\" ><textarea name=\"conn\" cols=\"60\" rows=\"6\" class=\"text\" id=\"conn\" >";
echo $h['conn'];
echo "</textarea></td>\r\n    </tr>\r\n    <tr>\r\n      <td ></td>\r\n      <td height=\"20\" >&nbsp;\r\n        <input  type=\"button\" class=\"ib\" value=\" 提交 \" onclick=\"PostHelp()\"/></td>\r\n    </tr>\r\n  </table>\r\n</form>\r\n<script language=\"JavaScript\" type=\"text/javascript\">\r\ntinyMCE.init({\r\n\tmode : \"textareas\",\r\n\ttheme : \"advanced\",\r\n\tlanguage:\"ch\",\r\n\ttheme_advanced_buttons1 : \"bold,italic,underline,separator,undo,redo,link,unlink,paste,copy,image,forecolor,fontsizeselect\",\r\n\ttheme_advanced_buttons2 : \"\",\r\n\ttheme_advanced_buttons3 : \"\",\r\n\ttheme_advanced_toolbar_location : \"top\",\r\n\ttheme_advanced_toolbar_align : \"left\" \r\n \r\n});\r\nfunction PostHelp(){\r\n\tvar tit  = \$i('tit').value;\r\n\tvar conn = tinyMCE.getInstanceById('conn').getBody().innerHTML;\r\n\tconn = conn.replace(/<\\/?.+?>/g,\"\");   \r\n\tif(isNULL(tit)){\r\n\t\talert(\"请填写标题！\");\t\t\r\n\t\t\$i('tit').focus();\r\n\t\treturn false;\r\n     }  \r\n\tif(isNULL(conn)){\r\n\t\talert(\"请填写内容！\");\t\t\r\n\t\ttinyMCE.getInstanceById('conn').getBody().focus();\r\n\t\treturn false;\r\n     }\r\n\tdocument.forms[\"form\"].submit();\r\n}\r\n</script>\r\n";
}
if ( $edittype == "AdminAddEdit")
{
echo "<script src=\"/javascript/function.js\" language='JavaScript'></script>\r\n<form action=\"do.php?action=administrator&actiontype=post";
if ( $actiontype == "add")
{
echo "create";
}
else
{
echo "up";
}
echo "username\" method=\"post\" name=\"formae\" id=\"formae\">\r\n  <input type=\"hidden\" name=\"id\" value=";
echo $u['id'];
echo ">\r\n  <input type=\"hidden\" name=\"upusername\" value='";
echo $u['username'];
echo "'>\r\n  <table width=\"98%\" border=\"0\" cellpadding=\"2\" cellspacing=\"1\">\r\n    <tr id=\"oneuser\">\r\n      <td ><table border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n          <tr>\r\n            <td width=\"80\" height=\"30\">登录名称</td>\r\n            <td>";
if ( $actiontype == "add")
{
echo "<input name=\"username\" type=\"text\"  id=\"username\" style=\"width:200px; height:22px\" />";
}
else
{
echo $u['username'];
}
echo "</td>\r\n          </tr>\r\n          <tr>\r\n            <td height=\"30\">登录密码</td>\r\n            <td><input name=\"password\" type=\"password\"  id=\"password\"  style=\"width:200px; height:22px\" onKeyUp=\"pwStrength(this.value)\" onBlur=\"pwStrength(this.value)\"></td>\r\n          </tr>\r\n          <tr>\r\n            <td height=\"30\">确认密码</td>\r\n            <td><input name=\"repassword\" type=\"password\" id=\"repassword\"  style=\"width:200px; height:22px\" onKeyUp=\"pwStrength(this.value)\" onBlur=\"pwStrength(this.value)\"/></td>\r\n          </tr>\r\n          <tr>\r\n            <td height=\"30\">密码强度</td>\r\n            <td><table border=\"1\" cellspacing=\"0\" cellpadding=\"1\" bordercolor=\"#cccccc\" height=\"23\" style='display:inline'>\r\n                <tr align=\"center\" bgcolor=\"#eeeeee\">\r\n                  <td width=\"50\" height=\"25\" id=\"strength_L\">弱</td>\r\n                  <td width=\"50\" id=\"strength_M\">中</td>\r\n                  <td width=\"50\" id=\"strength_H\">强</td>\r\n                </tr>\r\n              </table></td>\r\n          </tr>\r\n          <tr>\r\n            <td height=\"30\"><span class=\"TableRow1\">用户备注</span></td>\r\n            <td> \r\n              <input name=\"userinfo\" type=\"text\"  style=\"width:200px; height:22px\" id=\"userinfo\"  value=\"";
echo $u['userinfo'];
echo "\" size=\"30\"/>\r\n              <font color=\"gray\">如：财务人员 </font> </td>\r\n          </tr>\r\n          <tr>\r\n            <td height=\"30\">用户角色</td>\r\n            <td><input name=\"usertype\"  type=\"radio\" value=\"0\" ";
if ( $u['usertype'] == "0"||$u['usertype'] == "")
{
echo "checked";
}
echo " onClick=\"notaction.style.display=''\"/>\r\n              普通管理员\r\n              <input type=\"radio\"  value=\"1\" name=\"usertype\" ";
if ( $u['usertype'] == "1")
{
echo "checked";
}
echo " onClick=\"notaction.style.display='none'\"/>\r\n              高级管理员 （拥有最高权限）</td>\r\n          </tr>\r\n        </table></td>\r\n    </tr>\r\n    <tr>\r\n      <td width=\"80\" >&nbsp;</td>\r\n    </tr>\r\n    <tr id=\"notaction\" style=\"display:";
if ( $u['usertype'] == "1")
{
echo "none";
}
echo "\">\r\n      <td ><table width=\"99%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n          <tr>\r\n            <td height=\"30\" class=\"solid\"><strong>角色权限</strong></td>\r\n          </tr>\r\n          <tr>\r\n            <td height=\"30\" >【<strong>基本设置</strong>】</td>\r\n          </tr>\r\n          <tr>\r\n            <td height=\"30\" > \r\n               <input name=\"acl[setting][]\" type=\"checkbox\"  value=\"all,testemail\"  ";
echo in_array( "all,testemail",( array )$acl['setting'] ) ?" checked": "";
echo "/>\r\n        所有设置\r\n        <input name=\"acl[setting][]\" type=\"checkbox\"  value=\"server\" ";
echo in_array( "server",( array )$acl['setting'] ) ?" checked": "";
echo "/>\r\n        服务器设置\r\n      \r\n        <input name=\"acl[setting][]\" type=\"checkbox\"  value=\"reg\" ";
echo in_array( "reg",( array )$acl['setting'] ) ?" checked": "";
echo "/>\r\n        注册用户\r\n        <input name=\"acl[setting][]\" type=\"checkbox\"  value=\"clearing\" ";
echo in_array( "clearing",( array )$acl['setting'] ) ?" checked": "";
echo "/>\r\n        财务结算<br>\r\n        <input name=\"acl[setting][]\" type=\"checkbox\"  value=\"deduction\" ";
echo in_array( "deduction",( array )$acl['setting'] ) ?" checked": "";
echo "/>\r\n        扣点设置\r\n        <input name=\"acl[setting][]\" type=\"checkbox\"  value=\"smtp,testemail\"";
echo in_array( "smtp,testemail",( array )$acl['setting'] ) ?" checked": "";
echo " />\r\n        邮件设置\r\n        <input name=\"acl[setting][]\" type=\"checkbox\"  value=\"onlinepay\" ";
echo in_array( "onlinepay",( array )$acl['setting'] ) ?" checked": "";
echo "/>\r\n        在线支付\r\n        <input name=\"acl[setting][]\" type=\"checkbox\"  value=\"other\" ";
echo in_array( "other",( array )$acl['setting'] ) ?" checked": "";
echo "/>\r\n        其它设置\r\n              <input name=\"acl[postsetting][]\" type=\"checkbox\"  value=\"all,testemail,server,reg,clearing,deduction,smtp,onlinepay,other\" ";
echo in_array( "all,testemail,server,reg,clearing,deduction,smtp,onlinepay,other",( array )$acl['postsetting'] ) ?" checked": "";
echo "/>\r\n              基本设置修改</td>\r\n          </tr>\r\n          <tr>\r\n            <td height=\"30\" valign=\"bottom\" >【<strong>管理员管理</strong>】</td>\r\n          </tr>\r\n          <tr>\r\n            <td height=\"30\" ><input name=\"acl[administrator][]\" type=\"checkbox\"  value=\"all,search\" ";
echo in_array( "all,search",( array )$acl['administrator'] ) ?" checked": "";
echo "/>\r\n              管理员列表\r\n                <input name=\"acl[administrator][]\" type=\"checkbox\"  value=\"add,postcreateusername\" ";
echo in_array( "add,postcreateusername",( array )$acl['administrator'] ) ?" checked": "";
echo "/>\r\n新建管理员\r\n<input name=\"acl[administrator][]\" type=\"checkbox\"  value=\"postchoose,unlock,lock\" ";
echo in_array( "postchoose,unlock,lock",( array )$acl['administrator'] ) ?" checked": "";
echo " />\r\n              管理员审核\r\n              <input name=\"acl[administrator][]\" type=\"checkbox\" value=\"edit,postupusername\" ";
echo in_array( "edit,postupusername",( array )$acl['administrator'] ) ?" checked": "";
echo " />\r\n              修改管理员</td>\r\n          </tr>\r\n          <tr></tr>\r\n          <tr>\r\n            <td height=\"30\" valign=\"bottom\" >【<strong>网站主管理</strong>】</td>\r\n          </tr>\r\n          <tr>\r\n            <td height=\"30\" ><input name=\"acl[affiliate][]\" type=\"checkbox\"  value=\"all,search,unlock,waitact,lock\" ";
echo in_array( "all,search,unlock,waitact,lock",( array )$acl['affiliate'] ) ?" checked": "";
echo "/>\r\n              网站主列表\r\n              <input name=\"acl[affiliate][]\" type=\"checkbox\"  value=\"postchoose,editupstatus\" ";
echo in_array( "postchoose,editupstatus",( array )$acl['affiliate'] ) ?" checked": "";
echo ">\r\n              网站主审核\r\n              <input name=\"acl[affiliate][]\" type=\"checkbox\" value=\"editusers,postupusers\" ";
echo in_array( "editusers,postupusers",( array )$acl['affiliate'] ) ?" checked": "";
echo ">\r\n              修改网站主</td>\r\n          </tr>\r\n          <tr>\r\n            <td height=\"30\" valign=\"bottom\" >【<strong>广告商管理</strong>】</td>\r\n          </tr>\r\n          <tr>\r\n            <td height=\"30\" ><input name=\"acl[advertiser][]\" type=\"checkbox\"  value=\"all,search,unlock,waitact,lock\" ";
echo in_array( "all,search,unlock,waitact,lock",( array )$acl['advertiser'] ) ?" checked": "";
echo "/>\r\n              广告商列表\r\n              <input name=\"acl[advertiser][]\" type=\"checkbox\"  value=\"postchoose,editupstatus\" ";
echo in_array( "postchoose,editupstatus",( array )$acl['advertiser'] ) ?" checked": "";
echo " />\r\n              广告商审核\r\n              <input name=\"acl[advertiser][]\" type=\"checkbox\" value=\"editusers,postupusers\" ";
echo in_array( "editusers,postupusers",( array )$acl['advertiser'] ) ?" checked": "";
echo " />\r\n              修改广告商 </td>\r\n          </tr>\r\n          <tr>\r\n            <td height=\"30\" valign=\"bottom\" >【<strong>客服管理</strong>】</td>\r\n          </tr>\r\n          <tr>\r\n            <td height=\"30\" ><input name=\"acl[service][]\" type=\"checkbox\"  value=\"service\" ";
echo in_array( "service",( array )$acl['service'] ) ?" checked": "";
echo "/>  客服列表   <input name=\"acl[commercial][]\" type=\"checkbox\"  value=\"commercial\" ";
echo in_array( "commercial",( array )$acl['commercial'] ) ?" checked": "";
echo "/>\r\n              商务列表                     \r\n                <input name=\"acl[createuser][]\" type=\"checkbox\"  value=\"createuser\" ";
echo in_array( "createuser",( array )$acl['createuser'] ) ?" checked": "";
echo "/>\r\n新建会员 </td>\r\n          </tr>\r\n          <tr>\r\n            <td height=\"30\" valign=\"bottom\" >【<strong>计划管理</strong>】</td>\r\n          </tr>\r\n          <tr>\r\n            <td height=\"30\" ><input name=\"acl[plan][]\" type=\"checkbox\"  value=\"all,mark,search\" ";
echo in_array( "all,mark,search",( array )$acl['plan'] ) ?" checked": "";
echo "/>\r\n              计划列表\r\n              <input name=\"acl[plan][]\" type=\"checkbox\"  value=\"editstatusplan,postchoose,unlocks,postupplanprice\" ";
echo in_array( "editstatusplan,postchoose,unlocks,postupplanprice",( array )$acl['plan'] ) ?" checked": "";
echo " />\r\n              计划审核\r\n              <input name=\"acl[createplan][]\" type=\"checkbox\" value=\"all,postcreateplan\" ";
echo in_array( "all,postcreateplan",( array )$acl['createplan'] ) ?" checked": "";
echo " />\r\n新建计划\r\n<input name=\"acl[editplan][]\" type=\"checkbox\" value=\"all,postupplan\" ";
echo in_array( "all,postupplan",( array )$acl['editplan'] ) ?" checked": "";
echo " />\r\n              修改计划\r\n              <input name=\"acl[planaudit][]\" type=\"checkbox\" value=\"planaudit\" ";
echo in_array( "planaudit",( array )$acl['planaudit'] ) ?" checked": "";
echo " />\r\n              计划申请审核 \r\n\t\t\t  <br/>\r\n\t\t \t\t<input name=\"acl[cpcplan][]\" type=\"checkbox\"  value=\"all,mark,search\" ";
echo in_array( "all,mark,search",( array )$acl['cpcplan'] ) ?" checked": "";
echo "/>\r\n              CPC计划\r\n\t\t\t  \r\n\t\t\t  <input name=\"acl[cpmplan][]\" type=\"checkbox\"  value=\"all,mark,search\" ";
echo in_array( "all,mark,search",( array )$acl['cpmplan'] ) ?" checked": "";
echo "/>\r\n              CPM计划\r\n\t\t\t  \r\n\t\t\t  <input name=\"acl[cpaplan][]\" type=\"checkbox\"  value=\"all,mark,search\" ";
echo in_array( "all,mark,search",( array )$acl['cpaplan'] ) ?" checked": "";
echo "/>\r\n              CPA计划\r\n\t\t\t  \r\n\t\t\t  <input name=\"acl[cpsplan][]\" type=\"checkbox\"  value=\"all,mark,search\" ";
echo in_array( "all,mark,search",( array )$acl['cpsplan'] ) ?" checked": "";
echo "/>\r\n              CPS计划\r\n\t\t\t  \r\n\t\t\t  <input name=\"acl[cpvplan][]\" type=\"checkbox\"  value=\"all,mark,search\" ";
echo in_array( "all,mark,search",( array )$acl['cpvplan'] ) ?" checked": "";
echo "/>\r\n              CPV计划\t\t    </td>\r\n          </tr>\r\n          <tr>\r\n            <td height=\"30\" valign=\"bottom\" >【<strong>广告管理</strong>】</td>\r\n          </tr>\r\n          <tr>\r\n            <td height=\"30\" ><input name=\"acl[ads][]\" type=\"checkbox\"  value=\"all,search,mark\" ";
echo in_array( "all,search,mark",( array )$acl['ads'] ) ?" checked": "";
echo "/>\r\n              广告列表\r\n              <input name=\"acl[ads][]\" type=\"checkbox\"  value=\"postchoose,statudeny\" ";
echo in_array( "postchoose,statudeny",( array )$acl['ads'] ) ?" checked": "";
echo " />\r\n              广告审核\r\n\t\t\t  <input name=\"acl[createads][]\" type=\"checkbox\" value=\"all,postcreateads\" ";
echo in_array( "all,postcreateads",( array )$acl['createads'] ) ?" checked": "";
echo " />\r\n              新建广告\r\n              <input name=\"acl[editads][]\" type=\"checkbox\" value=\"all,postupads\" ";
echo in_array( "all,postupads",( array )$acl['editads'] ) ?" checked": "";
echo " />\r\n              修改广告\r\n\t\t\t  \r\n\t\t\t <input name=\"acl[showads][]\" type=\"checkbox\" value=\"all,view\" ";
echo in_array( "all,view",( array )$acl['showads'] ) ?" checked": "";
echo " />\r\n              浏览广告\r\n\t\t\t   \r\n              <input name=\"acl[adstype][]\" type=\"checkbox\" value=\"adstype\" ";
echo in_array( "adstype",( array )$acl['adstype'] ) ?" checked": "";
echo " />\r\n              广告模板\r\n\t\t\t  \r\n\t\t\t <input name=\"acl[upadslog][]\" type=\"checkbox\" value=\"upadslog\" ";
echo in_array( "upadslog",( array )$acl['upadslog'] ) ?" checked": "";
echo " />\r\n              修改日志 \r\n\t\t\t  \r\n\t\t\t  \r\n\t\t\t  <input name=\"acl[editalladurl][]\" type=\"checkbox\" value=\"editalladurl\" ";
echo in_array( "editalladurl",( array )$acl['editalladurl'] ) ?" checked": "";
echo " />\r\n\t\t\t  批量修改网址\r\n\t\t\t  <br/>\r\n\t\t \t\t<input name=\"acl[cpcads][]\" type=\"checkbox\"  value=\"all,mark,search\" ";
echo in_array( "all,mark,search",( array )$acl['cpcads'] ) ?" checked": "";
echo "/>\r\n              CPC广告\r\n\t\t\t  \r\n\t\t\t  <input name=\"acl[cpmads][]\" type=\"checkbox\"  value=\"all,mark,search\" ";
echo in_array( "all,mark,search",( array )$acl['cpmads'] ) ?" checked": "";
echo "/>\r\n              CPM广告\r\n\t\t\t  \r\n\t\t\t  <input name=\"acl[cpaads][]\" type=\"checkbox\"  value=\"all,mark,search\" ";
echo in_array( "all,mark,search",( array )$acl['cpaads'] ) ?" checked": "";
echo "/>\r\n              CPA广告\r\n\t\t\t  \r\n\t\t\t  <input name=\"acl[cpsads][]\" type=\"checkbox\"  value=\"all,mark,search\" ";
echo in_array( "all,mark,search",( array )$acl['cpsads'] ) ?" checked": "";
echo "/>\r\n              CPS广告\r\n\t\t\t  \r\n\t\t\t  <input name=\"acl[cpvads][]\" type=\"checkbox\"  value=\"all,mark,search\" ";
echo in_array( "all,mark,search",( array )$acl['cpvads'] ) ?" checked": "";
echo "/>\r\n              CPV广告\t\t    </td>\r\n          </tr>\r\n          <tr>\r\n            <td height=\"30\" valign=\"bottom\" >【<strong>报表管理</strong>】</td>\r\n          </tr>\r\n          <tr>\r\n            <td height=\"30\" ><input name=\"acl[stats][]\" type=\"checkbox\"  value=\"all,search\" ";
echo in_array( "all,search",( array )$acl['stats'] ) ?" checked": "";
echo "/>\r\n              计划报表\r\n              <input name=\"acl[statsuser][]\" type=\"checkbox\"  value=\"all,search\" ";
echo in_array( "all,search",( array )$acl['statsuser'] ) ?" checked": "";
echo " />\r\n              会员报表\r\n              <input name=\"acl[statsads][]\" type=\"checkbox\" value=\"all,search\" ";
echo in_array( "all,search",( array )$acl['statsads'] ) ?" checked": "";
echo " />\r\n              广告报表\r\n              <input name=\"acl[statszone][]\" type=\"checkbox\"  value=\"all,search\" ";
echo in_array( "all,search",( array )$acl['statszone'] ) ?" checked": "";
echo "/>\r\n              广告位报表\r\n              <input name=\"acl[adsip][]\" type=\"checkbox\"  value=\"adsip\" ";
echo in_array( "adsip",( array )$acl['adsip'] ) ?" checked": "";
echo " />\r\n              IP报表\r\n\t\t\t   <input name=\"acl[orders][]\" type=\"checkbox\"  value=\"orders\" ";
echo in_array( "orders",( array )$acl['orders'] ) ?" checked": "";
echo " />\r\n              订单管理\r\n\t\t\t     <input name=\"acl[import][]\" type=\"checkbox\"  value=\"import\" ";
echo in_array( "import",( array )$acl['import'] ) ?" checked": "";
echo " />\r\n              导入数据 \r\n              <input name=\"acl[scan][]\" type=\"checkbox\" value=\"scan\" ";
echo in_array( "scan",( array )$acl['scan'] ) ?" checked": "";
echo " />\r\n              扫描作弊\r\n              <input name=\"acl[trend][]\" type=\"checkbox\" value=\"all,search\" ";
echo in_array( "all,search",( array )$acl['trend'] ) ?" checked": "";
echo " />\r\n              流量概况 </td>\r\n          </tr>\r\n          <tr>\r\n            <td height=\"30\" valign=\"bottom\" >【<strong>网站管理</strong>】</td>\r\n          </tr>\r\n          <tr>\r\n            <td height=\"30\" ><input name=\"acl[site][]\" type=\"checkbox\"  value=\"all,search,siteinfo\" ";
echo in_array( "all,search,siteinfo",( array )$acl['site'] ) ?" checked": "";
echo "/>\r\n              网站列表\r\n              <input name=\"acl[site][]\" type=\"checkbox\"  value=\"postchoose,updenyinfo\" ";
echo in_array( "postchoose,updenyinfo",( array )$acl['site'] ) ?" checked": "";
echo " />\r\n              网站审核\r\n              <input name=\"acl[site][]\" type=\"checkbox\" value=\"editsite\" ";
echo in_array( "editsite",( array )$acl['site'] ) ?" checked": "";
echo " />\r\n              网站编辑\r\n\t\t\t   <input name=\"acl[site][]\" type=\"checkbox\" value=\"createsite,postcreatesite,postupsite\" ";
echo in_array( "createsite,postcreatesite,postupsite",( array )$acl['site'] ) ?" checked": "";
echo " />\r\n              新建网站\r\n              <input name=\"acl[zone][]\" type=\"checkbox\" value=\"zone\" ";
echo in_array( "zone",( array )$acl['zone'] ) ?" checked": "";
echo " />\r\n              广告位管理 </td>\r\n          </tr>\r\n          <tr>\r\n            <td height=\"30\" valign=\"bottom\" >【<strong>账务管理</strong>】</td>\r\n          </tr>\r\n          <tr>\r\n            <td height=\"30\" ><input name=\"acl[pay][]\" type=\"checkbox\"  value=\"pay\" ";
echo in_array( "pay",( array )$acl['pay'] ) ?" checked": "";
echo "/>\r\n              结算管理\r\n              <input name=\"acl[pay][]\" type=\"checkbox\"  value=\"postchoose\" ";
echo in_array( "postchoose",( array )$acl['pay'] ) ?" checked": "";
echo " />\r\n              财务支付\r\n              <input name=\"acl[onlinepay][]\" type=\"checkbox\" value=\"all,search,postchoose\" ";
echo in_array( "all,search,postchoose",( array )$acl['onlinepay'] ) ?" checked": "";
echo " />\r\n              在线支付列表\r\n              <input name=\"acl[onlinepay][]\" type=\"checkbox\" value=\"add,postaddonlinepay\" ";
echo in_array( "add,postaddonlinepay",( array )$acl['onlinepay'] ) ?" checked": "";
echo " />\r\n              手动充值</td>\r\n          </tr>\r\n          <tr>\r\n            <td height=\"30\" valign=\"bottom\" >【<strong>其它管理</strong>】</td>\r\n          </tr>\r\n          <tr>\r\n            <td height=\"30\" ><input name=\"acl[news][]\" type=\"checkbox\"  value=\"news\" ";
echo in_array( "news",( array )$acl['news'] ) ?" checked": "";
echo "/>\r\n              公告管理\r\n                <input name=\"acl[makehtml][]\" type=\"checkbox\"  value=\"makehtml\" ";
echo in_array( "makehtml",( array )$acl['makehtml'] ) ?" checked": "";
echo "/>\r\n生成Hthml\r\n<input name=\"acl[createuser][]\" type=\"checkbox\"  value=\"createuser\" ";
echo in_array( "createuser",( array )$acl['createuser'] ) ?" checked": "";
echo "/>\r\n建立会员\r\n<input name=\"acl[pm][]\" type=\"checkbox\"  value=\"pm\" ";
echo in_array( "pm",( array )$acl['pm'] ) ?" checked": "";
echo " />\r\n              短信管理\r\n              <input name=\"acl[sitetype][]\" type=\"checkbox\" value=\"sitetype\" ";
echo in_array( "sitetype",( array )$acl['sitetype'] ) ?" checked": "";
echo " />\r\n              分类管理\r\n              <input name=\"acl[help][]\" type=\"checkbox\" value=\"help\" ";
echo in_array( "help",( array )$acl['help'] ) ?" checked": "";
echo " />\r\n              帮助管理\r\n              <input name=\"acl[upadslog][]\" type=\"checkbox\" value=\"upadslog\" ";
echo in_array( "upadslog",( array )$acl['upadslog'] ) ?" checked": "";
echo " />\r\n              修改记录\r\n\t\t\t  <input name=\"acl[email][]\" type=\"checkbox\" value=\"email\" ";
echo in_array( "email",( array )$acl['email'] ) ?" checked": "";
echo " />\r\n              发送邮件\r\n              <input name=\"acl[loginlog][]\" type=\"checkbox\" value=\"loginlog\" ";
echo in_array( "loginlog",( array )$acl['loginlog'] ) ?" checked": "";
echo " />\r\n              登入日志 \r\n              <input name=\"acl[adminlog][]\" type=\"checkbox\" value=\"adminlog\" ";
echo in_array( "adminlog",( array )$acl['adminlog'] ) ?" checked": "";
echo " />\r\n操作日志  \r\n              <input name=\"acl[db][]\" type=\"checkbox\" value=\"db\" ";
echo in_array( "db",( array )$acl['db'] ) ?" checked": "";
echo " />\r\n数据库 </td>\r\n          </tr>\r\n          <tr>\r\n            <td height=\"30\" ><input type=\"checkbox\" name=\"chkall\" onclick=\"checkall(this.form, 'id')\" />\r\n              全选</td>\r\n          </tr>\r\n        </table></td>\r\n    </tr>\r\n    <tr>\r\n      <td height=\"30\" ><input name=\"button222\"  type=\"button\" class=\"ib\" onclick=\"PostForm()\" value=\" 提交 \"/></td>\r\n    </tr>\r\n  </table>\r\n</form>\r\n<script language=\"JavaScript\" type=\"text/javascript\">\r\n \r\nfunction PostForm(){\t\t \r\n";
if ( $actiontype == "add")
{
echo "\tvar password = \$i('password').value;\t\r\n\tvar repassword = \$i('repassword').value;\r\n\tvar username  = \$i('username').value;\r\n\tif(isNULL(username)){\r\n\t\talert(\"请输入登录名称！\");\t\t\r\n\t\t\$i('username').focus();\r\n\t\treturn false;\r\n     }  \r\n\tif(isNULL(password)){\r\n\t\talert(\"请输入登录密码！\");\t\t\r\n\t\t\$i('password').focus();\r\n\t\treturn false;\r\n     }\r\n\t if(isNULL(repassword)){\r\n\t\talert(\"请输入确认密码！\");\t\t\r\n\t\t\$i('repassword').focus();\r\n\t\treturn false;\r\n     }\r\n\t if(password!=repassword){\r\n\t\talert(\"两次输入的密码不一样！\");\t\t\r\n\t\treturn false;\r\n     }\t \r\n\t ";
}
echo "     document.forms[\"formae\"].submit();\r\n}\r\nfunction CharMode(iN){\r\n if (iN>=48 && iN <=57) \r\n  return 1; \r\n if (iN>=65 && iN <=90) \r\n  return 2;\r\n if (iN>=97 && iN <=122) \r\n  return 4;\r\n else\r\n  return 8; \r\n}\r\n\r\nfunction bitTotal(num){\r\n modes=0;\r\n for (i=0;i<4;i++){\r\n  if (num & 1) modes++;\r\n  num>>>=1;\r\n }\r\n return modes;\r\n}\r\n\r\nfunction checkStrong(sPW){\r\n if (sPW.length<=4)\r\n  return 0;  //密码太短\r\n Modes=0;\r\n for (i=0;i<sPW.length;i++){\r\n  Modes|=CharMode(sPW.charCodeAt(i));\r\n }\r\n\r\n return bitTotal(Modes);\r\n \r\n} \r\nfunction pwStrength(pwd){\r\n O_color=\"#eeeeee\";\r\n L_color=\"#FF0000\";\r\n M_color=\"#FF9900\";\r\n H_color=\"#33CC00\";\r\n if (pwd==null||pwd==''){\r\n  Lcolor=Mcolor=Hcolor=O_color;\r\n } \r\n else{\r\n  S_level=checkStrong(pwd);\r\n  switch(S_level)  {\r\n   case 0:\r\n    Lcolor=Mcolor=Hcolor=O_color;    \r\n   case 1:\r\n    Lcolor=L_color;\r\n    Mcolor=Hcolor=O_color;\r\n    break;\r\n   case 2:\r\n    Lcolor=Mcolor=M_color;\r\n    Hcolor=O_color;\r\n    break;\r\n   default:\r\n    Lcolor=Mcolor=Hcolor=H_color;\r\n    }\r\n  } \r\n \r\n document.getElementById(\"strength_L\").style.background=Lcolor;\r\n document.getElementById(\"strength_M\").style.background=Mcolor;\r\n document.getElementById(\"strength_H\").style.background=Hcolor;\r\n return;\r\n}\r\n</script>\r\n";
}
if ( $edittype == "AdsTypeAddEdit")
{
echo "<form name=\"formae\" id=\"formae\" method=\"post\" action=\"do.php?action=adstype&actiontype=";
if ( $actiontype == "add")
{
echo "postcreateadstype";
}
if ( $actiontype == "edit")
{
echo "posteditadstype";
}
echo "\">\r\n  <input type=\"hidden\" name=\"adstypeid\" value=";
echo $_GET['adstypeid'];
echo ">\r\n  <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n    <tr>\r\n      <td height=\"30\">计费模式</td>\r\n      <td><select name=\"plantype\" class=\"plantype\" id=\"plantype\">\r\n          <option value=\"\" >选择计费模式</option>\r\n          ";
foreach ( ( array )$plantype as $p )
{
echo "          <option value=\"";
echo $p['adstypeid']."_".$p['plantype'];
echo "\" ";
if ( $a['parentid'] == $p['adstypeid'] )
{
echo "selected";
}
echo ">";
echo ucfirst( $p['plantype'] );
echo $p['name'];
echo "</option>\r\n          ";
}
echo "        </select></td>\r\n      <td>&nbsp;</td>\r\n    </tr>\r\n    <tr>\r\n      <td height=\"30\">显示名称</td>\r\n      <td><input name=\"name\" type=\"text\" id=\"name\" value=\"";
echo $a['name'];
echo "\" /></td>\r\n      <td>&nbsp;</td>\r\n    </tr>\r\n    <tr>\r\n      <td height=\"30\">嵌入方式</td>\r\n      <td><input type=\"radio\" name=\"framework\" value=\"script\" ";
if ( $a['framework'] == "script")
{
echo "checked";
}
echo " />\r\n        Script\r\n        <input type=\"radio\" name=\"framework\" value=\"iframe\" ";
if ( $a['framework'] == "iframe")
{
echo "checked";
}
echo " />\r\n        Iframe </td>\r\n      <td>&nbsp;</td>\r\n    </tr>\r\n    <tr>\r\n      <td height=\"30\">控件元素</td>\r\n      <td><input name=\"htmlcontrol[]\" type=\"checkbox\" id=\"htmlcontrol[]\" value=\"url\" ";
echo in_array( "url",( array )$a['htmlcontrol'] ) ?" checked": "";
echo "/>\r\n        广告地址\r\n  <input name=\"htmlcontrol[]\" type=\"checkbox\" id=\"htmlcontrol\" value=\"imageurl\" ";
echo in_array( "imageurl",( array )$a['htmlcontrol'] ) ?" checked": "";
echo "/>\r\n        上传控件\r\n        <input name=\"htmlcontrol[]\" type=\"checkbox\" id=\"htmlcontrol\" value=\"width\" ";
echo in_array( "width",( array )$a['htmlcontrol'] ) ?" checked": "";
echo "/>\r\n        宽度\r\n        <input name=\"htmlcontrol[]\" type=\"checkbox\" id=\"htmlcontrol\" value=\"height\" ";
echo in_array( "height",( array )$a['htmlcontrol'] ) ?" checked": "";
echo "/>\r\n        高度\r\n        <input name=\"htmlcontrol[]\" type=\"checkbox\" id=\"htmlcontrol\" value=\"htmlcode\" ";
echo in_array( "htmlcode",( array )$a['htmlcontrol'] ) ?" checked": "";
echo "/>\r\n        自定义代码<br />\r\n\t\t<input name=\"htmlcontrol[]\" type=\"checkbox\" id=\"htmlcontrol\" value=\"headline\" ";
echo in_array( "headline",( array )$a['htmlcontrol'] ) ?" checked": "";
echo "/>\r\n        主题标题\r\n\t\t<input name=\"htmlcontrol[]\" type=\"checkbox\" id=\"htmlcontrol\" value=\"description\" ";
echo in_array( "description",( array )$a['htmlcontrol'] ) ?" checked": "";
echo "/>\r\n        主题描述\r\n\t\t<input name=\"htmlcontrol[]\" type=\"checkbox\" id=\"htmlcontrol\" value=\"dispurl\" ";
echo in_array( "dispurl",( array )$a['htmlcontrol'] ) ?" checked": "";
echo "/>\r\n        主题显示网址\r\n\t  </td><td valign=\"top\">&nbsp;</td>\r\n    </tr>\r\n    <tr>\r\n      <td width=\"90\">模板代码</td>\r\n      <td><textarea name=\"htmltemplate\" id=\"htmltemplate\" style=\"width:550px;height:230px\">";
echo $a['htmltemplate'];
echo "</textarea></td>\r\n      <td width=\"100\" valign=\"top\"><table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"3\">\r\n          <tr>\r\n            <td align=\"left\" valign=\"top\"><strong>标签说明：</strong></td>\r\n          </tr>\r\n          <tr>\r\n            <td align=\"left\" valign=\"top\">{targeturl}</td>\r\n          </tr>\r\n          <tr>\r\n            <td align=\"left\" valign=\"top\">&nbsp;广告地址</td>\r\n          </tr>\r\n          <tr>\r\n            <td align=\"left\" valign=\"top\">&nbsp;</td>\r\n          </tr>\r\n          <tr>\r\n            <td align=\"left\" valign=\"top\">{imgurl}</td>\r\n          </tr>\r\n          <tr>\r\n            <td align=\"left\" valign=\"top\">&nbsp; 图片地址</td>\r\n          </tr>\r\n          <tr>\r\n            <td align=\"left\" valign=\"top\">&nbsp;</td>\r\n          </tr>\r\n          <tr>\r\n            <td align=\"left\" valign=\"top\">{htmlcode}</td>\r\n          </tr>\r\n          <tr>\r\n            <td align=\"left\" valign=\"top\">&nbsp;自定义代码</td>\r\n          </tr>\r\n          <tr>\r\n            <td align=\"left\" valign=\"top\">&nbsp;</td>\r\n          </tr>\r\n          <tr>\r\n            <td align=\"left\" valign=\"top\">{width}</td>\r\n          </tr>\r\n          <tr>\r\n            <td align=\"left\" valign=\"top\">&nbsp;广告宽度</td>\r\n          </tr>\r\n          <tr>\r\n            <td align=\"left\" valign=\"top\">&nbsp;</td>\r\n          </tr>\r\n          <tr>\r\n            <td align=\"left\" valign=\"top\">{height}</td>\r\n          </tr>\r\n          <tr>\r\n            <td align=\"left\" valign=\"top\">&nbsp;广告高度</td>\r\n          </tr>\r\n        </table></td>\r\n    </tr>\r\n    <tr>\r\n      <td>模板说明</td>\r\n      <td height=\"50\"><textarea name=\"info\" id=\"info\" style=\"width:350px;height:40px\">";
echo $a['info'];
echo "</textarea></td>\r\n      <td>&nbsp;</td>\r\n    </tr>\r\n    <tr>\r\n      <td>&nbsp;</td>\r\n      <td height=\"40\">\r\n\t  ";
echo "\t  <input type=\"button\" name=\"Submit\" value=\" 提交 \" onclick=\"PostAdsType()\"  />\r\n\t  ";
echo "\t  </td>\r\n      <td>&nbsp;</td>\r\n    </tr>\r\n  </table>\r\n</form>\r\n<script language=\"JavaScript\" type=\"text/javascript\">\r\n function PostAdsType(){\r\n \tvar plantype = \$i('plantype').value; \r\n \tvar name = \$i('name').value;\r\n\tvar htmltemplate = \$i('htmltemplate').value;\r\n\tvar info = \$i('info').value;\r\n\tvar framework  = get_radio_value(\$n('framework'));\r\n\tvar htmlcontrol  = get_checkbox_value(\$n('htmlcontrol[]'));\r\n\tif(isNULL(plantype)){\r\n\t\talert(\"请选择广告计费模式！\");\t\t\r\n\t\treturn false;\r\n     }  \r\n\tif(isNULL(name)){\r\n\t\talert(\"请填写显示名称！\");\t\t\r\n\t\t\$i('name').focus();\r\n\t\treturn false;\r\n     }  \r\n\tif(isNULL(framework)){\r\n\t\talert(\"请选择一种嵌入方式\");\t\t\r\n\t\treturn false;\r\n     }\r\n\t if(isNULL(htmlcontrol)){\r\n\t\talert(\"最少需要选择一个控件元素\");\t\t\r\n\t\treturn false;\r\n     }\r\n\t if(isNULL(htmltemplate)){\r\n\t\talert(\"请填写模板代码！\");\t\t\r\n\t\t\$i('htmltemplate').focus();\r\n\t\treturn false;\r\n     }\r\n\t document.forms[\"formae\"].submit();\r\n }\r\n</script>\r\n";
}
if ( $edittype == "trendDayAndWeek")
{
echo "<script LANGUAGE=\"JavaScript\" src=\"/javascript/jiandate.js\"></script>\r\n<script src=\"/javascript/jquery/jquery.js\" type=\"text/javascript\"></script>\r\n<script type=\"text/javascript\" src=\"/javascript/swfobject.js\"></script>\r\n";
if ( $actiontype == "dayadnweek")
{
echo "<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n  <tr>\r\n    <td><div id=\"w\"> <strong>You need to upgrade your Flash Player</strong> </div>\r\n                      <script type=\"text/javascript\">\t\r\n\t\tvar so = new SWFObject(\"/templates/";
echo Z_TPL;
echo "/charts/line.swf\", \"amcolumn\", \"100%\", \"230\", \"8\", \"#FFFFFF\");\r\n\t\tso.addVariable(\"path\", \"/templates/";
echo Z_TPL;
echo "/charts/\");\r\n\t\tso.addVariable(\"settings_file\", escape(\"/templates/";
echo Z_TPL;
echo "/charts/line_settings.xml\")); \r\n\t\tso.addVariable(\"data_file\", escape(\"do.php?action=trenddata&actiontype=line&timerange=";
echo $timerange;
echo "&searchtype=";
echo $searchtype;
echo "&searchval=";
echo $searchval;
echo "\"));\t\t\r\n    \tso.addVariable(\"preloader_color\", \"#999999\");\t\r\n\t\tso.write(\"w\");\r\n\t</script></td>\r\n  </tr>\r\n  <tr>\r\n    <td>&nbsp;</td>\r\n  </tr>\r\n</table>\r\n";
}
echo " \r\n";
if ( $actiontype == "trendarea")
{
echo "\r\n<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n<tr>\r\n    <td  style=\"border-bottom:1px #dddddd solid;\"><table width=\"600\" height=\"35\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n        <tr>\r\n           \r\n          <td><form action=\"\" method=\"post\" style=\"padding:0px; margin:0px\">\r\n\t\t  <input name=\"searchtype\" type=\"hidden\" value=\"";
echo $searchtype;
echo "\" />\r\n\t\t  <input name=\"searchval\" type=\"hidden\" value=\"";
echo $searchval;
echo "\" />\r\n            <select name=\"timerange\" id=\"timerange\" style=\"width:200px\">\r\n    <option value=\"";
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
echo "\">\r\n      ";
if ( $time_begin == "")
{
echo DAYS;
}
else
{
echo $time_begin;
}
echo " 至 ";
if ( $time_end == "")
{
echo DAYS;
}
else
{
echo $time_end;
}
echo "      </option>\r\n    <option  value=\"a\" ";
echo $timerange == "a"?"selected ": "";
echo ">所有时间段</option>\r\n    <option value=\"t\" ";
echo $timerange == "t"?" selected": "";
echo " >昨天</option>\r\n    <option value=\"w\" ";
if ( $timerange == "w"||$timerange == "")
{
echo " selected";
}
echo " >过去一周内</option>\r\n    <option value=\"m\" ";
echo $timerange == "m"?" selected": "";
echo ">本月内</option>\r\n    <option value=\"l\" ";
echo $timerange == "l"?" selected": "";
echo ">上月的</option>\r\n  </select>\r\n  <img src=\"/javascript/images/calendar.gif\" align=\"absmiddle\" id=\"abd\" onclick=\"d.a('timerange','timerange','2')\"/>\r\n  <input name=\"Submit2\" type=\"submit\" class=\"submit-x\" id=\"Submit\" value=\"查询\"/>\r\n          </form></td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n  ";
if ( !$toparea )
{
echo "  <tr>\r\n    <td><table width=\"100\" height=\"25\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#FF0000\" style=\"margin-top:10px\">\r\n        <tr>\r\n          <td align=\"center\"><strong><font color=\"#FFFFFF\">没有数据</font></strong></td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n  ";
}
echo "  ";
if ( $toparea )
{
echo "  <tr>\r\n    <td><table   height=\"25\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#44AA55\" style=\"margin-top:10px\">\r\n        <tr>\r\n          <td align=\"center\"><strong><font color=\"#FFFFFF\">&nbsp;&nbsp;<strong><script language=\"JavaScript\" type=\"text/javascript\">\r\nvar t = \$(\"#timerange\").find(\"option:selected\").text();  \r\ndocument.write(t);\r\n</script> ";
echo $plan['planname'];
echo " 的分布</font></strong>&nbsp;&nbsp;</td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n  ";
}
echo "  <tr>\r\n    <td><table width=\"95%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" style=\"margin-top:10px\">\r\n        ";
foreach ( ( array )$toparea as $ta )
{
$tn = $trendmodel->ctr( $tasn,$ta['num'] );
echo "        <tr>\r\n          <td height=\"30\"  class=\"td_b_4\"  >&nbsp;</td>\r\n          <td style=\"border-bottom:1px #dddddd solid;\"><table width=\"99%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n              <tr>\r\n                <td width=\"100\">";
echo $ta['province'];
echo "</td>\r\n                <td width=\"80\">";
echo $tn."%";
echo "</td>\r\n                <td width=\"220\"><div style=\"background:#114890; float: left;width:";
echo $tn +1;
echo "%\" class=\"p1\">&nbsp;</div></td>\r\n                <td width=\"90\" align=\"right\">";
echo $ta['num'];
echo "</td>\r\n              </tr>\r\n            </table></td>\r\n          <td width=\"6\" class=\"td_b_5\">&nbsp;</td>\r\n        </tr>\r\n        ";
}
echo "      </table></td>\r\n  </tr>\r\n  <tr>\r\n    <td>&nbsp;</td>\r\n  </tr>\r\n</table>\r\n";
}
}
echo "\r\n";
if ( $edittype == "SumPay")
{
echo " \r\n  <table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n  ";
foreach ( ( array )$daydata as $d )
{
echo "    <tr>\r\n      <td width=\"100\"  height=\"30\" style=\"border-bottom:1px #dddddd solid;\"><img  src='/templates/";
echo Z_TPL;
echo "/images/date.png' align='absmiddle' />&nbsp;";
echo $d['addtime'];
echo "</td>\r\n      <td width=\"120\" style=\"border-bottom:1px #dddddd solid;\">汇总： ";
echo $paymodel->getsumpaylogbyaddtime( $d['addtime'] );
echo "元 </td>\r\n      <td style=\"border-bottom:1px #dddddd solid;\">\r\n\t  ";
$paybank = $paymodel->getallsumpayuserpaylog( $d['addtime'] );
foreach ( ( array )$paybank as $nb )
{
foreach ( $GLOBALS['GLOBALS']['GLOBALS']['C_Bank'] as $banks =>$val )
{
if ( $nb['bank'] == $val[0] )
{
$nb['bank'] = $banks;
}
}
echo "<span style=\"padding-right:30px;\">[".$nb['bank']."]：".$nb['pay']."</span>";
}
echo "</td>\r\n    </tr>\r\n\t";
}
echo "  </table>\r\n \r\n \r\n";
}
echo "\r\n";
if ( $edittype == "AdsPay")
{
echo " <script src=\"/javascript/jquery/jquery.js\" type=\"text/javascript\"></script>\r\n\r\n <form action=\"do.php?action=onlinepay&actiontype=postaddonlinepay\" method=\"post\" name=\"addonlinepay\" id=\"addonlinepay\">\r\n  <table width=\"100%\" border=\"0\"  align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n  \r\n    <tr>\r\n      <td width=\"60\" height=\"30\" align=\"right\" >会员：</td>\r\n      <td ><input name=\"touser\" type=\"text\"  class=\"reg\" id=\"touser\" value=\"";
echo $_GET['username'];
echo "\" size=\"30\" /></td>\r\n    </tr>\r\n\t";
if ( $_GET['type'] == "1"||$_GET['type'] == "")
{
echo "    <tr>\r\n      <td height=\"30\" align=\"right\" >类型：</td>\r\n      <td nowrap=\"nowrap\" ><input name=\"clearing\" type=\"radio\" value=\"day\" checked=\"checked\" />\r\n        日款\r\n        <input type=\"radio\" name=\"clearing\" value=\"week\" />\r\n        周款\r\n        <input type=\"radio\" name=\"clearing\" value=\"month\" />\r\n        月款 \r\n\t\t<input type=\"radio\" name=\"clearing\" value=\"x\" />\r\n        下线款 </td>\r\n    </tr>\r\n\t";
}
echo "    <tr>\r\n      <td height=\"30\" align=\"right\" >选项：</td>\r\n      <td > \r\n        <input name=\"status\" type=\"radio\" id=\"p0\" value=\"3\" checked=\"checked\" />\r\n      增加 \r\n      <input type=\"radio\" name=\"status\" id=\"p1\" value=\"4\" />\r\n      扣除 </td>\r\n    </tr>\r\n    <tr>\r\n      <td height=\"30\" align=\"right\" >金额：</td>\r\n      <td nowrap=\"nowrap\" ><input name=\"imoney\" type=\"text\" class=\"reg\" id=\"imoney\" value=\"\" />\r\n        元</td>\r\n    </tr>\r\n    <tr>\r\n      <td align=\"right\" >说明：</td>\r\n      <td nowrap=\"nowrap\" ><textarea name=\"payinfo\" class=\"reg\" id=\"payinfo\" style=\"height:60px;width:300px\"></textarea></td>\r\n    </tr>\r\n    <tr>\r\n      <td height=\"60\" ></td>\r\n      <td height=\"20\" >&nbsp; \r\n        <input  type=\"button\" \r\n  value=\" 提交 \" onclick=\"PostPay()\"/>\r\n      &nbsp;&nbsp; </td>\r\n    </tr>\r\n</table>\r\n </form>\r\n <script language=\"JavaScript\" type=\"text/javascript\">\r\nfunction PostPay(){\r\n\tvar touser  = \$i('touser').value;\r\n\tvar imoney = \$i('imoney').value;\r\n\tvar payinfo = \$i('payinfo').value;\r\n\tif(isNULL(touser)){\r\n\t\talert(\"请输入会员名称！\");\t\t\r\n\t\t\$i('touser').focus();\r\n\t\treturn false;\r\n     }  \r\n\tif(isNULL(imoney)){\r\n\t\talert(\"请输入金额！\");\t\t\r\n\t\t\$i('imoney').focus();\r\n\t\treturn false;\r\n     }\r\n\t if(!isFloat(imoney)){\r\n        \talert(\"金额数目无法确认，请重新输入！\");\r\n\t\t\t\$i('imoney').focus();\r\n\t\t\treturn false;\r\n     }\r\n\t if(isNULL(payinfo)){\r\n        alert(\"请输入说明！\");\t\t\r\n\t\t\$i('payinfo').focus();\t\r\n\t\treturn false;\r\n     }\r\n\t if(!isValidReg(payinfo)){\r\n        \talert(\"说明内容里含有非法字符，请重新输入！\");\r\n\t\t\t\$i('payinfo').focus();\r\n\t\t\treturn false;\r\n     }\r\n\t \$.get(\"do.php?action=userinfo&username=\"+touser, function(data){\t\t\r\n\t\tif( data == \"0\" )\r\n\t\t{\r\n           document.forms[\"addonlinepay\"].submit();\r\n\t\t  // parent.doRemoveWin();\r\n\t\t}\r\n        else\r\n\t\t{\r\n         \talert('没有这个会员');\r\n\t\t}\r\n\t\t});\r\n}\r\n</script>\r\n";
}
echo "\r\n\r\n\r\n\r\n";
if ( $edittype == "Compensate")
{
echo " <script src=\"/javascript/jquery/jquery.js\" type=\"text/javascript\"></script>\r\n<SCRIPT LANGUAGE=\"JavaScript\" src=\"/javascript/jiandate.js\"></SCRIPT>\r\n <form action=\"do.php?action=onlinepay&actiontype=postaddcompensate\" method=\"post\" name=\"addonlinepay\" id=\"addonlinepay\">\r\n   <table width=\"100%\" border=\"0\"  align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n  \r\n    <tr>\r\n      <td width=\"60\" height=\"30\" align=\"right\" >补尝日期：</td>\r\n      <td ><input name=\"timerange\" type=\"text\"  class=\"reg\" id=\"timerange\"   style=\"width:200px\" value=\"\" readonly=\"\"/> \r\n      <img src=\"/javascript/images/calendar.gif\" align=\"absmiddle\" id=\"abd\" onclick=\"d.a('timerange','timerange','2')\"/> <span class=\"f12i\">按日期会员报表中的应付金额补尝</span>\t  </td>\r\n    </tr>\r\n\t \r\n    <tr>\r\n      <td height=\"40\" align=\"right\" >补尝比例：</td>\r\n      <td nowrap=\"nowrap\" ><input name=\"ratio\" type=\"text\"   id=\"ratio\" size=\"6\" maxlength=\"3\" /> \r\n      %</td>\r\n    </tr>\r\n\t \r\n\t   <tr>\r\n      <td height=\"40\" align=\"right\" >补尝到：</td>\r\n      <td nowrap=\"nowrap\" ><input name=\"clearing\" type=\"radio\" value=\"day\" checked=\"checked\" />\r\n        日款\r\n        <input type=\"radio\" name=\"clearing\" value=\"week\" />\r\n        周款\r\n        <input type=\"radio\" name=\"clearing\" value=\"month\" />\r\n        月款 \r\n\t\t </td>\r\n    </tr>\r\n\t \r\n   \r\n    <tr>\r\n      <td align=\"right\" >补尝说明：</td>\r\n      <td nowrap=\"nowrap\" ><textarea name=\"payinfo\" class=\"reg\" id=\"payinfo\" style=\"height:120px;width:400px\"></textarea></td>\r\n    </tr>\r\n    <tr>\r\n      <td height=\"60\" ></td>\r\n      <td height=\"20\" >&nbsp; \r\n        <input  type=\"button\" \r\n  value=\" 提交 \" onclick=\"Posts()\"/>\r\n      &nbsp;&nbsp; </td>\r\n    </tr>\r\n</table>\r\n </form>\r\n <script language=\"JavaScript\" type=\"text/javascript\">\r\nfunction Posts(){\r\n\tvar timerange  = \$i('timerange').value;\r\n\tvar ratio = \$i('ratio').value;\r\n\tvar payinfo = \$i('payinfo').value;\r\n\tif(isNULL(timerange)){\r\n\t\talert(\"请选择补尝日期！\");\r\n\t\treturn false;\r\n     }  \r\n\tif(isNULL(ratio)){\r\n\t\talert(\"请输入补尝比例！\");\t\t\r\n\t\t\$i('ratio').focus();\r\n\t\treturn false;\r\n     }\r\n\t \r\n\t if(!isNumber(ratio)){\r\n\t\talert(\"补尝比例只能是1~100的整数！\");\t\t\r\n\t\t\$i('ratio').focus();\r\n\t\treturn false;\r\n     }\r\n\t \r\n\t \r\n\t \r\n\t if(parseFloat(ratio)<1 || parseFloat(ratio)>100){\r\n\t\talert(\"补尝比例只能是1~100的整数！\");\t\t\r\n\t\t\$i('ratio').focus();\r\n\t\treturn false;\r\n     }\r\n\t \r\n\t  \r\n\t if(isNULL(payinfo)){\r\n        alert(\"请输入说明！\");\t\t\r\n\t\t\$i('payinfo').focus();\t\r\n\t\treturn false;\r\n     }\r\n\t if(!isValidReg(payinfo)){\r\n        \talert(\"说明内容里含有非法字符，请重新输入！\");\r\n\t\t\t\$i('payinfo').focus();\r\n\t\t\treturn false;\r\n     }\r\n     document.forms[\"addonlinepay\"].submit();\r\n}\r\n</script>\r\n";
}
echo "\r\n\r\n\r\n\r\n\r\n";
if ( $edittype == "MakeHtml")
{
echo "\r\n <form action=\"do.php?action=makehtml\" method=\"post\" name=\"makehtml\" id=\"makehtml\">\r\n <input name=\"makeall\" id=\"makeall\" type=\"hidden\" value=\"\" />\r\n  <table width=\"100%\" border=\"0\"  align=\"center\" cellpadding=\"6\" cellspacing=\"0\">\r\n  \r\n    <tr>\r\n      <td width=\"80\" height=\"30\" align=\"center\" >生成：</td>\r\n      <td ><input type=\"checkbox\" name=\"indexaction[]\" value=\"index\" />\r\n首页\r\n  <input type=\"checkbox\" name=\"indexaction[]\" value=\"advertiser\" />\r\n广告商\r\n<input type=\"checkbox\" name=\"indexaction[]\" value=\"affiliate\" />\r\n网站主\r\n<input type=\"checkbox\" name=\"indexaction[]\" value=\"style\" />\r\n广告模式\r\n<input type=\"checkbox\" name=\"indexaction[]\" value=\"union\" />\r\n系统优势<br>\r\n<input type=\"checkbox\" name=\"indexaction[]\" value=\"help\" />\r\n常见问题\r\n<input type=\"checkbox\" name=\"indexaction[]\" value=\"contact\" />\r\n联系客服\r\n<input type=\"checkbox\" name=\"indexaction[]\" value=\"company\" />\r\n关于我们\r\n<input type=\"checkbox\" name=\"indexaction[]\" value=\"newslist\" />\r\n新闻列表\r\n<input type=\"checkbox\" name=\"indexaction[]\" value=\"register\" />\r\n会员注册 \r\n<input type=\"checkbox\" name=\"indexaction[]\" value=\"login\" />\r\n会员登入</td>\r\n    </tr>\r\n\t\r\n    <tr>\r\n      <td height=\"30\" align=\"center\" >公告：</td>\r\n      <td nowrap=\"nowrap\" ><input name=\"makenews\" type=\"radio\" value=\"\" checked=\"checked\" />\r\n        不生成 <input name=\"makenews\" type=\"radio\" value=\"all\" />\r\n        所有公告 \r\n          <input name=\"makenews\" type=\"radio\" value=\"n\" />\r\n最新 \r\n<input name=\"newsn\" type=\"text\" id=\"newsn\" value=\"10\" size=\"4\" maxlength=\"9\" />\r\n条</td>\r\n    </tr>\r\n    <tr>\r\n      <td height=\"30\" align=\"center\" >帮助：</td>\r\n      <td nowrap=\"nowrap\" ><input name=\"makehelp\" type=\"radio\" value=\"\" checked=\"checked\" />\r\n        不生成\r\n\t  <input name=\"makehelp\" type=\"radio\" value=\"all\" />\r\n        所有帮助\r\n        <input name=\"makehelp\" type=\"radio\" value=\"n\" />\r\n        最新\r\n        <input name=\"helpn\" type=\"text\" id=\"helpn\" value=\"10\" size=\"4\" maxlength=\"9\" />\r\n        条</td>\r\n    </tr>\r\n\t\r\n    <tr>\r\n      <td height=\"60\" ><span id=\"loading\" style=\"display:none;background:#FF5A00;width:80px;height:20px;line-height:20px;color:#ffffff;font-size:12px;text-align:center;\"> 正在生成 ...</span></td>\r\n      <td ><input  type=\"button\" value=\" 生成选项 \" onclick=\"Posts()\"/>\r\n      &nbsp;&nbsp; <input name=\"allm\"  type=\"button\" onclick=\"PostA()\" value=\" 生成所有 \"/> </td>\r\n    </tr>\r\n</table>\r\n </form>\r\n <script language=\"JavaScript\" type=\"text/javascript\">\r\n function Posts(){\r\n \tvar a = get_checkbox_value(\$n(\"indexaction[]\"));\r\n\tvar n = get_radio_value(\$n(\"makenews\"));\r\n\tvar h = get_radio_value(\$n(\"makehelp\"));\r\n\tif(isNULL(a) && isNULL(n)  && isNULL(h) ) alert(\"没有选择任何选项,无法执行生成\");\r\n \telse {\r\n\t\t\$i('loading').style.display = '';\r\n\t\tdocument.forms[\"makehtml\"].submit();\r\n\t}\r\n }\r\n function PostA(){\r\n \t\$i(\"makeall\").value = \"all\";\r\n\t\$i('loading').style.display = '';\r\n\tdocument.forms[\"makehtml\"].submit();\r\n }\r\n</script>\r\n";
}
echo "\r\n\r\n";
if ( $edittype == "CreateUser")
{
echo " <script src=\"/javascript/jquery/jquery.js\" type=\"text/javascript\"></script>\r\n <form action=\"do.php?action=createuser\" method=\"post\" name=\"createuser\" id=\"createuser\" target=\"_parent\">\r\n <table width=\"100%\" border=\"0\"  align=\"center\" cellpadding=\"6\" cellspacing=\"0\">\r\n   <tr>\r\n     <td width=\"80\" height=\"30\" align=\"center\" >会员角色：</td>\r\n     <td ><input type=\"radio\" name=\"type\" value=\"3\"  onclick=\"\$i('s_qq').style.display = '';\$i('s_center').style.display = ''\">\r\n       联盟客服 \r\n\t   <input type=\"radio\" name=\"type\" value=\"4\"  onclick=\"\$i('s_qq').style.display = '';\$i('s_center').style.display = ''\">\r\n       联盟商务\r\n\t   <input type=\"radio\" name=\"type\" value=\"2\"  onclick=\"\$i('s_qq').style.display = 'none';\$i('s_center').style.display = 'none'\">\r\n\t   \r\n       广告商\r\n       <input type=\"radio\" name=\"type\" value=\"1\"  onclick=\"\$i('s_qq').style.display = 'none';\$i('s_center').style.display = 'none'\">\r\n       网站主</td>\r\n   </tr>\r\n   <tr>\r\n     <td height=\"30\" align=\"center\" >用户名称：</td>\r\n     <td nowrap=\"nowrap\" ><input name=\"username\" type=\"text\" id=\"username\" style=\"width:200px; height:22px\"/></td>\r\n   </tr>\r\n   <tr>\r\n     <td height=\"30\" align=\"center\" >用户密码：</td>\r\n     <td nowrap=\"nowrap\" ><input name=\"password\" type=\"password\" id=\"password\" style=\"width:200px; height:22px\"/></td>\r\n   </tr>\r\n   <tr>\r\n     <td height=\"30\" align=\"center\" >确认密码：</td>\r\n     <td ><input name=\"passwordre\" type=\"password\" id=\"passwordre\" style=\"width:200px; height:22px\"/></td>\r\n   </tr>\r\n   <tr id=\"s_center\" >\r\n     <td height=\"30\" align=\"center\" >联系人：</td>\r\n     <td ><input name=\"contact\" type=\"text\" id=\"contact\" style=\"width:200px; height:22px\"/></td>\r\n   </tr>\r\n   <tr id=\"s_qq\" >\r\n     <td height=\"30\" align=\"center\" >客服QQ：</td>\r\n     <td ><input name=\"qq\" type=\"text\" id=\"qq\" style=\"width:200px; height:22px\"/></td>\r\n   </tr>\r\n   <tr>\r\n     <td height=\"60\" ><span id=\"loading\" style=\"display:none;background:#FF5A00;width:80px;height:20px;line-height:20px;color:#ffffff;font-size:12px;text-align:center;\"> 正在生成 ...</span></td>\r\n     <td ><input name=\"button\"  type=\"button\" onclick=\"Posts()\" value=\" 提交 \"/>     </td>\r\n   </tr>\r\n </table>\r\n </form>\r\n <script language=\"JavaScript\" type=\"text/javascript\">\r\n function Posts(){\r\n \tvar type = get_radio_value(\$n(\"type\"));\r\n\tvar username = \$i(\"username\").value;\r\n\tvar password = \$i(\"password\").value;\r\n\tvar passwordre = \$i(\"passwordre\").value;\r\n\tvar qq = \$i(\"qq\").value;\r\n\tvar contact = \$i(\"contact\").value;\r\n\tif(isNULL(type)){\r\n\t\talert(\"请选择会员角色\");\r\n\t\treturn false;\r\n\t}\r\n\tif(isNULL(username)){\r\n\t\talert(\"请输入会员名称\");\r\n\t\t\$i(\"username\").focus();\r\n\t\treturn false;\r\n\t}\r\n\tif(isNULL(password)){\r\n\t\talert(\"请选输入会员密码\");\r\n\t\t\$i(\"password\").focus();\r\n\t\treturn false;\r\n\t}\r\n\tif(isNULL(passwordre)){\r\n\t\talert(\"请再输入一遍您上面输入的密码\");\r\n\t\t\$i(\"passwordre\").focus();\r\n\t\treturn false;\r\n\t}\r\n\tif(passwordre!=password){\r\n\t\talert(\"两次密码输入不一样\");\r\n\t\t\$i(\"passwordre\").focus();\r\n\t\treturn false;\r\n\t}\r\n\tif(isNULL(qq) && (type==3 || type==4)){\r\n\t\talert(\"请输入客服QQ\");\r\n\t\t\$i(\"qq\").focus();\r\n\t\treturn false;\r\n\t}\r\n\tif(isNULL(contact) && (type==3 || type==4)){\r\n\t\talert(\"请输入客服联系人\");\r\n\t\t\$i(\"contact\").focus();\r\n\t\treturn false;\r\n\t}\r\n\t \$.get(\"do.php?action=userinfo&username=\"+username, function(data){\t\t\r\n\t\tif( data == \"0\" ){\r\n           alert('会员名称重复');\r\n\t\t}\r\n        else{\r\n\t\t   document.forms[\"createuser\"].submit();\r\n\t\t   //parent.doRemoveWin();\r\n\t\t}\r\n\t});\r\n }\r\n</script>\r\n";
}
echo "\r\n\r\n";
if ( $edittype == "EditDeduction")
{
echo " <form action=\"do.php?action=";
echo $action;
echo "&actiontype=posteditdeduction\" method=\"post\"  >\r\n   <input type=\"hidden\" name=\"uid\" value=\"";
echo $users['uid'];
echo "\" />\r\n <table width=\"100%\" border=\"0\"  align=\"center\" cellpadding=\"6\" cellspacing=\"0\">\r\n   <tr class=\"s-edit\">\r\n     <td width=\"120\" >点击类扣量：</td>\r\n     <td ><input name=\"cpcdeduction\" type=\"text\"  id=\"cpcdeduction\" value=\"";
echo $users['cpcdeduction'];
echo "\" size=\"20\" maxlength=\"3\" class=\"text\"/>\r\n       % </td>\r\n   </tr>\r\n   <tr class=\"s-edit\">\r\n     <td >弹窗类扣量：</td>\r\n     <td ><input name=\"cpmdeduction\" type=\"text\" id=\"cpmdeduction\" value=\"";
echo $users['cpmdeduction'];
echo "\" size=\"20\" maxlength=\"3\" class=\"text\"/>\r\n       %</td>\r\n   </tr>\r\n   <tr class=\"s-edit\">\r\n     <td >展示类扣量：</td>\r\n     <td ><input name=\"cpvdeduction\" type=\"text\"  id=\"cpvdeduction\" value=\"";
echo $users['cpvdeduction'];
echo "\" size=\"20\" maxlength=\"3\" class=\"text\"/>\r\n       %</td>\r\n   </tr>\r\n   <tr class=\"s-edit\">\r\n     <td >引导注册类扣量：</td>\r\n     <td ><input name=\"cpadeduction\" type=\"text\"  id=\"cpadeduction\" value=\"";
echo $users['cpadeduction'];
echo "\" size=\"20\" maxlength=\"3\" class=\"text\"/>\r\n       %</td>\r\n   </tr>\r\n   <tr class=\"s-edit\">\r\n     <td >销售分成类扣量：</td>\r\n     <td ><input name=\"cpsdeduction\" type=\"text\"   id=\"cpsdeduction\" value=\"";
echo $users['cpsdeduction'];
echo "\" size=\"20\" maxlength=\"3\" class=\"text\"/>\r\n       %</td>\r\n   </tr>\r\n   <tr class=\"s-edit\">\r\n     <td >PV步长值：</td>\r\n     <td ><input name=\"pvstep\" type=\"text\" class=\"reg\" id=\"pvstep\" value=\"";
echo $users['pvstep'];
echo "\" size=\"20\" maxlength=\"3\" />\r\n         <span class=\"f12i\">会员步长值优先于全局步长值</span></td>\r\n   </tr>\r\n   <tr>\r\n     <td height=\"30\" >域名限制：</td>\r\n     <td ><input type=\"radio\" name=\"insite\" value=\"1\" ";
if ( $users['insite'] == "1")
{
echo "checked";
}
echo "/>\r\n默认\r\n  <input type=\"radio\" name=\"insite\" value=\"2\" ";
if ( $users['insite'] == "2")
{
echo "checked";
}
echo "/>\r\n开启\r\n<input type=\"radio\" name=\"insite\" value=\"3\" ";
if ( $users['insite'] == "3")
{
echo "checked";
}
echo "/>\r\n关闭</td>\r\n   </tr>\r\n   <tr class=\"s-edit\">\r\n     <td valign=\"top\" >属于客服</td>\r\n     <td ><select name=\"serviceid\" id=\"serviceid\" style=\"width:160px;\">\r\n         <option value=\"\">请选择客服</option>\r\n         ";
foreach ( $serviceuser as $s )
{
echo "         <option value=\"";
echo $s['uid'];
echo "\" ";
if ( $users['serviceid'] == $s['uid'] )
{
echo "selected";
}
echo ">";
echo $s['contact'];
echo "</option>\r\n         ";
}
echo "       </select>\r\n     </td>\r\n   </tr>\r\n   <tr>\r\n     <td height=\"50\" ><span id=\"loading\" style=\"display:none;background:#FF5A00;width:80px;height:20px;line-height:20px;color:#ffffff;font-size:12px;text-align:center;\"> 正在生成 ...</span></td>\r\n     <td ><input name=\"button\"  type=\"submit\"  value=\" 提交 \"/>     </td>\r\n   </tr>\r\n </table>\r\n </form>\r\n";
}

?>