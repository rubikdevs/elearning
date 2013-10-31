<?php
/* @var $this PagesController */
/* @var $model Pages */



$this->menu=array(
	array('label'=>'List Pages', 'url'=>array('index')),
	array('label'=>'Manage Pages', 'url'=>array('admin')),
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