<?php if(!defined('IN_ZYADS')) exit(); 
include TPL_DIR . "/header.php";?>
<title>ע���Ա <?php echo $GLOBALS['C_ZYIIS']['sitename']?></title>
<link type="text/css" rel="stylesheet" href="/javascript/jquery/css/validator.css"></link>
<script src="/javascript/jquery/jquery.js" type="text/javascript"></script>
<script src="/javascript/jquery/formValidator_min.js" type="text/javascript"></script>
<script src="/javascript/jquery/formValidatorRegex.js" type="text/javascript"></script>
<div class="regtbg"></div>

<form id="form1" name="form1" method="post" action="http://<?php echo $GLOBALS['C_ZYIIS']['authorized_url']?>/index.php?action=regsave" onsubmit="return jQuery.formValidator.PageIsValid('1')">
        <input name="siteurl" type="hidden" value="<?php echo $_POST['siteurl']?>" />
        <input name="pertainurl" type="hidden" value="<?php echo $_POST['pertainurl']?>" />
        <input name="sitename" type="hidden" value="<?php echo $_POST['sitename']?>" />
        <input name="beian" type="hidden" value="<?php echo $_POST['beian']?>" />
        <input name="siteinfo" type="hidden" value="<?php echo $_POST['siteinfo']?>" />
        <input name="sitetype" type="hidden" value="<?php echo $_POST['sitetype']?>" />
		
 <table width="950" border="0" align="center" cellpadding="0" cellspacing="0" class="regtb">
   
  <tr>
    <td width="130"  align="right" class="reg_tit"> ��ѡ���˻����ͣ� </td>
    <td><?php if ( $GLOBALS['C_ZYIIS']['close_reg_aff']=='0' && $type!='advertiser'){?>
      <input  type="radio" value="1" name="type" size="24"  style="border: medium none ; width: auto;"  <?php if($type!='advertiser') echo 'checked'?> />
      ��վ��
      <?php }  ?>
      <?php if ( $GLOBALS['C_ZYIIS']['close_reg_adv']=='0' && ($type=='advertiser' || $GLOBALS['C_ZYIIS']['reg_type']!=1)){?>
      <input  type="radio"  value="2" name="type" size="24" style="border: medium none ; width: auto;" <?php if($type=='advertiser') echo 'checked'?> />      �����
    <?php }?></td>
  </tr>
  <tr>
    <td  colspan="2" class="reg_t14b">�����û���������ʹ�����ģ�</td>
   </tr>
  <tr>
    <td height="35" align="right" bgcolor="#E7F0F5" class="reg_tit"> <span class="required">*</span>�û����� </td>
    <td bgcolor="#E7F0F5"><input name="username" type="text"  class="reg_input" id="username" /><span id="usernameTip"></span></td>
  </tr>
  <tr>
    <td height="35" align="right" bgcolor="#E7F0F5" class="reg_tit"> <span class="required">*</span>�� �룺 </td>
    <td bgcolor="#E7F0F5"><input name="password" type="password" class="reg_input" id="password"/><span id="passwordTip"></span></td>
  </tr>
  <tr>
    <td height="35" align="right" bgcolor="#E7F0F5" class="reg_tit"><span class="required">*</span>����ȷ�ϣ�</td>
    <td bgcolor="#E7F0F5"><input name="passwordre" type="password" class="reg_input" id="passwordre"/><span id="passwordreTip"></span></td>
  </tr>
   <tr>
    <td  colspan="2" class="reg_t14b">���ð�ȫ����</td>
   </tr>
   <tr>
     <td  align="right" class="reg_tit"> <span class="required">*</span>��ȫ���� ��</td>
     <td><input id="question" type="text" value="" name="question"  class="reg_input"/> <span id="questionTip"></span></td>
   </tr>
   <tr>
     <td  align="right" class="reg_tit"><span class="required">*</span>�𰸣�</td>
     <td><input id="answer" type="text" value="" name="answer" class="reg_input"/> <span id="answerTip"></span> </td>
   </tr>
  <tr>
    <td  colspan="2" class="reg_t14b">���ø�����Ϣ</td>
   </tr>
   <tr>
     <td align="right" class="reg_tit"><span class="required">*</span>��ϵ�ˣ�</td>
    <td><input id="contact" type="text" value="" name="contact" class="reg_input" />
        <span id="contactTip"></span></td>
  </tr>
  <tr>
    <td align="right" class="reg_tit">�̶��绰��</td>
    <td><input id="tel" type="text" value="" name="tel" class="reg_input"/>
        <span id="telTip"></span></td>
  </tr>
  <tr>
    <td align="right" class="reg_tit">�ֻ����룺</td>
    <td><input id="mobile" type="text" value="" name="mobile" class="reg_input" />
        <span id="mobileTip"></span></td>
  </tr>
  <tr>
    <td align="right" class="reg_tit">Q Q��</td>
    <td><input name="qq" type="text" class="reg_input" id="qq"/>
        <span id="qqTip"></span></td>
  </tr>
  <tr>
    <td align="right" class="reg_tit"><span class="required">*</span>EMAIL��ַ��</td>
    <td><input name="email" type="text" class="reg_input" id="email"/>
        <span id="emailTip"></span></td>
   </tr>
   <tr id="bank0">
    <td  colspan="2" class="reg_t14b">����������Ϣ</td>
   </tr>
  <tr id="bank1">
    <td align="right" class="reg_tit">�������ƣ�</td>
    <td><select name="bank" id="bank" style="width:160px;" onchange="Dobank()">
      <?php  foreach ($GLOBALS['C_Bank'] as $bank=>$val){?>
      <?php if($val[1]) {?>
      <option value="<?php echo $val[0]?>"><?php echo $bank?></option>
      <?php }?>
      <?php }?>
    </select>    </td>
  </tr>
  <tr id="bank2">
    <td align="right" class="reg_tit"><span class="required">*</span>�տ�������</td>
    <td><input name="accountname" type="text" class="reg_input" id="accountname"/>
        <span id="accountnameTip"></span></td>
  </tr>
  <tr id="bank3">
    <td align="right" class="reg_tit">�����У�</td>
    <td><input name="bankname" type="text" class="reg_input" id="bankname"/>
        <span id="banknameTip"></span></td>
  </tr>
  <tr id="bank4">
    <td align="right" class="reg_tit"><span class="required">*</span>�տ��ʺţ�</td>
    <td><input name="bankacc" type="text" class="reg_input" id="bankacc" />
        <span id="bankaccTip"></span></td>
  </tr>
  
 
  
  
   <tr>
    <td  colspan="2" class="reg_t14b">�ͷ�ѡ��<span style="font-size:12px; color:#AAA; font-weight:normal">����ѡ��һ���ͷ�Ϊ�����</span></td>
   </tr>
   
 
   
  <tr id="d_service">
    <td align="right"  class="reg_tit">��ѡ��ͷ��� </td>
    <td>  
      <?php  
		  $k=0;
		  foreach ((array)$serviceuser AS $s){
	  ?>
      
      
     <input name="serviceid" type="radio" value="<?php echo $s['uid']?>" /><a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $s['qq']?>&site=qq&menu=yes"><?php echo $s['contact']?><img border="0" src="http://wpa.qq.com/pa?p=2:<?php echo $s['qq']?>:17" alt="���������ҷ���Ϣ" title="���������ҷ���Ϣ"></a>&nbsp;&nbsp;

      <?php $k=($k+1)%5; if($k == 0) echo "<div style='height:8px'></div>";}?> 
      <span id="serviceidTip"></span> </td>
  </tr>
  <tr id="d_advservice">
    <td align="right"  class="reg_tit">��ѡ������ </td>
    <td>
     <?php  
		  $kv=0;
		  foreach ((array)$advserviceuser AS $s){
	  ?>
     <input name="advserviceid" type="radio" value="<?php echo $s['uid']?>" /><a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $s['qq']?>&site=qq&menu=yes"><?php echo $s['contact']?><img border="0" src="http://wpa.qq.com/pa?p=2:<?php echo $s['qq']?>:17" alt="���������ҷ���Ϣ" title="���������ҷ���Ϣ"></a>&nbsp;&nbsp;

      <?php $kv=($kv+1)%5; if($kv == 0) echo "<div style='height:8px'></div>";}?>
      
        <span id="advserviceidTip"></span> </td>
  </tr>
  <?php if ( $GLOBALS['C_ZYIIS']['reg_code']=='1'){?>
   <tr>
    <td  colspan="2" class="reg_t14b">��д������ </td>
   </tr>
 
     <tr>
    <td align="right" class="reg_tit">�����룺</td>
    <td><input name="regcode" type="text" class="regcode" id="bankname"/>
        <img src="http://<?php echo $GLOBALS['C_ZYIIS']['authorized_url']?>/index.php?action=imgcode"  alt= "������?����ˢ����֤��" align="absmiddle" id="varImg"  style= "cursor:pointer;"  onclick="refurbish();"/><span id="regcodeTip"></span></td>
  </tr>
  
  <?php }?>
  <tr >
    <td align="right"  class="reg_tit">&nbsp;</td>
    <td><span style=" ">
      <input type="submit" value="ͬ�����·�������ύע����Ϣ" name="event_submit_do_register" tabindex="16" style="border: 2px outset rgb(236, 233, 216); margin: 10px auto 20px; padding: 0pt 6px; background-color: rgb(218, 218, 218); height: 26px; width: auto; color: rgb(17, 17, 17);"/>
    </span></td>
  </tr>
  <tr >
    <td colspan="2"  class="reg_t14b">��������</td>
   </tr>
  <tr >
    <td colspan="2" align="right"  class="reg_tit"><div style="background-color:#FAFAFA;border:1px solid #CCCCCC;height:100px; overflow:auto;padding:5px;text-align:left;width:700px; margin-left:30px"> һ������Э���ȷ�Ϻͽ���<br />
          <?php echo $GLOBALS['C_ZYIIS']['sitename']?>��<?php echo $GLOBALS['C_ZYIIS']['siteurl']?>�����ṩ�ĺ�����Ŀ������Ȩ������Ȩ��<?php echo $GLOBALS['C_ZYIIS']['sitename']?>���С���ͨ�����ע����򲢵��ѡ��ͬ�����·�������ύע����Ϣ������ʾ����<?php echo $GLOBALS['C_ZYIIS']['sitename']?>��վǩ��������Э�飨�³ơ�������Э�顱��������������������Լ�����Լ���ʾ����Ϊ<?php echo $GLOBALS['C_ZYIIS']['sitename']?>�ĳ�Ա�������˳�Ա������
      <p></p>
      <p>���� �������ݼ�����˵��<br />
              <?php echo $GLOBALS['C_ZYIIS']['sitename']?>��Աע��ɹ��󣬼��ɵ�¼ϵͳ�������ز�Ʒ���롣���˳�Ա������վҳ����Ƕ�����ϵͳ�л�õĲ�Ʒ����󣬸���վ�ķ����߿��Ի��<?php echo $GLOBALS['C_ZYIIS']['sitename']?>�ṩ�Ĳ�Ʒ��/����ط���<br />
              <?php echo $GLOBALS['C_ZYIIS']['sitename']?>���ݸ��ֲ�Ʒ�Ĳ�ͬ�Ʒѷ�ʽͳ�ƴ������˳�Ա��������Ĳ�Ʒ������������������<?php echo $GLOBALS['C_ZYIIS']['sitename']?>��Ա֧����Ӧ�������á�������Ʒ����ģʽ���ֳɱ������¼����ϸ�Ķ����˵������������֧����<?php echo $GLOBALS['C_ZYIIS']['sitename']?>��<?php echo $GLOBALS['C_ZYIIS']['siteurl']?>����վ�Ϸ����ı�׼Ϊ׼������<?php echo $GLOBALS['C_ZYIIS']['sitename']?>�����˳�Ա��������Լ�����ʹ����д������Э��ġ�<?php echo $GLOBALS['C_ZYIIS']['sitename']?>��Ȩ�������˲�����ʱ���Ĳ�Ʒ������ģʽ���ֳɱ�����������ԣ����ڴ�ͬ��ʼ�����ء�</p>
      <p>����Υ�漰����<br />
        ��<?php echo $GLOBALS['C_ZYIIS']['sitename']?>�ĳ�Ա�������Ծ����ر�����Э�飬�緢���κ�Υ���������Ϊ��<?php echo $GLOBALS['C_ZYIIS']['sitename']?>��ֹͣ���Ѳ�ȡ�������˳�Ա�ʸ�ͬʱ������һ��׷���������ε�Ȩ����</p>
      <p>���˴�������ֻ��Ͷ�������˳�Ա�ύ�������£�������ΪΥ��Ͷ�š���Ҫ�ڶ����վ��������Ͷ�����˴��룬����ע��ɹ����ڡ���Ա�������ġ��еǼ�����Ͷ��<?php echo $GLOBALS['C_ZYIIS']['sitename']?>�����������</p>
      <p>Υ���������Ϊ�����������ڣ�<br />
        1. �κ���ʽ�ķֲ���룺<br />
        ���˳�Աע��ɹ��������ͨ������Ҫ�������˻�ȡ�Ĵ���������������Ӧҳ�棬���ܽ����κ���ʽ�Ĵ���ֲ�<br />
        2. ͨ���˹��������������Ч������������<br />
        1�����û����ʳ�Ա��վ����꾭�����˲�Ʒʱ���Զ��������˲�Ʒ���ڣ�<br />
        2��ͨ�������������������������һ�в������κ�Ч��������Ч�����<br />
        3��������Ч�����ʽ��<br />
        3.<br />
        һ�з�����Ͷ�ŵĲ�Ʒ��ʽ��һ���������յ���ǿ���û��������Ϊ��<br />
        1��������Ͷ�ŷ�ʽ��<br />
        * ����ʵ�����ݵ�ҳ��ȫ��Ͷ��<?php echo $GLOBALS['C_ZYIIS']['sitename']?>���룻<br />
        * �Ե����ʼ�����ʽ�����Ʒ����� <br />
        2�����������յ���ǿ���û���������أ�<br />
        <br />
        ��������������������˴����ɳ�Ϊ��վVIP�û���ѻ�ø�����Դ��</p>
      <p>�������˳�Ա��ע�����<br />
        1. ���˳�Ա���û����Ĺ���<br />
        A�����˳�Ա���û�����ע�ἰʹ���������л����񹲺͹����йط��ɷ��桢����������£�<br />
        B�����˳�Ա���û������ú����κ���в�����š����ӹ�ס����¡�ɫ�顢���ࡢ�Ƿ��������ԡ��˺��ԡ�ɧ���ԡ��̰��ԡ������ԵĻ������ֺ����˺Ϸ�Ȩ�����Ϣ��<br />
        C�����˳�Ա�������κη�ʽ���á�ð�������û�����<br />
        D�������˳�ԱΥ�������涨��Ӧ���ге���Ӧ���ɺ����<?php echo $GLOBALS['C_ZYIIS']['sitename']?>��Ȩ�ڱ�Ҫʱ��ȡ��Ӧ��ʩ��ά����غϷ�Ȩ�档<br />
        2.<br />
        ���˳�Ա���ʺš�����Ͱ�ȫ�ԣ���һ��ע��ɹ�����<?php echo $GLOBALS['C_ZYIIS']['sitename']?>���ͨ������Ϊ<?php echo $GLOBALS['C_ZYIIS']['sitename']?>�ĺϷ���Ա�����õ�һ��������û��������˳�Ա�����û��������밲ȫ��ȫ�����Σ������˳�Ա�������û�����<?php echo $GLOBALS['C_ZYIIS']['sitename']?>���е�������Ϊ�е�ȫ�����Ρ����˳�Ա���뱣�ܺ��Լ����û��������룬����������й¶�����򱣹ܲ��Ƶ����ʺź����뱻����й¶�����˳�Ա���ге���Ӧ�����������˳�Ա�ڷ������κηǷ�ʹ�����˳�Ա�ʺŻ�ȫ©�����������������ͨ��<?php echo $GLOBALS['C_ZYIIS']['sitename']?>��Э������<br />
        3.<br />
        �ṩ�꾡��׼ȷ�ĸ������ϣ������ϸ���ע�����ϣ����ϼ�ʱ���꾡��׼ȷ��Ҫ����ʵ�����˳�Ա���Ͻ���Ϊ<?php echo $GLOBALS['C_ZYIIS']['sitename']?>�ṩ��������ݺ����˳�Ա��÷��ɱ��ϵ�ǰ�ᡣ�����˳�Ա�ṩ�����ϰ����в���ȷ����Ϣ��<?php echo $GLOBALS['C_ZYIIS']['sitename']?>����ֹͣ������˳�Ա���ѵ�Ȩ���������������ɵ��κ���ʧ����<?php echo $GLOBALS['C_ZYIIS']['sitename']?>�޹أ�<?php echo $GLOBALS['C_ZYIIS']['sitename']?>�����κ����Ρ�</p>
      <p>�ġ� ��˽��������<br />
        ÿ�����˳�Ա�ṩ��<?php echo $GLOBALS['C_ZYIIS']['sitename']?>������Ϣʱ��<?php echo $GLOBALS['C_ZYIIS']['sitename']?>���ȡ����Ĳ��豣�����˳�Ա�ĸ�����Ϣ��<?php echo $GLOBALS['C_ZYIIS']['sitename']?>Ҳ���ȡ����İ�ȫ�ֶα����Ѵ洢�ĸ�����Ϣ���������ϼ�����չ��ͻ���ͽ���<?php echo $GLOBALS['C_ZYIIS']['sitename']?>����ʱ���²�����<?php echo $GLOBALS['C_ZYIIS']['sitename']?>����Ϣ�����ƶȣ�����������������⣬<?php echo $GLOBALS['C_ZYIIS']['sitename']?>������δ���Ϸ����˳�Ա��Ȩʱ���������༭��͸¶���˳�Ա���ϼ�����������<?php echo $GLOBALS['C_ZYIIS']['sitename']?>�еı��������ݣ�<br />
        1) �����йط��ɹ涨Ҫ��<br />
        2) �й�Ȩ������Ҫ��<br />
        3)<br />
        ���˳�Ա��Ȩ��������������˳�ԱҪ��<?php echo $GLOBALS['C_ZYIIS']['sitename']?>�ṩ�ض�����ʱ��<?php echo $GLOBALS['C_ZYIIS']['sitename']?>����Ҫ�����˳�Ա�������͵�ַ�ṩ�����������ĵ���������������λ����</p>
      <p>�塢 ��ͣ����ֹ����<br />
              <?php echo $GLOBALS['C_ZYIIS']['sitename']?>���������˳�Ա����Ч��������ͣ����ֹ������Ȩ����<br />
        �κξ�<?php echo $GLOBALS['C_ZYIIS']['sitename']?>ȷ����Υ���˺���Э������˳�Ա��<?php echo $GLOBALS['C_ZYIIS']['sitename']?>��Ȩ�����Ƿ��������ͣ����ֹ�����Ĵ������ŷ��߽�����������ͣ��������ֹ�����Ĵ���<br />
        <?php echo $GLOBALS['C_ZYIIS']['sitename']?>�����䵥����ͣ����ֹ������Э���Ȩ��������<?php echo $GLOBALS['C_ZYIIS']['sitename']?>����������ֹ�ģ�Ӧ��ǰһ����֪ͨ��֪ͨ��������ʽ���ݱ�����Э��������Ĺ涨��</p>
      <p>���� ���շֵ�<br />
        ���˳�Աʹ�ñ���վ���е�һ�����գ�<?php echo $GLOBALS['C_ZYIIS']['sitename']?>�����е��������˳�Ա��������������������ɿ�ԭ������վҳ����Ϣ����������Ĵ���������˳�Ա��ɵ���ʧ��</p>
      <p>�ߡ� ֪ͨ<br />
        ���з������˳�Ա��֪ͨ����ͨ����վҳ��Ĺ��������ʼ����͡�Э��������޸ġ�����������������Ҫ�¼���֪ͨ�����Դ���ʽ���С�</p>
      <p>�ˡ� Э��������ʷѱ�׼���޸�<br />
              <?php echo $GLOBALS['C_ZYIIS']['sitename']?>��Ȩ�ڱ�Ҫʱ�޸ı�����Э����������ݺͺ����ʷѱ�׼���Ҹ��޸��Է��Ϲ��ҷ��ɷ���Ĺ涨�������ֺ����˳�Ա�ĺϷ�Ȩ��Ϊ��Ҫǰ�ᡣ<?php echo $GLOBALS['C_ZYIIS']['sitename']?>����Э������һ�������䶯��<?php echo $GLOBALS['C_ZYIIS']['sitename']?>������ҳ�Ϲ����޸����ݡ��޸ĺ�ĺ���Э��һ������ҳ�Ϲ�������Ч����ԭ���ĺ���Э�顣������ʱ���<?php echo $GLOBALS['C_ZYIIS']['siteurl']?>�������°����Э�顣���˳�Ա����ͬ�����Э��Ķ������ݣ����������˳�<?php echo $GLOBALS['C_ZYIIS']['sitename']?>����<?php echo $GLOBALS['C_ZYIIS']['sitename']?>û���յ����˳�Ա����֪ͨ����ȷ��ʾ���˳�<?php echo $GLOBALS['C_ZYIIS']['sitename']?>�ģ�����Ϊ�����˳�Աѡ���������<?php echo $GLOBALS['C_ZYIIS']['sitename']?>�����ѽ��ܸ�Э������ı䶯���ܱ䶯��Э�������Լ����</p>
      <p>�š� ��������<br />
        ������Э������Ӧ�����л����񹲺͹����ɷ���Ĺ涨�����˳�Ա��<?php echo $GLOBALS['C_ZYIIS']['sitename']?>һ��ͬ������л����񹲺͹����ɵĹ�Ͻ����������Э���������л����񹲺͹�������ִ�ʱ������Щ�����ȫ�����ɹ涨���½��ͻ������޶������������������ɶ�<?php echo $GLOBALS['C_ZYIIS']['sitename']?>�����˳�Ա��������Ч����</p>
      <p>ʮ�� ������<br />
        �뱾����Э���йص�һ�����飬˫��Ӧͨ��Э�̷�ʽ�Ѻý������Э��δ����Ӧ�������ύ�����ٲ�ίԱ������ٲã����ٲý�����վֵĲ���˫������Լ������</p>
      <p>ʮһ��<?php echo $GLOBALS['C_ZYIIS']['sitename']?>��ӭ���˳�Ա����վ��������������ۻ�������ɡ�<br />
              <?php echo $GLOBALS['C_ZYIIS']['sitename']?> ��������վ��չ������ͼ����ķ�չ�������Ʊ�����Э�顣�뽫�뱾����Э���йص��������ۻ����ʷ���a@zyiis.com��<br />
        ���棺 <br />
        ���κ�Υ�����ҷ��ɺ�<?php echo $GLOBALS['C_ZYIIS']['sitename']?>��վ��Ӧ����涨���ֺ���<?php echo $GLOBALS['C_ZYIIS']['sitename']?>��վ�Ϸ�Ȩ�����Ϊ��<?php echo $GLOBALS['C_ZYIIS']['sitename']?>������׷���䷨�����ε�Ȩ����</p>
    </div></td>
   </tr>
  <tr >
    <td align="right"  class="reg_tit">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</form>
 <script language="JavaScript" type="text/javascript">
