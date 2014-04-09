   
    <section class="row m-b-md">
        <div class="col-sm-6">

          <h3 class="m-b-xs text-black"> <i style="background: #1ccacc; padding: 7px; border-radius: 23px; color: white; width: 39px;" class="fa fa-music"></i>  Concert Today 22:00</h3>
          <small>Welcome back, John Smith, <i class="fa fa-map-marker fa-lg text-primary"></i> New York City</small>
        </div>
        <div class="col-sm-6 text-right text-left-xs m-t-md">
          <div class="btn-group">
            <a class="btn btn-rounded btn-default b-2x dropdown-toggle" data-toggle="dropdown">Widgets <span class="caret"></span></a>
            <ul class="dropdown-menu text-left pull-right">
              <li><a href="#">Notification</a></li>
              <li><a href="#">Messages</a></li>
              <li><a href="#">Analysis</a></li>
              <li class="divider"></li>
              <li><a href="#">More settings</a></li>
            </ul>
          </div>
          <a href="#" class="btn btn-icon b-2x btn-default btn-rounded hover"><i class="i i-bars3 hover-rotate"></i></a>
          <a href="#nav, #sidebar" class="btn btn-icon b-2x btn-info btn-rounded" data-toggle="class:nav-xs, show"><i class="fa fa-bars"></i></a>
        </div>
      </section>
 
 <div class="white_content">
<section class="" >
 <form class="form-inline" role="form">
   <div class="form-group">    
    <select class="form-control"><option>17:30</option></select>
  </div>
   <div class="form-group">
  
    <select class="form-control" ><option>Mr</option></select>
  </div>
   <div class="form-group">
  
    <input type="email" class="form-control" placeholder="Enter name">
  </div>
  <div class="form-group">
    
    <input type="email" class="form-control" placeholder="Enter phone">
  </div>
  <div class="form-group">
    <input type="text" class="form-control" placeholder="Email">
  </div>
  <div class="form-group">    
    <select class="form-control"><option>3</option></select>
  </div>
  <div class="form-group">    
    <select class="form-control"><option>T10</option></select>
  </div>
  <div class="form-group">    
    <select class="form-control"><option>En</option></select>
  </div>
  <div class="form-group">
      <div class="checkbox i-checks">
        <label>
          <input class="form-control" type="checkbox" checked=""><i></i>VIP
          <!-- <input class="form-control" type="checkbox" checked=""><i></i>Email Confirmation
          <input class="form-control" type="checkbox" checked=""><i></i>Invoice -->
        </label>
     
    </div>
  </div>
  <button type="button" class="btn btn-default">Cancel</button>
  <button type="button" class="btn btn-primary">Save</button>
  
</form>

