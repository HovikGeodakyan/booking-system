<html>
	<head>
		<title><?php echo $title; ?> | MyTable</title>
		<link rel="stylesheet" href="<?php echo(CSS.'bootstrap.css'); ?>"/>
		<link tpye="text/css" rel="stylesheet" href="<?php echo(CSS.'stylesheet.css'); ?>"/>
		<script src="<?php echo(JS.'jquery.js'); ?>"></script>
		<script src="<?php echo(JS.'bootstrap.min.js'); ?>"></script>
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
					<h4 class="modal-title">ADMIN BACKEND LOG IN</h4>
				</div>
				<div class="modal-body">
					<form id="loginForm" action="login/signin" method="post">
						<label>User</label><br><input class="form-control login_input" name="username"/>
						<br><br>
						<label>Password</label><br><input type="password" class="form-control login_input" name="password"/>
					</form>
				</div>
				<div class="modal-footer login-modal-footer">
					
					<button id="loginButton" type="button" class="btn btn-default">LOG ME IN</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</body>
</html>