<?php

class ElearningController extends Controller
{
	public $layout='//layouts/main';

	public function actionIndex()
	{
		$_id = Yii::app()->user->getId();
		$_user = Users::model()->findByPk($_id);

		//$modules = $_user->UserModuleAssignment;

		$modules = $this->sortModules($_user->UserModuleAssignment);	

		$this->render('index',array(
			'modules'=>$modules,
			'user'=>$_user,
			));
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
			$this->redirect(array('index'));

		$question = Questions::model()->findAll('page_code='.$page[0]->page_code);
		
		if (count($question)==0)
			$this->redirect(array('index'));

		$statusCriteria = new CDbCriteria;
		$statusCriteria->condition = 'module_id='.$module.' AND user_id='.Yii::app()->user->getId();
		$assignment = UserModuleAssignment::model()->findAll($statusCriteria);

		$status = $assignment[0]->status;

		if (count($assignment)==0)
			$this->redirect(array('index'));
		
		
		if (($assignment[0]->last_page != $page_number) && (!$status))
			$this->redirect(array('page',
				'module'=>$module,
				'page_number'=>$assignment[0]->last_page,
				));
		

		$this->render('page',array(
			'page'=>$page[0],
			'question'=>$question[0],
			'status'=>$status,
			));
	}

	public function actionQA($page_code){
		$question = Questions::model()->findAll('page_code='.$page_code);

		$page = Pages::model()->findByPk($page_code);

		if (isset($_POST['Questions']))
		{
			if ($_POST['Questions']['description']==$question[0]->correct_answer)
			{
				// SET LAST PAGE
				$assCriteria = new CDbCriteria;
				$user_id = Yii::app()->user->getId();
				$assCriteria->condition = 'module_id ='.$page->module_code.' AND user_id ='.$user_id;
				$assignment = UserModuleAssignment::model()->findAll($assCriteria);
				$next = $page->page_number+1;
				$assignment[0]->last_page = $next;
				$moduleMod = Modules::model()->findByPk($page->module_code);
				if($moduleMod->pagesCount==$page->page_number)
					$assignment[0]->status=1;
				$assignment[0]->save();
				

				// IF NO MORE PAGES -> REDIRECTS TO MODULES AVAILABLES
				if ($assignment[0]->status == 1)
					$this->redirect(array('index'));
				else
					$this->redirect(array('page','module'=>$page->module_code,'page_number'=>$next));
			}
			else
				$this->render('_wrongAnswer');
		}
		$this->render('qa',array(
			'question'=>$question[0],
			));
	}
	
	public function sortModules($modules_assigments){
		$result = array();
		foreach ($modules_assigments as $i => $module_assigment) {
			$module = Modules::model()->findByPk($module_assigment->module_id);
			$result[$module->sort_order]=$module_assigment;
		}
		ksort($result);
		return $result;
	}

	public function isFirstAssignment($modules,$module){
		$not_finished = array();
		foreach ($modules as $i => $assignment) {
			$_module = Modules::model()->findByPk($assignment->module_id);
			if (($assignment->status == 0) && ($_module->pagesCount > 0))
				$not_finished[]=$assignment->module_id;
		}
		if (sizeof($not_finished)>0)
			return ($not_finished[0]==$module->module_code);
		return false;
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