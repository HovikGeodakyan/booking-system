<section class="row m-b-md"></section>

	<ul class="nav nav-tabs settings_tabs">
		<li><a href="<?php echo(URL.'outlet'); ?>">Outlet</a></li>
		<li><a href="<?php echo(URL.'user'); ?>">Users</a></li>
		<li class="active"><a href="<?php echo(URL.'holiday'); ?>">Holidays</a></li>
	</ul>

	<div id="_settings" class="settings">
		<div class="settings_header">
			<form id="new_holiday" class="col-lg-12" method="post" action="<?php echo(URL.'holiday/create/'); ?>">
				<div class="crud">
					<input type="submit" class="add_holiday btn btn-primary btn-sm" value="Save" />
					<a type="button" class="add_holiday btn btn-success btn-sm">Add</a>					
					<a class="back_button btn btn-default btn-sm" href="<?php echo URL; ?>">Back</a>
				</div>
			</form>
			<h3 class="m-b-xs text-black">Existing holidays</h3>
		</div>
		<div class="settings_content table-responsive">
			<table class="table table-striped b-t b-light" id="tableEdit">
				<thead>
					<tr>
						<th class="th-sortable" data-toggle="class">#</th>						
						<th class="th-sortable" data-toggle="class">Name</th>
						<th class="th-sortable" data-toggle="class">Start</th>					
						<th class="th-sortable" data-toggle="class">End</th>						
						<th class="th-sortable" data-toggle="class">Message</th>
						<th width="30">Edit</th>									
						<th width="30">Delete</th>
					</tr>
                    </thead>
                    <tbody>
                    <?php 
						$i=1;
						foreach($holidays as $hol) {							
							echo "<tr>";
							echo "<td>".$i."</td>"; $i++;
							echo "<td style='display:none' ref='type:number, name:id, class:form-control, id:idId'>".$hol['id']."</td>";
							echo "<td ref='type:text, name:name, class:form-control, id:nameId'>".$hol['name']."</td>";
							echo "<td ref='type:date, name:start, class:form-control, id:startId'>".$hol['start_date']."</td>";
							echo "<td ref='type:date, name:end, class:form-control, id:endId'>".$hol['end_date']."</td>";
							echo "<td ref='type:text, name:message, class:form-control, id:messageId'>".$hol['message']."</td>";
							echo '<td><a href="javascript:;" class="btEdit btn btn-success">Edit</a></td>';
							echo '<td><a href="'.URL."holiday/delete/".$hol["id"].'" class="confirm"><div class="delete_button" style="background-image:url('.IMG.'/delete.png)"></div></a></td>';
							echo "</tr>";
						}
					?>
				</tbody>
			</table>
			<div  id="edittable2"></div>
		</div>
	</div>


	<script src="<?php echo(JS.'holiday/holiday_edit_new.js'); ?>"></script>