__b = {};
var __i = navigator.userAgent.toLowerCase();
__b.isOpera = (__i.indexOf('opera') > -1);
__b.isIE = (!__b.isOpera && __i.indexOf('msie') > -1);
__b.isIE7 = (!__b.isOpera && __i.indexOf('msie 7.0') > -1);
__b.isFF = (!__b.isOpera &&!__b.isIE&&__i.indexOf('firefox') > -1);
var __fc = document.getElementById("fc");
var __fl = document.getElementById("fl");
var timer = null;
var curd = null
var cura = null
var curr_cate_on = 0;
function os(o){
	var tar = o.target?o.target:o.srcElement;
	if(tar.tagName.toLowerCase() == "a"){
		try{
			window.clearTimeout(timer);
		}catch(err){}
		if(curd){
			curd.style.backgroundColor = "#FFFFFF";
			__fc.style.display = "none";
		}
		cura = tar;
		curd = tar.parentNode;
		var l = curd.offsetLeft + 15;
		if(__b.isIE7){
			l = curd.offsetLeft + 10;
		}
		curd.style.backgroundColor = "#e6e6e6";
		__fc.style.left = (l+tar.offsetWidth+8)+"px" 
		__fc.style.top = (curd.offsetTop-8)+"px";
		sdata();
		__fc.style.display = "";
	}
}
function oe(o){
	var tar = o.target?o.target:o.srcElement;
	if(tar.tagName.toLowerCase() == "a"){
		timer = window.setTimeout(hide,500);
	}
}
function hide(){
	curd.style.backgroundColor = "#FFFFFF";
	__fc.style.display = "none"; 
}
function dos(){
	try{
		window.clearTimeout(timer);
	}catch(err){}
}
function doe(){
	timer = window.setTimeout(hide,300);
}
function sdata(){
	if(!curd)return;
	var catid = curd.getAttribute("catid");
	curr_cate_on = catid;
	var sub = st[catid]["sub"];
	var s = ""
	var cc = [];
	for(var i=0;i<sk.length;i++){
		cc.push(sk[i].id);
	}
	var ccs = "@@"+cc.join("@@");
	for(var sid in sub){
		if(ccs.indexOf("@@"+sid)>-1){
			s += "<div class='create-sitename'><input type='checkbox' value='"+sid+"' onclick='return SiteType(this)' checked><span>"+sub[sid]+"</span></div>";
		}else{
			s += "<div class='create-sitename'><input type='checkbox' value='"+sid+"' onclick='return SiteType(this)'><span>"+sub[sid]+"</span></div>";
		}
	}
	__fl.innerHTML = s;
}
function SiteType(o){
	var sid = o.value;
	st[curr_cate_on]["checked"] = st[curr_cate_on]["checked"]||[];
	if(o.checked && sid != '' && sid != 'undefined'){
		if (document.getElementById("showsitetype") !==null){
			if(sk.length>1){
				alert("广告位类型最少选择一个，最多选择2个！");
				return false;
			}else {
					var s1 = $i("s1");
					var s2 = $i("s2");
					var st1 = $i("st1");
					var s0 = $i("s0");
					s0.style.display = "";
					var y = st1.innerHTML;					
					var m = st[curr_cate_on].sub[sid];				
					if (y.indexOf(m)!=-1)
					{
						return false;
					}
					st1.innerHTML += (m)+'	';					
				}
		}
		if(sk.length>=60){
			alert("对不起，最多选择60个！");
			return false;
		}else{
			sk.push({id:sid,tag:[]});
			st[curr_cate_on]["checked"].push(sid);
		}

	}else{
		if (document.getElementById("showsitetype") !==null){
			var st1 = $i("st1");
			var y = st1.innerHTML;					
			var m = st[curr_cate_on].sub[sid];
			st1.innerHTML = y.replace(m,'');
		}
		var newchk = [];
		var new_sub_chk = [];
		for(var i=0;i<sk.length;i++){
			if(sk[i].id != sid && sk[i].id != '' && sk[i].id != 'undefined'){
				newchk.push(sk[i]);
			}
		}
		for(var i=0;i<st[curr_cate_on]["checked"].length;i++){
			if(st[curr_cate_on]["checked"][i] != sid){
				new_sub_chk.push(st[curr_cate_on]["checked"][i]);
			}
		}
		sk = newchk;
		st[curr_cate_on]["checked"] = new_sub_chk;
	}
	var _aclsitetype = [];
	for(var i=0;i<sk.length;i++){
		_aclsitetype.push(sk[i].id);
		//alert(sk[i].id)
	}
	$i('aclsitetype').value = _aclsitetype.join(',');
	var _ca = $i('sitetype_' + curr_cate_on).getElementsByTagName('a')[0];
	if(st[curr_cate_on]["checked"].length > 0)
	{
		_ca.style.color = '#ff6600';
		_ca.innerHTML = st[curr_cate_on].name + '(' + st[curr_cate_on]["checked"].length + ')';
	} else {
		_ca.style.color = '#000';
		_ca.innerHTML = st[curr_cate_on].name;
	}
}
function showSiteType(sid){
	var s1 = $i("s1");
	var s2 = $i("s2");
	var st1 = $i("st1");
	var st2 = $i("st2");
	for (var i=0;i<sk.length;i++)
	{
		st1.innerHTML += (st[curr_cate_on].sub[sid]);
	}

}
function v(n){
	$i('m'+n).className = "create-v";
}

