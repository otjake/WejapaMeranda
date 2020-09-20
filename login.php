<?php
ob_start();
session_start();
include("includes/authprocessor.php");
include("includes/header.php")
?>




<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card mb-3 ">
                <div class="card-body">
                    <h5 class="card-title">LOGIN</h5>
                    <div>
                        <span class="text-danger" style="text-align: left"><h3></h3></span>
                        <!--                    <span class="text-danger" style="text-align: left"><h3>--><?php //echo $error['main']; ?><!--</h3></span>-->
                        <!--                    <span class="text-danger" style="text-align: left"><h3>--><?php //echo $Server_error; ?><!--</h3></span>-->
                    </div>
                    <form method="post" action="" name="login_form" id="loginForm">

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

                        <div class="row mb-3 mx-1">
                            <label for="">Password</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" >#</span>
                                </div>

                                <input type="password" name="password" class="form-control" placeholder="Password">
                            </div>
                            <span class="text-danger" id="passwordErr"></span>

                        </div>

                        <input type="hidden" name="check" class="form-control" value="login">

                        <p id="errormsg"></p>

                        <div class="row mb-3 mx-1 justify-content-center ">
                            <button type="submit" class="btn btn-success" name="register">Login</button>
                        </div>
                    </form>
                    <div style="float: right">
                        Don't Have an account?:<a href="registration.php"><button  class="btn btn-info mx-2 my-4" name="register">Register And Get Creative</button></a>
                    </div>

                    <div style="float: left">
                        <a href="passwordReset.php"><button  class="btn btn-info" name="reset">Forgot Password?</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>



</div>
<!-- JS, Popper.js, and jQuery -->
<?php include ("includes/footer.php"); ?>
<script src="includes/validator.js"></script>


