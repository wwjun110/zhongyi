<?php
/*
+---------------------------------------------------------------------------+
| ZYIIS.COM                                                                 |
| ==========                                                                |
|                                                                           |
| Copyright (c) 2005-2009 Zyiis Limited                                     |
| For contact details, see: http://www.zyiis.com/                           |
|                                                                           |
+---------------------------------------------------------------------------+
$Id: config.php 30 2009-08-10 07:14:27Z jian@zyiis.com $
*/
// ini_set('display_errors', 'On');
// error_reporting(E_ALL &~E_NOTICE);
require_once (APP_DIR . "/client/v1.php");
class iclk {
  public $dbo = NULL;
  public $zlink = false;
  public $status = "y";
  private $flashversion = 0;
  public function iclk() {
    $p = addslashes ( $_GET ['s'] );
    if ($p) {
      $qs = explode ( ";", $p );
      $this->enurl = $qs [0];
      $deurl = base64_decode ( $qs [0] );
      $deurl1 = $this->enkey = $qs [1];
      $this->hashValue = $deurl1;
      $url_key = md5 ( $qs [0] . $GLOBALS ['C_ZYIIS'] ['url_key'] );
      if ($url_key != $deurl1) {
        exit ( "Illicit Referer hx" );
      }
      $this->targeturl = $qs [2];
      $this->n = ( integer ) $qs [4];
      $this->g = ( integer ) $qs [5];
      $this->x = ( integer ) $qs [6];
      $this->y = ( integer ) $qs [7];
      $this->xx = zaddslashes ( $qs [8] );
      $this->yy = zaddslashes ( $qs [9] );
      $this->t = ( integer ) $qs [10];
      $deurl = zaddslashes ( $deurl );
      $qarr = explode ( "|", $deurl );
      $this->siteurl = $_GET ['z_c_url'] = $qarr [1];
      $this->referer = $_GET ['z_uref'] = $qarr [2];
      $this->screen = $qarr [3];
      $arr = $this->screenwh ( $this->screen );
      
      $_GET ['z_sw'] = $arr [0];
      $_GET ['z_sh'] = $arr [1];
      $_GET ['z_scd'] = $arr [2];
      
      $this->timezone = $_GET ['z_utz'] = ( integer ) $qarr [4];
      $this->java = $_GET ['z_ujava'] = ( integer ) $qarr [5];
      $this->flash = $_GET ['z_ufv'] = $qarr [6];
      $this->plugins = $_GET ['z_unplug'] = $qarr [7];
      $this->mimetypes = $_GET ['z_unmime'] = $qarr [8];
      $this->history = $_GET ['z_uhis'] = ( integer ) $qarr [9];
      $this->scrollheight = $_GET ['z_uc_ks'] = $qarr [10];
      $this->viewtime = $qarr [11];
      $this->ip = $qarr [12];
      $this->planid = ( integer ) $qarr [13];
      $this->plantype = $qarr [14];
      $this->adstypeid = ( integer ) $qarr [15];
      $this->uid = ( integer ) $qarr [16];
      $this->adsid = ( integer ) $qarr [17];
      $this->zoneid = ( integer ) $qarr [18];
      $this->siteid = ( integer ) $qarr [19];
      $this->ua = zaddslashes ( $_SERVER ['HTTP_USER_AGENT'] );
      $m = addslashes ( $_GET ['a'] );
      $this->add_url = ( integer ) $_GET ['add_url'];
      if ($m) {
        $marr = explode ( ";", $m );
        $this->flash = $_GET ['z_ufv'] = $marr [0];
        $this->screen = $marr [1];
        $arr = $this->screenwh ( $this->screen );
        $_GET ['z_sw'] = $arr [0];
        $_GET ['z_sh'] = $arr [1];
        $_GET ['z_scd'] = $arr [2];
        $this->siteurl = $_GET ['z_c_url'] = $marr [2];
        $this->referer = $_GET ['z_uref'] = $marr [3];
      } else {
        $this->flash = $_GET ['addver'];
      }
      $this->flashversion = empty ( $this->flash ) ? 0 : $this->flash;
    } else {
      $this->zlink = true;
      $this->uid = ( integer ) $_GET ['uid'];
      $this->zoneid = ( integer ) $_GET ['zoneid'];
      $this->linkuid = ( integer ) $_GET ['linkuid'];
      if ($this->uid && $this->zoneid) {
        $this->dbo = gc ();
        $userinfo = $this->u = $this->getuserinfo ();
        $m = $this->a = $this->getzone ();
        $zlink = $m ['plantype'] . "zlink";
        if ($userinfo [$zlink] == "2" || $userinfo [$zlink] == "1" && is_numeric ( strpos ( $GLOBALS ['C_ZYIIS'] ['zlink_on'], $m ['plantype'] ) ) && $m ['plantype'] != "cpv") {
          $this->siteurl = zaddslashes ( $_SERVER ['HTTP_REFERER'] );
          $this->ip = $this->remoteaddr ();
          $this->planid = $m ['planid'];
          $this->adsid = $m ['adsid'];
          $this->adstypeid = $m ['adstypeid'];
          $this->plantype = $m ['plantype'];
          $this->targeturl = $m ['url'];
          $this->ua = zaddslashes ( $_SERVER ['HTTP_USER_AGENT'] );
        } else {
          exit ( "Nzl" );
        }
      }
    }
  }
  
