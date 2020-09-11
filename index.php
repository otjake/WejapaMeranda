<?php

include ("includes/header.php")?>
<div class="col-md-10 offset-1 my-5">
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" >
            <?php
            $editors_pick=Editor_pick(3);
            $editors_pick_count=mysqli_num_rows($editors_pick);
            if($editors_pick_count > 0){
                $i=0;
                while ($row=mysqli_fetch_assoc($editors_pick)){
                    $post_id=$row['posts_id'];
                    $image=$row['posts_img'];
                    $title=$row['posts_title'];
                    $body=$row['posts_body'];
                    $body_lim=substr($body,0,100);
                    $author=$row['posts_author'];
                    $date=$row['date_created'];
                    $i++;
                    if($i==1){?>
                        <div class="carousel-item active">

                        <?php

                    }else{
                        echo '<div class="carousel-item">';
                    }
                    ?>


                    <div class="half-post-entry d-block d-lg-flex bg-light my-4">
                        <div class="img-bg" style="background-image: url('images/<?php echo $image; ?>')"></div>
                        <div class="contents">
                            <span class="caption text-capitalize">Bloggers Favourite</span>
                            <h2><a href="post-single.php?id=<?php echo $post_id; ?>" style="color: blue"><?php echo $title;?></a></h2>
                            <p><?php echo $body_lim;?></p>
                            <p><a href="post-single.php?id=<?php echo $post_id; ?>"><button class="btn btn-sm">Read more</button></a></p>
                            <div class="post-meta">
                                <span class="d-block"><a href="#"><?php echo $author; ?></a></span>
                                <span class="date-read"><?php echo $date; ?> <span class="mx-1">&bullet;</span><span class="icon-star2"></span></span>
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
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
</div>
<div class="site-section">
<div class="container">
<div class="row">
<div class="col-lg-8">
<div class="row">
<div class="col-12">
<div class="section-title">
<h2>Bloggers Pick</h2>
</div>
</div>
</div>
<div class="row">
<div class="col-md-6">
<div class="post-entry-1">
<a href="post-single.php"><img src="images/<?php echo $image;?>" alt="Image" class="img-fluid"></a>
<h2><a href="post-single.php?id=<?php echo $post_id; ?>" style="color: blue"><?php echo $title;?></a></h2>
<p><?php echo $body_lim;?></p>
   <p><a href="post-single.php?id=<?php echo $post_id; ?>"><button class="btn btn-sm">Read more</button></a></p>
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
    <h2><a href="post-single.php?id=<?php echo $post_id; ?>" style="color: blue"><?php echo $title;?></a></h2>
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

    <h2>STORIES</h2>

    <?php
    $editors_pick=post_select(5);
    while ($row=mysqli_fetch_assoc($editors_pick)){
    global $conn;
    $post_id=$row['posts_id'];
    $image=$row['posts_img'];
    $title=$row['posts_title'];
    $body=$row['posts_body'];
    $body_lim=substr($body,0,200);
    $author=$row['posts_author'];
    $date=$row['date_created'];


    ?>
<div class="half-post-entry d-block d-lg-flex bg-light my-4">
<div class="img-bg" style="background-image: url('images/<?php echo $image; ?>')"></div>
<div class="contents">
<span class="caption"><?php echo $title;?></span>
    <h2><a href="post-single.php?id=<?php echo $post_id; ?>" style="color: blue"><?php echo $title;?></a></h2>
    <p><?php echo $body_lim;?></p>
    <p><a href="post-single.php?id=<?php echo $post_id; ?>"><button class="btn btn-sm">Read more</button></a></p>
<div class="post-meta">
<span class="d-block"><a href="#"><?php echo $author; ?></a></span>
<span class="date-read"><?php echo $date; ?> <span class="mx-1">&bullet;</span><span class="icon-star2"></span></span>
</div>
</div>
</div>
    <?php

    }?>
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
    $per_headline="SELECT `posts_id`, `menu_id`, `posts_title`, `post_code`, `posts_body`, `posts_tags`, `posts_img`, `posts_author`, `editor_pick`, `posts_status`, `date_created`
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
<div class="thumbnail mx-4" style="background-image: url('images/<?php  echo $image; ?>')"></div>
<div class="contents">
    <h2><a href="post-single.php?id=<?php echo $post_id; ?>" style="color: blue"><?php echo $title;?></a></h2>
    <p><?php echo $body_lim;?></p>
    <p><a href="post-single.php?id=<?php echo $post_id; ?>"><button class="btn btn-sm">Read more</button></a></p>
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

<?php include ("includes/footer.php"); ?>
