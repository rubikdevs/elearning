<?php
class ImageUploader extends CActiveRecord
{
    public $image;
    // ... other attributes

    public function tableName()
    {
        return 'tbl_post_images';
    }
 
    public function rules()
    {
        return array(
            array('image_uri', 'file', 'types'=>'jpg, gif, png'),
        );
    }
}