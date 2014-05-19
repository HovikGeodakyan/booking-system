
$(document).ready(function(){

	
	
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
		$('.holiday_start').datepicker({ dateFormat: 'yy-mm-dd'});
		$('.holiday_end').datepicker({ dateFormat: 'yy-mm-dd'});
	});

	$(document).on("click", ".remove_holiday", function(event){
		var holiday = $(this).parent().parent();
		holiday.remove();
	});

	    $('.time_dec_button').click(function(e) {
      var time = $(this).parent().parent().find('input').val();
      time = decrement(time, "time");
      $(this).parent().parent().find('input').val(time);
    });    

    $('.time_inc_button').click(function(e) {
      var time = $(this).parent().parent().find('input').val();
      time = increment(time, "time");
      $(this).parent().parent().find('input').val(time);
    });    

    $('.number_dec_button').click(function(e) {
      var number = $(this).parent().parent().find('input').val();
      number = decrement(number, "number");
      $(this).parent().parent().find('input').val(number);
    });    

    $('.number_inc_button').click(function(e) {
      var number = $(this).parent().parent().find('input').val();
      number = increment(number, "number");
      $(this).parent().parent().find('input').val(number);
    });


});



function decrement(value, type) {
  if(type === "time"){
    var hour = parseInt(value.substr(0, 2));
    var minute = parseInt(value.substr(3, 2));

    if(minute < 15) {
      hour--;
      minute=45;
    } else if (minute === 15) {
      minute="00";
    } else {
      minute=minute-15;
    }

    if(hour < 0) {
      hour = "23";
      minute = "45";
    } else if (hour < 10) {
      hour = "0"+hour;
    }

    value = hour + ":" + minute;
  } else if(type === "number") {
    value = parseInt(value);
    if(value !== 0){
      value--;
    }
  }
  return value;
}



function increment(value, type) {
  if(type === "time"){
    var hour = parseInt(value.substr(0, 2));
    var minute = parseInt(value.substr(3, 2));

    if(minute >= 45) {
      hour++;
      minute="00";
    } else {
      minute=minute+15;
    }

    if(hour === 24) {
      hour = "00";
      minute = "00";
    } else if (hour < 10) {
      hour = "0"+hour;
    }

    value = hour + ":" + minute;
  } else if(type === "number") {
    value = parseInt(value);
    value++;
  }
  return value;
}