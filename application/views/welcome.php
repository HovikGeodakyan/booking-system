   
    <section class="row m-b-md" style="margin-top: 20px;">
        <div class="col-sm-10 col-xs-10">

          <div class="btn-group">
            <label class="btn btn-default active" for="allTables">
              <input type="radio" name="tables_type" id="allTables" value="all" style="display:none" checked> All tables
            </label>
            <label class="btn btn-default" for="freeTables">
              <input type="radio" name="tables_type" id="freeTables" value="free" style="display:none"> Free tables
            </label>
          </div>

          <div id="selected_date">
            <button class="btn btn-default btn-sm" id="date_back"><</button>
            <div id=""></div>
            <button class="btn btn-default btn-sm" id="date_forward">></button>
          </div>

          <button class="btn btn-default btn-sm" id="add_concert">Add Concert</button>
          <h4 class="m-b-xs text-black" id="concert_header"></h4>

        </div>

        <div class="col-sm-2 col-xs-2 text-right text-left-xs m-t-md">
          <div id="current_time"></div>
        </div>
      </section>

<div class="white_content">
  <div id="message_container"></div>
  <div class="holiday_conatainer"></div>
<section class="">


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
        <h4 class="modal-title" id="myModalLabel"><?php echo _edit." "._reservation ?></h4>
      </div>
      <div class="modal-body col-lg-12">
        <form class="edit_reservation col-lg-12" role="form" data-validate="parsley">

          <div class="form-group col-lg-8"> 
            <label><?php echo _date ?>*</label> 
            <input type="text" class="form-control" name='date' data-required="true">
          </div>

          <div class="form-group col-lg-4">
            <label><?php echo _guests ?>*</label>
            <div class="input-group">
              <span class="input-group-btn">
                <button class="btn btn-default number_dec_button" type="button">-</button>
              </span>
              <input  class="form-control" placeholder="Guests number" name="guest_number" data-required="true" data-type="digits" class="form-control">
              <span class="input-group-btn">
                <button class="btn btn-default number_inc_button" type="button">+</button>
              </span>
            </div>
          </div>

          <div class="form-group col-lg-4">
            <label><?php echo _start ?>*</label> 
            <div class="input-group">
              <span class="input-group-btn">
                <button class="btn btn-default time_dec_button" type="button">-</button>
              </span>
              <input type="text" step="900" class="form-control" name="time" data-required="true">
              <span class="input-group-btn">
                <button class="btn btn-default time_inc_button" type="button">+</button>
              </span>
            </div>
          </div>

          <div class="form-group col-lg-4">
            <label><?php echo _end ?></label>
            <div class="input-group">
              <span class="input-group-btn">
                <button class="btn btn-default time_dec_button" type="button">-</button>
              </span>
              <input type="text" step="900" class="form-control col-lg-6" name="end_time">
              <span class="input-group-btn">
                <button class="btn btn-default time_inc_button" type="button">+</button>
              </span>
            </div>
          </div>

          <div class="form-group col-lg-4">
            <label><?php echo _type ?></label>
            <select class="form-control" name="guest_type">
              <option value="internet"><?php echo _internet ?></option>
              <option value="telephone"><?php echo _telephone ?></option>
              <option value="magento">Magento</option>
              <option value="walkin"><?php echo _walkin ?></option>
            </select>
          </div>

          <div class="form-group col-lg-12">
            <label><?php echo _table ?>(s)</label>
            <select class="form-control" id="reservation_table" name="resource[]" multiple>
            </select>
          </div>

          <div class="form-group col-lg-3">
            <label><?php echo _title ?></label>
            <select class="form-control" name="title">
              <option value="Mr."><?php echo _Mr ?></option>
              <option value="Mrs."><?php echo _Mrs ?></option>
              <option value="Dr."><?php echo _Dr ?></option>
              <option value="Prof."><?php echo _Prof ?></option>
            </select>
          </div>

          <div class="form-group col-lg-4">
            <label><?php echo _guest_first_name ?>*</label>  
            <input type="text" class="form-control" placeholder="Name" name="guest_name" id="guest_name" data-required="true">
          </div>          

          <div class="form-group col-lg-5">
            <label><?php echo _guest_last_name ?></label>  
            <input type="text" class="form-control" placeholder="Last Name" name="guest_last_name" id="guest_last_name">
          </div>

          <div class="form-group col-lg-6">  
            <label><?php echo _phone ?></label> 
            <input type="tel" class="form-control" placeholder="Phone" name="phone">
          </div>

          <div class="form-group col-lg-6"> 
            <label><?php echo _email ?></label>
            <input type="email" class="form-control" placeholder="Email" name="email" data-type="email">
          </div>

          <div class="form-group col-lg-4">  
            <label><?php echo _expiery_date ?></label>
            <input type="text" class="form-control" placeholder="Expiery_date" name="expiery_date">
          </div>

          <div class="form-group col-lg-4">  
            <label><?php echo _WB ?></label>
            <input type="text" class="form-control" placeholder="WB" name="WB">
          </div>

          <div class="form-group col-lg-4">
            <label class="control-label"><?php echo _provisional; ?></label>
            <div>
              <label class="switch">
                <input name="provisional" type="checkbox" value="1">
                <span></span>
              </label>
            </div>
          </div>

          <div class="form-group col-lg-12">  
            <label><?php echo _comment ?></label>
            <textarea type="text" class="form-control" placeholder="Comment" name="comment"></textarea>
          </div>

          <div class="form-group col-lg-4">
            <label><?php echo _language ?></label>
            <select class="form-control" name="language">
              <option value="en"><?php echo _english ?></option>
              <option value="ge"><?php echo _german ?></option>
            </select>
          </div>

          <div class="form-group col-lg-4">  
            <label><?php echo _author ?></label>
            <input type="text" class="form-control" placeholder="Author" name="author">
          </div>


          <div class="form-group col-lg-4">
            <label class="control-label"><?php echo _confirm_via_email ?></label>
            <div>
              <label class="switch">
                <input name="confirm_via_email" type="checkbox" value="1">
                <span></span>
              </label>
            </div>
          </div>
    

        </form>
      </div>
      <div class="modal-footer col-lg-12">
        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo _close ?></button>
        <button type="button" id="has_arrived" class="btn btn-success" data-dismiss="modal" disabled><?php echo _guest_arrived ?></button>
        <button type="button" id="cancel_reservation" class="btn btn-danger" disabled><?php echo _cancel." "._reservation ?></button>
        <button type="button" id="save_reservation" class="btn btn-primary"><?php echo _save_changes ?></button>
      </div>
    </div>
  </div>
