$(document).ready(function(){

	var table   = '<div class="form-group table_box col-lg-12 col-xs-12 col-sm-12"><div class="col-lg-2 col-xs-4 col-sm-4 form-group"><label for="table_standard_seats">Standard number of seats</label><input name="table_seats_standart_number[]" id="table_standard_seats" type="number" class="form-control"></div><div class="col-lg-2 col-xs-4 col-sm-4 form-group"><label for="table_max_seats">Maximum number of seats</label><input name="table_seats_max_number[]" id="table_max_seats" type="number" class="form-control"></div><div class="col-lg-2 col-xs-4 col-sm-4 form-group"><label class="control-label">Combinable</label><div><label class="switch"><input name="table_combinable[]" type="checkbox" checked="checked" value="1"><span></span></label></div></div><div class="col-lg-4 col-xs-8 col-sm-8 form-group"><label>Location</label><select name="table_location[]" class="form-control"><option value="1">Window</option><option value="2">Middle</option><option value="3">Back</option></select></div><div class="col-lg-2 col-xs-4 col-sm-4 form-group"><label class="control-label">Remove the table</label><br><button class="btn btn-danger remove_table" type="button"><i class="fa fa-minus"></i></button></div></div>';
	var holiday = '<div class="col-lg-12 col-xs-12 col-sm-12 form-group"><input name="holiday_id[]" type="hidden" /><div class="col-lg-2 col-xs-4 col-sm-4 form-group"><label for="holiday_name">Name</label><input name="holiday_name[]" id="holiday_name" type="text" class="form-control"></div><div class="col-lg-2 col-xs-4 col-sm-4 form-group"><label for="holiday_start">Start</label><input name="holiday_start[]" id="holiday_start" type="date" class="form-control"></div><div class="col-lg-2 col-xs-4 col-sm-4 form-group"><label for="holiday_end">End</label><input name="holiday_end[]" id="holiday_end" type="date" class="form-control"></div><div class="col-lg-4 col-xs-8 col-sm-8 form-group"><label for="holiday_message">Message</label><input name="holiday_message[]" id="holiday_message" type="text" class="form-control"></div><div class="col-lg-2 col-xs-4 col-sm-4 form-group"><label class="control-label">Remove the holiday</label><br><button class="remove_holiday btn btn-danger" type="button"><i class="fa fa-minus"></i></button></div></div>'
	
	if($("#outlet_tables").val() === '') {
		var old = 0;
	} else {
		var old = parseInt($("#outlet_tables").val());
	}

	$("#outlet_tables").change(function() {
		var i = parseInt($(this).val());
		if(i>= old) {
			i = i-old;
			while(i>0){
				$("#table-container").append(table);
				i--;
			}
		} else {
			i= old-i;
			while(i>0){
				// var cont = $( "#table-container #table-form-group:nth-child("+old+")" );
				var cont = $( ".table_box").eq(old-1);
				cont.empty();
				cont.append(removed_table);
				old--;
				i--;
			}
		}
		$("#add_table").appendTo( "#table-container" );
		old=parseInt($(this).val());

	});

	$("#add_table").click(function(){
		$("#table-container").append(table);
		$("#outlet_tables").val(old+1);
		$( this ).appendTo( "#table-container" );
		old=old+1;
	});

	$("#add_holiday").click(function(){
		$("#holiday-container").append(holiday);
		$( this ).appendTo( "#holiday-container" );
	});

	///
	var removed_table='<input name="table_seats_standart_number[]" type="hidden" value="deleted"><input name="table_seats_max_number[]" type="hidden" value="deleted"><input name="table_combinable[]" type="hidden" value="deleted"><input name="table_location" type="hidden" value="deleted">'
	$(document).on("click", ".remove_table", function(event){
		var cont = $(this).parent().parent();
		cont.empty();
		cont.append(removed_table);
		$("#outlet_tables").val(old-1);
		old=old-1;
	});

	var removed_holiday='<input name="holiday_message[]" type="hidden" value="deleted"><input name="holiday_name[]" type="hidden" value="deleted"><input name="holiday_start[]" type="hidden" value="deleted"><input name="holiday_end[]" type="hidden" value="deleted">'
	$(document).on("click", ".remove_holiday", function(event){
		var cont = $(this).parent().parent();
		cont.empty()
		cont.append(removed_holiday);
	});

})