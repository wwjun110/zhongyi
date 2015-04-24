<?php if(!defined('IN_ZYADS')) exit(); 
include TPL_DIR . "/header.php";?>
<div id="pro_menu" class="pro_menu" stylea="height: 11px; display: block;background-color:#FFFFFF;background-position:0 -107px;">
  <div class="shell">
    <ul class="pro">
	  <li class="default"><a href="#">计划列表</a></li>
 
    </ul>
  </div>
</div>

<div class="pages">
<?php if($statetype== 'success') {?>
	<div class="tipinfo" id="success">
	<div class="r1"></div>
	<div class="r2"></div>
	<div class="text">计划已更新。</div>
	<div class="l1"></div>
	<div class="l2"></div>
</div>
<?php }  ?>
<h2>计划管理 <span class="tsp"  style="padding-left:20px;"><img  src='/templates/<?php echo Z_TPL?>/images/add.gif' align='absmiddle' /> <a href="?action=createplan">新建计划&raquo;</a></span></h2>

<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="wrap tb0" style="margin-top:30px">
  <tr>
    <th width="60">计划ID</th>
    <th width="130">计划名称</th>
    <th width="60">类型</th>
    <th width="60">单价</th>
    <th width="60">限额</th>
    <th width="70">结算</th>
    <th width="60">定向</th>
    <th width="70">会员限制</th>
    <th width="70">需要审核</th>
    <th>广告数量</th>
    <th>操作</th>
    <th width="60">状态</th>
  </tr>
  <?php
  	foreach((array)$plan as $p){
		$adsnum = $planmodel->gxGetPlanAdsNum($p['planid']);
   ?>
  <tr id="tbList">
    <td align="center"><?php echo $p['planid']?></td>
    <td align="center"><strong><?php echo $p['planname'];?></strong></td>
    <td align="center"><?php echo ucfirst($p['plantype'])?></td>
    <td align="center"><?php echo abs($p['priceadv'])?>
      <?php if($p['plantype'] == 'cps') echo '%'?></td>
    <td align="center"><?php echo abs($p['budget'])?></td>
    <td align="center"><?php 
			if ($p['clearing'] == 'day') echo '日结';
			if ($p['clearing'] == 'week') echo '周结';
			if ($p['clearing'] == 'month') echo '月结';
		  ?></td>
    <td align="center"><?php if($p['checkplan']!='true') echo '有';else echo "无";?></td>
    <td align="center"><?php if ($p['restrictions']!='1') echo '有设置';else echo "不限制";?></td>
    <td align="center"><?php if ($p['audit']=='n')echo '不需要';else echo "需要";?></td>
    <td><?php echo $adsnum?> <a href="?action=createads&planid=<?php echo $p['planid']?>&plantype=<?php echo $p['plantype']?>">新建</a></td>
    <td><a href="?action=editplan&planid=<?php echo $p['planid']?>">编辑</a></td>
    <td><?php  if($p['status'] == '0') {?>
      <font color="red">待审</font>
      <?php }?>
      <?php  if($p['status'] == '1') {?>
      <font color="green">投放中</font>
      <?php }?>
      <?php if($p['status'] == '2') {?>
      <font color="red">停止中</font>
      <?php }?>
      <?php if($p['status'] == '3') {?>
      <font color="red">暂停中(限额)</font>
      <?php }?>
      <?php if($p['status'] == '4') {?>
      <font color="red">停止(过期或是余额不足)</font>
      <?php }?></td>
  </tr>
  <?php } //end foreach
if(!$plan) { ?>
  <tr class="tbListNull">
    <td colspan="13"><a href="?action=createplan">没有计划项目。新建一个</a></td>
  </tr>
  <?php } //ednt if?>
</table>
</div>
<?php include TPL_DIR . "/footer.php"?>