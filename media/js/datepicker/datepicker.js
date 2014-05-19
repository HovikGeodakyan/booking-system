 $(function() { 
 	function getParameterByName(name) {
	    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
	    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
	        results = regex.exec(location.search);
	    return results == null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
	}
	var calDate = new Date();
	if(document.URL.indexOf('date') !== -1) {
		var calDate = getParameterByName('date');
	} 
    $( "#main_calendar" ).datepicker({ dateFormat: 'yy-mm-dd'});
    $( "#main_calendar" ).datepicker( "setDate", calDate);
 
    $( "#timesheet_calendar" ).click(function() {      
     	 $( "#main_calendar" ).datepicker('show', { dateFormat: 'yy-mm-dd' });
    });

    $("#main_calendar").on("change", function() {
          if(document.URL.indexOf("welcome") === -1) {
              window.location.replace("http://"+ window.location.hostname +"/welcome?date="+$(this).val());
          } 
    });
 	$('.holiday_start').datepicker({ dateFormat: 'yy-mm-dd'});
    $('.holiday_end').datepicker({ dateFormat: 'yy-mm-dd'});

 });