$(document).ready(function(){
 $.formValidator.initConfig({alertMessage:false});

$("#password").formValidator({onshow:"����������",onfocus:"ʹ��Ӣ����ĸ�����ֵ���ϣ�����6-16���ַ�����",oncorrect:"��д��ȷ"}).InputValidator({min:6,max:16,onerror:"ʹ��Ӣ����ĸ�����ֵ���ϣ�����6-16���ַ�����"});
	$("#passwordre").formValidator({onshow:"��������һ�����������������",onfocus:"��������һ�����������������",oncorrect:"��д��ȷ"}).InputValidator({min:6,max:16,onerror:"��������һ�����������������"}).CompareValidator({desID:"password",operateor:"=",onerror:"��������һ�����������������"});
	
	$("#question").formValidator({onshow:"Ϊ���Զ�ȡ������ʱ������",onfocus:"Ϊ���Զ�ȡ������ʱ������",oncorrect:"��д��ȷ"}).InputValidator({min:1,onerror:"����дһ������"});
	
	$("#answer").formValidator({onshow:"���������������ʾ�����",onfocus:"���������������ʾ�����",oncorrect:"��д��ȷ"}).InputValidator({min:1,onerror:"���������������ʾ�����"});	
	
$("#contact").formValidator({onshow:"��������ϵ������",onfocus:"��������ϵ������",oncorrect:"��д��ȷ"}).InputValidator({min:1,max:20,onerror:"��ϵ����������Ϊ1��20���ַ�����Ϊ������"});
	
	$("#tel").formValidator({empty:true,onshow:"���������Ĺ̶��绰",onfocus:"��ʽ���磺0797-88888888",oncorrect:"��д��ȷ"}).RegexValidator({regexp:"^[[0-9]{3}-|\[0-9]{4}-]?([0-9]{8}|[0-9]{7})?$",onerror:"���������ϵ�绰��ʽ����ȷ"});
	
	
$("#mobile").formValidator({empty:true,onshow:"�����������ֻ�����",onfocus:"�����������ֻ�����",oncorrect:"��д��ȷ"}).InputValidator({min:11,max:11,onerror:"������11λ���ֻ�����"}).RegexValidator({regexp:"mobile",datatype:"enum",onerror:"�ֻ������ʽ����ȷ"});

	$("#qq").formValidator({empty:true,onshow:"������QQ����",onfocus:"������QQ����",oncorrect:"��д��ȷ"}).RegexValidator({regexp:"qq",datatype:"enum",onerror:"QQ��ʽ����ȷ"});

$("#email").formValidator({onshow:"��������������",onfocus:"��ȷ��������ʵ��Ч���һ��������",oncorrect:"��д��ȷ"}).InputValidator({min:6,max:100,onerror:"Email��ַ����Ϊ6��100���ַ�"}).RegexValidator({regexp:"^([\\w-.]+)@(([[0-9]{1,3}.[0-9]{1,3}.[0-9]{1,3}.)|(([\\w-]+.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(]?)$",onerror:"�����ʽ����ȷ"});


 

			
$("#bankname").formValidator({empty:true,onshow:"�������д��ϸ�Ŀ������У��磺xxʡxx��xx����xx֧��",onfocus:"�������д��ϸ�Ŀ������У��磺xxʡxx��xx����xx֧��",oncorrect:"��д��ȷ"}).InputValidator({min:1,onerror:"�������д��ϸ�Ŀ������У��磺xxʡxx��xx����xx֧��"});

$("#accountname").formValidator({onshow:"����Ҫ�����������ʺ�һ�¡�ע��󲻿��޸�",onfocus:"����Ҫ�����������ʺ�һ�¡�ע��󲻿��޸�",oncorrect:"��д��ȷ"}).InputValidator({min:3,onerror:"�տ���������������Ҫ3���ַ�"});

$("#bankacc").formValidator({onshow:"�����������տ��ʺ�",onfocus:"�����������տ��ʺ�",oncorrect:"��д��ȷ"}).InputValidator({min:6,onerror:"�տ��ʺų���������Ҫ6���ַ�"});


var t = $("input:radio[@name='type'][@checked]").val();
if(t == "2"){
			$i("bank0").style.display ='none';
			$i("bank1").style.display ='none';
			$i("bank2").style.display ='none';
			$i("bank3").style.display ='none';
			$i("bank4").style.display ='none';��
			$i("d_service").style.display ='none';�� �� 
			$("#accountname,#bankacc").formValidator({empty:true});
}else {
	$i("d_advservice").style.display ='none';�� �� 
}



/*
$("#serviceid").formValidator({empty:true,onshow:"�粻ѡ�����ǻ�Ϊ���������һ���ͷ���Ա ",onfocus:"�粻ѡ�����ǻ�Ϊ���������һ���ͷ���Ա ",oncorrect:"��д��ȷ"}).InputValidator({min:1,onerror:"�粻ѡ�����ǻ�Ϊ���������һ���ͷ���Ա "});
	$("#advserviceid").formValidator({empty:true,onshow:"�粻ѡ�����ǻ�Ϊ���������һ��������Ա������ϵ ",onfocus:"�粻ѡ�����ǻ�Ϊ���������һ��������Ա������ϵ",oncorrect:"��д��ȷ"}).InputValidator({min:1,onerror:"�粻ѡ�����ǻ�Ϊ���������һ��������Ա������ϵ "});
*/
 

 


$("input:radio[@name='type']").click(function() {
		var t = $("input:radio[@name='type'][@checked]").val();
		if(t == "1"){
			$i("bank0").style.display ='';
			$i("bank1").style.display ='';
			$i("bank2").style.display ='';
			$i("bank3").style.display ='';
			$i("bank4").style.display ='';
			$i("d_service").style.display ='';
			$i("d_advservice").style.display ='none';�� 
			$("#accountname").formValidator({onshow:"����Ҫ�����������ʺ�һ�¡�ע��󲻿��޸�",onfocus:"����Ҫ�����������ʺ�һ�¡�ע��󲻿��޸�",oncorrect:"��д��ȷ"}).InputValidator({min:3,onerror:"�տ���������������Ҫ3���ַ�"});

$("#bankacc").formValidator({onshow:"�����������տ��ʺ�",onfocus:"�����������տ��ʺ�",oncorrect:"��д��ȷ"}).InputValidator({min:6,onerror:"�տ��ʺų���������Ҫ6���ַ�"});
�� 
		}
		if(t == "2"){
			$i("bank0").style.display ='none';
			$i("bank1").style.display ='none';
			$i("bank2").style.display ='none';
			$i("bank3").style.display ='none';
			$i("bank4").style.display ='none';
			$i("d_service").style.display ='none'; ��
			$i("d_advservice").style.display ='';
			$("#accountname,#bankacc").formValidator({empty:true});
 			 �� 
		}
});



});	

function Dobank(){
	var bank = $i("bank").value;
	$i("bank3").style.display ='';
	if(bank=='alipay' || bank=='tenpay'  ){
		$i("bank3").style.display ='none';
	}
}
function Doqq(){
	
}
</script>
  
<?php include TPL_DIR . "/footer.php";?>
