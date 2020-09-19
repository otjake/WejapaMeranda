<?php
ob_start();
session_start();
require("test/db.php");
if (isset($_SESSION['username']) && ($_SESSION["role"]==2 )) {


?>


<?php
include("test/function.php");



if(isset($_GET['id']) && !empty($_GET['id'])) {
    $user_id = $_GET['id'];
    $spec_post = "SELECT * FROM `admin` WHERE id=$user_id";
    $spec_post_exec = mysqli_query($conn, $spec_post);
    $row = mysqli_fetch_assoc($spec_post_exec);
    $id = $row['id'];
    $username = $row['username'];
    $name = $row['name'];
    $role = $row['roles'];
    $password = $row['password'];



    $nameu = $usernameu=$rolesu=$passwordu= "";
    $nameErr = $usernameErr= $rolesErr=  $passwordErr= "";
    $error = array('nameErr' => "", 'usernameErr' => "", 'rolesErr' => "", 'passwordErr' => "");


    //getting menu items

    if (isset($_POST['update'])) {



        if (empty($_POST['name'])) {
            $error['nameErr'] = "You must Enter a menu title";
            $nameErr = $error['nameErr'];
        } else {

            if (!preg_match("/^[a-zA-Z ]*$/", $_POST['name'])) {
                $error['nameErr'] = "Only letters and white spaces";
//           $posts_titleErr= $error['posts_titleErr'];

            }
        }
        $nameu = $_POST['name'];

        if (empty($_POST['username'])) {
            $error['usernameErr'] = "You must Enter a menu title";
            $usernameErr = $error['usernameErr'];
        } else {

            if (!preg_match("/^[a-zA-Z ]*$/", $_POST['username'])) {
                $error['usernameErr'] = "Only letters and white spaces";
//           $posts_titleErr= $error['posts_titleErr'];

            }
        }
        $usernameu = $_POST['username'];


        if (empty($_POST['roles'])) {
            $error['rolesErr'] = "You must select a role";
//       $rolesErr= $error['rolesErr'];

        }
        $rolesu = $_POST['roles'];


        if (empty($_POST['passwordu'])) {
            $error['passwordErr'] = "You must Enter a password";

        } else {

            if (!preg_match("/^(?=.*[!@#$%^&*-])(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).{8,}$/", $_POST['passwordu'])) {
                $error['passwordErr'] = "Invalid password format,passwords must have,at least an uppercase,a lowercase,a digit,a special character and longer than 8 characters";

            }
            $passwordu = $_POST['passwordu'];
        }

        if (array_filter($error)) {

            echo "";

        } else {

             $insertSql = "UPDATE `admin` SET name='{$nameu}', username='{$usernameu}' ,roles={$rolesu} ,password='{$passwordu}',date_modified=NOW() WHERE  id=$id";
            $insertSql_exec = mysqli_query($conn, $insertSql);
            if ($insertSql_exec) {
                $success = "updated successfully";
                header("Location:user.php");

            } else {
                $error['insertErr'] = "Error occurred while trying to save this information";
            }

        }

    }
}
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

<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 single-content">
                <div id="errormsg">Test</div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">POST</div>

                        <div class="card-body">
                            <ul>
                            <?php

                            foreach ($error as $err){
                                if(!empty($err)) {
                                    echo "<li class='alert alert-danger'>$err</li>";
                                }else{
                                    echo "";
                                }
                            }

                            ?>
                            </ul>
                            <form method="POST" action="" enctype="multipart/form-data">




                                <div class="form-group">
                                    <label for="name" class="col-md-4 col-form-label ">Name</label>

                                    <div class="col-12">
                                        <input id="name" type="text" class="form-control" name="name" value="<?php echo $name ?>">

                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="username" class="col-md-4 col-form-label ">Username</label>

                                    <div class="col-12">
                                        <input id="username" type="text" class="form-control" name="username" value="<?php echo $username ?>">

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="menu_id" class="col-md-4 col-form-label ">User Roles</label>

                                    <div class="col-12">
                                        <select class="form-control" name="roles">
                                            <option value="">Select Menu</option>
                                            <option value="1" <?= ($role == 1)? "selected":"";?>>User</option>
                                            <option value="2" <?= ($role == 2)? "selected":"";?>>Admin</option>

                                        </select>

                                    </div>
                                </div>
                                <div class="row mb-3 mx-1">
                                    <label for="">Password</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" >#</span>
                                        </div>

                                        <input type="text" name="passwordu" class="form-control" placeholder="Password" value="<?php echo $password ?>">
                                    </div>
                                    <span class="text-danger" id="passwordErr"></span>

                                </div>

                                    <input type="hidden" name="updatecheck" class="form-control" value="test">


                                <button type="submit" class="btn btn-primary mt-2" name="update">Update User</button>


                            </form>



                        </div>
<!--                    </div>-->

                </div>

        </div>
        </div>
            <div class="col-lg-3">
                <?php include("test/sidebar.php") ?>

            </div>
    </div>


        </div>
</div>
<?php
}else{
    echo "<div class='alert alert-danger '><h3  class='text-capitalize' style='text-align: center'>You have no rights here</h3></div>";
}

include("test/footer.php") ?>
