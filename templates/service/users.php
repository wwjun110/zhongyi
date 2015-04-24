<?php if(!defined('IN_ZYADS')) exit(); 
include TPL_DIR . "/header.php";?>

<div class="lists">
  <?php if($statetype== 'success') {?>
  <div class="tipinfo" id="success">
    <div class="r1"></div>
    <div class="r2"></div>
    <div class="text">操作成功。</div>
    <div class="l1"></div>
    <div class="l2"></div>
  </div>
  <?php }  ?>
  <h2>会员管理  <a href="?action=users">所有会员</a> <a href="?action=users&status=2">已通过会员</a> <a href="?action=users&status=0">待审会员</a> <a href="?action=users&status=4">已锁会员</a>
   
  </h2>
  <form action="?action=users&actiontype=search" method="post">
    <table width="98%" border="0" cellpadding="0" cellspacing="0" class="f_12px" >
      <tr>
        <td><input name="searchval" type="text" class="reg" id="searchval" value="<?php  echo $searchval?>" size="20" />
          <select name="searchtype">
            <option value="1" <?php if ($searchtype == '1') echo "selected";?>>会员名称</option>
            <option value="2" <?php if ($searchtype == '2') echo "selected";?>>会员ID</option>
          </select>
          <select name="sortingm" class="select" id="sortingm">
            <option value="DESC" <?php if($sortingm=='DESC')echo "selected"?> >降序</option>
            <option value="ASC" <?php if($sortingm=='ASC')echo "selected"?> >升序</option>
          </select>
          <select name="sortingtype" class="select" id="sortingtype">
            <option value="money" <?php if($sortingtype=='money')echo "selected"?>>总余额</option>
            <option value="daymoney" <?php if($sortingtype=='daymoney')echo "selected"?>>日余额</option>
            <option value="weekmoney" <?php if($sortingtype=='weekmoney')echo "selected"?>>周余额</option>
            <option value="monthmoney" <?php if($sortingtype=='monthmoney')echo "selected"?>>月余额</option>
          </select>
          <input name="submit" type="submit"   value="查 询" /></td>
      </tr>
    </table>
  </form>
  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td height="40">共会员<strong><?php echo $page->sqlCount?></strong>个</td>
    </tr>
  </table>
  <table width="100%" align="center" class="wrap tb0" >
    <tr>
      <th width="60">会员ID</th>
      <th width="70">会员名称</th>
      <th width="70">总余额</th>
      <th width="60">日余额</th>
      <th width="60">周余额</th>
      <th width="60">月余额</th>
      <th width="60">下线余额</th>
      <th width="60">下线人数</th>
      <th width="70">联系人</th>
      <th width="80">QQ</th>
      <th>操作</th>
      <th width="60">状态</th>
    </tr>
    <?php foreach((array)$users as $u){
			$sumrecommend =  $usermodel->getSumRecommend($u['uid']);
	?>
    <tr >
      <td align="center"><?php echo $u['uid']?></td>
      <td width="70" align="center"><a href="?action=userlogin&uid=<?php echo $u['uid']?>" title="登入到会员后台" target="_blank"><?php echo $u['username']?></a></td>
      <td align="center"><?php echo round($u["money"],2);?></td>
      <td align="center"><?php echo round($u["daymoney"],2)?></td>
      <td align="center"><?php echo round($u["weekmoney"],2)?></td>
      <td align="center"><?php echo round($u["monthmoney"],2)?></td>
      <td  align="center"><?php echo round($u["xmoney"],2)?></td>
      <td  align="center"><?php echo $sumrecommend ?></td>
      <td  align="center"><?php echo $u["contact"]?></td>
      <td  align="center"><a href="http://wpa.qq.com/msgrd?V=1&uin=<?php echo $u["qq"]?>" title="Q他" target="_blank"><?php echo $u["qq"]?></a></td>
      <td  align="center" nowrap="nowrap"><a href="?action=users&actiontype=postchoose&choosetype=unlock&uid[]=<?php echo $u['uid']?>" title="审核这个会员"  onclick="return activate()">通过</a> | <a href="#TB_inline?&height=200&width=430&inlineId=DenyUser"  title="锁定“<?php echo  $u['username'] ?>”"   class="thickbox" onclick="$i('uid[]').value=<?php echo $u['uid']?>;$i('userinfo').value='<?php echo $u['userinfo']?>'">锁定</a> | <a href="?action=users&actiontype=edit&uid=<?php echo $u['uid']?>&TB_iframe=true&height=520&width=600"  title="修改 “<?php echo  $u['username'] ?>”"   class="thickbox" >修改</a> </td>
      <td  align="center"><?php  
						  if ($u['status'] == 0){ echo '<font color="ff0000">待审</font>';} 
						  if ($u['status'] == 1){ echo '<font color="ff0000">邮件激活</font>';} 
						  if ($u['status'] == 2){ echo '<font color="">活动</font>';} 
						  if ($u['status'] == 3){ echo '<font color="ff0000">拒绝</font>';} 
						  if ($u['status'] == 4){ echo '<font color="ff0000">锁定</font>';} 
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
        <td width="90">锁定原因</td>
        <td><textarea name="userinfo" id="userinfo" style="width:320px;height:90px"></textarea></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td height="50"><input type="submit" name="Submit2" value=" 提交 "  /></td>
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
	var psub=confirm("确认通过吗？");
	if(psub){
		<?php if (in_array ('useractivate', explode(',',$GLOBALS['C_ZYIIS']['tomail']))) {?>
			addLoading('正在发送邮件...');
		<?php }?>
	}else{
		return false;
	}
}
</script>
<?php include TPL_DIR . "/footer.php";?>
