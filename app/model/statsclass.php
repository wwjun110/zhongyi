<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

class Model_StatsClass
{

		public $dbo = NULL;

		public function model_statsclass( )
		{
				$this->dbo = Z::getconn( );
		}

		public function adsplanstatussqlsnums( )
		{
				$planid = ( integer )$_REQUEST['planid'];
				$sortingtype = addslashes( $_REQUEST['sortingtype'] );
				$sortingm = addslashes( $_REQUEST['sortingm'] );
				$plantype = $_REQUEST['plantype'];
				$actiontype = $_REQUEST['actiontype'];
				$filesize = $this->daycondtion( );
				$where1 = $where2 = $where3 = "";
				if ( $planid )
				{
						$where1 = "  AND planid = '".$planid."'";
				}
				if ( !$sortingtype )
				{
						$sortingtype = "id";
				}
				if ( !$sortingm )
				{
						$sortingm = "DESC";
				}
				if ( $plantype )
				{
						$where2 = " AND plantype = '".$plantype."'";
				}
				if ( $_SESSION['adminusertype'] == "0" )
				{
						$where3 = ",(s.deduction+s.num) AS num,(s.sumpay+s.sumprofit) AS sumpay,s.deduction*0 AS deduction,s.sumprofit*0 AS sumprofit";
				}
				if ( $actiontype == "dostats" )
				{
						$sql = "SELECT s.*  ".$where3.( ",p.dosage FROM zyads_planstats as s , zyads_plan as p WHERE  1 and s.planid=p.planid ".$filesize."  {$where1} {$where2}  ORDER BY id DESC" );
						$array = $this->dbo->get_all( $sql );
						return $array;
				}
				$sql = "SELECT * ".$where3.( " FROM zyads_planstats WHERE 1 ".$filesize."  {$where1} {$where2}  ORDER BY {$sortingtype} {$sortingm}" );
				$ssql = "SELECT count(*) as n FROM zyads_planstats WHERE  1  ".$filesize.( " ".$where1." {$where2}  " );
				return $sql."|".$ssql;
		}

		public function delplanstatsid( )
		{
				$id = $_REQUEST['id'];
				foreach ( $id as $value )
				{
						$query = $this->dbo->query( "Delete From zyads_planstats Where id = ".( integer )$value );
				}
		}

		public function deladsstatsday( )
		{
				$id = $_REQUEST['id'];
				$action = $_REQUEST['action'];
				$where1 = $where2 = "";
				if ( $action == "statsuser" )
				{
						$where1 = "uid";
				}
				else if ( $action == "statsads" )
				{
						$where1 = "adsid";
				}
				else if ( $action == "statszone" )
				{
						$where1 = "zoneid";
				}
				foreach ( $id as $value )
				{
						$ddx = explode( "/", $value );
						$tidate = $ddx[0];
						$value = ( integer )$ddx[1];
						if ( $action == "statszond" )
						{
								$where2 = " AND uid=".( integer )$ddx[2];
						}
						$query = $this->dbo->query( "Delete From zyads_stats Where ".$where1.( " = '".$value."' {$where2} AND day='{$tidate}'" ) );
				}
		}

		public function getviews( $day = "" )
		{
				$planid = ( integer )$_REQUEST['planid'];
				$sortingtype = addslashes( $_REQUEST['sortingtype'] );
				$sortingm = addslashes( $_REQUEST['sortingm'] );
				$plantype = h( $_REQUEST['plantype'] );
				if ( $day )
				{
						$filesize = " AND day='".$day."'";
				}
				else
				{
						$filesize = $this->daycondtion( );
				}
				$where1 = $where2 = $where3 = "";
				if ( $planid )
				{
						$where1 = "  AND planid = '".$planid."'";
				}
				if ( !$sortingtype )
				{
						$sortingtype = "id";
				}
				if ( !$sortingm )
				{
						$sortingm = "DESC";
				}
				if ( $plantype )
				{
						$where2 = " AND plantype = '".$plantype."'";
				}
				if ( $_SESSION['adminusertype'] == "1" )
				{
						$where3 = "sum(deduction) As deduction  ,sum(sumpay) as sumpay ,sum(sumprofit) AS sumprofit,sum(num) As num,";
				}
				else
				{
						$where3 = " sum(sumpay) as sumpay,sum(num) As num,";
				}
				$sql = "SELECT ".$where3.( " sum(views) As views ,sum(do2click) As do2click,sum(orders) AS orders,sum(clicks) AS clicks FROM zyads_planstats  WHERE 1 ".$filesize."  {$where1} {$where2} " );
				$b = $this->dbo->get_one( $sql );
				return $b;
		}

