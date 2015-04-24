<?php if(!defined('IN_ZYADS')) exit(); 
include TPL_DIR . "/header.php";?>
<script language="JavaScript" type="text/javascript" src="/javascript/jquery/jquery.js"></script>
<div id="pro_menu" class="pro_menu" stylea="height: 11px; display: block;background-color:#FFFFFF;background-position:0 -107px;">
  <div class="shell">
    <ul class="pro">
      <li><a href="?action=adslist">广告列表</a></li>
      <li  class="default"><a href="?action=createads">建新广告</a></li>
    </ul>
  </div>
</div>
<div class="pages">
   
  <div id="wrapper">
    <div id="content">
      <h3 class="tab tab1" title="first">
        <div class="tabtxt"><a href="?action=createplan">新建计划</a></div>
      </h3>
      <div class="tab" >
        <h3 class="tabtxt" title="second"><a href="?action=createads">新建广告</a></h3>
      </div>
      <div class="boxholder">
        <div class="box">
          <p><img alt="" src="/templates/<?php echo Z_TPL?>/images/bulb.gif" width="19" height="19" /> <strong>提示：</strong> 请不要上传大于500KB文件 。</p>
		  
		 <form action="?action=<?php  if($action == 'createads') echo "postcreateads"; if($action == 'editads') echo "editads&actiontype=postupads";?>" method="post" enctype="multipart/form-data" name="create" id="create"onsubmit="return post_submit()">
		  <input name="adsid" type="hidden" value="<?php echo $a['adsid']?>" />
		  <input name="files" type="hidden" value="up" />
 			<input name="htmlcontrol" type="hidden" value="<?php echo implode(',',$htmlcontrol)?>" />
              <table width="90%"  border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td valign="top"><?php if($statetype == 'success') {?>
                      <table  border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" class="success" id="success" width="100%" >
                        <tr>
                          <td height="30"><img  src='/templates/<?php echo Z_TPL?>/images/ico_success_16.gif' align='absmiddle' /><span style="margin-left:10px;">操作成功！</span></td>
                          <td>&nbsp;</td>
                        </tr>
                      </table>
                      <?php }?></td>
                </tr>
                <tr></tr>
                <tr>
                  <td height="20">&nbsp;</td>
                </tr>
                <?php if ($a['status']==2 && $updata) {?>
                <tr>
                  <td height="20">
				  <div class="tipinfo" id="success">
                      <div class="r1"></div>
                    <div class="r2"></div>
                    <div class="text" id="text">上次修改后未曾审核</div>
                    <div class="l1"></div>
                    <div class="l2"></div></td>
                </tr>
                <tr>
                  <td height="30" class="cpt">修改日志</td>
                </tr>
                <tr>
                  <td><br />
                      <?php
								foreach((array)$olddata as $key=>$val){
									if($key=='htmlcode'){
										echo '<b>'.$key.'</b>'.'：<textarea style="width:220px;height:50px">'.$val.'</textarea>->'.'<textarea style="width:220px;height:50px">'.$updata[$key].'</textarea><br>';
									}else{
										echo '<b>'.$key.'</b>'.'：'.$val.'->'.'<font color="#ff0000">'.$updata[$key].'</font><br>';
									}
								}
					?>
                    <br /></td>
                </tr>
                <?php }?>
                <tr>
                  <td class="cpt">常规</td>
                </tr>
                <tr>
                  <td><table width="93%" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td width="100">&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td valign="top">属于广告计划</td>
                        <td><select name="planid" id="planid" onchange="location.href = '?action=createads&amp;planid='+this.options[selectedIndex].value" <?php if($action=='editads') echo "disabled='disabled'"?>>
                            <option value="">请选择一个计划项目</option>
                            <?php foreach((array)$allplan as $pt) {?>
                            <option value="<?php echo $pt['planid']?>" <?php if($pt['planid']==$planid) echo "selected"?>><?php echo  $pt['planname']?>[<?php echo  ucfirst($pt['plantype'])?>]</option>
                            <?php } ?>
                          </select>
                          &nbsp;<span id="umoney"></span><br />
                          <span class="gray">广告属于广告计划项目。</span></td>
                      </tr>
                      <tr>
                        <td valign="top">广告类型</td>
                        <td><select name="adstypeid" id="adstypeid"  onchange="location.href = '?action=createads&amp;planid=<?php echo $planid?>&amp;adstypeid='+this.options[selectedIndex].value" <?php if($action=='editads') echo "disabled='disabled'"?>>
                            <option value="">请选择一个广告类型</option>
                            <?php foreach((array)$adstype as $at) {?>
                            <option value="<?php echo $at['adstypeid']?>" <?php if($at['adstypeid']==$adstypeid) echo "selected"?>><?php echo $at['name']?></option>
                            <?php } ?>
                          </select>
                            <br />
                            <span class="gray">广告应用于哪一种类型展现。</span></td>
                      </tr>
                      <tr id="_imageurl_" style="display:none">
                        <td valign="top">图片/Flash<font color="#FF0000">*</font></td>
                        <td >
                          <input name="imageurl" type="file" id="imageurl" size="40"  style="width:336px;height:22px"/>
						  <br />
						  <span class="gray">只能上传.jpg .gif .swf .png .bmp格式文件,小大限止500KB以下。</span>
                        </td>
                      </tr>
                      <tr id="_specs_" style="display:none">
                        <td valign="top">常用尺寸</td>
                        <td><select name="specs" id="specs"  <?php if($action=='editplan') echo "disabled='disabled'"?> onchange="Dospecs(this.value)">
                            <option value="">----自定义----</option>
                            <?php foreach((array)$GLOBALS['C_Specs'] as $as) {?>
                            <option value="<?php echo $as?>" ><?php echo $as?></option>
                            <?php } ?>
                            <option value="0x0">全屏弹出</option>
                          </select>
                            <br />
                            <span class="gray">快速度选取广告尺寸。</span></td>
                      </tr>
                      <tr id="_width_" style="display:none">
                        <td valign="top">宽度<font color="#FF0000">*</font></td>
                        <td><input name="width" type="text" id="width" value="<?php echo $a['width']?>" size="30" maxlength="4" />
                            <br />
                            <span class="gray">广告宽度,弹窗类0既为全屏弹出。</span></td>
                      </tr>
                      <tr id="_height_" style="display:none">
                        <td valign="top">高度<font color="#FF0000">*</font></td>
                        <td><input name="height" type="text"  id="height" value="<?php echo $a['height']?>" size="30" maxlength="4"/>
                            <br />
                            <span class="gray">广告高度,弹窗类0既为全屏弹出。</span></td>
                      </tr>
                       </tr>
					    <tr id="_headline_" style="display:none">
                        <td valign="top">标题<font color="#FF0000">*</font></td>
                        <td><input name="headline" type="text" id="headline" value="<?php echo $a['headline']?>" size="30" maxlength="32"/>
                          <br />
                          <span class="gray">主题广告标题内容。</span></td>
                      </tr>
					    <tr id="_description_" style="display:none">
                        <td valign="top">内容描述<font color="#FF0000">*</font></td>
                        <td><textarea name="description" cols="35" rows="3" id="description"><?php echo $a['description']?></textarea>
                          <br />
                          <span class="gray">主题广告内容描述，简要说明广告。</span></td>
                      </tr>
                      <tr id="_url_" style="display:none">
                        <td valign="top">广告网址<font color="#FF0000">*</font></td>
                        <td><input name="url" type="text" id="url" value="http://<?php echo str_replace('http://','',$a['url'])?>" size="30" maxlength="1024"/>
                          <br />
                          <span class="gray">点击或是弹出的广告地址。</span></td>
                      </tr>
					  <tr id="_dispurl_" style="display:none">
                        <td valign="top">显示网址<font color="#FF0000">*</font></td>
                        <td><input name="dispurl" type="text" id="dispurl" value="<?php echo $a['dispurl']?>" size="30" maxlength="1024"/>
                          <br />
                          <span class="gray">广告中显示的网站地址。</span></td>
                      </tr>
                      <tr id="_htmlcode_" style="display:none">
                        <td valign="top">自定义代码<font color="#FF0000">*</font></td>
                        <td><textarea name="htmlcode" cols="60" rows="10" id="htmlcode"  style="width:600px;height:300px"><?php echo $a['htmlcode'];?></textarea>
                            <br />
                            <span class="gray">标准的HTML代码格式。</span></td>
                      </tr>
                      <tr id="_adinfo_">
                        <td valign="top">广告描述</td>
                        <td><textarea name="adinfo" cols="30" id="adinfo" style="width:400px;height:50px"><?php echo $a['adinfo']?></textarea>
                            <br />
                            <span class="gray">简要的描述。</span></td>
                      </tr>
                      <tr>
                        <td valign="top">&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                  </table></td>
                </tr>
                <tr>
                  <td height="50"><input type="submit" name="Submit" class="form-submit" value=" 提 交 " /></td>
                </tr>
                <tr>
                  <td height="50">&nbsp;</td>
                </tr>
              </table>
		  </form>
        </div>
      </div>
    </div>
  </div>
