<?php
/* @var $this ModulesController */
/* @var $model Modules */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'modules-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	
	<div class="row">
		<h3>Autor: <?php echo Yii::app()->user->name ?></h3>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'module_name'); ?>
		<?php echo $form->textField($model,'module_name',array('size'=>60,'maxlength'=>300)); ?>
		<?php echo $form->hiddenField($model,'creator',array('value'=>Yii::app()->user->name)); ?>
		<?php echo $form->error($model,'module_name'); ?>
	</div>
	

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->