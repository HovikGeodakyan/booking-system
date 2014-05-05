<section class="row m-b-md">
</section>

	<?php if($this->session->flashdata('message')) { ?>
		<div class="alert alert-success" id="users_message" >	        
			<strong><?php	echo $this->session->flashdata('message'); ?></strong>			
	    </div>
    <?php } ?>

<!-- 	Users -->
	<ul class="nav nav-tabs settings_tabs">
		<li><a href="<?php echo(URL.'outlet'); ?>">Outlet</a></li>
		<li class="active"><a href="<?php echo(URL.'user'); ?>">Users</a></li>
		<li><a href="<?php echo(URL.'holiday'); ?>">Holidays</a></li>
		<li><a href="<?php echo(URL.'email'); ?>">Email</a></li>
	</ul>
	<div id="_settings" class="settings">
		<div class="settings_header">
			<div class="crud">
				<a href="<?php echo(URL.'user/newusr'); ?>" type="button" class="btn btn-primary btn-sm">Add</a>
				<a href="<?php echo URL.'welcome'; ?>" type="button" class="btn btn-default btn-sm">Back</a>
			</div>
			<h3 class="m-b-xs text-black">Users</h3>
		</div>
		<div class="settings_content table-responsive">
			<table class="table table-striped b-t b-light" id="user_table">
				<thead>
					<tr>
						<th class="th-sortable" data-toggle="class">#</th>						
						<th class="th-sortable" data-toggle="class">Login</th>						
						<th class="th-sortable" data-toggle="class">Name</th>						
						<th class="th-sortable" data-toggle="class">Email</th>						
						<th class="th-sortable" data-toggle="class">Type</th>
						<th class="th-sortable" data-toggle="class">Last logged in</th>													
						<th class="th-sortable" data-toggle="class">Date modified</th>													
						<th>Active</th>
						<th width="30">Delete</th>
					</tr>
                    </thead>
                    <tbody>
                    <?php 
						$i=1;
						foreach($users as $usr){
							switch($usr['user_role']){
								case 1: $role="SuperAdmin";    
								break;
								case 2: $role="Admin";   
								break;
								case 3: $role="Manager"; 
								break;
								case 4: $role="Waiter";  
								break;
								case 5: $role="User";    
								break;
								case 6: $role="Guest";  
								break;
								default:
								 $role = "SuperAdmin";
							}

							echo "<tr>";
							echo "<td>".$i."</td>"; $i++;
							echo "<td><a href='".URL."user/edit/".$usr["user_id"]."'>".$usr["user_name"]."</a></td>";
							echo "<td>".$usr["user_real_name"]."</td>";
							echo "<td>".$usr["user_email"]."</td>";
							echo "<td>".$role."</td>";
							echo "<td>".$usr["user_last_login"]."</td>";
							echo "<td>".$usr["user_modified"]."</td>";
							
							$check="";
							if($usr["user_if_active"]==1){
								$check="checked";
							}

							echo '<td class="i-checks" style="text-align:center"><input type="checkbox" '.$check.' disabled><i></i></td>';
							echo '<td><a href="'.URL."user/delete/".$usr["user_id"].'" class="confirm"><div class="delete_button" style="background-image:url('.IMG.'/delete.png)"></div></a></td>';
							echo "</tr>";
						}
					?>
				</tbody>
			</table>
		</div>
	</div>
	


<!-- Modal -->
<div class="modal fade custom-modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel">Are yo sure?</h4>
			</div>
			<div class="modal-body">
				<button type="button" id="confirm_remove" class="btn btn-primary">Yes</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">No</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->



<script>
	$(document).ready(function () {
		$('#users_message').fadeOut();
	});
</script>