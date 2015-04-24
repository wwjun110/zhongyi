<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

abstract class Z
{

		private static $config = array( );
		private static $objects = array( );
		private static $class_path = array( );

		public static function pathallini( )
		{
				return self::$class_path;
		}

		public static function import( $dir )
		{
				if ( !isset( $class_path[$dir] ) || is_dir( $dir ) )
				{
						self::$class_path[$dir] = realpath( $dir );
				}
		}

		public static function loadfile( $filename, $dirs = NULL, $once = FALSE )
		{
				static $loaded = array( );
				$id = $filename.implode( ":", ( array )$dirs );
				if ( $once && isset( $loaded[$id] ) )
				{
						return;
				}
				if ( preg_match( "/[^a-z0-9\\-_.]/i", $filename ) )
				{
						throw new ZException( "Filaname Error ".$filename );
				}
				if ( is_null( $dirs ) )
				{
						$dirs = array( );
				}
				else if ( is_string( $dirs ) )
				{
						$dirs = explode( PATH_SEPARATOR, $dirs );
				}
				foreach ( $dirs as $dir )
				{
						$path = rtrim( $dir, "\\/" ).DS.$filename;
						if ( !self::isreadable( $path ) )
						{
						}
						else if ( $once )
						{
								$loaded[$id] = TRUE;
								return include_once( $path );
						}
						else
						{
								return include( $path );
						}
				}
				return FALSE;
		}

		public static function loadclassfile( $filename, $dir, $classname )
		{
				if ( class_exists( $classname, FALSE ) )
				{
						return;
				}
				Z::loadfile( $filename, $dir, TRUE );
				if ( !class_exists( $classname, FALSE ) )
				{
						throw new ZException( "Class ".$classname.( " not defined in file ".$filename ) );
				}
		}

		public static function loadclass( $classname, $dir = NULL )
		{
				if ( class_exists( $classname, FALSE ) )
				{
						return;
				}
				$classname = strtolower( $classname );
				$filename = str_replace( "_", DS, $classname );
				if ( $filename != $classname )
				{
						$dirname = dirname( $filename );
						if ( !empty( $dir ) )
						{
								if ( !is_array( $dir ) )
								{
										$dir = explode( PATH_SEPARATOR, $dir );
								}
								foreach ( $dir as $key => $dir )
								{
										$dirs[$key] = $dir.DS.$dirname;
								}
						}
						else
						{
								$dir = array( );
								foreach ( self::$class_path as $dir )
								{
										if ( $dir == "." )
										{
												$dirs[] = $dirname;
										}
										else
										{
												$dir = rtrim( $dir, "\\/" );
												$dirs[] = $dir.DS.$dirname;
										}
								}
						}
						$filename = basename( $filename ).".php";
				}
				else
				{
						$dirs = self::$class_path;
						$filename .= ".php";
				}
				self::loadclassfile( $filename, $dirs, $classname );
		}

		public static function getsingleton( $classname )
		{
				if ( isset( $objects[$classname] ) )
				{
						return self::$objects[$classname];
				}
				self::loadclass( $classname );
				return self::regobj( new $classname( ), $classname );
		}

		public static function regobj( $object, $class = NULL, $_obfuscate_U6NASJIkzwZlg = FALSE )
		{
				if ( !is_object( $object ) )
				{
						throw new ZException( gettype( $object )." Not obj" );
				}
				if ( is_null( $class ) )
				{
						$class = get_class( $object );
				}
				self::$objects[$class] = $object;
				return $object;
		}

		public static function getobj( $class )
		{
				if ( isset( $objects[$class] ) )
				{
						return self::$objects[$class];
				}
				throw new ZException( $class." No obj" );
		}

		public static function isregistered( $class )
		{
				return isset( $objects[$class] );
		}

		public static function isreadable( $filename )
		{
				if ( is_readable( $filename ) )
				{
						return TRUE;
				}
				return FALSE;
		}

		public static function zrequire( $filename, $data = "" )
		{
				if ( is_array( $data ) )
				{
						extract( $data );
				}
				require( $filename );
		}

		public static function getconn( )
		{
				$dbotype = "dbo_mysql";
				if ( Z::isregistered( $dbotype ) )
				{
						return Z::getobj( $dbotype );
				}
				$dbo = gc( );
				Z::regobj( $dbo, $dbotype );
				return $dbo;
		}

}


define( "DS", DIRECTORY_SEPARATOR );
require_once( LIB_DIR."/e.php" );
require_once( LIB_DIR."/d.php" );
require_once( LIB_DIR."/f.php" );
Z::import( LIB_DIR );
?>
