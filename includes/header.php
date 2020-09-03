<?php  require ("db.php");?>
<?php  include ("function.php");?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from colorlib.com/preview/theme/meranda/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 01 Aug 2020 13:39:38 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <title>Meranda &mdash; Website Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=B612+Mono|Cabin:400,700&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="css/aos.css">
    <link href="css/jquery.mb.YTPlayer.min.css" media="all" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
<div class="site-wrap">
    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close mt-3">
                <span class="icon-close2 js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>
    <div class="header-top">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-lg-6 d-flex">
                    <a href="index.php" class="site-logo">
                        Meranda
                    </a>
                    <a href="#" class="ml-auto d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a>
                </div>
                <div class="col-12 col-lg-6 ml-auto d-flex">
                    <div class="ml-md-auto top-social d-none d-lg-inline-block">
                        <a href="#" class="d-inline-block p-3"><span class="icon-facebook"></span></a>
                        <a href="#" class="d-inline-block p-3"><span class="icon-twitter"></span></a>
                        <a href="#" class="d-inline-block p-3"><span class="icon-instagram"></span></a>
                    </div>
                    <form action="search.php" method="post" class="search-form d-inline-block">
                        <div class="d-flex">
                            <input type="text"  name="search_item" class="form-control" placeholder="Search...">
                            <button type="submit" name="search" class="btn btn-secondary"><span class="icon-search"></span></button>
                        </div>
                    </form>
                </div>
                <div class="col-6 d-block d-lg-none text-right">
                </div>
            </div>
        </div>
        <div class="site-navbar py-2 js-sticky-header site-navbar-target d-none pl-0 d-lg-block" role="banner">
            <div class="container">
                <div class="d-flex align-items-center">
                    <div class="mr-auto">
                        <nav class="site-navigation position-relative text-right" role="navigation">
                            <ul class="site-menu main-menu js-clone-nav mr-auto d-none pl-0 d-lg-block">

                                <?php
                                $exec=menu();
                                while ($row=mysqli_fetch_assoc($exec)){
                                    $page=$row['menu_title'];
                                    $page_id=$row['menu_id'];

                                ?>


                                <li class="active">
                                    <a href="blog-single.php?id=<?php echo $page_id ?>" class="nav-link text-left"><?php echo $page ?></a>
                                </li>

<?php } ?>
                                <li class="active">
                                    <a href="add-post.php" class="nav-link text-left"><button class="alert alert-success"  style="background-color: green;font-weight: bolder;font-size: 20px;">+ Admin Area</button></a>
                                </li>

                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
