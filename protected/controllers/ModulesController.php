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
				'actions'=>array('index','view','listpages','moveUp','moveDown','unassign','delete','report'),
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

	public function actionReport(){
		// MODELS
		if (isset($_POST['Users'])){
			$user = Users::model()->findAll('username = "'.$_POST['Users']['username'].'"');
			if(!empty($user))
			{
				$this->render('_report_table', array('user' => $user[0]));
			}	
			else 
				$message = $_POST['Users']['username'].' not found.';
		}

		$this->render('report', array(
			'userForm'=> new Users,
			'message'=> (isset($message)) ? $message : null ,
			));
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
	public function actionUnassign($module_id,$user_id){
		$criteria = new CDbCriteria;
		$criteria->condition = 'module_id = '.$module_id.' AND user_id ='.$user_id;
		$assignment = UserModuleAssignment::model()->findAll($criteria);
		$assignment[0]->delete();
		$this->redirect(array('view','id'=>$module_id));
	}
	public function actionView($id)
	{
		if (isset($_POST['Users']))
		{
			$user = Users::model()->findByAttributes(array('username'=>$_POST['Users']['username']));
			if (count($user)==0)
			{
				$message = 'User <strong>'.$_POST['Users']['username'].'</strong> not found.';
				$this->render('_error',array(
					'message'=>$message,
				));
			} else
			{
				//ASSIGN
				$assignment = new UserModuleAssignment;
				$assignment->module_id = $id;
				$assignment->user_id = $user->id;
				$assignment->status = 0;
				$assignment->last_page = 1;
				$assignment->creator = Yii::app()->user->getUser()->username;
				if (!$assignment->save())
				{
					$message = 'Try again later.';
					$this->render('_error',array(
						'message'=>$message,
					));
				}

			}
		}
		$criteria=new CDbCriteria(array(                    
            'order'=>'page_number asc',
            'condition'=>'module_code='.$id
		));

		$dataProvider=new CActiveDataProvider('Pages', array(
		    'criteria'=>$criteria,
		));

		$this->render('view',array(
			'dataProvider'=>$dataProvider,
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
			if (count($last)==0)
				$model->sort_order=1;
			else
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
