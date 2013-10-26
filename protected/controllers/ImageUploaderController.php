<?php
class ImageUploaderController extends CController
{   

    
    public function actionCreate()
    {
        $model=new ImageUploader;
        if(isset($_POST['ImageUploader']))
        {
            $model->attributes=$_POST['ImageUploader'];
            $model->image_uri=CUploadedFile::getInstance($model,'image_uri');
            if($model->save())
            {   
                $model->image_uri->saveAs('images/'.$model->image_uri);
                // redirect to success page
            }
        }
        $this->render('create', array('model'=>$model));
    }
}