
function Dopaltype(v){
	v = v.split('_');
	var a = document.getElementById('doadstype');
	a.action = '?action=createads&ptype='+v[1]+'&planid='+v[0];
	document.forms["doadstype"].submit();
}
function Dospecs(v){
	v = v.split('x');
	$i("height").value='';
	$i("width").value='';
	if(v[0]){
		$i("height").value=v[1];
		$i("width").value=v[0];
	}
}
function Doadstype(v,t){
	if(t!='editads'){
		$i("adinfo").value='';
		$i("htmlcode").value='';
		$i("alt").value='';
		$i("wapapptype").value='';
		$i("dispurl").value='';
		$i("url").value='';
		$i("wapadsinfo").value='';
		$i("waplogo").value='';
		$i("description").value='';
		$i("headline").value='';
		$i("height").value='';
		$i("width").value='';
	}
	$("#_adinfo_").hide();
	$("#_htmlcode_").hide();
	$("#_alt_").hide();
	$("#_wapapptype_").hide();
	$("#_dispurl_").hide();
	$("#_url_").hide();
	$("#_wapadsinfo_").hide();
	$("#_waplogo_").hide();
	$("#_description_").hide();
	$("#_headline_").hide();
	$("#_specs_").hide();
	$("#_height_").hide();
	$("#_width_").hide();
	$("#_disscreen_").hide();
	$("#_filetouploads_").hide();
	if(v == 'img'){
		$("#_filetouploads_").show();
		$("#_specs_").show();
		$("#_height_").show();
		$("#_width_").show();
		$("#_url_").show();
		$("#_alt_").show();
		$("#_adinfo_").show();
	}
	
	if(v == 'cpm'||  v == 'xn' ||  v == 'tt'){
		$("#_disscreen_").show();
		$("#_url_").show();
		$("#_adinfo_").show();
		var screenv = get_radio_value($i('screen'));
		if(screenv!='full'){
			$("#_height_").show();
			$("#_width_").show();
		}
		
	}
	
	if(v == 'tw'){
		$("#_specs_").show();
		$("#_height_").show();
		$("#_width_").show();
		$("#_htmlcode_").show();
		$("#_adinfo_").show();
	}
	
	if(v == 'yp' || v == 'pf'  || v == 'dl'){
		$("#_filetouploads_").show();
		$("#_specs_").show();
		$("#_height_").show();
		$("#_width_").show();
		$("#_url_").show();
		$("#_adinfo_").show();
	}
	
	if(v == 'txt'){
		$("#_dispurl_").show();
		$("#_description_").show();
		$("#_headline_").show();
		$("#_url_").show();
	}
	if(v == 'wap'){
		$("#_wapapptype_").show();
		$("#_wapadsinfo_").show();
		$("#_waplogo_").show();
		$("#_url_").show();
	}
}
function post_submit(){
    planid = $i('planid');
	planid = planid.options[planid.selectedIndex].value;
	v = planid.split('_');
	H_plantype=v[1];
    adstype = $i('adstype');
    adstype = adstype.options[adstype.selectedIndex].value;
   
    if(isNULL(planid)){
		alert("请选择一个广告计划！"); 
        return false;
    }
   if(isNULL(adstype)){
		alert("请选择广告类型！"); 
        return false;
   }
   
   
   if(adstype == 'img' || adstype == 'yp' ||adstype == 'pf' || adstype == 'dl'){
   		var url = $i('url').value;
    	var alt = $i("alt").value;
		var fileToUpload = $i("fileToUpload").value;
		var width = $i("width").value;
		var height = $i("height").value;
		var editad = $i('editad').value; 
		var msg="";
		var reg=/^.*?\.(jpg|bmp|png|jpeg|gif|swf|JPG|BMP|PNG|JPEG|GIF|SWF)$/;
	  	if(isNULL(fileToUpload) &&  editad=='n'){
			alert("请选择广告图片或Flash"); 
        	return false;
      	}
		else if(!reg.test(fileToUpload) &&  editad=='n')
		{
			alert("广告图片或Flash非法"); 
        	return false;
		}
		else if(!isNULL(fileToUpload)&&!reg.test(fileToUpload) && editad=='n')
		{
			alert("广告图片或Flash非法"); 
        	return false;
		}
		if(isNULL(width)){
			alert("请输入宽度"); 
			$i('width').focus();
        	return false;
		}
		if(!isNumber(width)){
			alert("宽度只能数字"); 
			$i('width').focus();
        	return false;
		}
		if(isNULL(height)){
			alert("请输入高度"); 
			$i('height').focus();
        	return false;
		}
		if(!isNumber(height)){
			alert("高度只能数字"); 
			$i('height').focus();
        	return false;
		}
		if(isNULL(url)){
			alert("请输入链接网址"); 
			$i('url').focus();
        	return false;
    	}
		if(!isValidLength(url.replace(/[^\x00-\xff]/g,"**"),1024)){
			alert("链接网址长度超过限制"); 
			$i('url').focus();
        	return false;
    	}
		if(!isValidURL(url)){
			alert("链接网址输入不合法"); 
			$i('url').focus();
        	return false;
    	}
		if(!isNULL(fileToUpload)){
			aU();
		}else{
			document.forms["addpost"].submit();
		}
    	return false;
   }
   
   if(adstype == 'cpm' || adstype == 'xn'   || adstype == 'tt'){
		var url = $i('url').value;
		var screenv = get_radio_value($i('screen'));
		var width = $i("width").value;
		var height = $i("height").value;
		if(screenv!='full'){
        	if(isNULL(width)){
				alert("请输入宽度"); 
				$i('width').focus();
				return false;
			}
			if(!isNumber(width)){
				alert("宽度只能数字"); 
				$i('width').focus();
				return false;
			}
			if(isNULL(height)){
				alert("请输入高度"); 
				$i('height').focus();
				return false;
			}
			if(!isNumber(height)){
				alert("高度只能数字"); 
				$i('height').focus();
				return false;
			}
    	}	
		if(isNULL(url)){
			alert("请输入链接网址"); 
			$i('url').focus();
        	return false;
    	}
		if(!isValidLength(url.replace(/[^\x00-\xff]/g,"**"),1024)){
			alert("链接网址长度超过限制"); 
			$i('url').focus();
        	return false;
    	}
		if(!isValidURL(url)){
			alert("链接网址输入不合法"); 
			$i('url').focus();
        	return false;
    	}
    	document.forms["addpost"].submit();		
   
   }
   if(adstype == 'tw'){
   		var url = $i('url').value;
		var htmlcode = $i('htmlcode').value;
		var width = $i("width").value;
		var height = $i("height").value;
   		if(isNULL(width)){
			alert("请输入宽度"); 
			$i('width').focus();
			return false;
		}
		if(!isNumber(width)){
			alert("宽度只能数字"); 
			$i('width').focus();
			return false;
		}
		if(isNULL(height)){
			alert("请输入高度"); 
			$i('height').focus();
			return false;
		}
		if(!isNumber(height)){
			alert("高度只能数字"); 
			$i('height').focus();
			return false;
		}
		if(isNULL(htmlcode)){
			alert("请填写HTML源代码"); 
			$i('htmlcode').focus();
			return false;
    	}
		document.forms["addpost"].submit();					
   }
   if(adstype == 'txt'){
   		var headline = 	$i('headline').value;
		var description = $('#description').val();
		var url = $i('url').value;
		var dispurl = $i('dispurl').value;
		if(isNULL(headline)){
			alert("请输入标题内容"); 
			$i('headline').focus();
			return false;
      	}
		if(!isValidLength(headline.replace(/[^\x00-\xff]/g,"**"),32)){;
			alert("输入标题长度超过限制！"); 
			$i('headline').focus();
			return false;
    	}
		if(!isValidReg(headline)){
			alert("标题内容包含非法字符！"); 
			$i('headline').focus();
			return false;
    	}
    	if(isNULL(description)){
			alert("请输入描述内容！"); 
			$i('description').focus();
			return false;
    	}
		if(!isValidLength(description.replace(/[^\x00-\xff]/g,"**"),70)){
			alert("输入描述长度超过限制！"); 
			$i('description').focus();
			return false;
   		 }
    	if(!isValidReg(description)){
			alert("描述内容包含非法字符！"); 
			$i('description').focus();
			return false;
    	}
    	if(isNULL(dispurl)){
			alert("请输入显示网址内容！"); 
			$i('dispurl').focus();
			return false
   		 }
   		if(!isValidLength(dispurl.replace(/[^\x00-\xff]/g,"**"),35)){
			alert("输入显示网址长度超过限制！"); 
			$i('dispurl').focus();
			return false
    	}
    	if(isNULL(url)){
			alert("请输入链接网址内容！"); 
			$i('url').focus();
			return false
    	}
    	if(!isValidLength(url.replace(/[^\x00-\xff]/g,"**"),1024)){
			alert("输入链接网址长度超过限制！"); 
			$i('url').focus();
			return false
   		}
    	if(!isValidURL(url)){
			alert("链接网址输入不合法！"); 
			$i('url').focus();
			return false
    	}
    	document.forms["addpost"].submit();		
   }
    if(adstype == 'wap'){
		var waplogo = 	$i('waplogo').value;
		var wapadsinfo = $('#wapadsinfo').val();
		var url = $i('url').value;

		
		if(isNULL(waplogo)){
			alert("请输入广告logo地址"); 
			$i('waplogo').focus();
			return false;
      	}

    	if(isNULL(wapadsinfo)){
			alert("请输入广告语！"); 
			$i('wapadsinfo').focus();
			return false;
    	}
    	if(isNULL(url)){
			alert("请输入链接网址内容！"); 
			$i('url').focus();
			return false
    	}
    	if(!isValidLength(url.replace(/[^\x00-\xff]/g,"**"),1024)){
			alert("输入链接网址长度超过限制！"); 
			$i('url').focus();
			return false
   		}
    	if(!isValidURL(url)){
			alert("链接网址输入不合法！"); 
			$i('url').focus();
			return false
    	}
    	document.forms["addpost"].submit();		
	
	}
}