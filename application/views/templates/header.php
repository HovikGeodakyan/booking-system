<html>
	<head>
		<title><?php echo $title; ?> | REDTable</title>
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
    
    <script src="<?php echo(JS.'lib/app.js'); ?>"></script> 
    <script src="<?php echo(JS.'lib/jquery.confirm.min.js'); ?>"></script>
    <script src="<?php echo(JS.'lib/jquery.alert.min.js'); ?>"></script>
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

    <!-- Charts  -->
    <script src="<?php echo(JS.'chart/jquery.flot.min.js'); ?>"></script>
    <script src="<?php echo(JS.'chart/jquery.flot.time.min.js'); ?>"></script>
    
	</head>
	

  <body style="background: transparent;">
	   <header class="bg-white header header-md navbar navbar-fixed-top-xs box-shadow">       
      
      <div class="navbar-header aside-md dk hidden-xs nav-header-custom logo_container" >
        <a href="<?php echo URL.'welcome'; ?>" class="logo">
          <img src="<?php echo URL.'media/img/logo/'.$settings['logo']; ?>">
        </a>
      </div>

      <div class="navbar-header aside-md dk nav-header-custom" >

        <a href="#"  class="navbar-brand" id="timesheet_calendar" data-intro='Here you can select date for showing reservations scheduler' data-step='5' data-position='bottom'>
          <input type="hidden" id="main_calendar" />         
          <!-- <img src="<?php //echo(JS.'theme/images/logo.png'); ?>" class="m-r-sm" alt="scale"> -->
          <i class="fa fa-calendar"></i>
          <span class="hidden-nav-xs"><?php echo _calendar ?></span>
        </a>
        
      </div>

      <div class="navbar-header aside-md dk nav-header-custom" >
      	<a href="<?php echo URL.'welcome'; ?>" class="navbar-brand" data-intro='This onen switch reservations calendar to today date...' data-step='6' data-position='bottom'>
 			     <i class="i i-clock2"></i>
         	 <span class="hidden-nav-xs"><?php echo _today ?></span>
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
            <input type="text" class="search_text form-control input-sm no-border" placeholder="<?php echo _search_reservations ?>">            
          </div>
        </div>
      </form>
      <ul class="nav navbar-nav navbar-right m-n hidden-xs nav-user user">
        <li class="">
          <a href="#" class="hidden-xs dropdown-toggle" data-toggle="dropdown">
            <span class="hidden-xs thumb-sm avatar pull-left">
              <img src="<?php echo (AVATAR.$this->session->userdata('user_avatar')); ?>" alt="...">
            </span>
            <?php echo $this->session->userdata('user_name'); ?> <b class="caret"></b>
          </a>
          <section class="dropdown-menu aside-xl animated flipInY">
            <section class="panel bg-white">
              <div class="panel-heading b-light bg-light">
                <strong><?php echo $this->session->userdata('user_name'); ?></strong>
              </div>
              <div class="list-group list-group-alt">
                <a href="<?php echo URL; ?>user/settings/<?php echo $this->session->userdata('user_id'); ?>" class="media list-group-item">
                  <span class="pull-left thumb-sm">
                    <img src="<?php echo (AVATAR.$this->session->userdata('user_avatar')); ?>" alt="..." class="img-circle">
                  </span>
                  <span class="media-body block m-b-none">
                    <?php echo _personal_settings ?><br>
                    <!-- <small class="text-muted">10 minutes ago</small> -->
                  </span>
                </a>
                <a href="<?php echo base_url(); ?>" class="media list-group-item">
                  <span class="media-body block m-b-none">
                   <?php echo _logout ?><br>
                    <!-- <small class="text-muted">1 hour ago</small> -->
                  </span>
                </a>
              </div>
             <!--  <div class="panel-footer text-sm">
                <a href="#" class="pull-right"><i class="fa fa-cog"></i></a>
                <a href="#notes" data-toggle="class:show animated fadeInRight">See all the notifications</a>
              </div> -->
            </section>
          </section>
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
                  <h4 class="modal-title" id="myModalLabel"><?php echo _search_results ?></h4>
                </div>
                <div class="modal-body"> 
                    <table class="table table-striped b-t b-light" id="search_results_table">
                      <thead>
                        <tr>
                          <th class="th-sortable" data-toggle="class">#</th>
                          <th class="th-sortable" data-toggle="class"><?php echo _name ?></th>          
                          <th class="th-sortable" data-toggle="class"><?php echo _email ?></th>            
                          <th class="th-sortable" data-toggle="class"><?php echo _phone ?></th>           
                          <th class="th-sortable" data-toggle="class"><?php echo _guests ?></th>           
                          <th class="th-sortable" data-toggle="class"><?php echo _start ?></th>
                          <th class="th-sortable" data-toggle="class"><?php echo _end ?></th>
                          <th class="th-sortable" data-toggle="class"><?php echo _view ?></th>
                        </tr>
                       </thead>
                        <tbody>
                        </tbody>
                    </table>               
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo _close ?></button>                  
                </div>
              </div>
            </div>
          </div>
    
    
          <!-- Concert Modal -->
          <div class="modal fade" id="concert_modal" tabindex="-1" role="dialog"  aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title" id="myModalLabel"><?php echo _concert_details ?></h4>
                </div>
                <div class="modal-body" style="height: 250px;"> 
                             
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-success edit_concert"><?php echo _edit ?></button>                         
                  <button type="button" class="btn btn-primary save_concert" style="display:none"><?php echo _save ?></button>                         
                  <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo _close ?></button>                  
                </div>
              </div>
            </div>
          </div>