		public function getdistinctdaystats( $type = "" )
		{
				$actiontype = $_REQUEST['actiontype'];
				$plantype = $_REQUEST['plantype'];
				$searchtype = h( $_REQUEST['searchtype'] );
				$searchval = ( integer )$_REQUEST['searchval'];
				$planid = ( integer )$_REQUEST['planid'];
				$sortingtype = addslashes( $_REQUEST['sortingtype'] );
				$sortingm = addslashes( $_REQUEST['sortingm'] );
				$filesize = $this->daycondtion( );
				$w1 = $where1 = $w2 = $condition = $where3 = "";
				if ( $_SESSION['adminusertype'] == "1" )
				{
						$where3 = "sum(deduction) As deduction ,sum(sumpay) as sumpay ,sum(sumprofit) AS sumprofit, sum(num) As num,";
				}
				else
				{
						$where3 = "sum(num) As num,sum(sumpay) as sumpay,deduction*0 AS deduction,sumprofit*0 AS sumprofit,";
				}
				if ( !$sortingtype )
				{
						$sortingtype = "day";
				}
				if ( !$sortingm )
				{
						$sortingm = "DESC";
				}
				if ( $planid )
				{
						$where1 = "  AND planid = '".$planid."'  ";
				}
				if ( $sortingtype == "day" )
				{
						$orders = " ORDER BY day ".$sortingm." ";
				}
				else
				{
						$orders = " ORDER BY day ".$sortingm." ,{$sortingtype} {$sortingm}";
				}
				if ( $type == "user" )
				{
						if ( $searchval )
						{
								if ( $searchtype == 2 )
								{
										$sql = "SELECT  ".$where3." sum(views) As views ,sum(do2click) As do2click,sum(clicks) As clicks,sum(orders) AS orders ,u.uid FROM zyads_users AS u LEFT JOIN zyads_stats AS s ON (u.uid=s.uid) WHERE u.recommend='{$searchval}' {$filesize}  {$where1} GROUP BY s.uid ORDER BY {$sortingtype} {$sortingm}";
										$ssql = "SELECT count(distinct s.uid) as n FROM zyads_users AS u LEFT JOIN zyads_stats AS s ON (u.uid=s.uid) WHERE u.recommend='".$searchval."' {$filesize}  {$where1} ";
										break;
								}
								else if ( $searchval && $searchtype == "1" )
								{
										$condition = "  AND uid = '".$searchval."'  ";
								}
						}
						$sql = "SELECT  ".$where3." sum(views) As views ,sum(do2click) As do2click, sum(clicks) As clicks,sum(orders) AS orders,day,uid,planid,adsid,zoneid   FROM zyads_stats  WHERE 1 {$filesize}  {$condition}  {$where1}  GROUP BY  day,uid {$orders}";
						$ssql = "SELECT count(distinct day,uid) as n FROM zyads_stats WHERE 1 ".$filesize."  {$condition} {$where1}";
				}
				else if ( $type == "ads" )
				{
						if ( $searchval )
						{
								if ( $searchtype == 1 )
								{
										$condition = " AND adsid=".$searchval;
								}
								if ( $searchtype == 2 )
								{
										$condition = " AND uid=".$searchval;
								}
								if ( $searchtype == 3 )
								{
										$condition = " AND siteid=".$searchval;
								}
								if ( $searchtype == 4 )
								{
										$condition = " AND zoneid=".$searchval;
								}
						}
						$sql = "SELECT  ".$where3."  sum(views) As views ,sum(do2click) As do2click, sum(clicks) As clicks,sum(orders) AS orders,day,uid,planid,adsid,zoneid   FROM zyads_stats  WHERE 1 {$filesize}  {$condition}   {$where1}  GROUP BY  day,adsid {$orders}";
						$ssql = "SELECT count(distinct day,adsid) as n FROM zyads_stats WHERE 1 ".$filesize."  {$condition}  {$where1}";
				}
				else if ( $type == "zone" )
				{
						if ( $searchval )
						{
								if ( $searchtype == 1 )
								{
										$condition = " AND zoneid=".$searchval;
								}
								if ( $searchtype == 3 )
								{
										$condition = " AND siteid=".$searchval;
								}
								if ( $searchtype == 3 )
								{
										$condition = " AND uid=".$searchval;
								}
								if ( $searchtype == 4 )
								{
										$condition = " AND adsid=".$searchval;
								}
						}
						$sql = "SELECT   ".$where3."  sum(views) As views  ,sum(do2click) As do2click, sum(clicks) As clicks,sum(orders) AS orders,day,uid,planid,adsid,zoneid   FROM zyads_stats  WHERE 1 {$filesize}  {$condition}   {$where1}  GROUP BY  day,zoneid {$orders}";
						$ssql = "SELECT count(distinct day,zoneid) as n FROM zyads_stats WHERE 1 ".$filesize."  {$condition}  {$where1}";
				}
				if ( $actiontype == "dostatsuaz" )
				{
						$array = $this->dbo->get_all( $sql );
						return $array;
				}
				return $sql."|".$ssql;
		}

