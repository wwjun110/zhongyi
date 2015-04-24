<?php if(!defined('IN_ZYADS')) exit(); 
include TPL_DIR . "/header.php";?>
<div id="pro_menu" class="pro_menu" style="display: block;">
  <div class="shell">
    <ul class="pro">
      <li <?php if($plantype == '' && !isset($status)) echo 'class="default"'?>><a href="?action=planlist">项目列表</a></li>
      <li <?php if($status == '2') echo 'class="default"'?>><a href="?action=planlist&actiontype=audit&status=2">申请通过</a></li>
      <li <?php if($status == '0') echo 'class="default"'?>><a href="?action=planlist&actiontype=audit&status=0">等待通过</a></li>
      <li <?php if($status == '1') echo 'class="default"'?>><a href="?action=planlist&actiontype=audit&status=1">已被拒绝</a></li>
    </ul>
  </div>
</div>
<div class="planads">
  <table width="500" border="0" cellpadding="0" cellspacing="0" 1bgcolor="#44AA55" style="margin-top:10px">
  <tr>
    <td><strong>投放网站</strong>：<select name="select" onchange="location.href = this.options[selectedIndex].value">
      <?php foreach((array)$siteall as $key=>$s ) {
		 echo "<option value = '?action=planads&planid=".$planid."&siteid=".$s['siteid']."'";
		 if($s['siteid']==$siteid) echo "selected";
		 echo ">".$s['sitename']."</option>";
		}
		?>
    </select>
网址:<a href="http://<?php echo $site['siteurl']?>" target="_blank"><?php echo $site['siteurl']?></a> <img src="/templates/<?php echo Z_TPL?>/images/s<?php echo $site['grade']?>.jpg" alt="" border="0" title="<?php echo $site['grade']?>级" /><span style=" margin-left:10px;"> <a href="?action=createsite">增加网站</a> </span></td>
    </tr>
</table>

  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tbr" style="margin-top:10px">
    <tr>
      <th width="125">Logo</th>
      <th width="150">项目名称</th>
      <th width="80">计费类型</th>
      <th width="90">结算周期</th>
      <th width="120">活动时间</th>
      <th>单价</th>
      <th>数据返回</th>
    </tr>
    <tr>
      <td width="125"><img src="<?php if($p['logo']) echo $p['logo'];else echo '/templates/'.Z_TPL.'/images/no.gif'?>" /></td>
      <td><?php  echo $p['planname']?></td>
      <td><?php  echo ucfirst($p['plantype'])?></td>
      <td><?php  if($p['clearing'] == 'day') $clearings =  '日结';
		else if($p['clearing'] == 'week') $clearings = '周结';
		else if($p['clearing'] == 'month') $clearings = '月结';echo $clearings ?></td>
      <td><?php if ($p['expire'] == '0000-00-00') echo '不限制';else echo substr($p['addtime'],0,10).'至'.$p['expire'];?></td>
      <td><font color="#FF7E00">
 		<?php 
		if($p['gradeprice']==1) {
			$sprice =  's'.$site['grade']."price";
			$price = $p[$sprice];
		}else {
			$price = $p['price'];
		}
		if($p['plantype'] == 'cps') echo abs($price).'%';
			else  echo abs($price);
		?>
        </font></td>
      <td><?php if($p['plantype'] == 'cpa' || $p['plantype'] == 'cps') {
	 			if ($p['datatime'] == '0') echo '实时';else echo '延时'.$p['datatime'].'天';
	 		}else {
				echo "实时";
			}
	 ?>
      </td>
    </tr>
    <?php if($p['priceinfo']) {?>
    <tr>
      <td colspan="7">关于单价：<?php echo $p['priceinfo'];?></td>
    </tr>
    <?php }?>
    <?php if($p['planinfo']) {?>
    <tr>
      <td colspan="7"><?php echo $p['planinfo']!=''?$p['planinfo'] : '';?></td>
    </tr>
    <?php }?>
    <?php if($webtypedata||  $citydata || $timedata || $weekdaydata) {?>
    <tr>
      <td colspan="7"><font color="red"><b>投放限制：</b></font>
        <?php 
	if($webtypedata) {
		if($webtypecom == '==') echo "&nbsp;&nbsp;[只允许]";else echo "[不允许] ";echo '<font color="gray"><strong>网站类型</strong>：'.trim($webtypedata,',').'</font>';
		}
	if($citydata) {if($citycom == '==') echo "&nbsp;&nbsp;[只允许] ";else echo "[不允许] ";echo '<font color="gray"><strong>地区</strong>：'.trim($citydata,',').'</font>';
	}
	if($timedata) echo ' &nbsp;&nbsp;[只允许] <font color="gray"><strong>时间</strong>：'.trim($timedata,',').'</font>';
	if($weekdaydata) echo '&nbsp;&nbsp;[只允许]<font color="gray"><strong>星期</strong>：'.trim($weekdaydata,',') .'</font>';
	?></td>
    </tr>
    <?php }?>
  </table>
  <div class="tul">
    <ul>
      <li <?php if($adstypeid == '') echo "class='d'"?>><a href="<?php echo "?action=planads&planid=".$planid."&siteid=".$siteid.""?>"><strong>全部形式</strong></a></li>
      <?php
