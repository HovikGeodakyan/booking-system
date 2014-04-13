 $(function() {    
    $( "#datepicker" ).datepicker();
   
    $( "#timesheet_calendar" ).click(function() {      
     	 $( "#datepicker" ).datepicker('show');
    });
 
 });