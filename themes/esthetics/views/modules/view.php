<?php
/* @var $this ModulesController */
/* @var $model Modules */
	
	$modules = Modules::model()->attributeLabels();


?>

<div class="box _75">
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
<div class="_75 padd-10">
<?php echo CHtml::link('<i class="icon-edit"></i>Add Page', array('pages/create', 'module_code'=>'#'),array('class'=>'grey display_but')); ?>
</div>
<div class="box _75">
	<div class="box-header">Pages</div>
	<table class="static_table" style="border:1px solid #dfdfdf">
		<thead>
			<tr>
				<th>Page Number</th>
				<th>Page Title</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
				foreach ($model->pagesT as $page)
				{
					echo '<tr>';
					echo '<td>'.$page->page_number.'</td>';
					echo '<td>fsdflsdkfsldkjflskdjf</td>';
					echo '<td>'
						.CHtml::link('<i class="icon-edit"></i>Edit', array('pages/create', 'module_code'=>'#'),array('class'=>'grey display_but'))
						.CHtml::link('<i class="icon-edit"></i>Delete', array('pages/create', 'module_code'=>'#'),array('class'=>'grey display_but'))
						.'</td>';
					echo '</tr>';
				}
			?>
		</tbody>
	</table>

</div>