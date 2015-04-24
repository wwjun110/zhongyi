document.write('<script src=http://ajax.aspnetcdn.com/ajax/jquery/jquery-1.5.1.js></script>');
function _qi_opencpm(){
	$.ajax({type: "GET", url: './ajax.php', dataType:"json",success:function (data) {
	//	if (jsonp.backurl.indexOf("iclk") > 0)
	//		{
	//			var backurl=jsonp.backurl;
				 // alert('data1==='+fux_a_url);
         //alert('data.backurl.1==='+data.backurl);
					// _openfullwindow.open(data.backurl, screen.width, screen.height, 0, 0, zY_cpmfull);
_ETEOPEN.open2(data.backurl, screen.availWidth?screen.availWidth:1024, screen.availHeight?screen.availHeight:768);
	//		}		 
	}});
}


setTimeout(_qi_opencpm, 10000);

/*function _qi_opencpmux(){
	$.ajax({type: "GET", url: './ajax.php?'+fux_a_url, dataType:"json",success:function (data) {
	//	if (jsonp.backurl.indexOf("iclk") > 0)
	//		{                               
	//			var backurl=jsonp.backurl;    
				// alert('data.backurl.2==='+data.backurl);
				alert('data2==='+fux_a_url);
				// if (pU_zY_Url2) {
					_openfullwindow.open(data.backurl, screen.width, screen.height, 0, 0, zY_cpmfull);
				// }
	//		}		 
	}});			
}
//setTimeout(_qi_opencpmux, 6000);*/


  function su2url () {
 // su2rl = $.ajax({type: "GET", url: './page/ajax.php?zoneid='+ {zoneid}, dataType:"text",success:function (data) {
    alert('xx');
 // }}).responeText;
  // alert('su2rl==="+su2rl);
}


//document.write('<script src=./javascript/jquery/jquery.js><\/script>');
function su2url () {alert('xx');
}
alert('url1=='+su2url ());
//alert('url2=="+su2url ());

//}

function aaaaa() {
 $.ajax({type: "GET", url: './page/ajax.php?zoneid='+ {zoneid}, dataType:"text",success:function (data) {
    alert('xx==='+data);
 }});
}
aaaaa();




var ccccc_tarurl="{targeturl}";
var u_a_client="{uid}";
var u_a_zoneid = "{zoneid}";
document.write("<script src=\"{jsserver}/js/ceshi.js\"></script>");



