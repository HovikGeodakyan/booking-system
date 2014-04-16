<div class="_edit">

	<form role="form" action="<?php echo(URL.'outlet/create/'); ?>" method="post" data-validate="parsley">
		
		<div style="float:right">
			<button type="submit" class="btn btn-primary">Create</button>
			<a href="<?php echo(URL.'outlet'); ?>" type="button" class="btn btn-default">Back</a>
		</div>

		<h3>Create an outlet</h3>

		<!-- first column -->
		<div class="col-lg-6">
			<div class="form-group">
				<label for="exampleInputEmail1">Outlet name</label>
				<input name="outlet_name" class="form-control" placeholder="Enter Outlet Name" data-required="true" data-error-message="You must enter a name for the outlet.">
			</div>

			<div class="form-group">
				<label for="exampleInputEmail1">Outlet email address</label>
				<input name="outlet_email" type="text" class="form-control"  placeholder="Enter email" data-type="email" data-required="true" data-error-message="Enter a valid email, please.">
			</div>

			<div class="form-group">
				<label for="exampleInputEmail1">Outlet capacity</label>
				<input name="outlet_seats_number" type="number" class="form-control" placeholder="Outlet capacity" data-type="digits" data-required="true" data-error-message="You must enter the number of seats.">
			</div>

			<div class="form-group">
				<label for="exampleInputEmail1">Outlet tables</label>
				<input name="outlet_tables_number" type="number" class="form-control" id="outlet_tables" placeholder="Outlet tables" data-type="number" data-required="true" data-error-message="You must enter the number of tables.">
			</div>	

			<div class="form-group">
				<h5>Default not bookable table number</h5>
				<div class="col-lg-2-4 form-group">
					<label for="exampleInputEmail1">Lunch</label>
					<input name="outlet_default_not_bookable_table_lunch" type="number" class="form-control">
				</div>				
				<div class="col-lg-2-4 form-group">
					<label for="exampleInputEmail1">Dinner</label>
					<input name="outlet_default_not_bookable_table_dinner" type="number" class="form-control">
				</div>				
				<div class="col-lg-2-4 form-group">
					<label for="exampleInputEmail1">Pre-Concert</label>
					<input name="outlet_default_not_bookable_table_pre_concert" type="number" class="form-control">
				</div>				
				<div class="col-lg-2-4 form-group">
					<label for="exampleInputEmail1">Concert</label>
					<input name="outlet_default_not_bookable_table_concert" type="number" class="form-control">
				</div>				
				<div class="col-lg-2-4 form-group">
					<label for="exampleInputEmail1">Post-Concert</label>
					<input name="outlet_default_not_bookable_table_post_concert" type="number" class="form-control">
				</div>
			</div>

			<div class="form-group">
				<label for="exampleInputEmail1">Outlet description</label>
				<textarea name="outlet_description" class="form-control" id="exampleInputEmail1" placeholder="Outlet description"></textarea>
			</div>

		</div>

		<!-- second column -->
		<div class="col-lg-6">

			<div class="form-group">
				<label class="control-label">Is this outlet bookable via online webform?</label>
				<div>
					<label class="switch">
						<input name="outlet_online_bookable" type="checkbox" checked="checked" value="1">
						<span></span>
					</label>
				</div>
			</div>

			<div class="form-group">
				<label>Outlet working time</label>
				<div class="controls form-inline">
					<label for="inputKey"></label>
					<input name="outlet_open_time" type="time" class="form-control" placeholder="Open time" data-required="true">
					<label for="inputValue">-</label>
					<input name="outlet_close_time" type="time" class="form-control" placeholder="Close time" data-required="true">
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
				<h5>Avearage staying time for</h5>
				<div class="col-lg-2-4 form-group">
					<label for="exampleInputEmail1">Lunch</label>
					<input name="outlet_staying_time_lunch" type="time" class="form-control">
				</div>				
				<div class="col-lg-2-4 form-group">
					<label for="exampleInputEmail1">Dinner</label>
					<input name="outlet_staying_time_dinner" type="time" class="form-control">
				</div>				
				<div class="col-lg-2-4 form-group">
					<label for="exampleInputEmail1">Pre-Concert</label>
					<input name="outlet_staying_time_pre_concert" type="time" class="form-control">
				</div>				
				<div class="col-lg-2-4 form-group">
					<label for="exampleInputEmail1">Concert</label>
					<input name="outlet_staying_time_concert" type="time" class="form-control">
				</div>				
				<div class="col-lg-2-4 form-group">
					<label for="exampleInputEmail1">Post-Concert</label>
					<input name="outlet_staying_time_post_concert" type="time" class="form-control">
				</div>
			</div>

			<div class="form-group">
				<label>No-show time limit (in minutes)</label>
				<input name="outlet_no_show_limit" type="number" class="form-control" placeholder="Time limit" data-type="digits" data-required="true" data-error-message="Required.">
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
									<input name="outlet_open_time_1" type="time" class="form-control" placeholder="Open time">
									<label for="inputValue">-</label>
									<input name="outlet_close_time_1" type="time" class="form-control" placeholder="Close time">
								</div>
							</div>		

							<div class="form-group">
								<label>Outlet break</label>
								<div class="controls form-inline">
									<label for="inputKey"></label>
									<input name="outlet_break_start_time_1" type="time" class="form-control" placeholder="Break starts time">
									<label for="inputValue">-</label>
									<input name="outlet_break_end_time_1" type="time" class="form-control" placeholder="Break ends time">
								</div>	
							</div>		
						</div>	

						<div class="col-lg-3">
							<h4>Tuesday</h4>
							<div class="form-group">
								<label>Outlet working time</label>
								<div class="controls form-inline">
									<label for="inputKey"></label>
									<input name="outlet_open_time_2" type="time" class="form-control" placeholder="Open time">
									<label for="inputValue">-</label>
									<input name="outlet_close_time_2" type="time" class="form-control" placeholder="Close time">
								</div>
							</div>		

							<div class="form-group">
								<label>Outlet break</label>
								<div class="controls form-inline">
									<label for="inputKey"></label>
									<input name="outlet_break_start_time_2" type="time" class="form-control" placeholder="Break starts time">
									<label for="inputValue">-</label>
									<input name="outlet_break_end_time_2" type="time" class="form-control" placeholder="Break ends time">
								</div>	
							</div>		
						</div>		

						<div class="col-lg-3">
							<h4>Wednesday</h4>
							<div class="form-group">
								<label>Outlet working time</label>
								<div class="controls form-inline">
									<label for="inputKey"></label>
									<input name="outlet_open_time_3" type="time" class="form-control" placeholder="Open time">
									<label for="inputValue">-</label>
									<input name="outlet_close_time_3" type="time" class="form-control" placeholder="Close time">
								</div>
							</div>		

							<div class="form-group">
								<label>Outlet break</label>
								<div class="controls form-inline">
									<label for="inputKey"></label>
									<input name="outlet_break_start_time_3" type="time" class="form-control" placeholder="Break starts time">
									<label for="inputValue">-</label>
									<input name="outlet_break_end_time_3" type="time" class="form-control" placeholder="Break ends time">
								</div>	
							</div>		
						</div>		

						<div class="col-lg-3">
							<h4>Thursday</h4>
							<div class="form-group">
								<label>Outlet working time</label>
								<div class="controls form-inline">
									<label for="inputKey"></label>
									<input name="outlet_open_time_4" type="time" class="form-control" placeholder="Open time">
									<label for="inputValue">-</label>
									<input name="outlet_close_time_4" type="time" class="form-control" placeholder="Close time">
								</div>
							</div>		

							<div class="form-group">
								<label>Outlet break</label>
								<div class="controls form-inline">
									<label for="inputKey"></label>
									<input name="outlet_break_start_time_4" type="time" class="form-control" placeholder="Break starts time">
									<label for="inputValue">-</label>
									<input name="outlet_break_end_time_4" type="time" class="form-control" placeholder="Break ends time">
								</div>	
							</div>		
						</div>


						<div class="col-lg-3">
							<h4>Friday</h4>
							<div class="form-group">
								<label>Outlet working time</label>
								<div class="controls form-inline">
									<label for="inputKey"></label>
									<input name="outlet_open_time_5" type="time" class="form-control" placeholder="Open time">
									<label for="inputValue">-</label>
									<input name="outlet_close_time_5" type="time" class="form-control" placeholder="Close time">
								</div>
							</div>		

							<div class="form-group">
								<label>Outlet break</label>
								<div class="controls form-inline">
									<label for="inputKey"></label>
									<input name="outlet_break_start_time_5" type="time" class="form-control" placeholder="Break starts time">
									<label for="inputValue">-</label>
									<input name="outlet_break_end_time_5" type="time" class="form-control" placeholder="Break ends time">
								</div>	
							</div>		
						</div>	

						<div class="col-lg-3">
							<h4>Saturday</h4>
							<div class="form-group">
								<label>Outlet working time</label>
								<div class="controls form-inline">
									<label for="inputKey"></label>
									<input name="outlet_open_time_6" type="time" class="form-control" placeholder="Open time">
									<label for="inputValue">-</label>
									<input name="outlet_close_time_6" type="time" class="form-control" placeholder="Close time">
								</div>
							</div>		

							<div class="form-group">
								<label>Outlet break</label>
								<div class="controls form-inline">
									<label for="inputKey"></label>
									<input name="outlet_break_start_time_6" type="time" class="form-control" placeholder="Break starts time">
									<label for="inputValue">-</label>
									<input name="outlet_break_end_time_6" type="time" class="form-control" placeholder="Break ends time">
								</div>	
							</div>		
						</div>		

						<div class="col-lg-3">
							<h4>Sunday</h4>
							<div class="form-group">
								<label>Outlet working time</label>
								<div class="controls form-inline">
									<label for="inputKey"></label>
									<input name="outlet_open_time_0" type="time" class="form-control" placeholder="Open time">
									<label for="inputValue">-</label>
									<input name="outlet_close_time_0" type="time" class="form-control" placeholder="Close time">
								</div>
							</div>		

							<div class="form-group">
								<label>Outlet break</label>
								<div class="controls form-inline">
									<label for="inputKey"></label>
									<input name="outlet_break_start_time_0" type="time" class="form-control" placeholder="Break starts time">
									<label for="inputValue">-</label>
									<input name="outlet_break_end_time_0" type="time" class="form-control" placeholder="Break ends time">
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
					<button id="add_table" class="col-lg-12 col-xs-12 col-sm-12 btn btn-success" type="button">Add a table</button>
					</div>	
				</div>
			</div>
	</form>


<script src="<?php echo(JS.'outlets/outlet_edit_new.js'); ?>"></script>

