<?php if(!defined('IN_ZYADS')) exit(); 
include TPL_DIR . "/header.php";?>
<script src="/javascript/jquery/jquery.js" language='JavaScript'></script>
<script src="/javascript/jquery/thickbox.js" language='JavaScript'></script>
<link href="/javascript/jquery/css/thickbox.css" rel="stylesheet" type="text/css" />
<div id="pro_menu" class="pro_menu" style="display: block;">
  <div class="shell">
    <ul class="pro">
      <li <?php if($plantype == '' && !isset($status)) echo 'class="default"'?>><a href="?action=planlist">��Ŀ�б�</a></li>
      <li ><a href="?action=adslist">���ܹ��</a></li>
      <li <?php if($status == '2') echo 'class="default"'?>><a href="?action=planlist&actiontype=audit&status=2">����ͨ��</a></li>
      <li <?php if($status == '0') echo 'class="default"'?>><a href="?action=planlist&actiontype=audit&status=0">�ȴ�ͨ��</a></li>
      <li <?php if($status == '1') echo 'class="default"'?>><a href="?action=planlist&actiontype=audit&status=1">�ѱ��ܾ�</a></li>
    </ul>
  </div>
</div>
<div class="planlist">
  <div id="wrapper">
    <div id="content">
      <h3 class="tab <?php if($actiontype=='ads') echo "tab1"?>" title="first">
        <div class="tabtxt"><a href="?action=planlist">��Ŀ���</a></div>
      </h3>
      <div class="tab <?php if($actiontype!='ads') echo "tab1"?>" >
        <h3 class="tabtxt" title="second"><a href="?action=adslist">���ܹ��</a></h3>
      </div>
	  
	  <?php if($ztadsnum) {?>
	<h3 class="tab tab1" >
      <div class="tabtxt"><a href="?action=createzt">������</a></div>
    </h3>
	<?php }?>
	  
      <div class="boxholder">
        <div class="box">
          <p> <img src="/templates/<?php echo Z_TPL?>/images/bulb.gif" align="absmiddle" /> ������ѡ��Ĺ�����ͣ�ϵͳ�Զ���ʾ��档���ܴ���Ϊ�ֲ���ʽ�����Ի�ȡ�ĸ���Ĺ��ѡ�</p>
          <form id="form1" name="form1" method="post" action="?action=planlist">
		   <input name="siteid" type="hidden" value="<?php echo $siteid?>" />
		   <input name="kv" type="hidden" value="<?php echo $kv?>" />
            <table width="99%" border="0" align="center" style="margin-top:10px">
              <tr>
                <td height="30" align="center">Ͷ����վ��</td>
                <td><select name="select" onchange="location.href = this.options[selectedIndex].value">
                    <?php foreach((array)$site as $key=>$s ) {
 echo "<option value = '?action=planlist&siteid=". $s['siteid']."&kv=".$key."&plantype=".$plantype."&audit=".$audit."'";
 if($s['siteid']==$siteid) echo "selected";
 echo ">".$s['sitename']."</option>";
}
?>
                  </select>
                  ��ַ:<a href="http://<?php echo $site[$kv]['siteurl']?>" target="_blank"><?php echo $site[$kv]['siteurl']?></a> <img src="/templates/<?php echo Z_TPL?>/images/s<?php echo (int)$site[$kv]['grade']?>.jpg" alt="" border="0" title="<?php echo $site[$kv]['grade']?>��" /><span style=" margin-left:20px;"> <a href="?action=createsite">������վ</a> </span></td>
              </tr>
              <tr>
                <td width="90" height="30" align="center">��Ŀ���ͣ�</td>
                <td><?php 
			 foreach((array)$plantypearr as $pt) {
             $n = $adsmodel->getPlanTypeAds($pt['plantype'],$siteid);
			 if($n){?>
                  <input name="plantype[]" type="checkbox" id="plantype" value="<?php echo $pt['plantype']?>" <?php if(in_array($pt['plantype'],(array)$plantypear)) echo 'checked';?>/>
                  <?php echo ucfirst($pt['plantype'])?>
                  <?php }} ?></td>
              </tr>
              <tr>
                <td height="30" align="center">��Ŀ��ˣ�</td>
                <td><input name="audit" type="radio" value="all" <?php if($audit == 'all' || !$audit ) echo 'checked';?>/>
                  ȫ��
                  <input name="audit" type="radio" value="n" <?php if($audit == 'n') echo 'checked';?>/>
                  ����Ҫ����
                  <input name="audit" type="radio" value="y" <?php if($audit == 'y') echo 'checked';?>/>
                  ��Ҫ���� <span style=" margin-left:30px;"></td>
              </tr>
              <tr>
                <td height="30" align="center">&nbsp;</td>
                <td><input name="Input" type="submit"   value=" ɸ ѡ "/></td>
              </tr>
            </table>
          </form>
          <p style="margin-top:20px;  "><img src="/templates/<?php echo Z_TPL?>/images/ico5.jpg" align="absmiddle" />&nbsp;&nbsp;<strong>��Ŀ����б�</strong></p>
          <?php 
		
   			foreach ((array)$plan as $p) {
			$isok = false;
  			$at = $adstypemodel->getPlanTypeName($p['plantype']);
			$planaclcomparison = $planmodel->getPlanWebTypeAclComparison($p['planid']);
			$siteacl = explode(',',$planaclcomparison['data']);
			if($planaclcomparison['comparison'] == '=='){
				if(in_array($siteinfo['sitetype'],$siteacl)) $isok = true;
				 
			}else{
				if(!in_array($siteinfo['sitetype'],$siteacl)) $isok = true;
			}
			
  		 ?>
          <table width="780" height="94" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td width="647" height="19">&nbsp;</td>
            </tr>
            <tr>
              <td height="75" style="background:transparent url(/templates/<?php echo Z_TPL?>/images/bg_760x75.gif) no-repeat"><?php if($p['top']) echo '<font color="#FF0000">��</font>'?>
                <table width="777" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="150" rowspan="2" align="center" ><img src="<?php if($p['logo']) echo $p['logo'];else echo '/templates/'.Z_TPL.'/images/no.gif'?>"  ></img></td>
                    <td height="26"><span class="font02"><strong><a href="?action=planads&planid=<?php echo $p['planid']?>&siteid=<?php echo $siteid?>" class="text1" title="������"><?php echo $p['planname']?></a></strong></span></td>
                    <td width="120" align="center"><span class="font02"><strong><font color="#07679C"><?php echo  $at['name'];if($p['plantype']!='cps') echo '(Ԫ)';else echo '(%)' ?></font></strong></span></td>
                    <td width="102" align="center"><strong><font color="#07679C">��������</font></strong></td>
                    <td width="102" rowspan="2" align="center"><div class="b0">
            <?php
			if($p['status'] == 3)  echo"<font color='#ff0000'>����</font>";
			else if(!$isok) echo"<font color='#FF830A'>��վ���Ͳ�ƥ��</font>";
			else if ($p['audit'] == 'y'){
				if($p['stopaudit']==2)echo"<font color='#FF830A'>��ͣ����</font>";
				else {
				$audit = $auditmodel->ckPlanIdAudit($p['planid'],$siteid);
			    if($audit == 're') echo"<font color='#FF830A'>������</font>";
				else if($audit == 'deny') echo"<font color='#ff0000'>�ܾ�����</font>";
				else if($audit == 'ok') echo"<a href='?action=planads&planid=".$p['planid']."&siteid=".$siteid."'><strong>��ȡ����</strong></a>";
				else echo"<span id='e_".$p['planid']."'><a href='javascript:void(0)' onclick='doAudit(".$p['planid'].",".$siteid.")'><strong>������</strong></a></span>";
				}
			}else {
				echo"<a href='index.php?action=planads&planid=".$p['planid']."&siteid=".$siteid."'><strong>��ȡ����</strong></a>";
			}			
			 ?>
                      </div></td>
                  </tr>
                  <tr>
                    <td height="30" valign="top"><?php echo $p['planinfo']!=''?str($p['planinfo'],90) : '';?></td>
                    <td width="120" align="center" valign="top"><font color="#FF7E00">
                      <?php 
					  	if($p['gradeprice']==1) {
							if($site[$kv]['grade']=='') $site[$kv]['grade'] = 0;
							$sprice =  's'.$site[$kv]['grade']."price";
							$price = $p[$sprice];
						}else {
							$price = $p['price'];
						}
						if($p['plantype'] == 'cps') echo abs($price).'%';
						else  echo abs($price);
						?>
                      </font></td>
                    <td align="center" valign="top"><font color="#FF7E00">
                      <?php 
						if($p['clearing'] == 'day') echo '�ս�';
						else if($p['clearing'] == 'week') echo '�ܽ�';
						else if($p['clearing'] == 'month') echo '�½�';
						?>
                      </font></td>
                  </tr>
                </table></td>
            </tr>
          </table>
          <?php }?>
          <table width="780" border="0" align="center" cellpadding="0" cellspacing="0" style="MARGIN-top: 20px;">
            <tr>
              <td height="30"><?php echo $viewpage?></td>
            </tr>
            <tr>
              <td height="30">&nbsp;</td>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<div id="aContent" style="display:none;">
  <table width="270" border="0" align="center" cellpadding="0" cellspacing="3">
    <tr>
      <td height="80" align="center"><div class="info">����ɹ�����ȴ����ͨ��</div></td>
    </tr>
  </table>