  public function run() {
    global $_SC;
    $hasbeenpop = false;
    $popads = getcookie ( 'z_cp_popwin', false );
    if (empty ( $popads )) {
      $popads = $this->adsid;
    } else {
      $arr = explode ( ",", $popads );
      if (in_array ( $this->adsid, $arr ) && count ( $arr ) > 1) {
        $hasbeenpop = true;
      }
      array_push ( $arr, $this->adsid );
      $popads = join ( ",", array_unique ( $arr ) );
    }
    if (($this->add_url == '2' || $hasbeenpop)) { //&& ($this->plantype != "cpv")) {
      require_once (LIB_DIR . "/cache/cache_" . $GLOBALS ['C_ZYIIS'] ['cache_type'] . ".php");
      $_GET ['zoneid'] = $this->zoneid;
      $GLOBALS ['zone'] = gcmakecache ();
      $GLOBALS ['ads'] = getlinkedad ( $GLOBALS ['zone'] );
      if ($GLOBALS ['ads']) {
        $url = redirecturl ( $GLOBALS ['ads'] );
        header ( "Location: " . $url . "&addver=" . $_GET ['addver'] . "&a=" . $_GET ['a'] );
        exit ();
      }
    }
    ssetcookie ( 'z_cp_popwin', $popads, 28800, false );
    if (getcookie ( $this->uid . "_" . $this->planid ) && ($this->plantype == "cpc" || $this->plantype == "cpm" || $this->plantype == "cpv")) {
      $this->redirect ();
    }
    
    if (! $this->zlink) {
      $this->dbo = gc ();
      $this->u = $this->getuserinfo ();
      $this->a = $this->getzone ();
      $advprice = ( float ) $this->u ['advprice'];
      if (! empty ( $advprice )) {
        $this->a ['price'] = $advprice;
      }
    }
    if ($this->plantype) {
      $ips = $this->plantype;
      $this->adsipday = date ( 'j', TIMES );
      $typep = $this->$ips ( $this->a, $this->u );
    } else {
      exit ( "No PlanType" );
    }
    // echo "<BR>\$this->redirect ( " . urldecode ( $this->a ['url'] ) . " )";
    // exit ();
    $this->redirect ( urldecode ( $this->a ['url'] ) );
    exit ();
  }
  
  public function redirect($url = "") {
    if ($this->plantype == "cpv") {
      exit ( "Not Cpv" );
    }
    //add by jake 2012-8-31
    if(isset($_GET['is_img']))
    {
	exit();//裙考楷不炭
    }
    //end by jake 2012-8-31
    if ($url && $url != "http://") {
      $this->targeturl = $url;
    }
    if (! $this->targeturl) {
      exit ( "NO URL" );
    }
    $url = str_replace ( array ("{uid}", "{adsid}", "{siteid}" ), array ($this->uid, $this->adsid, $this->siteid ), $this->targeturl );
    if ($this->zlink) {
      // echo "<noscript><meta http-equiv='refresh' content='0;url=" . $url . "'></noscript><a href='" . $url . "' id='gourl'></a><script>try{document.getElementById('gourl').click();}catch(ex){window.location.href ='" . $url . "';} <script>";
      echo "<meta http-equiv='refresh' content='0;url=" . $url . "'><a href='" . $url . "' id='gourl'></a><script>try{document.getElementById('gourl').click();}catch(ex){window.location.href ='" . $url . "';} </script>";
      exit ();
    }
    header ( "Location: " . $url );
    exit ();
  }
  
