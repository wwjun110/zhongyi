<?php if(!defined('IN_ZYADS')) exit(); 
include TPL_DIR . "/header.php";?>
 
<div class="main">
  <div class="left">
    <h2>我的信息</h2>
    <ul>
      <li><span>当天新增下属会员：</span><?php echo $dayaddnum?>个</li>
      <li><span>待审会员：</span><?php echo $userstatus0num?>个</li>
      <li><span>待审网站：</span><?php echo $sitestatus0num?>个 </li>
	  <li><span>我的注册链接：</span><a href="javascript:void(0);">http://<?php echo $GLOBALS['C_ZYIIS']['authorized_url']?>/v/?s=<?php echo $_SESSION['serviceid']?></a></li>
    </ul>
    <h2>当日新增待审会员<span><a href="#"></a></span></h2>
    <table width="650" class="wrap tb0">
      <tr>
        <th width="60">会员ID</th>
        <th width="80">会员名称</th>
        <th width="90">联系人</th>
        <th width="90">QQ</th>
        <th>Email</th>
        <th>操作</th>
      </tr>
		<?php foreach ((array)$dayuser AS $u){ echo $u['status'];
		if($u['status']==0){?>
	  <tr id="tbList">
		<td><?php echo $u["uid"]?></td>
		<td><?php echo $u["username"]?></td>
		<td><?php echo $u["contact"]?></td>
		<td><a href="http://wpa.qq.com/msgrd?V=1&uin=<?php echo $u["qq"]?>" title="Q他"  target="_blank"><?php echo $u["qq"]?></a></td>
		<td><?php echo $u["email"]?></td>
		<td><a href="?action=users&amp;actiontype=postchoose&amp;choosetype=unlock&amp;uid[]=<?php echo $u['uid']?>" title="审核这个会员"  onclick="return confirm('您确定审核通过?')">通过</a> | <a href="#TB_inline?&amp;height=200&amp;width=430&amp;inlineId=DenyUser"  title="锁定“<?php echo  $u['username'] ?>”"   class="thickbox" onclick="$i('uid[]').value=<?php echo $u['uid']?>;$i('userinfo').value='<?php echo $u['userinfo']?>'">锁定</a></td>
	  </tr>
      <?php 
		} //ednt if
		 } //end foreach
		if(!$u) { ?>
      <tr class="tbListNull">
        <td colSpan="6"><img src="/templates/<?php echo Z_TPL?>/images/tip.gif" /> 今天没有新增审核的会员了，加油哦</td>
      </tr>
      <?php } //ednt if?>
    </table>
    <h2>当日待审网站<span><a href="#"></a></span></h2>
    <table width="650" class="wrap tb0">
      <tr>
        <th width="60">属于会员</th>
        <th width="60">网站ID</th>
        <th width="80">网站名称</th>
        <th width="100">类型</th>
        <th width="90">Alexa/Pr</th>
        <th>网址</th>
        <th>操作</th>
      </tr>
      <?php foreach((array)$daysites as $s) { 
	  		$sid = $sitetypemodel->adminGetSiteTypeSid($s['sitetype']);
	  ?>
      <tr id="tbList">
        <td><?php echo $s["username"]?></td>
        <td><?php echo $s["siteid"]?></td>
        <td><?php echo $s["sitename"]?></td>
        <td><?php echo $sid['sitename']?></td>
        <td><span id="s_<?php echo $s['siteid']?>"><?php echo $s['alexa'].'/'.$s['pr']?></span><img src="/templates/<?php echo Z_TPL?>/images/alexa.jpg" alt="点击更新" align="absmiddle" style="	cursor:pointer" onclick="doAlexaPr('<?php echo trim($s['siteurl'])?>',<?php echo $s['siteid']?>)" /></td>
        <td><a href="javascript:tourl('http://<?php echo  $s['siteurl'] ?>')"><?php echo  $s['siteurl'] ?></a></td>
        <td><a href="?action=site&amp;actiontype=postchoose&amp;choosetype=unlock&amp;siteid[]=<?php echo $s['siteid']?>"  onclick="return confirm('您确定审核通过?')">通过</a> | <a href="#TB_inline?&amp;height=200&amp;width=430&amp;inlineId=DenySite"  title="锁定“<?php echo  $s['sitename'].'|'.$s['siteurl'] ?>”" class="thickbox" onclick="$i('siteid[]').value=<?php echo $s['siteid']?>;$i('denyinfo').value='<?php echo $s['denyinfo']?>'">锁定</a></td>
      </tr>
      <?php } //end foreach ?>
    </table>
  </div>
  <div class="right">
    <h2>联盟公告</h2>
    <ul>
      <?php 
$news = $newsmodel->getAllnews('6');
foreach((array)$news as $n){?>
      <li class="news"><a href='/index.php?action=shownews&amp;id=<?php echo $n['id'];?>' target='_blank' title="<?php echo $n['tit']?>"><?php echo str($n['tit'],18)?></a> <?php echo date("m-d",strtotime($n['time']));?></li>
      <?php  }  ?>
    </ul>
 
  </div>
</div>
<div id="DenySite" style="display:none">
  <form action="?action=site&actiontype=postchoose&choosetype=lock" method="post">
    <input name="siteid[]" id="siteid[]" type="hidden" value="" />
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

</script>

<?php include TPL_DIR . "/footer.php";?>
