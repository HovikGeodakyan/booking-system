$(document).ready(function(){
	
        $("#tableEdit").tableEdit({

			columnsTr: "1,2,3,4,5", //null = all columns editable
            textBtSave: '<button class="btn btn-primary">Save</button>',
            textBtEdit: '<button class="btn btn-success">Edit</button>',
            callback: function(e){
            	var holiday = {
            		'name'    : e.name,
            		'start'   : e.start,
            		'end'     : e.end,
            		'message' : e.message
            	};
            	var url='holiday/update/'+e.id;
            	
		        $.ajax({
					type: "POST",
					data: holiday,
					url: url,
					success: function(data) {
						
					}
				});
            }
        });

        var holiday = '<div class="col-lg-12 col-xs-12 col-sm-12 form-group"><input name="holiday_id[]" type="hidden" /><div class="col-lg-2 col-xs-4 col-sm-4 form-group"><label for="holiday_name">Name</label><input name="holiday_name[]" id="holiday_name" type="text" class="form-control"></div><div class="col-lg-2 col-xs-4 col-sm-4 form-group"><label for="holiday_start">Start</label><input name="holiday_start[]" id="holiday_start" type="date" class="form-control"></div><div class="col-lg-2 col-xs-4 col-sm-4 form-group"><label for="holiday_end">End</label><input name="holiday_end[]" id="holiday_end" type="date" class="form-control"></div><div class="col-lg-4 col-xs-8 col-sm-8 form-group"><label for="holiday_message">Message</label><input name="holiday_message[]" id="holiday_message" type="text" class="form-control"></div></div>'
        
        $(".add_holiday").click(function(){
        	$("#new_holiday").append(holiday);
        	$(this).html("Create");
        	$(this).attr("type", "submit");
        	$('.back_button').html('Cancel');
        	$(this).unbind();
        });

        $(".back_button").on("click", function(event){
        	if($(this).html() === "Cancel") {
	        	event.preventDefault();
	        	
	        	$("#new_holiday .form-group").remove();
        	}
        });
})
