<?php session_start();
include ("includes/header.php");

if (!isset($_SESSION['username']) && ($_SESSION["role"]!=1 || $_SESSION["role"]!=2 )) {
    header("Location:login.php");
}
?>

<div class="site-section">
<div class="container">
<div class="row">
<div class="col-lg-8">
<div class="row">
<div class="col-12">
<div class="section-title">
<h2>Search Result</h2>
</div>
</div>
</div>
<div class="row">
    <?php
    if (isset($_POST['search']) && !empty($_POST['search_item'])) {
        $search_item=$_POST['search_item'];
        $sql = "SELECT * FROM `posts` WHERE `posts_tags` LIKE '%$search_item%' ORDER BY `date_created` ASC";
        $sql_exec = mysqli_query($conn, $sql);
        if(mysqli_num_rows($sql_exec) > 0){
        while ($row=mysqli_fetch_assoc($sql_exec)){
        $post_id=$row['posts_id'];
        $image=$row['posts_img'];
        $title=$row['posts_title'];
        $body=$row['posts_body'];
        $body_lim=substr($body,0,200);
        $author=$row['posts_author'];
        $date=$row['date_created'];


    ?>
<div class="col-md-12">
<div class="post-entry-1">
<a href="post-single.php"><img src="<?php echo $image;?>" alt="Image" class="img-fluid"></a>
<h2><a href="blog-single.php"><?php echo $title;?></a></h2>
<p><?php echo $body_lim;?></p>
<div class="post-meta">
<span class="d-block"><a href="#"><?php echo $author;?></a> </span>
<span class="date-read"><?php echo $date;?><span class="mx-1">&bullet;</span>
</div>
</div>
</div>
    <?php
    }
    }else{
        echo '  <div class="col-md-12">
  <div class="alert alert-dark">
  We can seem to find content with this tag try another tag<span class="alert-dismissible text-right" style="float: right">x</span>
  </div> ;
</div> ';
        }
    }else{
        echo '  <div class="col-md-12">
  <div class="alert alert-dark">
  You failed to give tag to search with  <span class="alert-dismissible">x</span>
  </div> ;
</div> ';    }
    ?>
</div>
</div>

</div>
</div>
</div>


<?php include ("includes/footer.php"); ?>
