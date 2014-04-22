   
    <section class="row m-b-md">
        <div class="col-sm-6">

          <h3 class="m-b-xs text-black">Statistics</h3>
      </section>
    <script type="text/javascript">
$(function () {

    // Register a parser for the American date format used by Google
    Highcharts.Data.prototype.dateFormats['m/d/Y'] = {
        regex: '^([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{2})$',
        parser: function (match) {
            return Date.UTC(+('20' + match[3]), match[1] - 1, +match[2]);
        }
    };

    // Get the CSV and create the chart
    $.getJSON('http://www.highcharts.com/samples/data/jsonp.php?filename=analytics.csv&callback=?', function (csv) {
        
        $('#container').highcharts({

            data: {
                csv: csv
            },

            title: {
                text: 'Daily visits at www.highcharts.com'
            },

            subtitle: {
                text: 'Source: Google Analytics'
            },

            xAxis: {
                type: 'datetime',
                tickInterval: 7 * 24 * 3600 * 1000, // one week
                tickWidth: 0,
                gridLineWidth: 1,
                labels: {
                    align: 'left',
                    x: 3,
                    y: -3
                }
            },

            yAxis: [{ // left y axis
                title: {
                    text: null
                },
                labels: {
                    align: 'left',
                    x: 3,
                    y: 16,
                    formatter: function() {
                        return Highcharts.numberFormat(this.value, 0);
                    }
                },
                showFirstLabel: false
            }, { // right y axis
                linkedTo: 0,
                gridLineWidth: 0,
                opposite: true,
                title: {
                    text: null
                },
                labels: {
                    align: 'right',
                    x: -3,
                    y: 16,
                    formatter: function() {
                        return Highcharts.numberFormat(this.value, 0);
                    }
                },
                showFirstLabel: false
            }],

            legend: {
                align: 'left',
                verticalAlign: 'top',
                y: 20,
                floating: true,
                borderWidth: 0
            },

            tooltip: {
                shared: true,
                crosshairs: true
            },

            plotOptions: {
                series: {
                    cursor: 'pointer',
                    point: {
                        events: {
                            click: function() {
                                hs.htmlExpand(null, {
                                    pageOrigin: {
                                        x: this.pageX,
                                        y: this.pageY
                                    },
                                    headingText: this.series.name,
                                    maincontentText: Highcharts.dateFormat('%A, %b %e, %Y', this.x) +':<br/> '+
                                        this.y +' visits',
                                    width: 200
                                });
                            }
                        }
                    },
                    marker: {
                        lineWidth: 1
                    }
                }
            },

            series: [{
                name: 'All visits',
                lineWidth: 4,
                marker: {
                    radius: 4
                }
            }, {
                name: 'New visitors'
            }]
        });
    });

});


    </script>
 <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
<!-- <div class="col-lg-12">
  <h4>Seat utilization rate</h4>
	<div id="chart" style="width:100%;height:300px"></div>

</div> -->

<!-- <div class="col-lg-6">
  <h4>Table utilization rate</h4>
  <div id="chart2" style="width:600px;height:300px"></div>

</div> -->



<script src="<?php echo(JS.'chart/charts.js'); ?>"></script>