<html>
	<head>
		<title><?php echo $title; ?> | MyTable</title>
		 <!--  Theme Styles  -->
    <link rel="stylesheet" href="<?php echo(CSS.'theme/bootstrap.css'); ?>" type="text/css" />
		<link rel="stylesheet" href="<?php echo(CSS.'theme/animate.css'); ?>" type="text/css" />
		<link rel="stylesheet" href="<?php echo(CSS.'theme/font-awesome.min.css'); ?>" type="text/css" />
		<link rel="stylesheet" href="<?php echo(CSS.'theme/icon.css'); ?>" type="text/css" />
		<link rel="stylesheet" href="<?php echo(CSS.'theme/font.css'); ?>" type="text/css" />
    <link rel="stylesheet" href="<?php echo(CSS.'theme/app.css'); ?>" type="text/css" />  
		<link rel="stylesheet" href="<?php echo(CSS.'theme/chosen.css'); ?>" type="text/css" />  
		  
    <!-- Scheduler Styles  -->
    <link type="text/css" rel="stylesheet" href="<?php echo(CSS.'scheduler/layout.css'); ?>" />    
    <link type="text/css" rel="stylesheet" href="<?php echo(CSS.'scheduler/scheduler_8.css'); ?>" />    
    <link type="text/css" rel="stylesheet" href="<?php echo(CSS.'scheduler/bubble_default.css'); ?>" />    
    <link type="text/css" rel="stylesheet" href="<?php echo(CSS.'scheduler/navigator_white.css'); ?>" />    
   
    <!-- Custom Styles  -->
    <link tpye="text/css" rel="stylesheet" href="<?php echo(CSS.'stylesheet.css'); ?>"/> 
    
    <!-- Datepicker Styles -->
		<link rel="stylesheet" href="<?php echo(CSS.'datepicker/datepicker.css'); ?>" type="text/css" />
    
    <!-- IntroJS Styles  -->
    <link rel="stylesheet" href="<?php echo(CSS.'intro/introjs.css'); ?>" type="text/css" />

    <script src="<?php echo(JS.'scheduler/daypilot-all.min.js'); ?>"></script>
   

    <!-- Library -->
    <script src="<?php echo(JS.'lib/jquery.min.js'); ?>"></script>
    <script src="<?php echo(JS.'lib/bootstrap.js'); ?>"></script> 
    
    <!--<script src="<?php //echo(JS.'lib/app.js'); ?>"></script> -->
    <script src="<?php echo(JS.'lib/jquery.confirm.min.js'); ?>"></script>
    <script src="<?php echo(JS.'datepicker/jquery-ui-1.10.4.custom.min.js'); ?>"></script>
    <script src="<?php echo(JS.'datepicker/datepicker.js'); ?>"></script>  
    <script src="<?php echo(JS.'lib/remove.js'); ?>"></script>
    <script src="<?php echo(JS.'lib/tableEdit.js'); ?>"></script>
    <script src="<?php echo(JS.'lib/tablesorter.min.js'); ?>"></script>
    <script src="<?php echo(JS.'lib/intro.js'); ?>"></script>
   

    <!-- Theme Validation -->
    <script src="<?php echo(JS.'lib/parsley.min.js'); ?>"></script>
    <script src="<?php echo(JS.'lib/parsley.extend.js'); ?>"></script>
    
    <script src="<?php echo(JS.'search/search.js'); ?>"></script>

    <!-- Multiselect -->
    <script src="<?php echo(JS.'lib/chosen.jquery.min.js'); ?>"></script>

    <!-- Charts 
    <script src="<?php //echo(JS.'statistics/highcharts.js'); ?>"></script>
    <script src="<?php //echo(JS.'statistics/data.js'); ?>"></script>  -->

     <script src="<?php echo(JS.'chart/jquery.flot.min.js'); ?>"></script>
    <script src="<?php echo(JS.'chart/jquery.flot.time.min.js'); ?>"></script>
    
	</head>
	

  <body style="background: transparent;">
	   <header class="bg-white header header-md navbar navbar-fixed-top-xs box-shadow">       
      <div class="navbar-header aside-md dk nav-header-custom" >       
        <a href="#"  class="navbar-brand" id="timesheet_calendar" data-intro='Here you can select date for showing reservations scheduler' data-step='5' data-position='bottom'>
          <input type="hidden" id="main_calendar" />         
          <!-- <img src="<?php //echo(JS.'theme/images/logo.png'); ?>" class="m-r-sm" alt="scale"> -->
          <i class="fa fa-calendar"></i>
          <span class="hidden-nav-xs">Calendar</span>
        </a>
        
      </div>

      <div class="navbar-header aside-md dk nav-header-custom" >
      	<a href="welcome" class="navbar-brand" data-intro='This onen switch reservations calendar to today date...' data-step='6' data-position='bottom'>
 			     <i class="i i-clock2"></i>
         	 <span class="hidden-nav-xs">Today</span>
      	</a>
      </div>
      <a class="btn btn-link visible-xs custom-header-btns" data-toggle="class:nav-off-screen" data-target="#nav">
          <i class="fa fa-bars"></i>
      </a>
      <a class="btn btn-link visible-xs custom-header-btns" data-toggle="dropdown" data-target=".user">
          <i class="fa fa-cog"></i>
      </a>
      <form class="navbar-form navbar-left input-s-lg m-t m-l-n-xs hidden-xs search_form" role="search" data-intro='Here you can search guests in system' data-step='7' data-position='bottom'>
        <div class="form-group" >
          <div class="input-group">
            <span class="input-group-btn">
              <button type="submit" class="btn btn-sm bg-white b-white btn-icon"><i class="fa fa-search"></i></button>
            </span>
            <input type="text" class="search_text form-control input-sm no-border" placeholder="Search apps, projects...">            
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
                    <img src="<?php echo(IMG.'a0.png'); ?>" alt="..." class="img-circle">
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
              <img src="<?php echo(IMG.'a0.png'); ?>" alt="...">
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

  <!-- laoder-->
  <div class="modal-backdrop fade in loader">
      <div class="spinner_box">
          <div class="spinner">
              <div class="spinner-container container1">
                <div class="circle1"></div>
                <div class="circle2"></div>
                <div class="circle3"></div>
                <div class="circle4"></div>
              </div>
              <div class="spinner-container container2">
                <div class="circle1"></div>
                <div class="circle2"></div>
                <div class="circle3"></div>
                <div class="circle4"></div>
              </div>
              <div class="spinner-container container3">
                <div class="circle1"></div>
                <div class="circle2"></div>
                <div class="circle3"></div>
                <div class="circle4"></div>
              </div>
          </div>
     </div>
  </div>
    <!-- Search Modal -->
          <div class="modal fade" id="search_modal" tabindex="-1" role="dialog"  aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title" id="myModalLabel">Search Results</h4>
                </div>
                <div class="modal-body"> 
                    <table class="table table-striped b-t b-light" id="search_results_table">
                      <thead>
                        <tr>
                          <th class="th-sortable" data-toggle="class">#</th>
                          <th class="th-sortable" data-toggle="class">Name</th>          
                          <th class="th-sortable" data-toggle="class">Email</th>            
                          <th class="th-sortable" data-toggle="class">Phone</th>           
                          <th class="th-sortable" data-toggle="class">Guest Number</th>           
                          <th class="th-sortable" data-toggle="class">Resarvation Start</th>
                          <th class="th-sortable" data-toggle="class">Resarvation End</th>
                        </tr>
                       </thead>
                        <tbody>
                        </tbody>
                    </table>               
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>                  
                </div>
              </div>
            </div>
          </div>

