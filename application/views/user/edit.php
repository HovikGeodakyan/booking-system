<section class="row m-b-md">
</section>


<div class="_edit">

	<form role="form" action="<?php echo(URL.'user/update/'.$user['user_id']); ?>" method="post" data-validate="parsley">
		
		<div style="float:right">
			<button type="submit" class="btn btn-primary" id="user_form_submit"><?php echo _submit ?></button>
			<a href="<?php echo(URL.'user'); ?>" type="button" class="btn btn-default"><?php echo _back ?></a>
		</div>
		<h3><?php echo _edit_user ?></h3>

		<div class="col-lg-6">
			<div class="form-group">
				<label for="exampleInputEmail1"><?php echo _login ?></label>
				<input name="username" id="user_name" class="form-control" placeholder="<?php echo _login ?>" value="<?php echo $user['user_name']; ?>" data-required="true" data-error-message="You must enter a username.">
			</div>			

			<div class="form-group">
				<label for="exampleInputEmail1"><?php echo _name ?></label>
				<input name="realname" id="user_real_name" class="form-control" placeholder="<?php echo _name ?>" value="<?php echo $user['user_real_name']; ?>" data-required="true" data-error-message="You must enter the name of the user.">
			</div>

			<div class="form-group">
				<label for="exampleInputEmail1"><?php echo _email ?></label>
				<input name="email" id="user_email" type="email" class="form-control" placeholder="<?php echo _email ?>" value="<?php echo $user['user_email']; ?>" data-type="email" data-required="true" data-error-message="Enter a valid email, please.">
			</div>

			<div class="form-group">
				<label><?php echo _password ?></label>
				<input name="password" id="user_password" type="password" class="form-control" placeholder="<?php echo _password ?>" data-required="true" data-minlength="3" data-error-message="Enter a password (3 symbols at least), please.">
			</div>

			<div class="form-group">
				<label><?php echo _retype_password ?></label>
				<input name="re_password" id="user_re_password" type="password" class="form-control" placeholder="<?php echo _retype_password ?>" data-required="true" data-equalto="#user_password" data-error-message="Passwords must be exactly the same.">
			</div>

		</div>

		<div class="col-lg-6">

			<div class="form-group">
				<label><?php echo _role ?></label>
				<select name="role" class="form-control">
					<option value="1" <?php if($user['user_role']==1){echo "selected";} ?>><?php echo _superadmin ?></option>
					<option value="2" <?php if($user['user_role']==2){echo "selected";} ?>><?php echo _admin ?></option>
					<option value="3" <?php if($user['user_role']==3){echo "selected";} ?>><?php echo _manager ?></option>
					<option value="4" <?php if($user['user_role']==4){echo "selected";} ?>><?php echo _waiter ?></option>
					<option value="5" <?php if($user['user_role']==5){echo "selected";} ?>><?php echo _user ?></option>
					<option value="6" <?php if($user['user_role']==6){echo "selected";} ?>><?php echo _guest ?></option>
				</select>
			</div>

			<div class="form-group">
				<label><?php echo _language ?></label>
				<select name="language" class="form-control">
					<option value="en" <?php if($user['user_language']=="en"){echo "selected";} ?>><?php echo _english ?></option>
					<option value="ge" <?php if($user['user_language']=="ge"){echo "selected";} ?>><?php echo _german ?></option>
				</select>
			</div>

			<div class="form-group">
				<label><?php echo _if_active ?></label>
				<div>
					<label class="switch">
						<input name="active" type="checkbox" <?php if($user['user_if_active']==1){echo "checked";} ?> value="1">
						<span></span>
					</label>
				</div>
			</div>
		</div>
		
	</form>
</div>


<script src="<?php echo(JS.'theme/js/parsley/parsley.min.js'); ?>"></script>
<script src="<?php echo(JS.'theme/js/parsley/parsley.extend.js'); ?>"></script>