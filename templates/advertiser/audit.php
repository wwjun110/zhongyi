<?php if(!defined('IN_ZYADS')) exit(); 
include_once TPL_DIR . "/header.php";
?>
<script LANGUAGE="JavaScript" src="/javascript/jiandate.js"></script>
<script language="JavaScript" type="text/javascript" src="/javascript/jquery/jquery.js"></script>

<div id="pro_menu" class="pro_menu" style="display: block;">
  <div class="shell">
    <ul class="pro">
      <li  class=" <?php if($status=='') echo 'default'?>"><a href="?action=audit">��˹���</a></li>
      <li class=" <?php if($status=='0') echo 'default'?>"><a href="?action=audit&status=0">�ȴ����</a></li>
      <li class=" <?php if($status=='2') echo 'default'?>"><a href="?action=audit&status=2">���ͨ��</a></li>
      <li class=" <?php if($status=='1') echo 'default'?>"><a href="?action=audit&status=1">��˾ܾ�</a></li>
    </ul>
  </div>
</div>
<div class="pages">
  <h2>��˹��� </h2>
  <form id="form1" name="form1" method="post" action="">
    <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0" class="f_12px">
      <tr>
        <td width="120">�������Ŀɸѡ��</td>
        <td colspan="4"><select name="planid" id="planid" >
            <option value="">���й����Ŀ</option>
            <?php foreach((array)$allplanname as $p) { ?>
            <option value="<?php echo $p['planid'].'_'.$p['plantype']?>" <?php if((int)$_REQUEST['planid']==$p['planid'])echo " selected"?> ><?php echo $p['planname']?> </option>
            <?php } ?>
          </select></td>
      </tr>
      <tr>
        <td align="center">������</td>
        <td width="120"><input name="searchval" type="text"  id="userval" value="<?php echo $searchval?>" size="20"  style="width:100px" class="reg"/></td>
        <td width="60">���ͣ�</td>
        <td width="100"><select name="searchtype">
            <option value="3" selected="selected" <?php if ($searchtype == '3') echo "selected";?>>��Ա����</option>
            <option value="1" <?php if ($searchtype == '1') echo "selected";?>>��վ����</option>
            <option value="2" <?php if ($searchtype == '2') echo "selected";?>>��վURL</option>
          </select></td>
        <td><input   value="�� ѯ" type=submit name=submit /></td>
      </tr>
    </table>
  </form>
  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td height="30"  style="text-align:left; font-size:14px; font-weight:bold"><select name="select" class="select" onchange="$i('choosetype').value=this.value">
          <option>��������</option>
          <option value="unlock">ͨ��</option>
          <option value="deny">�ܾ�</option>
        </select>
        <input   value="�ύ" type="button" name="submit2" onclick="choose();"/>
        &nbsp;</td>
    </tr>
  </table>
  <form id="postaudit" name="postaudit" method="post" action="?action=audit&actiontype=postauditchoose">
    <input name="choosetype"  id="choosetype"  type="hidden" value="" />
    <table width="100%" align="center" class="wrap tb0">
      <tr>
        <th width="15"><input type="checkbox" name="chkall" onclick="checkall(this.form, 'id')" /></th>
        <th width="75">��Ա</th>
        <th width="100">����</th>
        <th width="120">�����Ŀ</th>
        <th width="80">��վ����</th>
        <th width="120">��վ��ַ</th>
        <th width="100">Alexa/PR</th>
        <th width="80">�����</th>
        <th>����</th>
        <th>״̬</th>
      </tr>
      <?php foreach((array)$audit as $s){?>
      <tr >
        <td align="center"><input type="checkbox" name="auditid[]" value="<?php echo $s["auditid"]?>" /></td>
        <td align="center"><?php echo $s['username']?></td>
        <td align="center"><?php echo $s['addtime']?></td>
        <td align="center"><?php echo $s['planname']?></td>
        <td align="center"><?php echo str($s['sitename'],10)?></td>
        <td align="center"><a href="http://<?php echo $s['siteurl']?>" target="_blank"><?php echo $s['siteurl']?></a></td>
        <td align="center"><span id="s_<?php echo $s['auditid']?>"><?php echo $s['alexapr']?></span><img src="/templates/<?php echo Z_TPL?>/images/alexa.jpg" alt="�������" align="absmiddle" style="	cursor:pointer" onclick="doAlexaPr('<?php echo trim($s['siteurl'])?>',<?php echo $s['auditid']?>)" /></td>
        <td  align="center"><?php echo $s['audituser']?></td>
        <td  align="center"><a href="?action=audit&actiontype=postauditchoose&choosetype=unlock&auditid[]=<?php echo $s["auditid"]?>">ͨ��</a> | <a href="?action=audit&actiontype=postauditchoose&choosetype=deny&auditid[]=<?php echo $s["auditid"]?>">�ܾ�</a></td>
        <td  align="center"><?php
		  if($s['status'] == '2') {
          	echo '<font color="green">ͨ��</font>';
		  }
          if($s['status'] == '0') {
          	echo '<font color="red">����</font>';
          }
		  if($s['status'] == '1') {
          	echo '<font color="red">�ܾ�</font>';
         }
		 ?></td>
      </tr>
      <?php 
	} //end foreach?>
    </table>
  </form>
  <?php echo $viewpage;?>
  <?php if(!$audit) { ?>
  <table width="100%" align="center" class="wrap tb0">
    <tr class="tbListNull">
      <td ><a href="#">û������</a></td>
    </tr>
  </table>
  <?php }?>
</div>
<?php include TPL_DIR . "/footer.php"?>
<script language="JavaScript" type="text/javascript">
function doAlexaPr(url,siteid){
		sid = 's_'+siteid;
		$('#'+sid).html('<img src="/templates/<?php echo Z_TPL?>/images/loading.gif"> '); 
		
		$.ajax({
           url: "?action=audit&actiontype=alexapr&url="+url,
		   type: 'GET',
		   dataType: 'html',
           timeout: 5000,
           error: function () {
                  $('#'+sid).html('<font color=red>��ʱ</font>');
           },
		   success: function(data){
        		$('#'+sid).html(data);
			}
        });

}
function choose(){
	var v = $i("choosetype").value;	
	var t='';
    if(v == 'deny') t = '�ܾ�';	
	if(v == 'unlock') t = '����';		
	var numchecked = getNumChecked('postaudit');
	if(numchecked < 1) { alert('��ѡ����Ҫ��������վ'); return false }	
	if(confirm('��ȷ��Ҫ�ύ��' + numchecked + '����\n�㡰ȷ�ϡ�'+t+'���㡰ȡ����ȡ��������')){
		this.document.postaudit.submit();
		return true;
	}
	return false;
}
</script>
