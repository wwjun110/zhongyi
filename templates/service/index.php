<?php if(!defined('IN_ZYADS')) exit(); 
include TPL_DIR . "/header.php";?>
 
<div class="main">
  <div class="left">
    <h2>�ҵ���Ϣ</h2>
    <ul>
      <li><span>��������������Ա��</span><?php echo $dayaddnum?>��</li>
      <li><span>�����Ա��</span><?php echo $userstatus0num?>��</li>
      <li><span>������վ��</span><?php echo $sitestatus0num?>�� </li>
	  <li><span>�ҵ�ע�����ӣ�</span><a href="javascript:void(0);">http://<?php echo $GLOBALS['C_ZYIIS']['authorized_url']?>/v/?s=<?php echo $_SESSION['serviceid']?></a></li>
    </ul>
    <h2>�������������Ա<span><a href="#"></a></span></h2>
    <table width="650" class="wrap tb0">
      <tr>
        <th width="60">��ԱID</th>
        <th width="80">��Ա����</th>
        <th width="90">��ϵ��</th>
        <th width="90">QQ</th>
        <th>Email</th>
        <th>����</th>
      </tr>
		<?php foreach ((array)$dayuser AS $u){ echo $u['status'];
		if($u['status']==0){?>
	  <tr id="tbList">
		<td><?php echo $u["uid"]?></td>
		<td><?php echo $u["username"]?></td>
		<td><?php echo $u["contact"]?></td>
		<td><a href="http://wpa.qq.com/msgrd?V=1&uin=<?php echo $u["qq"]?>" title="Q��"  target="_blank"><?php echo $u["qq"]?></a></td>
		<td><?php echo $u["email"]?></td>
		<td><a href="?action=users&amp;actiontype=postchoose&amp;choosetype=unlock&amp;uid[]=<?php echo $u['uid']?>" title="��������Ա"  onclick="return confirm('��ȷ�����ͨ��?')">ͨ��</a> | <a href="#TB_inline?&amp;height=200&amp;width=430&amp;inlineId=DenyUser"  title="������<?php echo  $u['username'] ?>��"   class="thickbox" onclick="$i('uid[]').value=<?php echo $u['uid']?>;$i('userinfo').value='<?php echo $u['userinfo']?>'">����</a></td>
	  </tr>
      <?php 
		} //ednt if
		 } //end foreach
		if(!$u) { ?>
      <tr class="tbListNull">
        <td colSpan="6"><img src="/templates/<?php echo Z_TPL?>/images/tip.gif" /> ����û��������˵Ļ�Ա�ˣ�����Ŷ</td>
      </tr>
      <?php } //ednt if?>
    </table>
    <h2>���մ�����վ<span><a href="#"></a></span></h2>
    <table width="650" class="wrap tb0">
      <tr>
        <th width="60">���ڻ�Ա</th>
        <th width="60">��վID</th>
        <th width="80">��վ����</th>
        <th width="100">����</th>
        <th width="90">Alexa/Pr</th>
        <th>��ַ</th>
        <th>����</th>
      </tr>
      <?php foreach((array)$daysites as $s) { 
	  		$sid = $sitetypemodel->adminGetSiteTypeSid($s['sitetype']);
	  ?>
      <tr id="tbList">
        <td><?php echo $s["username"]?></td>
        <td><?php echo $s["siteid"]?></td>
        <td><?php echo $s["sitename"]?></td>
        <td><?php echo $sid['sitename']?></td>
        <td><span id="s_<?php echo $s['siteid']?>"><?php echo $s['alexa'].'/'.$s['pr']?></span><img src="/templates/<?php echo Z_TPL?>/images/alexa.jpg" alt="�������" align="absmiddle" style="	cursor:pointer" onclick="doAlexaPr('<?php echo trim($s['siteurl'])?>',<?php echo $s['siteid']?>)" /></td>
        <td><a href="javascript:tourl('http://<?php echo  $s['siteurl'] ?>')"><?php echo  $s['siteurl'] ?></a></td>
        <td><a href="?action=site&amp;actiontype=postchoose&amp;choosetype=unlock&amp;siteid[]=<?php echo $s['siteid']?>"  onclick="return confirm('��ȷ�����ͨ��?')">ͨ��</a> | <a href="#TB_inline?&amp;height=200&amp;width=430&amp;inlineId=DenySite"  title="������<?php echo  $s['sitename'].'|'.$s['siteurl'] ?>��" class="thickbox" onclick="$i('siteid[]').value=<?php echo $s['siteid']?>;$i('denyinfo').value='<?php echo $s['denyinfo']?>'">����</a></td>
      </tr>
      <?php } //end foreach ?>
    </table>
  </div>
  <div class="right">
    <h2>���˹���</h2>
    <ul>
      <?php 
$news = $newsmodel->getAllnews('6');
foreach((array)$news as $n){?>
      <li class="news"><a href='/index.php?action=shownews&amp;id=<?php echo $n['id'];?>' target='_blank' title="<?php echo $n['tit']?>"><?php echo str($n['tit'],18)?></a> <?php echo date("m-d",strtotime($n['time']));?></li>
      <?php  }  ?>
    </ul>
 
  </div>
</div>
<div id="DenySite" style="display:none">
  <form action="?action=site&actiontype=postchoose&choosetype=lock" method="post">
    <input name="siteid[]" id="siteid[]" type="hidden" value="" />
    <table border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td width="90">�ܾ�ԭ��</td>
        <td><textarea name="denyinfo" id="denyinfo" style="width:320px;height:90px"></textarea></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td height="60"><input type="submit" name="Submit2" value=" �ύ "  /></td>
      </tr>
    </table>
  </form>
</div>
<div id="DenyUser" style="display:none">
  <form action="?action=users&actiontype=postchoose&choosetype=lock" method="post">
    <input name="uid[]" id="uid[]" type="hidden" value="" />
    <table border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td width="90">����ԭ��</td>
        <td><textarea name="userinfo" id="userinfo" style="width:320px;height:90px"></textarea></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td height="50"><input type="submit" name="Submit2" value=" �ύ "  /></td>
      </tr>
    </table>
  </form>
</div>
<script language="JavaScript" type="text/javascript">
function doAlexaPr(url,siteid){
		sid = 's_'+siteid;
		$('#'+sid).html('<img src="/templates/<?php echo Z_TPL?>/images/loading.gif"> '); 
		
		$.ajax({
           url: "?action=site&actiontype=alexapr&url="+url,
		   type: 'GET',
		   dataType: 'html',
           timeout: 5000,
           error: function () {
                  $('#'+sid).html('<font color=red>��ʱ</font>');
           },
		   success: function(data){
        		$('#'+sid).html(data);
			}
        });
}

</script>

<?php include TPL_DIR . "/footer.php";?>
