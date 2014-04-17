<section class="row m-b-md"></section>

	<h3 class="m-b-xs">Reservations 
		<div id="unassigned"></div>
	</h3>
	<br>

	<form class="form-inline" role="form" id="filter">
		<div class="form-group">
			<label></label>
			<input type="date" class="form-control" name="start_date">
		</div>
		<div class="form-group">
			<label>-</label>
			<input type="date" class="form-control" name="end_date">
		</div>
		<div class="form-group" style="float:right">
			<input type="text" class="form-control" placeholder="Search" name="name_filter">
			<button type="submit" class="btn btn-success">Filter</button>
		</div>
	</form>

			

		<div class="table-responsive">
			<table class="table table-striped tablesorter" id="reservations_table">
				<thead>
					<tr>
						<th>Date</th>
						<th>Time</th>
						<th>Timeslot</th>
						<th>Number</th>
						<th>Guest</th>
						<th>Phone</th>
						<th>Email</th>
						<th>Language</th>
						<th>Confirmation</th>
						<th>Author</th>
						<th>Status</th>
						<th>Duration</th>
						<th>Table</th>
					</tr>
				</thead>
				<tbody>

				</tbody>
			</table>
			
</div>


<script src="<?php echo(JS.'reservations/table.js'); ?>"></script>