<?php if(!defined('IN_ZYADS')) exit(); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=gbk' />
<style>
body,table,div,ul,li {
font-size:10px;
margin:0;
padding:0;
}

body {
background-color:transparent;
font-family:arial,sans-serif;
height:100%;
}

#aus {
height:60px;
width:168px;
}

#ads {
left:1px;
position:absolute;
top:4px;
width:166px;
}

#ads ul {
list-style:none;
width:100%;
}

#ads ul li {
float:left;
height:60px;
overflow:hidden;
width:168px;
}

a:link,a:visited,a:hover,a:active {
color:#<?php echo $hl?>;
}

.ad {
margin:0 2px;
}

.adb {
color:#<?php echo $dt?>;
display:block;
font-size:12px;
}

.adu {
color:#<?php echo $du?>;
font-size:10px;
overflow:hidden;
white-space:nowrap;
}

.adt {
font-size:14px;
font-weight:700;
}

#abgi {
left:70px;
position:absolute;
top:43px;
}

#aubg {
background-color:#<?php echo $br?>;
border:1px solid #<?php echo $bd?>;
<?php if($yj>0) {?>
display:none;
<?php }?>
height:58px;
width:166px;
}

#att {
left:58px;
position:absolute;
top:41px;
}

#att ul {
height:28px;
list-style:none;
width:110px;
}

#att ul li {
float:left;
}

#abgf {
background-color:#<?php echo $bd?>;
height:18px;
<?php if($yj>0) {
	$w = "74px";
} else {
	$w = "92px";
}

?>
width:<?php echo $w?>;
}

#abgt {
height:18px;
position:relative;
width:18px;
}


.bg {
background-color:#<?php echo $br?>;
height:18px;
position:absolute;
width:18px;
border-color:#<?php echo $bd?>;
border-style:solid;
border-width:0;
}

#tlc {
background-color:#FFFFFF;
border-left-width:1px;
border-top-width:1px;
left:0;
top:0;
}

#trc {
background-color:#FFFFFF;
border-right-width:1px;
border-top-width:1px;
left:<?php echo 166-19?>px;
top:0;
}

#blc {
background-color:#FFFFFF;
border-bottom-width:1px;
border-left-width:1px;
left:0;
top:<?php echo 60-19?>px;
}

#brc {
background-color:#000;
border-bottom-width:1px;
border-right-width:1px;
left:<?php echo 166-19?>px;
top:<?php echo 60-19?>px;
}

#bgtf {
border-top-width:1px;
left:19px;
top:0;
width:<?php echo 166-38?>px;
}

#bgbf {
border-bottom-width:1px;
left:19px;
top:<?php echo 60-19?>px;
width:<?php echo 166-38?>px;
}

#bgcf {
border-left-width:1px;
border-right-width:1px;
height:<?php echo 60-38?>px;
left:0;
top:19px;
width:<?php echo 166-2?>px;
}
</style>

</head>
<body>
<div id=aus>
  <div id=aubg></div>
  <?php if($yj>0) {?>
  <div class=bg id=bgtf></div><!--圆角的时候头部背景色-->
  <div class=bg id=bgcf></div><!--圆角的时候中部背景色-->
  <div class=bg id=bgbf></div><!--圆角的时候低部背景色-->
  <div class=bg id=tlc></div> <!--圆角的时候 顶部 左圆角-->
  <div class=bg id=trc></div>
  <div class=bg id=blc></div>
  <div class=bg id=brc></div>
  <?php }?>
  <div id=ads>
    <ul>
      <li>
        <div class=ad><a class=adt href='http://www.zy.com/' target='_blank' ><span>广告标题 </span></a>
          <div class=adb >广告文字 </div>
          <div class=adu><span class=adus >www.zyiis.com</span></div>
        </div>
      </li>
    </ul>
  </div>
  <div id=att >
    <ul>
      <li id=abgt></li>
      <li id=abgf></li>
    </ul>
  </div>
  <script>
<?php if($yj>0) {?>
	var rcl=[['tlc',18,18,'#<?php echo $br?>','#<?php echo $bd?>',1,<?php echo $yj?>,0],['trc',18,18,'#<?php echo $br?>','#<?php echo $bd?>',1,<?php echo $yj?>,1],['blc',18,18,'#<?php echo $br?>','#<?php echo $bd?>',1,<?php echo $yj?>,2],['brc',18,18,'#<?php echo $bd?>','#<?php echo $bd?>',1,<?php echo $yj?>,3]];
<?php }?>

var sc=['abgt',18,18,'#<?php echo $bd?>',false,false];
</script>
  <div id=abgi style='cursor:pointer'><a href="http://www.zy.com/?" target="_blank"><span style="display:inline-block;filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='/images/copy-<?php echo $fp?>.png');height:16px;width:96px;cursor:pointer"><img alt="zy.com 提供的广告" border=0 height=16 src="/images/copy-<?php echo $fp?>.png" style="filter:progid:DXImageTransform.Microsoft.Alpha(opacity=0)" width=96 ></span></a> </div>
</div>
</body>
</html>
<SCRIPT LANGUAGE="JavaScript" src='<?php echo $GLOBALS['C_ZYIIS']['jsurl']?>/js//c3.js'></SCRIPT>