</div>
<script language="JavaScript" type="text/javascript">
function Dospecs(v){
	v = v.split('x');
	$i("height").value='';
	$i("width").value='';
	if(v[0]){
		$i("height").value=v[1];
		$i("width").value=v[0];
	}
}
function post_submit(){ 
	var planid = get_Select_Value($i("planid"));
	var adstypeid = get_Select_Value($i("adstypeid"));
	if(isNULL(planid)){
        	alert("请选择一个广告计划项目");
			return false;
     }
	 if(isNULL(adstypeid)){
        	alert("请选择一个广告展现类型");
			return false;
     }
	 <?php foreach((array)$htmlcontrol as $h){?>
	 
	 <?php if($h=='imageurl'){?>
			var c = '<?php echo $action?>';
			var reg=/^.*?\.(jpg|bmp|png|jpeg|gif|swf|JPG|BMP|PNG|JPEG|GIF|SWF)$/;
			var fileToUpload = $("#imageurl").val();
			if(isNULL(fileToUpload) &&  c=='createads'){
				alert("请选择要上传的文件"); 
				$("#imageurl").focus();
				return false;
			}
			else if(!reg.test(fileToUpload) &&  c=='createads')
			{
				alert("上传的格式文件只能是jpg|bmp|png|jpeg|gif|swf");  
				$("#imageurl").focus();
				return false;
			}
			else if(!isNULL(fileToUpload)&&!reg.test(fileToUpload) && c=='createads')
			{
				alert("上传的格式文件只能是jpg|bmp|png|jpeg|gif|swf"); 
				$("#imageurl").focus();
				return false;
			}
	 
	 <?php } else {	?>
	 
	if(isNULL($("#<?php echo $h?>").val())){
			alert("请填写带有“*”星号的选项");
			$("#<?php echo $h?>").focus();
			return false;
	}
	<?php } if($h=='url'){?>
	
	if(!isValidURL($("#url").val())){
			alert("广告网址输入不合法"); 
			$("#url").focus();
        	return false;
    	}
		
	<?php } }?>
}
<?php foreach((array)$htmlcontrol as $h){?>
$("#_<?php echo $h?>_").show();
<?php if($h=='width'){?> $("#_specs_").show();<?php }?>
<?php }?>
</script>
<?php include TPL_DIR . "/footer.php"?>