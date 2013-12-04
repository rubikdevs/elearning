<?php
/* @var $this AnswerTestController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Answer Tests',
);

$this->menu=array(
	array('label'=>'Create AnswerTest', 'url'=>array('create')),
	array('label'=>'Manage AnswerTest', 'url'=>array('admin')),
);
?>

<h1>Answer Tests</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
