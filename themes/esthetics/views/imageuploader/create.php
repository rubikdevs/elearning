

<?php
$form = $this->beginWidget(
    'CActiveForm',
    array(
        'id' => 'upload-form',
        'enableAjaxValidation' => false,
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
    )
);

// ...
?>
<div class="box _33">
    <div class="box-header"> Upload Image </div>
    <div class="box-content">
        <div class="form-row">
            <div class="fileinputs" style="display:none;">
                    <?php echo $form->fileField($model, 'image_uri'); ?>
                    <div class="file-input-drop-zone"><img></div>
            </div>
        </div>
    </div>
    <div class="form-row">
    <?php
        echo '<p style="text-align:center">'.CHtml::submitButton('upload').'</p>'; // ...
        $this->endWidget();
    ?>
    </div>
</div>







