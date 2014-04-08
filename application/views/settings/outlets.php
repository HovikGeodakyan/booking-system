<section class="row m-b-md">
</section>

<!-- 	Outlets -->
	<ul class="nav nav-tabs settings_tabs">
		<li class="active"><a href="<?php echo(URL.'setup'); ?>">Outlet</a></li>
		<li><a href="<?php echo(URL.'setup/users'); ?>">Users</a></li>
	</ul>
	<div id="outlet_settings" class="settings">
		<div class="settings_header">
			<div class="outlet_crud">
				<a href="#" class="btn btn-icon b-2x btn-default btn-rounded hover">Add</a>
				<a href="#nav, #sidebar" class="btn btn-icon b-2x btn-info btn-rounded">Back</a>
			</div>
			<h3 class="m-b-xs text-black">Users</h3>
		</div>
		<div class="settings_content">
			<table>
				<thead>
					<tr>
						<th>ID</th>
						<th>Name</th>
						<th>Seats</th>
						<th>Tables</th>
						<th>Open time</th>
						<th>Break time</th>
						<th>Close day</th>
						<th>Residence time</th>
						<th>Season</th>
						<th>Online booking</th>
						<th>Delete</th>
					</tr>			
				</thead>
				<tbody>
				<?php 
					foreach($outlets as $out){
						echo "<tr>";
						echo "<td>".$out["outlet_id"]."</td>";
						echo "<td><a href='".URL."setup/outlet/".$out["outlet_id"]."'>".$out["outlet_name"]."</a></td>";
						echo "<td>".$out["outlet_capacity"]."</td>";
						echo "<td>".$out["outlet_tables"]."</td>";
						echo "<td>".$out["outlet_open_time"]."</td>";
						echo "<td>".$out["outlet_break_start_time"]."-".$out["outlet_break_end_time"]."</td>";
						echo "<td>".$out["outlet_day_off"]."</td>";
						echo "<td>".$out["outlet_avg_duration"]."</td>";
						echo "<td>".$out['outlet_season_start']."-".$out['outlet_season_end']."</td>";
						echo "<td>".$out["outlet_if_bookable"]."</td>";
						echo "<td><div id='outlet_detelet_button'></div></td>";
						echo "</tr>";
					}
				?>
				</tbody>
			</table>
		</div>
	</div>
