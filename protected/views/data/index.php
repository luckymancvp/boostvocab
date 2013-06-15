<?php
/* @var $this DataController */

$this->breadcrumbs=array(
	'Data',
);
?>
<h1>Import words</h1>

<div class="row">
    <div class="span6">
        <?php
            echo CHtml::form();
            echo CHtml::label("Name of set ", null);
            echo CHtml::textField("title", $title);
            echo CHtml::label("Paste words here", null);
            echo CHtml::textArea("block", $block, array("style"=>"width: 100%; height: 360px"));
            if (isset($space))
                echo Chtml::dropDownList("space", $space, $options);
            echo "<br>";
            echo CHtml::submitButton("Submit", array("class"=>"btn btn-success"));
            echo CHtml::endForm();
        ?>
    </div>
</div>