function check_mark(inputName,str){
	
		if( $("#"+inputName).val() == '' || $("#"+inputName).val() == str ){
			$("#"+inputName).addClass('mark');
			return "false";
		}else{
			
			$("#"+inputName).removeClass('mark');
			return "";
		}
    	
    }
$(function(){
	$("#getcode_char").click(function(){
		$(this).attr("src",'code_char.php?' + Math.random());
	});
		$("#chk_char").click(function(){
	
	var msg = '';
			msg += check_mark("contact_name",'聯絡人');
			msg += check_mark("contact_phone",'聯絡電話');
			msg += check_mark("contact_email",'電子信箱');
			msg += check_mark("contact_content",'內容');
		var code_char = $("#code_char").val();
			
		$.post("chk_code.php?act=char",{code:code_char},function(msg1){
			if(msg=="") {
			if(msg1==1){
				
				alert("謝謝您的來信，我們會盡快聯繫您！");
				document.contactbox.submit() ;
				}else{
					
					alert("驗證碼錯誤！");
					};
			}else{
				alert("請輸入必填訊息");
				
			}
		});
	});
});