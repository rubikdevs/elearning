<?php
/* @var $this PagesController */
/* @var $model Pages */


	$this->breadcrumbs=array(
	'Modules'=>array('modules/index'),
	'Module #'.$model->module_code=>array('modules/view&id='.$model->module_code),
	'Adding Page'
	);
?>
<div class="shortable-content ui-sortable">
	<div class="box _75">
		<div class="box-header">
			Create Pages
		</div>
		<div class="box-content">
			<?php $this->renderPartial('_form', array('model'=>$model,'question'=>$question)); ?>
		</div>
	</div>
</div>