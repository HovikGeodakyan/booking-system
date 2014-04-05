<html>
	<head>
		<title><?php echo $title; ?> | MyTable</title>
<!-- 		<link tpye="text/css" rel="stylesheet" href="<?php echo(CSS.'stylesheet.css'); ?>"/>		 -->
		<link rel="stylesheet" href="<?php echo(JS.'theme/css/bootstrap.css'); ?>" type="text/css" />
		<link rel="stylesheet" href="<?php echo(JS.'theme/css/animate.css'); ?>" type="text/css" />
		<link rel="stylesheet" href="<?php echo(JS.'theme/css/font-awesome.min.css'); ?>" type="text/css" />
		<link rel="stylesheet" href="<?php echo(JS.'theme/css/icon.css'); ?>" type="text/css" />
		<link rel="stylesheet" href="<?php echo(JS.'theme/css/font.css'); ?>" type="text/css" />
		<link rel="stylesheet" href="<?php echo(JS.'theme/css/app.css'); ?>" type="text/css" />  
		<link rel="stylesheet" href="<?php echo(JS.'theme/js/calendar/bootstrap_calendar.css'); ?>" type="text/css" />
		
    <!-- Sheduler -->
    <link type="text/css" rel="stylesheet" href="<?php echo(CSS.'layout.css'); ?>" />    
    <link type="text/css" rel="stylesheet" href="<?php echo(CSS.'scheduler_theme/scheduler_8.css'); ?>" />    
    <link type="text/css" rel="stylesheet" href="<?php echo(CSS.'scheduler_theme/bubble_default.css'); ?>" />    
    <link type="text/css" rel="stylesheet" href="<?php echo(CSS.'scheduler_theme/navigator_white.css'); ?>" />    
    <!-- Our Custom Css -->
		<link rel="stylesheet" href="<?php echo(JS.'custom.css'); ?>" type="text/css" />

    <script src="<?php echo(JS.'daypilot-all.min.js'); ?>"></script>
    <script src="<?php echo(JS.'theme/js/jquery.min.js'); ?>"></script>
	</head>
	<body>
	   <header class="bg-white header header-md navbar navbar-fixed-top-xs box-shadow">
      <div class="navbar-header aside-md dk nav-header-custom">
        <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen" data-target="#nav">
          <i class="fa fa-bars"></i>
        </a>
        <a href="index.html" class="navbar-brand">
          <!-- <img src="<?php echo(JS.'theme/images/logo.png'); ?>" class="m-r-sm" alt="scale"> -->
          <i class="fa fa-calendar"></i>
          <span class="hidden-nav-xs">Calendar</span>
        </a>
        <a class="btn btn-link visible-xs" data-toggle="dropdown" data-target=".user">
          <i class="fa fa-cog"></i>
        </a>
      </div>

      <div class="navbar-header aside-md dk nav-header-custom">
      	<a href="index.html" class="navbar-brand">
 			<i class="i i-clock2"></i>
         	 <span class="hidden-nav-xs">Today</span>
      	</a>
      </div>

 <!--      <ul class="nav navbar-nav hidden-xs">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="i i-grid"></i>
          </a>
          <section class="dropdown-menu aside-lg bg-white on animated fadeInLeft">
            <div class="row m-l-none m-r-none m-t m-b text-center">
              <div class="col-xs-4">
                <div class="padder-v">
                  <a href="#">
                    <span class="m-b-xs block">
                      <i class="i i-mail i-2x text-primary-lt"></i>
                    </span>
                    <small class="text-muted">Mailbox</small>
                  </a>
                </div>
              </div>
              <div class="col-xs-4">
                <div class="padder-v">
                  <a href="#">
                    <span class="m-b-xs block">
                      <i class="i i-calendar i-2x text-danger-lt"></i>
                    </span>
                    <small class="text-muted">Calendar</small>
                  </a>
                </div>
              </div>
              <div class="col-xs-4">
                <div class="padder-v">
                  <a href="#">
                    <span class="m-b-xs block">
                      <i class="i i-map i-2x text-success-lt"></i>
                    </span>
                    <small class="text-muted">Map</small>
                  </a>
                </div>
              </div>
              <div class="col-xs-4">
                <div class="padder-v">
                  <a href="#">
                    <span class="m-b-xs block">
                      <i class="i i-paperplane i-2x text-info-lt"></i>
                    </span>
                    <small class="text-muted">Trainning</small>
                  </a>
                </div>
              </div>
              <div class="col-xs-4">
                <div class="padder-v">
                  <a href="#">
                    <span class="m-b-xs block">
                      <i class="i i-images i-2x text-muted"></i>
                    </span>
                    <small class="text-muted">Photos</small>
                  </a>
                </div>
              </div>
              <div class="col-xs-4">
                <div class="padder-v">
                  <a href="#">
                    <span class="m-b-xs block">
                      <i class="i i-clock i-2x text-warning-lter"></i>
                    </span>
                    <small class="text-muted">Timeline</small>
                  </a>
                </div>
              </div>
            </div>
          </section>
        </li>
      </ul> -->
      <form class="navbar-form navbar-left input-s-lg m-t m-l-n-xs hidden-xs" role="search">
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-btn">
              <button type="submit" class="btn btn-sm bg-white b-white btn-icon"><i class="fa fa-search"></i></button>
            </span>
            <input type="text" class="form-control input-sm no-border" placeholder="Search apps, projects...">            
          </div>
        </div>
      </form>
      <ul class="nav navbar-nav navbar-right m-n hidden-xs nav-user user">
        <li class="hidden-xs">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="i i-chat3"></i>
            <span class="badge badge-sm up bg-danger count">2</span>
          </a>
          <section class="dropdown-menu aside-xl animated flipInY">
            <section class="panel bg-white">
              <div class="panel-heading b-light bg-light">
                <strong>You have <span class="count">2</span> notifications</strong>
              </div>
              <div class="list-group list-group-alt">
                <a href="#" class="media list-group-item">
                  <span class="pull-left thumb-sm">
                    <img src="<?php echo(JS.'theme/images/a0.png'); ?>" alt="..." class="img-circle">
                  </span>
                  <span class="media-body block m-b-none">
                    Use awesome animate.css<br>
                    <small class="text-muted">10 minutes ago</small>
                  </span>
                </a>
                <a href="#" class="media list-group-item">
                  <span class="media-body block m-b-none">
                    1.0 initial released<br>
                    <small class="text-muted">1 hour ago</small>
                  </span>
                </a>
              </div>
              <div class="panel-footer text-sm">
                <a href="#" class="pull-right"><i class="fa fa-cog"></i></a>
                <a href="#notes" data-toggle="class:show animated fadeInRight">See all the notifications</a>
              </div>
            </section>
          </section>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <span class="thumb-sm avatar pull-left">
              <img src="<?php echo(JS.'theme/images/a0.png'); ?>" alt="...">
            </span>
            John.Smith <b class="caret"></b>
          </a>
          <ul class="dropdown-menu animated fadeInRight">            
            <li>
              <span class="arrow top"></span>
              <a href="#">Settings</a>
            </li>
            <li>
              <a href="profile.html">Profile</a>
            </li>
            <li>
              <a href="#">
                <span class="badge bg-danger pull-right">3</span>
                Notifications
              </a>
            </li>
            <li>
              <a href="docs.html">Help</a>
            </li>
            <li class="divider"></li>
            <li>
              <a href="modal.lockme.html" data-toggle="ajaxModal" >Logout</a>
            </li>
          </ul>
        </li>
      </ul>      
    </header>