<section class="row m-b-md">
</section>


<div class="_edit">

	<form role="form" action="<?php echo(URL.'outlet/update/'.$outlet['outlet_id']); ?>" method="post" data-validate="parsley">
		
		<div style="float:right">
			<button type="submit" class="btn btn-primary">Submit</button>
			<a href="<?php echo(URL.'outlet'); ?>" type="button" class="btn btn-default">Back</a>
		</div>

		<h3>Create an outlet</h3>

		<!-- first column -->
		<div class="col-lg-6">
			<div class="form-group">
				<label for="exampleInputEmail1">Outlet name</label>
				<input name="outlet_name" class="form-control" id="exampleInputEmail1" placeholder="Outlet Name" data-required="true" data-error-message="You must enter a name for the outlet." value="<?php echo $outlet['outlet_name']; ?>">
			</div>

			<div class="form-group">
				<label for="exampleInputEmail1">Outlet email address</label>
				<input name="outlet_email" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter email" data-type="email" data-required="true" data-error-message="Enter a valid email, please." value="<?php echo $outlet['outlet_email']; ?>">
			</div>

			<div class="form-group">
				<label for="exampleInputEmail1">Outlet capacity</label>
				<input name="outlet_seats_number" type="number" class="form-control" id="exampleInputEmail1" placeholder="Outlet capacity" data-type="digits" data-required="true" data-error-message="You must enter the number of seats." value="<?php echo $outlet['outlet_seats_number']; ?>">
			</div>

			<div class="form-group">
				<label for="exampleInputEmail1">Outlet tables</label>
				<input name="outlet_tables_number" type="number" class="form-control" id="outlet_tables" placeholder="Outlet tables" data-type="number" data-required="true" data-error-message="You must enter the number of tables."  value="<?php echo $outlet['outlet_tables_number']; ?>">
			</div>	

			<div class="form-group">
				<h5>Default not bookable table number</h5>
				<div class="col-lg-2-4 form-group">
					<label for="exampleInputEmail1">Lunch</label>
					<input name="outlet_not_bookable_table_lunch" type="number" class="form-control"  value="<?php echo $outlet['outlet_default_not_bookable_table_lunch']; ?>">
				</div>				
				<div class="col-lg-2-4 form-group">
					<label for="exampleInputEmail1">Dinner</label>
					<input name="outlet_not_bookable_table_dinner" type="number" class="form-control" value="<?php echo $outlet['outlet_default_not_bookable_table_dinner']; ?>">
				</div>				
				<div class="col-lg-2-4 form-group">
					<label for="exampleInputEmail1">Pre-Concert</label>
					<input name="outlet_not_bookable_table_pre_concert" type="number" class="form-control" value="<?php echo $outlet['outlet_default_not_bookable_table_pre_concert']; ?>">
				</div>				
				<div class="col-lg-2-4 form-group">
					<label for="exampleInputEmail1">Concert</label>
					<input name="outlet_not_bookable_table_concert" type="number" class="form-control" value="<?php echo $outlet['outlet_default_not_bookable_table_concert']; ?>">
				</div>				
				<div class="col-lg-2-4 form-group">
					<label for="exampleInputEmail1">Post-Concert</label>
					<input name="outlet_not_bookable_table_post_concert" type="number" class="form-control" value="<?php echo $outlet['outlet_default_not_bookable_table_post_concert']; ?>">
				</div>
			</div>

			<div class="form-group">
				<label for="exampleInputEmail1">Outlet description</label>
				<textarea name="outlet_description" class="form-control" id="exampleInputEmail1" placeholder="Outlet description"><?php echo $outlet['outlet_description']; ?></textarea>
			</div>

		</div>

		<!-- second column -->
		<div class="col-lg-6">

			<div class="form-group">
				<label class="control-label">Is this outlet bookable via online webform?</label>
				<div>
					<label class="switch">
						<input name="outlet_online_bookable" type="checkbox" value="1" <?php if($outlet['outlet_online_bookable']==1){echo "checked='checked'";} ?>>
						<span></span>
					</label>
				</div>
			</div>

			<div class="form-group">
				<label>Outlet working time</label>
				<div class="controls form-inline">
					<label for="inputKey"></label>
					<input name="outlet_open_time" type="time" class="form-control" placeholder="Open time" data-required="true" value="<?php echo $outlet['outlet_open_time']; ?>">
					<label for="inputValue">-</label>
					<input name="outlet_close_time" type="time" class="form-control" placeholder="Close time" data-required="true" value="<?php echo $outlet['outlet_close_time']; ?>">
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
					<option value="1" <?php if($outlet['outlet_day_off']==1){echo "selected='selected'";} ?>>Monday</option>
					<option value="2" <?php if($outlet['outlet_day_off']==2){echo "selected='selected'";} ?>>Tuesday</option>
					<option value="3" <?php if($outlet['outlet_day_off']==3){echo "selected='selected'";} ?>>Wednesday</option>
					<option value="4" <?php if($outlet['outlet_day_off']==4){echo "selected='selected'";} ?>>Thursday</option>
					<option value="5" <?php if($outlet['outlet_day_off']==5){echo "selected='selected'";} ?>>Friday</option>
					<option value="6" <?php if($outlet['outlet_day_off']==6){echo "selected='selected'";} ?>>Saturday</option>
					<option value="7" <?php if($outlet['outlet_day_off']==7){echo "selected='selected'";} ?>>Sunday</option>
				</select>
			</div>

			<div class="form-group">
				<h5>Avearage staying time for</h5>
				<div class="col-lg-2-4 form-group">
					<label for="exampleInputEmail1">Lunch</label>
					<input name="outlet_staying_time_lunch" type="time" class="form-control" value="<?php echo $outlet['outlet_staying_time_lunch']; ?>">
				</div>				
				<div class="col-lg-2-4 form-group">
					<label for="exampleInputEmail1">Dinner</label>
					<input name="outlet_staying_time_dinner" type="time" class="form-control" value="<?php echo $outlet['outlet_staying_time_dinner']; ?>">
				</div>				
				<div class="col-lg-2-4 form-group">
					<label for="exampleInputEmail1">Pre-Concert</label>
					<input name="outlet_staying_time_pre_concert" type="time" class="form-control" value="<?php echo $outlet['outlet_staying_time_pre_concert']; ?>">
				</div>				
				<div class="col-lg-2-4 form-group">
					<label for="exampleInputEmail1">Concert</label>
					<input name="outlet_staying_time_concert" type="time" class="form-control" value="<?php echo $outlet['outlet_staying_time_concert']; ?>">
				</div>				
				<div class="col-lg-2-4 form-group">
					<label for="exampleInputEmail1">Post-Concert</label>
					<input name="outlet_staying_time_post_concert" type="time" class="form-control" value="<?php echo $outlet['outlet_staying_time_post_concert']; ?>">
				</div>
			</div>

			<div class="form-group">
				<label>No-show time limit (in minutes)</label>
				<input name="outlet_no_show_limit" type="number" class="form-control" placeholder="Time limit" data-type="digits" data-required="true" data-error-message="Required." value="<?php echo $outlet['no_show_limit']; ?>">
			</div>	
		</div>

		<!-- Additional settings accordeon -->

		<h3 class="col-lg-12">Additional settings</h3>
		<div class="col-lg-12 panel-group" id="accordion">

			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
							<h4>Specify outlet working time per day</h4>
						</a>
					</h4>
				</div>
				<div id="collapseOne" class="panel-collapse collapse">
					<div class="panel-body">

						<div class="col-lg-3">
							<h4>Monday</h4>
							<div class="form-group">
								<label>Outlet working time</label>
								<div class="controls form-inline">
									<label for="inputKey"></label>
									<input name="outlet_open_time_1" type="time" class="form-control" placeholder="Open time" value="<?php echo $outlet['outlet_open_time_1']; ?>">
									<label for="inputValue">-</label>
									<input name="outlet_close_time_1" type="time" class="form-control" placeholder="Close time" value="<?php echo $outlet['outlet_close_time_1']; ?>">
								</div>
							</div>		

							<div class="form-group">
								<label>Outlet break</label>
								<div class="controls form-inline">
									<label for="inputKey"></label>
									<input name="outlet_break_start_time_1" type="time" class="form-control" placeholder="Break starts time" value="<?php echo $outlet['outlet_break_start_time_1']; ?>">
									<label for="inputValue">-</label>
									<input name="outlet_break_end_time_1" type="time" class="form-control" placeholder="Break ends time" value="<?php echo $outlet['outlet_break_end_time_1']; ?>">
								</div>	
							</div>		
						</div>	

						<div class="col-lg-3">
							<h4>Tuesday</h4>
							<div class="form-group">
								<label>Outlet working time</label>
								<div class="controls form-inline">
									<label for="inputKey"></label>
									<input name="outlet_open_time_2" type="time" class="form-control" placeholder="Open time" value="<?php echo $outlet['outlet_open_time_2']; ?>">
									<label for="inputValue">-</label>
									<input name="outlet_close_time_2" type="time" class="form-control" placeholder="Close time" value="<?php echo $outlet['outlet_close_time_2']; ?>">
								</div>
							</div>		

							<div class="form-group">
								<label>Outlet break</label>
								<div class="controls form-inline">
									<label for="inputKey"></label>
									<input name="outlet_break_start_time_2" type="time" class="form-control" placeholder="Break starts time" value="<?php echo $outlet['outlet_break_start_time_2']; ?>">
									<label for="inputValue">-</label>
									<input name="outlet_break_end_time_2" type="time" class="form-control" placeholder="Break ends time" value="<?php echo $outlet['outlet_break_end_time_2']; ?>">
								</div>	
							</div>		
						</div>		

						<div class="col-lg-3">
							<h4>Wednesday</h4>
							<div class="form-group">
								<label>Outlet working time</label>
								<div class="controls form-inline">
									<label for="inputKey"></label>
									<input name="outlet_open_time_3" type="time" class="form-control" placeholder="Open time" value="<?php echo $outlet['outlet_open_time_3']; ?>">
									<label for="inputValue">-</label>
									<input name="outlet_close_time_3" type="time" class="form-control" placeholder="Close time" value="<?php echo $outlet['outlet_close_time_3']; ?>">
								</div>
							</div>		

							<div class="form-group">
								<label>Outlet break</label>
								<div class="controls form-inline">
									<label for="inputKey"></label>
									<input name="outlet_break_start_time_3" type="time" class="form-control" placeholder="Break starts time" value="<?php echo $outlet['outlet_break_start_time_3']; ?>">
									<label for="inputValue">-</label>
									<input name="outlet_break_end_time_3" type="time" class="form-control" placeholder="Break ends time" value="<?php echo $outlet['outlet_break_end_time_3']; ?>">
								</div>	
							</div>		
						</div>		

						<div class="col-lg-3">
							<h4>Thursday</h4>
							<div class="form-group">
								<label>Outlet working time</label>
								<div class="controls form-inline">
									<label for="inputKey"></label>
									<input name="outlet_open_time_4" type="time" class="form-control" placeholder="Open time" value="<?php echo $outlet['outlet_open_time_4']; ?>">
									<label for="inputValue">-</label>
									<input name="outlet_close_time_4" type="time" class="form-control" placeholder="Close time" value="<?php echo $outlet['outlet_close_time_4']; ?>">
								</div>
							</div>		

							<div class="form-group">
								<label>Outlet break</label>
								<div class="controls form-inline">
									<label for="inputKey"></label>
									<input name="outlet_break_start_time_4" type="time" class="form-control" placeholder="Break starts time" value="<?php echo $outlet['outlet_break_start_time_4']; ?>">
									<label for="inputValue">-</label>
									<input name="outlet_break_end_time_4" type="time" class="form-control" placeholder="Break ends time" value="<?php echo $outlet['outlet_break_end_time_4']; ?>">
								</div>	
							</div>		
						</div>


						<div class="col-lg-3">
							<h4>Friday</h4>
							<div class="form-group">
								<label>Outlet working time</label>
								<div class="controls form-inline">
									<label for="inputKey"></label>
									<input name="outlet_open_time_5" type="time" class="form-control" placeholder="Open time" value="<?php echo $outlet['outlet_open_time_5']; ?>">
									<label for="inputValue">-</label>
									<input name="outlet_close_time_5" type="time" class="form-control" placeholder="Close time" value="<?php echo $outlet['outlet_close_time_5']; ?>">
								</div>
							</div>		

							<div class="form-group">
								<label>Outlet break</label>
								<div class="controls form-inline">
									<label for="inputKey"></label>
									<input name="outlet_break_start_time_5" type="time" class="form-control" placeholder="Break starts time" value="<?php echo $outlet['outlet_break_start_time_5']; ?>">
									<label for="inputValue">-</label>
									<input name="outlet_break_end_time_5" type="time" class="form-control" placeholder="Break ends time" value="<?php echo $outlet['outlet_break_end_time_5']; ?>">
								</div>	
							</div>		
						</div>	

						<div class="col-lg-3">
							<h4>Saturday</h4>
							<div class="form-group">
								<label>Outlet working time</label>
								<div class="controls form-inline">
									<label for="inputKey"></label>
									<input name="outlet_open_time_6" type="time" class="form-control" placeholder="Open time" value="<?php echo $outlet['outlet_open_time_6']; ?>">
									<label for="inputValue">-</label>
									<input name="outlet_close_time_6" type="time" class="form-control" placeholder="Close time" value="<?php echo $outlet['outlet_close_time_6']; ?>">
								</div>
							</div>		

							<div class="form-group">
								<label>Outlet break</label>
								<div class="controls form-inline">
									<label for="inputKey"></label>
									<input name="outlet_break_start_time_6" type="time" class="form-control" placeholder="Break starts time" value="<?php echo $outlet['outlet_break_start_time_6']; ?>">
									<label for="inputValue">-</label>
									<input name="outlet_break_end_time_6" type="time" class="form-control" placeholder="Break ends time" value="<?php echo $outlet['outlet_break_end_time_6']; ?>">
								</div>	
							</div>		
						</div>		

						<div class="col-lg-3">
							<h4>Sunday</h4>
							<div class="form-group">
								<label>Outlet working time</label>
								<div class="controls form-inline">
									<label for="inputKey"></label>
									<input name="outlet_open_time_7" type="time" class="form-control" placeholder="Open time" value="<?php echo $outlet['outlet_open_time_7']; ?>">
									<label for="inputValue">-</label>
									<input name="outlet_close_time_7" type="time" class="form-control" placeholder="Close time" value="<?php echo $outlet['outlet_close_time_7']; ?>">
								</div>
							</div>		

							<div class="form-group">
								<label>Outlet break</label>
								<div class="controls form-inline">
									<label for="inputKey"></label>
									<input name="outlet_break_start_time_7" type="time" class="form-control" placeholder="Break starts time" value="<?php echo $outlet['outlet_break_start_time_7']; ?>">
									<label for="inputValue">-</label>
									<input name="outlet_break_end_time_7" type="time" class="form-control" placeholder="Break ends time" value="<?php echo $outlet['outlet_break_end_time_7']; ?>">
								</div>	
							</div>		
						</div>

					</div>
				</div>
			</div>

			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
							<h4>Holidays</h4>
						</a>
					</h4>
				</div>
				<div id="collapseTwo" class="panel-collapse collapse">
					<div class="panel-body" id="holiday-container">
					<?php foreach ($holiday as $hol) { ?>
						<div class="col-lg-12 col-xs-12 col-sm-12 form-group" id="holiday-form-group">
							<div class="col-lg-2 col-xs-4 col-sm-4 form-group">
								<label for="holiday_name">Name</label>
								<input name="holiday_name[]" id="holiday_name" type="text" class="form-control" value="<?php echo $hol['holiday_name']; ?>">
							</div>				
							<div class="col-lg-2 col-xs-4 col-sm-4 form-group">
								<label for="holiday_start">Start</label>
								<input name="holiday_start[]" id="holiday_start" type="date" class="form-control" value="<?php echo $hol['holiday_start_date']; ?>">
							</div>				
							<div class="col-lg-2 col-xs-4 col-sm-4 form-group">
								<label for="holiday_end">End</label>
								<input name="holiday_end[]" id="holiday_end" type="date" class="form-control" value="<?php echo $hol['holiday_end_date']; ?>">
							</div>				
							<div class="col-lg-4 col-xs-8 col-sm-8 form-group">
								<label for="holiday_message">Message</label> 
								<input name="holiday_message[]" id="holiday_message" type="text" class="form-control" value="<?php echo $hol['holiday_message']; ?>">
							</div>	

							<div class="col-lg-2 col-xs-4 col-sm-4 form-group">
								<label class="control-label">Remove the holiday</label><br>
								<button class="remove_holiday btn btn-danger" type="button"><i class="fa fa-minus"></i></button>
							</div>			
						</div>
					<?php } ?>
						<button id="add_holiday" class="col-lg-12 col-xs-12 col-sm-12 btn btn-success" type="button">Add a holiday</button>

					</div>
				</div>	
			</div>

			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
							<h4>Set table parameters</h4>
						</a>
					</h4>
				</div>
				<div id="collapseThree" class="panel-collapse collapse">
					<div class="panel-body" id="table-container">

					<?php foreach ($table as $tbl) { ?>

						<div class="form-group col-lg-12 col-xs-12 col-sm-12" id="table-form-group">

							<div class="col-lg-2 col-xs-4 col-sm-4 form-group">
								<label for="table_standard_seats">Standard number of seats</label>
								<input name="table_seats_standart_number[]" id="table_standard_seats" type="number" class="form-control" value="<?php echo $tbl['table_seats_standart_number']; ?>">
							</div>

							<div class="col-lg-2 col-xs-4 col-sm-4 form-group">
								<label for="table_max_seats">Maximum number of seats</label>
								<input name="table_seats_max_number[]" id="table_max_seats" type="number" class="form-control" value="<?php echo $tbl['table_seats_max_number']; ?>">
							</div>

							<div class="col-lg-2 col-xs-4 col-sm-4 form-group">
								<label class="control-label">Combinable</label>
								<div>
									<label class="switch">
										<input name="table_combinable[]" type="checkbox" value="1" <?php if($tbl['table_combinable']==1){echo "checked='checked'";} ?>>
										<span></span>
									</label>
								</div>
							</div>

							<div class="col-lg-4 col-xs-8 col-sm-8 form-group">
								<label>Location</label>
								<select name="table_location[]" class="form-control">
									<option value="1" <?php if($tbl['table_location']==1){echo "selected='selected'";} ?>>Window</option>
									<option value="2" <?php if($tbl['table_location']==2){echo "selected='selected'";} ?>>Middle</option>
									<option value="3" <?php if($tbl['table_location']==3){echo "selected='selected'";} ?>>Back</option>
								</select>
							</div>

							<div class="col-lg-2 col-xs-4 col-sm-4 form-group">
								<label class="control-label">Remove the table</label><br>
								<button class="remove_table btn btn-danger" type="button"><i class="fa fa-minus"></i></button>
							</div>
						</div>
						
					<?php } ?>

					<button id="add_table" class="col-lg-12 col-xs-12 col-sm-12 btn btn-success" type="button">Add a table</button>
					</div>	
			</div>

	</form>
