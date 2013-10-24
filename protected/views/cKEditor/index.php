<?php
/* @var $this CkeditorController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ckeditors',
);

$this->menu=array(
	array('label'=>'Create Ckeditor', 'url'=>array('create')),
	array('label'=>'Manage Ckeditor', 'url'=>array('admin')),
);
?>

<h1>Ckeditors</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
