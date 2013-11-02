<?php

class PagesController extends Controller
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
			//'postOnly + delete', // we only allow deletion via POST request
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
				'actions'=>array('index','view','uploadImage','delete','moveUp','moveDown'),
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

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$question = Questions::model()->findAll('page_code='.$id);
		//var_dump($question);die;

		$this->render('view',array(
			'model'=>$this->loadModel($id),
			'question'=>$question[0],
		));
	}

	public function actionMoveUp($id,$module_code){
		$model=$this->loadModel($id);
		$all = Pages::model()->findAll('module_code='.$module_code);
		$array = array();
		foreach ($all as $page)
			$array[$page->page_number]=$page->page_code;
		ksort($array);
		reset($array);

		if ($model->page_number>key($array))
		{
			$keys = array_flip(array_keys($array));
			$values = array_values($array);

			$upper = Pages::model()->findByPk($values[$keys[$model->page_number]-1]);
			$upperTmp = $upper->page_number;
			$upper->page_number = $model->page_number;
			$model->page_number = $upperTmp;

			if(($model->save()) && ($upper->save()))
				$this->redirect(array('modules/view','id'=>$module_code));
		}
		$this->redirect(array('modules/view','id'=>$module_code));
	}

	public function actionMoveDown($id,$module_code){
		$model=$this->loadModel($id);
		$all = Pages::model()->findAll('module_code='.$module_code);
		$array = array();
		foreach ($all as $page)
			$array[$page->page_number]=$page->page_code;
		ksort($array);
		end($array);
		if ($model->page_number<key($array))
		{
			$keys = array_flip(array_keys($array));
			$values = array_values($array);

			$bottom = Pages::model()->findByPk($values[$keys[$model->page_number]+1]);
			$bottomTmp = $bottom->page_number;
			$bottom->page_number = $model->page_number;
			$model->page_number = $bottomTmp;

			if(($model->save()) && ($bottom->save()))
				$this->redirect(array('modules/view','id'=>$module_code));
		}
		$this->redirect(array('modules/view','id'=>$module_code));
	}
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate($module_code,$image_uri=null)
	{
		$model=new Pages;
		$model->module_code = $module_code;
		$model->image_uri = $image_uri;
		$question = new Questions;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Pages']))
		{

			$model->attributes=$_POST['Pages'];

			//get last number page,
			$pages = Pages::model()->findAll('module_code='.$module_code);
			$array = array();
			foreach ($pages as $page)
				$array[$page->page_number] = $page->page_code;
			ksort($array);
			end($array);

			$model->page_number = key($array)+1;

			if (!$model->save()){
				var_dump('YEAH'); die;
			}

			$question->attributes = $_POST['Questions'];
			$question->page_code = $model->page_code;

			if($question->save())
				$this->redirect(array('view','id'=>$model->page_code));
		}

		$this->render('create',array(
			'model'=>$model,
			'question'=>$question,
		));
	}


	public function actionUploadImage($module_code,$action,$page_code) {
		$model=new ImageUploader;
        if(isset($_POST['ImageUploader']))
        {
            $model->attributes=$_POST['ImageUploader'];
            $model->image_uri=CUploadedFile::getInstance($model,'image_uri');
            if($model->save())
            {   
                $model->image_uri->saveAs('images/'.$model->image_uri);
                if ($action=='create')
                	$this->redirect(array($action,'module_code'=>$module_code, 'image_uri'=> 'images/'.$model->image_uri));
                elseif ($action=='update'){
                	$this->redirect(array($action,'id'=>$page_code, 'image_uri'=> 'images/'.$model->image_uri));
                }
            }
        }
        $this->render('/ImageUploader/create', array('model'=>$model));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id,$image_uri=null)
	{
		$model=$this->loadModel($id);
		$question = Questions::model()->findAll('page_code='.$id);
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		$question = $question[0];

		if ($image_uri!=null)
		{	
			$model->image_uri = $image_uri;
			$model->save();
		}

		if(isset($_POST['Pages']))
		{
			$model->attributes=$_POST['Pages'];
			if (!$model->save()){
				var_dump('YEAH'); die;
			}
			$question->attributes = $_POST['Questions'];
			$question->page_code = $model->page_code;

			if($question->save())
				$this->redirect(array('view','id'=>$model->page_code));
		}

		$this->render('update',array(
			'model'=>$model,
			'question'=>$question
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id,$module_code)
	{
		//move all page numbers
		$thisPage = Pages::model()->findByPk($id);
		$pages = Pages::model()->findAll('module_code='.$module_code);
		foreach($pages as $page)
		{
			if ($page->page_number>$thisPage->page_number)
			{
				$page->page_number = $page->page_number-1;
				$page->save();
			}
		}
		//delete all questions
		$question = Questions::model()->findAll('page_code='.$id);
		$question[0]->delete();
		//delete model
		$this->loadModel($id)->delete();

		
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('modules/view&id='.$module_code));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Pages');
		

		$this->render('index',array(
			'dataProvider'=>$dataProvider,

		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Pages('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Pages']))
			$model->attributes=$_GET['Pages'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Pages the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Pages::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Pages $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='pages-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