</div>


<!-- <div class="form-group col-lg-12 col-xs-12 col-sm-12" id="table-form-group">

	<div class="col-lg-2 col-xs-4 col-sm-4 form-group">
		<label for="table_standard_seats">Standard number of seats</label>
		<input name="table_seats_standart_number[]" id="table_standard_seats" type="number" class="form-control">
	</div>

	<div class="col-lg-2 col-xs-4 col-sm-4 form-group">
		<label for="table_max_seats">Maximum number of seats</label>
		<input name="table_seats_max_number[]" id="table_max_seats" type="number" class="form-control">
	</div>

	<div class="col-lg-2 col-xs-4 col-sm-4 form-group">
		<label class="control-label">Combinable</label>
		<div>
			<label class="switch">
				<input name="table_combinable[]" type="checkbox" checked="checked" value="1">
				<span></span>
			</label>
		</div>
	</div>

	<div class="col-lg-4 col-xs-8 col-sm-8 form-group">
		<label>Location</label>
		<select name="table_location[]" class="form-control">
			<option value="1">Window</option>
			<option value="2">Middle</option>
			<option value="3">Back</option>
		</select>
	</div>
	<div class="col-lg-2 col-xs-4 col-sm-4 form-group">
		<label class="control-label">Remove the table</label><br>
		<button class="remove_table btn btn-danger" type="button"><i class="fa fa-minus"></i></button>
	</div>
</div> -->


<script src="<?php echo(JS.'outlets/outlet_edit_new.js'); ?>"></script>

