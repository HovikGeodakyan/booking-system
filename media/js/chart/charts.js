

$(document).ready(function(){
    get_seat_utilization_chart("day");
    get_table_utilization_chart("day");
    get_no_show_statistics_chart("day");
    get_cancellation_statistics_chart("day");
});


$("#daily").on("click", function(){
    get_seat_utilization_chart("day");
    get_table_utilization_chart("day");
    get_no_show_statistics_chart("day");
    get_cancellation_statistics_chart("day");
});
$("#weekly").on("click", function(){
    get_seat_utilization_chart("week");
    get_table_utilization_chart("week");
    get_no_show_statistics_chart("week");
    get_cancellation_statistics_chart("week");
});
$("#monthly").on("click", function(){
    get_seat_utilization_chart("month");
    get_table_utilization_chart("month");
    get_no_show_statistics_chart("month");
    get_cancellation_statistics_chart("month");
});
$("#yearly").on("click", function(){
    get_seat_utilization_chart("year");
    get_table_utilization_chart("year");
    get_no_show_statistics_chart("year");
    get_cancellation_statistics_chart("year");
});