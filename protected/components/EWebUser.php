<?php
class EWebUser extends CWebUser
{
    private $_userTable = array
    (
        0=>'Normal',
        1=>'Admin',
        9=>'SuperAdmin'
    );
 
    protected $_model;
    public function getLevel()
    {
        return $this->user_level;       
    }


 
    function isAdmin()
    {
        //Access this via Yii::app()->user->isAdmin()
 
        return (Yii::app()->user->isGuest) ? FALSE : $this->user_level == 1;
    }
 
    public function isSuperuser()
    {
        //Access this via Yii::app()->user->isSuperuser()
 
        return (Yii::app()->user->isGuest) ? FALSE : $this->user_level == 9;
    }
 
    public function canAccess($minimumLevel)
    {
        //Access this via Yii::app()->user->canAccess(9)
 
        return (Yii::app()->user->isGuest) ? FALSE : $this->user_level >= $minimumLevel;
    }
 
    public function getRoleName()
    {
        //Access this via Yii::app()->user->roleName()
 
        return (Yii::app()->user->isGuest) ? '' : $this->getUserLabel($this->user_level);
    }
 
    public function getUserLabel($level)
    {
        //Use this for example as a column in CGridView.columns:
        //
        //array('value'=>'Yii::app()->user->getUserLabel($data->level)'),
 
        return $this->_userTable[$level];
    }
 
    public function getUserLevelsList()
    {
        //Access this via Yii::app()->user->getUserLevelList()
 
        return $this->_userTable;
    } 
}
?>