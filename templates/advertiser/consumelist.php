<?php if(!defined('IN_ZYADS')) exit(); 
include TPL_DIR . "/header.php";?>
<script src="/javascript/jquery/jquery.js" language='JavaScript'></script>
<script src="/javascript/jquery/thickbox.js" language='JavaScript'></script>
<link href="/javascript/jquery/css/thickbox.css" rel="stylesheet" type="text/css" />
<div id="pro_menu" class="pro_menu" stylea="height: 11px; display: block;background-color:#FFFFFF;background-position:0 -107px;">
  <div class="shell">
    <ul class="pro">
	  <li class="default"><a href="?action=consumelist">���߳�ֵ</a></li>
    </ul>
  </div>
</div>

<div class="pages">
<?php if($statetype== 'success') {?>
	<div class="tipinfo" id="success">
	<div class="r1"></div>
	<div class="r2"></div>
	<div class="text">����Ѹ��¡�</div>
	<div class="l1"></div>
	<div class="l2"></div>
</div>
<?php }  ?>
<h2>������<span>(<font color="ff6600"><strong>��<?php echo $u['money']?>Ԫ</strong></font>)</span> <span class="tsp"  style="padding-left:20px;"><img  src='/templates/<?php echo Z_TPL?>/images/add.gif' align='absmiddle' /> <a href="?action=consumelist&actiontype=charge&TB_iframe=true&height=220&width=600"  title="��ѡ���ֵ����"   class="thickbox">���ϳ�ֵ&raquo;</a></span></h2>



<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="wrap tb0" style="margin-top:30px">
  <tr>
    <th width="150">����</th>
    <th width="200">������</th>
    <th width="60">���(Ԫ)</th>
    <th width="130">˵��</th>
    <th width="60">����</th>
    <th>״̬</th>
    </tr>
  <?php
  	foreach((array)$pay as $p){
   ?>
  <tr id="tbList">
    <td align="center"><?php echo $p["addtime"];?></td>
    <td><?php if($p["orderid"] == '') echo "��";echo $p["orderid"];?></td>
    <td align="center"><?php echo abs($p["imoney"]);?></td>
    <td align="center"><?php if($p["payinfo"] == '') echo "��";echo $p["payinfo"]?></td>
    <td align="center"><?php if($p["paytype"] == '') echo "�ֶ�"; else  echo $p["paytype"]?></td>
    <td align="center"><?php
	  if ($p["status"] == '0') echo '<a href="?action=payment&actiontype=old&orderid='.$p["orderid"].'"><font color=blue>��ֵû����ɣ�����</font></a>'; 	  
	  elseif ($p["status"] == '1') echo '<font color=blue>��ֵʧ��</font>';
	  elseif ($p["status"] == '2') echo " <font color=#ff6600>��ֵ���</font>";
	  elseif ($p["status"] == '3') echo " <font color=blue>����</font>";
	  elseif ($p["status"] == '4') echo " <font color=red>�۳�</font>";
	  ?></td>
    </tr>
  <?php } //end foreach
if(!$pay) { ?>
  <tr class="tbListNull">
    <td colspan="6"><a href="?action=consumelist&actiontype=charge">û�г�ֵ��¼�����ϳ�ֵ</a></td>
    </tr>
  <?php } //ednt if?>
</table>

<?php echo $viewpage?>
</div>
<?php include TPL_DIR . "/footer.php"?>