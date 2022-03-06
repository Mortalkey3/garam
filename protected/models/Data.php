<?php

/**
 * This is the model class for table "data".
 *
 * The followings are the available columns in table 'data':
 * @property integer $id
 * @property string $image
 * @property string $name
 * @property string $reference
 * @property string $categoty
 * @property integer $base_price
 * @property integer $final_price
 * @property integer $qty
 * @property integer $status
 */
class Data extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Data the static model class
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
		return 'data';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, image, name, reference, categoty, base_price, final_price, qty, status', 'required'),
			array('id, base_price, final_price, qty, status', 'numerical', 'integerOnly'=>true),
			array('image, name', 'length', 'max'=>200),
			array('reference, categoty', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, image, name, reference, categoty, base_price, final_price, qty, status', 'safe', 'on'=>'search'),
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
			'image' => 'Image',
			'name' => 'Name',
			'reference' => 'Reference',
			'categoty' => 'Categoty',
			'base_price' => 'Base Price',
			'final_price' => 'Final Price',
			'qty' => 'Qty',
			'status' => 'Status',
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
		$criteria->compare('image',$this->image,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('reference',$this->reference,true);
		$criteria->compare('categoty',$this->categoty,true);
		$criteria->compare('base_price',$this->base_price);
		$criteria->compare('final_price',$this->final_price);
		$criteria->compare('qty',$this->qty);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}