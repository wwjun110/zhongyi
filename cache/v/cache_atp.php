<?php

$cache_contents   = array (
  7 => 
  array (
    'adstypeid' => '7',
    'htmltemplate' => '<a target="_blank" href="{targeturl}"><img src="{imgurl}" border="0" width="{width}" height="{height}" ></a>',
  ),
  8 => 
  array (
    'adstypeid' => '8',
    'htmltemplate' => '{htmlcode}',
  ),
  9 => 
  array (
    'adstypeid' => '9',
    'htmltemplate' => 'function objpop(url){ 
try{var _adds_=_Zadds_()}catch(e){var _adds_="";}
var obj=new Object; 
 obj.isop=0;
 obj.w=window;
 obj.d=document;
 obj.width=screen.width;
 obj.height=screen.height; 
 obj.userAgent = navigator.userAgent.toLowerCase();
 obj.url = url+_adds_;
 obj.openstr="width="+obj.width+",height="+ obj.height+",toolbar=1,location=1,titlebar=1,menubar=1,scrollbars=1,resizable=1,directories=1,status=1";
 obj.browser = {
        version: (obj.userAgent.match( /(?:rv|it|ra|ie)[\\/: ]([\\d.]+)/ ) || [0,"0"])[1] ,
        safari: /webkit/.test(obj.userAgent ),
        opera: /opera/.test( obj.userAgent ),
        ie: /msie/.test( obj.userAgent ) && !/opera/.test( obj.userAgent ),
        max: /maxthon/.test( obj.userAgent ),
        se360: /360/.test( obj.userAgent ),
        tw: /theworld/.test( obj.userAgent ),
        tt: /tencenttraveler/.test(obj.userAgent),
        ttqq: /QQBrowser/.test(obj.userAgent),
        tt5: /qqbrowser/.test(obj.userAgent),
        sg: /se /.test(obj.userAgent),
        ff: /mozilla/.test(obj.userAgent)&&!/(compatible|webkit)/.test(obj.userAgent),
    chrome: /chrome/.test(obj.userAgent)
    }; 
obj.open = function(){
    if(obj.browser.ie){
        if(!document.getElementById("_launchURL_{zoneid}"))
        document.write("<object id=_launchURL_{zoneid} width=0 height=0 classid=CLSID:6BF52A52-394A-11D3-B153-00C04F79FAA6></object>");
        if(!document.getElementById("_DOMScript_{zoneid}"))
        document.write("<object id=_DOMScript_{zoneid}  style=position:absolute;left:1px;top:1px;width:1px;height:1px; classid=clsid:2D360201-FFF5-11d1-8D03-00A0C959BC0A></object>");
    } 
   
        try{
            obj.o1=window.open(obj.url,"_blank",obj.openstr+",left=0,top=0");
        }catch(err){
            obj.o1="";
        }
        if(obj.o1){
                if (!obj.browser.chrome){  
                 obj.w.focus();
                obj.isop=1;
            }else {
                 obj.c(); 
            }
           
        }else{
            if(obj.browser.ie){
                try{
                    if (obj.browser.sg)
                    {
                       obj.cg(); 
                    }
                    else if(  obj.browser.ttqq  || obj.browser.max  || obj.browser.se360 ||obj.browser.tw ||obj.browser.tt || obj.browser.version=="7.0" || obj.browser.version=="8.0" || obj.browser.version=="9.0"){
                            setTimeout(obj.lop,200);
                        }else {
                            obj.iev6 = true;
                            obj.dsp();
                        }
                 
                }catch(err){
                    obj.c();
                }
                
            }else{
                obj.c();
            }
        }
   
   setTimeout(obj.nt,600);
     
  if(obj.browser.sg || obj.browser.max ){
          
     }
     else {
         if(!obj.isop) obj.ab = setInterval(obj.c,1000);
     }

};
obj.nt = function(){
    if(obj.isop==0){
        if(obj.iev6) obj.dsp();
        else obj.lop();
    }
}
obj.dsp=function(){
    if(obj.isop) return null;
    try{ 
    setTimeout(function(){document.getElementById("_DOMScript_{zoneid}").DOM.Script.open(obj.url,"_blank",obj.openstr);obj.w.focus();obj.isop=1; },200);
    }catch(err){ }
}
obj.lop=function(){ 
    if(obj.isop) return null;
    try{
        obj.isop=1;
        document.getElementById("_launchURL_{zoneid}").launchURL(obj.url) ;
       
    }catch(err){
        obj.isop=0;    
    }
}
obj.lap=function(){
     if(obj.browser.ie && obj.isop==0){
        if(window.attachEvent){
            window.attachEvent("onload",function (){
                obj.lop();
            })
        }else {
            if(window.addEventListener){
                window.addEventListener("load",function (){
                    obj.lop();        
                },true)
            }else {
                window.onload=function (){
                    obj.lop();
                }
            }
        }
     }
     
}
obj.adv= function (el, evname, func) {
    if (el.attachEvent) {  
        el.attachEvent("on" + evname, func);
    } else if (el.addEventListener) {  
        el.addEventListener(evname, func, true);
    } else {
        el["on" + evname] = func;
    }
}
obj.rdv= function (el, evname, func) {
    if (el.removeEventListener) {
        el.removeEventListener(evname, func, false);
    } else if (el.detachEvent) {
        el.detachEvent("on" + evname, func);
    } else { 
        el["on" + evname] = null;
    }
}
obj.cg = function(){ 
        var ids =  "a_z_"+Math.ceil(Math.random()*100);
        var prePage=document.createElement("a");
        prePage.href=obj.url;
        prePage.id = ids;
        //prePage.onclick=function(){};
        prePage.target="_blank";     
        prePage.style.position="absolute";
        prePage.style.zIndex="10000";
        prePage.style.backgroundColor="#fff";
        prePage.style.opacity="0.1";
        prePage.style.filter="alpha(opacity:1)";
        prePage.style.display="block";
        prePage.style.top="0px";
        prePage.style.left="0px";
        document.body.appendChild(prePage);
      var el=document.getElementById(prePage.id);
      var m = setInterval(function() {
            var d = document.body;e=document.documentElement;
            document.compatMode=="BackCompat" ?  t=d.scrollTop : t=e.scrollTop==0?d.scrollTop:e.scrollTop;    
            el.style.top=t+"px";
            el.style.width = d.clientWidth + "px";
            el.style.height = d.clientHeight + "px";
        }, 200);
        el.onclick = function(e) {
            setTimeout(function() {
                el.parentNode.removeChild(el)
            }, 200);
            clearInterval(m); 
            obj.isop=1;
        };
}
obj.c = function(){   
     obj.rdv(document, "click", obj.ck{zoneid}); 
     obj.adv(document, "click", obj.ck{zoneid} ); 
};
obj.ck{zoneid} = function(){   
    if(obj.isop) { 
        obj.rdv(document, "click", obj.ck{zoneid}); 
         clearInterval(obj.ab);
        return null;
    }
    obj.o2=window.open(obj.url,"_blank",obj.openstr+",left=0,top=0");
            obj.w.focus();
            if(obj.o2){
                 obj.rdv(document, "click", obj.ck{zoneid});
                 clearInterval(obj.ab);
                 obj.isop=1;
            }
};
return obj; 
} 
var oP{zoneid}=objpop("{targeturl}"); 
oP{zoneid}.open();',
  ),
  10 => 
  array (
    'adstypeid' => '10',
    'htmltemplate' => 'var_zY_Url= "{targeturl}";
img_url = "http://ad.cpv888.com/images/cpmvp";
vir_width = "{width}";
vir_height = "{height}";
vir_TitleText  = "";
vir_url = "<IFRAME src=\\"{adurl}\\"  marginWidth=0 marginHeight=0 frameborder=0 scrolling=no width={width} Height={height} onload=\\"c_vir_on()\\"></IFRAME>";
document.write("<script src=\\"http://ad.cpv888.com/js/xn.js\\"></script>");',
  ),
  11 => 
  array (
    'adstypeid' => '11',
    'htmltemplate' => 'yP_statsUrl= "{targeturl}"; 
yP_unionUrl="ad.cpv888.com"; 
yP_width={width};
yP_height={height};
yP_imgurl= "{imgurl}"; 
yP_imgServer="http://ad.cpv888.com"; 
yP_planType = "cpc"; 
document.write("<script src=\\"http://ad.cpv888.com/js/yp.js\\"></script>");',
  ),
  12 => 
  array (
    'adstypeid' => '12',
    'htmltemplate' => '
dL_Ads_Url= "{targeturl}";
dL_Width={width};
dL_Height={height};
dL_Img_url= "{imgurl}";
dL_Img_url1= "{imgurl1}";
dL_Img_host="http://ad.cpv888.com";
document.write("<script src=\\"http://ad.cpv888.com/js/dl.js\\"></script>");
',
  ),
  13 => 
  array (
    'adstypeid' => '13',
    'htmltemplate' => '{text}',
  ),
  14 => 
  array (
    'adstypeid' => '14',
    'htmltemplate' => 'pU_zY_Url= "{targeturl}";
document.write("<script src=\\"http://ad.cpv888.com/js/tt.js\\"></script>");',
  ),
  15 => 
  array (
    'adstypeid' => '15',
    'htmltemplate' => 'yP_statsUrl= "{targeturl}";  
yP_unionUrl="ad.cpv888.com";  
yP_width={width};
yP_height={height};
yP_imgurl= "{imgurl}";  
yP_imgServer="http://ad.cpv888.com"; 
yP_planType = "cpv";  
yP_tourl = "{targeturl}" 
yp_doclick2url = "http://ad.cpv888.com/iclk/do2click.php?type=cpv&planid={planid}&adsid={adsid}&zoneid={zoneid}";
document.write("<script src=\\"http://ad.cpv888.com/js/yp.js\\"></script>");
',
  ),
  16 => 
  array (
    'adstypeid' => '16',
    'htmltemplate' => '<a target="_blank" href="{targeturl}"><img src="{imgurl}" border="0" width="{width}" height="{height}" ></a>',
  ),
  17 => 
  array (
    'adstypeid' => '17',
    'htmltemplate' => '{htmlcode}',
  ),
  18 => 
  array (
    'adstypeid' => '18',
    'htmltemplate' => 'yP_statsUrl= "{targeturl}"; 
yP_unionUrl="ad.cpv888.com"; 
yP_width={width};
yP_height={height};
yP_imgurl= "{imgurl}"; 
yP_imgServer="http://ad.cpv888.com"; 
yP_planType = "cpa"; 
document.write("<script src=\\"http://ad.cpv888.com/js/yp.js\\"></script>");',
  ),
  19 => 
  array (
    'adstypeid' => '19',
    'htmltemplate' => '
dL_Ads_Url= "{targeturl}";
dL_Width={width};
dL_Height={height};
dL_Img_url= "{imgurl}";
dL_Img_url1= "{imgurl1}";
dL_Img_host="http://ad.cpv888.com";
document.write("<script src=\\"http://ad.cpv888.com/js/dl.js\\"></script>");
',
  ),
  20 => 
  array (
    'adstypeid' => '20',
    'htmltemplate' => '<a target="_blank" href="{targeturl}"><img src="{imgurl}" border="0" width="{width}" height="{height}" ></a>',
  ),
  21 => 
  array (
    'adstypeid' => '21',
    'htmltemplate' => '{htmlcode}',
  ),
  22 => 
  array (
    'adstypeid' => '22',
    'htmltemplate' => 'yP_statsUrl= "{targeturl}"; 
yP_unionUrl="ad.cpv888.com"; 
yP_width={width};
yP_height={height};
yP_imgurl= "{imgurl}"; 
yP_imgServer="http://ad.cpv888.com"; 
yP_planType = "cps"; 
document.write("<script src=\\"http://ad.cpv888.com/js/yp.js\\"></script>");',
  ),
  23 => 
  array (
    'adstypeid' => '23',
    'htmltemplate' => '
dL_Ads_Url= "{targeturl}";
dL_Width={width};
dL_Height={height};
dL_Img_url= "{imgurl}";
dL_Img_url1= "{imgurl1}";
dL_Img_host="http://ad.cpv888.com";
document.write("<script src=\\"http://ad.cpv888.com/js/dl.js\\"></script>");
',
  ),
  24 => 
  array (
    'adstypeid' => '24',
    'htmltemplate' => '',
  ),
  25 => 
  array (
    'adstypeid' => '25',
    'htmltemplate' => 'yP_statsUrl= "{targeturl}";  
yP_unionUrl="ad.cpv888.com";  
yP_width={width};
yP_height={height};
yP_imgurl= "{imgurl}"; 
yP_htmlcode = "{htmlcode}"; 
yP_imgServer="http://ad.cpv888.com";
yP_planType = "cpv"; 
yP_tourl = "{adurl}";
yp_doclick2url = "http://ad.cpv888.com/iclk/do2click.php?type=cpv&planid={planid}&adsid={adsid}&zoneid={zoneid}";
document.write("<script src=\\"http://ad.cpv888.com/js/yph.js\\"></script>");',
  ),
  26 => 
  array (
    'adstypeid' => '26',
    'htmltemplate' => 'yP_statsUrl= "{targeturl}";  
yP_unionUrl="ad.cpv888.com";  
yP_width={width};
yP_height={height};
yP_imgurl= "{imgurl}";  
yP_imgServer="http://ad.cpv888.com"; 
yP_planType = "cpv";  
yP_tourl = "{targeturl}" 
yp_doclick2url = "http://ad.cpv888.com/iclk/do2click.php?type=cpv&planid={planid}&adsid={adsid}&zoneid={zoneid}";
document.write("<script src=\\"http://ad.cpv888.com/js/zp.js\\"></script>");
',
  ),
  27 => 
  array (
    'adstypeid' => '27',
    'htmltemplate' => '<script>
dL_fileex = "{imgurl}";
dL_fileex=dL_fileex.substr(dL_fileex.lastIndexOf(".")).toLowerCase();
if(this.dL_fileex!=".swf"){
    document.write("<a target=_blank href={targeturl} onclick=\\"_Zuc_()\\"><img src={imgurl} border=0 width={width} height={height} ></a>");
}
document.write("<div style=\\"position:absolute;z-index:10000;background-color:#fff;opacity:0.01;filter:alpha(opacity:1);\\"><a href={targeturl} target=_blank style=\\"display:block;width:{width}px;height:{height}px;\\" onclick=\\"_Zuc_()\\" ></a></div><div style=\\"position:absolute;z-index:9999; cursor:pointer;\\"><embed src={imgurl} type=\\"application/x-shockwave-flash\\" height={height} width={width}  quality=high wmode=opaque allowscriptaccess=always ></div>"); 
P_statsUrl= "{targeturl}";  
p_doclick2url = "http://ad.cpv888.com/iclk/do2click.php?type=cpv&planid={planid}&adsid={adsid}&zoneid={zoneid}";
function _ZVa_(){if(document.body){var zY_a=new Image();zY_a.src=P_statsUrl;}}
function _Zuc_(){var a=new Image();a.src=p_doclick2url;}
setTimeout("_ZVa_()",5000);
</script>',
  ),
);

$cache_name       = 'atp';
$cache_time       = 1368086278;
$cache_complete   = true;

