<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

class cpa
{

		public $dbo = NULL;

		public function cpa( )
		{
				$rquest = isset( $_SERVER['HTTPS'] ) && $_SERVER['HTTPS'] != "off" ? "https" : "http";
				if ( $rquest == "https" )
				{
						$GLOBALS['GLOBALS']['_SERVER']['HTTP_REFERER'] = "https";
				}
				if ( !isset( $_SERVER['HTTP_REFERER'] ) )
				{
						exit( "Illicit origin" );
				}
		}

		public function run( )
		{
				$referer = zaddslashes( $_SERVER['HTTP_REFERER'] );
				$parseurl = parse_url( $referer );
				$rquest = $parseurl['scheme'];
				$hostname = gethostbyname( $parseurl['host'] );
				$cpa_key = $_COOKIE['ad_cpa_key'];
				setcookie( "ad_cpa_key", "", TIMES + 8400, "/" );
				$cpakeyarr = explode( ";", $cpa_key );
				$decpa = base64_decode( $cpakeyarr[0] );
				$authkey = $cpakeyarr[1];
				$url_key = md5( $cpakeyarr[0].$GLOBALS['C_ZYIIS']['url_key'] );
				if ( $authkey != $url_key )
				{
						exit( "Hashvalue error" );
				}
				$cpainfo = explode( "|", $decpa );
				if ( isset( $cpainfo[7] ) )
				{
						$cpaas = zaddslashes( $cpainfo[0] );
						$nfuid = ( integer )$cpainfo[1];
						$adsid = ( integer )$cpainfo[2];
						$siteid = ( integer )$cpainfo[3];
						$zoneid = ( integer )$cpainfo[4];
						$adstypeid = ( integer )$cpainfo[5];
						$cpai = zaddslashes( $cpainfo[6] );
						$cpainf = ( integer )$cpainfo[7];
						$like = zaddslashes( $_GET['like'] );
						$price = zaddslashes( $_GET['price'] );
						preg_match_all( "/(-?\\d+)(\\.\\d+)?/", $price, $matches );
						$price = $matches[0][0];
						$orders = zaddslashes( $_GET['orders'] );
						$proportion = ( integer )$_GET['proportion'];
				}
				else
				{
						exit( "Not arr_str[7]" );
				}
				$restr = $this->getplaninfo( $adsid, $siteid );
				$serverip = @explode( ",", $restr['serverip'] );
				echo $referer."|".$hostname."|".$restr['serverip'];
				if ( !in_array( $hostname, $serverip ) && $restr['datatime'] == "0" )
				{
						exit( "Illicit Host" );
				}
				$lientip = $this->getclientipdate( $nfuid, $restr['planid'], $cpaas, $restr['plantype'], $orders );
				if ( $lientip )
				{
						$i = $this->getuserinfo( $nfuid );
						$deduction = $this->getdeduction( $i, $restr );
						if ( $restr['plantype'] == "cpa" )
						{
								$rats = $restr['price'];
								$sitetype = $restr['priceadv'];
						}
						else if ( $proportion == "0" )
						{
								$da4 = $restr['price'];
								$priceadv = $restr['priceadv'];
								$rats = $total * ( $da4 / 100 );
								$sitetype = $total * ( $priceadv / 100 );
						}
						else
						{
								$da4 = $restr['price'];
								$priceadv = $restr['priceadv'];
								$rats = $total * ( $da4 / 100 );
								$sitetype = $total * ( $priceadv / 100 );
								$like = $like."  产品总价为：".$total."元 广告主分成：".abs( $priceadv )."% 网站主分成：".abs( $da4 )."%";
						}
						if ( $restr['datatime'] == "0" )
						{
								$metadata = 1;
						}
						else
						{
								$metadata = 0;
						}
						$sql = "INSERT INTO zyads_orders (`uid`, `planid`, `adsid`,  `siteid`,  `zoneid`, `ip`, `referer`, `orders`,`like`,`status`,`day`,`addtime`,`deduction`,`price`,`priceadv`,linkuid)\r\n\t\t\t\t\tVALUES ('".$nfuid."','".$restr['planid'].( "','".$adsid.( "','".$siteid."','{$zoneid}','{$cpaas}','" ) ).urldecode( $cpai ).( "','".$orders.( "','".$like."','{$metadata}','" ) ).DAYS."','".DATETIMES.( "','".$deduction.( "','".$rats."','{$sitetype}','{$cpainf}')" ) );
						$this->dbo->query( $sql, TRUE );
						if ( $metadata == "1" )
						{
								if ( $deduction == 0 )
								{
										$deduction = 0;
										$num = 1;
										$admingetusernamesumpay = $rats;
										$clearmoney = $restr['clearing']."money";
										$query = $this->dbo->query( "UPDATE zyads_users  SET ".$clearmoney.( " = ".$clearmoney." + " ).$rats.( " WHERE uid = '".$nfuid."' " ), TRUE );
								}
								else
								{
										$deduction = 1;
										$num = 0;
										$admingetusernamesumpay = 0;
								}
								$query = $this->dbo->query( "UPDATE zyads_users  SET money = money - ".$sitetype." WHERE uid = ".$restr['advuid']." ", TRUE );
								if ( $restr['plantype'] == "cps" )
								{
										$rats = 0;
										$sitetype = 0;
								}
								$priceadv = $sitetype;
								$priceadvsv = $sitetype - $rats;
								$sql = "SELECT planid  FROM zyads_planstats WHERE  planid = '".$restr['planid']."' AND day = '".DAYS."' ";
								$p = $this->dbo->get_one( $sql );
								if ( !$p )
								{
										$query = $this->dbo->query( "INSERT zyads_planstats SET plantype='".$restr['plantype'].( "',num = ".$num.( ",deduction=".$deduction.", day = '" ) ).DAYS.( "',sumpay= ".$admingetusernamesumpay.( ",sumprofit= ".$priceadvsv.",sumadvpay={$priceadv},planid='" ) ).$restr['planid']."',uid='".$restr['uid']."'", TRUE );
								}
								else
								{
										$query = $this->dbo->query( "UPDATE zyads_planstats  SET num=num+".$num.( ",deduction=deduction+".$deduction.",sumpay= sumpay+{$admingetusernamesumpay},sumprofit= sumprofit+{$priceadvsv},sumadvpay=sumadvpay+{$priceadv} WHERE day = '" ).DAYS."' AND planid = '".$p['planid']."'  ", TRUE );
								}
								$query = $this->dbo->query( "UPDATE zyads_stats  SET num = num + ".$num.( ",deduction=deduction+".$deduction.",sumpay= sumpay+{$admingetusernamesumpay},sumprofit= sumprofit+{$priceadvsv},sumadvpay=sumadvpay+{$priceadv} WHERE day = '" ).DAYS.( "' AND adsid = '".$adsid.( "' AND zoneid = '".$zoneid."' AND planid='" ) ).$restr['planid'].( "'\r\n\t\t\t\t\t\t\tAND uid = '".$nfuid.( "' AND linkuid='".$cpainf."'" ) ), TRUE );
								if ( $this->dbo->affected_rows( ) == 0 )
								{
										$query = $this->dbo->query( "INSERT zyads_stats SET planid='".$restr['planid'].( "',num = ".$num.( ",deduction=".$deduction.", day = '" ) ).DAYS.( "', adsid = '".$adsid.( "' , siteid = '".$siteid."' , zoneid = '{$zoneid}' ,linkuid='{$cpainf}',zonetype = '{$zonetype}'\r\n\t\t\t\t\t\t\t\t, uid = '{$nfuid}',sumpay= {$admingetusernamesumpay},sumprofit= {$priceadvsv},sumadvpay={$priceadv} " ) ), TRUE );
								}
						}
				}
				else
				{
						echo "ckip";
				}
		}

