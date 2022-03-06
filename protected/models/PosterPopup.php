<?php

/**
 * This is the model class for table "tb_poster_popup".
 *
 * The followings are the available columns in table 'tb_poster_popup':
 * @property string $id
 * @property string $nama
 * @property string $image
 * @property integer $urutan
 * @property integer $aktif
 */
class PosterPopup extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return PosterPopup the static model class
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
		return 'tb_poster_popup';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('urutan, aktif', 'numerical', 'integerOnly'=>true),
			array('nama', 'length', 'max'=>225),
			array('image','safe'),
			// Please remove those attributes that should not be searched.
			array('id, nama, image, urutan, aktif', 'safe', 'on'=>'search'),
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
			'nama' => 'Nama',
			'image' => 'Image',
			'urutan' => 'Urutan',
			'aktif' => 'Aktif',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('nama',$this->nama,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('urutan',$this->urutan);
		$criteria->compare('aktif',$this->aktif);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}