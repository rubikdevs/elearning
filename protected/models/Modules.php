<?php

/**
 * This is the model class for table "tbl_modules".
 *
 * The followings are the available columns in table 'tbl_modules':
 * @property integer $module_code
 * @property string $module_name
 * @property string $creator
 * @property string $create_date
 */
class Modules extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_modules';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('module_name, creator', 'required'),
			array('module_name', 'length', 'max'=>60),
			array('creator', 'length', 'max'=>60),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('module_code, module_name, creator, create_date, sort_order', 'safe', 'on'=>'search'),
		);
	}
	/**
	 * @return array relational rules.
	 */
	public function checkExistance($match){
		return ($this->findByPk($match));
	}
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'pagesT'=>array(self::HAS_MANY, 'Pages', 'module_code'),
			'users' => array(self::MANY_MANY, 'Users', 'tbl_user_module_assignment(module_id, user_id)'),

		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'module_code' => 'Module Code',
			'module_name' => 'Module Name',
			'creator' => 'Creator',
			'create_date' => 'Create Date',
			'sort_order' => 'Sort Order'
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

	
		$criteria->compare('sort_order',$this->sort_order,true);


    return new CActiveDataProvider(get_class($this), array(
        'criteria' => $criteri2222a,
        'sort' => array(
            'attributes' => array(
                'sort_order' => array(
                    'asc' => 'sort_order',
                    'desc' => 'sort_order desc',
                )
            ),
        ),
    	));
		
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Modules the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
