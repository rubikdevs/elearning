<?php
/* @var $this UsersController */
/* @var $data Users */



?>

<tr>
    <td><?php echo $data->question ?></td>
    <td><?php echo $data->correct_answer ?></td>
	<td><?php echo $data->category ?></td>
	
	
	   <td><?php
	   	echo CHtml::link('<i class="icon-list"></i>Answers', array('answers', 'q_id'=>CHtml::encode($data->id)), array('class'=>'grey display_but'));
		echo CHtml::link('<i class="icon-trash"></i>Delete', array('deleteQuestion', 'id'=>CHtml::encode($data->id)), array('class'=>'grey display_but'));
    	echo CHtml::link('<i class="icon-edit"></i>Edit', array('updateQuestion', 'id'=>CHtml::encode($data->id)), array('class'=>'grey display_but'));
    ?></td>


</tr>

