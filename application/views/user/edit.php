<section class="row m-b-md">
</section>


<div class="outlet_edit">

	<form role="form" action="<?php echo(URL.'user/update/'.$user['user_id']); ?>" method="post">
		
		<div style="float:right">
			<button type="submit" class="btn btn-primary">Submit</button>
			<a href="<?php echo(URL.'user'); ?>" type="button" class="btn btn-default">Back</a>
		</div>
		<h3>Edit user information</h3>

		<div class="col-lg-6">
			<div class="form-group">
				<label for="exampleInputEmail1">Login</label>
				<input name="user_name" class="form-control" id="exampleInputEmail1" placeholder="Outlet Name" value="<?php echo $user['user_name']; ?>">
			</div>			

			<div class="form-group">
				<label for="exampleInputEmail1">Real name</label>
				<input name="user_real_name" class="form-control" id="exampleInputEmail1" placeholder="Outlet Name" value="<?php echo $user['user_real_name']; ?>">
			</div>

			<div class="form-group">
				<label for="exampleInputEmail1">Email</label>
				<input name="user_email" type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" value="<?php echo $user['user_email']; ?>">
			</div>
			</div>
		<div class="col-lg-6">

			<div class="form-group">
				<label>User role</label>
				<select name="user_role" class="form-control">
					<option value="1" <?php if($user['user_role']==1){echo "selected";} ?>>SuperAdmin</option>
					<option value="2" <?php if($user['user_role']==2){echo "selected";} ?>>Admin</option>
					<option value="3" <?php if($user['user_role']==3){echo "selected";} ?>>Manager</option>
					<option value="4" <?php if($user['user_role']==4){echo "selected";} ?>>Waiter</option>
					<option value="5" <?php if($user['user_role']==5){echo "selected";} ?>>User</option>
					<option value="6" <?php if($user['user_role']==6){echo "selected";} ?>>Guest</option>
				</select>
			</div>

			<label>Choose a picture for the user</label>
			<div class="form-group">
				<input name="user_pic" type="file" class="filestyle" data-icon="false" data-classbutton="btn btn-default" data-classinput="form-control inline v-middle input-s" id="filestyle-0" style="position: fixed; left: -500px;"><div class="bootstrap-filestyle" style="display: inline;"><input type="text" class="form-control inline v-middle input-s" disabled=""> <label for="filestyle-0" class="btn btn-default"><span>Choose file</span></label></div>
			</div>

			<div class="form-group">
				<label>Is this user active?</label>
				<div>
					<label class="switch">
						<input name="user_if_active" type="checkbox" <?php if($user['user_if_active']==1){echo "checked";} ?> value="1">
						<span></span>
					</label>
				</div>
			</div>
		</div>
		
	</form>
</div>