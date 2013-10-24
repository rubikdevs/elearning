<?php
/* @var $this CkeditorController */
/* @var $model Ckeditor */

$this->breadcrumbs=array(
	'Ckeditors'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Ckeditor', 'url'=>array('index')),
	array('label'=>'Create Ckeditor', 'url'=>array('create')),
	array('label'=>'Update Ckeditor', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Ckeditor', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Ckeditor', 'url'=>array('admin')),
);
?>

<h1>View Ckeditor #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'description',
	),
)); ?>
