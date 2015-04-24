$(document).ready(function() {

	$('a#show_service').click(function() {
		if ($('div.reg_service_div').is(':hidden')) {
			$('div.reg_service_div').slideDown('slow');
		} else {
			$('div.reg_service_div').hide();
		}
	});

	$("#username").blur(function() { 
		$.get("/?action=userinfo&username="+$("#username").val(), function(data){				
				$('#isvaluser').html(data); 
				if (data.indexOf('����')==-1){
						$("#submit").attr({disabled: 'true'});
				}
				else{
						$("#submit").attr({disabled: ''});
				} 
			});  
		});

	$("#regform").submit( function(){

		if($("#terms").attr('checked')==undefined){
			alert("������ͬ�Ⲣ��ŵ��������ȫ������");
			return false;
		}

		if(!$.fn.isValidUserName($("#username").val())){
			oo('username','�û�������С��4λ����20λ');
			return false;
		}
		if(!$.fn.isValidPass($("#password").val())){
			oo('password','���벻��С��6λ����20λ');
			return false;
		}
		if(!$.fn.isValidPass($("#password_confirm").val())){
			oo('password_confirm','�ظ����벻��С��6λ����20λ');
			return false;
		}
		if($("#password_confirm").val()!=$("#password").val()){
			oo('password_confirm','����������д��һ��');
			return false;
		}
		if($.fn.isEmpty($("#question").val())){
			oo('question','����д��ʾ����');
			return false;
		}
		if($.fn.isEmpty($("#answer").val())){
			oo('answer','����д�ش�����');
			return false;
		}
		if($.fn.isEmpty($("#contact").val())){
			oo('contact','����д��ϵ��');
			return false;
		}
		if(!$.fn.isMobile($("#mobile").val())){
			oo('mobile','����д��ȷ���ֻ�������');
			return false;
		}
		if($.fn.isEmpty($("#qq").val())){
			oo('qq','����дQQ');
			return false;
		}
		if(!$.fn.isEmail($("#email").val())){
			oo('email','����ȷ����д�ʼ���ַ');
			return false;
		}

		if($.fn.isEmpty($("#bankname").val())){
			oo('bankname','����д�տ�������');
			return false;
		}
		if($.fn.isEmpty($("#bank").val())){
			oo('bank','����д�տ�����');
			return false;
		}
		if($.fn.isEmpty($("#bankacc").val())){
			oo('bankacc','����д�տ��ʺ�');
			return false;
		}else if (!$.fn.isValNum($("#bankacc").val())){
			oo('bankacc','�տ��ʺ�ֻ��Ϊ����');
			return false;
		}
		

		$('#b').text('�����ύע�ᣬ���Ժ�...').addClass('checked')
		return false;
	})
	
});

function oo(s,t){
	$(".error").attr({'class' : 'reg'});
	$("#"+s).addClass('error');	
	//$("#"+s).focus();
	$('#b').text(t).addClass('error');
}