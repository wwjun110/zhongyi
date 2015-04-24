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
				if (data.indexOf('可以')==-1){
						$("#submit").attr({disabled: 'true'});
				}
				else{
						$("#submit").attr({disabled: ''});
				} 
			});  
		});

	$("#regform").submit( function(){

		if($("#terms").attr('checked')==undefined){
			alert("您必须同意并承诺遵守我们全部条款");
			return false;
		}

		if(!$.fn.isValidUserName($("#username").val())){
			oo('username','用户名不能小于4位大于20位');
			return false;
		}
		if(!$.fn.isValidPass($("#password").val())){
			oo('password','密码不能小于6位大于20位');
			return false;
		}
		if(!$.fn.isValidPass($("#password_confirm").val())){
			oo('password_confirm','重复密码不能小于6位大于20位');
			return false;
		}
		if($("#password_confirm").val()!=$("#password").val()){
			oo('password_confirm','两次密码填写不一样');
			return false;
		}
		if($.fn.isEmpty($("#question").val())){
			oo('question','请填写提示问题');
			return false;
		}
		if($.fn.isEmpty($("#answer").val())){
			oo('answer','请填写回答问题');
			return false;
		}
		if($.fn.isEmpty($("#contact").val())){
			oo('contact','请填写联系人');
			return false;
		}
		if(!$.fn.isMobile($("#mobile").val())){
			oo('mobile','请填写正确的手机号码如');
			return false;
		}
		if($.fn.isEmpty($("#qq").val())){
			oo('qq','请填写QQ');
			return false;
		}
		if(!$.fn.isEmail($("#email").val())){
			oo('email','请正确的填写邮件地址');
			return false;
		}

		if($.fn.isEmpty($("#bankname").val())){
			oo('bankname','请填写收款人姓名');
			return false;
		}
		if($.fn.isEmpty($("#bank").val())){
			oo('bank','请填写收款银行');
			return false;
		}
		if($.fn.isEmpty($("#bankacc").val())){
			oo('bankacc','请填写收款帐号');
			return false;
		}else if (!$.fn.isValNum($("#bankacc").val())){
			oo('bankacc','收款帐号只能为数字');
			return false;
		}
		

		$('#b').text('正在提交注册，请稍后...').addClass('checked')
		return false;
	})
	
});

function oo(s,t){
	$(".error").attr({'class' : 'reg'});
	$("#"+s).addClass('error');	
	//$("#"+s).focus();
	$('#b').text(t).addClass('error');
}