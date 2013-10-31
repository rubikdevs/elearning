

<?php
/* @var $this UsersController */
/* @var $model Users */
$users = Users::model()->attributeLabels();


    echo '<div class="non-shortable-content"></div>';
	//array('label'=>'Create Users', 'url'=>array('create')),
	echo CHtml::link('<i class="icon-edit"></i>Edit', array('update', 'id'=>$model->id), array('class'=>'grey display_but'));
	echo CHtml::link('<i class="icon-trash"></i>Delete Users','#', array('class'=>'grey display_but','submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?'));

	//array('label'=>'Manage Users', 'url'=>array('admin')
  

?>

<?php  function getModules($modules){
        $out = '';
        foreach ($modules as $module) {
             $out.=$module['module_name'].', ';
        }
        return $out;
    }
?>

<div class="box _50">
    <div class="box-header">Viewing <b><?php echo $model->username; ?></b></div>
    <table class="static_table" style="border:1px solid #dfdfdf">
        <tbody>
            <tr>
                <td><?php echo $users['id'] ?></td>
                <td><?php echo $model->id; ?></td>
            </tr>
            <tr>
                <td><?php echo $users['username'] ?></td>
                <td><?php echo $model->username; ?></td>
            </tr>
            <tr>
                <td><?php echo $users['password'] ?></td>
                <td><?php echo $model->password; ?></td>
            </tr>
            <tr>
                <td><?php echo $users['user_level'] ?></td>
                <td><?php echo $model->user_level; ?></td>
            </tr>
            <tr>
                <td>Modules</td>
                <td><?php
                    $toBeTrimmed ='';
                    foreach ($model->modules as $module) 
                        $toBeTrimmed .= $module->module_name.', ';
                    echo rtrim($toBeTrimmed,',');
                ?></td>
            </tr>
        </tbody>
    </table>
</div>
