   
    <section class="row m-b-md">
        <div class="col-sm-6">

          <h3 class="m-b-xs text-black"> <i style="background: #1ccacc; padding: 7px; border-radius: 23px; color: white; width: 39px;" class="fa fa-music"></i>  Concert Today 22:00</h3>
          <small>Welcome back, John Smith, <i class="fa fa-map-marker fa-lg text-primary"></i> New York City</small>
        </div>
        <div class="col-sm-6 text-right text-left-xs m-t-md">
          <div class="btn-group">
            <a class="btn btn-rounded btn-default b-2x dropdown-toggle" data-toggle="dropdown">Widgets <span class="caret"></span></a>
            <ul class="dropdown-menu text-left pull-right">
              <li><a href="#">Notification</a></li>
              <li><a href="#">Messages</a></li>
              <li><a href="#">Analysis</a></li>
              <li class="divider"></li>
              <li><a href="#">More settings</a></li>
            </ul>
          </div>
          <a href="#" class="btn btn-icon b-2x btn-default btn-rounded hover"><i class="i i-bars3 hover-rotate"></i></a>
          <a href="#nav, #sidebar" class="btn btn-icon b-2x btn-info btn-rounded" data-toggle="class:nav-xs, show"><i class="fa fa-bars"></i></a>
        </div>
      </section>
 
 <div class="white_content">
<section class="">
<!--  <form class="form-inline" role="form">
   <div class="form-group">    
    <input type="time" step="900" class="form-control" placeholder="Enter name">
  </div>
  <div class="form-group">    
    <input type="time" step="900" class="form-control" placeholder="Enter name">
  </div>
   <div class="form-group">
  
    <select class="form-control" ><option>Mr</option></select>
  </div>
   <div class="form-group">
  
    <input type="email" class="form-control" placeholder="Enter name">
  </div>
  <div class="form-group">
    
    <input type="email" class="form-control" placeholder="Enter phone">
  </div>
  <div class="form-group">
    <input type="text" class="form-control" placeholder="Email">
  </div>
  <div class="form-group">    
    <select class="form-control"><option>3</option></select>
  </div>
  <div class="form-group">    
    <select class="form-control"><option>T10</option></select>
  </div>
  <div class="form-group">    
    <select class="form-control"><option>En</option></select>
  </div>
  <div class="form-group">
      <div class="checkbox i-checks">
        <label>
          <input class="form-control" type="checkbox" checked=""><i></i>VIP

        </label>
     
    </div>
  </div>
  <button type="button" class="btn btn-default">Cancel</button>
  <button type="button" class="btn btn-primary">Save</button>
  
</form>
 -->

<form class="form-inline add_reservation" role="form">

  <div class="form-group date">   
    <input type="text" class="form-control" id="new_reservation_date" name='new_reservation_date'>
  </div>

  <div class="form-group time">   
    <input type="text" step="900" class="form-control" id="new_reservation_time" name="new_reservation_time">
  </div>

  <div class="form-group guests">   
    <input type="number" class="form-control" placeholder="Guests number" name="new_reservation_guest_number">
  </div>

  <div class="form-group table">
    <select class="form-control" id="new_reservation_table" name="new_reservation_table">
      <option value="0">NA</option>
    </select>
  </div>

  <div class="form-group title">
    <select class="form-control" name="new_reservation_title">
      <option>Mr.</option>
      <option>Mrs.</option>
      <option>Dr.</option>
      <option>Prof.</option>
    </select>
  </div>

  <div class="form-group name">   
    <input type="text" class="form-control" placeholder="Name" name="new_reservation_guest_name">
  </div>

  <div class="form-group phone">   
    <input type="tel" class="form-control" placeholder="Phone" name="new_reservation_phone">
  </div>

  <div class="form-group email">  
    <input type="email" class="form-control" placeholder="Email" name="new_reservation_email">
  </div>

  <div class="form-group language">
    <select class="form-control" name="new_reservation_language">
      <option value="English">EN</option>
      <option value="German">GE</option>
    </select>
  </div>

  <div class="form-group author">   
    <input type="text" class="form-control" placeholder="Author" name="new_reservation_author">
  </div>

  <div class="form-group confirmation">    
    <div class="">
      <label></label>
        <input type="checkbox" value="1" name="new_reservation_confirmation">  
    </div>
  </div>
  
  <button type="submit" class="btn btn-primary">Save</button>
  
</form>

</section>

          <div id="dp"></div>
        
        </div>
      </div>
<script src="<?php echo(JS.'scheduler/scheduler.js'); ?>"></script>
