
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->

	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/style.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/form.css" />
    <?php /* @var $this Controller */
    Yii::app()->clientScript->registerScript('helpers', '
        baseUrl = '.CJSON::encode(Yii::app()->theme->baseUrl).';
    ');?>
    ?>

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>  
    <div class="main _85">
	   <div id="mainmenu">
            

            <nav class="_8">
		        <?php $this->widget('zii.widgets.CMenu',array(
                    'encodeLabel'=>false,
			        'items'=>array(
    				    array(
                        
                            'label'=>'<i class="icon-home"></i>Index', 
                            'url'=>array('/site/index'),
                            'itemOptions'=>array(
                                'title'=>'Index'
                            )
                        ),
    				    array(
                            'url'=>array('/site/page', 'view'=>'about'),
                            'label'=>'<i class="icon-info-sign"></i>About', 
                            'itemOptions'=>array(
                                'title'=>'About'
                            ),
                        ),
    				    array(
                            'label'=>'<i class="icon-envelope ui-icon-contact"></i>Contact',
                            'url'=>array('/site/contact'),
                            'itemOptions'=>array(
                                'title'=>'Contact'
                            ), 
                        ),
    				    array(
                            'label'=>'<i class="icon-signin"></i>Login', 
                            'itemOptions'=>array(
                                'title'=>'sign-in'
                            ),
                            'url'=>array('/site/login'), 
                            'visible'=>Yii::app()->user->isGuest
                        ),
    				    array(
                            'label'=>'<i class="icon-signout"></i>Logout ('.Yii::app()->user->name.')', 
                            'url'=>array('/site/logout'), 
                            'visible'=>!Yii::app()->user->isGuest
                        ),
                        array(
                            'label'=>'<i class="icon-user"></i>Manage Users', 
                            'itemOptions'=>array(
                                'title'=>'Manage Users'
                            ), 
                            'url'=>array('/users'), 
                            'visible'=>!Yii::app()->user->isGuest
                        )
			            
                    ),
                        
		        )); ?>

	    </div><!-- mainmenu -->
    	<?php if(isset($this->breadcrumbs)):?>
    		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
    			'links'=>$this->breadcrumbs,
    		)); ?><!-- breadcrumbs -->
    	<?php endif?>

    	<?php echo $content; ?>

    </div>
    </div>

	
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/scripts/script.js" /></script>

</body>
</html>