</section>

          <div id="dp"></div>
          <script type="text/javascript">
            $( document ).ready(function() {
             $('td[resource="D"] div').css('background', '#fff')
            });
                var outlet_settings={
                  open_time : "10",
                  close_time : "23",
                  break_start_time : "13",
                  break_end_time : "14",
                 
                  launch_time:"10",
                  pre_concert_time: "15",
                  concert_time: "18",
                  after_concert_time:"20"
                }
                
                var dp = new DayPilot.Scheduler("dp");
                console.log(dp)
                // behavior and appearance
                dp.autoRefreshEnabled = true;
                autoRefreshCount: 1
                autoRefreshInterval: 10
                // autoRefreshMaxCount: 20
                // autoRefreshTimeout: 3
                dp.cssClassPrefix = "scheduler_8";
                dp.cellWidth = 30;
                dp.eventHeight = 25;
                dp.headerHeight = 33;
                dp.rowHeaderWidthAutoFit = false;
                // view
                // dp.startDate = new DayPilot.Date("2014-04-05").firstDayOfMonth();  // or just dp.startDate = "2013-03-25";
                dp.cellGroupBy = "Hour";
                dp.days = dp.startDate.daysInMonth();
                dp.cellDuration = 15;
                dp.startDate = new DayPilot.Date();
                dp.days = 1;
                dp.moveBy = 'Full';
                dp.showToolTip = true;
                // Hide Non Buesness columns
                // dp.businessBeginsHour = 10;
                // dp.businessEndsHour = 23; 
                // dp.showNonBusiness = false;
                /// bubble, with async loading
                dp.timeHeaders = [ {groupBy: 'Week'}, {groupBy: 'Hour'}, ];
                dp.bubble = new DayPilot.Bubble({
                    cssClassPrefix: "bubble_default",
                    onLoad: function(args) {
                      console.log(args.e.ShowBaseTimeHeader);
                        var ev = args.source;
                        args.async = true;  // notify manually using .loaded()
                        // simulating slow server-side load
                        setTimeout(function() {
                            args.html = "<div style='font-weight:bold'>" + ev.text() + "</div><div>Start: " + ev.start().toString("MM/dd/yyyy HH:mm") + "</div><div>End: " + ev.end().toString("MM/dd/yyyy HH:mm") + "</div><div>Id: " + ev.id() + "</div>";
                            args.loaded();
                        }, 500);

                    }
                });

                // no events at startup, we will load them later using loadEvents()
                dp.events.list = [];
                // dp.onEventClicked=function(args){
                //   alert("Event value: "+ args.e.value());
                // }
                dp.treeEnabled = false;
                dp.rowHeaderWidthAutoFit = true; // TODO fix for tree
                dp.rowHeaderWidth = 25;

                dp.eventClickHandling="ContextMenu";
                dp.eventRightClickHandling="Enabled";
                dp.eventDoubleClickHandling="Bubble";
                dp.contextMenu = new DayPilot.Menu(
                    {items:[
                        {text:"Cancel", onclick: function() { 
                            var e = this.source;           
                            $.post("scheduler/cancel",
                            {
                                id: e.value()
                            }, 
                            function(data){
                              dp.message(data.message);
                              dp.events.remove(e);
                            });
                        }},
                        {text:"Arrived", onclick: function(args) { 
                            var e = this.source;
                            dp.onBeforeEventRender = function(args) {
                                args.e.cssClass = "red";
                            };
                            dp.events.update(e);
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

                var i=0; //Time header, light dark counter
                dp.onBeforeTimeHeaderRender = function(args) {
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
                  var progress = Math.floor(Math.random() * 19) + 0
                  var progressClass ='';
                  if (args.header.level === 2) {
                    if (progress > 10) {
                      progressClass = 'progress_green';
                    }else if(progress < 6){
                        progressClass = 'progress_blue';
                    }else {
                      progressClass = 'progress_red';
                    }

                    args.header.html = '<div class="sheduler_minut_value">'+args.header.html +'</div><div class="sheduler_progress_bar '+ progressClass +'"></div>';
                  }

                };

                // 
                dp.resources = [
                             { name: "T1", id: "A"},
                             { name: "T2", id: "B" },
                             { name: "T3", id: "L" },
                             { name: "T4", id: "K" },
                             { name: "T5", id: "M" },
                             { name: "T6", id: "N" },
                             { name: "T7", id: "O" },
                             { name: "T8", id: "P" },
                             { name: "T9", id: "R" },
                             { name: "", id: "D" },
                             { name: "U1", id: "qq", loaded: false },
                             { name: "U2", id: "ww", loaded: false },
                             { name: "U3", id: "ee", loaded: false },
                             { name: "U4", id: "rr", loaded: false },
                             { name: "U5", id: "tt", loaded: false },
                            ];

                
                dp.onBeforeEventRender = function(args) {
                    // console.log(args)
                    args.e.innerHTML = args.e.text + ":";
                };

               
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
                               
                // http://api.daypilot.org/daypilot-scheduler-onbeforeresheaderrender/ 
                dp.onBeforeResHeaderRender = function(args) {
                    // console.log(args)
                    if (args.resource.id === 'D') {
                       args.resource.cssClass = 'no_border_res_header';
                       // args.resource.html = "Not Assigned Reservations"
                    }
                };

                //saving drag'n'drop origin position
                var revert;
                dp.onEventMove = function (args){
                  revert=args.e.data.resource;
                }

                dp.onEventMoved = function (args) {
                    console.log(args.newStart.toString());
                    if(args.newResource=="D" || args.newStart.ticks < new DayPilot.Date().ticks){
                          args.e.data.resource=revert;//revert to original row
                          //reverting event start and end
                          args.e.data.start=args.e.part.start;
                          args.e.data.end=args.e.part.end;
                      }
                    $.post("scheduler/move", 
                    {
                        id: args.e.id(),
                        newStart: args.newStart.toString(),
                        newEnd: args.newEnd.toString(),
                        newResource: args.newResource
                    }, 
                    function(data) {
                        if(data.result == "NOK"){
                          args.e.data.resource=revert;//revert to original row
                          //reverting event start and end
                          args.e.data.start=args.e.part.start;
                          args.e.data.end=args.e.part.end;

                          dp.events.update(args.e);
                        } else {
                          dp.message("Moved");
                          dp.events.update(args.e);
                        }
                    });
                };

                // http://api.daypilot.org/daypilot-scheduler-oneventresized/ 
                dp.onEventResized = function (args) {
                    $.post("scheduler/resize", 
                    {
                        id: args.e.id(),
                        newStart: args.newStart.toString(),
                        newEnd: args.newEnd.toString(),
                        resource: args.e.resource()
                    }, 
                    function(data) {
                        if(data.result=="NOK"){
                          dp.message(data.message);
                          //revert event
                          args.e.data.end=args.e.part.end;
                          dp.events.update(args.e);
                        }else{
                          dp.message("Resized");
                        }
                    });
                };

               
                // http://api.daypilot.org/daypilot-scheduler-ontimerangeselected/
                dp.onTimeRangeSelected = function (args) {
                  // Disable event creation in Time < Current Time
                    if(args.start.ticks < new DayPilot.Date().ticks) {
                      dp.message('Wrong Time');
                      dp.clearSelection();
                      return false;
                    }
                    var name = prompt("New event name:", "Event");
                    dp.clearSelection();
                    if (!name) return;

                    $.post("scheduler/create", 
                        {
                            start: args.start.toString(),
                            end: args.end.toString(),
                            resource: args.resource,
                            name: name
                        }, 
                        function(data) {
                          console.log(data);
                            var e = new DayPilot.Event({
                                start: args.start,
                                end: args.end,
                                id: data.id,
                                resource: args.resource,
                                text: name
                            });
                            dp.events.add(e);
                            dp.message(data.message);
                        });
                };

                // http://api.daypilot.org/daypilot-scheduler-oneventclick/


                dp.init();

                loadEvents();

                function loadEvents() {
                    var start = dp.startDate;
                    var end = dp.startDate.addDays(dp.days);
                    
                    $.post("scheduler/events", 
                        {
                            start: start.toString(),
                            end: end.toString()
                        },
                        function(data) {
                            dp.events.list = data;
                            dp.update();
                        }
                    );
                }

            </script>

        </div>
      </div>
