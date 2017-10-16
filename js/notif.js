$(function(){
	$('#dynamic-notif').ready(function(){
		verif_notif();
	});

	function verif_notif(){
		var notif_state =$("#condition-notif");
		var notif_value = $("#condition-notif").html();

		if(notif_value != 0){
			$(".change-notif-color").addClass("notification-up");
		} else{
			$("#condition-notif").addClass("hidden");
		}
	}
	
});