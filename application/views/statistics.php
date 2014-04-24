   
    <section class="row m-b-md">
        <div class="col-sm-6">

          <h3 class="m-b-xs text-black">Statistics</h3>
           <button type="button" class="btn btn-default" id="daily">Daily</button>
           <button type="button" class="btn btn-default" id="weekly">Weekly</button>
           <button type="button" class="btn btn-default" id="monthly">Monthly</button>
           <button type="button" class="btn btn-default" id="yearly">Yearly</button>
      </section>

<div class="col-lg-12">
  <h4>Seat utilization rate</h4>
	<div id="seat_utilization" style="width:100%;height:300px; background:#fff;"></div>

</div>

<div class="col-lg-12">
  <h4>Table utilization rate</h4>
  <div id="table_utilization" style="width:100%;height:300px; background:#fff;"></div>

</div>

<div class="col-lg-12">
  <h4>No shows statistics</h4>
  <div id="no_show_statistics" style="width:100%;height:300px; background:#fff;"></div>

</div>
<div class="col-lg-12">
  <h4>Cancellation statistics</h4>
  <div id="cancellation_statistics" style="width:100%;height:300px; background:#fff;"></div>

</div>
<div class="col-lg-12">
  <h4>Over reserved statistics</h4>
  <div id="over_reserved_statistics" style="width:100%;height:300px; background:#fff;"></div>

</div>



<script src="<?php echo(JS.'chart/charts.js'); ?>"></script>
<script src="<?php echo(JS.'chart/seat_utilization.js'); ?>"></script>
<script src="<?php echo(JS.'chart/table_utilization.js'); ?>"></script>
<script src="<?php echo(JS.'chart/no_show_statistics.js'); ?>"></script>
<script src="<?php echo(JS.'chart/cancellation_statistics.js'); ?>"></script>
<script src="<?php echo(JS.'chart/over_reserved_statistics.js'); ?>"></script>
