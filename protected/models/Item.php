<?php
/**
 * The following are availabe model relations:
 * @property Set $set
 */
class Item extends ItemBase
{
    const QUICK_ITEMS_AMOUNT = 15;

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

    public static function isNewWord($word, $own_set_ids){
        $criteria = new CDbCriteria();
        $criteria->addCondition("word = :word");
        $criteria->params = array(':word'=>$word,);
        $criteria->addInCondition("set_id", $own_set_ids);
        return !Item::model()->exists($criteria);
    }

    public static function saveWords($words, $set_id){
        foreach ($words as $word){
            $item               = new Item();
            $item->word         = $word->baseform;
            $item->status       = 0;
            $item->updated_time = new CDbExpression("NOW()");
            $item->reading      = $word->reading;
            $item->set_id       = $set_id;
            if (!$item->save());
        }
    }

    public static function saveWord($word, $set_id = null){
        $item               = new Item();
        $item->word         = $word->baseform;
        $item->status       = 0;
        $item->updated_time = new CDbExpression("NOW()");
        $item->reading      = $word->reading;
        $item->set_id       = $set_id;
        if (!$item->save());
    }

    public static function getItemInSet($set_id){
        $items = Item::model()->findAllByAttributes( array("set_id" => $set_id), array("select"=>"id, word"));

        $result = array();
        foreach ($items as $item){
            $result["id"][]   = $item->id;
            $result["word"][] = $item->word;
        }

        return $result;
    }

    public static function updateMean($items, $trans){
        $sql = "";

        $i = 0;
        foreach ($trans as $tran){
            $sql .= "UPDATE item SET mean='{$tran->TranslatedText}' WHERE id='{$items[$i++]}';";
        }

        $command = Yii::app()->db->createCommand($sql);
        $command->execute();
    }

    public static function getItemsInSet($set_id){
        return Item::model()->findAllByAttributes( array("set_id" => $set_id));
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

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
            'pagination'=>array(
                'pageSize'=>50,
            ),
        ));
    }


    public static function getQuickItems($id = null, $amount = self::QUICK_ITEMS_AMOUNT)
    {
        if (!$id)
            $setIds = Set::getIds();
        else
            $setIds = array($id);

        $criteria = new CDbCriteria();
        $criteria->limit = $amount;
        $criteria->order = "ratio, updated_time";
        $criteria->addInCondition("set_id", $setIds);

        return Item::model()->findAll($criteria);
    }

    /**
     * @param $id
     * @return Item
     */
    public static function getById($id){
        $model = Item::model()->findByPk($id);
        return $model;
    }

    public static function updateStatic($id, $success){
        $model = self::getById($id);

        if (!$model) return;
        $new_total = $model->total + 1;
        $model->ratio = (int)(($model->ratio * $model->total  + $success *100) / ($new_total));
        $model->total = $new_total;
        $model->save();

        if ( $model->errors)
            dump($model->errors);
    }
}