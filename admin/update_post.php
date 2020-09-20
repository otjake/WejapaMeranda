<?php
ob_start();
session_start();
require("test/db.php");?>
<?php  include("test/function.php");


if (isset($_SESSION['username']) && ($_SESSION["role"]==1 || $_SESSION["role"]==2 )) {

if(isset($_GET['id']) && !empty($_GET['id'])) {
    $page_id = $_GET['id'];
    $spec_post = "SELECT * FROM `posts` WHERE posts_id=$page_id";
    $spec_post_exec = mysqli_query($conn, $spec_post);
    $row = mysqli_fetch_assoc($spec_post_exec);
    $post_id = $row['posts_id'];
    $menu_id = $row['menu_id'];
    $post_code = $row['post_code'];
    $image = $row['posts_img'];
    $title = $row['posts_title'];
    $body = $row['posts_body'];
    $body_lim = substr($body, 0, 200);
    $author = $row['posts_author'];
    $tags = $row['posts_tags'];
    $tag_array = explode(",", $tags);//converting tags to array
    $editor_pick = $row['editor_pick'];
    $display_status = $row['posts_status'];

    $date = $row['date_created'];

    //getting menu items
    $menu_get = "SELECT * FROM `menu` WHERE menu_id=$menu_id";
    $menu_get_exec = mysqli_query($conn, $menu_get);
    $row_menu = mysqli_fetch_assoc($menu_get_exec);
    $menu_name = $row_menu['menu_title'];


    //getting headlines
    $headline_get = "SELECT * FROM `headline` WHERE post_code='$post_code'";
    $headline_get_exec = mysqli_query($conn, $headline_get);
    $row_headline = mysqli_fetch_assoc($headline_get_exec);
    $headline_name = $row_headline['headline_name'];


    $menu_idu = $posts_titleu = $post_codeu = $posts_bodyu = $posts_tagsu = $posts_imgu = $posts_authoru = $editor_picku = $post_statusu = "";
    $menu_idErr = $posts_titleErr = $post_codeErr = $posts_bodyErr = $posts_tagsErr = $posts_imgErr = $posts_authorErr = $editor_pickErr = $post_statusErr = "";
    $error = array('menu_idErr' => "", 'posts_titleErr' => "", 'post_codeErr' => "", 'posts_bodyErr' => "", 'posts_tagsErr' => "", 'posts_imgErr' => "", 'posts_authorErr' => "", 'editor_pickErr' => "", 'post_status' => "", 'mainErr' => "", 'insertErr' => "");

    if (isset($_POST['update'])) {


        if (empty($_POST['menu_id'])) {
            $error['menu_idErr'] = "You must select a menu";

        }
        $menu_idu = $_POST['menu_id'];

        if (empty($_POST['posts_title'])) {
            $error['posts_titleErr'] = "You must Enter a post title";
            $posts_titleErr = $error['posts_titleErr'];
        } else {

            if (!preg_match("/^[a-zA-Z ]*$/", $_POST['posts_title'])) {
                $error['posts_titleErr'] = "Only letters and white space allowed";

            }
        }
        $posts_titleu = $_POST['posts_title'];


        if (empty($_POST['post_code'])) {
            $error['post_codeErr'] = "You must select an headline";

        }
        $post_codeu = $_POST['post_code'];


        if (empty($_POST['posts_body'])) {
            $error['posts_bodyErr'] = "You must Enter a post body";
        }

        $posts_bodyu = $_POST['posts_body'];


        if (empty($_POST['posts_tags'])) {
            $error['posts_tagsErr'] = "You must Enter a post tags";
        } else {

            if (!preg_match("/^[a-zA-Z0-9 \,\(\)\n]*$/", $_POST['posts_tags'])) {
                $error['posts_tagsErr'] = "Only letters and white space allowed";

            }
        }
        $posts_tagsu = $_POST['posts_tags'];

        $posts_imgu = $_FILES['posts_img']['name']; //geting name of the image;
        $posts_img_tmp = $_FILES['posts_img']['tmp_name']; //getting image temporary name on the server
        move_uploaded_file($posts_img_tmp, "images/$posts_imgu"); //the function move_uploaded_file moves image from tmp storage to folder
        if (!empty($posts_imgu)) {
            $image_holder = $posts_imgu;
        } else {
            $image_holder = $image;

        }

        if (empty($_POST['posts_author'])) {
            $error['posts_authorErr'] = "You must Enter a post author";
        } else {

            if (!preg_match("/^[a-zA-Z-0-9 ]*$/", $_POST['posts_author'])) {
                $error['posts_authorErr'] = "Only letters and white space allowed";

            }
        }
        $posts_authoru = $_POST['posts_author'];


        if (!isset($_POST['editor_pick'])) {

            $editor_picku = 0;
        } else {
            $editor_picku = $_POST['editor_pick'];

        }

        if (!isset($_POST['posts_status'])) {
            $posts_statusu = 0;

        } else {
            $posts_statusu = $_POST['posts_status'];

        }

        if (array_filter($error)) {
            $error['mainErr'] = "Correct the errors:check below for error points";
//       $mainErr= $error['mainErr'];

        } else {

             $insertSql = "UPDATE `posts` SET menu_id={$menu_idu},posts_title='{$posts_titleu}',post_code='{$post_codeu}',posts_body='{$posts_bodyu}',posts_tags='{$posts_tagsu}',posts_img='{$image_holder}',posts_author='{$posts_authoru}',editor_pick={$editor_picku},posts_status={$posts_statusu},date_modified=NOW()  WHERE posts_id=$page_id";
            $insertSql_exec = mysqli_query($conn, $insertSql);
            if ($insertSql_exec) {
                $success = "New post created successfully";
                header("Location:all_post.php");

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
                    <a href="#" class="ml-auto d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a>
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
                                    <a href="../blog-single.php?id=<?php echo $page_id ?>" class="nav-link text-left"><?php echo $page ?></a>
                                </li>

<?php } ?>
                                <li class="active">
                                    <a href="add-post.php" class="nav-link text-left"><button class="alert alert-success" style="background-color: green;font-weight: bolder;font-size: 20px;">+ Admin Area</button></a>
                                </li>

                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
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
                                    echo "<li>$err</li>";
                                }else{
                                    echo "";
                                }
                            }

                            ?>
                            </ul>
                            <form method="POST" action="" enctype="multipart/form-data">


                                <div class="form-group">
                                    <label for="menu_id" class="col-md-4 col-form-label ">Menu</label>

                                    <div class="col-12">
                                        <select class="form-control" name="menu_id">
                                            <option value="">Select Menu</option>

                                           <?php
                                           $menus=menu();
                                           foreach($menus as $menu) { ?>
                                               <option value = "<?php echo $menu['menu_id']; ?>" <?= ($menu['menu_id'] == $menu_id)? "selected":"";?>><?php echo $menu['menu_title']; ?></option>
                                               <?php
                                           }
?>
                                        </select>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="posts_title" class="col-md-4 col-form-label ">Title</label>

                                    <div class="col-12">
                                        <input id="post_title" type="text" class="form-control" name="posts_title" value="<?php echo $title ?>">

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="post_code" class="col-md-4 col-form-label ">Headline</label>

                                    <div class="col-12">
                                        <select class="form-control" name="post_code">
                                            <option value="">Select head line</option>

                                            <?php
                                            $headlines=headline();
                                            foreach($headlines as $headline) { ?>
                                            <option value = "<?php echo $headline['post_code']; ?>"
                                            <?php
                                            if($headline['post_code'] == $post_code){
                                                echo "selected";
                                            }else{
                                                echo "";
                                            }
                                            ?>>
                                                <?php echo $headline['headline_name']; ?>-<?php echo $headline['post_code']; ?></option>
                                        <?php
                                           }
                                            ?>
                                        </select>

                                    </div>
                                </div>





                                <div class="form-group">
                                    <label for="posts_body" class="col-md-4 col-form-label " >Body</label>

                                    <div class="col-12">
                                        <textarea name="posts_body" id="post_body" cols="30" rows="10" class="form-control" ><?php echo $body ?></textarea>


                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="posts_tags" class="col-md-4 col-form-label">Tags</label>

                                    <div class="col-12">
                                        <input id="posts_tags" type="text" class="form-control" name="posts_tags" value="<?php echo $tags ?>">

                                </div>

                                <div class="form-group">
                                    <label for="posts_img" class="col-md-4 col-form-label ">Image</label>

                                    <div class="col-12 d-flex">
                                        <div>
                                        <input id="posts_img" type="file" class="form-control-file" name="posts_img">
                                        </div>
                                        <img src="../images/<?php echo $image; ?>" height="150px" width="150px" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="posts_author" class="col-md-4 col-form-label">Author</label>

                                    <div class="col-12">
                                        <input id="posts_author" type="text" class="form-control" name="posts_author" value="<?php echo $author; ?>" >
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="editor_pick" class="col-md-4 col-form-label ">Editor Pick</label>

                                    <div class="col-12">
                                        <input id="editor_pick" type="checkbox" class="form-control" name="editor_pick" value=1
                                            <?php
                                            if($editor_pick == 1){
                                                echo "checked='checked'";
                                            }else{
                                                echo "";
                                            }
                                            ?>
                                        >

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="posts_status" class="col-md-4 col-form-label ">Display Status</label>

                                    <div class="col-12">
                                        <input id="posts_status" type="checkbox" class="form-control" name="posts_status" value=1
                                            <?php
                                            if($display_status == 1){
                                                echo "checked='checked'";
                                            }elseif($display_status == 0){
                                                echo "";
                                            }
                                            ?>
                                        >

                                    </div>
                                </div>

                                    <input type="hidden" name="updatecheck" class="form-control" value="test">


                                <button type="submit" class="btn btn-primary mt-2" name="update">Update Post</button>


                            </form>



                        </div>
                    </div>

                </div>

        </div>
        </div>
            <div class="col-lg-3">
                <?php include("test/sidebar.php");

                }else{
                    header("Location:../login.php");
                }
?>

            </div>
    </div>


        </div>
</div>
<?php include("test/footer.php") ?>
