<?php
/**
 * User: luckymancvp
 * Date: 6/17/13
 * Time: 2:53 AM
 * @var SetController $this
 */

$this->renderPartial('_head');
?>

<div class="margin clear-40"></div>
<div class="content">
    <div class="container">
        <div id="primary" class="content-full-width">
            <div class="content-full-width">
                <h2 class="bg-title"> CHOOSE YOUR SET STYLE </h2>

                <div class="container">
                    <div class="services column one-third text-align-center">
                        <i class="icon-lightbulb"></i>
                        <div class="service-cont">
                            <h3>ARTICLE</h3>
                            <p>Sometime you read a foreign article in the internet and want to quickly know the content</p>
                        </div>
                    </div>
                    <div class="services column one-third text-align-center"> <i class="icon-magic"></i>
                        <div class="service-cont">
                            <h3>PARAGRAPH</h3>
                            <p>You have a paragraph and want to absorb new words from that.</p>
                        </div>
                    </div>
                    <div class="services column one-third text-align-center last">
                        <?php
                        echo CHtml::link(
                            '<i class="icon-resize-full"></i>',
                            array('/set/list')
                        );
                        ?>
                        <div class="service-cont">
                            <h3>WORD LIST</h3>
                            <p>You have a list of new words and want to quickly remember that</p>
                        </div>
                    </div>
                    <!--[ welcome content ends here ]-->
                </div>
            </div>
        </div>
    </div>
</div>