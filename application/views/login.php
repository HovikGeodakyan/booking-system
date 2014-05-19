<html>
	<head>
		<title><?php echo $title; ?> | REDTable</title>
		<link rel="stylesheet" href="<?php echo(CSS.'theme/bootstrap.css'); ?>" type="text/css" />
		<link tpye="text/css" rel="stylesheet" href="<?php echo(CSS.'stylesheet.css'); ?>"/> 
	    <script src="<?php echo(JS.'lib/jquery.min.js'); ?>"></script>
	    <script src="<?php echo(JS.'lib/bootstrap.js'); ?>"></script> 
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
					<h4 class="modal-title"><?php echo _backend_login; ?></h4>
				</div>
				<div class="modal-body">
					<form id="loginForm" action="login/signin" method="post">
						<label><?php echo _login; ?></label><br><input class="form-control login_input" name="username"/>
						<br><br>
						<label><?php echo _password; ?></label><br><input type="password" class="form-control login_input" name="password"/>
					</form>
				</div>
				<div class="modal-footer login-modal-footer">
					
					<button id="loginButton" type="button" class="btn btn-default"><?php echo _log_me_in; ?></button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</body>
</html>