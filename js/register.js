function onSubmit(acc){
	var fields = "";
	var form;
	if(acc == "cic"){
		fields = ["username_cic", "password", "conferma_password", "email", "nome", "cognome", "data_nascita"];
		form = "#form_register_cic";
	}else if(acc == "gt"){
		fields = ["username_gt", "password", "conferma_password", "email", "nome", "cognome", "data_nascita"];
		form = "#form_register_gt";
	}
	var validate = true, psw_check = true;
	for (var i = 0; i < fields.length; i++) {
		validate = checkValue(fields[i]);
		if(!validate) break;
	}
	if(($('#password').val() != $('#conferma_password').val())){
		$('#invalid_conferma_password').removeClass("hidden");
		psw_check = false;
	}
	if(!$('#password').val() == ""){
		var psw_fields = $('#password'), confirm_psw_fields = $('#conferma_password');
		var psw_value = sha256(psw_fields.val());
		psw_fields.val(psw_value);
		confirm_psw_fields.val(psw_value);
	}
	if(acc=="cic" && $('input[name="metodi_pagamento[]"]:checked').length == 0){
		$('#invalid_metodi_pagamento').removeClass("hidden");
		validate = false;
	}
	if(validate && psw_check) $(form).submit();
}

function checkValue(selector){
	var sel_val = $('#'+selector).val();
	if(sel_val == ""){
		$('#invalid_'+selector).removeClass("hidden");
		return false;
	}else{
		$('#invalid_'+selector).addClass("hidden");
	}
	return true;
}
