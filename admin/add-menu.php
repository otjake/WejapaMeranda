<?php
#when including with a jquery make sure the includes jquey is pointing is topmost
include("test/Adminprocessor.php");

include("test/header.php");
if (isset($_SESSION['username']) && ($_SESSION["role"]==2 )) {

?>
<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 single-content">
                <div id="errormsg"></div>
                <div id="successmsg"></div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">Menu</div>

                        <div class="card-body">
                            <form method="POST" action=""  id="menuForm">



                                <div class="form-group">
                                    <label for="menu_title" class="col-md-4 col-form-label ">Title</label>

                                    <div class="col-12">
                                        <input id="menu_title" type="text" class="form-control" name="menu_title">

                                    </div>
                                </div>




                                    <input type="hidden" name="menucheck" class="form-control" value="menutest">


                                <button type="submit" class="btn btn-primary mt-2" name="menu">Submit Post</button>


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


<?php
}else{
    echo "<div class='alert alert-danger '><h3  class='text-capitalize' style='text-align: center'>You have no rights here</h3></div>";
}

include("test/footer.php");
?>
<script type="text/javascript">
    $(document).ready(function () {
    $("#menuForm").submit(function (e) {
        e.preventDefault();
        let Form=$(this);
        let data=$(Form).serialize();
        let action=$(Form).attr('action');
        let errormsg=$("#errormsg");
        let successmsg=$("#successmsg");

        $.ajax({
            url:action,
            type:"POST",
            data:data,
            success:function (response) {
                let data=JSON.parse(response);
                if(data.menu_titleErr){
                    $(errormsg).removeClass("alert alert-success").addClass("alert alert-danger");
                    $(errormsg).html(data.menu_titleErr);
                    setTimeout(function() {
                        $(errormsg).fadeOut();

                    },5000)
                }


                if(data.success){
                    $(successmsg).removeClass("alert alert-danger").addClass("alert alert-success");
                    $(successmsg).html(data.success);
                    setTimeout(function() {
                        $(successmsg).fadeOut();
                    },5000)
                }


            }

        });
    });






    })


</script>
