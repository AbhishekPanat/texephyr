<?php 
    include_once('include/all.php');
    //prx($_SERVER);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>TEXEPHYR-The Technical Fest Of MIT-WPU</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content=""> -->
    <link rel="icon" href="image/icon/3.png">


    <!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<![endif]-->


    <!-- CSS Files
    ================================================== -->
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="css/jpreloader.css" type="text/css">
    <link rel="stylesheet" href="css/animate.css" type="text/css">
    <link rel="stylesheet" href="css/plugin.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.css" type="text/css">
    <link rel="stylesheet" href="css/owl.theme.css" type="text/css">
    <link rel="stylesheet" href="css/owl.transitions.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/jquery.countdown.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
	<link rel="stylesheet" href="css/twentytwenty.css" type="text/css">

    <!-- custom background -->
    <link rel="stylesheet" href="css/bg.css" type="text/css">

    <!-- color scheme -->
	<link rel="stylesheet" href="css/colors/magenta.css" type="text/css" id="colors">
    <link rel="stylesheet" href="css/color.css" type="text/css">

    <!-- load fonts -->
    <link rel="stylesheet" href="fonts/font-awesome/css/font-awesome.css" type="text/css">
    <link rel="stylesheet" href="fonts/elegant_font/HTML_CSS/style.css" type="text/css">
    <link rel="stylesheet" href="fonts/et-line-font/style.css" type="text/css">

    <!-- RS5.0 Stylesheet -->
    <link rel="stylesheet" href="revolution/css/settings.css" type="text/css">
    <link rel="stylesheet" href="revolution/css/layers.css" type="text/css">
    <link rel="stylesheet" href="revolution/css/navigation.css" type="text/css">
    <link rel="stylesheet" href="css/rev-settings.css" type="text/css">
    <link href="css/toastr.min.css" rel="stylesheet">
	<!-- custom font -->
	<link rel="stylesheet" href="css/font-style.css" type="text/css">
</head>

<body id="homepage">

    <div id="wrapper">

        <!-- header begin -->
        <header class="transparent">
            <!--<div class="info">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="column">Working Hours Monday - Friday <span class="id-color"><strong>08:00-16:00</strong></span></div>
                            <div class="column">Toll Free <span class="id-color"><strong>1800.899.900</strong></span></div>-->
                            <!-- social icons -->
                            <!--<div class="column social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-rss"></i></a>
                                <a href="#"><i class="fa fa-google-plus"></i></a>
                                <a href="#"><i class="fa fa-envelope-o"></i></a>
                            </div>-->
                            <!-- social icons close -->
                        <!--</div>
                    </div>
                </div>
            </div>-->

            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <!-- logo begin -->
                        <div id="logo">
                            <a href="/">
                                <img class="logo" src="images-event/Logotex.png" alt="TEX LOGO">
                            </a>
                        </div>
                        <!-- logo close -->

                            <!-- small button begin -->
                            <span id="menu-btn"></span>
                            <!-- small button close -->


                            <!-- mainmenu begin -->
							<ul id="mainmenu" class="ms-2">
                                <li><a href="about">ABOUT<span></span></a></li>
								<li><a href="events">EVENTS<span></span></a></li>
                                <li><a href="schedule">Schedule<span></span></a></li>
								<!-- <li><a href="schedule.php">Schedule<span></span></a></li>-->
								<li><a href="teams.php">Team<span></span></a></li> 
								<li><a href="index#section-sponsors">Sponsors<span></span></a></li>
                                <li><a href="contact">Contact Us<span></span></a></li>
                                
                                <?php 
                                if(isset($_SESSION['USER_ID'])){
                                    ?>
                                        <li><a href="logout">Logout<span></span></a></li>
                                        <li><a href="profile"><i class="fa fa-user"></i><span></span></a></li>
                                        <li><a href="cart"><i class="fa fa-shopping-cart"></i>&nbsp;&nbsp;&nbsp;<span id="cart">0</span></a></li>
                                    <?php
                                }
                                else{
                                    ?>
                                        <li><a href="login">Login<span></span></a></li>
                                    <?php
                                } 
                                ?>

                                <li><a href=""><img src="./images-event/MITWPU_LOGO.jpg" width=30px height=30px><img src="./images-event/FOET.png" width=30px height=30px></a></li>
							</ul>
							<!-- mainmenu close -->

                    </div>

                </div>
            </div>
        </header>
        <!-- header close -->