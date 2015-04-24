DROP TABLE IF EXISTS `zyads_acls`;
CREATE TABLE `zyads_acls` (
  `planid` mediumint(8) NOT NULL,
  `type` varchar(16) NOT NULL,
  `data` mediumtext NOT NULL,
  `comparison` varchar(10) NOT NULL,
  KEY `planid` (`planid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;


DROP TABLE IF EXISTS `zyads_admin`;
CREATE TABLE `zyads_admin` (
  `id` mediumint(8) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL DEFAULT '',
  `password` char(32) NOT NULL,
  `usertype` tinyint(1) NOT NULL DEFAULT '0',
  `userinfo` varchar(200) NOT NULL,
  `loginnum` mediumint(8) NOT NULL DEFAULT '0',
  `logintime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `loginip` char(15) NOT NULL,
  `adminaction` mediumtext NOT NULL,
  `addtime` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `username` (`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=1 ;



DROP TABLE IF EXISTS `zyads_adminlog`;
CREATE TABLE `zyads_adminlog` (
  `logid` mediumint(8) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `ip` char(15) NOT NULL,
  `model` varchar(100) NOT NULL,
  `type` varchar(255) NOT NULL,
  `content` mediumtext NOT NULL,
  `day` date NOT NULL,
  `addtime` datetime NOT NULL,
  PRIMARY KEY (`logid`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=1 ;



DROP TABLE IF EXISTS `zyads_ads`;
CREATE TABLE `zyads_ads` (
  `adsid` mediumint(9) NOT NULL AUTO_INCREMENT,
  `planid` mediumint(8) NOT NULL DEFAULT '0',
  `uid` mediumint(9) NOT NULL DEFAULT '0',
  `adinfo` varchar(100) DEFAULT NULL,
  `adstype` varchar(10) NOT NULL,
  `adstypeid` mediumint(8) NOT NULL,
  `imageurl` varchar(255) DEFAULT NULL,
  `imageurl1` varchar(255) DEFAULT NULL,
  `alt` varchar(255) DEFAULT NULL,
  `url` text NOT NULL,
  `width` smallint(6) NOT NULL DEFAULT '0',
  `height` smallint(6) NOT NULL DEFAULT '0',
  `headline` varchar(40) DEFAULT NULL,
  `description` varchar(120) DEFAULT NULL,
  `dispurl` varchar(255) DEFAULT NULL,
  `htmlcode` mediumtext,
  `htmltype` char(2) DEFAULT NULL,
  `addtime` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `denyinfo` varchar(255) DEFAULT NULL,
  `priority` tinyint(3) NOT NULL DEFAULT '1',
  `mark` tinyint(1) NOT NULL DEFAULT '0',
  `zlink` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`adsid`),
  KEY `planid` (`planid`),
  KEY `status` (`status`),
  KEY `width` (`width`),
  KEY `height` (`height`),
  KEY `adstypeid` (`adstypeid`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=1 ;



DROP TABLE IF EXISTS `zyads_adsip1`;
CREATE TABLE `zyads_adsip1` (
  `uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `advuid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `adsid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `planid` mediumint(8) unsigned DEFAULT '0',
  `zoneid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `siteid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `adstypeid` mediumint(8) unsigned NOT NULL,
  `ip` int(10) unsigned NOT NULL,
  `clicktime` int(11) unsigned NOT NULL,
  `ipinfoid` int(11) unsigned NOT NULL,
  UNIQUE KEY `pi_id` (`ip`,`planid`),
  KEY `ip` (`ip`),
  KEY `uid` (`uid`),
  KEY `adsid` (`adsid`),
  KEY `clicktime` (`clicktime`),
  KEY `adstypeid` (`adstypeid`),
  KEY `planid` (`planid`),
  KEY `siteid` (`siteid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;



DROP TABLE IF EXISTS `zyads_adsipinfo1`;
CREATE TABLE `zyads_adsipinfo1` (
  `ipinfoid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `refererid` int(10) unsigned NOT NULL,
  `siteurlid` int(10) unsigned NOT NULL,
  `useragentid` mediumint(8) unsigned NOT NULL,
  `viewtime` int(11) unsigned NOT NULL DEFAULT '0',
  `deduction` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `clicks` int(11) unsigned NOT NULL DEFAULT '0',
  `scrollh` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `plugins` varchar(50) DEFAULT NULL,
  `screen` varchar(15) DEFAULT NULL,
  `price` varchar(9) DEFAULT NULL,
  `priceadv` varchar(9) DEFAULT NULL,
  `xx` varchar(50) DEFAULT NULL,
  `yy` varchar(50) DEFAULT NULL,
  `x` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `y` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `n` mediumint(9) unsigned NOT NULL DEFAULT '0',
  `g` mediumint(9) unsigned NOT NULL DEFAULT '0',
  `t` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`ipinfoid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk AUTO_INCREMENT=1 ;



DROP TABLE IF EXISTS `zyads_adsipreferer0`;
CREATE TABLE `zyads_adsipreferer0` (
  `referer` varchar(1000) DEFAULT NULL,
  `refererid` int(10) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`refererid`),
  KEY `referer` (`referer`(500))
) ENGINE=MyISAM DEFAULT CHARSET=gbk AUTO_INCREMENT=1 ;



DROP TABLE IF EXISTS `zyads_adsipsiteurl0`;
CREATE TABLE `zyads_adsipsiteurl0` (
  `siteurl` varchar(1000) DEFAULT NULL,
  `siteurlid` int(10) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`siteurlid`),
  KEY `siteurl` (`siteurl`(500))
) ENGINE=MyISAM DEFAULT CHARSET=gbk AUTO_INCREMENT=1 ;



DROP TABLE IF EXISTS `zyads_adsipuseragent0`;
CREATE TABLE `zyads_adsipuseragent0` (
  `useragent` varchar(1000) DEFAULT NULL,
  `useragentid` int(10) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`useragentid`),
  KEY `useragent` (`useragent`(500))
) ENGINE=MyISAM DEFAULT CHARSET=gbk AUTO_INCREMENT=1 ;



DROP TABLE IF EXISTS `zyads_adstype`;
CREATE TABLE `zyads_adstype` (
  `adstypeid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `parentid` tinyint(3) NOT NULL,
  `adstype` varchar(10) NOT NULL,
  `plantype` varchar(50) NOT NULL,
  `name` varchar(20) NOT NULL,
  `framework` char(6) NOT NULL DEFAULT 'Iframe',
  `htmlcontrol` varchar(255) NOT NULL,
  `htmltemplate` mediumtext NOT NULL,
  `info` mediumtext,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `addtime` datetime NOT NULL,
  PRIMARY KEY (`adstypeid`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=100 ;



INSERT INTO `zyads_adstype` (`adstypeid`, `parentid`, `adstype`, `plantype`, `name`, `framework`, `htmlcontrol`, `htmltemplate`, `info`, `status`, `addtime`) VALUES
(1, 0, '', 'cpc', '点击', 'null', '', '', NULL, 1, '0000-00-00 00:00:00'),
(2, 0, '', 'cpm', '弹窗', 'null', '', '', NULL, 1, '0000-00-00 00:00:00'),
(3, 0, '', 'cpa', '注册', 'null', '', '', NULL, 1, '0000-00-00 00:00:00'),
(4, 0, '', 'cps', '销售', 'null', '', '', NULL, 1, '0000-00-00 00:00:00'),
(5, 0, '', 'cpv', '展示', 'null', '', '', NULL, 1, '0000-00-00 00:00:00'),
(7, 1, '', 'cpc', '普通图片/Flash', 'iframe', 'a:4:{i:0;s:3:"url";i:1;s:8:"imageurl";i:2;s:5:"width";i:3;s:6:"height";}', '<a target="_blank" href="{targeturl}"><img src="{imgurl}" border="0" width="{width}" height="{height}" ></a>', '', 1, '2010-04-02 00:23:45'),
(8, 1, '', 'cpc', '网摘广告', 'iframe', 'a:3:{i:0;s:5:"width";i:1;s:6:"height";i:2;s:8:"htmlcode";}', '{htmlcode}', '', 1, '2010-04-02 00:52:14'),
(9, 2, '', 'cpm', '普通弹窗', 'script', 'a:1:{i:0;s:3:"url";}', 'function objpop(url){ \r\ntry{var _adds_=_Zadds_()}catch(e){var _adds_="";}\r\nvar obj=new Object; \r\n obj.isop=0;\r\n obj.w=window;\r\n obj.d=document;\r\n obj.width=screen.width;\r\n obj.height=screen.height; \r\n obj.userAgent = navigator.userAgent.toLowerCase();\r\n obj.url = url+_adds_;\r\n obj.openstr="width="+obj.width+",height="+ obj.height+",toolbar=1,location=1,titlebar=1,menubar=1,scrollbars=1,resizable=1,directories=1,status=1";\r\n obj.browser = {\r\n        version: (obj.userAgent.match( /(?:rv|it|ra|ie)[\\/: ]([\\d.]+)/ ) || [0,"0"])[1] ,\r\n        safari: /webkit/.test(obj.userAgent ),\r\n        opera: /opera/.test( obj.userAgent ),\r\n        ie: /msie/.test( obj.userAgent ) && !/opera/.test( obj.userAgent ),\r\n        max: /maxthon/.test( obj.userAgent ),\r\n        se360: /360/.test( obj.userAgent ),\r\n        tw: /theworld/.test( obj.userAgent ),\r\n        tt: /tencenttraveler/.test(obj.userAgent),\r\n        ttqq: /QQBrowser/.test(obj.userAgent),\r\n        tt5: /qqbrowser/.test(obj.userAgent),\r\n        sg: /se /.test(obj.userAgent),\r\n        ff: /mozilla/.test(obj.userAgent)&&!/(compatible|webkit)/.test(obj.userAgent),\r\n    chrome: /chrome/.test(obj.userAgent)\r\n    }; \r\nobj.open = function(){\r\n    if(obj.browser.ie){\r\n        if(!document.getElementById("_launchURL_{zoneid}"))\r\n        document.write("<object id=_launchURL_{zoneid} width=0 height=0 classid=CLSID:6BF52A52-394A-11D3-B153-00C04F79FAA6></object>");\r\n        if(!document.getElementById("_DOMScript_{zoneid}"))\r\n        document.write("<object id=_DOMScript_{zoneid}  style=position:absolute;left:1px;top:1px;width:1px;height:1px; classid=clsid:2D360201-FFF5-11d1-8D03-00A0C959BC0A></object>");\r\n    } \r\n   \r\n        try{\r\n            obj.o1=window.open(obj.url,"_blank",obj.openstr+",left=0,top=0");\r\n        }catch(err){\r\n            obj.o1="";\r\n        }\r\n        if(obj.o1){\r\n                if (!obj.browser.chrome){  \r\n                 obj.w.focus();\r\n                obj.isop=1;\r\n            }else {\r\n                 obj.c(); \r\n            }\r\n           \r\n        }else{\r\n            if(obj.browser.ie){\r\n                try{\r\n                    if (obj.browser.sg)\r\n                    {\r\n                       obj.cg(); \r\n                    }\r\n                    else if(  obj.browser.ttqq  || obj.browser.max  || obj.browser.se360 ||obj.browser.tw ||obj.browser.tt || obj.browser.version=="7.0" || obj.browser.version=="8.0" || obj.browser.version=="9.0"){\r\n                            setTimeout(obj.lop,200);\r\n                        }else {\r\n                            obj.iev6 = true;\r\n                            obj.dsp();\r\n                        }\r\n                 \r\n                }catch(err){\r\n                    obj.c();\r\n                }\r\n                \r\n            }else{\r\n                obj.c();\r\n            }\r\n        }\r\n   \r\n   setTimeout(obj.nt,600);\r\n     \r\n  if(obj.browser.sg || obj.browser.max ){\r\n          \r\n     }\r\n     else {\r\n         if(!obj.isop) obj.ab = setInterval(obj.c,1000);\r\n     }\r\n\r\n};\r\nobj.nt = function(){\r\n    if(obj.isop==0){\r\n        if(obj.iev6) obj.dsp();\r\n        else obj.lop();\r\n    }\r\n}\r\nobj.dsp=function(){\r\n    if(obj.isop) return null;\r\n    try{ \r\n    setTimeout(function(){document.getElementById("_DOMScript_{zoneid}").DOM.Script.open(obj.url,"_blank",obj.openstr);obj.w.focus();obj.isop=1; },200);\r\n    }catch(err){ }\r\n}\r\nobj.lop=function(){ \r\n    if(obj.isop) return null;\r\n    try{\r\n        obj.isop=1;\r\n        document.getElementById("_launchURL_{zoneid}").launchURL(obj.url) ;\r\n       \r\n    }catch(err){\r\n        obj.isop=0;    \r\n    }\r\n}\r\nobj.lap=function(){\r\n     if(obj.browser.ie && obj.isop==0){\r\n        if(window.attachEvent){\r\n            window.attachEvent("onload",function (){\r\n                obj.lop();\r\n            })\r\n        }else {\r\n            if(window.addEventListener){\r\n                window.addEventListener("load",function (){\r\n                    obj.lop();        \r\n                },true)\r\n            }else {\r\n                window.onload=function (){\r\n                    obj.lop();\r\n                }\r\n            }\r\n        }\r\n     }\r\n     \r\n}\r\nobj.adv= function (el, evname, func) {\r\n    if (el.attachEvent) {  \r\n        el.attachEvent("on" + evname, func);\r\n    } else if (el.addEventListener) {  \r\n        el.addEventListener(evname, func, true);\r\n    } else {\r\n        el["on" + evname] = func;\r\n    }\r\n}\r\nobj.rdv= function (el, evname, func) {\r\n    if (el.removeEventListener) {\r\n        el.removeEventListener(evname, func, false);\r\n    } else if (el.detachEvent) {\r\n        el.detachEvent("on" + evname, func);\r\n    } else { \r\n        el["on" + evname] = null;\r\n    }\r\n}\r\nobj.cg = function(){ \r\n        var ids =  "a_z_"+Math.ceil(Math.random()*100);\r\n        var prePage=document.createElement("a");\r\n        prePage.href=obj.url;\r\n        prePage.id = ids;\r\n        //prePage.onclick=function(){};\r\n        prePage.target="_blank";     \r\n        prePage.style.position="absolute";\r\n        prePage.style.zIndex="10000";\r\n        prePage.style.backgroundColor="#fff";\r\n        prePage.style.opacity="0.1";\r\n        prePage.style.filter="alpha(opacity:1)";\r\n        prePage.style.display="block";\r\n        prePage.style.top="0px";\r\n        prePage.style.left="0px";\r\n        document.body.appendChild(prePage);\r\n      var el=document.getElementById(prePage.id);\r\n      var m = setInterval(function() {\r\n            var d = document.body;e=document.documentElement;\r\n            document.compatMode=="BackCompat" ?  t=d.scrollTop : t=e.scrollTop==0?d.scrollTop:e.scrollTop;    \r\n            el.style.top=t+"px";\r\n            el.style.width = d.clientWidth + "px";\r\n            el.style.height = d.clientHeight + "px";\r\n        }, 200);\r\n        el.onclick = function(e) {\r\n            setTimeout(function() {\r\n                el.parentNode.removeChild(el)\r\n            }, 200);\r\n            clearInterval(m); \r\n            obj.isop=1;\r\n        };\r\n}\r\nobj.c = function(){   \r\n     obj.rdv(document, "click", obj.ck{zoneid}); \r\n     obj.adv(document, "click", obj.ck{zoneid} ); \r\n};\r\nobj.ck{zoneid} = function(){   \r\n    if(obj.isop) { \r\n        obj.rdv(document, "click", obj.ck{zoneid}); \r\n         clearInterval(obj.ab);\r\n        return null;\r\n    }\r\n    obj.o2=window.open(obj.url,"_blank",obj.openstr+",left=0,top=0");\r\n            obj.w.focus();\r\n            if(obj.o2){\r\n                 obj.rdv(document, "click", obj.ck{zoneid});\r\n                 clearInterval(obj.ab);\r\n                 obj.isop=1;\r\n            }\r\n};\r\nreturn obj; \r\n} \r\nvar oP{zoneid}=objpop("{targeturl}"); \r\noP{zoneid}.open();', '', 1, '2010-04-14 13:35:25'),
(10, 2, '', 'cpm', '虚拟弹窗', 'script', 'a:3:{i:0;s:3:"url";i:1;s:5:"width";i:2;s:6:"height";}', 'var_zY_Url= "{targeturl}";\r\nimg_url = "{imgserver}/images/cpmvp";\r\nvir_width = "{width}";\r\nvir_height = "{height}";\r\nvir_TitleText  = "";\r\nvir_url = "<IFRAME src=\\"{adurl}\\"  marginWidth=0 marginHeight=0 frameborder=0 scrolling=no width={width} Height={height} onload=\\"c_vir_on()\\"></IFRAME>";\r\ndocument.write("<script src=\\"{jsserver}/js/xn.js\\"></script>");', '', 1, '2010-04-14 13:35:25'),
(11, 1, '', 'cpc', '右下角漂浮', 'script', 'a:4:{i:0;s:3:"url";i:1;s:8:"imageurl";i:2;s:5:"width";i:3;s:6:"height";}', 'yP_statsUrl= "{targeturl}"; \r\nyP_unionUrl="{unionurl}"; \r\nyP_width={width};\r\nyP_height={height};\r\nyP_imgurl= "{imgurl}"; \r\nyP_imgServer="{imgserver}"; \r\nyP_planType = "cpc"; \r\ndocument.write("<script src=\\"{jsserver}/js/yp.js\\"></script>");', '', 1, '2010-04-17 18:26:34'),
(12, 1, '', 'cpc', '对联广告', 'script', 'a:4:{i:0;s:3:"url";i:1;s:8:"imageurl";i:2;s:5:"width";i:3;s:6:"height";}', '\r\ndL_Ads_Url= "{targeturl}";\r\ndL_Width={width};\r\ndL_Height={height};\r\ndL_Img_url= "{imgurl}";\r\ndL_Img_url1= "{imgurl1}";\r\ndL_Img_host="{imgserver}";\r\ndocument.write("<script src=\\"{jsserver}/js/dl.js\\"></script>");\r\n', '', 1, '2010-04-17 18:26:59'),
(13, 1, '', 'cpc', '主题广告', 'iframe', 'a:4:{i:0;s:3:"url";i:1;s:8:"headline";i:2;s:11:"description";i:3;s:7:"dispurl";}', '{text}', '', 1, '2010-04-17 18:29:25'),
(14, 2, '', 'cpm', '退出弹窗', 'script', 'a:1:{i:0;s:3:"url";}', 'pU_zY_Url= "{targeturl}";\r\ndocument.write("<script src=\\"{jsserver}/js/tt.js\\"></script>");', '', 1, '2010-04-17 18:32:30'),
(15, 5, '', 'cpv', '右下角漂浮', 'script', 'a:4:{i:0;s:3:"url";i:1;s:8:"imageurl";i:2;s:5:"width";i:3;s:6:"height";}', 'yP_statsUrl= "{targeturl}";  \r\nyP_unionUrl="{unionurl}";  \r\nyP_width={width};\r\nyP_height={height};\r\nyP_imgurl= "{imgurl}";  \r\nyP_imgServer="{imgserver}"; \r\nyP_planType = "cpv";  \r\nyP_tourl = "{targeturl}" \r\nyp_doclick2url = "{jumpserver}/iclk/do2click.php?type=cpv&planid={planid}&adsid={adsid}&zoneid={zoneid}";\r\ndocument.write("<script src=\\"{jsserver}/js/yp.js\\"></script>");\r\n', '', 1, '2010-04-17 18:34:03'),
(16, 3, '', 'cpa', '普通图片/Flash', 'iframe', 'a:4:{i:0;s:3:"url";i:1;s:8:"imageurl";i:2;s:5:"width";i:3;s:6:"height";}', '<a target="_blank" href="{targeturl}"><img src="{imgurl}" border="0" width="{width}" height="{height}" ></a>', '', 1, '2010-04-17 18:35:27'),
(17, 3, '', 'cpa', '网摘广告', 'iframe', 'a:3:{i:0;s:5:"width";i:1;s:6:"height";i:2;s:8:"htmlcode";}', '{htmlcode}', '', 1, '2010-04-17 18:35:47'),
(18, 3, '', 'cpa', '右下角漂浮', 'script', 'a:4:{i:0;s:3:"url";i:1;s:8:"imageurl";i:2;s:5:"width";i:3;s:6:"height";}', 'yP_statsUrl= "{targeturl}"; \r\nyP_unionUrl="{unionurl}"; \r\nyP_width={width};\r\nyP_height={height};\r\nyP_imgurl= "{imgurl}"; \r\nyP_imgServer="{imgserver}"; \r\nyP_planType = "cpa"; \r\ndocument.write("<script src=\\"{jsserver}/js/yp.js\\"></script>");', '', 1, '2010-04-17 18:45:18'),
(19, 3, '', 'cpa', '对联广告', 'script', 'a:4:{i:0;s:3:"url";i:1;s:8:"imageurl";i:2;s:5:"width";i:3;s:6:"height";}', '\r\ndL_Ads_Url= "{targeturl}";\r\ndL_Width={width};\r\ndL_Height={height};\r\ndL_Img_url= "{imgurl}";\r\ndL_Img_url1= "{imgurl1}";\r\ndL_Img_host="{imgserver}";\r\ndocument.write("<script src=\\"{jsserver}/js/dl.js\\"></script>");\r\n', '', 1, '2010-04-17 18:45:28'),
(20, 4, '', 'cps', '普通图片/Flash', 'iframe', 'a:4:{i:0;s:3:"url";i:1;s:8:"imageurl";i:2;s:5:"width";i:3;s:6:"height";}', '<a target="_blank" href="{targeturl}"><img src="{imgurl}" border="0" width="{width}" height="{height}" ></a>', '', 1, '2010-04-17 18:45:40'),
(21, 4, '', 'cps', '网摘广告', 'iframe', 'a:3:{i:0;s:5:"width";i:1;s:6:"height";i:2;s:8:"htmlcode";}', '{htmlcode}', '', 1, '2010-04-17 18:45:59'),
(22, 4, '', 'cps', '右下角漂浮', 'script', 'a:4:{i:0;s:3:"url";i:1;s:8:"imageurl";i:2;s:5:"width";i:3;s:6:"height";}', 'yP_statsUrl= "{targeturl}"; \r\nyP_unionUrl="{unionurl}"; \r\nyP_width={width};\r\nyP_height={height};\r\nyP_imgurl= "{imgurl}"; \r\nyP_imgServer="{imgserver}"; \r\nyP_planType = "cps"; \r\ndocument.write("<script src=\\"{jsserver}/js/yp.js\\"></script>");', '', 1, '2010-04-17 18:46:16'),
(23, 4, '', 'cps', '对联广告', 'script', 'a:4:{i:0;s:3:"url";i:1;s:8:"imageurl";i:2;s:5:"width";i:3;s:6:"height";}', '\r\ndL_Ads_Url= "{targeturl}";\r\ndL_Width={width};\r\ndL_Height={height};\r\ndL_Img_url= "{imgurl}";\r\ndL_Img_url1= "{imgurl1}";\r\ndL_Img_host="{imgserver}";\r\ndocument.write("<script src=\\"{jsserver}/js/dl.js\\"></script>");\r\n', '', 1, '2010-04-17 18:46:26'),
(24, 127, '', '', '自定义链接', 'Iframe', '', '', NULL, 1, '0000-00-00 00:00:00'),
(25, 5, '', 'cpv', '右下角网摘', 'script', 'a:3:{i:0;s:5:"width";i:1;s:6:"height";i:2;s:8:"htmlcode";}', 'yP_statsUrl= "{targeturl}";  \r\nyP_unionUrl="{unionurl}";  \r\nyP_width={width};\r\nyP_height={height};\r\nyP_imgurl= "{imgurl}"; \r\nyP_htmlcode = "{htmlcode}"; \r\nyP_imgServer="{imgserver}";\r\nyP_planType = "cpv"; \r\nyP_tourl = "{adurl}";\r\nyp_doclick2url = "{jumpserver}/iclk/do2click.php?type=cpv&planid={planid}&adsid={adsid}&zoneid={zoneid}";\r\ndocument.write("<script src=\\"{jsserver}/js/yph.js\\"></script>");', '', 1, '2010-09-09 16:41:20'),
(26, 5, '', 'cpv', '左下角漂浮', 'script', 'a:4:{i:0;s:3:"url";i:1;s:8:"imageurl";i:2;s:5:"width";i:3;s:6:"height";}', 'yP_statsUrl= "{targeturl}";  \r\nyP_unionUrl="{unionurl}";  \r\nyP_width={width};\r\nyP_height={height};\r\nyP_imgurl= "{imgurl}";  \r\nyP_imgServer="{imgserver}"; \r\nyP_planType = "cpv";  \r\nyP_tourl = "{targeturl}" \r\nyp_doclick2url = "{jumpserver}/iclk/do2click.php?type=cpv&planid={planid}&adsid={adsid}&zoneid={zoneid}";\r\ndocument.write("<script src=\\"{jsserver}/js/zp.js\\"></script>");\r\n', '', 1, '2010-09-09 19:39:52'),(27, 5, '', 'cpv', '普通图片', 'iframe', 'a:4:{i:0;s:3:"url";i:1;s:8:"imageurl";i:2;s:5:"width";i:3;s:6:"height";}', '<script>\r\ndL_fileex = "{imgurl}";\r\ndL_fileex=dL_fileex.substr(dL_fileex.lastIndexOf(".")).toLowerCase();\r\nif(this.dL_fileex!=".swf"){\r\n    document.write("<a target=_blank href={targeturl} onclick=\\"_Zuc_()\\"><img src={imgurl} border=0 width={width} height={height} ></a>");\r\n}\r\ndocument.write("<div style=\\"position:absolute;z-index:10000;background-color:#fff;opacity:0.01;filter:alpha(opacity:1);\\"><a href={targeturl} target=_blank style=\\"display:block;width:{width}px;height:{height}px;\\" onclick=\\"_Zuc_()\\" ></a></div><div style=\\"position:absolute;z-index:9999; cursor:pointer;\\"><embed src={imgurl} type=\\"application/x-shockwave-flash\\" height={height} width={width}  quality=high wmode=opaque allowscriptaccess=always ></div>"); \r\nP_statsUrl= "{targeturl}";  \r\np_doclick2url = "{jumpserver}/iclk/do2click.php?type=cpv&planid={planid}&adsid={adsid}&zoneid={zoneid}";\r\nfunction _ZVa_(){if(document.body){var zY_a=new Image();zY_a.src=P_statsUrl;}}\r\nfunction _Zuc_(){var a=new Image();a.src=p_doclick2url;}\r\nsetTimeout("_ZVa_()",5000);\r\n</script>', '', 1, '2012-05-10 18:54:19');

 
DROP TABLE IF EXISTS `zyads_audit`;
CREATE TABLE `zyads_audit` (
  `auditid` mediumint(8) NOT NULL AUTO_INCREMENT,
  `uid` mediumint(8) NOT NULL,
  `siteid` mediumint(8) NOT NULL,
  `planid` mediumint(8) NOT NULL,
  `audituser` varchar(20) NOT NULL,
  `addtime` datetime NOT NULL,
  `audittime` datetime NOT NULL,
  `denyinfo` text,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`auditid`),
  KEY `uid` (`uid`),
  KEY `status` (`status`),
  KEY `siteid` (`siteid`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=1 ;

 
DROP TABLE IF EXISTS `zyads_cache`;
CREATE TABLE `zyads_cache` (
  `cacheid` varchar(255) CHARACTER SET latin1 NOT NULL,
  `content` blob NOT NULL,
  PRIMARY KEY (`cacheid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

 

DROP TABLE IF EXISTS `zyads_cluster`;
CREATE TABLE `zyads_cluster` (
  `uid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `clusterid` tinyint(3) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk AUTO_INCREMENT=1 ;

 

DROP TABLE IF EXISTS `zyads_day`;
CREATE TABLE `zyads_day` (
  `day` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

 

 

DROP TABLE IF EXISTS `zyads_exchange`;
CREATE TABLE `zyads_exchange` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` mediumint(8) unsigned NOT NULL,
  `integralid` int(10) unsigned NOT NULL,
  `integral` int(10) unsigned NOT NULL,
  `contact` varchar(20) NOT NULL,
  `tel` varchar(30) NOT NULL,
  `address` text NOT NULL,
  `addtime` datetime NOT NULL,
  `deliverytime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=1 ;

 
 

DROP TABLE IF EXISTS `zyads_help`;
CREATE TABLE `zyads_help` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `tit` varchar(255) NOT NULL,
  `conn` mediumtext NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT '0',
  `color` char(7) DEFAULT NULL,
  `time` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=18 ;

--
-- 转存表中的数据 `zyads_help`
--

INSERT INTO `zyads_help` (`id`, `tit`, `conn`, `type`, `color`, `time`, `status`) VALUES
(4, '可否把广告代码放在多个页面里？或者同一个页面放多个广告代码？', '为了增加弹窗/点击的机率，或是避免未知因素导致某页面 无法弹出窗口或无法点击，您可\r\n以在多个页面上投放广告代码或在同一个页面投放多个广告代码。', 0, NULL, '2007-07-10 02:16:35', 1),
(2, '什么是网站主', '是广告交易双方的其中一方，即网站的拥有者，具有修改、新增、删除网站内容的权力，并承担相关法律责任的法人。在自已网站上投放广告主的广告后，并按照本平台规定通过本平台收取佣金。', 0, NULL, '2007-07-10 02:05:53', 1),
(3, '可不可以将代码放在空白页里？', '强烈建议不要将代码放在空白页面或是只有广告代码的页面！因为这将导致广告主在查看\r\n广告数据明细时看到空白页面或是只有广告代码页面而产生误会，从而导致广告主对您的投诉。', 0, NULL, '2007-07-10 02:11:29', 1),
(6, '我如何赚钱？', '本站提供多种方法，供您获得广告点击。广告点击可以用来兑换人民币现金。简单的说，只要有点击，就表示您已经赚到钱了哦 ', 0, NULL, '2007-07-16 02:25:33', 1),
(7, '你们怎么付费给我', '我们目前通过工商银行对客户汇款，没有的会员请到当地免费办理。 ', 0, NULL, '2007-07-16 02:25:55', 1),
(8, '什么时候付钱给我', '当您的帐户余额超过我们指定的支付额时，我们会自动给你支付。 ', 0, NULL, '2007-07-16 02:26:57', 1),
(9, '网站主会员审核标准是什么', '1. 网站本身及广告不能包含任何违反国家法律的内容。 \r\n　　2. 网站本身及广告不能含有恶性代码及病毒，不能包含不健康的内容，如成人、性、色\r\n情、淫秽、赌博、暴力、反动等等。 \r\n　　3. 必须有自己的国际顶级域名或国家顶级域名(如:http://www.abc.com)，原则上不通过\r\n使用二级域名或免费域名网站的审核。 \r\n　　4. 对只有论坛或无实际内容或页面排版不够专业美观的网站一律不予通过。 \r\n　　5. 每个网页的弹出窗口不得超过1个，不得自动弹出一次以上要求设为首页或加入收藏等\r\n类似对话框。 \r\n　　如网站在通过审核后违反或不再符合以上标准中的任何一条，联盟将保留与其终止合作\r\n关系的权力。 ', 0, NULL, '2007-07-16 02:28:17', 1),
(10, '网站主会员在什么情况下会被拒付广告费', '1、网站本身及广告违反了国家法律或含有恶性代码与病毒，及包含成人、性、色情、\r\n淫秽、赌博、暴力、反动等等不健康的内容。 \r\n　　2、所投放广告的网页不属于会员拥有。 \r\n　　3、牵涉到知识产权纠纷的网站（如非法 MP3 、盗版软件网站，黑客站点，软件序列\r\n号站点，注册机、注册码站点，或链接至这些网页的站点）。 \r\n　　4、链接、讨论或提供影响网络秩序的内容，如提供邮件炸弹、计算机病毒等的网站。 \r\n　　5、对作弊的帐户我们一旦查出，将拒绝支付当周全部的佣金，并锁定帐户。 \r\n　　6、被查出同一人注册多个帐号的网站。 \r\n　　7、使用非 HTML 手段、 JAVASRIPT 窗口、隐藏 FRAME 、CGI 自动生成、网页\r\nREFRESH/AUTOLOAD 等手段来演绎广告代码。 \r\n　　8、不可由会员本人或指示、暗示第三方点击广告以获取非法广告费。 ', 0, NULL, '2007-07-16 02:29:26', 1),
(11, '广告数据多久统计一次', '实时统计。\r\n通过本系统提供的精确详细的数据及直观的图表统计，广告主会员可以实时查看到每天的广告\r\n数据及历史详细数据，可以查询到每天有多少人看了您的广告(可依据弹窗数、点击数)，显示您的产品在各个时间段的受众状况。 ', 1, NULL, '2007-07-16 02:34:53', 1),
(12, '如何评价网络广告效果', '这是一个比较复杂的问题，以下是一些参考观点。 \r\n　　网络广告效果最直接评价标准是弹窗次数和点击率，即有多少人看到了此广告，并且又有\r\n多少人对此广告感兴趣而点击了该广告。可能大多广告主比较看中点击率，但关于 Banner 显\r\n示时所带来的品牌传播作用，广告站点与广告主之间一直存在长期的争论。在直销型电子商务\r\n站点，最终的效果评价无疑是在线销售额的增长，因为 Web 服务器端的跟踪程序能判断任何一\r\n笔销售的买主是从哪个站点链接过来的。 ', 1, NULL, '2007-07-16 02:37:06', 1),
(13, '广告正式投放之后还能进行修改吗？', '可以。 \r\n　　广告主可实时针对自己营销策略的变更而修改广告内容，如增加广告投放数量、改变单价、\r\n改变链接地址等。 \r\n　　注：新增加的广告在通过管理员审核前可以随意修改内容，正在投放中的广告修改后需管\r\n理员审核。 ', 1, NULL, '2007-07-16 02:37:35', 1),
(14, '关于广告主广告页面的规定', '　1. 放置广告信息的弹窗/点击页面必须是真实页面，不得以任何形式将代码放置于非法\r\n页面上，也就是不能通过javascript、ifram、js等已知或未知的方式在其它页面调出，如有\r\n此类情况一经查实，我们将撤销该广告并清除该广告剩余投放金额。 \r\n　　2. 放置广告信息的弹窗页面不能再有弹出窗口，否则广告主广告将被暂停并清除该广告\r\n剩余投放金额。 \r\n　　3. 不允许弹出超过一次以上将广告页面设为主页和设为收藏的对话框，否则广告主广告\r\n将被暂停并清除该广告剩余投放金额。 ', 1, NULL, '2007-07-16 02:38:25', 1),
(15, '广告主会员如何发布广告？', '      第一步：注册成为联盟的广告主会员； \r\n　　第二步：登陆管理区进行【帐户充值】操作，可选择在线支付和银行汇款两种支付方式； \r\n　　第三步：汇款确认之后，您可以进行【新增广告】操作，选择您希望投放的广告模式并填\r\n写广告资料(如购买的广告投放数量、单价、最高点/弹比例、广告地址、广告类型等)； \r\n　　第四步：待管理员审核并通过广告资料后，您的广告就正式开始投放了。 \r\n　　如果您有任何疑问，欢迎与我公司联系，如果您不熟悉操作的流程，您只需要告诉我们您\r\n的要求，我公司将免费为您定制全套的广告发布方案，最大限度的发挥广告宣传的有效性。 ', 1, NULL, '2007-07-16 02:41:42', 1),
(16, '对联盟的网络广告产品不了解，怎么办？', '请与本公司客户服务人员或管理员取得联系，向我们咨询您想要了解的情况，我们亦会通\r\n过传真或E-mail将本产品相关信息发给您，精心为您免费量身定制网络广告投放计划。Sales@zyiis.com ', 1, NULL, '2007-07-16 02:43:20', 1),
(17, '联盟有哪些广告类型', '<p>图片广告: 支持Flash文件广告,让广告更有特色,实时统计更新,模式包括通栏、横幅、画中画、按钮及旗帜等，有多种尺寸规格。系统采用扁平化的项目管理方式，每个广告项目对应一个广告样式，广告主会员可以任意发布多条相同或不同广告地址、广告样式的广告，系统默认采有的自动轮播的方式让你的网站更加美观。文字广告: 文字广告以文字形式较为详细的介绍广告主的广告产品，扩大企业或产品的知名度。文字广告位的安排非常灵活，可以出现在页面的任何位置，可以任意排放。弹窗广告: 弹窗广告是互联网上最古老也最常用的网络推广形式之一。随着网络广告的发展 ，弹窗广告虽然逐渐退位不再有那么多的倡导者，但弹窗广告依然广泛的应用于网站 、企业的产品快速推广和宣传。在竞争激烈的今天，弹窗广告更是企业快速占领用户 和市场的手段之一，同时也是宣传成本较低的方法之一 销售广告: 引导注册统既CPA计价方式是指按广告投放实际效果，即按回应的有效问卷或定单来计费，而不限广告投 放量。CPA的计价方式对于网站而言有一定的风险，但若广告投放成功，其收益也比CPM的计 价方式要大得多。</p>', 0, '标题颜色', '2007-07-16 02:47:10', 1);

 
DROP TABLE IF EXISTS `zyads_hour`;
CREATE TABLE `zyads_hour` (
  `day` date NOT NULL,
  `plantype` varchar(6) NOT NULL,
  `uid` mediumint(9) unsigned NOT NULL,
  `hour0` mediumint(9) unsigned NOT NULL,
  `hour1` mediumint(9) unsigned NOT NULL,
  `hour2` mediumint(9) unsigned NOT NULL,
  `hour3` mediumint(9) unsigned NOT NULL,
  `hour4` mediumint(9) unsigned NOT NULL,
  `hour5` mediumint(9) unsigned NOT NULL,
  `hour6` mediumint(9) unsigned NOT NULL,
  `hour7` mediumint(9) unsigned NOT NULL,
  `hour8` mediumint(9) unsigned NOT NULL,
  `hour9` mediumint(9) unsigned NOT NULL,
  `hour10` mediumint(9) unsigned NOT NULL,
  `hour11` mediumint(9) unsigned NOT NULL,
  `hour12` mediumint(9) unsigned NOT NULL,
  `hour13` mediumint(9) unsigned NOT NULL,
  `hour14` mediumint(9) unsigned NOT NULL,
  `hour15` mediumint(9) unsigned NOT NULL,
  `hour16` mediumint(9) unsigned NOT NULL,
  `hour17` mediumint(9) unsigned NOT NULL,
  `hour18` mediumint(9) unsigned NOT NULL,
  `hour19` mediumint(9) unsigned NOT NULL,
  `hour20` mediumint(9) unsigned NOT NULL,
  `hour21` mediumint(9) unsigned NOT NULL,
  `hour22` mediumint(9) unsigned NOT NULL,
  `hour23` mediumint(9) unsigned NOT NULL,
  KEY `day` (`day`,`plantype`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;
 

DROP TABLE IF EXISTS `zyads_import`;
CREATE TABLE `zyads_import` (
  `importid` mediumint(8) NOT NULL AUTO_INCREMENT,
  `uid` mediumint(8) NOT NULL,
  `planid` mediumint(9) NOT NULL,
  `num` mediumint(9) NOT NULL DEFAULT '1',
  `adfnum` mediumint(9) NOT NULL DEFAULT '0',
  `orders` varchar(255) DEFAULT NULL,
  `userproportion` tinyint(3) NOT NULL DEFAULT '0',
  `advproportion` tinyint(3) NOT NULL DEFAULT '0',
  `userprice` decimal(10,4) NOT NULL DEFAULT '0.0000',
  `advprice` decimal(10,4) NOT NULL DEFAULT '0.0000',
  `sumpay` decimal(10,4) NOT NULL DEFAULT '0.0000',
  `sumadvpay` decimal(10,4) NOT NULL DEFAULT '0.0000',
  `sumprofit` decimal(10,4) NOT NULL DEFAULT '0.0000',
  `ordersprices` decimal(10,4) NOT NULL DEFAULT '0.0000',
  `day` date NOT NULL,
  `addtime` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`importid`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=1 ;

 

DROP TABLE IF EXISTS `zyads_integral`;
CREATE TABLE `zyads_integral` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `type` tinyint(1) unsigned NOT NULL,
  `name` varchar(255) CHARACTER SET gbk NOT NULL,
  `info` text CHARACTER SET gbk,
  `integral` int(11) unsigned NOT NULL,
  `imageurl` varchar(255) CHARACTER SET gbk NOT NULL,
  `num` int(8) unsigned NOT NULL DEFAULT '0',
  `top` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `addtime` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

 

INSERT INTO `zyads_integral` (`id`, `type`, `name`, `info`, `integral`, `imageurl`, `num`, `top`, `status`, `addtime`) VALUES
(5, 0, '联想ThinkPad X201i笔记本', '屏幕尺寸：12.1英寸\r\n处理器型：Intel 酷睿i3 350M \r\n标称主频：2.26GHz \r\n标配内存：2GB DDR3 \r\n硬盘容量：250GB 5400转，SATA\r\n显卡芯片：Intel GMA HD\r\n光驱类型：无内置光驱 ', 80000, '/a/2011-08-08/131281863663640137.jpg', 0, 1, 1, '2011-08-08'),
(4, 0, '佳能EOS550D相机 ', '佳能EOS550D相机 ', 80000, '/a/2011-08-05/131253022583039551.jpg', 0, 0, 1, '2011-08-05'),
(6, 1, '瑞士军刀', '材质：顶级不锈钢\r\n产地：瑞士\r\n品牌：Victorinox/维氏\r\n包装：瑞士军刀进口原装\r\n商品参数：规格：91亳米，15种功能 \r\n手柄:光面纤维塑料\r\n该系列军刀堪称“实用工具箱”，其长为91mm，功能齐，是危机时刻好帮手。', 80000, '/a/2011-08-08/131281871169035645.jpg', 0, 1, 1, '2011-08-08'),
(7, 0, '苹果MacBook Pro笔记本电脑', 'Apple 苹果 MacBook Pro \r\n处理器(CPU):Intel 英特尔 \r\n型号:英特尔 酷睿2 双核 \r\n速度:2.66GHz \r\n系统总线:1066MHz \r\n二级缓存:3MB \r\n屏幕大小:13.3英寸 ', 80000, '/a/2011-08-08/131281875281611329.jpg', 0, 1, 1, '2011-08-08'),
(8, 0, '苹果iPad 2（16G/WIFI版）', '屏幕尺寸：9.7英寸 \r\n电容式触摸操作系统：iOS 4.3 \r\n处理器：A5 双核，1GHz \r\n系统内存：512MB \r\n存储容量：16GB \r\n屏幕分辨：1024×768 \r\n网络模式：不支持3G网络 \r\n摄像头：双摄像头', 80000, '/a/2011-08-08/131281895628247070.jpg', 0, 1, 1, '2011-08-08'),
(9, 0, '苹果iPhone 4（16GB）', '网络模式：GSM，WCDMA \r\n外观设计：直板 \r\n主屏尺寸：3.5英寸 640×960像素 \r\n触摸屏：电容屏，多点触控 \r\n摄像头像：500万像素', 80000, '/a/2011-08-08/131281909416157226.jpg', 2, 1, 1, '2011-08-08');

 

DROP TABLE IF EXISTS `zyads_loginlog`;
CREATE TABLE `zyads_loginlog` (
  `id` mediumint(8) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `logintype` varchar(10) NOT NULL,
  `logininfo` varchar(20) NOT NULL,
  `loginip` char(15) NOT NULL,
  `logintime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=1 ;


DROP TABLE IF EXISTS `zyads_message`;
CREATE TABLE `zyads_message` (
  `msgid` mediumint(8) NOT NULL AUTO_INCREMENT,
  `msgtype` tinyint(1) NOT NULL DEFAULT '0',
  `senduser` varchar(50) NOT NULL,
  `touser` varchar(50) DEFAULT '0',
  `parentid` mediumint(8) NOT NULL DEFAULT '0',
  `subject` varchar(100) NOT NULL,
  `msgtext` mediumtext NOT NULL,
  `isview` tinyint(1) NOT NULL DEFAULT '0',
  `isadmin` tinyint(1) NOT NULL DEFAULT '1',
  `alone` tinyint(1) NOT NULL DEFAULT '0',
  `addtime` datetime NOT NULL,
  PRIMARY KEY (`msgid`),
  KEY `isadmin` (`isadmin`),
  KEY `senduser` (`senduser`),
  KEY `touser` (`touser`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=1 ;

 
DROP TABLE IF EXISTS `zyads_news`;
CREATE TABLE `zyads_news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tit` varchar(100) NOT NULL DEFAULT '',
  `conn` mediumtext NOT NULL,
  `time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `top` tinyint(1) NOT NULL DEFAULT '0',
  `color` char(7) DEFAULT NULL,
  `is_view` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=1 ;

 

INSERT INTO `zyads_news` (`id`, `tit`, `conn`, `time`, `top`, `color`, `is_view`) VALUES
(33, 'wealin 联系客服修改银行名称 ', 'wealin 联系客服修改银行名称 ', '2008-06-19 23:59:41', 0, NULL, 0),
(34, 'cq532 联系客服 工行名称不对 ', 'cq532 联系客服 工行名称不对 ', '2008-06-19 23:59:51', 0, NULL, 0),
(35, 'hybbq 银行开户名称不对。联系客服 ', 'hybbq 银行开户名称不对。联系客服 ', '2008-06-20 00:00:00', 0, NULL, 0),
(36, '任何人作弊,直接封号,不通知！ ', '任何人作弊,直接封号,不通知！ ', '2008-06-20 00:00:12', 0, NULL, 0),
(37, 'dy88516 银行开户名称没有写。联系客户 ', 'dy88516 银行开户名称没有写。联系客户 ', '2008-06-20 00:00:23', 0, NULL, 0),
(38, '25号前结算完毕！lyw999的银行名字不对联系客服！ ', '25号前结算完毕！lyw999的银行名字不对联系客服！ ', '2008-06-20 00:00:31', 0, NULL, 0),
(41, '任何人作弊,直接封号,不通知！ ', '任何人作弊,直接封号,不通知！ ', '2009-02-18 10:34:49', 0, NULL, 0),
(42, '任何人作弊,直接封号,不通知！ ', '任何人作弊,直接封号,不通知！ ', '2009-03-04 20:49:35', 0, NULL, 0),
(43, '任何人作弊,直接封号,不通知！ ', '任何人作弊,直接封号,不通知！ ', '2009-03-04 20:49:39', 0, NULL, 0);

 

DROP TABLE IF EXISTS `zyads_onlinepay`;
CREATE TABLE `zyads_onlinepay` (
  `onlineid` mediumint(8) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `imoney` double(10,2) NOT NULL DEFAULT '0.00',
  `paytype` char(10) NOT NULL,
  `addtime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `orderid` varchar(50) NOT NULL,
  `adminuser` varchar(50) NOT NULL,
  `payinfo` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`onlineid`),
  KEY `orderid` (`orderid`),
  KEY `addtime` (`addtime`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=1 ;

 
DROP TABLE IF EXISTS `zyads_orders`;
CREATE TABLE `zyads_orders` (
  `orderid` mediumint(8) NOT NULL AUTO_INCREMENT,
  `uid` mediumint(8) DEFAULT '0',
  `siteid` mediumint(8) NOT NULL DEFAULT '0',
  `zoneid` mediumint(8) DEFAULT '0',
  `planid` mediumint(8) DEFAULT '0',
  `adsid` mediumint(9) DEFAULT '0',
  `price` decimal(12,4) DEFAULT '0.0000',
  `priceadv` decimal(12,4) DEFAULT '0.0000',
  `ip` varchar(255) DEFAULT NULL,
  `referer` varchar(255) DEFAULT NULL,
  `orders` varchar(100) DEFAULT '0',
  `deduction` tinyint(1) DEFAULT '0',
  `like` varchar(255) DEFAULT NULL,
  `status` tinyint(3) DEFAULT '0',
  `day` date DEFAULT '0000-00-00',
  `linkuid` mediumint(8) NOT NULL DEFAULT '0',
  `addtime` datetime DEFAULT '0000-00-00 00:00:00',
  `confirmtime` date DEFAULT '0000-00-00',
  PRIMARY KEY (`orderid`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=1 ;

 

DROP TABLE IF EXISTS `zyads_paylog`;
CREATE TABLE `zyads_paylog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` mediumint(8) DEFAULT NULL,
  `xmoney` varchar(20) DEFAULT NULL,
  `money` varchar(20) DEFAULT NULL,
  `tax` varchar(20) DEFAULT NULL,
  `charges` varchar(20) DEFAULT NULL,
  `pay` varchar(20) DEFAULT NULL,
  `clearingadmin` varchar(20) DEFAULT NULL,
  `paytime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `scale` double(8,2) NOT NULL DEFAULT '0.00',
  `realmoney` double(10,4) NOT NULL DEFAULT '0.0000',
  `payinfo` mediumtext,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `addtime` date NOT NULL DEFAULT '0000-00-00',
  `clearingtype` varchar(10) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique` (`uid`,`addtime`,`clearingtype`),
  KEY `addtime` (`addtime`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=1 ;

 
DROP TABLE IF EXISTS `zyads_plan`;
CREATE TABLE `zyads_plan` (
  `planid` mediumint(8) NOT NULL AUTO_INCREMENT,
  `uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `username` varchar(20) NOT NULL,
  `planname` char(50) NOT NULL,
  `price` decimal(10,4) NOT NULL DEFAULT '0.0000',
  `priceadv` decimal(10,4) DEFAULT '0.0000',
  `gradeprice` tinyint(1) NOT NULL DEFAULT '0',
  `s0price` decimal(10,4) NOT NULL DEFAULT '0.0000',
  `s1price` decimal(10,4) NOT NULL DEFAULT '0.0000',
  `s2price` decimal(10,4) NOT NULL DEFAULT '0.0000',
  `s3price` decimal(10,4) NOT NULL DEFAULT '0.0000',
  `priceinfo` varchar(50) DEFAULT NULL,
  `budget` int(11) NOT NULL DEFAULT '0',
  `expire` date NOT NULL DEFAULT '0000-00-00',
  `checkplan` mediumtext NOT NULL,
  `plantype` char(3) NOT NULL DEFAULT 'cpc',
  `profit` tinyint(3) NOT NULL DEFAULT '0',
  `deduction` tinyint(3) DEFAULT '0',
  `clearing` varchar(10) NOT NULL,
  `stopaudit` tinyint(1) NOT NULL DEFAULT '1',
  `datatime` tinyint(3) NOT NULL DEFAULT '1',
  `planinfo` mediumtext,
  `serverip` text,
  `audit` char(1) NOT NULL DEFAULT 'n',
  `restrictions` tinyint(1) NOT NULL DEFAULT '1',
  `resuid` mediumtext,
  `sitelimit` tinyint(1) NOT NULL DEFAULT '1',
  `limitsiteid` mediumtext,
  `in_site` tinyint(1) NOT NULL DEFAULT '0',
  `top` tinyint(1) NOT NULL DEFAULT '0',
  `logo` varchar(255) DEFAULT NULL,
  `mark` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `addtime` datetime NOT NULL,
  PRIMARY KEY (`planid`),
  KEY `plantype` (`plantype`),
  KEY `uid` (`uid`),
  KEY `status` (`status`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=11 ;

 

DROP TABLE IF EXISTS `zyads_planstats`;
CREATE TABLE `zyads_planstats` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `views` int(10) NOT NULL DEFAULT '0',
  `clicks` int(10) NOT NULL DEFAULT '0',
  `num` int(10) NOT NULL DEFAULT '0',
  `orders` int(10) NOT NULL DEFAULT '0',
  `do2click` int(10) NOT NULL DEFAULT '0',
  `deduction` int(10) NOT NULL DEFAULT '0',
  `sumprofit` decimal(10,4) NOT NULL DEFAULT '0.0000',
  `sumpay` decimal(10,4) NOT NULL DEFAULT '0.0000',
  `sumadvpay` decimal(10,4) NOT NULL DEFAULT '0.0000',
  `planid` int(10) NOT NULL DEFAULT '0',
  `plantype` char(3) NOT NULL,
  `uid` mediumint(8) NOT NULL DEFAULT '0',
  `day` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique` (`day`,`planid`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=1 ;

 
DROP TABLE IF EXISTS `zyads_province`;
CREATE TABLE `zyads_province` (
  `day` date NOT NULL,
  `uid` mediumint(9) unsigned NOT NULL,
  `province` mediumint(9) unsigned NOT NULL DEFAULT '0',
  `province0` mediumint(9) unsigned NOT NULL,
  `province1` mediumint(9) unsigned NOT NULL,
  `province2` mediumint(9) unsigned NOT NULL,
  `province3` mediumint(9) unsigned NOT NULL,
  `province4` mediumint(9) unsigned NOT NULL,
  `province5` mediumint(9) unsigned NOT NULL,
  `province6` mediumint(9) unsigned NOT NULL,
  `province7` mediumint(9) unsigned NOT NULL,
  `province8` mediumint(9) unsigned NOT NULL,
  `province9` mediumint(9) unsigned NOT NULL,
  `province10` mediumint(9) unsigned NOT NULL,
  `province11` mediumint(9) unsigned NOT NULL,
  `province12` mediumint(9) unsigned NOT NULL,
  `province13` mediumint(9) unsigned NOT NULL,
  `province14` mediumint(9) unsigned NOT NULL,
  `province15` mediumint(9) unsigned NOT NULL,
  `province16` mediumint(9) unsigned NOT NULL,
  `province17` mediumint(9) unsigned NOT NULL,
  `province18` mediumint(9) unsigned NOT NULL,
  `province19` mediumint(9) unsigned NOT NULL,
  `province20` mediumint(9) unsigned NOT NULL,
  `province21` mediumint(9) unsigned NOT NULL,
  `province22` mediumint(9) unsigned NOT NULL,
  `province23` mediumint(9) unsigned NOT NULL,
  `province24` mediumint(9) unsigned NOT NULL,
  `province25` mediumint(9) unsigned NOT NULL,
  `province26` mediumint(9) unsigned NOT NULL,
  `province27` mediumint(9) unsigned NOT NULL,
  `province28` mediumint(9) unsigned NOT NULL,
  `province29` mediumint(9) unsigned NOT NULL,
  `province30` mediumint(9) unsigned NOT NULL,
  `province31` mediumint(9) unsigned NOT NULL,
  `province32` mediumint(9) unsigned NOT NULL,
  `province33` mediumint(9) unsigned NOT NULL,
  `province34` mediumint(9) unsigned NOT NULL,
  `province35` mediumint(9) unsigned NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=gbk;
 
DROP TABLE IF EXISTS `zyads_sessions`;
CREATE TABLE `zyads_sessions` (
  `session_id` char(32) CHARACTER SET gbk COLLATE gbk_bin NOT NULL,
  `session_expires` int(10) unsigned NOT NULL DEFAULT '0',
  `session_data` text,
  PRIMARY KEY (`session_id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

 
DROP TABLE IF EXISTS `zyads_settings`;
CREATE TABLE `zyads_settings` (
  `title` varchar(50) NOT NULL,
  `value` varchar(500) NOT NULL,
  PRIMARY KEY (`title`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;
 
INSERT INTO `zyads_settings` (`title`, `value`) VALUES
('mail_send', '2'),
('mail_server', 'smtp.sohu.com'),
('mail_port', '25'),
('mail_auth', '1'),
('mail_from', 'demo_z@sohu.com '),
('mail_username', 'demo_z'),
('mail_password', 'demo_z'),
('tomail', 'register'),
('zlink_on', 'cpc,cpm,cpa,cps'),
('sitename', '中易广告联盟'),
('siteurl', 'a.com'),
('authorized_url', 'www.a.com'),
('siteip', '127.0.0.1'),
('pv_step', '10'),
('url_key', 'e7d00'),
('site_status', '0'),
('alexa', '0'),
('min_budeget', '100'),
('chexiao_code', '20'),
('in_site', '0'),
('union_bz', '1'),
('do2click', '1'),
('cpcmin_price', '0.006'),
('cpmmin_price', '0.0048'),
('cpvmin_price', '0.003'),
('cpamin_price', '0.2'),
('cpsmin_price', '20'),
('jsurl', 'http://www.a.com'),
('imgurl', 'http://www.a.com'),
('jumpurl', 'http://www.a.com'),
('sync_setting', ''),
('db_ms', '0'),
('memcached_host', '127.0.0.1'),
('memcached_port', '11211'),
('cache_type', 'file'),
('cache_time', '1800'),
('close_reg_aff', '0'),
('close_reg_adv', '0'),
('reg_money', '0'),
('regmoney_type', 'week'),
('regmoney', ''),
('aff_reg_status', '0'),
('adv_reg_status', '0'),
('min_clearing', '100'),
('clearing_tax', '5'),
('clearing_charges', '0'),
('clearing_cycle', 'week'),
('clearing_weekdata', '1'),
('clearing_monthdata', '7'),
('min_pay', '0'),
('default_pay', 'chinabank'),
('99bill_id', ''),
('99bill_key', ''),
('chinabank_id', ''),
('chinabank_key', ''),
('alipay_email', ''),
('alipay_id', ''),
('alipay_key', ''),
('tenpay_id', ''),
('tenpay_key', ''),
('cpc_deduction', '30'),
('cpm_deduction', '0'),
('cpa_deduction', '0'),
('cps_deduction', '0'),
('cpv_deduction', '0'),
('union_ck', '9'),
('recommend_tc', '2'),
('recommend_status', '1'),
('ip_del_date', '7'),
('add_day_pv', '0'),
('gmt_time', '8'),
('make_html', '0'),
('check_code', '1'),
('reg_type', '0'),
('sync_load', 'www.zyiis.com'),
('clearing_atuo', '0'),
('show_text_noads', '没有合适的广告可显示，请返回联盟重新选择广告'),
('show_text_nodomain', '域名限制'),
('show_text_nouserstatus', '用户未激活'),
('show_text_nozone', '广告位出错，请重新选择广告或是删除当前广告位'),
('inip_admin', '0'),
('in_admin_ip', ''),
('integral_status', '1'),
('integral_day', '17'),
('integral_daypv', '100'),
('integral_topay', '1'),
('reg_code', '1'),
('tax_status', '1'),
('tax_1', '800'),
('tax_2_1', '800'),
('tax_2_2', '4000'),
('tax_2_bfb', '20'),
('tax_3_1', '4000'),
('tax_3_2', '20000'),
('tax_3_bfb', '20'),
('tax_4_1', '20000'),
('tax_4_2', '50000'),
('tax_4_bfb', '30'),
('tax_5_1', '50000'),
('tax_5_2', ''),
('tax_5_bfb', '40'),
('tax_6_1', ''),
('tax_6_2', ''),
('tax_6_bfb', '');
 

DROP TABLE IF EXISTS `zyads_site`;
CREATE TABLE `zyads_site` (
  `siteid` int(9) NOT NULL AUTO_INCREMENT,
  `uid` mediumint(8) NOT NULL,
  `sitename` varchar(200) NOT NULL,
  `siteurl` varchar(200) NOT NULL,
  `pertainurl` mediumtext,
  `sitetype` varchar(100) NOT NULL,
  `siteinfo` varchar(100) DEFAULT NULL,
  `sex` tinyint(1) NOT NULL DEFAULT '1',
  `age` tinyint(1) NOT NULL DEFAULT '1',
  `occupation` tinyint(1) NOT NULL DEFAULT '1',
  `income` tinyint(1) NOT NULL DEFAULT '1',
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `denyinfo` varchar(255) DEFAULT NULL,
  `alexapr` varchar(20) DEFAULT '0',
  `alexa` mediumint(8) NOT NULL DEFAULT '0',
  `pr` tinyint(3) NOT NULL DEFAULT '0',
  `beian` varchar(30) DEFAULT NULL,
  `grade` tinyint(1) NOT NULL DEFAULT '0',
  `addtime` datetime NOT NULL,
  PRIMARY KEY (`siteid`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=1 ;

 

DROP TABLE IF EXISTS `zyads_sitetype`;
CREATE TABLE `zyads_sitetype` (
  `sid` mediumint(9) NOT NULL AUTO_INCREMENT,
  `parentid` mediumint(9) NOT NULL DEFAULT '0',
  `sitename` char(100) NOT NULL,
  PRIMARY KEY (`sid`),
  KEY `sitename` (`sitename`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=135 ;

 

INSERT INTO `zyads_sitetype` (`sid`, `parentid`, `sitename`) VALUES
(1, 0, '门户网站'),
(2, 0, '影音娱乐'),
(3, 0, '潮流时尚'),
(4, 0, '互联网'),
(5, 0, '投资理财'),
(6, 0, '教育招聘'),
(7, 0, '数码硬件'),
(8, 0, '生活资讯'),
(9, 0, '动漫游戏'),
(10, 0, '旅游户外'),
(11, 0, '汽车'),
(12, 0, '运动体育'),
(13, 0, '爱好收藏'),
(14, 0, '个性生活'),
(16, 0, '医疗健康'),
(17, 0, '两性生活'),
(18, 0, '人文艺术'),
(19, 0, '网上商城'),
(20, 0, '企业服务'),
(21, 0, '个人博客'),
(22, 0, '其它'),
(110, 1, '门户网站'),
(111, 1, '音乐影视'),
(112, 1, '游戏'),
(113, 1, '网址导航'),
(114, 1, '数码及手机'),
(115, 1, '博客'),
(116, 1, '电脑及硬件'),
(117, 1, '医疗保健'),
(118, 1, '女性时尚'),
(119, 1, '教学及考试'),
(120, 1, '生活服务'),
(121, 1, '房产家居'),
(122, 1, '汽车'),
(123, 1, '交通旅游'),
(124, 1, '体育运动'),
(125, 1, '投资金融'),
(126, 1, '新闻媒体'),
(127, 1, '人文艺术'),
(128, 1, '小说'),
(129, 1, '人才招聘'),
(130, 1, '网络购物'),
(131, 1, 'QQ及非主流'),
(132, 1, '下载'),
(133, 1, '宠物及摄影');

 

DROP TABLE IF EXISTS `zyads_specs`;
CREATE TABLE `zyads_specs` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `width` int(5) NOT NULL DEFAULT '0',
  `height` int(5) NOT NULL DEFAULT '0',
  `sort` int(5) NOT NULL DEFAULT '0',
  `type` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=49 ;

 

INSERT INTO `zyads_specs` (`id`, `width`, `height`, `sort`, `type`) VALUES
(37, 120, 60, 37, '小幅广告'),
(36, 300, 250, 36, '巨幅广告'),
(35, 336, 280, 35, '巨幅广告'),
(34, 200, 200, 34, '巨幅广告'),
(33, 250, 250, 33, '巨幅广告'),
(32, 360, 190, 32, '巨幅广告'),
(31, 250, 300, 31, '巨幅广告'),
(30, 180, 250, 30, '垂直广告'),
(29, 160, 600, 29, '垂直广告'),
(28, 120, 240, 28, '垂直广告'),
(27, 120, 600, 27, '垂直广告'),
(26, 950, 90, 5, '横幅广告'),
(25, 728, 90, 4, '横幅广告'),
(24, 250, 60, 3, '横幅广告'),
(23, 468, 60, 2, '横幅广告'),
(22, 760, 90, 1, '横幅广告'),
(47, 320, 270, 38, '右下角飘浮'),
(48, 270, 200, 39, '右下角飘浮');

 

DROP TABLE IF EXISTS `zyads_stats`;
CREATE TABLE `zyads_stats` (
  `views` mediumint(8) NOT NULL DEFAULT '0',
  `num` mediumint(8) NOT NULL DEFAULT '0',
  `clicks` mediumint(8) NOT NULL DEFAULT '0',
  `do2click` mediumint(8) NOT NULL DEFAULT '0',
  `day` date NOT NULL DEFAULT '0000-00-00',
  `planid` mediumint(8) NOT NULL DEFAULT '0',
  `adsid` mediumint(8) NOT NULL DEFAULT '0',
  `uid` mediumint(8) NOT NULL DEFAULT '0',
  `siteid` mediumint(8) NOT NULL DEFAULT '0',
  `zoneid` mediumint(8) NOT NULL DEFAULT '0',
  `plantype` char(3) NOT NULL,
  `adstypeid` mediumint(8) NOT NULL,
  `deduction` mediumint(8) NOT NULL DEFAULT '0',
  `zonetype` varchar(5) DEFAULT NULL,
  `sumprofit` decimal(10,4) NOT NULL DEFAULT '0.0000',
  `sumpay` decimal(10,4) NOT NULL DEFAULT '0.0000',
  `sumadvpay` decimal(10,4) NOT NULL DEFAULT '0.0000',
  `orders` mediumint(8) NOT NULL DEFAULT '0',
  `linkuid` mediumint(8) NOT NULL DEFAULT '0',
  UNIQUE KEY `unique` (`day`,`zoneid`,`adsid`,`uid`,`planid`),
  KEY `day` (`day`),
  KEY `planid` (`planid`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

 

DROP TABLE IF EXISTS `zyads_tempcip`;
CREATE TABLE `zyads_tempcip` (
  `ip` char(15) NOT NULL,
  `planid` mediumint(8) NOT NULL,
  `adsid` mediumint(8) NOT NULL DEFAULT '0',
  `zoneid` mediumint(8) NOT NULL DEFAULT '0',
  `day` date NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT '0',
  KEY `ip` (`ip`),
  KEY `planid` (`planid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

 

DROP TABLE IF EXISTS `zyads_tempip`;
CREATE TABLE `zyads_tempip` (
  `ip` char(15) NOT NULL,
  `plantype` char(3) NOT NULL,
  `planid` mediumint(8) NOT NULL,
  `uid` mediumint(8) NOT NULL DEFAULT '0',
  `adsid` mediumint(8) NOT NULL DEFAULT '0',
  `zoneid` mediumint(8) NOT NULL DEFAULT '0',
  `day` date NOT NULL,
  `hour` tinyint(3) NOT NULL DEFAULT '0',
  `minute` int(11) NOT NULL DEFAULT '0',
  KEY `ip` (`ip`),
  KEY `planid` (`planid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

 

DROP TABLE IF EXISTS `zyads_upadslog`;
CREATE TABLE `zyads_upadslog` (
  `uplogid` mediumint(8) NOT NULL AUTO_INCREMENT,
  `adsid` mediumint(9) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `adstype` char(4) NOT NULL,
  `adstypeid` mediumint(8) NOT NULL,
  `olddata` mediumtext NOT NULL,
  `updata` mediumtext NOT NULL,
  `addtime` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`uplogid`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=1 ;

 

DROP TABLE IF EXISTS `zyads_users`;
CREATE TABLE `zyads_users` (
  `uid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` char(32) NOT NULL,
  `question` varchar(20) NOT NULL,
  `answer` varchar(50) NOT NULL,
  `email` varchar(40) NOT NULL,
  `qq` varchar(11) NOT NULL,
  `tel` varchar(50) NOT NULL,
  `mobile` varchar(13) NOT NULL,
  `accountname` varchar(120) NOT NULL,
  `bank` varchar(20) NOT NULL,
  `bankname` varchar(100) NOT NULL,
  `bankacc` varchar(120) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `company` varchar(100) DEFAULT NULL,
  `companyinfo` varchar(100) DEFAULT NULL,
  `recommend` varchar(8) DEFAULT NULL COMMENT '推荐人',
  `regtime` datetime NOT NULL,
  `regip` char(15) NOT NULL,
  `logintime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `loginnum` mediumint(8) NOT NULL DEFAULT '0',
  `loginip` char(15) NOT NULL DEFAULT '0.0.0.0',
  `cpmdeduction` tinyint(3) NOT NULL DEFAULT '0',
  `cpcdeduction` tinyint(3) NOT NULL DEFAULT '0',
  `cpadeduction` tinyint(3) NOT NULL DEFAULT '0',
  `cpsdeduction` tinyint(3) NOT NULL DEFAULT '0',
  `cpvdeduction` tinyint(3) NOT NULL DEFAULT '0',
  `money` double(12,4) DEFAULT '0.0000',
  `daymoney` double(12,4) NOT NULL DEFAULT '0.0000',
  `weekmoney` double(12,4) DEFAULT '0.0000',
  `monthmoney` double(12,4) DEFAULT '0.0000',
  `xmoney` double(12,4) NOT NULL DEFAULT '0.0000',
  `integral` int(10) unsigned NOT NULL DEFAULT '0',
  `activateid` varchar(11) NOT NULL,
  `clusterid` tinyint(3) NOT NULL DEFAULT '0',
  `type` tinyint(1) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `userinfo` varchar(200) DEFAULT NULL,
  `view` mediumint(8) NOT NULL DEFAULT '0',
  `pvstep` smallint(4) NOT NULL DEFAULT '0',
  `serviceid` mediumint(8) NOT NULL DEFAULT '0',
  `nums` mediumint(8) NOT NULL DEFAULT '0',
  `cpczlink` tinyint(1) NOT NULL DEFAULT '1',
  `cpazlink` tinyint(1) NOT NULL DEFAULT '1',
  `cpszlink` tinyint(1) NOT NULL DEFAULT '1',
  `cpmzlink` tinyint(1) NOT NULL DEFAULT '1',
  `insite` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`uid`),
  KEY `username` (`username`),
  KEY `type` (`type`),
  KEY `daymoney` (`daymoney`),
  KEY `weekmoney` (`weekmoney`),
  KEY `monthmoney` (`monthmoney`),
  KEY `serviceid` (`serviceid`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=1000 ;

 

DROP TABLE IF EXISTS `zyads_zone`;
CREATE TABLE `zyads_zone` (
  `zoneid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `uid` mediumint(8) NOT NULL,
  `siteid` mediumint(8) NOT NULL DEFAULT '0',
  `zonename` varchar(255) NOT NULL,
  `zonetype` varchar(10) NOT NULL,
  `zoneinfo` varchar(255) NOT NULL,
  `plantype` char(3) NOT NULL,
  `adstypeid` mediumint(8) NOT NULL,
  `viewtype` tinyint(1) NOT NULL DEFAULT '0',
  `viewadsid` varchar(255) DEFAULT NULL,
  `width` smallint(6) NOT NULL DEFAULT '0',
  `height` smallint(6) NOT NULL DEFAULT '0',
  `cpmtime` mediumint(8) NOT NULL DEFAULT '0',
  `cpmtimenum` tinyint(1) NOT NULL DEFAULT '0',
  `codestyle` varchar(255) NOT NULL,
  `alternatetype` tinyint(1) DEFAULT '0',
  `alternateurl` varchar(255) DEFAULT NULL,
  `addtime` datetime NOT NULL,
  PRIMARY KEY (`zoneid`),
  KEY `uid` (`uid`),
  KEY `siteid` (`siteid`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=1 ;

 