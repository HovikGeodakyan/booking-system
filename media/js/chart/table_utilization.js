
var xaxes = [{
    mode: "time",
    tickColor: "#ececec",
}];

function get_timestap(timestap){
    var period = [];
    switch (timestap) {
        case "day" : 
            period['end'] = new DayPilot.Date().toString();
            period['start'] = new DayPilot.Date().addDays(-1).toString();
            xaxes[0]['timeformat'] = "%H";
            xaxes[0]['tickSize'] = [1, "hour"];
            xaxes[0]['min'] = (new DayPilot.Date().addDays(-1)).getTime();
            xaxes[0]['max'] = (new DayPilot.Date()).getTime();
            break;

        case "week":
            period['end'] = new DayPilot.Date().toString();
            period['start'] = new DayPilot.Date().addDays(-7).toString();
            xaxes[0]['timeformat'] = "%a";
            xaxes[0]['tickSize'] = [1, "day"];
            xaxes[0]['dayNames'] = ["sun", "mon", "tue", "wed", "thu", "fri", "sat"];
            xaxes[0]['min'] = (new DayPilot.Date().addDays(-7)).getTime();
            xaxes[0]['max'] = (new DayPilot.Date()).getTime();
            break;

        case "month":
            period['end'] = new DayPilot.Date().toString();
            period['start'] = new DayPilot.Date().addMonths(-1).toString();
            xaxes[0]['timeformat'] = "%d";
            xaxes[0]['tickSize'] = [1, "day"];
            xaxes[0]['min'] = (new DayPilot.Date().addMonths(-1)).getTime();
            xaxes[0]['max'] = (new DayPilot.Date()).getTime();
            break;

        case "year":
            period['end'] = new DayPilot.Date().toString();
            period['start'] = new DayPilot.Date().addYears(-1).toString();
            xaxes[0]['timeformat'] = "%b";
            xaxes[0]['tickSize'] = [1, "month"];
            xaxes[0]['monthNames'] = ["jan", "feb", "mar", "apr", "may", "jun", "jul", "aug", "sep", "oct", "nov", "dec"];
            xaxes[0]['min'] = (new DayPilot.Date().addMonths(-12)).getTime();
            xaxes[0]['max'] = (new DayPilot.Date()).getTime();
            break;
    }

    return period;
}

function get_table_utilization_chart(type){
    var timestap = get_timestap(type);
    
    var url = "statistics/table_utilization/";
    var arr = [];
    data = {
        start : timestap.start,
        end : timestap.end,
        timestamp: type
    }
    $.ajax({
        type: "POST",
        url: url,
        data: data, 
        dataType: 'json',
        success: function(data) {

            data5 = chart_data(data);

            var options = {
                xaxes: xaxes,
                yaxes: [ {
                    min: 0,
                   // max: data.outlet.outlet_tables_number,
                    tickColor: "#ececec",
                } ],
                series: {
                    color: '#19ac86',
                    lines: { 
                        show: true,
                        fill: true
                    },
                    points: {
                        show: true,
                        radius: 3,
                        lineWidth: 1,
                        fill: true,
                        fillColor: "#ffffff",
                        symbol: "circle"
                    }
                },
                grid: { 
                    hoverable: true, 
                    clickable: true,
                    borderWidth: 1,
                    borderColor: "#ececec"
                },
                legend: {
                    labelBoxBorderColor: "#fff"
                }
            };

            var dataset = [
                {
                    data: data5,
                    label: "Reserved seats out of " + data.outlet.outlet_seats_number
                }
            ];

            $.plot($("#table_utilization"), dataset, options);
        }  
    });  


    function chart_data(data){
        var res = [];

        for( var key  in data.reservations ){     
            time = new DayPilot.Date(data.reservations[key].start).getTime();
            res.push([time , (data.reservations[key].tables)]);
        }
        return res;
    }

}
