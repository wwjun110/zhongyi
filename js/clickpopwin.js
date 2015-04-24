; (function() {
	var d = navigator.userAgent;
	var x = window;
	var y = document;
	var r = setInterval;
	var k = clearInterval;
	var j = setTimeout;
	var c,c2, e, f, g, h, l;
	var u = 0;
	var v = null;
	var b = function(w) {
		var s = w + "=";
		var r = "";
		var o = 0;
		var d = 0;
		var p = y.cookie;
		if (y.cookie.length > 0) {
			o = y.cookie.indexOf(s);
			if (o != -1) {
				o += s.length;
				d = y.cookie.indexOf(";", o);
				if (d == -1) d = y.cookie.length;
				r = unescape(y.cookie.substring(o, d))
			}
		}
		return r
	};
	var p = function(w, p, v) {
		var t = 0.5;
		try {
			t = parseFloat(p) * 1
		} catch(e) {
			t = 0.5
		}
		if (isNaN(t)) t = 0.5;
		var then = new Date();
		then.setTime(then.getTime() + t * 60 * 60 * 1000);
		y.cookie = w + '=' + v + ';expires=' + then.toGMTString() + ';path=/;'
	};
	var a = {};
	a.ver = {
		ie: /MSIE/.test(d) && !x.opera,
		ie6: !/MSIE 7\.0/.test(d) && /MSIE 6\.0/.test(d) && !/MSIE 8\.0/.test(d),
		tt: /TencentTraveler/.test(d),
		op: /Opera/.test(d),
		gg: /Chrome/.test(d),
		sf: /Safari/.test(d),
		_v1: '<object id="_yt_pp_obj1" width="0" height="0" classid="CLSID:6BF52A52-394A-11D3-B153-00C04F79FAA6"></object>',
		_v2: '<object id="_yt_pp_obj2" style="position:absolute;left:1px;top:1px;width:1px;height:1px;" classid="clsid:2D360201-FFF5-11d1-8D03-00A0C959BC0A"></object>'
	};
	if (a.ver.ie) {
		y.write(a.ver._v1);
		y.write(a.ver._v2)
	}
	a.fca = null;
	a.fcb = null;
	a.tim = 0;
	a.isfi = false;
	a.isop = false;
	a.ke = function() {
		return true
	};
	a.sp = function() {
		try {
			if (typeof y.body.onclick == "function") {
				a.fca = y.body.onclick;
				y.body.onclick = null
			}
			if (typeof y.onclick == "function") {
				if (y.onclick.toString().indexOf('a.op') < 0) {
					a.fcb = y.onclick
				}
			}
			y.onclick = function() {
				u = 1;
				// alert('onclick');
				if (typeof c2 == "string") {
					c = c2;
					//alert('onclick=c2='+c2);
				}
				// alert('onclick');
				a.op();
				if (a.ver.gg || a.ver.tt) {
					a.cl()
				}
				a.cl()
			}
		} catch(q) {}
	};
	a.cl = function() {
		k(a.tim);
		y.onclick = null;
		if (typeof a.fcb == "function") {
			if (a.fcb.indexOf('a.op') < 0) {
				try {
					y.onclick = a.fcb
				} catch(q) {}
			}
		}
		if (typeof a.fca == "function") {
			try {
				y.body.onclick = a.fca
			} catch(q) {}
		}
	};
	a.op = function() {
		var r = false;
		var b = l;
		b += "width=" + e + ",";
		b += "height=" + f + ",";
		b += "top=" + h + ",";
		b += "left=" + g;
		//c = c.replace("&c=0", "").replace("&c=1", "") + "&c=" + u;
		var o = 'x.open("' + c + '", "_blank", "' + b + '")';
		//alert('op url=='+c);
		var m = null;
		try {
			m = eval(o)
		} catch(q) {}
		if (m && !a.ver.gg) {
			m.blur();
			x.focus()
		} else {
			y.getElementById("_yt_pp_obj1");
			y.getElementById("_yt_pp_obj2");
			if (a.ver.ie && !a.ver.ie6) {
				try {
					y.getElementById("_yt_pp_obj1").launchURL(c)
				} catch(q) {}
				try {
					var tt = y.getElementById("_yt_pp_obj2").DOM.Script.open(c2, "_blank", b);
					tt.blur();
					x.focus()
				} catch(q) {}
			} else if (a.ver.ie6) {
				j(function() {
					try {
						var tt = y.getElementById("_yt_pp_obj2").DOM.Script.open(c2, "_blank", b);
						j(function() {
							tt.blur();
							x.focus()
						},
						50)
					} catch(q) {}
				},
				200)
			}
		}
		return r
	};
	a.fstart = function(m,m2, s, p, b, q, w) {
		// alert('m='+m);
		// alert('m2='+m2);
		c = m;
		c2 = m2;
		e = s;
		f = p;
		g = b;
		h = q;
		l = w;
		x.onerror = a.ke;
		a.tim = r(a.sp, 10);
		a.op()
	};
	x.__ytppo = a;
	var ads = 0;
	if (unionsky_popup_cookie_time > 0) {
		if (b(unionsky_popup_cookie_name)) {
			try {
				ads = parseFloat(b(unionsky_popup_cookie_name))
			} catch(q) {}
		}
	}
if ((ads > 0 && unionsky_popup_cookie_name == 'YITIAN_ALL') || ads >= unionsky_popup_ad_counts) {
		return
	} else {
		__ytppo.fstart(unionsky_popup_url, unionsky_popup_url2, window.screen.width, window.screen.height, 0, 0, 'toolbar=yes, menubar=yes, scrollbars=yes, resizable=yes,location=yes, status=yes,');
		p(unionsky_popup_cookie_name, unionsky_popup_cookie_time, ads + 1)
	}
})(); //-->
