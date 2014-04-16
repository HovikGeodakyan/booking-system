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
					var self = button.parent().parent();
					self.hide('slow', function(){
						self.remove(); 
					});
					console.log(self, self.hasClass('table_box '));
					if(self.hasClass('table_box')){
						$("#outlet_tables").val($('.table_box').length);
					}

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