<?php if(!defined('IN_ZYADS')) exit(); 
include TPL_DIR . "/header.php";?>
<script src="/javascript/jquery/jquery.js" language='JavaScript'></script>
<script src="/javascript/jquery/thickbox.js" language='JavaScript'></script>
<link href="/javascript/jquery/css/thickbox.css" rel="stylesheet" type="text/css" />
<div id="pro_menu" class="pro_menu" stylea="height: 11px; display: block;background-color:#FFFFFF;background-position:0 -107px;">
  <div class="shell">
    <ul class="pro">
	  <li _class="default"><span>���ͨ��:</span></li>
	  <li ><a href="?action=createplan">�����ƻ�</a></li>
	  <li ><a href="?action=createads">�������</a></li>
	   <li><a href="?action=audit">�������</a></li>
    </ul>
  </div>
</div>
<div class="main">
  <div class="left">
    <h2>�˻���Ϣ</h2>
    <ul>
      <li><span><?php echo date("m��d��",TIMES)?>֧����</span><strong><?php echo $daymoney?></strong>Ԫ </li>
	  <li><span>����֧����</span><strong><?php echo $yemoney?></strong>Ԫ </li>
      <li><span>�˻���</span><strong><?php echo round($u["money"],2);?></strong>Ԫ    &nbsp;&nbsp; <img  src='/templates/<?php echo Z_TPL?>/images/add.gif' align='absmiddle' /> <a href="?action=consumelist&actiontype=charge&TB_iframe=true&height=220&width=600"  title="��ѡ���ֵ����"   class="thickbox">���ϳ�ֵ&raquo;</a> </li>
      <li><span>�ƻ�״̬��</span> Ͷ �ţ�<strong><?php echo count($s1)?></strong>  ͣ ֹ��<strong><?php echo count($s2)?></strong>&nbsp; �� ͣ��<strong><?php echo count($s3)?></strong> �� �ڣ� <strong><?php echo count($s4)?></strong> </li>
    </ul>
    <h2>����ͳ�� <span><a href="?action=stats&timerange=t">���챨��</a> | <a href="?action=stats&timerange=w">һ���ڱ���</a></span></h2>
    <table width="650" class="wrap tb0">
      <tr>
        <th>&nbsp;</th>
        <th width="15%">�����</th>
        <th width="15%">���������Σ�</th>
        <th width="15%">֧����Ԫ��</th>
      </tr>
      <?php 
foreach((array)$plantypearr as $p) { 
$t = $statsmodel->getUserData($p['plantype'],'adv');
if($t['n']>0){?>
      <tr id="tbList">
        <td><strong><?php echo ucfirst($p['plantype'])?>�౨��</strong>&nbsp;&nbsp;<img src="../templates/<?php echo Z_TPL?>/images/ico_u.gif" width="5" height="9" />&nbsp;&nbsp; <a href="?action=stats">��ϸ����</a></td>
        <td><?php echo !$t['v'] ? '0': $t['v']?></td>
        <td><?php echo !$t['n'] ? '0': $t['n']?></td>
        <td><?php echo abs($t['yf'])?></td>
      </tr>
      <?php 
} //ednt if
 } //end foreach
 ?>
    </table>
    <h2>�����ֵ </h2>
    <table width="650" class="wrap tb0">
      <tr>
        <th>����</th>
        <th width="200">������</th>
        <th width="14%">���(Ԫ)</th>
        <th width="14%">����</th>
        <th width="14%">״̬</th>
      </tr>
       <?php 
	  $paylist = $paymodel->getUserNameOnlinePayListToN(3);
	  foreach((array)$paylist as $p) { ?>
      <tr id="tbList">
        <td><?php echo $p['addtime']?></td>
        <td><?php if($p["orderid"] == '') echo "��";echo $p["orderid"];?></td>
        <td><?php echo abs($p["imoney"]);?></td>
        <td><?php if($p["paytype"] == '') echo "�ֶ�"; else  echo $p["paytype"]?></td>
        <td><?php
	  if ($p["status"] == '0') echo '<a href="?action=payment&actiontype=old&orderid='.$p["orderid"].'"><font color=blue>��ֵû����ɣ�����</font></a>'; 	  
	  elseif ($p["status"] == '1') echo '<font color=blue>��ֵʧ��</font>';
	  elseif ($p["status"] == '2') echo " <font color=#ff6600>��ֵ���</font>";
	  elseif ($p["status"] == '3') echo " <font color=blue>����</font>";
	  elseif ($p["status"] == '4') echo " <font color=red>�۳�</font>";
	  ?></td>
      </tr>
      <?php } //end foreach ?>
    </table>
  </div>
  <div class="right">
    <h2>���Ź���</h2>
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
