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
function stripslashes_deep( $value ){
		$value = is_array( $value ) ? array_map( "stripslashes_deep", $value ) : stripslashes( $value );
		return $value;
}

function is_really_writable( $string )
{
		if ( is_dir( $string ) )
		{
				$string = rtrim( $string, "/" )."/".md5( rand( 1, 100 ) );
//				if ( ( $stream = @fopen( $string, "ab" ) ) === FALSE )
//				{
//						return FALSE;
//				}
				fclose( $stream );
				@chmod( $string, 511 );
				@unlink( $string );
				return TRUE;
		}
//		if ( ( $stream = @fopen( $string, "ab" ) ) === FALSE )
//		{
//				return FALSE;
//		}
		fclose( $stream );
		return TRUE;
}

function mkdirs( $dir, $mode = 511 )
{
		if ( !is_dir( $dir ) )
		{
				mkdirs( dirname( $dir ), $mode );
				$result = mkdir( $dir, $mode );
				return $result;
		}
		return TRUE;
}

function url( $v )
{
		if ( $GLOBALS['C_ZYIIS']['make_html'] == "0" )
		{
				return $v;
		}
		$parse_url = parse_url( $v );
		parse_str( $parse_url['query'], &$output );
		$u = "/".UI."/".$output['action'];
		if ( $output['id'] )
		{
				$u .= "/".$output['id'];
		}
		return $u;
}

function uniquestrexplode( $array )
{
		foreach ( ( array )$array as $output )
		{
				$output = join( ",", $output );
				$arr[] = $output;
		}
		$arr = array_unique( ( array )$arr );
		foreach ( ( array )$arr as $key => $output )
		{
				$arr[$key] = explode( ",", $output );
		}
		return $arr;
}

function search( $search, $arr )
{
		foreach ( ( array )$arr as $key => $value )
		{
				if ( !in_array( $search, $value ) )
				{
				}
				else
				{
						return $key;
				}
		}
		return FALSE;
}

function zaddrescurice( $array )
{
		static $new_a = array( );
		foreach ( ( array )$array as $value )
		{
				if ( is_array( $value ) )
				{
						zaddrescurice( $value );
				}
				else
				{
						$new_a[] = $value;
				}
		}
		return $new_a;
}

function pregdate( $day )
{
		if ( preg_match( "/^[0-9]{4}-[0-9]{1,2}-[0-9]{1,2}\$/", $day ) )
		{
				$darr = explode( "-", $day );
				$y = $darr[0];
				$m = $darr[1];
				$d = $darr[2];
				if ( checkdate( $m, $d, $y ) )
				{
						return TRUE;
				}
				return FALSE;
		}
		return FALSE;
}

function add_magic_quotes( &$array )
{
		foreach ( ( array )$array as $key => $value )
		{
				$key = preg_replace( "/[^a-z0-9_]+/i", "", $key );
				if ( !is_array( $value ) )
				{
						if ( !MAGIC_QUOTES_GPC )
						{
								$array[$key] = recv( addslashes( $value ) );
						}
						else
						{
								$array[$key] = recv( $value );
						}
				}
				else
				{
						add_magic_quotes( $array[$key] );
				}
		}
}

function trans( $string )
{
		$string = str_replace( array( "&lt;", "&gt;", "&quot;", "&#39;" ), array( "<", ">", "\"", "'" ), $string );
		return $string;
}

function recv( &$value )
{
		if ( is_array( $value ) )
		{
				foreach ( $value as $key => $value )
				{
						recv( $value[$key] );
				}
				return $value;
		}
		if ( !is_numeric( $value ) )
		{
				$value = preg_replace( "/[\\x00-\\x08\\x0B\\x0C\\x0E-\\x1F]/", "", $value );
				$value = str_replace( array( "%3C", "<" ), "&lt;", $value );
				$value = str_replace( array( "%3E", ">" ), "&gt;", $value );
				$value = str_replace( array( "\"", "'", "\t" ), array( "&quot;", "&#39;", "    " ), $value );
				$value = str_ireplace( array( "char(", "load_file", "select", "update%", "update%", "update ", "insert", "delete", "zyads", "%00", "\\0", "\\r", "\\x1a", "/*" ), "", $value );
		}
		return $value;
}

function str( $string, $nu = 10 )
{
		$i = 0;
		$j = 0;
		for ( ;	$j < $nu;	++$j	)
		{
				if ( 160 < ord( substr( $string, $j, 1 ) ) )
				{
						++$i;
				}
		}
		if ( $i % 2 != 0 )
		{
				++$nu;
		}
		$v = substr( $string, 0, $nu );
		if ( $nu < strlen( $string ) )
		{
				$v .= "...";
		}
		return $v;
}

