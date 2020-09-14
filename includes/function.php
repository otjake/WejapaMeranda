
<?php
    function menu(){
        global $conn;
        $sql="SELECT * FROM menu";
        $sql_exec=mysqli_query($conn,$sql);
        return $sql_exec;

    }
   function headline(){
        global $conn;
        $sql="SELECT * FROM headline";
        $sql_exec=mysqli_query($conn,$sql);
        return $sql_exec;

    }
function post(){
    global $conn;
    $sql="SELECT * FROM posts ORDER BY `date_created` DESC";
    $sql_exec=mysqli_query($conn,$sql);
    return $sql_exec;

}

    function Editor_pick($qty){
        global $conn;
        $sql="SELECT posts.* FROM `posts` JOIN `headline` ON posts.post_code=headline.post_code WHERE headline.headline_status=1 AND posts.editor_pick=1 ORDER BY RAND () ASC LIMIT 0,$qty";



//        $sql="SELECT posts.* FROM `posts` JOIN `headline` ON posts.post_code=headline.post_code WHERE headline.headline_status=1 AND posts.editor_pick=1 AND posts.posts_status=1 ORDER BY RAND () ASC LIMIT 0,$qty";

        $sql_exec=mysqli_query($conn,$sql);
        return $sql_exec;
    }

    function head_line_sought(){
        global $conn;
        $sql="SELECT DISTINCT headline.headline_name as headies,headline.post_code as post_code FROM `headline` JOIN posts ON headline.post_code=posts.post_code WHERE headline.headline_status=1  ORDER BY headline.headline_id DESC";
        $sql_exec=mysqli_query($conn,$sql);
        return $sql_exec;
    }

function post_select($qty){
    global $conn;
    $sql="SELECT posts.* FROM `posts` JOIN `headline` ON posts.post_code=headline.post_code WHERE headline.headline_status=1  ORDER BY RAND () ASC LIMIT 0,$qty";


//    $sql="SELECT * FROM `posts`  WHERE `editor_pick`=0 AND `posts_status`=1 ORDER BY `date_created` ASC LIMIT 0,$qty";
    $sql_exec=mysqli_query($conn,$sql);
    return $sql_exec;
}
function search()
{

    global $conn;
    if (isset($_POST['search']) && !empty($_POST['search_item'])) {
        $sql = "SELECT * FROM `posts` WHERE `posts_tags` LIKE \"%boot%\" AND `posts_status`=1 ORDER BY `date_created` ASC";
        $sql_exec = mysqli_query($conn, $sql);
        return $sql_exec;
    }
}

    ?>
