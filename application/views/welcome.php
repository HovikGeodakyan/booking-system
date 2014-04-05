   <section>
      <section class="hbox stretch">
        <!-- .aside -->
        <aside class="bg-black aside-md hidden-print" id="nav">          
          <section class="vbox">
            <section class="w-f scrollable">
              <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="10px" data-railOpacity="0.2">
                             <!-- nav -->                 
                <nav class="nav-primary hidden-xs">
                  <div class="text-muted text-sm hidden-nav-xs padder m-t-sm m-b-sm">Menu</div>
                  <ul class="nav nav-main" data-ride="collapse">
                    <li  class="">
                      <a href="index.html" class="auto">
                        <i class="i i-statistics icon">
                        </i>
                        <span class="font-bold">Daily View</span>
                      </a>
                    </li>
                    <li  class="">
                      <a href="index.html" class="auto">
                        <i class="i i-grid2 icon">
                        </i>
                        <span class="font-bold">Reservations Overview</span>
                      </a>
                    </li>
                    <li  class="">
                      <a href="index.html" class="auto">
                        <i class="i i-docs icon">
                        </i>
                        <span class="font-bold">Statistics</span>
                      </a>
                    </li>
                      <li  class="">
                      <a href="index.html" class="auto">
                        <i class="i i-lab icon">
                        </i>
                        <span class="font-bold">Setup</span>
                      </a>
                    </li>


                  
                  </ul>
                </nav>
                <!-- / nav -->
              </div>
            </section>
            
            <footer class="footer hidden-xs no-padder text-center-nav-xs">
              <a href="modal.lockme.html" data-toggle="ajaxModal" class="btn btn-icon icon-muted btn-inactive pull-right m-l-xs m-r-xs hidden-nav-xs">
                <i class="i i-logout"></i>
              </a>
              <a href="#nav" data-toggle="class:nav-xs" class="btn btn-icon icon-muted btn-inactive m-l-xs m-r-xs">
                <i class="i i-circleleft text"></i>
                <i class="i i-circleright text-active"></i>
              </a>
            </footer>
          </section>
        </aside>
        <!-- /.aside -->
        <section id="content">
          <section class="vbox">          
            <section class="scrollable wrapper">
              <div id="dp"></div>
          <script type="text/javascript">
            $( document ).ready(function() {
             $('td[resource="D"] div').css('background', '#fff')
            });
                var dp = new DayPilot.Scheduler("dp");

                // behavior and appearance
                dp.cssClassPrefix = "scheduler_8";
                dp.cellWidth = 30;
                dp.eventHeight = 25;
                dp.headerHeight = 25;
                dp.rowHeaderWidthAutoFit = false;
                // view
                // dp.startDate = new DayPilot.Date("2014-04-05").firstDayOfMonth();  // or just dp.startDate = "2013-03-25";
                dp.cellGroupBy = "Hour";
                dp.days = dp.startDate.daysInMonth();
                dp.cellDuration = 15; // one day
                dp.startDate = new DayPilot.Date();
                dp.days = 1;
                dp.moveBy = 'Full';
                dp.showToolTip = true;
                dp.ShowNonBusiness = false;
                // dp.BusinessBeginsHour = '9';
                // dp.BusinessEndsHour ="22"; 
                // // bubble, with async loading
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

                // no events at startup, we will load them later using loadEvents()
                dp.events.list = [];
                // dp.onEventClicked=function(args){
                //   alert("Event value: "+ args.e.value());
                // }
                dp.treeEnabled = false;
                dp.rowHeaderWidthAutoFit = true; // TODO fix for tree
                dp.rowHeaderWidth = 25;

                // 
                dp.resources = [
                             { name: "T1", id: "A", expanded: true},
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

                // http://api.daypilot.org/daypilot-scheduler-onbeforeeventrender/
                dp.onBeforeEventRender = function(args) {
                    // console.log(args)
                    // args.e.cssClass = "test";
                    args.e.innerHTML = args.e.text + ":";
                };

                var i=0; // see http://api.daypilot.org/daypilot-scheduler-onbeforecellrender/ 
                dp.onBeforeCellRender = function(args) {
                   if(i == 0) {
                    console.log(args.cell.start.ticks, new DayPilot.Date());i++;
                   }
                   if (args.cell.start.ticks <= new DayPilot.Date().ticks) {
                      args.cell.backColor = "#DDDADA";
                  }
                 
                   if(args.cell.resource === 'D') {
                          args.cell.backColor = "#fff";
                          args.cell.cssClass = 'no_border';
                          i++;  
                    }
                };

                // http://api.daypilot.org/daypilot-scheduler-onbeforetimeheaderrender/
                dp.onBeforeTimeHeaderRender = function(args) {
                    
                    if (args.header.level === 0) {
                       
                    }
                };
 
                // http://api.daypilot.org/daypilot-scheduler-onbeforeresheaderrender/ 
                dp.onBeforeResHeaderRender = function(args) {
                    // console.log(args)
                    if (args.resource.id === 'D') {
                       args.resource.cssClass = 'assign_text';
                       // args.resource.html = "Not Assigned Reservations"
                    }
                };

                // http://api.daypilot.org/daypilot-scheduler-oneventmoved/ 
                dp.onEventMoved = function (args) {

                    $.post("scheduler/move", 
                    {
                        id: args.e.id(),
                        newStart: args.newStart.toString(),
                        newEnd: args.newEnd.toString(),
                        newResource: args.newResource
                    }, 
                    function(data) {
                      console.log(args.e)
                        dp.message("Moved");
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
                          args.e.end().d=args.e.part.end.d;
                          console.log(args.e.part.end);
                          console.log(args.e.end().d);
                          dp.events.update(args.e);
                        }else{
                          dp.message("Resized");
                        }
                    });
                };

                // event creating
                // http://api.daypilot.org/daypilot-scheduler-ontimerangeselected/
                dp.onTimeRangeSelected = function (args) {
                    console.log(args)
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
        <div class="clear">
            </section>
          </section>
          <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a>
        </section>
      </section>
    </section>