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

        //var holiday = '<div class="col-lg-12 col-xs-12 col-sm-12 form-group"><input name="id[]" type="hidden" /><div class="col-lg-2 col-xs-4 col-sm-4 form-group"><label for="name">Name</label><input name="name[]" type="text" class="form-control"></div><div class="col-lg-2 col-xs-4 col-sm-4 form-group"><label for="start">Start</label><input name="start[]" class="form-control holiday_start"></div><div class="col-lg-2 col-xs-4 col-sm-4 form-group"><label for="end">End</label><input name="end[]" class="form-control holiday_end"></div><div class="col-lg-4 col-xs-8 col-sm-8 form-group"><label for="holiday_message">Message</label><input name="message[]" type="text" class="form-control"></div></div>'
        var added=0;

        $(".add_holiday").click(function(){
        	$("#new_holiday").append(holiday);        
            added=1;
            $('.holiday_start').datepicker({ dateFormat: 'yy-mm-dd'});
            $('.holiday_end').datepicker({ dateFormat: 'yy-mm-dd'});
        });

        $(".save_holiday").click(function(event){
            if(added==0) {
                event.preventDefault();
            }
        });

        $(document).on("click", ".remove_holiday", function(event){
            var holiday = $(this).parent().parent();
            holiday.remove();
        });
})
