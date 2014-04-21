$( document ).ready(function() {
  $('td[resource="D"] div').css('background', '#fff');
  $('input[name=new_reservation_date]').datepicker({ dateFormat: 'yy-mm-dd' });

  var url= 'outlet/get';
  //getting outlet and table information
  $.ajax({
      type: "POST",
      url: url,
      dataType: 'json',
        success: function(data) {

            var day = new Date().getDay();
            //working and break time
            str = "outlet_open_time_" + day;
            var open_time = (data[str]==="00:00:00") ? data['outlet_open_time'] : data[str];
            open_time = open_time.substr(0, 2);

            str = "outlet_close_time_" + day;
            var close_time = (data[str]==="00:00:00") ? data['outlet_close_time'] : data[str];
            close_time = close_time.substr(0, 2);

            str = "outlet_break_start_time_" + day;
            var break_start_time = (data[str]==="00:00:00") ? data['outlet_break_start_time'] : data[str];
            break_start_time = break_start_time.substr(0, 2);

            str = "outlet_break_end_time_" + day;
            var break_end_time = (data[str]==="00:00:00") ? data['outlet_break_end_time'] : data[str];
            break_end_time = break_end_time.substr(0, 2);

            console.log(data);


            var outlet_settings = {
            		  open_time : open_time,
            		  close_time : close_time,
            		  break_start_time : break_start_time,
            		  break_end_time : break_end_time,
            		  
            		  launch_time: open_time,
            		  pre_concert_time: break_end_time,
            		  concert_time: "20",
            		  after_concert_time:"22",
            		  evening_time: break_end_time,
            };

            //setting matrix options
            var dp = new DayPilot.Scheduler("dp");
            	dp.cssClassPrefix = "scheduler_8";
            	dp.cellWidth = 30;
            	dp.eventHeight = 25;
            	dp.headerHeight = 33;
            	dp.rowHeaderWidthAutoFit = false;
            	dp.cellGroupBy = "Hour";
            	dp.days = dp.startDate.daysInMonth();
            	dp.cellDuration = 15;
            	dp.startDate = new DayPilot.Date();
            	dp.days = 1;
            	dp.moveBy = 'Full';
            	dp.showToolTip = true;              
            	dp.timeHeaders = [ {groupBy: 'Week'}, {groupBy: 'Hour'}, ];
            	dp.events.list = [];
            	dp.treeEnabled = false;
            	dp.rowHeaderWidthAutoFit = true; 
            	dp.rowHeaderWidth = 25;
            	dp.eventClickHandling="ContextMenu";
            	dp.eventRightClickHandling="Enabled";
            	dp.eventDoubleClickHandling="Bubble";

              //change the start date on when calendar has changed
              $("#main_calendar").on("change", function(){
                dp.startDate = new DayPilot.Date($(this).val());
                loadEvents();
                dp.update();
              });

              //daypilot reservation info bubble
              dp.bubble = new DayPilot.Bubble({
                  cssClassPrefix: "bubble_default",
                  onLoad: function(args) {
                      var ev = args.source;
                      args.async = true;  // notify manually using .loaded()
                      // simulating slow server-side load
                      setTimeout(function() {
                          args.html = "<div style='font-weight:bold'>" + ev.text() + "</div><div>Start: " + ev.start().toString("MM/dd/yyyy HH:mm") + "</div><div>End: " + ev.end().toString("MM/dd/yyyy HH:mm") + "</div><div>Id: " + ev.id() + "</div>";
                          args.loaded();
                      }, 500);
                  }
              });

              //rservation context menu (on Left click)
              dp.contextMenu = new DayPilot.Menu(
                  {items:[
                      {text:"Cancel", onclick: function() { 
                          var e = this.source;           
                          $.post("scheduler/status/" + data["outlet_id"],
                          {
                              id: e.value(),
                              status: "cancelled"
                          }, 
                          function(data){
                            dp.events.remove(e);
                          });
                      }},
                      {text:"Arrived", onclick: function(args) { 
                          var e = this.source;           
                          $.post("scheduler/status/" + data["outlet_id"],
                          {
                              id: e.value(),
                              status: "arrived"
                          }, 
                          function(data){
                            dp.events.update(e);
                            loadEvents();
                            dp.update();
                          });
                      }}, 
                      {text:"Extend", onclick: function(args) { 
                          var e = this.source;
                          dp.events.update(e);
                      }},                         
                      {text:"Edit", onclick: function(args) { 
                          var e = this.source;
                          dp.events.update(e);
                      }}, 
                      {text:"Information"}
                  ],
                  cssClassPrefix: "menu_default"
              });

              //intialising matrix header (launc/dinner/concert boxes and availability bar)
              var i=0; //Time header, light dark counter
              dp.onBeforeTimeHeaderRender = function(args) {
                //meal time ranges
                if (args.header.level === 0) {
          	     var padding = 0; 
          	     var launch_box_width        = (outlet_settings.pre_concert_time - outlet_settings.launch_time)*4*dp.cellWidth - (outlet_settings.break_end_time - outlet_settings.break_start_time)*4* dp.cellWidth - padding + 'px;';
          	     var pre_concert_box_width   = (outlet_settings.concert_time -  outlet_settings.pre_concert_time)*4*dp.cellWidth - padding + 'px;';
          	     var concert_box_width       = (outlet_settings.after_concert_time -  outlet_settings.concert_time)*4*dp.cellWidth - padding + 'px;';
          	     var after_concert_box_width = (outlet_settings.close_time - outlet_settings.after_concert_time)*4*dp.cellWidth - padding + 'px;';
          	     
          	     args.header.html =  '<div class="time_type_box" style="width:'+ launch_box_width +'"><label class="time_type_label">Lounch</label><select class="form-control m-b time_type_select"><option>4</option></select></div>';
          	     args.header.html += '<div class="time_type_box" style="width:'+ pre_concert_box_width +'"><label class="time_type_label">Pre Concert</label><select class="form-control m-b time_type_select"><option>4</option></select></div>';
          	     args.header.html += '<div class="time_type_box" style="width:'+ concert_box_width +'"><label class="time_type_label">Concert</label><select class="form-control m-b time_type_select"><option>4</option></select></div>';
          	     args.header.html += '<div class="time_type_box" style="width:'+ after_concert_box_width +'"><label class="time_type_label">After Concert</label><select class="form-control m-b time_type_select"><option>4</option></select></div>';
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
                    for (var j=0; j<dp.events.list.length; j++) {
                      if(typeof dp.events.list[j] != 'undefined') {
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

              };//matrix header ended

              //initialise dp resources aka outlet tables
              dp.resources = [];

              var not_assigned_number = data.not_assigned;

              for(var i=0; i < data['tables'].length; i++){
                var table = '<option value="'+data['tables'][i]['table_id']+'" >'+"T"+(i+1)+'</option>'; ///add outlet tabes to the new reservation select menu
                $('#new_reservation_table').append(table); ///add outlet tabes to the new reservation select menu
                dp.resources.push({name: "T"+(i+1), id: data['tables'][i]['table_id']}); //add the outlet table to the matrix resources tab
              }

              dp.resources.push({name: "", id: "D"}); //add the divider
              //add fields for not assigned tables
              for(var i=1; i<=not_assigned_number; i++){
                dp.resources.push({name: "U"+i, id: "na"+i});
              }


              dp.onBeforeEventRender = function(args) {    
                 switch (args.e.status) {
                    case 'arrived' : args.e.cssClass = "arrived"; break;
                    case 'not_show': args.e.cssClass = "not_show"; break;
                    case 'late'    : args.e.cssClass = "late"; break;
                  }
                console.log(args.e.start);
                  
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
              dp.onEventMove = function (args){
                revert=args.e.data.resource;
              }

              //move a reservation
              dp.onEventMoved = function (args) {
                  if(args.newResource === "D" || args.newStart.ticks < new DayPilot.Date().ticks){
                        args.e.data.resource = revert;//revert to original row
                        //reverting event start and end
                        args.e.data.start = args.e.part.start;
                        args.e.data.end   = args.e.part.end;
                  }
                  $.post("scheduler/move/" + data["outlet_id"], {
                      id: args.e.id(),
                      newStart: args.newStart.toString(),
                      newEnd: args.newEnd.toString(),
                      newResource: args.newResource
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
              };//moving end

              //rseize a reservation
              dp.onEventResized = function (args) {
                  $.post("scheduler/resize/" + data["outlet_id"],  {
                      id: args.e.id(),
                      newStart: args.newStart.toString(),
                      newEnd: args.newEnd.toString(),
                      resource: args.e.resource()
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
              };//resize end

              //var reservation_end = "";
              //create new reservation within selected timerange
              dp.onTimeRangeSelected = function (args) {
                // Disable event creation in Time < Current Time
                  if(args.start.ticks < new DayPilot.Date().ticks) {
                    dp.message('Wrong Time');
                    dp.clearSelection();
                    return false;
                  }
                  $('#new_reservation_date').val(args.start.toString().substr(0, 10));
                  $('#new_reservation_time').val(args.start.toString().substr(11, 5));
                  $('#new_reservation_table').val(args.resource);
                  reservation_end = args.end.toString();
              };

              dp.init(); //initialize day pilot

              loadEvents(); //run the loadevents function

              //load reservations form db
              function loadEvents() {
                  var start = dp.startDate;
                  var end   = dp.startDate.addDays(dp.days);
                  $.post("scheduler/reservations/" + data["outlet_id"], {
                          start: start.toString(),
                          end: end.toString(), 
                      }, function(data) {
              	            dp.events.list = data;
              	            dp.update();
                      	}
                  );
              }

              //add a new reservation to db when the form is submitted
              $('.add_reservation').on("submit", function(event){
                    event.preventDefault();
                    var form = [];    
                    $.each($('.add_reservation').serializeArray(), function() {
                        form[this.name] = this.value;
                    });

                    var reservation_time_start = form.new_reservation_time + ":00";
                    var reservation_start = form.new_reservation_date + "T" + reservation_time_start;
                    var staying_time;                    

                    if(form.new_reservation_time < outlet_settings.pre_concert_time){
                      staying_time = data.outlet_staying_time_lunch;
                    } else if(form.new_reservation_time < outlet_settings.concert_time) {
                      staying_time = data.outlet_staying_time_pre_concert;
                    } else if(form.new_reservation_time < outlet_settings.after_concert_time){
                      staying_time = data.outlet_staying_time_concert;
                    } else {
                      staying_time = data.outlet_staying_time_post_concert;
                    }
                    var staying_time;
                    var staying_time_array = staying_time.split(':');

                    if(typeof reservation_end === 'undefined') {
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
                      reservation_end = form.new_reservation_date + "T" + reservation_end_hours + ":" + reservation_end_minutes + ":00";        
                    } 

                    $.post("scheduler/create/" + data["outlet_id"], 
                      {
                          start: reservation_start,
                          end: reservation_end,
                          guest_number: form.new_reservation_guest_number,
                          resource: form.new_reservation_table,
                          title: form.new_reservation_title,
                          guest_name: form.new_reservation_guest_name,
                          phone: form.new_reservation_phone,
                          email: form.new_reservation_email,
                          language: form.new_reservation_language,
                          author: form.new_reservation_author,
                          confirm_via_email : (typeof form.new_reservation_confirmation === 'undefined') ? 1 : 0
                      }, 
                      function(data) {
                        //console.log(data);
                          var e = new DayPilot.Event({
                              start: data.reservation.start,
                              end: data.reservation.end,
                              id: data.id,
                              resource: data.reservation.resource,
                              text: data.reservation.title + " " + data.reservation.guest_name
                          });
                          dp.events.add(e);
                          dp.message(data.message);
                          dp.update();
                          delete reservation_end;
                      });
              });


              $('input[name=new_reservation_time]').on("change", function(){
                var time = $(this).val().split(':');
                var current_hour = new DayPilot.Date().toString().substr(11, 2);
                var current_minutes = new DayPilot.Date().toString().substr(14, 2);
                if (time[0] < current_hour || (time[0] === current_hour && time[1] <= current_minutes)) {
                  current_minutes = Math.round(current_minutes/15 + 1) * 15;
                  if(current_minutes < 10) {
                    current_minutes = "0" + current_minutes; 
                  }
                  $(this).val(current_hour + ":" + current_minutes);
                  time = $(this).val().split(':');
                }

                
                $('#new_reservation_table').empty();
                var table = '<option value="0" >NA</option>';
                $('#new_reservation_table').append(table);

                var busy_tables = [];
                var j = 0;
                for (var i=0; i < dp.events.list.length; i++) {
                  if($(this).val() >= dp.events.list[i].start.substr(11,5) && $(this).val() < dp.events.list[i].end.substr(11,5)){
                    busy_tables[j] = dp.events.list[i]['resource'];
                    j++;
                  }
                }
                
                for (var i=0; i < data['tables'].length; i++ ) {

                  if($.inArray(data['tables'][i]['table_id'], busy_tables) === -1){
                    var table = '<option value="'+data['tables'][i]['table_id']+'" >'+"T"+(i+1)+'</option>';
                    $('#new_reservation_table').append(table);
                  }
                }
              });
          }

        });
});