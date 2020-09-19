<?php
#when including with a jquery make sure the includes jquey is pointing is topmost
include("test/header.php");

if (isset($_SESSION['username']) && ($_SESSION["role"]==1 || $_SESSION["role"]==2 )) {

?>
<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 single-content">
                <div class="errormsg"></div>
                <div class="successmsg"></div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">POST</div>

                        <div class="card-body">
                            <form method="POST" action="" enctype="multipart/form-data" id="postForm">


                                <div class="form-group">
                                    <label for="menu_id" class="col-md-4 col-form-label ">Menu</label>

                                    <div class="col-12">
                                        <select class="form-control" name="menu_id">
                                            <option value="">Select Menu</option>

                                           <?php
                                           $menus=menu();
                                           foreach($menus as $menu) { ?>
                                               <option value = "<?php echo $menu['menu_id']; ?>" ><?php echo $menu['menu_title']; ?></option>
                                               <?php
                                           }
?>
                                        </select>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="posts_title" class="col-md-4 col-form-label ">Title</label>

                                    <div class="col-12">
                                        <input id="post_title" type="text" class="form-control" name="posts_title">

                                    </div>
                                    <div id="titleerrormsg"></div>

                                </div>

                                <div class="form-group">
                                    <label for="post_code" class="col-md-4 col-form-label ">Headline</label>

                                    <div class="col-12">
                                        <select class="form-control" name="post_code">
                                            <option value="">Select head line</option>

                                            <?php
                                            $headlines=headline();
                                            foreach($headlines as $headline) { ?>
                                            <option value = "<?php echo $headline['post_code']; ?>" ><?php echo $headline['headline_name']; ?>-<?php echo $headline['post_code']; ?></option>
                                        <?php
                                           }
                                            ?>
                                        </select>

                                    </div>
                                </div>





                                <div class="form-group">
                                    <label for="posts_body" class="col-md-4 col-form-label ">Body</label>

                                    <div class="col-12">
                                        <textarea name="posts_body" id="post_body" cols="30" rows="10" class="form-control"></textarea>

                                    </div>
                                    <div id="bodyerrormsg"></div>

                                </div>

                                <div class="form-group">
                                    <label for="posts_tags" class="col-md-4 col-form-label ">Tags</label>

                                    <div class="col-12">
                                        <input id="posts_tags" type="text" class="form-control" name="posts_tags">

                                </div>
                                    <div id="tagserrormsg"></div>


                                    <div class="form-group">
                                    <label for="posts_img" class="col-md-4 col-form-label ">Image</label>

                                    <div class="col-12">
                                        <input id="posts_img" type="file" class="form-control-file" name="posts_img">
                                    </div>
                                        <div id="imageerrormsg"></div>

                                    </div>

                                <div class="form-group">
                                    <label for="posts_author" class="col-md-4 col-form-label ">Author</label>

                                    <div class="col-12">
                                        <input id="posts_author" type="text" class="form-control" name="posts_author">
                                    </div>
                                    <div id="authorerrormsg"></div>

                                </div>

                                <div class="form-group">
                                    <label for="editor_pick" class="col-md-4 col-form-label ">Bloggers Pick</label>

                                    <div class="col-12">
                                        <input id="editor_pick" type="checkbox" class="form-control" name="editor_pick" value=1>
                                        <span class="text-danger">How much do you like this write up,Check this field to place it among our favorites</span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="posts_status" class="col-md-4 col-form-label ">Display Status</label>

                                    <div class="col-12">
                                        <input id="posts_status" type="checkbox" class="form-control" name="posts_status" value=1>
                                        <span class="text-danger">Check to make visible on our main page or Leave unchecked and only you can see it in <a href="all_post.php">My writes</a></span>

                                    </div>
                                </div>

                                    <input type="hidden" name="postcheck" class="form-control" value="test">


                                <button type="submit" class="btn btn-primary mt-2" name="post">Submit Post</button>


                            </form>

                            <div class="errormsg"></div>
                            <div class="successmsg"></div>


                        </div>
                    </div>

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
    header("Location:../login.php");
}




include("test/footer.php") ?>
<script type="text/javascript">
    $(document).ready(function () {
    $("#postForm").submit(function (e) {
        // alert("hello");
        e.preventDefault();
        let Form=$(this);
        // let data=
        let data=new FormData(this)
        let action=$(Form).attr('action');
        let errormsg=$(".errormsg");
        let titleerrormsg=$("#titleerrormsg");
        let bodyerrormsg=$("#bodyerrormsg");
        let imageerrormsg=$("#imageerrormsg");
        let tagserrormsg=$("#tagserrormsg");
        let authorerrormsg=$("#authorerrormsg");
        let successmsg=$(".successmsg");

        $.ajax({
            url:action,
            type:"POST",
            data:data,
            cache:false,
            contentType: false,
            processData: false,
            success:function (response) {
                let data=JSON.parse(response);
                if(data.menu_idErr){
                    $(errormsg).removeClass("alert alert-success").addClass("alert alert-danger");
                    $(errormsg).html(data.menu_idErr);

                    setTimeout(function() {
                        $(errormsg).fadeOut();
                    },5000)
                }

                if(data.posts_titleErr){

                        $(titleerrormsg).removeClass("alert alert-success").addClass("alert alert-danger");
                        $(titleerrormsg).html(data.posts_titleErr);
                    setTimeout(function() {
                        $(titleerrormsg).fadeOut();
                    },5000)
                }
                if(data.post_codeErr){
                    $(errormsg).removeClass("alert alert-success").addClass("alert alert-danger");
                    $(errormsg).html(data.post_codeErr);
                    setTimeout(function() {
                        $(errormsg).fadeOut();
                    },5000)

                }

                if(data.posts_bodyErr){
                    $(bodyerrormsg).removeClass("alert alert-success").addClass("alert alert-danger");
                    $(bodyerrormsg).html(data.posts_bodyErr);
            setTimeout(function() {
                $(bodyerrormsg).fadeOut();
            },5000)


                }
                if(data.posts_tagsErr){
                    $(tagserrormsg).removeClass("alert alert-success").addClass("alert alert-danger");
                    $(tagserrormsg).html(data.posts_tagsErr);
                    setTimeout(function() {
                        $(tagserrormsg).fadeOut();
                    },5000)

                }
                if(data.posts_imgErr){
                    $(imageerrormsg).removeClass("alert alert-success").addClass("alert alert-danger");
                    $(imageerrormsg).html(data.posts_imgErr);
                    setTimeout(function() {
                        $(imageerrormsg).fadeOut();
                    },5000)
                }

                if(data.posts_authorErr){
                    $(authorerrormsg).removeClass("alert alert-success").addClass("alert alert-danger");
                    $(authorerrormsg).html(data.posts_authorErr);
                    setTimeout(function() {
                        $(authorerrormsg).fadeOut();
                    },5000)
                }


                if(data.success){
                    $(successmsg).removeClass("alert alert-danger").addClass("alert alert-success");
                    $(successmsg).html(data.success);
                    setTimeout(function() {
                        $(successmsg).fadeOut();
                    },10000)

                }
                if(data.insertErr){
                    $(errormsg).removeClass("alert alert-success").addClass("alert alert-danger");
                    $(errormsg).html(data.insertErr);
                    setTimeout(function() {
                        $(errormsg).fadeOut();
                    },5000)
                }

                if(data.mainErr){
                    $(errormsg).removeClass("alert alert-success").addClass("alert alert-danger");
                    $(errormsg).html(data.mainErr);
                    setTimeout(function() {
                        $(errormsg).fadeOut();
                    },5000)
                }


            }

        });
    });






    })


</script>
