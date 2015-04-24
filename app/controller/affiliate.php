<?php

class Controller_Affiliate
{
public $newsmodel = NULL;
public $usermodel = NULL;
public $news = NULL;
public function controller_affiliate( )
{
if ( empty( $_SESSION['usertype'] ) ||empty( $_SESSION['username'] ) ||empty( $_SESSION['password'] ) )
{
redirect( "/index.php?action=login&at=timeout");
}
$usercla = Z::getsingleton( "model_userclass");
$adstypecla = Z::getsingleton( "model_adstypeclass");
$pmcla = Z::getsingleton( "model_pmclass");
$message = $pmcla->messageparentrow( );
$this->usermodel = $usercla;
$checkpassword = $usercla->checkpassword( "1");
$this->pmnum = $message;
$this->cpa_cps = TRUE;
if ( !$_SESSION['serviceqq'] )
{
$serviceuser = $usercla->tuserstypestatus( );
if ( $serviceuser )
{
$rand = array_rand( ( array )$serviceuser,1 );
$_SESSION['serviceqq'] = $serviceuser[$rand]['qq'];
}
}
$getadstypeparent = $adstypecla->getadstypetypename( );
if ( search( "cps",$getadstypeparent ) )
{
$this->cpa_cps = TRUE;
}
if ( !search( "cpa",$getadstypeparent ) )
{
$this->cpa_cps = FALSE;
}
}
public function actionindex( )
{
$newsmodel = Z::getsingleton( "model_newsclass");
$statsmodel = Z::getsingleton( "model_statsclass");
$adstypemodel = Z::getsingleton( "model_adstypeclass");
$ordersmodel = Z::getsingleton( "model_ordersclass");
$paymodel = Z::getsingleton( "model_payclass");
$nopay = $paymodel->getsumpaylogbyuid( );
$pay = $paymodel->getsumpayandtimebyuid( );
$lastpaytime = $pay['paytime'];
$lastpay = $pay['pay'];
$cpc = $statsmodel->getuserdata( "cpc","aff");
$cpa = $statsmodel->getuserdata( "cpa","aff");
$cpm = $statsmodel->getuserdata( "cpm","aff");
$cps = $statsmodel->getuserdata( "cps","aff");
$cpv = $statsmodel->getuserdata( "cpv","aff");
$daymoneyarr = $statsmodel->sumpaystatsplans( DAYS,"aff");
$daymoney = abs( $daymoneyarr['yf'] +$daymoneyarr['cpsyf'] );
$yemoneyarr = $statsmodel->sumpaystatsplans( date( "Y-m-d",TIMES -86400 ),"aff");
$yemoney = abs( $yemoneyarr['yf'] +$yemoneyarr['cpsyf'] );
$plantypearr = $adstypemodel->getadstypetypename( );
$news = $newsmodel->getallnews( "6");
$u = $this->usermodel->getuserinfo( );
$sumrecommend = $this->usermodel->getsumrecommend( );
require( TPL_DIR."/index.php");
}
public function actionplanlist( )
{
$plantype = $_REQUEST['plantype'];
if ( is_array( $plantype ) &&$plantype )
{
$plantypear = $plantype;
$plantype = @implode( ",",( array )$plantype );
}
else
{
$plantypear = explode( ",",$plantype );
}
$actiontype = $_REQUEST['actiontype'];
$status = $_REQUEST['status'];
$audit = $_REQUEST['audit'];
$siteid = ( integer )$_REQUEST['siteid'];
$kv = ( integer )$_REQUEST['kv'];
$auditmodel = Z::getsingleton( "model_auditclass");
$sitemodel = Z::getsingleton( "model_siteclass");
$planmodel = Z::getsingleton( "model_planclass");
$adsmodel = Z::getsingleton( "model_adsclass");
$usermodel = Z::getsingleton( "model_userclass");
$adstypemodel = Z::getsingleton( "model_adstypeclass");
$usersite = $sitemodel->getuidsitestatus3detail( );
$site = $sitemodel->getuidsitestatus3orderdetail( );
$plantypearr = $adstypemodel->getadstypetypename( );
$siteinfo = $site[$kv];
if ( !$siteid )
{
$siteid = ( integer )$site[$kv]['siteid'];
}
if ( $actiontype == "ads")
{
$ads = $planmodel->getprigraderows( );
$znads = uniquestrexplode( $ads );
}
else
{
$allplannamesql = $planmodel->getsxplanuser( "planlist","",$siteid );
z::loadclass( "pager");
$page = new Pager( );
$url = "?action=planlist&plantype=".$plantype.( "&audit=".$audit."&siteid={$siteid}&kv={$kv}");
$page->url = $url;
$page->totalCount = 30;
$plan = $page->parse_sqls( $allplannamesql,$planmodel->dbo );
$userinfo = $usermodel->getusersuidrow( $_SESSION['uid'] );
$advprice = ( double )$userinfo['advprice'];
foreach ( $plan as $key =>$value )
{
if ( !empty( $advprice ) )
{
if ( $p['gradeprice'] == 1 )
{
$plan[$key]["s".$site[$kv]['grade']."price"] = $advprice;
}
else
{
$plan[$key]['price'] = $advprice;
}
}
}
$viewpage = $page->navbar( );
}
$ztadsnum = $adsmodel->getnumadstatpurl( );
require( TPL_DIR."/planlist.php");
}
public function actionplanads( )
{
$auditmodel = Z::getsingleton( "model_auditclass");
$sitemodel = Z::getsingleton( "model_siteclass");
$planmodel = Z::getsingleton( "model_planclass");
$adsmodel = Z::getsingleton( "model_adsclass");
$usermodel = Z::getsingleton( "model_userclass");
$adstypeid = ( integer )$_REQUEST['adstypeid'];
$actiontype = $_REQUEST['actiontype'];
$status = $_REQUEST['status'];
$planid = ( integer )$_REQUEST['planid'];
$siteid = ( integer )$_GET['siteid'];
$siteall = $sitemodel->getuidsitestatus3orderdetail( );
if ( !$siteall )
{
redirect( "?action=createsite");
}
$siteinfo = $siteall[$kv];
if ( !$siteid )
{
$siteid = ( integer )$siteall[$kv]['siteid'];
}
$preview = ( integer )$_REQUEST['preview'];
$width = ( integer )$_REQUEST['width'];
$height = ( integer )$_REQUEST['height'];
$adstypemodel = Z::getsingleton( "model_adstypeclass");
$adsspecs = $adsmodel->zyadsplantrows( );
$desc_func = create_function( "\$a,\$b","\r\n\t\t\t\t\t\t\t\t\t\t\$k = \"width\"; \r\n\t\t\t\t\t\t\t\t\t\tif(\$a[\$k] == \$b[\$k]) return 0; \r\n\t\t\t\t\t\t\t\t\t\treturn \$a[\$k]>\$b[\$k]?-1:1; \r\n\t\t\t\t\t\t\t\t\t\t");
@usort( &$adsspecs,$desc_func );
$adstypenum = $adsmodel->getxtplanrows( );
$adssql = $adsmodel->zyadsplansqlsandadsnum( );
$sitetype = $planmodel->tsitetypeparents( );
$site = $sitemodel->zyads_siteuidone( $siteid );
foreach ( ( array )$usersite as $ut )
{
$ust .= $ut['sitetype'].",";
}
if ( !$site['siteid'] )
{
redirect( "?action=createsite");
}
$usersitetype = explode( ",",$ust );
$u = $this->usermodel->getuserinfo( );
$p = $planmodel->getsxplanuser( "","",$site['siteid'] );
$userinfo = $usermodel->getusersuidrow( $_SESSION['uid'] );
$advprice = ( double )$userinfo['advprice'];
if ( !empty( $advprice ) )
{
if ( $p['gradeprice'] == 1 )
{
$p["s".$site['grade']."price"] = $advprice;
}
else
{
$p['price'] = $advprice;
}
}
$zlinktype = $p['plantype']."zlink";
$acls = $planmodel->getaclsbyplanid( $p['planid'] );
$adstypearray = $adstypemodel->getadstypeplanstatus1( $p['plantype'] );
foreach ( ( array )$acls as $acls )
{
if ( $acls['type'] == "webtype")
{
$webtype = explode( ",",$acls['data'] );
$webtypecom = $acls['comparison'];
$i = 0;
for ( ;$i <= sizeof( $sitetype );++$i )
{
if ( in_array( $sitetype[$i]['sid'],$webtype ) )
{
$webtypedata .= $sitetype[$i]['sitename'].",";
}
}
}
if ( $acls['type'] == "city")
{
$citydata = $acls['data'];
$citycom = $acls['comparison'];
}
if ( $acls['type'] == "time")
{
$timedata = $acls['data'];
}
if ( $acls['type'] == "weekday")
{
$weekdaydata = $acls['data'];
}
}
$planaclcomparison = $planmodel->getplanwebtypeaclcomparison( $p['planid'] );
$siteacl = explode( ",",$planaclcomparison['data'] );
if ( $planaclcomparison['comparison'] == "==")
{
if ( in_array( $site['sitetype'],$siteacl ) )
{
$isok = TRUE;
}
}
else if ( !in_array( $site['sitetype'],$siteacl ) )
{
$isok = TRUE;
}
z::loadclass( "pager");
$page = new Pager( );
$url = "?action=planidads&width=".$width.( "&height=".$height."&siteid={$siteid}&adstypeid={$adstypeid}&planid={$planid}");
$page->url = $url;
$page->totalCount = 200;
$ads = $page->parse_sqls( $adssql,$planmodel->dbo );
$viewpage = $page->navbar( );
require( TPL_DIR."/planads.php");
}
public function actionadslist( )
{
$plantype = $_REQUEST['plantype'];
$adstypeid = $_REQUEST['adstypeid'];
$width = $_REQUEST['width'];
$height = $_REQUEST['height'];
$siteid = ( integer )$_GET['siteid'];
$kv = ( integer )$_GET['kv'];
$auditmodel = Z::getsingleton( "model_auditclass");
$sitemodel = Z::getsingleton( "model_siteclass");
$planmodel = Z::getsingleton( "model_planclass");
$adsmodel = Z::getsingleton( "model_adsclass");
$adstypemodel = Z::getsingleton( "model_adstypeclass");
$site = $sitemodel->getuidsitestatus3orderdetail( );
if ( !$site )
{
redirect( "?action=createsite");
}
$siteinfo = $site[$kv];
if ( !$siteid )
{
$siteid = ( integer )$site[$kv]['siteid'];
}
$ads = $planmodel->getprigraderows( $siteid );
$ti = 0;
foreach ( ( array )$ads as $key =>$a )
{
$doadstypeid[$a['plantype']][$ti] = $a['adstypeid'];
if ( $a['audit'] == "y")
{
$audit = $auditmodel->ckplanidaudit( $a['planid'],$siteid );
if ( $audit != "ok")
{
unset( $ads[$key] );
unset( $Var_168[$ti] );
}
}
++$ti;
}
$gplantype = $adstypemodel->getadstypetypename( );
foreach ( ( array )$gplantype as $dpt )
{
if ( search( $dpt['plantype'],$ads ) !== FALSE )
{
$plantypearr[] = $dpt;
}
}
$deplantype = $plantype == ""?$plantypearr[0]['plantype'] : $plantype;
$adstype = $adstypemodel->getadstypeplanstatus1( $deplantype );
$deadstypeid = $adstypeid == ""?min( $doadstypeid[$deplantype] ) : $adstypeid;
foreach ( ( array )$ads as $key =>$a )
{
if ( !( $a['adstypeid'] == $deadstypeid ) )
{
if ( !( $a['plantype'] == $deplantype ) )
{
$w = $a['width'];
$h = $a['height'];
$specs[] = array(
"width"=>$w,
"height"=>$h
);
}
}
}
$specs = uniquestrexplode( $specs );
$desc_func = create_function( "\$a,\$b","\r\n\t\t\t\t\t\t\t\t\t\t\$k = \"0\"; \r\n\t\t\t\t\t\t\t\t\t\tif(\$a[\$k] == \$b[\$k]) return 0; \r\n\t\t\t\t\t\t\t\t\t\treturn \$a[\$k]>\$b[\$k]?-1:1; \r\n\t\t\t\t\t\t\t\t\t\t");
@usort( &$specs,$desc_func );
if ( !$ads )
{
$specs = $plantypearr = array( );
}
$dewidth = $width == ""?$specs[0][0] : $width;
$deheight = $height == ""?$specs[0][1] : $height;
$ztadsnum = $adsmodel->getnumadstatpurl( );
foreach ( ( array )$ads as $a )
{
if ( !( $a['plantype'] == $deplantype ) ||!( $a['adstypeid'] == $deadstypeid ) ||!( $a['width'] == $dewidth ) ||!( $a['height'] == $deheight ) )
{
}
else
{
$deadsid = $a['adsid'];
}
break;
}
$u = $this->usermodel->getuserinfo( );
require( TPL_DIR."/adslist.php");
}
public function actionpostaudit( )
{
$sitecla = Z::getsingleton( "model_siteclass");
$auditcla = Z::getsingleton( "model_auditclass");
$auditid = $auditcla->createadsaudit( );
}
public function actionsitelist( )
{
$statetype = $_REQUEST['statetype'];
$sitemodel = Z::getsingleton( "model_siteclass");
$sitetypemodel = Z::getsingleton( "model_sitetypeclass");
$site = $sitemodel->getuidsitedetail( );
$sitenum = $sitemodel->getsiteuiddetail( );
require( TPL_DIR."/sitelist.php");
}
public function actioneditsite( )
{
$action = $_GET['action'];
$planmodel = Z::getsingleton( "model_planclass");
$sitetype = $planmodel->tsitetypeparents( );
$sitemodel = Z::getsingleton( "model_siteclass");
$s = $sitemodel->zyads_siteuidone( );
require( TPL_DIR."/createsite.php");
}
public function actionsitezone( )
{
$siteid = $_GET['siteid'];
$sitemodel = Z::getsingleton( "model_siteclass");
$zone = $sitemodel->getzonesiteurldetail( );
require( TPL_DIR."/sitezone.php");
}
public function actioncreatesite( )
{
$action = $_GET['action'];
$sitemodel = Z::getsingleton( "model_siteclass");
$planmodel = Z::getsingleton( "model_planclass");
$sitetype = $sitemodel->tsitetypeparents( );
require( TPL_DIR."/createsite.php");
}
public function actionpostcreatesite( )
{
$sitecla = Z::getsingleton( "model_siteclass");
$siteid = $sitecla->create_zyads_site( );
if ( $siteid )
{
redirect( "?action=sitelist");
}
}
public function actionpostupdatesite( )
{
$sitecla = Z::getsingleton( "model_siteclass");
$p = $sitecla->updatezyadsitename( );
redirect( "?action=sitelist&statetype=success");
}
public function actionchecksite( $plandata = FALSE )
{
$actiontype = $plandata ?"ck": $_REQUEST['actiontype'];
$siteurl = explode( ".",$GLOBALS['C_ZYIIS']['siteurl'] );
$siteurl = strtoupper( $siteurl[0] );
$v = $_REQUEST['url'] ?$_REQUEST['url'] : $_REQUEST['siteurl'];
if ( $v )
{
$filename = md5( $v.$GLOBALS['C_ZYIIS']['url_key'] );
}
$xstring = $siteurl."_".$filename.".txt";
if ( $actiontype == "ck")
{
$cktype = $_REQUEST['cktype'];
$sitecla = Z::getsingleton( "model_siteclass");
if ( 0 <$GLOBALS['C_ZYIIS']['alexa'] )
{
$alexa = $GLOBALS['C_ZYIIS']['alexa'];
$b = $sitecla->sitealexa( "alexa");
if ( $alexa <$b )
{
echo "nalexa";
exit( );
}
}
$getsiteidstourl = $sitecla->getsiteidstourl( $v );
if ( $getsiteidstourl == "re")
{
echo "re";
exit( );
}
if ( $cktype == "h")
{
$verify = strtolower( $siteurl )."_verify";
$tags = get_meta_tags( "http://".$v );
if ( $tags[$verify] == $filename )
{
$_SESSION[$_REQUEST['url']] = "ok";
echo "ok";
exit( );
}
echo "no";
exit( );
}
$v = "http://".$v."/".$xstring;
$string = streamgetcontent( $v );
$zyadsrow = array( "\n","\r","\r\n");
$tat = str_replace( $zyadsrow,"",$string );
if ( $filename == $tat )
{
$_SESSION[$_REQUEST['url']] = "ok";
echo "ok";
exit( );
}
echo "no";
exit( );
}
if ( $actiontype == "makehtml")
{
echo "<meta name='".$siteurl.( "_verify' content='".$filename."'>");
exit( );
}
header( "Content-Type: application/force-download");
header( "Content-Disposition: attachment; filename=".basename( $xstring ) );
$a = $filename;
echo $a;
}
public function actiondelsite( )
{
$sitecla = Z::getsingleton( "model_siteclass");
$value = $sitecla->delzyadsite( );
redirect( "?action=sitelist");
}
public function createtxt( )
{
$sitemodel = Z::getsingleton( "model_siteclass");
$site = $sitemodel->getuidsitestatus3orderdetail( );
require( TPL_DIR."/createtxt.php");
}
public function actionzonelist( )
{
$siteid = $_GET['siteid'];
$zonetype = h( $_GET['zonetype'] );
$plantype = h( $_GET['plantype'] );
$adstypeid = ( integer )$_GET['adstypeid'];
$width = $_GET['width'];
$height = $_GET['height'];
$sitemodel = Z::getsingleton( "model_siteclass");
$adsmodel = Z::getsingleton( "model_adsclass");
$adstypemodel = Z::getsingleton( "model_adstypeclass");
$site = $sitemodel->getuidsitedetail( );
$zonesql = $sitemodel->getzonesitebysqlsandnums( );
$zt = $sitemodel->getzonesiteurldetail( );
foreach ( ( array )$zt as $zr )
{
$ap[] = $zr['width']."x".$zr['height'];
}
$plantypearr = $adstypemodel->getadstypeparent( );
$ap = array_unique( ( array )$ap );
z::loadclass( "pager");
$page = new Pager( );
$url = "?action=zonelist&width=".$width.( "&height=".$height."&siteid={$siteid}&plantype={$plantype}");
$page->url = $url;
$zone = $page->parse_sqls( $zonesql,$sitemodel->dbo );
$viewpage = $page->navbar( );
require( TPL_DIR."/zonelist.php");
}
public function actionzone( )
{
$sitemodel = Z::getsingleton( "model_siteclass");
$planmodel = Z::getsingleton( "model_planclass");
$adsmodel = Z::getsingleton( "model_adsclass");
$adstypemodel = Z::getsingleton( "model_adstypeclass");
$actiontype = $_REQUEST['actiontype'];
$viewtype = $_REQUEST['viewtype'];
$siteid = ( integer )$_REQUEST['siteid'];
$zoneid = ( integer )$_REQUEST['zoneid'];
$adsid = ( integer )$_REQUEST['adsid'];
if ( $actiontype == "create")
{
$type = $_GET['type'];
$a = $adsmodel->zadsandplanrow( );
if ( $type == "link")
{
$a['adstypeid'] = 24;
}
if ( $viewtype == "zn")
{
$z['viewtype'] = 0;
}
require( APP_DIR."/controller/admin.php");
Controller_Admin::zyiiauthorized( "aff");
}
else if ( $actiontype == "del")
{
$d = $sitemodel->deletezoneuid( );
redirect( "?action=zonelist");
}
else if ( $actiontype == "postcreate")
{
$zoneid = $sitemodel->create_zone_info( );
redirect( "?action=getcode&zoneid=".$zoneid );
}
else if ( $actiontype == "posteditzone")
{
$sitemodel->tcpmtcodestyle( );
$siteid = ( integer )$_POST['siteid'];
redirect( "?action=zone&actiontype=edit&statetype=success&siteid=".$siteid."&zoneid=".$_POST['zoneid'] );
}
else
{
$statetype = $_REQUEST['statetype'];
$z = $sitemodel->zoneandsitedetail( );
$a = $z;
}
if ( $a['adstypeid'] == 24 )
{
$u = $this->usermodel->getuserinfo( );
$zlinktypes = $a['plantype']."zlink";
if ( $u[$zlinktypes] == "3"||$u[$zlinktypes] == "1"&&!in_array( $a['plantype'],explode( ",",$GLOBALS['C_ZYIIS']['zlink_on'] ) ) )
{
message( "notlink");
}
}
if ( !$a )
{
message( "null");
}
$s = $sitemodel->zyads_siteuidone( );
$at = $adstypemodel->getadstypeid( $a['adstypeid'] );
$adsall = $adsmodel->getzoneadsok( $a,$s['sitetype'],$s['siteid'] );
require( TPL_DIR."/zone.php");
}
public function actioncreatezt( )
{
$actiontype = $_REQUEST['actiontype'];
$statetype = $_REQUEST['statetype'];
$zoneid = ( integer )$_REQUEST['zoneid'];
$kv = ( integer )$_GET['kv'];
$sitemodel = Z::getsingleton( "model_siteclass");
if ( $actiontype == "edit")
{
$z = $sitemodel->zoneandsitedetail( );
if ( !isset( $z['codestyle'] ) )
{
$z['codestyle'] = "a:7:{s:14:\"color_headline\";s:6:\"0000FF\";s:17:\"color_description\";s:6:\"000000\";s:13:\"color_dispurl\";s:6:\"008000\";s:12:\"color_border\";s:6:\"E6E6E6\";s:16:\"color_background\";s:6:\"FFFFFF\";s:7:\"zonejys\";s:1:\"0\";s:10:\"copyimages\";s:1:\"b\";}";
}
$c = unserialize( $z['codestyle'] );
}
else if ( $actiontype == "posteditzone")
{
$siteid = ( integer )$_POST['siteid'];
$sitemodel->tcpmtcodestyle( );
redirect( "?action=createzt&actiontype=edit&siteid=".$siteid.( "&zoneid=".$zoneid."&statetype=success") );
}
else if ( $actiontype == "postcreate")
{
$zoneid = $sitemodel->create_zone_info( );
redirect( "?action=getcode&zoneid=".$zoneid );
}
$site = $sitemodel->getuidsitestatus3orderdetail( );
if ( !$site )
{
redirect( "?action=createsite");
}
$siteinfo = $site[$kv];
if ( !$siteid )
{
$siteid = ( integer )$site[$kv]['siteid'];
}
require( TPL_DIR."/createzt.php");
}
public function actioncreatezone( )
{
$planmodel = Z::getsingleton( "model_planclass");
$adsmodel = Z::getsingleton( "model_adsclass");
$sitemodel = Z::getsingleton( "model_siteclass");
$plantype = $_REQUEST['plantype'];
$actiontype = $_REQUEST['actiontype'];
$adstype = $_REQUEST['adstype'];
$next = $_REQUEST['next'];
$siteid = ( integer )$_REQUEST['siteid'];
$s = $sitemodel->zyads_siteuidone( );
$site = $sitemodel->getuidsitestatus3orderdetail( );
$ads = $adsmodel->zadsandplanrow( );
if ( !$ads )
{
message( "no_ads_num");
}
$isaudit = $ads['audit'];
$planaclcomparison = $planmodel->getplanwebtypeaclcomparison( ( integer )$ads['planid'] );
$adstype = $ads['adstype'];
$plantype = $ads['plantype'];
$adsid = $ads['adsid'];
if ( 0 <$ads['width'] )
{
$specs = $ads['width']."x".$ads['height'];
}
if ( $next == "n1")
{
$auditmodel = Z::getsingleton( "model_auditclass");
$sitetype = $planmodel->tsitetypeparents( );
$plan = $planmodel->getdistplannamerows( );
require( TPL_DIR."/createzoneads.php");
}
else
{
require( TPL_DIR."/createzone.php");
}
}
public function actionpostcreatezone( )
{
$sitecla = Z::getsingleton( "model_siteclass");
$actiontype = $_REQUEST['actiontype'];
$zoneid = $sitecla->create_zone_info( );
if ( $zoneid )
{
if ( $actiontype == "audit")
{
$auditcla = Z::getsingleton( "model_auditclass");
$auditid = $auditcla->createadsaudit( $zoneid );
redirect( "?action=adslist&actiontype=success");
}
redirect( "?action=getcode&zoneid=".$zoneid );
}
}
public function actiondelzone( )
{
$sitecla = Z::getsingleton( "model_siteclass");
$value = $sitecla->deletezoneuid( );
$siteid = ( integer )$_GET['siteid'];
redirect( "?action=sitezone&siteid=".$siteid );
}
public function actioneditzone( )
{
$zoneid = $_GET['zoneid'];
$sitemodel = Z::getsingleton( "model_siteclass");
$adsmodel = Z::getsingleton( "model_adsclass");
$planmodel = Z::getsingleton( "model_planclass");
$z = $sitemodel->zoneandsitedetail( );
if ( !isset( $z['codestyle'] ) )
{
$z['codestyle'] = "a:7:{s:14:\"color_headline\";s:6:\"0000FF\";s:17:\"color_description\";s:6:\"000000\";s:13:\"color_dispurl\";s:6:\"008000\";s:12:\"color_border\";s:6:\"E6E6E6\";s:16:\"color_background\";s:6:\"FFFFFF\";s:7:\"zonejys\";s:1:\"0\";s:10:\"copyimages\";s:1:\"b\";}";
}
$c = unserialize( $z['codestyle'] );
$auditmodel = Z::getsingleton( "model_auditclass");
$sitetype = $planmodel->tsitetypeparents( );
$plan = $planmodel->getdistplanameauditrows( $z );
require( TPL_DIR."/editzone.php");
}
public function actionposteditzone( )
{
$sitecla = Z::getsingleton( "model_siteclass");
$sitecla->tcpmtcodestyle( );
$siteid = h( $_POST['siteid'] );
redirect( "?action=editzone&actiontype=success&zoneid=".h( $_POST['zoneid'] ) );
}
public function actioneditzonetype( )
{
$sitecla = Z::getsingleton( "model_siteclass");
$b = $sitecla->updatezonetypes( );
echo "1";
}
public function actiongetcode( )
{
$sitemodel = Z::getsingleton( "model_siteclass");
$adstypemodel = Z::getsingleton( "model_adstypeclass");
$z = $sitemodel->zoneandsitedetail( );
$at = $adstypemodel->getadstypeid( $z['adstypeid'] );
if ( $at['framework'] == "iframe")
{
$u_a_type = 0;
}
else
{
$u_a_type = 1;
}
require( TPL_DIR."/getcode.php");
}
public function actiongetlinkcode( )
{
$linkcode = TRUE;
$adsid = ( integer )$_GET['adsid'];
$at = $_GET['at'];
if ( $at == "wap")
{
$linkcodewap = TRUE;
$linkcode = FALSE;
$adsmodel = Z::getsingleton( "model_adsclass");
$a = $adsmodel->getadrow( );
$adsid = ( integer )$_GET['adsid'];
$hx = md5( $adsid.$GLOBALS['C_ZYIIS']['url_key'] );
$ad = explode( ",",$a['description'] );
$ad = $ad[0];
}
require( TPL_DIR."/getcode.php");
}
public function actionshowads( )
{
$adscla = Z::getsingleton( "model_adsclass");
$m = $adscla->zadsandplanrow( );
echo $m['htmlcode'];
}
public function actionadsdemo( )
{
$hl = $_GET['hl'];
$dt = $_GET['dt'];
$du = $_GET['du'];
$bd = $_GET['bd'];
$br = $_GET['br'];
$yj = $_GET['yj'];
$w = $_GET['w'];
$h = $_GET['h'];
$i = 0;
for ( ;$i <6;$i += 2 )
{
$fp[] = $bd[$i].$bd[$i +1];
}
$fp = hexdec( $fp[0] ).",".hexdec( $fp[1] ).",".hexdec( $fp[2] );
$fp = explode( ",",$fp );
0.3 * $fp[0] +0.59 * $fp[1] +0.11 * $fp[2] <= 128 ?( $fp = "w") : ( $fp = "b");
require( TPL_DIR."/adsdemo.php");
}
public function actionhelp( )
{
require( TPL_DIR."/help.php");
}
public function actionuserinfo( )
{
$statetype = $_REQUEST['statetype'];
$actiontype = $_REQUEST['actiontype'];
$usermodel = Z::getsingleton( "model_userclass");
$u = $usermodel->getuserinfo( );
$sumrecommend = $usermodel->getsumrecommend( );
$recommendusers = $usermodel->getuidtusers( );
foreach ( ( array )$recommendusers as $ru )
{
$recommenduser .= $ru['uid']." ";
}
require( TPL_DIR."/userinfo.php");
}
public function actionupuserpost( )
{
$usercla = Z::getsingleton( "model_userclass");
$updata = $usercla->tuserquestion( );
if ( $updata )
{
redirect( "?action=userinfo&statetype=success");
}
}
public function actionuppasswdpost( )
{
$usercla = Z::getsingleton( "model_userclass");
$updata = $usercla->modifypassword( );
if ( $updata )
{
redirect( "?action=userinfo&actiontype=pw&statetype=success");
}
else
{
redirect( "?action=userinfo&actiontype=pw&statetype=errpasswd");
}
}
public function actionpm( )
{
$actiontype = $_GET['actiontype'];
$statetype = $_REQUEST['statetype'];
$pmmodel = Z::getsingleton( "model_pmclass");
if ( $actiontype == "postcreatepm")
{
$q = $pmmodel->createmessagemsgtype( );
redirect( "?action=pm&statetype=success");
}
else if ( $actiontype == "view")
{
$m = $pmmodel->tmessagesendusertouserrow( );
if ( $m )
{
$re = $pmmodel->tmessageparentrow( $m['msgid'] );
}
$msgid = ( integer )$_GET['msgid'];
$type = $_GET['type'];
$u = $pmmodel->messageisviewisadmin( );
}
else if ( !( $actiontype == "new") )
{
if ( $actiontype == "postrepm")
{
$q = $pmmodel->tmessageisadmin( );
$msgid = ( integer )$_POST['msgid'];
$type = $_POST['type'];
redirect( "?action=pm&actiontype=view&type=".$type."&msgid=".$msgid."&statetype=success");
}
else
{
if ( $actiontype == "inbox")
{
$sql = $pmmodel->messageparentsqlandnums( );
}
else
{
$sql = $pmmodel->messagesentparentsqlandnums( );
}
z::loadclass( "pager");
$page = new Pager( );
$url = "?action=pm&actiontype=".$actiontype;
$page->url = $url;
$m = $page->parse_sqls( $sql,$pmmodel->dbo );
$viewpage = $page->navbar( );
}
}
$numoutbox = $pmmodel->messageisviewsenduserrow( );
$numinbox = $pmmodel->messageisadmintouserrow( );
require( TPL_DIR."/pm.php");
}
public function actionstats( )
{
$statsmodel = Z::getsingleton( "model_statsclass");
$planmodel = Z::getsingleton( "model_planclass");
$sitemodel = Z::getsingleton( "model_siteclass");
$adstypemodel = Z::getsingleton( "model_adstypeclass");
$ordersmodel = Z::getsingleton( "model_ordersclass");
$actiontype = $_REQUEST['actiontype'];
$timerange = $_REQUEST['timerange'];
if ( 3 <strlen( $timerange ) )
{
$d = @explode( "/",$timerange );
$time_begin = $d[0];
$time_end = $d[1];
}
$planid = $_REQUEST['planid'];
$siteid = $_REQUEST['siteid'];
$plantypearr = $adstypemodel->getadstypetypename( );
$site = $sitemodel->getuidsitedetail( );
$statssql = $statsmodel->viewsqlsandnum( );
if ( $actiontype == "")
{
$allplanname = $planmodel->getsxplanuser( "","all");
}
else if ( $actiontype == "data")
{
$plan = $planmodel->getsxplanuser( );
}
z::loadclass( "pager");
$page = new Pager( );
$addurl = "&actiontype=".$actiontype.( "&timerange=".$timerange."&planid={$planid}&siteid={$siteid}");
$page->url = "?action=stats".$addurl;
$page->totalCount = 30;
$stats = $page->parse_sqls( $statssql,$statsmodel->dbo );
$viewpage = $page->navbar( );
require( TPL_DIR."/stats.php");
}
public function actionorder( )
{
$statsmodel = Z::getsingleton( "model_statsclass");
$planmodel = Z::getsingleton( "model_planclass");
$ordersmodel = Z::getsingleton( "model_ordersclass");
$actiontype = $_REQUEST['actiontype'];
$timerange = $_REQUEST['timerange'];
$status = $_REQUEST['status'];
if ( 3 <strlen( $timerange ) )
{
$d = @explode( "/",$timerange );
$time_begin = $d[0];
$time_end = $d[1];
}
$planid = $_REQUEST['planid'];
$allplanname = $planmodel->getsxplanuser( "","all");
$orderssql = $ordersmodel->getordersqlandnum( "aff");
z::loadclass( "pager");
$page = new Pager( );
$addurl = "&actiontype=".$actiontype.( "&timerange=".$timerange."&planid={$planid}&status={$status}");
$page->url = "?action=order".$addurl;
$page->totalCount = 100;
$order = $page->parse_sqls( $orderssql,$ordersmodel->dbo );
$viewpage = $page->navbar( );
require( TPL_DIR."/order.php");
}
public function actionpaylist( )
{
$type = $_REQUEST['type'];
$paymodel = Z::getsingleton( "model_payclass");
if ( $type == "add")
{
$paysql = $paymodel->adsonlinepaysqlsandnum( );
}
else
{
$paysql = $paymodel->getpaylogsqlandnum( );
}
z::loadclass( "pager");
$page = new Pager( );
$page->url = "?action=paylist&type=".$type;
$pay = $page->parse_sqls( $paysql,$paymodel->dbo );
$viewpage = $page->navbar( );
require( TPL_DIR."/paylist.php");
}
public function actionshowzoneads( )
{
$sitemodel = Z::getsingleton( "model_siteclass");
$z = $sitemodel->zoneandsitedetail( );
if ( in_array( $z['zonetype'],array( "img","txt","tw","imgtw") ) )
{
$u_a_type = 0;
}
else
{
$u_a_type = 1;
}
require( TPL_DIR."/showzoneads.php");
}
public function actionfaq( )
{
Z::zrequire( P_TPL."/faq.php");
}
}

?>