var start = "2014-04-05";
var end = "2014-04-28";
var keyword = "%";

$(document).ready(function(){
    get_reservations(start, end , keyword);
    $('input[name=start_date]').datepicker()
    $('input[name=end_date]').datepicker()
    $("#reservations_table").tablesorter();
});

$('#filter').on("submit", function(event){
    event.preventDefault();
    var form = $(this).serializeArray();
    
    start = (form[0].value.length > 0) ? form[0].value : start;
    end = (form[1].value.length > 0) ? form[1].value : end ;
    keyword = (form[2].value.length > 0) ? form[2].value : "%";
    console.log(keyword);
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
                
                var row = '<tr><td>'+data[i]['start'].substr(0, 10)+'</td><td>'+data[i]['start'].substr(11, 5)+'</td><td>Lunch</td><td>'+data[i]['guest_number']+'</td><td>'+data[i]['title']+" "+data[i]['text']+'</td><td>'+data[i]['phone']+'</td><td>'+data[i]['email']+'</td><td>'+data[i]['language']+'</td><td>'+data[i]['confirm_via_email']+'</td><td>'+data[i]['author']+'</td><td>'+data[i]['status']+'</td><td>'+duration+' min</td><td>'+data[i]['resource']+'</td></tr>'
                $('#reservations_table tbody').append(row); 
            }
            console.log(j);
            $('#unassigned').html("("+j+")"); 
        }  

    });   
}