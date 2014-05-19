<html>
	<head>
		<title><?php echo $title; ?> | REDTable</title>
		<link rel="stylesheet" href="<?php echo(CSS.'theme/bootstrap.css'); ?>" type="text/css" />
		<link tpye="text/css" rel="stylesheet" href="<?php echo(CSS.'stylesheet.css'); ?>"/> 
	    <script src="<?php echo(JS.'lib/jquery.min.js'); ?>"></script>
	    <script src="<?php echo(JS.'lib/bootstrap.js'); ?>"></script> 
	    <!-- Theme Validation -->
	    <script src="<?php echo(JS.'lib/parsley.min.js'); ?>"></script>
	    <script src="<?php echo(JS.'lib/parsley.extend.js'); ?>"></script>
	    
		<script type="text/javascript">
			$(document).ready(function() {
				$("#loginButton").click(function() {
					$("#loginForm").submit();
				});
			});
		</script>
	</head>
	<body>
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header login-modal-header">
					<h4 class="modal-title"><?php echo _registration; ?></h4>
				</div>
				<div class="modal-body">
					<form action="<?php echo(URL.'register/create'); ?>" method="post" role="form" data-validate="parsley">
						<div class="col-lg-12">
							<div class="form-group">
								<label for="inputName" class="control-label"><?php echo _login; ?></label>
								<input name="username"  class="form-control" id="inputName" placeholder="<?php echo _login; ?>" data-required="true" data-error-message="You must enter a username.">
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1"><?php echo _name; ?></label>
								<input name="realname"  class="form-control"  placeholder="<?php echo _name; ?>" data-required="true" data-error-message="You must enter the name of the user.">
							</div>

							<div class="form-group">
								<label for="exampleInputEmail1"><?php echo _email; ?></label>
								<input name="email" type="text" class="form-control" placeholder="<?php echo _email; ?>" data-type="email" data-required="true" data-error-message="Enter a valid email, please.">
							</div>

							<div class="form-group">
								<label><?php echo _password; ?></label>
								<input name="password" type="password" id="user_password" class="form-control" placeholder="<?php echo _password; ?>" data-required="true" data-minlength="3" data-error-message="Enter a password (3 symbols at least), please.">
							</div>

							<div class="form-group">
								<label><?php echo _retype_password; ?></label>
								<input name="re_password"  type="password" class="form-control" placeholder="<?php echo _retype_password; ?>" data-required="true" data-equalto="#user_password" data-error-message="Passwords must be exactly the same.">
							</div>
							
							<div class="form-group">
								<label><?php echo _language; ?></label>
								<select name="language" class="form-control">
									<option value="en"><?php echo _english; ?></option>
									<option value="ge"><?php echo _german; ?></option>
								</select>
							</div>
						</div>
						<button  type="submit" class="btn btn-default"><?php echo _register; ?></button>
					</form>
				</div>
				
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
		
	</body>
</html>