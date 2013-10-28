<div class="non-shortable-content"></div>

<?php
/* @var $this UsersController */
/* @var $model Users */


    echo '<div class="non-shortable-content"></div>';
	//array('label'=>'Create Users', 'url'=>array('create')),
	echo CHtml::link('<i class="icon-edit"></i>Edit', array('update', 'id'=>$model->id), array('class'=>'grey display_but'));
	echo CHtml::link('<i class="icon-trash"></i>Delete Users','#', array('class'=>'grey display_but','submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?'));

	//array('label'=>'Manage Users', 'url'=>array('admin')
  

?>
<div class="non-shortable-content"></div>
<div class="box _50">
    <div class="box-header">
        View Users <?php echo $model->id; ?>
    </div>
    <div class="box-content padd-10">
    <?php
        
    function getModules($modules){
        $out = '';
        foreach ($modules as $module) {
             $out.=$module['module_name'].', ';
        }
        return $out;
    }

    $this->widget('zii.widgets.CDetailView', array(
        "tagName"=> "table",
        'data'=>$model,
        'attributes'=>array(
            'id'=>'id',
            'username'=>'username',
            'password'=>'password',
            'user_level'=>'user_level',
            array(
                'name'=>'modules',
                'type'=>'text',
                'value'=>getModules($model->modules),
            )
        ),
    )); ?>

    </div>
</div>
</div>

