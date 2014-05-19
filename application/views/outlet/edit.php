<section class="row m-b-md">
</section>


<div class="_edit">

	<form role="form" action="<?php echo(URL.'outlet/update/'.$outlet['outlet_id']); ?>" method="post" data-validate="parsley">
		
		<div style="float:right">
			<button type="submit" class="btn btn-primary"><?php echo _submit; ?></button>
			<a href="<?php echo(URL.'outlet'); ?>" type="button" class="btn btn-default"><?php echo _back; ?></a>
		</div>

		<h3><?php echo _edit_outlet; ?></h3>

		<!-- first column -->
		<div class="col-lg-6">
			<div class="form-group">
				<label for="exampleInputEmail1"><?php echo _name; ?></label>
				<input name="outlet_name" class="form-control" placeholder="<?php echo _name; ?>" data-required="true" data-error-message="You must enter a name for the outlet." value="<?php echo $outlet['outlet_name']; ?>">
			</div>

			<div class="form-group">
				<label for="exampleInputEmail1"><?php echo _email; ?></label>
				<input name="outlet_email" type="text" class="form-control" placeholder="<?php echo _email; ?>" data-type="email" data-required="true" data-error-message="Enter a valid email, please." value="<?php echo $outlet['outlet_email']; ?>">
			</div>

			<div class="form-group">
				<label for="exampleInputEmail1"><?php echo _seats; ?></label>
				<input name="outlet_seats_number" type="number" class="form-control" placeholder="<?php echo _seats; ?>" data-type="digits" data-required="true" data-error-message="You must enter the number of seats." value="<?php echo $outlet['outlet_seats_number']; ?>">
			</div>

			<div class="form-group">
				<label for="exampleInputEmail1"><?php echo _tables; ?></label>
				<input name="outlet_tables_number" type="number" class="form-control" id="outlet_tables" placeholder="<?php echo _tables; ?>" data-type="number" data-required="true" data-error-message="You must enter the number of tables."  value="<?php echo $outlet['outlet_tables_number']; ?>">
			</div>	

			<div class="form-group">
				<h5><?php echo _default_not_bookable_number ?></h5>
				<div class="col-lg-2-4 form-group">
					<label><?php echo _lunch; ?></label>
					<input name="outlet_default_not_bookable_table_lunch" type="number" class="form-control"  value="<?php echo $outlet['outlet_default_not_bookable_table_lunch']; ?>">
				</div>				
				<div class="col-lg-2-4 form-group">
					<label><?php echo _dinner; ?></label>
					<input name="outlet_default_not_bookable_table_dinner" type="number" class="form-control" value="<?php echo $outlet['outlet_default_not_bookable_table_dinner']; ?>">
				</div>				
				<div class="col-lg-2-4 form-group">
					<label><?php echo _pre_concert; ?></label>
					<input name="outlet_default_not_bookable_table_pre_concert" type="number" class="form-control" value="<?php echo $outlet['outlet_default_not_bookable_table_pre_concert']; ?>">
				</div>				
				<div class="col-lg-2-4 form-group">
					<label ><?php echo _concert; ?></label>
					<input name="outlet_default_not_bookable_table_concert" type="number" class="form-control" value="<?php echo $outlet['outlet_default_not_bookable_table_concert']; ?>">
				</div>				
				<div class="col-lg-2-4 form-group">
					<label><?php echo _post_concert; ?></label>
					<input name="outlet_default_not_bookable_table_post_concert" type="number" class="form-control" value="<?php echo $outlet['outlet_default_not_bookable_table_post_concert']; ?>">
				</div>
			</div>

			<div class="form-group">
				<label for="exampleInputEmail1"><?php echo _description; ?></label>
				<textarea name="outlet_description" class="form-control" id="exampleInputEmail1" placeholder="Outlet description"><?php echo $outlet['outlet_description']; ?></textarea>
			</div>

		</div>

		<!-- second column -->
		<div class="col-lg-6">

			<div class="form-group">
				<label class="control-label"><?php echo _webform; ?></label>
				<div>
					<label class="switch">
						<input name="outlet_online_bookable" type="checkbox" value="1" <?php if($outlet['outlet_online_bookable']==1){echo "checked='checked'";} ?>>
						<span></span>
					</label>
				</div>
			</div>

			<div class="form-group">
				<label><?php echo _working_time; ?></label>
				<div class="controls form-inline">
					<label for="inputKey"></label>
					<input name="outlet_open_time" type="time" step="900" class="form-control" placeholder="Open time" data-required="true" value="<?php echo $outlet['outlet_open_time']; ?>">
					<label for="inputValue">-</label>
					<input name="outlet_close_time" type="time" step="900" class="form-control" placeholder="Close time" data-required="true" value="<?php echo $outlet['outlet_close_time']; ?>">
				</div>
			</div>		

			<div class="form-group">
				<label><?php echo _break_time; ?></label>
				<div class="controls form-inline">
					<label for="inputKey"></label>
					<input name="outlet_break_start_time" type="time" step="900" class="form-control" placeholder="Break starts time" value="<?php echo $outlet['outlet_break_start_time']; ?>">
					<label for="inputValue">-</label>
					<input name="outlet_break_end_time" type="time" step="900" class="form-control" placeholder="Break ends time" value="<?php echo $outlet['outlet_break_end_time']; ?>">
				</div>	
			</div>		

			<div class="form-group">
				<label><?php echo _day_off; ?></label>
				<select name="outlet_day_off" class="form-control">
					<option value="1" <?php if($outlet['outlet_day_off']==1){echo "selected='selected'";} ?>><?php echo _monday; ?></option>
					<option value="2" <?php if($outlet['outlet_day_off']==2){echo "selected='selected'";} ?>><?php echo _tuesday; ?></option>
					<option value="3" <?php if($outlet['outlet_day_off']==3){echo "selected='selected'";} ?>><?php echo _wednesday; ?></option>
					<option value="4" <?php if($outlet['outlet_day_off']==4){echo "selected='selected'";} ?>><?php echo _thursday; ?></option>
					<option value="5" <?php if($outlet['outlet_day_off']==5){echo "selected='selected'";} ?>><?php echo _friday; ?></option>
					<option value="6" <?php if($outlet['outlet_day_off']==6){echo "selected='selected'";} ?>><?php echo _saturday; ?></option>
					<option value="0" <?php if($outlet['outlet_day_off']==7){echo "selected='selected'";} ?>><?php echo _sunday; ?></option>
				</select>
			</div>

			<div class="form-group">
				<h5><?php echo _staying_time; ?></h5>
				<div class="col-lg-2-4 form-group">
					<label for="exampleInputEmail1"><?php echo _lunch; ?></label>
					<input name="outlet_staying_time_lunch" type="time" step="900" class="form-control" value="<?php echo $outlet['outlet_staying_time_lunch']; ?>">
				</div>				
				<div class="col-lg-2-4 form-group">
					<label for="exampleInputEmail1"><?php echo _dinner; ?></label>
					<input name="outlet_staying_time_dinner" type="time" step="900" class="form-control" value="<?php echo $outlet['outlet_staying_time_dinner']; ?>">
				</div>				
				<div class="col-lg-2-4 form-group">
					<label for="exampleInputEmail1"><?php echo _pre_concert; ?></label>
					<input name="outlet_staying_time_pre_concert" type="time" step="900" class="form-control" value="<?php echo $outlet['outlet_staying_time_pre_concert']; ?>">
				</div>				
				<div class="col-lg-2-4 form-group">
					<label for="exampleInputEmail1"><?php echo _concert; ?></label>
					<input name="outlet_staying_time_concert" type="time" step="900" class="form-control" value="<?php echo $outlet['outlet_staying_time_concert']; ?>">
				</div>				
				<div class="col-lg-2-4 form-group">
					<label for="exampleInputEmail1"><?php echo _post_concert; ?></label>
					<input name="outlet_staying_time_post_concert" type="time" step="900" class="form-control" value="<?php echo $outlet['outlet_staying_time_post_concert']; ?>">
				</div>
			</div>

			<div class="form-group">
				<label><?php echo _no_show_limit; ?></label>
				<input name="outlet_no_show_limit" type="number" class="form-control" placeholder="<?php echo _no_show_limit; ?>" data-type="digits" data-required="true" data-error-message="Required." value="<?php echo $outlet['outlet_no_show_limit']; ?>">
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
									<input name="outlet_open_time_1" type="time" step="900" class="form-control" placeholder="Open time" value="<?php echo $outlet['outlet_open_time_1']; ?>">
									<label for="inputValue">-</label>
									<input name="outlet_close_time_1" type="time" step="900" class="form-control" placeholder="Close time" value="<?php echo $outlet['outlet_close_time_1']; ?>">
								</div>
							</div>		

							<div class="form-group">
								<label><?php echo _break_time; ?></label>
								<div class="controls form-inline">
									<label for="inputKey"></label>
									<input name="outlet_break_start_time_1" type="time" step="900" class="form-control" placeholder="Break starts time" value="<?php echo $outlet['outlet_break_start_time_1']; ?>">
									<label for="inputValue">-</label>
									<input name="outlet_break_end_time_1" type="time" step="900" class="form-control" placeholder="Break ends time" value="<?php echo $outlet['outlet_break_end_time_1']; ?>">
								</div>	
							</div>		
						</div>	

						<div class="col-lg-3">
							<h4><?php echo _tuesday; ?></h4>
							<div class="form-group">
								<label><?php echo _working_time; ?></label>
								<div class="controls form-inline">
									<label for="inputKey"></label>
									<input name="outlet_open_time_2" type="time" step="900" class="form-control" placeholder="Open time" value="<?php echo $outlet['outlet_open_time_2']; ?>">
									<label for="inputValue">-</label>
									<input name="outlet_close_time_2" type="time" step="900" class="form-control" placeholder="Close time" value="<?php echo $outlet['outlet_close_time_2']; ?>">
								</div>
							</div>		

							<div class="form-group">
								<label><?php echo _break_time; ?></label>
								<div class="controls form-inline">
									<label for="inputKey"></label>
									<input name="outlet_break_start_time_2" type="time" step="900" class="form-control" placeholder="Break starts time" value="<?php echo $outlet['outlet_break_start_time_2']; ?>">
									<label for="inputValue">-</label>
									<input name="outlet_break_end_time_2" type="time" step="900" class="form-control" placeholder="Break ends time" value="<?php echo $outlet['outlet_break_end_time_2']; ?>">
								</div>	
							</div>		
						</div>		

						<div class="col-lg-3">
							<h4><?php echo _wednesday; ?></h4>
							<div class="form-group">
								<label><?php echo _working_time; ?></label>
								<div class="controls form-inline">
									<label for="inputKey"></label>
									<input name="outlet_open_time_3" type="time" step="900" class="form-control" placeholder="Open time" value="<?php echo $outlet['outlet_open_time_3']; ?>">
									<label for="inputValue">-</label>
									<input name="outlet_close_time_3" type="time" step="900" class="form-control" placeholder="Close time" value="<?php echo $outlet['outlet_close_time_3']; ?>">
								</div>
							</div>		

							<div class="form-group">
								<label><?php echo _break_time; ?></label>
								<div class="controls form-inline">
									<label for="inputKey"></label>
									<input name="outlet_break_start_time_3" type="time" step="900" class="form-control" placeholder="Break starts time" value="<?php echo $outlet['outlet_break_start_time_3']; ?>">
									<label for="inputValue">-</label>
									<input name="outlet_break_end_time_3" type="time" step="900" class="form-control" placeholder="Break ends time" value="<?php echo $outlet['outlet_break_end_time_3']; ?>">
								</div>	
							</div>		
						</div>		

						<div class="col-lg-3">
							<h4><?php echo _thursday; ?></h4>
							<div class="form-group">
								<label><?php echo _working_time; ?></label>
								<div class="controls form-inline">
									<label for="inputKey"></label>
									<input name="outlet_open_time_4" type="time" step="900" class="form-control" placeholder="Open time" value="<?php echo $outlet['outlet_open_time_4']; ?>">
									<label for="inputValue">-</label>
									<input name="outlet_close_time_4" type="time" step="900" class="form-control" placeholder="Close time" value="<?php echo $outlet['outlet_close_time_4']; ?>">
								</div>
							</div>		

							<div class="form-group">
								<label><?php echo _break_time; ?></label>
								<div class="controls form-inline">
									<label for="inputKey"></label>
									<input name="outlet_break_start_time_4" type="time" step="900" class="form-control" placeholder="Break starts time" value="<?php echo $outlet['outlet_break_start_time_4']; ?>">
									<label for="inputValue">-</label>
									<input name="outlet_break_end_time_4" type="time" step="900" class="form-control" placeholder="Break ends time" value="<?php echo $outlet['outlet_break_end_time_4']; ?>">
								</div>	
							</div>		
						</div>


						<div class="col-lg-3">
							<h4><?php echo _friday; ?></h4>
							<div class="form-group">
								<label><?php echo _working_time; ?></label>
								<div class="controls form-inline">
									<label for="inputKey"></label>
									<input name="outlet_open_time_5" type="time" step="900" class="form-control" placeholder="Open time" value="<?php echo $outlet['outlet_open_time_5']; ?>">
									<label for="inputValue">-</label>
									<input name="outlet_close_time_5" type="time" step="900" class="form-control" placeholder="Close time" value="<?php echo $outlet['outlet_close_time_5']; ?>">
								</div>
							</div>		

							<div class="form-group">
								<label><?php echo _break_time; ?></label>
								<div class="controls form-inline">
									<label for="inputKey"></label>
									<input name="outlet_break_start_time_5" type="time" step="900" class="form-control" placeholder="Break starts time" value="<?php echo $outlet['outlet_break_start_time_5']; ?>">
									<label for="inputValue">-</label>
									<input name="outlet_break_end_time_5" type="time" step="900" class="form-control" placeholder="Break ends time" value="<?php echo $outlet['outlet_break_end_time_5']; ?>">
								</div>	
							</div>		
						</div>	

						<div class="col-lg-3">
							<h4><?php echo _saturday; ?></h4>
							<div class="form-group">
								<label><?php echo _working_time; ?></label>
								<div class="controls form-inline">
									<label for="inputKey"></label>
									<input name="outlet_open_time_6" type="time" step="900" class="form-control" placeholder="Open time" value="<?php echo $outlet['outlet_open_time_6']; ?>">
									<label for="inputValue">-</label>
									<input name="outlet_close_time_6" type="time" step="900" class="form-control" placeholder="Close time" value="<?php echo $outlet['outlet_close_time_6']; ?>">
								</div>
							</div>		

							<div class="form-group">
								<label><?php echo _break_time; ?></label>
								<div class="controls form-inline">
									<label for="inputKey"></label>
									<input name="outlet_break_start_time_6" type="time" step="900" class="form-control" placeholder="Break starts time" value="<?php echo $outlet['outlet_break_start_time_6']; ?>">
									<label for="inputValue">-</label>
									<input name="outlet_break_end_time_6" type="time" step="900" class="form-control" placeholder="Break ends time" value="<?php echo $outlet['outlet_break_end_time_6']; ?>">
								</div>	
							</div>		
						</div>		

						<div class="col-lg-3">
							<h4><?php echo _sunday; ?></h4>
							<div class="form-group">
								<label><?php echo _working_time; ?></label>
								<div class="controls form-inline">
									<label for="inputKey"></label>
									<input name="outlet_open_time_0" type="time" step="900" class="form-control" placeholder="Open time" value="<?php echo $outlet['outlet_open_time_0']; ?>">
									<label for="inputValue">-</label>
									<input name="outlet_close_time_0" type="time" step="900" class="form-control" placeholder="Close time" value="<?php echo $outlet['outlet_close_time_0']; ?>">
								</div>
							</div>		

							<div class="form-group">
								<label><?php echo _break_time; ?></label>
								<div class="controls form-inline">
									<label for="inputKey"></label>
									<input name="outlet_break_start_time_0" type="time" step="900" class="form-control" placeholder="Break starts time" value="<?php echo $outlet['outlet_break_start_time_0']; ?>">
									<label for="inputValue">-</label>
									<input name="outlet_break_end_time_0" type="time" step="900" class="form-control" placeholder="Break ends time" value="<?php echo $outlet['outlet_break_end_time_0']; ?>">
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

						<div class="settings_content table-responsive">
							<h4><?php echo _system." "._holidays; ?></h4>
							<table class="table table-striped b-t b-light" id="tableEdit">
								<thead>
									<tr>
										<th class="th-sortable" data-toggle="class" width="30">#</th>						
										<th class="th-sortable" data-toggle="class"><?php echo _name; ?></th>
										<th class="th-sortable" data-toggle="class"><?php echo _start; ?></th>					
										<th class="th-sortable" data-toggle="class"><?php echo _end; ?></th>						
										<th class="th-sortable" data-toggle="class"><?php echo _message; ?></th>
									</tr>
				                    </thead>
				                    <tbody>
				                    <?php 
										$i=1;
										foreach($general_holidays as $hol) {							
											echo "<tr>";
											echo "<td>".$i."</td>"; $i++;
											echo "<td style='display:none' ref='type:number, name:id, class:form-control, id:idId'>".$hol['id']."</td>";
											echo "<td ref='type:text, name:name, class:form-control, id:nameId'>".$hol['name']."</td>";
											echo "<td ref='type:date, name:start, class:form-control, id:startId'>".$hol['start']."</td>";
											echo "<td ref='type:date, name:end, class:form-control, id:endId'>".$hol['end']."</td>";
											echo "<td ref='type:text, name:message, class:form-control, id:messageId'>".$hol['message']."</td>";
											echo "</tr>";
										}
									?>
								</tbody>
							</table>
							
						</div>

					<h4><?php echo _outlets." "._holidays; ?></h4>
					<?php foreach ($holiday as $hol) { ?>
						<div class="col-lg-12 col-xs-12 col-sm-12 form-group">
							<input name="holiday_id[]" type="hidden" id="holiday_id"  class="form-control" value="<?php echo $hol['holiday_id']; ?>">
							<div class="col-lg-2 col-xs-4 col-sm-4 form-group">
								<label for="holiday_name"><?php echo _name; ?></label>
								<input name="holiday_name[]"  type="text" class="form-control" value="<?php echo $hol['holiday_name']; ?>">
							</div>				
							<div class="col-lg-2 col-xs-4 col-sm-4 form-group">
								<label for="holiday_start"><?php echo _start; ?></label>
								<input name="holiday_start[]" class="form-control holiday_start" value="<?php echo $hol['holiday_start']; ?>">
							</div>				
							<div class="col-lg-2 col-xs-4 col-sm-4 form-group">
								<label for="holiday_end"><?php echo _end; ?></label>
								<input name="holiday_end[]" class="holiday_end form-control" value="<?php echo $hol['holiday_end']; ?>">
							</div>				
							<div class="col-lg-4 col-xs-8 col-sm-8 form-group">
								<label for="holiday_message"><?php echo _message; ?></label> 
								<input name="holiday_message[]" type="text" class="form-control" value="<?php echo $hol['holiday_message']; ?>">
							</div>	

							<div class="col-lg-2 col-xs-4 col-sm-4 form-group">
								<label class="control-label"><?php echo _delete; ?></label><br>
								<a href="<?php echo URL; ?>holiday/delete/<?php echo $hol['holiday_id']; ?>" class="confirm"><button class="btn btn-danger" type="button"><i class="fa fa-minus"></i></button></a>
							
							</div>			
						</div>
					<?php } ?>
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

					<?php foreach ($table as $tbl) { ?>

						<div class="form-group table_box col-lg-12 col-xs-12 col-sm-12">
							<input type="hidden" name="table_id[]" value="<?php echo $tbl['table_id']; ?>" />
							
							<div class="col-lg-1 col-xs-2 col-sm-2 form-group">
								<label for="table_standard_seats"><?php echo _number; ?></label>
								<div class="input-group">
									<span class="input-group-addon">T</span>
									<input type="text" name="table_name[]" class="form-control" style="width:35px" value="<?php echo $tbl['table_name']; ?>">
								</div>
							</div>

							<div class="col-lg-2 col-xs-4 col-sm-4 form-group">
								<label for="table_standard_seats"><?php echo _standart_seat_number; ?></label>
								<input name="table_seats_standart_number[]" type="number" class="form-control" value="<?php echo $tbl['table_seats_standart_number']; ?>">
							</div>

							<div class="col-lg-2 col-xs-4 col-sm-4 form-group">
								<label for="table_max_seats"><?php echo _maximum_seat_number; ?></label>
								<input name="table_seats_max_number[]" type="number" class="form-control" value="<?php echo $tbl['table_seats_max_number']; ?>">
							</div>

							<div class="col-lg-1 col-xs-2 col-sm-2 form-group">
								<label class="control-label"><?php echo _combinable; ?></label>
								<div>
									<label class="switch">
										<input name="table_combinable[]" type="checkbox" value="1" <?php if($tbl['table_combinable']==1){echo "checked='checked'";} ?>>
										<span></span>
									</label>
								</div>
							</div>

							<div class="col-lg-4 col-xs-8 col-sm-8 form-group">
								<label><?php echo _location; ?></label>
								<select name="table_location[]" class="form-control">
									<option value="1" <?php if($tbl['table_location']==1){echo "selected='selected'";} ?>><?php echo _window; ?></option>
									<option value="2" <?php if($tbl['table_location']==2){echo "selected='selected'";} ?>><?php echo _middle; ?></option>
									<option value="3" <?php if($tbl['table_location']==3){echo "selected='selected'";} ?>><?php echo _back; ?></option>
								</select>
							</div>

							<div class="col-lg-2 col-xs-4 col-sm-4 form-group">
								<label class="control-label"><?php echo _remove; ?></label><br>
								<a href="<?php echo URL; ?>outlet/remove_table/<?php echo $tbl['table_id']; ?>" class="confirm"><button class="btn btn-danger" type="button"><i class="fa fa-minus"></i></button></a>
							</div>
						</div>
						
					<?php } ?>

					<button id="add_table" class="col-lg-12 col-xs-12 col-sm-12 btn btn-success" type="button"><?php echo _add_table; ?></button>
					</div>	
			</div>

	</form>
</div>


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

