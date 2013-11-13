<h1>QUESTION</h1>
<?php 
	echo $question->description;
?>
<h1>Write Answer</h1>

<?php $this->renderPartial('_form', array('question'=>$question)); ?>