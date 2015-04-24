<?php

Z::loadclass( "model_CkUser");
class Model_UserClass extends Model_Ckuser
{
public $dbo = NULL;
public function model_userclass( )
{
$this->dbo = Z::getconn( );
}
public function tuserinsertid( $array )
{
$bool = $this->dbo->create( $array,"zyads_users");
if ( $bool )
{
return $this->dbo->insert_id( );
}
return FALSE;
}
public function tuserstatus( )
{
$username = $_GET['username'];
$userid = ( integer )$_GET['id'];
$sql = "SELECT uid FROM  zyads_users where activateid=".$userid." AND status=1";
$p = $this->dbo->get_num( $sql );
if ( $p == 1 )
{
$sql = "UPDATE `zyads_users` SET\r\n\t\t\t\t\tstatus = 2,\r\n\t\t\t\t\tactivateid =''  \r\n\t\t\t\t\tWHERE username='".$username.( "' and activateid=".$userid );
$this->dbo->query( $sql );
return TRUE;
}
return FALSE;
}
public function checkadsuers( $type = "")
{
$username = h( trim( $_POST['username'] ) );
$password = md5( trim( $_POST['password'] ) );
$checkcode = h( $_POST['checkcode'] );
$imgcode = Z::getsingleton( "ImgCode");
if ( $password == ""||$username == "")
{
message( "login_err");
}
if ( ( $GLOBALS['C_ZYIIS']['check_code'] == "1"||2 <
$type ) &&!$imgcode->check( $checkcode ) )
{
message( "checkcode");
}
$condition = "";
if ( $type == 3 )
{
$condition = " AND type=3 ";
}
else if ( $type == 4 )
{
$condition = " AND type=4 ";
}
else
{
$condition = " AND (type=1 OR type=2)";
}
$sql = "SELECT 
username,password,loginip,logintime,status,type,uid,serviceid FROM zyads_users\r\n\t\t\t\tWHERE username='".$username."'{$condition}";
$array = $this->dbo->get_one( $sql );
$ip = getip( );
$datetime = DATETIMES;
if ( $array['password'] == $password )
{
if ( $array['status'] == 1 )
{
redirect( "/index.php?action=message&t=login_email_lock");
}
if ( $array['status'] == 0 )
{
redirect( "/index.php?action=message&t=login_lock_0");
}
if ( $array['status'] != 2 )
{
redirect( "/index.php?action=message&t=login_lock");
}
$row = $this->dbo->get_one( "SELECT qq  FROM zyads_users WHERE uid='".$array['serviceid']."'");
$_SESSION['serviceqq'] = $row['qq'];
$_SESSION['username'] = $array['username'];
$_SESSION['password'] = $array['password'];
$_SESSION['usertype'] = $array['type'];
$_SESSION['uid'] = $array['uid'];
if ( $type == 3 )
{
$_SESSION['serviceusername'] = $array['username'];
$_SESSION['servicepassword'] = $array['password'];
$_SESSION['serviceid'] = $array['uid'];
}
if ( $type == 4 )
{
$_SESSION['commercialusername'] = $array['username'];
$_SESSION['commercialpassword'] = $array['password'];
$_SESSION['commercialid'] = $array['uid'];
}
$_SESSION['userhash'] = substr( md5( substr( time( ),0,-7 ).$_SESSION['username'].$_SESSION['password'] ),8,8 );
$_SESSION['l_ip'] = $array['loginip'];
$_SESSION['l_time'] = $array['logintime'];
$query = $this->dbo->query( "UPDATE zyads_users SET loginnum=loginnum+1,loginip='".$ip."',logintime='{$datetime}' WHERE username='{$username}'");
$this->tadsloginlogs( $username,"Succe",$ip,$datetime );
$registereds = $GLOBALS['C_ZYIIS']['authorized_url'];
if ( $array['type'] == "2")
{
redirect( "http://".$registereds."/advertiser");
}
else if ( $array['type'] == "1")
{
redirect( "http://".$registereds."/affiliate");
}
else if ( $array['type'] == "3")
{
redirect( "http://".$registereds."/service");
}
else if ( $array['type'] == "4")
{
redirect( "http://".$registereds."/commercial/index1.php");
}
}
else
{
$this->tadsloginlogs( $username,"Faile",$ip,$datetime );
message( "login_err");
}
}
public function tadsloginlogs( $username,$logininfo,$ip,$datetime )
{
$array = array(
"username"=>$username,
"logintype"=>"member",
"logininfo"=>$logininfo,
"loginip"=>$ip,
"logintime"=>$datetime
);
$query = $this->dbo->create( $array,"zyads_loginlog");
}
public function registeruser( )
{
if ( $_POST['type'] == 1 ||$GLOBALS['C_ZYIIS']['close_reg_aff'] == 1 ||$_POST['type'] == 2 &&$GLOBALS['C_ZYIIS']['close_reg_adv'] == 1 )
{
redirect( "/index.php?action=message&t=closereg");
}
if ( $GLOBALS['C_ZYIIS']['reg_type'] == 1 &&$_POST['type'] == 1 )
{
$url = $_POST['siteurl'];
$siteck = $_SESSION[$url];
if ( $siteck != "ok")
{
message( "no_siteck");
}
}
$activateid = strtotime( DATETIMES );
if ( $_POST['type'] == 2 )
{
$status = $GLOBALS['C_ZYIIS']['adv_reg_status'];
$serviceid = ( integer )$_POST['advserviceid'];
if ( !$serviceid )
{
$commercialuser = $this->tuserstypestatus2( );
$randkey = array_rand( ( array )$commercialuser,1 );
$serviceid = $commercialuser[$randkey]['uid'];
}
}
else
{
$status = $GLOBALS['C_ZYIIS']['aff_reg_status'];
$serviceid = ( integer )$_POST['serviceid'];
}
$row = array(
"username"=>$_POST['username'],
"password"=>md5( $_POST['password'] ),
"question"=>$_POST['question'],
"answer"=>$_POST['answer'],
"contact"=>$_POST['contact'],
"tel"=>$_POST['tel'],
"mobile"=>$_POST['mobile'],
"qq"=>$_POST['qq'],
"email"=>$_POST['email'],
"recommend"=>isset( $_COOKIE['C_recommend'] ) ?$_COOKIE['C_recommend'] : "",
"bank"=>$_POST['bank'],
"bankname"=>$_POST['bankname'],
"bankacc"=>$_POST['bankacc'],
"accountname"=>$_POST['accountname'],
"type"=>( integer )$_POST['type'],
"serviceid"=>isset( $_COOKIE['S_serviceid'] ) ?$_COOKIE['S_serviceid'] : ( integer )$serviceid,
"status"=>( integer )$status,
"regtime"=>DATETIMES,
"regip"=>isset( $_SERVER['REMOTE_ADDR'] ) ?$_SERVER['REMOTE_ADDR'] : "127.0.0.1",
"activateid"=>$activateid
);
$isval = $this->eregusername( $row['username'] );
if ( $isval !== TRUE )
{
redirect( "/index.php?action=message&t=register_err");
}
$isvalname = $this->getuidtousernamenum( $row['username'] );
if ( $isvalname )
{
redirect( "/index.php?action=message&t=register_err");
}
$uid = $this->tuserinsertid( $row );
if ( $uid )
{
if ( $GLOBALS['C_ZYIIS']['reg_money'] == "1"&&( integer )$_POST['type'] == "1")
{
$moneytype = $GLOBALS['C_ZYIIS']['regmoney_type']."money";
$redaddmoney = "\$moneytype=>".$GLOBALS['C_ZYIIS']['regmoney'];
$this->dbo->query( "UPDATE  zyads_users set ".$moneytype."='".$GLOBALS['C_ZYIIS']['regmoney']."' WHERE username='".$row['username']."'");
}
if ( $GLOBALS['C_ZYIIS']['reg_type'] == "1"&&( integer )$_POST['type'] == "1")
{
$_SESSION['uid'] = $uid;
$sitemodel = Z::getsingleton( "model_siteclass");
$q = $sitemodel->create_zyads_site( );
$_SESSION[$_REQUEST['url']] = "";
}
if ( $GLOBALS['C_ZYIIS']['aff_reg_status'] == "1"||( integer )$_POST['type'] == "1"||$GLOBALS['C_ZYIIS']['adv_reg_status'] == "1"&&( integer )$_POST['type'] == "2")
{
include( P_TPL."/emailtpl/subject.php");
$emailtpl = P_TPL."/emailtpl/emaliactivate.html";
$body = @file_get_contents( $emailtpl );
$r = array(
$row['username'],
$activateid,
$GLOBALS['C_ZYIIS']['sitename'],
$GLOBALS['C_ZYIIS']['authorized_url']
);
$s = array( "{username}","{activateid}","{sitename}","{siteurl}");
$body = str_replace( $s,$r,$body );
sendmail( $row['email'],$subject['emaliactivate'],$body );
redirect( "/index.php?action=message&t=toemail");
}
else
{
if ( in_array( "register",explode( ",",$GLOBALS['C_ZYIIS']['tomail'] ) ) )
{
include( P_TPL."/emailtpl/subject.php");
$emailtpl = P_TPL."/emailtpl/register.html";
$body = @file_get_contents( $emailtpl );
$r = array(
$row['username'],
$GLOBALS['C_ZYIIS']['sitename'],
$GLOBALS['C_ZYIIS']['authorized_url']
);
$s = array( "{username}","{sitename}","{siteurl}");
$body = str_replace( $s,$r,$body );
sendmail( $row['email'],$subject['register'],$body );
}
redirect( "/index.php?action=message&t=reg_succeed");
}
}
}
public function checkpassword( $usertype )
{
$userhash = substr( md5( substr( time( ),0,-7 ).$_SESSION['username'].$_SESSION['password'] ),8,8 );
if ( !empty( $_SESSION['username'] ) &&!empty( $_SESSION['password'] ) &&$_SESSION['userhash'] == $userhash )
{
$password = $this->userpassword( $_SESSION['username'],$usertype );
if ( $password != $_SESSION['password'] )
{
redirect( "/index.php?action=login");
}
}
else
{
redirect( "/index.php?action=login");
}
}
public function userpassword( $username,$usertype )
{
$array = $this->dbo->get_one( "select password from zyads_users where username='".$username.( "' and type='".$usertype."'") );
return $array['password'];
}
public function getuserinfo( )
{
if ( $_SESSION['usertype'] == "1")
{
$settings = "(money+daymoney+weekmoney+monthmoney+xmoney) AS money";
}
if ( $_SESSION['usertype'] == "2")
{
$settings = "(money) AS money";
}
$sql = "SELECT *,".$settings." FROM zyads_users\r\n    \t\t\tWHERE uid=".$_SESSION['uid']." AND type='".$_SESSION['usertype']."'\r\n    \t\t\t";
return $this->dbo->get_one( $sql );
}
public function getusersusername( )
{
$username = h( $_POST['username'] );
$sql = "SELECT * FROM zyads_users WHERE username='".$username."'";
return $this->dbo->get_one( $sql );
}
public function getuserstyperow( )
{
$sql = "SELECT * FROM zyads_users WHERE type=2";
return $this->dbo->get_all( $sql );
}
public function userauth( $u )
{
$answer = trim( $_POST['answer'] );
if ( $answer == $u['answer'] &&$u['answer'] )
{
$newpassword = uniqid( rand( ) );
$password = md5( $newpassword );
$sql = "UPDATE zyads_users SET\r\n    \t\t\t\tpassword='".$password."' Where username='".$u['username']."'";
$this->dbo->query( $sql );
$username = substr( $u['username'],0,3 )."***";
include( P_TPL."/emailtpl/subject.php");
$emailtpl = P_TPL."/emailtpl/findpasswd.html";
$body = @file_get_contents( $emailtpl );
$r = array(
$username,
$GLOBALS['C_ZYIIS']['sitename'],
$GLOBALS['C_ZYIIS']['authorized_url'],
$newpassword
);
$s = array( "{username}","{sitename}","{siteurl}","{passwd}");
$body = str_replace( $s,$r,$body );
sendmail( $u['email'],$subject['findpasswd'],$body );
return TRUE;
}
return FALSE;
}
public function tuserquestion( )
{
$addtion = "";
if ( $_POST['bankacc'] )
{
$addtion .= "bankacc='".$_POST['bankacc']."',";
}
if ( $_POST['bank'] )
{
$addtion .= "bank='".$_POST['bank']."',";
}
if ( $_POST['bankname'] )
{
$addtion .= "bankname='".$_POST['bankname']."',";
}
if ( $_POST['accountname'] )
{
$addtion .= "accountname='".$_POST['accountname']."',";
}
$sql = "UPDATE zyads_users SET\r\n    \t\t\tquestion = '".h( $_POST['question'] )."',".$addtion."\r\n\t\t\t\tanswer  = '".h( $_POST['answer'] )."',\r\n\t\t\t\tcontact  = '".h( $_POST['contact'] )."',\r\n\t\t\t\ttel     = '".h( $_POST['tel'] )."',\r\n\t\t\t\tmobile  = '".h( $_POST['mobile'] )."',\r\n\t\t\t\tqq = '".h( $_POST['qq'] )."',\r\n\t\t\t\temail = '".h( $_POST['email'] )."',\r\n\t\t\t\tcompany = '".h( $_POST['company'] )."',\r\n\t\t\t\tcompanyinfo = '".h( $_POST['company_info'] )."'\r\n\t\t\t\tWHERE uid=".$_SESSION['uid']."\r\n    \t";
return $this->dbo->query( $sql );
}
public function modifypassword( )
{
$oldpassword = md5( h( $_POST['oldpassword'] ) );
$password = md5( h( $_POST['password'] ) );
if ( $oldpassword != $_SESSION['password'] )
{
return FALSE;
}
$sql = "UPDATE zyads_users SET\r\n    \t\t\tpassword = '".$password."'\r\n\t\t\t\tWHERE uid=".$_SESSION['uid']."\r\n    \t";
return $this->dbo->query( $sql );
}
public function getusersuidrow( $nfuid = "")
{
if ( $nfuid == "")
{
$nfuid = $_REQUEST['uid'];
}
$sql = "SELECT * From zyads_users\r\n    \t\t\t Where uid=".( integer )$nfuid;
$array = $this->dbo->get_one( $sql );
return $array;
}
public function getsumrecommend( $nfuid = "")
{
if ( !$nfuid )
{
$nfuid = $_SESSION['uid'];
}
$sql = "SELECT count(*) AS n From zyads_users\r\n    \t\t\t Where recommend=".( integer )$nfuid;
$array = $this->dbo->get_one( $sql );
return $array['n'];
}
public function getuidtusers( $nfuid = "")
{
if ( !$nfuid )
{
$nfuid = $_SESSION['uid'];
}
$sql = "SELECT uid From zyads_users\r\n    \t\t\t Where recommend=".( integer )$nfuid." Order By uid DESC LIMIT 0,20";
$array = $this->dbo->get_all( $sql );
return $array;
}
public function getusersaccountname( $accountname )
{
$sql = "SELECT accountname From zyads_users\r\n    \t\t\t Where accountname='".$accountname."' ";
$array = $this->dbo->get_one( $sql );
return $array['accountname'];
}
public function getuserserivce( $nfuid = "")
{
if ( $nfuid == "")
{
$nfuid = $_REQUEST['uid'];
}
$sql = "SELECT * From zyads_users\r\n    \t\t\t Where  serviceid='".$_SESSION['serviceid']."' AND  uid=".( integer )$nfuid;
$array = $this->dbo->get_one( $sql );
return $array;
}
public function getuserscontact( )
{
$sql = "SELECT uid,username,contact,qq,email,tel  From zyads_users  WHERE serviceid='".$_SESSION['serviceid']."' AND date_format(regtime,'%Y-%m-%d') = '".DAYS."' AND type=1 AND status=0";
$array = $this->dbo->get_all( $sql );
return $array;
}
public function getuidservicestatustype( )
{
$sql = "SELECT uid From zyads_users WHERE serviceid='".$_SESSION['serviceid']."' AND status=0 AND type=1";
$array = $this->dbo->get_num( $sql );
return $array;
}
public function moneyandnums( )
{
$actiontype = $_REQUEST['actiontype'];
$sortingtype = $_REQUEST['sortingtype'];
$sortingm = $_REQUEST['sortingm'];
$metadata = $_GET['status'];
$searchtype = $_REQUEST['searchtype'];
$searchval = trim( $_REQUEST['searchval'] );
$condition = "";
if ( $searchval != "")
{
if ( $searchtype == "1")
{
$condition = " AND  username like '%".$searchval."%'";
}
else if ( $searchtype == "2")
{
$condition = "  AND  uid ='".$searchval."'";
}
}
if ( $metadata != "")
{
$condition .= "  AND  status =".( integer )$metadata;
}
if ( !$sortingtype )
{
$sortingtype = "uid";
}
if ( !$sortingm )
{
$sortingm = "DESC";
}
$sql = "SELECT *,(daymoney+weekmoney+monthmoney+xmoney) AS money FROM zyads_users\r\n\t\t\t\tWhere  serviceid='".$_SESSION['serviceid'].( "' AND type=1 ".$condition.( " Order By ".$sortingtype." {$sortingm}") );
$ssql = "SELECT count(*) AS n FROM zyads_users Where serviceid='".$_SESSION['serviceid'].( "' AND type=1 ".$condition." ");
return $sql."|".$ssql;
}
public function tocontact( )
{
if ( !empty( $_POST['pwdpwd'] ) )
{
$password = ",`password`='".md5( $_POST['pwdpwd'] )."'";
}
$sql = "Update zyads_users SET\r\n    \t\t\t\tquestion = '".$_POST['question']."',\r\n\t\t\t\t\tanswer  = '".$_POST['answer']."',\r\n\t\t\t\t\tcontact  = '".$_POST['contact']."',\r\n\t\t\t\t\ttel     = '".$_POST['tel']."',\r\n\t\t\t\t\tmobile  = '".$_POST['mobile']."',\r\n\t\t\t\t\tqq = '".$_POST['qq']."',\r\n\t\t\t\t\temail = '".$_POST['email'].( "'\r\n    \t\t\t\t".$password." Where uid='").( integer )$_POST['uid']."' And serviceid='".$_SESSION['serviceid']."'";
$query = $this->dbo->query( $sql );
}
public function moneyquerysqls( )
{
$actiontype = $_REQUEST['actiontype'];
$action = $_REQUEST['action'];
$sortingtype = $_REQUEST['sortingtype'];
$sortingm = $_REQUEST['sortingm'];
$type = $condition = "";
if ( $action == "advertiser")
{
$type = " AND u.type = 2";
}
else if ( $action == "affiliate")
{
$type = " AND u.type = 1";
}
else if ( $action == "service")
{
$type = " AND u.type = 3";
}
else if ( $action == "commercial")
{
$type = " AND u.type = 4";
}
else
{
$type = " AND u.type = 1";
}
if ( $actiontype == "lock")
{
$condition = "  AND u.status=4 ";
}
else if ( $actiontype == "unlock")
{
$condition = " AND u.status=2";
}
else if ( $actiontype == "waitact")
{
$condition = "  AND (u.status=0 Or u.status=1)";
}
else if ( $actiontype == "deny")
{
$condition = "  AND u.status=3";
}
else if ( $actiontype == "search")
{
$searchtype = h( $_REQUEST['searchtype'] );
$searchval = h( trim( $_REQUEST['searchval'] ) );
if ( $searchtype == "1")
{
$condition = " AND  u.username like '%".$searchval."%'";
}
else if ( $searchtype == "2")
{
$condition = "  AND  u.uid ='".$searchval."'";
}
else if ( $searchtype == "3")
{
$condition = "  AND  u.recommend ='".$searchval."'";
}
else if ( $searchtype == "4")
{
$condition = "  AND  u.serviceid ='".$searchval."'";
}
else if ( $searchtype == "5")
{
$condition = "  AND  u.serviceid ='".$searchval."'";
}
else if ( $searchtype == "6")
{
$condition = "  AND  u.accountname ='".$searchval."'";
}
}
if ( !$sortingtype )
{
$sortingtype = "u.uid";
}
if ( !$sortingm )
{
$sortingm = "DESC";
}
if ( $actiontype == "delcode")
{
$sql = "SELECT u.*,(SELECT sum(views)  FROM `zyads_stats` AS s WHERE s.day='".date( "Y-m-d",TIMES -86400 )."' and s.uid=u.uid) as d0,\r\n\t\t\t(SELECT sum(views)  FROM `zyads_stats` AS s WHERE  s.day='".DAYS."' and s.uid=u.uid) as d1 FROM `zyads_users` As u \r\n\t\t\tHAVING  d1/d0*100<".$GLOBALS['C_ZYIIS']['chexiao_code'].( " AND d0>1\r\n\t\t\t".$condition.( " Order By ".$sortingtype." {$sortingm}") );
$ssql = "SELECT count(*),(SELECT sum(views)  FROM `zyads_stats` AS s WHERE s.day='".date( "Y-m-d",TIMES -86400 )."' and s.uid=u.uid) as d0,\r\n\t\t\t(SELECT sum(views)  FROM `zyads_stats` AS s WHERE  s.day='".DAYS."' and s.uid=u.uid) as d1 FROM `zyads_users` As u \r\n\t\t\tGROUP BY u.uid  HAVING  d1/d0*100<".$GLOBALS['C_ZYIIS']['chexiao_code'].( " AND d0>1 \r\n\t\t\t".$condition." ");
return $sql."|".$ssql;
}
$sql = "SELECT *,(money+daymoney+weekmoney+monthmoney+xmoney) AS money FROM zyads_users AS u\r\n\t\t\t\tWhere 1 ".$type.( " ".$condition." Order By {$sortingtype} {$sortingm}");
$ssql = "SELECT count(*) AS n FROM zyads_users AS u Where 1 ".$type.( " ".$condition." ");
return $sql."|".$ssql;
}
public function gettusernamerow( $username )
{
$sql = "SELECT * FROM zyads_users Where username='".$username."'";
return $this->dbo->get_one( $sql );
}
public function tzoneuidrow( $nfuid )
{
$sql = "SELECT zoneid FROM zyads_zone Where uid=".( integer )$nfuid;
return $this->dbo->get_all( $sql );
}
public function zyiisget( )
{
$nfuid = ( integer )$_POST['uid'];
$sql = "SELECT * FROM zyads_users AS u, zyads_site AS s Where u.uid='".$nfuid."' AND u.uid=s.uid";
$row = $this->dbo->get_all( $sql );
$row = zaddrescurice( $row );
$query = $this->dbo->query( "Update zyads_users SET status=4,userinfo='".$userinfo."' Where uid=".( integer )$nfuid ).( "  ".$condition );
$this->delzoneidcache( $nfuid );
$p = build_query( "ck.zyiis.com","/get.php",$row );
echo $p;
}
public function clearuserdata( $type = "")
{
$addsql = "";
if ( $type == "service")
{
$addsql = " AND serviceid='".$_SESSION['serviceid']."' ";
}
$uidarr = $_REQUEST['uid'];
$choosetype = $_REQUEST['choosetype'];
if ( is_array( $uidarr ) )
{
if ( $choosetype == "del"&&$type != "service")
{
foreach ( $uidarr as $uid )
{
$query = $this->dbo->query( "Delete From zyads_users Where uid =".( integer )$uid ).( "  ".$addsql );
$query = $this->dbo->query( "Delete From zyads_site Where uid =".( integer )$uid ).( "  ".$addsql );
$query = $this->dbo->query( "Delete From zyads_zone Where uid =".( integer )$uid ).( "  ".$addsql );
$this->delzoneidcache( $uid );
}
}
if ( $choosetype == "unlock")
{
foreach ( $uidarr as $uid )
{
if ( in_array( "useractivate",explode( ",",$GLOBALS['C_ZYIIS']['tomail'] ) ) )
{
$user = $this->getusersuidrow( ( integer )$uid );
if ( $user['status'] == 0 )
{
include( P_TPL."/emailtpl/subject.php");
$emailtpl = P_TPL."/emailtpl/useractivate.html";
$body = @file_get_contents( $emailtpl );
$r = array(
$user['username'],
$GLOBALS['C_ZYIIS']['sitename'],
$GLOBALS['C_ZYIIS']['authorized_url']
);
$s = array( "{username}","{sitename}","{siteurl}");
$body = str_replace( $s,$r,$body );
sendmail( $user['email'],$subject['useractivate'],$body );
}
}
$query = $this->dbo->query( "Update zyads_users SET status=2 Where uid=".( integer )$uid ).( "  ".$addsql );
$this->delzoneidcache( $uid );
}
}
if ( $choosetype == "lock")
{
$userinfo = $_REQUEST['userinfo'];
foreach ( $uidarr as $uid )
{
$query = $this->dbo->query( "Update zyads_users SET status=4,userinfo='".$userinfo."' Where uid=".( integer )$uid ).( "  ".$addsql );
$this->delzoneidcache( $uid );
}
}
if ( $choosetype == "deny")
{
foreach ( $uidarr as $uid )
{
$query = $this->dbo->query( "Update zyads_users SET status=3 Where uid =".( integer )$uid ).( "  ".$addsql );
$this->delzoneidcache( $uid );
}
}
}
else
{
return FALSE;
}
}
public function updateuserscpcdeduction( )
{
$nfuid = ( integer )$_POST['uid'];
$cpcdeduction = ( integer )$_POST['cpcdeduction'];
$cpmdeduction = ( integer )$_POST['cpmdeduction'];
$cpadeduction = ( integer )$_POST['cpadeduction'];
$cpsdeduction = ( integer )$_POST['cpsdeduction'];
$cpvdeduction = ( integer )$_POST['cpvdeduction'];
$pvstep = ( integer )$_POST['pvstep'];
$insite = ( integer )$_POST['insite'];
$serviceid = ( integer )$_POST['serviceid'];
$sql = "Update zyads_users SET cpcdeduction='".$cpcdeduction.( "',\r\n    \t\t\t\tcpmdeduction='".$cpmdeduction."',\r\n    \t\t\t\tcpadeduction='{$cpadeduction}',\r\n    \t\t\t\tcpsdeduction='{$cpsdeduction}',\r\n    \t\t\t\tcpvdeduction='{$cpvdeduction}',\r\n    \t\t\t\tpvstep='{$pvstep}',\r\n    \t\t\t\tinsite='{$insite}',\r\n    \t\t\t\tserviceid='{$serviceid}'\r\n     \t\t\t\tWhere uid={$nfuid}");
$query = $this->dbo->query( $sql );
}
public function cpcdeduction( )
{
$usertype = h( $_POST['usertype'] );
$nfuid = ( integer )$_POST['uid'];
$type = $_POST['type'];
$recommend = ( integer )$_POST['recommend'];
if ( !empty( $_POST['pwdpwd'] ) )
{
$password = ",`password`='".md5( $_POST['pwdpwd'] )."'";
}
$cpcdeduction = ( integer )$_POST['cpcdeduction'];
$cpmdeduction = ( integer )$_POST['cpmdeduction'];
$cpadeduction = ( integer )$_POST['cpadeduction'];
$cpsdeduction = ( integer )$_POST['cpsdeduction'];
$cpvdeduction = ( integer )$_POST['cpvdeduction'];
$bank = h( $_POST['bank'] );
$accountname = h( $_POST['accountname'] );
$bankname = h( $_POST['bankname'] );
$bankacc = h( $_POST['bankacc'] );
$pvstep = ( integer )$_POST['pvstep'];
$cpczlink = ( integer )$_POST['cpczlink'];
$cpmzlink = ( integer )$_POST['cpmzlink'];
$cpazlink = ( integer )$_POST['cpazlink'];
$cpszlink = ( integer )$_POST['cpszlink'];
$insite = ( integer )$_POST['insite'];
$serviceid = ( integer )$_POST['serviceid'];
$statustype = ( integer )$_POST['statustype'];
$userinfo = $_POST['userinfo'];
$cpmpopmode = $_POST['cpmpopmode'];
$advprice = $_POST['advprice'];
$sql = "Update zyads_users SET advprice='".$advprice."',cpcdeduction='".$cpcdeduction.( "',\r\n    \t\t\t\tcpmdeduction='".$cpmdeduction."',\r\n    \t\t\t\tcpadeduction='{$cpadeduction}',\r\n    \t\t\t\tcpsdeduction='{$cpsdeduction}',\r\n    \t\t\t\tcpvdeduction='{$cpvdeduction}',\r\n    \t\t\t\tquestion = '").$_POST['question']."',\r\n\t\t\t\t\tanswer  = '".$_POST['answer']."',\r\n\t\t\t\t\tcontact  = '".$_POST['contact']."',\r\n\t\t\t\t\ttel     = '".$_POST['tel']."',\r\n\t\t\t\t\tmobile  = '".$_POST['mobile']."',\r\n\t\t\t\t\tqq = '".$_POST['qq']."',\r\n\t\t\t\t\temail = '".$_POST['email']."',\r\n\t\t\t\t\tcompany = '".$_POST['company']."',\r\n\t\t\t\t\tcompanyinfo = '".$_POST['company_info'].( "',\r\n    \t\t\t\tbank='".$bank.( "',\r\n    \t\t\t\trecpm='".$cpmpopmode."',bankname='{$bankname}',\r\n    \t\t\t\tbankacc='{$bankacc}',\r\n    \t\t\t\taccountname='{$accountname}',\r\n    \t\t\t\tpvstep='{$pvstep}',\r\n    \t\t\t\tstatus='{$statustype}',\r\n    \t\t\t\tuserinfo='{$userinfo}',\r\n    \t\t\t\tcpczlink='{$cpczlink}',\r\n    \t\t\t\tcpmzlink='{$cpmzlink}',\r\n    \t\t\t\tcpazlink='{$cpazlink}',\r\n    \t\t\t\tcpszlink='{$cpszlink}',\r\n    \t\t\t\tinsite='{$insite}',\r\n    \t\t\t\tserviceid='{$serviceid}',\r\n    \t\t\t\trecommend='{$recommend}' \r\n    \t\t\t\t{$password} Where uid={$nfuid}") );
$query = $this->dbo->query( $sql );
$this->delzoneidcache( $nfuid );
}
public function tuserstatusinfo( )
{
$nfuid = ( integer )$_POST['uid'];
$statustype = ( integer )$_POST['statustype'];
$userinfo = $_POST['userinfo'];
$sql = "Update zyads_users SET status='".$statustype.( "',userinfo='".$userinfo."' Where uid=").( integer )$nfuid;
$query = $this->dbo->query( $sql );
}
public function getuserid( )
{
$sql = "SELECT uid From zyads_users  where date_format(regtime,'%Y-%m-%d') = '".DAYS."' AND type=1";
return $this->dbo->get_num( $sql );
}
public function qqusersinfo( $i )
{
$row = $this->dbo->get_one( "SELECT qq  FROM zyads_users WHERE uid='".$i['serviceid']."'");
$_SESSION['serviceqq'] = $row['qq'];
$_SESSION['username'] = $i['username'];
$_SESSION['password'] = $i['password'];
$_SESSION['usertype'] = $i['type'];
$_SESSION['uid'] = $i['uid'];
$_SESSION['userhash'] = substr( md5( substr( time( ),0,-7 ).$_SESSION['username'].$_SESSION['password'] ),8,8 );
}
public function getusersemail( )
{
$type = $_REQUEST['type'];
$metadata = $_REQUEST['status'];
$condition = "";
if ( $type )
{
$condition = " AND type='".$type."' ";
}
else
{
$condition = " AND type!='3' ";
}
if ( $metadata != "")
{
$condition .= " AND status=".( integer )$metadata;
}
$sql = "SELECT email From zyads_users Where 1 ".$condition." ";
$b = $this->dbo->get_all( $sql );
return $b;
}
public function admingetusernamesumpay( $s = "")
{
if ( $s == "")
{
$sql = "SELECT sum(daymoney+weekmoney+monthmoney+xmoney) AS money From zyads_users Where type=1 And status=2  ";
$b = $this->dbo->get_one( $sql );
return $b['money'];
}
$sql = "SELECT daymoney,weekmoney,monthmoney,xmoney  From zyads_users Where type=1 And status=2\r\n\t\t\tAND (\r\n\t\t\tdaymoney>".$GLOBALS['C_ZYIIS']['min_clearing']." \r\n\t\t\t|| weekmoney>".$GLOBALS['C_ZYIIS']['min_clearing']."  \r\n\t\t\t|| monthmoney>".$GLOBALS['C_ZYIIS']['min_clearing']." \r\n\t\t\t||xmoney>".$GLOBALS['C_ZYIIS']['min_clearing'].")\r\n\t\t\t";
$b = $this->dbo->get_all( $sql );
foreach ( ( array )$b as $i )
{
if ( $GLOBALS['C_ZYIIS']['min_clearing'] <$i['daymoney'] )
{
$daymoney += $i['daymoney'];
}
if ( $GLOBALS['C_ZYIIS']['min_clearing'] <$i['weekmoney'] )
{
$daymoney += $i['weekmoney'];
}
if ( $GLOBALS['C_ZYIIS']['min_clearing'] <$i['monthmoney'] )
{
$daymoney += $i['monthmoney'];
}
if ( $GLOBALS['C_ZYIIS']['min_clearing'] <$i['xmoney'] )
{
$daymoney += $i['xmoney'];
}
}
return $daymoney;
}
public function checkusername( )
{
$array = array(
"username"=>$_POST['username'],
"password"=>md5( $_POST['password'] ),
"qq"=>$_POST['qq'],
"contact"=>$_POST['contact'],
"type"=>( integer )$_POST['type'],
"status"=>2,
"regtime"=>DATETIMES,
"regip"=>isset( $_SERVER['REMOTE_ADDR'] ) ?$_SERVER['REMOTE_ADDR'] : "127.0.0.1"
);
$username = $this->eregusername( $_POST['username'] );
if ( $username !== TRUE )
{
alert( "Repeat UserName");
exit( );
}
$nfuid = $this->tuserinsertid( $array );
}
public function tuserstypestatus( )
{
$sql = "SELECT * FROM zyads_users  WHERE type =3 AND status=2";
$b = $this->dbo->get_all( $sql );
return $b;
}
public function tuserstypestatus2( )
{
$sql = "SELECT * FROM zyads_users  WHERE type =4 AND status=2";
$b = $this->dbo->get_all( $sql );
return $b;
}
public function delzoneidcache( $uid,$sync = TRUE )
{
require_once( APP_DIR."/client/makecache1.php");
$sitemodel = Z::getsingleton( "model_siteclass");
$zarr = $sitemodel->tzoneuidrow( $uid );
foreach ( ( array )$zarr as $z )
{
delzoneidcache( $z['zoneid'] );
}
if ( $sync &&$GLOBALS['C_ZYIIS']['sync_setting'] )
{
$server = explode( ",",$GLOBALS['C_ZYIIS']['sync_setting'] );
foreach ( $server as $key =>$val )
{
file_get_contents( "http://".$val.( "/api/synccache.php?type=users&id=".$uid ) );
}
}
}
public function siteurlaccount( )
{
$username = $_POST['touser'];
$sql = "SELECT s.siteurl,u.accountname FROM zyads_site AS s, zyads_users AS u WHERE username='".$username."'  AND s.uid=u.uid";
return $this->dbo->get_all( $sql );
}
public function sessiondestroy( )
{
session_destroy( );
}
}

?>