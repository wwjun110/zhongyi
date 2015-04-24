<?php if(!defined('IN_ZYADS')) exit(); 
include TPL_DIR . "/header.php";  
if ($actiontype == 'create') {
	if ($a['adstypeid'] == 24) {
		$zonename = ucfirst($a['plantype']).','.$at['name'];
	}
	else if ($viewtype==0) {
		$zonename = '智能'.','.$at['name'].','.$a['width'].'*'.$a['height'];
	}
	else {
		$zonename = ucfirst($a['plantype']).','.$at['name'].','.$a['width'].'*'.$a['height'];
	}

}else {
	$zonename = $z['zonename'];
}
?>
<script src="/javascript/jquery/jquery.js" language='JavaScript'></script>
<script src="/javascript/jquery/jtip.js" language='JavaScript'></script>
<script src="/javascript/jquery/thickbox.js" language='JavaScript'></script>
<link href="/javascript/jquery/css/thickbox.css" rel="stylesheet" type="text/css" />
<link href="/javascript/jquery/css/question.css" rel="stylesheet" type="text/css" />
<div id="pro_menu" class="pro_menu" style="display: block;">
  <div class="shell">
    <ul class="pro">
      <li class="default"><a href="?action=sitelist">广告位管理</a></li>
      <li><a href="?action=zonelist">广告位列表</a></li>
      <li><a href="?action=createsite">新增网站</a></li>
      <li><a href="?action=sitelist">网站列表</a></li>
    </ul>
  </div>
</div>
<div class="zonelist">
<?php if($statetype== 'success') {?>
  <div class="tipinfo" id="success">
    <div class="r1"></div>
    <div class="r2"></div>
    <div class="text">广告位已更新。</div>
    <div class="l1"></div>
    <div class="l2"></div>
  </div>
  <?php }  ?>
  <h2>
    <?php  if($actiontype == 'create') echo "新增"; if($actiontype == 'edit') echo "编辑";?>广告位
    <?php if($actiontype == 'edit'){?>
    <span class="tsp"  style="padding-left:20px;"><a href="?action=getcode&zoneid=<?php echo $zoneid?>">获取代码&raquo;</a></span>
    <?php }?>
  </h2>
  <form action="?action=zone&actiontype=<?php  if($actiontype == 'create') echo "postcreate"; if($actiontype == 'edit') echo "posteditzone";?>" method="post" onsubmit="return post_submit()">
    <input name="width" type="hidden" value="<?php echo $a['width']?>" />
    <input name="height" type="hidden" value="<?php echo $a['height']?>" />
    <input name="plantype" type="hidden" value="<?php echo $a['plantype']?>" />
    <input name="adstypeid" type="hidden" value="<?php echo $a['adstypeid']?>" />
    <input name="siteid" type="hidden" value="<?php echo $siteid?>" />
	<input name="zoneid" type="hidden" value="<?php echo $zoneid?>" />
    <table width="600" border="0" cellpadding="0" cellspacing="3" style="font-size:12px;line-height:20px;">
      <tr>
        <td><strong>属于网站：</strong> <?php echo $s['sitename']?>&nbsp;&nbsp;&nbsp;<?php echo "<a href='javascript:void(0)' onclick='tourl(\"http://".$s['siteurl']."\")'>".$s['siteurl']."</a>";?></td>
      </tr>
      <tr>
        <td><strong>类型：</strong><?php echo $at['name'].'('.ucfirst($a['plantype']).')'?></td>
      </tr>
	  <?php if($a['plantype']=='cpm' &&  $at['adstypeid']!=24 ){?>
	   <tr>
        <td><strong>弹窗选项：</strong><input name="cpmtimetype" type="radio" id="radiobutton" onclick="$i('cpmtimeview').style.display = 'none'" value="0" <?php if($z['cpmtime']==0) echo ' checked'?>/>
              <label for="radiobutton"> 刷新弹出</label>
              <input type="radio" name="cpmtimetype" value="1" id="radio" onclick="$i('cpmtimeview').style.display = ''" <?php if($z['cpmtime']>0) echo ' checked'?>/>
              <label for="radio" >指定时间</label>
              <span id="cpmtimeview" <?php if($z['cpmtime']==0) echo 'style="display:none"'?>>
              <input name="cpmtime" type="text" class="reg" id="cpmtime" style="width:30px" value="<?php echo $z['cpmtime']>0 ?$z['cpmtime'] : 30?>" size="10" />
            分内
            <input type="radio" name="cpmtimenum" id="radio2" value="0" <?php if($z['cpmtimenum']==0) echo ' checked'?>/>
            弹多个
            <input type="radio" name="cpmtimenum" id="radio3" value="1" <?php if($z['cpmtimenum']>0) echo ' checked'?>/>
弹一个</span></td>
      </tr>
	  <?php }?>
	  
      <tr>
        <td><strong>尺寸：</strong><?php echo $a['adstypeid'] == 24 ? "全部" : $a['width'].'*'.$a['height'];?></td>
      </tr>
      <tr>
        <td><strong>广告位名称： </strong>
          <input name="zonename" id="zonename" type="text" size="30" value="<?php echo $zonename?>" />
        </td>
      </tr>
      <tr>
        <td><strong>广告位描述：</strong>
          <textarea name="zoneinfo" cols="50" rows="2" id="zoneinfo"><?php echo $z['zoneinfo']?></textarea>
        </td>
      </tr>
      <tr>
        <td><strong>选择广告：</strong>
		<?php if ($viewtype!='zn') {?>
          <input type="radio" name="viewtype" value="1"  <?php if($z['viewtype'] == '1' || !$z) echo " checked"?> onclick="$('#viewtypes').show()"/>
          手动选择
		<?php }?>
          <input type="radio" name="viewtype" value="0" <?php if($z['viewtype'] == '0') echo " checked"?>  onclick="$('#viewtypes').hide()"/>
          智能显示 <a href="?action=help&amp;width=275&amp;type=createzone&amp;typeval=viewtype0" class="jTip" id="viewtype0s"  name="智能显示"><img src="/javascript/jquery/images/question.gif" border="0" align="absmiddle" /></a></td>
      </tr>
    </table>
    <div id="viewtypes" style="display:<?php if($z['viewtype'] == '0') echo "none"?>">
    <h2><img src="/templates/<?php echo Z_TPL?>/images/bulb.gif" align="absmiddle" /> 我们为您匹配到以下相同类型的广告<span style="padding-left:20px; color:#369; font-size:12px"> 选择两个以上可以轮播哦</span></h2>
    <table width="98%" border="0" cellpadding="0" cellspacing="3" style="font-size:12px;line-height:20px;">
      <tr>
        <td width="80" valign="top"><input name="chkall" type="checkbox" value="" onclick="checkall(this.form, 'adsid')"  />
          <strong>全选</strong></td>
      </tr>
      <?php foreach((array)$adsall as $a) {?>
      <tr>
        <td   valign="top"><input type="checkbox" name="adsid[]" value="<?php echo $a['adsid']?>" <?php if(in_array($a['adsid'], explode(",",$z["viewadsid"])) || $a['adsid']==$adsid) echo ' checked' ?> class="cadsid">
          #<?php echo $a['adsid']?></td>
        <td><?php 
	if($at['adstypeid'] == 24){
		echo "<a href='?action=planads&planid=".$a['planid']."&siteid=".$siteid."' >".$a['planname']."</a>";
	}else{
		if($a['width']>800)  $a['width'] = 800;
		if($a['height']>500)  $a['height'] = 500;
		if($a['plantype']=='cpm'){
				echo "<a href='?action=planads&planid=".$a['planid']."&siteid=".$siteid."' >".$a['planname']."</a>";
		}
		else {
				$imgext =  substr($a['imageurl'],-3);
				if($imgext){
					$parse_url = parse_url($a['imageurl']);
					if (!$parse_url['scheme']) {
						$a['imageurl'] = $GLOBALS['C_ZYIIS']['imgurl'].$a['imageurl'];
					} 
				}
				if( $a['imageurl'] && substr($a['imageurl'],-3) != 'swf' ){
					echo "<img src=".$a['imageurl']." width=".$a['width']."  height=".$a['height']." border='0' >";
				}else if( $a['imageurl'] && substr($a['imageurl'],-3) == 'swf' ){
					echo "<embed src=".$a['imageurl']." quality='high' pluginspage='http://www.macromedia.com/go/getflashplayer' type='application/x-shockwave-flash' width=".$a['width']."  height=".$a['height']." wmode=transparent></embed>";
				}else echo "<iframe  width=".$a['width']." height=".$a['height']." frameborder=0 src='?action=showads&adsid=".$a['adsid']."' marginwidth='0' marginheight='0' vspace='0' hspace='0' allowtransparency='true' scrolling='no'></iframe>";
			}
		}
		?></td>
      </tr>
      <?php }?>
      <tr>
        <td width="60" valign="top"><input name="chkallde" type="checkbox" value="" onclick="checkall(this.form, 'adsid','chkallde')"  />
          <strong>全选</strong></td>
      </tr>
   
    </table>

