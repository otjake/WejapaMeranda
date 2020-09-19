<?php
session_start();
include("includes/authprocessor.php");
include("includes/header.php");
?>




<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card mb-3 ">
                <div class="card-body">
                    <h5 class="card-title">Reset Password</h5>
                    <div>
                        <span class="text-danger" style="text-align: left"><h3></h3></span>
                        <!--                    <span class="text-danger" style="text-align: left"><h3>--><?php //echo $error['main']; ?><!--</h3></span>-->
                        <!--                    <span class="text-danger" style="text-align: left"><h3>--><?php //echo $Server_error; ?><!--</h3></span>-->
                    </div>
                    <form method="post" action="" name="res_form" id="resetForm">

                        <div class="row mb-3 mx-1">
                            <label for="">Email</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" >@</span>
                                </div>

                                <input type="email" class="form-control" name="Email" placeholder="Email" id="email" >
                            </div>
                            <span class="text-danger" id="emailErr"></span>

                        </div>



                        <input type="hidden" name="check" class="form-control" value="reset">

                        <p id="errormsg"></p>

                        <div class="row mb-3 mx-1 justify-content-center ">
                            <button type="submit" class="btn btn-success" name="register">Email me my password</button>
                        </div>

                    </form>


                    <div style="float: right">
                        Don't Have an account?:<a href="registration.php"><button  class="btn btn-info mx-2" name="register">Register And Get Creative</button></a>
                    </div>

                </div>
            </div>
        </div>
    </div>



</div>
<!-- JS, Popper.js, and jQuery -->
<?php include ("includes/footer.php"); ?>
<script src="includes/validator.js"></script>


