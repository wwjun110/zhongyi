<?php if(!defined('IN_ZYADS')) exit(); 
include TPL_DIR . "/header.php";  
if ($actiontype == 'create') {
	if ($a['adstypeid'] == 24) {
		$zonename = ucfirst($a['plantype']).','.$at['name'];
	}
	else if ($viewtype==0) {
		$zonename = '����'.','.$at['name'].','.$a['width'].'*'.$a['height'];
	}
	else {
		$zonename = ucfirst($a['plantype']).','.$at['name'].','.$a['width'].'*'.$a['height'];
	}

}else {
	$zonename = $z['zonename'];
}
?>
<script src="/javascript/jquery/jquery.js" language='JavaScript'></script>
<script src="/javascript/jquery/jtip.js" language='JavaScript'></script>
<script src="/javascript/jquery/thickbox.js" language='JavaScript'></script>
<link href="/javascript/jquery/css/thickbox.css" rel="stylesheet" type="text/css" />
<link href="/javascript/jquery/css/question.css" rel="stylesheet" type="text/css" />
<div id="pro_menu" class="pro_menu" style="display: block;">
  <div class="shell">
    <ul class="pro">
      <li class="default"><a href="?action=sitelist">���λ����</a></li>
      <li><a href="?action=zonelist">���λ�б�</a></li>
      <li><a href="?action=createsite">������վ</a></li>
      <li><a href="?action=sitelist">��վ�б�</a></li>
    </ul>
  </div>
</div>
<div class="zonelist">
<?php if($statetype== 'success') {?>
  <div class="tipinfo" id="success">
    <div class="r1"></div>
    <div class="r2"></div>
    <div class="text">���λ�Ѹ��¡�</div>
    <div class="l1"></div>
    <div class="l2"></div>
  </div>
  <?php }  ?>
  <h2>
    <?php  if($actiontype == 'create') echo "����"; if($actiontype == 'edit') echo "�༭";?>���λ
    <?php if($actiontype == 'edit'){?>
    <span class="tsp"  style="padding-left:20px;"><a href="?action=getcode&zoneid=<?php echo $zoneid?>">��ȡ����&raquo;</a></span>
    <?php }?>
  </h2>
  <form action="?action=zone&actiontype=<?php  if($actiontype == 'create') echo "postcreate"; if($actiontype == 'edit') echo "posteditzone";?>" method="post" onsubmit="return post_submit()">
    <input name="width" type="hidden" value="<?php echo $a['width']?>" />
    <input name="height" type="hidden" value="<?php echo $a['height']?>" />
    <input name="plantype" type="hidden" value="<?php echo $a['plantype']?>" />
    <input name="adstypeid" type="hidden" value="<?php echo $a['adstypeid']?>" />
    <input name="siteid" type="hidden" value="<?php echo $siteid?>" />
	<input name="zoneid" type="hidden" value="<?php echo $zoneid?>" />
    <table width="600" border="0" cellpadding="0" cellspacing="3" style="font-size:12px;line-height:20px;">
      <tr>
        <td><strong>������վ��</strong> <?php echo $s['sitename']?>&nbsp;&nbsp;&nbsp;<?php echo "<a href='javascript:void(0)' onclick='tourl(\"http://".$s['siteurl']."\")'>".$s['siteurl']."</a>";?></td>
      </tr>
      <tr>
        <td><strong>���ͣ�</strong><?php echo $at['name'].'('.ucfirst($a['plantype']).')'?></td>
      </tr>
	  <?php if($a['plantype']=='cpm' &&  $at['adstypeid']!=24 ){?>
	   <tr>
        <td><strong>����ѡ�</strong><input name="cpmtimetype" type="radio" id="radiobutton" onclick="$i('cpmtimeview').style.display = 'none'" value="0" <?php if($z['cpmtime']==0) echo ' checked'?>/>
              <label for="radiobutton"> ˢ�µ���</label>
              <input type="radio" name="cpmtimetype" value="1" id="radio" onclick="$i('cpmtimeview').style.display = ''" <?php if($z['cpmtime']>0) echo ' checked'?>/>
              <label for="radio" >ָ��ʱ��</label>
              <span id="cpmtimeview" <?php if($z['cpmtime']==0) echo 'style="display:none"'?>>
              <input name="cpmtime" type="text" class="reg" id="cpmtime" style="width:30px" value="<?php echo $z['cpmtime']>0 ?$z['cpmtime'] : 30?>" size="10" />
            ����
            <input type="radio" name="cpmtimenum" id="radio2" value="0" <?php if($z['cpmtimenum']==0) echo ' checked'?>/>
            �����
            <input type="radio" name="cpmtimenum" id="radio3" value="1" <?php if($z['cpmtimenum']>0) echo ' checked'?>/>
��һ��</span></td>
      </tr>
	  <?php }?>
	  
      <tr>
        <td><strong>�ߴ磺</strong><?php echo $a['adstypeid'] == 24 ? "ȫ��" : $a['width'].'*'.$a['height'];?></td>
      </tr>
      <tr>
        <td><strong>���λ���ƣ� </strong>
          <input name="zonename" id="zonename" type="text" size="30" value="<?php echo $zonename?>" />
        </td>
      </tr>
      <tr>
        <td><strong>���λ������</strong>
          <textarea name="zoneinfo" cols="50" rows="2" id="zoneinfo"><?php echo $z['zoneinfo']?></textarea>
        </td>
      </tr>
      <tr>
        <td><strong>ѡ���棺</strong>
		<?php if ($viewtype!='zn') {?>
          <input type="radio" name="viewtype" value="1"  <?php if($z['viewtype'] == '1' || !$z) echo " checked"?> onclick="$('#viewtypes').show()"/>
          �ֶ�ѡ��
		<?php }?>
          <input type="radio" name="viewtype" value="0" <?php if($z['viewtype'] == '0') echo " checked"?>  onclick="$('#viewtypes').hide()"/>
          ������ʾ <a href="?action=help&amp;width=275&amp;type=createzone&amp;typeval=viewtype0" class="jTip" id="viewtype0s"  name="������ʾ"><img src="/javascript/jquery/images/question.gif" border="0" align="absmiddle" /></a></td>
      </tr>
    </table>
    <div id="viewtypes" style="display:<?php if($z['viewtype'] == '0') echo "none"?>">
    <h2><img src="/templates/<?php echo Z_TPL?>/images/bulb.gif" align="absmiddle" /> ����Ϊ��ƥ�䵽������ͬ���͵Ĺ��<span style="padding-left:20px; color:#369; font-size:12px"> ѡ���������Ͽ����ֲ�Ŷ</span></h2>
    <table width="98%" border="0" cellpadding="0" cellspacing="3" style="font-size:12px;line-height:20px;">
      <tr>
        <td width="80" valign="top"><input name="chkall" type="checkbox" value="" onclick="checkall(this.form, 'adsid')"  />
          <strong>ȫѡ</strong></td>
      </tr>
      <?php foreach((array)$adsall as $a) {?>
      <tr>
        <td   valign="top"><input type="checkbox" name="adsid[]" value="<?php echo $a['adsid']?>" <?php if(in_array($a['adsid'], explode(",",$z["viewadsid"])) || $a['adsid']==$adsid) echo ' checked' ?> class="cadsid">
          #<?php echo $a['adsid']?></td>
        <td><?php 
	if($at['adstypeid'] == 24){
		echo "<a href='?action=planads&planid=".$a['planid']."&siteid=".$siteid."' >".$a['planname']."</a>";
	}else{
		if($a['width']>800)  $a['width'] = 800;
		if($a['height']>500)  $a['height'] = 500;
		if($a['plantype']=='cpm'){
				echo "<a href='?action=planads&planid=".$a['planid']."&siteid=".$siteid."' >".$a['planname']."</a>";
		}
		else {
				$imgext =  substr($a['imageurl'],-3);
				if($imgext){
					$parse_url = parse_url($a['imageurl']);
					if (!$parse_url['scheme']) {
						$a['imageurl'] = $GLOBALS['C_ZYIIS']['imgurl'].$a['imageurl'];
					} 
				}
				if( $a['imageurl'] && substr($a['imageurl'],-3) != 'swf' ){
					echo "<img src=".$a['imageurl']." width=".$a['width']."  height=".$a['height']." border='0' >";
				}else if( $a['imageurl'] && substr($a['imageurl'],-3) == 'swf' ){
					echo "<embed src=".$a['imageurl']." quality='high' pluginspage='http://www.macromedia.com/go/getflashplayer' type='application/x-shockwave-flash' width=".$a['width']."  height=".$a['height']." wmode=transparent></embed>";
				}else echo "<iframe  width=".$a['width']." height=".$a['height']." frameborder=0 src='?action=showads&adsid=".$a['adsid']."' marginwidth='0' marginheight='0' vspace='0' hspace='0' allowtransparency='true' scrolling='no'></iframe>";
			}
		}
		?></td>
      </tr>
      <?php }?>
      <tr>
        <td width="60" valign="top"><input name="chkallde" type="checkbox" value="" onclick="checkall(this.form, 'adsid','chkallde')"  />
          <strong>ȫѡ</strong></td>
      </tr>
   
    </table>

