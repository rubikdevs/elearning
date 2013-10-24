<?php
/* @var $this CkeditorController */
/* @var $model Ckeditor */

$this->breadcrumbs=array(
	'Ckeditors'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Ckeditor', 'url'=>array('index')),
	array('label'=>'Manage Ckeditor', 'url'=>array('admin')),
);
?>

<h1>Create Ckeditor</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>