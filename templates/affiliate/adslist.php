<?php if(!defined('IN_ZYADS')) exit(); 
include TPL_DIR . "/header.php";
?>

<div id="pro_menu" class="pro_menu" style="display: block;">
  <div class="shell">
    <ul class="pro">
      <li class="default"><a href="?action=adslist">���ܹ��</a></li>
      <li><a href="?action=planlist">��Ŀ���</a></li>
    </ul>
  </div>
</div>
<div class="planlist">
<div id="wrapper">
  <div id="content">
  
    <h3 class="tab tab1">
      <div class="tabtxt"><a href="?action=planlist">��Ŀ���</a></div>
    </h3>
	
    <div class="tab" >
      <h3 class="tabtxt"><a href="?action=adslist">���ܹ��</a></h3>
    </div>
	<?php if($ztadsnum) {?>
	<h3 class="tab tab1" >
      <div class="tabtxt"><a href="?action=createzt">������</a></div>
    </h3>
	<?php }?>
    <div class="boxholder">
      <div class="box" >
        <p> <img src="/templates/<?php echo Z_TPL?>/images/bulb.gif" align="absmiddle" /> ������ѡ��Ĺ�����ͣ�ϵͳ�Զ���ʾ��档���ܴ���Ϊ�ֲ���ʽ�����Ի�ȡ�ĸ���Ĺ��ѡ�</p>
         
          <form id="form1" name="form1" method="post" action="?action=zone&actiontype=create">
		  <input name="adsid" type="hidden" value="<?php echo $deadsid?>" />
		  <input name="siteid" type="hidden" value="<?php echo $siteid?>" />
		   <input name=" viewtype" type="hidden" value="zn" />
            <table width="99%" border="0" align="center" style="margin-top:20px">
              <tr>
                <td height="30" align="center">Ͷ����վ��</td>
                <td><select name="select" onchange="location.href = this.options[selectedIndex].value ">
                    <?php foreach((array)$site as $key=>$s ) {
 echo "<option value = '?action=adslist&siteid=". $s['siteid']."&kv=".$key."&plantype=".$plantype."'";
 if($s['siteid']==$siteid) echo "selected";
 echo ">".$s['sitename']."</option>";
}
?>
                  </select>
                  ��ַ:<a href="http://<?php echo $site[$kv]['siteurl']?>" target="_blank"><?php echo $site[$kv]['siteurl']?></a><span style=" margin-left:20px;"> <a href="?action=createsite">������վ</a> </span></td>
              </tr>
              <tr>
                <td width="90" height="30" align="center">��Ŀ���ͣ�</td>
                <td><?php 
			 foreach((array)$plantypearr as $pt) {
			 ?>
                    <label for="pt_<?php echo $pt['plantype']?>">
                    <input type="radio" name="plantype"  id="pt_<?php echo $pt['plantype']?>" value="<?php echo $pt['plantype']?>" <?php if(in_array($pt['plantype'],(array)$plantype) || $deplantype==$pt['plantype']) echo 'checked';?> onclick="location.href = '?action=adslist&plantype=<?php echo $pt['plantype']?>&siteid=<?php echo $siteid?>&kv=<?php echo $kv?>'"/>
                    <?php echo ucfirst($pt['plantype'])?></label>
                    <?php }  ?></td>
              </tr>
              <tr>
                <td height="30" align="center">���ģʽ��</td>
                <td><?php 
					foreach((array)$adstype as $at) {
						$d = $adsmodel->countAdsTypeNum($at['adstypeid'],$ads);
						if($d && strlen($adstypenum['dispurl'])==0) {
					?>
								<label for="at_<?php echo $at['adstypeid']?>">
								<input name="adstypeid" id="at_<?php echo $at['adstypeid']?>" type="radio" value="<?php echo $at['adstypeid']?>" <?php if(in_array($at['adstypeid'],(array)$adstypeid) || $deadstypeid==$at['adstypeid']) echo 'checked';?>  onclick="location.href = <?php echo "'?action=adslist&plantype=".$deplantype."&adstypeid=".$at['adstypeid'].""?>&siteid=<?php echo $siteid?>&kv=<?php echo $kv?>'"/>
								<?php echo $at['name']?></label>
								<?php }
					
					}  
				?></td>
              </tr>
              <tr>
                <td height="30" align="center">���ߴ磺</td>
                <td><div class="adsspecs" style="margin-top:10px; padding-top:3px">
                    <ul>
                      <?php foreach((array)$specs as $s) {?>
                      <li style="height:25px; width:90px;">
                        <label for="s_<?php echo $s[0].'x'.$s[1]?>">
                        <input type="radio" name="specs" id="s_<?php echo $s[0].'x'.$s[1]?>" onclick="location.href = <?php echo "'?action=adslist&plantype=".$deplantype."&adstypeid=".$deadstypeid."&width=".$s['0']."&height=".$s['1'].""?>&siteid=<?php echo $siteid?>&kv=<?php echo $kv?>'" <?php if($dewidth == $s['0'] && $deheight == $s['1']) echo "checked"?> />
                        <?php echo $s[0].'x'.$s[1]?> </label>
                      </li>
                      <?php } ?>
                    </ul>
                </div></td>
              </tr>
			  <?php if ($ads) {?>
              <tr>
                <td height="30" align="center">&nbsp;</td>
                <td><a href="javascript:this.document.form1.submit();" class="gct">���ܴ���</a> </td>
              </tr>
			   <?php }?>
            </table>
             </form>
          <table width="99%" border="0" align="center" style="margin-top:20px">
          <tr>
            <td height="30"  style="border-bottom:1px solid #9DB0BC;"><img src="/templates/<?php echo Z_TPL?>/images/ico5.jpg" align="absmiddle" />&nbsp;&nbsp;<strong>Ԥ�����</strong></td>
          </tr>
		  
          <tr>
            <td align="center"><?php foreach((array)$ads as $a) { 
					if($a['plantype']==$deplantype && $a['adstypeid']==$deadstypeid && $a['width']==$dewidth && $a['height']==$deheight){
					//$plan = $planmodel->getPlanOneInfo($a['planid']);
			?>
              <table width="100%" border="0" cellpadding="3" cellspacing="0" class="tbr1" style="margin-top:20px">
                <tr>
                  <td width="21" align="center" bgcolor="#F7F7F7">��Ŀ</td>
                  <td align="left" bgcolor="#FFFFFF"><strong><?php echo $a['planname'] ?></strong>  <span class="tsp"  style="padding-left:20px;"><a href="?action=planads&planid=<?php echo $a['planid'] ?>&siteid=<?php echo $siteid?>">�鿴��Ŀ&raquo;</a></span></td>
                </tr>
                <tr>
                  <td width="21" align="center" bgcolor="#F7F7F7">����</td>
                  <td align="left" bgcolor="#FFFFFF">
				  <font color="#FF7E00"><?php 
				 
				    if($a['gradeprice']==1) {
						$sprice =  's'.$site[$kv]['grade']."price";
						$price = $a[$sprice];
					}else {
						$price = $a['price'];
					}
		
				  if($a['plantype'] == 'cps') echo abs($price).'%';
				  else  echo abs($price) .'Ԫ ';?>
				  </font> 
				  <?php echo $a['priceinfo']?>
				  </td>
                </tr>
                <tr>
                  <td width="21" align="center" bgcolor="#F7F7F7">Ԥ��</td>
                  <td align="left" bgcolor="#FFFFFF">
				  <?php 
					$width = $a['width'];
					$height = $a['height'];
					if($a['width']>800)  $width = 800;
					if($a['height']>500)  $height = 500;
					if($a['plantype']=='cpm'){
							echo "��Ԥ��";
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
                </tr>
                <tr>
                  <td width="21" align="center" bgcolor="#F7F7F7">����</td>
                  <td bgcolor="#FFFFFF">
				  
				  <a href="?action=zone&actiontype=create&adsid=<?php echo $a['adsid']?>&siteid=<?php echo $siteid?>" class="gct">��ѡ���</a>
				  
				  <?php  
				  $zlinktype = $a['plantype'].'zlink';  
				  if( 
				  (
				  
				  $u[$zlinktype]=='2' || 
				  ($u[$zlinktype]=='1' && in_array ($a['plantype'], explode(',',$GLOBALS['C_ZYIIS']['zlink_on'])))
				  ) 
				  && $a['zlink']=='1' 
				  &&  ($a['plantype']!='cpv' && ($a['htmlcode']=='' || $a['headline']=='')
				  )){?>
				     <a href="?action=zone&actiontype=create&type=link&adsid=<?php echo $a['adsid']?>&siteid=<?php echo $siteid?>" class="gct">ֱ������</a>
          		<?php }  ?>
				  
				   </td>
                </tr>
              </table><br>
              <?php } }?>
            </td>
          </tr>
        </table>
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
  <table width="520" border="0" align="center" cellpadding="0" cellspacing="3">
    <tr>
      <td height="80" align="center"><div class="info">û�й�����������ļƻ���Ŀû��ͨ��,��һ����վ����</div></td>
    </tr>
	<tr>
      <td height="20" align="center"><div class="submit-x" style="float:none"><a href="?action=planlist"><font color="#FFFFFF">������Ŀ���</font></a></div></td>
    </tr>
  </table>
</div>
<script src="/javascript/jquery/jquery.js" language='JavaScript'></script>
<script src="/javascript/jquery/thickbox.js" language='JavaScript'></script>
<link href="/javascript/jquery/css/thickbox.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" type="text/javascript">
function tb_remove_bak(){
	//location.href = "?action=planlist";
}
<?php if (!$ads) {?>
setTimeout("tb_show('�����Թ��','#TB_inline?height=140&width=550&inlineId=sContent')",500);
 <?php }?>
</script>

<?php include TPL_DIR . "/footer.php";?>