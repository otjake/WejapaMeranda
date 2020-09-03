<?php include ("includes/header.php")?>
<div class="site-section py-0">
<div class="owl-carousel hero-slide owl-style">

    <?php
    $editors_pick=Editor_pick(3);
    $editors_pick_count=mysqli_num_rows($editors_pick);
    if($editors_pick_count > 0){
    while ($row=mysqli_fetch_assoc($editors_pick)){
$post_id=$row['posts_id'];
$image=$row['posts_img'];
$title=$row['posts_title'];
$body=$row['posts_body'];
        $body_lim=substr($body,0,200);
$author=$row['posts_author'];
$date=$row['date_created'];

    ?>
<div class="site-section">
<div class="container">
<div class="half-post-entry d-block d-lg-flex bg-light">
<div class="img-bg" style="background-image: url('images/<?php echo $image;?>')"></div>
<div class="contents">
<span class="caption">Editor's Pick</span>
<h2><a href="post-single.php?id=<?php echo $post_id; ?>"><?php echo $title;?></a></h2>
<p class="mb-3"><?php echo $body_lim; ?></p>
<div class="post-meta">
<span class="d-block"><a href="#"><?php echo $author; ?></a></span>
<span class="date-read"><?php echo $date; ?> <span class="mx-1">&bullet;</span>
</div>
</div>
</div>
</div>
</div>
    <?php
    }
}
    else{
        echo "<p class='alert alert-info justify-content-center' style='text-align: center'>Be a blogger ,Go to the admin area and add posts</p>";
        $post_id="No data";
        $image="No data";
        $title="No data";
        $body="No data";
        $body_lim="No data";
        $author="No data";
        $date="No data";
    }
    ?>
</div>
</div>
<div class="site-section">
<div class="container">
<div class="row">
<div class="col-lg-8">
<div class="row">
<div class="col-12">
<div class="section-title">
<h2>Editor's Pick</h2>
</div>
</div>
</div>
<div class="row">
<div class="col-md-6">
<div class="post-entry-1">
<a href="post-single.php"><img src="images/<?php echo $image;?>" alt="Image" class="img-fluid"></a>
<h2><a href="blog-single.php"><?php echo $title;?></a></h2>
<p><?php echo $body_lim;?></p>
<div class="post-meta">
<span class="d-block"><a href="#"><?php echo $author;?></a> </span>
<span class="date-read"><?php echo $date;?><span class="mx-1">&bullet;</span>
</div>
</div>
 </div>
<div class="col-md-6">
    <?php

    $editors_pick=Editor_pick(3);
    $editors_pick_count=mysqli_num_rows($editors_pick);
    if($editors_pick_count > 0){
    while ($row=mysqli_fetch_assoc($editors_pick)){
    $post_id=$row['posts_id'];
    $image=$row['posts_img'];
    $title=$row['posts_title'];
    $body=$row['posts_body'];
    $body_lim=substr($body,0,200);
    $author=$row['posts_author'];
    $date=$row['date_created'];

    ?>
<div class="post-entry-2 d-flex">
<div class="thumbnail" style="background-image: url('images/<?php echo $image;?>')"></div>
<div class="contents">
<h2><a href="blog-single.php"><?php echo $title;?></a></h2>
<div class="post-meta">
    <span class="d-block"><a href="#"><?php echo $author;?></a></span>
<span class="date-read"><?php echo $date;?><span class="mx-1">&bullet;</span> </span>
</div>
</div>
</div>
    <?php

    }
    }   else{
        echo "<p class='alert alert-info justify-content-center' style='text-align: center'>Be a blogger ,Go to the admin area and add posts</p>";
        $post_id="No data";
        $image="No data";
        $title="No data";
        $body="No data";
        $body_lim="No data";
        $author="No data";
        $date="No data";
    }
    ?>
</div>
</div>
</div>

</div>
</div>
</div>

