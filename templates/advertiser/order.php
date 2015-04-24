<?php if(!defined('IN_ZYADS')) exit(); 
include_once TPL_DIR . "/header.php";
?>
<script LANGUAGE="JavaScript" src="/javascript/jiandate.js"></script>
<script language="JavaScript" type="text/javascript" src="/javascript/jquery/jquery.js"></script>

<div id="pro_menu" class="pro_menu" style="display: block;">
  <div class="shell">
    <ul class="pro">
      <li <?php if($status == '') echo 'class="default"'?>><a href="?action=order">所有订单</a></li>
      <li <?php if($status == '1') echo 'class="default"'?>><a href="?action=order&status=1">已确认订单</a></li>
	  <li <?php if($status == '0') echo 'class="default"'?>><a href="?action=order&status=0">等待确认订单</a></li>
	  <li <?php if($status == '2') echo 'class="default"'?>><a href="?action=order&status=2">无效订单</a></li>
    </ul>
  </div>
</div>
<div class="pages">
  <h2>订单数据 </h2>
  <form id="orderform" name="orderform" method="post" action="">
 
    <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0" class="f_12px">
      <tr>
        <td width="130" align="right">按广告项目筛选：</td>
        <td width="260"><select name="planid" id="planid" >
          <option value="">所有广告项目</option>
          <?php foreach((array)$allplanname as $p) { ?>
          <option value="<?php echo $p['planid'].'_'.$p['plantype']?>" <?php if((int)$_REQUEST['planid']==$p['planid'])echo " selected"?> ><?php echo $p['planname']?> </option>
          <?php } ?>
        </select></td>
        <td width="160" align="right">状态：</td>
        <td><select name="status" id="status">
          <option value="">所有订单</option>
          <option value="1" <?php if($status=='1')echo " selected"?>>已确认订单</option>
          <option value="0" <?php if($status=='0')echo " selected"?>>等待确认订单</option>
          <option value="2" <?php if($status=='2')echo " selected"?>>无效订单</option>
        </select></td>
      </tr>
      <tr>
        <td align="right"> 下单时间：</td>
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
        <td><input name="submit" type="submit"   value="查 询" /></td>
      </tr>
    </table>
  </form>
  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td height="30"  style="text-align:left; font-size:14px; font-weight:bold"><script language="JavaScript" type="text/javascript">
var t = $("#timerange").find("option:selected").text();  
var s = $("#status").find("option:selected").text();  
document.write(t+" "+s);
</script> </td>
    </tr>
  </table>
 
  <table width="100%" align="center" class="wrap tb0">
    <tr>
      <th width="200">订单</th>
      <th width="160">广告项目</th>
      <th width="100">下单日期</th>
      <th width="100">确认日期</th>
      <th width="80">类型</th>
      <th width="120">支付</th>
      <th>状态</th>
    </tr>
    <?php foreach((array)$order as $o){
   		$plan=$planmodel->AdminGetPlanOne($o['planid']);
   ?>
    <tr >
      <td width="200" align="center"><?php echo $o['orders']?></td>
      <td width="160" align="center"><strong><?php echo $plan['planname']==''? '<del>已撤销的计划</del>' : $plan['planname']?></strong></td>
      <td align="center"><?php echo $o['day']?></td>
      <td align="center"><?php echo $o['confirmtime']?></td>
      <td align="center"><?php echo   $plan['plantype']?></td>
      <td align="center">￥<?php echo $o['priceadv'];?></td>
      <td  align="center"><?php
	   if($o['status'] == '1') echo '<font color="ff0000">已确认</font>';
	   elseif($o['status'] == '0') echo '<font color="blue">等待确认</font>';
		elseif($o['status'] == '2') echo '<font color="blue">无效</font>';
	  
	   ?>      </td>
    </tr>
    <?php } //end foreach?>
  </table>
  <?php echo $viewpage;?>
  
  <?php if(!$order) { ?>
  <table width="100%" align="center" class="wrap tb0">
    <tr class="tbListNull">
      <td ><a href="#">没有数据</a></td>
    </tr>
  </table>
  <?php }?>
</div>
 <?php include TPL_DIR . "/footer.php"?>