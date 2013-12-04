<?php
/* @var $this AnswerTestController */
/* @var $model AnswerTest */

$this->breadcrumbs=array(
	'Answer Tests'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List AnswerTest', 'url'=>array('index')),
	array('label'=>'Create AnswerTest', 'url'=>array('create')),
	array('label'=>'Update AnswerTest', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete AnswerTest', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage AnswerTest', 'url'=>array('admin')),
);
?>

<h1>View AnswerTest #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'question_id',
		'number',
		'description',
	),
)); ?>