function random( )
{
		mt_srand( ( double )microtime( ) * 100000000 );
		$v = rand( 10000000, 90000000 );
		return $v;
}

function isweekday( $j )
{
		$d = array( "日", "一", "二", "三", "四", "五", "六" );
		return $d[$j];
}

function ffsockopen( $url, $content, $post = 80, $timeout = 10, $mode = TRUE )
{
		$fp = @fsockopen( $url, $port, &$errno, &$errstr, $timeout );
		if ( !$fp )
		{
				return "";
		}
		stream_set_blocking( $fp, $block );
		stream_set_timeout( $fp, $timeout );
		@fwrite( $fp, $content );
		$status = stream_get_meta_data( $fp );
		return "";
		do
		{
		} while ( $status['timed_out'] && !feof( $fp ) || ( $header = @fgets( $fp ) ) && !( $header == "\r\n" ) || $header == "\n" );
		$stop = FALSE;
		while ( !feof( $fp ) || !$stop )
		{
				$data = fread( $fp, $limit == 0 || 8192 < $limit ? 8192 : $limit );
				$return .= $data;
				if ( $limit )
				{
						$limit -= strlen( $data );
						$stop = $limit <= 0;
				}
		}
		@fclose( $fp );
		$return_arr = explode( "\n", $return );
		if ( isset( $return_arr[1] ) )
		{
				$return = trim( $return_arr[1] );
		}
		unset( $return_arr );
		return $return;
}

function build_query( $url, $dir, $content, $post = 80, $timeout = 10 )
{
		$string = http_build_query( $content, "", "&" );
		$text = "POST ".$dir." HTTP/1.0\r\n";
		$text .= "Host: ".$url."\r\n";
		$text .= "Content-Length: ".strlen( $string )."\r\n";
		$text .= "User-Agent: ".$_SERVER['HTTP_USER_AGENT']."\r\n";
		$text .= "Content-Type: application/x-www-form-urlencoded\r\n\r\n";
		$text .= $string."\r\n\r\n";
		$text .= "Connection: Close\r\n\r\n";
		$content = ffsockopen( $url, $text, $post, $timeout );
		return $content;
}

function dump( $value, $string = "", $bool = FALSE )
{
		if ( ini_get( "html_errors" ) )
		{
				$content = "<pre>\n";
				if ( $string != "" )
				{
						$content .= "<strong>".$string." :</strong>\n";
				}
				$content .= htmlspecialchars( print_r( $value, TRUE ) );
				$content .= "\n</pre>\n";
		}
		else
		{
				$content = $string." :\n".print_r( $value, TRUE );
		}
		if ( $bool )
		{
				return $content;
		}
		echo $content;
}

function t( $string )
{
		return nl2br( str_replace( " ", "&nbsp;", htmlspecialchars( $string ) ) );
}

function h( $value )
{
		$value = is_array( $value ) ? array_map( "h", $value ) : htmlspecialchars( $value );
		return $value;
}

function redirect( $v, $s = 0 )
{
		if ( !headers_sent( ) )
		{
				if ( 0 === $s )
				{
						header( "Location: ".$v );
						exit( );
				}
				header( "refresh:".$s.( ";url=".$v ) );
				exit( );
		}
		echo "<meta http-equiv='Refresh' content='";
		echo $s;
		echo ";URL=";
		echo $v;
		echo "'>";
		exit( );
}

function toplocation( $v )
{
		exit( "<script>top.location=\"".$GLOBALS['C_ZYIIS']['authorized_url']."/".$v."\";</script>" );
}

function message( $msg, $url = "" )
{
		require( P_TPL."/message.lang.php" );
		if ( $url == "" )
		{
				echo "<script>alert('";
				echo $m[$msg];
				echo "');history.back();</script>";
				exit( );
		}
		echo "<script>alert('".$m[$msg]."');top.location='".$url."';</script>";
		exit( );
}

function alert( $msg )
{
		$msg = preg_replace( "/\\s+/", "", $msg );
		echo "<script>alert('";
		echo $msg;
		echo "');history.back();</script>";
		exit( );
}

function getdomain( $v )
{
		$ep = "ac,ah,biz,bj,cc,com,cq,edu,fj,gd,gov,gs,gx,gz,ha,hb,he,hi,hk,hl,hn,info,io,jl,js,jx,ln,mo,mobi,net,nm,nx,org,qh,sc,sd,sh,sn,sx,tj,tm,travel,tv,tw,ws,xj,xz,yn,zj";
		$stuff = explode( ".", $v );
		$stuff2 = explode( ",", $ep );
		$stend = end( &$stuff );
		$stpre = prev( &$stuff );
		if ( in_array( $stpre, $stuff2 ) )
		{
				if ( count( $stuff ) == 2 )
				{
						$prefix = "www";
				}
				$xx = prev( &$stuff )."{$prefix}.";
		}
		return $xx.$stpre.".".$stend;
}

