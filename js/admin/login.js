//大小写锁定键提示jquery插件
(function($){$.fn.extend({capsLockTip:function(divTipID){return this.each(function(){var ins=new $.CapsLockTip($(this));$(this).data(this.id,ins)})}});$.CapsLockTip=function(___target){this.target=___target;var _this=this;$(document).ready(function(){if(null==$.fn.capsLockTip.divTip){$("body").append("<div id='divTip__985124855558842555' style='width:100px; height:15px; padding-top:3px; display:none; position:absolute; z-index:9999999999999; text-align:center; background-color:#FDF6AA; color:Red; font-size:12px; border:solid 1px #DBC492; border-bottom-color:#B49366; border-right-color:#B49366;'>大写锁定已打开</div>");$.fn.capsLockTip.divTip=$("#divTip__985124855558842555")}_this.target.bind("keypress",function(_event){var e=_event||window.event;var kc=e.keyCode||e.which;var isShift=e.shiftKey||(kc==16)||false;$.fn.capsLockTip.capsLockActived=false;if((kc>=65&&kc<=90&&!isShift)||(kc>=97&&kc<=122&&isShift))$.fn.capsLockTip.capsLockActived=true;_this.showTips($.fn.capsLockTip.capsLockActived)});_this.target.bind("keydown",function(_event){var e=_event||window.event;var kc=e.keyCode||e.which;if(kc==20&&null!=$.fn.capsLockTip.capsLockActived){$.fn.capsLockTip.capsLockActived=!$.fn.capsLockTip.capsLockActived;_this.showTips($.fn.capsLockTip.capsLockActived)}});_this.target.bind("focus",function(_event){if(null!=$.fn.capsLockTip.capsLockActived)_this.showTips($.fn.capsLockTip.capsLockActived)});_this.target.bind("blur",function(_event){_this.showTips(false)})});this.showTips=function(display){if(display){var offset=_this.target.offset();$.fn.capsLockTip.divTip.css("left",offset.left+"px");$.fn.capsLockTip.divTip.css("top",offset.top+_this.target[0].offsetHeight+3+"px");$.fn.capsLockTip.divTip.show()}else{$.fn.capsLockTip.divTip.hide()}};$.fn.capsLockTip.divTip=null;$.fn.capsLockTip.capsLockActived=null}})(jQuery);


$(function() {

	// 大小写锁定提示
	$("input[type='password']").capsLockTip();

	// 禁止密码框输入空格
	$("input[type='password']").on("keydown", function(event) {
		if(event.keyCode == 32) {  return false; }
	});
	//禁止登录注册用户名和密码输入空格：
	$("#loginform .ipt,#registerform .ipt").on("keydown",function(event){
	    if(event.keyCode==32) return false;
	});

	// 登录验证
	var validatorLoginForm = $("#loginform").validate({
		rules: {
	   		username: {
				required: true
	   		},
	   		password: {
	   			minlength: 6,
				maxlength: 16,
				required: true
	   		},
	   		vcode: {
	   			required: true
	   		}
	  	},
	  	messages: {
	   		username: {
				required: "必须输入用户名"
	   		},
	   		password: {
				required: "必须输入密码",
				minlength: jQuery.format("密码不能少于{0}个字符"),
				maxlength: jQuery.format("密码不能多于{0}个字符")
	   		},
	   		vcode: {
	   			required: "必须输入验证码",
	   			remote: "验证码不正确"
	   		}
	  	},
		// the errorPlacement has to take the table layout into account
		errorPlacement: function(error, element) {
			if ( element.is(":radio") )
				error.appendTo( element.parent().next() );
			else if ( element.is(":checkbox") )
				error.appendTo ( element );
			else
				error.appendTo( element.parent() );
		},
	  	// set this class to error-labels to indicate valid fields
	  	success: function(label) {
	   		// set &nbsp; as text for IE
	   		label.html("&nbsp;").addClass("checked");
	  	},
	  	highlight: function(element, errorClass) {
	   		$(element).parent().find("." + errorClass).removeClass("checked");
	  	},
	  	onkeyup: function(element, event) {
	   		if($(element).val() != "") {
				validatorLoginForm.element(element);
	   		} else {
				$(element).parent().find("label").remove();
	   		}
	  	},
	  	onfocusout: function(element, event) {
			validatorLoginForm.element(element);
	  	},
	  	showErrors:function(errorMap, errorList) {
	   		this.defaultShowErrors();
	  	},
	  	submitHandler:function(form) {//校验通过
	  		// md5
	  	var password = $('#password').val();
			$('#password').val($.md5(password));

			$(form).ajaxSubmit({
			    success : function(R){

			        if (R.errcode === 0) {
			            alert(R.errmsg);
			            location.href = $(form).attr('success');
			        }else{
			            alert(R.errmsg);
			        }
			    }
			});

			refreshCaptcha($("#vcode"));//刷新验证码
			return false;
		}
 	});

	$("#loginform .ipt").on("focus", function() {
		$(".errortip").hide();
	});
});
