<?php
/* @var $this ModulesController */
/* @var $dataProvider CActiveDataProvider */

$this->menu=array(
	array('label'=>'Create Modules', 'url'=>array('create')),
	array('label'=>'Manage Modules', 'url'=>array('admin')),
);

?>

<h1>Modules</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
