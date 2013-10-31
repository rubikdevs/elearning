<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'users-assign-form',

	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// See class documentation of CActiveForm for details on this,
	// you need to use the performAjaxValidation()-method described there.
	'enableAjaxValidation'=>false,
)); ?>


	<?php echo $form->errorSummary($model); ?>

	<div class="box _75">
		<div class="box-header">Assign module</div>
		<div class="div box-content">
				<?php

				$options = array();

				/* If admin or module already assigned, wont show option */
				if ($model->user_level<1)                                  
					foreach($modules as $module)
						if(!in_array($module, $model->modules))
							$options[$module->module_code]=$module->module_name;

				if (sizeof($options)<1)
				{	?>
					<div class="form-row">
						There're no modules to assign.
					</div>
					<?php
				}	
				else 
				{	?>
					<div class="form-row">
						<?php echo $form->dropDownList($model,'id', $options); ?>
					</div>
					<div class="form-row">
						<?php echo CHtml::submitButton('Submit'); ?>
					</div>			
				<?php } ?>
		</div>
	</div>
	<br>

<?php $this->endWidget(); ?>