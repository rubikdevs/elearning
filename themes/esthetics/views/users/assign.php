<?php
/* @var $this UsersController */
/* @var $model Users */
/* @var $modules MODULS */
/* @var $form CActiveForm */

?>



<div class="form non-shortable-content">
	<h1>Assignment for <b> <?php echo $model->username;?></b></h1>
	 <?php $this->renderPartial('_assignform', array('model'=>$model,'modules'=>$modules)); ?>

	<?php $this->renderPartial('_unassignform', array('model'=>$model,'modules'=>$modules,'selModules'=>$selModules)); ?>
</div><!-- form -->