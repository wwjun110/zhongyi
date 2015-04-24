<?php

if ( !defined( "IN_ZYADS") )
{
exit( );
}
echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">\r\n<html>\r\n<head>\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=GB2312\" />\r\n<meta name = \"description\" content = \"\" />\r\n<meta name = \"keywords\" content = \"\" />\r\n<meta name=\"Copyright\" content=\"Copyright (c) 2007-2009 zyiis.com\" />\r\n<script src=\"/javascript/function.js\" language='JavaScript'></script>\r\n<script src=\"/javascript/jquery/jquery.js\" type=\"text/javascript\"></script>\r\n<script language=\"JavaScript\" type=\"text/javascript\" src=\"/javascript/jquery/thickbox.js\"></script>\r\n<link href=\"/javascript/jquery/css/thickbox.css\" rel=\"stylesheet\" type=\"text/css\" />\r\n<link href=\"/templates/";
echo Z_TPL;
echo "/style.css\" rel=\"stylesheet\" type=\"text/css\" />\r\n<title> 商务后台 ";
echo $GLOBALS['C_ZYIIS']['sitename'];
echo "</title>\r\n</head>\r\n<body>\r\n<table width=\"910\" height=\"72\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n  \r\n  <tr>\r\n    <td width=\"230\"><img src=\"/templates/";
echo Z_TPL;
echo "/images/logo.gif\"   border=\"0\" /></td>\r\n    <td align=\"right\"><table width=\"400\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n        <tr>\r\n          <td height=\"30\" align=\"right\"> 商务， ";
echo $_SESSION['commercialusername'];
echo " <a href=\"/index.php?action=logout\">[退出]</a> ";
echo date( "Y年m月d日",TIMES );
echo "          ";
$arr = array( "星期天","星期一","星期二","星期三","星期四","星期五","星期六");
$w = date( "w",TIMES );
echo $arr[$w];
echo "</td>\r\n        </tr>\r\n        <tr>\r\n          <td height=\"30\" valign=\"bottom\">&nbsp;</td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n</table>\r\n<div class=\"header_menu\">\r\n  <div class=\"shell\">\r\n    <ul class=\"clear\" id=\"channel\">\r\n      <li ";
if ( $_GET['action'] == "")
{
echo "class='current1'";
}
echo "><a href=\"/commercial/index1.php\">我的首页</a></li>\r\n      <li ";
if ( in_array( $_GET['action'],array( "users") ) )
{
echo "class='current1'";
}
echo "><a href=\"?action=users\">广告商</a></li>\r\n      <li ";
if ( in_array( $_GET['action'],array( "plan") ) )
{
echo "class='current1'";
}
echo "><a href=\"?action=plan\">计划管理</a></li>\r\n      \r\n       <li ";
if ( in_array( $_GET['action'],array( "ads") ) )
{
echo "class='current1'";
}
echo "><a href=\"?action=ads\">广告管理</a></li>\r\n       \r\n       \r\n      <li ";
if ( in_array( $_GET['action'],array( "stats") ) )
{
echo "class='current1'";
}
echo "><a href=\"?action=stats\">数据报表</a></li>\r\n \r\n      \r\n    </ul>\r\n  </div>\r\n</div>\r\n</div>";

?>