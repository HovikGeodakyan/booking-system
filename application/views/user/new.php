<section class="row m-b-md">
</section>


<div class="_edit">

	<form action="<?php echo(URL.'user/create/'); ?>" method="post" role="form" data-validate="parsley">
		
		<div style="float:right">
			<button type="submit" class="btn btn-primary"><?php echo _create ?></button>
			<a href="<?php echo(URL.'user'); ?>" type="button" class="btn btn-default"><?php echo _back ?></a>
		</div>
		<h3><?php echo _add_new_user ?></h3>

		<div class="col-lg-6">

			<div class="form-group">
				<label for="inputName" class="control-label"><?php echo _login ?></label>
				<input name="user_name" id="user_name" class="form-control" id="inputName" placeholder="<?php echo _login ?>" data-required="true" data-error-message="You must enter a username.">
			</div>			

			<div class="form-group">
				<label for="exampleInputEmail1"><?php echo _name ?></label>
				<input name="user_real_name" id="user_real_name" class="form-control" id="exampleInputEmail1" placeholder="<?php echo _name ?>" data-required="true" data-error-message="You must enter the name of the user.">
			</div>

			<div class="form-group">
				<label for="exampleInputEmail1"><?php echo _email ?></label>
				<input name="user_email" id="user_email" type="text" class="form-control" placeholder="<?php echo _email ?>" data-type="email" data-required="true" data-error-message="Enter a valid email, please.">
			</div>

			<div class="form-group">
				<label><?php echo _password ?></label>
				<input name="user_password" id="user_password" type="password" class="form-control" placeholder="<?php echo _password ?>" data-required="true" data-minlength="3" data-error-message="Enter a password (3 symbols at least), please.">
			</div>

			<div class="form-group">
				<label><?php echo _retype_password ?></label>
				<input name="user_re_password" id="user_re_password" type="password" class="form-control" placeholder="<?php echo _retype_password ?>" data-required="true" data-equalto="#user_password" data-error-message="Passwords must be exactly the same.">
			</div>

		</div>

		<div class="col-lg-6">

			<div class="form-group">
				<label><?php echo _role ?></label>
				<select name="user_role" class="form-control">
					<option value="1"><?php echo _superadmin ?></option>
					<option value="2"><?php echo _admin ?></option>
					<option value="3"><?php echo _manager ?></option>
					<option value="4"><?php echo _waiter ?></option>
					<option value="5"><?php echo _user ?></option>
					<option value="6"><?php echo _guest ?></option>
				</select>
			</div>

			<div class="form-group">
				<label><?php echo _language ?></label>
				<select name="user_language" class="form-control">
					<option value="en"><?php echo _english ?></option>
					<option value="ge"><?php echo _german ?></option>
				</select>
			</div>

			<div class="form-group">
				<label class="control-label"><?php echo _if_active ?></label>
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