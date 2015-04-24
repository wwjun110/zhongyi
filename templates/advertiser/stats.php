<?php if(!defined('IN_ZYADS')) exit(); 
include_once TPL_DIR . "/header.php";
?>
<script LANGUAGE="JavaScript" src="/javascript/jiandate.js"></script>
<script language="JavaScript" type="text/javascript" src="/javascript/jquery/jquery.js"></script>

<div id="pro_menu" class="pro_menu" style="display: block;">
  <div class="shell">
    <ul class="pro">
      <li  class="default" ><a href="?action=stats">数据报表</a></li>
    </ul>
  </div>
</div>
<div class="pages">
  <h2>数据报表 </h2>
  <form id="form1" name="form1" method="post" action="?action=stats">
    <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0" class="f_12px">
      <tr>
        <td width="130" align="right">按广告项目筛选：</td>
        <td width="260"><select name="planid" id="planid" >
          <option value="">所有广告项目</option>
          <?php foreach((array)$allplanname as $p) { ?>
          <option value="<?php echo $p['planid'].'_'.$p['plantype']?>" <?php if((int)$_REQUEST['planid']==$p['planid'])echo " selected"?> ><?php echo $p['planname']?> </option>
          <?php } ?>
        </select></td>
        <td width="160" align="right">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td align="right"> 时间段：</td>
        <td><select name="timerange" id="timerange" style="width:220px">
            <option value="<?php if($time_begin == '') echo DAYS ;else echo $time_begin; echo ' / ';if($time_end == '') echo DAYS ;else echo $time_end;?>">
            <?php if($time_begin == '') echo DAYS ;else echo $time_begin; echo ' 至 ';if($time_end == '') echo DAYS ;else echo $time_end;?>
            </option>
            <option  value="a" <?php echo ($timerange == 'a' ? 'selected ' : '')?>>所有时间段</option>
            <option value="t" <?php echo ($timerange == 't' ? ' selected' : '')?> >昨天</option>
            <option value="w" <?php echo ($timerange == 'w' ? ' selected' : '')?> >过去一周内</option>
            <option value="m" <?php echo ($timerange == 'm' ? ' selected' : '')?>>本月内</option>
            <option value="l" <?php echo ($timerange == 'l' ? ' selected' : '')?>>上月的</option>
          </select>
          <img src="/javascript/images/calendar.gif" align="absmiddle" id="abd" onclick="d.a('timerange','timerange',2)"/></td>
        <td align="right">&nbsp;</td>
        <td><input   value="查 询" type=submit name=submit /></td>
      </tr>
    </table>
  </form>
  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td height="30"  style="text-align:left; font-size:14px; font-weight:bold">

<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="80%"><script language="JavaScript" type="text/javascript">
var t = $("#timerange").find("option:selected").text();  
document.write(t);
</script><?php echo $plan['planname']?> 的报表
      <?php if($actiontype=="data"){?>
      <span class="tsp"  style="padding-left:20px;"><a href="javascript:ref()" >返回&raquo;</a></span>
      <?php }?></td>
    <td><img src="/templates/<?php echo Z_TPL?>/images/excel.jpg" align="absmiddle" /> <a href="e.php?actiontype=dostats&dotype=<?php echo $actiontype?>&timerange=<?php echo $timerange?>&planid=<?php echo $planid?>" title="点击查询后再导出"  >导出Excel</a></td>
    </tr>
</table></td>
    </tr>
  </table>
  <?php if($actiontype=='') {?>
  <table width="100%" align="center" class="wrap tb0">
    <tr>
      <th width="75">日期</th>
      <th width="180">广告项目</th>
      <th width="80">类型</th>
      <th width="120">浏览数</th>
      <th width="100">结算数</th>
    
      <th width="100">效果数</th>
      <th width="120">支付</th>
      <th>详情</th>
    </tr>
    <?php foreach((array)$stats as $s){
   		$plan=$planmodel->AdminGetPlanOne($s['planid']);
   ?>
    <tr >
      <td align="center"><?php echo $s['day']?></td>
      <td align="center"><strong><?php echo $plan['planname']==''? '<del>已撤销的计划</del>' : $plan['planname']?></strong></td>
      <td align="center"><?php echo   $plan['plantype']?></td>
      <td align="center"><?php echo $s['views']?></td>
      <td align="center"><?php echo $num = $s['num']+$s['deduction'];?></td>
  
      <td align="center"><?php echo $s['orders'];?></td>
      <td align="center" nowrap="nowrap">￥<?php echo abs($s['sumadvpay']);?></td>
      <td  align="center"><a href="?action=stats&actiontype=data&planid=<?php echo $s['planid']?>&timerange=<?php echo $s['day'].'/'.$s['day']?>">查看</a><a href="#"></a></td>
    </tr>
    
    <?php 
	$sumviews = $sumviews+$s['views'];
	$sumnum = $sumnum+$num;
	$sumadvpay = $sumadvpay+$s['sumadvpay'];
	$sumorders  += $s['orders'];
	} //end foreach?>
	<tr >
      <td align="center">&nbsp;</td>
      <td align="center">总计：</td>
      <td align="center">&nbsp;</td>
      <td align="center"><?php echo $sumviews?></td>
      <td align="center"><?php echo $sumnum?></td>
      <td align="center"><?php echo $sumorders?></td>
      <td align="center"><?php echo $sumadvpay?></td>
      <td  align="center">&nbsp;</td>
    </tr>
  </table>
  <?php echo $viewpage;?>
  <?php }  else { //end if($actiontype=='')?>
 
  <table width="100%" align="center" class="wrap tb0">
    <tr>
      <th width="120">投放网站</th>
      <th width="120">浏览数</th>
      <th width="120">结算数</th>
      <th width="120">点击数</th>
      <th width="120">效果数</th>
      <th>支付</th>
    </tr>
    <?php foreach((array)$stats as $s){
   		$site = $sitemodel->AdminGetSiteOne($s['siteid']);
   ?>
    <tr >
      <td align="center"><strong><?php echo $site['sitename']?></strong> 
      </td>
      <td align="center"><?php echo $s['views']?></td>
      <td align="center"><?php echo $s['num']+$s['deduction'];?></td>
  
      <td align="center"><?php echo $s['clicks'];?></td>
      <td align="center"><?php echo $s['orders'];?></td>
      <td align="center">￥<?php echo abs($s['sumadvpay']);?></td>
    </tr>
    <?php } //end foreach?>
  </table>
  
  <?php } //end else?>
  <?php if(!$stats) { ?>
  <table width="100%" align="center" class="wrap tb0">
    <tr class="tbListNull">
      <td ><a href="#">没有数据</a></td>
    </tr>
  </table>
  <?php }?>
  <?php echo $viewpage?>
</div>
<?php include TPL_DIR . "/footer.php"?>