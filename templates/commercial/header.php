<?php

if ( !defined( "IN_ZYADS") )
{
exit( );
}
echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">\r\n<html>\r\n<head>\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=GB2312\" />\r\n<meta name = \"description\" content = \"\" />\r\n<meta name = \"keywords\" content = \"\" />\r\n<meta name=\"Copyright\" content=\"Copyright (c) 2007-2009 zyiis.com\" />\r\n<script src=\"/javascript/function.js\" language='JavaScript'></script>\r\n<script src=\"/javascript/jquery/jquery.js\" type=\"text/javascript\"></script>\r\n<script language=\"JavaScript\" type=\"text/javascript\" src=\"/javascript/jquery/thickbox.js\"></script>\r\n<link href=\"/javascript/jquery/css/thickbox.css\" rel=\"stylesheet\" type=\"text/css\" />\r\n<link href=\"/templates/";
echo Z_TPL;
echo "/style.css\" rel=\"stylesheet\" type=\"text/css\" />\r\n<title> �����̨ ";
echo $GLOBALS['C_ZYIIS']['sitename'];
echo "</title>\r\n</head>\r\n<body>\r\n<table width=\"910\" height=\"72\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n  \r\n  <tr>\r\n    <td width=\"230\"><img src=\"/templates/";
echo Z_TPL;
echo "/images/logo.gif\"   border=\"0\" /></td>\r\n    <td align=\"right\"><table width=\"400\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n        <tr>\r\n          <td height=\"30\" align=\"right\"> ���� ";
echo $_SESSION['commercialusername'];
echo " <a href=\"/index.php?action=logout\">[�˳�]</a> ";
echo date( "Y��m��d��",TIMES );
echo "          ";
$arr = array( "������","����һ","���ڶ�","������","������","������","������");
$w = date( "w",TIMES );
echo $arr[$w];
echo "</td>\r\n        </tr>\r\n        <tr>\r\n          <td height=\"30\" valign=\"bottom\">&nbsp;</td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n</table>\r\n<div class=\"header_menu\">\r\n  <div class=\"shell\">\r\n    <ul class=\"clear\" id=\"channel\">\r\n      <li ";
if ( $_GET['action'] == "")
{
echo "class='current1'";
}
echo "><a href=\"/commercial/index1.php\">�ҵ���ҳ</a></li>\r\n      <li ";
if ( in_array( $_GET['action'],array( "users") ) )
{
echo "class='current1'";
}
echo "><a href=\"?action=users\">�����</a></li>\r\n      <li ";
if ( in_array( $_GET['action'],array( "plan") ) )
{
echo "class='current1'";
}
echo "><a href=\"?action=plan\">�ƻ�����</a></li>\r\n      \r\n       <li ";
if ( in_array( $_GET['action'],array( "ads") ) )
{
echo "class='current1'";
}
echo "><a href=\"?action=ads\">������</a></li>\r\n       \r\n       \r\n      <li ";
if ( in_array( $_GET['action'],array( "stats") ) )
{
echo "class='current1'";
}
echo "><a href=\"?action=stats\">���ݱ���</a></li>\r\n \r\n      \r\n    </ul>\r\n  </div>\r\n</div>\r\n</div>";

?>