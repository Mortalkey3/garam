<?php

/**
 * This is the model class for table "list_product".
 *
 * The followings are the available columns in table 'list_product':
 * @property integer $a
 * @property integer $b
 * @property string $c
 * @property string $d
 * @property string $e
 * @property string $f
 * @property string $g
 * @property string $h
 * @property string $i
 * @property integer $j
 * @property string $k
 * @property string $l
 * @property integer $m
 * @property integer $o
 * @property string $p
 * @property string $q
 * @property integer $r
 * @property string $s
 * @property string $t
 */
class ListProduct extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ListProduct the static model class
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
		return 'list_product';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('a, b, j, m, o, r', 'numerical', 'integerOnly'=>true),
			array('c', 'length', 'max'=>54),
			array('d', 'length', 'max'=>17),
			array('e', 'length', 'max'=>20),
			array('f', 'length', 'max'=>11),
			array('g', 'length', 'max'=>42),
			array('h', 'length', 'max'=>73),
			array('i', 'length', 'max'=>12),
			array('k', 'length', 'max'=>245),
			array('l', 'length', 'max'=>18),
			array('p', 'length', 'max'=>40),
			array('q', 'length', 'max'=>67),
			array('s', 'length', 'max'=>37),
			array('t', 'length', 'max'=>2),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('a, b, c, d, e, f, g, h, i, j, k, l, m, o, p, q, r, s, t', 'safe', 'on'=>'search'),
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
			'a' => 'A',
			'b' => 'B',
			'c' => 'C',
			'd' => 'D',
			'e' => 'E',
			'f' => 'F',
			'g' => 'G',
			'h' => 'H',
			'i' => 'I',
			'j' => 'J',
			'k' => 'K',
			'l' => 'L',
			'm' => 'M',
			'o' => 'O',
			'p' => 'P',
			'q' => 'Q',
			'r' => 'R',
			's' => 'S',
			't' => 'T',
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

		$criteria->compare('a',$this->a);
		$criteria->compare('b',$this->b);
		$criteria->compare('c',$this->c,true);
		$criteria->compare('d',$this->d,true);
		$criteria->compare('e',$this->e,true);
		$criteria->compare('f',$this->f,true);
		$criteria->compare('g',$this->g,true);
		$criteria->compare('h',$this->h,true);
		$criteria->compare('i',$this->i,true);
		$criteria->compare('j',$this->j);
		$criteria->compare('k',$this->k,true);
		$criteria->compare('l',$this->l,true);
		$criteria->compare('m',$this->m);
		$criteria->compare('o',$this->o);
		$criteria->compare('p',$this->p,true);
		$criteria->compare('q',$this->q,true);
		$criteria->compare('r',$this->r);
		$criteria->compare('s',$this->s,true);
		$criteria->compare('t',$this->t,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}