<?php
/* @var $this PagesController */
/* @var $model Pages */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'pages-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>


	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'page_number'); ?>
		<?php echo $form->textField($model,'page_number'); ?>
		<?php echo $form->error($model,'page_number'); ?>
		<label> image url: <?php echo $model->image_uri ?></label>
	</div>
	<div class="row">
		<?php echo $form->textArea($model, 'description', array('class'=>'ckeditor')); ?>
	</div>
	<div class="box _60 padd-20">
		<div class="box-header"> Question</div>
		<div class="box-content">
			<div class="row">
				<?php echo $form->labelEx($model,'question'); ?>
				<?php echo $form->textArea($model,'question',array('rows'=>6, 'cols'=>50)); ?>
				<?php echo $form->error($model,'question'); ?>
			</div>

			<div class="row">
				<?php echo $form->labelEx($model,'answer'); ?>
				<?php echo $form->textArea($model,'answer',array('rows'=>6, 'cols'=>50)); ?>
				<?php echo $form->error($model,'answer'); ?>
			</div>
		</div>
	</div>
	<?php echo CHtml::link('Upload Image', array('UploadImage', 'module_code'=>$model->module_code)); ?>

	<?php if (isset($model->image_uri)) { ?>
		<img src="<?php echo $model->image_uri ?>" alt="">
		<input type="hidden" value="<?php echo $model->image_uri ?>" id="image_uri">
	<?php } ?>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>
	
	

<?php $this->endWidget(); ?>

</div><!-- form -->