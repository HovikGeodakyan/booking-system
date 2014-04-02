<html>
	<head>
		<title><?php echo $title; ?> | MyTable</title>
		<link rel="stylesheet" href="<?php echo(CSS.'bootstrap.css'); ?>"/>
		<link rel="stylesheet" href="<?php echo(CSS.'app.css'); ?>"/>
		<link rel="stylesheet" href="<?php echo(JS.'datepicker/datepicker.css'); ?>"/>
		<link tpye="text/css" rel="stylesheet" href="<?php echo(CSS.'stylesheet.css'); ?>"/>
		<script src="<?php echo(JS.'jquery.js'); ?>"></script>
		<script src="<?php echo(JS.'bootstrap.min.js'); ?>"></script>
		<script src="<?php echo(JS.'datepicker/bootstrap-datepicker.js'); ?>"></script>
		<script>
			$(function(){
				$('#datepicker').datepicker()
			})
		</script>
	</head>
	<body>
		<nav class="navbar navbar-default bg-white header header-md navbar navbar-fixed-top-xs box-shadow" role="navigation">
			<div class="container-fluid">
				<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<div class="navbar-brand navbar-brand-custom">
					<form class="navbar-form" role="search">
						<div class="form-group input-group">
							<input id="datepicker" type="text" class="form-control" placeholder="02.04.2014" data-date-format="mm.dd.yyyy">
							<span class="input-group-btn">
								
							</span>
						</div>
					</form>
				</div>
			</div>
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<p class="nav navbar-nav concert">CONCERT DAY: Aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>
				<form class="navbar-form navbar-left" role="search">
					<div class="form-group input-group">
						<input type="text" class="form-control" placeholder="Search">
					</div>
				</form>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="#">Statistics</a></li>
					<li><a href="#">Settings</a></li>
					<li><a href="#">Logout</a></li>
				</ul>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>