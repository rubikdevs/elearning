<?php
/* @var $this CkeditorController */
/* @var $model Ckeditor */
?>

<h1>View Ckeditor #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id'	
	),
)); ?>
