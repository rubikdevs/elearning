<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<aside> 
                <div class="user"> 
                    <img src="http://en.opensuse.org/images/0/0b/Icon-user.png" width="50px" height="50px" alt="Users"> <?php echo Yii::app()->user->name ?>
                    <p>USER PANEL </p> 
                </div> 
                <ul id="main-nav"> 


                
                <?php 
                // ADMIN LIST

                if (Yii::app()->user->isSuperuser() or Yii::app()->user->isAdmin()){

                    if(Yii::app()->controller->id=="users")
                    {?>
                        <li> <a href="#" class="nav-top-item current">Users Functions</a> 
                            <ul style="display: block; "> 
                                <li><?php echo CHtml::link('</i>List Users', array('users/index'),array('class'=>((Yii::app()->getController()->getID()=='users') and (Yii::app()->getController()->getAction()->controller->action->id=='index'))?'active':'' ));?></li> 
                                <li><?php echo CHtml::link('</i>Create User', array('users/create'),array('class'=>((Yii::app()->getController()->getID()=='users') and (Yii::app()->getController()->getAction()->controller->action->id=='create'))?'active':'' ));?></li> 
               
                            </ul> 
                        </li>
                    <?php
                    }
                    if((Yii::app()->controller->id=="modules") or (Yii::app()->controller->id=="pages"))
                    { ?>
                        <li> <a href="#" class="nav-top-item current">Modules Functions</a> 
                            <ul style="display: block; "> 
                                <li><?php echo CHtml::link('</i>Create Module', array('modules/create'),array('class'=>((Yii::app()->getController()->getID()=='modules') and (Yii::app()->getController()->getAction()->controller->action->id=='create'))?'active':'' ));?></li>
                                <li><?php echo CHtml::link('</i>List Modules', array('modules/index'),array('class'=>((Yii::app()->getController()->getID()=='modules') and (Yii::app()->getController()->getAction()->controller->action->id=='index'))?'active':'' ));?></li> 
                                <li><?php echo CHtml::link('</i>Report', array('modules/report'),array('class'=>((Yii::app()->getController()->getID()=='modules') and (Yii::app()->getController()->getAction()->controller->action->id=='index'))?'report':'' ));?></li> 
                            </ul> 
                        </li> 
                <?php }
                    if((Yii::app()->controller->id=="test") or (Yii::app()->controller->id=="answerTest"))
                        { ?>
                            <li> <a href="#" class="nav-top-item current">Test Functions</a> 
                                <ul style="display: block; "> 
                                    <li><?php echo CHtml::link('</i>Questions', array('test/manage'),array('class'=>((Yii::app()->getController()->getID()=='modules') and (Yii::app()->getController()->getAction()->controller->action->id=='create'))?'active':'' ));?></li>
                                    <li><?php echo CHtml::link('</i>Add Question', array('test/addQuestion'),array('class'=>((Yii::app()->getController()->getID()=='modules') and (Yii::app()->getController()->getAction()->controller->action->id=='create'))?'active':'' ));?></li>
                                </ul> 
                            </li> 
                    <?php }
                } ?>
                 </ul> 
            </aside>
    <?php echo $content?>
</div><!-- content -->
<?php $this->endContent(); ?>