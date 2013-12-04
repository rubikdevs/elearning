<?php
/* @var $this AnswerTestController */
/* @var $model AnswerTest */

$this->breadcrumbs=array(
	'Answer Tests'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List AnswerTest', 'url'=>array('index')),
	array('label'=>'Create AnswerTest', 'url'=>array('create')),
	array('label'=>'View AnswerTest', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage AnswerTest', 'url'=>array('admin')),
);
?>

<h1>Update AnswerTest <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>