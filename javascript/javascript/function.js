function isEmail(str)
{
    var re=/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/; 
	if (re.test(str) != true) {
		return false;
	}else{
		return true;
	}	
}
function isValidReg( chars){
	var re=/<|>|\[|\]|\{|\}|『|』|※|○|●|◎|§|△|▲|☆|★|◇|◆|□|▼|㊣|﹋|⊕|⊙|〒|ㄅ|ㄆ|ㄇ|ㄈ|ㄉ|ㄊ|ㄋ|ㄌ|ㄍ|ㄎ|ㄏ|ㄐ|ㄑ|ㄒ|ㄓ|ㄔ|ㄕ|ㄖ|ㄗ|ㄘ|ㄙ|ㄚ|ㄛ|ㄜ|ㄝ|ㄞ|ㄟ|ㄢ|ㄣ|ㄤ|ㄥ|ㄦ|ㄧ|ㄨ|ㄩ|■|▄|▆|\*|@|#|\^|\\/;
	if (re.test( chars) == true) {
		return false;
	}else{
		return true;
	}	
}
function isValidLength(chars, len) {
	if (chars.length < len) {
		return false;
	}
	return true;
}
function isValidURL( chars ) {
	var re=/^([hH][tT]{2}[pP]:\/\/|[hH][tT]{2}[pP][sS]:\/\/)(\S+\.\S+)$/;
	if (!isNULL(chars)) {
		chars = jsTrim(chars);
		if (chars.match(re) == null)
			return false;
		else
			return true;
	}
	return false;
}
function isValidDecimal( chars ) {
	var re=/^\d*\.?\d{1,2}$/;
	if (chars.match(re) == null)
		return false;
	else
		return true;
}
function isNumber( chars ) {
	var re=/^\d*$/;
	if (chars.match(re) == null)
		return false;
	else
		return true;
}
function isFloat( str ) {
	for(i=0;i<str.length;i++)  {
	   if ((str.charAt(i)<"0" || str.charAt(i)>"9")&& str.charAt(i) != '.'){
			return false;
	   }
	}
	return true;
}
function isLetters( str ){
	var re=/^[A-Za-z]+$/;
	if (str.match(re) == null)
		return false;
	else
		return true;
}
function isValidPost( chars ) {
	var re=/^\d{6}$/;
	if (chars.match(re) == null)
		return false;
	else
		return true;
}
function jsTrim(value){
  return value.replace(/(^\s*)|(\s*$)/g,"");
}
function isNULL( chars ) {
	if (chars == null)
		return true;
	if (jsTrim(chars).length==0)
		return true;
	return false;
}
function checkall(form, prefix, checkall) {
	var checkall = checkall ? checkall : 'chkall';
	for(var i = 0; i < form.elements.length; i++) {
		var e = form.elements[i];
		if(e.type=="checkbox"){
			e.checked = form.elements[checkall].checked;
		}
	}
}
function uncheckAll(form) {
	for (var i=0;i<form.elements.length;i++){
		var e = form.elements[i];
		if (e.name != 'chkall')
		e.checked=!e.checked;
	}
}
function openWindow(url,windowName,width,height){
    var x = parseInt(screen.width / 2.0) - (width / 2.0); 
    var y = parseInt(screen.height / 2.0) - (height / 2.0);
    var isMSIE= (navigator.appName == "Microsoft Internet Explorer");
    if (isMSIE) {
    	var p = "resizable=1,location=no,scrollbars=no,width=";
    	p = p+width;
    	p = p+",height=";
    	p = p+height;
    	p = p+",left=";
    	p = p+x;
    	p = p+",top=";
    	p = p+y;
        retval = window.open(url, windowName, p);
    } else {
        var win = window.open(url, "ZyiisPopup", "top=" + y + ",left=" + x + ",scrollbars=" + scrollbars + ",dialog=yes,modal=yes,width=" + width + ",height=" + height + ",resizable=no" );
        eval("try { win.resizeTo(width, height); } catch(e) { }");
        win.focus();
    }

}
function tourl(url){
		window.open(url);
}
function client(o){
	
       var b = navigator.userAgent.toLowerCase();   
	   var t = false;
	   if (o == 'isOP'){
			 t = b.indexOf('opera') > -1;
	   }
	   if (o == 'isIE'){
			 t = b.indexOf('msie') > -1;
	   }
	   if (o == 'isFF'){
			 t = b.indexOf('firefox') > -1;
	   }
       return t;
};
function setCookie(name,value,days)
{
	if(days){
		var exp  = new Date();
        exp.setTime(exp.getTime() + days*24*60*60*1000);
        document.cookie = name + "="+ escape(value) +";expires="+ exp.toGMTString();
    }else{
		document.cookie = name + "="+ escape(value);
    }
}
function getCookie(name)
{
	var arr = document.cookie.match(new RegExp("(^| )"+name+"=([^;]*)(;|$)"));
	if(arr != null) return unescape(arr[2]); return null;
}
function delCookie(name)
{
	var exp = new Date();
	exp.setTime(exp.getTime() - 1);
	var cval=getCookie(name);
	if(cval!=null) document.cookie=name +"="+cval+";expires="+exp.toGMTString();
};
function $i(obj){
	return document.all ? document.all[obj] : document.getElementById(obj);
}
function $n(s){
	return document.getElementsByName(s);
}
function get_radio_value(field){
	if(field&&field.length){	
		for(var i=0;i<field.length;i++){		
			if(field[i].checked){			
				return field[i].value;								
			}			
		}		
	}else {		
		return ;				
	}	
}
function get_checkbox_value(field){	
	if(field&&field.length){	
		for(var i=0;i<field.length;i++){			
			if(field[i].checked && !field[i].disabled){
				return field[i].value;
			}
		}		
	}else {
		return;
	}			
}
function get_Option_Value(Options){	
	if(Options&&Options.length){	
		for(var i=0;i<Options.length;i++){			
			if(Options[i].selected){
				return Options[i].value;
			}
		}		
	}else {
		return;
	}	
}
function get_Select_Value(Select){	
	return Select.options[Select.selectedIndex].value;
}

