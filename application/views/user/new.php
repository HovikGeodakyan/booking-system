<section class="row m-b-md">
</section>


<div class="_edit">

	<form action="<?php echo(URL.'user/create/'); ?>" method="post" role="form" data-validate="parsley">
		
		<div style="float:right">
			<button type="submit" class="btn btn-primary">Create</button>
			<a href="<?php echo(URL.'user'); ?>" type="button" class="btn btn-default">Back</a>
		</div>
		<h3>Edit user information</h3>

		<div class="col-lg-6">

			<div class="form-group">
				<label for="inputName" class="control-label">Login</label>
				<input name="user_name" id="user_name" class="form-control" id="inputName" placeholder="Login" data-required="true" data-error-message="You must enter a username.">
			</div>			

			<div class="form-group">
				<label for="exampleInputEmail1">Real name</label>
				<input name="user_real_name" id="user_real_name" class="form-control" id="exampleInputEmail1" placeholder="User Name" data-required="true" data-error-message="You must enter the name of the user.">
			</div>

			<div class="form-group">
				<label for="exampleInputEmail1">Email</label>
				<input name="user_email" id="user_email" type="text" class="form-control" placeholder="Enter email" data-type="email" data-required="true" data-error-message="Enter a valid email, please.">
			</div>

			<div class="form-group">
				<label>Password</label>
				<input name="user_password" id="user_password" type="password" class="form-control" placeholder="Password" data-required="true" data-minlength="3" data-error-message="Enter a password (3 symbols at least), please.">
			</div>

			<div class="form-group">
				<label>Retype the password</label>
				<input name="user_re_password" id="user_re_password" type="password" class="form-control" placeholder="Retype the password" data-required="true" data-equalto="#user_password" data-error-message="Passwords must be exactly the same.">
			</div>

		</div>

		<div class="col-lg-6">

			<div class="form-group">
				<label>User role</label>
				<select name="user_role" class="form-control">
					<option value="1">SuperAdmin</option>
					<option value="2">Admin</option>
					<option value="3">Manager</option>
					<option value="4">Waiter</option>
					<option value="5">User</option>
					<option value="6">Guest</option>
				</select>
			</div>

			<div class="form-group">
				<label>User language</label>
				<select name="user_language" class="form-control">
					<option value="English">English</option>
					<option value="German">German</option>
				</select>
			</div>

			<label>Choose a picture for the user</label>
			<div class="form-group">
				<input name="user_pic" type="file" class="filestyle" data-icon="false" data-classbutton="btn btn-default" data-classinput="form-control inline v-middle input-s" id="filestyle-0" style="position: fixed; left: -500px;"><div class="bootstrap-filestyle" style="display: inline;"><input type="text" class="form-control inline v-middle input-s" disabled=""> <label for="filestyle-0" class="btn btn-default"><span>Choose file</span></label></div>
			</div>

			<div class="form-group">
				<label class="control-label">Is this user active?</label>
				<div>
					<label class="switch">
						<input name="user_if_active" type="checkbox" checked value="1">
						<span></span>
					</label>
				</div>
			</div>
		</div>
		
	</form>
</div>

<script src="<?php echo(JS.'theme/js/parsley/parsley.min.js'); ?>"></script>
<script src="<?php echo(JS.'theme/js/parsley/parsley.extend.js'); ?>"></script>