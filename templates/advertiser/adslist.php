<?php if(!defined('IN_ZYADS')) exit(); 
include TPL_DIR . "/header.php";?>
<div id="pro_menu" class="pro_menu" stylea="height: 11px; display: block;background-color:#FFFFFF;background-position:0 -107px;">
  <div class="shell">
    <ul class="pro">
	  <li class="default"><a href="?action=adslist">����б�</a></li>
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
<h2>������ <span class="tsp"  style="padding-left:20px;"><img  src='/templates/<?php echo Z_TPL?>/images/add.gif' align='absmiddle' /> <a href="?action=createads">�½����&raquo;</a></span></h2>

<table width="96%" border="0" align="center" cellpadding="0" cellspacing="0" style="margin-top:20px"   class="f_12px">
  <tr>
    <td align="left">ѡ��ƻ��鿴���
       
      <select name="planid" id="planid" onchange="location.href = this.options[selectedIndex].value">
                          <option value="?action=adslist">���мƻ���Ŀ</option>
                          <?php foreach((array)$plan as $p) {?>
                          <option value="?action=adslist&planid=<?php echo $p['planid']?>" <?php if($planid == $p['planid']) echo "selected"?> ><?php echo $p['planname']?></option>
                          <?php }?>
        </select>
      </td>
    </tr>
</table>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="wrap tb0" style="margin-top:10px">
  <tr>
    <th>���</th>
    <th width="60">���ID</th>
    <th width="130">�ƻ�����</th>
    <th width="60">�Ʒ���ʽ</th>
    <th width="60">�������</th>
    <th width="60">���ߴ�</th>
    <th width="60">����</th>
    <th width="60">״̬</th>
  </tr>
  <?php
  	foreach((array)$ads as $a){ 
		 $at=$adstypemodel->getAdsTypeId($a['adstypeid']);
   ?>
  <tr id="tbList">
    <td><?php 
	$height = abs($a['height']-($a['height']*0.7)); 
	$width = abs($a['width']-($a['width']*0.7)); 
 
	if($a['plantype']=='cpm'){
			echo "<div style='width:300px; '><a href='javascript:void(0)' onclick='tourl(\"".$a['url']."\")'>".$a['url']."</a></div>";
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
				echo "<img src=".$a['imageurl']." width=".$width."  height=".$height." border='0' >";
			}else if( $a['imageurl'] && substr($a['imageurl'],-3) == 'swf' ){
				echo "<embed src=".$a['imageurl']." quality='high' pluginspage='http://www.macromedia.com/go/getflashplayer' type='application/x-shockwave-flash' width=".$width."  height=".$height." wmode=transparent></embed>";
			}else echo "<iframe  width=".$width." height=".$height." frameborder=0 src='?action=showads&adsid=".$a['adsid']."' marginwidth='0' marginheight='0' vspace='0' hspace='0' allowtransparency='true' scrolling='no'></iframe>";
		}
		
		?></td>
    <td align="center"><?php echo $a['adsid']?></td>
    <td align="center"><strong><?php echo $a['planname'];?></strong></td>
    <td align="center"><?php echo ucfirst($a['plantype'])?></td>
    <td align="center"><?php echo  $at['name'] ?></td>
    <td align="center"><?php echo $a['width'].'*'.$a['height'];?></td>
    <td align="center"><a href="?action=editads&planid=<?php echo $a['planid']?>&adsid=<?php echo $a['adsid']?>&adstypeid=<?php echo $a['adstypeid']?>">�༭</a></td>
  
    <td><?php
			    if($a['planstatus'] == '2') echo "<span style='color:#ff0000;'>�ƻ�ֹͣ��</spna>";
				elseif ($a['planstatus'] == 3) echo "<span style='color:#ff0000;'>�ƻ���ͣ��(�޶�)</spna>";
				elseif ($a['planstatus'] == 4) echo "<span style='color:#ff0000;'>�ƻ�ֹͣ(���ڻ�������)</spna>";
				elseif ($a['status'] == 0) echo "<span style='color:#ff0000;'>��������</spna>";
				elseif ($a['status'] == 1) echo "<span style='color:#ff0000;'>��˾ܾ�</spna>";
				elseif ($a['status'] == 2) echo "<span style='color:#ff0000;'>�޸Ĵ���</spna>";
				elseif ($a['status'] == 4) echo "<span style='color:#ff0000;'>�ѱ�����</spna>";
				else echo "<span style='color: blue;'>Ͷ����</spna>";
				?></td>
  </tr>
  <?php } //end foreach
if(!$ads) { ?>
  <tr class="tbListNull">
    <td colspan="8"><a href="?action=createads">û�й�档�½�һ��</a></td>
  </tr>
  <?php } //ednt if?>
</table>

<?php echo $viewpage?>
</div>
<?php include TPL_DIR . "/footer.php"?>