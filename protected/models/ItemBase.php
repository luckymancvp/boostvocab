<?php

/**
 * This is the DAO model class for table "item".
 *
 * The followings are the available columns in table 'item':
 * @property integer $id
 * @property string $word
 * @property string $mean
 * @property integer $status
 * @property string $updated_time
 * @property string $reading
 * @property string $pos
 * @property string $feauture
 * @property integer $set_id
 * @property integer $ratio
 * @property integer $total
 *
 * The followings are the available model relations:
 * @property Set $set
 */
abstract class ItemBase extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Item the static model class
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
		return 'item';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('word, updated_time, set_id', 'required'),
			array('status, set_id, ratio, total', 'numerical', 'integerOnly'=>true),
			array('word, reading, pos, feauture', 'length', 'max'=>45),
			array('mean', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, word, mean, status, updated_time, reading, pos, feauture, set_id, ratio, total', 'safe', 'on'=>'search'),
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
			'set' => array(self::BELONGS_TO, 'Set', 'set_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'word' => 'Word',
			'mean' => 'Mean',
			'status' => 'Status',
			'updated_time' => 'Updated Time',
			'reading' => 'Reading',
			'pos' => 'Pos',
			'feauture' => 'Feauture',
			'set_id' => 'Set',
			'ratio' => 'Ratio',
			'total' => 'Total',
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
		$criteria->compare('word',$this->word,true);
		$criteria->compare('mean',$this->mean,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('updated_time',$this->updated_time,true);
		$criteria->compare('reading',$this->reading,true);
		$criteria->compare('pos',$this->pos,true);
		$criteria->compare('feauture',$this->feauture,true);
		$criteria->compare('set_id',$this->set_id);
		$criteria->compare('ratio',$this->ratio);
		$criteria->compare('total',$this->total);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}