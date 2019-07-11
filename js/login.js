function checkFields(){
	var isComplete = true;
	if($('#username').val()== ""){
		$('#missed_username').removeClass('hidden');
		isComplete = false;
	}else{
		$('#missed_username').addClass('hidden');
	}
	if(($('#password').val()=="") && isComplete){
		$('#missed_password').removeClass('hidden');
		isComplete = false;
	}else{
		$('#missed_password').addClass('hidden');
	}
	if($('#password').val() != ""){
		var psw_fields = $('#password');
		var psw_value = sha256(psw_fields.val());
		psw_fields.val(psw_value);
	}
	if(isComplete){
		$('#login_form').submit();
	}
}