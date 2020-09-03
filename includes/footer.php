<?php

//viewer_registration();
?>
<div class="site-section subscribe bg-light">
    <div class="container">
        <form  method="POST" action="includes/jquery_function.php" class="row align-items-center" id="sub_form">

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
<!--<script src="js/jquery-3.3.1.min.js" type="166617ea582e39e4552d3b9a-text/javascript"></script>-->
<!--<script src="js/jquery-migrate-3.0.1.min.js" type="166617ea582e39e4552d3b9a-text/javascript"></script>-->
<!--<script src="js/jquery-ui.js" type="166617ea582e39e4552d3b9a-text/javascript"></script>-->
<!--<script src="js/popper.min.js" type="166617ea582e39e4552d3b9a-text/javascript"></script>-->
<!--<script src="js/bootstrap.min.js" type="166617ea582e39e4552d3b9a-text/javascript"></script>-->
<script src="js/owl.carousel.min.js" type="text/javascript"></script>
<!--<script src="js/jquery.stellar.min.js" type="166617ea582e39e4552d3b9a-text/javascript"></script>-->
<!--<script src="js/jquery.countdown.min.js" type="166617ea582e39e4552d3b9a-text/javascript"></script>-->
<!--<script src="js/bootstrap-datepicker.min.js" type="166617ea582e39e4552d3b9a-text/javascript"></script>-->
<!--<script src="js/jquery.easing.1.3.js" type="166617ea582e39e4552d3b9a-text/javascript"></script>-->
<script src="js/aos.js" type="text/javascript"></script>
<!--<script src="js/jquery.fancybox.min.js" type="166617ea582e39e4552d3b9a-text/javascript"></script>-->
<!--<script src="js/jquery.sticky.js" type="166617ea582e39e4552d3b9a-text/javascript"></script>-->
<!--<script src="js/jquery.mb.YTPlayer.min.js" type="166617ea582e39e4552d3b9a-text/javascript"></script>-->
<script src="js/main.js" type="text/javascript"></script>
<script src="js/app.js" type="text/javascript"></script>
<!--custom js-->
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

<!--<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13" type="166617ea582e39e4552d3b9a-text/javascript"></script>-->
<!--<script type="166617ea582e39e4552d3b9a-text/javascript">-->
<!--  window.dataLayer = window.dataLayer || [];-->
<!--  function gtag(){dataLayer.push(arguments);}-->
<!--  gtag('js', new Date());-->
<!---->
<!--  gtag('config', 'UA-23581568-13');-->
<!--</script>-->
<script src="js/rocket-loader.min.js" data-cf-settings="166617ea582e39e4552d3b9a-|49" defer=""></script></body>

<!-- Mirrored from colorlib.com/preview/theme/meranda/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 01 Aug 2020 13:39:58 GMT -->
</html>
