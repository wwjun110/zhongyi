<?php if(!defined('IN_ZYADS')) exit(); 
include TPL_DIR . "/header.php";?>

<div id="pro_menu" class="pro_menu" style="display: block;">
  <div class="shell">
    <ul class="pro">
      <li class="default" ><a href="javascript:void(0)">我的消息</a></li>
    </ul>
  </div>
</div>
<div class="pmlist">
<?php if($statetype== 'success') {?>
  <div class="tipinfo" id="success">
    <div class="r1"></div>
    <div class="r2"></div>
    <div class="text">发布成功。</div>
    <div class="l1"></div>
    <div class="l2"></div>
  </div>
  <?php }  ?>
  <div class="pmleft">
    <div class="menu">
      <ul>
        <li <?php if($actiontype == '' || $actiontype == 'outbox' || $type == 'outbox') echo 'class="default"'?>><a href="?action=pm&actiontype=outbox"><span>问题咨询<?php if($numoutbox['n']>0) echo "(".$numoutbox['n'].")";?></span></a></li>
        <li <?php if( $actiontype == 'inbox' || $type == 'inbox') echo 'class="default"'?>><a href="?action=pm&actiontype=inbox">系统消息<?php if($numinbox['n']>0) echo "".$numinbox['n'].")";?></a></li>
		<?php if( $actiontype == 'new'){?>
		<li class="default"><a href="?action=pm&actiontype=new">提交新的问题</a></li>
		<?php }?>
        <li class="addpm"><span onclick="location.href = '?action=pm&actiontype=new'">提交新的问题</span></li>
      </ul>
    </div>
  </div>
  <div class="content">
    <h3><?php 
