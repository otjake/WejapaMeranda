<?php
ob_start();
session_start();
include("test/Adminprocessor.php");
require ("db.php");
include ("function.php");


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Meranda</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=B612+Mono|Cabin:400,700&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="../fonts/icomoon/style.css">
    <link rel="stylesheet" href="../fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="../css/aos.css">
    <link rel="stylesheet" href="../css/style.css">
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
                    <a href="../index.php" class="site-logo">
                        Meranda
                    </a>
                </div>
                <div class="col-12 col-lg-6 ml-auto d-flex">
                    <div class="ml-md-auto top-social d-none d-lg-inline-block">
                        <a href="#" class="d-inline-block p-3"><span class="icon-facebook"></span></a>
                        <a href="#" class="d-inline-block p-3"><span class="icon-twitter"></span></a>
                        <a href="#" class="d-inline-block p-3"><span class="icon-instagram"></span></a>
                    </div>
                    <form action="../search.php" method="post" class="search-form d-inline-block">
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
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <?php
                    $exec=menu();
                    $i=0;
                    while ($row=mysqli_fetch_assoc($exec)){
                        $page=$row['menu_title'];
                        $page_id=$row['menu_id'];
                        $i++;
                        if($i=$page_id){
                            echo    '<li class="nav-item active norms">';

                        }else{
                            echo    '<li class="nav-item norms">';
                        }

                        ?>
                        <a href="../blog-single.php?id=<?php echo $page_id ?>" class="nav-link text-left"><?php echo $page ?></a>
                        </li>
                    <?php } ?>


                    <li class="nav-item">
                        <a href="add-post.php" class="nav-link text-left"><button class="alert alert-success"  style="background-color: green;font-weight: bolder;font-size: 20px;">+ Post</button></a>
                    </li>


                    <?php                               if (isset($_SESSION['username']) && ($_SESSION["role"]==1 || $_SESSION["role"]==2 )) {

                        ?>
                        <li class="nav-item norms">
                            <a href="../logout.php" class="nav-link text-left">Logout</a>
                        </li>

                        <li class="nav-item norms">
                            <a href="#" class="nav-link text-left font-capitalize mx-5 username"><?php echo ($_SESSION['username']) ?></a>
                        </li>
                        <?php

                    }else{
                        ?>
                        <li class="nav-item norms">
                            <a href="../login.php" class="nav-link text-left">Login</a>
                        </li>

                        <?php
                    }
                    ?>
                </ul>

            </div>
        </nav>
    </div>
