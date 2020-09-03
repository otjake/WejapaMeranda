<?php
$conn=mysqli_connect('localhost','root','','blogCMS2.0');

if($conn){
    echo "";

}else{
    echo "Unable to connect".mysqli_connect_error();
}

?>