</div>
<div id="sContent" style="display:none;">
  <table width="450" border="0" align="center" cellpadding="0" cellspacing="3">
    <tr>
      <td height="80" align="center"><div class="info">������վû�����ͨ��������û�����һ����վ</div></td>
    </tr>
    <tr>
      <td height="30" align="center"><div class="submit-x" style="float:none"><a href="?action=createsite"><font color="#FFFFFF">�����վ</font></a></div></td>
    </tr>
  </table>
</div>
<script language="JavaScript" type="text/javascript">
function doAudit(pid,sid){
	if(!sid){ 
		alert("��վδѡ��");
		return false;
	}
	$.get("?action=postaudit&actiontype=audit&planid="+pid+"&siteid="+sid+"");
	$i("e_"+pid).innerHTML = "<font color='#FF830A'>������</font>";
	setTimeout("tb_show('����ɹ�','#TB_inline?height=100&width=300&inlineId=aContent')",500);
}
function doCreateSite(){
	t = setTimeout("tb_show('�޷���ȡ����','#TB_inline?height=150&width=500&inlineId=sContent')",1000);
}
 
<?php if(!$siteid){?>
	setTimeout("tb_show('�޷���ȡ����','#TB_inline?height=150&width=500&inlineId=sContent')",500);
<?php }?>
</script>
<?php include TPL_DIR . "/footer.php";?>
