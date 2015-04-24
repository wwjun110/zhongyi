<?php if(!defined('IN_ZYADS')) exit(); 
include_once TPL_DIR . "/header.php";
?>
<script src="/javascript/jquery/jquery.js" type="text/javascript"></script>
<script src="/javascript/jquery/jtip.js" language='JavaScript'></script>
<link href="/javascript/jquery/css/question.css" rel="stylesheet" type="text/css" />
<script src="/javascript/jquery/thickbox.js" language='JavaScript'></script>
<link href="/javascript/jquery/css/thickbox.css" rel="stylesheet" type="text/css" />
<div id="pro_menu" class="pro_menu" style="display: block;">
  <div class="shell">
    <ul class="pro">
      <li  ><a href="?action=zonelist">广告位列表</a></li>
      <li ><a href="?action=createsite">新增网站</a></li>
      <li class="default"><a href="?action=sitelist">网站列表</a></li>
    </ul>
  </div>
</div>
<div class="zonelist">
  <?php if($statetype== 'success') {?>
  <div class="tipinfo" id="success">
    <div class="r1"></div>
    <div class="r2"></div>
    <div class="text">网站信息已更新。</div>
    <div class="l1"></div>
    <div class="l2"></div>
  </div>
  <?php }  ?>
  <h2>网站列表</h2>
  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td height="40">共网站<?php echo $sitenum?>个</td>
    </tr>
  </table>
  <table width="100%" align="center" class="wrap tb0">
    <tr>
      <th width="150">网站域名</th>
      <th width="130">附加域名<a href="?action=faq&width=350&type=url&typeval=pertainurl" class="jTip" id="pvhelp"  name="什么是附加域名"><img src="/javascript/jquery/images/question.gif" border="0" align="absmiddle" /></a></th>
      <th width="110">网站名称</th>
      <th width="140">备案号</th>
      <th width="80">网站类别</th>
      <th width="90">星级</th>
      <th width="50">广告位</th>
      <th width="50">状态</th>
      <th>操作</th>
    </tr>
    <?php 	foreach((array)$site as $s){
				$sid = $sitetypemodel->adminGetSiteTypeSid($s['sitetype']);
				$znum = $sitemodel->getNumZoneId($s['siteid']);
   ?>
    <tr id="tbList">
      <td align="center"><a href="javascript:tourl('http://<?php echo  $s['siteurl'] ?>')"><?php echo $s['siteurl']?></a></td>
      <td align="center">
	  <?php 
	 		$pertainurl =  $s['pertainurl'];
	  		$pertainurl =  explode(",",$pertainurl);
			foreach((array)$pertainurl as $purl){
				echo "<a href='javascript:tourl(\"http://".$purl."\")'>".$purl."</a><br>";
			}
	  ?>
	  </td>
      <td align="center"><?php echo $s['sitename']?></td>
      <td align="center"><?php echo $s['beian']?></td>
      <td align="center"><?php echo $sid['sitename']?></td>
      <td align="center"><img alt="" src="/templates/<?php echo Z_TPL?>/images/s<?php echo $s['grade']?>.jpg" title="<?php echo $s['grade']?>级" /></td>
      <td align="center"><a href="?action=zonelist&siteid=<?php echo $s['siteid']?>"><?php echo $znum?>个</a></td>
      <td align="center"><?php
          if($s['status'] == '0') {
          	echo '<font color="red">待审</font>';
          }
		  if($s['status'] == '1') {
          	echo '<font color="red" onclick="doDenyinfo(\''.$s['denyinfo'].'\')"  style="cursor:pointer">拒绝[查看原因]</font>';
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
      <td><a href="?action=editsite&amp;siteid=<?php echo $s['siteid']?>">修改</a></td>
    </tr>
    <?php } //end foreach
	if(!$site) { ?>
    <tr class="tbListNull"></tr>
    <tr class="tbListNull">
      <td colspan="10"><a href="?action=createsite">没有网站。新建一个</a></td>
    </tr>
    <?php } //ednt if?>
  </table>
</div>

<div id="sContent" style="display:none;">
  <table width="450" border="0" align="center" cellpadding="0" cellspacing="3">
    <tr>
      <td height="80" align="center"><div  id="infos">您的网站没有审核通过或是您没有填加一个网站</div></td>
    </tr>
    
  </table>
</div>

<script language="JavaScript" type="text/javascript">
 
function doDenyinfo(info){
	$i("infos").innerHTML = info;
	t = setTimeout("tb_show('拒绝原因','#TB_inline?height=150&width=500&inlineId=sContent')",100);
}
 
</script>
<?php include TPL_DIR . "/footer.php"?>
