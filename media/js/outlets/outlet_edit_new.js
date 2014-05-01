
$(document).ready(function(){

	

	var holiday = '<div class="col-lg-12 col-xs-12 col-sm-12 form-group"><input name="holiday_id[]" type="hidden" /><div class="col-lg-2 col-xs-4 col-sm-4 form-group"><label for="holiday_name">Name</label><input name="holiday_name[]" type="text" class="form-control"></div><div class="col-lg-2 col-xs-4 col-sm-4 form-group"><label for="holiday_start">Start</label><input name="holiday_start[]" type="date" class="form-control"></div><div class="col-lg-2 col-xs-4 col-sm-4 form-group"><label for="holiday">End</label><input name="holiday_end[]" type="date" class="form-control"></div><div class="col-lg-4 col-xs-8 col-sm-8 form-group"><label for="holiday_message">Message</label><input name="holiday_message[]" type="text" class="form-control"></div><div class="col-lg-2 col-xs-4 col-sm-4 form-group"><label class="control-label">Remove the holiday</label><br><button class="remove_holiday btn btn-danger" type="button"><i class="fa fa-minus"></i></button></div></div>'
	var table   = '<div class="form-group table_box col-lg-12 col-xs-12 col-sm-12"><input type="hidden" name="table_id[]" /><div class="col-lg-2 col-xs-4 col-sm-4 form-group"><label for="table_standard_seats">Standard number of seats</label><input name="table_seats_standart_number[]" id="table_standard_seats" type="number" class="form-control"></div><div class="col-lg-2 col-xs-4 col-sm-4 form-group"><label for="table_max_seats">Maximum number of seats</label><input name="table_seats_max_number[]" id="table_max_seats" type="number" class="form-control"></div><div class="col-lg-2 col-xs-4 col-sm-4 form-group"><label class="control-label">Combinable</label><div><label class="switch"><input name="table_combinable[]" type="checkbox" checked="checked" value="1"><span></span></label></div></div><div class="col-lg-4 col-xs-8 col-sm-8 form-group"><label>Location</label><select name="table_location[]" class="form-control"><option value="1">Window</option><option value="2">Middle</option><option value="3">Back</option></select></div><div class="col-lg-2 col-xs-4 col-sm-4 form-group"><label class="control-label">Remove the table</label><br><button class="btn btn-danger remove_table" type="button"><i class="fa fa-minus"></i></button></div></div>';
	var old = 0;
	
	$("#add_table").click(function() {
		$("#table-container").append(table);
		$( this ).appendTo( "#table-container" );
		$("#outlet_tables").val($('.table_box').length);	
	});

	$("#outlet_tables").change(function() {		
	});

	$(document).on("click", ".remove_table", function(event){
		var table = $(this).parent().parent();
		table.remove();
		$("#outlet_tables").val($('.table_box').length);
		
	});
	$("#add_holiday").click(function(){
		$("#holiday-container").append(holiday);
		$( this ).appendTo( "#holiday-container" );
	});

	$(document).on("click", ".remove_holiday", function(event){
		var holiday = $(this).parent().parent();
		holiday.remove();
	});

})