<?php if(!defined('IN_ZYADS')) exit(); 
include_once TPL_DIR . "/header.php";
?>
<script language="JavaScript" src="/javascript/jiandate.js"></script>
<script language="JavaScript" type="text/javascript" src="/javascript/jquery/jquery.js"></script>

<div id="pro_menu" class="pro_menu" style="display: block;">
  <div class="shell">
    <ul class="pro">
      <li  class="default" ><a href="?action=stats">数据报表</a></li>
    </ul>
  </div>
</div>
<div class="statslist">
  <h2>数据报表 </h2>
  <form id="form1" name="form1" method="post" action="?action=stats">
    <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0" class="f_12px">
      <tr>
        <td width="130" align="right">按网站筛选：</td>
        <td width="260"><select name="siteid" >
            <option value="">所有网站</option>
            <?php foreach((array)$site as $s){ ?>
            <option value="<?php echo $s['siteid']?>" <?php if($s['siteid']==$siteid)echo " selected"?>><?php echo $s['sitename']?></option>
            <?php }?>
          </select></td>
        <td width="160" align="right">按广告项目筛选：</td>
        <td><select name="planid" id="planid" >
            <option value="">所有广告项目</option>
            <?php foreach((array)$allplanname as $p) { ?>
            <option value="<?php echo $p['planid'].'_'.$p['plantype']?>" <?php if((int)$_REQUEST['planid']==$p['planid'])echo " selected"?> ><?php echo $p['planname']?> </option>
            <?php } ?>
          </select></td>
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
          <img src="/javascript/images/calendar.gif" align="absmiddle" id="abd" onclick="d.a('timerange','timerange','2')"/></td>
        <td align="right">按计费类型筛选：</td>
        <td><select name="plantype[]" id="plantype[]" >
          <option value="">所有计费类型</option>
          <?php foreach((array)$plantypearr as $p) { ?>
          <option value="<?php echo $p['plantype']?>" <?php if($_REQUEST['plantype'][0]==$p['plantype'])echo " selected"?> ><?php echo ucfirst($p['plantype'])?></option>
          <?php } ?>
        </select>
        &nbsp;&nbsp;&nbsp;  <input   value="查 询" type=submit name=submit /></td>
      </tr>
    </table>
  </form>
  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td height="30"  style="text-align:left; font-size:14px; font-weight:bold">
<script language="JavaScript" type="text/javascript">
var t = $("#timerange").find("option:selected").text();  
document.write(t);
</script> <?php echo $plan['planname']?> 的报表 <?php if($actiontype=="data"){?><span class="tsp"  style="padding-left:20px;"><a href="javascript:ref()" >返回&raquo;</a></span><?php }?></td>
    </tr>
  </table>
  <?php if($actiontype=='') {?>
  <table width="100%" align="center" class="wrap tb0">
    <tr>
      <th width="75">日期</th>
      <th width="260">广告项目</th>
      <th width="80">类型</th>
      <th width="120">结算数</th>
    
      <th width="120">收入</th>
      <th>详情</th>
    </tr>
    <?php foreach((array)$stats as $s){
   		$plan=$planmodel->AdminGetPlanOne($s['planid']);
   ?>
    <tr >
      <td align="center"><?php echo $s['day']?></td>
      <td align="center"><strong><?php echo $plan['planname']==''? '<del>已撤销的计划</del>' : $plan['planname']?></strong></td>
      <td align="center"><?php echo   $plan['plantype']?></td>
      <td align="center"><?php echo $s['num']?></td>
  
      <td align="center">￥<?php echo abs($s['sumpay']);?></td>
      <td  align="center"><a href="?action=stats&actiontype=data&planid=<?php echo $s['planid']?>&timerange=<?php echo $s['day'].'/'.$s['day']?>">查看</a><a href="#"></a></td>
    </tr>
    <tr >
	 <?php 
	 $sumnum = $sumnum+$s['num'];
	 $sumpay = $sumpay+$s['sumpay'];
	 } //end foreach?>
      <td align="center"><strong>当页总计</strong></td>
      <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td align="center"><strong><?php echo $sumnum?></strong></td>
      <td align="center"><strong>￥<?php echo $sumpay?></strong></td>
      <td  align="center">&nbsp;</td>
    </tr>
   
  </table>
  <?php }  else { //end if($actiontype=='')?>
 
  <table width="100%" align="center" class="wrap tb0">
    <tr>
      <th width="160">投放广告位</th>
      <th width="120">属于网站</th>
      <th width="120">结算数</th>
      <th>收入</th>
    </tr>
    <?php foreach((array)$stats as $s){
   		$zone = $sitemodel->getZoneName($s['zoneid']);
   ?>
    <tr >
      <td align="center"><?php echo $zone['zonename']==''? '<!--<del> </del>-->' : $zone['zonename']?></td>
      <td align="center"><strong><?php echo $zone['sitename']?></strong></td>
      <td align="center"><?php echo $s['num']?></td>
  
      <td align="center">￥<?php echo abs($s['sumpay']);?></td>
    </tr>
	 <?php  
	 $sumnum = $sumnum+$s['num'];
	 $sumpay = $sumpay+$s['sumpay'];
	 } //end foreach?>
	 
    <tr >
      <td align="center"><strong>当页总计</strong></td>
      <td align="center">&nbsp;</td>
      <td align="center"><strong><?php echo $sumnum?></strong></td>
      <td align="center"><strong>￥<?php echo $sumpay?></strong></td>
    </tr>
   
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