<?php
class Set extends SetBase
{
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Set the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    /**
     * @param $id
     * @return Set
     */
    public static function getById($id){
        $model = Set::model()->findByPk($id);
        if (!$model)
            ErrorHandler::raiseUserError("Can't find set");

        return $model;
    }

    public static function getId($title){
        $model = Set::model()->findByAttributes(array("name"=>$title));

        if (!$model){
            $model               = new Set();
            $model->name         = $title;
            $model->user_id      = Yii::app()->user->id;
            $model->updated_time = new CDbExpression("NOW()");
            if (!$model->save());
        }

        return $model->id;
    }


    /**
     * @param $user_id
     * @return array
     */
    public static function getIds($user_id = null){
        if (!$user_id)
            $user_id = Yii::app()->user->id;

        // データを見つける
        $models = Set::model()->findAllByAttributes(array(
            'user_id'=>$user_id,
        ));

        //　結果を準備する
        /** /@var $model Set */
        $ids = array();
        foreach ($models as $model){
            $ids[] = $model->id;
        }
        return $ids;
    }

    public static function addYours($id){
        // copy set
        $set = Set::model()->findByPk((int)$id);
        if (!$set)
            ErrorHandler::raiseUserError("Set is not found");

        $cp_set = new Set();
        $cp_set->attributes   = $cp_set->attributes;
        $cp_set->user_id      = Yii::app()->user->id;
        $cp_set->name         = $set->name;
        $cp_set->updated_time = new CDbExpression("NOW()");
        $cp_set->save();

        /**
         * Copy items
         * @var $item Item
         * @var $cp_item Item
         */

        $sql = "";
        $items = Item::model()->findAllByAttributes(array('set_id'=>$id));
        foreach ($items as $item){
            $cp_item               = new Item();
            $cp_item->attributes   = $item->attributes;
            $cp_item->updated_time = new CDbExpression("NOW()");
            $cp_item->set_id       = $cp_set->id;
            $cp_item->save();
        }

        return $cp_set->id;

    }
}