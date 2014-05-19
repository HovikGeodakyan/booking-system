$( document ).ready(function() {
  $('input[name=date]').datepicker();

  $('#static_datepicker').datepicker({
    inline: true,
    minDate: new Date(),
    dateFormat: 'yy-mm-dd',
    onSelect: function() {
      var selected_date = new Date($('#static_datepicker').datepicker("getDate"));
      var date = '';
      var month = selected_date.getMonth()+1;
      var day = selected_date.getDate();
      date += selected_date.getFullYear();
      date += "-";
      date += (month < 10 ) ? "0" + month : month;
      date += "-";
      date += (day < 10 ) ? "0" + day : day;
      $('input[name=date]').val(date);
    }
  });

  $('input[name=date]').change(function() {
    var date = $(this).val();

    $.ajax({
        url: "scheduler//",
        type: "post",
        data: date,
        success: function(data) {

        }
    });  

  });

});