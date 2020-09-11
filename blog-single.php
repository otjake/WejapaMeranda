<?php include ("includes/header.php");

if(isset($_GET['id']) && !empty($_GET['id'])) {
    $page_id = $_GET['id'];
  $spec_post = "SELECT * FROM `posts` WHERE menu_id=$page_id  ORDER BY `date_created` DESC  ";
    $spec_post_exec = mysqli_query($conn, $spec_post);

}
?>


<div class="site-section">
<div class="container">
<?php
$count=mysqli_num_rows($spec_post_exec);
if( $count !== 0){
while ($row = mysqli_fetch_assoc($spec_post_exec)) {

    $post_id=$row['posts_id'];
    $menu_id=$row['menu_id'];
    $image=$row['posts_img'];
    $title=$row['posts_title'];
    $body=$row['posts_body'];
    $body_lim=substr($body,0,200);
    $author=$row['posts_author'];
    $tags=$row['posts_tags'];
    $tag_array=explode(",",$tags);//converting tags to array
    $date=$row['date_created'];

    //getting menu items
    $menu_get="SELECT * FROM `menu` WHERE menu_id=$menu_id";
    $menu_get_exec=mysqli_query($conn,$menu_get);
    $row_menu=mysqli_fetch_assoc($menu_get_exec);
    $menu_name=$row_menu['menu_title'];
?>
<div class="row">
<div class="col-lg-12 single-content">
<p class="mb-5">
<img src="images/<?php echo $image ?>" alt="Image" class="img-fluid" width="60%">
</p>
    <h1 class="mb-4"><a href="post-single.php?id=<?php echo $post_id; ?>" style="color: blue"><?php echo $title ?></a></h1>
<div class="post-meta d-flex mb-5">
<div class="bio-pic mr-3">
<img src="images/<?php echo $image ?>" alt="Image" class="img-fluid">
</div>
<div class="vcard">
<span class="d-block"><a href="#"><?php echo $author ?></a></span>
<span class="date-read"><?php echo $date ?> <span class="mx-1">&bullet;</span><span class="icon-star2"></span></span>
</div>
</div>
    <p><?php echo $body_lim ?>  <a href="post-single.php?id=<?php echo $post_id; ?>" style="color: blue" class="mx-4">+Read More</a></p>
<div class="pt-5">
<p>Categories: <a href="#"><?php echo $menu_name ?></a> Tags:
    <?php
    foreach ($tag_array as $tag){
    ?>
    <a href="#"><?php echo $tag ?></a>,
    <?php
    }

    ?>
</p>
</div>

</div>

</div>
    <?php
}
    }else{
    echo "<div class='alert alert-danger '><h3  class='text-capitalize' style='text-align: center'>We Are siked to provide contents here with your help,<br>Just click the add post button an selecting the menu name</h3></div>";
} ?>
</div>
</div>
<?php include ("includes/footer.php"); ?>
