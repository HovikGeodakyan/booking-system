<section class="row m-b-md">
</section>


<div class="outlet_edit">

	<form role="form" action="<?php echo(URL.'outlet/create/'); ?>" method="post">
		
		<div style="float:right">
			<button type="submit" class="btn btn-primary">Create</button>
			<a href="<?php echo(URL.'outlet'); ?>" type="button" class="btn btn-default">Back</a>
		</div>
		<h3>Craete an outlet</h3>

		<div class="col-lg-6">
			<div class="form-group">
				<label for="exampleInputEmail1">Outlet name</label>
				<input name="outlet_name" class="form-control" id="exampleInputEmail1" placeholder="Outlet Name">
			</div>

			<div class="form-group">
				<label for="exampleInputEmail1">Outlet email address</label>
				<input name="outlet_email" type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
			</div>

			<div class="form-group">
				<label for="exampleInputEmail1">Outlet capacity</label>
				<input name="outlet_capacity" type="number" class="form-control" id="exampleInputEmail1" placeholder="Outlet capacity">
			</div>

			<div class="form-group">
				<label for="exampleInputEmail1">Outlet tables</label>
				<input name="outlet_tables" type="number" class="form-control" id="exampleInputEmail1" placeholder="Outlet tables">
			</div>	
			<div class="form-group">
				<label for="exampleInputEmail1">Outlet description</label>
				<textarea name="outlet_description" class="form-control" id="exampleInputEmail1" placeholder="Outlet description"></textarea>
			</div>
		</div>

		<div class="col-lg-6">

			<div class="form-group">
				<label class="control-label">Is this outlet bookable via online webform?</label>
				<div>
					<label class="switch">
						<input name="outlet_if_bookable" type="checkbox" value="1">
						<span></span>
					</label>
				</div>
			</div>

			<div class="form-group">
				<label for="exampleInputEmail1">Avearage reservation duration</label>
				<input name="outlet_avg_duration" type="time" class="form-control" id="exampleInputEmail1" placeholder="Reservation duration">
			</div>

			<div class="form-group">
				<label>Outlet working time</label>
				<div class="controls form-inline">
					<label for="inputKey"></label>
					<input name="outlet_open_time" type="time" class="form-control" placeholder="Open time">
					<label for="inputValue">-</label>
					<input name="outlet_close_time" type="time" class="form-control" placeholder="Close time">
				</div>
			</div>		

			<div class="form-group">
				<label>Outlet break</label>
				<div class="controls form-inline">
					<label for="inputKey"></label>
					<input name="outlet_break_start_time" type="time" class="form-control" placeholder="Break starts time">
					<label for="inputValue">-</label>
					<input name="outlet_break_end_time" type="time" class="form-control" placeholder="Break ends time">
				</div>	
			</div>		

			<div class="form-group">
				<label>Outlet off day</label>
				<select name="outlet_day_off" class="form-control">
					<option value="1">Monday</option>
					<option value="2">Tuesday</option>
					<option value="3">Wednesday</option>
					<option value="4">Thursday</option>
					<option value="5">Friday</option>
					<option value="6">Saturday</option>
					<option value="7">Sunday</option>
				</select>
			</div>

			<div class="form-group">
				<label>Outlet Season</label>
				<div class="controls form-inline">
					<label for="inputKey"></label>
					<input name="outlet_season_start" type="text" class="form-control" placeholder="Season start time">
					<label for="inputValue">-</label>
					<input name="outlet_season_end" class="form-control" placeholder="Season end time">
				</div>
			</div>
		</div>
		</div>
	</form>
</div>