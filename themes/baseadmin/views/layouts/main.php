<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Dashboard - Base Admin</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">

    <link href="<?php echo cssThemeUrl("bootstrap.min.css") ?>" rel="stylesheet">
    <link href="<?php echo cssThemeUrl("bootstrap-responsive.min.css") ?>" rel="stylesheet">

    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
    <link href="<?php echo cssThemeUrl("font-awesome.css") ?>" rel="stylesheet">

    <link href="<?php echo cssThemeUrl("base-admin.css") ?>" rel="stylesheet">
    <link href="<?php echo cssThemeUrl("base-admin-responsive.css") ?>" rel="stylesheet">

    <link href="<?php echo cssThemeUrl("pages/dashboard.css") ?>" rel="stylesheet">

    <?php
    /** @var $cs CClientScript */
    $cs = Yii::app()->clientScript;
    $cs->registerCoreScript('jquery');
    $cs->registerScriptFile(jsUrl('underscore-min.js'));
    $cs->registerScriptFile(jsUrl('backbone-min.js'));
    ?>
    <script>
        DATA_URL = "<?php echo Yii::app()->createUrl("/data")?>/";
    </script>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

</head>

<body>

<div class="navbar navbar-fixed-top">

    <div class="navbar-inner">

        <div class="container">

            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>

            <a class="brand" href="./">
                Base Admin
            </a>

            <div class="nav-collapse">
                <ul class="nav pull-right">
                    <li class="dropdown">

                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon-cog"></i>
                            Settings
                            <b class="caret"></b>
                        </a>

                        <ul class="dropdown-menu">
                            <li><a href="javascript:;">Account Settings</a></li>
                            <li><a href="javascript:;">Privacy Settings</a></li>
                            <li class="divider"></li>
                            <li><a href="javascript:;">Help</a></li>
                        </ul>

                    </li>

                    <li class="dropdown">

                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon-user"></i>
                            Rod Howard
                            <b class="caret"></b>
                        </a>

                        <ul class="dropdown-menu">
                            <li><a href="javascript:;">My Profile</a></li>
                            <li><a href="javascript:;">My Groups</a></li>
                            <li class="divider"></li>
                            <li><a href="javascript:;">Logout</a></li>
                        </ul>

                    </li>
                </ul>

                <form class="navbar-search pull-right">
                    <input type="text" class="search-query" placeholder="Search">
                </form>

            </div><!--/.nav-collapse -->

        </div> <!-- /container -->

    </div> <!-- /navbar-inner -->

</div> <!-- /navbar -->





<div class="subnavbar">

    <div class="subnavbar-inner">

        <div class="container">

            <ul class="mainnav">

                <li class="active">
                    <a href="./">
                        <i class="icon-home"></i>
                        <span>Home</span>
                    </a>
                </li>

                <li>
                    <a href="./faq.html">
                        <i class="icon-pushpin"></i>
                        <span>FAQ</span>
                    </a>
                </li>

                <li>
                    <a href="./pricing.html" class="dropdown-toggle">
                        <i class="icon-th-large"></i>
                        <span>Pricing Plans</span>
                    </a>
                </li>

                <li>
                    <a href="./reports.html">
                        <i class="icon-bar-chart"></i>
                        <span>Reports</span>
                    </a>
                </li>

                <li>
                    <a href="./guidely.html">
                        <i class="icon-facetime-video"></i>
                        <span>Guided Tour</span>
                    </a>
                </li>

                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="icon-share-alt"></i>
                        <span>More Pages</span>
                        <b class="caret"></b>
                    </a>

                    <ul class="dropdown-menu">
                        <li><a href="./charts.html">Charts</a></li>
                        <li><a href="./account.html">User Account</a></li>
                        <li class="divider"></li>
                        <li><a href="./login.html">Login</a></li>
                        <li><a href="./signup.html">Signup</a></li>
                        <li><a href="./error.html">Error</a></li>
                    </ul>
                </li>

            </ul>

        </div> <!-- /container -->

    </div> <!-- /subnavbar-inner -->

</div> <!-- /subnavbar -->


<div class="main">

<div class="main-inner">

<div class="container">

<?php echo $content ?>

</div> <!-- /container -->

</div> <!-- /main-inner -->

</div> <!-- /main -->



<div class="extra">

    <div class="extra-inner">

        <div class="container">

            <div class="row">

                <div class="span3">

                    <h4>About</h4>

                    <ul>
                        <li><a href="javascript:;">About Us</a></li>
                        <li><a href="javascript:;">Twitter</a></li>
                        <li><a href="javascript:;">Facebook</a></li>
                        <li><a href="javascript:;">Google+</a></li>
                    </ul>

                </div> <!-- /span3 -->

                <div class="span3">

                    <h4>Support</h4>

                    <ul>
                        <li><a href="javascript:;">Frequently Asked Questions</a></li>
                        <li><a href="javascript:;">Ask a Question</a></li>
                        <li><a href="javascript:;">Video Tutorial</a></li>
                        <li><a href="javascript:;">Feedback</a></li>
                    </ul>

                </div> <!-- /span3 -->

                <div class="span3">

                    <h4>Legal</h4>

                    <ul>
                        <li><a href="javascript:;">License</a></li>
                        <li><a href="javascript:;">Terms of Use</a></li>
                        <li><a href="javascript:;">Privacy Policy</a></li>
                        <li><a href="javascript:;">Security</a></li>
                    </ul>

                </div> <!-- /span3 -->

                <div class="span3">

                    <h4>Settings</h4>

                    <ul>
                        <li><a href="javascript:;">Consectetur adipisicing</a></li>
                        <li><a href="javascript:;">Eiusmod tempor </a></li>
                        <li><a href="javascript:;">Fugiat nulla pariatur</a></li>
                        <li><a href="javascript:;">Officia deserunt</a></li>
                    </ul>

                </div> <!-- /span3 -->

            </div> <!-- /row -->

        </div> <!-- /container -->

    </div> <!-- /extra-inner -->

</div> <!-- /extra -->




<div class="footer">

    <div class="footer-inner">

        <div class="container">

            <div class="row">

                <div class="span12">
                    &copy; 2012 <a href="http://bootstrapadmin.com">Base Admin</a>.
                </div> <!-- /span12 -->

            </div> <!-- /row -->

        </div> <!-- /container -->

    </div> <!-- /footer-inner -->

</div> <!-- /footer -->


<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<?php
    Yii::app()->clientScript->registerScriptFile(jsThemeUrl("base.js"));
    Yii::app()->clientScript->registerCoreScript("jquery");
?>
</body>
</html>
