$(document).ready(function(){
	$("#add_holiday").click(function(){
		$( "#holiday-form-group" ).clone().appendTo( "#holiday-container" );
		$( this ).appendTo( "#holiday-container" );
	});

	var table='<div class="form-group" id="table-form-group" style="display:none"><div class="col-lg-2 form-group"><label for="table_standard_seats">Standard number of seats</label><input name="table_standard_seats[]" id="table_standard_seats" type="number" class="form-control"></div><div class="col-lg-2 form-group"><label for="table_max_seats">Maximum number of seats</label><input name="table_max_seats[]" id="table_max_seats" type="number" class="form-control"></div><div class="col-lg-2 form-group"><label class="control-label">Combinable</label><div><label class="switch"><input name="table_combinable[]" type="checkbox" value="1"><span></span></label></div></div><div class="col-lg-6 form-group"><label>Location</label><select name="table_location[]" class="form-control"><option value="W">Window</option><option value="M">Middle</option><option value="B">Back</option></select></div></div>';

	$("#outlet_tables").change(function(){
		$( "#table-container" ).empty();
		table.css("display", "block");
		table.clone().appendTo( "#table-container" );
		table.css("display", "none");

		var i = $(this).val();
		console.log(i);
		while(i>1){
			$( "#table-form-group" ).clone().appendTo( "#table-container" );
			i--;
		}
	});
})