		public function sumpay( )
		{
				$filesize = $this->daycondtion( );
				$sql = "SELECT  sum(sumpay) as sumpay,uid  FROM zyads_stats WHERE 1 ".$filesize."  GROUP BY  uid ";
				return $sql;
		}

		public function sumviewsetc( $type, $tidate, $nfuid = "", $adsid = "", $planid = "" )
		{
				$sql = "SELECT  sum(num) As num,sum(views) As views ,sum(deduction) As deduction ,sum(do2click) As do2click, sum(clicks) As clicks,sum(sumprofit) AS sumprofit ,sum(sumpay) as sumpay,sum(orders) AS orders  FROM zyads_stats WHERE day='".$tidate.( "' AND  uid='".$nfuid."'" );
				$b = $this->dbo->get_one( $sql );
				return $b;
		}

		public function sumpayusers( $nfuid )
		{
				$sql = "SELECT sum( s.sumpay ) AS pay FROM zyads_users AS u LEFT JOIN zyads_stats AS s ON ( u.uid = s.uid ) WHERE u.serviceid =".( integer )$nfuid;
				$b = $this->dbo->get_one( $sql );
				return $b;
		}

		public function sumadvpay( $nfuid )
		{
				$sql = "SELECT sum( s.sumadvpay) AS pay FROM zyads_users AS u LEFT JOIN zyads_planstats AS s ON ( u.uid = s.uid )  WHERE u.serviceid =".( integer )$nfuid;
				$b = $this->dbo->get_one( $sql );
				return $b;
		}

		public function dstatussqlsandnums( )
		{
				$tidate = h( $_GET['day'] );
				$nfuid = ( integer )$_GET['uid'];
				$sql = "SELECT * FROM zyads_stats WHERE day='".$tidate."' AND uid='".$nfuid."'  ";
				$ssql = "SELECT count(*) as n FROM zyads_stats WHERE day='".$tidate."' AND uid='".$nfuid."'  ";
				return $sql."|".$ssql;
		}

		public function daystatssqlsandnums( )
		{
				$sortingtype = $_REQUEST['sortingtype'];
				$sortingm = $_REQUEST['sortingm'];
				if ( !$sortingtype )
				{
						$sortingtype = "num";
				}
				if ( !$sortingm )
				{
						$sortingm = "DESC";
				}
				$tidate = h( $_GET['day'] );
				$adsid = ( integer )$_GET['adsid'];
				$sql = "SELECT * FROM zyads_stats WHERE day='".$tidate."' AND adsid='".$adsid.( "'  ORDER BY ".$sortingtype.( " ".$sortingm ) );
				$ssql = "SELECT count(*) as n FROM zyads_stats WHERE day='".$tidate."' AND adsid='".$adsid."'  ";
				return $sql."|".$ssql;
		}

