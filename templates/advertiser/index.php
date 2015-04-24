<?php if(!defined('IN_ZYADS')) exit(); 
include TPL_DIR . "/header.php";?>
<script src="/javascript/jquery/jquery.js" language='JavaScript'></script>
<script src="/javascript/jquery/thickbox.js" language='JavaScript'></script>
<link href="/javascript/jquery/css/thickbox.css" rel="stylesheet" type="text/css" />
<div id="pro_menu" class="pro_menu" stylea="height: 11px; display: block;background-color:#FFFFFF;background-position:0 -107px;">
  <div class="shell">
    <ul class="pro">
	  <li _class="default"><span>快捷通道:</span></li>
	  <li ><a href="?action=createplan">新增计划</a></li>
	  <li ><a href="?action=createads">新增广告</a></li>
	   <li><a href="?action=audit">审核申请</a></li>
    </ul>
  </div>
</div>
<div class="main">
  <div class="left">
    <h2>账户信息</h2>
    <ul>
      <li><span><?php echo date("m月d日",TIMES)?>支付：</span><strong><?php echo $daymoney?></strong>元 </li>
	  <li><span>昨天支付：</span><strong><?php echo $yemoney?></strong>元 </li>
      <li><span>账户余额：</span><strong><?php echo round($u["money"],2);?></strong>元    &nbsp;&nbsp; <img  src='/templates/<?php echo Z_TPL?>/images/add.gif' align='absmiddle' /> <a href="?action=consumelist&actiontype=charge&TB_iframe=true&height=220&width=600"  title="请选择充值网关"   class="thickbox">马上充值&raquo;</a> </li>
      <li><span>计划状态：</span> 投 放：<strong><?php echo count($s1)?></strong>  停 止：<strong><?php echo count($s2)?></strong>&nbsp; 暂 停：<strong><?php echo count($s3)?></strong> 到 期： <strong><?php echo count($s4)?></strong> </li>
    </ul>
    <h2>当日统计 <span><a href="?action=stats&timerange=t">昨天报表</a> | <a href="?action=stats&timerange=w">一星期报表</a></span></h2>
    <table width="650" class="wrap tb0">
      <tr>
        <th>&nbsp;</th>
        <th width="15%">浏览量</th>
        <th width="15%">结算数（次）</th>
        <th width="15%">支付（元）</th>
      </tr>
      <?php 
foreach((array)$plantypearr as $p) { 
$t = $statsmodel->getUserData($p['plantype'],'adv');
if($t['n']>0){?>
      <tr id="tbList">
        <td><strong><?php echo ucfirst($p['plantype'])?>类报表</strong>&nbsp;&nbsp;<img src="../templates/<?php echo Z_TPL?>/images/ico_u.gif" width="5" height="9" />&nbsp;&nbsp; <a href="?action=stats">详细报表</a></td>
        <td><?php echo !$t['v'] ? '0': $t['v']?></td>
        <td><?php echo !$t['n'] ? '0': $t['n']?></td>
        <td><?php echo abs($t['yf'])?></td>
      </tr>
      <?php 
} //ednt if
 } //end foreach
 ?>
    </table>
    <h2>最近充值 </h2>
    <table width="650" class="wrap tb0">
      <tr>
        <th>日期</th>
        <th width="200">订单号</th>
        <th width="14%">金额(元)</th>
        <th width="14%">网关</th>
        <th width="14%">状态</th>
      </tr>
       <?php 
	  $paylist = $paymodel->getUserNameOnlinePayListToN(3);
	  foreach((array)$paylist as $p) { ?>
      <tr id="tbList">
        <td><?php echo $p['addtime']?></td>
        <td><?php if($p["orderid"] == '') echo "无";echo $p["orderid"];?></td>
        <td><?php echo abs($p["imoney"]);?></td>
        <td><?php if($p["paytype"] == '') echo "手动"; else  echo $p["paytype"]?></td>
        <td><?php
	  if ($p["status"] == '0') echo '<a href="?action=payment&actiontype=old&orderid='.$p["orderid"].'"><font color=blue>充值没有完成，继续</font></a>'; 	  
	  elseif ($p["status"] == '1') echo '<font color=blue>充值失败</font>';
	  elseif ($p["status"] == '2') echo " <font color=#ff6600>充值完成</font>";
	  elseif ($p["status"] == '3') echo " <font color=blue>增加</font>";
	  elseif ($p["status"] == '4') echo " <font color=red>扣除</font>";
	  ?></td>
      </tr>
      <?php } //end foreach ?>
    </table>
  </div>
  <div class="right">
    <h2>新闻公告</h2>
    <ul>
      <?php 
$news = $newsmodel->getAllnews('6');
foreach((array)$news as $n){?>
      <li class="news"><a href='/?action=shownews&amp;id=<?php echo $n['id'];?>' target='_blank' title="<?php echo $n['tit']?>"><?php echo str($n['tit'],18)?></a> <?php echo date("m-d",strtotime($n['time']));?></li>
      <?php  }  ?>
    </ul>
 
   
  </div>
</div>

<?php include TPL_DIR . "/footer.php";?>
