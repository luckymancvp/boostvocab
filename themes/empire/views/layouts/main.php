<!DOCTYPE html>

<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js'); ?>"></script>
<![endif]-->

<head>
    <meta charset="UTF-8">
    <!-- Meta tags -->
    <meta name="description" content="Empire - Multipurpose HTML Template"/>
    <meta name="author" content="designthemes"/>

    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title> Boost your vocabulary every day</title>

    <!-- Favicon -->
    <link href="favicon.html" rel="shortcut icon" type="image/x-icon" />

    <!-- MAIN STYLE -->
    <link id="default-css" href="<?php echo cssThemeUrl('style.css'); ?>" rel="stylesheet" type="text/css">
    <!-- Skin COLOR -->
    <link id="skin-css" href="<?php echo cssThemeUrl('skins/green/style.css'); ?>" rel="stylesheet" type="text/css">
    <!-- RESPONSIVE -->
    <link id="responsive-css" href="<?php echo cssThemeUrl('responsive.css'); ?>" rel="stylesheet" type="text/css">
    <!-- SHORTCODES -->
    <link id="shortcodes-css" href="<?php echo cssThemeUrl('shortcodes.css'); ?>" rel="stylesheet" type="text/css">

    <!--[if lt IE 10]>
    <link rel="stylesheet" type="text/css" href="<?php echo cssThemeUrl('ie9-and-down.css'); ?>" />
    <![endif]-->
    <!--[if lt IE 9]>
    <link rel="stylesheet" type="text/css" href="<?php echo cssThemeUrl('ie8-and-down.css'); ?>" />
    <![endif]-->

    <!-- gradients in ie9 and above -->

    <!--[if gte IE 9]>
    <style type="text/css">
        .button.gradient {
            filter: none;
        }
        .header.gradient {
            filter:none;
        }
        .newsletter-signup.gradient{
            filter:none;
        }
    </style>
    <![endif]-->

    <!-- Google Fonts Declaration Starts -->
    <link href='http://fonts.googleapis.com/css?family=Dosis:300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Dosis:400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Istok+Web:400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
    <!-- Google Fonts Declaration Ends -->

    <!-- Font Icon declaration -->
    <link rel="stylesheet" href="<?php echo cssThemeUrl('font-awesome.min.css'); ?>">

    <!--[if IE 7]>
    <link rel="stylesheet" type="text/css" href="<?php echo cssThemeUrl('ie7.css'); ?>">
    <link rel="stylesheet" href="<?php echo cssThemeUrl('font-awesome-ie7.min.css'); ?>">
    <![endif]-->

    <link type="text/css" rel="stylesheet" href="<?php echo cssThemeUrl('prettyPhoto.css'); ?>">

</head>

<body>
<!--[ wrapper div starts ]-->
<div id="wrapper">
<div class="main-container">
<!--[ page header starts ]-->
<header class="gradient">
    <div class="container"> <a id="logo" href="index.html"><img src="<?php echo imageThemeUrl('logo.png')?>" alt="" height="37px" title=""></a>
        <nav id="page-nav">
            <ul id="main-menu">
                <li class="menu-item">
                    <?php echo CHtml::link("Create a new set", array('/set/create'));?>
                </li>
                <li class="menu-item"><a href="#">My set</a></li>
                <li class="menu-item"><a href="#">Explore set</a></li>
                <li class="menu-item"><a href="#">Logout</a></li>
            </ul>
        </nav>
    </div>
</header>
<?php
    echo $content;
?>
<div class="margin clear-80"></div>
<footer>
    <div class="container">
        <div class="column one-fourth">
            <section class="widget widget_contact_details">
                <h3 class="widget-title">contact info</h3>
                <ul>
                    <li><i class="icon-map-marker"></i>東京都千代田区, <br> 六番町13番地, <br>ハイツ六番町, 202号. </li>
                    <li><i class="icon-mobile-phone"></i>(81) 8733- 6349</li>
                    <li><a href="#"><i class="icon-envelope-alt"></i>luckymancvp@gmail.com</a></li>
                </ul>
            </section>
        </div>
        <div class="column one-fourth">
            <section class="widget widget_flickr">
                <h3 class="widget-title">flickr</h3>
                <ul class="flickrs"></ul>
            </section>
        </div>
        <div class="column one-fourth">
            <section class="widget widget_footer_links">
                <h3 class="widget-title">links</h3>
                <ul>
                    <li><a href="http://twitter.github.io/bootstrap/"><i class="icon-angle-right"></i>Bootstrap</a></li>
                    <li><a href="http://www.yiiframework.com"><i class="icon-angle-right"></i>Yii Framework</a></li>
                    <li><a href="http://highscalability.com"><i class="icon-angle-right"></i>High Scalability</a></li>
                    <li><a href="https://coderwall.com"><i class="icon-angle-right"></i>Coder Wall</a></li>
                    <li><a href="http://freecode.vn"><i class="icon-angle-right"></i>FreeCodeVn</a></li>
                    <li><a href="http://hvaonline.net"><i class="icon-angle-right"></i>HVA Forums</a></li>
                </ul>
            </section>
        </div>
        <div class="column one-fourth last">
            <section class="widget widget_tweetbox">
                <h3 class="widget-title">Twitter Feed</h3>
                <div class="tweets"> </div>
            </section>
        </div>
    </div>
    <div class="footer-info">
        <div class="container">
            <ul class="footer-links">
                <li><a href="#">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Features</a></li>
                <li><a href="#">Blog</a></li>
                <li><a href="#">Portfolio</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
            <ul class="social-links">
                <li><a href="http://facebook.com/luckymancvp" class="fb"></a></li>
                <li><a href="http://twitter.com/luckymancvp" class="twit"></a></li>
                <li><a href="https://plus.google.com/110962328657139642027/posts" class="gp"></a></li>
                <li><a href="http://www.youtube.com/luckymancvp" class="youtube"></a></li>
            </ul>
        </div>
    </div>
</footer>
</div>
</div>
<script src="<?php echo jsThemeUrl('modernizr-2.6.2.min.js'); ?>"></script>
<?php
/** @var CClientScript $cs */
$cs = Yii::app()->clientScript;
$cs->registerCoreScript('jquery');
$cs->registerScriptFile(jsThemeUrl('jquery.prettyPhoto.js'), CClientScript::POS_END);
$cs->registerScriptFile(jsThemeUrl('jquery-easing-1.3.js'), CClientScript::POS_END);
$cs->registerScriptFile(jsThemeUrl('jquery.mobilemenu.js'), CClientScript::POS_END);
$cs->registerScriptFile(jsThemeUrl('jquery.viewport.js'), CClientScript::POS_END);
$cs->registerScriptFile(jsThemeUrl('jquery.tabs.min.js'), CClientScript::POS_END);
$cs->registerScriptFile(jsThemeUrl('jquery.carouFredSel-6.2.0-packed.js'), CClientScript::POS_END);
$cs->registerScriptFile(jsThemeUrl('jquery.flickr.min.js'), CClientScript::POS_END);
$cs->registerScriptFile(jsThemeUrl('jquery.tweet.js'), CClientScript::POS_END);
$cs->registerScriptFile(jsThemeUrl('jquery.cookie.js'), CClientScript::POS_END);
$cs->registerScriptFile(jsThemeUrl('shortcodes.js'), CClientScript::POS_END);
$cs->registerScriptFile(jsThemeUrl('custom.js'), CClientScript::POS_END);

?>

<!--<script src="<?php /*echo jsThemeUrl('controlpanel.js'); */?>"></script>-->

</body>
</html>