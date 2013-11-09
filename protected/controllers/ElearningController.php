<?php

class ElearningController extends Controller
{
	public $layout='//layouts/column2';

	public function actionIndex()
	{

		$this->render('index');
	}

	public function actionModule()
	{
		$this->render('module');
	}

	public function actionPage($module,$page_number)
	{

		$criteria = new CDbCriteria;
		$criteria->condition = 'module_code ='.$module.' AND page_number ='.$page_number;
		
		$page = Pages::model()->findAll($criteria);

		if (count($page)==0)
			{var_dump('WRONG MODULE/PAGE');die;}/// THROW ERROR

		$question = Questions::model()->findAll('page_code='.$page[0]->page_code);
		
		if (count($question)==0)
			{var_dump('NO QUESTION FOUND');die;}/// THROW ERROR


		if (isset($_POST['Questions']))
		{
			if ($_POST['Questions']['description']==$question[0]->correct_answer)
			{
				// SET LAST PAGE
				$assCriteria = new CDbCriteria;
				$user_id = Yii::app()->user->getId();
				$assCriteria->condition = 'module_id ='.$module.' AND user_id ='.$user_id;
				$assignment = UserModuleAssignment::model()->findAll($assCriteria);
				$next = $page_number+1;
				$assignment[0]->last_page = $next;
				$moduleMod = Modules::model()->findByPk($module);
				if($moduleMod->pagesCount==$page_number)
					$assignment[0]->status=1;
				$assignment[0]->save();
				

				// IF NO MORE PAGES -> REDIRECTS TO MODULES AVAILABLES
				if ($assignment[0]->status == 1)
					$this->redirect(array('index'));
				else
					$this->redirect(array('page','module'=>$module,'page_number'=>$next));
			}
			else
				$this->render('_wrongAnswer');
		}

		$this->render('page',array(
			'page'=>$page[0],
			'question'=>$question[0]
			));
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}