<?php if(!defined('IN_ZYADS')) exit(); 
include TPL_DIR . "/header.php";?>
<script src="/javascript/jquery/jquery.js" language='JavaScript'></script>
<script src="/javascript/jquery/thickbox.js" language='JavaScript'></script>
<link href="/javascript/jquery/css/thickbox.css" rel="stylesheet" type="text/css" />
<div id="pro_menu" class="pro_menu" style="display: block;">
  <div class="shell">
    <ul class="pro">
      <li class="<?php if($actiontype=='') echo "default"?>" ><a href="?action=exchange">�һ���Ʒ</a></li>
      <li class="<?php if($actiontype=='list') echo "default"?>" ><a href="?action=exchange&actiontype=list">�һ���¼</a></li>
    </ul>
  </div>
</div>

<div class="paylist"  >

<?php if($actiontype==''){?>

<?php if($statetype!= '') {?>
  <div class="tipinfo" id="success">
    <div class="r1"></div>
    <div class="r2"></div>
    <div class="text"><?php if($statetype== 'success') echo "�ҽ��ɹ������ǻ�Ϊ������ķ�����"; else echo "����ʧ��"?>��</div>
    <div class="l1"></div>
    <div class="l2"></div>
  </div>
  <?php }  ?>
  
  
<h2>���û��֣�<font color="#FF0000"><?php echo $u['integral'] ?>��</font></h2>
<table width="890" border="0" align="center" cellpadding="0" cellspacing="0" class="tb2">
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr></tr>
  <tr></tr>
  <tr>
    <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" >
        <tr>
          <td width="455" ><h3>��λ�û���</h3></td>
          <td width="10" >&nbsp;</td>
          <td ><h3>���ֹ���</h3></td>
        </tr>
        <tr>
          <td><ul>
              <li>Ͷ�Ź�������룬����ʱת���ɶԵȵ�˰��</li>
              <li>Ͷ�Ź��һ����<?php echo $GLOBALS['C_ZYIIS']['integral_day']?>��</li>
              <li>����������˰��</li>
              <li>�����˱��ֳ����ȶ��ĺ���������ʱ��Խ������û���Խ��</li>
            </ul></td>
          <td>&nbsp;</td>
          <td valign="top"><ul>
              <li>������벢�Ҵﵽ�����ǽ����׼��ȷ��֧��������û��� �磺����������100Ԫ=<?php echo 100*$GLOBALS['C_ZYIIS']['integral_topay']?>���� 1Ԫ������=<?php echo  $GLOBALS['C_ZYIIS']['integral_topay']?>���� </li>
              <li>һ��24Сʱ�����Ͷ�Ź��PV�ﵽ<?php echo $GLOBALS['C_ZYIIS']['integral_daypv']?>����ʱ���<?php echo $GLOBALS['C_ZYIIS']['integral_day']?>��</li>
            </ul></td>
        </tr>
      </table></td>
  </tr>
</table>
<table width="910" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="30" align="right">&nbsp;</td>
  </tr>
  <tr>
    <td class="bd1c"><img src="/templates/<?php echo Z_TPL?>/images/integralinfo.jpg"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td ><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="700" valign="top"><ul class="jful">
              <?php foreach((array)$integraltop  AS $i) {?>
              <li> <img src="<?php echo $i['imageurl']?>" /><br>
                <span class="jftit"><a href="javascript:;" onclick="Ex(<?php echo $i['integral']?>,'<?php echo $i['name']?>','<?php echo $i['id']?>')"><?php echo str($i['name'],22)?></a> </span><br>
                <span class="jfnum"><?php echo $i['integral']?>����</span><a href="javascript:;" onclick="Ex(<?php echo $i['integral']?>,'<?php echo $i['name']?>','<?php echo $i['id']?>')"><img src="/templates/<?php echo Z_TPL?>/images/exchange-bg.gif" align="absmiddle" style=" width:29px; height:16px; border:0px; " /></a><br>
              </li>
			  <span id="Jinfo_<?php echo $i['id']?>" style="display:none"><?php echo nl2br($i['info'])?></span>
              <?php } ?>
            </ul></td>
          <td valign="top" class="bl1c"><table width="100%" border="0" cellspacing="0" cellpadding="0" class="jftb ">
              <tr>
                <td><h3>������</h3>
                  <ul class="jful" >
                    <?php foreach((array)$GLOBALS['C_IntegralType'] as $key=>$val) {?>
                    <li><a href="?action=exchange&type=<?php echo $key?>"  <?php if($type==$key && is_numeric($type)) echo "style='font-weight:bold'"?>><?php echo $val?></a></li>
					
                    <?php } ?>
                    <li><a href="?action=exchange">ȫ��</a></li>
                  </ul></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td><h3>���۸��</h3>
                  <ul class="jful"  style="margin-top:15px">
                    <li   class="jfli1"><a href="?action=exchange&type=<?php echo $type?>&integral=1"  <?php if($integral==1) echo "style='font-weight:bold'"?>>0-500����</a></li>
                    <li   class="jfli1"><a href="?action=exchange&type=<?php echo $type?>&integral=2"  <?php if($integral==2) echo "style='font-weight:bold'"?>>500-2000����</a></li>
                    <li   class="jfli1"><a href="?action=exchange&type=<?php echo $type?>&integral=3"  <?php if($integral==3) echo "style='font-weight:bold'"?>>2000-5000����</a></li>
                    <li   class="jfli1"><a href="?action=exchange&type=<?php echo $type?>&integral=4"  <?php if($integral==4) echo "style='font-weight:bold'"?>>5000-10000����</a></li>
                    <li   class="jfli1"><a href="?action=exchange&type=<?php echo $type?>&integral=5"  <?php if($integral==5) echo "style='font-weight:bold'"?>>10000-50000����</a></li>
                    <li  class="jfli1"><a href="?action=exchange&type=<?php echo $type?>&integral=6"  <?php if($integral==6) echo "style='font-weight:bold'"?>>50000-100000����</a></li>
                    <li  class="jfli1"><a href="?action=exchange&type=<?php echo $type?>&integral=7"  <?php if($integral==7) echo "style='font-weight:bold'"?>>100000��������</a></li>
                  </ul></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td ><table width="700" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td><?php echo $viewpage;?></td>
      </tr>
    </table></td>
  </tr>
</table>
<?php } else {?>

	<h2> �һ���¼  </h2>
 <table width="100%" align="center" class="wrap tb0">
  <tr>
    <th width="90">�һ�ʱ��</th>
    <th>�һ���Ʒ	</th>
    <th width="80">���ѻ���</th>
    <th width="80">�ռ���</th>
    <th width="80">�绰</th>
    <th>��ַ</th>
    <th>״̬</th>
  </tr>
<?php foreach((array)$exchanlist as $e){
		$i=$integralmodel->GetIntegralOne($e['integralid']);
?>  
  <tr>
    <td><?php echo $e['addtime']?></td>
    <td><?php echo $i['name']?></td>
    <td><?php echo $e['integral']?></td>
    <td><?php echo $e['contact']?></td>
    <td><?php echo $e['tel']?></td>
    <td><?php echo $e['address']?></td>
    <td><?php if ($e['status'] == '0'){?>
        �ȴ����� 
      <?php }else {?>
      <font color="red">�ѷ���</font>
      <?php }?></td>
  </tr>
 <?php } //end foreach
if(!$exchanlist) { ?>
   <tr class="tbListNull">
     <td colspan="7"><a href="#">û����Ϣ</a></td>
   </tr>
   <?php } //ednt if?>
</table>
 <?php echo $viewpage?>

<?php }?>