		public function tplanstatsqlsandnum( )
		{
				$actiontype = $_REQUEST['actiontype'];
				$filesize = $this->daycondtion( );
				$planid = ( integer )$_REQUEST['planid'];
				if ( $actiontype == "data" )
				{
						$sql = "SELECT  sum(views) As views,sum(num) As num,sum(deduction) As deduction,sum(orders) As orders ,sum(clicks) As clicks ,sum(do2click) As do2click ,sum(sumadvpay) As sumadvpay  ,siteid FROM zyads_stats  WHERE planid='".$planid.( "' ".$filesize."  GROUP BY siteid" );
						$ssql = "SELECT count(distinct siteid) as n FROM zyads_stats WHERE  planid='".$planid.( "' ".$filesize );
				}
				else
				{
						if ( $actiontype == "dostats" )
						{
								$sql = "SELECT s.*,p.dosage FROM zyads_planstats as s , zyads_plan as p WHERE  1 and s.planid=p.planid and s.uid=".$_SESSION['uid']." ".$dwhere.( " ".$filesize."  ORDER BY s.id DESC" );
								$array = $this->dbo->get_all( $sql );
								return $array;
						}
						if ( $planid )
						{
								$dwhere = " AND planid='".$planid."' ";
						}
						$sql = "SELECT * FROM zyads_planstats WHERE uid=".$_SESSION['uid']." ".$dwhere.( " ".$filesize."  ORDER BY id DESC" );
						$ssql = "SELECT count(*) as n FROM zyads_planstats WHERE  uid='".$_SESSION['uid']."' ".$dwhere.( " ".$filesize );
				}
				return $sql."|".$ssql;
		}

		public function viewsqlsandnum( )
		{
				$actiontype = $_REQUEST['actiontype'];
				$filesize = $this->daycondtion( );
				$planid = ( integer )$_REQUEST['planid'];
				$siteid = ( integer )$_REQUEST['siteid'];
				$plantype = $_REQUEST['plantype'][0];
				$timerange = $_REQUEST['timerange'];
				$condition = "";
				if ( $siteid )
				{
						$condition = " AND siteid='".$siteid."' ";
				}
				if ( $planid )
				{
						$condition .= " AND planid='".$planid."' ";
				}
				if ( $plantype != "" )
				{
						$condition .= " AND plantype='".$plantype."'";
				}
				if ( $actiontype == "" )
				{
						$sql = "SELECT sum(num) As num,sum(views) As views ,sum(sumpay) as sumpay,day,planid FROM zyads_stats  WHERE uid='".$_SESSION['uid']."' ".$filesize.( " ".$condition." GROUP BY day,planid ORDER BY day  DESC" );
						$ssql = "SELECT count(DISTINCT day,planid ) as n FROM zyads_stats  WHERE uid='".$_SESSION['uid']."'  ".$filesize.( "  ".$condition." " );
						return $sql."|".$ssql;
				}
				if ( $actiontype == "data" )
				{
						$sql = "SELECT sum(num) As num,sum(views) As views ,sum(sumpay) as sumpay,zoneid FROM zyads_stats  WHERE uid='".$_SESSION['uid'].( "' ".$filesize.( " ".$condition." GROUP BY zoneid" ) );
						$ssql = "SELECT count(DISTINCT zoneid ) as n FROM zyads_stats  WHERE uid='".$_SESSION['uid'].( "'  ".$filesize.( "  ".$condition." " ) );
						return $sql."|".$ssql;
				}
		}

		public function numviewsdayusers( )
		{
				$filesize = $this->daycondtion( );
				$actiontype = $_REQUEST['actiontype'];
				$sortingtype = $_REQUEST['sortingtype'];
				$sortingm = $_REQUEST['sortingm'];
				$searchtype = $_REQUEST['searchtype'];
				$searchval = trim( $_REQUEST['searchval'] );
				$condition = "";
				if ( $searchval != "" )
				{
						if ( $searchtype == "1" )
						{
								$condition = " AND  u.username='".$searchval."'";
						}
						else if ( $searchtype == "2" )
						{
								$condition = "  AND  u.uid ='".$searchval."'";
						}
				}
				if ( !$sortingtype )
				{
						$sortingtype = "day";
				}
				if ( !$sortingm )
				{
						$sortingm = "DESC";
				}
				$sql = "SELECT sum(num) As num,sum(views) As views ,sum(do2click) As do2click,sum(clicks) As clicks,sum(sumpay) as sumpay,sum(orders) AS orders ,u.uid,u.username,s.day FROM zyads_users AS u LEFT JOIN zyads_stats AS s ON (u.uid=s.uid) WHERE u.serviceid='".$_SESSION['serviceid']."' ".$filesize.( " ".$condition." GROUP BY s.day,s.uid ORDER BY {$sortingtype} {$sortingm}" );
				$ssql = "SELECT count(distinct s.day,s.uid) as n FROM zyads_users AS u LEFT JOIN zyads_stats AS s ON (u.uid=s.uid) WHERE u.serviceid='".$_SESSION['serviceid'].( "' ".$filesize.( " ".$condition ) );
				return $sql."|".$ssql;
		}

