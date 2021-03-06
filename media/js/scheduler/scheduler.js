$( document ).ready(function() {


     var  getParameterByName = function (name) {
          name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
          var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
              results = regex.exec(location.search);
          return results == null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
     }   

     window.activeReservation = undefined;
     if(document.URL.indexOf('activeReservation') !== -1) {
      window.activeReservation = getParameterByName('activeReservation');
     }
     updateClock ();

     setInterval('updateClock()', 60000);
     setInterval("initializeScheduler($('#main_calendar').val(), $('input:radio[name=tables_type]:checked').val())", 900000);

    initializeScheduler($('#main_calendar').val(), $('input:radio[name=tables_type]:checked').val());

    $('td[resource="D"] div').css('background', '#fff');
    $('input[name=new_reservation_date]').datepicker({ dateFormat: 'yy-mm-dd' });
    $('.table_select').chosen();

    $("#main_calendar").on("change", function() {
          $('.loader').show();
          $('#selected_date div').html($('#main_calendar').val());

          initializeScheduler($(this).val(), $('input:radio[name=tables_type]:checked').val()); 
    });

    $('body').on('change', '.time_type_select', function(e) {
      var element = $(this);
      $.ajax({
        type: "POST",
        url: "outlet/hide_tables/",
        dataType: 'json',
        data:{
          timebox: element.attr('name'),
          value: element.val(),
          date: window.selected_date
        },
        success: function(data) {
          //console.log(data);
        }
      });
      
    });


    $('#add_concert').click(function() {
      $('#add_new_concert').modal('show');
      $('input[name=concert_date]').val($('#main_calendar').val());
    });
   
   $('input:radio[name=tables_type]').click(function(e) {
      //$('.loader').show();
      $(this).parent().parent().find('.active').removeClass('active');
      $(this).parent().addClass('active');  
      initializeScheduler($("#main_calendar").val(), $(this).val());
   });   

   $('#date_back').click(function(e) {
      var show_date = new DayPilot.Date($("#main_calendar").val()).addDays(-1).getDatePart().toString();
      show_date = show_date.substr(0, 10);
      $('.loader').show();
      $("#main_calendar").val(show_date);
      initializeScheduler($("#main_calendar").val(), $(this).val());
   });   

   $('#date_forward').click(function(e) {
      var show_date = new DayPilot.Date($("#main_calendar").val()).addDays(1).getDatePart().toString();
      show_date = show_date.substr(0, 10);
      $('.loader').show();
      $("#main_calendar").val(show_date);
      initializeScheduler($("#main_calendar").val(), $(this).val());
   });

    $('.time_dec_button').on("click", function(e) {
      var time = $(this).parent().parent().find('input').val();
      time = decrement(time, "time");
      $(this).parent().parent().find('input').val(time);
    });    

    $('.time_inc_button').on("click", function(e) {
      var time = $(this).parent().parent().find('input').val();
      time = increment(time, "time");
      $(this).parent().parent().find('input').val(time);
    });    

    $('.number_dec_button').on("click", function(e) {
      var number = $(this).parent().parent().find('input').val();
      number = decrement(number, "number");
      $(this).parent().parent().find('input').val(number);
    });    

    $('.number_inc_button').on("click", function(e) {
      var number = $(this).parent().parent().find('input').val();
      number = increment(number, "number");
      $(this).parent().parent().find('input').val(number);
    });
    


    $('.save_concert').on('click', function() {

            var form = $('.concert_form').serialize();

            if ($('.concert_form').parsley('isValid') === false){
              $.alert({
                    text: "Fill in all required blanks, please (marked *)",
              });
              return false;
            }

            $.ajax({
              url: "outlet/update_concert/",
              type: "post",
              data: form,
              success: function(data) {
                $('.save_concert').hide();
                $('.edit_concert').show();
                initializeScheduler($('#main_calendar').val(), $('input:radio[name=tables_type]:checked').val());

              }
          });  
    }); 
});

var current_end = "";

