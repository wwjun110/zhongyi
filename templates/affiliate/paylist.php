<?php if(!defined('IN_ZYADS')) exit(); 
include TPL_DIR . "/header.php";?>

<div id="pro_menu" class="pro_menu" style="display: block;">
  <div class="shell">
    <ul class="pro">
      <li class="<?php if($type=='') echo "default"?>" ><a href="?action=paylist">支付信息</a></li>
	    <li class="<?php if($type=='add') echo "default"?>" ><a href="?action=paylist&type=add">补款记录</a></li>
    </ul>
  </div>
</div>
<?php if($type==''){?>

<div class="paylist">
    <h2> 支付信息 <span class="tsp"  style="padding-left:20px;">支付标准为 <?php echo $GLOBALS['C_ZYIIS']['min_clearing']?>元起付，支付分类为<?php $ec=explode(',',$GLOBALS['C_ZYIIS']['clearing_cycle']);foreach($ec as $c){if($c=='day')echo '日结 ';if($c=='week')echo '周结（每周'.$GLOBALS['C_ZYIIS']['clearing_weekdata'].'） ';if($c=='month')echo '月结（每月'.$GLOBALS['C_ZYIIS']['clearing_monthdata'].'号）';}?>，如果您帐户分类金额尚未累计至 <?php echo $GLOBALS['C_ZYIIS']['min_clearing']?>元，系统会自动累计下次结算。</span></h2>
	
 <table width="100%" align="center" class="wrap tb0">
  <tr>
    <th width="90">结算日期</th>
    <th width="90">支付日期</th>
    <th width="80">广告金额</th>
    <th width="80">下线金额</th>
    <th width="60">税</th>
    <th width="60">手续费</th>
    <th width="80">应付</th>
    <th width="60">实付比例</th>
    <th width="80">实付金额</th>
    <th width="100">备注</th>
    <th>状态</th>
  </tr>
<?php foreach((array)$pay as $p){?>  
  <tr>
    <td><?php echo $p['addtime']?></td>
    <td><?php echo substr($p['paytime'],0,10)?></td>
    <td>￥<?php echo abs($p['money'])?></td>
    <td>￥<?php echo abs($p['xmoney'])?></td>
    <td>￥<?php echo $p['tax']?></td>
    <td>￥<?php echo $p['charges']?></td>
    <td>￥<?php echo abs($p['pay'])?></td>
    <td><?php echo abs($p['scale']).'%';?></td>
    <td>￥<? echo abs($p['realmoney']);?></td>
    <td width="100"><?php echo $p['payinfo']?> </td>
    <td><?php
	  if ($p['status'] == '0')
        {
            $statusY = '<font color=red>未支付</font>';
        } 
        if ($p['status']=='1')
        {
            $statusY = '<font color=blue>已支付</font>';
        } 
		echo $statusY;
	  ?></td>
  </tr>
 <?php } //end foreach
if(!$pay) { ?>
   <tr class="tbListNull">
     <td colspan="11"><a href="#">没有支付信息</a></td>
   </tr>
   <?php } //ednt if?>
</table>
 <?php echo $viewpage?>
</div>
<?php } else {?>


<div class="paylist">
    <h2> 补款记录 </h2>
	
 <table width="100%" align="center" class="wrap tb0">
  <tr>
    <th width="210">补款日期</th>
    <th width="120">补款金额</th>
    <th>说明</th>
    </tr>
<?php foreach((array)$pay as $p){?>  
  <tr>
    <td><?php echo $p['orderid'] ? $p['orderid'] : $p['addtime']?></td>
    <td>￥<?php echo abs($p['imoney'])?></td>
    <td> <?php echo  $p['payinfo'] ?></td>
    </tr>
 <?php } //end foreach
if(!$pay) { ?>
   <tr class="tbListNull">
     <td colspan="3"><a href="#">没有补款信息</a></td>
    </tr>
   <?php } //ednt if?>
</table>
 <?php echo $viewpage?>
</div>

<?php }  ?>
<?php include TPL_DIR . "/footer.php"?>