		public function planstats_views( $tidate = "" )
		{
				if ( !$tidate )
				{
						$condition = "  WHERE day='".DAYS."'";
				}
				else
				{
						$condition = "  WHERE '".$tidate."'";
				}
				$sql = "SELECT sum(views) As views FROM zyads_planstats  ".$condition;
				$b = $this->dbo->get_one( $sql );
				return $b['views'];
		}

		public function siteurlaccount( )
		{
				$filesize = $this->daycondtion( );
				$sql = "SELECT s.siteurl,u.accountname  FROM  zyads_users AS u ,zyads_site AS s, zyads_stats AS st WHERE st.num>100 AND u.uid=s.uid ".$filesize." AND s.siteid=st.siteid";
				return $this->dbo->get_all( $sql );
		}

		public function daycondtion( )
		{
				$timerange = $_REQUEST['timerange'];
				if ( $timerange )
				{
						switch ( $timerange )
						{
						case "t" :
								$time1 = mktime( 0, 0, 0, date( "m", TIMES ), date( "d", TIMES ) - 1, date( "Y", TIMES ) );
								$time2 = mktime( 0, 0, 0, date( "m", TIMES ), date( "d", TIMES ), date( "Y", TIMES ) );
								$condition = " AND day >= ".date( "YmdHis", $time1 )." AND day < ".date( "YmdHis", $time2 );
								return $condition;
						case "w" :
								$time1 = mktime( 0, 0, 0, date( "m", TIMES ), date( "d", TIMES ) - 6, date( "Y", TIMES ) );
								$condition = " AND day >= ".date( "YmdHis", $time1 );
								return $condition;
						case "m" :
								$time1 = mktime( 0, 0, 0, date( "m", TIMES ), 1, date( "Y", TIMES ) );
								$condition = " AND day >= ".date( "YmdHis", $time1 );
								return $condition;
						case "l" :
								$time1 = mktime( 0, 0, 0, date( "m", TIMES ) - 1, 1, date( "Y", TIMES ) );
								$time2 = mktime( 0, 0, 0, date( "m", TIMES ), 1, date( "Y", TIMES ) );
								$condition = " AND day >= ".date( "YmdHis", $time1 )." AND day < ".date( "YmdHis", $time2 );
								return $condition;
						case "a" :
								$condition = "";
								return $condition;
						}
						$value = @explode( "/", $timerange );
						$time1 = strtotime( $value[0] );
						$time2 = strtotime( $value[1] );
						$condition = " AND day >= ".date( "YmdHis", $time1 )." AND day <= ".date( "YmdHis", $time2 );
						return $condition;
				}
				$condition = " AND day = '".DAYS."'";
				return $condition;
		}

		public function adsviewssumpay( $p )
		{
				$adsid = ( integer )$_REQUEST['adsid'];
				if ( $_SESSION['usertype'] == "1" )
				{
						$snum = "sum(s.num) AS num";
				}
				else
				{
						$snum = "sum(s.num+s.deduction) AS num";
				}
				if ( $adsid )
				{
						$sadsid = " AND s.adsid=".$adsid." ";
				}
				$sql = "SELECT ".$snum.",sum(s.views) AS views,sum(s.sumpay) AS sumpay,s.uid,s.linkuid,s.price,s.priceadv ,s.adsid,s.zoneid,z.width,z.height,z.zonetype,st.siteurl,st.pertainurl  FROM zyads_stats AS s LEFT JOIN (zyads_zone as z) On (s.zoneid=z.zoneid) LEFT JOIN (zyads_site as st) On (z.siteid=st.siteid)  WHERE s.day='".$p['day']."' AND s.uid=".$p['uid']." AND s.planid=".$p['planid'].( "  ".$sadsid." GROUP BY s.zoneid " );
				$b = $this->dbo->get_all( $sql );
				return $b;
		}

