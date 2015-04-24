<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

if ( !extension_loaded( "mysql" ) )
{
		exit( "无法载入 mysql 扩展，请检查 PHP 配置" );
}
if ( !function_exists( "date_default_timezone_set" ) )
{
		exit( "PHP版太不能低于5.1.0" );
}
$installs = is_file( "./install/index.php" );
if ( $installs )
{
		header( "Location: /install/index.php" );
		exit( );
}
define( "CONTROLLER_NAME", "index" );
require( "./config.php" );

require( LIB_DIR."/z.php" );
define( "P_TPL", WWW_DIR."/templates/" );
define( "Z_TPL", "index/default" );
define( "TPL_DIR", P_TPL.Z_TPL );
require( APP_DIR."/zyiis-app.php" );
Z::import( APP_DIR );
Zyiis::start( )->run( );
echo "\r\n";
?>
