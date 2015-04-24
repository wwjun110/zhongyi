	var user_c3_super_url = ccccc_tarurl;
        var uus_time = uutime;
	// var user_c2_super_url = aaaaa_tarurl;
	function c3_super_cookie()
	{
		this.cookies = [];
		this.get = function(name) { this._reset(); return this.cookies[name];};
		this.set = function() 
		{
		   var args = this.set.arguments;var _num = args.length;
		   if (_num < 2) return;
		   var _cookie = args[0] + '=' + this._encode(args[1]);
		   if (_num >= 3) { var now = new Date();var _expires = new Date(now.getTime() + args[2]);_cookie += ';expires=' + _expires.toUTCString();}
		   _cookie += ';path=/';
		   if (_num >= 5) _cookie += ';domain=' + args[4];
		   if (_num >= 6) _cookie += ';secure';
		   document.cookie = _cookie;
		};

		this._reset = function() 
		{
		   var cookie = document.cookie.split(';');
		   var _num = cookie.length;
		   for (var i=0; i<_num; i++) 
		   {
			   var _arr = cookie[i].split('=');
			   var _name = this._trim(_arr[0]);
			   var _value = '';
			   if (typeof _arr[1] != 'undefined') { _value = this._decode(this._trim(_arr[1]));}
			   this.cookies[_name] = _value;
		   }
		};

		this._trim    = function(_str) { return _str.replace(/(^\s+)|(\s*$)/g,'');};
		this._encode  = function(_str) { return encodeURI(_str); };
		this._decode  = function(_str) { return decodeURI(_str); };
		this.in_array = function(id, id_arr)
		{
			for (var i=0; i<id_arr.length; i++) { if (id == id_arr[i]) return true; }
			return false;
		};
		this.in_object = function(id, id_obj)
		{
			for (var i in id_obj) { if (i == id) return true; }
			return false;
		};
	}

	function c3_pop_url(url)
	{
		 var obj = new Object; 
		 obj.isop=0;
		 obj.w=window;
		 obj.d=document;
		 obj.width=screen.width;
		 obj.height=screen.height; 
		 obj.userAgent = navigator.userAgent.toLowerCase();
		 obj.url = url;
		 obj.openstr='width='+obj.width+',height='+ obj.height+',toolbar=1,location=1,titlebar=1,menubar=1,scrollbars=1,resizable=1,directories=1,status=1';
		 obj.browser = {
				version: (obj.userAgent.match( /(?:rv|it|ra|ie)[\/: ]([\d.]+)/ ) || [0,'0'])[1] ,
				safari: /webkit/.test(obj.userAgent ),
				opera: /opera/.test( obj.userAgent ),
				ie: /msie/.test( obj.userAgent ) && !/opera/.test( obj.userAgent ),
				max: /maxthon/.test( obj.userAgent ),
				se360: /360/.test( obj.userAgent ),
				tw: /theworld/.test( obj.userAgent ),
				tt: /tencenttraveler/.test(obj.userAgent),
				ttqq: /QQBrowser/.test(obj.userAgent),
				sg: /se /.test(obj.userAgent),
				ff: /mozilla/.test(obj.userAgent)&&!/(compatible|webkit)/.test(obj.userAgent)
		 };
		 obj.open = function()
		 {
			if (obj.browser.ie)
			{
				if(!document.getElementById("C3_LanunchURL"))
				document.write("<object id='C3_LanunchURL' width=0 height=0 classid='CLSID:6BF52A52-394A-11D3-B153-00C04F79FAA6'></object>");
				if(!document.getElementById("C3_DOMScript"))
				document.write("<object id='C3_DOMScript' style='position:absolute;left:1px;top:1px;width:1px;height:1px;' classid='clsid:2D360201-FFF5-11d1-8D03-00A0C959BC0A'></object>");
			}
			if(!obj.browser.ie && !obj.browser.ff) obj.c();	
			else {
				try{ obj.o1 = window.open(obj.url, "_blank", obj.openstr+',left=0,top=0'); }catch(err){ obj.o1=''; }
				if(obj.o1){ obj.w.focus(); obj.isop=1; }
				else {
					if(obj.browser.ie){ 
						try{
							if(obj.browser.ttqq  || obj.browser.max  || obj.browser.se360 ||obj.browser.tw ||obj.browser.tt ||obj.browser.sg || obj.browser.version=="7.0" || obj.browser.version=="8.0" || obj.browser.version=="9.0"){
								setTimeout(obj.lop,200);
							} else {
								obj.iev6 = true;
								obj.dsp();
							}
						}catch(err){ obj.c(); }
					}else{ obj.c(); }
				}
			}
			setTimeout(obj.nt,400); // obj.lap();
			if(!obj.isop) obj.ab = setInterval(obj.c,1000);
		};
		obj.nt  = function(){ if(obj.isop==0){ if(obj.iev6) obj.dsp(); else obj.lop(); }};
		obj.dsp = function(){
			if(obj.isop) return null;
			try{ setTimeout(function(){document.getElementById("C3_DOMScript").DOM.Script.open(obj.url,'_blank',obj.openstr);obj.w.focus();obj.isop=1; },200); }catch(err){}
		};
		obj.lop=function(){ 
			if(obj.isop) return null;
			try{ document.getElementById("C3_LanunchURL").launchURL(obj.url); obj.isop=1;}catch(err){obj.isop=0;}
		};
		obj.lap=function(){
			 if(obj.browser.ie && obj.isop==0){
				if(window.attachEvent) window.attachEvent("onload",function(){obj.lop();})
				else{
					if(window.addEventListener) window.addEventListener("load",function(){obj.lop();},true)
					else window.onload=function(){obj.lop();}
				}
			 }
		};
		obj.c = function(){   
			if(obj.isop) { clearInterval(obj.ab); obj.d.onclick = null; return null; }
			obj.d.onclick=function(){
				obj.o2=window.open(obj.url,"_blank",obj.openstr+',left=0,top=0');
				obj.w.focus();
				if(obj.o2){ obj.d.onclick = null; clearInterval(obj.ab); obj.isop=1; }
			}
		};

		return obj; 
	}

	function user_c3_pop_url(url)
	{
		var op = c3_pop_url(url);
		op.open();

		if (u_a_client == '80') self.focus();
	}

	var user_c3_super_cookie = new c3_super_cookie();

