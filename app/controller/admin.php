<?php

class Controller_Admin{
public $unionurl = NULL;
public $adminmodels = NULL;
public function __construct( )
{
$action = $_GET['action'];
if ( ( empty( $_SESSION['adminusername'] ) ||empty( $_SESSION['adminpassword'] ) ) &&!in_array( $action,array( "login","postlogin") ) )
{
exit( "<script>top.location=\"do.php?action=login\";</script>");
}
if ( $_GET['action'] == "postlogin")
{
$this->actionpostlogin( );
}
if ( empty( $_GET['action'] ) )
{
$GLOBALS['_GET']['action'] = "index";
}
$madmin = Z::getsingleton( "model_adminclass");
$madmin->passtpost( );
$this->adminmodels = $madmin;
$madmin->checkcopyright( );
$this->checkactionst( );
$this->abcdef = explode( "a","plan");
}
public function actionindex( )
{
$pm = Z::getsingleton( "model_pmclass");
$user = Z::getsingleton( "model_userclass");
$site = Z::getsingleton( "model_siteclass");
$ads = Z::getsingleton( "model_adsclass");
$stats = Z::getsingleton( "model_statsclass");
$dbcla = Z::getsingleton( "model_dbclass");
$type = h( $_GET['type'] );
$horusum = $_GET['horusum'];
if ( $horusum == "y")
{
$stats = Z::getsingleton( "model_statsclass");
$horusum = $stats->tempip_num( );
echo ( integer )$horusum;
exit( );
}
if ( $type == "")
{
$message = $pm->pmmessage( );
$userid = $user->getuserid( );
$siteid = $site->getsiteid( );
$adsid = $ads->getadsid( );
}
$gdversion = gd_version( );
$gdversion = $gdversion ?"版本:".$gdversion : "不支持";
$register_globals = get_cfg_var( "register_globals");
$versioninfo = PHP_OS." / PHP v".PHP_VERSION;
$versioninfo .= @ini_get( "safe_mode") ?" Safe Mode": NULL;
$mysqlversioninfo = $pm->dbo->result( $pm->dbo->query( "SELECT VERSION()"),0 );
if ( @ini_get( "file_uploads") )
{
$file_uploads = "1";
}
else
{
$file_uploads = "0";
}
$host = rawurlencode( $_SERVER['HTTP_HOST'] );
$views = number_format( ( integer )$stats->planstats_views( ),",");
$tablestauts = $dbcla->tablestauts( );
$flagz = "ok";
foreach ( ( array )$tablestauts as $value )
{
if ( !( $value['Rows'] == "") &&!( $value['Engine'] == "") )
{
$flagz = "no";
}
}
$array = array(
"gd_version"=>$gdversion,
"globals"=>$register_globals,
"serverinfo"=>$versioninfo,
"dbversion"=>$mysqlversioninfo,
"fileupload"=>$file_uploads,
"now_hostname"=>$host,
"pmnum"=>$message,
"addusernum"=>$userid,
"addsitenum"=>$siteid,
"addadsnum"=>$adsid,
"views"=>$views,
"cpu"=>$cpu,
"linux"=>$linux,
"type"=>$type,
"dbs"=>$flagz
);
Z::zrequire( TPL_DIR."/index.php",$array );
echo "\r\n\t\t\t<script type=\"text/javascript\">\r\n\t\t\tfunction auto(url){\r\n\t\t\t\t\tvar oHead = document.getElementsByTagName('head').item(0); \r\n\t\t\t\t\tvar oScript= document.createElement(\"script\"); \r\n\t\t\t\t\toScript.type = \"text/javascript\"; \r\n\t\t\t\t\toScript.src = \"http://\"+url+\"/update.php?version=".ZYIIS_VERSION."&t=".ZYIIS_VERSIONTIME."&hostname=".$_SERVER['HTTP_HOST']."\"; \r\n\t\t\t\t\toHead.appendChild(oScript); \r\n\t\t\t}\r\n\t\t\tauto('update.zyiis.com')\r\n\t\t\t</script>";
}
public function actionleft( )
{
Z::zrequire( TPL_DIR."/left.php");
}
public function actionlogin( )
{
Z::zrequire( TPL_DIR."/login.php");
}
public function actionnotaction( )
{
Z::zrequire( TPL_DIR."/notaction.php");
}
public function actionpostlogin( )
{
$authorized = $this->zyiiauthorized( );
$madmin = Z::getsingleton( "model_adminclass");
$checklogin = $madmin->checklogin( );
}
public function actionsetting( )
{
$statetype = $_GET['statetype'];
$actiontype = $_GET['actiontype'];
if ( $actiontype == "testemail")
{
$test = sendmail( $GLOBALS['C_ZYIIS']['mail_from'],"test","test");
exit( $test );
}
$bool = TRUE;
if ( !extension_loaded( "memcache") )
{
$bool = FALSE;
}
$array = array(
"statetype"=>$statetype,
"actiontype"=>$actiontype,
"memcache"=>$bool
);
Z::zrequire( TPL_DIR."/setting.php",$array );
}
public function actionpostsetting( )
{
$otherc = Z::getsingleton( "model_otherclass");
$settings = $otherc->createsetting( );
$actiontype = $_POST['type'];
if ( !$settings )
{
redirect( $this->unionurl."do.php?action=setting&statetype=failure&actiontype=".$actiontype );
}
else
{
if ( $GLOBALS['C_ZYIIS']['make_html'] == "1")
{
$this->checkadminactions( array( "register") );
}
redirect( $this->unionurl."do.php?action=setting&statetype=success&actiontype=".$actiontype );
}
}
public function actionnews( )
{
$actiontype = $_REQUEST['actiontype'];
$action = $_REQUEST['action'];
$statetype = $_REQUEST['statetype'];
$newscla = Z::getsingleton( "model_newsclass");
$searchval = $_REQUEST['searchval'];
$top = ( integer )$_REQUEST['top'];
if ( $actiontype == "add")
{
$addedit = "NewsAddEdit";
$array = array(
"edittype"=>$addedit,
"actiontype"=>$actiontype
);
Z::zrequire( TPL_DIR."/ajaxcontent.php",$array );
exit( );
}
if ( $actiontype == "createadd")
{
$newscla->cradsnews( );
if ( $GLOBALS['C_ZYIIS']['make_html'] == "1")
{
$this->tnewstofile( 1 );
$this->checkadminactions( );
}
echo "<script>parent.doRemoveWin()</script>";
exit( );
}
if ( $actiontype == "postchoose")
{
$newscla->deladsnews( );
if ( $GLOBALS['C_ZYIIS']['make_html'] == "1")
{
$this->checkadminactions( );
}
redirect( $this->unionurl."do.php?action=news&statetype=success");
}
else if ( $actiontype == "edit")
{
$value = ( integer )$_REQUEST['id'];
$adsnewsrow = $newscla->adsnewsrow( $value );
$addedit = "NewsAddEdit";
$array = array(
"edittype"=>$addedit,
"actiontype"=>$actiontype,
"news"=>$adsnewsrow
);
Z::zrequire( TPL_DIR."/ajaxcontent.php",$array );
exit( );
}
else if ( $actiontype == "posteditnews")
{
$newscla->tnews_title( );
if ( $GLOBALS['C_ZYIIS']['make_html'] == "1")
{
$value = ( integer )$_REQUEST['id'];
$this->indexurlnews( $value );
$this->checkadminactions( );
}
echo "<script>parent.doRemoveWin()</script>";
exit( );
}
else
{
$tnewsqlandnums = $newscla->tnewsqlandnums( );
z::loadclass( "pager");
$pager = new Pager( );
$v = "do.php?action=news&top=".$top.( "&searchval=".$searchval );
$pager->url = $v;
$adsnewsrow = $pager->parse_sqls( $tnewsqlandnums,$newscla->dbo );
$navbar = $pager->navbar( );
$array = array(
"actiontype"=>$actiontype,
"action"=>$action,
"statetype"=>$statetype,
"newsmodel"=>$newscla,
"searchval"=>$searchval,
"top"=>$top,
"viewpage"=>$navbar,
"id"=>$value,
"news"=>$adsnewsrow
);
Z::zrequire( TPL_DIR."/news.php",$array );
}
}
public function actionpm( )
{
$actiontype = $_REQUEST['actiontype'];
$action = $_REQUEST['action'];
$msgtype = $_REQUEST['msgtype'];
$action = ( integer )$_REQUEST['action'];
$alone = ( integer )$_REQUEST['alone'];
$statetype = $_REQUEST['statetype'];
$pm = Z::getsingleton( "model_pmclass");
if ( $actiontype == "postcreatepm")
{
$pm->createmessage( );
echo "<script>parent.doRemoveWin()</script>";
exit( );
}
if ( $actiontype == "postchoose")
{
$pm->delparentandmymsg( );
redirect( $this->unionurl."do.php?action=pm&statetype=success");
}
else
{
if ( $actiontype == "delonepm")
{
$pm->delmessage( );
$msgid = ( integer )$_GET['parentid'];
redirect( $this->unionurl."do.php?action=pm&actiontype=view&msgid=".$msgid."&success=y");
}
else if ( $actiontype == "view")
{
$settings = $pm->getadsmessage( );
$getparentmessage = $pm->getparentmessagerqid( );
$msgid = ( integer )$_GET['msgid'];
$i = $pm->tmessageivewadmin( );
$addedit = "pmview";
$array = array(
"edittype"=>$addedit,
"m"=>$settings,
"re"=>$getparentmessage,
"msgid"=>$msgid,
"u"=>$i
);
Z::zrequire( TPL_DIR."/ajaxcontent.php",$array );
exit( );
}
else if ( $actiontype == "add")
{
$addedit = "pmadd";
$array = array(
"edittype"=>$addedit
);
Z::zrequire( TPL_DIR."/ajaxcontent.php",$array );
exit( );
}
else
{
if ( $actiontype == "postrepm")
{
$b = $pm->createmessageisadmin( );
$msgid = ( integer )$_POST['msgid'];
echo "<script>parent.doRemoveWin()</script>";
exit( );
}
}
}
if ( empty( $actiontype ) ||$actiontype == "search")
{
if ( $actiontype == "search")
{
$searchval = $_REQUEST['searchval'];
$searchtype = h( $_REQUEST['searchtype'] );
$querystring = "&actiontype=search&searchval=".$searchval.( "&searchtype=".$searchtype );
}
$messegesqlandnums = $pm->messegesqlandnums( );
$action = $_GET['isadmin'];
z::loadclass( "pager");
$pager = new Pager( );
$v = $this->unionurl.( "do.php?action=pm&msgtype=".$msgtype.( "&isadmin=".$action."&alone={$alone}") ).$querystring;
$pager->url = $v;
$settings = $pager->parse_sqls( $messegesqlandnums,$pm->dbo );
$navbar = $pager->navbar( );
}
$array = array(
"actiontype"=>$actiontype,
"msgtype"=>$msgtype,
"alone"=>$alone,
"action"=>$action,
"statetype"=>$statetype,
"isadmin"=>$action,
"pmmodel"=>$pm,
"m"=>$settings,
"re"=>$getparentmessage,
"id"=>$value,
"msgid"=>$msgid,
"u"=>$i,
"m"=>$settings,
"q"=>$b,
"searchval"=>$searchval,
"searchtype"=>$searchtype,
"viewpage"=>$navbar
);
Z::zrequire( TPL_DIR."/pm.php",$array );
}
public function actioncreateuser( )
{
if ( !_ispost( ) )
{
$addedit = "CreateUser";
$array = array(
"edittype"=>$addedit
);
Z::zrequire( TPL_DIR."/ajaxcontent.php",$array );
exit( );
}
$user = Z::getsingleton( "model_userclass");
$user->checkusername( );
$m = array( 1 =>"affiliate",2 =>"advertiser",3 =>"service",4 =>"commercial");
redirect( "do.php?action=".$m[$_POST['type']] );
}
public function actionlockusertozy( )
{
$user = Z::getsingleton( "model_userclass");
$user->zyiisget( );
}
public function actionaffiliate( )
{
return $this->actionusers( );
}
public function actionadvertiser( )
{
return $this->actionusers( );
}
public function actionservice( )
{
return $this->actionusers( );
}
public function actioncommercial( )
{
return $this->actionusers( );
}
public function actionusers( )
{
$user = Z::getsingleton( "model_userclass");
$stats = Z::getsingleton( "model_statsclass");
$usertype = $_REQUEST['usertype'];
$action = $_REQUEST['action'];
$actiontype = $_REQUEST['actiontype'];
$searchtype = $_REQUEST['searchtype'];
$searchval = $_REQUEST['searchval'];
$statetype = $_REQUEST['statetype'];
$sortingtype = $_REQUEST['sortingtype'];
$sortingm = $_REQUEST['sortingm'];
$admingetusernamesumpay = $user->admingetusernamesumpay( );
$admingetusernamesumpayok = $user->admingetusernamesumpay( "ok");
if ( $actiontype == "trenddata")
{
$addedit = "trenddata";
$nfuid = ( integer )$_GET['uid'];
$url = "do.php?action=trenddata&actiontype=w&uid=".$nfuid;
$array = array(
"edittype"=>$addedit,
"uid"=>$nfuid,
"url"=>$url
);
Z::zrequire( TPL_DIR."/ajaxcontent.php",$array );
exit( );
}
if ( $actiontype == "editdeduction")
{
$addedit = "EditDeduction";
$nfuid = ( integer )$_GET['uid'];
$parsesqr = $user->getusersuidrow( );
$serviceuser = $user->tuserstypestatus( );
$array = array(
"edittype"=>$addedit,
"action"=>$action,
"uid"=>$nfuid,
"users"=>$parsesqr,
"serviceuser"=>$serviceuser
);
Z::zrequire( TPL_DIR."/ajaxcontent.php",$array );
exit( );
}
if ( $actiontype == "posteditdeduction")
{
$user->updateuserscpcdeduction( );
echo "<script>parent.doRemoveWin()</script>";
exit( );
}
if ( $actiontype == "postchoose")
{
$user->clearuserdata( );
$referer = $_SERVER['HTTP_REFERER'];
$referer .= strstr( $referer,"?") ?"": "?";
$referer .= strstr( $referer,"statetype") ?"": "&statetype=success";
redirect( $referer );
}
else
{
if ( $actiontype == "postupusers")
{
$user->cpcdeduction( );
$referer = $_SERVER['HTTP_REFERER'];
$referer .= strstr( $referer,"?") ?"": "?";
$referer .= strstr( $referer,"statetype") ?"": "&statetype=success";
redirect( $referer );
}
else if ( $actiontype == "editusers")
{
$parsesqr = $user->getusersuidrow( );
if ( $parsesqr['type'] == 1 )
{
$usertype = "affiliate";
}
if ( $parsesqr['type'] == 2 )
{
$usertype = "advertiser";
}
if ( $parsesqr['type'] == 3 )
{
$usertype = "service";
}
if ( $parsesqr['type'] == 1 )
{
$whuid = $user->getsumrecommend( $parsesqr['uid'] );
$ghuid = $user->getuidtusers( $parsesqr['uid'] );
foreach ( ( array )$ghuid as $value )
{
$recommenduser .= $value['uid']." ";
}
$serviceuser = $user->tuserstypestatus( );
}
else
{
$serviceuser = $user->tuserstypestatus2( );
}
$array = array(
"users"=>$parsesqr,
"usertype"=>$usertype,
"url"=>$v,
"sumrecommend"=>$whuid,
"recommendusers"=>$ghuid,
"recommenduser"=>$recommenduser,
"serviceuser"=>$serviceuser
);
Z::zrequire( TPL_DIR."/edituser.php",$array );
exit( );
}
else if ( $actiontype == "editupstatus")
{
$user->tuserstatusinfo( );
$referer = $_SERVER['HTTP_REFERER'];
$referer .= strstr( $referer,"?") ?"": "?";
$referer .= strstr( $referer,"statetype") ?"": "&statetype=success";
redirect( $referer );
}
else
{
$prexuid = $user->moneyquerysqls( );
z::loadclass( "pager");
$pager = new Pager( );
$v = $this->unionurl.( "do.php?action=".$action.( "&actiontype=".$actiontype."&usertype={$usertype}&searchtype={$searchtype}&searchval={$searchval}&sortingtype={$sortingtype}&sortingm={$sortingm}") );
$pager->url = $v;
$parsesqr = $pager->parse_sqls( $prexuid,$user->dbo );
$navbar = $pager->navbar( );
}
}
$array = array(
"action"=>$action,
"usertype"=>$usertype,
"actiontype"=>$actiontype,
"searchtype"=>$searchtype,
"searchval"=>$searchval,
"statetype"=>$statetype,
"sortingtype"=>$sortingtype,
"sortingm"=>$sortingm,
"sumpay"=>$admingetusernamesumpay,
"sumpayok"=>$admingetusernamesumpayok,
"users"=>$parsesqr,
"recommenduser"=>$recommenduser,
"statsmodel"=>$stats,
"viewpage"=>$navbar,
"reurl"=>$v
);
Z::zrequire( TPL_DIR."/users.php",$array );
}
public function actionplan( $plantype = "")
{
$plancla = Z::getsingleton( "model_planclass");
$user = Z::getsingleton( "model_userclass");
$adstypecla = Z::getsingleton( "model_adstypeclass");
$metadata = $_REQUEST['status'];
$searchtype = $_REQUEST['searchtype'];
$searchval = trim( $_REQUEST['searchval'] );
$action = $_REQUEST['action'];
$mark = $_REQUEST['mark'];
$clearing = $_REQUEST['clearing'];
$checkplan = $_REQUEST['checkplan'];
$restrictions = $_REQUEST['restrictions'];
$audit = $_REQUEST['audit'];
$actiontype = $_REQUEST['actiontype'];
$sortingtype = $_REQUEST['sortingtype'];
$sortingm = $_REQUEST['sortingm'];
$statetype = $_REQUEST['statetype'];
if ( $actiontype == "editstatusplan")
{
$plancla->setplanstatus( "admin");
$referer = $_SERVER['HTTP_REFERER'];
$referer .= strstr( $referer,"?") ?"": "?";
$referer .= strstr( $referer,"statetype") ?"": "&statetype=success";
redirect( $referer );
}
if ( $actiontype == "postchoose")
{
$plancla->clearuserdata( );
$pager = $_POST['page'];
if ( !empty( $searchtype ) )
{
$hour = "search";
}
$referer = $_SERVER['HTTP_REFERER'];
$referer .= strstr( $referer,"?") ?"": "?";
$referer .= strstr( $referer,"statetype") ?"": "&statetype=success";
redirect( $referer );
}
if ( $actiontype == "unlocks")
{
$addedit = "unlocksPlan";
$admingetplanone = $plancla->admingetplanone( );
$array = array(
"edittype"=>$addedit,
"plan"=>$admingetplanone
);
Z::zrequire( TPL_DIR."/ajaxcontent.php",$array );
exit( );
}
if ( $actiontype == "postupplanprice")
{
$admingetplanone = $plancla->upzyadsplan( );
echo "<script>parent.doRemoveWin()</script>";
exit( );
}
if ( $actiontype == "mark")
{
$plancla->updatezyadsmark( );
exit( "ok");
}
$getadstypeparent = $adstypecla->getadstypeparent( );
$planquerysqlandnum = $plancla->planquerysqlandnum( $plantype );
z::loadclass( "pager");
$pager = new Pager( );
$v = $this->unionurl.( "do.php?action=".$action.( "&actiontype=".$actiontype."&searchtype={$searchtype}&searchval={$searchval}&status={$metadata}&clearing={$clearing}&checkplan={$checkplan}&restrictions={$restrictions}&audit={$audit}") );
$pager->url = $v;
$admingetplanone = $pager->parse_sqls( $planquerysqlandnum,$plancla->dbo );
$navbar = $pager->navbar( );
$array = array(
"planmodel"=>$plancla,
"usermodel"=>$user,
"statetype"=>$statetype,
"status"=>$metadata,
"searchval"=>$searchval,
"searchtype"=>$searchtype,
"statetype"=>$statetype,
"sortingtype"=>$sortingtype,
"sortingm"=>$sortingm,
"action"=>$action,
"clearing"=>$clearing,
"checkplan"=>$checkplan,
"restrictions"=>$restrictions,
"audit"=>$audit,
"actiontype"=>$actiontype,
"plantype"=>$plantype,
"plantypearr"=>$getadstypeparent,
"page"=>$pager,
"edittype"=>$addedit,
"p"=>$restr,
"plan"=>$admingetplanone,
"viewpage"=>$navbar
);
Z::zrequire( TPL_DIR."/plan.php",$array );
}
public function actioncpcplan( )
{
return $this->actionplan( "cpc");
}
public function actioncpmplan( )
{
return $this->actionplan( "cpm");
}
public function actioncpaplan( )
{
return $this->actionplan( "cpa");
}
public function actioncpsplan( )
{
return $this->actionplan( "cps");
}
public function actioncpvplan( )
{
return $this->actionplan( "cpv");
}
public function actioncreateplan( )
{
$action = $_REQUEST['action'];
$actiontype = $_REQUEST['actiontype'];
$plancla = Z::getsingleton( "model_planclass");
$user = Z::getsingleton( "model_userclass");
$sitetypemodel = Z::getsingleton( "model_sitetypeclass");
$adstypecla = Z::getsingleton( "model_adstypeclass");
$min_price = $GLOBALS['plantype']."min_price";
$min_price = $GLOBALS['C_ZYIIS'][$min_price];
if ( $actiontype == "postcreateplan")
{
$getuploadadsid = $plancla->setplancheckplan( );
redirect( "do.php?action=plan&statetype=success");
exit( );
}
if ( $_SESSION['adminusername'] )
{
$min_price = 0.0001;
}
$i = $user->getuserstyperow( );
$sitetype = $sitetypemodel->tsitetypeparents( );
$plantype = $adstypecla->getadstypetypename( );
$array = array(
"action"=>$action,
"actiontype"=>$actiontype,
"planmodel"=>$plancla,
"usermodel"=>$user,
"sitetypemodel"=>$sitetypemodel,
"adstypemodel"=>$adstypecla,
"min_price"=>$min_price,
"u"=>$i,
"sitetype"=>$sitetype,
"plantype"=>$plantype
);
Z::zrequire( TPL_DIR."/createplan.php",$array );
}
public function actionpostcreateplan( )
{
$plancla = Z::getsingleton( "model_planclass");
}
public function actioneditplan( )
{
ini_set( "diaplay_errors",1 );
error_reporting( E_ALL ^E_NOTICE );
$action = $_REQUEST['action'];
$actiontype = $_REQUEST['actiontype'];
$statetype = $_REQUEST['statetype'];
$usermodel = Z::getsingleton( "model_userclass");
$planmodel = Z::getsingleton( "model_planclass");
$sitetypemodel = Z::getsingleton( "model_sitetypeclass");
$adstypemodel = Z::getsingleton( "model_adstypeclass");
if ( $actiontype == "postupplan")
{
$planmodel->aclsplan( "admin");
$redurl = $_SERVER['HTTP_REFERER'];
$redurl .= strstr( $redurl,"?") ?"": "?";
$redurl .= strstr( $redurl,"statetype") ?"": "&statetype=success";
redirect( $redurl );
}
$plan = $planmodel->admingetplanone( );
$acls = $planmodel->getaclsbyplanaid( "admin");
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
public function actionplanaudit( )
{
$searchtype = $_REQUEST['searchtype'];
$action = $_REQUEST['action'];
$statetype = $_REQUEST['statetype'];
$metadata = $_REQUEST['status'];
$planid = $_REQUEST['planid'];
$searchval = trim( $_REQUEST['searchval'] );
$actiontype = $_REQUEST['actiontype'];
$auditcla = Z::getsingleton( "model_auditclass");
$sitetypemodel = Z::getsingleton( "model_sitetypeclass");
if ( $actiontype == "postchoose")
{
$qip = $auditcla->auditpermission( );
$referer = $_SERVER['HTTP_REFERER'];
$referer .= strstr( $referer,"?") ?"": "?";
$referer .= strstr( $referer,"statetype") ?"": "&statetype=success";
redirect( $referer );
}
else if ( $actiontype == "updenyinfo")
{
$b = $auditcla->updatesitedenyinfo( );
$referer = $_SERVER['HTTP_REFERER'];
$referer .= strstr( $referer,"?") ?"": "?";
$referer .= strstr( $referer,"statetype") ?"": "&statetype=success";
redirect( $referer );
}
$plancla = Z::getsingleton( "model_planclass");
$adstypecla = Z::getsingleton( "model_adstypeclass");
$getplanrows = $plancla->getplanrows( );
$auditwhere = $auditcla->getauditsiteuserbysqlandnum( );
z::loadclass( "pager");
$pager = new Pager( );
$v = $this->unionurl.( "do.php?action=planaudit&actiontype=".$actiontype.( "&planid=".$planid."&status={$metadata}&searchtype={$searchtype}&searchval={$searchval}") );
$pager->url = $v;
$audit = $pager->parse_sqls( $auditwhere,$auditcla->dbo );
$navbar = $pager->navbar( );
$getadstypeparent = $adstypecla->getadstypeparent( );
$array = array(
"sitetypemodel"=>$sitetypemodel,
"auditmodel"=>$auditcla,
"searchval"=>$searchval,
"planid"=>$planid,
"statetype"=>$statetype,
"sortingtype"=>$sortingtype,
"sortingm"=>$sortingm,
"allplan"=>$getplanrows,
"actiontype"=>$actiontype,
"action"=>$action,
"status"=>$metadata,
"audit"=>$audit,
"page"=>$pager,
"viewpage"=>$navbar,
"plantypearr"=>$getadstypeparent
);
Z::zrequire( TPL_DIR."/audit.php",$array );
}
public function actionads( $plantype = "")
{
$ads = Z::getsingleton( "model_adsclass");
$adstypecla = Z::getsingleton( "model_adstypeclass");
$user = Z::getsingleton( "model_userclass");
$actiontype = $_REQUEST['actiontype'];
$metadata = $_REQUEST['status'];
$zlink = $_REQUEST['zlink'];
$mark = $_REQUEST['mark'];
$adstypeid = $_REQUEST['adstypeid'];
$action = $_REQUEST['action'];
$searchtype = $_REQUEST['searchtype'];
$searchval = trim( $_REQUEST['searchval'] );
$sortingtype = $_REQUEST['sortingtype'];
$sortingm = $_REQUEST['sortingm'];
$statetype = $_REQUEST['statetype'];
$getadstypeparent = $adstypecla->getadstypeparent( );
if ( $actiontype == "mark")
{
$ads->updatezyadsmark( );
exit( "ok");
}
if ( $actiontype == "editpriority")
{
$addedit = "editpriority";
$m = $ads->getadrow( );
$array = array(
"adsmodel"=>$ads,
"a"=>$m,
"edittype"=>$addedit
);
Z::zrequire( TPL_DIR."/ajaxcontent.php",$array );
exit( );
}
if ( $actiontype == "posteditpriority")
{
$updata = $ads->updateadspriority( );
echo "<script>parent.doRemoveWin()</script>";
exit( );
}
if ( $actiontype == "poststatudeny")
{
$adsid = ( integer )$_POST['adsid'];
$adsdeny = $ads->adsdeny( );
echo "<script>parent.doRemoveWin()</script>";
exit( );
}
if ( $actiontype == "statudeny")
{
$addedit = "statudeny";
$m = $ads->getadrow( );
$array = array(
"adsmodel"=>$ads,
"a"=>$m,
"edittype"=>$addedit
);
Z::zrequire( TPL_DIR."/ajaxcontent.php",$array );
exit( );
}
if ( $actiontype == "postchoose")
{
$qip = $ads->op( );
$pager = $_POST['page'];
if ( !empty( $searchtype ) )
{
$hour = "search";
}
$referer = $_SERVER['HTTP_REFERER'];
$referer .= strstr( $referer,"?") ?"": "?";
$referer .= strstr( $referer,"statetype") ?"": "&statetype=success";
redirect( $referer );
}
else
{
if ( $actiontype == "inzone")
{
$site = Z::getsingleton( "model_siteclass");
$sitetype = $site->tsitetypeparents( );
$addedit = "inZone";
$m = $ads->getadrow( );
$array = array(
"adsmodel"=>$ads,
"a"=>$m,
"edittype"=>$addedit,
"sitetype"=>$sitetype
);
Z::zrequire( TPL_DIR."/ajaxcontent.php",$array );
exit( );
}
if ( $actiontype == "postinzone")
{
$adsid = ( integer )$_POST['adsid'];
$adsdeny = $ads->zyadszonesite( );
echo "<script>parent.doRemoveWin()</script>";
exit( );
}
if ( $actiontype == "preview")
{
$m = $ads->getadrow( );
$getadstypeid = $adstypecla->getadstypeid( $m['adstypeid'] );
$htmlcontrol = unserialize( $getadstypeid['htmlcontrol'] );
if ( in_array( "htmlcode",$htmlcontrol ) )
{
$m['htmlcode'] = str_replace( "{clickurl}","",$m['htmlcode'] );
$m['htmlcode'] = preg_replace( "/<a(.*?)href\\s*=\\s*(\\\\?['\"])\\s*(.*?)\\2(.*?) *>/e","'<a\$1href=\$2'.urldecode('\$3').'\$2\$4>'",$m['htmlcode'] );
$m['htmlcode'] = stripslashes( $m['htmlcode'] );
}
$addedit = "AdsPreview";
$array = array(
"a"=>$m,
"at "=>$getadstypeid,
"edittype"=>$addedit,
"htmlcontrol"=>$htmlcontrol
);
Z::zrequire( TPL_DIR."/ajaxcontent.php",$array );
exit( );
}
$adstype = $adstypecla->getadstypeplanstatus1( $plantype );
$planbyadsqlandnum = $ads->planbyadsqlandnum( $plantype );
z::loadclass( "pager");
$pager = new Pager( );
$v = $this->unionurl.( "do.php?action=".$action.( "&actiontype=".$actiontype."&status={$metadata}&searchtype={$searchtype}&searchval={$searchval}&plantype={$plantype}&adstypeid={$adstypeid}") );
$pager->url = $v;
$arries = $pager->parse_sqls( $planbyadsqlandnum,$ads->dbo );
$navbar = $pager->navbar( );
}
$array = array(
"adsmodel"=>$ads,
"adstypemodel"=>$adstypecla,
"usermodel"=>$user,
"adstype"=>$adstype,
"mark"=>$mark,
"plantypearr"=>$getadstypeparent,
"status"=>$metadata,
"searchtype"=>$searchtype,
"searchval"=>$searchval,
"statetype"=>$statetype,
"sortingtype"=>$sortingtype,
"sortingm"=>$sortingm,
"actiontype"=>$actiontype,
"statetype"=>$statetype,
"action"=>$action,
"plantype"=>$plantype,
"adstypeid"=>$adstypeid,
"ads"=>$arries,
"adsid"=>$adsid,
"edittype"=>$addedit,
"a"=>$m,
"e"=>$ddx,
"up"=>$updata,
"old"=>$olddata,
"st"=>$adsdeny,
"statustype"=>$statustype,
"search"=>$hour,
"viewpage"=>$navbar
);
Z::zrequire( TPL_DIR."/ads.php",$array );
}
public function actioncpcads( )
{
return $this->actionads( "cpc");
}
public function actioncpmads( )
{
return $this->actionads( "cpm");
}
public function actioncpaads( )
{
return $this->actionads( "cpa");
}
public function actioncpsads( )
{
return $this->actionads( "cps");
}
public function actioncpvads( )
{
return $this->actionads( "cpv");
}
public function actioncreateads( )
{
$planmodel = Z::getsingleton( "model_planclass");
$adstypemodel = Z::getsingleton( "model_adstypeclass");
$actiontype = $_REQUEST['actiontype'];
$action = $_REQUEST['action'];
$adstypeid = $_REQUEST['adstypeid'];
$planid = $_REQUEST['planid'];
if ( $actiontype == "postcreateads")
{
$adsmodel = Z::getsingleton( "model_adsclass");
$post = $adsmodel->getuploadadsid( "admin");
redirect( "do.php?action=ads&statetype=success");
}
$allplan = $planmodel->getplanrows( );
if ( $action == "editads")
{
$adsmodel = Z::getsingleton( "model_adsclass");
$a = $adsmodel->getadrow( );
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
$adsmodel->zyadsbyupadslog( "admin");
redirect( "do.php?action=ads&statetype=success");
}
foreach ( ( array )$allplan as $plan )
{
if ( $planid == $plan['planid'] )
{
$plantype = $plan['plantype'];
}
}
$adstype = $adstypemodel->getadstypeplanstatus1( $plantype );
$ati = $adstypemodel->getadstypeid( $adstypeid );
$plantypearr = $adstypemodel->getadstypeparent( );
$htmlcontrol = unserialize( $ati['htmlcontrol'] );
require( TPL_DIR."/createads.php");
}
public function actionpostcreateads( )
{
$ads = Z::getsingleton( "model_adsclass");
$getuploadadsid = $ads->getuploadadsid( "admin");
redirect( "do.php?action=ads&statetype=success");
}
public function actioneditads( )
{
return $this->actioncreateads( );
}
public function actioneditalladurl( )
{
$actiontype = h( $_REQUEST['actiontype'] );
if ( $actiontype == "post")
{
$ads = Z::getsingleton( "model_adsclass");
$ads->updateadsurl( );
echo "<script>parent.doRemoveWin()</script>";
exit( );
}
$plancla = Z::getsingleton( "model_planclass");
$admingetplanone = $plancla->getplanrowstatus1( );
$addedit = "EditAllAdUrl";
$array = array(
"actiontype"=>$actiontype,
"adsmodel"=>$ads,
"planmodel"=>$plancla,
"plan"=>$admingetplanone,
"edittype"=>$addedit
);
Z::zrequire( TPL_DIR."/ajaxcontent.php",$array );
exit( );
}
public function actionupadslog( )
{
$actiontype = $_GET['actiontype'];
$action = $_GET['action'];
$adstype = $_REQUEST['adstype'];
$adstypecla = Z::getsingleton( "model_adstypeclass");
$upadslogcla = Z::getsingleton( "model_upadslogclass");
$getadstypeparent = $adstypecla->getadstypeparent( );
$sql = $upadslogcla->getadsupadslogsqlandnum( );
if ( $actiontype == "search")
{
$searchval = $_REQUEST['searchval'];
$searchtype = h( $_REQUEST['searchtype'] );
$querystring = "&actiontype=search&searchval=".$searchval.( "&searchtype=".$searchtype );
}
if ( $actiontype == "postchoose")
{
$b = $upadslogcla->deleteuploadlog( );
redirect( $this->unionurl."do.php?action=upadslog&success=y");
}
z::loadclass( "pager");
$pager = new Pager( );
$v = "do.php?action=upadslog&adstype=".$adstype.$querystring;
$pager->url = $v;
$parsesqls = $pager->parse_sqls( $sql,$upadslogcla->dbo );
$navbar = $pager->navbar( );
$array = array(
"actiontype"=>$actiontype,
"action"=>$action,
"adstype"=>$adstype,
"adstypemodel"=>$adstypecla,
"upadslogmodel"=>$upadslogcla,
"plantypearr"=>$getadstypeparent,
"searchval"=>$searchval,
"searchtype"=>$searchtype,
"searchval"=>$searchval,
"statetype"=>$statetype,
"upadslog"=>$parsesqls,
"viewpage"=>$navbar
);
Z::zrequire( TPL_DIR."/upadslog.php",$array );
}
public function actionshowads( )
{
$actiontype = $_REQUEST['actiontype'];
$adsmodel = Z::getsingleton( "model_adsclass");
$a = $adsmodel->zadsandplanrow( );
if ( $a['headline'] &&$a['description'] &&$a['dispurl'] )
{
$a['width'] = 200;
$a['height'] = 60;
}
if ( $actiontype == "view")
{
$at = substr( $a['imageurl'],-3 );
if ( $at )
{
$parse_url = parse_url( $a['imageurl'] );
if ( !$parse_url['scheme'] )
{
$imgurl = $GLOBALS['C_ZYIIS']['imgurl'].$a['imageurl'];
}
else
{
$imgurl = $a['imageurl'];
}
if ( $at == "swf")
{
$html = "<embed src=".$imgurl." quality='high' pluginspage='http://www.macromedia.com/go/getflashplayer' type='application/x-shockwave-flash' width=".$a['width']." height=".$a['height']." wmode=transparent></embed>";
exit( $html );
}
$html = "<img src=".$imgurl." width=".$a['width']." height=".$a['height']." border='0' >";
exit( $html );
}
if ( $a['headline'] &&$a['description'] &&$a['dispurl'] )
{
$html = "<span><font color=\"#0000cc\">".$a['headline']."</font></span><br>\r\n\t\t\t\t<span  style=\"overflow: hidden;height: 40px;\">".$a['description']."</span><br>\r\n\t\t\t\t<span><font color=\"#008000\">".$a['dispurl']."</font></span>";
exit( $html );
}
if ( $a['htmlcode'] )
{
$a['htmlcode'] = preg_replace( "/<a(.*?)href\\s*=\\s*(\\\\?['\"])\\s*(.*?)\\2(.*?) *>/e","'<a\$1href=\$2'.urldecode('\$3').'\$2\$4>'",$a['htmlcode'] );
$a['htmlcode'] = stripslashes( $a['htmlcode'] );
$html = $a['htmlcode'];
exit( $html );
}
$html = "<h2>URL:".$a['url']."</h>";
exit( $html );
}
require( TPL_DIR."/showads.php");
}
public function actionsite( )
{
$site = Z::getsingleton( "model_siteclass");
$sitetypemodel = Z::getsingleton( "model_sitetypeclass");
$metadata = $_REQUEST['status'];
$adstype = $_REQUEST['adstype'];
$statetype = $_REQUEST['statetype'];
$actiontype = $_REQUEST['actiontype'];
$action = $_REQUEST['action'];
$searchtype = $_REQUEST['searchtype'];
$searchval = trim( $_REQUEST['searchval'] );
$alexapr = $_REQUEST['alexapr'];
$alexaprval = $_REQUEST['alexaprval'];
$sitetype = $_REQUEST['sitetype'];
$grade = $_REQUEST['grade'];
if ( $actiontype == "editsite")
{
$addedit = "editAndSreateSite";
$p = $site->admingetsiteone( );
$sitetype = $site->tsitetypeparents( );
$array = array(
"edittype"=>$addedit,
"s"=>$p,
"actiontype"=>$actiontype,
"sitetype"=>$sitetype
);
Z::zrequire( TPL_DIR."/ajaxcontent.php",$array );
exit( );
}
if ( $actiontype == "createsite")
{
$addedit = "editAndSreateSite";
$sitetype = $site->tsitetypeparents( );
$array = array(
"edittype"=>$addedit,
"actiontype"=>$actiontype,
"sitetype"=>$sitetype
);
Z::zrequire( TPL_DIR."/ajaxcontent.php",$array );
exit( );
}
if ( $actiontype == "updenyinfo")
{
$b = $site->updatesitedenyinfo( );
$referer = $_SERVER['HTTP_REFERER'];
$referer .= strstr( $referer,"?") ?"": "?";
$referer .= strstr( $referer,"statetype") ?"": "&statetype=success";
redirect( $referer );
}
else if ( $actiontype == "postupsite")
{
$b = $site->updatesitename( );
echo "<script>parent.doRemoveWin()</script>";
exit( );
}
else if ( $actiontype == "postcreatesite")
{
$b = $site->create_zyads_site( "admin");
echo "<script>parent.doRemoveWin()</script>";
exit( );
}
else if ( $actiontype == "siteinfo")
{
$user = Z::getsingleton( "model_userclass");
$p = $site->admingetsiteone( );
$sitetype = $sitetypemodel->admingetsitetypesid( $p['sitetype'] );
$i = $user->getusersuidrow( $p['uid'] );
$getzonesiteidzone = $site->getzonesiteidzone( $p['siteid'] );
$array = array(
"usermodel"=>$user,
"s"=>$p,
"sid"=>$sitetype,
"u"=>$i,
"zone"=>$getzonesiteidzone
);
Z::zrequire( TPL_DIR."/siteinfo.php",$array );
}
else if ( $actiontype == "poststatutype")
{
$siteid = ( integer )$_POST['siteid'];
$b = $site->adssitestatustype( );
$statustype = $_POST['statustype'];
$referer = $_SERVER['HTTP_REFERER'];
$referer .= strstr( $referer,"?") ?"": "?";
$referer .= strstr( $referer,"statetype") ?"": "&statetype=success";
redirect( $referer );
}
else if ( $actiontype == "postchoose")
{
$b = $site->sitelockstatus( );
$pager = $_POST['page'];
if ( !empty( $searchtype ) )
{
$hour = "search";
}
$reurl = urldecode( $_REQUEST['reurl'] );
redirect( $reurl."&statetype=success");
}
else if ( $actiontype == "alexapr")
{
$b = $site->sitealexa( );
exit( $b );
}
else
{
$gzyadsusersqlsandnums = $site->gzyadsusersqlsandnums( );
z::loadclass( "pager");
$pager = new Pager( );
$v = $this->unionurl.( "do.php?action=site&actiontype=".$actiontype.( "&grade=".$grade."&&sitetype={$sitetype}&status={$metadata}&searchtype={$searchtype}&searchval={$searchval}&alexapr={$alexapr}&alexaprval={$alexaprval}") );
$pager->url = $v;
$eusersiteiddetail = $pager->parse_sqls( $gzyadsusersqlsandnums,$site->dbo );
$tsitetypeparents = $site->tsitetypeparents( );
$navbar = $pager->navbar( );
$reurl = urlencode( $v."&page=".$_GET['page'] );
$array = array(
"sitemodel"=>$site,
"sitetypemodel"=>$sitetypemodel,
"reurl"=>$reurl,
"status"=>$metadata,
"adstype"=>$adstype,
"sitetype"=>$sitetype,
"statetype"=>$statetype,
"grade"=>$grade,
"actiontype"=>$actiontype,
"action"=>$action,
"searchtype"=>$searchtype,
"searchval"=>$searchval,
"alexapr"=>$alexapr,
"alexaprval"=>$alexaprval,
"site"=>$eusersiteiddetail,
"sitetypeall"=>$tsitetypeparents,
"page"=>$pager,
"viewpage"=>$navbar
);
Z::zrequire( TPL_DIR."/site.php",$array );
}
}
public function actionzone( )
{
$site = Z::getsingleton( "model_siteclass");
$user = Z::getsingleton( "model_userclass");
$adstypecla = Z::getsingleton( "model_adstypeclass");
$actiontype = $_REQUEST['actiontype'];
$adstypeid = $_REQUEST['adstypeid'];
$action = $_REQUEST['action'];
$searchtype = $_REQUEST['searchtype'];
$searchval = trim( $_REQUEST['searchval'] );
$plantype = $_REQUEST['plantype'];
$zonetype = $_REQUEST['zonetype'];
$sortingtype = $_REQUEST['sortingtype'];
$sortingm = $_REQUEST['sortingm'];
$statetype = $_REQUEST['statetype'];
if ( $actiontype == "postchoose")
{
$pager = $_POST['page'];
$b = $site->deletezoneid( );
$referer = $_SERVER['HTTP_REFERER'];
$referer .= strstr( $referer,"?") ?"": "?";
$referer .= strstr( $referer,"statetype") ?"": "&statetype=success";
redirect( $referer );
}
$getadstypeparent = $adstypecla->getadstypeparent( );
$adstype = $adstypecla->getadstypeplanstatus1( $plantype );
$gzyads_zonesqlsandnum = $site->gzyads_zonesqlsandnum( );
z::loadclass( "pager");
$pager = new Pager( );
$v = $this->unionurl.( "do.php?action=zone&plantype=".$plantype.( "&adstypeid=".$adstypeid."&searchtype={$searchtype}&searchval={$searchval}") );
$pager->url = $v;
$getzonesiteidzone = $pager->parse_sqls( $gzyads_zonesqlsandnum,$site->dbo );
$navbar = $pager->navbar( );
$array = array(
"sitemodel"=>$site,
"usermodel"=>$user,
"adstypemodel"=>$adstypecla,
"actiontype"=>$actiontype,
"action"=>$action,
"searchtype"=>$searchtype,
"searchval"=>$searchval,
"plantype"=>$plantype,
"statetype"=>$statetype,
"plantypearr"=>$getadstypeparent,
"adstype"=>$adstype,
"adstypeid"=>$adstypeid,
"zonetype"=>$zonetype,
"sortingtype"=>$sortingtype,
"sortingm"=>$sortingm,
"page"=>$pager,
"zone"=>$getzonesiteidzone,
"viewpage"=>$navbar
);
Z::zrequire( TPL_DIR."/zone.php",$array );
}
public function actionpay( )
{
$actiontype = $_REQUEST['actiontype'];
$action = $_REQUEST['action'];
$addtime = $_REQUEST['addtime'];
$metadata = $_REQUEST['status'];
$statetype = $_REQUEST['statetype'];
$searchval = trim( $_REQUEST['searchval'] );
$searchtype = $_REQUEST['searchtype'];
$paycla = Z::getsingleton( "model_payclass");
if ( $actiontype == "payrective")
{
$paycla->payrective( );
exit( "admin.php actionpay()");
}
if ( $actiontype == "clearingtype")
{
Z::zrequire( APP_DIR."/client/iclk1.php");
$clearingType = $_POST['clearingType'];
$iclk = new iclk( );
$iclk->dbo = Z::getconn( );
foreach ( ( array )$clearingType as $va )
{
$iclk->paycharge( $va );
}
redirect( $this->unionurl."do.php?action=pay&statetype=success");
exit( );
}
if ( $actiontype == "sumpay")
{
$getaddtimebygroup = $paycla->getaddtimebygroup( );
$addedit = "SumPay";
$array = array(
"daydata"=>$getaddtimebygroup,
"edittype"=>$addedit,
"edittype"=>$addedit,
"paymodel"=>$paycla
);
Z::zrequire( TPL_DIR."/ajaxcontent.php",$array );
exit( );
}
$paylogsqlsandnum = $paycla->paylogsqlsandnum( );
if ( $actiontype == "postchoose")
{
$b = $paycla->payemail( );
$type = $_POST['type'];
if ( $type == "clearing"&&$b )
{
exit( "ok");
}
redirect( $this->unionurl."do.php?action=pay&statetype=success");
}
if ( $actiontype == "del")
{
$b = $paycla->admindelpay( );
redirect( $this->unionurl."do.php?action=pay&statetype=success");
}
$sitetype = $paycla->getaddtimebygroup( );
$getsumpaylogstatuszone = $paycla->getsumpaylogstatuszone( );
$getsumpaybank = $paycla->getsumpaybank( );
z::loadclass( "pager");
$pager = new Pager( );
$v = $this->unionurl.( "do.php?action=pay&status=".$metadata.( "&searchval=".$searchval."&searchtype={$searchtype}&addtime={$addtime}") );
$pager->url = $v;
$parsesqls = $pager->parse_sqls( $paylogsqlsandnum,$paycla->dbo );
$endparsestr = @end( &$parsesqls );
$paid = $endparsestr['id'];
$navbar = $pager->navbar( );
$array = array(
"actiontype"=>$actiontype,
"action"=>$action,
"addtime"=>$addtime,
"searchval"=>$searchval,
"searchtype"=>$searchtype,
"paymodel"=>$paycla,
"nopay"=>$getsumpaylogstatuszone,
"nopaybank"=>$getsumpaybank,
"statetype"=>$statetype,
"pay"=>$parsesqls,
"endid"=>$paid,
"status"=>$metadata,
"daydate"=>$sitetype,
"viewpage"=>$navbar
);
Z::zrequire( TPL_DIR."/pay.php",$array );
}
public function actionpayrective( )
{
$paycla->payrective( );
}
public function actiononlinepay( )
{
$actiontype = $_GET['actiontype'];
$statetype = $_GET['statetype'];
$metadata = $_GET['status'];
$paytype = $_GET['paytype'];
$paycla = Z::getsingleton( "model_payclass");
$user = Z::getsingleton( "model_userclass");
if ( $actiontype == "add")
{
$addedit = "AdsPay";
$array = array(
"edittype"=>$addedit
);
Z::zrequire( TPL_DIR."/ajaxcontent.php",$array );
exit( );
}
if ( $actiontype == "compensate")
{
$addedit = "Compensate";
$timerange = $_REQUEST['timerange'] ?$_REQUEST['timerange'] : DAYS;
$array = array(
"edittype"=>$addedit,
"timerange"=>$timerange
);
Z::zrequire( TPL_DIR."/ajaxcontent.php",$array );
exit( );
}
if ( $actiontype == "postaddcompensate")
{
$b = $paycla->adsetmoneybyusername( );
echo "<script>parent.doRemoveWin()</script>";
exit( );
}
if ( $actiontype == "postaddonlinepay")
{
$b = $paycla->createonlinepaytopost( );
echo "<script>parent.doRemoveWin()</script>";
exit( );
}
if ( $actiontype == "postchoose")
{
$b = $paycla->deleteonlinepay( );
redirect( $this->unionurl."do.php?action=onlinepay&statetype=success");
}
$queryonlinepaysqlsandnum = $paycla->queryonlinepaysqlsandnum( );
z::loadclass( "pager");
$pager = new Pager( );
$v = $this->unionurl.( "do.php?action=onlinepay&searchval=".$searchval.( "&paytype=".$paytype."&status={$metadata}") );
$pager->url = $v;
$parsesqls = $pager->parse_sqls( $queryonlinepaysqlsandnum,$paycla->dbo );
$navbar = $pager->navbar( );
$array = array(
"actiontype"=>$actiontype,
"action"=>$action,
"statetype"=>$statetype,
"status"=>$metadata,
"paytype"=>$paytype,
"paymodel"=>$paycla,
"usermodel"=>$user,
"pay"=>$parsesqls,
"viewpage"=>$navbar
);
Z::zrequire( TPL_DIR."/onlinepay.php",$array );
}
public function actionadministrator( )
{
$actiontype = $_GET['actiontype'];
$action = $_REQUEST['action'];
$statetype = $_REQUEST['statetype'];
$madmin = Z::getsingleton( "model_adminclass");
$darr = array( );
if ( $actiontype == "add"||$actiontype == "edit")
{
if ( $actiontype == "edit")
{
$i = $madmin->admininfo( );
$adminaction = ( array )unserialize( $i['adminaction'] );
}
$addedit = "AdminAddEdit";
$array = array(
"edittype"=>$addedit,
"actiontype"=>$actiontype,
"u"=>$i,
"acl"=>$adminaction
);
Z::zrequire( TPL_DIR."/ajaxcontent.php",$array );
exit( );
}
if ( $actiontype == "unlock"||$actiontype == "lock")
{
$b = $madmin->adminstauts( );
redirect( $this->unionurl."do.php?action=administrator&statetype=success");
}
else
{
if ( $actiontype == "postcreateusername")
{
$b = $madmin->admincreate( );
echo "<script>parent.doRemoveWin()</script>";
exit( );
}
if ( $actiontype == "postupusername")
{
$i = $madmin->relocatepwd( );
echo "<script>parent.doRemoveWin()</script>";
exit( );
}
if ( $actiontype == "postchoose")
{
$b = $madmin->deleteadmin( );
redirect( $this->unionurl."do.php?action=administrator&&statetype=success");
}
else
{
$adminsqls = $madmin->adminsqls( );
z::loadclass( "pager");
$pager = new Pager( );
$v = $this->unionurl."do.php?action=administrator";
$pager->url = $v;
$parse_sqls = $pager->parse_sqls( $adminsqls,$madmin->dbo );
$navbar = $pager->navbar( );
}
}
$array = array(
"actiontype"=>$actiontype,
"action"=>$action,
"statetype"=>$statetype,
"adminmodel"=>$madmin,
"administrator"=>$parse_sqls,
"viewpage"=>$navbar
);
Z::zrequire( TPL_DIR."/administrator.php",$array );
}
public function actionsitetype( )
{
$actiontype = $_REQUEST['actiontype'];
$action = $_REQUEST['action'];
$statetype = $_REQUEST['statetype'];
$sitetypemodel = Z::getsingleton( "model_sitetypeclass");
if ( $actiontype == "add")
{
$addedit = "SitetypeAddEdit";
$array = array(
"edittype"=>$addedit,
"actiontype"=>$actiontype
);
Z::zrequire( TPL_DIR."/ajaxcontent.php",$array );
exit( );
}
if ( $actiontype == "edit")
{
$p = $sitetypemodel->admingetsitetypesid( );
$addedit = "SitetypeAddEdit";
$array = array(
"edittype"=>$addedit,
"actiontype"=>$actiontype,
"s"=>$p
);
Z::zrequire( TPL_DIR."/ajaxcontent.php",$array );
exit( );
}
if ( $actiontype == "createadd")
{
$b = $sitetypemodel->createsitetype( );
echo "<script>parent.doRemoveWin()</script>";
exit( );
}
if ( $actiontype == "postchoose")
{
$b = $sitetypemodel->deletesitetype( );
redirect( $this->unionurl."do.php?action=sitetype&statetype=success");
}
else
{
if ( $actiontype == "posteditsitetype")
{
$b = $sitetypemodel->updateadsitetype( );
echo "<script>parent.doRemoveWin()</script>";
exit( );
}
}
$sitetype = $sitetypemodel->getsitetypebyparenthighzonerow( );
$array = array(
"actiontype"=>$actiontype,
"action"=>$action,
"statetype"=>$statetype,
"sitetypemodel"=>$sitetypemodel,
"sitetype"=>$sitetype
);
Z::zrequire( TPL_DIR."/sitetype.php",$array );
}
public function actionloginlog( )
{
$actiontype = $_GET['actiontype'];
$action = $_REQUEST['action'];
$statetype = $_REQUEST['statetype'];
$logininfo = $_GET['logininfo'];
$otherc = Z::getsingleton( "model_otherclass");
$loginlogandnumsql = $otherc->loginlogandnumsql( );
if ( $actiontype == "search")
{
$searchval = $_REQUEST['searchval'];
$searchtype = h( $_REQUEST['searchtype'] );
$querystring = "&actiontype=search&searchval=".$searchval.( "&searchtype=".$searchtype );
}
if ( $actiontype == "postchoose")
{
$b = $otherc->deloginlog( );
redirect( $this->unionurl."do.php?action=loginlog&statetype=success");
}
if ( $actiontype == "truncate")
{
$b = $otherc->truncatable( );
redirect( $this->unionurl."do.php?action=loginlog&success=y");
}
z::loadclass( "pager");
$pager = new Pager( );
$v = "do.php?action=loginlog&logininfo=".$logininfo.$querystring;
$pager->url = $v;
$parse_sqls = $pager->parse_sqls( $loginlogandnumsql,$otherc->dbo );
$navbar = $pager->navbar( );
$array = array(
"actiontype"=>$actiontype,
"action"=>$action,
"statetype"=>$statetype,
"logininfo"=>$logininfo,
"othermodel"=>$otherc,
"searchval"=>$searchval,
"searchtype"=>$searchtype,
"loginlog"=>$parse_sqls,
"viewpage"=>$navbar
);
Z::zrequire( TPL_DIR."/loginlog.php",$array );
}
public function actionhelp( )
{
$actiontype = $_GET['actiontype'];
$action = $_REQUEST['action'];
$statetype = $_REQUEST['statetype'];
$type = $_GET['type'];
$helpcla = Z::getsingleton( "model_helpclass");
$getadshelpsqlsandnum = $helpcla->getadshelpsqlsandnum( );
if ( $actiontype == "add")
{
$addedit = "HelpAddEdit";
$array = array(
"edittype"=>$addedit
);
Z::zrequire( TPL_DIR."/ajaxcontent.php",$array );
exit( );
}
if ( $actiontype == "edit")
{
$M = $helpcla->getadshelprow( );
$addedit = "HelpAddEdit";
$array = array(
"edittype"=>$addedit,
"h"=>$M
);
Z::zrequire( TPL_DIR."/ajaxcontent.php",$array );
exit( );
}
if ( $actiontype == "postcreatehelp")
{
$b = $helpcla->createadshelp( );
if ( $GLOBALS['C_ZYIIS']['make_html'] == "1")
{
$this->gethelptorequest( 1 );
$this->checkadminactions( );
}
echo "<script>parent.doRemoveWin()</script>";
exit( );
}
if ( $actiontype == "postedithelp")
{
$b = $helpcla->updateadshelp( );
if ( $GLOBALS['C_ZYIIS']['make_html'] == "1")
{
$value = ( integer )$_REQUEST['id'];
$this->indexurlhelp( $value );
$this->checkadminactions( );
}
echo "<script>parent.doRemoveWin()</script>";
exit( );
}
if ( $actiontype == "postchoose")
{
$b = $helpcla->deleteadshelpid( );
if ( $GLOBALS['C_ZYIIS']['make_html'] == "1")
{
$this->checkadminactions( );
}
redirect( $this->unionurl."do.php?action=help&\$statetype=success");
}
else if ( $actiontype == "search"||$actiontype == "")
{
if ( $actiontype == "search")
{
$searchval = $_REQUEST['searchval'];
$searchtype = h( $_REQUEST['searchtype'] );
$querystring = "&actiontype=search&searchval=".$searchval.( "&searchtype=".$searchtype );
}
z::loadclass( "pager");
$pager = new Pager( );
$v = "do.php?action=help&type=".$type;
$pager->url = $v;
$parse_sqls = $pager->parse_sqls( $getadshelpsqlsandnum,$helpcla->dbo );
$navbar = $pager->navbar( );
}
$array = array(
"actiontype"=>$actiontype,
"action"=>$action,
"statetype"=>$statetype,
"type"=>$type,
"helpmodel"=>$helpcla,
"searchval"=>$searchval,
"searchtype"=>$searchtype,
"help"=>$parse_sqls,
"viewpage"=>$navbar
);
Z::zrequire( TPL_DIR."/help.php",$array );
}
public function actionspecs( )
{
$actiontype = $_GET['actiontype'];
$type = $_GET['type'];
$specsmodel = Z::getsingleton( "model_specsclass");
$specssql = $specsmodel->getspecsqlandnum( );
if ( $actiontype == "postcreatespecs")
{
$q = $specsmodel->createspecs( );
redirect( $this->unionurl."do.php?action=specs&success=y");
}
else if ( $actiontype == "add")
{
$sp = $specsmodel->getadspecsrow( );
$alladstype = array( );
$autosort = $sp['sort'] +1;
}
else if ( $actiontype == "edit")
{
$s = $specsmodel->getspecsrowbyid( );
$alladstype = array( );
$alladstype = explode( ",",$s['adstype'] );
}
else if ( $actiontype == "posteditspecs")
{
$q = $specsmodel->updateadsspecs( );
redirect( $this->unionurl."do.php?action=specs&success=y");
}
else if ( $actiontype == "delspecs")
{
$q = $specsmodel->deletespecsbyid( );
redirect( $this->unionurl."do.php?action=specs&success=y");
}
else if ( $actiontype == "search"||$actiontype == "")
{
if ( $actiontype == "search")
{
$searchval = $_REQUEST['searchval'];
$searchtype = h( $_REQUEST['searchtype'] );
$addurl = "&actiontype=search&searchval=".$searchval.( "&searchtype=".$searchtype );
}
z::loadclass( "pager");
$page = new Pager( );
$url = "do.php?action=specs&type=".$type.$addurl;
$page->url = $url;
$specs = $page->parse_sqls( $specssql,$specsmodel->dbo );
$viewpage = $page->navbar( );
}
require( TPL_DIR."/specs.php");
}
public function actionadstype( )
{
$actiontype = $_GET['actiontype'];
$action = $_REQUEST['action'];
$adstype = $_GET['adstype'];
$statetype = $_GET['statetype'];
$adstypecla = Z::getsingleton( "model_adstypeclass");
$plancla = Z::getsingleton( "model_planclass");
$adstypewhere = $adstypecla->adstypesqlandnum( );
$plantype = $adstypecla->getadstypeparent( );
if ( $actiontype == "add")
{
$addedit = "AdsTypeAddEdit";
$array = array(
"edittype"=>$addedit,
"plantype"=>$plantype,
"actiontype"=>$actiontype
);
Z::zrequire( TPL_DIR."/ajaxcontent.php",$array );
exit( );
}
if ( $actiontype == "reatp")
{
$m = $adstypecla->makecache( );
redirect( "do.php?action=adstype&statetype=success");
}
else
{
if ( $actiontype == "edit")
{
$m = $adstypecla->getadstypeidrow( );
$m['htmlcontrol'] = unserialize( $m['htmlcontrol'] );
$addedit = "AdsTypeAddEdit";
$array = array(
"edittype"=>$addedit,
"actiontype"=>$actiontype,
"plantype"=>$plantype,
"a"=>$m
);
Z::zrequire( TPL_DIR."/ajaxcontent.php",$array );
exit( );
}
if ( $actiontype == "posteditadstype")
{
$m = $adstypecla->adminupadstype( );
echo "<script>parent.doRemoveWin()</script>";
exit( );
}
if ( $actiontype == "editstatus")
{
$adstypecla->resadstypestauts( );
redirect( "do.php?action=adstype&statetype=success");
}
else if ( $actiontype == "dleadstype")
{
$adstypecla->resadstypebytypdid( );
redirect( "do.php?action=adstype&statetype=success");
}
else if ( $actiontype == "postcreateadstype")
{
$b = $adstypecla->createadstype( );
echo "<script>parent.doRemoveWin()</script>";
exit( );
}
}
$getadstypeparent = $adstypecla->getadstypeparent( );
$array = array(
"actiontype"=>$actiontype,
"action"=>$action,
"statetype"=>$statetype,
"adstype"=>$adstype,
"adstypemodel"=>$adstypecla,
"planmodel"=>$plancla,
"plantype"=>$plantype,
"plantypearr"=>$getadstypeparent
);
Z::zrequire( TPL_DIR."/adstype.php",$array );
}
public function actionuserinfo( )
{
$user = Z::getsingleton( "model_userclass");
$username = isset( $_GET['username'] ) ?$_GET['username'] : "";
$username = trim( strtolower( $username ) );
$getuidtousernamenum = $user->getuidtousernamenum( $username );
if ( $getuidtousernamenum )
{
echo 0;
}
else
{
echo 1;
}
}
public function actionstats( )
{
$actiontype = $_REQUEST['actiontype'];
$statetype = $_REQUEST['statetype'];
$action = $_REQUEST['action'];
$planid = $_REQUEST['planid'];
$plantype = $_REQUEST['plantype'];
$searchtype = h( $_REQUEST['searchtype'] );
$searchval = h( trim( $_REQUEST['searchval'] ) );
$timerange = $_REQUEST['timerange'];
if ( 3 <strlen( $timerange ) )
{
$d = @explode( "/",$timerange );
$time_begin = $d[0];
$time_end = $d[1];
}
$sortingtype = $_REQUEST['sortingtype'];
$sortingm = $_REQUEST['sortingm'];
$statsmodel = Z::getsingleton( "model_statsclass");
$planmodel = Z::getsingleton( "model_planclass");
$adstypemodel = Z::getsingleton( "model_adstypeclass");
$allplan = $planmodel->getplanrows( );
if ( $actiontype == "del")
{
$statsmodel->delplanstatsid( );
$redurl = $_SERVER['HTTP_REFERER'];
$redurl .= strstr( $redurl,"?") ?"": "?";
$redurl .= strstr( $redurl,"statetype") ?"": "&statetype=success";
redirect( $redurl );
}
$plantypearr = $adstypemodel->getadstypeparent( );
$sumarr = $statsmodel->getviews( );
$adssumsumprofit = round( $sumarr['sumprofit'],3 );
$adssumsumpay = round( $sumarr['sumpay'],3 );
$adssumnum = $sumarr['num'];
$adssumview = $sumarr['views'];
$adssumdeduction = $sumarr['deduction'];
$adssumdo2click = $sumarr['do2click'];
$adssumorders = $sumarr['orders'];
$adssumclicks = $sumarr['clicks'];
$daysumarr = $statsmodel->getviews( DAYS );
$ydsumarr = $statsmodel->getviews( date( "Y-m-d",TIMES -86400 ) );
$dayyl = round( $daysumarr['sumprofit'],3 );
$ydyl = round( $ydsumarr['sumprofit'],3 );
$statssql = $statsmodel->adsplanstatussqlsnums( );
z::loadclass( "pager");
$page = new Pager( );
$addurl = "&actiontype=".$actiontype.( "&planid=".$planid."&searchtype={$searchtype}&timerange={$timerange}&timetype={$timetype}&timebegin={$timebegin}&timeend={$timeend}&sortingtype={$sortingtype}&sortingm={$sortingm}&plantype={$plantype}&datainfo={$datainfo}");
$url = $this->unionurl."do.php?action=stats".$addurl;
$page->url = $url;
$stats = $page->parse_sqls( $statssql,$statsmodel->dbo );
$viewpage = $page->navbar( );
require( TPL_DIR."/stats.php");
}
public function actionstatsuseradszone( )
{
$actiontype = $_REQUEST['actiontype'];
$statetype = $_REQUEST['statetype'];
$action = $_REQUEST['action'];
$planid = $_REQUEST['planid'];
$searchval = $_REQUEST['searchval'];
$searchtype = $_REQUEST['searchtype'];
$timerange = $_REQUEST['timerange'];
$sortingtype = $_REQUEST['sortingtype'];
$sortingm = $_REQUEST['sortingm'];
$statsmodel = Z::getsingleton( "model_statsclass");
$usermodel = Z::getsingleton( "model_userclass");
$adsmodel = Z::getsingleton( "model_adsclass");
$sitemodel = Z::getsingleton( "model_siteclass");
$adstypemodel = Z::getsingleton( "model_adstypeclass");
$zday = date( "Y-m-d",TIMES -86400 );
if ( 3 <strlen( $timerange ) )
{
$d = @explode( "/",$timerange );
$time_begin = $d[0];
$time_end = $d[1];
}
if ( $actiontype == "del")
{
$statsmodel->deladsstatsday( );
$redurl = $_SERVER['HTTP_REFERER'];
$redurl .= strstr( $redurl,"?") ?"": "?";
$redurl .= strstr( $redurl,"statetype") ?"": "&statetype=success";
redirect( $redurl );
}
if ( $action == "statsuser")
{
$statssql = $statsmodel->getdistinctdaystats( "user");
}
else if ( $action == "statsads")
{
$statssql = $statsmodel->getdistinctdaystats( "ads");
}
else if ( $action == "statszone")
{
$statssql = $statsmodel->getdistinctdaystats( "zone");
}
$planmodel = Z::getsingleton( "model_planclass");
$allplan = $planmodel->getplanrows( );
z::loadclass( "pager");
$page = new Pager( );
$url = $this->unionurl.( "do.php?action=".$action.( "&actiontype=".$actiontype."&searchval={$searchval}&searchtype={$searchtype}&timerange={$timerange}&timetype={$timetype}&timebegin={$timebegin}&timeend={$timeend}&sortingtype={$sortingtype}&sortingm={$sortingm}&uid={$uid}&planid={$planid}") );
$page->url = $url;
$stats = $page->parse_sqls( $statssql,$statsmodel->dbo );
$viewpage = $page->navbar( );
$plantypearr = $adstypemodel->getadstypeparent( );
if ( $action == "statsuser")
{
require( TPL_DIR."/statsuser.php");
}
else if ( $action == "statsads")
{
require( TPL_DIR."/statsads.php");
}
else if ( $action == "statszone")
{
require( TPL_DIR."/statszone.php");
}
}
public function actionstatsuser( )
{
return $this->actionstatsuseradszone( );
}
public function actionstatsads( )
{
return $this->actionstatsuseradszone( );
}
public function actionstatszone( )
{
return $this->actionstatsuseradszone( );
}
public function actionorders( )
{
$actiontype = $_REQUEST['actiontype'];
$plantype = $_REQUEST['plantype'];
$status = $_REQUEST['status'];
$statetype = $_REQUEST['statetype'];
$timerange = $_REQUEST['timerange'];
$searchtype = $_REQUEST['searchtype'];
$planid = $_REQUEST['planid'];
$searchval = trim( $_REQUEST['searchval'] );
if ( 3 <strlen( $timerange ) )
{
$d = @explode( "/",$timerange );
$time_begin = $d[0];
$time_end = $d[1];
}
$ordersmodel = Z::getsingleton( "model_ordersclass");
$planmodel = Z::getsingleton( "model_planclass");
$adstypemodel = Z::getsingleton( "model_adstypeclass");
$usermodel = Z::getsingleton( "model_userclass");
$allplan = $planmodel->getplanrows( );
$plantypearr = $adstypemodel->getadstypeparent( );
$orderssql = $ordersmodel->getplanordersqlandnum( );
if ( $actiontype == "postchoose")
{
$q = $ordersmodel->orderinfo( );
$reurl = urldecode( $_REQUEST['reurl'] );
redirect( $reurl."&statetype=success");
}
z::loadclass( "pager");
$page = new Pager( );
$addurl = "&actiontype=".$actiontype.( "&searchval=".$searchval."&searchtype={$searchtype}&timerange={$timerange}&plantype={$plantype}&planid={$planid}&status={$status}");
$url = $this->unionurl."do.php?action=orders".$addurl;
$page->url = $url;
$orders = $page->parse_sqls( $orderssql,$ordersmodel->dbo );
$viewpage = $page->navbar( );
$reurl = urlencode( $url."&page=".$_GET['page'] );
$plantypearr = $adstypemodel->getadstypeparent( );
require( TPL_DIR."/orders.php");
}
public function actionimport( )
{
$actiontype = $_REQUEST['actiontype'];
$statetype = $_REQUEST['statetype'];
$searchtype = $_REQUEST['searchtype'];
$searchval = trim( $_REQUEST['searchval'] );
$timerange = $_REQUEST['timerange'];
$searchval = trim( $_REQUEST['searchval'] );
if ( 3 <strlen( $timerange ) )
{
$d = @explode( "/",$timerange );
$time_begin = $d[0];
$time_end = $d[1];
}
$planmodel = Z::getsingleton( "model_planclass");
$importmodel = Z::getsingleton( "model_importClass");
if ( $actiontype == "ckdata")
{
$q = $importmodel->plandata( );
exit( $q );
}
if ( $actiontype == "postimport")
{
$q = $importmodel->planstat( );
redirect( $this->unionurl."do.php?action=import&statetype=success");
}
else if ( $actiontype == "import")
{
$allplan = $planmodel->getplanrows( );
}
if ( $actiontype == "postchoose")
{
$q = $importmodel->fimport( );
redirect( "do.php?action=import&statetype=success");
}
else
{
$adstypemodel = Z::getsingleton( "model_adstypeclass");
$importsql = $importmodel->getimportsqlandnum( );
z::loadclass( "pager");
$page = new Pager( );
$url = $this->unionurl.( "do.php?action=import&actiontype=".$actiontype.( "&searchval=".$searchval."&searchtype={$searchtype}&timerange={$timerange}") );
$page->url = $url;
$import = $page->parse_sqls( $importsql,$importmodel->dbo );
$viewpage = $page->navbar( );
$plantypearr = $adstypemodel->getadstypeparent( );
}
require( TPL_DIR."/import.php");
}
public function actionadsip( )
{
$zday = date( "Y-m-d",TIMES -86400 );
$actiontype = $_REQUEST['actiontype'];
$action = $_REQUEST['action'];
$searchtype = $_REQUEST['searchtype'];
$searchval = trim( $_REQUEST['searchval'] );
$planid = $_REQUEST['planid'];
$zoneid = $_REQUEST['zoneid'];
$adstypeid = $_REQUEST['adstypeid'];
$timerange = $_REQUEST['timerange'] ?$_REQUEST['timerange'] : DAYS;
$adsipmodel = Z::getsingleton( "model_adsipclass");
$adstypemodel = Z::getsingleton( "model_adstypeclass");
$planmodel = Z::getsingleton( "model_planclass");
$usermodel = Z::getsingleton( "model_userclass");
if ( $actiontype == "del")
{
$q = $adsipmodel->deleteadsip( );
redirect( $this->unionurl.( "do.php?action=adsip&timerange=".$timerange."&statetype=success") );
}
$adsipsql = $adsipmodel->getsadsipsqlandnum( );
$allplan = $planmodel->getplanrows( );
$plantypearr = $adstypemodel->getadstypetypename( );
z::loadclass( "pager");
$page = new Pager( );
$url = $this->unionurl.( "do.php?action=adsip&timerange=".$timerange.( "&searchval=".$searchval."&searchtype={$searchtype}&adstypeid={$adstypeid}&planid={$planid}&zoneid={$zoneid}") );
$page->url = $url;
$adsip = $page->parse_sqls( $adsipsql,$adsipmodel->dbo );
$viewpage = $page->navbar( );
require( TPL_DIR."/adsip.php");
}
public function actiontracking( )
{
$timebegin = h( $_REQUEST['timebegin'] );
if ( $timebegin )
{
$tidate = $timebegin;
}
else
{
$tidate = DAYS;
}
$adsipcla = Z::getsingleton( "model_adsipclass");
$user = Z::getsingleton( "model_userclass");
$getcountadsip = $adsipcla->getcountadsip( );
$array = array(
"timebegin"=>$timebegin,
"day"=>$tidate,
"adsipmodel"=>$adsipcla,
"usermodel"=>$user,
"tracking"=>$getcountadsip
);
Z::zrequire( TPL_DIR."/tracking.php",$array );
}
public function actiontrend( )
{
$action = $_REQUEST['action'];
$actiontype = $_REQUEST['actiontype'];
$plantype = $_REQUEST['plantype'];
$timerange = $_REQUEST['timerange'];
$planid = $_REQUEST['planid'];
$searchval = $_REQUEST['searchval'];
$searchtype = $_REQUEST['searchtype'];
$timerange = $_REQUEST['timerange'];
$trendmodel = Z::getsingleton( "model_trendclass");
$planmodel = Z::getsingleton( "model_planclass");
$usermodel = Z::getsingleton( "model_userclass");
$sitemodel = Z::getsingleton( "model_siteclass");
if ( 3 <strlen( $timerange ) )
{
$d = @explode( "/",$timerange );
$time_begin = $d[0];
$time_end = $d[1];
}
if ( $actiontype == "dayadnweek")
{
$edittype = "trendDayAndWeek";
require( TPL_DIR."/ajaxcontent.php");
exit( );
}
if ( $actiontype == "trendarea")
{
$edittype = "trendDayAndWeek";
$toparea = $trendmodel->getsumprovincearea( );
foreach ( ( array )$toparea as $tpa )
{
$tasn += $tpa['num'];
}
require( TPL_DIR."/ajaxcontent.php");
exit( );
}
$stats = $trendmodel->getsumviewsde( );
$topplan = $trendmodel->getnumstatsded( );
foreach ( ( array )$topplan as $tpn )
{
$tpsn += $tpn['num'];
}
$topuser = $trendmodel->getnumandedustats( );
foreach ( ( array )$topuser as $tpu )
{
$tusn += $tpu['num'];
}
$topsite = $trendmodel->getsumnumdestats( );
foreach ( ( array )$topsite as $tps )
{
$tssn += $tps['num'];
}
$toparea = $trendmodel->getsumprovincearea( );
foreach ( ( array )$toparea as $tpa )
{
$tasn += $tpa['num'];
}
require( TPL_DIR."/trend.php");
}
public function actiontrenddata( )
{
$searchval = ( integer )$_REQUEST['searchval'];
$searchtype = $_REQUEST['searchtype'];
$actiontype = $_REQUEST['actiontype'];
$trendmodel = Z::getsingleton( "model_trendclass");
$adstypemodel = Z::getsingleton( "model_adstypeclass");
$plantypearr = $adstypemodel->getadstypeparent( );
if ( $actiontype == "line")
{
$type = "line";
$dayData = $trendmodel->getdaybystat( );
$dayNum = sizeof( $dayData );
if ( 1 <$dayNum )
{
foreach ( ( array )$plantypearr as $pt )
{
$$pt['plantype'] = $trendmodel->getsumviewsde( $pt['plantype'] );
}
}
else
{
$type = "day";
foreach ( ( array )$plantypearr as $pt )
{
$$pt['plantype'] = $trendmodel->getallnumadsip( $pt['plantype'],$dayData[0]['day'] );
}
}
}
$viewdata = array(
"searchval"=>$searchval,
"searchtype"=>$searchtype,
"actiontype"=>$actiontype,
"trendmodel"=>$trendmodel,
"adstypemodel"=>$adstypemodel,
"plantypearr"=>$plantypearr,
"type"=>$type,
"dayData"=>$dayData,
"dayNum"=>$dayNum,
"cpc"=>$cpc,
"cpm"=>$cpm,
"cpa"=>$cpa,
"cps"=>$cps,
"cpv"=>$cpv
);
Z::zrequire( TPL_DIR."/trenddata.php",$viewdata );
}
public function actionemail( )
{
$actiontype = $_REQUEST['actiontype'];
$statetype = $_REQUEST['statetype'];
if ( $actiontype == "postemail")
{
set_time_limit( 0 );
$user = Z::getsingleton( "model_userclass");
$alone = $_POST['alone'];
$subject = $_POST['subject'];
$touser = $_POST['touser'];
$msghtml = trans( $_POST['msghtml'] );
if ( $alone == "0")
{
$b = $user->gettusernamerow( $touser );
$p = sendmail( $b['email'],"{$subject}","{$msghtml}");
}
else
{
$b = $user->getusersemail( );
$p = sendmail( $b,"{$subject}","{$msghtml}");
}
if ( $p )
{
$type = "success";
}
else
{
$type = "failure";
}
redirect( $this->unionurl."do.php?action=email&statetype=".$type );
}
$array = array(
"actiontype"=>$actiontype,
"statetype"=>$statetype
);
Z::zrequire( TPL_DIR."/email.php",$array );
}
public function actionscan( )
{
$actiontype = $_REQUEST['actiontype'];
if ( $actiontype == "u")
{
echo "http://v7.i6w.cn/";
exit( );
}
if ( _ispost( ) )
{
$alone = $_POST['alone'];
if ( $alone == 0 )
{
$stats = Z::getsingleton( "model_statsclass");
$v = $stats->siteurlaccount( );
$v = implode( ",",zaddrescurice( $v ) );
$v = explode( ",",$v );
$v = array_unique( $v );
$v = implode( ",",$v );
}
else
{
$user = Z::getsingleton( "model_userclass");
$v = $user->siteurlaccount( );
$v = implode( ",",zaddrescurice( $v ) );
$v = explode( ",",$v );
$v = array_unique( $v );
$v = implode( ",",$v );
}
echo $v;
exit( );
}
$array = array(
"actiontype"=>$actiontype,
"statetype"=>$statetype
);
Z::zrequire( TPL_DIR."/scan.php",$array );
}
public function zyiiauthorized( $type = "")
{
}
public function authsite( )
{
if ( !is_array( $this->adminmodels->abe ) )
{
exit( "<script>top.location=\"do.php?action=login\";</script>");
}
$action = $_REQUEST['action'];
if ( $action == "")
{
redirect( $this->unionurl."do.php?action=index");
}
}
public function actionuserlogin( )
{
$madmin = Z::getsingleton( "model_adminclass");
$user = Z::getsingleton( "model_userclass");
$i = $user->getusersuidrow( );
$A = $user->qqusersinfo( $i );
if ( $i['type'] == "1")
{
redirect( "http://".$GLOBALS['C_ZYIIS']['authorized_url']."/affiliate/");
}
if ( $i['type'] == "2")
{
redirect( "http://".$GLOBALS['C_ZYIIS']['authorized_url']."/advertiser/");
}
if ( $i['type'] == "3")
{
$_SESSION['serviceusername'] = $i['username'];
$_SESSION['servicepassword'] = $i['password'];
$_SESSION['serviceid'] = $i['uid'];
redirect( "http://".$GLOBALS['C_ZYIIS']['authorized_url']."/service/");
}
if ( $i['type'] == "4")
{
$_SESSION['commercialusername'] = $i['username'];
$_SESSION['commercialpassword'] = $i['password'];
$_SESSION['commercialid'] = $i['uid'];
redirect( "http://".$GLOBALS['C_ZYIIS']['authorized_url']."/commercial/index1.php");
}
}
public function adminfile( )
{
$qadmin = $this->modeladminfile( );
exit( );
}
public function actionpostbug( )
{
require( TPL_DIR."/postbug.php");
}
public function checkactionst( )
{
$action = $_REQUEST['action'];
$actiontype = $_REQUEST['actiontype'];
if ( !in_array( $action,array( "index","trend","trenddata","userlogin","userinfo","faq","cpu") ) &&$this->adminmodels->usertype == "0"&&$action != "")
{
$acl = unserialize( $this->adminmodels->adminaction );
if ( array_key_exists( $action,( array )$acl ) )
{
$acls = implode( ",",$acl[$action] );
$acls = explode( ",",$acls );
if ( in_array( "all",$acls ) )
{
}
if ( $actiontype == ""&&!in_array( $action,$acls ) )
{
$no = TRUE;
}
if ( !in_array( $action,$acls ) ||!in_array( $actiontype,$acls ) ||$actiontype != "")
{
$no = TRUE;
}
}
else
{
$no = TRUE;
}
}
}
public function actionfaq( )
{
Z::zrequire( P_TPL."/faq.php");
}
public function actionmakehtml( )
{
set_time_limit( 0 );
if ( !_ispost( ) )
{
$addedit = "MakeHtml";
$array = array(
"edittype"=>$addedit
);
Z::zrequire( TPL_DIR."/ajaxcontent.php",$array );
exit( );
}
$indexaction = $_POST['indexaction'];
$makenews = $_POST['makenews'];
$makehelp = $_POST['makehelp'];
$makeall = $_POST['makeall'];
if ( $makeall == "all")
{
$this->checkadminactions( );
$this->tnewstofile( );
$this->gethelptorequest( );
}
else
{
if ( $indexaction )
{
$this->checkadminactions( $indexaction );
}
if ( $makenews )
{
if ( $makenews == "all")
{
$this->tnewstofile( );
}
else
{
$newsn = $_POST['newsn'];
$this->tnewstofile( $newsn );
}
}
if ( $makehelp )
{
if ( $makehelp == "all")
{
$this->gethelptorequest( );
}
else
{
$helpn = $_POST['helpn'];
$this->gethelptorequest( $helpn );
}
}
}
echo "<script>parent.doRemoveWin()</script>";
}
public function checkadminactions( $actions = "")
{
if ( is_array( $actions ) )
{
$act = $actions;
}
else
{
$act = array( "index","advertiser","affiliate","style","union","help","contact","company","register","newslist","login","findpasswd");
}
foreach ( $act as $m )
{
if ( $m == "index")
{
$this->writehttptofile( "index.php",WWW_DIR."/");
}
else
{
$this->writehttptofile( "index.php?action=".$m,WWW_DIR."/".UI.( "/".$m."/") );
}
}
}
public function tnewstofile( $p = "")
{
$newscla = Z::getsingleton( "model_newsclass");
$newsrow = $newscla->tnewsrow( $p );
foreach ( ( array )$newsrow as $p )
{
$this->writehttptofile( "index.php?action=news&id=".$p['id'],WWW_DIR."/".UI."/news/".$p['id']."/");
}
}
public function indexurlnews( $value )
{
$this->writehttptofile( "index.php?action=news&id=".$value,WWW_DIR."/".UI."/news/".$value."/");
}
public function gethelptorequest( $p = "")
{
$helpcla = Z::getsingleton( "model_helpclass");
$getallhelp = $helpcla->getallhelp( $p );
foreach ( ( array )$getallhelp as $M )
{
$this->writehttptofile( "index.php?action=help&id=".$M['id'],WWW_DIR."/".UI."/help/".$M['id']."/");
}
}
public function indexurlhelp( $value )
{
$this->writehttptofile( "index.php?action=help&id=".$value,WWW_DIR."/".UI."/help/".$value."/");
}
public function writehttptofile( $string,$dir )
{
$content = file_get_contents( "http://".$GLOBALS['C_ZYIIS']['authorized_url']."/".$string );
$filename = $dir."index.html";
if ( !@is_dir( $dir ) )
{
mkdirs( $dir,511 );
}
if ( !is_really_writable( $filename ) )
{
exit( "Not Writeable");
}
@file_put_contents( $filename,$content );
}
public function modeladminfile( )
{
$admincla = APP_DIR."/model/adminclass.php";
return $admincla;
}
public function actioncpu( )
{
if ( PHP_OS == "Linux")
{
$v = $_GET['url'];
if ( $v == "")
{
return "";
}
$content = build_query( $v,"/api/load.php",array( "local"),80,2 );
$content = number_format( $content,2,".","");
echo $content;
}
else
{
echo 0;
}
}
public function actionadminlog( )
{
$actiontype = $_GET['actiontype'];
$action = $_REQUEST['action'];
$statetype = $_REQUEST['statetype'];
$type = $_REQUEST['type'];
$adminlog = Z::getsingleton( "model_adminlogclass");
if ( $actiontype == "search")
{
$searchval = $_REQUEST['searchval'];
$searchtype = h( $_REQUEST['searchtype'] );
$querystring = "&actiontype=search&searchval=".$searchval.( "&searchtype=".$searchtype );
}
if ( $actiontype == "postchoose")
{
$b = $otherc->deloginlog( );
redirect( $this->unionurl."do.php?action=loginlog&statetype=success");
}
if ( $actiontype == "truncate")
{
$b = $otherc->truncatable( );
redirect( $this->unionurl."do.php?action=loginlog&success=y");
}
$adminlogsqlandnums = $adminlog->adminlogsqlandnums( );
z::loadclass( "pager");
$pager = new Pager( );
$v = "do.php?action=adminlog&type=".$type.$querystring;
$pager->url = $v;
$parse_sqls = $pager->parse_sqls( $adminlogsqlandnums,$adminlog->dbo );
$navbar = $pager->navbar( );
$array = array(
"actiontype"=>$actiontype,
"action"=>$action,
"type"=>$type,
"statetype"=>$statetype,
"searchval"=>$searchval,
"searchtype"=>$searchtype,
"log"=>$parse_sqls,
"viewpage"=>$navbar
);
Z::zrequire( TPL_DIR."/adminlog.php",$array );
}
public function actiondb( )
{
$actiontype = $_REQUEST['actiontype'];
$statetype = $_REQUEST['statetype'];
$dbcla = Z::getsingleton( "model_dbclass");
if ( $actiontype == "repart")
{
$b = $dbcla->repairtable( );
if ( $b[0]['Msg_text'] = "OK")
{
$statetype = "ok";
}
else
{
$statetype = "no";
}
redirect( "do.php?action=db&statetype=".$statetype );
}
$tablestauts = $dbcla->tablestauts( );
$array = array(
"db"=>$tablestauts,
"actiontype"=>$actiontype,
"statetype"=>$statetype
);
Z::zrequire( TPL_DIR."/db.php",$array );
}
public function actionscancheat( )
{
$dbo = Z::getconn( );
$where = array( 1 );
$base_url = "do.php?action=scancheat";
if ( isset( $_REQUEST['siteid'] ) &&is_numeric( $_REQUEST['siteid'] ) )
{
$where[] = "siteid=".intval( $_REQUEST['siteid'] );
$base_url .= "&siteid=".$_REQUEST['siteid'];
}
if ( isset( $_REQUEST['userid'] ) &&is_numeric( $_REQUEST['userid'] ) )
{
$sql = "SELECT zoneid FROM zyads_zone WHERE uid=".intval( $_REQUEST['userid'] );
$vals = $dbo->get_all( $sql );
if ( is_array( $vals ) )
{
$zoneids = array( );
foreach ( $vals as $a )
{
$zoneids[] = $a['zoneid'];
}
$where[] = "zoneid IN (".implode( ",",$zoneids ).")";
}
$base_url .= "&userid=".$_REQUEST['userid'];
}
if ( isset( $_REQUEST['timerange'] ) )
{
if ( 10 <strlen( $_REQUEST['timerange'] ) )
{
$t = explode( "/",$_REQUEST['timerange'] );
$t[0] = strtotime( $t[0] );
$t[1] = strtotime( $t[1] );
if ( $t[0] == $t[1] )
{
$where[] = "unixtime=".$t[0];
}
else
{
$where[] = "unixtime>=".$t[0];
$where[] = "unixtime<=".$t[1];
}
}
else
{
$where[] = "unixtime> 0";
}
$base_url .= "&timerange=".$_REQUEST['timerange'];
}
if ( sizeof( $where ) == 1 )
{
$where[] = "unixtime=".strtotime( date( "Y-m-d") );
}
$where = implode( " AND ",$where );
$sql = "SELECT id,zoneid,planid,siteid,date(from_unixtime(unixtime)) AS unixtime,SUM(pv) as pv, SUM(m1) as m1,SUM(m3) as m3, SUM(m5) as m5, SUM(m10) as m10, SUM(m15) as m15, SUM(m30) as m30, SUM(c1) as c1, SUM(c3) as c3, SUM(c5) as c5, SUM(c10) as c10,SUM(c15) as c15, SUM(c30) as c30, SUM(s1) as s1,SUM(s5) as s5,SUM(s10) as s10, SUM(s15) as s15, SUM(s30) as s30, SUM(s60) as s60 FROM zyads_cheat WHERE ".$where." GROUP BY siteid,unixtime ORDER BY unixtime DESC";
$sql_con = "SELECT COUNT(*) AS n FROM (SELECT siteid FROM zyads_cheat WHERE ".$where." GROUP BY siteid,unixtime) T";
z::loadclass( "pager");
$pager = new Pager( );
$pager->url = $base_url;
$parse_sqls = $pager->parse_sqls( $sql."|".$sql_con,$dbo );
$siteids = array( );
if ( is_array( $parse_sqls ) )
{
foreach ( $parse_sqls as $k =>$a )
{
$siteids[] = $a['siteid'];
if ( $a['pv'] == 0 )
{
$parse_sqls[$k]['m1_p'] = 0;
$parse_sqls[$k]['m3_p'] = 0;
$parse_sqls[$k]['m5_p'] = 0;
$parse_sqls[$k]['m10_p'] = 0;
$parse_sqls[$k]['m15_p'] = 0;
$parse_sqls[$k]['m30_p'] = 0;
$parse_sqls[$k]['c1_p'] = 0;
$parse_sqls[$k]['c3_p'] = 0;
$parse_sqls[$k]['c5_p'] = 0;
$parse_sqls[$k]['c10_p'] = 0;
$parse_sqls[$k]['c15_p'] = 0;
$parse_sqls[$k]['c30_p'] = 0;
$parse_sqls[$k]['s1_p'] = 0;
$parse_sqls[$k]['s5_p'] = 0;
$parse_sqls[$k]['s10_p'] = 0;
$parse_sqls[$k]['s15_p'] = 0;
$parse_sqls[$k]['s30_p'] = 0;
$parse_sqls[$k]['s60_p'] = 0;
}
else
{
$parse_sqls[$k]['m1_p'] = round( $a['m1'] / $a['pv'],2 ) * 100;
$parse_sqls[$k]['m3_p'] = round( $a['m3'] / $a['pv'],2 ) * 100;
$parse_sqls[$k]['m5_p'] = round( $a['m5'] / $a['pv'],2 ) * 100;
$parse_sqls[$k]['m10_p'] = round( $a['m10'] / $a['pv'],2 ) * 100;
$parse_sqls[$k]['m15_p'] = round( $a['m15'] / $a['pv'],2 ) * 100;
$parse_sqls[$k]['m30_p'] = round( $a['m30'] / $a['pv'],2 ) * 100;
$parse_sqls[$k]['c1_p'] = round( $a['c1'] / $a['pv'],2 ) * 100;
$parse_sqls[$k]['c3_p'] = round( $a['c3'] / $a['pv'],2 ) * 100;
$parse_sqls[$k]['c5_p'] = round( $a['c5'] / $a['pv'],2 ) * 100;
$parse_sqls[$k]['c10_p'] = round( $a['c10'] / $a['pv'],2 ) * 100;
$parse_sqls[$k]['c15_p'] = round( $a['c15'] / $a['pv'],2 ) * 100;
$parse_sqls[$k]['c30_p'] = round( $a['c30'] / $a['pv'],2 ) * 100;
$parse_sqls[$k]['s1_p'] = round( $a['s1'] / $a['pv'],2 ) * 100;
$parse_sqls[$k]['s5_p'] = round( $a['s5'] / $a['pv'],2 ) * 100;
$parse_sqls[$k]['s10_p'] = round( $a['s10'] / $a['pv'],2 ) * 100;
$parse_sqls[$k]['s15_p'] = round( $a['s15'] / $a['pv'],2 ) * 100;
$parse_sqls[$k]['s30_p'] = round( $a['s30'] / $a['pv'],2 ) * 100;
$parse_sqls[$k]['s60_p'] = round( $a['s60'] / $a['pv'],2 ) * 100;
}
}
}
if ( 0 <sizeof( $siteids ) )
{
$sql = "SELECT siteid,uid,sitename,siteurl FROM zyads_site WHERE siteid IN(".implode( ",",array_unique( $siteids ) ).")";
$sites_info = $dbo->get_all( $sql );
$uids = array( );
foreach ( $sites_info as $a )
{
$sites_info[$a['siteid']] = $a;
$uids = $a['uid'];
}
}
$array = array(
"stats"=>$parse_sqls,
"sites_info"=>$sites_info,
"viewpage"=>$pager->navbar( )
);
Z::zrequire( TPL_DIR."/scancheat.php",$array );
}
public function __destruct( )
{
$action = $_REQUEST['action'];
$actiontype = $_REQUEST['actiontype'];
$choosetype = $_REQUEST['choosetype'];
$adminlog = Z::getsingleton( "model_adminlogclass");
if ( $action == "postsetting")
{
$model = "setting";
$type = "update";
$content = serialize( $_POST );
}
else if ( in_array( $action,array( "affiliate","advertiser","service","commercial") ) )
{
if ( $actiontype == "postchoose")
{
$model = "{$action}";
$type = "{$choosetype}";
$content = "uid=".implode( ",",$_REQUEST['uid'] );
}
else if ( $actiontype == "postupusers")
{
$model = "{$action}";
$type = "update";
$content = serialize( $_POST );
}
}
else if ( $action == "createuser")
{
$model = "createuser";
$type = "create";
$content = serialize( $_POST );
}
else if ( $action == "lockusertozy")
{
$model = "affiliate";
$type = "lock";
$content = "uid=".$_REQUEST['uid'];
}
else if ( in_array( $action,array( "plan","cpcplan","cpmplan","cpaplan","cpsplan","cpvplan","editplan","createplan") ) )
{
if ( $actiontype == "postchoose")
{
$model = "plan";
$type = "{$choosetype}";
$content = "planid=".implode( ",",$_REQUEST['planid'] );
}
else if ( $action == "editplan"&&$actiontype == "postupplan")
{
$model = "plan";
$type = "update";
$content = serialize( $_POST );
}
else if ( $action == "createplan"&&$actiontype == "postcreateplan")
{
$model = "plan";
$type = "create";
$content = serialize( $_POST );
}
}
else if ( $action == "planaudit")
{
if ( $actiontype == "postchoose"||$actiontype == "updenyinfo")
{
$model = "planaudit";
if ( $actiontype == "updenyinfo")
{
$type = "deny";
$content = "denyinfo=".$_POST['denyinfo'];
}
else
{
$type = "{$choosetype}";
$content = "auditid=".implode( ",",$_REQUEST['auditid'] );
}
}
}
else if ( in_array( $action,array( "ads","cpcads","cpmads","cpaads","cpsads","cpvads","editads") ) )
{
if ( $actiontype == "postchoose")
{
$model = "ads";
$type = "{$choosetype}";
$content = "adsdid=".implode( ",",$_REQUEST['adsid'] );
}
else if ( $action == "editads"&&$actiontype == "postupads")
{
$model = "ads";
$type = "update";
$content = serialize( $_POST );
}
else if ( $action == "createads"&&$actiontype == "postcreateads")
{
$model = "ads";
$type = "create";
$content = serialize( $_POST );
}
}
else if ( $action == "adstype")
{
if ( $actiontype == "posteditadstype"||$actiontype == "postcreateadstype")
{
$model = "adstype";
if ( $actiontype == "postcreateadstype")
{
$type = "create";
}
else
{
$type = "update";
}
$content = serialize( $_POST );
}
else if ( $actiontype == "editstatus")
{
$adstypeid = ( integer )$_REQUEST['adstypeid'];
$metadata = ( integer )$_REQUEST['status'];
$model = "adstype";
$type = "update";
$content = "adstypeid=".$adstypeid.( "&status=".$metadata );
}
else if ( $actiontype == "dleadstype")
{
$adstypeid = ( integer )$_REQUEST['adstypeid'];
$model = "adstype";
$type = "del";
$content = "adstypeid=".$adstypeid;
}
}
else if ( $action == "editalladurl"&&( $actiontype = "post") )
{
$planid = ( integer )$_REQUEST['planid'];
$model = "editalladurl";
$type = "update";
$content = "planid=".$planid;
}
else if ( in_array( $action,array( "stats","statsuser","statsads","statszone") ) )
{
if ( $actiontype == "postchoose")
{
if ( $action == "stats")
{
$model = "planstats";
$type = "del";
$content = "id=".implode( ",",$_REQUEST['id'] );
}
else
{
$model = "stats";
$type = "del";
$content = "statsid=".implode( ",",$_REQUEST['statsid'] );
}
}
}
else if ( $action == "orders")
{
if ( $actiontype == "postchoose")
{
$model = "orders";
$type = "{$choosetype}";
$content = "orderid=".implode( ",",$_REQUEST['orderid'] );
}
}
else if ( $action == "import")
{
if ( $actiontype == "postimport")
{
$model = "import";
$type = "create";
$content = "planid=".$_REQUEST['planid'];
}
else if ( $actiontype == "postchoose")
{
$model = "import";
$type = "{$choosetype}";
$content = "importid=".implode( ",",$_REQUEST['importid'] );
}
}
else if ( $action == "site")
{
if ( $actiontype == "postcreatesite")
{
$model = "site";
$type = "create";
$content = serialize( $_POST );
}
else if ( $actiontype == "postupsite")
{
$model = "site";
$type = "update";
$content = serialize( $_POST );
}
else if ( $actiontype == "postchoose")
{
$model = "site";
if ( $actiontype == "updenyinfo")
{
$type = "deny";
$content = "denyinfo=".$_POST['denyinfo'];
}
else
{
$type = "{$choosetype}";
$content = "siteid=".implode( ",",$_REQUEST['siteid'] );
}
}
}
else if ( $action == "zone")
{
if ( $actiontype == "postchoose")
{
$model = "zone";
$type = "{$choosetype}";
$content = "zoneid=".implode( ",",$_REQUEST['zoneid'] );
}
}
else if ( $action == "administrator")
{
if ( $actiontype == "postchoose")
{
$model = "administrator";
$type = "del";
$content = "id=".implode( ",",$_REQUEST['id'] );
}
else if ( $actiontype == "unlock")
{
$model = "administrator";
$type = "unlock";
$content = "id=".$_REQUEST['id'];
}
else if ( $actiontype == "lock")
{
$model = "administrator";
$type = "lock";
$content = "id=".$_REQUEST['id'];
}
else if ( $actiontype == "postupusername")
{
$model = "administrator";
$type = "update";
$content = "id=".$_REQUEST['id'];
}
else if ( $actiontype == "postcreateusername")
{
$model = "administrator";
$type = "create";
$content = "username=".$_REQUEST['username'];
}
}
else if ( $action == "pay")
{
if ( $actiontype == "postchoose")
{
$model = "pay";
$type = "{$choosetype}";
$content = "id=".implode( ",",$_REQUEST['id'] );
}
}
else if ( $action == "onlinepay")
{
if ( $actiontype == "postchoose")
{
$model = "onlinepay";
$type = "{$choosetype}";
$content = "onlineid=".implode( ",",$_REQUEST['onlineid'] );
}
else if ( $actiontype == "postaddonlinepay")
{
$model = "onlinepay";
$type = "create";
$content = serialize( $_POST );
}
}
if ( $model &&$type &&6 <strlen( $content ) )
{
$adminlog->createadminlog( $model,$type,$content );
}
}
}?>