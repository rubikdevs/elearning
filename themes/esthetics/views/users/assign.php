<?php
/* @var $this UsersController */
/* @var $model Users */
/* @var $modules MODULS */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'users-assign-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// See class documentation of CActiveForm for details on this,
	// you need to use the performAjaxValidation()-method described there.
	'enableAjaxValidation'=>false,
)); ?>


	<?php echo $form->errorSummary($model); ?>
	<h2>Assigning module to <?php echo $model->username;?></h2>
	<div class="row">
		<?php

			$options = array();

			/* If admin or module already assigned, wont show option */
			if ($model->user_level<1)                                  
				foreach($modules as $module)
					if(!in_array($module, $model->modules))
						$options[$module->module_code]=$module->module_name;

			if (sizeof($options)<1)
				echo "There's no modules to assign.";
			else{
				echo $form->dropDownList($model,'id', $options);
				echo '</div><div class="row buttons">';
				echo CHtml::submitButton('Submit');

			}


		?>
	</div>


<?php $this->endWidget(); ?>

</div><!-- form -->