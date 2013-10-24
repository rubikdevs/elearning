
<div  class="non-shortable-content">


<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */
$this->pageTitle=Yii::app()->name . ' - Login';

?>
</div>


<p>Please fill out the following form with your login credentials:</p>

<div class="box _50">
    <div class="box-header">
        Login
    </div>

    <div class="box-content">

<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'login-form',
    'errorMessageCssClass'=>'formError',

    'enableClientValidation'=>false,
    'clientOptions'=>array(
        'validateOnSubmit'=>false,
    ),

)); ?>


    <div class="form-row">
        <label>
            <strong>
                username
            </strong>
        </label>
        <?php echo $form->textField($model,'username'); ?>
    </div>

    <div class="form-row">
        <label>
            <strong>
                password
            </strong>
        </label>
        <div class="form-right-col">
            <?php echo $form->passwordField($model,'password'); ?>
        </div>

    </div>

    <div class="form-row rememberMe">
        <?php echo $form->checkBox($model,'rememberMe'); ?>
        <?php echo $form->label($model,'rememberMe'); ?>
        <?php echo $form->error($model,'rememberMe'); ?>
    </div>

    <div class="form-row buttons">
        <?php echo CHtml::submitButton('Login'); ?>
    </div>

<?php $this->endWidget(); ?>
</div><!-- form -->
</div>