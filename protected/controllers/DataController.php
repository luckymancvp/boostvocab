<?php

class DataController extends Controller
{
	public function actionIndex()
	{
        $block = Yii::app()->request->getParam("block");
        $title = Yii::app()->request->getParam("title");

        if (!$block){
            $this->render('index', array(
                'title'=>$title,
                'block'=>$block,
            ));
            return;
        }

        $set_id = Set::getId($title);
        $block = $this->filterBlock($block);
        $words = $this->callJLP($block);

        $own_set_ids = Set::getIds();
        $words = $this->saveNewWord($words, $set_id, $own_set_ids);
        //Item::saveWords($words, $set_id);

        $this->redirect(array('set/view', 'id'=>$set_id));
	}

    public function actionLine()
    {
        $block = Yii::app()->request->getParam("block");
        $title = Yii::app()->request->getParam("title");

        if (!$block){
            $this->render('index', array(
                'title'=>$title,
                'block'=>$block,
            ));
            return;
        }

        $set_id = Set::getId($title);

        $words = explode(PHP_EOL, $block);
        $words = array_filter($words, "trim");

        foreach ($words as $word){
            $item = new Item();
            $item->word   = $word;
            $item->updated_time = new CDbExpression("NOW()");
            $item->status = 0;
            $item->set_id = $set_id;
            $item->ratio  = 0;
            $item->total  = 0;

            $item->save();
        }

        $this->redirect(array('set/view', 'id'=>$set_id));
    }

    public function actionExcel()
    {
        $block   = Yii::app()->request->getParam("block");
        $title   = Yii::app()->request->getParam("title");
        $space   = Yii::app()->request->getParam("space","0");
        $options = array(
            '0' => "Excel Space",
            '1' => "Colon",
        );

        if (!$block){
            $this->render('index', array(
                'title'=>$title,
                'block'=>$block,
                'space'=>$space,
                'options'=>$options,
            ));
            return;
        }

        $set_id = Set::getId($title);

        $words = explode(PHP_EOL, $block);
        $words = array_filter($words, "trim");

        foreach ($words as $word){
            if ($space == "0")
                $word = explode("\t", $word);
            else{
                $word = explode(":", $word);
            }
            $word = array_filter($word, "trim");
            $item = new Item();

            if (!isset($word[1]))
                $word[1] = "";
            $item->word   = $word[0];

            if (count($word) == 3){
                $item->reading = $word[1];
                $item->mean    = $word[2];
            }
            else
                $item->mean   = $word[1];
            $item->updated_time = new CDbExpression("NOW()");
            $item->status = 0;
            $item->set_id = $set_id;
            $item->ratio  = 0;
            $item->total  = 0;

            $item->save();
        }

        $this->redirect(array('set/view', 'id'=>$set_id));
    }

    public function actionBase(){
        $model          = new Set;
        $model->user_id = 0;

        $this->render('base', array(
            'model'=>$model,
        ));
    }

    public function actionToYours($id){
        $this->redirect(array("/set/view", "id"=>Set::addYours($id)));
    }

    public function actionTranslate(){
        $bing = new Bing();
        $res  = $bing->translates(array("hello", "goodbye"));
        dump($res);

        $this->render("translate");
    }

    private function callJLP($block){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://jlp.yahooapis.jp/MAService/V1/parse?appid=dj0zaiZpPWdmVlU5TXZGWHZ3QSZkPVlXazlaSE5aVVdaVU4yY21jR285TUEtLSZzPWNvbnN1bWVyc2VjcmV0Jng9OWM-");
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, array(
            'sentence'=>$block,
            'response'=>'surface,reading,pos,baseform,feature',
            'filter'  => "1|2|3|4|5|6|7|8|9|10|11|12",
        ));

        $result = curl_exec($ch);
        curl_close($ch);

        $xml = simplexml_load_string($result);
        return $xml->ma_result->word_list->word;
    }

    private function filterNewWord($words){
        $list = array();
        foreach ($words as $word) {
            if (Item::isNewWord($word->baseform)){
                $list[] = $word;
            }
        }

        return $list;
    }

    private function filterBlock($block){
        $block = preg_replace('/(\d+)|(-->)|:|,|\?|!|。♪/', " ", $block);
        return $block;
    }

    private function saveNewWord($words, $set_id, $own_set_ids){
        $list = array();
        foreach ($words as $word) {
            if (Item::isNewWord($word->baseform, $own_set_ids)){
                Item::saveWord($word, $set_id);
            }
        }
    }

    public function actionUpdateStatic(){
        $data = Yii::app()->request->getParam("data");
        $data = CJSON::decode($data);

        foreach ($data as $key => $value){
            Item::updateStatic((int)$key, $value);
        }

        Yii::app()->end("1");
    }
}