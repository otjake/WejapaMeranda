<?php
#when including with a jquery make sure the includes jquey is pointing is topmost
//include("test/Adminprocessor.php");

include("test/header.php");

if (isset($_SESSION['username']) && ($_SESSION["role"]==1 || $_SESSION["role"]==2 )) {
?>
<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 single-content">
<!--                <div id="errormsg">Test</div>-->
                <div class="col-md-12">
                    <div class="row">
<?php
$posts=post_personal();
$count_post=mysqli_num_rows($posts);
if($count_post>0){
    while ($row=mysqli_fetch_assoc($posts)){
        $body=$row['posts_body'];
        $body_lim=substr($body,0,100);

?>
                            <div class="col-lg-6 single-content my-5" id="remove">

                                <p class="mb-5">
                                    <img src="../images/<?php echo $row['posts_img']?>" alt="Image" class="img-fluid">
                                </p>
                                <h1 class="mb-4">
                                    Bootstrap</h1>
                                <div class="post-meta d-flex mb-5">
                                    <div class="bio-pic mr-3">
                                        <img src="../images/<?php echo $row['posts_img']?>" alt="Image" class="img-fluid">
                                    </div>
                                    <div class="vcard">
                                        <span class="d-block"><a href="#"><?php echo $row['posts_author']?></a></span>
                                        <span class="date-read">
                                            <?php if($row['date_modified']==NULL)
                                        {echo $row['date_created'];}
                                        else{
                                            echo $row['date_modified'];
                                            }?>
                                            <span class="mx-1">•</span><span class="icon-star2"></span></span>
                                    </div>
                                </div>
                                <p><?php echo $body_lim ;?></p>
                                <a href="update_post.php?id=<?php echo $row['posts_id'] ?>"><button class="btn  mt-2" >Update Post</button></a>

                                <form method="post" action="" class="delete">
                                    <div id="errormsg"></div>

                                    <input name="deleteId" type="hidden" value="<?php echo $row['posts_id']?>">
                                <button type="submit" class="btn btn-danger mt-2" name="headline">Delete Post</button>
                                </form>

                                <hr style="background-color: red">

                            </div>


                        <?php
    }
}?>


                    </div>



        </div>
            </div>

            <div class="col-lg-3">
                <?php include("test/sidebar.php") ?>

            </div>
        </div>
    </div>


        </div>
</div>
<?php

}else{
    header("Location:../login.php");
}

include("test/footer.php")
?>
<script type="text/javascript">
    $(document).ready(function () {
    $(".delete").submit(function (e) {
        e.preventDefault();
let ask=confirm("Are you sure?!");

if(ask===true){
        let Form=$(this);
        let data=$(Form).serialize();
        let action=$(Form).attr('action');
        let item_to_delete= $(Form).parent();
        console.log(item_to_delete);
        let errormsg=$(Form).find("#errormsg");

        $.ajax({
            url:action,
            type:"POST",
            data:data,
            success:function (response) {
                let data=JSON.parse(response);

                if(data.success){
                    $(item_to_delete).fadeOut();
                    //
                    // $(errormsg).removeClass("alert alert-danger").addClass("alert alert-success");
                    // $(errormsg).html(data.success);
                }
                if(data.insertErr){
                    $(errormsg).removeClass("alert alert-success").addClass("alert alert-danger");
                    $(errormsg).html(data.insertErr);
                }
                if(data.mainErr){
                    $(errormsg).removeClass("alert alert-success").addClass("alert alert-danger");
                    $(errormsg).html(data.mainErr);
                }

            }

        });
        }
    });






    })


</script>
