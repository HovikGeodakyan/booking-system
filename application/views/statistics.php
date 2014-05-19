   
    <section class="row m-b-md">
        <div class="col-sm-6">

          <h3 class="m-b-xs text-black"><?php echo _statistics; ?></h3>
           <button type="button" class="btn btn-default" id="daily"><?php echo _daily; ?></button>
           <button type="button" class="btn btn-default" id="weekly"><?php echo _weekly; ?></button>
           <button type="button" class="btn btn-default" id="monthly"><?php echo _monthly; ?></button>
           <button type="button" class="btn btn-default" id="yearly"><?php echo _yearly; ?></button>
      </section>

<div class="col-lg-12">
  <h4><?php echo _seat_utilization_rate; ?></h4>
	<div id="seat_utilization" style="width:100%;height:300px; background:#fff;"></div>

</div>

<div class="col-lg-12">
  <h4><?php echo _table_utilization_rate; ?></h4>
  <div id="table_utilization" style="width:100%;height:300px; background:#fff;"></div>

</div>

<div class="col-lg-12">
  <h4><?php echo _no_show_statistics; ?></h4>
  <div id="no_show_statistics" style="width:100%;height:300px; background:#fff;"></div>

</div>
<div class="col-lg-12">
  <h4><?php echo _cancellation_statistics; ?></h4>
  <div id="cancellation_statistics" style="width:100%;height:300px; background:#fff;"></div>

</div>
<div class="col-lg-12">
  <h4><?php echo _over_reserved_statistics; ?></h4>
  <div id="over_reserved_statistics" style="width:100%;height:300px; background:#fff;"></div>

</div>



<script src="<?php echo(JS.'chart/charts.js'); ?>"></script>
<script src="<?php echo(JS.'chart/seat_utilization.js'); ?>"></script>
<script src="<?php echo(JS.'chart/table_utilization.js'); ?>"></script>
<script src="<?php echo(JS.'chart/no_show_statistics.js'); ?>"></script>
<script src="<?php echo(JS.'chart/cancellation_statistics.js'); ?>"></script>
<script src="<?php echo(JS.'chart/over_reserved_statistics.js'); ?>"></script>
