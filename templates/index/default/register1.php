<?php if(!defined('IN_ZYADS')) exit(); 
include TPL_DIR . "/header.php";?>
<title>注册会员 <?php echo $GLOBALS['C_ZYIIS']['sitename']?></title>
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
    <td width="130"  align="right" class="reg_tit"> 请选择账户类型： </td>
    <td><?php if ( $GLOBALS['C_ZYIIS']['close_reg_aff']=='0' && $type!='advertiser'){?>
      <input  type="radio" value="1" name="type" size="24"  style="border: medium none ; width: auto;"  <?php if($type!='advertiser') echo 'checked'?> />
      网站主
      <?php }  ?>
      <?php if ( $GLOBALS['C_ZYIIS']['close_reg_adv']=='0' && ($type=='advertiser' || $GLOBALS['C_ZYIIS']['reg_type']!=1)){?>
      <input  type="radio"  value="2" name="type" size="24" style="border: medium none ; width: auto;" <?php if($type=='advertiser') echo 'checked'?> />      广告主
    <?php }?></td>
  </tr>
  <tr>
    <td  colspan="2" class="reg_t14b">设置用户名（不能使用中文）</td>
   </tr>
  <tr>
    <td height="35" align="right" bgcolor="#E7F0F5" class="reg_tit"> <span class="required">*</span>用户名： </td>
    <td bgcolor="#E7F0F5"><input name="username" type="text"  class="reg_input" id="username" /><span id="usernameTip"></span></td>
  </tr>
  <tr>
    <td height="35" align="right" bgcolor="#E7F0F5" class="reg_tit"> <span class="required">*</span>密 码： </td>
    <td bgcolor="#E7F0F5"><input name="password" type="password" class="reg_input" id="password"/><span id="passwordTip"></span></td>
  </tr>
  <tr>
    <td height="35" align="right" bgcolor="#E7F0F5" class="reg_tit"><span class="required">*</span>密码确认：</td>
    <td bgcolor="#E7F0F5"><input name="passwordre" type="password" class="reg_input" id="passwordre"/><span id="passwordreTip"></span></td>
  </tr>
   <tr>
    <td  colspan="2" class="reg_t14b">设置安全问题</td>
   </tr>
   <tr>
     <td  align="right" class="reg_tit"> <span class="required">*</span>安全问题 ：</td>
     <td><input id="question" type="text" value="" name="question"  class="reg_input"/> <span id="questionTip"></span></td>
   </tr>
   <tr>
     <td  align="right" class="reg_tit"><span class="required">*</span>答案：</td>
     <td><input id="answer" type="text" value="" name="answer" class="reg_input"/> <span id="answerTip"></span> </td>
   </tr>
  <tr>
    <td  colspan="2" class="reg_t14b">设置个人信息</td>
   </tr>
   <tr>
     <td align="right" class="reg_tit"><span class="required">*</span>联系人：</td>
    <td><input id="contact" type="text" value="" name="contact" class="reg_input" />
        <span id="contactTip"></span></td>
  </tr>
  <tr>
    <td align="right" class="reg_tit">固定电话：</td>
    <td><input id="tel" type="text" value="" name="tel" class="reg_input"/>
        <span id="telTip"></span></td>
  </tr>
  <tr>
    <td align="right" class="reg_tit">手机号码：</td>
    <td><input id="mobile" type="text" value="" name="mobile" class="reg_input" />
        <span id="mobileTip"></span></td>
  </tr>
  <tr>
    <td align="right" class="reg_tit">Q Q：</td>
    <td><input name="qq" type="text" class="reg_input" id="qq"/>
        <span id="qqTip"></span></td>
  </tr>
  <tr>
    <td align="right" class="reg_tit"><span class="required">*</span>EMAIL地址：</td>
    <td><input name="email" type="text" class="reg_input" id="email"/>
        <span id="emailTip"></span></td>
   </tr>
   <tr id="bank0">
    <td  colspan="2" class="reg_t14b">设置银行信息</td>
   </tr>
  <tr id="bank1">
    <td align="right" class="reg_tit">银行名称：</td>
    <td><select name="bank" id="bank" style="width:160px;" onchange="Dobank()">
      <?php  foreach ($GLOBALS['C_Bank'] as $bank=>$val){?>
      <?php if($val[1]) {?>
      <option value="<?php echo $val[0]?>"><?php echo $bank?></option>
      <?php }?>
      <?php }?>
    </select>    </td>
  </tr>
  <tr id="bank2">
    <td align="right" class="reg_tit"><span class="required">*</span>收款姓名：</td>
    <td><input name="accountname" type="text" class="reg_input" id="accountname"/>
        <span id="accountnameTip"></span></td>
  </tr>
  <tr id="bank3">
    <td align="right" class="reg_tit">开户行：</td>
    <td><input name="bankname" type="text" class="reg_input" id="bankname"/>
        <span id="banknameTip"></span></td>
  </tr>
  <tr id="bank4">
    <td align="right" class="reg_tit"><span class="required">*</span>收款帐号：</td>
    <td><input name="bankacc" type="text" class="reg_input" id="bankacc" />
        <span id="bankaccTip"></span></td>
  </tr>
  
 
  
  
   <tr>
    <td  colspan="2" class="reg_t14b">客服选择<span style="font-size:12px; color:#AAA; font-weight:normal">（请选择一个客服为你服务）</span></td>
   </tr>
   
 
   
  <tr id="d_service">
    <td align="right"  class="reg_tit">请选择客服： </td>
    <td>  
      <?php  
		  $k=0;
		  foreach ((array)$serviceuser AS $s){
	  ?>
      
      
     <input name="serviceid" type="radio" value="<?php echo $s['uid']?>" /><a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $s['qq']?>&site=qq&menu=yes"><?php echo $s['contact']?><img border="0" src="http://wpa.qq.com/pa?p=2:<?php echo $s['qq']?>:17" alt="点击这里给我发消息" title="点击这里给我发消息"></a>&nbsp;&nbsp;

      <?php $k=($k+1)%5; if($k == 0) echo "<div style='height:8px'></div>";}?> 
      <span id="serviceidTip"></span> </td>
  </tr>
  <tr id="d_advservice">
    <td align="right"  class="reg_tit">请选择商务： </td>
    <td>
     <?php  
		  $kv=0;
		  foreach ((array)$advserviceuser AS $s){
	  ?>
     <input name="advserviceid" type="radio" value="<?php echo $s['uid']?>" /><a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $s['qq']?>&site=qq&menu=yes"><?php echo $s['contact']?><img border="0" src="http://wpa.qq.com/pa?p=2:<?php echo $s['qq']?>:17" alt="点击这里给我发消息" title="点击这里给我发消息"></a>&nbsp;&nbsp;

      <?php $kv=($kv+1)%5; if($kv == 0) echo "<div style='height:8px'></div>";}?>
      
        <span id="advserviceidTip"></span> </td>
  </tr>
  <?php if ( $GLOBALS['C_ZYIIS']['reg_code']=='1'){?>
   <tr>
    <td  colspan="2" class="reg_t14b">填写验让码 </td>
   </tr>
 
     <tr>
    <td align="right" class="reg_tit">验让码：</td>
    <td><input name="regcode" type="text" class="regcode" id="bankname"/>
        <img src="http://<?php echo $GLOBALS['C_ZYIIS']['authorized_url']?>/index.php?action=imgcode"  alt= "看不清?请点击刷新验证码" align="absmiddle" id="varImg"  style= "cursor:pointer;"  onclick="refurbish();"/><span id="regcodeTip"></span></td>
  </tr>
  
  <?php }?>
  <tr >
    <td align="right"  class="reg_tit">&nbsp;</td>
    <td><span style=" ">
      <input type="submit" value="同意以下服务条款，提交注册信息" name="event_submit_do_register" tabindex="16" style="border: 2px outset rgb(236, 233, 216); margin: 10px auto 20px; padding: 0pt 6px; background-color: rgb(218, 218, 218); height: 26px; width: auto; color: rgb(17, 17, 17);"/>
    </span></td>
  </tr>
  <tr >
    <td colspan="2"  class="reg_t14b">服务条款</td>
   </tr>
  <tr >
    <td colspan="2" align="right"  class="reg_tit"><div style="background-color:#FAFAFA;border:1px solid #CCCCCC;height:100px; overflow:auto;padding:5px;text-align:left;width:700px; margin-left:30px"> 一、合作协议的确认和接纳<br />
          <?php echo $GLOBALS['C_ZYIIS']['sitename']?>（<?php echo $GLOBALS['C_ZYIIS']['siteurl']?>）所提供的合作项目的所有权和运作权归<?php echo $GLOBALS['C_ZYIIS']['sitename']?>所有。您通过完成注册程序并点击选择“同意以下服务条款，提交注册信息”，表示您与<?php echo $GLOBALS['C_ZYIIS']['sitename']?>网站签订本合作协议（下称“本合作协议”）并接受所有相关条款的约束，以及表示您成为<?php echo $GLOBALS['C_ZYIIS']['sitename']?>的成员（“联盟成员”）。
      <p></p>
      <p>二、 合作内容及费用说明<br />
              <?php echo $GLOBALS['C_ZYIIS']['sitename']?>成员注册成功后，即可登录系统，获得相关产品代码。联盟成员在其网站页面中嵌入其从系统中获得的产品代码后，该网站的访问者可以获得<?php echo $GLOBALS['C_ZYIIS']['sitename']?>提供的产品及/或相关服务。<br />
              <?php echo $GLOBALS['C_ZYIIS']['sitename']?>根据各种产品的不同计费方式统计带有联盟成员特征代码的产品流量，并按此流量向<?php echo $GLOBALS['C_ZYIIS']['sitename']?>成员支付相应合作费用。其各类产品收益模式及分成比例请登录后仔细阅读相关说明，合作费用支付以<?php echo $GLOBALS['C_ZYIIS']['sitename']?>（<?php echo $GLOBALS['C_ZYIIS']['siteurl']?>）网站上发布的标准为准，除非<?php echo $GLOBALS['C_ZYIIS']['sitename']?>与联盟成员间有另行约定并就此另行达成书面协议的。<?php echo $GLOBALS['C_ZYIIS']['sitename']?>有权根据联盟策略随时更改产品的收益模式、分成比例及结算策略，您在此同意始终遵守。</p>
      <p>关于违规及作弊<br />
        加<?php echo $GLOBALS['C_ZYIIS']['sitename']?>的成员，必须自觉遵守本合作协议，如发现任何违规或作弊行为，<?php echo $GLOBALS['C_ZYIIS']['sitename']?>将停止付费并取消其联盟成员资格，同时保留进一步追究法律责任的权利。</p>
      <p>联盟代码能且只能投放在联盟成员提交的域名下，否则被视为违规投放。若要在多个网站或域名下投放联盟代码，须在注册成功后，在“会员管理中心”中登记所有投放<?php echo $GLOBALS['C_ZYIIS']['sitename']?>代码的域名。</p>
      <p>违规或作弊行为包含但不限于：<br />
        1. 任何形式的分拆代码：<br />
        联盟成员注册成功并经审核通过后，需要将从联盟获取的代码完整拷贝到相应页面，不能进行任何形式的代码分拆；<br />
        2. 通过人工及程序制造的无效点击提高流量：<br />
        1）当用户访问成员网站或鼠标经过联盟产品时，自动弹出联盟产品窗口；<br />
        2）通过代理服务器点击，互换点击等一切不产生任何效益的虚假无效点击；<br />
        3）其他无效点击形式；<br />
        3.<br />
        一切非正常投放的产品形式，一切以文字诱导或强制用户点击的行为：<br />
        1）非正当投放方式：<br />
        * 在无实质内容的页面全部投放<?php echo $GLOBALS['C_ZYIIS']['sitename']?>代码；<br />
        * 以电子邮件的形式制造产品点击； <br />
        2）利用文字诱导、强制用户点击或下载：<br />
        <br />
        如这样的描述：“点击此处，可成为本站VIP用户免费获得更多资源”</p>
      <p>三、联盟成员的注册规则<br />
        1. 联盟成员的用户名的管理：<br />
        A、联盟成员的用户名的注册及使用须遵守中华人民共和国的有关法律法规、尊重网络道德；<br />
        B、联盟成员的用户名不得含有任何威胁、恐吓、漫骂、庸俗、亵渎、色情、淫秽、非法、攻击性、伤害性、骚扰性、诽谤性、辱骂性的或其他侵害他人合法权益的信息；<br />
        C、联盟成员不得以任何方式盗用、冒充他人用户名；<br />
        D、如联盟成员违反上述规定，应自行承担相应法律后果；<?php echo $GLOBALS['C_ZYIIS']['sitename']?>有权在必要时采取相应措施以维护相关合法权益。<br />
        2.<br />
        联盟成员的帐号、密码和安全性：您一旦注册成功并经<?php echo $GLOBALS['C_ZYIIS']['sitename']?>审核通过，成为<?php echo $GLOBALS['C_ZYIIS']['sitename']?>的合法成员，将得到一个密码和用户名。联盟成员将对用户名和密码安全负全部责任，且联盟成员对以其用户名在<?php echo $GLOBALS['C_ZYIIS']['sitename']?>进行的所有行为承担全部责任。联盟成员必须保管好自己的用户名和密码，谨防被盗或泄露；如因保管不善导致帐号和密码被盗或泄露，联盟成员自行承担相应后果。如果联盟成员在发现有任何非法使用联盟成员帐号或安全漏洞的情况，可以立即通告<?php echo $GLOBALS['C_ZYIIS']['sitename']?>以协助处理。<br />
        3.<br />
        提供详尽、准确的个人资料，并不断更新注册资料，符合及时、详尽、准确的要求。真实的联盟成员资料将作为<?php echo $GLOBALS['C_ZYIIS']['sitename']?>提供服务的依据和联盟成员获得法律保障的前提。若联盟成员提供的资料包含有不正确的信息，<?php echo $GLOBALS['C_ZYIIS']['sitename']?>保留停止向该联盟成员付费的权利，因虚假资料造成的任何损失，与<?php echo $GLOBALS['C_ZYIIS']['sitename']?>无关，<?php echo $GLOBALS['C_ZYIIS']['sitename']?>不负任何责任。</p>
      <p>四、 隐私保护政策<br />
        每当联盟成员提供给<?php echo $GLOBALS['C_ZYIIS']['sitename']?>个人信息时，<?php echo $GLOBALS['C_ZYIIS']['sitename']?>会采取合理的步骤保护联盟成员的个人信息，<?php echo $GLOBALS['C_ZYIIS']['sitename']?>也会采取合理的安全手段保护已存储的个人信息。由于网上技术发展的突飞猛进，<?php echo $GLOBALS['C_ZYIIS']['sitename']?>会随时更新并公布<?php echo $GLOBALS['C_ZYIIS']['sitename']?>的信息保密制度，除非以下三种情况外，<?php echo $GLOBALS['C_ZYIIS']['sitename']?>不会在未经合法联盟成员授权时，公开、编辑或透露联盟成员资料及其它保存在<?php echo $GLOBALS['C_ZYIIS']['sitename']?>中的保密性内容：<br />
        1) 根据有关法律规定要求；<br />
        2) 有关权力机关要求；<br />
        3)<br />
        联盟成员授权（包括，如果联盟成员要求<?php echo $GLOBALS['C_ZYIIS']['sitename']?>提供特定服务时，<?php echo $GLOBALS['C_ZYIIS']['sitename']?>则需要把联盟成员的姓名和地址提供给与此相关联的第三方如邮政服务单位）。</p>
      <p>五、 暂停与终止合作<br />
              <?php echo $GLOBALS['C_ZYIIS']['sitename']?>将根据联盟成员合作效果保留暂停或终止合作的权利。<br />
        任何经<?php echo $GLOBALS['C_ZYIIS']['sitename']?>确认已违反了合作协议的联盟成员，<?php echo $GLOBALS['C_ZYIIS']['sitename']?>有权决定是否给予其暂停或终止合作的处理，对屡犯者将立即给予暂停合作或终止合作的处理。<br />
        <?php echo $GLOBALS['C_ZYIIS']['sitename']?>保留其单方暂停或终止本合作协议的权利。但若<?php echo $GLOBALS['C_ZYIIS']['sitename']?>单方决定终止的，应提前一个月通知。通知做出的形式依据本合作协议第七条的规定。</p>
      <p>六、 风险分担<br />
        联盟成员使用本网站将承担一定风险：<?php echo $GLOBALS['C_ZYIIS']['sitename']?>将不承担由于联盟成员自身过错、技术或其它不可控原因导致网站页面信息或其它方面的错误而给联盟成员造成的损失。</p>
      <p>七、 通知<br />
        所有发给联盟成员的通知都将通过网站页面的公告或电子邮件传送。协议条款的修改、服务变更、或其它重要事件的通知都会以此形式进行。</p>
      <p>八、 协议条款和资费标准的修改<br />
              <?php echo $GLOBALS['C_ZYIIS']['sitename']?>有权在必要时修改本合作协议条款的内容和合作资费标准，且该修改以符合国家法律法规的规定，并不侵害联盟成员的合法权益为必要前提。<?php echo $GLOBALS['C_ZYIIS']['sitename']?>合作协议条款一旦发生变动，<?php echo $GLOBALS['C_ZYIIS']['sitename']?>将在网页上公布修改内容。修改后的合作协议一旦在网页上公布即有效代替原来的合作协议。您可随时造访<?php echo $GLOBALS['C_ZYIIS']['siteurl']?>查阅最新版合作协议。联盟成员若不同意合作协议改动的内容，可以主动退出<?php echo $GLOBALS['C_ZYIIS']['sitename']?>；若<?php echo $GLOBALS['C_ZYIIS']['sitename']?>没有收到联盟成员书面通知，明确表示其退出<?php echo $GLOBALS['C_ZYIIS']['sitename']?>的，则视为该联盟成员选择继续享用<?php echo $GLOBALS['C_ZYIIS']['sitename']?>服务，已接受该协议条款的变动并受变动后协议条款的约束。</p>
      <p>九、 法律适用<br />
        本合作协议条款应符合中华人民共和国法律法规的规定，联盟成员和<?php echo $GLOBALS['C_ZYIIS']['sitename']?>一致同意接受中华人民共和国法律的管辖。当本合作协议条款与中华人民共和国法律相抵触时，则这些条款将完全按法律规定重新解释或重新修订，而其它条款则依旧对<?php echo $GLOBALS['C_ZYIIS']['sitename']?>及联盟成员产生法律效力。</p>
      <p>十、 争议解决<br />
        与本合作协议有关的一切争议，双方应通过协商方式友好解决；如协商未果，应将争议提交北京仲裁委员会进行仲裁，该仲裁结果是终局的并对双方均有约束力。</p>
      <p>十一、<?php echo $GLOBALS['C_ZYIIS']['sitename']?>欢迎联盟成员对网站服务条款给予评论或提出质疑。<br />
              <?php echo $GLOBALS['C_ZYIIS']['sitename']?> 将根据网站发展的需求和技术的发展不断完善本合作协议。请将与本合作协议有关的所有评论或疑问发往a@zyiis.com。<br />
        警告： <br />
        对任何违反国家法律和<?php echo $GLOBALS['C_ZYIIS']['sitename']?>网站相应管理规定且侵害了<?php echo $GLOBALS['C_ZYIIS']['sitename']?>网站合法权益的行为，<?php echo $GLOBALS['C_ZYIIS']['sitename']?>将保留追究其法律责任的权利。</p>
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

