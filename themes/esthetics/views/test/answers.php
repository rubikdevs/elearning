<div class="box _50">
	<div class="box-header">Answers</div>
	<div class="box-content">
	<table class="static_table" style="border:1px solid #dfdfdf">
	<tbody>

	<?php
		foreach ($question->answers as $answer)
		{
			echo '<tr>';
			echo '<td><strong>'.$answer->number.'</strong></td>';
			echo '<td>'.$answer->description.'</td>';
			echo '<td class="float_r">'
			.CHtml::link('Edit',array('answerTest/update','id'=>$answer->id),array('class'=>'grey', 'style'=>'margin-right:10px'))
			.CHtml::link('Delete',array('answerTest/delete','id'=>$answer->id),array('class'=>'red'))
			.'</td>';
			echo '</tr>';
		}			
	?>
	</tbody>
	</table>
	</div>
</div>
<?php echo CHtml::link('Add Answer', array('answerTest/create','q_id'=>$question->id),array('class'=>'grey float_l')); ?>