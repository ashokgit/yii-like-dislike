<?php

/**
 * This is the model class for table "{{likedislike}}".
 *
 * The followings are the available columns in table '{{likedislike}}':
 * @property integer $id
 * @property integer $field_id
 * @property integer $user_id
 * @property integer $status
 * @property string $add_timestamp
 * @property string $edit_timestamp
 */
class Likedislike extends CActiveRecord
{
	public $count;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Likedislike the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{likedislike}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('field_id, user_id, status', 'required'),
			array('field_id, user_id, status', 'numerical', 'integerOnly'=>true),
			array('add_timestamp, edit_timestamp', 'length', 'max'=>25),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, field_id, user_id, status, add_timestamp, edit_timestamp', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'field_id' => 'Field',
			'user_id' => 'User',
			'status' => 'Status',
			'add_timestamp' => 'Add Timestamp',
			'edit_timestamp' => 'Edit Timestamp',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('field_id',$this->field_id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('status',$this->status);
		$criteria->compare('add_timestamp',$this->add_timestamp,true);
		$criteria->compare('edit_timestamp',$this->edit_timestamp,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}