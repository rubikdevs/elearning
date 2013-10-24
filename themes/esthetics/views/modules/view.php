<?php
/* @var $this ModulesController */
/* @var $model Modules */

$this->breadcrumbs=array(
	'Modules'=>array('index'),
	$model->module_code,
);

$this->menu=array(
	array('label'=>'List Modules', 'url'=>array('index')),
	array('label'=>'Create Modules', 'url'=>array('create')),
	array('label'=>'Update Modules', 'url'=>array('update', 'id'=>$model->module_code)),
	array('label'=>'Delete Modules', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->module_code),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Modules', 'url'=>array('admin')),
);
?>

<h1>View Modules #<?php echo $model->module_code; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'module_code',
		'module_name',
		'creator',
		'create_date',
	),
)); ?>
