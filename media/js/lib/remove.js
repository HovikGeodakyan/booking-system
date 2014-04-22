$(document).ready(function(){
	$(".confirm").confirm({
	    text: "Are you sure you want to delete?",
	    title: "Confirmation required",
	    confirm: function(button) {
	    	$('.loader').show();
	    	var url = button.attr('href');
	        $.ajax({
				type: "POST",
				url: url,
				success: function(data) {
					var self = button.parent().parent();
					var ifTables = self.hasClass('table_box');
					setTimeout(function(){ 
							self.hide('slow', function(){
								self.remove(); 
								if(ifTables){
									$("#outlet_tables").val($('.table_box').length);
								}
							});
							$('.loader').hide();
					}, 1700);

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
	
	
})