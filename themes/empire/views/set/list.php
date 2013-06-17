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
                <h2 class="bg-title">01. DESCRIBE YOUR SET</h2>

                <div class="container">
                    <div class="column one-half">
                        <label> Enter Title <span class="required"> * </span> </label>
                        <input type="text" required="" placeholder="Enter Your Set Title" name="textbox">
                    </div>


                    <div class="column one-half">
                        <label> Description </label>
                        <textarea name="desc"></textarea>
                    </div>
                    <!--[ welcome content ends here ]-->
                </div>
            </div>
        </div>
    </div>
</div>