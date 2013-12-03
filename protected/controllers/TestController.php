<?php

class TestController extends Controller
{
	public $layout='//layouts/column2';

	public function actionIndex()
	{
		$criteria = new CDbCriteria;
		$criteria->condition = 'user_id='.Yii::app()->user->getId();
		$tests = Test::model()->findAll($criteria);


		$this->render('index',array(
			'tests'=>$tests,
			));
	}

	public function actionManage()
	{
		$dataProvider=new CActiveDataProvider('QuestionTest');
		$this->render('manage',array(
			'dataProvider'=>$dataProvider,
		));
	}
	public function actionAddQuestion()
	{
		$model=new QuestionTest;

		if(isset($_POST['QuestionTest']))
		{
			$model->attributes=$_POST['QuestionTest'];
			if($model->save())
				$this->redirect(array('manage'));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}
	public function actionUpdateQuestion($id)
	{
		$model=QuestionTest::model()->findByPk($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['QuestionTest']))
		{
			$model->attributes=$_POST['QuestionTest'];
			if($model->save())
				$this->redirect(array('manage'));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}
	public function actionDeleteQuestion($id)
	{
		$question = QuestionTest::model()->findByPk($id);
		$question->delete();
		
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('manage'));
	}
	public function actionTake($last=null,$test_id=null,$start=null)
	{
		// LOAD ALL QUESTIONS AND SET TIMER
		if ($start == 1)
		{
			$_user_id = Yii::app()->user->getId();
			$test = new Test;
			$test->user_id = $_user_id;
			$test->last = 1;
			$test->status = 0;
			if (!$test->save())
				{var_dump($test->getErrors());die;}
			// GET QUESTIONS

			$PKquestions = QuestionTest::model()->findAll("category='Product Knowledge'");
			$CHquestions = QuestionTest::model()->findAll("category='Customer Handling'");

			shuffle($PKquestions);
			shuffle($CHquestions);

			$PKchosed = array_rand($PKquestions,40);
			$CHchosed = array_rand($CHquestions,10);

			// CREATE SUBMITTED QUESTIONS FROM CHOSED	
			foreach ($PKchosed as $j => $pkId) 
			{
				$pkSubmitted = new SubmittedTest;
				$pkSubmitted->test_id = $test->primaryKey;
				$pkSubmitted->answer = 'Not Answered';
				$pkSubmitted->question_id = $PKquestions[$pkId]->id;
				$pkSubmitted->number = $j+1;
				if(!$pkSubmitted->save())
					{var_dump($pkSubmitted->getErrors());die;}
			}

			// CREATE SUBMITTED QUESTIONS FROM CHOSED	
			foreach ($CHchosed as $k => $chId) 
			{
				$chSubmitted = new SubmittedTest;
				$chSubmitted->test_id = $test->primaryKey;
				$chSubmitted->answer = 'Not Answered';
				$chSubmitted->question_id = $CHquestions[$chId]->id;
				$chSubmitted->number = $k+1+40;
				if(!$chSubmitted->save())
					{var_dump($chSubmitted->getErrors());die;}
			}
			$last = $test->last;
			$test_id = $test->primaryKey;

		}

		$this->redirect(array('question',
			'last'=>$last,
			'test_id'=>$test_id,
			));
	}

	public function actionQuestion($last,$test_id)
	{

		$difference = $this->getTimeLapsed($test_id);

		if (($last<=50) && ($difference<=45.0)){
			// LOAD QUESTION
			$criteria = new CDbCriteria;
			$criteria->condition = 'test_id ='.$test_id.' AND number='.$last;

			$_squestion = SubmittedTest::model()->findAll($criteria);
			$_squestion = $_squestion[0];	

			if (isset($_POST['SubmittedTest']))
			{

				$_squestion->answer = $_POST['SubmittedTest']['answer'];

				if (!$_squestion->save()) {
					var_dump($_squestion->getErrors());die;
				}

				$test = Test::model()->findByPk($test_id);

				if ($last==50)
				{
					$test->status = 1;
					// /$test->last = $last+1;
				}
				else
					$test->last = $last+1;

				if (!$test->save()) {
					var_dump($test->getErrors());die;
				}

				$this->redirect(array('question',
					'test_id'=>$test_id,
					'last'=>$last+1,
					));
			}

			$_question = QuestionTest::model()->findByPk($_squestion->question_id);

			$this->render('question',array(
				'question'=>$_question->question,
				'page'=>$_squestion->number,
				));
		} else
			$this->redirect(array('index'));

	}

	public function getTimeLapsed($test_id)
	{
		$_test = Test::model()->findByPk($test_id);
		$_time = date("Y-m-d H:i:s");

		$time1 = strtotime($_test->start_time);
		$time2 = strtotime($_time);

		if($time2>$time1)
		{
			$_ttime = $time1;
			$time1 = $time2;
			$time2 = $_ttime;
		}

		return ($time1-$time2)/60;
	}
	public function getResult($category,$test_id)
	{
		$_test = Test::model()->findByPk($test_id);
		$scored = 0;
		foreach ($_test->submittedQuestions as $i => $sQuestion) {
			$_question = QuestionTest::model()->findByPk($sQuestion->question_id);
			if (($sQuestion->answer==$_question->correct_answer) && ($_question->category==$category))
				$scored++;
		}
		return $scored;
	}

	public function isApproved($test_id)
	{
		$CHscore = $this->getResult('Customer Handling',$test_id);
		$PKscore = $this->getResult('Product Knowledge',$test_id);
		$score = false;
		if (($PKscore >= 32) && ($CHscore >= 2))
			$score = true;
		return $score;
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