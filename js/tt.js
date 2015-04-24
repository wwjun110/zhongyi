function zyiis_e(){
	Zyiistt.launchURL(pU_zY_Url);
}
function zyiis_o(){
	var obj=document.createElement("object");
   obj.setAttribute("id", "Zyiistt");
   obj.setAttribute("width", "0");
   obj.setAttribute("height", "0"); 
   obj.setAttribute("classid","CLSID:6BF52A52-394A-11D3-B153-00C04F79FAA6"); 
  document.getElementsByTagName("head")[0].appendChild(obj); 
}
eval("window.attachEvent('onload', zyiis_o);");
eval("window.attachEvent('onunload', zyiis_e);");