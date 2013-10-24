<?php
$form = $this->beginWidget(
    'CActiveForm',
    array(
        'id' => 'post-form',
        'enableAjaxValidation' => false,
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
    )
);

// ...
?>
<div class="box _66">
    <div class="box-header" style="text-align:center">  Post Uploader </div>
    <div class="box-content">
        <div class="form-row">
            <?php echo $form->textArea($model, 'description', array('class'=>'ckeditor')); ?>
        </div>
    </div>
    <div class="form-row">
    <?php
        echo '<p style="text-align:center">'.CHtml::submitButton('upload').'</p>'; // ...
        $this->endWidget();
    ?>
 	</div>
</div>