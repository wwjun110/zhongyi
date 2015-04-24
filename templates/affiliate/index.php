<?php if(!defined('IN_ZYADS')) exit(); 
include TPL_DIR . "/header.php";?>
<div id="pro_menu" class="pro_menu" stylea="height: 11px; display: block;background-color:#FFFFFF;background-position:0 -107px;">
  <div class="shell">
    <ul class="pro">
      <li _class="default"><span>快捷通道:</span></li>
      <li ><a href="?action=createsite">新增网站</a></li>
      <li ><a href="?action=userinfo">修改信息</a></li>
      <li><a href="?action=userinfo&actiontype=pw">修改密码</a></li>
    </ul>
  </div>
</div>
<div class="main">
  <div class="left">
    <h2>账户信息</h2>
    <ul>
      <li><span><?php echo date("m月d日",TIMES)?>收入：</span><strong><?php echo $daymoney?></strong>元 </li>
	   <li><span>昨天收入：</span><strong><?php echo $yemoney?></strong>元 </li>
      <li><span>未结算款：</span><strong><?php echo $u["money"];?></strong>元 </li>
      <li><span>未结算款包括：</span>日结款<strong><?php echo $u["daymoney"];?></strong>元 周结款<strong><?php echo $u["weekmoney"];?></strong>元 月结款<strong><?php echo $u["monthmoney"];?></strong>元 下线款<strong><?php echo $u["xmoney"];?></strong>元 </li>
	    <li><span>可用积分：</span><strong><?php echo $u["integral"];?></strong>分 </li>
	   <?php if ($GLOBALS['C_ZYIIS']['recommend_status']=='1'){?>
	   <li><span>发展下线链接：</span><a href="http://<?php echo $GLOBALS['C_ZYIIS']['authorized_url']?>/v/?a=<?php echo $_SESSION['uid']?>" target="_blank">http://<?php echo $GLOBALS['C_ZYIIS']['authorized_url']?>/v/?a=<?php echo $_SESSION['uid']?></a> （永久性提成<?php echo $GLOBALS['C_ZYIIS']['recommend_tc']?>%）</li>
	    <li><span>总共下线：</span><?php echo $sumrecommend?>个 </li>
	   <?php }?>
    </ul>
    <h2>当日统计 <span><a href="?action=stats&timerange=t">昨天报表</a> | <a href="?action=stats&timerange=w">一星期报表</a></span></h2>
    <table width="650" class="wrap tb0">
      <tr>
        <th>&nbsp;</th>
        <th width="15%">浏览量</th>
        <th width="15%">结算数（次）</th>
        <th width="15%">收入（元）</th>
      </tr>
      <?php 
foreach((array)$plantypearr as $p) { 
$t = $statsmodel->getUserData($p['plantype'],'aff');
if($t['n']>0){?>
      <tr id="tbList">
        <td><strong><?php echo ucfirst($p['plantype'])?>类报表</strong>&nbsp;&nbsp;<img src="../templates/<?php echo Z_TPL?>/images/ico_u.gif" width="5" height="9" />&nbsp;&nbsp; <a href="?action=stats&plantype[]=<?php echo $p['plantype']?>">详细报表</a></td>
        <td><?php echo !$t['v'] ? '0': $t['v']?></td>
        <td><?php echo !$t['n'] ? '0': $t['n']?></td>
        <td><?php echo abs($t['yf'])?></td>
      </tr>
      <?php 
} //ednt if
 } //end foreach
 ?>
 
    </table>
    <h2>最近结算信息</h2>
    <table width="650" class="wrap tb0">
      <tr>
        <th>结算日期</th>
        <th width="14%">结算金额（元）</th>
        <th width="14%">税（元）</th>
        <th width="14%">手续费（元）</th>
        <th width="14%">实际结算（元）</th>
        <th width="14%">状态</th>
      </tr>
      <?php 
	  $paylist = $paymodel->getUserNamePayListToN(3);
	  foreach((array)$paylist as $p) { ?>
      <tr id="tbList">
        <td><?php echo $p['addtime']?></td>
        <td><?php echo abs($p['money']+$p['xmoney'])?></td>
        <td><?php echo $p['tax']?></td>
        <td><?php echo $p['charges']?></td>
        <td><?php echo abs($p['realmoney'])?></td>
        <td><?php if ($p['status'] == '0'){
            $statusY = '<font color="#ff5400">等待支付</font>';
        } elseif ($p['status']=='1'){
            $statusY = '<font color=blue>已支付</font>';
        } 
		echo $statusY;
	  ?></td>
      </tr>
      <?php } //end foreach ?>
    </table>
  </div>
  <div class="right">
    <h2>联盟公告</h2>
    <ul>
      <?php 
$news = $newsmodel->getAllnews('6');
foreach((array)$news as $n){?>
      <li class="news"><a href='<?php echo url("/?action=news&id=".$n['id'])?>' target='_blank' title="<?php echo $n['tit']?>"><?php echo str($n['tit'],18)?></a> <?php echo date("m-d",strtotime($n['time']));?></li>
      <?php  }  ?>
    </ul>
    <br />
    <br />
    <br />
    <h2>个人信息</h2>
    <ul>
      <li>帐号收款人</li>
      <li><em><font color="#666666"><?php echo $u['accountname']?></font></em></li>
      <li>上一次登录时间</li>
      <li><em><font color="#666666"><?php echo $u['logintime']?></font></em></li>
      <li>上一次登录IP</li>
      <li><em><font color="#666666"><?php echo $u['loginip'].' '.convertIp($u['loginip'])?> </font></em></li>
    </ul>
  </div>
</div>
<?php include TPL_DIR . "/footer.php";?>