</div>



<div class="modal fade" id="add_new_concert" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content col-lg-12">
      <div class="modal-header col-lg-12">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel"><?php echo _create." "._concert ?></h4>
      </div>
      <div class="modal-body col-lg-12">
        <form class="col-lg-12" role="form" data-validate="parsley" method="post" action="<?php echo URL ?>outlet/add_concert">

          <input type="hidden" name='concert_date'>

          <div class="form-group col-lg-12"> 
            <label><?php echo _title ?>*</label> 
            <input type="text" class="form-control" name='concert_name' data-required="true">
          </div>          

          <div class="form-group col-lg-6">
            <label><?php echo _start ?>*</label> 
            <div class="input-group">
              <span class="input-group-btn">
                <button class="btn btn-default time_dec_button" type="button">-</button>
              </span>
              <input type="text" step="900" class="form-control" name="concert_start" data-required="true" value="00:00">
              <span class="input-group-btn">
                <button class="btn btn-default time_inc_button" type="button">+</button>
              </span>
            </div>
          </div>

          <div class="form-group col-lg-6">
            <label><?php echo _end ?>*</label>
            <div class="input-group">
              <span class="input-group-btn">
                <button class="btn btn-default time_dec_button" type="button">-</button>
              </span>
              <input type="text" step="900" class="form-control col-lg-6" name="concert_end" data-required="true" value="00:00">
              <span class="input-group-btn">
                <button class="btn btn-default time_inc_button" type="button">+</button>
              </span>
            </div>
          </div>

          <div class="form-group col-lg-12"> 
            <label><?php echo _description ?></label> 
            <textarea type="text" class="form-control" name='concert_description'></textarea>
          </div>

          <div class="modal-footer col-lg-12">
            <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo _close ?></button>
            <button type="submit" class="btn btn-primary"><?php echo _create ?></button>
          </div>

        </form>
      </div>

    </div>
  </div>
</div>