$("#password").formValidator({onshow:"请输入密码",onfocus:"使用英文字母加数字的组合，且在6-16个字符以内",oncorrect:"填写正确"}).InputValidator({min:6,max:16,onerror:"使用英文字母加数字的组合，且在6-16个字符以内"});
	$("#passwordre").formValidator({onshow:"请再输入一遍您上面输入的密码",onfocus:"请再输入一遍您上面输入的密码",oncorrect:"填写正确"}).InputValidator({min:6,max:16,onerror:"请再输入一遍您上面输入的密码"}).CompareValidator({desID:"password",operateor:"=",onerror:"请再输入一遍您上面输入的密码"});
	
	$("#question").formValidator({onshow:"为您自动取回密码时的依据",onfocus:"为您自动取回密码时的依据",oncorrect:"填写正确"}).InputValidator({min:1,onerror:"请填写一个问题"});
	
	$("#answer").formValidator({onshow:"请输入您上面的提示问题答案",onfocus:"请输入您上面的提示问题答案",oncorrect:"填写正确"}).InputValidator({min:1,onerror:"请输入您上面的提示问题答案"});	
	
$("#contact").formValidator({onshow:"请输入联系人姓名",onfocus:"请输入联系人姓名",oncorrect:"填写正确"}).InputValidator({min:1,max:20,onerror:"联系人姓名长度为1至20个字符，且为必填项"});
	
	$("#tel").formValidator({empty:true,onshow:"请输入您的固定电话",onfocus:"格式例如：0797-88888888",oncorrect:"填写正确"}).RegexValidator({regexp:"^[[0-9]{3}-|\[0-9]{4}-]?([0-9]{8}|[0-9]{7})?$",onerror:"您输入的联系电话格式不正确"});
	
	