  public function cpc($m, $userinfo) {
    if ($this->flash < 1 && ! $this->zlink) {
      $this->m = "f";
    }
    if ($this->status == "y" && $this->ipdeny ()) {
      $this->deduction = $this->getdeduction ( $m, $userinfo );
      $this->adsip ( $m );
      $this->k9ovx1 ( $m, $userinfo );
      $this->recache ( $m );
      $this->zydate ( $m );
      // $this->areanum ();
      ssetcookie ( $this->uid . "_" . $m ['planid'], "zy", 86400 );
      $clicks = getcookie ( 'clicks' ) + 1;
      ssetcookie ( "clicks", $clicks, 604800 );
      $clicka = $this->adsid . "|" . $this->uid . "|" . $this->zoneid . "|" . $this->planid;
      ssetcookie ( "do2click", $clicka, 10800 );
      ssetcookie ( "doEffect", $clicka, 604800 );
    }
  }
  
  public function cpm($m, $userinfo) {
    if ($this->flash < 1 && ! $this->zlink) {
      $this->m = "f";
    }
    if ($this->status == "y" && $this->ipdeny ()) {
      $this->deduction = $this->getdeduction ( $m, $userinfo );
      // echo "<BR>\$m[price]===" . $m ['price'];
      $this->adsip ( $m );
      $this->k9ovx1 ( $m, $userinfo );
      $this->recache ( $m );
      $this->zydate ( $m );
      ssetcookie ( $this->uid . "_" . $m ['planid'], "zy", 86400 );
      $clicks = getcookie ( 'clicks' ) + 1;
      ssetcookie ( "clicks", $clicks, 604800 );
      $clicka = $this->adsid . "|" . $this->uid . "|" . $this->zoneid . "|" . $this->planid;
      ssetcookie ( "do2click", $clicka, 10800 );
      ssetcookie ( "doEffect", $clicka, 604800 );
    }
  }
  
  public function cpa($m, $userinfo) {
    $encode = base64_encode ( $this->ip . "|" . $this->uid . "|" . $this->adsid . "|" . $this->siteid . "|" . $this->zoneid . "|" . $this->adstypeid . "|" . $this->siteurl . "|" . ( integer ) $_GET ['linkuid'] );
    $url_key = md5 ( $encode . $GLOBALS ['C_ZYIIS'] ['url_key'] );
    $encode = $encode . ";" . $url_key;
    ssetcookie ( "cpa_key", $encode, 2592000 );
    if (! getcookie ( $this->uid . "_" . $this->planid )) {
      ssetcookie ( $this->uid . "_" . $this->planid, $_SERVER ['HTTP_HOST'], 86400 );
      $ips = $this->dbo->get_one ( "SELECT ip FROM zyads_tempcip WHERE day='" . DAYS . "' AND ip='" . $this->ip . "'  AND zoneid='" . $this->zoneid . "'" );
      if (! $ips) {
        $this->planstats ( $m );
        $this->recache ( $m );
        $this->zydate ( $m );
        $sql = "INSERT INTO zyads_tempcip (ip,planid,adsid,zoneid,day) VALUES ('" . $this->ip . "','{$this->planid}','{$this->adsid}','{$this->zoneid}','" . DAYS . "')";
        $this->dbo->query ( $sql, true );
      }
    }
  }
  
  public function cps($m, $userinfo) {
    $this->cpa ( $m, $userinfo );
  }
  
  public function cpv($m, $userinfo) {
    $this->cpc ( $m, $userinfo );
  }
  public function ipdeny() {
    //if (empty ( $_COOKIE )) {
    $sql = "SELECT ip FROM zyads_tempip WHERE ip='" . $this->ip . "' AND planid=" . ( integer ) $this->planid . " AND flashversion='" . $this->flashversion . "'";
    // echo "<BR>" . $sql;
    // exit ();
    $row = $this->dbo->get_one ( $sql );
    if (! $row) {
      return true;
    }
    //}
    return false;
  }
  
  public function areanum() {
    $icity = getcookie ( 'icity' );
    if (! $icity) {
      require (APP_DIR . "/client/adscity.php");
      $i = new Client_AdsCity ();
      $q = $i->query ( $_SERVER ['REMOTE_ADDR'] );
      $i->close ();
      $icity = $q [0];
      ssetcookie ( "icity", $icity, 15552000 );
    }
    $e = explode ( "/", $icity );
    list ( $province, $city ) = $e;
    // $result = $this->dbo->query ( "UPDATE zyads_area  SET num = num + 1 WHERE day = '" . DAYS . "' AND\r\n\t\tuid = '" . $this->uid . "' AND \r\n\t\tplanid = '" . $this->planid . ("' AND city='" . $city . "' AND province='{$province}'"), true );
    if (! $this->dbo->affected_rows ()) {
      // $result = $this->dbo->query ( "INSERT zyads_area SET num = 1, day = '" . DAYS . "',planid = '" . $this->planid . "',uid='" . $this->uid . "',\r\n\t\t\tcity='" . $city . "',province='" . $province . "'", true );
    }
  }
  
