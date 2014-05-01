<section class="row m-b-md"></section>

	<?php if($this->session->flashdata('message')) { ?>
		<div class="alert alert-success" id="outlet_message" >
	        <button type="button" class="close" data-dismiss="alert">×</button>
	        <i class="fa fa-ok-sign"></i>		
	        
			<strong><?php	echo $this->session->flashdata('message'); ?></strong>
			
	    </div>
    <?php } ?>

<!-- 	Outlets -->


	<ul class="nav nav-tabs settings_tabs">
		<li class="active"><a href="<?php echo(URL.'outlet'); ?>">Outlet</a></li>
		<li><a href="<?php echo(URL.'user'); ?>">Users</a></li>
		<li><a href="<?php echo(URL.'holiday'); ?>">Holidays</a></li>
		<li><a href="<?php echo(URL.'email'); ?>">Email</a></li>
	</ul>

	<div id="_settings" class="settings">
		<div class="settings_header">
			<div class="crud">
				<a href="<?php echo(URL.'outlet/add'); ?>" type="button" class="btn btn-primary btn-sm">Add</a>
				<a href="<?php echo URL; ?>" type="button" class="btn btn-default btn-sm">Back</a>
			</div>
			<h3 class="m-b-xs text-black">Exisiting Outlets</h3>
		</div>
		<div class="settings_content table-responsive">
			<table class="table table-striped b-t b-light" id="outlet_table">
				<thead>
					<tr>
						<th class="th-sortable" data-toggle="class">#</th>						
						<th class="th-sortable" data-toggle="class">Name</th>
						<th class="th-sortable" data-toggle="class">Email</th>					
						<th class="th-sortable" data-toggle="class">Seats</th>						
						<th class="th-sortable" data-toggle="class">Tables</th>						
						<th class="th-sortable" data-toggle="class">Working time</th>
						<th class="th-sortable" data-toggle="class">Break time</th>													
						<th class="th-sortable" data-toggle="class">Day Off</th>
						<th class="th-sortable" data-toggle="class">Residence time</th>							
						<th>Bookable</th>
						<th>Edit</th>
						<th width="30">Delete</th>
					</tr>
                    </thead>
                    <tbody>
                    <?php 
						$i=1;
						foreach($outlets as $out){
							
							switch($out["outlet_day_off"]){
								case 1: $out["outlet_day_off"]="Monday";    break;
								case 2: $out["outlet_day_off"]="Tuesday";   break;
								case 3: $out["outlet_day_off"]="Wednesday"; break;
								case 4: $out["outlet_day_off"]="Thursday";  break;
								case 5: $out["outlet_day_off"]="Friday";    break;
								case 6: $out["outlet_day_off"]="Saturday";  break;
								case 7: $out["outlet_day_off"]="Sunday";    break;
							}

							echo "<tr>";
							echo "<td>".$i."</td>"; $i++;
							echo "<td><a href='".URL."outlet/edit/".$out["outlet_id"]."'>".$out["outlet_name"]."</a></td>";
							echo "<td>".$out['outlet_email']."</td>";
							echo "<td>".$out['outlet_seats_number']."</td>";
							echo "<td>".$out['outlet_tables_number']."</td>";
							echo "<td>".$out["outlet_open_time"]."-".$out["outlet_close_time"]."</td>";
							echo "<td>".$out["outlet_break_start_time"]."-".$out["outlet_break_end_time"]."</td>";
							echo "<td>".$out["outlet_day_off"]."</td>";
							echo "<td>".$out["outlet_staying_time_lunch"]."</td>";
							
							$check="";
							if($out['outlet_online_bookable']==1){
								$check="checked";
							}

							echo '<td class="i-checks" style="text-align:center"><input type="checkbox" '.$check.' disabled><i></i></td>';
							echo "<td><a class='btEdit btn btn-success' href='".URL."outlet/edit/".$out["outlet_id"]."'>Edit</a></td>";
							echo '<td><a href="'.URL."outlet/delete/".$out["outlet_id"].'" class="confirm"><div class="delete_button" style="background-image:url('.IMG.'/delete.png)"></div></a></td>';
							echo "</tr>";
						}
					?>
				</tbody>
			</table>
		</div>
	</div>
	

<script>
	$(document).ready(function () {
		setTimeout(function() { hide_message(); }, 500);
	});

	function hide_message(){
		$('#outlet_message').fadeOut();
	}
</script>