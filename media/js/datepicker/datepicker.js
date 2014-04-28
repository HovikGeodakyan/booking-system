 $(function() {    
    $( "#main_calendar" ).datepicker({ dateFormat: 'yy-mm-dd'});
    $( "#main_calendar" ).datepicker( "setDate", new Date());
 
    $( "#timesheet_calendar" ).click(function() {      
     	 $( "#main_calendar" ).datepicker('show', { dateFormat: 'yy-mm-dd' });
    });
 
 });