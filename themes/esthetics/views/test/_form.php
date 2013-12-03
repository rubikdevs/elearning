<?php
/* @var $this UsersController */
/* @var $model Users */
/* @var $form CActiveForm */
?>


<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'users-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>


    
  <div class="shortable-content">
  
  
		  <div class="box _50">
		    <div class="box-header">
		     	Add Question
		     </div>
		    <div class="box-content">
		      


		     <div class="form-row">
		       <label for="password"><strong><?php echo $form->labelEx($model,'question'); ?></strong></label>
		       <div class="form-right-col"><?php echo $form->textField($model,'question',array('class'=>'_100F')); ?></div>

					<?php echo $form->error($model,'question'); ?>
		     </div>

  			<div class="form-row">
		       <label for="password"><strong><?php echo $form->labelEx($model,'correct_answer'); ?></strong></label>
		       <div class="form-right-col"><?php echo $form->textField($model,'correct_answer',array('class'=>'_100F')); ?></div>

					<?php echo $form->error($model,'correct_answer'); ?>
		      </div>


		   	<div class="form-row">
		        <label for="select"><strong><?php 			echo $form->labelEx($model,'user_level');?></strong></label>
		        <div class="form-right-col">
		        <?php 

					echo $form->dropDownList($model, 'category', 
						array(
							'Product Knowledge'=>'Product Knowledge',
							'Customer Handling'=>'Customer Handling',
						));
					?>
		        </div>
		      </div>
		      

		      <div class="form-row">
		      <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
		      </div>
		      <?php $this->endWidget(); ?>
		    </div>
		  </div>  <!-- FORMS ENDS HERE-->
 
	</div><!-- SORTABLE ENDS HERE -->

