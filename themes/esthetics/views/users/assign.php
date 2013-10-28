<?php
/* @var $this UsersController */
/* @var $model Users */
/* @var $modules MODULS */
/* @var $form CActiveForm */

?>



<div class="form">
	<h2>Assigning module to <?php echo $model->username;?></h2>
	 <?php $this->renderPartial('_assignform', array('model'=>$model,'modules'=>$modules)); ?>
	 <h2>Unassign module</h2>
	<?php $this->renderPartial('_unassignform', array('model'=>$model,'modules'=>$modules)); ?>
</div><!-- form -->