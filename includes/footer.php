<?php

//viewer_registration();
?>
<div class="site-section subscribe bg-light">
    <div class="container">
        <form  method="POST" action="includes/sub_function.php"  class="row align-items-center" id="sub_form">

            <div class="col-md-5 mr-auto">
                <h2>Newsletter Subcribe</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis aspernatur ut at quae omnis pariatur obcaecati possimus nisi ea iste!</p>
            </div>
            <div class="col-md-6 ml-auto">
                <h3 id="msg"></h3>

                <div class="d-flex">

                    <input type="email" name="email" class="form-control" placeholder="Enter your email">
                    <input type="hidden" name="sub_check" class="form-control" value="sub_reg">
                    <button type="submit" name="subscribe"  class="btn btn-secondary"><span class="icon-paper-plane"></span></button>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="copyright">
                    <p>

                        Copyright &copy;<script type="166617ea582e39e4552d3b9a-text/javascript">document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart text-danger" aria-hidden="true"></i> by <a href="https://colorlib.com/" target="_blank">Colorlib</a>

                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


<!--<div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" /><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#ff5e15" /></svg></div>-->
<script src="js/jquery-3.4.1.js" type="text/javascript"></script>
<!--<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>-->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script type="text/javascript">
    $("#sub_form").submit(function (e) {
        e.preventDefault();
        // alert("jquery is working");
        let form=$(this);
        let data=$(form).serialize();
        let action= $(form).attr('action');
        $.ajax({
            url:action,
            type:"POST",
            data:data,
            success:function (response) {
                $dataresult=JSON.parse(response);
                if($dataresult.success){
                    $('#msg').removeClass('alert alert-danger').addClass('alert alert-dark');
                    $('#msg').text($dataresult.success);
                }
                if($dataresult.error){
                    $('#msg').removeClass('alert alert-dark').addClass('alert alert-danger');
                    $('#msg').text($dataresult.error);

                }
                if($dataresult.empty_input){
                    $('#msg').removeClass('alert alert-dark').addClass('alert alert-danger');
                    $('#msg').html('<h4>' + $dataresult.empty_input + '<h4>');

                }
                if($dataresult.Duplicate){
                    $('#msg').removeClass('alert alert-dark').addClass('alert alert-danger');
                    $('#msg').html('<h4>' + $dataresult.Duplicate + '<h4>');

                }

            }
        });


    });



</script>


</html>
