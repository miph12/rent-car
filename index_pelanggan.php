<?php
 //error_reporting(0);
include"koneksi.php";
session_start();
$kode = $_SESSION['id_pemesan'];
$cari=  mysql_query("select* from tb_pemesan where id_pemesan ='$kode' ")or die(mysql_error());
$data= mysql_fetch_assoc($cari);

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>TA | AMIKI</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Charisma, a fully featured, responsive, HTML5, Bootstrap admin template.">
    <meta name="author" content="Muhammad Usman">

    <!-- The styles -->
    <link id="bs-css" href="css/bootstrap-cerulean.min.css" rel="stylesheet">

    <link href="ch/css/charisma-app.css" rel="stylesheet">
    <link href='ch/bower_components/fullcalendar/dist/fullcalendar.css' rel='stylesheet'>
    <link href='ch/bower_components/fullcalendar/dist/fullcalendar.print.css' rel='stylesheet' media='print'>
    <link href='ch/bower_components/chosen/chosen.min.css' rel='stylesheet'>
    <link href='ch/bower_components/colorbox/example3/colorbox.css' rel='stylesheet'>
    <link href='ch/bower_components/responsive-tables/responsive-tables.css' rel='stylesheet'>
    <link href='ch/bower_components/bootstrap-tour/build/css/bootstrap-tour.min.css' rel='stylesheet'>
    <link href='ch/css/jquery.noty.css' rel='stylesheet'>
    <link href='ch/css/noty_theme_default.css' rel='stylesheet'>
    <link href='ch/css/elfinder.min.css' rel='stylesheet'>
    <link href='ch/css/elfinder.theme.css' rel='stylesheet'>
    <link href='ch/css/jquery.iphone.toggle.css' rel='stylesheet'>
    <link href='ch/css/uploadify.css' rel='stylesheet'>
    <link href='ch/css/animate.min.css' rel='stylesheet'>

    <!-- jQuery -->
    <script src="ch/bower_components/jquery/jquery.min.js"></script>

    <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- The fav icon -->
    <link rel="shortcut icon" href="ch/img/favicon.ico">

</head>

<body>
    <!-- topbar starts -->
    <div class="navbar navbar-default" role="navigation">

        <div class="navbar-inner">
            <button type="button" class="navbar-toggle pull-left animated flip">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html"> <img alt="Charisma Logo" src="img/logo20.png" class="hidden-xs"/>
                <span>Rental</span></a>

            <!-- user dropdown starts -->
            <div class="btn-group pull-right">
                <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <i class="glyphicon glyphicon-user"></i><span class="hidden-sm hidden-xs"> <?php echo $data['nama_pemesan']; ?></span>
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    <li><a href="#">Profile</a></li>
                    <li class="divider"></li>
                    <li><a href="index.php">Logout</a></li>
                </ul>
            </div>
            <!-- user dropdown ends -->

            <!-- theme selector starts -->
            <div class="btn-group pull-right theme-container animated tada">
                <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <i class="glyphicon glyphicon-tint"></i><span
                        class="hidden-sm hidden-xs"> Change Theme / Skin</span>
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" id="themes">
                    <li><a data-value="classic" href="#"><i class="whitespace"></i> Classic</a></li>
                    <li><a data-value="cerulean" href="#"><i class="whitespace"></i> Cerulean</a></li>
                    <li><a data-value="cyborg" href="#"><i class="whitespace"></i> Cyborg</a></li>
                    <li><a data-value="simplex" href="#"><i class="whitespace"></i> Simplex</a></li>
                    <li><a data-value="darkly" href="#"><i class="whitespace"></i> Darkly</a></li>
                    <li><a data-value="lumen" href="#"><i class="whitespace"></i> Lumen</a></li>
                    <li><a data-value="slate" href="#"><i class="whitespace"></i> Slate</a></li>
                    <li><a data-value="spacelab" href="#"><i class="whitespace"></i> Spacelab</a></li>
                    <li><a data-value="united" href="#"><i class="whitespace"></i> United</a></li>
                </ul>
            </div>
            <!-- theme selector ends -->

            <ul class="collapse navbar-collapse nav navbar-nav top-menu">
            </ul>

        </div>
    </div>
    <!-- topbar ends -->

        <?php include('menu_pelanggan.php'); ?>

        <noscript>
            <div class="alert alert-block col-md-12">
                <h4 class="alert-heading">Warning!</h4>

                <p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a>
                    enabled to use this site.</p>
            </div>
        </noscript>

        <div id="content" class="col-lg-10 col-sm-10">
            <!-- content starts -->

        
   
            <div>

 
        <!--/span-->
        </div><!--/row-->
        <?php 
        include "konten.php"; 
        ?>
 </div>
</div>
    <!-- content ends -->
    <hr>

    <footer class="row">
        <p class="col-md-9 col-sm-9 col-xs-12 copyright">&copy; <a href="http://usman.it" target="_blank">Mu'tasim
                Billa</a> 2012 - 2015</p>

        <p class="col-md-3 col-sm-3 col-xs-12 powered-by">Powered by: <a
                href="http://usman.it/free-responsive-admin-template">Firqoh</a></p>
    </footer>

</div><!--/.fluid-container-->

<!-- external javascript -->

<script src="ch/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- library for cookie management -->
<script src="ch/js/jquery.cookie.js"></script>
<!-- calender plugin -->
<script src='ch/bower_components/moment/min/moment.min.js'></script>
<script src='ch/bower_components/fullcalendar/dist/fullcalendar.min.js'></script>
<!-- data table plugin -->
<script src='ch/js/jquery.dataTables.min.js'></script>

<!-- select or dropdown enhancer -->
<script src="ch/bower_components/chosen/chosen.jquery.min.js"></script>
<!-- plugin for gallery image view -->
<script src="ch/bower_components/colorbox/jquery.colorbox-min.js"></script>
<!-- notification plugin -->
<script src="ch/js/jquery.noty.js"></script>
<!-- library for making tables responsive -->
<script src="ch/bower_components/responsive-tables/responsive-tables.js"></script>
<!-- tour plugin -->
<script src="ch/bower_components/bootstrap-tour/build/js/bootstrap-tour.min.js"></script>
<!-- star rating plugin -->
<script src="ch/js/jquery.raty.min.js"></script>
<!-- for iOS style toggle switch -->
<script src="ch/js/jquery.iphone.toggle.js"></script>
<!-- autogrowing textarea plugin -->
<script src="ch/js/jquery.autogrow-textarea.js"></script>
<!-- multiple file upload plugin -->
<script src="ch/js/jquery.uploadify-3.1.min.js"></script>
<!-- history.js for cross-browser state change on ajax -->
<script src="ch/js/jquery.history.js"></script>
<!-- application script for Charisma demo -->
<script src="ch/js/charisma.js"></script>


</body>
</html>