  public function zydate($m) {
    $sql = "SELECT day FROM `zyads_day`";
    $row = $this->dbo->get_one ( $sql );
    $day = $this->daydate = $row ['day'];
    $this->beforeday = $day;
    $gdate = date ( "G", TIMES );
    $idate = ( integer ) date ( "i", TIMES );
    if ($gdate == 1 && 1 < $idate && $idate < 30) {
      $this->planstatus ();
    }
    if ($day < DAYS && 0 <= $gdate && 1 < $idate) {
      $this->planstatus ();
      $this->truncateip ( $m );
      if ($day) {
        $this->dbo->query ( "UPDATE `zyads_day` SET `day` = '" . DAYS . "'" );
      } else {
        $this->dbo->query ( "INSERT INTO `zyads_day` ( `day` ) VALUES ('" . DAYS . "')" );
      }
      if ($GLOBALS ['C_ZYIIS'] ['clearing_atuo'] != "1") {
        $this->unionpay ();
      }
    }
  }
  public function adsip($m) {
    $fh = $this->flash;
    $dateh = date ( 'H', TIMES );
    $datej = date ( 'j', TIMES );
    $this->inserttempid ( $m );
    $sql = "INSERT INTO zyads_adsip" . $datej . " (uid,advuid ,adsid,adstypeid ,plantype,ip ,siteurl ,referer ,keyword ,screenwh ,timezone ,history ,scrollh,plugins ,useragent ,viewtime ,clicktime ,day ,deduction,planid,info,clicks,linkuid,zoneid,status,n,g,x,y,xx,yy,t,m,price,priceadv,siteid,hour,flashversion) VALUES ('{$this->uid}','" . $m ['advuid'] . "','" . $this->adsid . "','" . $m ['adstypeid'] . "', '" . $m ['plantype'] . "','" . $this->ip . "','" . $this->siteurl . "', '" . $this->referer . "', '" . $this->keyword . "', '" . $this->screen . "', '" . $this->timezone . "','" . $this->history . "','" . $this->scrollheight . "', '" . $fh . "', '" . $this->ua . "', '" . $this->viewtime . "', '" . DATETIMES . "', '" . date ( "Y-m-d", TIMES ) . "', '" . ( integer ) $this->deduction . "','" . $m ['planid'] . "','" . $m ['info'] . "','" . ( integer ) getcookie ( 'clicks' ) . "','" . $this->linkuid . "','{$this->zoneid}','{$this->status}','{$this->n}','{$this->g}','{$this->x}','{$this->y}','{$this->xx}','{$this->yy}','{$this->t}','{$this->m}', '" . $m ['price'] . "', '" . $m ['priceadv'] . "','" . $this->siteid . "','{$dateh}','" . $this->flashversion . "')";
    // echo "<br><br>\$m ['price']====" . $m ['price'];
    // echo "<BR>";
    // echo $sql;
    // exit ();
    $this->dbo->query ( $sql, true );
  }
  
  public function inserttempid($m) {
    $sql = "INSERT INTO zyads_tempip (ip,planid,uid,adsid,zoneid,day,hour,minute,flashversion) VALUES ('" . $this->ip . "','" . $m ['planid'] . "','" . $this->uid . "','{$this->adsid}','{$this->zoneid}','" . DAYS . "','" . date ( 'H', TIMES ) . "','" . TIMES . "','" . $this->flashversion . "')";
    // echo "<BR>" . $sql;
    $this->dbo->query ( $sql, true );
  }
  
  public function truncateip($m) {
    $this->dbo->query ( "TRUNCATE TABLE `zyads_tempip`", true );
    $this->dbo->query ( "TRUNCATE TABLE `zyads_tempcip`", true );
    $this->dbo->query ( "REPAIR TABLE `zyads_tempip` ", true );
    $this->inserttempid ( $m );
  }
  
