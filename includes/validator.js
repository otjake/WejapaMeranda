$(document).ready(function () {
    $("#regForm").submit(function (e) {
        e.preventDefault();
let Form=$("#regForm");
let data=$(Form).serialize();
let action=$(Form).attr('action');
let errormsg=$("#errormsg");
let login=$(".login");

$.ajax({
    url:action,
    type:"POST",
    data:data,
    success:function (response) {
        let data=JSON.parse(response);
        if(data.nameErr){
            $(errormsg).addClass("alert alert-danger");
            $(errormsg).html(data.nameErr);
        }
        if(data.usernameErr){
            $(errormsg).addClass("alert alert-danger");
            ($(errormsg).html(data.usernameErr));
        }
        if(data.emailErr){
            $(errormsg).addClass("alert alert-danger");
            $(errormsg).html(data.emailErr);
        }

     if(data.passwordErr){
            $(errormsg).addClass("alert alert-danger");
            $(errormsg).html(data.passwordErr);
        }
     if(data.notificationErr){
            $(errormsg).addClass("alert alert-danger");
            $(errormsg).html(data.notificationErr);
        }
     if(data.success){
          // window.location.replace("landing.php?color="+data.color+"&firstname="+data.firstname+"&lastname="+data.lastname+"&email="
          //     +data.email+"&DOB="+data.DOB+"&gender="+data.gender+"&dept="+data.dept);
         setTimeout(function () {
             $(errormsg).removeClass("alert alert-danger").addClass("alert alert-success");
             $(errormsg).html(data.success);
         },3000)
         // setTimeout(function () {
         // $(login).css('display','block');
         // },5000)

        }

    }

})
    })

    $("#loginForm").submit(function (e) {
        e.preventDefault();
        let Form=$("#loginForm");
        let data=$(Form).serialize();
        let action=$(Form).attr('action');
        let errormsg=$("#errormsg");

        $.ajax({
            url:action,
            type:"POST",
            data:data,
            success:function (response) {
                let data=JSON.parse(response);

                if(data.emailErr){
                    $(errormsg).addClass("alert alert-danger");
                    $(errormsg).html(data.emailErr);
                }

                if(data.passwordErr){
                    $(errormsg).addClass("alert alert-danger");
                    $(errormsg).html(data.passwordErr);
                }
                if(data.notificationErr){
                    $(errormsg).addClass("alert alert-danger");
                    $(errormsg).html(data.notificationErr);
                }
                if(data.success){
                    window.location.replace("index.php");


                }

            }

        })
    });

    $("#resetForm").submit(function (e) {

        e.preventDefault();
        let Form=$("#resetForm");
        let data=$(Form).serialize();
        let action=$(Form).attr('action');
        let errormsg=$("#errormsg");
        $.ajax({
            url:action,
            type:"POST",
            data:data,
            success:function (response) {
                let data=JSON.parse(response);

                if(data.emailErr){
                    $(errormsg).addClass("alert alert-danger");
                    $(errormsg).html(data.emailErr);
                }

                if(data.notificationErr){
                    $(errormsg).addClass("alert alert-danger");
                    $(errormsg).html(data.notificationErr);
                }
                if(data.Noemail){
                    $(errormsg).addClass("alert alert-danger");
                    $(errormsg).html(data.Noemail);
                }

                if(data.success){
                    $(errormsg).removeClass("alert alert-danger").addClass("alert alert-success");
                    $(errormsg).html(data.success);
                }

            }

        })
    });
})

