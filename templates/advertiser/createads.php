<?php if(!defined('IN_ZYADS')) exit(); 
include TPL_DIR . "/header.php";?>
<script language="JavaScript" type="text/javascript" src="/javascript/jquery/jquery.js"></script>
<div id="pro_menu" class="pro_menu" stylea="height: 11px; display: block;background-color:#FFFFFF;background-position:0 -107px;">
  <div class="shell">
    <ul class="pro">
      <li><a href="?action=adslist">����б�</a></li>
      <li  class="default"><a href="?action=createads">���¹��</a></li>
    </ul>
  </div>
</div>
<div class="pages">
   
  <div id="wrapper">
    <div id="content">
      <h3 class="tab tab1" title="first">
        <div class="tabtxt"><a href="?action=createplan">�½��ƻ�</a></div>
      </h3>
      <div class="tab" >
        <h3 class="tabtxt" title="second"><a href="?action=createads">�½����</a></h3>
      </div>
      <div class="boxholder">
        <div class="box">
          <p><img alt="" src="/templates/<?php echo Z_TPL?>/images/bulb.gif" width="19" height="19" /> <strong>��ʾ��</strong> �벻Ҫ�ϴ�����500KB�ļ� ��</p>
		  
		 <form action="?action=<?php  if($action == 'createads') echo "postcreateads"; if($action == 'editads') echo "editads&actiontype=postupads";?>" method="post" enctype="multipart/form-data" name="create" id="create"onsubmit="return post_submit()">
		  <input name="adsid" type="hidden" value="<?php echo $a['adsid']?>" />
		  <input name="files" type="hidden" value="up" />
 			<input name="htmlcontrol" type="hidden" value="<?php echo implode(',',$htmlcontrol)?>" />
              <table width="90%"  border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td valign="top"><?php if($statetype == 'success') {?>
                      <table  border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" class="success" id="success" width="100%" >
                        <tr>
                          <td height="30"><img  src='/templates/<?php echo Z_TPL?>/images/ico_success_16.gif' align='absmiddle' /><span style="margin-left:10px;">�����ɹ���</span></td>
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
                    <div class="text" id="text">�ϴ��޸ĺ�δ�����</div>
                    <div class="l1"></div>
                    <div class="l2"></div></td>
                </tr>
                <tr>
                  <td height="30" class="cpt">�޸���־</td>
                </tr>
                <tr>
                  <td><br />
                      <?php
								foreach((array)$olddata as $key=>$val){
									if($key=='htmlcode'){
										echo '<b>'.$key.'</b>'.'��<textarea style="width:220px;height:50px">'.$val.'</textarea>->'.'<textarea style="width:220px;height:50px">'.$updata[$key].'</textarea><br>';
									}else{
										echo '<b>'.$key.'</b>'.'��'.$val.'->'.'<font color="#ff0000">'.$updata[$key].'</font><br>';
									}
								}
					?>
                    <br /></td>
                </tr>
                <?php }?>
                <tr>
                  <td class="cpt">����</td>
                </tr>
                <tr>
                  <td><table width="93%" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td width="100">&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td valign="top">���ڹ��ƻ�</td>
                        <td><select name="planid" id="planid" onchange="location.href = '?action=createads&amp;planid='+this.options[selectedIndex].value" <?php if($action=='editads') echo "disabled='disabled'"?>>
                            <option value="">��ѡ��һ���ƻ���Ŀ</option>
                            <?php foreach((array)$allplan as $pt) {?>
                            <option value="<?php echo $pt['planid']?>" <?php if($pt['planid']==$planid) echo "selected"?>><?php echo  $pt['planname']?>[<?php echo  ucfirst($pt['plantype'])?>]</option>
                            <?php } ?>
                          </select>
                          &nbsp;<span id="umoney"></span><br />
                          <span class="gray">������ڹ��ƻ���Ŀ��</span></td>
                      </tr>
                      <tr>
                        <td valign="top">�������</td>
                        <td><select name="adstypeid" id="adstypeid"  onchange="location.href = '?action=createads&amp;planid=<?php echo $planid?>&amp;adstypeid='+this.options[selectedIndex].value" <?php if($action=='editads') echo "disabled='disabled'"?>>
                            <option value="">��ѡ��һ���������</option>
                            <?php foreach((array)$adstype as $at) {?>
                            <option value="<?php echo $at['adstypeid']?>" <?php if($at['adstypeid']==$adstypeid) echo "selected"?>><?php echo $at['name']?></option>
                            <?php } ?>
                          </select>
                            <br />
                            <span class="gray">���Ӧ������һ������չ�֡�</span></td>
                      </tr>
                      <tr id="_imageurl_" style="display:none">
                        <td valign="top">ͼƬ/Flash<font color="#FF0000">*</font></td>
                        <td >
                          <input name="imageurl" type="file" id="imageurl" size="40"  style="width:336px;height:22px"/>
						  <br />
						  <span class="gray">ֻ���ϴ�.jpg .gif .swf .png .bmp��ʽ�ļ�,С����ֹ500KB���¡�</span>
                        </td>
                      </tr>
                      <tr id="_specs_" style="display:none">
                        <td valign="top">���óߴ�</td>
                        <td><select name="specs" id="specs"  <?php if($action=='editplan') echo "disabled='disabled'"?> onchange="Dospecs(this.value)">
                            <option value="">----�Զ���----</option>
                            <?php foreach((array)$GLOBALS['C_Specs'] as $as) {?>
                            <option value="<?php echo $as?>" ><?php echo $as?></option>
                            <?php } ?>
                            <option value="0x0">ȫ������</option>
                          </select>
                            <br />
                            <span class="gray">���ٶ�ѡȡ���ߴ硣</span></td>
                      </tr>
                      <tr id="_width_" style="display:none">
                        <td valign="top">���<font color="#FF0000">*</font></td>
                        <td><input name="width" type="text" id="width" value="<?php echo $a['width']?>" size="30" maxlength="4" />
                            <br />
                            <span class="gray">�����,������0��Ϊȫ��������</span></td>
                      </tr>
                      <tr id="_height_" style="display:none">
                        <td valign="top">�߶�<font color="#FF0000">*</font></td>
                        <td><input name="height" type="text"  id="height" value="<?php echo $a['height']?>" size="30" maxlength="4"/>
                            <br />
                            <span class="gray">���߶�,������0��Ϊȫ��������</span></td>
                      </tr>
                       </tr>
					    <tr id="_headline_" style="display:none">
                        <td valign="top">����<font color="#FF0000">*</font></td>
                        <td><input name="headline" type="text" id="headline" value="<?php echo $a['headline']?>" size="30" maxlength="32"/>
                          <br />
                          <span class="gray">������������ݡ�</span></td>
                      </tr>
					    <tr id="_description_" style="display:none">
                        <td valign="top">��������<font color="#FF0000">*</font></td>
                        <td><textarea name="description" cols="35" rows="3" id="description"><?php echo $a['description']?></textarea>
                          <br />
                          <span class="gray">������������������Ҫ˵����档</span></td>
                      </tr>
                      <tr id="_url_" style="display:none">
                        <td valign="top">�����ַ<font color="#FF0000">*</font></td>
                        <td><input name="url" type="text" id="url" value="http://<?php echo str_replace('http://','',$a['url'])?>" size="30" maxlength="1024"/>
                          <br />
                          <span class="gray">������ǵ����Ĺ���ַ��</span></td>
                      </tr>
					  <tr id="_dispurl_" style="display:none">
                        <td valign="top">��ʾ��ַ<font color="#FF0000">*</font></td>
                        <td><input name="dispurl" type="text" id="dispurl" value="<?php echo $a['dispurl']?>" size="30" maxlength="1024"/>
                          <br />
                          <span class="gray">�������ʾ����վ��ַ��</span></td>
                      </tr>
                      <tr id="_htmlcode_" style="display:none">
                        <td valign="top">�Զ������<font color="#FF0000">*</font></td>
                        <td><textarea name="htmlcode" cols="60" rows="10" id="htmlcode"  style="width:600px;height:300px"><?php echo $a['htmlcode'];?></textarea>
                            <br />
                            <span class="gray">��׼��HTML�����ʽ��</span></td>
                      </tr>
                      <tr id="_adinfo_">
                        <td valign="top">�������</td>
                        <td><textarea name="adinfo" cols="30" id="adinfo" style="width:400px;height:50px"><?php echo $a['adinfo']?></textarea>
                            <br />
                            <span class="gray">��Ҫ��������</span></td>
                      </tr>
                      <tr>
                        <td valign="top">&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                  </table></td>
                </tr>
                <tr>
                  <td height="50"><input type="submit" name="Submit" class="form-submit" value=" �� �� " /></td>
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
        	alert("��ѡ��һ�����ƻ���Ŀ");
			return false;
     }
	 if(isNULL(adstypeid)){
        	alert("��ѡ��һ�����չ������");
			return false;
     }
	 <?php foreach((array)$htmlcontrol as $h){?>
	 
	 <?php if($h=='imageurl'){?>
			var c = '<?php echo $action?>';
			var reg=/^.*?\.(jpg|bmp|png|jpeg|gif|swf|JPG|BMP|PNG|JPEG|GIF|SWF)$/;
			var fileToUpload = $("#imageurl").val();
			if(isNULL(fileToUpload) &&  c=='createads'){
				alert("��ѡ��Ҫ�ϴ����ļ�"); 
				$("#imageurl").focus();
				return false;
			}
			else if(!reg.test(fileToUpload) &&  c=='createads')
			{
				alert("�ϴ��ĸ�ʽ�ļ�ֻ����jpg|bmp|png|jpeg|gif|swf");  
				$("#imageurl").focus();
				return false;
			}
			else if(!isNULL(fileToUpload)&&!reg.test(fileToUpload) && c=='createads')
			{
				alert("�ϴ��ĸ�ʽ�ļ�ֻ����jpg|bmp|png|jpeg|gif|swf"); 
				$("#imageurl").focus();
				return false;
			}
	 
	 <?php } else {	?>
	 
	if(isNULL($("#<?php echo $h?>").val())){
			alert("����д���С�*���Ǻŵ�ѡ��");
			$("#<?php echo $h?>").focus();
			return false;
	}
	<?php } if($h=='url'){?>
	
	if(!isValidURL($("#url").val())){
			alert("�����ַ���벻�Ϸ�"); 
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