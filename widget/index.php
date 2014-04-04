<!DOCTYPE html>
<html>
<head>
    <title>HTML5 Scheduler (DayPilot Pro for JavaScript)</title>
	<!-- demo stylesheet -->
    	<link type="text/css" rel="stylesheet" href="media/layout.css" />    

	<!-- helper libraries -->
	<script src="js/jquery-1.9.1.min.js" type="text/javascript"></script>
	
	<!-- daypilot libraries -->
        <script src="js/daypilot/daypilot-all.min.js" type="text/javascript"></script>
	
        <!-- daypilot themes -->
    <link type="text/css" rel="stylesheet" href="themes/scheduler_8.css" />  
	<link type="text/css" rel="stylesheet" href="media/stylesheet.css" />  
</head>
<body>
       
        <div class="shadow"></div>
        <div class="hideSkipLink">
        </div>
        <div class="main">
            
            <div class="space"></div>
                
            <div id="dp"></div>

            <script type="text/javascript">
                var dp = new DayPilot.Scheduler("dp");
                dp.cellWidth=30;
                dp.treeEnabled = false;
                dp.resources = [
                    { name: "Room A", id: "A" },
                    { name: "Room B", id: "B" },
                    { name: "Room C", id: "C" }
                ];
                dp.eventClickHandling="ContextMenu";
                dp.eventRightClickHandling="Bubble";
                dp.onBeforeEventRender = function(args) {
                    args.e.cssClass = "green";
                };
                dp.contextMenu = new DayPilot.Menu(
                    {items:[
                        {text:"Show event ID", onclick: function() {alert("Event value: " + this.source.value());} },
                        {text:"Show event text", onclick: function() {alert("Event text: " + this.source.text());} },
                        {text:"Show event start", onclick: function() {alert("Event start: " + this.source.start().toStringSortable());} },
                        {text:"Go to google.com", href: "http://www.google.com/?q={0}"},
                        {text:"Delete", onclick: function() { 
                            var e = this.source;           
                            $.post("backend_delete.php", 
                            {
                                id: e.value()
                            });
                            dp.events.remove(e);
                        }},
                        {text:"Arrived", onclick: function(args) { 
                            var e = this.source;
                            dp.onBeforeEventRender = function(args) {
                                args.e.cssClass = "red";
                            };
                            dp.events.update(e);
                        }}, 
                        {text:"submenu", items: [
                            {text:"Show event ID", onclick: function() {alert("Event value: " + this.source.value());} },
                            {text:"Show event text", onclick: function() {alert("Event text: " + this.source.text());} }
                        ]}
                    ],
                    cssClassPrefix: "menu_default"
                });

                dp.cellDuration = 15;
                dp.startDate = new DayPilot.Date();
                dp.days = 1;

                dp.timeHeaders = [
                    { groupBy: "Day", format: "MMMM d yyyy, dddd" },
                    { groupBy: "Hour", format: "HH" }  
                ];

                dp.cellWidthSpec = "Auto";
                dp.bubble = new DayPilot.Bubble({
                    
                });

                // http://api.daypilot.org/daypilot-scheduler-oneventmoved/ 
                dp.onEventMoved = function (args) {
                    args.e.BackgroundColor="green";
                    console.log(args.e.BackgroundColor);
                    $.post("backend_move.php", 
                    {
                        id: args.e.id(),
                        newStart: args.newStart.toString(),
                        newEnd: args.newEnd.toString(),
                        newResource: args.newResource
                    }, 
                    function() {
                        dp.message("Moved.");
                    });
                };

                // http://api.daypilot.org/daypilot-scheduler-oneventresized/ 
                dp.onEventResized = function (args) {
                    console.log(args.e.end().toString(), args.e.partEnd().toString());
                    $.post("backend_resize.php", 
                    {
                        id: args.e.id(),
                        newStart: args.newStart.toString(),
                        newEnd: args.newEnd.toString()
                    }, 
                    function() {
                        dp.message("Resized.");
                    });
                };

                // event creating
                // http://api.daypilot.org/daypilot-scheduler-ontimerangeselected/
                dp.onTimeRangeSelected = function (args) {
                    var name = prompt("New event name:", "Event");
                    dp.clearSelection();
                    if (!name) return;

                    $.post("backend_create.php", 
                        {
                            start: args.start.toString(),
                            end: args.end.toString(),
                            resource: args.resource,
                            name: name
                        }, 
                        function(data) {
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

                dp.init();

                loadResources();
                loadEvents();

                function loadEvents() {
                    var start = dp.startDate;
                    var end = dp.startDate.addDays(dp.days);
                    
                    $.post("backend_events.php", 
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

                function loadResources() {
                    $.post("backend_resources.php", function(data) {
                        dp.resources = data;
                        dp.update();
                    });
                }
            $('.scheduler_default_corner div').text('');
            </script>

        </div>
        <div class="clear">
        </div>
</body>
</html>

