<?php

class AnswerTestController extends Controller
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
				'actions'=>array('index','view','delete'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin'),
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
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate($q_id)
	{
		$model=new AnswerTest;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		$message = null;
		if(isset($_POST['AnswerTest']))
		{	
			// CHECK IF EXISTS
			$criteria = new CDbCriteria;
			$criteria->condition = 'question_id = '.$q_id.' AND number ="'.$_POST['AnswerTest']['number'].'"';
			$result = AnswerTest::model()->findAll($criteria);
			if ( sizeof($result)==0 )
			{
				$model->attributes=$_POST['AnswerTest'];
				if($model->save())
					$this->redirect(array('test/answers','q_id'=>$q_id));
			} else
			{
				$message = $_POST['AnswerTest']['number'].' has already been taken.';
			}
		}

		$this->render('create',array(
			'model'=>$model,
			'q_id'=>$q_id,
			'message'=>$message,
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
		$q_id = $model->question_id;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		$message = null;
		if(isset($_POST['AnswerTest']))
		{	
			// CHECK IF EXISTS
			$criteria = new CDbCriteria;
			$criteria->condition = 'question_id = '.$q_id.' AND number ="'.$_POST['AnswerTest']['number'].'"';
			$result = AnswerTest::model()->findAll($criteria);
			if ((sizeof($result)==0) or ($model->number==$_POST['AnswerTest']['number']))
			{
				$model->attributes=$_POST['AnswerTest'];
				if($model->save())
					$this->redirect(array('test/answers','q_id'=>$q_id));
			} else
			{
				$message = $_POST['AnswerTest']['number'].' has already been taken.';
			}
		}

		$this->render('create',array(
			'model'=>$model,
			'q_id'=>$q_id,
			'message'=>$message,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$model = $this->loadModel($id);
		$q_id = $model->question_id;
		$model->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('test/answers','q_id'=>$q_id));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('AnswerTest');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new AnswerTest('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['AnswerTest']))
			$model->attributes=$_GET['AnswerTest'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return AnswerTest the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=AnswerTest::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param AnswerTest $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='answer-test-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
