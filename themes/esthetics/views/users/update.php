<?php
/* @var $this UsersController */
/* @var $model Users */


?>
<div class="non-shortable-content"></div>

<div class="shortable-content">
    <div class="box _50">
        <div class="box-header">
            User <?php echo $model->id; ?>
        </div>
        <div class="box-content padd-10">
            <?php $this->renderPartial('_updateform', array('model'=>$model)); ?>
        </div>
    </div>
<div>
