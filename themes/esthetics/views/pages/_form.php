<?php
/* @var $this PagesController */
/* @var $model Pages */
/* @var $form CActiveForm */
/* @var $questions */
?>



	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'pages-form',
		// Please note: When you enable ajax validation, make sure the corresponding
		// controller action is handling ajax validation correctly.
		// There is a call to performAjaxValidation() commented in generated controller code.
		// See class documentation of CActiveForm for details on this.
		'enableAjaxValidation'=>false,
	)); ?>


	<?php echo $form->errorSummary($model); ?>
	<div class="form-row">
		<label for="description">
			<strong><?php echo $form->labelEx($model,'title'); ?></strong>
		</label>
		<div class="form-right-col">
			<?php echo $form->textField($model,'title'); ?>
		</div>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="form-row">
		<?php 
		if ((!isset($model->image_uri)) or ($model->image_uri==""))
		{?>
			<label for="image_uri">
				Image:
			</label>
			<div class="form-right-col">
				<?php echo CHtml::link('<i class="icon-upload"></i>Upload', array('UploadImage', 'module_code'=>$model->module_code, 'action'=>Yii::app()->controller->action->id, 'page_code'=>$model->page_code), array('class'=>'grey display_but')); ?>
			</div>
		<?php } else { ?>
			<label for="image_uri">
			Image Url:
			</label>
			<div class="form-right-col">
				<?php echo $model->image_uri ?>
			</div>
			<img src="<?php echo $model->image_uri ?>" alt="" class="_100">
			<input type="hidden" value="<?php echo $model->image_uri ?>" id="image_uri">
		<?php } ?>


	</div>

	<div class="form-row">
		<?php echo $form->textArea($model, 'description', array('class'=>'ckeditor')); ?>
	</div>

	
	<div class="form-row">
		<label for="description">
			<strong><?php echo $form->labelEx($question,'description'); ?></strong>
		</label>
		<div class="form-right-col">
			<?php echo $form->textArea($question,'description',array('rows'=>2, 'cols'=>50, 'class'=>'100F')); ?>
		</div>
		<?php echo $form->error($question,'description'); ?>
	</div>


	<div class="form-row">
		<label for="description">
			<strong><?php echo $form->labelEx($question,'correct_answer'); ?></strong>
		</label>
		<div class="form-right-col">
			<?php echo $form->textArea($question,'correct_answer',array('rows'=>2, 'cols'=>50, 'class'=>'100F')); ?>
		</div>
		<?php echo $form->error($question,'correct_answer'); ?>
	</div>
	

	<div class="form-row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>
	

<?php $this->endWidget(); ?>
