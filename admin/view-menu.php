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
                            $menu=menu();
                            $count_post=mysqli_num_rows($menu);
                            if($count_post>0){
                                $i=1;
                                while ($row=mysqli_fetch_assoc($menu)){
                                    $menu_title=$row['menu_title'];
                                  ?>

                                   <div class="col-lg-6 single-content my-5" id="remove">

                                       <p style="font-size: 2rem"><?php echo $menu_title ;?></p>

                    <a href="update_cat.php?id=<?php echo $row['menu_id'] ?>"><button class="btn  mt-2" >Update Post</button></a>

                    <form method="post" action="" class="delete">
                        <div id="errormsg"></div>

                        <input name="deleteCat" type="hidden" value="<?php echo $row['menu_id']?>">
                        <button type="submit" class="btn btn-danger mt-2" name="headline">Delete Menu</button>
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
