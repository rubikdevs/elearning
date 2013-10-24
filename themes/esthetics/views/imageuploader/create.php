

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

<div class="box _75">
    <div class="box-header">
       Text Editor
      <i class="icon-remove-sign close" title="Close"></i>
      <i class="icon-minus-sign minimize" title="Minimize/Maximize"></i>
      </div>
      <div class="box-content">
      
      <textarea class="ckeditor" name="editor1"></textarea>
    </div>
</div>






