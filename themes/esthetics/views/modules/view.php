<?php
/* @var $this ModulesController */
/* @var $model Modules */



?>

<h1>View Modules #<?php echo $model->module_code; ?></h1>


<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'module_code',
		'module_name',
		'creator',
		'create_date',
	)
)); ?>
<h2>Users assigned</h2>

<?php 
	foreach($model->users as $user)
		echo $user->username.', ';
	?>