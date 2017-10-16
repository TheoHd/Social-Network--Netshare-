$(function(){
	$("#email_error_message").hide();
	$("#surname_error_message").hide();
	$("#name_error_message").hide();
	$("#password_error_message").hide();
	$("#retype_password_error_message").hide();	

	var error_email = false;
	var error_surname = false;
	var error_name = false;
	var error_password = false;
	var error_retype_password = false;	

	$('#form_email').focusout(function(){
		check_email();
	});
	$('#form_surname').focusout(function(){
		check_surname();
	});
	$('#form_name').focusout(function(){
		check_name();
	});
	$('#form_password').focusout(function(){
		check_password();
	});
	$('#form_retype_password').focusout(function(){
		check_retype_password();
	});

	function check_email(){
		var pattern = new RegExp(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i);

		if(pattern.test($("#form_email").val())){
			$("#email_error_message").hide();
		} else{
			$("#email_error_message").html("Adresse e-mail invalide.")
			$("#email_error_message").show();
			error_email = true;
		}
	}
	function check_surname(){
		var surname = $("#form_surname").val();

		if(surname == ""){
			$("#surname_error_message").html("Veuillez rentrer votre nom.")
			$("#surname_error_message").show();
			error_email = true;
		} else{
			$("#surname_error_message").hide();			
		}
	}
	function check_name(){
		var name = $("#form_name").val();

		if(name == ""){
			$("#name_error_message").html("Veuillez rentrer votre prénom.")
			$("#name_error_message").show();
			error_email = true;
		} else{
			$("#name_error_message").hide();
		}
	}	
	function check_password(){
		var password_length = $("#form_password").val().length;

		if(password_length < 8){
			$('#password_error_message').html("Au moins 8 caractères.");
			$('#password_error_message').show();
			error_password= true;
		} else{
			$('#password_error_message').hide();
		}
	}
	function check_retype_password(){
		var password = $("#form_password").val();
		var retype_password = $("#form_retype_password").val();

		if(password != retype_password){
			$('#retype_password_error_message').html("Les deux mots de passe ne sont pas identiques.");
			$('#retype_password_error_message').show();
			error_password= true;
		}
		else if(password == retype_password){
			$('#retype_passsword_error_message').hide();
		}
		else{
			$('#retype_passsword_error_message').hide();
		}
	}

	$('#signupform').submit(function(){
		error_email = false;
		error_surname = false;
		error_name = false;
		error_password = false;
		error_retype_password = false;

		check_email();
		check_surname();
		check_name();
		check_password();
		check_retype_password();

		if(error_email == false && error_password == false && error_retype_password == false && error_surname == false && error_name == false){
			return true;
		} else{
			return false;
		}

	});
	
});