		public function sumviewststats( $daycondition = "" )
		{
				if ( $daycondition == "" )
				{
						$daycondition = " day='".DAYS."'";
						$hour = "hour";
				}
				if ( $daycondition == "w" )
				{
						$time1 = mktime( 0, 0, 0, date( "m", TIMES ), date( "d", TIMES ) - 6, date( "Y", TIMES ) );
						$daycondition = "  day >= ".date( "YmdHis", $time1 );
						$hour = " day";
				}
				$sql = "SELECT  sum(views)  as v ,".$hour.( " FROM zyads_stats WHERE ".$daycondition." group by {$hour}" );
				$b = $this->dbo->get_all( $sql );
				return $b;
		}

		public function adstempipnum( $plantype )
		{
				$sql = "SELECT  count(*)  as n ,hour FROM zyads_tempip WHERE day='".DAYS.( "' AND plantype='".$plantype."' group by hour" );
				$b = $this->dbo->get_all( $sql );
				return $b;
		}

		public function gplanstatsnum( $plantype = "" )
		{
				$nfuid = ( integer )$_GET['uid'];
				$siteid = ( integer )$_GET['siteid'];
				$zoneid = ( integer )$_GET['zoneid'];
				$adsid = ( integer )$_GET['adsid'];
				$planid = ( integer )$_GET['planid'];
				$time1 = mktime( 0, 0, 0, date( "m", TIMES ), date( "d", TIMES ) - 6, date( "Y", TIMES ) );
				$daycondition = " day >= ".date( "YmdHis", $time1 );
				$hour = " day";
				$condition = "";
				if ( $nfuid || $siteid || $adsid || $zoneid )
				{
						if ( $nfuid )
						{
								$condition = " AND uid='".$nfuid."'";
						}
						else if ( $zoneid )
						{
								$condition = " AND zoneid='".$zoneid."'";
						}
						else if ( $siteid )
						{
								$condition = " AND siteid='".$siteid."'";
						}
						else if ( $adsid )
						{
								$condition = " AND adsid='".$adsid."'";
						}
						$sql = "SELECT  sum(num)  As n ,".$hour.( " FROM zyads_stats WHERE ".$daycondition." {$condition} group by {$hour}" );
						$b = $this->dbo->get_all( $sql );
						return $b;
				}
				if ( $planid )
				{
						$condition = " AND planid='".$planid."'";
				}
				else
				{
						$condition = " AND plantype='".$plantype."'";
				}
				$sql = "SELECT  sum(num)  As n ,".$hour.( " FROM zyads_planstats WHERE ".$daycondition." {$condition} group by {$hour}" );
				$b = $this->dbo->get_all( $sql );
				return $b;
		}

		public function getcpsdatenummoney( $p )
		{
				$sql = "SELECT  * FROM zyads_orders WHERE status=1 AND deduction=0 AND uid=".$p['uid']." AND adsid=".$p['adsid']."  AND planid=".$p['planid']."   AND zoneid=".$p['zoneid']." AND linkuid=".$p['linkuid']." AND day='".$p['day']."' AND  date_format(addtime,'%k')='".$p['hour']."'  ";
				$b = $this->dbo->get_all( $sql );
				return $b;
		}

		public function adsorders( $p )
		{
				$sql = "SELECT  * FROM zyads_orders WHERE status=1 AND deduction=0 AND uid=".$p['uid']."  AND planid=".$p['planid']."   AND day='".$p['day']."'  ";
				$b = $this->dbo->get_all( $sql );
				return $b;
		}

		public function search( $value, $array, $type )
		{
				if ( !is_array( $array ) )
				{
						return FALSE;
				}
				foreach ( $array as $key => $value )
				{
						if ( !( $value == $value[$type] ) )
						{
						}
						else
						{
								return $key;
						}
				}
				return FALSE;
		}