  public function getzone() {
    if ($this->zlink) {
      $sql = "SELECT viewtype,viewadsid,plantype,siteid,adstypeid FROM zyads_zone WHERE zoneid=" . $this->zoneid;
      $row = $this->dbo->get_one ( $sql );
      if (! $row) {
        exit ( "z Null Zlink" );
      }
      if ($row ['viewtype'] == 1) {
        $viewadsid = explode ( ",", $row ['viewadsid'] );
        $rand = ( integer ) $viewadsid [array_rand ( $viewadsid, 1 )];
        $sql = "SELECT a.adsid,a.url,a.status,a.adstypeid,p.planid,p.deduction,p.plantype,p.price,p.priceadv,p.uid,p.expire,p.clearing,p.budget,p.gradeprice,p.s0price,p.s1price,p.s2price,p.s3price,p.dosage,u.money As advmoney,u.uid AS advuid FROM zyads_ads AS a ,zyads_plan As p ,zyads_users As u WHERE a.adsid=" . $rand . "  AND a.zlink =1 AND a.planid=p.planid AND p.uid=u.uid AND  p.status = 1 AND  a.status = 3 AND u.status=2";
        $m = $this->dbo->get_one ( $sql );
        if (! $m) {
          $row ['viewtype'] = 0;
        }
      }
      if ($row ['viewtype'] == 0) {
        $sql = "SELECT a.adsid,a.url,a.status,adstypeid,p.planid,p.deduction,p.plantype,p.price,p.priceadv,p.uid,p.expire,p.clearing,p.budget,p.gradeprice,p.s0price,p.s1price,p.s2price,p.s3price,p.dosage,u.money As advmoney,u.uid AS advuid FROM zyads_ads AS a ,zyads_plan As p ,zyads_users As u WHERE p.plantype='" . $row ['plantype'] . "' AND checkplan='true' AND a.zlink =1 AND a.planid=p.planid AND p.uid=u.uid AND  p.status = 1 AND  a.status = 3 AND u.status=2\r\n\t\t\t\t\t\t AND  ((p.restrictions=3 && FIND_IN_SET(" . $this->uid . ",p.resuid)=0)  OR (p.restrictions=2 && \r\n\t\t\t\t\t\t FIND_IN_SET(" . $this->uid . ",p.resuid)>0) OR p.restrictions=1)\r\n\t\t\t\t\t\t AND  ((p.sitelimit=3 && FIND_IN_SET(" . $row ['siteid'] . ",p.limitsiteid)=0)  OR (p.sitelimit=2 && \r\n\t\t\t\t\t\t FIND_IN_SET(" . $row ['siteid'] . ",p.limitsiteid)>0) OR p.sitelimit=1)  AND a.headline='' AND a.htmlcode=''";
        $m = $this->dbo->get_all ( $sql );
        if ($m) {
          $m = $m [array_rand ( $m, 1 )];
        } else {
          exit ( "Not Zlink A" );
        }
      }
      $siteid = $row ['siteid'];
      $this->siteid = $siteid;
    } else {
      $siteid = $this->siteid;
      $sql = "SELECT a.adsid,a.url,a.status,a.adstypeid,p.planid,p.deduction,p.plantype,p.price,p.priceadv,p.uid,p.expire,p.clearing,p.budget,p.gradeprice,p.s0price,p.s1price,p.s2price,p.s3price,p.dosage,u.money As advmoney,u.uid AS advuid FROM zyads_ads AS a ,zyads_plan As p ,zyads_users As u\r\n\t\t\t\t\tWHERE a.adsid=" . $this->adsid . " AND a.planid=p.planid AND p.uid=u.uid AND  p.status = 1 AND  a.status = 3 AND u.status=2";
      // echo $sql;
      $m = $this->dbo->get_one ( $sql );
      if (! $m) {
        $this->redirect ();
        exit ( "N[a]" );
      }
    }
    
    if ($m ['gradeprice'] == 1) {
      $sql = "SELECT grade FROM zyads_site WHERE siteid=" . $siteid . " ";
      $row = $this->dbo->get_one ( $sql );
      $grade = $row ['grade'];
      $g = "s" . $grade . "price";
      $m ['price'] = $m [$g];
    }
    
    return $m;
  }
  
  public function getuserinfo() {
    $sql = "SELECT cpmdeduction,cpcdeduction,cpadeduction,cpsdeduction,cpvdeduction,cpczlink,cpazlink,cpszlink,cpmzlink,advprice FROM zyads_users\r\n\t\t\t\t\t\tWHERE uid=" . $this->uid . " AND status=2";
    //echo "<BR>userinfo====" . $sql;
    $userinfo = $this->dbo->get_one ( $sql );
    if (! $userinfo) {
      exit ( "N[u]" );
    }
    return $userinfo;
  }
  
  public function getdeduction($m, $userinfo) {
    $dplantype = $m ['plantype'] . "deduction";
    if (0 < $userinfo [$dplantype]) {
      $plantype = $userinfo [$dplantype];
    } else if (0 < $m ['deduction']) {
      $plantype = $m ['deduction'];
    } else {
      $deduc = $m ['plantype'] . "_deduction";
      $plantype = $GLOBALS ['C_ZYIIS'] [$deduc];
    }
    $rand = rand ( 1, 100 );
    if ($rand <= $plantype) {
      return 1;
    }
    return 0;
  }
  
