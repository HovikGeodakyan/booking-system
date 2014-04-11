<section class="row m-b-md">
</section>


<div class="_edit">

	<form role="form" action="<?php echo(URL.'outlet/update/'.$outlet['outlet_id']); ?>" method="post">
		
		<div style="float:right">
			<button type="submit" class="btn btn-primary" id="outlet_form_submit">Submit</button>
			<a href="<?php echo(URL.'outlet'); ?>" type="button" class="btn btn-default">Back</a>
		</div>
		<h3>Edit outlet settings</h3>

		<div class="col-lg-6">
			<div class="form-group">
				<label for="exampleInputEmail1">Outlet name</label>
				<input name="outlet_name" class="form-control" id="exampleInputEmail1" placeholder="Outlet Name" value="<?php echo $outlet['outlet_name']; ?>">
			</div>

			<div class="form-group">
				<label for="exampleInputEmail1">Outlet email address</label>
				<input name="outlet_email" type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" value="<?php echo $outlet['outlet_email']; ?>">
			</div>

			<div class="form-group">
				<label for="exampleInputEmail1">Outlet capacity</label>
				<input name="outlet_capacity" type="number" class="form-control" id="exampleInputEmail1" placeholder="Outlet capacity" value="<?php echo $outlet['outlet_capacity']; ?>">
			</div>

			<div class="form-group">
				<label for="exampleInputEmail1">Outlet tables</label>
				<input name="outlet_tables" type="number" class="form-control" id="exampleInputEmail1" placeholder="Outlet tables" value="<?php echo $outlet['outlet_tables']; ?>">
			</div>	
			<div class="form-group">
				<label for="exampleInputEmail1">Outlet description</label>
				<textarea name="outlet_description" class="form-control" id="exampleInputEmail1" placeholder="Outlet description"><?php echo $outlet['outlet_description']; ?></textarea>
			</div>
		</div>

		<div class="col-lg-6">

			<div class="form-group">
				<label class="control-label">Is this outlet bookable via online webform?</label>
				<div>
					<label class="switch">
						<input name="outlet_if_bookable" type="checkbox" <?php if($outlet['outlet_if_bookable']==1){echo "checked";} ?> value="1">
						<span></span>
					</label>
				</div>
			</div>

			<div class="form-group">
				<label for="exampleInputEmail1">Avearage reservation duration</label>
				<input name="outlet_avg_duration" type="time" class="form-control" id="exampleInputEmail1" placeholder="Reservation duration" value="<?php echo $outlet['outlet_avg_duration']; ?>">
			</div>

			<div class="form-group">
				<label>Outlet working time</label>
				<div class="controls form-inline">
					<label for="inputKey"></label>
					<input name="outlet_open_time" type="time" class="form-control" placeholder="Open time" value="<?php echo $outlet['outlet_open_time']; ?>">
					<label for="inputValue">-</label>
					<input name="outlet_close_time" type="time" class="form-control" placeholder="Close time" value="<?php echo $outlet['outlet_close_time']; ?>">
				</div>
			</div>		

			<div class="form-group">
				<label>Outlet break</label>
				<div class="controls form-inline">
					<label for="inputKey"></label>
					<input name="outlet_break_start_time" type="time" class="form-control" placeholder="Break starts time" value="<?php echo $outlet['outlet_break_start_time']; ?>">
					<label for="inputValue">-</label>
					<input name="outlet_break_end_time" type="time" class="form-control" placeholder="Break ends time" value="<?php echo $outlet['outlet_break_end_time']; ?>">
				</div>	
			</div>		

			<div class="form-group">
				<label>Outlet off day</label>
				<select name="outlet_day_off" class="form-control">
					<option value="1" <?php if($outlet['outlet_day_off']==1){echo "selected";} ?>>Monday</option>
					<option value="2" <?php if($outlet['outlet_day_off']==2){echo "selected";} ?>>Tuesday</option>
					<option value="3" <?php if($outlet['outlet_day_off']==3){echo "selected";} ?>>Wednesday</option>
					<option value="4" <?php if($outlet['outlet_day_off']==4){echo "selected";} ?>>Thursday</option>
					<option value="5" <?php if($outlet['outlet_day_off']==5){echo "selected";} ?>>Friday</option>
					<option value="6" <?php if($outlet['outlet_day_off']==6){echo "selected";} ?>>Saturday</option>
					<option value="7" <?php if($outlet['outlet_day_off']==7){echo "selected";} ?>>Sunday</option>
				</select>
			</div>

			<div class="form-group">
				<label>Outlet Season</label>
				<div class="controls form-inline">
					<label for="inputKey"></label>
					<input name="outlet_season_start" type="text" class="form-control" placeholder="Season start time" value="<?php echo $outlet['outlet_season_start']; ?>">
					<label for="inputValue">-</label>
					<input name="outlet_season_end" class="form-control" placeholder="Season end time" value="<?php echo $outlet['outlet_season_end']; ?>">
				</div>
			</div>
		</div>
		</div>

				<h3>Specify outlet working time</h3>

		<div class="col-lg-3">
			<h4>Monday</h4>
			<div class="form-group">
				<label>Outlet working time</label>
				<div class="controls form-inline">
					<label for="inputKey"></label>
					<input name="outlet_open_time" type="time" class="form-control" placeholder="Open time" data-required="true" data-error-message="Required">
					<label for="inputValue">-</label>
					<input name="outlet_close_time" type="time" class="form-control" placeholder="Close time" data-required="true" data-error-message="Required">
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
		</div>	

		<div class="col-lg-3">
			<h4>Tuesday</h4>
			<div class="form-group">
				<label>Outlet working time</label>
				<div class="controls form-inline">
					<label for="inputKey"></label>
					<input name="outlet_open_time" type="time" class="form-control" placeholder="Open time" data-required="true" data-error-message="Required">
					<label for="inputValue">-</label>
					<input name="outlet_close_time" type="time" class="form-control" placeholder="Close time" data-required="true" data-error-message="Required">
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
		</div>		

		<div class="col-lg-3">
			<h4>Wednesday</h4>
			<div class="form-group">
				<label>Outlet working time</label>
				<div class="controls form-inline">
					<label for="inputKey"></label>
					<input name="outlet_open_time" type="time" class="form-control" placeholder="Open time" data-required="true" data-error-message="Required">
					<label for="inputValue">-</label>
					<input name="outlet_close_time" type="time" class="form-control" placeholder="Close time" data-required="true" data-error-message="Required">
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
		</div>		

		<div class="col-lg-3">
			<h4>Thursday</h4>
			<div class="form-group">
				<label>Outlet working time</label>
				<div class="controls form-inline">
					<label for="inputKey"></label>
					<input name="outlet_open_time" type="time" class="form-control" placeholder="Open time" data-required="true" data-error-message="Required">
					<label for="inputValue">-</label>
					<input name="outlet_close_time" type="time" class="form-control" placeholder="Close time" data-required="true" data-error-message="Required">
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
		</div>


		<div class="col-lg-3">
			<h4>Friday</h4>
			<div class="form-group">
				<label>Outlet working time</label>
				<div class="controls form-inline">
					<label for="inputKey"></label>
					<input name="outlet_open_time" type="time" class="form-control" placeholder="Open time" data-required="true" data-error-message="Required">
					<label for="inputValue">-</label>
					<input name="outlet_close_time" type="time" class="form-control" placeholder="Close time" data-required="true" data-error-message="Required">
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
		</div>	

		<div class="col-lg-3">
			<h4>Saturday</h4>
			<div class="form-group">
				<label>Outlet working time</label>
				<div class="controls form-inline">
					<label for="inputKey"></label>
					<input name="outlet_open_time" type="time" class="form-control" placeholder="Open time" data-required="true" data-error-message="Required">
					<label for="inputValue">-</label>
					<input name="outlet_close_time" type="time" class="form-control" placeholder="Close time" data-required="true" data-error-message="Required">
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
		</div>		

		<div class="col-lg-3">
			<h4>Sunday</h4>
			<div class="form-group">
				<label>Outlet working time</label>
				<div class="controls form-inline">
					<label for="inputKey"></label>
					<input name="outlet_open_time" type="time" class="form-control" placeholder="Open time" data-required="true" data-error-message="Required">
					<label for="inputValue">-</label>
					<input name="outlet_close_time" type="time" class="form-control" placeholder="Close time" data-required="true" data-error-message="Required">
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
		</div>


	</form>
</div>

<script src="<?php echo(JS.'theme/js/parsley/parsley.min.js'); ?>"></script>
<script src="<?php echo(JS.'theme/js/parsley/parsley.extend.js'); ?>"></script>