<?php
/* @var $this ElearningController */
/* @var $user USERS */
	$user = Users::model()->findByPk(Yii::app()->user->getId());

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
		foreach ($user->UserModuleAssignment as $i=>$module) {
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
		}

		?>
	</tbody>
	</table>
</div>
