<?php
/* @var $this AnswerTestController */
/* @var $model AnswerTest */

$this->breadcrumbs=array(
	'Answer Tests'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List AnswerTest', 'url'=>array('index')),
	array('label'=>'Manage AnswerTest', 'url'=>array('admin')),
);
?>

<h1>Create AnswerTest</h1>



<?php 
	if (isset($message))
		$this->renderPartial('_error_unique', array('message'=>$message));

	$this->renderPartial('_form', array('model'=>$model,'q_id'=>$q_id)); ?>