<?php if(!defined('IN_ZYADS')) exit(); 
include TPL_DIR . "/header.php";?>
<script type="text/javascript" src="/javascript/zeroclipboard/ZeroClipboard.js"></script>
 <div id="pro_menu" class="pro_menu" style="display: block;">
  <div class="shell">
    <ul class="pro">
		<li><a href="?action=sitelist">���λ����</a></li>
      <li><a href="?action=zonelist">���λ�б�</a></li>
		<li><a href="?action=createsite">������վ</a></li>  
		<li><a href="?action=sitelist">��վ�б�</a></li>
		<li  class="default"> <a href="?action=sitelist">��ȡ����</a></li>
    </ul>
  </div>
</div>
<div class="zonelist">


 			
<h2>��ȡ���� <span class="tsp"  style="padding-left:20px;">
<a href="?action=<?php echo $z['adstypeid']==13?'createzt':'zone';?>&actiontype=edit&siteid=<?php echo $z['siteid']?>&zoneid=<?php echo $z['zoneid']?>">�鿴���λ&raquo;</a>
</span></h2>

<?php if($z['adstypeid']!=24) {?>
<div>
  <textarea name="jcode" cols="140" rows="2" id="jcode" style="padding:5px">
<?php 
if($u_a_type) {
	$codes = '<script src="'.$GLOBALS['C_ZYIIS']['jsurl'].'/page/?s='.$z['zoneid'].'"></script>';
 }else {
	$codes = '<script src="'.$GLOBALS['C_ZYIIS']['jsurl'].'/page/s.php?s='.$z['zoneid'].'&w='.$z['width'].'&h='.$z['height'].'"></script>';
}
echo $codes;
?></textarea> 
<br /> <br /><input type="button" value="���ƴ���" id="_jcode"  onmouseOver="copyCode('jcode','_jcode','_jcode_')" />
<span id="_jcode_" style="color:#F00; display:none">���Ƴɹ����뽫������õ�����ҳ�С�</span>
</div>  <br />
 
   
 
<div style="margin-top:10px;" id="jscodes">
<strong>JS����</strong><br /><br />
<textarea name="jscode" cols="140" rows="2" id="jscode" style="padding:5px">
document.write('<?php echo $codes?>');</textarea>
<br /> <br /><input type="button" value="���ƴ���" id="_jscode"  onmouseOver="copyCode('jscode','_jscode','_jscode_')" />
<span id="_jscode_" style="color:#F00; display:none">���Ƴɹ����뽫������õ�����ҳ�С�</span>
</div>
<?php } else {?>
<textarea name="code" cols="140" rows="2" id="code" style="padding:5px"><?php echo $GLOBALS['C_ZYIIS']['jumpurl']?>/iclk/?zoneid=<?php echo $z['zoneid']?>&uid=<?php echo $_SESSION['uid']?></textarea>
 <br /> <br /><input type="button" value="���ƴ���" id="_code"  onmouseOver="copyCode('code','_code','_code_')" />
 <span id="_code_" style="color:#F00; display:none">���Ƴɹ���</span>
<?php }?>
</div>
 
<script language="JavaScript" type="text/javascript">
function copyCode(a,b,c){
var clip = new ZeroClipboard.Client();  
        clip.setHandCursor(true);  
        clip.setText($i(a).value);          
        clip.addEventListener('complete',  function(client, text) {
       $i(c).style.display='';
});
        clip.glue(b);  
}
</script>



<?php include TPL_DIR . "/footer.php";?>