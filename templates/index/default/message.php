<?php if(!defined('IN_ZYADS')) exit(); 
include TPL_DIR . "/header.php";
include P_TPL . "/message.lang.php";
?>
<title>��Ϣ <?php echo $GLOBALS['C_ZYIIS']['sitename']?></title>
<div class="regtbg"></div>
<table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td height="60" style="border-bottom:1px solid #E3E3E3;color:#999999;font-size:14px;margin:15px 0pt 10px;">ϵͳ��ʾ��Ϣ</td>
      </tr>
      <tr>
        <td height="200" align="center" style="padding-left:20px">
		   <?php if($t == 'toemail') {?>
            <h3 style="font-size:14px; font-weight:bold;"><img src="/templates/<?php echo Z_TPL?>/images/ok.jpg" alt="" align="absmiddle"/> ��ӭ���ļ��ˣ����ڰ����²��輤�������ʺţ�</h3>
          <br/>
          ��һ���� <span style="color:#000;">�鿴���ĵ������䣬���Ǹ��������˼����ʼ�</span><br/>
          <br/>
          �ڶ����� <span style="color:#000;">��������ʼ��е����ӣ����ɼ��������ʺţ�</span>
          </li>
		  
            <?php } elseif($t == 'reg_succeed') {?>
            <img src="/templates/<?php echo Z_TPL?>/images/ok.jpg" alt="" align="absmiddle"/> <span style="font-size:14px">ע��ɹ�����ӭ���ļ���&nbsp; <a href="index.php?action=login" class="thickbox" title="�û�����">���ϵ�¼</a></span>
			
			
            <?php } elseif($t == 'activate_succeed') {?>
            <img src="/templates/<?php echo Z_TPL?>/images/ok.jpg" alt="" align="absmiddle"/> <span style="font-size:14px">��֤�ɹ�������<a href="index.php?action=login" class="thickbox" title="�û�����"> ��¼ </a>��ȡ����&nbsp; </span>
			
			 <?php } elseif($t == 'findpwd_succeed') {?>
            <img src="/templates/<?php echo Z_TPL?>/images/ok.jpg" alt="" align="absmiddle"/> <span style="font-size:14px">ϵͳ�ɹ����������������������ѷ��͵���������</span>
			
			<?php } elseif($t == 'answer_err') {?>
            <img src="/templates/<?php echo Z_TPL?>/images/sad.jpg" alt="" align="absmiddle"/> <span style="font-size:14px">�ش����ⲻ��ƥ��</span>
			
            <?php } else {?>
            <img src="/templates/<?php echo Z_TPL?>/images/sad.jpg" alt="" align="absmiddle"/> <span style="font-size:14px"><?php echo $m[$t]!='' ? $m[$t] : "δ֪����Ϣ"?></span>
            <?php }?></td>
      </tr>
    </table>
 <?php include TPL_DIR . "/footer.php";?>