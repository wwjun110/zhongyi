<?php if(!defined('IN_ZYADS')) exit(); 
include TPL_DIR . "/header.php";?>
<title>ע���Ա <?php echo $GLOBALS['C_ZYIIS']['sitename']?></title>
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
            <td style="font-size: 14px;  padding-top:20px; "><img src="/templates/<?php echo Z_TPL?>/images/jump.jpg" align="absmiddle"  style="padding-right:10px"/><a href="/index.php?action=register&type=advertiser">������ע������</a></td>
          </tr>
		  <?php }?>
          <tr>
            <td style="font-size: 14px;line-height: 26px;border-bottom: 1px #D8D8D8 solid;padding-bottom: 6px; padding-top:20px; font-weight:bold">��һ������д��������֤</td>
          </tr>
          <tr>
            <td style="color:#666">��д������վ����Ҫ�������������ɵ���֤�ļ����ϴ�����վ��Ŀ¼�������֤��</td>
          </tr>
          <tr>
            <td >&nbsp;</td>
          </tr>
          <tr>
            <td ><table width="99%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="122" valign="top" class="reg_tit"><span class="required">*</span>������վ������ </td>
                  <td><span class="reg_tit">http://</span>
                    <input name="siteurl" type="text" id="siteurl" value="<?php echo $s['siteurl']?>"  class="sreg_input" style="width:200px"/> <br />
              <span class="gray">����д��վ��ҳ��ַ���ҵ�ַ���Ȳ�Ҫ����128���ַ�</span></td></tr>
                <tr>
                  <td valign="top" class="reg_tit">&nbsp;</td>
                  <td><div class="checksite" style="margin-bottom:10px">
                  <p>
                    <label for="st_1"  class="active cktab" id="for_1">
                    <input name="cktype" type="radio" id="st_1" value="f" checked="checked" />
                    ��֤��ʽһ���ļ���֤ </label>
                    <label for="st_2" class="cktab"  id="for_2">
                    <input type="radio" name="cktype" value="h" id="st_2"  />
                    ��֤��ʽ����HTML��ǩ </label>
                  </p>
                  <div class="text"> 
				  	<span id="text1">
				    1.  ������<a href="/index.php?action=checksite" id="down" >������֤�ļ�</a>����ȡ��֤�ļ�<br>
                    2. 20�����ڽ���֤�ļ�������������������(��www.yoursite.com)�ĸ�Ŀ¼��<br>
                    3. ����������֤����ť					</span>
					<span id="text2" style="display:none">
				    <textarea name="ck2val" id="ck2val" style="font-size:12px;height:60px;margin-top:10px;width:400px;"  ></textarea>
				    <br>
                     �����ϴ�����ӵ�����վ��ҳHTML�����<HEAD>��ǩ��</HEAD>��ǩ֮�䣬������������֤����ť��<br>
  					���ò�������20��������ɣ�					</span>
                    <div style="padding:10px">
                      <input type="button" id="doCheckSite" value="�����֤" />
                    </div>
                  </div>
                  <div id="ckinfo" style="color:#FF0000"></div>
                </div></td>
                </tr>
                <tr>
                  <td valign="top" class="reg_tit"><span class="required">*</span>��վ���ƣ� </td>
                  <td><input type="text" name="sitename" id="sitename" class="sreg_input"/></td>
                </tr>
                <tr>
                  <td valign="top" class="reg_tit"> �����ţ� </td>
                  <td><input type="text" name="beian" id="beian"  class="sreg_input"/></td>
                </tr>
                <tr>
                  <td valign="top" class="reg_tit">��վ������ </td>
                  <td><textarea id="siteinfo" name="siteinfo" cols="55" rows="6"/></textarea></td>
                </tr>
                <tr>
                  <td valign="top" class="reg_tit"><span class="required">*</span>��վ���</td>
                  <td><select name="sitetype" id="sitetype">
                    <option value="0">-ѡ����վ���-</option>
                    <?php foreach((array)$sitetype as $t) {?>
                    <option value="<?php echo $t['sid']?>" ><?php echo  $t['sitename']?></option>
                    <?php } ?>
                  </select></td>
                </tr>
                <tr>
                  <td valign="top" class="reg_tit">&nbsp;</td>
                  <td><input name="button" type="button" id="doWebsitePost" style=" margin: 10px auto 20px; padding: 0pt 6px; height: 26px; width: auto; " onclick="sitePost()" value=" ��һ�� "  disabled="disabled" /></td>
                </tr>
            </table></td>
          </tr>
      </table></td>
      <td width="200" valign="top"  style="border-left: 1px dashed #D7D7D7;"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:100px">
        <tr>
          <td align="center"><img src="/templates/<?php echo Z_TPL?>/images/user.jpg" align="absmiddle"  style="  padding-bottom:4px"/></td>
        </tr>
        <tr>
          <td height="30" align="center"> <font color="#FF0000" class="f14">���������˻�</font> </td>
        </tr>
        <tr>
          <td height="30" align="center" class="gray">�������ĵ��밴ť�����ٵ���</td>
        </tr>
        <tr>
          <td align="center" class="gray"><input name="button2" type="button" id="button" style=" margin: 10px auto 20px; padding: 0pt 6px; height: 26px; width: auto; " onclick="window.location.href='<?php echo url("?action=login")?>'" value=" ���ϵ��� "  /></td>
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
			$("#ckinfo").html("�޷����ɴ���,��Ч��url");
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
			$("#ckinfo").html("��ȡ��֤�ļ�ʧ��,��Ч��url");
			return false ;
		} 
		if (!isValidURL('http://'+siteurl)) {
			$("#ckinfo").html("��ȡ��֤�ļ�ʧ��,��Ч��url");
			return false ;
		}
		$("#ckinfo").html("");
		this.href +="&url="+siteurl;  
});
$("#doCheckSite").click(function(){
		siteurl = jsTrim($("#siteurl").val());
		cktype = get_radio_value($n("cktype"));
        if(isNULL(siteurl)){
			$("#ckinfo").html("��֤ʧ��,��Ч��url");
			return false ;
		} 
		if (!isValidURL('http://'+siteurl)) {
			$("#ckinfo").html("��֤ʧ��,��Ч��url");
			return false ;
		}
		$("#ckinfo").html("������֤...");
		$.post("/index.php?action=checksite", { actiontype:'ck',url: siteurl,cktype:cktype},
		function (data, textStatus){
			//alert(data);
			if(data=='ok'){
				$("#ckinfo").html("��֤���");
				$("#doWebsitePost").attr("disabled",false);  
			}
			else if(data=='re'){
				$("#ckinfo").html("�����ѱ�ע�ᣬ�벻Ҫ�ظ�");
			}
			else if(data=='nalexa'){
				$("#ckinfo").html("Alexa����̫���޷�ע�ᣬ���������Ҫ<?php echo $GLOBALS['C_ZYIIS']['alexa']?>����");
			}
			else {
				$("#ckinfo").html("��ȡ��֤ʧ�ܣ�����ȷ����ȷ���ú��ٴε���������֤����ť");
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
        	alert("��������վ���ƣ�");
			$i('sitename').focus();
			return false;
    }
	if(!isValidReg(sitename)){
        	alert("��վ�����ﺬ�зǷ��ַ������������룡");
			$i('sitename').focus();
			return false;
    }
	
	/*if(isNULL(beian)){
        	alert("��������վ�����ţ�");
			$i('beian').focus();
	}*/
	
	if(sitetype<1){
        	alert("��ѡ����վ���");;
			return false;
    }
	
	document.forms["regform"].submit();
}
</script>
 