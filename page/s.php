var _Zref=escape(document.referrer), _Zloc=escape(window.location);
if(window.top.location!=document.location){try {_Zref = escape(top.document.referrer)} catch (e) {}try {_Zloc = escape(top.location)} catch (e) {}}
function _Zhv_(){var a=0;if(window.top.location==document.location && document.body ){var j=document.body.scrollHeight,v=document.body.clientHeight;if(v&&j){a=Math.round(j);}} return a;}
<?php
$s = (int)$_GET['s'];
$w = (int)$_GET['w'];
$h = (int)$_GET['h'];
$html = '<iframe src="http://v7.i6w.cn/page/?s='.$s.'&loc=\'+_Zloc+\'&ref=\'+_Zref+\'&zhv=\'+_Zhv_()+\'"  width="'.$w.'" height="'.$h.'" frameborder="0" marginwidth="0" marginheight="0" vspace="0" hspace="0" allowtransparency="true" scrolling="no"></iframe>';
echo "document.write('".$html."');";