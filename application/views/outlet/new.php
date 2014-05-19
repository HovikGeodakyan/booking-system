<div class="_edit">

	<form role="form" action="<?php echo(URL.'outlet/create/'); ?>" method="post" data-validate="parsley">
		
		<div style="float:right">
			<button type="submit" class="btn btn-primary">Create</button>
			<a href="<?php echo(URL.'outlet'); ?>" type="button" class="btn btn-default">Back</a>
		</div>

		<h3><?php echo _create_outlet; ?></h3>

		<!-- first column -->
		<div class="col-lg-6">
			<div class="form-group">
				<label for="exampleInputEmail1"><?php echo _name; ?></label>
				<input name="outlet_name" class="form-control" placeholder="<?php echo _name; ?>" data-required="true" data-error-message="You must enter a name for the outlet.">
			</div>

			<div class="form-group">
				<label for="exampleInputEmail1"><?php echo _email; ?></label>
				<input name="outlet_email" type="text" class="form-control"  placeholder="<?php echo _email; ?>" data-type="email" data-required="true" data-error-message="Enter a valid email, please.">
			</div>

			<div class="form-group">
				<label for="exampleInputEmail1"><?php echo _seats; ?></label>
				<input name="outlet_seats_number" type="number" class="form-control" placeholder="<?php echo _seats; ?>" data-type="digits" data-required="true" data-error-message="You must enter the number of seats.">
			</div>

			<div class="form-group">
				<label for="exampleInputEmail1"><?php echo _tables; ?></label>
				<input name="outlet_tables_number" type="number" class="form-control" id="outlet_tables" placeholder="<?php echo _tables; ?>" data-type="number" data-required="true" data-error-message="You must enter the number of tables.">
			</div>	

			<div class="form-group">
				<h5><?php echo _default_not_bookable_number ?></h5>
				<div class="col-lg-2-4 form-group">
					<label for="exampleInputEmail1"><?php echo _lunch; ?></label>
					<input name="outlet_default_not_bookable_table_lunch" type="number" class="form-control">
				</div>				
				<div class="col-lg-2-4 form-group">
					<label for="exampleInputEmail1"><?php echo _dinner; ?></label>
					<input name="outlet_default_not_bookable_table_dinner" type="number" class="form-control">
				</div>				
				<div class="col-lg-2-4 form-group">
					<label for="exampleInputEmail1"><?php echo _pre_concert; ?></label>
					<input name="outlet_default_not_bookable_table_pre_concert" type="number" class="form-control">
				</div>				
				<div class="col-lg-2-4 form-group">
					<label for="exampleInputEmail1"><?php echo _concert; ?></label>
					<input name="outlet_default_not_bookable_table_concert" type="number" class="form-control">
				</div>				
				<div class="col-lg-2-4 form-group">
					<label for="exampleInputEmail1"><?php echo _post_concert; ?></label>
					<input name="outlet_default_not_bookable_table_post_concert" type="number" class="form-control">
				</div>
			</div>

			<div class="form-group">
				<label for="exampleInputEmail1"><?php echo _description; ?></label>
				<textarea name="outlet_description" class="form-control" id="exampleInputEmail1" placeholder="Outlet description"></textarea>
			</div>

		</div>

		<!-- second column -->
		<div class="col-lg-6">

			<div class="form-group">
				<label class="control-label"><?php echo _webform; ?></label>
				<div>
					<label class="switch">
						<input name="outlet_online_bookable" type="checkbox" checked="checked" value="1">
						<span></span>
					</label>
				</div>
			</div>

			<div class="form-group">
				<label><?php echo _working_time; ?></label>
				<div class="controls form-inline">
					<label for="inputKey"></label>
					<input name="outlet_open_time" type="time" step="900" class="form-control" placeholder="Open time" data-required="true">
					<label for="inputValue">-</label>
					<input name="outlet_close_time" type="time" step="900" class="form-control" placeholder="Close time" data-required="true">
				</div>
			</div>		

			<div class="form-group">
				<label><?php echo _break_time; ?></label>
				<div class="controls form-inline">
					<label for="inputKey"></label>
					<input name="outlet_break_start_time" type="time" step="900" class="form-control" placeholder="Break starts time">
					<label for="inputValue">-</label>
					<input name="outlet_break_end_time" type="time" step="900" class="form-control" placeholder="Break ends time">
				</div>	
			</div>		

			<div class="form-group">
				<label><?php echo _day_off; ?></label>
				<select name="outlet_day_off" class="form-control">
					<option value="1"><?php echo _monday; ?></option>
					<option value="2"><?php echo _tuesday; ?></option>
					<option value="3"><?php echo _wednesday; ?></option>
					<option value="4"><?php echo _thursday; ?></option>
					<option value="5"><?php echo _friday; ?></option>
					<option value="6"><?php echo _saturday; ?></option>
					<option value="0"><?php echo _sunday; ?></option>
				</select>
			</div>

			<div class="form-group">
				<h5><?php echo _staying_time; ?></h5>
				<div class="col-lg-2-4 form-group">
					<label for="exampleInputEmail1"><?php echo _lunch; ?></label>
					<input name="outlet_staying_time_lunch" type="time" step="900" class="form-control">
				</div>				
				<div class="col-lg-2-4 form-group">
					<label for="exampleInputEmail1"><?php echo _dinner; ?></label>
					<input name="outlet_staying_time_dinner" type="time" step="900" class="form-control">
				</div>				
				<div class="col-lg-2-4 form-group">
					<label for="exampleInputEmail1"><?php echo _pre_concert; ?></label>
					<input name="outlet_staying_time_pre_concert" type="time" step="900" class="form-control">
				</div>				
				<div class="col-lg-2-4 form-group">
					<label for="exampleInputEmail1"><?php echo _concert; ?></label>
					<input name="outlet_staying_time_concert" type="time" step="900" class="form-control">
				</div>				
				<div class="col-lg-2-4 form-group">
					<label for="exampleInputEmail1"><?php echo _post_concert; ?></label>
					<input name="outlet_staying_time_post_concert" type="time" step="900" class="form-control">
				</div>
			</div>

			<div class="form-group">
				<label><?php echo _no_show_limit; ?></label>
				<input name="outlet_no_show_limit" type="number" class="form-control" placeholder="Time limit" data-type="digits" data-required="true" data-error-message="Required.">
			</div>	
		</div>

		<!-- Additional settings accordeon -->

		<h3 class="col-lg-12"><?php echo _additional_settings; ?></h3>
		<div class="col-lg-12 panel-group" id="accordion">

			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
							<h4><?php echo _working_time_per_day; ?></h4>
						</a>
					</h4>
				</div>
				<div id="collapseOne" class="panel-collapse collapse">
					<div class="panel-body">

						<div class="col-lg-3">
							<h4><?php echo _monday; ?></h4>
							<div class="form-group">
								<label><?php echo _working_time; ?></label>
								<div class="controls form-inline">
									<label for="inputKey"></label>
									<input name="outlet_open_time_1" type="time" step="900" class="form-control" placeholder="Open time">
									<label for="inputValue">-</label>
									<input name="outlet_close_time_1" type="time" step="900" class="form-control" placeholder="Close time">
								</div>
							</div>		

							<div class="form-group">
								<label><?php echo _break_time; ?></label>
								<div class="controls form-inline">
									<label for="inputKey"></label>
									<input name="outlet_break_start_time_1" type="time" step="900" class="form-control" placeholder="Break starts time">
									<label for="inputValue">-</label>
									<input name="outlet_break_end_time_1" type="time" step="900" class="form-control" placeholder="Break ends time">
								</div>	
							</div>		
						</div>	

						<div class="col-lg-3">
							<h4><?php echo _tuesday; ?></h4>
							<div class="form-group">
								<label><?php echo _working_time; ?></label>
								<div class="controls form-inline">
									<label for="inputKey"></label>
									<input name="outlet_open_time_2" type="time" step="900" class="form-control" placeholder="Open time">
									<label for="inputValue">-</label>
									<input name="outlet_close_time_2" type="time" step="900" class="form-control" placeholder="Close time">
								</div>
							</div>		

							<div class="form-group">
								<label><?php echo _break_time; ?></label>
								<div class="controls form-inline">
									<label for="inputKey"></label>
									<input name="outlet_break_start_time_2" type="time" step="900" class="form-control" placeholder="Break starts time">
									<label for="inputValue">-</label>
									<input name="outlet_break_end_time_2" type="time" step="900" class="form-control" placeholder="Break ends time">
								</div>	
							</div>		
						</div>		

						<div class="col-lg-3">
							<h4><?php echo _wednesday; ?></h4>
							<div class="form-group">
								<label><?php echo _working_time; ?></label>
								<div class="controls form-inline">
									<label for="inputKey"></label>
									<input name="outlet_open_time_3" type="time" step="900" class="form-control" placeholder="Open time">
									<label for="inputValue">-</label>
									<input name="outlet_close_time_3" type="time" step="900" class="form-control" placeholder="Close time">
								</div>
							</div>		

							<div class="form-group">
								<label><?php echo _break_time; ?></label>
								<div class="controls form-inline">
									<label for="inputKey"></label>
									<input name="outlet_break_start_time_3" type="time" step="900" class="form-control" placeholder="Break starts time">
									<label for="inputValue">-</label>
									<input name="outlet_break_end_time_3" type="time" step="900" class="form-control" placeholder="Break ends time">
								</div>	
							</div>		
						</div>		

						<div class="col-lg-3">
							<h4><?php echo _thursday; ?></h4>
							<div class="form-group">
								<label><?php echo _working_time; ?></label>
								<div class="controls form-inline">
									<label for="inputKey"></label>
									<input name="outlet_open_time_4" type="time" step="900" class="form-control" placeholder="Open time">
									<label for="inputValue">-</label>
									<input name="outlet_close_time_4" type="time" step="900" class="form-control" placeholder="Close time">
								</div>
							</div>		

							<div class="form-group">
								<label><?php echo _break_time; ?></label>
								<div class="controls form-inline">
									<label for="inputKey"></label>
									<input name="outlet_break_start_time_4" type="time" step="900" class="form-control" placeholder="Break starts time">
									<label for="inputValue">-</label>
									<input name="outlet_break_end_time_4" type="time" step="900" class="form-control" placeholder="Break ends time">
								</div>	
							</div>		
						</div>


						<div class="col-lg-3">
							<h4><?php echo _friday; ?></h4>
							<div class="form-group">
								<label><?php echo _working_time; ?></label>
								<div class="controls form-inline">
									<label for="inputKey"></label>
									<input name="outlet_open_time_5" type="time" step="900" class="form-control" placeholder="Open time">
									<label for="inputValue">-</label>
									<input name="outlet_close_time_5" type="time" step="900" class="form-control" placeholder="Close time">
								</div>
							</div>		

							<div class="form-group">
								<label><?php echo _break_time; ?></label>
								<div class="controls form-inline">
									<label for="inputKey"></label>
									<input name="outlet_break_start_time_5" type="time" step="900" class="form-control" placeholder="Break starts time">
									<label for="inputValue">-</label>
									<input name="outlet_break_end_time_5" type="time" step="900" class="form-control" placeholder="Break ends time">
								</div>	
							</div>		
						</div>	

						<div class="col-lg-3">
							<h4><?php echo _saturday; ?></h4>
							<div class="form-group">
								<label><?php echo _working_time; ?></label>
								<div class="controls form-inline">
									<label for="inputKey"></label>
									<input name="outlet_open_time_6" type="time" step="900" class="form-control" placeholder="Open time">
									<label for="inputValue">-</label>
									<input name="outlet_close_time_6" type="time" step="900" class="form-control" placeholder="Close time">
								</div>
							</div>		

							<div class="form-group">
								<label><?php echo _break_time; ?></label>
								<div class="controls form-inline">
									<label for="inputKey"></label>
									<input name="outlet_break_start_time_6" type="time" step="900" class="form-control" placeholder="Break starts time">
									<label for="inputValue">-</label>
									<input name="outlet_break_end_time_6" type="time" step="900" class="form-control" placeholder="Break ends time">
								</div>	
							</div>		
						</div>		

						<div class="col-lg-3">
							<h4><?php echo _sunday; ?></h4>
							<div class="form-group">
								<label><?php echo _working_time; ?></label>
								<div class="controls form-inline">
									<label for="inputKey"></label>
									<input name="outlet_open_time_0" type="time" step="900" class="form-control" placeholder="Open time">
									<label for="inputValue">-</label>
									<input name="outlet_close_time_0" type="time" step="900" class="form-control" placeholder="Close time">
								</div>
							</div>		

							<div class="form-group">
								<label><?php echo _break_time; ?></label>
								<div class="controls form-inline">
									<label for="inputKey"></label>
									<input name="outlet_break_start_time_0" type="time" step="900" class="form-control" placeholder="Break starts time">
									<label for="inputValue">-</label>
									<input name="outlet_break_end_time_0" type="time" step="900" class="form-control" placeholder="Break ends time">
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
							<h4><?php echo _holidays; ?></h4>
						</a>
					</h4>
				</div>
				<div id="collapseTwo" class="panel-collapse collapse">
					<div class="panel-body" id="holiday-container">						
						<button id="add_holiday" class="col-lg-12 col-xs-12 col-sm-12 btn btn-success" type="button"><?php echo _add_holiday; ?></button>

					</div>
				</div>	
			</div>

			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
							<h4><?php echo _tables; ?></h4>
						</a>
					</h4>
				</div>
				<div id="collapseThree" class="panel-collapse collapse">
					<div class="panel-body" id="table-container">
					<button id="add_table" class="col-lg-12 col-xs-12 col-sm-12 btn btn-success" type="button"><?php echo _add_table; ?></button>
					</div>	
				</div>
			</div>
	</form>

