<?php
#when including with a jquery make sure the test jquey is pointing is topmost
include("test/Adminprocessor.php");

include("test/header.php");
if (isset($_SESSION['username']) && $_SESSION["role"]==2 ) {
?>
<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 single-content">
                <div id="errormsg"></div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">POST</div>

                        <div class="card-body">
                            <form method="POST" action="" enctype="multipart/form-data" id="headlineForm">


                                <div class="form-group">
                                    <label for="headline_name" class="col-md-4 col-form-label ">Headline Name</label>

                                    <div class="col-12">
                                        <input id="headline_name" type="text" class="form-control" name="headline_name">

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="Hpost_code" class="col-md-4 col-form-label ">Post Code</label>

                                    <div class="col-12">
                                        <input name="Hpost_code" type="text"  class="form-control">

                                    </div>
                                </div>



                                <div class="form-group">
                                    <label for="headline_status" class="col-md-4 col-form-label ">Display Status</label>

                                    <div class="col-12">
                                        <input id="headline_status" type="checkbox" class="form-control" name="headline_status" value=1>
                                    </div>
                                </div>

                                    <input type="hidden" name="headlinecheck" class="form-control" value="headlinetest">


                                <button type="submit" class="btn btn-primary mt-2" name="headline">Submit Post</button>


                            </form>



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
</div>
<?php
}else{
    echo "<div class='alert alert-danger '><h3  class='text-capitalize' style='text-align: center'>You have no rights here</h3></div>";
}
include("test/footer.php") ?>
<script type="text/javascript">
    $(document).ready(function () {
    $("#headlineForm").submit(function (e) {
        e.preventDefault();
        let Form=$(this);
        let data=$(Form).serialize();
        let action=$(Form).attr('action');
        let errormsg=$("#errormsg");

        $.ajax({
            url:action,
            type:"POST",
            data:data,
            success:function (response) {
                let data=JSON.parse(response);
                if(data.headline_nameErr){
                    $(errormsg).removeClass("alert alert-success").addClass("alert alert-danger");
                    $(errormsg).html(data.headline_nameErr);
                }
                if(data.post_codeErr){
                    $(errormsg).removeClass("alert alert-success").addClass("alert alert-danger");
                    ($(errormsg).html(data.post_codeErr));
                }

                if(data.success){
                    $(errormsg).removeClass("alert alert-danger").addClass("alert alert-success");
                    $(errormsg).html(data.success);
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
    });






    })


</script>
