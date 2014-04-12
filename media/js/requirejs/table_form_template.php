<div class="form-group" id="table-form-group">

	<div class="col-lg-2 form-group">
		<label for="table_standard_seats">Standard number of seats</label>
		<input name="table_standard_seats[]" id="table_standard_seats" type="number" class="form-control">
	</div>

	<div class="col-lg-2 form-group">
		<label for="table_max_seats">Maximum number of seats</label>
		<input name="table_max_seats[]" id="table_max_seats" type="number" class="form-control">
	</div>

	<div class="col-lg-2 form-group">
		<label class="control-label">Combinable</label>
		<div>
			<label class="switch">
				<input name="table_combinable[]" type="checkbox" value="1">
				<span></span>
			</label>
		</div>
	</div>

	<div class="col-lg-6 form-group">
		<label>Location</label>
		<select name="table_location[]" class="form-control">
			<option value="W">Window</option>
			<option value="M">Middle</option>
			<option value="B">Back</option>
		</select>
	</div>
</div>