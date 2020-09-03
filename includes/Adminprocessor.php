
<?php
require ("db.php");
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    global $conn;


    ###POST UPLOAD####
    if (!empty($_POST['postcheck'])) {
        $menu_id = $posts_title = $post_code = $posts_body = $posts_tags = $posts_img = $posts_author = $editor_pick = $post_status = "";
        $error = array('menu_idErr' => "", 'posts_titleErr' => "", 'post_codeErr' => "", 'posts_bodyErr' => "", 'posts_tagsErr' => "", 'posts_imgErr' => "", 'posts_authorErr' => "", 'editor_pickErr' => "", 'post_status' => "", 'mainErr' => "");


        if (empty($_POST['menu_id'])) {
            $error['menu_idErr'] = "You must select a menu";
            die(json_encode(array("menu_idErr" => $error['menu_idErr'])));

        }
        $menu_id = $_POST['menu_id'];

        if (empty($_POST['posts_title'])) {
            $error['posts_titleErr'] = "You must Enter a post title";
            die(json_encode(array("posts_titleErr" => $error['posts_titleErr'])));
        } else {

            if (!preg_match("/^[a-zA-Z ]*$/", $_POST['posts_title'])) {
                $error['posts_titleErr'] = "Only letters and white space allowed";
                die(json_encode(array("posts_titleErr" => $error['posts_titleErr'])));

            }
        }
        $posts_title = $_POST['posts_title'];


        if (empty($_POST['post_code'])) {
            $error['post_codeErr'] = "You must select an headline";
            die(json_encode(array("post_codeErr" => $error['posts_codeErr'])));

        }
        $post_code = $_POST['post_code'];


        if (empty($_POST['posts_body'])) {
            $error['posts_bodyErr'] = "You must Enter a post body";
            die(json_encode(array("posts_bodyErr" => $error['posts_bodyErr'])));
        }

        $posts_body =$_POST['posts_body'];


        if (empty($_POST['posts_tags'])) {
            $error['posts_tagsErr'] = "You must Enter a post tags";
            die(json_encode(array("posts_tagsErr" => $error['posts_tagsErr'])));
        } else {

            if (!preg_match("/^[a-zA-Z0-9 \,\(\)\n]*$/", $_POST['posts_tags'])) {
                $error['posts_tagsErr'] = "Only letters and white space allowed";
                die(json_encode(array("posts_tagsErr" => $error['posts_tagsErr'])));

            }
        }
        $posts_tags = $_POST['posts_tags'];

//        if (empty($_POST['posts_img'])) {
//            $error['posts_imgErr'] = "You must Select an image";
//            die(json_encode(array("posts_imgErr" => $error['posts_imgErr'])));
//        }
        $posts_img = $_FILES['posts_img']['name']; //geting name of the image;
        $posts_img_tmp = $_FILES['posts_img']['tmp_name']; //getting image temporary name on the server
        move_uploaded_file($posts_img_tmp, "images/$posts_img"); //the function move_uploaded_file moves image from tmp storage to folder


        if (empty($_POST['posts_author'])) {
            $error['posts_authorErr'] = "You must Enter a post author";
            die(json_encode(array("posts_authorErr" => $error['posts_authorErr'])));
        } else {

            if (!preg_match("/^[a-zA-Z-0-9 ]*$/", $_POST['posts_author'])) {
                $error['posts_authorErr'] = "Only letters and white space allowed";
                die(json_encode(array("posts_authorErr" => $error['posts_authorErr'])));

            }
        }
        $posts_author = $_POST['posts_author'];


        if (!isset($_POST['editor_pick'])) {

            $editor_pick = 0;
        } else {
            $editor_pick = $_POST['editor_pick'];

        }

        if (!isset($_POST['posts_status'])) {
            $posts_status = 0;

        } else {
            $posts_status = $_POST['posts_status'];

        }

        if (array_filter($error)) {
            $error['mainErr'] = "Correct the errors:check below for error points";
            die(json_encode(array("mainErr" => $error['mainErr'])));

        } else {

            $insertSql = "INSERT INTO `posts` (menu_id,posts_title,post_code,posts_body,posts_tags,posts_img,posts_author,editor_pick,posts_status) 
VALUES ({$menu_id},'{$posts_title}','{$post_code}','{$posts_body}','{$posts_tags}','{$posts_img}','{$posts_author}',{$editor_pick},{$posts_status})";
            $insertSql_exec = mysqli_query($conn, $insertSql);
            if ($insertSql_exec) {
                die(json_encode(array("success" => "New post created successfully")));

            } else {
                die(json_encode(array("insertErr" => "Error occured while trying to save this information")));
            }

        }

    }


    ###POST UPLOAD END####




    ###Menu creation####

    if (!empty($_POST['menucheck'])) {
$menu_title="";
$error=array('menu_titleErr'=>"");
        if (empty($_POST['menu_title'])) {
            $error['menu_titleErr'] = "You must Enter a post title";
            die(json_encode(array("menu_titleErr" => $error['menu_titleErr'])));
        } else {

            if (!preg_match("/^[a-zA-Z0-9 \,\(\)\n]*$/", $_POST['menu_title'])) {
                $error['menu_titleErr'] = "Only letters and white space allowed";
                die(json_encode(array("menu_titleErr" => $error['menu_titleErr'])));

            }
        }
       $menu_title = $_POST['menu_title'];

        if (array_filter($error)) {
            $error['mainErr'] = "Correct the errors:check below for error points";
            die(json_encode(array("mainErr" => $error['mainErr'])));

        } else {

            $insertSql = "INSERT INTO `menu` (menu_title) 
VALUES ('{$menu_title}')";
            $insertSql_exec = mysqli_query($conn, $insertSql);
            if ($insertSql_exec) {
                die(json_encode(array("success" => "New post created successfully")));

            } else {
                die(json_encode(array("insertErr" => "Error occured while trying to save this information")));
            }

        }

    }


    ###Menu creation end####




    ###HEADLINE CREATION####

    if (!empty($_POST['headlinecheck'])) {
$headline_name=$Hpost_code="";
$error=array('headline_nameErr'=>"",'Hpost_codeErr'=>"");

        if (empty($_POST['headline_name'])) {
            $error['headline_nameErr'] = "You must Enter an headline name";
            die(json_encode(array("headline_nameErr" => $error['headline_nameErr'])));
        } else {

            if (!preg_match("/^[a-zA-Z0-9]*$/", $_POST['headline_name'])) {
                $error['headline_nameErr'] = "Only letters and white space allowed";
                die(json_encode(array("headline_nameErr" => $error['headline_nameErr'])));

            }
        }
       $headline_name = $_POST['headline_name'];


        if (empty($_POST['Hpost_code'])) {
            $error['Hpost_codeErr'] = "You must Enter a post code";
            die(json_encode(array("Hpost_codeErr" => $error['Hpost_codeErr'])));
        } else {

            if (!preg_match("/^[a-zA-Z0-9]*$/", $_POST['Hpost_code'])) {
                $error['Hpost_codeErr'] = "Only letters and white space allowed";
                die(json_encode(array("Hpost_codeErr" => $error['Hpost_codeErr'])));

            }
        }
       $Hpost_code = strtoupper($_POST['Hpost_code']);

        if (!isset($_POST['headline_status'])) {
            $headline_status = 0;

        } else {
            $headline_status = $_POST['headline_status'];

        }

        if (array_filter($error)) {
            $error['mainErr'] = "Correct the errors:check below for error points";
            die(json_encode(array("mainErr" => $error['mainErr'])));

        } else {

            $insertSql = "INSERT INTO `headline` (headline_name,post_code,headline_status) 
VALUES ('{$headline_name}','{$Hpost_code}',{$headline_status})";
            $insertSql_exec = mysqli_query($conn, $insertSql);
            if ($insertSql_exec) {
                die(json_encode(array("success" => "New post created successfully")));

            } else {
                die(json_encode(array("insertErr" => "Error occurred while trying to save this information")));
            }

        }

    }

    ###HEADLINE CREATION END####


    ###Delete POST####


    if (!empty($_POST['deleteId'])) {

$post_id=$_POST['deleteId'];


            $insertSql = "DELETE FROM `posts` WHERE `posts_id`={$post_id}";
            $insertSql_exec = mysqli_query($conn, $insertSql);
            if ($insertSql_exec) {
                die(json_encode(array("success" => "Deleting")));

            } else {
                die(json_encode(array("insertErr" => "Unable to delete")));
            }



    }
    ###Delete POST End####}

}

    ?>
