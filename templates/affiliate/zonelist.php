<?php if(!defined('IN_ZYADS')) exit(); 
include_once TPL_DIR . "/header.php";
?>
 <div id="pro_menu" class="pro_menu" style="display: block;">
  <div class="shell">
    <ul class="pro">
      <li <?php if($plantype == '') echo 'class="default"'?>><a href="?action=zonelist">广告位列表</a></li>
		<li><a href="?action=createsite">新增网站</a></li>  
		<li><a href="?action=sitelist">网站列表</a></li>
    </ul>
  </div>
</div>

<div class="zonelist">
<div  id="zone_tip" style="display: none; position: absolute"><img src="/templates/<?php echo Z_TPL?>/images/index-tip.gif"></div>
<h2>管理广告位 <span class="tsp"  style="padding-left:20px;"><a href="?action=sitelist">查看网站&raquo;</a></span></h2>

<table width="94%" border="0" align="center" cellpadding="5" cellspacing="5" class="f_12px">
  <tr>
    <td colspan="4" ><label for="s_1"><input id="s_1" type="radio" name="plantype" onClick="location.href ='?action=zonelist'" <?php if($plantype=='')echo " checked"?> />
所有结算方式</label>
  
   				<?php 				 
						 foreach((array)$plantypearr as $pt) {
                           		if(search($pt['plantype'],$zt)>-1){?>
                 &nbsp;<label for="s_<?php echo $pt['plantype']?>"><input id="s_<?php echo $pt['plantype']?>" type="radio" name="plantype" onClick="location.href ='?action=zonelist&plantype=<?php echo $pt['plantype']?>'" <?php if($plantype==$pt['plantype'])echo " checked"?>/><?php echo $pt['name'].'('.ucfirst($pt['plantype']).')'?></label>
                <?php } }?> </td>
    </tr>
  <tr>
    <td width="16%" align="right">按网站筛选广告位：</td>
    <td width="19%">
      <select name="select" onChange="location.href = this.options[selectedIndex].value">
        <option value="?action=zonelist">所有网站</option>
		<?php foreach((array)$site as $s){ ?>
		<option value="?action=zonelist&siteid=<?php echo $s['siteid']?>" <?php if($s['siteid']==$siteid)echo " selected"?>><?php echo $s['sitename']?></option>
		<?php }?>
      </select></td>
    <td width="16%" align="right">按大小筛选广告位：</td>
    <td><select name="select2" onChange="location.href = this.options[selectedIndex].value">
      <option value="?action=zonelist">所有尺寸</option>
	  <?php foreach((array)$ap as $whs) {
	  $sp  =  @explode('x',$whs);
	  $widths = $sp[0];
      $heights = $sp[1];
	  ?>
	  <option value="?action=zonelist&width=<?php echo $widths?>&height=<?php echo $heights?>" <?php if($width==$widths && $height==$heights)echo " selected"?> ><?php echo $widths.'x'.$heights?></option>
	  <?php }?>
    </select></td>
  </tr>
</table>

 <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
   <tr>
     <td height="40">共广告位<?php echo count($zt)?>条</td>
    </tr>
 </table>
 <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="wrap tb0" >
   <tr>
     <th width="80">#ID</th>
     <th>广告位名称</th>
     <th width="120">所属网站</th>
     <th width="90">尺寸</th>
     <th width="70">结算方式</th>
     <th width="70">类型</th>
     <th width="60">已投放</th>
     <th width="200">操作</th>
    </tr>
   <?php foreach((array)$zone as $z) {
   		$zn = $adsmodel->getZoneAdsOk($z,$z['sitetype'],$z['siteid']);
		$pt = $adstypemodel->getPlanTypeName($z['plantype']);
		$at = $adstypemodel->getAdsTypeId($z['adstypeid']);
   ?>
   <tr id="tbList">
     <td align="center"><?php echo $z['zoneid']?>[<a href="?action=<?php if ($z['adstypeid']==13) echo "createzt";else echo "zone"?>&actiontype=edit&siteid=<?php echo $z['siteid']?>&zoneid=<?php echo $z['zoneid']?>">预览</a>]</td>
     <td align="center"><?php echo $z['zonename'];?></td>
     <td align="center"><?php echo $z['siteurl'];?><br>
	 <?php
          if($z['status'] == '0') {
          	echo '<font color="red">网站待审</font>';
          }
		  if($z['status'] == '1') {
          	echo '<font color="red">拒绝投放</font>';
         }
		  if($z['status'] == '2') {
          	echo '<font color="red">网站锁定</font>';
          }
		  if($z['status'] == '4') {
          	echo '<font color="red">修改待审</font>';
          }
	?></td>
     <td align="center"><?php 
	if($z['zonetype']=='cpm' || $z['zonetype']=='xn'  || $z['zonetype']=='tt') echo '--';
	else echo $z['adstypeid'] == 24 ? "全部" : $z['width'].'*'.$z['height']; 
	?></td>
     <td align="center"><?php echo  $pt['name'];?></td>
     <td align="center"><?php echo $at['name'];?></td>
     <td align="center"><?php 
	if($z['viewtype'] == '0') echo '智能';
	else echo count(@explode(',',$z['viewadsid'])).'/'.count($zn);
	?></td>
     <td><span class="tsp">
	 <?php if ($z['adstypeid']==13) {?>
	 	<a href="?action=createzt&actiontype=edit&siteid=<?php echo $z['siteid']?>&zoneid=<?php echo $z['zoneid']?>">编辑</a>
	 <?php } else {?>
	 <a href="?action=zone&actiontype=edit&siteid=<?php echo $z['siteid']?>&zoneid=<?php echo $z['zoneid']?>" id="zone_<?php echo $z['zoneid']?>">添加广告/编辑</a>
	 <?php }?> | <a  href="?action=zone&actiontype=del&zoneid=<?php echo $z['zoneid']?>" onclick="return confirm('确定要删除这个广告位吗?\n删除后广告无法显示')">删除 | <a href="?action=getcode&zoneid=<?php echo $z['zoneid']?>">获取代码</a></span></td>
    </tr>
   <?php } //end foreach
if(!$zone) { ?>
   <tr class="tbListNull">
     <td colspan="8"><a href="?action=adslist">没有广告位。新建一个</a></td>
   </tr>
   <?php } //ednt if?>
   
 </table>
  <?php echo $viewpage?>
</div>
<script language="JavaScript" type="text/javascript">
function ShowTip(){
	var tip = $i("zone_tip");
	var toid = $i("zone_<?php echo $zone[0]['zoneid']?>");
	tip.style.display = '';
	tip.style.top = ot(toid)+10+'px';
	tip.style.left = ol(toid) - 75 + 'px';
}
<?php if($plantype && $siteid && $adstypeid) echo "ShowTip();";?>
</script>

<?php include TPL_DIR . "/footer.php"?>