<div class="py-0">
<div class="container">
<div class="half-post-entry d-block d-lg-flex bg-light">
<div class="img-bg" style="background-image: url('images/<?php echo $image; ?>')"></div>
<div class="contents">
<span class="caption">Editor's Pick</span>
<h2><a href="blog-single.php"><?php echo $title; ?></a></h2>
<p class="mb-3"><?php echo $body_lim; ?></p>
<div class="post-meta">
<span class="d-block"><a href="#"><?php echo $author; ?></a></span>
<span class="date-read"><?php echo $date; ?> <span class="mx-1">&bullet;</span><span class="icon-star2"></span></span>
</div>
</div>
</div>
</div>
</div>
<div class="site-section">
<div class="container">
<div class="row">
    <?php
    $editors_pick=head_line_sought();
    while ($row=mysqli_fetch_assoc($editors_pick)){
        global $conn;
        $headLine=$row['headies'];
        $headLine_post_code=$row['post_code'];


    ?>
<div class="col-lg-6">
<div class="section-title">
<h2><?php echo $headLine; ?></h2>
</div>
    <?php
    $per_headline="SELECT `posts_id`, `menu_id`, `posts_title`, `post_code`, `posts_body`, `posts_tags`, `posts_img`, `posts_author`, `editor_pick`, `comment_count`, `posts_status`, `date_created`
   FROM posts WHERE post_code='$headLine_post_code'";
    $per_headline_exec=mysqli_query($conn,$per_headline);
    while ($post_row=mysqli_fetch_assoc($per_headline_exec)){

        $post_id=$post_row['posts_id'];
        $image=$post_row['posts_img'];
        $title=$post_row['posts_title'];
        $body=$post_row['posts_body'];
        $body_lim2=substr($body,0,100);
        $author=$post_row['posts_author'];
        $date=$post_row['date_created'];
        ?>
<div class="post-entry-2 d-flex">
<div class="thumbnail" style="background-image: url('images/<?php  echo $image; ?>')"></div>
<div class="contents">
<h2><a href="blog-single.php"><?php  echo $title; ?></a></h2>
<p class="mb-3"><?php  echo $body_lim2; ?></p>
<div class="post-meta">
<span class="d-block"><a href="#"><?php  echo $author; ?></a></span>
<span class="date-read"><?php  echo $date; ?> <span class="mx-1">&bullet;</span><span class="icon-star2"></span></span>
</div>
</div>
</div>
    <?php
    }
    ?>
</div>
    <?php

    }
    ?>

</div>
</div>
</div>
<div class="site-section">
<div class="container">
<div class="row">
<div class="col-lg-12">
<div class="section-title">
<h2>Recent News</h2>
</div>
<?php
$post=post_select(2);
while ($row2=mysqli_fetch_assoc($post)){

    $post_id=$row2['posts_id'];
    $image=$row2['posts_img'];
    $title=$row2['posts_title'];
    $body=$row2['posts_body'];
    $body_lim2=substr($body,0,100);
    $author=$row2['posts_author'];
    $date=$row2['date_created'];

?>
<div class="post-entry-2 d-flex">
<div class="thumbnail order-md-2" style="background-image: url('images/<?php echo $image;?>')"></div>
<div class="contents order-md-1 pl-0">
<h2><a href="blog-single.php"><?php echo $title;?></a></h2>
<p class="mb-3"><?php echo $body_lim2;?></p>
<div class="post-meta">
<span class="d-block"><a href="#"><?php echo $author;?></a></span>
<span class="date-read"><?php echo $date;?><span class="mx-1">&bullet;</span><span class="icon-star2"></span></span>
</div>
</div>
</div>
    <?php


}


$Editor_post = Editor_pick(1);
while($Erow2 = mysqli_fetch_assoc($Editor_post)){

$Epost_id = $Erow2['posts_id'];
$Eimage = $Erow2['posts_img'];
$Etitle = $Erow2['posts_title'];
$Ebody = $Erow2['posts_body'];
$Ebody_lim2 = substr($body, 0, 100);
$Eauthor = $Erow2['posts_author'];
$Edate = $Erow2['date_created'];


?>


<div class="post-entry-2 d-flex">
<div class="thumbnail order-md-2" style="background-image: url('images/<?php echo $image;?>')"></div>
<div class="contents order-md-1 pl-0">
<span class="caption mb-4 d-block">Editor's Pick</span>
<h2><a href="blog-single.php"><?php echo $Etitle;?></a></h2>
<p class="mb-3"><?php echo $Ebody_lim2;?></p>
<div class="post-meta">
<span class="d-block"><a href="#"><?php echo $Eauthor;?></a></span>
<span class="date-read"><?php echo $Edate;?><span class="mx-1">&bullet;</span><span class="icon-star2"></span></span>
</div>
</div>
</div>

    <?php

}
?>
</div>

</div>
<div class="row">
<div class="col-lg-6">
<ul class="custom-pagination list-unstyled">

<!--<li><a href="#">1</a></li>-->
<!--<li class="active">2</li>-->
<!--<li><a href="#">3</a></li>-->
<!--<li><a href="#">4</a></li>-->
</ul>
</div>
</div>

</div>
</div>
<?php include ("includes/footer.php"); ?>
