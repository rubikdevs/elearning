<?php
/* @var $this CkeditorController */
/* @var $model Ckeditor */

$this->breadcrumbs=array(
	'Ckeditors'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Ckeditor', 'url'=>array('index')),
	array('label'=>'Create Ckeditor', 'url'=>array('create')),
	array('label'=>'View Ckeditor', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Ckeditor', 'url'=>array('admin')),
);
?>

<h1>Update Ckeditor <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>