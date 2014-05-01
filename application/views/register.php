<html>
	<head>
		<title><?php echo $title; ?> | MyTable</title>
		<link rel="stylesheet" href="<?php echo(CSS.'theme/bootstrap.css'); ?>" type="text/css" />
		<link tpye="text/css" rel="stylesheet" href="<?php echo(CSS.'stylesheet.css'); ?>"/> 
	    <script src="<?php echo(JS.'lib/jquery.min.js'); ?>"></script>
	    <script src="<?php echo(JS.'lib/bootstrap.js'); ?>"></script> 
		<script src="<?php echo(JS.'theme/js/parsley/parsley.min.js'); ?>"></script>
		<script src="<?php echo(JS.'theme/js/parsley/parsley.extend.js'); ?>"></script>
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
					<h4 class="modal-title">Registration</h4>
				</div>
				<div class="modal-body">
					<form action="<?php echo(URL.'register/create'); ?>" method="post" role="form" data-validate="parsley">
						<div class="col-lg-12">
							<div class="form-group">
								<label for="inputName" class="control-label">Login</label>
								<input name="username"  class="form-control" id="inputName" placeholder="Login" data-required="true" data-error-message="You must enter a username.">
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Real name</label>
								<input name="realname"  class="form-control"  placeholder="User Name" data-required="true" data-error-message="You must enter the name of the user.">
							</div>

							<div class="form-group">
								<label for="exampleInputEmail1">Email</label>
								<input name="email" type="text" class="form-control" placeholder="Enter email" data-type="email" data-required="true" data-error-message="Enter a valid email, please.">
							</div>

							<div class="form-group">
								<label>Password</label>
								<input name="password" type="password" class="form-control" placeholder="Password" data-required="true" data-minlength="3" data-error-message="Enter a password (3 symbols at least), please.">
							</div>

							<div class="form-group">
								<label>Retype the password</label>
								<input name="re_password"  type="password" class="form-control" placeholder="Retype the password" data-required="true" data-equalto="#user_password" data-error-message="Passwords must be exactly the same.">
							</div>
							
							<div class="form-group">
								<label>User language</label>
								<select name="language" class="form-control">
									<option value="English">English</option>
									<option value="German">German</option>
								</select>
							</div>
						</div>
						<button  type="submit" class="btn btn-default">Register</button>
					</form>
				</div>
				
					
					
				
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
		
	</body>
</html>