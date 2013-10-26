<?php
/* @var $this UsersController */
/* @var $model Users */



$this->menu=array(
	array('label'=>'List Users', 'url'=>array('index')),
	array('label'=>'Manage Users', 'url'=>array('admin')),
);
?>
	<?php $this->renderPartial('_form', array('model'=>$model)); ?>
