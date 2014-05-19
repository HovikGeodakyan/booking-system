<section class="row m-b-md">
</section>

	<?php if($this->session->flashdata('message')) { ?>
		<div class="alert alert-success" id="users_message" >	        
			<strong><?php	echo $this->session->flashdata('message'); ?></strong>			
	    </div>
    <?php } ?>

<!-- 	Users -->
	<ul class="nav nav-tabs settings_tabs">
		<li><a href="<?php echo(URL.'outlet'); ?>"><?php echo _outlets ?></a></li>
		<li class="active"><a href="<?php echo(URL.'user'); ?>"><?php echo _users ?></a></li>
		<li><a href="<?php echo(URL.'holiday'); ?>"><?php echo _holidays ?></a></li>
		<li><a href="<?php echo(URL.'email'); ?>"><?php echo _email ?></a></li>
		<?php if($this->session->userdata('user_role') === "1") { ?>
		<li><a href="<?php echo(URL.'general'); ?>"><?php echo _general ?></a></li>
		<?php } ?>
		
	</ul>
	<div id="_settings" class="settings">
		<div class="settings_header">
			<div class="crud">
				<a href="<?php echo(URL.'user/newusr'); ?>" type="button" class="btn btn-primary btn-sm"><?php echo _add ?></a>
				<a href="<?php echo URL.'welcome'; ?>" type="button" class="btn btn-default btn-sm"><?php echo _back ?></a>
			</div>
			<h3 class="m-b-xs text-black"><?php echo _users ?></h3>
		</div>
		<div class="settings_content table-responsive">
			<table class="table table-striped b-t b-light" id="user_table">
				<thead>
					<tr>
						<th class="th-sortable" data-toggle="class">#</th>						
						<th class="th-sortable" data-toggle="class"><?php echo _login ?></th>						
						<th class="th-sortable" data-toggle="class"><?php echo _name ?></th>						
						<th class="th-sortable" data-toggle="class"><?php echo _email ?></th>						
						<th class="th-sortable" data-toggle="class"><?php echo _type ?></th>
						<th class="th-sortable" data-toggle="class"><?php echo _last_logged_in ?></th>													
						<th class="th-sortable" data-toggle="class"><?php echo _date_modifyed ?></th>													
						<th><?php echo _active ?></th>
						<th width="30"><?php echo _delete ?></th>
					</tr>
                    </thead>
                    <tbody>
                    <?php 
						$i=1;
						foreach($users as $usr){
							switch($usr['user_role']){
								case 1: $role=_superadmin;    
								break;
								case 2: $role=_admin;   
								break;
								case 3: $role=_manager; 
								break;
								case 4: $role=_waiter;  
								break;
								case 5: $role=_user;    
								break;
								case 6: $role=_guest;  
								break;
								default:
								 $role = _superadmin;
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
				<h4 class="modal-title" id="myModalLabel"><?php echo _are_you_sure ?></h4>
			</div>
			<div class="modal-body">
				<button type="button" id="confirm_remove" class="btn btn-primary"><?php echo _yes ?></button>
				<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo _no ?></button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->



<script>
	$(document).ready(function () {
		$('#users_message').fadeOut();
	});
</script>