function o(n){   
	$i('m'+n).className = "create-o";
}
function showtype(s,n){ 
	if($i('s' + s).style.display == 'none' && n=='y'){
		$i('s' + s).style.display = '';
	}
	if($i('s' + s).style.display == '' && n=='n'){
		$i('s' + s).style.display = 'none';
	}
}
function showTab(t){
	for(var i=1;i<=4;i++){
		$i('tab' + i).style.display = 'none';
	}
	for(var i=1;i<=4;i++){
		$i('m'+i).className = "create-o";
	}
	$i('tab' + t).style.display = '';
	v(t);
}
function showcity(id){
	if($i('city' + id).style.display == 'none'){
		$i('city' + id).style.display = '';
	}else{
		$i('city' + id).style.display = 'none';
	}	
}
function expire(key, isInfinite){
	if(isInfinite) $i('tip1').style.display = 'none';
	else $i('tip1').style.display = '';
	var elems = document.getElementsByTagName("*");
      for (var i=0; i < elems.length; i++) {
        var elem = elems.item(i);
        if (elem.nodeName.match("SELECT") &&
              elem.name.match(key) &&
              !elem.name.match("infinite")) {
            elem.disabled = isInfinite;
          }
        }
}
function   checkselect(ename){   
  d   =   document.all[ename];
  n   =   document.getElementsByName(ename).length;   
  if(n   >   1){   
	for(i   =   0;   i   <   n;   i++){   
		if(d[i].checked){   
			return   true;   
		}   
	}
  }else{   
	if(d.checked){   
		return   true;   
	}   
  }   
  return   false;   
}  
function add(){
    var city_more = $i("city_more");
    var city_choose = $i("city_choose");
    var selIdx = city_more.selectedIndex; 
    if(selIdx>-1){
        var selVal = city_more.options[selIdx].value; 
        var adCityStr = $i("adcitystr").value; 
		if(adCityStr.indexOf(selVal) != -1) return;
        var array_adCity = adCityStr.split(","); 
        array_adCity[array_adCity.length] = selVal;
        $i("adcitystr").value = adCityStr = jsTrim(array_adCity.join(","));
        city_choose.options[city_choose.length] = new Option(selVal, selVal);
	}
}
function remove(){
    var city_choose = $i("city_choose");
    var selIdx = city_choose.selectedIndex;
    if(selIdx>-1){
        var selVal = city_choose.options[selIdx].value;
        var adCityStr = $i("adcitystr").value;
        var array_adCity = adCityStr.split(",");
        for(i=0;i<array_adCity.length;i++){
            if(array_adCity[i]==selVal) array_adCity[i]="";
        }
        $i("adcitystr").value = adCityStr = jsTrim(array_adCity.join(",").replace(",,",","));
        city_choose.removeChild(city_choose.options[selIdx]);
    }
}