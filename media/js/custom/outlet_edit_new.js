$(document).ready(function(){
	$("#add_holiday").click(function(){
		$( "#holiday-form-group" ).clone().appendTo( "#holiday-container" );
		$( this ).appendTo( "#holiday-container" );
	});

	var table='<div class="form-group" id="table-form-group"><div class="col-lg-2 form-group"><label for="table_standard_seats">Standard number of seats</label><input name="table_seats_standart_number[]" id="table_standard_seats" type="number" class="form-control"></div><div class="col-lg-2 form-group"><label for="table_max_seats">Maximum number of seats</label><input name="table_seats_max_number[]" id="table_max_seats" type="number" class="form-control"></div><div class="col-lg-2 form-group"><label class="control-label">Combinable</label><div><label class="switch"><input name="table_combinable[]" type="checkbox" checked value="1"><span></span></label></div></div><div class="col-lg-6 form-group"><label>Location</label><select name="table_location[]" class="form-control"><option value="1">Window</option><option value="2">Middle</option><option value="3">Back</option></select></div></div>';
	var old=0;
	
	$("#outlet_tables").change(function(){
		var i = parseInt($(this).val());

		if(i>=old) {

			i=i-old;
			while(i>0){
				$("#table-container").append(table);
				i--;
			}

		}else{
			i=old-i;
			while(i>0){
				$( "#table-container #table-form-group:nth-child("+old+")" ).detach();
				old--;
				i--;
			}
		}

		old=parseInt($(this).val());

	});
})