function ref(){
	//var r = document.referrer;
	r = window.history.back();
	return r;
}
function noneSuccess(){
	setTimeout(function(){ 
				var o =$i("success");
				o.style.display = 'none';
			}, 5000);
}
function ol(a){
	return a==document.body?0:a.offsetLeft+ol(a.offsetParent)
}
function ot(a){  
	return a==document.body?0:a.offsetTop+ot(a.offsetParent)
}
function getNumChecked(form)
{
	form=document.getElementById(form);
	var num = 0;
	for (i = 0, n = form.elements.length; i < n; i++) {
		if(form.elements[i].type == "checkbox" ) {
			if(form.elements[i].checked == true)
				num++;
		}
		if(form.elements[i].name == "chkallde" || form.elements[i].name == "chkall"){
				if(form.elements[i].checked == true)
				num--;
			}
	}
	return num;
}

function sorting(type,m){
	document.Sorting.type.value=type;
	document.Sorting.m.value=m;
	document.Sorting.submit();
}
 
function addLoading(t,y){
	if(t===undefined) var t = "请稍候，加载中...";
	var aLoading=document.createElement("div") 
	aLoading.setAttribute("id","aLoadings"); 
	aLoading.setAttribute("align","center"); 
	aLoading.style.position = "absolute"; 
	aLoading.style.right = "0px"; 
	aLoading.style.top = "0px"; 
	aLoading.style.zindex = "10000"; 
	aLoading.innerHTML="<div style=' background:#CC4444;padding:2px 5px;width:150px;color:#ffffff;font-size:12px;overflow:hidden'><img  src='/javascript/images/loadingh.gif' style='margin-right:5px;vertical-align:middle;'>"+t+"</div>";
	document.body.appendChild(aLoading); 
}
function delLoading(){ 
	var aLoading=$i("aLoadings");
	if(aLoading)document.body.removeChild(imgObj);
}
function ajax(url,id,h) {
	var xmlHttp = false;
	try {
	  xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
	} catch (e) {
	  try {
		xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
	  } catch (e2) {
		xmlHttp = false;
	  }
	}
	if (!xmlHttp && typeof XMLHttpRequest != 'undefined') {
	  xmlHttp = new XMLHttpRequest();
	}
	xmlHttp.open("GET", url, true);
	xmlHttp.onreadystatechange = function(){
			if (xmlHttp.readyState < 4 && id) {
				 document.getElementById(id).innerHTML="请稍候...";
			  }
			  if (xmlHttp.readyState == 4 && h) { 
				var response = xmlHttp.responseText;
				eval(h+'("'+response+'")');
			  }
		};
	xmlHttp.send(null);  
}
function copyText(txt) {  
    if (window.clipboardData) {  
        window.clipboardData.clearData();  
        window.clipboardData.setData("Text", txt);  
    } else if (navigator.userAgent.indexOf("Opera") != -1) {  
        window.location = txt;  
    } else if (window.netscape) {  
        try {  
            netscape.security.PrivilegeManager  
                    .enablePrivilege("UniversalXPConnect");  
        } catch (e) {  
            alert("复制失败");  
            return;  
        }  
        var clip = Components.classes['@mozilla.org/widget/clipboard;1']  
                .createInstance(Components.interfaces.nsIClipboard);  
        if (!clip)  
            return;  
        var trans = Components.classes['@mozilla.org/widget/transferable;1']  
                .createInstance(Components.interfaces.nsITransferable);  
        if (!trans)  
            return;  
        trans.addDataFlavor('text/unicode');  
        var str = new Object();  
        var len = new Object();  
        var str = Components.classes["@mozilla.org/supports-string;1"]  
                .createInstance(Components.interfaces.nsISupportsString);  
        var copytext = txt;  
        str.data = copytext;  
        trans.setTransferData("text/unicode", str, copytext.length * 2);  
        var clipid = Components.interfaces.nsIClipboard;  
        if (!clip)  
            return false;  
        clip.setData(trans, null, clipid.kGlobalClipboard);  
    }  
}
function w(a){
		$i('pvsum').innerHTML = a;
}
function pvs(){ 
	ajax('/index.php?action=index&pv=yes','','w');
	t=setTimeout("pvs()",30000)
}
function refurbish(){
    var img = document.getElementById("varImg");
    img.src = "/index.php?action=imgcode&rand=" + Math.random();
}
function doLogin(){
	var username = $i("username").value;
	var password = $i("password").value;
	if(username.length=='0'){
         alert('请输入你用户名');
         $i("username").focus()
         return false;
    }
    if(password.length=='0'){
         alert('请输入你的密码!');
         $i("password").focus()
         return false;
    }
	try{
		var checkcode = $i("checkcode").value;
		if(checkcode ==''){
			 alert('验证码不能为空');
			 $i("checkcode").focus()
			 return false;
		}
	}catch(e){}  
}