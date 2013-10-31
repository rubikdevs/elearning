<?php
/* @var $this ModulesController */
/* @var $model Modules */

?>

<div class="box _75">
	<div class="box-header">Update Modules <?php echo $model->module_code; ?></div>
	<div class="box-content">
		<?php $this->renderPartial('_form', array('model'=>$model)); ?>
	</div> 
</div>