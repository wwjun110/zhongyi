<?php if(!defined('IN_ZYADS')) exit; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=GB2312" />
<meta name = "description" content = "" />
<meta name = "keywords" content = "" />
<meta name="author" content="中易广告联盟系统 | www.zyiis.com" />
<meta name="Copyright" content="Copyright (c) 2010 zyiis.com" />
<script src="/javascript/function.js" language='JavaScript'></script>
<title>广告商 管理后台 <?php echo $GLOBALS['C_ZYIIS']['sitename']?></title>
<link href="/templates/<?php echo Z_TPL?>/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<table width="910" height="72" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="230"><img src="/templates/<?php echo Z_TPL?>/images/logo.gif"   border="0" /></td>
    <td align="right"><table width="600" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td height="30" align="right"><a href="?action=pm" class="head_nav">我的消息</a> | <a href="/" class="head_nav">联盟首页</a></td>
        </tr>
        <tr>
          <td height="30" align="right">欢迎， <?php echo $_SESSION["username"]?> <a href="/index.php?action=logout">[退出]</a> <?php echo date("Y年m月d日",TIMES)?>
            <?php 
		$arr = array("星期天","星期一","星期二","星期三","星期四","星期五","星期六");
		$w = date("w",TIMES);
		echo $arr[$w];
		?>
            <?php if($_SESSION["serviceqq"]){?>
            <span style=" color:#0000FF; font-size:14px; padding-left:30px">客服：<a href="http://wpa.qq.com/msgrd?V=1&uin=<?php echo $_SESSION["serviceqq"]?>" target="_blank"><img border="0" src="http://wpa.qq.com/pa?p=2:<?php echo $_SESSION["serviceqq"]?>:17" alt="点击这里给我发消息" title="点击这里给我发消息" /></span>
            <?php }?></td>
        </tr>
      </table></td>
  </tr>
</table>
<div class="header_menu">
  <div class="shell">
    <ul class="clear" id="channel">
      <li <?php if($_GET['action'] == '') echo "class='current1'"?>><a href="/advertiser/">我的首页</a></li>
      <li <?php if(in_array($_GET['action'],array('planlist','createplan','editplan'))) echo "class='current1'"?>><a href="?action=planlist">计划管理</a></li>
      <li <?php if(in_array($_GET['action'],array('createads','adslist'))) echo "class='current1'"?>><a href="?action=adslist">广告管理</a></li>
      <li <?php if(in_array($_GET['action'],array('stats' )))  echo "class='current1'"?>><a href="?action=stats">数据报表</a></li>
      <li <?php if(in_array($_GET['action'],array('audit'))) echo "class='current1'"?>><a href="?action=audit">审核申请</a></li>
      <?php if($this->cpa_cps) { ?>
      <li <?php if(in_array($_GET['action'],array( 'order')))  echo "class='current1'"?>><a href="?action=order">查看订单</a></li>
      <?php }?>
      <li <?php if($_GET['action'] == 'consumelist') echo "class='current1'"?>><a href="?action=consumelist">在线充值</a></li>
      <li <?php if($_GET['action'] == 'userinfo') echo "class='current1'"?>><a href="?action=userinfo">会员信息</a></li>
    </ul>
  </div>
</div>
