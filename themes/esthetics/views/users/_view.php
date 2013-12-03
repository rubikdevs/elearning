<?php
/* @var $this UsersController */
/* @var $data Users */



	if ($data->user_level < Yii::app()->user->getLevel())
	{ 
?>

<tr>
    
	<td><?php echo CHtml::link(CHtml::encode($data->username), array('view', 'id'=>CHtml::encode($data->id))); ?></td>
    <td><?php if ($data->user_level==0)
                            echo 'User';
                        elseif ($data->user_level==1)
                            echo 'Admin';
                        else
                            echo 'Super Admin'; ?></td>
    <td><?php echo $data->area; ?></td>
    <td><?php
    	echo CHtml::link('<i class="icon-edit"></i>Manage Module', array('assign', 'id'=>CHtml::encode($data->id)), array('class'=>'grey display_but'));
    	echo CHtml::link('<i class="icon-edit"></i>Edit', array('update', 'id'=>CHtml::encode($data->id)), array('class'=>'grey display_but'));
		echo CHtml::link('<i class="icon-trash"></i>Delete', array('delete', 'id'=>CHtml::encode($data->id)), array('class'=>'grey display_but'));
    ?></td>


</tr>

<?php } ?>