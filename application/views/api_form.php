<html>
  <head>
    <link rel="stylesheet" href="<?php echo(CSS.'theme/bootstrap.css'); ?>" type="text/css" />
    <link rel="stylesheet" href="<?php echo(CSS.'theme/chosen.css'); ?>" type="text/css" />  
    <script src="<?php echo(JS.'lib/jquery.min.js'); ?>"></script>
    <script src="<?php echo(JS.'lib/bootstrap.js'); ?>"></script> 
    <script src="<?php echo(JS.'lib/chosen.jquery.min.js'); ?>"></script>
  </head>


  <body>
    <div class="modal-header col-lg-12">
      <h4 class="modal-title" id="myModalLabel">Reserve a table</h4>
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
      <button type="button" id="save_reservation" class="btn btn-primary">Reserve</button>
    </div>
      

  </body>
</html>