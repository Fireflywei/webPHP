$(function(){
	$("form :input").blur(function(){
		var parent = $(this).parent();
		parent.find(".formtips").remove();
		//验证用户名
       if($(this).is("#admin")){
       	 if(this.value==""){
       	 	var errorMsg = "用户名不能为空";
          parent.append('<span class="formtips onError">'+errorMsg+'</span>');
       	 }else{
               $.getJSON('doAdminAction.php?act=checkAdmin&username='+this.value,function(flag){
                  if(flag==1){
                     var okMsg = "";
                     parent.append('<span class="formtips onSuccess">'+okMsg+'</span>');
                  }else{
                     var errorMsg = "用户名不存在";
                     parent.append('<span class="formtips onError">'+errorMsg+'</span>');
                  }
               });
              
       	 }
       }
       //验证密码
       if($(this).is("#password")){
       	  if(this.value==""){
       	  	var errorMsg = "密码不能为空";
       	  	parent.append('<span class="formtips onError">'+errorMsg+'</span>');
       	  }else{
       	  	var okMsg = "";
       	  	parent.append('<span class="formtips onSuccess"'+okMsg+'</span>');
       	  }
       }
       //验证码
       if($(this).is("#verify")){
       	  if(this.value==""){
       	  	var errorMsg = "验证码不能为空";
       	  	parent.append('<span class="formtips onError">'+errorMsg+'</span>');
       	  }else{
       	  	var okMsg = "";
       	  	parent.append('<span class="formtips onSuccess"'+okMsg+'</span>');
       	  }
       }
	}).keyup(function(){
		$(this).triggerHandler('blur');
	}).focus(function(){
		$(this).triggerHandler('blur');
	});
	//最终确认
	$("#quren").click(function(){
		$("form :input").trigger('blur');
		var num = $("form .onError").length;
		if(num){
		  return false;
		}
		return true;
	});
});