function ctr( $views, $number )
{
		if ( 0 < $views )
		{
				$rate = number_format( $number * 100 / $views, 2 )."%";
				return $rate;
		}
		$rate = "0.00%";
		return $rate;
}

function sendmail( $email, $subject, $body )
{
		set_time_limit( 0 );
		if ( is_array( $email ) )
		{
				static $mail = NULL;
		}
		if ( is_null( $mail ) )
		{
				include_once( LIB_DIR."/smtp/class.phpmailer.php" );
				$mail = new PHPMailer( );
		}
		if ( $GLOBALS['C_ZYIIS']['mail_send'] == "1" )
		{
				$mail->issendmail( );
				$mail->Host = $GLOBALS['C_ZYIIS']['mail_server'];
				$mail->Port = $GLOBALS['C_ZYIIS']['mail_port'];
		}
		if ( $GLOBALS['C_ZYIIS']['mail_send'] == "2" )
		{
				$mail->issmtp( );
				$mail->Host = $GLOBALS['C_ZYIIS']['mail_server'];
				$mail->Port = $GLOBALS['C_ZYIIS']['mail_port'];
				$mail->SMTPAuth = $GLOBALS['C_ZYIIS']['mail_auth'];
				$mail->Username = $GLOBALS['C_ZYIIS']['mail_username'];
				$mail->Password = $GLOBALS['C_ZYIIS']['mail_password'];
		}
		if ( $GLOBALS['C_ZYIIS']['mail_send'] == "3" )
		{
				$mail->ismail( );
		}
		$mail->From = $GLOBALS['C_ZYIIS']['mail_from'];
		$mail->FromName = $GLOBALS['C_ZYIIS']['mail_username'];
		$mail->CharSet = "GB2312";
		$mail->msghtml( $body );
		$mail->Subject = $subject;
		if ( !is_array( $email ) )
		{
				$mail->addaddress( $email );
		}
		else
		{
				foreach ( $email as $e )
				{
						$mail->addbcc( $e['email'] );
				}
		}
		if ( !$mail->send( ) )
		{
				echo "Mailer Error: ".$mail->ErrorInfo;
				return FALSE;
		}
		return TRUE;
}

function streamgetcontent( $v, $content = "" )
{
		$options = array(
				"http" => array(
						"timeout" => 10,
						"method" => "GET",
						"header" => "User-Agent:Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 6.0)\r\nAccept:*/*\r\nReferer:www.zyiis.com\r\n",
						"content" => $content
				)
		);
		$string = @file_get_contents( $v, FALSE, @stream_context_create( $options ) );
		return $string;
}

function _ispost( )
{
		return strtolower( $_SERVER['REQUEST_METHOD'] ) == "post";
}

function convertip( $ip )
{
		if ( !preg_match( "/^\\d{1,3}\\.\\d{1,3}\\.\\d{1,3}\\.\\d{1,3}\$/", $ip ) )
		{
				return "";
		}
		$adscity = Z::getsingleton( "client_adscity" );
		$qip = $adscity->query( $ip );
		$adscity->close( );
		return $qip[0];
}

function arraykeyformat( &$value )
{
		$value = "'".$value."'";
		return $value;
}

function gd_version( )
{
		if ( function_exists( "gd_info" ) )
		{
				$gd_info = gd_info( );
				$version = $gd_info['GD Version'] ? $gd_info['GD Version'] : 0;
				unset( $gd_info );
				return $version;
		}
		$version = 0;
		return $version;
}

function dexit( )
{
		$string = "<!DOCTYPE HTML PUBLIC '-//IETF//DTD HTML 2.0//EN'>\r\n\t<html><head>\r\n\t<title>404 Not Found</title>\r\n\t</head><body>\r\n\t<h1>Not Found</h1>\r\n\t<p>The requested URL  was not found on this server.</p>\r\n\t</body></html>";
		exit( $string );
}

function zyencode( $length = 5 )
{
		$string = substr( md5( rand( ) ), 1, $length );
		return $string;
}

function getip( )
{
		return $_SERVER['REMOTE_ADDR'];
}

if ( !defined( "MAGIC_QUOTES_GPC" ) )
{
		define( "MAGIC_QUOTES_GPC", get_magic_quotes_gpc( ) );
}

?>
