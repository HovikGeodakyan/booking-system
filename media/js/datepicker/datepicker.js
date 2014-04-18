 $(function() {    
    $( "#main_calendar" ).datepicker({ dateFormat: 'yy-mm-dd' });
   
    $( "#timesheet_calendar" ).click(function() {      
     	 $( "#main_calendar" ).datepicker('show', { dateFormat: 'yy-mm-dd' });
    });
 
 });