<?php if(!defined('IN_ZYADS')) exit(); 
include_once TPL_DIR . "/header.php";
?>
<script src="/javascript/jquery/jquery.js" language='JavaScript'></script>

<div id="pro_menu" class="pro_menu" style="display: block;">
  <div class="shell">
    <ul class="pro">
      <li><a href="?action=zonelist">���λ�б�</a></li>
      <li class="<?php  if($action == 'createsite') echo "default"?>"><a href="?action=createsite">������վ</a></li>
      <?php  if($action == 'editsite'){?>
      <li class="default"><a href="javascript:void(0)">�༭��վ</a></li>
      <?php }?>
      <li><a href="?action=sitelist">��վ�б�</a></li>
    </ul>
  </div>
</div>
<div class="zonelist">
  <h2>
    <?php  if($action == 'createsite') echo "����"; if($action == 'editsite') echo "�༭";?>
    ��վ <span class="tsp"  style="padding-left:20px;"><a href="?action=sitelist">�鿴��վ&raquo;</a></span></h2>
  <table width="100%"  border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td ><form id="postsite" name="postsite" method="post" action="?action=<?php  if($action == 'createsite') echo "postcreatesite"; if($action == 'editsite') echo "postupdatesite";?>">
          <input type="hidden" name="siteid" value=<?php echo $s['siteid']?>>
          <table width="600" border="0" cellpadding="0" cellspacing="3" style="font-size:12px;line-height:20px;">
            <tr>
              <td><strong>������վ������<font color="#FF0000">*</font></strong></td>
            </tr>
            <tr>
              <td><span class="gray">http://</span>
                <input name="siteurl" type="text" id="siteurl" value="<?php echo $s['siteurl']?>" <?php if($action=='editsite') echo "disabled"?>/>
                <br />
                <span class="gray">����д��վ��ҳ��ַ���ҵ�ַ���Ȳ�Ҫ����128���ַ�</span></td>
            </tr>
            <?php if($action == 'createsite' && $GLOBALS['C_ZYIIS']['reg_type']=='2'){?>
            <tr>
              <td><div class="checksite">
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
				    1.  ������<a href="?action=checksite" id="down" >������֤�ļ�</a>����ȡ��֤�ļ�<br>
                    2. 20�����ڽ���֤�ļ�������������������(��www.zyiis.com)�ĸ�Ŀ¼��<br>
                    3. ����������֤����ť
					</span>
					<span id="text2" style="display:none">
				    <textarea name="ck2val" id="ck2val" style="font-size:12px;height:60px;margin-top:10px;width:400px;"></textarea>
				    <br>
                     �����ϴ�����ӵ�����վ��ҳHTML�����<HEAD>��ǩ��</HEAD>��ǩ֮�䣬������������֤����ť��<br>
  					���ò�������20��������ɣ�
					</span>
                    <div style="padding:10px">
                      <input type="button" id="doCheckSite" value="�����֤" />
                    </div>
                  </div>
                  <div id="ckinfo" style="color:#FF0000"></div>
                </div></td>
            </tr>
            <?php }?>
      
             
            <tr>
              <td><strong>��վ����<font color="#FF0000">*</font></strong></td>
            </tr>
            <tr>
              <td><input type="text" name="sitename" id="sitename" value="<?php echo $s['sitename']?>"/></td>
            </tr>
            <tr>
              <td><strong>������
                <!--<font color="#FF0000">*</font>-->
                </strong></td>
            </tr>
            <tr>
              <td><input type="text" name="beian" id="beian" value="<?php echo $s['beian']?>"/>
                <br />
                <span class="gray">��<a href="http://www.miibeian.gov.cn" target="_blank">www.miibeian.gov.cn</a>�ı�����</span></td>
            </tr>
            <tr>
              <td><strong>��վ����</strong></td>
            </tr>
            <tr>
              <td><textarea id="siteinfo" name="siteinfo" cols="55" rows="6"/><?php echo $s['siteinfo']?></textarea></td>
            </tr>
            <tr>
              <td><strong>��վ���</strong></td>
            </tr>
            <tr>
              <td><select name="sitetype" id="sitetype">
			  	  <option value="0">-ѡ����վ���-</option>
                  <?php foreach((array)$sitetype as $t) {?>
                  <option value="<?php echo $t['sid']?>" <?php if($t['sid']==$s['sitetype']) echo "selected"?>><?php echo  $t['sitename']?></option>
                  <?php } ?>
                </select></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td><input name="button" type="button" id="doWebsitePost" style="" onclick="sitePost()" value=" �ύ " <?php if($action=='createsite' && $GLOBALS['C_ZYIIS']['reg_type']=='2') echo "disabled"?>/></td>
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
			$("#ckinfo").html("�޷����ɴ���,��Ч��url");
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
		$.post("?action=checksite", { actiontype:'ck',url: siteurl,cktype:cktype},
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
	if(isNULL(siteurl)){
        	alert("��������վ��ַ��");
			$i('siteurl').focus();
			return false;
    }
	if (!isValidURL('http://'+siteurl)) {
			alert("��Ч��Url��");
			return false ;
		}
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
	
	document.forms["postsite"].submit();
}
</script>
