<?php if(!defined('IN_ZYADS')) exit(); 
include TPL_DIR . "/header.php";?>
<div id="pro_menu" class="pro_menu" stylea="height: 11px; display: block;background-color:#FFFFFF;background-position:0 -107px;">
  <div class="shell">
    <ul class="pro">
      <li _class="default"><span>���ͨ��:</span></li>
      <li ><a href="?action=createsite">������վ</a></li>
      <li ><a href="?action=userinfo">�޸���Ϣ</a></li>
      <li><a href="?action=userinfo&actiontype=pw">�޸�����</a></li>
    </ul>
  </div>
</div>
<div class="main">
  <div class="left">
    <h2>�˻���Ϣ</h2>
    <ul>
      <li><span><?php echo date("m��d��",TIMES)?>���룺</span><strong><?php echo $daymoney?></strong>Ԫ </li>
	   <li><span>�������룺</span><strong><?php echo $yemoney?></strong>Ԫ </li>
      <li><span>δ����</span><strong><?php echo $u["money"];?></strong>Ԫ </li>
      <li><span>δ����������</span>�ս��<strong><?php echo $u["daymoney"];?></strong>Ԫ �ܽ��<strong><?php echo $u["weekmoney"];?></strong>Ԫ �½��<strong><?php echo $u["monthmoney"];?></strong>Ԫ ���߿�<strong><?php echo $u["xmoney"];?></strong>Ԫ </li>
	    <li><span>���û��֣�</span><strong><?php echo $u["integral"];?></strong>�� </li>
	   <?php if ($GLOBALS['C_ZYIIS']['recommend_status']=='1'){?>
	   <li><span>��չ�������ӣ�</span><a href="http://<?php echo $GLOBALS['C_ZYIIS']['authorized_url']?>/v/?a=<?php echo $_SESSION['uid']?>" target="_blank">http://<?php echo $GLOBALS['C_ZYIIS']['authorized_url']?>/v/?a=<?php echo $_SESSION['uid']?></a> �����������<?php echo $GLOBALS['C_ZYIIS']['recommend_tc']?>%��</li>
	    <li><span>�ܹ����ߣ�</span><?php echo $sumrecommend?>�� </li>
	   <?php }?>
    </ul>
    <h2>����ͳ�� <span><a href="?action=stats&timerange=t">���챨��</a> | <a href="?action=stats&timerange=w">һ���ڱ���</a></span></h2>
    <table width="650" class="wrap tb0">
      <tr>
        <th>&nbsp;</th>
        <th width="15%">�����</th>
        <th width="15%">���������Σ�</th>
        <th width="15%">���루Ԫ��</th>
      </tr>
      <?php 
foreach((array)$plantypearr as $p) { 
$t = $statsmodel->getUserData($p['plantype'],'aff');
if($t['n']>0){?>
      <tr id="tbList">
        <td><strong><?php echo ucfirst($p['plantype'])?>�౨��</strong>&nbsp;&nbsp;<img src="../templates/<?php echo Z_TPL?>/images/ico_u.gif" width="5" height="9" />&nbsp;&nbsp; <a href="?action=stats&plantype[]=<?php echo $p['plantype']?>">��ϸ����</a></td>
        <td><?php echo !$t['v'] ? '0': $t['v']?></td>
        <td><?php echo !$t['n'] ? '0': $t['n']?></td>
        <td><?php echo abs($t['yf'])?></td>
      </tr>
      <?php 
} //ednt if
 } //end foreach
 ?>
 
    </table>
    <h2>���������Ϣ</h2>
    <table width="650" class="wrap tb0">
      <tr>
        <th>��������</th>
        <th width="14%">�����Ԫ��</th>
        <th width="14%">˰��Ԫ��</th>
        <th width="14%">�����ѣ�Ԫ��</th>
        <th width="14%">ʵ�ʽ��㣨Ԫ��</th>
        <th width="14%">״̬</th>
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
            $statusY = '<font color="#ff5400">�ȴ�֧��</font>';
        } elseif ($p['status']=='1'){
            $statusY = '<font color=blue>��֧��</font>';
        } 
		echo $statusY;
	  ?></td>
      </tr>
      <?php } //end foreach ?>
    </table>
  </div>
  <div class="right">
    <h2>���˹���</h2>
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
    <h2>������Ϣ</h2>
    <ul>
      <li>�ʺ��տ���</li>
      <li><em><font color="#666666"><?php echo $u['accountname']?></font></em></li>
      <li>��һ�ε�¼ʱ��</li>
      <li><em><font color="#666666"><?php echo $u['logintime']?></font></em></li>
      <li>��һ�ε�¼IP</li>
      <li><em><font color="#666666"><?php echo $u['loginip'].' '.convertIp($u['loginip'])?> </font></em></li>
    </ul>
  </div>
</div>
<?php include TPL_DIR . "/footer.php";?>
