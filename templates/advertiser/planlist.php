<?php if(!defined('IN_ZYADS')) exit(); 
include TPL_DIR . "/header.php";?>
<div id="pro_menu" class="pro_menu" stylea="height: 11px; display: block;background-color:#FFFFFF;background-position:0 -107px;">
  <div class="shell">
    <ul class="pro">
	  <li class="default"><a href="#">�ƻ��б�</a></li>
 
    </ul>
  </div>
</div>

<div class="pages">
<?php if($statetype== 'success') {?>
	<div class="tipinfo" id="success">
	<div class="r1"></div>
	<div class="r2"></div>
	<div class="text">�ƻ��Ѹ��¡�</div>
	<div class="l1"></div>
	<div class="l2"></div>
</div>
<?php }  ?>
<h2>�ƻ����� <span class="tsp"  style="padding-left:20px;"><img  src='/templates/<?php echo Z_TPL?>/images/add.gif' align='absmiddle' /> <a href="?action=createplan">�½��ƻ�&raquo;</a></span></h2>

<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="wrap tb0" style="margin-top:30px">
  <tr>
    <th width="60">�ƻ�ID</th>
    <th width="130">�ƻ�����</th>
    <th width="60">����</th>
    <th width="60">����</th>
    <th width="60">�޶�</th>
    <th width="70">����</th>
    <th width="60">����</th>
    <th width="70">��Ա����</th>
    <th width="70">��Ҫ���</th>
    <th>�������</th>
    <th>����</th>
    <th width="60">״̬</th>
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
			if ($p['clearing'] == 'day') echo '�ս�';
			if ($p['clearing'] == 'week') echo '�ܽ�';
			if ($p['clearing'] == 'month') echo '�½�';
		  ?></td>
    <td align="center"><?php if($p['checkplan']!='true') echo '��';else echo "��";?></td>
    <td align="center"><?php if ($p['restrictions']!='1') echo '������';else echo "������";?></td>
    <td align="center"><?php if ($p['audit']=='n')echo '����Ҫ';else echo "��Ҫ";?></td>
    <td><?php echo $adsnum?> <a href="?action=createads&planid=<?php echo $p['planid']?>&plantype=<?php echo $p['plantype']?>">�½�</a></td>
    <td><a href="?action=editplan&planid=<?php echo $p['planid']?>">�༭</a></td>
    <td><?php  if($p['status'] == '0') {?>
      <font color="red">����</font>
      <?php }?>
      <?php  if($p['status'] == '1') {?>
      <font color="green">Ͷ����</font>
      <?php }?>
      <?php if($p['status'] == '2') {?>
      <font color="red">ֹͣ��</font>
      <?php }?>
      <?php if($p['status'] == '3') {?>
      <font color="red">��ͣ��(�޶�)</font>
      <?php }?>
      <?php if($p['status'] == '4') {?>
      <font color="red">ֹͣ(���ڻ�������)</font>
      <?php }?></td>
  </tr>
  <?php } //end foreach
if(!$plan) { ?>
  <tr class="tbListNull">
    <td colspan="13"><a href="?action=createplan">û�мƻ���Ŀ���½�һ��</a></td>
  </tr>
  <?php } //ednt if?>
</table>
</div>
<?php include TPL_DIR . "/footer.php"?>