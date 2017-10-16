$(function(){
	$("#email_error_edit").hide();
	$("#password_error_edit").hide();
	$("#password_error_edit2").hide();

	var err_edit_email = false;
	var err_edit_pwd = false;
	var err_edit_pwd2 = false;

	$('#email-edit').focusout(function(){
		verif_email_edit();
	});
	$('#password-edit1').focusout(function(){
		verif_password_edit();
	});
	$('#password-edit2').focusout(function(){
		verif_password_edit2();
	});

	function verif_email_edit(){
		var pattern = new RegExp(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i);
		var edit_email = $("#email-edit").val();

		if(pattern.test(edit_email)){
			$("#email_error_edit").hide();
		} else{
			$("#email_error_edit").html("<span>Adresse e-mail invalide ou vide.</span>")
			$("#email_error_edit").show();
			err_edit_email = true;
		}
	}
	function verif_password_edit(){
		var edit_pwd = $("#password-edit1").val();

		if(edit_pwd == "" ){
			$("#password_error_edit").html("<span>Veuillez rentrer un mot de passe.</span>");
			$("#password_error_edit").show();
			err_edit_pwd = true;
		} else{
			$("#password_error_edit").hide();			
		}
	}
	function verif_password_edit2(){
		var edit_pwd = $("#password-edit1").val();
		var edit_pwd2 = $("#password-edit2").val();

		if(edit_pwd != edit_pwd2){
			$("#password_error_edit2").html("<span>Les deux mots de passes ne correspondent pas.</span>");
			$("#password_error_edit2").show();
			err_edit_pw2 = true;
		} else{
			$("#password_error_edit2").hide();			
		}
	}

	$('#form-edit').submit(function(){
		err_edit_email = false;
		err_edit_pwd = false;	
		err_edit_pwd2 = false;	

		verif_email_edit();
		verif_password_edit();
		verif_password_edit2();

		if(err_edit_email == false && err_edit_pwd == false && err_edit_pwd2 == false){
			return true;
		} else{
			return false;
		}

	});
	
});