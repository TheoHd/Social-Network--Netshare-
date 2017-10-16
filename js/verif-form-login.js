$(function(){
	$("#error_log_email").hide();
	$("#error_log_pwd").hide();

	var err_log_email = false;
	var err_log_pwd = false;

	$('#frm_log_email').focusout(function(){
		verif_email_connect();
	});
	$('#frm_log_pwd').focusout(function(){
		verif_password_connect();
	});

	function verif_email_connect(){
		var pattern = new RegExp(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i);
		var log_email = $("#frm_log_email").val();

		if(pattern.test($("#frm_log_email").val()) || log_email == 'admin@admin.admin'){
			$("#error_log_email").hide();
		} else{
			$("#error_log_email").html("Adresse e-mail invalide ou vide.")
			$("#error_log_email").show();
			err_log_email = true;
		}
	}
	function verif_password_connect(){
		var log_pwd = $("#frm_log_pwd").val();

		if(log_pwd == ""){
			$("#error_log_pwd").html("Mot de passe vide ou invalide.");
			$("#error_log_pwd").show();
			err_log_pwd = true;
		} else{
			$("#error_log_pwd").hide();			
		}
	}

	$('#form-login').submit(function(){
		err_log_email = false;
		err_log_pwd = false;	

		verif_email_connect();
		verif_password_connect();

		if(err_log_email == false && err_log_pwd == false){
			return true;
		} else{
			return false;
		}

	});
	
});