  <?php $this->layout = '//layouts/clean'; ?>  
  <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/login/login_bg2.jpg" class="login_bg" />
    
  <div class="login_warper">
    
<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'login-form',
    'errorMessageCssClass'=>'formError',

    'enableClientValidation'=>false,
    'clientOptions'=>array(
        'validateOnSubmit'=>false,
    ),

)); ?>

        <table width="95%" cellspacing="5" class="login_form">
          <tr>
           <td colspan="2" align="center">
            <strong>Enter your username and password.</strong>
           </td>
          </tr>
          <tr>
            <td><label for="username"><strong>Username :</strong></label></td>
            <td><?php echo $form->textField($model,'username', array('placeholder'=>'type your username here..')); ?>
            </td>
          </tr>
          <tr>
            <td><label for="password"><strong>Password :</strong></label></td>
            <td><?php echo $form->passwordField($model,'password', array('placeholder'=>'type your password here..')); ?></td>
          </tr>
          <tr>
            <td colspan="2" align="right">
             <?php echo $form->checkBox($model,'rememberMe', array('class'=>'styled', 'checked'=>'checked')); ?>
            <?php echo $form->label($model,'Remember me!'); ?>
            <?php echo $form->error($model,'rememberMe'); ?>
            </td>
          </tr>
        </table>
    
      
        <div id="well">
          <h2><strong id="login_slider"></strong> <span>Slide to login</span></h2>
        </div>
     
    </div>
<?php $this->endWidget(); ?>