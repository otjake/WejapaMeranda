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
                    <!--                <div id="errormsg">Test</div>-->
                    <div class="col-md-12">
                        <div class="row">
                            <?php
                            $sub=sub();
                            $count_subs=mysqli_num_rows($sub);
                            if($count_subs>0){
                                $i=1;
                                while ($row=mysqli_fetch_assoc($sub)){
                                    $viewer_email=$row['viewer_email'];
                                  ?>

                                   <div class="col-lg-6 single-content my-5" id="remove">

                                       <p style="font-size: 20px"><?php echo $viewer_email ;?></p>


                    <form method="post" action="" class="deletesub">
                        <div id="errormsg"></div>

                        <input name="deletesub" type="hidden" value="<?php echo $row['viewer_id'];?>">
                        <button type="submit" class="btn btn-danger mt-2" name="headline">Delete Subscriber</button>
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
    echo "<div class='alert alert-danger '><h3  class='text-capitalize' style='text-align: center'>You have no rights here</h3></div>";
}

include("test/footer.php")
?>
<script type="text/javascript">
    $(document).ready(function () {
        $(".deletesub").submit(function (e) {
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
