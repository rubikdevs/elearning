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

	<img src="<?php echo $page->image_uri ?>" class="_50">

<div class="_50 float_r">
	<?php echo $page->description; ?>
</div>

<?php
		//if ($status)
		///	echo CHtml::link('Next',array('elearning/page', 'module'=>$page->module_code, 'page_number'=>$page->page_number+1),array('class'=>'float_r button'));
		//else 
		//{	
			echo CHtml::link('Next',array('elearning/qa', 'page_code'=>$page->page_code),array('class'=>'float_r button','id'=>'page-timer'));
			?>

			<script type="text/javascript" >
				var downloadButton = document.getElementById("page-timer");
				var counter = 5;
				var newElement = document.createElement("p");
				newElement.className = "float_r";
				newElement.innerHTML = "You can continue in 90 seconds.";
				var id;

				downloadButton.parentNode.replaceChild(newElement, downloadButton);

				id = setInterval(function() {
				    counter--;
				    if(counter < 0) {
				        newElement.parentNode.replaceChild(downloadButton, newElement);
				        clearInterval(id);
				    } else {
				        newElement.innerHTML = "You can continue in " + counter.toString() + " seconds.";
				    }
				}, 1000);
			</script>
			<?
			
		//}
	?>
<script type="text/javascript" >

</script>