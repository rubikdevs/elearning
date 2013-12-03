<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'modules-report',
	'enableAjaxValidation'=>false,
)); echo $message;?>
	
	
	<div class="form-row">
		<label for="" class="normal-field">
			<strong><?php echo $form->labelEx($userForm,'username'); ?></strong>
		</label>
		<div class="form-right-col">
		<?php echo $form->textField($userForm,'username',array('size'=>60,'maxlength'=>300)); ?>
		<?php echo $form->error($userForm,'username'); ?>
		</div>
	</div>
	<div class="form-row buttons">
		
			<?php echo CHtml::submitButton($userForm->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>