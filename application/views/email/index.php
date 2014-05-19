<section class="row m-b-md"></section>

	<ul class="nav nav-tabs settings_tabs">
		<li><a href="<?php echo(URL.'outlet'); ?>"><?php echo _outlets ?></a></li>
		<li><a href="<?php echo(URL.'user'); ?>"><?php echo _users ?></a></li>
		<li><a href="<?php echo(URL.'holiday'); ?>"><?php echo _holidays ?></a></li>
		<li class="active"><a href="<?php echo(URL.'email'); ?>"><?php echo _email ?></a></li>
		<?php if($this->session->userdata('user_role') === "1") { ?>
		<li><a href="<?php echo(URL.'general'); ?>"><?php echo _general ?></a></li>
		<?php } ?>
	</ul>

	<div id="_settings" class="settings col-lg-12" style="min-height:400px;">
			<div class="settings_header">
				<form action="<?php echo(URL.'email/update/'); ?>" method="post" role="form" data-validate="parsley">
					<div style="float:right">
						<button type="submit" class="btn btn-primary"><?php echo _save ?></button>
						<a href="<?php echo URL.'welcome'; ?>" type="button" class="btn btn-default"><?php echo _back; ?></a>
					</div>

						<h3><?php echo _edit_email ?></h3>

						<div class="col-lg-12">

							<div class="form-group col-lg-2 col-sm-2 col-xs-4">
								<label><?php echo _language ?></label>
								<select name="language" class="form-control">
									<option value="en"><?php echo _english ?></option>
									<option value="ge"><?php echo _german ?></option>
								</select>
							</div>

							<div class="form-group col-lg-10 col-sm-10 col-xs-8">
								<label class="control-label"><?php echo _subject ?></label>
								<input name="subject" class="form-control" placeholder="<?php echo _subject ?>" data-required="true">
							</div>										

							<div class="form-group col-lg-4 col-sm-4 col-xs-4">
								<label class="control-label"><?php echo _treatment ?></label>
								<input name="treatment" class="form-control" placeholder="<?php echo _treatment ?>" data-required="true">
							</div>			

							<div class="form-group col-lg-12 col-sm-12 col-xs-12">
								<label><?php echo _text ?></label>
								<textarea name="text" class="form-control" placeholder="<?php echo _text ?>" data-required="true"></textarea>
							</div>

							<div class="form-group col-lg-6 col-sm-6 col-xs-6" style="float:right">
								<label class="control-label"><?php echo _PS ?></label>
								<input name="ps" class="form-control" placeholder="<?php echo _PS ?>">
							</div>	

						</div>
						
					</form>

					<div class="col-lg-12">
						<h3 class="col-lg-12"><?php echo _variables ?>:</h3>
						<h4 class="col-lg-3">"&lt;firstName&gt;" - <?php echo _guest_first_name ?></h4>
						<h4 class="col-lg-3">"&lt;lastName&gt;" - <?php echo _guest_last_name ?></h4>
						<h4 class="col-lg-3">"&lt;title&gt;" - <?php echo _title ?></h4>
						<h4 class="col-lg-3">"&lt;status&gt;" - <?php echo _status ?></h4>
						<h4 class="col-lg-3">"&lt;tables&gt;" - <?php echo _tables ?></h4>
						<h4 class="col-lg-3">"&lt;number&gt;" - <?php echo _guests ?></h4>
						<h4 class="col-lg-3">"&lt;email&gt;" - <?php echo _email ?></h4>
						<h4 class="col-lg-3">"&lt;phone&gt;" - <?php echo _phone ?></h4>
						<h4 class="col-lg-3">"&lt;author&gt;" - <?php echo _author ?></h4>
						<h4 class="col-lg-3">"&lt;outletID&gt;" - <?php echo _outlet_id ?></h4>
						<h4 class="col-lg-3">"&lt;type&gt;" - <?php echo _type ?></h4>
						<h4 class="col-lg-3">"&lt;provisional&gt;" - <?php echo _provisional ?></h4>
						<h4 class="col-lg-3">"&lt;expieryDate&gt;" - <?php echo _expiery_date ?></h4>
						<h4 class="col-lg-3">"&lt;WB&gt;" - <?php echo _WB ?></h4>
						<h4 class="col-lg-3">"&lt;start&gt;" - <?php echo _start ?></h4>
						<h4 class="col-lg-3">"&lt;end&gt;" - <?php echo _end ?></h4>
						<h4 class="col-lg-3">"&lt;language&gt;" - <?php echo _language ?></h4>
					</div>
			</div>
		</div>


<script>
	$(document).ready(function() {

	});
</script>