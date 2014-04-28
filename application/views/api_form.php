<html>
  <head>
    <link rel="stylesheet" href="<?php echo(CSS.'theme/bootstrap.css'); ?>" type="text/css" />
    <link rel="stylesheet" href="<?php echo(CSS.'theme/chosen.css'); ?>" type="text/css" />  
    <link rel="stylesheet" href="<?php echo(CSS.'datepicker/datepicker.css'); ?>" type="text/css" />

    <script src="<?php echo(JS.'lib/jquery.min.js'); ?>"></script>
    <script src="<?php echo(JS.'lib/bootstrap.js'); ?>"></script>
    <script src="<?php echo(JS.'datepicker/jquery-ui-1.10.4.custom.min.js'); ?>"></script>
    <script src="<?php echo(JS.'datepicker/datepicker.js'); ?>"></script>  
    <script src="<?php echo(JS.'lib/chosen.jquery.min.js'); ?>"></script>
    <script src="<?php echo(JS.'api/api_from.js'); ?>"></script>
  </head>

  <body>
    <form class="col-lg-12 col-xs-12 col-sm-12" role="form" method="get" action="<?php echo(URL.'api/reserveTable'); ?>">

        <input type="hidden" name="guest_type" value="internet">

        <div class="form-group col-lg-4 col-xs-4 col-sm-4"> 
          <label>Date</label> 
          <input type="text" class="form-control input-sm" name='date'>
        </div>

        <div class="form-group col-lg-4 col-xs-4 col-sm-4"> 
          <label>Time</label>   
          <input type="text" step="900" class="form-control input-sm" name="time">
        </div>

        <div class="form-group col-lg-2 col-xs-2 col-sm-2">  
          <label>Guests</label>
          <input type="number" class="form-control input-sm" placeholder="Guests number" name="guest_number">
        </div>        

        <div class="form-group col-lg-2 col-xs-2 col-sm-2">  
          <label>OutletID</label>
          <input type="number" class="form-control input-sm" placeholder="OutletID" name="outlet_id">
        </div>

        <div class="form-group col-lg-12 col-xs-12 col-sm-12">
          <label>Table(s)</label>
          <select class="form-control input-sm" id="reservation_table" name="resource[]" multiple>
          </select>
        </div>

        <div class="form-group col-lg-2 col-xs-2 col-sm-2">
          <label>Title</label>
          <select class="form-control input-sm" name="title">
            <option value="Mr.">Mr.</option>
            <option value="Mrs.">Mrs.</option>
            <option value="Dr.">Dr.</option>
            <option value="Prof.">Prof.</option>
          </select>
        </div>

        <div class="form-group col-lg-4 col-xs-4 col-sm-4">
          <label>Guest name</label>  
          <input type="text" class="form-control input-sm" placeholder="Name" name="guest_name">
        </div>

        <div class="form-group col-lg-2 col-xs-2 col-sm-2">
          <label>Language</label>
          <select class="form-control input-sm" name="language">
            <option value="English">EN</option>
            <option value="German">GE</option>
          </select>
        </div>

        <div class="form-group col-lg-4 col-xs-4 col-sm-4">  
          <label>Phone</label> 
          <input type="tel" class="form-control input-sm" placeholder="Phone" name="phone">
        </div>

        <div class="form-group col-lg-4 col-xs-4 col-sm-4"> 
          <label>Email</label>
          <input type="email" class="form-control input-sm" placeholder="Email" name="email">
        </div>

        <div class="form-group col-lg-3 col-xs-3 col-sm-3">  
          <label>Author</label>
          <input type="text" class="form-control input-sm" placeholder="Author" name="author">
        </div>

        <div class="form-group col-lg-2 col-xs-2 col-sm-2"> 
          <label>Confirm </label>   
          <div class="">
            <label></label>
              <input type="checkbox" value="1" name="confirm_via_email">  
          </div>
        </div>        

        <div class="form-group col-lg-3 col-xs-3 col-sm-3"> 
          <label></label>   
          <div class="">
              <button type="submit" id="save_reservation" class="btn btn-primary btn-sm" style="margin-top: 20px;">Save changes</button>  
          </div>
        </div>

    </form>
    
  </body>
</html>