<?php
require '../config.php';
$s = (int)$_GET['s'];
$a = (int)$_GET['a'];
if($a){
	setcookie("C_recommend", $a, TIMES+86400*30 , '/','.'.$GLOBALS['C_ZYIIS']['siteurl']);
}
if($s){
	setcookie("S_serviceid", $s, TIMES+86400*30 , '/','.'.$GLOBALS['C_ZYIIS']['siteurl']);	
}
$url = $GLOBALS['C_ZYIIS']['make_html'] ? "/".UI."/register":"/?action=register";
header("Location: ".$url);
?>