foreach ((array)$adstypearray as $at){ 
if($at['adstypeid']==13) continue;
$d = $adsmodel->countAdsTypeNum($at['adstypeid'],$adstypenum);
if($d && strlen($adstypenum['dispurl'])==0) {?>
      <li  <?php if($adstypeid == $at['adstypeid']) echo "class='d'"?>><a href="?action=planads&adstypeid=<?php echo $at['adstypeid']?>&planid=<?php echo $planid?>&siteid=<?php echo $siteid?>" ><?php echo $at['name']?></a></li>
      <?php } } ?>
    </ul>
    <div class="r">
      <input name="preview" type="radio" value="0" <?php if($preview == 0) echo "checked"?> onClick="location.href = <?php echo "'?action=planads&planid=".$planid."&siteid=".$siteid."&preview=0"?>&adstypeid=<?php echo $adstypeid?>'">
      <span style=" <?php if($preview == 0) echo "font-weight:bold"?>">全部预览</span>&nbsp;&nbsp;
      <input name="preview" type="radio"  value="1" <?php if($preview == 1) echo "checked"?> onClick="location.href = <?php echo "'?action=planads&planid=".$planid."&siteid=".$siteid."&preview=1&width=".$adsspecs[0]['width']."&height=".$adsspecs[0]['height'].""?>&adstypeid=<?php echo $adstypeid?>'">
      <span style=" <?php if($preview == 1) echo "font-weight:bold"?>">逐个预览</span></div>
  </div>
  <div class="adsspecs">
    <ul>
      <?php foreach((array)$adsspecs as $s) {?>
      <li>
        <input type="radio" name="styles" onClick="location.href = <?php echo "'?action=planads&planid=".$planid."&siteid=".$siteid."&width=".$s['width']."&height=".$s['height'].""?>&adstypeid=<?php echo $adstypeid?>&preview=1'" <?php if($width == $s['width'] && $height == $s['height']) echo "checked"?>>
        <?php echo $s['width'].'x'.$s['height']?> </li>
      <?php } ?>
    </ul>
  </div>
  <div class="y">预览</div>
  <?php foreach ((array)$ads as $a){
	$at=$adstypemodel->getAdsTypeId($a['adstypeid']);
	$ckzone = $sitemodel->ckZoneData($p['plantype'],$a['adstypeid'],$siteid,$a['width'],$a['height']);
?>
  <div style="padding-top:10px; padding-bottom:10px">
    <table width="100%" border="0" cellpadding="3" cellspacing="0" class="tbr1">
      <tr>
        <td width="21" align="center" bgcolor="#F7F7F7">类型</td>
        <td bgcolor="#FFFFFF"><?php echo $at['name'] ?></td>
      </tr>
      <tr>
        <td width="21" align="center" bgcolor="#F7F7F7">尺寸</td>
        <td bgcolor="#FFFFFF"><?php echo $a['width'].'*'.$a['height'];?></td>
      </tr>
      <tr>
        <td width="21" align="center" bgcolor="#F7F7F7">预览</td>
        <td bgcolor="#FFFFFF"><?php 
	$width = $a['width'];
	$height = $a['height'];
	if($a['width']>800)  $width = 800;
	if($a['height']>500)  $height = 500;
	if($p['plantype']=='cpm'){
			echo "无预览";
	}
	else {
			$imgext =  substr($a['imageurl'],-3);
			if($imgext){
				$parse_url = parse_url($a['imageurl']);
				if (!$parse_url['scheme']) {
					$imgurl = $GLOBALS['C_ZYIIS']['imgurl'].$a['imageurl'];
				}else {
					$imgurl = $a['imageurl'];
				}
			}
			if( $a['imageurl'] && $imgext != 'swf' ){
				echo "<img src=".$imgurl." width=".$width."  height=".$height." border='0' >";
			}else if($a['imageurl'] && $imgext == 'swf' ){
				echo "<embed src=".$imgurl." quality='high' pluginspage='http://www.macromedia.com/go/getflashplayer' type='application/x-shockwave-flash' width=".$width."  height=".$height." wmode=transparent></embed>";
			}else echo "<iframe  width=".$width." height=".$height." frameborder=0 src='?action=showads&adsid=".$a['adsid']."' marginwidth='0' marginheight='0' vspace='0' hspace='0' allowtransparency='true' scrolling='no'></iframe>";
		}
		
		?></td>
      </tr>
      <tr>
        <td width="21" align="center" bgcolor="#F7F7F7">代码</td>
        <td bgcolor="#FFFFFF"><?php 
		if(!$isok) echo"<font color='#ff0000'>网站类型不匹配</font>";
		else {
			if ($p['audit'] == 'y'){
				if($p['stopaudit']==2)echo"<font color='#FF830A'>暂停申请</font>";
				else {
				$audit = $auditmodel->ckPlanIdAudit($p['planid'],$siteid);
				if($audit == 're') echo"<font color='#FF830A'>申请中</font>";
				else if($audit == 'deny') echo"<font color='#ff0000'>拒绝申请</font>";
				else if($audit == 'ok') ;
				else echo"<span id='e_".$p['planid']."'><a href='javascript:void(0)' onclick='doAudit(".$p['planid'].",".$siteid.")'><strong>申请广告</strong></span>";
				}
			} if ($p['audit'] != 'y' ||  $audit == 'ok') {?>
			  <a href="i.php?action=zone&actiontype=create&adsid=<?php echo $a['adsid']?>&siteid=<?php echo $siteid?>" class="gct">获取代码</a>
			  <?php if($ckzone){?>
			  <a href="?action=zonelist&plantype=<?php echo $p['plantype']?>&adstypeid=<?php echo $a['adstypeid']?>&siteid=<?php echo $siteid?>&width=<?php echo $a['width']?>&height=<?php echo $a['height']?>" class="adgct">加入现有广告位？</a>
			  <?php } 
			  if( 
			  (
			  $u[$zlinktype]=='2' || 
			  ($u[$zlinktype]=='1' && in_array ($a['plantype'], explode(',',$GLOBALS['C_ZYIIS']['zlink_on'])))
			  ) 
			  && $a['zlink']=='1' 
			  &&  ($a['plantype']!='cpv' && ($a['htmlcode']=='' || $a['headline']=='')
			  )){?>
			  <a href="i.php?action=zone&actiontype=create&type=link&adsid=<?php echo $a['adsid']?>&siteid=<?php echo $siteid?>" class="gct">直链代码</a>
			  <?php }?>
			  <?php } //End $p['audit'] != 'y'
		  
		  }?>
		  
		  
        </td>
      </tr>
    </table>
  </div>
  <?php 
} //结束foreach Ads
?>
</div>
<div id="aContent" style="display:none;">
  <table width="270" border="0" align="center" cellpadding="0" cellspacing="3">
    <tr>
      <td height="80" align="center"><div class="info">申请成功，请等待审核通过</div></td>
    </tr>
  </table>
</div>
<script src="/javascript/jquery/jquery.js" language='JavaScript'></script>
<script src="/javascript/jquery/thickbox.js" language='JavaScript'></script>
<link href="/javascript/jquery/css/thickbox.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" type="text/javascript">
function doAudit(pid,sid){
	$.get("?action=postaudit&actiontype=audit&planid="+pid+"&siteid="+sid+"");
	$i("e_"+pid).innerHTML = "<font color='#FF830A'>申请中</font>";
	setTimeout("tb_show('申请成功','#TB_inline?height=100&width=300&inlineId=aContent')",500);
}
</script>
<?php include TPL_DIR . "/footer.php";?>
