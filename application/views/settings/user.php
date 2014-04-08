<section class="row m-b-md">
</section>


<div>
	<h3>Edit User Information</h3>
	<form role="form">
		<div class="form-group">
			<label for="exampleInputEmail1">Login</label>
			<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter login" value="<?php echo $user['user_name']; ?>">
		</div>
		<div class="form-group">
			<label for="exampleInputEmail1">Name</label>
			<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter name" value="<?php echo $user['user_real_name']; ?>">
		</div>

		<div class="form-group">
			<label for="exampleInputEmail1">Email address</label>
			<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" value="<?php echo $user['user_email']; ?>">
		</div>
		<div class="form-group">
			<label for="exampleInputPassword1">Password</label>
			<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
		</div>
		<div class="form-group">
			<label for="exampleInputPassword1">Retype Password</label>
			<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
		</div>		
		<div class="form-group">
			<label for="exampleInputPassword1">Type</label>
			<select class="form-control">
				<option>1</option>
				<option>2</option>
				<option>3</option>
				<option>4</option>
				<option>5</option>
			</select>
		</div>
		<div class="form-group">
			<label for="exampleInputFile">File input</label>
			<input type="file" id="exampleInputFile">
			<p class="help-block">Example block-level help text here.</p>
		</div>
		<button type="submit" class="btn btn-default">Submit</button>
	</form>
</div>