if($actiontype == 'outbox' || $actiontype == '') echo "我的问题咨询";
if($actiontype == 'inbox') echo "系统消息";
if($actiontype == 'view') echo "<a href='###' onclick='ref()'>返回上一页</a>";
if($actiontype == 'new') echo "提交新的问题";
?>	 </h3>
    <br>
	
	
	
	
    <?php if($actiontype == '' || $actiontype == 'outbox' ||  $actiontype == 'inbox') {?>
    <table width="100%" align="center" class="wrap tb0">
      <tr>
        <th align="left">&nbsp;标题</th>
        <th width="200">发送时间</th>
      </tr>
      <?php foreach((array)$m as $m){ 
	 		 $isv = $pmmodel-> doisviews($m['msgid']);
	  ?>
      <tr>
        <td style="text-align:left">&nbsp;<a href="?action=pm&actiontype=view&type=<?php echo $_GET['actiontype']?>&msgid=<?php echo $m['msgid']?>"><?php echo str($m['subject'],60)?></a>
          <?php 
		if ($isv) {
			echo "<font color='#ff0000'>(未读...)</font>";
		}
		?>
        </td>
        <td><?php echo $m['addtime']?></td>
      </tr>
      <?php } //end foreach
if(!$m) { ?>
      <tr class="tbListNull">
        <td colspan="2"><a href="#">没有信息</a></td>
      </tr>
      <?php } //ednt if?>
    </table>
    <?php echo $viewpage?>
    <?php } //ednt if?>
	
	
	
	
    <?php if( $actiontype == 'view') {?>
    <table width="100%" align="center" class="wrap tb0">
      <tr>
        <th align="left">&nbsp;标题</th>
      </tr>
      <tr>
        <td style="text-align:left"><?php echo $m['subject']?></td>
      </tr>
      <tr bgcolor="#f2f2ef">
        <td  style="text-align:left"><?php echo t($m['msgtext'])?></td>
      </tr>
    </table>
    <br />
	<?php  if($m["alone"] == 0){?>
    <h3>回复内容</h3>
    <table width="100%" align="center" >
      <?php foreach((array)$re as $r){ ?>
      <tr>
        <td style="padding-top:10px;"><?php echo $r['senduser']!=$_SESSION["username"]?'<font color="#ff0000">客服回复 </font>':$_SESSION["username"]?>&nbsp;&nbsp;&nbsp;<?php echo $m['addtime']?> </td>
      </tr>
      <tr>
        <td style="padding:10px;border-bottom:#ccc 1px dotted;"><?php echo t($r['msgtext'])?></td>
      </tr>
      <?php } ?>
      <form id="repm" name="repm" method="post" action="?action=pm&actiontype=postrepm">
        <input name="msgid" type="hidden" value="<?php echo $msgid?>" />
        <input name="type" type="hidden" value="<?php echo $type?>" />
        <tr>
          <td style="padding-top:20px;"><strong>直接回复</strong><br>
            <br>
            <textarea name="retext" id="retext" cols="22" rows="8" style="border:1px solid #A7A6AA;height:60px;padding:2px 8px 0pt 3px;width:360px;"/></textarea>
            <br>
            <br>
            <input type="button" name="Submit22" value="发送" onclick="PostRePm()" /></td>
        </tr>
      </form>
      
    </table>
   <?php } 
	 } ?>
	
	
	<?php if( $actiontype == 'new') {?>
<form id="addpm" name="addpm" method="post"  action="?action=pm&actiontype=postcreatepm">
      <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
 
        <tr >
          <td height="40">问题类型<span class="tdtit">：</span></td>
          <td><select name="msgtype" id="msgtype">
            <option value="">请选择...</option>
            <?php foreach((array)$GLOBALS['C_MsgType'] as $key=>$val) {?>
            <option value="<?php echo $key?>" ><?php echo $val?></option>
            <?php } ?>
 
          </select></td>
        </tr>
        <tr >
          <td height="40"><span class="tdtit">咨询标题：</span></td>
          <td><input name="subject" type="text"  class="reg" id="subject" maxlength="64"/>
            <span class="gray">最多32个字符</span></td>
        </tr>
        <tr>
          <td width="74" valign="bottom"><span class="tdtit">咨询内容：</span></textarea></td>
          <td width="641"><textarea name="msgtext" id="msgtext" cols="22" rows="8" style="border:1px solid #A7A6AA;height:150px;padding:2px 8px 0pt 3px;width:360px;"/></textarea></td>
        </tr>
        <tr>
          <td height="30">&nbsp;</td>
          <td colspan="2"><input type="button" name="Submit2" value="发送" onclick="PostPm()" /></td>
        </tr>
      </table>
    </form>
    <?php } ?>
	  
	
	
	
	
	
	
	
	
  </div>
</div>
<script language="JavaScript" type="text/javascript">
function PostRePm(){
	var retext = $i('retext').value;
	if(isNULL(retext)){
		alert("请输入回复内容！");		
		$i('retext').focus();
		return false;
     }
	 if(!isValidReg(retext)){
        	//alert("回复内容里含有非法字符，请重新输入！");
			//$i('retext').focus();
			//return false;
     }
	 document.forms["repm"].submit(); 
}
function PostPm(){
	var msgtype = $i('msgtype').value;
	var subject = $i('subject').value;
	var msgtext = $i('msgtext').value;
	if(isNULL(msgtype)){
		alert("请选择问题类型！");		
		$i('subject').focus();
		return false;
     }
	if(isNULL(subject)){
		alert("请输入咨询标题！");		
		$i('subject').focus();
		return false;
     }
	 if(!isValidReg(subject)){
        	alert("咨询标题里含有非法字符，请重新输入！");
			$i('subject').focus();
			return false;
     }
	 if(isNULL(msgtext)){
        alert("请输入咨询内容！");		
		$i('subject').focus();	
		return false;
     }
	 if(!isValidReg(msgtext)){
        	alert("咨询内容里含有非法字符，请重新输入！");
			$i('msgtext').focus();
			return false;
     }
	 document.forms["addpm"].submit();
}
</script>
<?php include TPL_DIR . "/footer.php";?>
