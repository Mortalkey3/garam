<?php

/**
 * This is the model class for table "mobil_varian".
 *
 * The followings are the available columns in table 'mobil_varian':
 * @property integer $id
 * @property integer $mobil_id
 * @property string $title
 * @property string $content
 * @property string $image
 * @property string $harga
 * @property string $harga_cicilan
 * @property integer $sort
 * @property integer $active
 */
class MobilVarian extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return MobilVarian the static model class
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
		return 'mobil_varian';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			// array('mobil_id, sort, active', 'numerical', 'integerOnly'=>true),
			array('title, harga, harga_cicilan', 'length', 'max'=>225),
			array('content, mobil_id, sort, active, image', 'safe'),
			// The following rule is used by search().
			array('image', 'file', 'types'=>'jpg, gif, png', 'allowEmpty'=>FALSE, 'on'=>'insert', 'except'=>array('createTemp', 'copy')),
			array('image', 'file', 'types'=>'jpg, gif, png', 'allowEmpty'=>TRUE, 'on'=>'update', 'except'=>array('createTemp', 'copy')),
			// Please remove those attributes that should not be searched.
			array('id, mobil_id, title, content, image, harga, harga_cicilan, sort, active', 'safe', 'on'=>'search'),
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
			'title' => 'Title',
			'content' => 'Content',
			'image' => 'Image',
			'harga' => 'Harga',
			'harga_cicilan' => 'Harga Cicilan',
			'sort' => 'Sort',
			'active' => 'Active',
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
		$criteria->compare('title',$this->title,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('harga',$this->harga,true);
		$criteria->compare('harga_cicilan',$this->harga_cicilan,true);
		$criteria->compare('sort',$this->sort);
		$criteria->compare('active',$this->active);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}