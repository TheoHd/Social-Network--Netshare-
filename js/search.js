$(document).ready(function(){
	$("#result").hide();
	$("#search-user").keyup(function(){
		var searchuser = $(this).val();
		var data = "motclef=" + searchuser;
		if(searchuser.length>2){
			$.ajax({
				type : "GET",
				url : "ajax/result.php",
				data : data,			
				success : function(server_response){
					$("#result").val(server_response).show();
				}
			});
		}
		else{
			$("#result").hide();
		}
	});
});