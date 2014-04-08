<section class="row m-b-md">
</section>
<?php
	echo "<tr>";
	echo "<td>".$outlet["outlet_id"]."</td>";
	echo "<td><a href='setup/outlet/".$outlet["outlet_id"]."'>".$outlet["outlet_name"]."</a></td>";
	echo "<td>".$outlet["outlet_capacity"]."</td>";
	echo "<td>".$outlet["outlet_tables"]."</td>";
	echo "<td>".$outlet["outlet_open_time"]."</td>";
	echo "<td>".$outlet["outlet_break_start_time"]."-".$outlet["outlet_break_end_time"]."</td>";
	echo "<td>".$outlet["outlet_day_off"]."</td>";
	echo "<td>".$outlet["outlet_avg_duration"]."</td>";
	echo "<td>".$outlet['outlet_season_start']."-".$outlet['outlet_season_end']."</td>";
	echo "<td>".$outlet["outlet_if_bookable"]."</td>";
	echo "<td><div id='outlet_detelet_button'></div></td>";
	echo "</tr>";

?>