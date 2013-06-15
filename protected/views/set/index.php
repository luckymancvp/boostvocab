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
                'template'=>'{view}{delete}&nbsp&nbsp&nbsp&nbsp{learn}&nbsp{quick learn}',
                'buttons'=>array(
                    'learn'=>array(
                        'icon'=>'heart',
                        'url'  => 'Yii::app()->createUrl("set/learn", array("id"=>$data->id))',
                    ),
                    'quick learn'=>array(
                        'icon'=>'time',
                        'url'  => 'Yii::app()->createUrl("set/quick", array("id"=>$data->id))',
                    ),
                ),
                'htmlOptions'=> array('style'=>'width : 80px'),
            )
        ),
    )); ?>

    <div class="form-actions">
        <?php
        if ($data->data == array())
            echo CHtml::link("Import Base Knowledge", array("/data/base"), array("class"=>"btn btn-success")) . " | ";
        echo CHtml::link("Quick Learn", array("/set/quick"), array("class"=>"btn btn-success"));
        echo " | ";
        echo CHtml::link("Import Vocabulary", array("/data/index"), array("class"=>"btn btn-warning"));
        ?>
    </div>
</div><!-- form -->