var date = new Date();
var start = new DayPilot.Date().getDatePart().toString();
var end = new DayPilot.Date().addYears(10).getDatePart().toString();
var keyword = "%";

$(document).ready(function(){
    get_reservations(start, end , keyword);
    // console.log(start);
    $('input[name=start_date]').datepicker({ dateFormat: 'yy-mm-dd' })
    $('input[name=end_date]').datepicker({ dateFormat: 'yy-mm-dd' })
    $("#reservations_table").tablesorter();
});

$('#filter').on("submit", function(event){
    event.preventDefault();
    var form = $(this).serializeArray();

    start = (form[0].value.length > 0) ? form[0].value + "T00:00:00" : start;
    end = (form[1].value.length > 0) ? form[1].value + "T00:00:00" : end ;
    keyword = (form[2].value.length > 0) ? form[2].value : "%";
    // console.log(start);
    get_reservations(start, end, keyword);
});

$(document).ajaxStop(function(){ 
    $("#reservations_table").trigger("update");
})

function get_reservations(start, end, keyword){
    var url = "reservations/load/";
    data = {
        start : start,
        end   :end,
        keyword  : keyword
    };

    $('#reservations_table tbody').empty();
    $.ajax({
        type: "POST",
        url: url,
        data: data, 
        dataType: 'json',
        success: function(data) {
            var j = 0;
            for(var i = 0; i < data.length; i++){

                var duration = (data[i]['end'].substr(11, 2)*60 - data[i]['start'].substr(11, 2)*60) + (data[i]['end'].substr(14, 2) - data[i]['start'].substr(14, 2));
                
                if(data[i]['resource'] == 0){
                    j++;
                    data[i]['resource']="NA";
                };               
                
                var row = '<tr><td>'+data[i]['start'].substr(0, 10)+'</td><td>'+data[i]['start'].substr(11, 5)+'</td><td>Lunch</td><td>'+data[i]['guest_number']+'</td><td>'+data[i]['title']+" "+data[i]['text']+'</td><td>'+data[i]['phone']+'</td><td>'+data[i]['email']+'</td><td>'+data[i]['language']+'</td><td>'+data[i]['author']+'</td><td>'+data[i]['status']+'</td><td>'+duration+' min</td><td>'+data[i]['resource']+'</td><td><a class="btEdit btn btn-success" href='+"http://"+ window.location.hostname +"/welcome?date="+data[i]['start'].substr(0, 10)+"&activeReservation="+data[i]['id']+'>View</a></td></tr>'
                $('#reservations_table tbody').append(row); 
            }            
            $('#unassigned').html("("+j+")"); 
        }  

    });   
}