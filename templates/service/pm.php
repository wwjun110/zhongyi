<?php if(!defined('IN_ZYADS')) exit(); 
include TPL_DIR . "/header.php";?>

<div class="lists">
  <?php if($statetype== 'success') {?>
  <div class="tipinfo" id="success">
    <div class="r1"></div>
    <div class="r2"></div>
    <div class="text">�����ɹ���</div>
    <div class="l1"></div>
    <div class="l2"></div>
  </div>
  <?php }  ?>
  <h2><?php 
if($actiontype == 'inbox' || $actiontype == '') echo "�յ���Ϣ";
if($actiontype == 'outbox') echo "������Ϣ";
if($actiontype == 'view') echo "�鿴����";
if($actiontype == 'new') echo "�ύ�µ�����";
?>  <a href="?action=pm&actiontype=inbox">�յ�����Ϣ</a>  <a href="?action=pm&actiontype=outbox">���͵���Ϣ</a><a href="?action=pm&actiontype=new">�ύ�µ���Ϣ</a> 
  </h2>
  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td height="20">&nbsp;</td>
    </tr>
  </table>
 
 <?php if($actiontype == '' || $actiontype == 'outbox' ||  $actiontype == 'inbox') {?> 
  <table width="100%" align="center" class="wrap tb0">
    <tr>
      <th width="90" align="center"><?php if($actiontype == 'outbox') echo "���Ż�Ա";else echo "��Ա����"?></th>
      <th align="left">&nbsp;����</th>
      <th width="200">����ʱ��</th>
    </tr>
    <?php foreach((array)$m as $m){ 
	 		 $isv = $pmmodel-> doisviews($m['msgid']);
	  ?>
    <tr>
      <td align="center"  ><?php echo $m['senduser']?></td>
      <td style="text-align:left">&nbsp;<a href="?action=pm&amp;actiontype=view&amp;type=<?php echo $_GET['actiontype']?>&amp;msgid=<?php echo $m['msgid']?>"><?php echo str($m['subject'],60)?></a>
          <?php 
		if ($isv) {
			echo "<font color='#ff0000'>(δ��...)</font>";
		}
		?>      </td>
      <td><?php echo $m['addtime']?></td>
    </tr>
    <?php } //end foreach
if(!$m) { ?>
    <tr class="tbListNull">
      <td colspan="3"><a href="#">û����Ϣ</a></td>
    </tr>
    <?php } //ednt if?>
  </table>
  <?php echo $viewpage;?> </div>
  <?php } //ednt if?>
  
   <?php if( $actiontype == 'view') {?>
    <table width="100%" align="center" class="wrap tb0">
      <tr>
        <th align="left">&nbsp;����</th>
      </tr>
      <tr>
        <td style="text-align:left"><?php echo $m['subject']?></td>
      </tr>
      <tr bgcolor="#f2f2ef">
        <td  style="text-align:left"><?php echo t($m['msgtext'])?></td>
      </tr>
    </table>
    <br />
	<?php  if($m["alone"] == 0){?>
    <h3>�ظ�����</h3>
    <table width="100%" align="center" >
      <?php foreach((array)$re as $r){ ?>
      <tr>
        <td style="padding-top:10px;"><?php echo $r['senduser']?>&nbsp;&nbsp;&nbsp;<?php echo $m['addtime']?> </td>
      </tr>
      <tr>
        <td style="padding:10px;border-bottom:#ccc 1px dotted;"><?php echo t($r['msgtext'])?></td>
      </tr>
      <?php } ?>
      <form id="repm" name="repm" method="post" action="?action=pm&actiontype=postrepm">
        <input name="msgid" type="hidden" value="<?php echo $msgid?>" />
        <input name="type" type="hidden" value="<?php echo $type?>" />
        <tr>
          <td style="padding-top:20px;"><strong>ֱ�ӻظ�</strong><br>
            <br>
            <textarea name="retext" id="retext" cols="22" rows="8" style="border:1px solid #A7A6AA;height:60px;padding:2px 8px 0pt 3px;width:360px;"/></textarea>
            <br>
            <br>
            <input type="button" name="Submit22" value="����" onclick="PostRePm()" /></td>
        </tr>
      </form>
      
    </table>
   <?php } 
	 } ?>
	
	
	<?php if( $actiontype == 'new') {?>
<form id="addpm" name="addpm" method="post"  action="?action=pm&actiontype=postcreatepm">
      <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
 
        <tr >
          <td height="40">��������<span class="tdtit">��</span></td>
          <td><select name="msgtype" id="msgtype">
            <option value="">��ѡ��...</option>
            <?php foreach((array)$GLOBALS['C_MsgType'] as $key=>$val) {?>
            <option value="<?php echo $key?>" ><?php echo $val?></option>
            <?php } ?>
 
          </select></td>
        </tr>
        <tr >
          <td height="40">��Ա���ƣ�</td>
          <td><input name="touser" type="text"   id="touser" size="20" /></td>
        </tr>
        <tr >
          <td height="40"><span class="tdtit">��ѯ���⣺</span></td>
          <td><input name="subject" type="text"  class="reg" id="subject" maxlength="64"/>
            <span class="gray">���32���ַ�</span></td>
        </tr>
        <tr>
          <td width="74" valign="bottom"><span class="tdtit">��ѯ���ݣ�</span></textarea></td>
          <td width="641"><textarea name="msgtext" id="msgtext" cols="22" rows="8" style="border:1px solid #A7A6AA;height:150px;padding:2px 8px 0pt 3px;width:360px;"/></textarea></td>
        </tr>
        <tr>
          <td height="30">&nbsp;</td>
          <td colspan="2"><input type="button" name="Submit2" value="����" onclick="PostPm()" /></td>
        </tr>
      </table>
</form>
    <?php } ?>
	  
</div>
<script language="JavaScript" type="text/javascript">
function PostRePm(){
	var retext = $i('retext').value;
	if(isNULL(retext)){
		alert("������ظ����ݣ�");		
		$i('retext').focus();
		return false;
     }
	 if(!isValidReg(retext)){
        	//alert("�ظ������ﺬ�зǷ��ַ������������룡");
			//$i('retext').focus();
			//return false;
     }
	 document.forms["repm"].submit(); 
}
function PostPm(){
	var msgtype = $i('msgtype').value;
	var subject = $i('subject').value;
	var msgtext = $i('msgtext').value;
	var touser  = $i('touser').value;
	if(isNULL(msgtype)){
		alert("��ѡ���������ͣ�");		
		$i('subject').focus();
		return false;
     }
	if(isNULL(subject)){
		alert("��������ѯ���⣡");		
		$i('subject').focus();
		return false;
     }
	 if(!isValidReg(subject)){
        	alert("��ѯ�����ﺬ�зǷ��ַ������������룡");
			$i('subject').focus();
			return false;
     }
	 if(isNULL(msgtext)){
        alert("��������ѯ���ݣ�");		
		$i('subject').focus();	
		return false;
     }
	 if(!isValidReg(msgtext)){
        	alert("��ѯ�����ﺬ�зǷ��ַ������������룡");
			$i('msgtext').focus();
			return false;
     }
	 $.get("?action=userinfo&username="+touser, function(data){	 
			if( data == 0 )
			{
			   document.forms["addpm"].submit();
			}
			else
			{
				alert('û�������Ա');
			}
		});
 
}
</script>
<?php include TPL_DIR . "/footer.php";?>
