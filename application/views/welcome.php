   
    <section class="row m-b-md">
        <div class="col-sm-6">

          <h3 class="m-b-xs text-black" id="concert_header"></h3>
          <small>Welcome back, John Smith, <i class="fa fa-map-marker fa-lg text-primary"></i> New York City</small>
        </div>

        <div class="col-sm-6 text-right text-left-xs m-t-md">
          <div id="current_time"></div>
          <!-- <div class="btn-group">
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
        </div> -->
      </section>
 
 <div class="white_content">
<section class="">

<!-- <form class="form-inline add_reservation" role="form">

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
    <select class="form-control" id="new_reservation_table" name="new_reservation_table" multiple>
      
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
  
</form> -->

</section>

          <div id="dp"></div>
        
        </div>
      </div>
<script src="<?php echo(JS.'scheduler/scheduler.js'); ?>"></script>

<div class="modal fade" id="reservation_edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content col-lg-12">
      <div class="modal-header col-lg-12">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Reservation details</h4>
      </div>
      <div class="modal-body col-lg-12">
        <form class="edit_reservation col-lg-12" role="form" >

          <div class="form-group col-lg-6"> 
            <label>Date</label> 
            <input type="text" class="form-control" name='date'>
          </div>

          <div class="form-group col-lg-3"> 
            <label>Time</label>   
            <input type="text" step="900" class="form-control" name="time">
          </div>

          <div class="form-group col-lg-3">  
            <label>Guests</label>
            <input type="number" class="form-control" placeholder="Guests number" name="guest_number">
          </div>

          <div class="form-group col-lg-12">
            <label>Table(s)</label>
            <select class="form-control" id="reservation_table" name="resource" multiple>
            </select>
          </div>

          <div class="form-group col-lg-6">
            <label>Title</label>
            <select class="form-control" name="title">
              <option value="Mr.">Mr.</option>
              <option value="Mrs.">Mrs.</option>
              <option value="Dr.">Dr.</option>
              <option value="Prof.">Prof.</option>
            </select>
          </div>

          <div class="form-group col-lg-6">
            <label>Guest name</label>  
            <input type="text" class="form-control" placeholder="Name" name="guest_name">
          </div>

          <div class="form-group col-lg-6">  
            <label>Phone</label> 
            <input type="tel" class="form-control" placeholder="Phone" name="phone">
          </div>

          <div class="form-group col-lg-6"> 
            <label>Email</label>
            <input type="email" class="form-control" placeholder="Email" name="email">
          </div>

          <div class="form-group col-lg-4">
            <label>Language</label>
            <select class="form-control" name="language">
              <option value="English">EN</option>
              <option value="German">GE</option>
            </select>
          </div>

          <div class="form-group col-lg-4">  
            <label>Author</label>
            <input type="text" class="form-control" placeholder="Author" name="author">
          </div>

          <div class="form-group col-lg-4"> 
            <label>Confirm via email</label>   
            <div class="">
              <label></label>
                <input type="checkbox" value="1" name="confirm_via_email">  
            </div>
          </div>
          
        </form>
      </div>
      <div class="modal-footer col-lg-12">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" id="has_arrived" class="btn btn-success" data-dismiss="modal" disabled>Arrived</button>
        <button type="button" id="cancel_reservation" class="btn btn-danger" disabled>Cancel</button>
        <button type="button" id="save_reservation" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>