  public function k9ovx1($a, $u) {
    $deduction = $this->deduction;
    if ($a ['status'] == "4") {
      require_once (APP_DIR . "/client/makecache1.php");
      $this->clearcache ( $a );
    } else {
      if ($deduction == 0) {
        $deduction = 0;
        $day_num = 1;
        $sumpay = $a ['price'];
        if ($a ['clearing'] == "") {
          $a ['clearing'] = "day";
        }
        $moneyType = $a ['clearing'] . "money";
        $sql = "UPDATE zyads_users SET " . $moneyType . " = {$moneyType} + " . $a ['price'] . " ,nums=nums+1 WHERE uid = '" . $this->uid . "' ";
        //echo "<BR>站长收入:" . $sql;
        $result = $this->dbo->query ( $sql, true );
      } else {
        $deduction = 1;
        $day_num = 0;
        $sumpay = 0;
      }
      $nodosage = true;
      if ($a ['dosage'] > 0 && $a ['deduction'] > 0 && $deduction == 1) {
        $derand = rand ( 1, $a ['deduction'] );
        if ($derand <= $a ['dosage'])
          $nodosage = false;
      }
      if ($nodosage) {
        $result = $this->dbo->query ( "UPDATE zyads_users SET money=money - " . $a ['priceadv'] . " WHERE uid = " . $a ['advuid'] . " ", true );
      }
      
      $sumadvpay = $a ['priceadv'];
      $sumprofit = $a ['priceadv'] - $sumpay;
      $sql = "INSERT INTO zyads_planstats (plantype,num,deduction,day,sumpay,sumprofit,sumadvpay,planid,uid) VALUES('" . $a ['plantype'] . "','" . $day_num . "','" . $deduction . "','" . DAYS . "','" . $sumpay . "','" . $sumprofit . "','" . $sumadvpay . "','" . $a ['planid'] . "','" . $a ['uid'] . "') ON DUPLICATE KEY UPDATE  num = num + " . $day_num . ",deduction=deduction+{$deduction},sumpay= sumpay+{$sumpay},sumprofit= sumprofit+{$sumprofit},sumadvpay=sumadvpay+{$sumadvpay}";
      // echo "<br><br>";
      // echo $sql;
      $this->dbo->query ( $sql, true );
      $sql = "INSERT INTO zyads_stats (num,deduction,day,planid,adsid,zoneid,plantype,siteid,uid,adstypeid,linkuid,sumpay,sumprofit,sumadvpay) VALUES('" . $day_num . "','" . $deduction . "','" . DAYS . "','" . $a ['planid'] . "','" . $this->adsid . "','" . $this->zoneid . "','" . $this->plantype . "','" . $this->siteid . "','" . $this->uid . "','" . $this->adstypeid . "','" . $this->linkuid . "','" . $sumpay . "','" . $sumprofit . "','" . $sumadvpay . "') ON DUPLICATE KEY UPDATE  num = num + " . $day_num . ",deduction=deduction+{$deduction},sumpay= sumpay+{$sumpay},sumprofit= sumprofit+{$sumprofit},sumadvpay=sumadvpay+{$sumadvpay}";
      
      // echo "<br><br>";
      // echo $sql;
      $this->dbo->query ( $sql, true );
    }
  }
  
  public function planstats($m) {
    $this->dbo->query ( "INSERT INTO zyads_planstats (clicks,day,planid,plantype,uid) VALUES(1,'" . DAYS . "','" . $m ['planid'] . "','" . $m ['plantype'] . "','" . $m ['advuid'] . "') ON DUPLICATE KEY UPDATE  clicks = clicks + 1", true );
    $this->dbo->query ( "INSERT INTO zyads_stats (clicks,day,planid,adsid,siteid,zoneid,uid,adstypeid,linkuid) VALUES(1,'" . DAYS . "','" . $m ['planid'] . "','" . $this->adsid . "','" . $this->siteid . "','" . $this->zoneid . "','" . $this->uid . "','" . $m ['adstypeid'] . "','" . $this->linkuid . "') ON DUPLICATE KEY UPDATE  clicks=clicks+1", true );
  }
  
