<?php
/**
 * @var $this SetController
 * @var $model Set
 * @var $cs CClientScript
 */

$this->pageTitle=Yii::app()->name . ' - Set';
$this->breadcrumbs=array(
    'Set' => array('/set'),
    'Learn',
);

// import js file
$cs = Yii::app()->clientScript;

$cs->registerScriptFile(jsUrl('basic.js'), CClientScript::POS_END);

$cs->registerScriptFile(jsUrl('Counting.js'), CClientScript::POS_END);
$cs->registerScriptFile(jsUrl('CountingView.js'), CClientScript::POS_END);

$cs->registerScriptFile(jsUrl('FinishedView.js'), CClientScript::POS_END);

$cs->registerScriptFile(jsUrl('Item.js'), CClientScript::POS_END);
$cs->registerScriptFile(jsUrl('ItemView.js'), CClientScript::POS_END);
$cs->registerScriptFile(jsUrl('Items.js'), CClientScript::POS_END);
$cs->registerScriptFile(jsUrl('ItemMasterView.js'), CClientScript::POS_END);

?>

<h3><?php echo $model->name?></h3>
<div class="row">
    <div class="span9">
        <div class="widget">
            <div class="widget-header">
                <i class="icon-star"></i><h3>Learn</h3>
            </div>
            <div class="widget-content">
                <div id="item-quiz" class="news-items"></div>
            </div>
        </div>
    </div>

    <div class="span3">
        <div class="span6 well">
            <div id="learning-static"></div>
            <hr>
            <!--<label class="checkbox">
                <input type="checkbox" value="">
                Prompt with Term
            </label>-->
            <button class="btn btn-success" id="repeat-btn">Repeat</button>
            <button class="btn btn-warning" id="start-over-btn">Start Over</button>
        </div>
    </div>
</div>

<script type="text/template" id="item-template">
        <%=word%> ?
        <hr>
            <button class="btn btn-inverse  btn-forgot"   >I forgot this word :(</button>
            <hr>
            <button class="btn btn-danger   btn-answer"   >Show me answer :|</button>
            <hr>
            <button class="btn btn-success  btn-remember" >I remembered :)</button>
</script>

<script type="text/template" id="item-answer-template">
        <%=word%> ?
        <hr>
        <%=reading%>
        <hr>
        <%=mean%>
        <hr>
            <button class="btn btn-inverse  btn-forgot"   >I forgot this word :(</button>
            <hr>
            <button class="btn btn-success  btn-remember" >I remembered :)</button>
</script>

<script type="text/template" id="finished-template">
        <h4>FINISHED !!</h4>
        <hr>
        <div class="row">

        </div>
</script>

<script type="text/template" id="static-template">
    <p><strong>Learning Static Round : <%= round%></strong></p>
    <button class="btn"><%= remain%></button>
    <button class="btn btn-success"><%= success%></button>
    <button class="btn btn-danger"><%= wrong%></button>
</script>

<script>
    itemsJSON = <?php echo $items ?>;
</script>