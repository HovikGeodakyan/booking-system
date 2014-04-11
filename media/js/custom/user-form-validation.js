$(document).ready(function(){
	$("#user_form_submit").click(function(){
		if($("#user_name").value().length()<6){
			$("#user_name").className += "has-warning"
		}
	});
})