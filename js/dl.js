/*
+---------------------------------------------------------------------------+
| ZYIIS.COM                                                                 |
| ==========                                                                |
|                                                                           |
| Copyright (c) 2005-2008 Zyiis Limited                                     |
| For contact details, see: http://www.zyiis.com/                           |
|                                                                           |
+---------------------------------------------------------------------------+
*/
$dl = { 
	dL_fileex:dL_Img_url.substr(dL_Img_url.lastIndexOf(".")).toLowerCase(),
	a : function(){
	 if(this.dL_fileex!='.swf'){
		H="<div id='_z_dl_d1' style='left:10px;position:absolute;top:70px;float:lef' ><a href='"+dL_Ads_Url+"' target='_blank'  onclick='_zh_(event)' onmouseover='_zv_();_zn_(event);_zt_(event)' onmousedown='_zc_(event)'  onmouseup='_zc_(event)'><img border=0 src='"+dL_Img_url+"' height='"+dL_Height+"' width='"+dL_Width+"'></a><div style='background:none repeat scroll 0 0 #F0F0F0;border:1px solid #E1E1E1;height:15px;margin:0;padding:0;width:"+dL_Width+"px;text-align:right; ' onmouseover='this.style.color=\"#ff0000\";' onmouseout='this.style.color=\"#000\";'><span style='font-size:12px;cursor:pointer' onclick=\"$dl.d('_z_dl_d1')\">X关闭</span></div></div><div id='_z_dl_d2' style='right:10px;position:absolute;top:70px;' ><a href='"+dL_Ads_Url+"' target='_blank'  onclick='_zh_(event)' onmouseover='_zv_();_zn_(event);_zt_(event)' onmousedown='_zc_(event)'  onmouseup='_zc_(event)'><img border=0 src='"+dL_Img_url+"' height='"+dL_Height+"' width='"+dL_Width+"'></a><div style='background:none repeat scroll 0 0 #F0F0F0;border:1px solid #E1E1E1;height:15px;margin:0;padding:0;width:"+dL_Width+"px;text-align:right; ' onmouseover='this.style.color=\"#ff0000\";' onmouseout='this.style.color=\"#000\";'><span style='font-size:12px;cursor:pointer' onclick=\"$dl.d('_z_dl_d2')\">X关闭</span></div></div>";}
	else{
		f=$dl.f(dL_Img_url,'zyiis_1',dL_Width,dL_Height);
		H="<div style='cursor:pointer;z-index:100000;position:absolute;height:"+dL_Height+"px;width:"+dL_Width+"px;background-color:#fff;opacity:0.01;filter:alpha(opacity:1);left:10px;top:70px;'  id='_z_dl_d1' ><a target=_blank href='"+dL_Ads_Url+"' style='display:block;height:"+dL_Height+"px;width:"+dL_Width+"px;'  onclick='_zh_(event)' onmouseover='_zv_();_zn_(event);_zt_(event)' onmousedown='_zc_(event)'  onmouseup='_zc_(event)'></a></div><div id='_z_dl_d2' style='position:absolute;z-index:9999;left:10px;top:70px;cursor:pointer;' >"+f+"<div style='background:none repeat scroll 0 0 #F0F0F0;border:1px solid #E1E1E1;height:15px;margin:0;padding:0;width:"+dL_Width+"px;text-align:right; ' onmouseover='this.style.color=\"#ff0000\";' onmouseout='this.style.color=\"#000\";'><span style='font-size:12px;cursor:pointer' onclick=\"$dl.d('_z_dl_d1');$dl.d('_z_dl_d2')\">X关闭</span></div></div><div style='cursor:pointer;z-index:100000;position:absolute;height:"+dL_Height+"px;width:"+dL_Width+"px;background-color:#fff;opacity:0.01;filter:alpha(opacity:1);right:10px;top:70px;'  id='_z_dl_d3' ><a target=_blank href='"+dL_Ads_Url+"' style='display:block;height:"+dL_Height+"px;width:"+dL_Width+"px;'  onclick='_zh_(event)' onmouseover='_zv_();_zn_(event);_zt_(event)' onmousedown='_zc_(event)'  onmouseup='_zc_(event)'></a></div><div id='_z_dl_d4' style='position:absolute;z-index:9999;right:10px;top:70px;cursor:pointer;' >"+f+"<div style='background:none repeat scroll 0 0 #F0F0F0;border:1px solid #E1E1E1;height:15px;margin:0;padding:0;width:"+dL_Width+"px;text-align:right; ' onmouseover='this.style.color=\"#ff0000\";' onmouseout='this.style.color=\"#000\";'><span style='font-size:12px;cursor:pointer' onclick=\"$dl.d('_z_dl_d3');$dl.d('_z_dl_d4')\">X关闭</span></div></div>";
	 }
	 document.write(H);
	},
	b : function(){
	  a=document;
	  Z=a.documentElement.scrollTop||a.body.scrollTop;
	  $dl.c("_z_dl_d1").style.top=(Z+70)+"px";
	  $dl.c("_z_dl_d2").style.top=(Z+70)+"px";
	  if(this.dL_fileex=='.swf'){
	  $dl.c("_z_dl_d3").style.top=(Z+70)+"px";
	  $dl.c("_z_dl_d4").style.top=(Z+70)+"px";}
	},
    c:function (i){
		return  document.getElementById(i);
	},
	d:function (i){
		$dl.c(i).style.display='none';
	},
	f:function(u, i, w, h)
	{
		var str = '<embed src="'+u+'" type="application/x-shockwave-flash" height="'+h+'" width="'+w+'" id="'+i+'" name="ZyadsFlashAd" quality="high" wmode="opaque" allownetworking="none" allowscriptaccess="always" >';
		return str;
	}

}
$dl.a();
window.setInterval("$dl.b()",200);

 