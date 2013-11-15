<div class="non-shortable-content">
	<input value="Go Back" type="submit" class="grey" onclick="window.history.back()">
      
  </div>
<div class="box _75">
<div class="box-header">Question</div>
<div class="box-content padd-20">
<?php 
	echo $question->description;
?>
</div>
</div>

<div class="box _75">
<div class="box-header">Write Answer</div>
<div class="box-content padd-20">
<?php $this->renderPartial('_form', array('question'=>$question)); ?>
</div>
</div>