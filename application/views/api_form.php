<html>
  <head>
    <link rel="stylesheet" href="<?php echo(CSS.'theme/bootstrap.css'); ?>" type="text/css" />
    <link rel="stylesheet" href="<?php echo(CSS.'theme/chosen.css'); ?>" type="text/css" />  
    <link rel="stylesheet" href="<?php echo(CSS.'datepicker/datepicker.css'); ?>" type="text/css" />
    <link rel="stylesheet" href="<?php echo(CSS.'stylesheet.css'); ?>" type="text/css" />

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
        <input type="hidden" name="guest_type" value="date">

        <div class="col-lg-4 col-sm-4 col-xs-6">
          <h2>Reservation</h2>
          <div id="static_datepicker"></div>

          <div class="form-group">
            <select class="form-control input-sm" name="time">
              <?php 
                $h=0; $m=0;

                for ($i=0; $i<96; $i++) {
                  

                  if($m >= 60) { $m = 0; $h++; }

                  $m = ($m < 10) ? "0".$m : $m;
                  $h = (strlen($h) < 2) ? "0".$h : $h;

                  $time = $h.":".$m;

                  echo '<option value="'.$time.'">'.$time.'</option>';

                  $m = $m + 15;
                }
              ?>
            </select>
          </div>

          <div class="form-group">  
            <input type="number" class="form-control input-sm" placeholder="Guests number" name="guest_number">
          </div>  

        </div>
     

        <div class="col-lg-8 col-sm-8 col-xs-6">
          <h2>Your Contact Details</h2>
          <div class="col-lg-12 col-sm-12 col-xs-12">
            <div class="form-group col-lg-4 col-sm-4 col-xs-12">
              <select class="form-control input-sm" name="title">
                <option value="Mr.">Mr.</option>
                <option value="Mrs.">Mrs.</option>
                <option value="Dr.">Dr.</option>
                <option value="Prof.">Prof.</option>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label>First name</label>  
            <input type="text" class="form-control input-sm" placeholder="e.g. John, Ingrid etc." name="guest_name">
          </div>

          <div class="form-group">
            <label>Last name</label>  
            <input type="text" class="form-control input-sm" placeholder="e.g. Smith, Patel etc." name="guest_last_name">
          </div>

          <div class="form-group"> 
            <label>Email</label>
            <input type="email" class="form-control input-sm" placeholder="e.g. john@booktable.com" name="email">
          </div>

          <div class="form-group col-lg-8 col-sm-8">
            <label for="table_standard_seats">Phone</label>
            <div class="input-group">
              <span class="input-group-addon">44</span>
              <input type="tel" name="phone" class="form-control" placeholder="e.g. 0700000 00000">
            </div>
          </div>

          <div class="form-group col-lg-4 col-sm-4" style="margin-top:20px">
            <div class="col-lg-offset-2 col-lg-10">
              <div class="checkbox i-checks">
                <label>
                  <input type="checkbox" checked="">Remember me
                </label>
              </div>
            </div>
          </div>

        </div>

     

        <div class="form-group" style="float:right"> 
          <label></label>   
          <div class="">
              <button type="submit" id="save_reservation" class="btn btn-default btn-sm" style="margin-top: 20px;">Book Table</button>  
          </div>
        </div>

    </form>
    
  </body>
</html>