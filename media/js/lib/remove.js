$(document).ready(function(){
	$(".confirm").confirm({
	    text: "Are you sure you want to delete?",
	    title: "Confirmation required",
	    confirm: function(button) {
	    	var url = button.attr('href');
	        $.ajax({
				type: "POST",
				url: url,
				success: function(data) {
					button.parent().parent().hide('slow', function(){ $this.remove(); });
				}
			});
	    },
	    cancel: function(button) {
	        return false;
	    },
	    confirmButton: "Yes I am",
	    cancelButton: "No",
	    post: true
	});
	
	
	$(function() {
		$("#outlet_table").tablesorter();
	});
})