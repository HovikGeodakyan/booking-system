$( document ).ready(function() {
     updateClock ();
     setInterval('updateClock()', 60000);
     setInterval("initializeScheduler($('#main_calendar').val(), $('input:radio[name=tables_type]:checked').val())", 900000);

     initializeScheduler($('#main_calendar').val(), $('input:radio[name=tables_type]:checked').val());

    $('td[resource="D"] div').css('background', '#fff');
    $('input[name=new_reservation_date]').datepicker({ dateFormat: 'yy-mm-dd' });
    $('.table_select').chosen();

    $("#main_calendar").on("change", function() {
          $('.loader').show();
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
   
   $('input:radio[name=tables_type]').click(function(e) {
      $('.loader').show();
      $(this).parent().parent().find('.active').removeClass('active');
      $(this).parent().addClass('active');  
      initializeScheduler($("#main_calendar").val(), $(this).val());

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
    day = new Date(currentDate).getDay();
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
        //console.log(data);
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
            dp.eventRightClickHandlin   = "Enabled";
            dp.eventDoubleClickHandling = "Bubble";
            /* Event Hover popup */
            dp.bubble = new DayPilot.Bubble({
                cssClassPrefix: "bubble_default",
                onLoad: function(args) {
                    var ev = args.source;
                    args.async = true;                       
                    setTimeout(function() {
                        args.html = "<div style='font-weight:bold'>" + ev.text() + "</div><div>Start: " + ev.start().toString("MM/dd/yyyy HH:mm") + "</div><div>End: " + ev.end().toString("MM/dd/yyyy HH:mm") + "</div><div>Id: " + ev.id() + "</div>";
                        args.loaded();
                    }, 500);
                }
             });

        

        current_end = get_staying_time(current_time.substr(11,5)); //get staying time for current time to show free tables
        current_end = current_time.substr(0,10) + "T" + current_end + ":00";

        var clicked_reservation;
        dp.onEventClicked = function(args) {
            $('#reservation_edit').modal('show');
            var reservation_info = args.e.data;              
            
            $('#reservation_edit input').val();
            $('#reservation_edit input[name=date]').val(reservation_info.start.substr(0, 10));
            $('#reservation_edit input[name=time]').val(reservation_info.start.substr(11, 5));
            $('#reservation_edit input[name=end_time]').val(reservation_info.end.substr(11, 5));
            $('#reservation_edit input[name=guest_number]').val(reservation_info.guest_number);
            $('#reservation_edit select[name=title]').val(reservation_info.title);
            $('#reservation_edit select[name=guest_type]').val(reservation_info.guest_type);
            $('#reservation_edit input[name=guest_name]').val(reservation_info.guest_name);
            $('#reservation_edit input[name=phone]').val(reservation_info.phone);
            $('#reservation_edit input[name=email]').val(reservation_info.email);
            $('#reservation_edit input[name=author]').val(reservation_info.author);
            
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
            
            $('#has_arrived').removeAttr('disabled');
            $('#cancel_reservation').removeAttr('disabled');

            clicked_reservation = args.e;
        };

        var i = 0; //Time header, light dark counter
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

             if (data.header_info === null) {
                var not_bookable_table_number_lunch        = parseInt(data.outlet_default_not_bookable_table_lunch);
                var not_bookable_table_number_dinner       = parseInt(data.outlet_default_not_bookable_table_dinner);
                var not_bookable_table_number_pre_concert  = parseInt(data.outlet_default_not_bookable_table_pre_concert);
                var not_bookable_table_number_concert      = parseInt(data.outlet_default_not_bookable_table_concert);
                var not_bookable_table_number_post_concert = parseInt(data.outlet_default_not_bookable_table_post_concert);
             }

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

             args.header.html =  '<div class="time_type_box" style="width:'+ launch_box_width +'"><label class="time_type_label">Lunch</label><select name="lunch" class="form-control m-b time_type_select">'+launch_options+'</select></div>';
              
              if (data.header_info === null){
                args.header.html += '<div class="time_type_box" style="width:'+ dinner_box_width +'"><label class="time_type_label">Evening</label><select  name="dinner" class="form-control m-b time_type_select">'+dinner_options+'</select></div>';   
              } else {
                args.header.html += '<div class="time_type_box" style="width:'+ pre_concert_box_width +'"><label class="time_type_label">Pre Concert</label><select name="pre_concert" class="form-control m-b time_type_select">'+pre_concert_options+'</select></div>';
                args.header.html += '<div class="time_type_box" style="width:'+ concert_box_width +'"><label class="time_type_label">Concert</label><select  name="concert" class="form-control m-b time_type_select">'+concert_options+'</select></div>';
                args.header.html += '<div class="time_type_box" style="width:'+ after_concert_box_width +'"><label class="time_type_label">After Concert</label><select  name="post_concert" class="form-control m-b time_type_select">'+after_concert_options+'</select></div>';
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
                progressClass = 'progress_blue';
              }
            args.header.html = '<div class="sheduler_minut_value">'+args.header.html +'</div><div class="sheduler_progress_bar '+ progressClass +'"></div>';
          }

        };// onBeforeTimeHeaderRender 

        //initialise dp resources aka outlet tables
        dp.resources = [];
        
        for(var i=0; i < data['tables'].length; i++){
          var table = '<option value="'+data['tables'][i]['table_id']+'" >'+"T"+(i+1)+'</option>'; ///add outlet tabes to the new reservation select menu
          $('#reservation_table').append(table); ///add outlet tabes to the new reservation select menu
          dp.resources.push({name: "T"+(i+1), id: data['tables'][i]['table_id']}); //add the outlet table to the matrix resources tab
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
            console.log(args.e.part.start.ticks <= new DayPilot.Date().ticks);
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
                    dp.message("Moved");
                    dp.events.update(args.e);
                    loadEvents();
                    dp.update();
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
                    dp.message(data.message);
                    //revert event
                    args.e.data.end=args.e.part.end;
                    dp.events.update(args.e);
                    
                  }else{
                    dp.message("Resized");
                    loadEvents();
                    dp.update();
                  }
            });
        };

        //var reservation_end = "";
        //create new reservation within selected timerange
        dp.onTimeRangeSelected = function (args) {
          // Disable event creation in Time < Current Time
            if(args.start.ticks < new DayPilot.Date().ticks) {
              dp.message('Wrong Time');
              dp.clearSelection();
              return false;
            }

            $('#reservation_edit').modal('show');
            
            $('#reservation_edit input').val("");
            $('#reservation_edit input[name=date]').val(args.start.toString().substr(0, 10));
            $('#reservation_edit input[name=time]').val(args.start.toString().substr(11, 5));
            $('#reservation_edit input[name=end_time]').val(args.end.toString().substr(11, 5));

            $('#reservation_table option').removeAttr("selected");
            $('#reservation_table option').removeAttr("disabled");
            $('#reservation_table').val(args.resource).trigger("chosen:updated");
            
            mark_busy_tables(args.start.toString().substr(11, 5), args.end.toString().substr(11, 5), "reservation_table");
            
            reservation_end = args.end.toString();
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
              dp.events.update(clicked_reservation);
              loadEvents();
              dp.update();
            });
        }); 

        $('#cancel_reservation').confirm({
            text: "Are you sure you want to cancel the reservation?",
            title: "Confirmation required",
            confirm: function(button) {
              $.post("scheduler/status/" + data["outlet_id"],
              {
                  id: clicked_reservation.value(),
                  status: "cancelled"
              }, 
              function(data){
                $('#reservation_edit').modal('hide');
                dp.events.remove(clicked_reservation);
                loadEvents();
                dp.update();
              });
            },
            cancel: function(button) {
                return false;
            },
            confirmButton: "Yes I am",
            cancelButton: "No",
            post: true
        });


        $('#save_reservation').click(function(){
            var form = $('.edit_reservation').serialize();
            var reservation_date = $('#reservation_edit input[name=date]').val();
            var reservation_time = $('#reservation_edit input[name=time]').val();
            var reservation_start = reservation_date + "T" + reservation_time + ":00";
            var reservation_end = $('#reservation_edit input[name=end_time]').val();
            reservation_end = reservation_date + "T" + reservation_end;
            console.log(form);
            var reservation_id = (typeof clicked_reservation === 'undefined') ? '' : clicked_reservation.value()
            
            $.ajax({
              url: "scheduler/update/" + data.outlet_id + "/" + reservation_id,
              type: "post",
              data: form + "&start=" + reservation_start + "&end=" + reservation_end,
              success: function(data) {
                $('#reservation_edit').modal('hide');
                dp.clearSelection();
                loadEvents();
                dp.update();
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
        function get_working_time(day){
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


          function get_staying_time(start_time){
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

              if(reservation_end_hours > close_time){
                reservation_end_hours = close_time;
              } else if (reservation_end_hours > break_start_time && parseInt(reservation_time_array[0]) < break_start_time) {
                reservation_end_hours = break_start_time;
              }

              if(reservation_end_minutes < 10) {
                reservation_end_minutes = "0" + reservation_end_minutes; 
              }
              if(reservation_end_hours < 10) {
                reservation_end_hours = "0" + reservation_end_hours; 
              }
              return reservation_end_hours + ":" + reservation_end_minutes;  
          }


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
              }
            }

            console.log (arrayof_late_not_shows);
            if(arrayof_late_not_shows.length > 0) {
              $.post("scheduler/set_late_not_show/" + data["outlet_id"],  {
                arr: arrayof_late_not_shows
                },  function(data) {
              });
            }
          }


          //Create concert header and modal

          if(data.header_info !== null ) {
            var concert_modal = '<h4>'+data.header_info.concert_name+'</h4>';
            concert_modal += '<p>'+data.header_info.concert_description+'</p>';

            $('#concert_modal .modal-body').append(concert_modal);

            var concert_header = '<i class="fa fa-music concert_icon" onClick=concert_icon()></i> Today '+data.header_info.concert_name + " " + data.header_info.concert_start.substr(0, 5);
            $('#concert_header').append(concert_header);
          }      

      } // Ajax Success
  }); // Ajax 
    
} // initialize funcction

function updateClock () {
    var currentTime = new Date ( );
    var currentHours   = currentTime.getHours ( );
    var currentMinutes = currentTime.getMinutes ( );
    var currentMonth = currentTime.getMonth() +1;
    var currentday = currentTime.getDate();
    var year = currentTime.getFullYear();
    
    currentMinutes = ( currentMinutes < 10 ? "0" : "" ) + currentMinutes;
    currentday = ( currentday < 10 ? "0" : "" ) + currentday;
    currentMonth = ( currentMonth < 10 ? "0" : "" ) + currentMonth;
    
    var currentTimeString = currentHours + ":" + currentMinutes + ' ' + currentday + "." + currentMonth + "." + year ;
        
    $("#current_time").html(currentTimeString);        
 }

function concert_icon(){
  $('#concert_modal').modal('show');
}
