<?php
/* @var $this PagesController */
/* @var $model Pages */


$this->menu=array(
	array('label'=>'List Pages', 'url'=>array('index')),
	array('label'=>'Create Pages', 'url'=>array('create')),
	array('label'=>'View Pages', 'url'=>array('view', 'id'=>$model->page_code)),
	array('label'=>'Manage Pages', 'url'=>array('admin')),
);
?>

<h1>Update Pages <?php echo $model->page_code; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>