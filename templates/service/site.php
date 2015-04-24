<?php if(!defined('IN_ZYADS')) exit(); 
include_once TPL_DIR . "/header.php";
?>

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
  <h2>网站列表 <a href="?action=site">所有网站</a> <a href="?action=site&status=3">已通过网站</a> <a href="?action=site&status=0">待审网站</a> <a href="?action=site&status=2">已锁网站</a> <a href="?action=site&status=1">已拒绝网站</a></h2>
  <?php if($actiontype == ''  || $actiontype == 'search'  ){?>
  <form action="?action=site&actiontype=search" method="post">
    <table width="98%" border="0" cellpadding="0" cellspacing="0" class="f_12px" >
      <tr>
        <td><input name="searchval" type="text" class="reg" id="searchval" value="<?php  echo $searchval?>" size="20" />
          <select name="searchtype">
            <option value="1" <?php if ($searchtype == '1') echo "selected";?>>会员名称</option>
            <option value="2" <?php if ($searchtype == '2') echo "selected";?>>网站地址</option>
            <option value="3" <?php if ($searchtype == '3') echo "selected";?>>网站名称</option>
          </select>
          <input name="submit" type="submit"   value="查 询" /></td>
      </tr>
    </table>
  </form>
  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td height="40">共网站<strong><?php echo $page->sqlCount?></strong>个</td>
    </tr>
  </table>
  <table width="100%" align="center" class="wrap tb0">
    <tr>
      <th width="60">属于会员</th>
      <th>网站域名</th>
      <th>网站名称</th>
      <th width="120">备案号</th>
      <th width="80">网站类别</th>
      <th width="100">Alexa/Pr</th>
      <th width="60">状态</th>
      <th>操作</th>
    </tr>
    <?php 	foreach((array)$site as $s){
				$sid = $sitetypemodel->adminGetSiteTypeSid($s['sitetype']);
   ?>
    <tr id="tbList">
      <td align="center"><?php echo  $s['username'] ?></td>
      <td align="center"><a href="javascript:tourl('http://<?php echo  $s['siteurl'] ?>')"><?php echo  $s['siteurl'] ?></a></td>
      <td align="center"><?php echo $s['sitename']?></td>
      <td align="center"><?php echo $s['beian']?></td>
      <td align="center"><?php echo $sid['sitename']?></td>
      <td align="center"><span id="s_<?php echo $s['siteid']?>"><?php echo $s['alexa'].'/'.$s['pr']?></span><img src="/templates/<?php echo Z_TPL?>/images/alexa.jpg" alt="点击更新" align="absmiddle" style="	cursor:pointer" onclick="doAlexaPr('<?php echo trim($s['siteurl'])?>',<?php echo $s['siteid']?>)" /></td>
      <td align="center"><?php
          if($s['status'] == '0') {
          	echo '<font color="red">待审</font>';
          }
		  if($s['status'] == '1') {
          	echo '<font color="red">拒绝</font> <a href="#TB_inline?&height=200&width=430&inlineId=DenySite"  title="拒绝 “'.$s['siteurl'].'”"  class="thickbox" onclick="$i(\'siteid\').value='.$s['siteid'].';$i(\'denyinfo\').value=\''.$s['denyinfo'].'\'">信息</a>';
         }
		  if($s['status'] == '2') {
          	echo '<font color="red">锁定</font>';
          }
		  if($s['status'] == '3') {
          	echo '正常';
          }
		  if($s['status'] == '4') {
          	echo '<font color="red">修改待审</font>';
          }
		  ?></td>
      <td><a href="?action=site&actiontype=postchoose&choosetype=unlock&siteid[]=<?php echo $s['siteid']?>"  onclick="return activate()">通过</a> | <a href="?action=site&actiontype=edit&siteid=<?php echo $s['siteid']?>">修改</a> | <a href="#TB_inline?&height=200&width=430&inlineId=DenySite"  title="拒绝 “<?php echo $s['siteurl']?>”"   class="thickbox" onclick="$i('siteid').value=<?php echo $s['siteid']?>;$i('denyinfo').value='<?php echo $s['denyinfo']?>'">拒绝</a></td>
    </tr>
    <?php } //end foreach?>
  </table>
  <?php echo $viewpage;?>
  <?php } //end if
   if($actiontype == 'edit') {
  ?>
  <table width="100%"  border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td ><form id="postsite" name="postsite" method="post" action="?action=site&actiontype=postupdatesite">
          <input type="hidden" name="siteid" value=<?php echo $s['siteid']?>>
          <table width="600" border="0" cellpadding="0" cellspacing="3" style="font-size:12px;line-height:20px;">
            <tr>
              <td><strong>网站主域名</strong></td>
            </tr>
            <tr>
              <td><span class="gray">http://</span>
                <input name="siteurl" type="text" id="siteurl" value="<?php echo $s['siteurl']?>" <?php if($action=='editsite') echo "disabled"?>/></td>
            </tr>
           
            <tr>
              <td><span class="websitebos-form-section"><strong>附属域名</strong></span></td>
            </tr>
            <tr>
              <td><textarea name="pertainurl" cols="50" id="pertainurl" <?php if($action=='editsite') echo "disabled"?>="<?php if($action=='editsite') echo "disabled"?>"><?php echo $s['pertainurl']?></textarea>
                <br />
                <span class="gray">多个采用“,”分割 如 b.com,www.a.com 无需”http://“,“*”通配所有二级域名 *.a.com</span></td>
            </tr>
            <tr>
              <td><strong>网站名称<font color="#FF0000">*</font></strong></td>
            </tr>
            <tr>
              <td><input type="text" name="sitename" id="sitename" value="<?php echo $s['sitename']?>"/></td>
            </tr>
            <tr>
              <td><strong>备案号</strong></td>
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
                  <?php foreach((array)$sitetype as $t) {?>
                  <option value="<?php echo $t['sid']?>" <?php if($t['sid']==$s['sitetype']) echo "selected"?>><?php echo  $t['sitename']?></option>
                  <?php } ?>
                </select></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td><input name="button" type="button" id="doWebsitePost" style="" onclick="sitePost()" value=" 提交 " <?php if($action=='createsite') echo "disabled"?>/></td>
            </tr>
          </table>
        </form></td>
    </tr>
  </table>
  <?php  }?>
</div>
<div id="DenySite" style="display:none">
  <form action="?action=site&actiontype=updenyinfo" method="post">
    <input name="siteid" id="siteid" type="hidden" value="" />
    <table border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td width="90">拒绝原因</td>
        <td><textarea name="denyinfo" id="denyinfo" style="width:320px;height:90px"></textarea></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td height="60"><input type="submit" name="Submit2" value=" 提交 "  /></td>
      </tr>
    </table>
  </form>
</div>
<script language="JavaScript" type="text/javascript">
function doAlexaPr(url,siteid){
		sid = 's_'+siteid;
		$('#'+sid).html('<img src="/templates/<?php echo Z_TPL?>/images/loading.gif"> '); 
		
		$.ajax({
           url: "?action=site&actiontype=alexapr&url="+url,
		   type: 'GET',
		   dataType: 'html',
           timeout: 5000,
           error: function () {
                  $('#'+sid).html('<font color=red>超时</font>');
           },
		   success: function(data){
        		$('#'+sid).html(data);
			}
        });

}
function sitePost(){
	var sitename = $i('sitename').value;
	var siteinfo = jsTrim($i('siteinfo').value);
	var siteurl = $i('siteurl').value;
	var beian = $i('beian').value;
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
	document.forms["postsite"].submit();
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
<?php include TPL_DIR . "/footer.php"?>
