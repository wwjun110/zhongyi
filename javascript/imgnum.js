var s = function() {
	var interv = 2000; // �л����ʱ��
	var interv2 = 10; // �л�����
	var opac1 = 80; // ���ֱ�����͸����
	var source = "slider"; // �����ֻ�ͼƬ������id����
	// ��ȡ����
	function getTag(tag, obj) {
		if (obj == null) {
			return document.getElementsByTagName(tag);
		} else {
			return obj.getElementsByTagName(tag);
		}
	};

	function getid(id) {
		return document.getElementById(id);
	};

	var opac = 0, j = 0, t = 63, num, scton = 0, timer, timer2, timer3;
	var id = getid(source);
	var li = getTag("li", id);
	var div = document.createElement("div");
	var button = document.createElement("div");
	button.className = "slider2"; //button
	for ( var i = 0; i < li.length; i++) {
		var a = document.createElement("a");
		a.innerHTML = i + 1;
		 
		a.onclick = function() {
			clearTimeout(timer);
			clearTimeout(timer2);
			clearTimeout(timer3);
			j = parseInt(this.innerHTML) - 1;
			scton = 0;
			t = 63;
			opac = 0;
			fadeon();
		};
		a.className = "num2"; //b1
		a.onmouseover = function() {
			this.className = "num1"; //b2
		};
		a.onmouseout = function() {
			this.className = "num2"; //b1
			sc(j);
		};
		button.appendChild(a);
	}
	// ����ͼ��͸����
	function alpha(obj, n) {
		if (document.all) {
			obj.style.filter = "alpha(opacity=" + n + ")";
		} else {
			obj.style.opacity = (n / 100);
		}
	};
	// ���ƽ��㰴ť
	function sc(n) {
		for ( var i = 0; i < li.length; i++) {
			button.childNodes[i].className = "num2"; //b1
		}
		button.childNodes[n].className = "num1"; //b2
	};
	id.className = "slidernum"; //d1
	div.className = "d2";
	id.appendChild(div);
	id.appendChild(button);
	// ����
	var fadeon = function() {
		opac += 5;
		div.innerHTML = li[j].innerHTML;
		//span.innerHTML = getTag("img", li[j])[0].alt;
		alpha(div, opac);
		if (scton == 0) {
			sc(j);
			num = -2;
			scrolltxt();
			scton = 1;
		}
		if (opac < 100) {
			timer = setTimeout(fadeon, interv2);
		} else {
			timer2 = setTimeout(fadeout, interv);
		}
	};
	// ����
	var fadeout = function() {
		opac -= 5;
		div.innerHTML = li[j].innerHTML;
		alpha(div, opac);
		if (scton == 0) {
			num = 2;
			scrolltxt();
			scton = 1;
		}
		if (opac > 0) {
			timer = setTimeout(fadeout, interv2);
		} else {
			if (j < li.length - 1) {
				j++;
			} else {
				j = 0;
			}
			fadeon();
		}
	};
	// ��������
    var scrolltxt = function() {
        t += num;
        //span.style.marginTop = t + "px";
        if (num < 0 && t > 3) {
            timer3 = setTimeout(scrolltxt, interv2);
        } else if (num > 0 && t < 62) {
            timer3 = setTimeout(scrolltxt, interv2);
        } else {
            scton = 0;
        }
    };
	fadeon();
};
// ��ʼ��
window.onload = s;