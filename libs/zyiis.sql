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
(1, 0, '', 'cpc', '���', 'null', '', '', NULL, 1, '0000-00-00 00:00:00'),
(2, 0, '', 'cpm', '����', 'null', '', '', NULL, 1, '0000-00-00 00:00:00'),
(3, 0, '', 'cpa', 'ע��', 'null', '', '', NULL, 1, '0000-00-00 00:00:00'),
(4, 0, '', 'cps', '����', 'null', '', '', NULL, 1, '0000-00-00 00:00:00'),
(5, 0, '', 'cpv', 'չʾ', 'null', '', '', NULL, 1, '0000-00-00 00:00:00'),
(7, 1, '', 'cpc', '��ͨͼƬ/Flash', 'iframe', 'a:4:{i:0;s:3:"url";i:1;s:8:"imageurl";i:2;s:5:"width";i:3;s:6:"height";}', '<a target="_blank" href="{targeturl}"><img src="{imgurl}" border="0" width="{width}" height="{height}" ></a>', '', 1, '2010-04-02 00:23:45'),
(8, 1, '', 'cpc', '��ժ���', 'iframe', 'a:3:{i:0;s:5:"width";i:1;s:6:"height";i:2;s:8:"htmlcode";}', '{htmlcode}', '', 1, '2010-04-02 00:52:14'),
(9, 2, '', 'cpm', '��ͨ����', 'script', 'a:1:{i:0;s:3:"url";}', 'function objpop(url){ \r\ntry{var _adds_=_Zadds_()}catch(e){var _adds_="";}\r\nvar obj=new Object; \r\n obj.isop=0;\r\n obj.w=window;\r\n obj.d=document;\r\n obj.width=screen.width;\r\n obj.height=screen.height; \r\n obj.userAgent = navigator.userAgent.toLowerCase();\r\n obj.url = url+_adds_;\r\n obj.openstr="width="+obj.width+",height="+ obj.height+",toolbar=1,location=1,titlebar=1,menubar=1,scrollbars=1,resizable=1,directories=1,status=1";\r\n obj.browser = {\r\n        version: (obj.userAgent.match( /(?:rv|it|ra|ie)[\\/: ]([\\d.]+)/ ) || [0,"0"])[1] ,\r\n        safari: /webkit/.test(obj.userAgent ),\r\n        opera: /opera/.test( obj.userAgent ),\r\n        ie: /msie/.test( obj.userAgent ) && !/opera/.test( obj.userAgent ),\r\n        max: /maxthon/.test( obj.userAgent ),\r\n        se360: /360/.test( obj.userAgent ),\r\n        tw: /theworld/.test( obj.userAgent ),\r\n        tt: /tencenttraveler/.test(obj.userAgent),\r\n        ttqq: /QQBrowser/.test(obj.userAgent),\r\n        tt5: /qqbrowser/.test(obj.userAgent),\r\n        sg: /se /.test(obj.userAgent),\r\n        ff: /mozilla/.test(obj.userAgent)&&!/(compatible|webkit)/.test(obj.userAgent),\r\n    chrome: /chrome/.test(obj.userAgent)\r\n    }; \r\nobj.open = function(){\r\n    if(obj.browser.ie){\r\n        if(!document.getElementById("_launchURL_{zoneid}"))\r\n        document.write("<object id=_launchURL_{zoneid} width=0 height=0 classid=CLSID:6BF52A52-394A-11D3-B153-00C04F79FAA6></object>");\r\n        if(!document.getElementById("_DOMScript_{zoneid}"))\r\n        document.write("<object id=_DOMScript_{zoneid}  style=position:absolute;left:1px;top:1px;width:1px;height:1px; classid=clsid:2D360201-FFF5-11d1-8D03-00A0C959BC0A></object>");\r\n    } \r\n   \r\n        try{\r\n            obj.o1=window.open(obj.url,"_blank",obj.openstr+",left=0,top=0");\r\n        }catch(err){\r\n            obj.o1="";\r\n        }\r\n        if(obj.o1){\r\n                if (!obj.browser.chrome){  \r\n                 obj.w.focus();\r\n                obj.isop=1;\r\n            }else {\r\n                 obj.c(); \r\n            }\r\n           \r\n        }else{\r\n            if(obj.browser.ie){\r\n                try{\r\n                    if (obj.browser.sg)\r\n                    {\r\n                       obj.cg(); \r\n                    }\r\n                    else if(  obj.browser.ttqq  || obj.browser.max  || obj.browser.se360 ||obj.browser.tw ||obj.browser.tt || obj.browser.version=="7.0" || obj.browser.version=="8.0" || obj.browser.version=="9.0"){\r\n                            setTimeout(obj.lop,200);\r\n                        }else {\r\n                            obj.iev6 = true;\r\n                            obj.dsp();\r\n                        }\r\n                 \r\n                }catch(err){\r\n                    obj.c();\r\n                }\r\n                \r\n            }else{\r\n                obj.c();\r\n            }\r\n        }\r\n   \r\n   setTimeout(obj.nt,600);\r\n     \r\n  if(obj.browser.sg || obj.browser.max ){\r\n          \r\n     }\r\n     else {\r\n         if(!obj.isop) obj.ab = setInterval(obj.c,1000);\r\n     }\r\n\r\n};\r\nobj.nt = function(){\r\n    if(obj.isop==0){\r\n        if(obj.iev6) obj.dsp();\r\n        else obj.lop();\r\n    }\r\n}\r\nobj.dsp=function(){\r\n    if(obj.isop) return null;\r\n    try{ \r\n    setTimeout(function(){document.getElementById("_DOMScript_{zoneid}").DOM.Script.open(obj.url,"_blank",obj.openstr);obj.w.focus();obj.isop=1; },200);\r\n    }catch(err){ }\r\n}\r\nobj.lop=function(){ \r\n    if(obj.isop) return null;\r\n    try{\r\n        obj.isop=1;\r\n        document.getElementById("_launchURL_{zoneid}").launchURL(obj.url) ;\r\n       \r\n    }catch(err){\r\n        obj.isop=0;    \r\n    }\r\n}\r\nobj.lap=function(){\r\n     if(obj.browser.ie && obj.isop==0){\r\n        if(window.attachEvent){\r\n            window.attachEvent("onload",function (){\r\n                obj.lop();\r\n            })\r\n        }else {\r\n            if(window.addEventListener){\r\n                window.addEventListener("load",function (){\r\n                    obj.lop();        \r\n                },true)\r\n            }else {\r\n                window.onload=function (){\r\n                    obj.lop();\r\n                }\r\n            }\r\n        }\r\n     }\r\n     \r\n}\r\nobj.adv= function (el, evname, func) {\r\n    if (el.attachEvent) {  \r\n        el.attachEvent("on" + evname, func);\r\n    } else if (el.addEventListener) {  \r\n        el.addEventListener(evname, func, true);\r\n    } else {\r\n        el["on" + evname] = func;\r\n    }\r\n}\r\nobj.rdv= function (el, evname, func) {\r\n    if (el.removeEventListener) {\r\n        el.removeEventListener(evname, func, false);\r\n    } else if (el.detachEvent) {\r\n        el.detachEvent("on" + evname, func);\r\n    } else { \r\n        el["on" + evname] = null;\r\n    }\r\n}\r\nobj.cg = function(){ \r\n        var ids =  "a_z_"+Math.ceil(Math.random()*100);\r\n        var prePage=document.createElement("a");\r\n        prePage.href=obj.url;\r\n        prePage.id = ids;\r\n        //prePage.onclick=function(){};\r\n        prePage.target="_blank";     \r\n        prePage.style.position="absolute";\r\n        prePage.style.zIndex="10000";\r\n        prePage.style.backgroundColor="#fff";\r\n        prePage.style.opacity="0.1";\r\n        prePage.style.filter="alpha(opacity:1)";\r\n        prePage.style.display="block";\r\n        prePage.style.top="0px";\r\n        prePage.style.left="0px";\r\n        document.body.appendChild(prePage);\r\n      var el=document.getElementById(prePage.id);\r\n      var m = setInterval(function() {\r\n            var d = document.body;e=document.documentElement;\r\n            document.compatMode=="BackCompat" ?  t=d.scrollTop : t=e.scrollTop==0?d.scrollTop:e.scrollTop;    \r\n            el.style.top=t+"px";\r\n            el.style.width = d.clientWidth + "px";\r\n            el.style.height = d.clientHeight + "px";\r\n        }, 200);\r\n        el.onclick = function(e) {\r\n            setTimeout(function() {\r\n                el.parentNode.removeChild(el)\r\n            }, 200);\r\n            clearInterval(m); \r\n            obj.isop=1;\r\n        };\r\n}\r\nobj.c = function(){   \r\n     obj.rdv(document, "click", obj.ck{zoneid}); \r\n     obj.adv(document, "click", obj.ck{zoneid} ); \r\n};\r\nobj.ck{zoneid} = function(){   \r\n    if(obj.isop) { \r\n        obj.rdv(document, "click", obj.ck{zoneid}); \r\n         clearInterval(obj.ab);\r\n        return null;\r\n    }\r\n    obj.o2=window.open(obj.url,"_blank",obj.openstr+",left=0,top=0");\r\n            obj.w.focus();\r\n            if(obj.o2){\r\n                 obj.rdv(document, "click", obj.ck{zoneid});\r\n                 clearInterval(obj.ab);\r\n                 obj.isop=1;\r\n            }\r\n};\r\nreturn obj; \r\n} \r\nvar oP{zoneid}=objpop("{targeturl}"); \r\noP{zoneid}.open();', '', 1, '2010-04-14 13:35:25'),
(10, 2, '', 'cpm', '���ⵯ��', 'script', 'a:3:{i:0;s:3:"url";i:1;s:5:"width";i:2;s:6:"height";}', 'var_zY_Url= "{targeturl}";\r\nimg_url = "{imgserver}/images/cpmvp";\r\nvir_width = "{width}";\r\nvir_height = "{height}";\r\nvir_TitleText  = "";\r\nvir_url = "<IFRAME src=\\"{adurl}\\"  marginWidth=0 marginHeight=0 frameborder=0 scrolling=no width={width} Height={height} onload=\\"c_vir_on()\\"></IFRAME>";\r\ndocument.write("<script src=\\"{jsserver}/js/xn.js\\"></script>");', '', 1, '2010-04-14 13:35:25'),
(11, 1, '', 'cpc', '���½�Ư��', 'script', 'a:4:{i:0;s:3:"url";i:1;s:8:"imageurl";i:2;s:5:"width";i:3;s:6:"height";}', 'yP_statsUrl= "{targeturl}"; \r\nyP_unionUrl="{unionurl}"; \r\nyP_width={width};\r\nyP_height={height};\r\nyP_imgurl= "{imgurl}"; \r\nyP_imgServer="{imgserver}"; \r\nyP_planType = "cpc"; \r\ndocument.write("<script src=\\"{jsserver}/js/yp.js\\"></script>");', '', 1, '2010-04-17 18:26:34'),
(12, 1, '', 'cpc', '�������', 'script', 'a:4:{i:0;s:3:"url";i:1;s:8:"imageurl";i:2;s:5:"width";i:3;s:6:"height";}', '\r\ndL_Ads_Url= "{targeturl}";\r\ndL_Width={width};\r\ndL_Height={height};\r\ndL_Img_url= "{imgurl}";\r\ndL_Img_url1= "{imgurl1}";\r\ndL_Img_host="{imgserver}";\r\ndocument.write("<script src=\\"{jsserver}/js/dl.js\\"></script>");\r\n', '', 1, '2010-04-17 18:26:59'),
(13, 1, '', 'cpc', '������', 'iframe', 'a:4:{i:0;s:3:"url";i:1;s:8:"headline";i:2;s:11:"description";i:3;s:7:"dispurl";}', '{text}', '', 1, '2010-04-17 18:29:25'),
(14, 2, '', 'cpm', '�˳�����', 'script', 'a:1:{i:0;s:3:"url";}', 'pU_zY_Url= "{targeturl}";\r\ndocument.write("<script src=\\"{jsserver}/js/tt.js\\"></script>");', '', 1, '2010-04-17 18:32:30'),
(15, 5, '', 'cpv', '���½�Ư��', 'script', 'a:4:{i:0;s:3:"url";i:1;s:8:"imageurl";i:2;s:5:"width";i:3;s:6:"height";}', 'yP_statsUrl= "{targeturl}";  \r\nyP_unionUrl="{unionurl}";  \r\nyP_width={width};\r\nyP_height={height};\r\nyP_imgurl= "{imgurl}";  \r\nyP_imgServer="{imgserver}"; \r\nyP_planType = "cpv";  \r\nyP_tourl = "{targeturl}" \r\nyp_doclick2url = "{jumpserver}/iclk/do2click.php?type=cpv&planid={planid}&adsid={adsid}&zoneid={zoneid}";\r\ndocument.write("<script src=\\"{jsserver}/js/yp.js\\"></script>");\r\n', '', 1, '2010-04-17 18:34:03'),
(16, 3, '', 'cpa', '��ͨͼƬ/Flash', 'iframe', 'a:4:{i:0;s:3:"url";i:1;s:8:"imageurl";i:2;s:5:"width";i:3;s:6:"height";}', '<a target="_blank" href="{targeturl}"><img src="{imgurl}" border="0" width="{width}" height="{height}" ></a>', '', 1, '2010-04-17 18:35:27'),
(17, 3, '', 'cpa', '��ժ���', 'iframe', 'a:3:{i:0;s:5:"width";i:1;s:6:"height";i:2;s:8:"htmlcode";}', '{htmlcode}', '', 1, '2010-04-17 18:35:47'),
(18, 3, '', 'cpa', '���½�Ư��', 'script', 'a:4:{i:0;s:3:"url";i:1;s:8:"imageurl";i:2;s:5:"width";i:3;s:6:"height";}', 'yP_statsUrl= "{targeturl}"; \r\nyP_unionUrl="{unionurl}"; \r\nyP_width={width};\r\nyP_height={height};\r\nyP_imgurl= "{imgurl}"; \r\nyP_imgServer="{imgserver}"; \r\nyP_planType = "cpa"; \r\ndocument.write("<script src=\\"{jsserver}/js/yp.js\\"></script>");', '', 1, '2010-04-17 18:45:18'),
(19, 3, '', 'cpa', '�������', 'script', 'a:4:{i:0;s:3:"url";i:1;s:8:"imageurl";i:2;s:5:"width";i:3;s:6:"height";}', '\r\ndL_Ads_Url= "{targeturl}";\r\ndL_Width={width};\r\ndL_Height={height};\r\ndL_Img_url= "{imgurl}";\r\ndL_Img_url1= "{imgurl1}";\r\ndL_Img_host="{imgserver}";\r\ndocument.write("<script src=\\"{jsserver}/js/dl.js\\"></script>");\r\n', '', 1, '2010-04-17 18:45:28'),
(20, 4, '', 'cps', '��ͨͼƬ/Flash', 'iframe', 'a:4:{i:0;s:3:"url";i:1;s:8:"imageurl";i:2;s:5:"width";i:3;s:6:"height";}', '<a target="_blank" href="{targeturl}"><img src="{imgurl}" border="0" width="{width}" height="{height}" ></a>', '', 1, '2010-04-17 18:45:40'),
(21, 4, '', 'cps', '��ժ���', 'iframe', 'a:3:{i:0;s:5:"width";i:1;s:6:"height";i:2;s:8:"htmlcode";}', '{htmlcode}', '', 1, '2010-04-17 18:45:59'),
(22, 4, '', 'cps', '���½�Ư��', 'script', 'a:4:{i:0;s:3:"url";i:1;s:8:"imageurl";i:2;s:5:"width";i:3;s:6:"height";}', 'yP_statsUrl= "{targeturl}"; \r\nyP_unionUrl="{unionurl}"; \r\nyP_width={width};\r\nyP_height={height};\r\nyP_imgurl= "{imgurl}"; \r\nyP_imgServer="{imgserver}"; \r\nyP_planType = "cps"; \r\ndocument.write("<script src=\\"{jsserver}/js/yp.js\\"></script>");', '', 1, '2010-04-17 18:46:16'),
(23, 4, '', 'cps', '�������', 'script', 'a:4:{i:0;s:3:"url";i:1;s:8:"imageurl";i:2;s:5:"width";i:3;s:6:"height";}', '\r\ndL_Ads_Url= "{targeturl}";\r\ndL_Width={width};\r\ndL_Height={height};\r\ndL_Img_url= "{imgurl}";\r\ndL_Img_url1= "{imgurl1}";\r\ndL_Img_host="{imgserver}";\r\ndocument.write("<script src=\\"{jsserver}/js/dl.js\\"></script>");\r\n', '', 1, '2010-04-17 18:46:26'),
(24, 127, '', '', '�Զ�������', 'Iframe', '', '', NULL, 1, '0000-00-00 00:00:00'),
(25, 5, '', 'cpv', '���½���ժ', 'script', 'a:3:{i:0;s:5:"width";i:1;s:6:"height";i:2;s:8:"htmlcode";}', 'yP_statsUrl= "{targeturl}";  \r\nyP_unionUrl="{unionurl}";  \r\nyP_width={width};\r\nyP_height={height};\r\nyP_imgurl= "{imgurl}"; \r\nyP_htmlcode = "{htmlcode}"; \r\nyP_imgServer="{imgserver}";\r\nyP_planType = "cpv"; \r\nyP_tourl = "{adurl}";\r\nyp_doclick2url = "{jumpserver}/iclk/do2click.php?type=cpv&planid={planid}&adsid={adsid}&zoneid={zoneid}";\r\ndocument.write("<script src=\\"{jsserver}/js/yph.js\\"></script>");', '', 1, '2010-09-09 16:41:20'),
(26, 5, '', 'cpv', '���½�Ư��', 'script', 'a:4:{i:0;s:3:"url";i:1;s:8:"imageurl";i:2;s:5:"width";i:3;s:6:"height";}', 'yP_statsUrl= "{targeturl}";  \r\nyP_unionUrl="{unionurl}";  \r\nyP_width={width};\r\nyP_height={height};\r\nyP_imgurl= "{imgurl}";  \r\nyP_imgServer="{imgserver}"; \r\nyP_planType = "cpv";  \r\nyP_tourl = "{targeturl}" \r\nyp_doclick2url = "{jumpserver}/iclk/do2click.php?type=cpv&planid={planid}&adsid={adsid}&zoneid={zoneid}";\r\ndocument.write("<script src=\\"{jsserver}/js/zp.js\\"></script>");\r\n', '', 1, '2010-09-09 19:39:52'),(27, 5, '', 'cpv', '��ͨͼƬ', 'iframe', 'a:4:{i:0;s:3:"url";i:1;s:8:"imageurl";i:2;s:5:"width";i:3;s:6:"height";}', '<script>\r\ndL_fileex = "{imgurl}";\r\ndL_fileex=dL_fileex.substr(dL_fileex.lastIndexOf(".")).toLowerCase();\r\nif(this.dL_fileex!=".swf"){\r\n    document.write("<a target=_blank href={targeturl} onclick=\\"_Zuc_()\\"><img src={imgurl} border=0 width={width} height={height} ></a>");\r\n}\r\ndocument.write("<div style=\\"position:absolute;z-index:10000;background-color:#fff;opacity:0.01;filter:alpha(opacity:1);\\"><a href={targeturl} target=_blank style=\\"display:block;width:{width}px;height:{height}px;\\" onclick=\\"_Zuc_()\\" ></a></div><div style=\\"position:absolute;z-index:9999; cursor:pointer;\\"><embed src={imgurl} type=\\"application/x-shockwave-flash\\" height={height} width={width}  quality=high wmode=opaque allowscriptaccess=always ></div>"); \r\nP_statsUrl= "{targeturl}";  \r\np_doclick2url = "{jumpserver}/iclk/do2click.php?type=cpv&planid={planid}&adsid={adsid}&zoneid={zoneid}";\r\nfunction _ZVa_(){if(document.body){var zY_a=new Image();zY_a.src=P_statsUrl;}}\r\nfunction _Zuc_(){var a=new Image();a.src=p_doclick2url;}\r\nsetTimeout("_ZVa_()",5000);\r\n</script>', '', 1, '2012-05-10 18:54:19');

 
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
-- ת����е����� `zyads_help`
--

