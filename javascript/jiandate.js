/*  Copyright jian, 2010  |  www.zyiis.com
 * -----------------------------------------------------------
 *
 * The DHTML JianDate , version 1.0  
 * This script is distributed under the GNU Lesser General Public License.
*/

// $Id: JianDate.js 8 2010-06-01 10:27:27Jian  $

var d = {
	Zyiis_Y : '',
	Zyiis_M : '',
	Zyiis_tab : '',
	s : function(t,c) {
		var lastday = new Date(this.Zyiis_Y,this.Zyiis_M,0).getDate();
		var firstday = new Date(this.Zyiis_Y,this.Zyiis_M-1,1).getDay(); 
		var weekend = '';
		var hans = '';
		var last = new Date(this.Zyiis_Y,this.Zyiis_M-1,0).getDate()-firstday;
		Zyiis_W = document.getElementById(c); 
		for(var h1=0;h1<7;h1++) 
		{
			last++;
			if(h1<firstday) 
			   this.Zyiis_tab.rows[1].cells[h1].innerHTML="<span style='color:#cccccc;' >"+last+"</span>";
			else
				this.Zyiis_tab.rows[1].cells[h1].innerHTML=(h1-firstday+1); 
			weekend=h1-firstday+1;
			hans=1;
		}
		for(var i=0;i<7;i++)
		{
			this.Zyiis_tab.rows[5].cells[i].innerHTML="&nbsp;";
			this.Zyiis_tab.rows[6].cells[i].innerHTML="&nbsp;";
		}
		af = 1;
		while(weekend<lastday)
		{
			for(var h2=0;h2<7;h2++) 
			{
			   if(weekend+h2<lastday)
			   {
				 this.Zyiis_tab.rows[hans+1].cells[h2].innerHTML=(weekend+1+h2);
			   }
				
			   else{
				this.Zyiis_tab.rows[hans+1].cells[h2].innerHTML="<span style='color:#cccccc;' >"+af+"</span>"; 
				af++;
				}
				
			}
			weekend+=7;
			hans+=1;
		};
		if(this.Zyiis_tab.rows[6].cells[0].innerHTML == '&nbsp;'){
			for(var i=0;i<7;i++){
				this.Zyiis_tab.rows[6].cells[i].innerHTML="<span style='color:#cccccc;' >"+af+"</span>";
				af++;
			}
		}
	},
	r: function(t,a,mm){
		var Sd = document.getElementById('Zyiis_D');
		if(Sd) {
			Sd.style.display = "";
			return
		}
		 
		if(mm==1) {widtha = '300';widthb='100%'} else {widtha = '400';widthb='192'};
		var h = "<table width='"+widtha+"'border='0'cellpadding='0'cellspacing='0'style='border:1px solid #a2bae7;'bgcolor='#FFFFFF'><tr><td><table width='98%'border='0'align='center'cellpadding='0'cellspacing='0'>";
		if(mm==2){
			h += "<tr><td height='30'><font color='#333333'><b>开始</b>：</font><input name='Zyiis_s1'id='Zyiis_s1'type='text'style='border:1px solid #D3DDE9;font-size:14px;height:20px;line-height:20px;padding-left:4px;width:95px;'/></td>";
			
		    h+="<td style='padding-left:5px'><font color='#333333'><b>结束</b>：</font><input name='Zyiis_s2'id='Zyiis_s2'type='text'style='border:1px solid #D3DDE9;font-size:14px;height:20px;line-height:20px;padding-left:4px;width:95px;'/></td></tr>";
			}
			h+="<tr><td><table width='"+widthb+"'border=0 bgcolor='#E5EFF9'><tr><td><select name='Zyiis_y1'id='Zyiis_y1'onchange='d.e()'></select>年<select name='Zyiis_m1'id='Zyiis_m1'onchange='d.e()'></select></td></tr></table></td>";
			if(mm==2){
			h+="<td><table width='192'border=0 align='right'bgcolor='#E5EFF9'><tr><td style='padding-left:5px'><select name='Zyiis_y2'id='Zyiis_y2'onchange='d.f()'></select>年<select name='Zyiis_m2'id='Zyiis_m2'onchange='d.f()'></select></td></tr></table></td>";
			}
			h+="</tr><tr><td><table width='"+widthb+"'border='0'cellpadding='0'cellspacing='0'bgcolor='#D3DDE9'id='Zyiis_tab1'><tr align='center'style='color:#999999; background:#F5FAFE'><td width='30'height='25'bgcolor='#F5FAFE'>日</td><td width='30'>一</td><td width='30'>二</td><td width='30'>三</td><td width='30'>四</td><td width='30'>五</td><td width='30'>六</td></tr>";
		for(var a1=0;a1<6;a1++) 
		{
			h+="<tr bgcolor='#FFFFFF'style='cursor:pointer;color:#336699'><td align='center'bgcolor='#FFFFFF'width='30'height='22' onclick='d.g(this)'onmouseover=\"this.style.backgroundColor='#CCFFFF';\" onmouseout=\"this.style.backgroundColor   =   '#FFFFFF';\"></td><td align='center'bgcolor='#FFFFFF'onclick='d.g(this)'onmouseover=\"this.style.backgroundColor='#CCFFFF';\" onmouseout=\"this.style.backgroundColor   =   '#FFFFFF';\"></td><td align='center'bgcolor='#FFFFFF'onclick='d.g(this)'onmouseover=\"this.style.backgroundColor='#CCFFFF';\" onmouseout=\"this.style.backgroundColor   =   '#FFFFFF';\"></td><td align='center'bgcolor='#FFFFFF'onclick='d.g(this)'onmouseover=\"this.style.backgroundColor='#CCFFFF';\" onmouseout=\"this.style.backgroundColor   =   '#FFFFFF';\"></td><td align='center'bgcolor='#FFFFFF'onclick='d.g(this)'onmouseover=\"this.style.backgroundColor='#CCFFFF';\" onmouseout=\"this.style.backgroundColor   =   '#FFFFFF';\"></td><td align='center'bgcolor='#FFFFFF'onclick='d.g(this)'onmouseover=\"this.style.backgroundColor='#CCFFFF';\" onmouseout=\"this.style.backgroundColor   =   '#FFFFFF';\"></td><td align='center'bgcolor='#FFFFFF'onclick='d.g(this)'onmouseover=\"this.style.backgroundColor='#CCFFFF';\" onmouseout=\"this.style.backgroundColor   =   '#FFFFFF';\"></td></tr>";
		}
		h+= "</table></td>";
		if(mm==2){
		h+= "<td><table width='192'border='0'align='right'cellpadding='0'cellspacing='0'bgcolor='#D3DDE9'id='Zyiis_tab2'><tr align='center'style='color:#999999; background:#F5FAFE'><td width='30'height='25'bgcolor='#F5FAFE'>日</td><td width='30'>一</td><td width='30'>二</td><td width='30'>三</td><td width='30'>四</td><td width='30'>五</td><td width='30'>六</td></tr>";
		for(var a1=0;a1<6;a1++) 
		{
			h+="<tr bgcolor='#FFFFFF'style='cursor:pointer;color:#336699'><td align='center'bgcolor='#FFFFFF'width='30'height='22' onclick='d.n(this)'onmouseover=\"this.style.backgroundColor='#CCFFFF';\" onmouseout=\"this.style.backgroundColor   =   '#FFFFFF';\"></td><td align='center'bgcolor='#FFFFFF'onclick='d.n(this)'onmouseover=\"this.style.backgroundColor='#CCFFFF';\" onmouseout=\"this.style.backgroundColor   =   '#FFFFFF';\"></td><td align='center'bgcolor='#FFFFFF'onclick='d.n(this)'onmouseover=\"this.style.backgroundColor='#CCFFFF';\" onmouseout=\"this.style.backgroundColor   =   '#FFFFFF';\"></td><td align='center'bgcolor='#FFFFFF'onclick='d.n(this)'onmouseover=\"this.style.backgroundColor='#CCFFFF';\" onmouseout=\"this.style.backgroundColor   =   '#FFFFFF';\"></td><td align='center'bgcolor='#FFFFFF'onclick='d.n(this)'onmouseover=\"this.style.backgroundColor='#CCFFFF';\" onmouseout=\"this.style.backgroundColor   =   '#FFFFFF';\"></td><td align='center'bgcolor='#FFFFFF'onclick='d.n(this)'onmouseover=\"this.style.backgroundColor='#CCFFFF';\" onmouseout=\"this.style.backgroundColor   =   '#FFFFFF';\"></td><td align='center'bgcolor='#FFFFFF'onclick='d.n(this)'onmouseover=\"this.style.backgroundColor='#CCFFFF';\" onmouseout=\"this.style.backgroundColor   =   '#FFFFFF';\"></td></tr>";
		}
		h+="</table></td>";
		}
		
		h+="</tr></table></td></tr><tr><td height='6'></td></tr><tr><td height='30'bgcolor='#E5EFF9'><table height='30'width='100%' border='0' cellpadding='0'cellspacing='0'><tr><td  width='60' align='center'><input type='button'name='Submit2'value='取消'onclick='d.x()'style='cursor: pointer;background-color:#ffffff;background-image:url(/javascript/images/submit-x.jpg);background-repeat:repeat;background-attachment:scroll;background-position:center;border:0 solid #000000;text-align:  center; width:48px;color:#000;height:23px;line-height:25px;'/></td><td align='right' onclick='alert(\"日期选择器\\n\\n下拉菜单选择【年-月】\")' style='cursor:pointer'>？&nbsp;&nbsp;</td></tr></table></td></tr></table>";
		var Wtp = document.getElementById(a);
		var Sd = document.getElementById('Zyiis_D');
		if(Sd) {
			Sd.style.display = "";
		}
		else {
			var g=document.createElement("div");
			g.id = "Zyiis_D";
			g.style.position = "absolute";
			g.style.top = this.ot(Wtp)+Wtp.offsetHeight+3+'px';
			g.style.left = this.ol(Wtp)-0+'px';
			g.innerHTML = h;
			document.body.appendChild(g);
		}
		window.Zyiis_y1 = document.getElementById('Zyiis_y1');
		window.Zyiis_y2 = document.getElementById('Zyiis_y2');
		window.Zyiis_m1 = document.getElementById('Zyiis_m1');
		window.Zyiis_m2 = document.getElementById('Zyiis_m2');
		window.Zyiis_s1 = document.getElementById('Zyiis_s1');
		window.Zyiis_s2 = document.getElementById('Zyiis_s2');
		var Zdate=new Date();
		var gY=Zdate.getFullYear();
		var gM=Zdate.getMonth();
		if(mm==2) {
			Zyiis_s1.value = Zdate.getFullYear().toString()+'-'+(Zdate.getMonth()-0+1).toString()+'-'+Zdate.getDate().toString();
			Zyiis_s2.value = Zyiis_s1.value;
		}
	
		for(var i=2009;i<2016;i++){
			sYs= i-2009;
			Zyiis_y1.options.add(new Option(i,sYs));
			if(mm==2) Zyiis_y2.options.add(new Option(i,sYs));
			if(gY==i) {Zyiis_y1.selectedIndex= sYs;if(mm==2) Zyiis_y2.selectedIndex= sYs;} ;
		};
		for(var Dm=1;Dm<13;Dm++){
			Zyiis_m1.options.add(new Option(Dm,Dm));
			if(mm==2) Zyiis_m2.options.add(new Option(Dm,Dm)); 
			if(gM+1==Dm){Zyiis_m1.selectedIndex= gM;if(mm==2) Zyiis_m2.selectedIndex= gM;};
		};
	},
	ol:function(a){
		return a==document.body?0:a.offsetLeft+this.ol(a.offsetParent)
	},
	ot:function(a){
		return a==document.body?0:a.offsetTop+this.ot(a.offsetParent)
	},
	a:function(t,a,m){
		Zyiis_mm = m;
		this.r(t,a,m);
		this.b(t);
		if(m==2) this.c(t);
		
	},
	b:function(t){
		var Zyiis_y1 = document.getElementById('Zyiis_y1');
		var Zyiis_m1 = document.getElementById('Zyiis_m1');
		this.Zyiis_Y = Zyiis_y1.options[Zyiis_y1.selectedIndex].text;
		this.Zyiis_M = Zyiis_m1.options[Zyiis_m1.selectedIndex].text;
		this.Zyiis_tab = document.getElementById('Zyiis_tab1');
		this.s('g1',t);
	},
	c:function(t){
		var Zyiis_y2 = document.getElementById('Zyiis_y2');
		var Zyiis_m2 = document.getElementById('Zyiis_m2');
		this.Zyiis_Y = Zyiis_y2.options[Zyiis_y2.selectedIndex].text;
		this.Zyiis_M = Zyiis_m2.options[Zyiis_m2.selectedIndex].text;
		this.Zyiis_tab = document.getElementById('Zyiis_tab2');
		this.s('g2',t);
	},
	e:function(){
		this.b(Zyiis_W.id);
	},
	f:function(){
		this.c(Zyiis_W.id);
	},
	g:function(t){
		var t = t.innerHTML;
		if (t.length>3)
		{
			return;
		}
		t = this.Zyiis_Y+"-"+this.Zyiis_M+"-"+t;
		if(Zyiis_mm==2){
			 Zyiis_s1.value = t;
			var Zyiis_sd1 = Zyiis_s1.value.split('-');
			var Zyiis_sd2 = Zyiis_s2.value.split('-');
			var Zyiis_db1 = new Date(Zyiis_sd1[0],Zyiis_sd1[1],Zyiis_sd1[2]).getTime() ;
			var Zyiis_db2 = new Date(Zyiis_sd2[0],Zyiis_sd2[1],Zyiis_sd2[2]).getTime() ;
			if(Zyiis_db2<Zyiis_db1){
				alert("开始时间不能大于结束时间");	
				return;
			}
			if(Zyiis_W.tagName == 'INPUT')
				Zyiis_W.value = t+" / "+Zyiis_s2.value;
			else
			{
				Zyiis_W[0].value = t+" / "+Zyiis_s2.value;	
				Zyiis_W[0].innerHTML = t+" 至 "+Zyiis_s2.value;
				Zyiis_W.selectedIndex = 0;
			}
		}else {
				if(Zyiis_W.tagName == 'INPUT') Zyiis_W.value = t;
				else alert("NOT INPUT");
			}
		
	},
	n:function(t){
		var t = t.innerHTML;
		if (t.length>3)
		{
			return;
		}
		t = this.Zyiis_Y+"-"+this.Zyiis_M+"-"+t;
		//t = Zyiis_y2.options[Zyiis_y2.selectedIndex].text+"-"+Zyiis_m2.options[Zyiis_m2.selectedIndex].text+"-"+t; 
		Zyiis_s2.value = t;
		var Zyiis_sd1 = Zyiis_s1.value.split('-');
		var Zyiis_sd2 = Zyiis_s2.value.split('-');
		var Zyiis_db1 = new Date(Zyiis_sd1[0],Zyiis_sd1[1],Zyiis_sd1[2]).getTime() ;
		var Zyiis_db2 = new Date(Zyiis_sd2[0],Zyiis_sd2[1],Zyiis_sd2[2]).getTime() ;
		if(Zyiis_db2<Zyiis_db1){
			alert("开始时间不能小于结束时间");	
			return;
		}
		if(Zyiis_W.tagName == 'INPUT')
			Zyiis_W.value = Zyiis_s1.value+" / "+t;
		else
		{
			Zyiis_W[0].value = Zyiis_s1.value+" / "+t;;	
			Zyiis_W[0].innerHTML = Zyiis_s1.value+" 至 "+t;
			Zyiis_W.selectedIndex = 0;
		}
		d.x();
	},
	addEvent:function(el, evname, func) {
		if (el.attachEvent) { // IE
			el.attachEvent("on" + evname, func);
		} else if (el.addEventListener) { // Gecko / W3C
			el.addEventListener(evname, func, true);
		} else {
			el["on" + evname] = func;
		}
	},
	x:function (){
		var div = document.getElementById("Zyiis_D");
		div.style.display = "none";
	}
};