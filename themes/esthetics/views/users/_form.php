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
		     	Create Users
		     </div>
		    <div class="box-content">
		      
				<?php echo $form->errorSummary($model); ?>
		      <div class="form-row">
		       <label for="normal-field"><strong><?php echo $form->labelEx($model,'username'); ?></strong></label>
		       <div class="form-right-col"><?php echo $form->textField($model,'username',array('class'=>'_100F')); ?></div>
		       <?php echo $form->error($model,'username'); ?>
		      </div>
		      
		      <div class="form-row">
		       <label for="password"><strong><?php echo $form->labelEx($model,'password'); ?></strong></label>
		       <div class="form-right-col"><?php echo $form->passwordField($model,'password',array('class'=>'_100F')); ?></div>

					<?php echo $form->error($model,'password'); ?>
		      </div>

		       <div class="form-row">
		       <label for="password"><strong><?php echo $form->labelEx($model,'area'); ?></strong></label>
		       <div class="form-right-col"><?php echo $form->textField($model,'area',array('class'=>'_100F')); ?></div>

					<?php echo $form->error($model,'area'); ?>
		      </div>

		   	<div class="form-row">
		        <label for="select"><strong><?php 			echo $form->labelEx($model,'user_level');?></strong></label>
		        <div class="form-right-col">
		        <?php 


					if (Yii::app()->user->isSuperuser()){
						echo $form->dropDownList($model, 'user_level', 
							array(
								0=>'User',
								1=>'Admin',
							));
					}

					if (Yii::app()->user->isAdmin()){
						echo $form->dropDownList($model, 'user_level', 
							array(
								0=>'User',
							));
					}
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

