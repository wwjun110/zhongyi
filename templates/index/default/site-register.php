<?php if(!defined('IN_ZYADS')) exit(); 
include TPL_DIR . "/header.php";?>
<title>注册会员 <?php echo $GLOBALS['C_ZYIIS']['sitename']?></title>
<script src="/javascript/jquery/jquery.js" type="text/javascript"></script>
<div class="regtbg"></div>

<form id="regform" name="regform" method="post" action="/index.php?action=register">
  <table width="960" border="0" align="center" cellpadding="0" cellspacing="3" >
    <tr>
      <td colspan="2" ><img src="/templates/<?php echo Z_TPL?>/images/regstep_bg.jpg" align="absmiddle"  style="  padding-bottom:4px"/></td>
    </tr>
    <tr>
      <td valign="top" ><table width="98%" border="0" cellpadding="0" cellspacing="3" style="font-size:12px;line-height:20px; ">
         <?php if ( $GLOBALS['C_ZYIIS']['close_reg_adv']=='0'){?>
          <tr>
            <td style="font-size: 14px;  padding-top:20px; "><img src="/templates/<?php echo Z_TPL?>/images/jump.jpg" align="absmiddle"  style="padding-right:10px"/><a href="/index.php?action=register&type=advertiser">跳过，注册广告商</a></td>
          </tr>
		  <?php }?>
          <tr>
            <td style="font-size: 14px;line-height: 26px;border-bottom: 1px #D8D8D8 solid;padding-bottom: 6px; padding-top:20px; font-weight:bold">第一步：填写域名并验证</td>
          </tr>
          <tr>
            <td style="color:#666">填写域名网站的主要域名，下载生成的验证文件并上传至网站根目录，完成验证。</td>
          </tr>
          <tr>
            <td >&nbsp;</td>
          </tr>
          <tr>
            <td ><table width="99%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="122" valign="top" class="reg_tit"><span class="required">*</span>您的网站域名： </td>
                  <td><span class="reg_tit">http://</span>
                    <input name="siteurl" type="text" id="siteurl" value="<?php echo $s['siteurl']?>"  class="sreg_input" style="width:200px"/> <br />
              <span class="gray">请填写网站首页地址，且地址长度不要超过128个字符</span></td></tr>
                <tr>
                  <td valign="top" class="reg_tit">&nbsp;</td>
                  <td><div class="checksite" style="margin-bottom:10px">
                  <p>
                    <label for="st_1"  class="active cktab" id="for_1">
                    <input name="cktype" type="radio" id="st_1" value="f" checked="checked" />
                    验证方式一：文件验证 </label>
                    <label for="st_2" class="cktab"  id="for_2">
                    <input type="radio" name="cktype" value="h" id="st_2"  />
                    验证方式二：HTML标签 </label>
                  </p>
                  <div class="text"> 
				  	<span id="text1">
				    1.  请点击“<a href="/index.php?action=checksite" id="down" >下载验证文件</a>”获取验证文件<br>
                    2. 20分钟内将验证文件放置于您所配置域名(如www.yoursite.com)的根目录下<br>
                    3. 点击“完成验证”按钮					</span>
					<span id="text2" style="display:none">
				    <textarea name="ck2val" id="ck2val" style="font-size:12px;height:60px;margin-top:10px;width:400px;"  ></textarea>
				    <br>
                     将以上代码添加到您网站首页HTML代码的<HEAD>标签与</HEAD>标签之间，并点击“完成验证”按钮。<br>
  					（该步骤需在20分钟内完成）					</span>
                    <div style="padding:10px">
                      <input type="button" id="doCheckSite" value="完成验证" />
                    </div>
                  </div>
                  <div id="ckinfo" style="color:#FF0000"></div>
                </div></td>
                </tr>
                <tr>
                  <td valign="top" class="reg_tit"><span class="required">*</span>网站名称： </td>
                  <td><input type="text" name="sitename" id="sitename" class="sreg_input"/></td>
                </tr>
                <tr>
                  <td valign="top" class="reg_tit"> 备案号： </td>
                  <td><input type="text" name="beian" id="beian"  class="sreg_input"/></td>
                </tr>
                <tr>
                  <td valign="top" class="reg_tit">网站描述： </td>
                  <td><textarea id="siteinfo" name="siteinfo" cols="55" rows="6"/></textarea></td>
                </tr>
                <tr>
                  <td valign="top" class="reg_tit"><span class="required">*</span>网站类别：</td>
                  <td><select name="sitetype" id="sitetype">
                    <option value="0">-选择网站类别-</option>
                    <?php foreach((array)$sitetype as $t) {?>
                    <option value="<?php echo $t['sid']?>" ><?php echo  $t['sitename']?></option>
                    <?php } ?>
                  </select></td>
                </tr>
                <tr>
                  <td valign="top" class="reg_tit">&nbsp;</td>
                  <td><input name="button" type="button" id="doWebsitePost" style=" margin: 10px auto 20px; padding: 0pt 6px; height: 26px; width: auto; " onclick="sitePost()" value=" 下一步 "  disabled="disabled" /></td>
                </tr>
            </table></td>
          </tr>
      </table></td>
      <td width="200" valign="top"  style="border-left: 1px dashed #D7D7D7;"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:100px">
        <tr>
          <td align="center"><img src="/templates/<?php echo Z_TPL?>/images/user.jpg" align="absmiddle"  style="  padding-bottom:4px"/></td>
        </tr>
        <tr>
          <td height="30" align="center"> <font color="#FF0000" class="f14">已有联盟账户</font> </td>
        </tr>
        <tr>
          <td height="30" align="center" class="gray">点击下面的登入按钮，快速登入</td>
        </tr>
        <tr>
          <td align="center" class="gray"><input name="button2" type="button" id="button" style=" margin: 10px auto 20px; padding: 0pt 6px; height: 26px; width: auto; " onclick="window.location.href='<?php echo url("?action=login")?>'" value=" 马上登入 "  /></td>
        </tr>
      </table></td>
    </tr>
  </table>
