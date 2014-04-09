<section class="row m-b-md">
</section>

<ul class="nav nav-tabs settings_tabs">
	<li><a href="<?php echo(URL.'outlet'); ?>">Outlet</a></li>
	<li class="active"><a href="<?php echo(URL.'user'); ?>">Users</a></li>
</ul>
<div id="users_settings" class="settings">
	<div class="settings_header">
			<div class="outlet_crud">
				<a href="#" class="btn btn-icon b-2x btn-default btn-rounded hover">Add</a>
				<a href="#nav, #sidebar" class="btn btn-icon b-2x btn-info btn-rounded">Back</a>
			</div>
			<h3 class="m-b-xs text-black">Users</h3>
		</div>
		<div class="settings_content">
			<table>
				<thead>
					<tr>
						<th>ID</th>
						<th>Login</th>
						<th>Name</th>
						<th>Email</th>
						<th>Type</th>
						<th>Active</th>
						<th>Time</th>
						<th>Delete</th>
					</tr>			
				</thead>
				<tbody>
				<?php 
					foreach($users as $usr){
						echo "<tr>";
						echo "<td>".$usr["user_id"]."</td>";
						echo "<td><a href='".URL."user/edit/".$usr["user_id"]."'>".$usr["user_name"]."</a></td>";
						echo "<td>".$usr["user_real_name"]."</td>";
						echo "<td>".$usr["user_email"]."</td>";
						echo "<td>".$usr["user_role"]."</td>";
						echo "<td>".$usr["user_if_active"]."</td>";
						echo "<td>".$usr["user_time"]."</td>";
						echo "<td><div id='user_delete_button'></div></td>";
						echo "</tr>";
					}
				?>
				</tbody>
			</table>
		</div>
	</div>

