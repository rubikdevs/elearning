<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'question-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); 

	$_squestion = new SubmittedTest;
?>
<div class="box _75">
	<div class="box-header">Question #<?php echo $page; ?></div>
	<div class="box-content">
		<div class="form-row">
		<?php
			echo $question;
		?>
		</div>


		<div class="form-row">
			<label for="" class="normal-field">
				<strong>Answer</strong>
			</label>
			<div class="form-right-col">
			<?php echo $form->textField($_squestion,'answer',array('size'=>60,'maxlength'=>300)); ?>
			<?php echo $form->error($_squestion,'answer'); ?>
			</div>
		</div>

		<div class="form-row buttons">
				<?php echo CHtml::submitButton($_squestion->isNewRecord ? 'Send' : 'Send'); ?>
		</div>
	</div>
</div>		
<?php $this->endWidget(); ?>