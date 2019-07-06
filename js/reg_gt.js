function onSubmit(){
	var fields = ["username_gt", "password", "email", "nome", "cognome", "data_nascita"];
	var validate = true, psw_check = true;
	for (var i = 0; i < fields.length; i++) {
		validate = checkValue(fields[i]);
		if(!validate) i = fields.length;
	}
	if(($('#password').val() != $('#conferma_password').val())){
		$('#invalid_conferma_password').removeClass("hidden").addClass("visible");
		psw_check = false;
	}
	if(!$('#password').isEmpty()){
		var psw_fields = $('#password');
		var psw_value = sha256(psw_fields.val());
		psw_fields.val(psw_value);
	}
	if(validate && psw_check) $('#form_register_gt').submit();
}

function checkValue(selector){
	var sel_val = $('#'+selector).val();
	if(sel_val == ""){
		$('#invalid_'+selector).removeClass("hidden").addClass("visible");
		return false;
	}else{
		$('#invalid_'+selector).removeClass("visible").addClass("hidden");
	}
	return true;
}