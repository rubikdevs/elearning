<?php
/* @var $this ElearningController */
$this->breadcrumbs=array(
	'Elearning',
);
?>
<div class="box _75">
	<div class="box-header">Your modules</div>
	<table class="static_table" style="border:1px solid #dfdfdf">
	<thead>
		<th>Module Name</th>
		<th>Last Page</th>
		<th>Learn</th>
	</thead>
	<tbody>
		<?php
		/*var_dump($modules);die;
		foreach ($modules as $i=>$module) {
			if ($user->modules[$i]->pagesCount >0)
			{
				echo '<tr>';
				echo '<td>'.$user->modules[$i]->module_name.'</td>';
				echo '<td>'.$module->last_page.'</td>';
				if($module->status == 1)
					echo '<td> FINISHED </td>';
				else
					echo '<td>'.CHtml::link('Go', array('elearning/page', 'module'=>$module->module_id, 'page_number'=>$module->last_page)).'</td>';
				echo '</tr>';
			}
		}*/

		foreach ($modules as $i=>$module_assignment)
		{
			$module = Modules::model()->findByPk($module_assignment->module_id);
			if ($module->pagesCount >0)
			{
				echo '<tr>';
				echo '<td>'.$module->module_name.'</td>';
				echo '<td>'.$module_assignment->last_page.'</td>';
				if($module_assignment->status == 1)
					echo '<td> Finished ('.
						CHtml::link('View',array('elearning/page', 'module'=>$module_assignment->module_id, 'page_number'=>1))
						.') </td>';
				elseif ($this->isFirstAssignment($modules,$module))
					echo '<td>'.CHtml::link('Learn', array('elearning/page', 'module'=>$module_assignment->module_id, 'page_number'=>$module_assignment->last_page)).'</td>';
				else
					echo '<td>Learn</td>';
				echo '</tr>';
			}

		}
		?>
	</tbody>
	</table>
</div>
