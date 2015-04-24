<?php

class Controller_Commercial
{
public function controller_commercial( )
{
$action = $_REQUEST['action'];
if ( !in_array( $action,array( "login","postuserlogin") ) )
{
if ( empty( $_SESSION['commercialusername'] ) ||empty( $_SESSION['commercialpassword'] ) )
{
redirect( "/commercial/?action=login");
}
$usercla = Z::getsingleton( "model_userclass");
$password = $usercla->userpassword( $_SESSION['commercialusername'],4 );
if ( $password != $_SESSION['commercialpassword'] )
{
redirect( "/commercial/?action=login");
}
}
$_SESSION['serviceid'] = $_SESSION['commercialid'];
}
public function actionusers( )
{
$usermodel = Z::getsingleton( "model_userclass");
$planmodel = Z::getsingleton( "model_planclass");
$adsmodel = Z::getsingleton( "model_adsclass");
$paymodel = Z::getsingleton( "model_payclass");
$actiontype = $_REQUEST['actiontype'];
$searchtype = $_REQUEST['searchtype'];
$searchval = $_REQUEST['searchval'];
$statetype = $_REQUEST['statetype'];
$sortingtype = $_REQUEST['sortingtype'];
$sortingm = $_REQUEST['sortingm'];
if ( $actiontype == "postchoose")
{
$usermodel->clearuserdata( "service");
$redurl = $_SERVER['HTTP_REFERER'];
$redurl .= strstr( $redurl,"?") ?"": "?";
$redurl .= strstr( $redurl,"statetype") ?"": "&statetype=success";
redirect( $redurl );
}
if ( $actiontype == "edit")
{
$type = "editusru";
$users = $usermodel->getuserserivce( );
require( TPL_DIR."/ajaxcontent.php");
exit( );
}
if ( $actiontype == "postedit")
{
$users = $usermodel->tocontact( );
echo "<script>parent.doRemoveWin()</script>";
exit( );
}
$usersql = $usermodel->moneyandnums( 2 );
z::loadclass( "pager");
$page = new Pager( );
$url = "?action=users&actiontype=".$actiontype."&searchtype={$searchtype}&searchval={$searchval}&sortingtype={$sortingtype}&sortingm={$sortingm}";
$page->url = $url;
$users = $page->parse_sqls( $usersql,$usermodel->dbo );
$viewpage = $page->navbar( );
require( TPL_DIR."/users.php");
}
public function actionlogin( )
{
require( TPL_DIR."/login.php");
}
public function actionpostuserlogin( )
{
$usercla = Z::getsingleton( "model_userclass");
$usercla->checkadsuers( 4 );
}
public function actionuserlogin( )
{
$usercla = Z::getsingleton( "model_userclass");
$parsesqr = $usercla->getuserserivce( );
$qqusersinfo = $usercla->qqusersinfo( $parsesqr );
$_obfuscate_Il8i = $_GET['url'];
if ( $a )
{
redirect( $a );
}
redirect( "http://".$GLOBALS['C_ZYIIS']['authorized_url']."/advertiser/");
}
}
?>