</form>
<script language="JavaScript" type="text/javascript">
$("#for_1").click(function(){
		$i('for_1').className = 'active cktab';$i('for_2').className = 'cktab'; 
		$('#text1').show();
		$('#text2').hide();
});
$("#for_2").click(function(){
		var siteurl = jsTrim($("#siteurl").val())
		if(isNULL(siteurl)){
			$("#ckinfo").html("无法生成代码,无效的url");
			return false ;
		} ; 
		$i('for_2').className = 'active cktab';$i('for_1').className = 'cktab';  
		$('#text2').show();
		$('#text1').hide();
		$.post("/index.php?action=checksite", { actiontype:'makehtml',url: siteurl},
		function (data, textStatus){
			 
			if(data){
				$i('ck2val').value=data;
				$("#ck2val").attr("readonly",true);  
			}
		}, "text");
		
});
$("#down").click(function(){
		siteurl = jsTrim($("#siteurl").val());   
        if(isNULL(siteurl)){
			$("#ckinfo").html("获取验证文件失败,无效的url");
			return false ;
		} 
		if (!isValidURL('http://'+siteurl)) {
			$("#ckinfo").html("获取验证文件失败,无效的url");
			return false ;
		}
		$("#ckinfo").html("");
		this.href +="&url="+siteurl;  
});
$("#doCheckSite").click(function(){
		siteurl = jsTrim($("#siteurl").val());
		cktype = get_radio_value($n("cktype"));
        if(isNULL(siteurl)){
			$("#ckinfo").html("验证失败,无效的url");
			return false ;
		} 
		if (!isValidURL('http://'+siteurl)) {
			$("#ckinfo").html("验证失败,无效的url");
			return false ;
		}
		$("#ckinfo").html("正在验证...");
		$.post("/index.php?action=checksite", { actiontype:'ck',url: siteurl,cktype:cktype},
		function (data, textStatus){
			//alert(data);
			if(data=='ok'){
				$("#ckinfo").html("验证完成");
				$("#doWebsitePost").attr("disabled",false);  
			}
			else if(data=='re'){
				$("#ckinfo").html("域名已被注册，请不要重复");
			}
			else if(data=='nalexa'){
				$("#ckinfo").html("Alexa排名太低无法注册，最低排名需要<?php echo $GLOBALS['C_ZYIIS']['alexa']?>以上");
			}
			else {
				$("#ckinfo").html("获取验证失败，请您确认正确放置后，再次点击“完成验证”按钮");
			}
		}, "text");
		 
});    
function sitePost(){
	var sitename = $i('sitename').value;
	var siteinfo = jsTrim($i('siteinfo').value);
	var siteurl = $i('siteurl').value;
	var beian = $i('beian').value;
	var sitetype = get_Option_Value($i('sitetype')); 
	if(isNULL(sitename)){
        	alert("请输入网站名称！");
			$i('sitename').focus();
			return false;
    }
	if(!isValidReg(sitename)){
        	alert("网站名称里含有非法字符，请重新输入！");
			$i('sitename').focus();
			return false;
    }
	
	/*if(isNULL(beian)){
        	alert("请输入网站备案号！");
			$i('beian').focus();
	}*/
	
	if(sitetype<1){
        	alert("请选择网站类别！");;
			return false;
    }
	
	document.forms["regform"].submit();
}
</script>
 