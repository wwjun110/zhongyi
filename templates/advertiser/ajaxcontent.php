<?php if(!defined('IN_ZYADS')) exit; ?>
<script src="/javascript/function.js" type="text/javascript"></script>
<style type="text/css">
body,td{font-size:12px;}
</style>
<?php if($edittype == 'pay') {?>
<form action="?action=payment" method="post" name="pays" target="_blank" id="pays" onsubmit="return doPay()">
  <table width="500" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <?php if(trim($GLOBALS['C_ZYIIS']['99bill_id']) != '') {?>
      <td width="130"><label for="p_99bill">
        <input type="radio" name="paytype" value="99bill"  <?php if ($GLOBALS['C_ZYIIS']['default_pay']=='99bill') echo "checked";?> id="p_99bill" />
        ��Ǯ</label></td>
      <?php }  ?>
      <?php if(trim($GLOBALS['C_ZYIIS']['chinabank_id']) != '') {?>
      <td width="130"><label for="p_chinabank">
        <input type="radio" name="paytype" value="chinabank"  <?php if ($GLOBALS['C_ZYIIS']['default_pay']=='chinabank') echo "checked";?> id="p_chinabank"/>
        ����֧��</label></td>
      <?php }  ?>
      <?php if(trim($GLOBALS['C_ZYIIS']['alipay_id']) != '') {?>
      <td width="130"><label for="p_alipay">
        <input type="radio" name="paytype" value="alipay"  <?php if ($GLOBALS['C_ZYIIS']['default_pay']=='alipay') echo "checked";?> id="p_alipay"/>
        ֧����</label></td>
      <?php }  ?>
      <?php if(trim($GLOBALS['C_ZYIIS']['tenpay_id']) != '') {?>
      <td><label for="p_tenpay">
        <input type="radio" name="paytype" value="tenpay"  <?php if ($GLOBALS['C_ZYIIS']['default_pay']=='tenpay') echo "checked";?> id="p_tenpay"/>
        �Ƹ�ͨ</label></td>
      <?php }  ?>
    </tr>
    <tr>
	
       <?php if(trim($GLOBALS['C_ZYIIS']['99bill_id']) != '') {?> <td align="left"><img src="/templates/<?php echo Z_TPL?>/images/99bill.gif" width="112" height="58" /> </td><?php }  ?>
      <?php if(trim($GLOBALS['C_ZYIIS']['chinabank_id']) != '') {?> <td  align="left"><img src="/templates/<?php echo Z_TPL?>/images/chinabank.gif" /> </td><?php }  ?>
     <?php if(trim($GLOBALS['C_ZYIIS']['alipay_id']) != '') {?> <td align="left"><img src="/templates/<?php echo Z_TPL?>/images/alipay.gif"  /></td> <?php }  ?>
    <?php if(trim($GLOBALS['C_ZYIIS']['tenpay_id']) != '') {?>  <td align="left"> <img src="/templates/<?php echo Z_TPL?>/images/tenpay.gif" width="112" height="58" /> </td><?php }  ?>
    </tr>
  </table>
  <table width="500" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td height="20">&nbsp;</td>
    </tr>
    <tr>
      <td><strong>��ֵ���</strong>��
        <input name="imoney" type="text" id="imoney"   style="width:180px" />
        Ԫ 
        <input name="asdfasfd" type="image" src="/templates/<?php echo Z_TPL?>/images/pay.gif" align="top" />
        </td>
    </tr>
    <tr>
      <td height="20">&nbsp;</td>
    </tr>
  </table>
  <table width="500" border="0" align="center" cellpadding="0" cellspacing="0" style="background-color: #e8f1ff;border: 1px solid #c5e1f7;height:40px; color:#FF0000">
    <tr>
      <td width="30">&nbsp;</td>
      <td><img src="/templates/<?php echo Z_TPL?>/images/tip.gif" align="absmiddle"  />&nbsp;&nbsp;���ʳ�ֵ��������벻С��<?php echo $GLOBALS['C_ZYIIS']['min_pay']?>Ԫ</td>
    </tr>
  </table>
</form>
<script language="JavaScript" type="text/javascript">
function doPay(){
	var m = $i('imoney').value;
	if(isNULL(m)){
        	alert("����д��ֵ���");
			$i('imoney').focus();
			return false;
     }
	 if(m<<?php echo $GLOBALS['C_ZYIIS']['min_pay']?>){
        	alert("��ֵ����С��<?php echo $GLOBALS['C_ZYIIS']['min_pay']?>Ԫ");
			$i('imoney').focus();
			return false;
     }
	 
}
</script>
<?php }?>
