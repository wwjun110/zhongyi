<?php

class Dispatcher
{

		public $controller_name = NULL;
		public $action_name = NULL;

		public function __construct( )
		{
				if ( !defined( "INSTALL" ) )
				{
						ob_start( );
						Z::getsingleton( "sessions" );
						session_start( );
				}
				header( "Content-type: text/html;charset=gbk" );
				unset( $_ENV );
				unset( $HTTP_GET_VARS );
				unset( $HTTP_POST_FILES );
				unset( $HTTP_POST_VARS );
				unset( $HTTP_SERVER_VARS );
				unset( $HTTP_COOKIE_VARS );
				add_magic_quotes( $_POST );
				add_magic_quotes( $_GET );
				add_magic_quotes( $_COOKIE );
				add_magic_quotes( $_REQUEST );
				add_magic_quotes( $_SERVER );
				$qskey = array_keys( $_REQUEST );
				if ( !empty( $qskey ) )
				{
						$qskey = array_combine( $qskey, $qskey );
						$qskey = array_change_key_case( $qskey );
				}
				$cl = "cl";
				if ( isset( $qskey[$cl] ) )
				{
						$this->controller_name = $_REQUEST[$qskey[$cl]];
				}
				else if ( !defined( "CONTROLLER_NAME" ) )
				{
						$this->controller_name = "default";
				}
				else
				{
						$this->controller_name = CONTROLLER_NAME;
				}
				$cl = strtolower( "action" );
				if ( isset( $qskey[$cl] ) )
				{
						$this->action_name = $_REQUEST[$qskey[$cl]];
				}
				else
				{
						$this->action_name = "index";
				}

				$this->controller_name = strtolower( preg_replace( "/[^a-z0-9_]+/i", "", $this->controller_name ) );
				$this->action_name = strtolower( preg_replace( "/[^a-z0-9_]+/i", "", $this->action_name ) );
		}

		public function run( )
		{
				$this->controller( $this->controller_name, $this->action_name );
		}

		public function controller( $controller_name, $action_name )
		{
				$class_name = "Controller_".ucfirst( str_replace( "_", "", $controller_name ) );
				$action_method = "action".ucfirst( strtolower( $action_name ) );
				$action_method = str_replace( "_", "", $action_method );
				$dir = APP_DIR."/controller";
				$filename = $controller_name.".php";
				$zyiisa = "action_method";
				$expzysa = explode( "_", $zyiisa );
				try
				{
						Z::loadclassfile( $filename, array(
								$dir
						), $class_name );
				}
				catch ( Exception $ex )
				{
						include( P_TPL."404.php" );
						exit( );
				}
				$controller = new $class_name( $this );
				if ( method_exists( $controller, $action_method ) )
				{
						$zyiisa = $expzysa[0]."_".$expzysa[1];
						$ret = $controller->$$zyiisa( );
						exit( );
				}
				include( P_TPL."404.php" );
				exit( );
		}

		public function __set( $property_name, $value )
		{
				throw new ZException( "__set allowed" );
		}

		public function __get( $property_name )
		{
				throw new ZException( "__get allowed" );
		}

}

?>
