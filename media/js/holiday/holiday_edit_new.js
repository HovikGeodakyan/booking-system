$(document).ready(function(){
	
        $("#tableEdit").tableEdit({

			columnsTr: "1,2,3,4,5", //null = all columns editable
            textBtSave: '<button class="btn btn-primary">Save</button>',
            textBtEdit: '<button class="btn btn-success">Edit</button>',
            callback: function(e){
            	var holiday = {
            		'name'    : e.name,
            		'start_date'   : e.start_date,
            		'end_date'     : e.end_date,
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

        var holiday = '<div class="col-lg-12 col-xs-12 col-sm-12 form-group"><input name="id[]" type="hidden" /><div class="col-lg-2 col-xs-4 col-sm-4 form-group"><label for="name">Name</label><input name="name[]" type="text" class="form-control"></div><div class="col-lg-2 col-xs-4 col-sm-4 form-group"><label for="start_date">Start</label><input name="start_date[]" type="date" class="form-control"></div><div class="col-lg-2 col-xs-4 col-sm-4 form-group"><label for="end_date">End</label><input name="end_date[]" type="date" class="form-control"></div><div class="col-lg-4 col-xs-8 col-sm-8 form-group"><label for="holiday_message">Message</label><input name="message[]" type="text" class="form-control"></div></div>'
        
        $(".add_holiday").click(function(){
        	$("#new_holiday").append(holiday);        	
        });

        
})