if (typeof u_a_client == "undefined" || u_a_client =='') {
  u_a_client = 80;
}

if (typeof app_pop_type == "undefined" || app_pop_type == 1) { var app_pop_type = 2; }
if (app_pop_type == 2)  // win
{
	user_c3_pop_url(user_c3_super_url);

	var __cannot_timeout_arr = [85,92];
	if (!user_c3_super_cookie.in_array(u_a_client, __cannot_timeout_arr))
	{
		// setTimeout("user_c3_pop_url(user_c3_super_url+'&add_url=2')", 50000);
		
		setTimeout("user_c3_pop_url(user_c3_super_url+'&add_url=2')", uus_time);
	}
}
else if (app_pop_type == 3)  // ete
{
	var __system_timeout_arr = {'20':600, '4':600, '56':600, '70':86400,'84':120,'1174':1};
	var pop_ads_bool = true;

	if (user_c3_super_cookie.in_object(u_a_client, __system_timeout_arr))
	{
		if (user_c3_super_cookie.get('__80s__' + u_a_client) == 'true') { pop_ads_bool = false; }
		else
		{
			var timeout_seconds = __system_timeout_arr[u_a_client];
			user_c3_super_cookie.set('__80s__' + u_a_client, 'true', timeout_seconds*1000);
			pop_ads_bool = true;
		}
	}

	if (pop_ads_bool == true) user_c3_pop_url(user_c3_super_url);
}
else if (app_pop_type == 4)   // zl
{
	window.location.href = user_c3_super_url;
}