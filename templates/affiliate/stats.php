<?php if(!defined('IN_ZYADS')) exit(); 
include_once TPL_DIR . "/header.php";
?>
<script language="JavaScript" src="/javascript/jiandate.js"></script>
<script language="JavaScript" type="text/javascript" src="/javascript/jquery/jquery.js"></script>

<div id="pro_menu" class="pro_menu" style="display: block;">
  <div class="shell">
    <ul class="pro">
      <li  class="default" ><a href="?action=stats">���ݱ���</a></li>
    </ul>
  </div>
</div>
<div class="statslist">
  <h2>���ݱ��� </h2>
  <form id="form1" name="form1" method="post" action="?action=stats">
    <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0" class="f_12px">
      <tr>
        <td width="130" align="right">����վɸѡ��</td>
        <td width="260"><select name="siteid" >
            <option value="">������վ</option>
            <?php foreach((array)$site as $s){ ?>
            <option value="<?php echo $s['siteid']?>" <?php if($s['siteid']==$siteid)echo " selected"?>><?php echo $s['sitename']?></option>
            <?php }?>
          </select></td>
        <td width="160" align="right">�������Ŀɸѡ��</td>
        <td><select name="planid" id="planid" >
            <option value="">���й����Ŀ</option>
            <?php foreach((array)$allplanname as $p) { ?>
            <option value="<?php echo $p['planid'].'_'.$p['plantype']?>" <?php if((int)$_REQUEST['planid']==$p['planid'])echo " selected"?> ><?php echo $p['planname']?> </option>
            <?php } ?>
          </select></td>
      </tr>
      <tr>
        <td align="right"> ʱ��Σ�</td>
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
        <td align="right">���Ʒ�����ɸѡ��</td>
        <td><select name="plantype[]" id="plantype[]" >
          <option value="">���мƷ�����</option>
          <?php foreach((array)$plantypearr as $p) { ?>
          <option value="<?php echo $p['plantype']?>" <?php if($_REQUEST['plantype'][0]==$p['plantype'])echo " selected"?> ><?php echo ucfirst($p['plantype'])?></option>
          <?php } ?>
        </select>
        &nbsp;&nbsp;&nbsp;  <input   value="�� ѯ" type=submit name=submit /></td>
      </tr>
    </table>
  </form>
  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td height="30"  style="text-align:left; font-size:14px; font-weight:bold">
<script language="JavaScript" type="text/javascript">
var t = $("#timerange").find("option:selected").text();  
document.write(t);
</script> <?php echo $plan['planname']?> �ı��� <?php if($actiontype=="data"){?><span class="tsp"  style="padding-left:20px;"><a href="javascript:ref()" >����&raquo;</a></span><?php }?></td>
    </tr>
  </table>
  <?php if($actiontype=='') {?>
  <table width="100%" align="center" class="wrap tb0">
    <tr>
      <th width="75">����</th>
      <th width="260">�����Ŀ</th>
      <th width="80">����</th>
      <th width="120">������</th>
    
      <th width="120">����</th>
      <th>����</th>
    </tr>
    <?php foreach((array)$stats as $s){
   		$plan=$planmodel->AdminGetPlanOne($s['planid']);
   ?>
    <tr >
      <td align="center"><?php echo $s['day']?></td>
      <td align="center"><strong><?php echo $plan['planname']==''? '<del>�ѳ����ļƻ�</del>' : $plan['planname']?></strong></td>
      <td align="center"><?php echo   $plan['plantype']?></td>
      <td align="center"><?php echo $s['num']?></td>
  
      <td align="center">��<?php echo abs($s['sumpay']);?></td>
      <td  align="center"><a href="?action=stats&actiontype=data&planid=<?php echo $s['planid']?>&timerange=<?php echo $s['day'].'/'.$s['day']?>">�鿴</a><a href="#"></a></td>
    </tr>
    <tr >
	 <?php 
	 $sumnum = $sumnum+$s['num'];
	 $sumpay = $sumpay+$s['sumpay'];
	 } //end foreach?>
      <td align="center"><strong>��ҳ�ܼ�</strong></td>
      <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td align="center"><strong><?php echo $sumnum?></strong></td>
      <td align="center"><strong>��<?php echo $sumpay?></strong></td>
      <td  align="center">&nbsp;</td>
    </tr>
   
  </table>
  <?php }  else { //end if($actiontype=='')?>
 
  <table width="100%" align="center" class="wrap tb0">
    <tr>
      <th width="160">Ͷ�Ź��λ</th>
      <th width="120">������վ</th>
      <th width="120">������</th>
      <th>����</th>
    </tr>
    <?php foreach((array)$stats as $s){
   		$zone = $sitemodel->getZoneName($s['zoneid']);
   ?>
    <tr >
      <td align="center"><?php echo $zone['zonename']==''? '<!--<del> </del>-->' : $zone['zonename']?></td>
      <td align="center"><strong><?php echo $zone['sitename']?></strong></td>
      <td align="center"><?php echo $s['num']?></td>
  
      <td align="center">��<?php echo abs($s['sumpay']);?></td>
    </tr>
	 <?php  
	 $sumnum = $sumnum+$s['num'];
	 $sumpay = $sumpay+$s['sumpay'];
	 } //end foreach?>
	 
    <tr >
      <td align="center"><strong>��ҳ�ܼ�</strong></td>
      <td align="center">&nbsp;</td>
      <td align="center"><strong><?php echo $sumnum?></strong></td>
      <td align="center"><strong>��<?php echo $sumpay?></strong></td>
    </tr>
   
  </table>
  
  <?php } //end else?>
  <?php if(!$stats) { ?>
  <table width="100%" align="center" class="wrap tb0">
    <tr class="tbListNull">
      <td ><a href="#">û������</a></td>
    </tr>
  </table>
  <?php }?>
  <?php echo $viewpage?>
</div>
<?php include TPL_DIR . "/footer.php"?>