		public function getplaninfo( $adsid, $siteid )
		{
				$this->dbo = gc( );
				$sql = "SELECT  p.gradeprice,p.s0price,p.s1price,p.s2price,p.s3price,p.serverip,p.planid,p.profit,p.priceadv,p.price,p.plantype,p.datatime,p.deduction,p.clearing,p.uid,u.uid AS advuid FROM zyads_plan As p ,zyads_users As u,zyads_ads AS a\r\n\t\t\t\t\tWHERE a.adsid=".$adsid." AND a.planid=p.planid AND p.uid=u.uid AND  p.status = 1 AND  a.status = 3 AND u.status=2";
				$m = $this->dbo->get_one( $sql );
				if ( $m['gradeprice'] == 1 )
				{
						$sql = "SELECT grade FROM zyads_site WHERE siteid=".$siteid." ";
						$eusersiteiddetail = $this->dbo->get_one( $sql );
						$grade = $eusersiteiddetail['grade'];
						$gradeprice = "s".$grade."price";
						$m['price'] = $m[$gradeprice];
				}
				return $m;
		}

		public function getuserinfo( $nfuid )
		{
				$sql = "SELECT cpadeduction,cpsdeduction FROM zyads_users\r\n\t\t\t\t\tWHERE uid=".$nfuid;
				$i = $this->dbo->get_one( $sql );
				return $i;
		}

		public function getdeduction( $i, $restr )
		{
				$resstr = $restr['plantype']."deduction";
				if ( 0 < $restr['deduction'] )
				{
						$deduction = $restr['deduction'];
				}
				else if ( 0 < $i[$resstr] )
				{
						$deduction = $i[$resstr];
				}
				else
				{
						$resstr = $restr['plantype']."_deduction";
						$deduction = $GLOBALS['C_ZYIIS'][$resstr];
				}
				$rand = rand( 1, 100 );
				if ( $rand < $deduction )
				{
						$deduction = 1;
						return $deduction;
				}
				$deduction = 0;
				return $deduction;
		}

		public function getclientipdate( $nfuid, $planid, $cpaas, $plantype, $orders )
		{
				if ( $plantype == "cps" )
				{
						$xwhere = " AND orders='".$orders."'";
				}
				$sql = "SELECT ip,day FROM zyads_orders WHERE ip='".$cpaas.( "' AND uid=".$nfuid." AND planid={$planid} AND day='" ).DAYS.( "' ".$xwhere );
				$array = $this->dbo->get_one( $sql );
				if ( $array )
				{
						$tidate = strtotime( $array['day'] );
						$abs = abs( ( TIMES - $tidate ) / 86400 );
				}
				else
				{
						$y = "y";
				}
				if ( $y == "y" || 1 <= $abs )
				{
						return TRUE;
				}
				return FALSE;
		}

}

?>
