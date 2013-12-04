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
			echo $question->question;
		?>
		</div>

		<div class="form-row">
			Select the correct answer:
			<div class="padd-10">
			<?php  

			$first = true;
			foreach ($question->answers as $answer) {
				if ($first)
				{
					echo '<div class="padd-5">'.$form->radioButton($_squestion,'answer',array('value'=>$answer->number, 'checked'=>'checked', 'class'=>'radio')).$answer->description.'</div>';
					$first = false;
				} else
					echo '<div class="padd-5">'.$form->radioButton($_squestion,'answer',array('value'=>$answer->number, 'class'=>'radio','uncheckValue'=>null)).$answer->description.'</div>';
			}
			echo $form->error($_squestion, 'answer');

			?>
			</div>
			
		</div>

		<div class="form-row buttons">
				<?php echo CHtml::submitButton($_squestion->isNewRecord ? 'Send' : 'Send'); ?>
		</div>
	</div>
</div>		
<?php $this->endWidget(); ?>