  public function recache($a) {
    $rand = rand ( 1, 5 );
    if (1 == $rand) {
      $daySumPrice = $this->sumadvpay ( DAYS, $a ['planid'] );
      $this->daysumprice = $daySumPrice;
      $delCache = "n";
      $addbudget = $a ['budget'] / (1 - $a ['dosage'] / 100);
      if ($addbudget <= $daySumPrice) {
        $sql = "UPDATE zyads_plan SET status=3 WHERE planid=" . $a ['planid'];
        $q = $this->dbo->query ( $sql );
        $delCache = "y";
      }
      if (($a ['expire'] != "0000-00-00") && $a ['expire'] <= DAYS || $a ['advmoney'] < 1) {
        $sql = "UPDATE zyads_plan SET status=4 WHERE planid=" . $a ['planid'];
        $re = $this->dbo->query ( $sql );
        $delCache = "y";
      }
      if ($delCache == "y") {
        require_once (APP_DIR . "/client/makecache1.php");
        $this->recache ( $a );
      }
    }
  }
  
  public function planstatus() {
    $row = $this->dbo->query ( "UPDATE zyads_plan SET status=1 WHERE status=3", true );
  }
  
  public function unionpay() {
    $datew = date ( "w", TIMES );
    $datej = date ( "j", TIMES );
    $cycle = explode ( ",", $GLOBALS ['C_ZYIIS'] ['clearing_cycle'] );
    $day = $this->daydate;
    if (in_array ( "day", $cycle )) {
      $this->paycharge ( "day", true );
    }
    if ($datew == $GLOBALS ['C_ZYIIS'] ['clearing_weekdata'] && in_array ( "week", $cycle )) {
      $this->paycharge ( "week", true );
    }
    if ($datej == $GLOBALS ['C_ZYIIS'] ['clearing_monthdata'] && in_array ( "month", $cycle )) {
      $this->paycharge ( "month", true );
    }
  }
  
 
		public function paycharge( $datetype )
		{
				$mtype = $datetype."money";
				$sql = "SELECT uid,".$mtype.",xmoney FROM zyads_users\r\n\t\t\t\t\tWHERE ({$mtype}+xmoney)>=".$GLOBALS['C_ZYIIS']['min_clearing']." AND status = 2 AND type=1 ";
				$row = $this->dbo->get_all( $sql );
				foreach ( ( array )$row as $userinfo )
				{
						$arr = $userinfo[$mtype];
						$clearing_tax = 0;
						if ( $GLOBALS['C_ZYIIS']['tax_status'] && $GLOBALS['C_ZYIIS']['tax_1'] )
						{
								if ( $arr <= $GLOBALS['C_ZYIIS']['tax_1'] )
								{
										$clearing_tax = 0;
								}
								else if ( $GLOBALS['C_ZYIIS']['tax_2_1'] < $arr && $arr < $GLOBALS['C_ZYIIS']['tax_2_2'] )
								{
										$clearing_tax = ( $arr - $GLOBALS['C_ZYIIS']['tax_2_1'] ) * $GLOBALS['C_ZYIIS']['tax_2_bfb'] / 100;
								}
								else if ( $GLOBALS['C_ZYIIS']['tax_3_1'] < $arr && $arr < $GLOBALS['C_ZYIIS']['tax_3_2'] )
								{
										$clearing_tax = $arr * 0.8 * $GLOBALS['C_ZYIIS']['tax_3_bfb'] / 100;
								}
								else if ( $GLOBALS['C_ZYIIS']['tax_4_1'] < $arr && $arr < $GLOBALS['C_ZYIIS']['tax_4_2'] )
								{
										$clearing_tax = ( $arr - $arr * 0.056 ) * 0.8 * $GLOBALS['C_ZYIIS']['tax_4_bfb'] / 100 - 2000;
								}
								else if ( $GLOBALS['C_ZYIIS']['tax_5_1'] < $arr )
								{
										$clearing_tax = ( $arr - $arr * 0.056 ) * 0.8 * $GLOBALS['C_ZYIIS']['tax_4_bfb'] / 100 - 7000;
								}
								else
								{
										$clearing_tax = 0;
								}
								$clearing_tax = ovhsc( $clearing_tax, 3 );
						}
						$charges = $GLOBALS['C_ZYIIS']['clearing_charges'] / 100;
						$charges = ovhsc( $arr * $charges, 3 );
						$dabs = ovhsc( round( $arr ) - $clearing_tax - $charges + round( $userinfo['xmoney'] ), 2 );
						$sql = $this->dbo->get_one( "SELECT uid from zyads_paylog Where addtime='".DAYS."' AND uid=".$userinfo['uid'].( " AND clearingtype='".$datetype."'" ) );
						if ( !$sql['uid'] )
						{
								$sql = "Insert INTO `zyads_paylog` (`uid`, `xmoney`, `money`, `tax`, `charges`, `pay`, `addtime`,clearingtype)\r\n\t          \t\t\tVALUES ('".$userinfo['uid']."', '".$userinfo['xmoney']."', '".$arr.( "', '".$clearing_tax."', '{$charges}', '{$dabs}', '" ).DAYS.( "','".$datetype."')" );
								$row = $this->dbo->query( $sql, TRUE );
								$sql = "UPDATE zyads_users SET ".$mtype."=0,xmoney=0 WHERE uid=".$userinfo['uid']."";
								$row = $this->dbo->query( $sql, TRUE );
						}
				}
		}
  
