<?php
 if(!defined('IN_ZYADS')) exit;
include TPL_DIR ."/header.php";
include TPL_DIR ."/check.php";
$c = new check;
$cklic = include TPL_DIR ."/cklic.php";
;echo '<div id="Content">
  <div id="Page"> <b class="B1" ></b><b class="B2 B"></b><b class="B3 B"></b><b class="B4 B"></b>
    <div class="B" id="C">
      <div style="font-size:22px"><strong>中易广告联盟系统 V';echo ZYIIS_VERSIONS;echo '</strong></div>
      <ul id="Welcome">
        <li class="done last-done first">
          <div class="body"><em>1. 欢迎使用</em></div>
        </li>
        <li class="current">
          <div class="body"><em>2. 系统检测</em></div>
        </li>
        <li class="">
          <div class="body"><em>3. 注册帐号</em></div>
        </li>
        <li class="">
          <div class="body"><em>4. 数据库</em></div>
        </li>
        <li class="">
          <div class="body"><em>5. 设置联盟</em></div>
        </li>
        <li class="last">
          <div class="body"><em>6. 完成安装</em></div>
        </li>
      </ul>
      <div style="font-size:12px;padding:20px 0 20px 0"><strong>系统检测</strong></div>
      <div id="Checks">
        <ul>
		
          <li>PHP version > 5.1.X <span class="';$php = $c->Php_Version();echo substr($php,0,1)<5 ?"Error": "Succeed";echo '">';echo $php;;echo '</span></li>
		  <li>Zend Optimizer  > 3.3.X <span class="';$zend = $c->Zend_Version();echo substr($zend,0,1)<3 ?"Error": "Succeed";echo '">';echo $zend=='OPTIMIZER_VERSION'?'不支持 请安装Zend Optimizer 3.3.x以上版本': $zend;;echo '</span></li>
		  <li>Mysql <span class="';$mysql = $c->Is_Mysql();echo !$mysql ?"Error": "Succeed";echo '">';echo !$mysql ?"不支持 请配置PHP.INI": "支持";;echo '</span></li>
		  <li>Gd库 <span class="';$gd = $c->Gd_Version();echo !$gd ?"Error": "Succeed";echo '">';echo !$gd ?"不支持 请配置PHP.INI": "支持";;echo '</span></li>
		  
		  <li>DNS网络 <span class="';$internet = $c->Is_Internet();echo !$internet ?"Error": "Succeed";echo '">';echo !$internet ?"服务器DNS无法正常使用": "正常";;echo '</span></li>
		  
		   <li>';echo WWW_DIR.DS.'a';echo ' <span class="';$aa = $c->Is_Writable(WWW_DIR.DS.'a');echo !$aa ?"Error": "Succeed";echo '">';echo !$aa ?"目录权限不够 Windwos：需要写入权限 Linux：需要0777": "正常";;echo '</span></li>
		  
		   <li>';echo WWW_DIR.DS.'cache'.DS.'a';echo ' <span class="';$ca = $c->Is_Writable(WWW_DIR.DS.'cache'.DS.'a');echo !$ca ?"Error": "Succeed";echo '">';echo !$ca ?"目录权限不够 Windwos：需要写入和修改权限 Linux：需要0777": "正常";;echo '</span></li>
		   
		    <li>';echo WWW_DIR.DS.'cache'.DS.'z';echo ' <span class="';$cz = $c->Is_Writable(WWW_DIR.DS.'cache'.DS.'z');echo !$cz ?"Error": "Succeed";echo '">';echo !$cz ?"目录权限不够 Windwos：需要写入和修改权限 Linux：需要0777": "正常";;echo '</span></li>
			
			  <li>';echo WWW_DIR.DS.'cache'.DS.'v';echo ' <span class="';$cv = $c->Is_Writable(WWW_DIR.DS.'cache'.DS.'v');echo !$cv ?"Error": "Succeed";echo '">';echo !$cv ?"目录权限不够 Windwos：需要写入和修改权限 Linux：需要0777": "正常";;echo '</span></li>
			
			
			<li>';echo WWW_DIR.DS.UI;echo ' <span class="';$ui = $c->Is_Writable(WWW_DIR.DS.UI);echo !$ui ?"Error": "Succeed";echo '">';echo !$ui ?"目录权限不够 Windwos：需要写入和修改权限 Linux：需要0777": "正常";;echo '</span></li>
			
		
			
			
			<li>';echo WWW_DIR.DS.'log';echo ' <span class="';$l = $c->Is_Writable(WWW_DIR.DS.'log');echo !$l ?"Error": "Succeed";echo '">';echo !$l ?"目录权限不够 Windwos：需要写入和修改权限 Linux：需要0777": "正常";;echo '</span></li>
			
			 <li>';echo WWW_DIR.DS.'settings.php';echo ' <span class="';$s = $c->Is_Writable(WWW_DIR.DS.'settings.php');echo !$s ?"Error": "Succeed";echo '">';echo !$s ?"文件权限不够 Windwos：需要写入和修改权限 Linux：需要0777": "正常";;echo '</span></li>
			 
			 <li>';echo WWW_DIR.DS.'config.php';echo ' <span class="';$cf = $c->Is_Writable(WWW_DIR.DS.'config.php');echo !$cf?"Error": "Succeed";echo '">';echo !$cf ?"文件权限不够 Windwos：需要写入和修改权限 Linux：需要0777": "正常";;echo '</span></li>
			 
			 <li>';echo WWW_DIR.DS.'conn.php';echo ' <span class="';$cf = $c->Is_Writable(WWW_DIR.DS.'conn.php');echo !$cf?"Error": "Succeed";echo '">';echo !$cf ?"文件权限不够 Windwos：需要写入和修改权限 Linux：需要0777": "正常";;echo '</span></li>
			 
			 	<li>';echo WWW_DIR.DS.'install/index.php';echo ' <span class="';$install = $c->Is_Writable(WWW_DIR.DS.'install/index.php');echo !$install ?"Error": "Succeed";echo '">';echo !$install ?"目录权限不够 Windwos：需要写入和修改权限 Linux：需要0777": "正常";;echo '</span></li>
				
				
		  
        </ul>
      </div>
      <br>
      <div style="padding:10px">
	  ';if($php &&$zend!='OPTIMIZER_VERSION'&&$cklic &&$mysql &&$gd &&$internet &&$aa &&$ca &&$cz &&$l &&$s &&$cf &&$ui &&$cv &&$install){;echo '        <form action="?action=register" method="post">
          <input type="submit" value=" 继续 " onclick="addLoading(\'请稍候，正在安装...\',\'y\')"/>
        </form>
		';}else {;echo '              ';echo "\t\t<div id=\"Tip\" >检测不通过 无法继续</div>\r\n\t\t";;echo '		
		';};echo '   '
?>