<?php

/**
 * This is the model class for table "mobil_gallery_interior".
 *
 * The followings are the available columns in table 'mobil_gallery_interior':
 * @property integer $id
 * @property integer $mobil_id
 * @property string $images
 */
class MobilGalleryInterior extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return MobilGalleryInterior the static model class
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
		return 'mobil_gallery_interior';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			// array('mobil_id', 'numerical', 'integerOnly'=>true),
			array('image', 'length', 'max'=>225),
			// The following rule is used by search().
			array('mobil_id', 'safe'),
			array('image', 'file', 'types'=>'jpg, gif, png', 'allowEmpty'=>FALSE, 'on'=>'insert', 'except'=>array('createTemp', 'copy')),
			array('image', 'file', 'types'=>'jpg, gif, png', 'allowEmpty'=>TRUE, 'on'=>'update', 'except'=>array('createTemp', 'copy')),
			// Please remove those attributes that should not be searched.
			array('id, mobil_id, image', 'safe', 'on'=>'search'),
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
			'mobil_id' => 'Mobil',
			'image' => 'Images',
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
		$criteria->compare('mobil_id',$this->mobil_id);
		$criteria->compare('image',$this->image,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}