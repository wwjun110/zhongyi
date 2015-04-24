<?php

class Check
{
public function gd_version( )
{
if ( function_exists( "gd_info") )
{
$GDArray = gd_info( );
$gd_version_number = $GDArray['GD Version'] ?$GDArray['GD Version'] : 0;
unset( $GDArray );
return $gd_version_number;
}
$gd_version_number = 0;
return $gd_version_number;
}
public function Zend_Version( )
{
return OPTIMIZER_VERSION;
}
public function Php_Version( )
{
return PHP_VERSION;
}
public function Is_Mysql( )
{
if ( !extension_loaded( "mysql") )
{
return FALSE;
}
return TRUE;
}
public function Is_Internet( )
{
$M = gethostbyname( "www.zyiis.com");
if ( $M == "www.zyiis.com")
{
return FALSE;
}
return TRUE;
}
public function Is_Writable( $file )
{
if ( is_dir( $file ) )
{
$file = rtrim( $file,"/")."/".md5( rand( 1,100 ) );
if ( ( $fp = @fopen( $file,"ab") ) === FALSE )
{
return FALSE;
}
fclose( $fp );
@chmod( $file,511 );
@unlink( $file );
return TRUE;
}
if ( ( $fp = @fopen( $file,"ab") ) === FALSE )
{
return FALSE;
}
fclose( $fp );
return TRUE;
}
}

?>