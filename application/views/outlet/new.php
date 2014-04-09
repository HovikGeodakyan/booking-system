<section class="row m-b-md">
</section>


<div class="outlet_edit">
	<h3>Edit outlet settings</h3>
	<form role="form" action="<?php echo(URL.'outlet/create/'); ?>" method="post">
		<div class="form-group">
			<label for="exampleInputEmail1">Outlet name</label>
			<input name="outlet_name" class="form-control" id="exampleInputEmail1" placeholder="Outlet Name">
		</div>

		<div class="form-group">
			<label for="exampleInputEmail1">Outlet description</label>
			<textarea name="outlet_description" class="form-control" id="exampleInputEmail1" placeholder="Outlet description"></textarea>
		</div>	

		<span class="control-label">Is this outlet bookable via online webform?</span>
		<div class="form-group">
			<div class="controls btn-group" data-toggle="buttons">
				<label class="btn btn-success **active**">
					<input type="radio" name="outlet_if_bookable" id="inputWalls" value="1" checked>
					Yes
				</label>
				<label class="btn btn-danger">
					<input type="radio" name="outlet_if_bookable" id="inputWalls" value="0">
					No 
				</label>
			</div>		
		</div>		

		<div class="form-group">
			<label for="exampleInputEmail1">Outlet email address</label>
			<input name="outlet_email" type="email" class="form-control"placeholder="Enter email">
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
			<span class="control-label">Outlet working time</span>
			<div class="controls form-inline">
				<label for="inputKey"></label>
				<input name="outlet_open_time" type="time" class="form-control" placeholder="Open time">
				<label for="inputValue">-</label>
				<input name="outlet_close_time" type="time" class="form-control" placeholder="Close time">
			</div>
		</div>		

		<div class="form-group">
			<span class="control-label">Outlet break</span>
			<div class="controls form-inline">
				<label for="inputKey"></label>
				<input name="outlet_break_start_time" type="time" class="form-control" placeholder="Break starts time">
				<label for="inputValue">-</label>
				<input name="outlet_break_end_time" type="time" class="form-control" placeholder="Break ends time">
			</div>
		</div>		

		<div class="form-group">
			<label for="exampleInputEmail1">Avearage reservation duration</label>
			<input name="outlet_avg_duration" type="time" class="form-control" id="exampleInputEmail1" placeholder="Reservation duration">
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
			<span class="control-label">Outlet Season</span>
			<div class="controls form-inline">
				<label for="inputKey"></label>
				<input name="outlet_season_start" type="text" class="form-control" placeholder="Season start time">
				<label for="inputValue">-</label>
				<input name="outlet_season_end" class="form-control" placeholder="Season end time">
			</div>
		</div>

		<button type="submit" class="btn btn-primary">Submit</button>
		<a href="<?php echo(URL.'outlet'); ?>" type="button" class="btn btn-default">Back</a>
	</form>
</div>