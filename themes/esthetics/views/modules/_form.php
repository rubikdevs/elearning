<?php
/* @var $this ModulesController */
/* @var $model Modules */
/* @var $form CActiveForm */
?>


<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'modules-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	
	<div class="form-row">
		<label for="author">Author: <?php echo Yii::app()->user->name ?></label>
	</div>
	<div class="form-row">
		<label for="" class="normal-field">
			<strong><?php echo $form->labelEx($model,'module_name'); ?></strong>
		</label>
		<div class="form-right-col">
		<?php echo $form->textField($model,'module_name',array('size'=>60,'maxlength'=>300)); ?>
		<?php echo $form->hiddenField($model,'creator',array('value'=>Yii::app()->user->name)); ?>
		<?php echo $form->error($model,'module_name'); ?>
		</div>
	</div>
	

	<div class="form-row buttons">
		
			<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>