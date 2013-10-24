<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<aside> 
                <div class="user"> 
                    <img src="http://en.opensuse.org/images/0/0b/Icon-user.png" width="50px" height="50px" alt="Users"> <?php echo Yii::app()->user->name ?>
                    <p>USER PANEL </p> 
                </div> 
                <ul id="main-nav"> 
                    <li> <a href="#" class="nav-top-item current"> Admin Functions </a> 
                        <ul style="display: block; "> 
                            <li><?php echo Chtml::link('</i>Manage Users', array('admin'),array('class'=>(Yii::app()->getController()->getAction()->controller->action->id=='admin')?'active':'' ));?></li> 
                            <li><?php echo Chtml::link('</i>List Users', array('index'),array('class'=>(Yii::app()->getController()->getAction()->controller->action->id=='index')?'active':'' ));?></li> 
                            <li><?php echo Chtml::link('</i>Create User', array('create'),array('class'=>(Yii::app()->getController()->getAction()->controller->action->id=='create')?'active':'' ));?></li> 
                        </ul> 
                    </li> 
                   
                 </ul> 
            </aside>
    <?php echo $content?>
</div><!-- content -->
<?php $this->endContent(); ?>