$("#mobile").formValidator({empty:true,onshow:"请输入您的手机号码",onfocus:"请输您的入手机号码",oncorrect:"填写正确"}).InputValidator({min:11,max:11,onerror:"请输入11位的手机号码"}).RegexValidator({regexp:"mobile",datatype:"enum",onerror:"手机号码格式不正确"});

	$("#qq").formValidator({empty:true,onshow:"请输入QQ号码",onfocus:"请输入QQ号码",oncorrect:"填写正确"}).RegexValidator({regexp:"qq",datatype:"enum",onerror:"QQ格式不正确"});

$("#email").formValidator({onshow:"请输入您的邮箱",onfocus:"请确保他的真实有效，找回密码必用",oncorrect:"填写正确"}).InputValidator({min:6,max:100,onerror:"Email地址长度为6至100个字符"}).RegexValidator({regexp:"^([\\w-.]+)@(([[0-9]{1,3}.[0-9]{1,3}.[0-9]{1,3}.)|(([\\w-]+.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(]?)$",onerror:"邮箱格式不正确"});


 

			
$("#bankname").formValidator({empty:true,onshow:"请务必填写详细的开户分行，如：xx省xx市xx分行xx支行",onfocus:"请务必填写详细的开户分行，如：xx省xx市xx分行xx支行",oncorrect:"填写正确"}).InputValidator({min:1,onerror:"请务必填写详细的开户分行，如：xx省xx市xx分行xx支行"});

