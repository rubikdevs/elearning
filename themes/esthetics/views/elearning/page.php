<?php
/* @var $this ElearningController */

//$this->breadcrumbs=array(
//	'Elearning'=>array('/elearning'),
//	'Page',
//);
?>
<div class="non-shortable-content">
     <h1><?php echo $page->title ?></h1>
 </div>
<div class="box _50">
	<div class="box-header">Image</div>
	<div class="box-content padd-10">
		<img src="<?php echo $page->image_uri ?>" class="_100">
	</div>
</div>
<div class="box _50">
<div class="box-header">Description</div>
<div class="box-content padd-10">
	<?php echo $page->description; ?>
</div>
</div>

<?php
		if ($status)
			echo CHtml::link('Next',array('elearning/page', 'module'=>$page->module_code, 'page_number'=>$page->page_number+1),array('class'=>'float_r button'));
		else 
			echo CHtml::link('Question',array('elearning/qa', 'page_code'=>$page->page_code),array('class'=>'float_r button'));
	?>