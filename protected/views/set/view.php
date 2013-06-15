<?php
/* @var $this SetController*/

$this->pageTitle=Yii::app()->name . ' - Products';
$this->breadcrumbs=array(
    'Set' => array('/set'),
    'List Item',
);
?>

<h1>List item in set</h1>

<div class="form">

    <?php $this->widget('bootstrap.widgets.TbExtendedGridView', array(
        'fixedHeader' => true,

        'type'=>'striped bordered condensed',
        'dataProvider'=>$model->search(),
        'template'=>"{summary}{items}{pager}",
        'columns'=>array(
            'word',
            'reading',
            'mean',
            'ratio',
            array(
                'class' => 'bootstrap.widgets.TbButtonColumn',
                'htmlOptions' => array('style' => 'width: 50px'),
                'template'=>'{delete}',
            )
        ),
    )); ?>

</div><!-- form -->