</div>
<br/>
<input type="submit" name="Submit" value="<?php  if($actiontype == 'create') echo "��һ�������ɴ���"; if($actiontype == 'edit') echo "����";?>" <?php  if(!$adsall && $actiontype == 'create') echo "disabled";?>   />
  </form>
</div>
 <div id="sContent" style="display:none;">
  <table width="620" border="0" align="center" cellpadding="0" cellspacing="3">
    <tr>
      <td height="80" align="center"><div class="info">û�к��ʵĹ�������ѡ�Ĺ���Ѷ�����վ����,�޷�������վ����</div></td>
    </tr>
	<tr>
      <td height="20" align="center"><div class="submit-x" style="float:none"><a href="javascript:ref()"><font color="#FFFFFF">����</font></a></div></td>
    </tr>
  </table>
</div>
<script language="JavaScript" type="text/javascript">
function post_submit(){  
var zonename = $i('zonename').value;  
	if(isNULL(zonename)){
        alert("��������λ���ƣ�");
		$i('zonename').focus();
		return false;
  	}
 
	if($('.cadsid[@checked]').val() === null && $('input[@name=viewtype][@checked]').val()>0){
		alert("������Ҫѡ��һ����棡");
		return false;
	} 
 
}
function tb_remove_bak(){
	//location.href = "?action=planlist";
}
<?php if (!$adsall) {?>
setTimeout("tb_show('���λ','#TB_inline?height=140&width=650&inlineId=sContent')",500);
 <?php }?>
</script>
<?php include TPL_DIR . "/footer.php";?>
