<section class="row m-b-md"></section>

	<h3 class="m-b-xs"><?php echo _reservations; ?> 
		<div id="unassigned"></div>
	</h3>
	<br>

	<form class="form-inline" role="form" id="filter">
		<div class="form-group">
			<label></label>
			<input type="text" class="form-control" name="start_date" placeholder="<?php echo _start; ?>">
		</div>
		<div class="form-group">
			<label>-</label>
			<input type="text" class="form-control" name="end_date" placeholder="<?php echo _end; ?>">
		</div>
		<div class="form-group" style="float:right">
			<input type="text" class="form-control" placeholder="Search" name="<?php echo _name; ?>">
			<button type="submit" class="btn btn-success"><?php echo _filter; ?></button>
		</div>
	</form>

			

		<div class="table-responsive">
			<table class="table table-striped tablesorter" id="reservations_table">
				<thead>
					<tr>
						<th><?php echo _date; ?></th>
						<th><?php echo _time; ?></th>
						<th><?php echo _timeslot; ?></th>
						<th><?php echo _guests; ?></th>
						<th><?php echo _name; ?></th>
						<th><?php echo _phone; ?></th>
						<th><?php echo _email; ?></th>
						<th><?php echo _language; ?></th>
						<th><?php echo _author; ?></th>
						<th><?php echo _status; ?></th>
						<th><?php echo _duration; ?></th>
						<th><?php echo _table; ?></th>
						<th><?php echo _view; ?></th>
					</tr>
				</thead>
				<tbody>

				</tbody>
			</table>
			
</div>


<script src="<?php echo(JS.'reservations/table.js'); ?>"></script>