</div>
<br/>
<input type="submit" name="Submit" value="<?php  if($actiontype == 'create') echo "下一步：生成代码"; if($actiontype == 'edit') echo "保存";?>" <?php  if(!$adsall && $actiontype == 'create') echo "disabled";?>   />
  </form>
</div>
 <div id="sContent" style="display:none;">
  <table width="620" border="0" align="center" cellpadding="0" cellspacing="3">
    <tr>
      <td height="80" align="center"><div class="info">没有合适的广告或是您选的广告已定向网站类型,无法与您的站区配</div></td>
    </tr>
	<tr>
      <td height="20" align="center"><div class="submit-x" style="float:none"><a href="javascript:ref()"><font color="#FFFFFF">返回</font></a></div></td>
    </tr>
  </table>
</div>
<script language="JavaScript" type="text/javascript">
function post_submit(){  
var zonename = $i('zonename').value;  
	if(isNULL(zonename)){
        alert("请输入广告位名称！");
		$i('zonename').focus();
		return false;
  	}
 
	if($('.cadsid[@checked]').val() === null && $('input[@name=viewtype][@checked]').val()>0){
		alert("最少需要选择一个广告！");
		return false;
	} 
 
}
function tb_remove_bak(){
	//location.href = "?action=planlist";
}
<?php if (!$adsall) {?>
setTimeout("tb_show('广告位','#TB_inline?height=140&width=650&inlineId=sContent')",500);
 <?php }?>
</script>
<?php include TPL_DIR . "/footer.php";?>
