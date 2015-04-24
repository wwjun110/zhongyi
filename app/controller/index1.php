<?php

include './config.inc.php';
include './include/db_mysql.class.php';
$db = new dbstuff;
$db->connect($dbhost,$dbuser,$dbpw,$dbname,$pconnect);
unset($dbhost,$dbuser,$dbpw,$dbname,$pconnect);
include './uc_client/client.php';
class Controller_Index{
public $newsmodel = NULL;
public $usermodel = NULL;
public $news = NULL;
public function controller_index( )
{
$this->newsmodel = Z::getsingleton( "model_newsclass");
$this->news = $this->newsmodel->getallnews( );
}
public function actionindex( )
{
$actiontype = $_REQUEST['actiontype'];
$helpmodel = Z::getsingleton( "model_helpclass");
$statsmodel = Z::getsingleton( "model_statsclass");
if ( $_GET['pv'] == "yes")
{
$views = ( integer )( $statsmodel->planstats_views( ) +$GLOBALS['C_ZYIIS']['add_day_pv'] );
echo $views;
exit( );
}
if ( $actiontype == "activate")
{
$usermodel = Z::getsingleton( "model_userclass");
$q = $usermodel->tuserstatus( );
if ( $q )
{
redirect( "index.php?action=message&t=activate_succeed");
}
else
{
redirect( "index.php?action=message&t=activate_err");
}
}
$sitemodel = Z::getsingleton( "model_siteclass");
$site = $sitemodel->getsitenametype( );
$news = $this->news;
$uid = ( integer )$_GET['uid'];
$auid = base64_decode( $_GET['a'] );
if ( $auid )
{
setcookie( "C_recommend",$auid,TIMES +2592000,"/",".".$GLOBALS['C_ZYIIS']['siteurl'] );
}
if ( $uid )
{
setcookie( "C_recommend",$uid,TIMES +2592000,"/",".".$GLOBALS['C_ZYIIS']['siteurl'] );
}
require( TPL_DIR."/index.php");
}
public function actionfindpasswd( )
{
$actiontype = $_REQUEST['actiontype'];
if ( $actiontype == "next"||$actiontype == "find")
{
$usermodel = Z::getsingleton( "model_userclass");
$u = $usermodel->getusersusername( );
if ( !$u )
{
toplocation( "index.php?action=message&t=answer_err");
}
}
if ( $actiontype == "find")
{
$f = $usermodel->userauth( $u );
if ( $f )
{
toplocation( "index.php?action=message&t=findpwd_succeed");
}
else
{
toplocation( "index.php?action=message&t=answer_err");
}
}
require( TPL_DIR."/findpasswd.php");
}
public function actionshownews( )
{
$news = $this->news;
$newsid = ( integer )$_GET['id'];
$v = $this->newsmodel->adsnewsrow( $newsid );
$up = $this->newsmodel->adsnewslowone( $newsid );
$np = $this->newsmodel->adsnewshightone( $newsid );
require( TPL_DIR."/show.php");
}
public function actionnews( )
{
$news = $this->news;
$newsid = ( integer )$_GET['id'];
$v = $this->newsmodel->adsnewsrow( $newsid );
$up = $this->newsmodel->adsnewslowone( $newsid );
$np = $this->newsmodel->adsnewshightone( $newsid );
require( TPL_DIR."/show.php");
}
public function actionnewslist( )
{
$newssql = $this->newsmodel->tnewsqlandnums( );
z::loadclass( "pager");
$page = new Pager( );
$page->url = "/index.php?action=newslist";
$page->totalCount = 20;
$allnews = $page->parse_sqls( $newssql,$this->newsmodel->dbo );
$viewpage = $page->navbar( );
require( TPL_DIR."/newslist.php");
}
public function actionshowhelp( )
{
$news = $this->news;
$helpmodel = Z::getsingleton( "model_helpclass");
$v = $helpmodel->getadshelprow( );
$up = $helpmodel->getadshelplowidrow( );
$np = $helpmodel->getadshelphightidrows( );
require( TPL_DIR."/show.php");
}
public function actionadvertiser( )
{
$news = $this->news;
$helpmodel = Z::getsingleton( "model_helpclass");
$help = $helpmodel->getadshelptyperows( );
require( TPL_DIR."/advertiser.php");
}
public function actionaffiliate( )
{
$news = $this->news;
$helpmodel = Z::getsingleton( "model_helpclass");
$help = $helpmodel->getaffiliatehelp( );
require( TPL_DIR."/affiliate.php");
}
public function actioncompany( )
{
$helpmodel = Z::getsingleton( "model_helpclass");
$help = $helpmodel->getallhelp( );
$news = $this->news;
require( TPL_DIR."/company.php");
}
public function actionstyle( )
{
$news = $this->news;
require( TPL_DIR."/style.php");
}
public function actionunion( )
{
$helpmodel = Z::getsingleton( "model_helpclass");
$help = $helpmodel->getallhelp( );
$news = $this->news;
require( TPL_DIR."/union.php");
}
public function actionhelp( )
{
$id = ( integer )$_GET['id'];
if ( $id )
{
return $this->actionshowhelp( );
}
$news = $this->news;
$helpmodel = Z::getsingleton( "model_helpclass");
$aff = $helpmodel->getaffiliatehelp( );
$adv = $helpmodel->getadshelptyperows( );
require( TPL_DIR."/help.php");
}
public function actioncontact( )
{
$news = $this->news;
require( TPL_DIR."/contact.php");
}
public function actionlogin( )
{
$at = h( $_GET['at'] );
require( TPL_DIR."/login.php");
}
public function actionimgcode( )
{
$imgcode = Z::getsingleton( "ImgCode");
$imgcode->image( );
}
public function actionregister( )
{
$usermodel = Z::getsingleton( "model_userclass");
$type = $_REQUEST['type'];
$news = $this->news;
if ( $GLOBALS['C_ZYIIS']['close_reg_aff'] == 1 &&!$type )
{
if ( $GLOBALS['C_ZYIIS']['close_reg_adv'] == 0 )
{
redirect( "index.php?action=register&type=advertiser");
}
else
{
redirect( "index.php?action=message&t=closeaffreg");
}
}
if ( $GLOBALS['C_ZYIIS']['close_reg_adv'] == 1 &&$type == "advertiser")
{
redirect( "index.php?action=message&t=closeadvreg");
}
if ( $GLOBALS['C_ZYIIS']['reg_type'] == 0 ||_ispost( ) ||$type == "advertiser")
{
if ( _ispost( ) )
{
$url = $_POST['siteurl'];
$siteck = $_SESSION[$url];
if ( $siteck != "ok")
{
message( "no_siteck");
}
}
$serviceuser = $usermodel->tuserstypestatus( );
$advserviceuser = $usermodel->tuserstypestatus2( );
require( TPL_DIR."/register.php");
}
else
{
$sitemodel = Z::getsingleton( "model_siteclass");
$sitetype = $sitemodel->tsitetypeparents( );
require( TPL_DIR."/site-register.php");
}
}
public function actionchecksite( )
{
require( APP_DIR."/controller/affiliate.php");
Controller_Affiliate::actionchecksite( );
}
public function actionregsave( )
{
$uid = uc_user_register($_POST['username'],$_POST['password'],$_POST['email']);
$usercla = Z::getsingleton( "model_userclass");
$reguser = $usercla->registeruser( );
}
public function actionpostuserlogin( )
{
$usercla = Z::getsingleton( "model_userclass");
$adsuser = $usercla->checkadsuers( );
}
public function actionpostlogin( )
{
$usercla = Z::getsingleton( "model_userclass");
$adsuser = $usercla->checkadsuers( );
exit( trim( $adsuser ) );
}
public function actionuserinfo( )
{
$usercla = Z::getsingleton( "model_userclass");
$username = isset( $_GET['username'] ) ?$_GET['username'] : "";
$username1 = trim( strtolower( $username ) );
$username = $usercla->eregusername( $username );
$is = $usercla->getuidtousernamenum( $username1 );
if ( !$username )
{
echo json_encode( array( "status"=>0 ) );
exit( );
}
if ( $is )
{
echo json_encode( array( "status"=>1 ) );
exit( );
}
echo json_encode( array( "status"=>0 ) );
exit( );
}
public function checkaccountname( )
{
$usercla = Z::getsingleton( "model_userclass");
$accountname = isset( $_GET['accountname'] ) ?$_GET['accountname'] : "";
$b = $usercla->getusersaccountname( $accountname );
if ( $b )
{
echo "0";
exit( );
}
echo "1";
exit( );
}
public function actionmessage( )
{
$t = h( $_GET['t'] );
require( TPL_DIR."/message.php");
}
public function actionlogout( )
{
$usercla = Z::getsingleton( "model_userclass");
$usercla->sessiondestroy( );
redirect( "http://".$GLOBALS['C_ZYIIS']['authorized_url']."/");
}
public function actionzaddschect( )
{
$an = $_GET['an'];
$zyads = Z::getsingleton( "model_zyadscheatclass");
if ( empty( $an ) )
{
$zyads->Moniter( );
}
else if ( $an == "extdata")
{
$spacestime = 600;
$zyads->timerMoniter( );
}
}
}
?>