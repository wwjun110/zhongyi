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
class Check
{

		public function gd_version( )
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

		public function zend_version( )
		{
				return OPTIMIZER_VERSION;
		}

		public function php_version( )
		{
				return PHP_VERSION;
		}

		public function mysqlextension( )
		{
				if ( !extension_loaded( "mysql" ) )
				{
						return FALSE;
				}
				return TRUE;
		}

		public function hostname( )
		{
				$M = gethostbyname( "www.zyiis.com" );
				if ( $M == "www.zyiis.com" )
				{
						return FALSE;
				}
				return TRUE;
		}

		public function is_writable( $string )
		{
				if ( is_dir( $string ) )
				{
						$string = rtrim( $string, "/" )."/".md5( rand( 1, 100 ) );
//						if ( ( $stream = @fopen( $string, "ab" ) ) === FALSE )
//						{
//								return FALSE;
//						}
						fclose( $stream );
						@chmod( $string, 511 );
						@unlink( $string );
						return TRUE;
				}
//				if ( ( $stream = @fopen( $string, "ab" ) ) === FALSE )
//				{
//						return FALSE;
//				}
				fclose( $stream );
				return TRUE;
		}

}

?>