		public function getuserdata( $plantype, $usertype )
		{
				$crrentpage = "";
				$groupby = "";
				if ( $usertype == "aff" )
				{
						$prexuid = " AND s.uid=".$_SESSION['uid']."  ";
						$sumsumpay = " sum(sumpay)";
						$psum = " sum(s.num)";
						$crrentpage = "zyads_stats";
						$groupby = "group by p.planid";
				}
				if ( $usertype == "adv" )
				{
						$prexuid = " AND p.uid=".$_SESSION['uid']."  ";
						$sumsumpay = " sum(sumadvpay)";
						$psum = " sum(s.num+s.deduction)";
						$crrentpage = "zyads_planstats";
						$groupby = "group by p.planid";
				}
				$sql = "SELECT ".$psum.( " As n,sum(s.views) As v ,".$sumsumpay." AS yf, p.dosage FROM {$crrentpage} AS s ,zyads_plan AS p,  zyads_users AS u WHERE day='" ).DAYS."' AND s.planid=p.planid AND s.uid=u.uid AND p.plantype='".$plantype.( "' ".$prexuid." {$groupby}" );
				if ( $usertype == "aff" )
				{
						$b = $this->dbo->get_one( $sql );
						return $b;
				}
				if ( $usertype == "adv" )
				{
						$b = $this->dbo->get_all( $sql );
						$a = array( );
						foreach ( ( array )$b as $k => $values )
						{
								$dosage = $values['dosage'];
								foreach ( $values as $key => $value )
								{
										if ( $key == "v" || $key == "yf" )
										{
												$a[$key] += $value * ( 1 - $dosage / 100 );
										}
										else
										{
												$a[$key] = $value;
										}
								}
						}
						return $a;
				}
		}

		public function sumviewstats( $planid, $action = "" )
		{
				if ( $planid )
				{
						$condition = " AND planid='".$planid."'";
				}
				if ( $action == "" )
				{
						$condition .= " AND uid='".$_SESSION['uid']."'";
				}
				$sql = "SELECT  sum(views) As v ,sum(num) As n FROM zyads_stats WHERE day='".DAYS.( "' ".$condition );
				return $b = $this->dbo->get_one( $sql );
		}

		public function sumviewsnumdeduction( $adsid )
		{
				if ( $adsid )
				{
						$condition = " AND adsid='".$adsid."'";
				}
				$sql = "SELECT  sum(views) As v ,sum(num+deduction) As n FROM zyads_stats WHERE day='".DAYS."' ".$condition;
				$b = $this->dbo->get_one( $sql );
				return $b;
		}

		public function sumpaystatsplans( $day, $usertype )
		{
				if ( $usertype == "aff" )
				{
						$sql = "SELECT sum(sumpay) AS yf FROM zyads_stats WHERE day='".$day."' AND uid=".$_SESSION['uid'];
						$b = $this->dbo->get_one( $sql );
				}
				if ( $usertype == "adv" )
				{
						$sql = "SELECT sum(s.sumadvpay) AS yf,p.planid,p.dosage FROM zyads_planstats AS s ,zyads_plan AS p WHERE s.day='".$day."' AND s.planid=p.planid  AND p.uid=".$_SESSION['uid']." GROUP BY p.planid ";
						$a = $this->dbo->get_all( $sql );
						$b = array( );
						foreach ( ( array )$a as $values )
						{
								$b['yf'] += $values['yf'] * ( 1 - $values['dosage'] / 100 );
						}
				}
				return $b;
		}

		public function tempip_num( )

		{
				$dasfafaass = explode( "-", DAYS );
				$dasfafaass = ( integer )$dasfafaass[2];
				$xtime = TIMES - 1800;
				$sql = "SELECT  count(*) As n   FROM zyads_adsip".$dasfafaass." WHERE  clicktime >{$xtime}";
				$b = $this->dbo->get_one( $sql );
				return $b['n'];
		}

		public function delstatsid( )
		{
				$statsid = $_POST['statsid'];
				if ( is_array( $statsid ) )
				{
						foreach ( $statsid as $sid )
						{
								$query = $this->dbo->query( "Delete From zyads_stats Where statsid = ".$sid );
						}
				}
		}

}

?>
