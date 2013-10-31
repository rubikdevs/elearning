<?php
/* @var $this ModulesController */
/* @var $model Modules */
	
	$modules = Modules::model()->attributeLabels();


?>

<div class="box _50">
	<div class="box-header">View Modules #1</div>
	<table class="static_table" style="border:1px solid #dfdfdf">
		<tbody>
			<tr>
				<td><?php echo $modules['module_code'] ?></td>
				<td><?php echo $model->module_code; ?></td>
			</tr>
			<tr>
				<td><?php echo $modules['module_name'] ?></td>
				<td><?php echo $model->module_name; ?></td>
			</tr>
			<tr>
				<td><?php echo $modules['create_date'] ?></td>
				<td><?php echo $model->create_date; ?></td>
			</tr>
			<tr>
				<td><?php echo $modules['sort_order'] ?></td>
				<td><?php echo $model->sort_order; ?></td>
			</tr>
			<tr>
				<td>Users assigned</td>
				<td><?php
					$toBeTrimmed ='';
					foreach ($model->users as $user) 
						 $toBeTrimmed .= $user->username.', ';
					echo rtrim($toBeTrimmed,',');
				?></td>
			</tr>
		</tbody>
	</table>
</div>