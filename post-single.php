
<?php session_start();
include ("includes/header.php");

if (!isset($_SESSION['username']) && ($_SESSION["role"]!=1 || $_SESSION["role"]!=2 )) {
    header("Location:login.php");
}

if(isset($_GET['id']) && !empty($_GET['id'])){
    $page_id=$_GET['id'];
    $spec_post="SELECT * FROM `posts` WHERE posts_id=$page_id";
    $spec_post_exec=mysqli_query($conn,$spec_post);
    $row=mysqli_fetch_assoc($spec_post_exec);
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


}


?>

<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 single-content">
                <p class="mb-5">
                    <img src="images/<?php echo $image ?>" alt="Image" class="img-fluid"  width="60%">
                </p>
                <h1 class="mb-4">
                    <?php echo $title ?>
                </h1>
                <div class="post-meta d-flex mb-5">
                    <div class="bio-pic mr-3">
                        <img src="images/<?php echo $image ?>" alt="Image" class="img-fluid">
                    </div>
                    <div class="vcard">
                        <span class="d-block"><a href="#"><?php echo $author ?></a></span>
                        <span class="date-read"><?php echo $date ?> <span class="mx-1">&bullet;</span><span class="icon-star2"></span></span>
                    </div>
                </div>
                <p><?php echo $body ?></p>
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
<!--                <div class="pt-5">-->
<!--                    <div class="section-title">-->
<!--                        <h2 class="mb-5">6 Comments</h2>-->
<!--                    </div>-->
<!--                    <ul class="comment-list">-->
<!--                        <li class="comment">-->
<!--                            <div class="vcard bio">-->
<!--                                <img src="images/person_1.jpg" alt="Image placeholder">-->
<!--                            </div>-->
<!--                            <div class="comment-body">-->
<!--                                <h3>Jean Doe</h3>-->
<!--                                <div class="meta">January 9, 2018 at 2:21pm</div>-->
<!--                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>-->
<!--                                <p><a href="#" class="reply">Reply</a></p>-->
<!--                            </div>-->
<!--                        </li>-->
<!--                        <li class="comment">-->
<!--                            <div class="vcard bio">-->
<!--                                <img src="images/person_1.jpg" alt="Image placeholder">-->
<!--                            </div>-->
<!--                            <div class="comment-body">-->
<!--                                <h3>Jean Doe</h3>-->
<!--                                <div class="meta">January 9, 2018 at 2:21pm</div>-->
<!--                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>-->
<!--                                <p><a href="#" class="reply">Reply</a></p>-->
<!--                            </div>-->
<!--                            <ul class="children">-->
<!--                                <li class="comment">-->
<!--                                    <div class="vcard bio">-->
<!--                                        <img src="images/person_1.jpg" alt="Image placeholder">-->
<!--                                    </div>-->
<!--                                    <div class="comment-body">-->
<!--                                        <h3>Jean Doe</h3>-->
<!--                                        <div class="meta">January 9, 2018 at 2:21pm</div>-->
<!--                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>-->
<!--                                        <p><a href="#" class="reply">Reply</a></p>-->
<!--                                    </div>-->
<!--                                    <ul class="children">-->
<!--                                        <li class="comment">-->
<!--                                            <div class="vcard bio">-->
<!--                                                <img src="images/person_1.jpg" alt="Image placeholder">-->
<!--                                            </div>-->
<!--                                            <div class="comment-body">-->
<!--                                                <h3>Jean Doe</h3>-->
<!--                                                <div class="meta">January 9, 2018 at 2:21pm</div>-->
<!--                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>-->
<!--                                                <p><a href="#" class="reply">Reply</a></p>-->
<!--                                            </div>-->
<!--                                            <ul class="children">-->
<!--                                                <li class="comment">-->
<!--                                                    <div class="vcard bio">-->
<!--                                                        <img src="images/person_1.jpg" alt="Image placeholder">-->
<!--                                                    </div>-->
<!--                                                    <div class="comment-body">-->
<!--                                                        <h3>Jean Doe</h3>-->
<!--                                                        <div class="meta">January 9, 2018 at 2:21pm</div>-->
<!--                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>-->
<!--                                                        <p><a href="#" class="reply">Reply</a></p>-->
<!--                                                    </div>-->
<!--                                                </li>-->
<!--                                            </ul>-->
<!--                                        </li>-->
<!--                                    </ul>-->
<!--                                </li>-->
<!--                            </ul>-->
<!--                        </li>-->
<!--                        <li class="comment">-->
<!--                            <div class="vcard bio">-->
<!--                                <img src="images/person_1.jpg" alt="Image placeholder">-->
<!--                            </div>-->
<!--                            <div class="comment-body">-->
<!--                                <h3>Jean Doe</h3>-->
<!--                                <div class="meta">January 9, 2018 at 2:21pm</div>-->
<!--                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>-->
<!--                                <p><a href="#" class="reply">Reply</a></p>-->
<!--                            </div>-->
<!--                        </li>-->
<!--                    </ul>-->
<!---->
<!--                    <div class="comment-form-wrap pt-5">-->
<!--                        <div class="section-title">-->
<!--                            <h2 class="mb-5">Leave a comment</h2>-->
<!--                        </div>-->
<!--                        <form action="#" class="p-5 bg-light">-->
<!--                            <div class="form-group">-->
<!--                                <label for="name">Name *</label>-->
<!--                                <input type="text" class="form-control" id="name">-->
<!--                            </div>-->
<!--                            <div class="form-group">-->
<!--                                <label for="email">Email *</label>-->
<!--                                <input type="email" class="form-control" id="email">-->
<!--                            </div>-->
<!--                            <div class="form-group">-->
<!--                                <label for="website">Website</label>-->
<!--                                <input type="url" class="form-control" id="website">-->
<!--                            </div>-->
<!--                            <div class="form-group">-->
<!--                                <label for="message">Message</label>-->
<!--                                <textarea name="" id="message" cols="30" rows="10" class="form-control"></textarea>-->
<!--                            </div>-->
<!--                            <div class="form-group">-->
<!--                                <input type="submit" value="Post Comment" class="btn btn-primary py-3">-->
<!--                            </div>-->
<!--                        </form>-->
<!--                    </div>-->
<!--                </div>-->
            </div>
<!--            <div class="col-lg-3 ml-auto">-->
<!--                --><?php //include ("includes/sidebar.php")?>
<!---->
<!--            </div>-->
        </div>
    </div>
</div>
<?php include ("includes/footer.php")?>
