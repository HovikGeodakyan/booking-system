<section class="row m-b-md"></section>

	<ul class="nav nav-tabs settings_tabs">
		<li><a href="<?php echo(URL.'outlet'); ?>"><?php echo _outlets ?></a></li>
		<li><a href="<?php echo(URL.'user'); ?>"><?php echo _users ?></a></li>
		<li class="active"><a href="<?php echo(URL.'holiday'); ?>"><?php echo _holidays ?></a></li>
		<li><a href="<?php echo(URL.'email'); ?>"><?php echo _email ?></a></li>
		<?php if($this->session->userdata('user_role') === "1") { ?>
		<li><a href="<?php echo(URL.'general'); ?>"><?php echo _general ?></a></li>
		<?php } ?>
	</ul>

	<div id="_settings" class="settings">
		<div class="settings_header">
			<form id="new_holiday" class="col-lg-12" method="post" action="<?php echo(URL.'holiday/create/'); ?>">
				<div class="crud">
					<input type="submit" class="save_holiday btn btn-primary btn-sm" value="Save" />
					<a type="button" class="add_holiday btn btn-success btn-sm"><?php echo _add; ?></a>					
					<a class="back_button btn btn-default btn-sm" href="<?php echo URL.'welcome'; ?>"><?php echo _back; ?></a>
				</div>
			</form>
			<h3 class="m-b-xs text-black"><?php echo _existing_holidays; ?></h3>
		</div>
		<div class="settings_content table-responsive">
			<table class="table table-striped b-t b-light" id="tableEdit">
				<thead>
					<tr>
						<th class="th-sortable" data-toggle="class" width="30">#</th>						
						<th class="th-sortable" data-toggle="class"><?php echo _name; ?></th>
						<th class="th-sortable" data-toggle="class"><?php echo _start; ?></th>					
						<th class="th-sortable" data-toggle="class"><?php echo _end; ?></th>						
						<th class="th-sortable" data-toggle="class"><?php echo _message; ?></th>
						<th width="30"><?php echo _edit; ?></th>									
						<th width="30"><?php echo _delete; ?></th>
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
							echo "<td ref='type:date, name:start, class:form-control, id:startId'>".$hol['start']."</td>";
							echo "<td ref='type:date, name:end, class:form-control, id:endId'>".$hol['end']."</td>";
							echo "<td ref='type:text, name:message, class:form-control, id:messageId'>".$hol['message']."</td>";
							echo '<td><a href="javascript:;" class="btEdit btn btn-success">Edit</a></td>';
							echo '<td><a href="'.URL."holiday/delete/".$hol["id"].'" class="confirm"><div class="delete_button" style="background-image:url('.IMG.'/delete.png)"></div></a></td>';
							echo "</tr>";
						}
					?>
				</tbody>
			</table>
			
		</div>
	</div>

	<script>
		var holiday = '';
		holiday += '<div class="col-lg-12 col-xs-12 col-sm-12 form-group">';
			holiday += '<input name="id[]" type="hidden" />';
			holiday += '<div class="col-lg-2 col-xs-4 col-sm-4 form-group">';
				holiday += '<label for="name"><?php echo _name; ?></label>';
				holiday += '<input name="name[]" type="text" class="form-control">';
			holiday += '</div>';
			holiday += '<div class="col-lg-2 col-xs-4 col-sm-4 form-group">';
				holiday += '<label for="start"><?php echo _start; ?></label>';
				holiday += '<input name="start[]" class="form-control holiday_start">';
			holiday += '</div>';
			holiday += '<div class="col-lg-2 col-xs-4 col-sm-4 form-group">';
				holiday += '<label ><?php echo _end; ?></label>';
				holiday += '<input name="end[]" class="form-control holiday_end">';
			holiday += '</div>';
			holiday += '<div class="col-lg-4 col-xs-8 col-sm-8 form-group">';
				holiday += '<label for="message"><?php echo _message; ?></label>';
				holiday += '<input name="message[]" type="text" class="form-control">';
			holiday += '</div>';
			holiday += '<div class="col-lg-2 col-xs-4 col-sm-4 form-group">';
				holiday += '<label class="control-label"><?php echo _delete; ?></label>';
				holiday += '<br><button class="remove_holiday btn btn-danger" type="button"><i class="fa fa-minus"></i></button>';
			holiday += '</div>';
		holiday += '</div>';
	</script>
	<script src="<?php echo(JS.'holiday/holiday_edit_new.js'); ?>"></script>