<?php
/**
 * Created by JetBrains PhpStorm.
 * User: luckymancvp
 * Date: 3/19/13
 * Time: 6:39 PM
 * To change this template use File | Settings | File Templates.
 */

class SystemController extends NoNeedAuthController{

    public function actionCreateBaseData(){
        $items = Item::model()->findAllByAttributes(array('set_id'=>1));

        $result = "";
        /** @var $item Item */
        foreach ($items as $item)
            $result .= $item->word . ",";

        $this->render('baseData', array('result'=>$result));
    }

    public function actionImportBaseData(){
        // Get file name
        $fileName = Yii::getPathOfAlias('application').'/data/base.csv';

        // Open file
        $handle   = fopen($fileName, "r");

        // Read data
        $data = fgetcsv($handle);

        // Import data
        $sql = "INSERT INTO `set` values (null, 'Base Word', 0, NOW());";
        foreach ($data as $item){
            $sql .= "INSERT INTO item (`word`, `updated_time`, `set_id`, `ratio`) values ('$item', NOW(), 1, 200);";
        }

        // Excute data
        Yii::app()->db->createCommand($sql)->execute();
    }
}