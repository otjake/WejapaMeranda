<?php
require("includes/db.php");
$name =$username = $email =$password= "";
$error=array('nameErr'=>"",'usernameErr'=>"",'emailErr'=>"",'passwordErr'=>"",'main'=>"");
if ($_SERVER['REQUEST_METHOD'] == "POST") {

#### REGISTER start####

    if (!empty($_POST['check']) && ($_POST['check'] == "test")) {

        if (empty($_POST['name'])) {
            $error['nameErr'] = "You must Enter your name";
            die(json_encode(array("nameErr" => $error['nameErr'])));
        } else {

            if (!preg_match("/^[a-zA-Z ]*$/", $_POST['name'])) {
                $error['nameErr'] = "Only letters and white space allowed";
                die(json_encode(array("nameErr" => $error['nameErr'])));

            }
        }
        $name = $_POST['name'];


        if (empty($_POST['username'])) {
            $error['usernameErr'] = "You must Enter a username";
            die(json_encode(array("usernameErr" => $error['usernameErr'])));

        } else {

            if (!preg_match("/^[a-zA-Z0-9 ]*$/", $_POST['username'])) {
                $error['usernameErr'] = "Only letters and white space allowed for username";
                die(json_encode(array("usernameErr" => $error['usernameErr'])));

            }
        }
        $username = $_POST['username'];


        if (empty($_POST['Email'])) {
            $error['emailErr'] = "You must Enter your Email";
            die(json_encode(array("emailErr" => $error['emailErr'])));

        } else {

            if (!preg_match("/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/", $_POST['Email'])) {

                $error['emailErr'] = "Invalid email format";
                die(json_encode(array("emailErr" => $error['emailErr'])));

            }
        }
        $email = $_POST['Email'];


        if (empty($_POST['password'])) {
            $error['passwordErr'] = "You must Enter a password";
            die(json_encode(array("passwordErr" => $error['passwordErr'])));

        } else {

            if (!preg_match("/^(?=.*[!@#$%^&*-])(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).{8,}$/", $_POST['password'])) {
                $error['passwordErr'] = "Invalid password format,passwords must have,at least an uppercase,a lowercase,a digit,a special character and longer than 8 characters";
                die(json_encode(array("passwordErr" => $error['passwordErr'])));

            }
            $password = $_POST['password'];
        }
        if (array_filter($error)) {
            $error['main'] = "Correct the errors:check below for error points";
            die(json_encode(array("notificationErr" => $error['mainErr'])));

        } else {
            $check = "SELECT * FROM admin WHERE email='$email'";
            $check_exec = mysqli_query($conn, $check);
            $row = mysqli_num_rows($check_exec);
            if ($row > 0) {
                $error['main'] = "Email already exists";
                die(json_encode(array("notificationErr" => $error['main'])));
            } else {
                $roles=1;

                $sql = "INSERT INTO admin (name,username,email,password,roles,date_created) VALUES ('$name','$username','$email','$password',$roles,NOW())";

                $sql_exec = mysqli_query($conn, $sql);

                if ($sql_exec) {
                    die(json_encode(array("success" => "Registered")));

                } else {
                    $error['main'] = "Unable to register please try again";
                    die(json_encode(array("notificationErr" => $error['main'])));
                }
            }

        }
    } else {
        echo "";
    }
#### REGISTER END####



    #### LOGIN Start####

    if (!empty($_POST['check']) && ($_POST['check']=="login")) {

    if (empty($_POST['Email'])) {
        $error['emailErr'] = "You must Enter your Email";
        die(json_encode(array("emailErr" => $error['emailErr'])));

    } else {

        if (!preg_match("/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/", $_POST['Email'])) {

            $error['emailErr'] = "Invalid email format";
            die(json_encode(array("emailErr" => $error['emailErr'])));

        }
    }
    $email = $_POST['Email'];

    if (empty($_POST['password'])) {
        $error['passwordErr'] = "You must Enter a password";
        die(json_encode(array("passwordErr" => $error['passwordErr'])));

    } else {

        if (!preg_match("/^(?=.*[!@#$%^&*-])(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).{8,}$/", $_POST['password'])) {
            $error['passwordErr'] = "Invalid password format,passwords must have,at least an uppercase,a lowercase,a digit,a special character and longer than 15 characters";
            die(json_encode(array("passwordErr" => $error['passwordErr'])));

        }
        $password = $_POST['password'];
    }
    if (array_filter($error)) {
        $error['main'] = "Correct the errors:check below for error points";
        die(json_encode(array("notificationErr" => $error['mainErr'])));

    } else {
$loginSql="SELECT * FROM admin WHERE email='{$email}' AND password='{$password}'";
$loginSql_exec=mysqli_query($conn,$loginSql);
$count=mysqli_num_rows($loginSql_exec);
if($count > 0) {

    while ($row = mysqli_fetch_assoc($loginSql_exec)) {
        $_SESSION['role'] = $row['roles'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['user_id'] = $row['id'];
        die(json_encode(array("success" => "Redirecting...")));

    }
}else{
    $error['mainErr'] = "Invalid Details";
    die(json_encode(array("notificationErr" => $error['mainErr'])));
}

    }

}
#### LOGIN END####


#### PASSWORD RESET ####
if (!empty($_POST['check']) && ($_POST['check'] == "reset")) {

    if (empty($_POST['Email'])) {
        $error['emailErr'] = "You must Enter your Email";
        die(json_encode(array("emailErr" => $error['emailErr'])));

    } else {

        if (!preg_match("/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/", $_POST['Email'])) {

            $error['emailErr'] = "Invalid email format";
            die(json_encode(array("emailErr" => $error['emailErr'])));

        }
    }
    $email = $_POST['Email'];

    if (array_filter($error)) {
        $error['main'] = "Correct the errors:check below for error points";
        die(json_encode(array("notificationErr" => $error['mainErr'])));

    } else {
        $reset_sql="SELECT * from admin WHERE email='$email'";
        $reset_sql_exec=mysqli_query($conn,$reset_sql);
        $count=mysqli_num_rows($reset_sql_exec);

        if($count > 0){
        while ($row=mysqli_fetch_assoc($reset_sql_exec)){
            $name=$row['name'];
            $password=$row['password'];




            require 'includes/mail/PHPMailerAutoload.php';
            date_default_timezone_set('UTC');


            $mail = new PHPMailer();
            $mail->isSMTP();
            $mail->isHTML(true);
            $mail->Host = 'smtp.mailtrap.io';//host address
//            $mail->Host = 'smtp.gmail.com';//host address
            $mail->SMTPAuth = true;
            $mail->Port = 2525;
            $mail->SMTPSecure = "TLS";
            $mail->Username = '1b983ed768cbbb';//email username
            $mail->Password = 'b3a282848a49f0';//password
//            $mail->Username = 'jaketuriacada@gmail.com';//email username
//            $mail->Password = 'ixpupipsiberagcs';//password
            $mail->setFrom('jaketuriacada@gmail.com');
            $mail->addAddress($email);
            $mail->Subject = 'Here is the subject';
            $mail->Body    ='<body style="margin: 0; padding: 0;">
<table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <td style="padding: 10px 0 30px 0;">
            <table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border: 1px solid #cccccc; border-collapse: collapse;">
                <tr>
                    <td align="center" bgcolor="#70bbd9" style="padding: 40px 0 30px 0; color: #153643; font-size: 28px; font-weight: bold; font-family: Arial, sans-serif;">
                                                            <h2 style="font-family:\'Segoe Print\'">MERANDA</h2>
                                                                <h4>Your best help at creativity</h4>
                    </td>
                </tr>
                <tr>
                    <td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;">
                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                            <tr>
                                <td style="color: #153643; font-family: Arial, sans-serif; font-size: 24px;">
                                    <b>Hi! '.$name.'</b>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding: 20px 0 30px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">
                                        We recognise the hassles of forgetting a password,then setting a new one and remembering the old on and then jumbling them together
                                    <p>So instead of doing a password reset we offer you your old password back!! Yiippee.</p>

                                    <strong>Password: '.$password.'</strong>


                                </td>
                            </tr>

                            <tr>
                                <td style="padding: 20px 0 30px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">
                                <strong>You are not excited ??? ,We do not take security lightly here at Meranda ,so you feel your previous password has been compromised reach the admin for a password reset,</strong>
                                <strong>sending us the email address you registered with on this our platform and a prefered password.</strong>
                                
                                <p><strong>Admin:<a href = "mailto: jaketuriacada@gmail.com">jaketuriacada@gmail.com</a></strong></p>
                                
                                
                                <strong>Expect an email soon!!!!</strong>

                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td bgcolor="#ee4c50" style="padding: 30px 30px 30px 30px;">
                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                            <tr>
                                <td style="color: #ffffff; font-family: Arial, sans-serif; font-size: 14px;" width="75%">
                                    &reg; Meranda, Nigeria 2013<br/>
                                </td>
                                <td align="right" width="25%">
                                    <table border="0" cellpadding="0" cellspacing="0">
                                        <tr>
                                            <td style="font-family: Arial, sans-serif; font-size: 12px; font-weight: bold;">
                                                <a href="http://www.twitter.com/" style="color: #ffffff;">
                                                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/210284/tw.gif" alt="Twitter" width="38" height="38" style="display: block;" border="0" />
                                                </a>
                                            </td>
                                            <td style="font-size: 0; line-height: 0;" width="20">&nbsp;</td>
                                            <td style="font-family: Arial, sans-serif; font-size: 12px; font-weight: bold;">
                                                <a href="http://www.face.com/" style="color: #ffffff;">
                                                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/210284/fb.gif" alt="Facebook" width="38" height="38" style="display: block;" border="0" />
                                                </a>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
';
            try {
                if (!$mail->send()) {
//                    echo $msg =  "Your order request was not sent. Please try again";
                    die(json_encode(array("Noemail" =>  "Your password request was not sent. Please try again")));

                } else {
                    die(json_encode(array("success" =>  "sent")));
                }
            } catch (phpmailerException $e) {
            }

            die(json_encode(array("success" => "Your password has been sent to this email")));
        }
        }else{
            die(json_encode(array("Noemail" =>  "We do not have an account with this email")));
        }

    }

}
#### PASSWORD RESET END####

}


?>
