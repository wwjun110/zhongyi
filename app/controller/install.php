<?php

class Controller_Install
{
public function controller_install( )
{
}
public function actionindex( )
{
redirect( "/install/index.php");
}
public function actionregister( )
{
if ( _ispost( ) &&$_POST['account'] )
{
add_magic_quotes( $_POST );
$get = $this->streamgetcontents( "http://v7.i6w.cn/reg.php",$_POST );
if ( $get == "e0")
{
$dotext = "ÑéÖ¤ÂëÎÞ·¨È·ÈÏ£¬ÇëÖØÐÂÊäÈë";
}
else if ( $get == "e2")
{
$dotext = "ÓÃ»§ÃûÃÜÂë²»¶Ô£¬ÇëÖØÐÂµÇÈë";
}
else if ( $get == "e1")
{
$dotext = "ÓÃ»§Ãû»¹Ã»ÓÐÉóºËÍ¨¹ý£¬ÎÞ·¨°²×°";
}
else if ( $get == "e3")
{
$dotext = "ÊÚÈ¨ÓòÃûÒÑ±»×¢²á,ÇëÖØÐÂÊäÈë";
}
else if ( $get == "e5")
{
$dotext = "ÓÃ»§ÃûÒÑ±»×¢²á,ÇëÖØÐÂÊäÈë";
}
if ( $get == "ok")
{
$_SESSION['sp'] = 3;
redirect( "?action=db");
}
}
require( TPL_DIR."/register.php");
}
public function actiondb( )
{
$get_s = $_SESSION['sp'];
if ( $get_s != 3 )
{
redirect( "/install/index.php");
}
if ( _ispost( ) )
{
$dbhost = $_POST['dbhost'];
$dbuser = $_POST['dbuser'];
$dbpassword = $_POST['dbpassword'];
$dbname = $_POST['dbname'];
$dbport = $_POST['dbport'];
if ( !$dbhost &&!$dbname &&!$dbport &&!$dbuser )
{
$dotext = "´ø*Ïî²»ÄÜÎª¿Õ";
}
$db = @mysql_connect( $dbhost.":".$dbport,$dbuser,$dbpassword );
$_SESSION['dbs'] = $_POST;
if ( !$db )
{
$dotext = "´íÎó£ºÁ¬½ÓÊý¾Ý¿â·þÎñÆ÷Ê§°Ü ".mysql_errno( ).": ".mysql_error( );
}
else
{
mysql_query( "SET NAMES gbk",$db );
if ( !@mysql_select_db( $dbname,$db ) )
{
mysql_query( "CREATE DATABASE ".$dbname );
if ( !@mysql_select_db( $dbname,$db ) )
{
$dotext = "´íÎó£ºÖ¸¶¨µÄÊý¾Ý¿â²»´æÔÚ, ÏµÍ³Ò²ÎÞ·¨×Ô¶¯½¨Á¢ ".mysql_errno( ).": ".mysql_error( );
}
else
{
$installsql = "y";
}
}
else
{
$installsql = "y";
$query = mysql_query( "SHOW TABLE STATUS FROM `".$dbname."`");
while ( $row = mysql_fetch_array( $query ) )
{
if ( !( $row['Name'] == "zyads_admin") ||!( $row['Name'] == "zyads_plan") )
{
echo "<script>\r\n\t\t\t\t\t\tif(!confirm(\"¾¯¸æ£¡µ±Ç°Êý¾Ý¿âÒÑ°²×°ÖÐÒ×¹ã¸æÁªÃËÏµÍ³\\n\\nÊÇ·ñ¸²¸Ç£¿¡£\\n\\nµã¡°È·¶¨¡±¸²¸Ç£¬µã¡°È¡Ïû¡±È¡Ïû²Ù×÷¡£\")){\r\n\t\t\t\t\t\t    location.href='?action=db';\r\n\t\t\t\t\t\t}else{\r\n\t\t\t\t\t\t\tlocation.href='?action=db&f=y';\r\n\t\t\t\t\t\t}</script>";
$installsql = "n";
}
}
}
}
}
if ( $_GET['f'] == "y"||$installsql == "y")
{
$getsql = $this->getzyiisql( );
if ( empty( $getsql ) )
{
$dotext = "Êý¾Ý¿â½Å±¾ÎÄ¼þlib/zyiis.sql¶ªÊ§£¬Çë¼ì²élib/zyiis.sqlÎÄ¼þÊÇ·ñ´æÔÚ»òÊÇ·ñÓÐ¶ÁÈ¡µÄÈ¨ÏÞ";
}
else
{
require( TPL_DIR."/db.php");
$this->excute( $getsql );
}
}
require( TPL_DIR."/db.php");
}
public function excute( $sql )
{
$cfgs = $_SESSION['dbs'];
$dbhost = $cfgs['dbhost'];
$sitetype = $cfgs['dbuser'];
$dbpassword = $cfgs['dbpassword'];
$dbname = $cfgs['dbname'];
$dbport = $cfgs['dbport'];
$dbo = @mysql_connect( $dbhost.":".$dbport,$sitetype,$dbpassword );
mysql_query( "SET NAMES gbk",$dbo );
mysql_select_db( $dbname,$dbo );
mysql_query( "SET sql_mode=''",$dbo );
$sql = str_replace( "\r","\n",$sql );
$arrs = array( );
$p = 0;
foreach ( explode( ";\n",trim( $sql ) ) as $query )
{
$sq = explode( "\n",trim( $query ) );
foreach ( $sq as $query )
{
$arrs[$p] .= $query[0] == "#"||$query[0].$query[1] == "--"?"": $query;
}
++$p;
}
unset( $sql );
echo "<div style='position:absolute;top:0px;right:0px;width:260px;background:none repeat scroll 0 0 #FFF1A8;padding:10px;color:#000;;font-size:12px; '>Êý¾Ý¿âÁ¬½Ó³É¹¦£¬ÕýÔÚ½¨Á¢Êý¾Ý±í......<br><br>";
ob_end_clean( );
flush( );
foreach ( $arrs as $query )
{
$query = trim( $query );
if ( $query )
{
if ( substr( $query,0,12 ) == "CREATE TABLE")
{
$name = preg_replace( "/CREATE TABLE `([a-z0-9_]+)` .*/is","\\1",$query );
echo "ÐÂ½¨: <b>".$name."</b> Íê±Ï......<br>";
if ( !mysql_query( $query,$dbo ) )
{
exit( mysql_error( )."<br>".$query );
}
}
else
{
if ( !mysql_query( $query,$dbo ) )
{
exit( mysql_error( )."<br>".$query );
}
}
}
flush( );
}
$j = 2;
for ( ;$j <32;++$j	)
{
mysql_query( "create table zyads_adsip".$j." like zyads_adsip1",$dbo );
}
$j = 2;
for ( ;$j <32;++$j	)
{
mysql_query( "create table zyads_adsipinfo".$j." like zyads_adsipinfo1",$dbo );
}
$j = 1;
for ( ;$j <10;++$j	)
{
mysql_query( "create table zyads_adsipreferer".$j." like zyads_adsipreferer0",$dbo );
}
$j = 1;
for ( ;$j <10;++$j	)
{
mysql_query( "create table zyads_adsipsiteurl".$j." like zyads_adsipsiteurl0",$dbo );
}
$j = 1;
for ( ;$j <10;++$j	)
{
mysql_query( "create table zyads_adsipuseragent".$j." like zyads_adsipuseragent0",$dbo );
}
echo "<br>Íê³É</div>";
sleep( 1 );
$_SESSION['sp'] = 4;
$this->puts( );
$this->putss( );
redirect( "s.php?action=config");
}
public function puts( )
{
$cfgs = $_SESSION['dbs'];
$filename = WWW_DIR."/config.php";
$content = file_get_contents( $filename );
$content = str_replace( "{dbhost}",$cfgs['dbhost'],$content );
$content = str_replace( "{dbport}",$cfgs['dbport'],$content );
$content = str_replace( "{dbuser}",$cfgs['dbuser'],$content );
$content = str_replace( "{dbpsw}",$cfgs['dbpassword'],$content );
$content = str_replace( "{dbname}",$cfgs['dbname'],$content );
file_put_contents( $filename,$content );
}
public function putss( )
{
$cfgs = $_SESSION['dbs'];
$filename = WWW_DIR."/conn.php";
$content = file_get_contents( $filename );
$content = str_replace( "{dbhost}",$cfgs['dbhost'],$content );
$content = str_replace( "{dbport}",$cfgs['dbport'],$content );
$content = str_replace( "{dbuser}",$cfgs['dbuser'],$content );
$content = str_replace( "{dbpsw}",$cfgs['dbpassword'],$content );
$content = str_replace( "{dbname}",$cfgs['dbname'],$content );
file_put_contents( $filename,$content );
}
public function getzyiisql( )
{
$sqls = LIB_DIR."/zyiis.sql";
$stream = @fopen( $sqls,"r");
$sql = @fread( $stream,@filesize( $sqls ) );
@fclose( $stream );
return $sql;
}
public function actionconfig( )
{
$get_s = $_SESSION['sp'];
if ( $get_s <4 )
{
redirect( "/install/index.php");
}
if ( _ispost( ) )
{
$db = gc( );
$username = h( trim( $_POST['username'] ) );
$password = md5( md5( h( $_POST['passwd'] ).$username ) );
$urlkey = zyencode( 5 );
$siteurl = getdomain( $_POST['authorized_url'] );
$db->query( "REPLACE INTO zyads_settings VALUES ('sitename', '".$_POST['sitename']."')");
$db->query( "REPLACE INTO zyads_settings VALUES ('authorized_url', '".$_POST['authorized_url']."')");
$db->query( "REPLACE INTO zyads_settings VALUES ('siteip', '".$_SERVER['SERVER_ADDR']."')");
$db->query( "REPLACE INTO zyads_settings VALUES ('url_key', '".$urlkey."')");
$db->query( "REPLACE INTO zyads_settings VALUES ('siteurl', '".$siteurl."')");
$db->query( "REPLACE INTO zyads_settings VALUES ('jumpurl', 'http://".$_POST['authorized_url']."')");
$db->query( "REPLACE INTO zyads_settings VALUES ('codeurl', 'http://".$_POST['authorized_url']."')");
$db->query( "REPLACE INTO zyads_settings VALUES ('imgurl', 'http://".$_POST['authorized_url']."')");
$db->query( "REPLACE INTO zyads_settings VALUES ('jsurl', 'http://".$_POST['authorized_url']."')");
$sql = "INSERT INTO `zyads_admin` (`username`, `password`, `usertype`, `userinfo`, `loginnum`, `logintime`, `status`, `loginip`, `adminaction`, `addtime`) VALUES('".$username."', '{$password}', 1, '', 1, '00000-00-00 00:00:00', 1, '0.0.0.0', '', '".DATETIMES."')";
$db->query( $sql );
$_SESSION['sp'] = 5;
redirect( "?action=last");
}
require( TPL_DIR."/config.php");
}
public function actionlast( )
{
$get_s = $_SESSION['sp'];
if ( $get_s <5 )
{
redirect( "/install/index.php");
}
$filename = WWW_DIR."/install/index.php";
$tmp_filename = md5( random( 8 ) );
@rename( $filename,$tmp_filename );
$othermodel = Z::getsingleton( "model_otherclass");
$q = $othermodel->writtensetting( );
require( TPL_DIR."/last.php");
}
public function actionimgcode( )
{
$this->start( "http://reg.zyiis.com/start.php");
$imgcode = $this->imgcode( "http://reg.zyiis.com/imgcode.php");
header( "Content-type: image/jpeg");
echo $imgcode;
}
public function check( )
{
require( TPL_DIR."/check.php");
}
public function streamgetcontents( $v,$text )
{
$arr = array(
"http"=>array(
"timeout"=>8,
"method"=>"POST",
"header"=>"User-Agent:Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 6.0)\r\nAccept:*/*\r\nReferer:www.zyiis.com\r\nCookie:".$_SESSION['doCookie'],
"content"=>http_build_query( $text,"","&")
)
);
$string = @file_get_contents( $v,FALSE,@stream_context_create( $arr ) );
return $string;
}
}
session_start( );

?>