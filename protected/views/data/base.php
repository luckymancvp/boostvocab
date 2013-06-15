<?php
/* @var $this SetController*/

$this->pageTitle=Yii::app()->name . ' - Set';
$this->breadcrumbs=array(
    'Set' => array('/set'),
    'List Set',
);

$data = $model->search();
?>

<h1>List All Sets</h1>

<div class="form">

    <?php $this->widget('bootstrap.widgets.TbGridView', array(
        'type'=>'striped bordered condensed',
        'dataProvider'=>$data,
        'template'=>"{items}{pager}",
        'columns'=>array(
            'name',
            array(
                'class'=>'bootstrap.widgets.TbButtonColumn',
                'template'=>'{view}{Add to yours}',
                'buttons'=>array(
                    'Add to yours'=>array(
                        'icon'=>'flag',
                        'url'  => 'Yii::app()->createUrl("data/toYours", array("id"=>$data->id))',
                    ),
                    'view'=>array(
                        'url'  => 'Yii::app()->createUrl("set/view", array("id"=>$data->id))',
                    ),
                ),
            )
        ),
    )); ?>
</div><!-- form -->