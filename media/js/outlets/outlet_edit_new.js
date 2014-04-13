$(document).ready(function(){
	$("#add_holiday").click(function(){
		$( "#holiday-form-group" ).clone().appendTo( "#holiday-container" );
		$( this ).appendTo( "#holiday-container" );
	});

	var table='<div class="form-group col-lg-12 col-xs-12 col-sm-12" id="table-form-group"><div class="col-lg-2 col-xs-4 col-sm-4 form-group"><label for="table_standard_seats">Standard number of seats</label><input name="table_seats_standart_number[]" id="table_standard_seats" type="number" class="form-control"></div><div class="col-lg-2 col-xs-4 col-sm-4 form-group"><label for="table_max_seats">Maximum number of seats</label><input name="table_seats_max_number[]" id="table_max_seats" type="number" class="form-control"></div><div class="col-lg-2 col-xs-4 col-sm-4 form-group"><label class="control-label">Combinable</label><div><label class="switch"><input name="table_combinable[]" type="checkbox" checked="checked" value="1"><span></span></label></div></div><div class="col-lg-4 col-xs-8 col-sm-8 form-group"><label>Location</label><select name="table_location[]" class="form-control"><option value="1">Window</option><option value="2">Middle</option><option value="3">Back</option></select></div><div class="col-lg-2 col-xs-4 col-sm-4 form-group"><label class="control-label">Remove the table</label><br><button class="btn btn-danger remove_table" type="button"><i class="fa fa-minus"></i></button></div></div>';

	
	if($("#outlet_tables").val()==""){
		var old=0;
	}else{
		var old=parseInt($("#outlet_tables").val());
	}
	
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
		$("#add_table").appendTo( "#table-container" );
		old=parseInt($(this).val());

	});

	$("#add_table").click(function(){
		$("#table-container").append(table);
		$("#outlet_tables").val(old+1);
		$( this ).appendTo( "#table-container" );
		old=old+1;
	});

	$(".remove_table").click(function(){
		$(this).parent().parent().detach();
		$("#outlet_tables").val(old-1);
		old=old-1;
	});

	$(".remove_holiday").click(function(){
		$(this).parent().parent().detach();
	});
})