<div id="sContent" style="display:none;">
  <form id="form1" name="form1" method="post" action="?action=exchange&actiontype=create" onsubmit="return doPost()">
  <input name="integralid" id="integralid" type="hidden" value="" />
    <table width="450" border="0"   cellpadding="0" cellspacing="0">
      <tr>
        <td width="100" height="30" align="center">��Ʒ����</td>
        <td><span id="Jname"></span></td>
      </tr>
      <tr>
        <td height="30" align="center">�۳�����</td>
        <td><span id="Jintegral"></span></td>
      </tr>
      <tr>
        <td height="30" align="center" valign="top">��Ʒ����</td>
        <td><span id="Jinfo"></span></td>
      </tr>
      <tr>
        <td height="30" align="center">�ռ���</td>
        <td><input name="contact" type="text" class="inp2" id="contact" /></td>
      </tr>
      <tr>
        <td height="30" align="center">�绰</td>
        <td><input name="tel" type="text" class="inp2" id="tel" /></td>
      </tr>
      <tr>
        <td height="30" align="center">�ռ���ַ</td>
        <td><input name="address" type="text"   id="address" size="40" /></td>
      </tr>
      <tr>
        <td height="30" align="center"></td>
        <td  ><input type="submit" name=" �ύ " /></td>
      </tr>
    </table>
  </form>
</div>
<script language="JavaScript" type="text/javascript">
function Ex(t,m,id){
	if(<?php echo $u['integral'] ?><t){
		alert("���ֲ���,�´�������");
		return false;
	}
	if(confirm('�һ������Ļ��ֽ�����'+ t +'�֣��һ��ɹ��Ժ��˲�����\n�㡰ȷ�ϡ�����һ����棬�㡰ȡ����ȡ��������')){
		$i("Jname").innerHTML= m;
		$i("Jinfo").innerHTML= $i("Jinfo_"+id).innerHTML;
		$i("Jintegral").innerHTML= "<font color='#FF0000'>"+ t +"��</font>";
		$i("integralid").value= id;
		t = setTimeout("tb_show('"+m+"','#TB_inline?height=350&width=500&inlineId=sContent')",100);
	}
	return false;
}
function doPost(){
	var contact = $i('contact').value;
	var tel = $i('tel').value;
	var address = $i('address').value;
	if(isNULL(contact)){
        alert("����д�ռ���");
		$i('contact').focus();
		return false;
     }
	 
	 if(isNULL(tel)){
        alert("����д�绰");
		$i('tel').focus();
		return false;
     }
	 
	 if(isNULL(address)){
        alert("����д�ռ���ַ");
		$i('address').focus();
		return false;
     }
}
</script>
<?php include TPL_DIR . "/footer.php"?>
