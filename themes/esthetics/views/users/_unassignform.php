<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'users-unassign-form',
		'action' => $this->createUrl('users/unassign&id='.$model->id),
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// See class documentation of CActiveForm for details on this,
	// you need to use the performAjaxValidation()-method described there.
	'enableAjaxValidation'=>false,
)); ?>


	<?php echo $form->errorSummary($model); ?>

	<div class="box _75">
		<div class="box-header">Unassign module</div>
		<div class="box-content">
		<?php

			$options = array();

			/* If admin or module already assigned, wont show option */
			if ($model->user_level<1)                                  
				foreach($modules as $module)
					if(in_array($module, $model->modules))
						$options[$module->module_code]=$module->module_name;

			if (sizeof($options)<1)
				echo '<div class="form-row">There\'re no modules to unassign.';
			else{ ?>
				
				<table class="static_table">
				<thead>
					<th>Module Name</th>
					<th>Creator</th>
					<th>Action</th>
				</thead>
				<tbody>
				<?php
				$name = array();

				

					foreach($modules as $mod)
						$name[$mod->module_code]=$mod->module_name;

					foreach($selModules as $module)
					{
						echo '<tr><td>'.$name[$module->module_id].'</td><td>'.$module->creator.'</td><td style="text-align:center">';
						echo CHtml::link('<i class="icon-trash"></i>Delete', array('unassign',
							'user_id'=>CHtml::encode($module->user_id),
							'module_id'=>$module->module_id
						), array('class'=>'grey display_but'));
						echo '</td></tr>';
					}

				

				?>
				</tbody>
			</table>
			<?php

			}

	

		?>
	</div>
	</div>


<?php $this->endWidget(); ?>