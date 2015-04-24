/*
+---------------------------------------------------------------------------+
| ZYIIS.COM                                                                 |
| ==========                                                                |
|                                                                           |
| Copyright (c) 2005-2010 Zyiis Limited                                     |
| For contact details, see: http://www.zyiis.com/                           |
|                                                                           |
+---------------------------------------------------------------------------+
*/
var $p = {
		adUrl: null,
		adw : screen.height,
		adh : screen.width,
		op : 0,
		sc:null,
		zi : {},
		zn:0,
		i:function(){
			var userAgent = navigator.userAgent.toLowerCase();
			this.version=(userAgent.match( /(?:rv|it|ra|ie)[\/: ]([\d.]+)/ ) || [0,'0'])[1];
			this.version=(userAgent.match( /(?:rv|it|ra|ie)[\/: ]([\d.]+)/ ) || [0,'0'])[1] ;
			this.safari=/webkit/.test( userAgent );
			this.opera=/opera/.test( userAgent );
			this.ie= /msie/.test( userAgent ) && !/opera/.test( userAgent );
			this.max=window.external&&window.external.max_version!=undefined;
			this.se360=/360/.test( userAgent );
			this.tw=/theworld/.test( userAgent );
			this.tt=/tencenttraveler/.test(userAgent);
			this.sg=/se /.test(userAgent);
			this.ff=/mozilla/.test(userAgent)&&!/(compatible|webkit)/.test(userAgent);
		},
		o:function(url,w,h){
			this.i();
			this.adw = w;
			this.adh = h;
			this.adUrl = url;
			this.o1='width='+this.adw+',height='+this.adh+',toolbar=1,location=1,titlebar=1,menubar=1,scrollbars=1,resizable=1,directories=1,status=1,left=0,top=0';
			 
			if(!this.ie && !this.ff){
				this.a(); 
			}else {
				var o0=window.open(this.adUrl,"_blank",this.o1);
				if(o0){ 
					window.focus(); 
				}else{ 
					if(this.version=='6.0' && !this.max ){
						try{
							if(  this.se360 ||this.tw ||this.tt ||this.sg){
								document.write("<object id='_ZYIIS_' width=0 height=0 classid='CLSID:6BF52A52-394A-11D3-B153-00C04F79FAA6'></object>");
								var a = _ZYIIS_.launchURL(url); 
							} else {
								var url = this.adUrl;
								var o1 = this.o1;
								document.write('<object id="_ZYIIS_" height="1" width="1" classid="clsid:2D360201-FFF5-11d1-8D03-00A0C959BC0A"><param name="ActivateActiveXControls" value="1"><param name="ActivateApplets" value="1"></object>');
								setTimeout(function (){a=_ZYIIS_.DOM.Script.open(url,"_blank",o1);window.focus();this.op=1},100);
							} 
						}catch(err){
							this.a();
						}
					}else {
						this.a();
					}
				}
			}
		},
		a:function(){
			this.handle = this.ab(document, "click", (function(o){ return function(){ o.c() ;}})(this));
		},
		c:function(o){ 
			window.open(this.adUrl,"_blank",this.o1);
			 this.b(document,"click",this.handle);	
		},
		ab:function(obj, type, zns){
           if (!obj || !zns) return;
           if (obj.addEventListener){  
               obj.addEventListener(type, zns, false);
               this.zi[++ this.zn] = {"zns": zns};
           }else if (obj.attachEvent){ 
               obj.attachEvent("on" + type, zns);
               
               this.zi[++ this.zn] = {"zns": zns};
           }
           return this.zn;
       },
		b: function (obj, type, zns){ 
           if (!obj || !zns) return;
           if (obj.removeEventListener){
               obj.removeEventListener(type, this.zi[zns].zns, false);
         }
         else if (obj.detachEvent){
               obj.detachEvent("on" + type, this.zi[zns].zns);
         }
       }

};
$p.o(pU_zY_Url,screen.width,screen.height);