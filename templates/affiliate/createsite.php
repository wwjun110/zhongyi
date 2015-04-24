<?php if(!defined('IN_ZYADS')) exit(); 
include_once TPL_DIR . "/header.php";
?>
<script src="/javascript/jquery/jquery.js" language='JavaScript'></script>

<div id="pro_menu" class="pro_menu" style="display: block;">
  <div class="shell">
    <ul class="pro">
      <li><a href="?action=zonelist">广告位列表</a></li>
      <li class="<?php  if($action == 'createsite') echo "default"?>"><a href="?action=createsite">新增网站</a></li>
      <?php  if($action == 'editsite'){?>
      <li class="default"><a href="javascript:void(0)">编辑网站</a></li>
      <?php }?>
      <li><a href="?action=sitelist">网站列表</a></li>
    </ul>
  </div>
</div>
<div class="zonelist">
  <h2>
    <?php  if($action == 'createsite') echo "新增"; if($action == 'editsite') echo "编辑";?>
    网站 <span class="tsp"  style="padding-left:20px;"><a href="?action=sitelist">查看网站&raquo;</a></span></h2>
  <table width="100%"  border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td ><form id="postsite" name="postsite" method="post" action="?action=<?php  if($action == 'createsite') echo "postcreatesite"; if($action == 'editsite') echo "postupdatesite";?>">
          <input type="hidden" name="siteid" value=<?php echo $s['siteid']?>>
          <table width="600" border="0" cellpadding="0" cellspacing="3" style="font-size:12px;line-height:20px;">
            <tr>
              <td><strong>您的网站主域名<font color="#FF0000">*</font></strong></td>
            </tr>
            <tr>
              <td><span class="gray">http://</span>
                <input name="siteurl" type="text" id="siteurl" value="<?php echo $s['siteurl']?>" <?php if($action=='editsite') echo "disabled"?>/>
                <br />
                <span class="gray">请填写网站首页地址，且地址长度不要超过128个字符</span></td>
            </tr>
            <?php if($action == 'createsite' && $GLOBALS['C_ZYIIS']['reg_type']=='2'){?>
            <tr>
              <td><div class="checksite">
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
				    1.  请点击“<a href="?action=checksite" id="down" >下载验证文件</a>”获取验证文件<br>
                    2. 20分钟内将验证文件放置于您所配置域名(如www.zyiis.com)的根目录下<br>
                    3. 点击“完成验证”按钮
					</span>
					<span id="text2" style="display:none">
				    <textarea name="ck2val" id="ck2val" style="font-size:12px;height:60px;margin-top:10px;width:400px;"></textarea>
				    <br>
                     将以上代码添加到您网站首页HTML代码的<HEAD>标签与</HEAD>标签之间，并点击“完成验证”按钮。<br>
  					（该步骤需在20分钟内完成）
					</span>
                    <div style="padding:10px">
                      <input type="button" id="doCheckSite" value="完成验证" />
                    </div>
                  </div>
                  <div id="ckinfo" style="color:#FF0000"></div>
                </div></td>
            </tr>
            <?php }?>
      
             
            <tr>
              <td><strong>网站名称<font color="#FF0000">*</font></strong></td>
            </tr>
            <tr>
              <td><input type="text" name="sitename" id="sitename" value="<?php echo $s['sitename']?>"/></td>
            </tr>
            <tr>
              <td><strong>备案号
                <!--<font color="#FF0000">*</font>-->
                </strong></td>
            </tr>
            <tr>
              <td><input type="text" name="beian" id="beian" value="<?php echo $s['beian']?>"/>
                <br />
                <span class="gray">在<a href="http://www.miibeian.gov.cn" target="_blank">www.miibeian.gov.cn</a>的备案号</span></td>
            </tr>
            <tr>
              <td><strong>网站描述</strong></td>
            </tr>
            <tr>
              <td><textarea id="siteinfo" name="siteinfo" cols="55" rows="6"/><?php echo $s['siteinfo']?></textarea></td>
            </tr>
            <tr>
              <td><strong>网站类别</strong></td>
            </tr>
            <tr>
              <td><select name="sitetype" id="sitetype">
			  	  <option value="0">-选择网站类别-</option>
                  <?php foreach((array)$sitetype as $t) {?>
                  <option value="<?php echo $t['sid']?>" <?php if($t['sid']==$s['sitetype']) echo "selected"?>><?php echo  $t['sitename']?></option>
                  <?php } ?>
                </select></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td><input name="button" type="button" id="doWebsitePost" style="" onclick="sitePost()" value=" 提交 " <?php if($action=='createsite' && $GLOBALS['C_ZYIIS']['reg_type']=='2') echo "disabled"?>/></td>
            </tr>
          </table>
        </form></td>
    </tr>
  </table>
</div>
<?php include TPL_DIR . "/footer.php"?>
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
		$.post("?action=checksite", { actiontype:'makehtml',url: siteurl},
		function (data, textStatus){
			//alert(data);
			if(data){
				$i('ck2val').value=data;
				$("#ck2val").attr("disabled",true);  
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
		$.post("?action=checksite", { actiontype:'ck',url: siteurl,cktype:cktype},
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
	if(isNULL(siteurl)){
        	alert("请输入网站地址！");
			$i('siteurl').focus();
			return false;
    }
	if (!isValidURL('http://'+siteurl)) {
			alert("无效的Url！");
			return false ;
		}
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
	
	document.forms["postsite"].submit();
}
</script>
