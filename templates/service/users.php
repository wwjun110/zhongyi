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
  <h2>��Ա����  <a href="?action=users">���л�Ա</a> <a href="?action=users&status=2">��ͨ����Ա</a> <a href="?action=users&status=0">�����Ա</a> <a href="?action=users&status=4">������Ա</a>
   
  </h2>
  <form action="?action=users&actiontype=search" method="post">
    <table width="98%" border="0" cellpadding="0" cellspacing="0" class="f_12px" >
      <tr>
        <td><input name="searchval" type="text" class="reg" id="searchval" value="<?php  echo $searchval?>" size="20" />
          <select name="searchtype">
            <option value="1" <?php if ($searchtype == '1') echo "selected";?>>��Ա����</option>
            <option value="2" <?php if ($searchtype == '2') echo "selected";?>>��ԱID</option>
          </select>
          <select name="sortingm" class="select" id="sortingm">
            <option value="DESC" <?php if($sortingm=='DESC')echo "selected"?> >����</option>
            <option value="ASC" <?php if($sortingm=='ASC')echo "selected"?> >����</option>
          </select>
          <select name="sortingtype" class="select" id="sortingtype">
            <option value="money" <?php if($sortingtype=='money')echo "selected"?>>�����</option>
            <option value="daymoney" <?php if($sortingtype=='daymoney')echo "selected"?>>�����</option>
            <option value="weekmoney" <?php if($sortingtype=='weekmoney')echo "selected"?>>�����</option>
            <option value="monthmoney" <?php if($sortingtype=='monthmoney')echo "selected"?>>�����</option>
          </select>
          <input name="submit" type="submit"   value="�� ѯ" /></td>
      </tr>
    </table>
  </form>
  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td height="40">����Ա<strong><?php echo $page->sqlCount?></strong>��</td>
    </tr>
  </table>
  <table width="100%" align="center" class="wrap tb0" >
    <tr>
      <th width="60">��ԱID</th>
      <th width="70">��Ա����</th>
      <th width="70">�����</th>
      <th width="60">�����</th>
      <th width="60">�����</th>
      <th width="60">�����</th>
      <th width="60">�������</th>
      <th width="60">��������</th>
      <th width="70">��ϵ��</th>
      <th width="80">QQ</th>
      <th>����</th>
      <th width="60">״̬</th>
    </tr>
    <?php foreach((array)$users as $u){
			$sumrecommend =  $usermodel->getSumRecommend($u['uid']);
	?>
    <tr >
      <td align="center"><?php echo $u['uid']?></td>
      <td width="70" align="center"><a href="?action=userlogin&uid=<?php echo $u['uid']?>" title="���뵽��Ա��̨" target="_blank"><?php echo $u['username']?></a></td>
      <td align="center"><?php echo round($u["money"],2);?></td>
      <td align="center"><?php echo round($u["daymoney"],2)?></td>
      <td align="center"><?php echo round($u["weekmoney"],2)?></td>
      <td align="center"><?php echo round($u["monthmoney"],2)?></td>
      <td  align="center"><?php echo round($u["xmoney"],2)?></td>
      <td  align="center"><?php echo $sumrecommend ?></td>
      <td  align="center"><?php echo $u["contact"]?></td>
      <td  align="center"><a href="http://wpa.qq.com/msgrd?V=1&uin=<?php echo $u["qq"]?>" title="Q��" target="_blank"><?php echo $u["qq"]?></a></td>
      <td  align="center" nowrap="nowrap"><a href="?action=users&actiontype=postchoose&choosetype=unlock&uid[]=<?php echo $u['uid']?>" title="��������Ա"  onclick="return activate()">ͨ��</a> | <a href="#TB_inline?&height=200&width=430&inlineId=DenyUser"  title="������<?php echo  $u['username'] ?>��"   class="thickbox" onclick="$i('uid[]').value=<?php echo $u['uid']?>;$i('userinfo').value='<?php echo $u['userinfo']?>'">����</a> | <a href="?action=users&actiontype=edit&uid=<?php echo $u['uid']?>&TB_iframe=true&height=520&width=600"  title="�޸� ��<?php echo  $u['username'] ?>��"   class="thickbox" >�޸�</a> </td>
      <td  align="center"><?php  
						  if ($u['status'] == 0){ echo '<font color="ff0000">����</font>';} 
						  if ($u['status'] == 1){ echo '<font color="ff0000">�ʼ�����</font>';} 
						  if ($u['status'] == 2){ echo '<font color="">�</font>';} 
						  if ($u['status'] == 3){ echo '<font color="ff0000">�ܾ�</font>';} 
						  if ($u['status'] == 4){ echo '<font color="ff0000">����</font>';} 
					?></td>
    </tr>
    <?php } //end foreach?>
  </table>
  <?php echo $viewpage;?> </div>
<div id="DenyUser" style="display:none">
  <form action="?action=users&actiontype=postchoose&choosetype=lock" method="post">
    <input name="uid[]" id="uid[]" type="hidden" value="" />
    <table border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td width="90">����ԭ��</td>
        <td><textarea name="userinfo" id="userinfo" style="width:320px;height:90px"></textarea></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td height="50"><input type="submit" name="Submit2" value=" �ύ "  /></td>
      </tr>
    </table>
  </form>
</div>
<script language="JavaScript" type="text/javascript">
function doRemoveWin(){
	tb_remove();
	document.location.reload();
}
function activate(){
	var psub=confirm("ȷ��ͨ����");
	if(psub){
		<?php if (in_array ('useractivate', explode(',',$GLOBALS['C_ZYIIS']['tomail']))) {?>
			addLoading('���ڷ����ʼ�...');
		<?php }?>
	}else{
		return false;
	}
}
</script>
<?php include TPL_DIR . "/footer.php";?>
