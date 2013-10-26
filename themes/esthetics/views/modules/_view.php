<?php
/* @var $this ModulesController */
/* @var $data Modules */
?>

<div class="box _33">
	<div class="box-header">
	</div>
	<div class="box-content">
		<div class="box-row">
		<b><?php echo CHtml::encode($data->getAttributeLabel('module_code')); ?>:</b>
		<?php echo CHtml::link(CHtml::encode($data->module_code), array('view', 'id'=>$data->module_code)); ?>
		<br />	
		</div>
		<b><?php echo CHtml::encode($data->getAttributeLabel('module_name')); ?>:</b>
		<?php echo CHtml::encode($data->module_name); ?>
		<br />

		<b><?php echo CHtml::encode($data->getAttributeLabel('creator')); ?>:</b>
		<?php echo CHtml::encode($data->creator); ?>
		<br />

		<b><?php echo CHtml::encode($data->getAttributeLabel('create_date')); ?>:</b>
		<?php echo CHtml::encode($data->create_date); ?>
		<br />
	</div>
	</div>
	<?php echo CHtml::link('ADD PAGE', array('pages/create', 'module_code'=>$data->module_code)); ?>
</div>