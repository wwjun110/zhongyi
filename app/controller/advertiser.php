<?php

class Controller_Advertiser{
public $newsmodel = NULL;
public $usermodel = NULL;
public $news = NULL;
public function controller_advertiser( )
{
if ( empty( $_SESSION['usertype'] ) ||empty( $_SESSION['username'] ) ||empty( $_SESSION['password'] ) )
{
redirect( "/index.php?action=login&at=timeout");
}
$GLOBALS['GLOBALS']['GLOBALS']['plantype'] = $_GET['plantype'];
$usercla = Z::getsingleton( "model_userclass");
$adstypecla = Z::getsingleton( "model_adstypeclass");
$this->usermodel = $usercla;
$checkpassword = $usercla->checkpassword( "2");
$this->cpa_cps = TRUE;
if ( !$_SESSION['serviceqq'] )
{
$serviceuser = $usercla->tuserstypestatus2( );
if ( $serviceuser )
{
$rand = array_rand( ( array )$serviceuser,1 );
$_SESSION['serviceqq'] = $serviceuser[$rand]['qq'];
}
}
$getadstypeparent = $adstypecla->getadstypetypename( );
search( "cps",$getadstypeparent );
if ( !search( "cpa",$getadstypeparent ) )
{
$this->cpa_cps = FALSE;
}
}
public function actionindex( )
{
$newsmodel = Z::getsingleton( "model_newsclass");
$statsmodel = Z::getsingleton( "model_statsclass");
$pmmodel = Z::getsingleton( "model_pmclass");
$planmodel = Z::getsingleton( "model_planclass");
$adsmodel = Z::getsingleton( "model_adsclass");
$adstypemodel = Z::getsingleton( "model_adstypeclass");
$paymodel = Z::getsingleton( "model_payclass");
$cpc = $statsmodel->getuserdata( "cpc","adv");
$cpa = $statsmodel->getuserdata( "cpa","adv");
$cpm = $statsmodel->getuserdata( "cpm","adv");
$cps = $statsmodel->getuserdata( "cps","adv");
$cpv = $statsmodel->getuserdata( "cpv","adv");
$daymoneyarr = $statsmodel->sumpaystatsplans( DAYS,"adv");
$daymoney = abs( $daymoneyarr['yf'] );
$yemoneyarr = $statsmodel->sumpaystatsplans( date( "Y-m-d",TIMES -86400 ),"adv");
$yemoney = abs( $yemoneyarr['yf'] );
$news = $newsmodel->getallnews( "7");
$pmnum = $pmmodel->messageparentrow( );
$adsnum = $adsmodel->getadsidtouid( );
$plan = $planmodel->getplanrowsbyuid( );
foreach ( ( array )$plan as $p )
{
if ( $p['status'] == "1")
{
$s1[] = $p['plnaid'];
}
if ( $p['status'] == "2")
{
$s2[] = $p['plnaid'];
}
if ( $p['status'] == "3")
{
$s3[] = $p['plnaid'];
}
if ( $p['status'] == "4")
{
$s4[] = $p['plnaid'];
}
}
$u = $this->usermodel->getuserinfo( );
$plantypearr = $adstypemodel->getadstypetypename( );
require( TPL_DIR."/index.php");
}
public function actionadsplan( )
{
return $this->actionplanlist( );
}
public function actionplanlist( )
{
$planmodel = Z::getsingleton( "model_planclass");
$adstypemodel = Z::getsingleton( "model_adstypeclass");
$timerange = $_REQUEST['timerange'];
$timetype = $_REQUEST['timetype'];
$plantype = $_REQUEST['plantype'];
$listtype = $_REQUEST['listtype'];
$timebegin = $_REQUEST['timebegin'];
$timeend = $_REQUEST['timeend'];
$plansql = $planmodel->getbyplanidsqlandnum( );
z::loadclass( "pager");
$page = new Pager( );
$page->totalCount = 30;
$url = "?action=planlist";
$page->url = $url;
$plan = $page->parse_sqls( $plansql,$planmodel->dbo );
$viewpage = $page->navbar( );
$plantype = $adstypemodel->getadstypetypename( );
require( TPL_DIR."/planlist.php");
}
public function actioncreateplan( )
{
$action = $_REQUEST['action'];
$planmodel = Z::getsingleton( "model_planclass");
$usermodel = Z::getsingleton( "model_userclass");
$sitetypemodel = Z::getsingleton( "model_sitetypeclass");
$adstypemodel = Z::getsingleton( "model_adstypeclass");
$min_price = $GLOBALS['plantype']."min_price";
$min_price = $GLOBALS['C_ZYIIS'][$min_price];
if ( $_SESSION['adminusername'] )
{
$min_price = 0.0001;
}
$u = $usermodel->getuserstyperow( );
$sitetype = $sitetypemodel->tsitetypeparents( );
$plantype = $adstypemodel->getadstypetypename( );
require( TPL_DIR."/createplan.php");
}
public function actionpostcreateplan( )
{
$plancla = Z::getsingleton( "model_planclass");
$getuploadadsid = $plancla->setplancheckplan( );
redirect( "?action=planlist&statetype=success");
}
public function actionpostcreate( )
{
$plancla = Z::getsingleton( "model_planclass");
$getuploadadsid = $plancla->setplancheckplan( );
message( "create_plan_ok","?action=planlist");
}
public function actioneditplan( )
{
$action = $_REQUEST['action'];
$actiontype = $_REQUEST['actiontype'];
$statetype = $_REQUEST['statetype'];
$usermodel = Z::getsingleton( "model_userclass");
$planmodel = Z::getsingleton( "model_planclass");
$sitetypemodel = Z::getsingleton( "model_sitetypeclass");
$adstypemodel = Z::getsingleton( "model_adstypeclass");
if ( $actiontype == "postupplan")
{
$planmodel->aclsplan( );
$redurl = $_SERVER['HTTP_REFERER'];
$redurl .= strstr( $redurl,"?") ?"": "?";
$redurl .= strstr( $redurl,"statetype") ?"": "&statetype=success";
redirect( $redurl );
}
$plan = $planmodel->getplanrowbyiduid( );
$acls = $planmodel->getaclsbyplanaid( );
$plantype = $adstypemodel->getadstypeparent( );
$u = $usermodel->getuserstyperow( );
foreach ( ( array )$acls as $acls )
{
if ( $acls['type'] == "webtype")
{
$webtype = explode( ",",$acls['data'] );
$sitetypeval = $acls['data'];
$webtypecom = $acls['comparison'];
}
if ( $acls['type'] == "city")
{
$aclcity = TRUE;
$citydata = trim( $acls['data'],",");
$cityarr = explode( ",",$citydata );
$citycom = $acls['comparison'];
}
if ( $acls['type'] == "time")
{
$acltime = TRUE;
$timedata = explode( ",",$acls['data'] );
}
if ( $acls['type'] == "weekday")
{
$aclweekday = TRUE;
$weekdaydata = explode( ",",$acls['data'] );
}
}
$sitetype = $sitetypemodel->tsitetypeparents( );
$parentid = $sitetypemodel->getsitetypeparentzone( );
require( TPL_DIR."/createplan.php");
}
public function actioneditplantype( )
{
!empty( $_GET['edittype'] ) ?( $edittype = $_GET['edittype'] ) : ( $edittype = "");
if ( $edittype == "planwebtype")
{
$planmodel = Z::getsingleton( "model_planclass");
$plan = $planmodel->gtplanonebytypeuid( );
$acls = $planmodel->getaclsbyplanaid( );
$jshtml = $planmodel->skjscript( );
}
if ( $edittype == "planinfo")
{
$planmodel = Z::getsingleton( "model_planclass");
$plan = $planmodel->getplanrowbyiduid( );
$planinfo = $plan['planinfo'];
}
$min_price = $plan['plantype']."min_price";
$min_price = $GLOBALS['C_ZYIIS'][$min_price];
if ( $_SESSION['adminusername'] )
{
$min_price = 0.0001;
}
require( TPL_DIR."/editplantype.php");
}
public function actionposteditplan( )
{
!empty( $_GET['edittype'] ) ?( $addedit = $_GET['edittype'] ) : ( $addedit = "");
$plancla = Z::getsingleton( "model_planclass");
if ( $addedit == "planname")
{
$plancla->setplannamebyuid( );
}
if ( $addedit == "audit")
{
$plancla->setaudit( );
}
if ( $addedit == "planinfo")
{
$plancla->setplaninfo( );
}
if ( $addedit == "planbudgetprice")
{
$plancla->setpriceadv( );
}
if ( $addedit == "planacl")
{
$plancla->delacls( );
}
echo "<script>window.opener.location.reload();window.close();</script>";
}
public function actioneditstatusplan( )
{
}
public function actioncreateads( )
{
$planmodel = Z::getsingleton( "model_planclass");
$adstypemodel = Z::getsingleton( "model_adstypeclass");
$actiontype = $_REQUEST['actiontype'];
$action = $_REQUEST['action'];
$adstypeid = ( integer )$_REQUEST['adstypeid'];
$planid = ( integer )$_REQUEST['planid'];
$allplan = $planmodel->getplanrowsbyuid( );
foreach ( ( array )$allplan as $plan )
{
if ( $planid == $plan['planid'] )
{
$plantype = $plan['plantype'];
}
}
$adstype = $adstypemodel->getadstypeplanstatus1( $plantype );
$ati = $adstypemodel->getadstypeid( $adstypeid );
$htmlcontrol = unserialize( $ati['htmlcontrol'] );
if ( $action == "editads")
{
$adsmodel = Z::getsingleton( "model_adsclass");
$a = $adsmodel->zadsplanrow( );
$adstypeid = $a['adstypeid'];
$planid = $a['planid'];
if ( $a['imageurl'] != "")
{
unset( $htmlcontrol[array_search( "width",$htmlcontrol )] );
unset( $htmlcontrol[array_search( "height",$htmlcontrol )] );
}
if ( $a['status'] == 2 )
{
$e = $adsmodel->getupadslog( $a['adsid'] );
$olddata = stripslashes_deep( unserialize( base64_decode( $e['olddata'] ) ) );
$updata = stripslashes_deep( unserialize( base64_decode( $e['updata'] ) ) );
}
if ( $a['htmlcode'] )
{
$a['htmlcode'] = str_replace( "{clickurl}","",$a['htmlcode'] );
$a['htmlcode'] = preg_replace( "/<a(.*?)href\\s*=\\s*(\\\\?['\"])\\s*(.*?)\\2(.*?) *>/e","'<a\$1href=\$2'.urldecode('\$3').'\$2\$4>'",$a['htmlcode'] );
$a['htmlcode'] = stripslashes( $a['htmlcode'] );
}
$files = substr( $a['imageurl'],0,4 );
}
if ( $actiontype == "postupads")
{
$adsmodel->zyadsbyupadslog( );
redirect( "?action=adslist&statetype=success");
}
$hs = $_SESSION['password'].$_SESSION['usrname'].$_SESSION['uid'].$GLOBALS['C_ZYIIS']['url_key'];
$hs = md5( $hs );
$hv = $_SESSION['uid']."|".$hs;
setcookie( "advhs",$hv,TIMES +86400,"/",".".$GLOBALS['C_ZYIIS']['siteurl'] );
require( TPL_DIR."/createads.php");
}
public function actionpostcreateads( )
{
$adscla = Z::getsingleton( "model_adsclass");
$getuploadadsid = $adscla->getuploadadsid( );
redirect( "?action=adslist&statetype=success");
}
public function actionadslist( )
{
$adstypemodel = Z::getsingleton( "model_adstypeclass");
$planmodel = Z::getsingleton( "model_planclass");
$statsmodel = Z::getsingleton( "model_statsclass");
$adsmodel = Z::getsingleton( "model_adsclass");
$planid = ( integer )$_REQUEST['planid'];
$plan = $planmodel->getplanrowsbyuid( );
$adssql = $adsmodel->adsandplanbysqlandnums( );
z::loadclass( "pager");
$page = new Pager( );
$url = "?action=adslist&planid=".$planid;
$page->url = $url;
$ads = $page->parse_sqls( $adssql,$adsmodel->dbo );
$viewpage = $page->navbar( );
require( TPL_DIR."/adslist.php");
}
public function actioneditads( )
{
return $this->actioncreateads( );
}
public function actiondelads( )
{
}
public function actionupdateads( )
{
$adscla = Z::getsingleton( "model_adsclass");
$adscla->zyadsbyupadslog( );
$planid = ( integer )$_POST['planid'];
message( "updateAds_ok","?action=adslist");
}
public function actionconsumelist( )
{
$actiontype = $_GET['actiontype'];
if ( $actiontype == "charge")
{
$edittype = "pay";
require( TPL_DIR."/ajaxcontent.php");
exit( );
}
$u = $this->usermodel->getuserinfo( );
$paymodel = Z::getsingleton( "model_payclass");
$paysql = $paymodel->getonlinepaysqlandnum( );
z::loadclass( "pager");
$page = new Pager( );
$url = "?action=consumelist";
$page->url = $url;
$pay = $page->parse_sqls( $paysql,$paymodel->dbo );
$viewpage = $page->navbar( );
require( TPL_DIR."/consumelist.php");
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
$allplanname = $planmodel->getplanrowsbyuid( );
$orderssql = $ordersmodel->getordersqlandnum( "adv");
z::loadclass( "pager");
$page = new Pager( );
$addurl = "&actiontype=".$actiontype.( "&timerange=".$timerange."&planid={$planid}&status={$status}");
$page->url = "?action=order".$addurl;
$page->totalCount = 100;
$order = $page->parse_sqls( $orderssql,$ordersmodel->dbo );
$viewpage = $page->navbar( );
require( TPL_DIR."/order.php");
}
public function actionpayment( )
{
$paymodel = Z::getsingleton( "model_payclass");
$actiontype = $_REQUEST['actiontype'];
if ( $actiontype == "old")
{
$orderid = $_REQUEST['orderid'];
$q = $paymodel->getonlinepaybyorderyidstatuszone( $orderid );
$paytype = $q['paytype'];
$imoney = $q['imoney'];
$orderid = $q['orderid'];
}
else
{
$paytype = $_POST['paytype'];
$imoney = $_POST['imoney'];
if ( $paytype == "")
{
$paytype = $GLOBALS['C_ZYIIS']['default_pay'];
}
$orderid = "".date( "Y").date( "m").date( "d").date( "H").time( ).rand( 0,10000 );
$q = $paymodel->createonlinepay( $_SESSION['username'],$imoney,$paytype,$orderid );
}
$pay = z::getsingleton( "pay_pay");
echo $pay->put( $paytype,$orderid,$imoney,$_SESSION['username'] );
require( TPL_DIR."/e-payment.php");
}
public function actionpostpayment( )
{
$adscla = Z::getsingleton( "model_adsclass");
$adscla->createonlinepaytopost( );
}
public function actionuserinfo( )
{
$statetype = $_REQUEST['statetype'];
$actiontype = $_REQUEST['actiontype'];
$usermodel = Z::getsingleton( "model_userclass");
$u = $usermodel->getuserinfo( );
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
$statetype = $_GET['statetype'];
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
redirect( "?action=pm&statetype=success&actiontype=view&type=".$type."&msgid=".$msgid );
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
public function actiongetimagesize( )
{
$adscla = Z::getsingleton( "model_adsclass");
echo $adscla->GetImageSize( );
}
public function actionhelp( )
{
require( TPL_DIR."/help.php");
}
public function sendemail( $content,$email )
{
$body = $this->_obfuscate_aQE4cnsTbWkrJw8( $content );
$body = arrreplact( $body );
$subject = $body['subject'];
$msghtml = $body['body'];
sendmail( $email,$subject,$msghtml );
}
public function actionstats( )
{
$statsmodel = Z::getsingleton( "model_statsclass");
$planmodel = Z::getsingleton( "model_planclass");
$usermodel = Z::getsingleton( "model_userclass");
$sitemodel = Z::getsingleton( "model_siteclass");
$actiontype = $_REQUEST['actiontype'];
$timerange = $_REQUEST['timerange'];
if ( 3 <strlen( $timerange ) )
{
$d = @explode( "/",$timerange );
$time_begin = $d[0];
$time_end = $d[1];
}
$planid = $_REQUEST['planid'];
$statssql = $statsmodel->tplanstatsqlsandnum( );
z::loadclass( "pager");
$page = new Pager( );
$page->totalCount = 30;
$addurl = "&actiontype=".$actiontype.( "&planid=".$planid."&timerange={$timerange}");
$page->url = "?action=stats".$addurl;
$stats = $page->parse_sqls( $statssql,$statsmodel->dbo );
$allplanname = $planmodel->getplanrowsbyuid( );
$viewpage = $page->navbar( );
require( TPL_DIR."/stats.php");
}
public function actionaudit( )
{
$actiontype = h( $_REQUEST['actiontype'] );
$searchtype = h( $_REQUEST['searchtype'] );
$searchval = h( trim( $_REQUEST['searchval'] ) );
$timerange = $_REQUEST['timerange'];
$timetype = $_REQUEST['timetype'];
$plantype = $_REQUEST['plantype'];
$listtype = $_REQUEST['listtype'];
$timebegin = $_REQUEST['timebegin'];
$timeend = $_REQUEST['timeend'];
$status = $_REQUEST['status'];
$auditmodel = Z::getsingleton( "model_auditclass");
$planmodel = Z::getsingleton( "model_planclass");
$auditsql = $auditmodel->getauditsiteuserbysqlandnum( "adv");
if ( $actiontype == "postauditchoose")
{
$c = $auditmodel->auditpermission( "aff");
$redurl = $_SERVER['HTTP_REFERER'];
redirect( $redurl );
}
else
{
if ( $actiontype == "alexapr")
{
$sitemodel = Z::getsingleton( "model_siteclass");
$q = $sitemodel->sitealexa( );
exit( $q );
}
}
$addurl = "&status=".$status;
z::loadclass( "pager");
$page = new Pager( );
$page->url = "?action=audit".$addurl;
$audit = $page->parse_sqls( $auditsql,$auditmodel->dbo );
$viewpage = $page->navbar( );
$allplanname = $planmodel->getplanrowsbyuid( );
require( TPL_DIR."/audit.php");
}
public function gettracking( )
{
require( TPL_DIR."/gettracking.php");
}
public function actionshowads( )
{
$adscla = Z::getsingleton( "model_adsclass");
$m = $adscla->zadsandplanrow( );
echo $m['htmlcode'];
}
public function actionshowadslist( )
{
$adsid = ( integer )$_GET['adsid'];
$height = ( integer )$_GET['height'];
if ( !$height )
{
$height = 60;
}
echo "<iframe  width=470 height=".$height." frameborder=0 src=\"?action=showads&adsid=".$adsid."\" marginwidth=\"0\" marginheight=\"0\" vspace=\"0\" hspace=\"0\" allowtransparency=\"true\" scrolling=\"yes\"></iframe>";
}
public function actionfaq( )
{
Z::zrequire( P_TPL."/faq.php");
}
}

?>