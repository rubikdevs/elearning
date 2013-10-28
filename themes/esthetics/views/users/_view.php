<?php
/* @var $this UsersController */
/* @var $data Users */
?>

<tr>
    
	<td><?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>CHtml::encode($data->id))); ?></td>

    <td><?php echo CHtml::encode($data->username); ?> </td>
    <td><?php echo CHtml::encode($data->user_level); ?></td>
    <td><?php
    	echo CHtml::link('<i class="icon-edit"></i>Assign Module', array('assign', 'id'=>CHtml::encode($data->id)), array('class'=>'grey display_but'));
    	echo CHtml::link('<i class="icon-edit"></i>Edit', array('update', 'id'=>CHtml::encode($data->id)), array('class'=>'grey display_but'));
		echo CHtml::link('<i class="icon-trash"></i>Delete', array('delete', 'id'=>CHtml::encode($data->id)), array('class'=>'grey display_but'));
    ?></td>


</tr>