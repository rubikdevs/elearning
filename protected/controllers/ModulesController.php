<?php

class ModulesController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			// /'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','listpages','moveUp','moveDown'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	public function actionMoveUp($id) {
		$model=$this->loadModel($id);
		$all = Modules::model()->findAll();
		$array = array();
		foreach ($all as $module)
			$array[$module->sort_order]=$module->module_code;
		ksort($array);
		reset($array);
		if ($model->sort_order>key($array))
		{
			$keys = array_flip(array_keys($array));
			$values = array_values($array);
			$upper = Modules::model()->findByPk($values[$keys[$model->sort_order]-1]);
			$upperTmp = $upper->sort_order;
			$upper->sort_order = $model->sort_order;
			$model->sort_order = $upperTmp;

			if(($model->save()) && ($upper->save()))
				$this->redirect(array('modules/index'));
		}
		$this->redirect(array('modules/index'));
	}
	public function actionMoveDown($id) {
		$model=$this->loadModel($id);
		$all = Modules::model()->findAll();
		$array = array();
		foreach ($all as $module)
			$array[$module->sort_order]=$module->module_code;
		ksort($array);
		end($array);
		if ($model->sort_order<key($array))
		{
			$keys = array_flip(array_keys($array));
			$values = array_values($array);
			$bottom = Modules::model()->findByPk($values[$keys[$model->sort_order]+1]);
			$bottomTmp = $bottom->sort_order;
			$bottom->sort_order = $model->sort_order;
			$model->sort_order = $bottomTmp;

			if(($model->save()) && ($bottom->save()))
				$this->redirect(array('modules/index'));
		}
		$this->redirect(array('modules/index'));
	}
	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		//$module = $this->loadModel($id);
		//echo count($module->users);
		//var_dump($users);
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}
	public function actionListpages($module_code)
	{
		$pages = Pages::model()->findAll('module_code = '.$module_code);
		$this->render('listpages',array(
			'model'=>$this->loadModel($module_code),
			'pages'=>$pages,
		));
	}
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Modules;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Modules']))
		{
			$last = Modules::model()->findAll('sort_order=(SELECT max(sort_order) FROM tbl_modules)'); /// MEEEEE

			$model->attributes=$_POST['Modules'];
			$model->sort_order=$last[0]["sort_order"] + 1;

			if($model->save())
					$this->redirect(array('view','id'=>$model->module_code));
			else {
				var_dump($model->getErrors());
				die;
			}
				
		}
		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Modules']))
		{
			$model->attributes=$_POST['Modules'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->module_code));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		// DELETE ASSIGNMENTS
		$assigments = UserModuleAssignment::model()->findAll('module_id='.$id);
		foreach ($assigments as $assigment)
			$assigment->delete();

		// DELETE PAGEs
		$pages = Pages::model()->findAll('module_code='.$id);
		foreach ($pages as $page)
			$page->delete();

		// DELETE MODEL
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Modules', 
			array(
    		'criteria' => array(
       		 'order'  => 'sort_order asc',
        		'offset' => 2, // zero-based index, third record = 2
    		)));
		$this->render('index',array(

			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Modules('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Modules']))
			$model->attributes=$_GET['Modules'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Modules the loaded model
	 * @throws CHttpException
	 */


	public function loadModel($id)
	{
		$model=Modules::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Modules $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='modules-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