<script>
	var holiday = '';
	holiday += '<div class="col-lg-12 col-xs-12 col-sm-12 form-group">';
		holiday += '<input name="holiday_id[]" type="hidden" />';
		holiday += '<div class="col-lg-2 col-xs-4 col-sm-4 form-group">';
			holiday += '<label for="holiday_name"><?php echo _name; ?></label>';
			holiday += '<input name="holiday_name[]" type="text" class="form-control">';
		holiday += '</div>';
		holiday += '<div class="col-lg-2 col-xs-4 col-sm-4 form-group">';
			holiday += '<label for="holiday_start"><?php echo _start; ?></label>';
			holiday += '<input name="holiday_start[]" class="form-control holiday_start">';
		holiday += '</div>';
		holiday += '<div class="col-lg-2 col-xs-4 col-sm-4 form-group">';
			holiday += '<label for="holiday"><?php echo _end; ?></label>';
			holiday += '<input name="holiday_end[]" class="form-control holiday_end">';
		holiday += '</div>';
		holiday += '<div class="col-lg-4 col-xs-8 col-sm-8 form-group">';
			holiday += '<label for="holiday_message"><?php echo _message; ?></label>';
			holiday += '<input name="holiday_message[]" type="text" class="form-control">';
		holiday += '</div>';
		holiday += '<div class="col-lg-2 col-xs-4 col-sm-4 form-group">';
			holiday += '<label class="control-label"><?php echo _delete; ?></label>';
			holiday += '<br><button class="remove_holiday btn btn-danger" type="button"><i class="fa fa-minus"></i></button>';
		holiday += '</div>';
	holiday += '</div>';

	var table = '';
	table += '<div class="form-group table_box col-lg-12 col-xs-12 col-sm-12">';
		table += '<input type="hidden" name="table_id[]" />';
		table += '<div class="col-lg-1 col-xs-2 col-sm-2 form-group">';
			table += '<label for="table_standard_seats"><?php echo _number; ?></label>';
			table += '<div class="input-group">';
				table += '<span class="input-group-addon">T</span>';
				table += '<input type="text" name="table_name[]" class="form-control" style="width:35px">';
			table += '</div>';
		table += '</div>';
		table += '<div class="col-lg-2 col-xs-4 col-sm-4 form-group">'
			table += '<label for="table_standard_seats"><?php echo _standart_seat_number; ?></label>';
			table += '<input name="table_seats_standart_number[]" id="table_standard_seats" type="number" class="form-control">';
		table += '</div>';
		table += '<div class="col-lg-2 col-xs-4 col-sm-4 form-group">';
			table += '<label for="table_max_seats"><?php echo _maximum_seat_number; ?></label>';
			table += '<input name="table_seats_max_number[]" id="table_max_seats" type="number" class="form-control">';
		table += '</div>';
		table += '<div class="col-lg-1 col-xs-2 col-sm-2 form-group">';
			table += '<label class="control-label"><?php echo _combinable; ?></label>';
			table += '<div>';
				table += '<label class="switch"><input name="table_combinable[]" type="checkbox" checked="checked" value="1">';
					table += '<span></span>';
				table += '</label>';
			table += '</div>';
		table += '</div>';
		table += '<div class="col-lg-4 col-xs-8 col-sm-8 form-group">';
			table += '<label><?php echo _location; ?></label>';
			table += '<select name="table_location[]" class="form-control">';
				table += '<option value="1"><?php echo _window; ?></option>';
				table += '<option value="2"><?php echo _middle; ?></option>';
				table += '<option value="3"><?php echo _back; ?></option>';
			table += '</select>';
		table += '</div>';
		table += '<div class="col-lg-2 col-xs-4 col-sm-4 form-group">';
			table += '<label class="control-label"><?php echo _remove; ?></label>';
			table += '<br><button class="btn btn-danger remove_table" type="button"><i class="fa fa-minus"></i></button>';
		table += '</div>';
	table += '</div>';

</script>
<script src="<?php echo(JS.'outlets/outlet_edit_new.js'); ?>"></script>

