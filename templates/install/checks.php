<?php
 if(!defined('IN_ZYADS')) exit;
include TPL_DIR ."/header.php";
include TPL_DIR ."/check.php";
$c = new check;
$cklic = include TPL_DIR ."/cklic.php";
;echo '<div id="Content">
  <div id="Page"> <b class="B1" ></b><b class="B2 B"></b><b class="B3 B"></b><b class="B4 B"></b>
    <div class="B" id="C">
      <div style="font-size:22px"><strong>���׹������ϵͳ V';echo ZYIIS_VERSIONS;echo '</strong></div>
      <ul id="Welcome">
        <li class="done last-done first">
          <div class="body"><em>1. ��ӭʹ��</em></div>
        </li>
        <li class="current">
          <div class="body"><em>2. ϵͳ���</em></div>
        </li>
        <li class="">
          <div class="body"><em>3. ע���ʺ�</em></div>
        </li>
        <li class="">
          <div class="body"><em>4. ���ݿ�</em></div>
        </li>
        <li class="">
          <div class="body"><em>5. ��������</em></div>
        </li>
        <li class="last">
          <div class="body"><em>6. ��ɰ�װ</em></div>
        </li>
      </ul>
      <div style="font-size:12px;padding:20px 0 20px 0"><strong>ϵͳ���</strong></div>
      <div id="Checks">
        <ul>
		
          <li>PHP version > 5.1.X <span class="';$php = $c->Php_Version();echo substr($php,0,1)<5 ?"Error": "Succeed";echo '">';echo $php;;echo '</span></li>
		  <li>Zend Optimizer  > 3.3.X <span class="';$zend = $c->Zend_Version();echo substr($zend,0,1)<3 ?"Error": "Succeed";echo '">';echo $zend=='OPTIMIZER_VERSION'?'��֧�� �밲װZend Optimizer 3.3.x���ϰ汾': $zend;;echo '</span></li>
		  <li>Mysql <span class="';$mysql = $c->Is_Mysql();echo !$mysql ?"Error": "Succeed";echo '">';echo !$mysql ?"��֧�� ������PHP.INI": "֧��";;echo '</span></li>
		  <li>Gd�� <span class="';$gd = $c->Gd_Version();echo !$gd ?"Error": "Succeed";echo '">';echo !$gd ?"��֧�� ������PHP.INI": "֧��";;echo '</span></li>
		  
		  <li>DNS���� <span class="';$internet = $c->Is_Internet();echo !$internet ?"Error": "Succeed";echo '">';echo !$internet ?"������DNS�޷�����ʹ��": "����";;echo '</span></li>
		  
		   <li>';echo WWW_DIR.DS.'a';echo ' <span class="';$aa = $c->Is_Writable(WWW_DIR.DS.'a');echo !$aa ?"Error": "Succeed";echo '">';echo !$aa ?"Ŀ¼Ȩ�޲��� Windwos����Ҫд��Ȩ�� Linux����Ҫ0777": "����";;echo '</span></li>
		  
		   <li>';echo WWW_DIR.DS.'cache'.DS.'a';echo ' <span class="';$ca = $c->Is_Writable(WWW_DIR.DS.'cache'.DS.'a');echo !$ca ?"Error": "Succeed";echo '">';echo !$ca ?"Ŀ¼Ȩ�޲��� Windwos����Ҫд����޸�Ȩ�� Linux����Ҫ0777": "����";;echo '</span></li>
		   
		    <li>';echo WWW_DIR.DS.'cache'.DS.'z';echo ' <span class="';$cz = $c->Is_Writable(WWW_DIR.DS.'cache'.DS.'z');echo !$cz ?"Error": "Succeed";echo '">';echo !$cz ?"Ŀ¼Ȩ�޲��� Windwos����Ҫд����޸�Ȩ�� Linux����Ҫ0777": "����";;echo '</span></li>
			
			  <li>';echo WWW_DIR.DS.'cache'.DS.'v';echo ' <span class="';$cv = $c->Is_Writable(WWW_DIR.DS.'cache'.DS.'v');echo !$cv ?"Error": "Succeed";echo '">';echo !$cv ?"Ŀ¼Ȩ�޲��� Windwos����Ҫд����޸�Ȩ�� Linux����Ҫ0777": "����";;echo '</span></li>
			
			
			<li>';echo WWW_DIR.DS.UI;echo ' <span class="';$ui = $c->Is_Writable(WWW_DIR.DS.UI);echo !$ui ?"Error": "Succeed";echo '">';echo !$ui ?"Ŀ¼Ȩ�޲��� Windwos����Ҫд����޸�Ȩ�� Linux����Ҫ0777": "����";;echo '</span></li>
			
		
			
			
			<li>';echo WWW_DIR.DS.'log';echo ' <span class="';$l = $c->Is_Writable(WWW_DIR.DS.'log');echo !$l ?"Error": "Succeed";echo '">';echo !$l ?"Ŀ¼Ȩ�޲��� Windwos����Ҫд����޸�Ȩ�� Linux����Ҫ0777": "����";;echo '</span></li>
			
			 <li>';echo WWW_DIR.DS.'settings.php';echo ' <span class="';$s = $c->Is_Writable(WWW_DIR.DS.'settings.php');echo !$s ?"Error": "Succeed";echo '">';echo !$s ?"�ļ�Ȩ�޲��� Windwos����Ҫд����޸�Ȩ�� Linux����Ҫ0777": "����";;echo '</span></li>
			 
			 <li>';echo WWW_DIR.DS.'config.php';echo ' <span class="';$cf = $c->Is_Writable(WWW_DIR.DS.'config.php');echo !$cf?"Error": "Succeed";echo '">';echo !$cf ?"�ļ�Ȩ�޲��� Windwos����Ҫд����޸�Ȩ�� Linux����Ҫ0777": "����";;echo '</span></li>
			 
			 <li>';echo WWW_DIR.DS.'conn.php';echo ' <span class="';$cf = $c->Is_Writable(WWW_DIR.DS.'conn.php');echo !$cf?"Error": "Succeed";echo '">';echo !$cf ?"�ļ�Ȩ�޲��� Windwos����Ҫд����޸�Ȩ�� Linux����Ҫ0777": "����";;echo '</span></li>
			 
			 	<li>';echo WWW_DIR.DS.'install/index.php';echo ' <span class="';$install = $c->Is_Writable(WWW_DIR.DS.'install/index.php');echo !$install ?"Error": "Succeed";echo '">';echo !$install ?"Ŀ¼Ȩ�޲��� Windwos����Ҫд����޸�Ȩ�� Linux����Ҫ0777": "����";;echo '</span></li>
				
				
		  
        </ul>
      </div>
      <br>
      <div style="padding:10px">
	  ';if($php &&$zend!='OPTIMIZER_VERSION'&&$cklic &&$mysql &&$gd &&$internet &&$aa &&$ca &&$cz &&$l &&$s &&$cf &&$ui &&$cv &&$install){;echo '        <form action="?action=register" method="post">
          <input type="submit" value=" ���� " onclick="addLoading(\'���Ժ����ڰ�װ...\',\'y\')"/>
        </form>
		';}else {;echo '              ';echo "\t\t<div id=\"Tip\" >��ⲻͨ�� �޷�����</div>\r\n\t\t";;echo '		
		';};echo '   '
?>