$("#accountname").formValidator({onshow:"必须要跟开户银行帐号一致。注册后不可修改",onfocus:"必须要跟开户银行帐号一致。注册后不可修改",oncorrect:"填写正确"}).InputValidator({min:3,onerror:"收款姓名长度最少需要3个字符"});

$("#bankacc").formValidator({onshow:"请输入您的收款帐号",onfocus:"请输入您的收款帐号",oncorrect:"填写正确"}).InputValidator({min:6,onerror:"收款帐号长度最少需要6个字符"});


var t = $("input:radio[@name='type'][@checked]").val();
if(t == "2"){
			$i("bank0").style.display ='none';
			$i("bank1").style.display ='none';
			$i("bank2").style.display ='none';
			$i("bank3").style.display ='none';
			$i("bank4").style.display ='none';　
			$i("d_service").style.display ='none';　 　 
			$("#accountname,#bankacc").formValidator({empty:true});
}else {
	$i("d_advservice").style.display ='none';　 　 
}



/*
$("#serviceid").formValidator({empty:true,onshow:"如不选择，我们会为您随机分配一名客服人员 ",onfocus:"如不选择，我们会为您随机分配一名客服人员 ",oncorrect:"填写正确"}).InputValidator({min:1,onerror:"如不选择，我们会为您随机分配一名客服人员 "});
	$("#advserviceid").formValidator({empty:true,onshow:"如不选择，我们会为您随机分配一名商务人员与您联系 ",onfocus:"如不选择，我们会为您随机分配一名商务人员与您联系",oncorrect:"填写正确"}).InputValidator({min:1,onerror:"如不选择，我们会为您随机分配一名商务人员与您联系 "});
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
			$i("d_advservice").style.display ='none';　 
			$("#accountname").formValidator({onshow:"必须要跟开户银行帐号一致。注册后不可修改",onfocus:"必须要跟开户银行帐号一致。注册后不可修改",oncorrect:"填写正确"}).InputValidator({min:3,onerror:"收款姓名长度最少需要3个字符"});

$("#bankacc").formValidator({onshow:"请输入您的收款帐号",onfocus:"请输入您的收款帐号",oncorrect:"填写正确"}).InputValidator({min:6,onerror:"收款帐号长度最少需要6个字符"});
　 
		}
		if(t == "2"){
			$i("bank0").style.display ='none';
			$i("bank1").style.display ='none';
			$i("bank2").style.display ='none';
			$i("bank3").style.display ='none';
			$i("bank4").style.display ='none';
			$i("d_service").style.display ='none'; 　
			$i("d_advservice").style.display ='';
			$("#accountname,#bankacc").formValidator({empty:true});
 			 　 
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
