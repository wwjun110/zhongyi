<?php if(!defined('IN_ZYADS')) exit(); 
include_once TPL_DIR . "/header.php";
?>
<script LANGUAGE="JavaScript" src="/javascript/jiandate.js"></script>
<script language="JavaScript" type="text/javascript" src="/javascript/jquery/jquery.js"></script>
<div id="pro_menu" class="pro_menu" style="display: block;">
  <div class="shell">
    <ul class="pro">
      <li <?php if($status == '') echo 'class="default"'?>><a href="?action=order">���ж���</a></li>
      <li <?php if($status == '1') echo 'class="default"'?>><a href="?action=order&status=1">��ȷ�϶���</a></li>
	  <li <?php if($status == '0') echo 'class="default"'?>><a href="?action=order&status=0">�ȴ�ȷ�϶���</a></li>
	  <li <?php if($status == '2') echo 'class="default"'?>><a href="?action=order&status=2">��Ч����</a></li>
    </ul>
  </div>
</div>
<div class="statslist">
  <h2>�������� </h2>
  <form id="orderform" name="orderform" method="post" action="?action=order">
 
    <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0" class="f_12px">
      <tr>
        <td width="130" align="right">�������Ŀɸѡ��</td>
        <td width="260"><select name="planid" id="planid" >
          <option value="">���й����Ŀ</option>
          <?php foreach((array)$allplanname as $p) { ?>
          <option value="<?php echo $p['planid'].'_'.$p['plantype']?>" <?php if((int)$_REQUEST['planid']==$p['planid'])echo " selected"?> ><?php echo $p['planname']?> </option>
          <?php } ?>
        </select></td>
        <td width="160" align="right">״̬��</td>
        <td><select name="status" id="status">
          <option value="">���ж���</option>
          <option value="1" <?php if($status=='1')echo " selected"?>>��ȷ�϶���</option>
          <option value="0" <?php if($status=='0')echo " selected"?>>�ȴ�ȷ�϶���</option>
          <option value="2" <?php if($status=='2')echo " selected"?>>��Ч����</option>
        </select></td>
      </tr>
      <tr>
        <td align="right"> �µ�ʱ�䣺</td>
        <td><select name="timerange" id="timerange" style="width:220px">
            <option value="<?php if($time_begin == '') echo DAYS ;else echo $time_begin; echo ' / ';if($time_end == '') echo DAYS ;else echo $time_end;?>">
            <?php if($time_begin == '') echo DAYS ;else echo $time_begin; echo ' �� ';if($time_end == '') echo DAYS ;else echo $time_end;?>
            </option>
            <option  value="a" <?php echo ($timerange == 'a' ? 'selected ' : '')?>>����ʱ���</option>
            <option value="t" <?php echo ($timerange == 't' ? ' selected' : '')?> >����</option>
            <option value="w" <?php echo ($timerange == 'w' ? ' selected' : '')?> >��ȥһ����</option>
            <option value="m" <?php echo ($timerange == 'm' ? ' selected' : '')?>>������</option>
            <option value="l" <?php echo ($timerange == 'l' ? ' selected' : '')?>>���µ�</option>
          </select>
          <img src="/javascript/images/calendar.gif" align="absmiddle" id="abd" onclick="d.a('timerange','timerange','2')"/></td>
        <td align="right">&nbsp;</td>
        <td><input name="submit" type="submit"   value="�� ѯ" /></td>
      </tr>
    </table>
  </form>
  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td height="30"  style="text-align:left; font-size:14px; font-weight:bold">
<script language="JavaScript" type="text/javascript">
var t = $("#timerange").find("option:selected").text();  
var s = $("#status").find("option:selected").text();  
document.write(t+" "+s);
</script> </td>
    </tr>
  </table>
 
  <table width="100%" align="center" class="wrap tb0">
    <tr>
      <th width="200">����</th>
      <th width="160">�����Ŀ</th>
      <th width="100">�µ�����</th>
      <th width="100">ȷ������</th>
      <th width="80">����</th>
      <th width="120">����</th>
      <th>״̬</th>
    </tr>
    <?php foreach((array)$order as $o){
   		$plan=$planmodel->AdminGetPlanOne($o['planid']);
   ?>
    <tr >
      <td width="200" align="center"><?php echo $o['orders']?></td>
      <td width="160" align="center"><strong><?php echo $plan['planname']==''? '<del>�ѳ����ļƻ�</del>' : $plan['planname']?></strong></td>
      <td align="center"><?php echo $o['day']?></td>
      <td align="center"><?php echo $o['confirmtime']?></td>
      <td align="center"><?php echo   $plan['plantype']?></td>
      <td align="center">��<?php echo abs($o['price']);?></td>
      <td  align="center"><?php
	   if($o['status'] == '1') echo '<font color="ff0000">��ȷ��</font>';
	   elseif($o['status'] == '0') echo '<font color="blue">�ȴ�ȷ��</font>';
		elseif($o['status'] == '2') echo '<font color="blue">��Ч</font>';
	  
	   ?>      </td>
    </tr>
    <?php } //end foreach?>
  </table>
  <?php echo $viewpage;?>
  
  <?php if(!$order) { ?>
  <table width="100%" align="center" class="wrap tb0">
    <tr class="tbListNull">
      <td ><a href="#">û������</a></td>
    </tr>
  </table>
  <?php }?>
</div>
 <?php include TPL_DIR . "/footer.php"?>