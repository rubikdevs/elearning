<?php
/* @var $this PagesController */
/* @var $model Pages */

	$this->breadcrumbs=array(
	'Module #'.$model->module_code=>array('modules/view&id='.$model->module_code),
	'Updating Page #'.$model->page_code
	);
?>



<div class="shortable-content ui-sortable">
	<div class="box _75">
		<div class="box-header">
			Updating Page #<?php echo $model->page_code; ?>
		</div>
		<div class="box-content">
			<?php $this->renderPartial('_form', array('model'=>$model,'question'=>$question)); ?>
		</div>
	</div>
</div>