  public function getallclearing($mtype) {
    $sql = "SELECT uid," . $mtype . ",xmoney FROM zyads_users WHERE status = 2 AND type=1 AND {$mtype}>=" . $GLOBALS ['C_ZYIIS'] ['min_clearing'];
    $row = $this->dbo->get_all ( $sql );
    return $row;
  }
  
  public function clearcache($ips) {
    $sql = "SELECT a.adstypeid,p.plantype,a.width,a.height,at.framework FROM zyads_plan AS p,zyads_ads AS a,zyads_adstype AS at Where p.planid=" . $ips ['planid'] . " AND a.planid=p.planid AND a.adstypeid=at.adstypeid";
    $irow = $this->dbo->get_all ( $sql );
    foreach ( ( array ) $irow as $m ) {
      if ($m ['framework'] == "iframe") {
        $ss = $m ['plantype'] . "_" . $m ['adstypeid'] . "_" . $m ['width'] . "_" . $m ['height'];
      } else {
        $ss = $m ['plantype'] . "_" . $m ['adstypeid'];
      }
      deladscache ( $ss );
    }
  }
  
  public function remoteaddr() {
    return $_SERVER ['REMOTE_ADDR'];
  }
  
  public function ssetcookie($name, $value, $expire = 0) {
    $cypty = "Powered by " . $_SERVER ["HTTP_HOST"] . " 2005-2010";
    $cp .= "CP=\"" . $cypty . "\"";
    header ( "P3P: " . $cp );
    setcookie ( $name, $value, $expire, "/" );
  }
  
  public function dexit() {
    $dtd = "<!DOCTYPE HTML PUBLIC '-//IETF//DTD HTML 2.0//EN'>\r\n\t\t\t\t<html><head>\r\n\t\t\t\t<title>404 Not Found</title>\r\n\t\t\t\t</head><body>\r\n\t\t\t\t<h1>Not Found</h1>\r\n\t\t\t\t<p>The requested URL  was not found on this server.</p>\r\n\t\t\t\t</body></html>";
    exit ( $dtd );
  }
  
  public function ffwrite($ss, $mod = "rb+") {
    $fp = @fopen ( $ss, $mod );
    @flock ( $fp, LOCK_EX );
    $content = @fread ( $fp, @filesize ( $ss ) );
    @rewind ( $fp );
    return array ($fp, $content );
  }
  
  public function filewrite($ss, $text, $fp) {
    if (! is_file ( $ss )) {
      @file_put_contents ( $ss, $text );
      @fclose ( $fp );
    } else {
      @fputs ( $fp, $text );
      @ftruncate ( $fp, @strlen ( $text ) );
      @fclose ( $fp );
    }
  }
  
  public function screenwh($screenwh) {
    $arr = explode ( 'x', $screenwh );
    return $arr;
  }
  
  public function deductionnum() {
    $datej = date ( 'j', TIMES );
    $sql = "select count(1) as num,deduction from zyads_adsip" . $datej . " group by deduction";
    $rows = $this->dbo->get_all ( $sql );
    $denum = $dxnum = 0;
    foreach ( $rows as $row ) {
      $total += $row ['num'];
      if ($row ['num'] == 1)
        $denum = $row ['num'];
    }
    $total = empty ( $total ) ? 1 : $total;
    return round ( $denum / $total, 3 ) * 100;
  }
  
  public function sumadvpay($day, $planid) {
    $sql = "Select sumadvpay From zyads_planstats WHERE day= '" . $day . "' AND  planid=" . $planid . "";
    $q = $this->dbo->get_one ( $sql );
    $daySumPrice = $q ['sumadvpay'];
    return $daySumPrice;
  }
  
  public function iclksumpaystatsplans($uid, $day, $usertype) {
    if ($usertype == "aff") {
      $sql = "SELECT sum(sumpay) AS yf FROM zyads_stats WHERE day='" . $day . "' AND uid=" . $uid;
      $b = $this->dbo->get_one ( $sql );
    }
    return $b;
  }
}
?>
