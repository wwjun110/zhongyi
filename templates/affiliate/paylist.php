<?php if(!defined('IN_ZYADS')) exit(); 
include TPL_DIR . "/header.php";?>

<div id="pro_menu" class="pro_menu" style="display: block;">
  <div class="shell">
    <ul class="pro">
      <li class="<?php if($type=='') echo "default"?>" ><a href="?action=paylist">֧����Ϣ</a></li>
	    <li class="<?php if($type=='add') echo "default"?>" ><a href="?action=paylist&type=add">�����¼</a></li>
    </ul>
  </div>
</div>
<?php if($type==''){?>

<div class="paylist">
    <h2> ֧����Ϣ <span class="tsp"  style="padding-left:20px;">֧����׼Ϊ <?php echo $GLOBALS['C_ZYIIS']['min_clearing']?>Ԫ�𸶣�֧������Ϊ<?php $ec=explode(',',$GLOBALS['C_ZYIIS']['clearing_cycle']);foreach($ec as $c){if($c=='day')echo '�ս� ';if($c=='week')echo '�ܽᣨÿ��'.$GLOBALS['C_ZYIIS']['clearing_weekdata'].'�� ';if($c=='month')echo '�½ᣨÿ��'.$GLOBALS['C_ZYIIS']['clearing_monthdata'].'�ţ�';}?>��������ʻ���������δ�ۼ��� <?php echo $GLOBALS['C_ZYIIS']['min_clearing']?>Ԫ��ϵͳ���Զ��ۼ��´ν��㡣</span></h2>
	
 <table width="100%" align="center" class="wrap tb0">
  <tr>
    <th width="90">��������</th>
    <th width="90">֧������</th>
    <th width="80">�����</th>
    <th width="80">���߽��</th>
    <th width="60">˰</th>
    <th width="60">������</th>
    <th width="80">Ӧ��</th>
    <th width="60">ʵ������</th>
    <th width="80">ʵ�����</th>
    <th width="100">��ע</th>
    <th>״̬</th>
  </tr>
<?php foreach((array)$pay as $p){?>  
  <tr>
    <td><?php echo $p['addtime']?></td>
    <td><?php echo substr($p['paytime'],0,10)?></td>
    <td>��<?php echo abs($p['money'])?></td>
    <td>��<?php echo abs($p['xmoney'])?></td>
    <td>��<?php echo $p['tax']?></td>
    <td>��<?php echo $p['charges']?></td>
    <td>��<?php echo abs($p['pay'])?></td>
    <td><?php echo abs($p['scale']).'%';?></td>
    <td>��<? echo abs($p['realmoney']);?></td>
    <td width="100"><?php echo $p['payinfo']?> </td>
    <td><?php
	  if ($p['status'] == '0')
        {
            $statusY = '<font color=red>δ֧��</font>';
        } 
        if ($p['status']=='1')
        {
            $statusY = '<font color=blue>��֧��</font>';
        } 
		echo $statusY;
	  ?></td>
  </tr>
 <?php } //end foreach
if(!$pay) { ?>
   <tr class="tbListNull">
     <td colspan="11"><a href="#">û��֧����Ϣ</a></td>
   </tr>
   <?php } //ednt if?>
</table>
 <?php echo $viewpage?>
</div>
<?php } else {?>


<div class="paylist">
    <h2> �����¼ </h2>
	
 <table width="100%" align="center" class="wrap tb0">
  <tr>
    <th width="210">��������</th>
    <th width="120">������</th>
    <th>˵��</th>
    </tr>
<?php foreach((array)$pay as $p){?>  
  <tr>
    <td><?php echo $p['orderid'] ? $p['orderid'] : $p['addtime']?></td>
    <td>��<?php echo abs($p['imoney'])?></td>
    <td> <?php echo  $p['payinfo'] ?></td>
    </tr>
 <?php } //end foreach
if(!$pay) { ?>
   <tr class="tbListNull">
     <td colspan="3"><a href="#">û�в�����Ϣ</a></td>
    </tr>
   <?php } //ednt if?>
</table>
 <?php echo $viewpage?>
</div>

<?php }  ?>
<?php include TPL_DIR . "/footer.php"?>