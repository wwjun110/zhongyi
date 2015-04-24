<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

if ( $_SERVER['HTTP_USER_AGENT'] == "" )
{
		exit( "NC" );
}
require( "../config.php" );
ini_set( "session.cookie_domain", ".".$GLOBALS['C_ZYIIS']['siteurl'] );
installlicense( );
$actionName = preg_replace( "/[^a-z0-9-]+/i", "", $_GET['action'] );
if ( in_array( $actionName, array( "createzone", "createads", "stats" ) ) )
{
		session_cache_limiter( "" );
}
define( "CONTROLLER_NAME", "commercial" );
require( LIB_DIR."/z.php" );
define( "P_TPL", WWW_DIR."/templates/" );
define( "Z_TPL", "commercial" );
define( "TPL_DIR", P_TPL.Z_TPL );
require( APP_DIR."/zyiis-app.php" );
Z::import( APP_DIR );
Zyiis::start( )->run( );
echo "\r\n\r\n";
?>