INSERT INTO `zyads_help` (`id`, `tit`, `conn`, `type`, `color`, `time`, `status`) VALUES
(4, '�ɷ�ѹ�������ڶ��ҳ�������ͬһ��ҳ��Ŷ�������룿', 'Ϊ�����ӵ���/����Ļ��ʣ����Ǳ���δ֪���ص���ĳҳ�� �޷��������ڻ��޷����������\r\n���ڶ��ҳ����Ͷ�Ź��������ͬһ��ҳ��Ͷ�Ŷ�������롣', 0, NULL, '2007-07-10 02:16:35', 1),
(2, 'ʲô����վ��', '�ǹ�潻��˫��������һ��������վ��ӵ���ߣ������޸ġ�������ɾ����վ���ݵ�Ȩ�������е���ط������εķ��ˡ���������վ��Ͷ�Ź�����Ĺ��󣬲����ձ�ƽ̨�涨ͨ����ƽ̨��ȡӶ��', 0, NULL, '2007-07-10 02:05:53', 1),
(3, '�ɲ����Խ�������ڿհ�ҳ�', 'ǿ�ҽ��鲻Ҫ��������ڿհ�ҳ�����ֻ�й������ҳ�棡��Ϊ�⽫���¹�����ڲ鿴\r\n���������ϸʱ�����հ�ҳ�����ֻ�й�����ҳ���������ᣬ�Ӷ����¹����������Ͷ�ߡ�', 0, NULL, '2007-07-10 02:11:29', 1),
(6, '�����׬Ǯ��', '��վ�ṩ���ַ�����������ù��������������������һ�������ֽ𡣼򵥵�˵��ֻҪ�е�����ͱ�ʾ���Ѿ�׬��Ǯ��Ŷ ', 0, NULL, '2007-07-16 02:25:33', 1),
(7, '������ô���Ѹ���', '����Ŀǰͨ���������жԿͻ���û�еĻ�Ա�뵽������Ѱ��� ', 0, NULL, '2007-07-16 02:25:55', 1),
(8, 'ʲôʱ��Ǯ����', '�������ʻ���������ָ����֧����ʱ�����ǻ��Զ�����֧���� ', 0, NULL, '2007-07-16 02:26:57', 1),
(9, '��վ����Ա��˱�׼��ʲô', '1. ��վ������治�ܰ����κ�Υ�����ҷ��ɵ����ݡ� \r\n����2. ��վ������治�ܺ��ж��Դ��뼰���������ܰ��������������ݣ�����ˡ��ԡ�ɫ\r\n�顢���ࡢ�Ĳ��������������ȵȡ� \r\n����3. �������Լ��Ĺ��ʶ�����������Ҷ�������(��:http://www.abc.com)��ԭ���ϲ�ͨ��\r\nʹ�ö������������������վ����ˡ� \r\n����4. ��ֻ����̳����ʵ�����ݻ�ҳ���Ű治��רҵ���۵���վһ�ɲ���ͨ���� \r\n����5. ÿ����ҳ�ĵ������ڲ��ó���1���������Զ�����һ������Ҫ����Ϊ��ҳ������ղص�\r\n���ƶԻ��� \r\n��������վ��ͨ����˺�Υ�����ٷ������ϱ�׼�е��κ�һ�������˽�����������ֹ����\r\n��ϵ��Ȩ���� ', 0, NULL, '2007-07-16 02:28:17', 1),
(10, '��վ����Ա��ʲô����»ᱻ�ܸ�����', '1����վ�������Υ���˹��ҷ��ɻ��ж��Դ����벡�������������ˡ��ԡ�ɫ�顢\r\n���ࡢ�Ĳ��������������ȵȲ����������ݡ� \r\n����2����Ͷ�Ź�����ҳ�����ڻ�Աӵ�С� \r\n����3��ǣ�浽֪ʶ��Ȩ���׵���վ����Ƿ� MP3 �����������վ���ڿ�վ�㣬�������\r\n��վ�㣬ע�����ע����վ�㣬����������Щ��ҳ��վ�㣩�� \r\n����4�����ӡ����ۻ��ṩӰ��������������ݣ����ṩ�ʼ�ը��������������ȵ���վ�� \r\n����5�������׵��ʻ�����һ����������ܾ�֧������ȫ����Ӷ�𣬲������ʻ��� \r\n����6�������ͬһ��ע�����ʺŵ���վ�� \r\n����7��ʹ�÷� HTML �ֶΡ� JAVASRIPT ���ڡ����� FRAME ��CGI �Զ����ɡ���ҳ\r\nREFRESH/AUTOLOAD ���ֶ�����������롣 \r\n����8�������ɻ�Ա���˻�ָʾ����ʾ�������������Ի�ȡ�Ƿ����ѡ� ', 0, NULL, '2007-07-16 02:29:26', 1),
(11, '������ݶ��ͳ��һ��', 'ʵʱͳ�ơ�\r\nͨ����ϵͳ�ṩ�ľ�ȷ��ϸ�����ݼ�ֱ�۵�ͼ��ͳ�ƣ��������Ա����ʵʱ�鿴��ÿ��Ĺ��\r\n���ݼ���ʷ��ϸ���ݣ����Բ�ѯ��ÿ���ж����˿������Ĺ��(�����ݵ������������)����ʾ���Ĳ�Ʒ�ڸ���ʱ��ε�����״���� ', 1, NULL, '2007-07-16 02:34:53', 1),
(12, '�������������Ч��', '����һ���Ƚϸ��ӵ����⣬������һЩ�ο��۵㡣 \r\n����������Ч����ֱ�����۱�׼�ǵ��������͵���ʣ����ж����˿����˴˹�棬��������\r\n�����˶Դ˹�����Ȥ������˸ù�档���ܴ�������ȽϿ��е���ʣ������� Banner ��\r\nʾʱ��������Ʒ�ƴ������ã����վ��������֮��һֱ���ڳ��ڵ����ۡ���ֱ���͵�������\r\nվ�㣬���յ�Ч�������������������۶����������Ϊ Web �������˵ĸ��ٳ������ж��κ�һ\r\n�����۵������Ǵ��ĸ�վ�����ӹ����ġ� ', 1, NULL, '2007-07-16 02:37:06', 1),
(13, '�����ʽͶ��֮���ܽ����޸���', '���ԡ� \r\n�����������ʵʱ����Լ�Ӫ�����Եı�����޸Ĺ�����ݣ������ӹ��Ͷ���������ı䵥�ۡ�\r\n�ı����ӵ�ַ�ȡ� \r\n����ע�������ӵĹ����ͨ������Ա���ǰ���������޸����ݣ�����Ͷ���еĹ���޸ĺ����\r\n��Ա��ˡ� ', 1, NULL, '2007-07-16 02:37:35', 1),
(14, '���ڹ�������ҳ��Ĺ涨', '��1. ���ù����Ϣ�ĵ���/���ҳ���������ʵҳ�棬�������κ���ʽ����������ڷǷ�\r\nҳ���ϣ�Ҳ���ǲ���ͨ��javascript��ifram��js����֪��δ֪�ķ�ʽ������ҳ�����������\r\n�������һ����ʵ�����ǽ������ù�沢����ù��ʣ��Ͷ�Ž� \r\n����2. ���ù����Ϣ�ĵ���ҳ�治�����е������ڣ�����������潫����ͣ������ù��\r\nʣ��Ͷ�Ž� \r\n����3. ������������һ�����Ͻ����ҳ����Ϊ��ҳ����Ϊ�ղصĶԻ��򣬷����������\r\n������ͣ������ù��ʣ��Ͷ�Ž� ', 1, NULL, '2007-07-16 02:38:25', 1),
(15, '�������Ա��η�����棿', '      ��һ����ע���Ϊ���˵Ĺ������Ա�� \r\n�����ڶ�������½���������С��ʻ���ֵ����������ѡ������֧�������л������֧����ʽ�� \r\n���������������ȷ��֮�������Խ��С�������桿������ѡ����ϣ��Ͷ�ŵĹ��ģʽ����\r\nд�������(�繺��Ĺ��Ͷ�����������ۡ���ߵ�/������������ַ��������͵�)�� \r\n�������Ĳ���������Ա��˲�ͨ��������Ϻ����Ĺ�����ʽ��ʼͶ���ˡ� \r\n������������κ����ʣ���ӭ���ҹ�˾��ϵ�����������Ϥ���������̣���ֻ��Ҫ����������\r\n��Ҫ���ҹ�˾�����Ϊ������ȫ�׵Ĺ�淢������������޶ȵķ��ӹ����������Ч�ԡ� ', 1, NULL, '2007-07-16 02:41:42', 1),
(16, '�����˵��������Ʒ���˽⣬��ô�죿', '���뱾��˾�ͻ�������Ա�����Աȡ����ϵ����������ѯ����Ҫ�˽��������������ͨ\r\n�������E-mail������Ʒ�����Ϣ������������Ϊ�����������������Ͷ�żƻ���Sales@zyiis.com ', 1, NULL, '2007-07-16 02:43:20', 1),
(17, '��������Щ�������', '<p>ͼƬ���: ֧��Flash�ļ����,�ù�������ɫ,ʵʱͳ�Ƹ���,ģʽ����ͨ������������л�����ť�����ĵȣ��ж��ֳߴ���ϵͳ���ñ�ƽ������Ŀ����ʽ��ÿ�������Ŀ��Ӧһ�������ʽ���������Ա�������ⷢ��������ͬ��ͬ����ַ�������ʽ�Ĺ�棬ϵͳĬ�ϲ��е��Զ��ֲ��ķ�ʽ�������վ�������ۡ����ֹ��: ���ֹ����������ʽ��Ϊ��ϸ�Ľ��ܹ�����Ĺ���Ʒ��������ҵ���Ʒ��֪���ȡ����ֹ��λ�İ��ŷǳ������Գ�����ҳ����κ�λ�ã����������ŷš��������: ��������ǻ������������Ҳ��õ������ƹ���ʽ֮һ������������ķ�չ �����������Ȼ����λ��������ô��ĳ����ߣ������������Ȼ�㷺��Ӧ������վ ����ҵ�Ĳ�Ʒ�����ƹ���������ھ������ҵĽ��죬������������ҵ����ռ���û� ���г����ֶ�֮һ��ͬʱҲ�������ɱ��ϵ͵ķ���֮һ ���۹��: ����ע��ͳ��CPA�Ƽ۷�ʽ��ָ�����Ͷ��ʵ��Ч����������Ӧ����Ч�ʾ�򶨵����Ʒѣ������޹��Ͷ ������CPA�ļƼ۷�ʽ������վ������һ���ķ��գ��������Ͷ�ųɹ���������Ҳ��CPM�ļ� �۷�ʽҪ��öࡣ</p>', 0, '������ɫ', '2007-07-16 02:47:10', 1);

 
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
(5, 0, '����ThinkPad X201i�ʼǱ�', '��Ļ�ߴ磺12.1Ӣ��\r\n�������ͣ�Intel ���i3 350M \r\n�����Ƶ��2.26GHz \r\n�����ڴ棺2GB DDR3 \r\nӲ��������250GB 5400ת��SATA\r\n�Կ�оƬ��Intel GMA HD\r\n�������ͣ������ù��� ', 80000, '/a/2011-08-08/131281863663640137.jpg', 0, 1, 1, '2011-08-08'),
(4, 0, '����EOS550D��� ', '����EOS550D��� ', 80000, '/a/2011-08-05/131253022583039551.jpg', 0, 0, 1, '2011-08-05'),
(6, 1, '��ʿ����', '���ʣ����������\r\n���أ���ʿ\r\nƷ�ƣ�Victorinox/ά��\r\n��װ����ʿ��������ԭװ\r\n��Ʒ���������91���ף�15�ֹ��� \r\n�ֱ�:������ά����\r\n��ϵ�о������ơ�ʵ�ù����䡱���䳤Ϊ91mm�������룬��Σ��ʱ�̺ð��֡�', 80000, '/a/2011-08-08/131281871169035645.jpg', 0, 1, 1, '2011-08-08'),
(7, 0, 'ƻ��MacBook Pro�ʼǱ�����', 'Apple ƻ�� MacBook Pro \r\n������(CPU):Intel Ӣ�ض� \r\n�ͺ�:Ӣ�ض� ���2 ˫�� \r\n�ٶ�:2.66GHz \r\nϵͳ����:1066MHz \r\n��������:3MB \r\n��Ļ��С:13.3Ӣ�� ', 80000, '/a/2011-08-08/131281875281611329.jpg', 0, 1, 1, '2011-08-08'),
(8, 0, 'ƻ��iPad 2��16G/WIFI�棩', '��Ļ�ߴ磺9.7Ӣ�� \r\n����ʽ��������ϵͳ��iOS 4.3 \r\n��������A5 ˫�ˣ�1GHz \r\nϵͳ�ڴ棺512MB \r\n�洢������16GB \r\n��Ļ�ֱ棺1024��768 \r\n����ģʽ����֧��3G���� \r\n����ͷ��˫����ͷ', 80000, '/a/2011-08-08/131281895628247070.jpg', 0, 1, 1, '2011-08-08'),
(9, 0, 'ƻ��iPhone 4��16GB��', '����ģʽ��GSM��WCDMA \r\n�����ƣ�ֱ�� \r\n�����ߴ磺3.5Ӣ�� 640��960���� \r\n������������������㴥�� \r\n����ͷ��500������', 80000, '/a/2011-08-08/131281909416157226.jpg', 2, 1, 1, '2011-08-08');

 

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
(33, 'wealin ��ϵ�ͷ��޸��������� ', 'wealin ��ϵ�ͷ��޸��������� ', '2008-06-19 23:59:41', 0, NULL, 0),
(34, 'cq532 ��ϵ�ͷ� �������Ʋ��� ', 'cq532 ��ϵ�ͷ� �������Ʋ��� ', '2008-06-19 23:59:51', 0, NULL, 0),
(35, 'hybbq ���п������Ʋ��ԡ���ϵ�ͷ� ', 'hybbq ���п������Ʋ��ԡ���ϵ�ͷ� ', '2008-06-20 00:00:00', 0, NULL, 0),
(36, '�κ�������,ֱ�ӷ��,��֪ͨ�� ', '�κ�������,ֱ�ӷ��,��֪ͨ�� ', '2008-06-20 00:00:12', 0, NULL, 0),
(37, 'dy88516 ���п�������û��д����ϵ�ͻ� ', 'dy88516 ���п�������û��д����ϵ�ͻ� ', '2008-06-20 00:00:23', 0, NULL, 0),
(38, '25��ǰ������ϣ�lyw999���������ֲ�����ϵ�ͷ��� ', '25��ǰ������ϣ�lyw999���������ֲ�����ϵ�ͷ��� ', '2008-06-20 00:00:31', 0, NULL, 0),
(41, '�κ�������,ֱ�ӷ��,��֪ͨ�� ', '�κ�������,ֱ�ӷ��,��֪ͨ�� ', '2009-02-18 10:34:49', 0, NULL, 0),
(42, '�κ�������,ֱ�ӷ��,��֪ͨ�� ', '�κ�������,ֱ�ӷ��,��֪ͨ�� ', '2009-03-04 20:49:35', 0, NULL, 0),
(43, '�κ�������,ֱ�ӷ��,��֪ͨ�� ', '�κ�������,ֱ�ӷ��,��֪ͨ�� ', '2009-03-04 20:49:39', 0, NULL, 0);

 

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
('sitename', '���׹������'),
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
('show_text_noads', 'û�к��ʵĹ�����ʾ���뷵����������ѡ����'),
('show_text_nodomain', '��������'),
('show_text_nouserstatus', '�û�δ����'),
('show_text_nozone', '���λ����������ѡ�������ɾ����ǰ���λ'),
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
(1, 0, '�Ż���վ'),
(2, 0, 'Ӱ������'),
(3, 0, '����ʱ��'),
(4, 0, '������'),
(5, 0, 'Ͷ�����'),
(6, 0, '������Ƹ'),
(7, 0, '����Ӳ��'),
(8, 0, '������Ѷ'),
(9, 0, '������Ϸ'),
(10, 0, '���λ���'),
(11, 0, '����'),
(12, 0, '�˶�����'),
(13, 0, '�����ղ�'),
(14, 0, '��������'),
(16, 0, 'ҽ�ƽ���'),
(17, 0, '��������'),
(18, 0, '��������'),
(19, 0, '�����̳�'),
(20, 0, '��ҵ����'),
(21, 0, '���˲���'),
(22, 0, '����'),
(110, 1, '�Ż���վ'),
(111, 1, '����Ӱ��'),
(112, 1, '��Ϸ'),
(113, 1, '��ַ����'),
(114, 1, '���뼰�ֻ�'),
(115, 1, '����'),
(116, 1, '���Լ�Ӳ��'),
(117, 1, 'ҽ�Ʊ���'),
(118, 1, 'Ů��ʱ��'),
(119, 1, '��ѧ������'),
(120, 1, '�������'),
(121, 1, '�����Ҿ�'),
(122, 1, '����'),
(123, 1, '��ͨ����'),
(124, 1, '�����˶�'),
(125, 1, 'Ͷ�ʽ���'),
(126, 1, '����ý��'),
(127, 1, '��������'),
(128, 1, 'С˵'),
(129, 1, '�˲���Ƹ'),
(130, 1, '���繺��'),
(131, 1, 'QQ��������'),
(132, 1, '����'),
(133, 1, '���Ｐ��Ӱ');

 

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
(37, 120, 60, 37, 'С�����'),
(36, 300, 250, 36, '�޷����'),
(35, 336, 280, 35, '�޷����'),
(34, 200, 200, 34, '�޷����'),
(33, 250, 250, 33, '�޷����'),
(32, 360, 190, 32, '�޷����'),
(31, 250, 300, 31, '�޷����'),
(30, 180, 250, 30, '��ֱ���'),
(29, 160, 600, 29, '��ֱ���'),
(28, 120, 240, 28, '��ֱ���'),
(27, 120, 600, 27, '��ֱ���'),
(26, 950, 90, 5, '������'),
(25, 728, 90, 4, '������'),
(24, 250, 60, 3, '������'),
(23, 468, 60, 2, '������'),
(22, 760, 90, 1, '������'),
(47, 320, 270, 38, '���½�Ʈ��'),
(48, 270, 200, 39, '���½�Ʈ��');

 

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
  `recommend` varchar(8) DEFAULT NULL COMMENT '�Ƽ���',
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

 