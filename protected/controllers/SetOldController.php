<?php

class SetController extends Controller
{
	public function actionIndex()
	{
        $model          = new Set;
        $model->user_id = Yii::app()->user->id;

		$this->render('index', array(
            'model'=>$model,
        ));
	}

    public function actionView($id){
        $model = new Item();
        $model->set_id = $id;

        $this->render('view', array(
            'model'=>$model,
        ));
    }

    public function actionTranslate($id){
        $items = Item::getItemInSet($id);
        $bing  = new Bing();

        $trans = $bing->translates($items["word"]);
        Item::updateMean($items["id"], $trans);
    }

    public function actionDelete($id){
        $item = Item::getById($id);

        $setBase = Set::model()->findByAttributes(array(
            'user_id' => 0,
        ));

        $item->ratio  = 0;
        $item->set_id = $setBase->id;
        $item->save();
    }

    public function actionLearn($id){
        $model = Set::model()->findByPk((int)$id);
        if (!$model)
            ErrorHandler::raiseUserError("Please choose a set to learn");

        $items = Item::getItemsInSet($model->id);
        $this->render("learn", array(
            'model'=>$model,
            'items'=>CJSON::encode($items),
        ));
    }

    public function actionQuick($id = null, $amount = Item::QUICK_ITEMS_AMOUNT){
        $items  = Item::getQuickItems($id, $amount);
        $amount = count($items);

        if ($id){
            $model       = Set::getById((int)$id);
            $model->name = "Quick Learn {$model->name} By $amount Words";
        }else{
            $model = new Set();
            $model->name = "Quick Learn By $amount Words";
        }

        $this->render("learn", array(
            'model'=>$model,
            'items'=>CJSON::encode($items),
        ));
    }
}