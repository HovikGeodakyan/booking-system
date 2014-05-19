<section class="row m-b-md"></section>

	<?php if($this->session->flashdata('message')) { ?>
		<div class="<?php echo $this->session->flashdata('class') ?>" id="general_settings_message" >	        
			<strong><?php	echo $this->session->flashdata('message'); ?></strong>	
	    </div>
    <?php } ?>


	<ul class="nav nav-tabs settings_tabs">
		<li><a href="<?php echo(URL.'outlet'); ?>"><?php echo _outlets ?></a></li>
		<li><a href="<?php echo(URL.'user'); ?>"><?php echo _users ?></a></li>
		<li><a href="<?php echo(URL.'holiday'); ?>"><?php echo _holidays ?></a></li>
		<li><a href="<?php echo(URL.'email'); ?>"><?php echo _email ?></a></li>

		<?php if($this->session->userdata('user_role') === "1") { ?>
		<li class="active"><a href="<?php echo(URL.'general'); ?>"><?php echo _general ?></a></li>
		<?php } ?>
		
	</ul>

	<div id="_settings" class="settings col-lg-12">
			<div class="settings_header">
				<form action="<?php echo(URL.'general/update/'); ?>" method="post" role="form" data-validate="parsley" enctype="multipart/form-data">
					<div style="float:right">
						<button type="submit" class="btn btn-primary">Save</button>
						<a href="<?php echo URL.'welcome'; ?>" type="button" class="btn btn-default">Back</a>
					</div>

					<h2><?php echo _logo ?></h2>
					<div class="form-group">
						<input type="file" name="logo" value="<?php echo $settings['logo']; ?>">
					</div>
						
				</form>
			</div>
		</div>
	

<script>
	$(document).ready(function () {
		//$('#general_settings_message').fadeOut(3000);
	});
</script>