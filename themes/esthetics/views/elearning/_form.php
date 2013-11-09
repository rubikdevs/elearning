<?php
/* @var $this ModulesController */
/* @var $model Modules */
/* @var $form CActiveForm */
?>


<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'question-form',
	'enableAjaxValidation'=>false,
)); ?>

	

		<?php echo $form->textField($question,'description',array('size'=>60,'maxlength'=>300)); ?>
		<?php echo $form->error($question,'description'); ?>
	


		
			<?php echo CHtml::submitButton($question->isNewRecord ? 'Create' : 'Send'); ?>


<?php $this->endWidget(); ?>