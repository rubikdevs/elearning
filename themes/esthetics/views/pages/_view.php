<?php
/* @var $this PagesController */
/* @var $data Pages */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('page_code')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->page_code), array('view', 'id'=>$data->page_code)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('page_number')); ?>:</b>
	<?php echo CHtml::encode($data->page_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('module_code')); ?>:</b>
	<?php echo CHtml::encode($data->module_code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('question')); ?>:</b>
	<?php echo CHtml::encode($data->question); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('answer')); ?>:</b>
	<?php echo CHtml::encode($data->answer); ?>
	<br />


</div>