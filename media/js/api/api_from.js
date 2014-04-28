$( document ).ready(function() {
  $('input[name=date]').datepicker({ dateFormat: 'yy-mm-dd' });
  $('#reservation_table').chosen();

  //on outlet id enter 
  $('input[name=outlet_id]').on("change", function() {
    var outlet_id = $(this).val();
    $.ajax({
      type: "POST",
      url: "../outlet/get_tables/" + outlet_id,
      dataType: 'json',
      success: function(data) {
        if(data.length === 0) {
          $('input[name=outlet_id]').parent().addClass('has-error');
          $('#reservation_table').empty();
        } else {
          $('input[name=outlet_id]').parent().removeClass('has-error');
          $('#reservation_table').empty();
          for (var i=0; i<data.length; i++) {
            var table = '<option value="'+data[i]['id']+'" >'+"T"+(i+1)+'</option>';
            $('#reservation_table').append(table); 
          }
        }

        $('#reservation_table').chosen().change();
        $('#reservation_table').trigger("chosen:updated");

      }
    });
  });

  $('input[name=time]').on("change", function() {
    var time = $(this).val();
    var date = $('input[name=date]').val();
    var outlet_id = $('input[name=outlet_id]').val();
    $.ajax({
      type: "POST",
      url: "../scheduler/reservations/" + outlet_id,
      dataType: 'json',
      data: {
        start : date + " " + time,
        end: date + " 23:59" ,
        outletID: outlet_id
      },
      success: function(data) {
        var start_time = time;
        var end_time = "23:59";
        for (var i=0; i < data.length; i++) {
          var event_start = data[i].start.substr(11,5);
          var event_end  = data[i].end.substr(11,5)

          if((start_time >= event_start && start_time < event_end)){
            $('#reservation_table option[value=' + data[i]['resource'] + ']').attr('disabled', 'true');
          }
        }
        $('#reservation_table').chosen().change();
        $('#reservation_table').trigger("chosen:updated");
      }
    });
  });

});