var initializeScheduler = function(currentDate, viewType) {
  $('#dp').remove();
  $('.white_content').append('<div id ="dp"></div>');
  $('#reservation_table').empty();
  $('#save_reservation').unbind();
  $('#has_arrived').unbind();
  $('#cancel_reservation').unbind();
  $('.edit_reservation input[name=time]').unbind();
  $('.edit_reservation input[name=guest_number]').unbind();
  $('#reservation_edit').unbind();
  $('#concert_modal .modal-body').empty();
  $('#concert_header').empty();


  var datePilotDate = '';
  var day;
  if(typeof currentDate !== 'undefined') {
    datePilotDate = new DayPilot.Date(currentDate);
    day = new Date(currentDate).getDay().toString();
  } else {   
    datePilotDate = new DayPilot.Date();
    day = new Date().getDay();
  }
  var current_time = new DayPilot.Date().toString();
  
  window.selected_date = datePilotDate.toString();

  $.ajax({
      type: "POST",
      url: 'outlet/get',
      dataType: 'json',
      data:{start:datePilotDate.toString(), end: datePilotDate.addDays(1).toString(), type:viewType, current_time: current_time, current_end: current_end},
      success: function(data) {
        console.log(data);
            $('#selected_date div').html(show_selected_date($('#main_calendar').val()));
            var get_working_time = function (day){
              //working and break time
              str = "outlet_open_time_" + day;
              open_time = (data[str]==="00:00:00") ? data['outlet_open_time'] : data[str];
              open_time = open_time.substr(0, 2);

              str = "outlet_close_time_" + day;
              close_time = (data[str]==="00:00:00") ? data['outlet_close_time'] : data[str];
              close_time = close_time.substr(0, 2);

              str = "outlet_break_start_time_" + day;
              break_start_time = (data[str]==="00:00:00") ? data['outlet_break_start_time'] : data[str];
              break_start_time = break_start_time.substr(0, 2);

              str = "outlet_break_end_time_" + day;
              break_end_time = (data[str]==="00:00:00") ? data['outlet_break_end_time'] : data[str];
              break_end_time = break_end_time.substr(0, 2);

              concert_time = (data.header_info !== null) ? data.header_info.concert_start.substr(0, 2) : "00"; 
              after_concert_time = (data.header_info !== null) ? data.header_info.concert_end.substr(0, 2) : "00"; 

              outlet_settings = {
                    open_time : open_time,
                    close_time : close_time,
                    break_start_time : break_start_time,
                    break_end_time : break_end_time,
                    
                    launch_time: open_time,
                    pre_concert_time: break_end_time,
                    concert_time: concert_time,
                    after_concert_time: after_concert_time,
                    dinner_time: break_end_time,
              };
          }//get working time
 var get_staying_time = function (start_time){
              var reservation_time_start = start_time + ":00";
              var staying_time;

              if(data.header_info === null){
                  if(start_time < outlet_settings.dinner_time){
                    staying_time = data.outlet_staying_time_lunch;
                  } else {
                    staying_time = data.outlet_staying_time_dinner;
                  }               

              } else {
                  if(start_time < outlet_settings.pre_concert_time){
                    staying_time = data.outlet_staying_time_lunch;
                  } else if(start_time < outlet_settings.concert_time) {
                    staying_time = data.outlet_staying_time_pre_concert;
                  } else if(start_time < outlet_settings.after_concert_time){
                    staying_time = data.outlet_staying_time_concert;
                  } else {
                    staying_time = data.outlet_staying_time_post_concert;
                  }                
              }


              var staying_time_array = staying_time.split(':');
              var reservation_time_array =  reservation_time_start.split(':'); 
              var reservation_end_hours = parseInt(reservation_time_array[0]);
              var reservation_end_minutes = parseInt(reservation_time_array[1]);

              reservation_end_hours += parseInt(staying_time_array[0]);
              reservation_end_minutes += parseInt(staying_time_array[1]);
              
              if( reservation_end_minutes >= 60) {
                reservation_end_hours += 1;
                reservation_end_minutes = reservation_end_minutes - 60;
              }
              
              if(reservation_end_hours >= outlet_settings.close_time){
                reservation_end_hours = outlet_settings.close_time;
                reservation_end_minutes = 0;
              } else if (reservation_end_hours >= outlet_settings.break_start_time && parseInt(reservation_time_array[0]) < outlet_settings.break_start_time) {
                reservation_end_hours = outlet_settings.break_start_time;
                reservation_end_minutes = 0;
              }


              if(reservation_end_minutes < 10) {
                reservation_end_minutes = "0" + reservation_end_minutes; 
              }
              if(reservation_end_hours < 10) {
                reservation_end_hours = "0" + reservation_end_hours; 
              }
              return reservation_end_hours + ":" + reservation_end_minutes;  
          } //Staying Time

        if(data !== 'no_result'){
        if (data.holidays !== null ) {
          $('.holiday_conatainer').empty();
          $('.holiday_conatainer').append("<h2>" + data.holidays.message + "</h2>");
          $('.loader').hide();
          return false;
        } 

        if (data.outlet_day_off === day) {
          $('.holiday_conatainer').empty();
          $('.holiday_conatainer').append("<h2>"+data.translation._day_off_message+"</h2>");
          $('.loader').hide();
          return false;
        }
        $('.holiday_conatainer').empty();

        setTimeout(function(){ $('.loader').hide()}, 1700);
        
        var outlet_settings = {};       
        get_working_time(day);  
        var dp = new DayPilot.Scheduler("dp");
            dp.cssClassPrefix = "scheduler_8";
            dp.cellWidth = 30;
            dp.eventHeight = 25;
            dp.headerHeight = 33;
            dp.rowHeaderWidthAutoFit = false;
            dp.cellGroupBy = "Hour";
            dp.days = dp.startDate.daysInMonth();
            dp.cellDuration = 15;
            dp.startDate    = datePilotDate;
            dp.days   = 1;
            dp.moveBy = 'Full';
            dp.showToolTip = true;              
            dp.timeHeaders = [ {groupBy: 'Week'}, {groupBy: 'Hour'}, ];
            dp.events.list = [];
            dp.treeEnabled = false;
            dp.rowHeaderWidthAutoFit = true; 
            dp.rowHeaderWidth = 25;
            dp.eventClickHandling = "ContextMenu";
            dp.eventHoverHandling = "disabled";
            dp.eventRightClickHandlin   = "Enabled";
            dp.eventDoubleClickHandling = "Bubble";

        current_end = get_staying_time(current_time.substr(11,5)); //get staying time for current time to show free tables
        current_end = current_time.substr(0,10) + "T" + current_end + ":00";

        var clicked_reservation;
        dp.onEventClicked = function(args) {
            $('#reservation_edit').modal('show');
            var reservation_info = args.e.data;     

            if(new DayPilot.Date(reservation_info.start).ticks <= new DayPilot.Date().ticks) {
              $('#reservation_edit input').attr("disabled", "disabled");
              $('#reservation_edit select').attr("disabled", "disabled");
              $('#reservation_edit button').attr("disabled", "disabled");
              $('#has_arrived').attr("disabled", "disabled");
              $('#save_reservation').attr("disabled", "disabled");
              $('#cancel_reservation').attr("disabled", "disabled");
              $('.close').removeAttr("disabled");
            } else {
              $('#reservation_edit input').removeAttr("disabled");
              $('#reservation_edit select').removeAttr("disabled");
              $('#reservation_edit button').removeAttr("disabled");
              $('#has_arrived').removeAttr("disabled");
              $('#save_reservation').removeAttr("disabled");
              $('#cancel_reservation').removeAttr("disabled");
            }

            $('#reservation_edit input').val();
            $('#reservation_edit input[name=date]').val(reservation_info.start.substr(0, 10));
            $('#reservation_edit input[name=time]').val(reservation_info.start.substr(11, 5));
            $('#reservation_edit input[name=end_time]').val(reservation_info.end.substr(11, 5));
            $('#reservation_edit input[name=guest_number]').val(reservation_info.guest_number);
            $('#reservation_edit select[name=title]').val(reservation_info.title);
            $('#reservation_edit select[name=guest_type]').val(reservation_info.guest_type);
            $('#reservation_edit input[name=guest_name]').val(reservation_info.guest_name);
            $('#reservation_edit input[name=guest_last_name]').val(reservation_info.guest_last_name);
            $('#reservation_edit input[name=phone]').val(reservation_info.phone);
            $('#reservation_edit input[name=email]').val(reservation_info.email);
            $('#reservation_edit input[name=author]').val(reservation_info.author);
            $('#reservation_edit textarea[name=comment]').val(reservation_info.comment);
            $('#reservation_edit input[name=expiery_date]').val(reservation_info.expiery_date);
            $('#reservation_edit input[name=WB]').val(reservation_info.WB);
            if (reservation_info.provisional === "1") { 
              $('#reservation_edit input[name=provisional]').attr("checked", "checked");
            } else {
              $('#reservation_edit input[name=provisional]').removeAttr("checked");
            }
            $('#reservation_edit input[name=confirm_via_email]').parent().parent().parent().hide();
            
            var array_of_tables = [];
            for (var i=0; i<dp.events.list.length; i++) {
              if(dp.events.list[i].id === reservation_info.id) {
                array_of_tables.push(dp.events.list[i].resource);
              }
            }

            // $('#reservation_table option[value=' + reservation_info.resource + ']').attr('selected', 'selected');
            $('#reservation_table').val(array_of_tables).trigger("chosen:updated");

            mark_busy_tables(reservation_info.start.substr(11, 5), reservation_info.end.substr(11, 5), "reservation_table");        
            mark_incufficent_capacity_tables(reservation_info.guest_number, "reservation_table");

            clicked_reservation = args.e;
        };

        var i = 0; //Time header, light dark counter
        var k = 0;
        dp.onBeforeTimeHeaderRender = function(args) {
          if (args.header.level === 0) {
             var padding = 0; 

             var launch_box_width        = (outlet_settings.pre_concert_time - outlet_settings.launch_time)*4*dp.cellWidth - (outlet_settings.break_end_time - outlet_settings.break_start_time)*4* dp.cellWidth - padding + 'px;';
             var dinner_box_width        = (outlet_settings.close_time -  outlet_settings.dinner_time)*4*dp.cellWidth - padding + 'px;';
             var pre_concert_box_width   = (outlet_settings.concert_time -  outlet_settings.pre_concert_time)*4*dp.cellWidth - padding + 'px;';
             var concert_box_width       = (outlet_settings.after_concert_time -  outlet_settings.concert_time)*4*dp.cellWidth - padding + 'px;';
             var after_concert_box_width = (outlet_settings.close_time - outlet_settings.after_concert_time)*4*dp.cellWidth - padding + 'px;';
             
             var launch_options = '';
             var pre_concert_options = '';
             var concert_options = '';
             var after_concert_options = '';
             var dinner_options = '';

             
            var not_bookable_table_number_lunch        = parseInt(data.outlet_default_not_bookable_table_lunch);
            var not_bookable_table_number_dinner       = parseInt(data.outlet_default_not_bookable_table_dinner);
            var not_bookable_table_number_pre_concert  = parseInt(data.outlet_default_not_bookable_table_pre_concert);
            var not_bookable_table_number_concert      = parseInt(data.outlet_default_not_bookable_table_concert);
            var not_bookable_table_number_post_concert = parseInt(data.outlet_default_not_bookable_table_post_concert);

              for(var t=0; t<data.tables.length; t++) { 
                var launch_selected = '';
                var pre_concert_selected = '';
                var concert_selected = '';
                var after_concert_selected = '';
                var dinner_selected = '';

                if((t+1) === not_bookable_table_number_lunch){
                  launch_selected = 'selected';
                }           
                launch_options += "<option "+launch_selected+" >"+(t+1) + "</option>";
                
                if((t+1) === not_bookable_table_number_pre_concert){
                  pre_concert_selected = 'selected';
                }           
                pre_concert_options += "<option "+pre_concert_selected+" >"+(t+1) + "</option>";
               
                if((t+1) === not_bookable_table_number_concert){
                  concert_selected = 'selected';
                }           
                concert_options += "<option "+concert_selected+" >"+(t+1) + "</option>";
                
                if((t+1) === not_bookable_table_number_post_concert){
                  after_concert_selected = 'selected';
                }           
                after_concert_options += "<option "+after_concert_selected+" >"+(t+1) + "</option>";
               
                if((t+1) === not_bookable_table_number_dinner){
                  dinner_selected = 'selected';
                }           
                dinner_options += "<option "+dinner_selected+" >"+(t+1) + "</option>";
             }

             args.header.html =  '<div class="time_type_box" style="width:'+ launch_box_width +'"><label class="time_type_label">'+data.translation._lunch+'</label><select name="lunch" class="form-control m-b time_type_select">'+launch_options+'</select></div>';
              
              if (data.header_info === null){
                args.header.html += '<div class="time_type_box" style="width:'+ dinner_box_width +'"><label class="time_type_label">'+data.translation._evening+'</label><select  name="dinner" class="form-control m-b time_type_select">'+dinner_options+'</select></div>';   
              } else {
                args.header.html += '<div class="time_type_box" style="width:'+ pre_concert_box_width +'"><label class="time_type_label">'+data.translation._pre_concert+'</label><select name="pre_concert" class="form-control m-b time_type_select">'+pre_concert_options+'</select></div>';
                args.header.html += '<div class="time_type_box" style="width:'+ concert_box_width +'"><label class="time_type_label">'+data.translation._concert+'</label><select  name="concert" class="form-control m-b time_type_select">'+concert_options+'</select></div>';
                args.header.html += '<div class="time_type_box" style="width:'+ after_concert_box_width +'"><label class="time_type_label">'+data.translation._post_concert+'</label><select  name="post_concert" class="form-control m-b time_type_select">'+after_concert_options+'</select></div>';
              }
          }
         
          if (args.header.level === 1) {
              var val = args.header.html;
              var className = '';
             
              if(i%2 === 0) {
                 className = 'timeheadergroup_inner_light'; 
              } else {
                 className = 'timeheadergroup_inner_dark';
              }
              i++;
              args.header.html = '<div class="'+ className+'">' + val + '</div>';   
          }

          //getting tables availability at current time
          if (args.header.level === 2) {            
            var progress = 0;
              var val = args.header.html;
              var color = '';               
                if(k < 4 ) {
                   color = '#e0e6f0'; 
                }
                k++;
                if(k===8) {
                  k=0;
                }
                
                args.header.backColor = color;

              for (var j = 0; j < dp.events.list.length; j++) {
                
                if(typeof dp.events.list[j] != 'undefined' && dp.events.list[j].resource.substr(0,2) !== "na") {
                 if(dp.events.list[j].start.substr(11,5) <= args.header.start.toString().substr(11,5) && dp.events.list[j].end.substr(11,5) >= args.header.end.toString().substr(11,5)){
                  progress++;
                 }
               }
              }
            
            //number of available tables for the cell
            progress = data.outlet_tables_number - progress;
           
            var progressClass ='';
              if (progress > 3) {
                progressClass = 'progress_green';
              } else if(progress == 0){
                  progressClass = 'progress_red';
              } else if(progress <= 3){
                progressClass = 'progress_yellow';
              }
            args.header.html = '<div class="sheduler_minut_value">'+args.header.html +'</div><div class="sheduler_progress_bar '+ progressClass +'"></div>';
          }

        };// onBeforeTimeHeaderRender 

        //initialise dp resources aka outlet tables
        dp.resources = [];
        
        for(var i=0; i < data['tables'].length; i++){
          var table = '<option value="'+data['tables'][i]['table_id']+'" >'+"T"+(i+1)+'</option>'; ///add outlet tabes to the new reservation select menu
          if(data['tables'][i]['table_combinable'] === "0") {
            table = '<option value="'+data['tables'][i]['table_id']+'" >'+"T"+(i+1)+' (not combinable)</option>';
          }
          $('#reservation_table').append(table); ///add outlet tabes to the new reservation select menu
          dp.resources.push({name: "T"+data['tables'][i]['table_name'], id: data['tables'][i]['table_id']}); //add the outlet table to the matrix resources tab
        }

        $('#reservation_table').chosen({width: "100%"});
        
        var not_assigned_number = data.not_assigned;
        if(not_assigned_number > 0){
          dp.resources.push({name: "", id: "D"}); //add the divider
        }
        //add fields for not assigned tables
        
        for(var i=1; i<= not_assigned_number; i++){
          dp.resources.push({name: "U"+i, id: "na"+i});
        }

        

        dp.onBeforeEventRender = function(args) {
          
           switch (args.e.status) {
              case 'arrived' : args.e.cssClass = "arrived"; break;
              case 'not_show': args.e.cssClass = "not_show"; break;
              case 'late'    : args.e.cssClass = "late"; break;
            }

            if(args.e.provisional === "1") {
              args.e.cssClass = "provisional";
            }

            if(window.activeReservation === args.e.id) {
              args.e.cssClass += " highlighted";
            }
        };

        //change the color of divider and past hours
        dp.onBeforeCellRender = function(args) {
          if(args.cell.resource === 'D') {
              args.cell.backColor = "#fff";
              args.cell.cssClass = 'no_border';
          }

          if (args.cell.start.ticks <= new DayPilot.Date().ticks) {
              args.cell.backColor = "#DDDADA";
          }
        };

        /*
          Hide Restaurant break times, if this not commented, then showNonBusiness doesn`t work
        */
        dp.onIncludeTimeCell = function(args) {
            var cell_time = args.cell.start.toString().substr(11,2);
            if (cell_time < outlet_settings.open_time || cell_time>=outlet_settings.close_time || (cell_time>=outlet_settings.break_start_time && cell_time<outlet_settings.break_end_time)) { 
                args.cell.visible = false;
            }
        };
         
        //disable divider borders
        dp.onBeforeResHeaderRender = function(args) {  
            if (args.resource.id === 'D') {
               args.resource.cssClass = 'no_border_res_header';      
            }
        };

        //remember the original position of reservation to revert it
        var revert;
        dp.onEventMove = function (args,e){          
          revert = (args.e.data.resource.substr(0,2) === "na") ? 0 : args.e.data.resource;
          return false;
        }

        //move a reservation
        dp.onEventMoved = function (args) {
            //console.log(args.e.part.start.ticks <= new DayPilot.Date().ticks);
            // if(args.e.part.start.ticks <= new DayPilot.Date().ticks || args.newResource === "D" || args.newStart.ticks < new DayPilot.Date().ticks || args.newResource.substr(0,2) === "na"){
            //       args.e.data.resource = revert;//revert to original row
            //       //reverting event start and end
                  
            //       args.e.data.start = args.e.part.start;
            //       args.e.data.end   = args.e.part.end;
            //       // return false;
            // }
            if(args.newResource.indexOf('na') !== -1) {
              args.newResource = 0;
            }

            var resources = [];
            for (var i=0; i<dp.events.list.length; i++) {
              if (dp.events.list[i].id === args.e.id()) {
                resources.push(dp.events.list[i].resource);
              }
            }
            resources = resources.join(",");

            $.post("scheduler/move/" + data["outlet_id"], {
                id: args.e.id(),
                currentTime: new DayPilot.Date().toString(),
                oldStart:args.e.part.start.toString(),
                newStart: args.newStart.toString(),
                newEnd: args.newEnd.toString(),
                newResource: resources
            },  function(data) {
                  if(data.result == "NOK"){
                    args.e.data.resource=revert;//revert to original row
                    //reverting event start and end
                    args.e.data.start=args.e.part.start;
                    args.e.data.end=args.e.part.end;

                    dp.events.update(args.e);
                  } else {
                    message(data.message);
                    dp.events.update(args.e);
                    loadEvents();
                    //dp.update(); 
                  }

            });
        };//onEventMoved 

       
        dp.onEventResized = function (args) {

            var resources = [];
            for (var i=0; i<dp.events.list.length; i++) {
              if (dp.events.list[i].id === args.e.id()) {
                resources.push(dp.events.list[i].resource);
              }
            }
            resources = resources.join(",");

            $.post("scheduler/resize/" + data["outlet_id"],  {
                id: args.e.id(),
                newStart: args.newStart.toString(),
                newEnd: args.newEnd.toString(),
                resource: resources
            },  function(data) {
                  if(data.result=="NOK"){
                    message(data.message);
                    //revert event
                    args.e.data.end=args.e.part.end;
                    dp.events.update(args.e);
                    
                  }else{
                    message(data.translation._resized);
                    loadEvents();
                    // dp.update();
                  }
            });
        };

        //var reservation_end = "";
        //create new reservation within selected timerange
        dp.onTimeRangeSelected = function (args) {
          // Disable event creation in Time < Current Time
            if(args.start.ticks < new DayPilot.Date().ticks) {
              message(data.translation._wrong_time);
              dp.clearSelection();
              return false;
            }
            clicked_reservation = null;

            $('#reservation_edit').modal('show');

            for(var i=0; i<data.tables.length; i++) {
              if(data.tables[i].table_id === args.resource) {
                var guests = data.tables[i].table_seats_standart_number;
              }
            }

            $('#reservation_edit input').val("");

            $('#reservation_edit input[name=guest_number]').val(guests);
            $('#reservation_edit input[name=date]').val(args.start.toString().substr(0, 10));
            $('#reservation_edit input[name=time]').val(args.start.toString().substr(11, 5));
            var res_end_time = get_staying_time(args.start.toString().substr(11, 5));
            $('#reservation_edit input[name=end_time]').val(res_end_time);

              $('#reservation_edit input').removeAttr("disabled");
              $('#reservation_edit select').removeAttr("disabled");
              $('#reservation_edit button').removeAttr("disabled");
              $('#save_reservation').removeAttr("disabled");
              $('#cancel_reservation').attr("disabled", "disabled");
              $('#has_arrived').attr("disabled", "disabled");
              $('#reservation_edit input[name=provisional]').removeAttr("checked");
              $('#reservation_edit input[name=confirm_via_email]').parent().parent().parent().show();

            $('#reservation_table option').removeAttr("selected");
            $('#reservation_table option').removeAttr("disabled");
            $('#reservation_table').val(args.resource).trigger("chosen:updated");
            
            mark_busy_tables(args.start.toString().substr(11, 5), res_end_time, "reservation_table");
            
            //reservation_end = args.end.toString();
        };

      
        function loadEvents() {
            var start = dp.startDate;
            var end   = dp.startDate.addDays(dp.days);
            $.post("scheduler/reservations/" + data["outlet_id"], {
                    start: start.toString(),
                    end: end.toString(), 
                }, function(data) {
                      var notAssCount = 1;
                      var length = data.length;
                      var ext = data.length;
                      for(var i= 0; i < ext; i++) {
                        var tables_array = data[i].resource.split(",");
                        if(data[i].resource === "0") {
                          data[i].resource = 'na'+ notAssCount;
                          notAssCount++;
                        }
                        if (tables_array.length > 1) {
                          data[i].resource = tables_array[0];
                          for (var j=1; j < tables_array.length; j++) {
                            data[length] = {};
                            data[length] = $.extend(true, {}, data[i]);
                            
                            data[length].resource = tables_array[j];
                            length++;
                          }
                          
                        }
                      }
                      
                      dp.events.list = data;
                      set_late_not_show_status();
                      dp.update();
                  }
            );
        }    

        dp.init(); //initialize day pilot
        loadEvents(); //run the loadevents function   

        /*
            Set Arraived, Cancel, Edit evetns
        */      

        $('#has_arrived').click(function() {
            $.post("scheduler/status/" + data["outlet_id"],
            {
                id: clicked_reservation.value(),
                status: "arrived"
            }, 
            function(data){
              //$('#reservation_edit').modal('hide');
              //dp.message("Reservation status changed to 'arrived'.");
              dp.events.update(clicked_reservation);
              loadEvents();
              // dp.update();
            });
        }); 

        $('#cancel_reservation').confirm({
            text: data.translation._if_cancel_reservation,
            title: data.translation._confirmation_required,
            confirm: function(button) {
              $.post("scheduler/status/" + data["outlet_id"],
              {
                  id: clicked_reservation.value(),
                  status: "cancelled"
              }, 
              function(data){
                $('#reservation_edit').modal('hide');
                message(data.translation._reservation_cancelled);
                dp.events.remove(clicked_reservation);
                loadEvents();
                // dp.update();
              });
            },
            cancel: function(button) {
                return false;
            },
            confirmButton: data.translation._yes,
            cancelButton: data.translation._no,
            post: true
        });


        $('#save_reservation').click(function(){
            var form = $('.edit_reservation').serialize();
            var reservation_date = $('#reservation_edit input[name=date]').val();
            var reservation_time = $('#reservation_edit input[name=time]').val();
            var reservation_start = reservation_date + "T" + reservation_time + ":00";
            var reservation_end = $('#reservation_edit input[name=end_time]').val();
            reservation_end = reservation_date + "T" + reservation_end;

            var tables = $('#reservation_table').val();

            if(tables.length > 1) {
              for (var i=0; i<data.tables.length; i++) {
                if($.inArray(data.tables[i].table_id, tables) >= 0 && data.tables[i].table_combinable === "0") {
                  $.alert({
                    text: "You are trying to combine incombinable",
                  });
                  return false;
                }
              }
            }

            
            if ($('.edit_reservation').parsley('isValid') === false){
              $.alert({
                    text: data.translation._fill_in,
              });
              return false;
            }

            var reservation_id = (clicked_reservation === null) ? '' : clicked_reservation.value();

            $.ajax({
              url: "scheduler/update/" + data.outlet_id + "/" + reservation_id,
              type: "post",
              data: form + "&start=" + reservation_start + "&end=" + reservation_end,
              success: function(data) {
                $('#reservation_edit').modal('hide');
                message(data.translation._updated);
                dp.clearSelection();
                loadEvents();
                // dp.update();
              }
          });
        });              

          
        $('.edit_reservation input[name=time]').on("change", function(){
            time = $(this).val().split(':');
            var current_hour = new DayPilot.Date().toString().substr(11, 2);
            var current_minutes = new DayPilot.Date().toString().substr(14, 2);
            if (time[0] < current_hour || (time[0] === current_hour && time[1] <= current_minutes)) {

              current_minutes = Math.round(current_minutes/15) * 15;
              if(current_minutes === 60){
                current_minutes = 0;
                current_hour++;
              }
              if(current_minutes < 10) {
                current_minutes = "0" + current_minutes; 
              }
              $(this).val(current_hour + ":" + current_minutes);

              time = $(this).val().split(':');
            }

            if($(this).val() >= break_start_time && $(this).val() <= break_end_time){
              $(this).val(break_end_time + ":00");
            }

            mark_busy_tables($(this).val(), "reservation_table");        
        });



        $('.edit_reservation input[name=guest_number]').on("change", function(){
            mark_incufficent_capacity_tables($(this).val(), "reservation_table");
        });

        $('#reservation_edit').on('hidden.bs.modal', function () {
            dp.clearSelection();
            $('#has_arrived').attr('disabled', true);
            $('#cancel_reservation').attr('disabled', true);
        });

        /*
            Custom Functions
        */
       
          function mark_busy_tables(start_time, end_time, select_box){
              
              $('#' + select_box + ' option').removeAttr('disabled');

              for (var i=0; i < dp.events.list.length; i++) {
                var event_start = dp.events.list[i].start.substr(11,5);
                var event_end  = dp.events.list[i].end.substr(11,5)

                if((start_time >= event_start && start_time < event_end) || 
                   (end_time > event_start && end_time <= event_end) ||
                   (start_time < event_start && end_time > event_end) ||
                   (start_time > event_start && end_time < event_end)
                ){
                  $('#' + select_box + ' option[value=' + dp.events.list[i]['resource'] + ']').attr('disabled', 'true');
                }
              }
              $('#' + select_box + ' option:selected').removeAttr('disabled');
              $('#' + select_box).chosen().change();
              $('#' + select_box).trigger("chosen:updated");
          }

          function mark_incufficent_capacity_tables(guest_number, select_box){
              for (var i=0; i < data['tables'].length; i++) {
                if(guest_number > data['tables'][i]['table_seats_max_number']){
                  $('#' + select_box + ' option[value=' + data['tables'][i]['table_id'] + ']').addClass("warning");
                }
              }

              $('#' + select_box).chosen().change();
              $('#' + select_box).trigger("chosen:updated");
          }


          function set_late_not_show_status() {
            var arrayof_late_not_shows = [];
            var no_show_limit = data.outlet_no_show_limit * 60 * 1000;

            for (var i=0; i<dp.events.list.length; i++) {
              if ((new DayPilot.Date().ticks - new DayPilot.Date(dp.events.list[i].start).ticks) >= no_show_limit && dp.events.list[i].status !== "arrived") {
                dp.events.list[i].status = "not_show";
                arrayof_late_not_shows.push({id: dp.events.list[i].id, status: 'not_show'});

              } else if ((new DayPilot.Date(dp.events.list[i].start).ticks - 1800000) <= new DayPilot.Date().ticks && dp.events.list[i].status !== "arrived") {
                 dp.events.list[i].status = "late";
                 arrayof_late_not_shows.push({id: dp.events.list[i].id, status: 'late'});
              } else if(dp.events.list[i].status !== "arrived") {
                 dp.events.list[i].status = "";
                 arrayof_late_not_shows.push({id: dp.events.list[i].id, status: ''});
              }
            }

            //console.log (arrayof_late_not_shows);
            if(arrayof_late_not_shows.length > 0) {
              $.post("scheduler/set_late_not_show/" + data["outlet_id"],  {
                arr: arrayof_late_not_shows
                },  function(data) {
              });
            }
          }


          //Create concert header and modal
          $('#add_concert').show();

          if(data.header_info !== null ) {
            var concert_modal = '<h4>'+data.header_info.concert_name+'</h4>';
            concert_modal += '<p>'+data.header_info.concert_description+'</p>';

            $('#concert_modal .modal-body').append(concert_modal);

            var concert_header = '<i class="fa fa-music concert_icon" onClick=concert_icon()></i> Today '+data.header_info.concert_name + " " + data.header_info.concert_start.substr(0, 5);
            $('#concert_header').append(concert_header);
            $('#add_concert').hide();
          }      
        } else {
           $('.loader').hide();
        } //End if no-result

        $('.edit_concert').on("click", function(){
            $('#concert_modal .modal-body').empty();

            var concert_modal = '';
            concert_modal += '<form class="col-lg-12 concert_form" role="form" data-validate="parsley" method="post" action="">';

            concert_modal += '<input type="hidden" name="concert_date">';
            concert_modal += '<input type="hidden" name="outlet_id">';

            concert_modal += '<div class="form-group col-lg-12">';
            concert_modal += '<label>'+data.translation._title+'*</label>';
            concert_modal += '<input type="text" class="form-control" name="concert_name" data-required="true">';
            concert_modal += '</div>';

            concert_modal += '<div class="form-group col-lg-6">';
            concert_modal += '<label>'+data.translation._start+'*</label>';
            concert_modal += '<div class="input-group">';
            concert_modal += '<span class="input-group-btn">';
            concert_modal += '<button class="btn btn-default time_dec_button" type="button">-</button>';
            concert_modal += '</span>';
            concert_modal += '<input type="text" step="900" class="form-control" name="concert_start" data-required="true" value="00:00">';
            concert_modal += '<span class="input-group-btn">';
            concert_modal += '<button class="btn btn-default time_inc_button" type="button">+</button>';
            concert_modal += '</span>';
            concert_modal += '</div>';
            concert_modal += '</div>';

            concert_modal += '<div class="form-group col-lg-6">';
            concert_modal += '<label>'+data.translation._end+'*</label>';
            concert_modal += '<div class="input-group">';
            concert_modal += '<span class="input-group-btn">';
            concert_modal += '<button class="btn btn-default time_dec_button" type="button">-</button>';
            concert_modal += '</span>';
            concert_modal += '<input type="text" step="900" class="form-control col-lg-6" name="concert_end" data-required="true" value="00:00">';
            concert_modal += '<span class="input-group-btn">';
            concert_modal += '<button class="btn btn-default time_inc_button" type="button">+</button>';
            concert_modal += '</span>';
            concert_modal += '</div>';
            concert_modal += '</div>';

            concert_modal += '<div class="form-group col-lg-12">';
            concert_modal += '<label>'+data.translation._description+'</label>';
            concert_modal += '<textarea type="text" class="form-control" name="concert_description"></textarea>';
            concert_modal += '</div>';

            concert_modal += '</form>';

            $('#concert_modal .modal-body').append(concert_modal);
            $('input[name=concert_name]').val(data.header_info.concert_name);
            $('input[name=concert_start]').val(data.header_info.concert_start.substr(0, 5));
            $('input[name=concert_end]').val(data.header_info.concert_end.substr(0, 5));
            $('textarea[name=concert_description]').val(data.header_info.concert_description);
            $('input[name=concert_date]').val($('#main_calendar').val());
            $('input[name=outlet_id]').val(data.outlet_id);
            $(this).hide();
            $('.save_concert').show();
        });

      $( "#guest_name" ).autocomplete({
        source: data.autocomplete['names']
      });      

      $( "input[name=email]" ).autocomplete({
        source: data.autocomplete['emails']
      });      

      $( "input[name=phone]" ).autocomplete({
        source: data.autocomplete['phones']
      });

          function show_selected_date(date) {
            var selectedDate  = new Date (date);
            var selectedMonth = selectedDate.getMonth ( ) + 1;
            var selectedDay   = selectedDate.getDate ( );
            var selectedYear  = selectedDate.getFullYear ( );
            var selectedWeekDay = selectedDate.getDay();

            switch (selectedWeekDay) {
              case 0: selectedWeekDay = data.translation._sunday.substr(0, 2); break;
              case 1: selectedWeekDay = data.translation._monday.substr(0, 2); break;
              case 2: selectedWeekDay = data.translation._tuesday.substr(0, 2); break;
              case 3: selectedWeekDay = data.translation._wednesday.substr(0, 2); break;
              case 4: selectedWeekDay = data.translation._thursday.substr(0, 2); break;
              case 5: selectedWeekDay = data.translation._friday.substr(0, 2); break;
              case 6: selectedWeekDay = data.translation._saturday.substr(0, 2); break;
            }

            switch (selectedMonth) {
              case 1: selectedMonth = data.translation._january.substr(0, 3); break;
              case 2: selectedMonth = data.translation._february.substr(0, 3); break;
              case 3: selectedMonth = data.translation._march.substr(0, 3);; break;
              case 4: selectedMonth = data.translation._aprel.substr(0, 3);; break;
              case 5: selectedMonth = data.translation._may.substr(0, 3);; break;
              case 6: selectedMonth = data.translation._june.substr(0, 3);; break;
              case 6: selectedMonth = data.translation._july.substr(0, 3);; break;
              case 8: selectedMonth = data.translation._august.substr(0, 3);; break;
              case 9: selectedMonth = data.translation._september.substr(0, 3);; break;
              case 10: selectedMonth = data.translation._october.substr(0, 3);; break;
              case 11: selectedMonth = data.translation._november.substr(0, 3);; break;
              case 12: selectedMonth = data.translation._december.substr(0, 3);; break;
            }


            return selectedWeekDay + ". " + selectedDay + ". " + selectedMonth + " " + selectedYear;
          }


      } // Ajax Success
  }); // Ajax 
    
} // initialize funcction

function updateClock () {
    var currentTime = new Date ( );
    var currentHours   = currentTime.getHours ( );
    var currentMinutes = currentTime.getMinutes ( );
    // var currentMonth = currentTime.getMonth() +1;
    // var currentday = currentTime.getDate();
    // var year = currentTime.getFullYear();
    
    currentMinutes = ( currentMinutes < 10 ? "0" : "" ) + currentMinutes;
    // currentday = ( currentday < 10 ? "0" : "" ) + currentday;
    // currentMonth = ( currentMonth < 10 ? "0" : "" ) + currentMonth;
    
    //var currentTimeString = currentHours + ":" + currentMinutes + ' ' + currentday + "." + currentMonth + "." + year ;
    var currentTimeString = currentHours + ":" + currentMinutes;
        
    $("#current_time").html(currentTimeString);        
 }

function concert_icon(){
  $('#concert_modal').modal('show');
}


function message(message){
  $('#message_container').show();
  message = '<div id="message">'+ message +'</div>'
  $('#message_container').html(message);
  setTimeout(function(){
    $('#message').fadeOut();
    $('#message_container').empty();
  }, 2000);  
}


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