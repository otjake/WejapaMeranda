<?php
require ("db.php");
        if(isset($_POST['sub_check'])){
            global $conn;
        if(!empty($_POST['email'])) {
            $email = $_POST['email'];
            $checker = "SELECT * FROM viewer WHERE viewer_email='$email'";
            $checker_exec = mysqli_query($conn, $checker);
            $count = mysqli_num_rows($checker_exec);
            if ($count === 0){
                $viewer = "INSERT INTO viewer (`viewer_email`) VALUES ('$email')";
                $viewer_exec = mysqli_query($conn, $viewer);
                if ($viewer_exec) {
                    die(json_encode(array("success" => "registered")));
                } else {
                    die(json_encode(array("dataerror" => "unregistered")));
                }
        }
            else{
                die(json_encode(array("Duplicate" => "We already have your details")));

            }
     }
    else
    {
        die(json_encode(array("empty_input" => "You can't leave the space empty dumbo")));
    }
    }
    ?>
