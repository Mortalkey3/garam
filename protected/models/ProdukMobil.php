<?php

/**
 * This is the model class for table "produk_mobil".
 *
 * The followings are the available columns in table 'produk_mobil':
 * @property integer $id
 * @property string $title
 * @property string $image1
 * @property string $image2
 * @property string $image3
 * @property integer $sort
 */
class ProdukMobil extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'produk_mobil';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title', 'required'),
			array('sort', 'numerical', 'integerOnly'=>true),
			array('title, image1, image2, image3', 'length', 'max'=>225),
			// The following rule is used by search().
			array('image1, image2, image3, thumb, varian, sort','safe'),
			// @todo Please remove those attributes that should not be searched.
			array('id, title, image1, image2, image3, sort', 'safe', 'on'=>'search'),
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
			'title' => 'Title',
			'image1' => 'Image1',
			'image2' => 'Image2',
			'image3' => 'Image3',
			'thumb' => 'Thumnail',
			'varian' => 'Varian',
			'sort' => 'Sort',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('image1',$this->image1,true);
		$criteria->compare('image2',$this->image2,true);
		$criteria->compare('image3',$this->image3,true);
		$criteria->compare('thumb',$this->thumb,true);
		$criteria->compare('varian',$this->varian,true);
		$criteria->compare('sort',$this->sort);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ProdukMobil the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
