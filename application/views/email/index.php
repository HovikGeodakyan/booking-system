<section class="row m-b-md"></section>

	<ul class="nav nav-tabs settings_tabs">
		<li><a href="<?php echo(URL.'outlet'); ?>">Outlet</a></li>
		<li><a href="<?php echo(URL.'user'); ?>">Users</a></li>
		<li><a href="<?php echo(URL.'holiday'); ?>">Holidays</a></li>
		<li class="active"><a href="<?php echo(URL.'email'); ?>">Email</a></li>
	</ul>

	<div id="_settings" class="settings col-lg-12">
			<div class="settings_header">
				<form action="<?php echo(URL.'email/update/'); ?>" method="post" role="form" data-validate="parsley">
					<div style="float:right">
						<button type="submit" class="btn btn-primary">Save</button>
						<a href="<?php echo URL; ?>" type="button" class="btn btn-default">Back</a>
					</div>

						<h3>Edit email</h3>

						<div class="col-lg-6">

							<div class="form-group">
								<label class="control-label">Title in English</label>
								<input name="email_title_english" class="form-control" placeholder="Title">
							</div>			

							<div class="form-group">
								<label>Text in English</label>
								<textarea name="email_text_english" class="form-control" placeholder="<name><text><guest>"></textarea>
							</div>

						</div>

						<div class="col-lg-6">
							<div class="form-group">
								<label class="control-label">Title in German</label>
								<input name="email_title_german" class="form-control" placeholder="Titel">
							</div>			

							<div class="form-group">
								<label>Text in German</label>
								<textarea name="email_text_german" class="form-control" placeholder="<name><text><guest>"></textarea>
							</div>
						</div>
						
					</form>
			</div>
		</div>


